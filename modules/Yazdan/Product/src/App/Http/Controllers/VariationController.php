<?php

namespace Yazdan\Product\App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yazdan\Product\App\Models\Product;
use Yazdan\Product\App\Models\Variation;
use Yazdan\Common\Responses\AjaxResponses;
use Yazdan\Product\Repositories\VariationRepository;
use Yazdan\Product\App\Http\Requests\VariationRequest;

class VariationController extends Controller
{

    public function index(Product $product)
    {
        $this->authorize('manage', Product::class);
        $variations = VariationRepository::getProductVariations($product->id);
        return view('Product::admin.variation.index', compact('product', 'variations'));
    }

    public function store(VariationRequest $request)
    {
        $this->authorize('manage', Product::class);

        try {
            DB::beginTransaction();

            VariationRepository::store($request);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            newFeedbacks('error', $ex->getMessage(), 'error');
            return back();
        }

        newFeedbacks();
        return back();
    }

    public function edit(Variation $variation)
    {
        $this->authorize('manage', Product::class);
        return view('Product::admin.variation.edit', compact('variation'));
    }

    public function update(Variation $variation, VariationRequest $request)
    {
        $this->authorize('manage', Product::class);
        try {
            DB::beginTransaction();

            VariationRepository::update($variation->id, $request);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            newFeedbacks('error', $ex->getMessage(), 'error');
            return back();
        }
        newFeedbacks();
        return back();
    }

    public function destroy(Variation $variation)
    {
        $this->authorize('manage', Product::class);
        try {
            DB::beginTransaction();
            $variation->delete();
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            return AjaxResponses::ErrorResponses();
        }
        return AjaxResponses::SuccessResponses();
    }
}
