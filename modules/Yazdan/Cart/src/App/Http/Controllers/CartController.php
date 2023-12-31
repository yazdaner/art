<?php

namespace Yazdan\Cart\App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yazdan\Payment\Gateways\Gateway;
use Yazdan\Product\App\Models\Product;
use Yazdan\Product\App\Models\Variation;
use Yazdan\Payment\Services\PaymentService;
use Yazdan\Discount\Services\DiscountService;
use Yazdan\Cart\App\Http\Requests\CartRequest;
use Yazdan\Payment\Repositories\PaymentRepository;
use Yazdan\Payment\App\Events\PaymentWasSuccessful;
use Yazdan\Discount\Repositories\DiscountRepository;

class CartController extends Controller
{
    public function index()
    {
        return view('Cart::index');
    }

    public function add(CartRequest $request)
    {
        $product = Product::findOrFail($request->product_id);
        $variation = Variation::findOrFail(json_decode($request->variation)->id);

        if ($request->quantity > $variation->quantity) {
            newFeedbacks('نا موفق', 'تعداد وارد شده از محصول درست نمی باشد', 'error');
            return back();
        }

        $rowId = $variation->id;

        if (\Cart::get($rowId) == null) {
            \Cart::add(array(
                'id' => $rowId,
                'name' => $product->title,
                'price' => $variation->is_sale ? $variation->price2 : $variation->price,
                'quantity' => $request->quantity,
                'attributes' => $variation,
                'associatedModel' => $variation
            ));
        } else {
            newFeedbacks('دقت کنید', 'محصول مورد نظر به سبد خرید شما اضافه شده است', 'error');
            return redirect(route('cart.index'));
        }

        newFeedbacks();
        return redirect(route('cart.index'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'quantity' => 'required'
        ]);

        foreach ($request->quantity as $rowId => $quantity) {

            $variation = Variation::find($rowId);
            $price = $variation->getPrice();
            $code = session()->get('code');
            if ($code) {
                $discount = DiscountRepository::getValidDiscountCodeForProduct($code, $variation->product);
                if ($discount) {
                    $discountTotalAmount = $variation->getDiscountAmount($discount, $quantity);
                    $price = $discountTotalAmount / $quantity;
                }
            }
            \Cart::update(
                $rowId,
                [
                    'quantity' => [
                        'relative' => false,
                        'value' => $quantity,
                    ],
                    'price' => $price,
                    'attributes' => $variation,
                ]
            );
        }
        newFeedbacks('با موفقیت', 'سبد خرید شما ویرایش شد', 'success');
        return back();
    }

    public function remove($rowId)
    {
        Cart::remove($rowId);

        newFeedbacks('با موفقیت', 'محصول مورد نظر از سبد خرید شما حذف شد', 'success');
        return back();
    }

    public function clear()
    {
        Cart::clear();
        session()->forget('code');
        newFeedbacks('با موفقیت', 'سبد خرید شما پاک شد', 'success');
        return back();
    }

    public function buy()
    {
        if(auth()->user()->address == null){
            newFeedbacks('نا موفق', 'لطفا آدرس خود را وارد کنید', 'error');
            return back();
        }
        if (\Cart::isEmpty()) {
            newFeedbacks('نا موفق', 'سبد خرید شمل خالی است', 'error');
            return back();
        }
        $items = [];
        foreach (\Cart::getContent() as $item) {
            $model = get_class($item->associatedModel);
            $id = $item->associatedModel->id;
            $items[] = [
                'model' => $model::find($id),
                'quantity' => $item->quantity
            ];
        }
        $user = auth()->user();
        $amounts = [];
        $products = [];
        $code = session()->get('code');

        // check code
        if ($code) {
            $discountFromCode = DiscountRepository::getValidCode($code);
            if ($discountFromCode == null) {
                session()->forget('code');
                newFeedbacks('نا موفق', 'کد تخفیف نامعتبر میباشد', 'error');
                return back();
            }
        }

        foreach ($items as $item) {
            [$amount, $discounts] = $item['model']->finalPrice($item['quantity'], $code, true);
            $amounts[] = $amount * $item['quantity'];
            $item['discounts'] = $discounts;
            $item['amount'] = round($amount);
            $item['totalAmount'] = ($amount * $item['quantity']) + cartTotalDeliveryAmount();
            $products[] = $item;
        }
        $totalAmount = array_sum($amounts);

        //free
        if ($totalAmount <= 0) {
            $this->free($products);
        }

        $totalAmount += cartTotalDeliveryAmount();
        PaymentService::generate($products,$totalAmount);
        resolve(Gateway::class)->redirect();
    }

    private function free($products)
    {
        $invoice_id = uniqid();
        foreach ($products as $item) {
            resolve(PaymentRepository::class)->store([
                'user_id' => auth()->user(),
                'paymentable_id' => $item['model']->id,
                'paymentable_type' => get_class($item['model']),
                'amount' => $item['amount'],
                'quantity' => $item['quantity'],
                'totalAmount' => $item['totalAmount'],
                'invoice_id' => $invoice_id,
                'gateway' => 'free',
                'status' => PaymentRepository::CONFIRMATION_STATUS_SUCCESS,
            ], $item['discounts']);
        }

        $repository = resolve(PaymentRepository::class);
        $payments = $repository->findByInvoiceId($invoice_id);

        foreach ($payments as $payment) {
            event(new PaymentWasSuccessful($payment));
            session()->forget('code');
            \Cart::clear();
        }
        newFeedbacks('عملیات موفق', 'پرداخت با موفقیت انجام شد', 'success');
        return redirect('/');
    }
}
