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
                'associatedModel' => $product
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

            $code = session()->get('code');
            $variation = Variation::find($rowId);
            $discount = DiscountRepository::getValidDiscountByCode($code, $variation->product);
            $DiscountService = new DiscountService();
            $discountTotalAmount = $DiscountService->calculateDiscountAmount($variation, $quantity, $discount);

            \Cart::update(
                $rowId,
                [
                    'quantity' => [
                        'relative' => false,
                        'value' => $quantity,
                    ],
                    'price' => $discountTotalAmount / $quantity,
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
            $repo = new DiscountRepository();
            $discountFromCode = $repo->getValidCode($code);
            if ($discountFromCode == null) {
                session()->forget('code');
                newFeedbacks('نا موفق', 'کد تخفیف نامعتبر میباشد', 'error');
                return back();
            }
        }
        foreach ($items as $item) {
            [$amount, $discounts] = $item['model']->finalPrice($item['quantity'], $code, true);
            $amounts[] = $amount;
            $item['discounts'] = $discounts;
            $item['amount'] = round($amount / $item['quantity']);
            $item['totalAmount'] = $amount;
            $products[] = $item;
        }
        $totalAmount = array_sum($amounts);

        //free
        if ($totalAmount <= 0) {
            $invoice_id = uniqid();
            foreach ($products as $item) {
                resolve(PaymentRepository::class)->store([
                    'user_id' => $user->id,
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
        PaymentService::generate($products, $user, $totalAmount);
        resolve(Gateway::class)->redirect();
    }
}
