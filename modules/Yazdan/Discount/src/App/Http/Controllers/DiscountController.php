<?php

namespace Yazdan\Discount\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Yazdan\Coin\App\Models\Coin;
use Yazdan\Common\Responses\AjaxResponses;
use Yazdan\Coupon\App\Models\Coupon;
use Yazdan\Course\App\Models\Course;
use Yazdan\Discount\App\Http\Requests\CodeRequest;
use Yazdan\Discount\App\Http\Requests\DiscountRequest;
use Yazdan\Discount\App\Models\Discount;
use Yazdan\Discount\Repositories\DiscountRepository;
use Yazdan\Discount\Services\DiscountService;
use Yazdan\Product\App\Models\Product;
use Yazdan\Product\App\Models\Variation;

class DiscountController extends Controller
{
    public function index()
    {
        $this->authorize('manage', Discount::class);
        $discounts = DiscountRepository::paginateAll();
        $products = Product::all();
        $courses = Course::all();
        return view('Discount::admin.index', compact('discounts', 'products', 'courses'));
    }

    public function store(DiscountRequest $request)
    {
        $this->authorize('manage', Discount::class);

        DiscountRepository::store($request->all());

        newFeedbacks();

        return back();
    }

    public function edit(Discount $discount)
    {
        $this->authorize('manage', Discount::class);
        $products = Product::all();
        $courses = Course::all();
        return view("Discount::admin.edit", compact("discount", "products", "courses"));
    }

    public function update(Discount $discount, DiscountRequest $request)
    {
        $this->authorize('manage', Discount::class);
        DiscountRepository::update($discount->id, $request->all());
        newFeedbacks();
        return redirect()->route("admin.discounts.index");
    }

    public function destroy(Discount $discount)
    {
        $this->authorize('manage', Discount::class);

        $discount->delete();
        return AjaxResponses::SuccessResponses();
    }

    public function check(CodeRequest $request)
    {
        $ProductWithDiscount = [];
        foreach (\Cart::getContent() as $item) {
            $discount = DiscountRepository::getValidDiscountByCode($request->code, $item->associatedModel->product);
            if (!is_null($discount)) {
                $ProductWithDiscount[] = [
                    'variation' => $item->attributes,
                    'quantity' => $item->quantity,
                    'discount' => $discount,
                ];
            }
        }
        if ($ProductWithDiscount == []) {
            newFeedbacks('ناموفق', 'کد تخفیف وارد شده نامعتبر می باشد', 'error');
            return back();
        }

        if (session()->has('code')) {
            session()->forget('code');
        }

        session()->put('code', $request->code);

        foreach ($ProductWithDiscount as $item) {
            $variation = Variation::find($item['variation']->id);
            $discountTotalAmount = $variation->getDiscountAmount($item['discount'],$item['quantity']);

            \Cart::update(
                $item['variation']->id,
                ['price' => $discountTotalAmount / $item['quantity']]
            );
        }

        newFeedbacks();
        return back();
    }
}
