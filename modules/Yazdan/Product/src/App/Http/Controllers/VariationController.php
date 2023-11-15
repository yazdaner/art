<?php

namespace Yazdan\Product\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Yazdan\Product\App\Models\Product;
use Yazdan\Product\Repositories\VariationRepository;

class VariationController extends Controller
{

    public function index(Product $product)
    {
        $this->authorize('manage', Product::class);
        $variations = VariationRepository::getProductVariations($product->id);
        return view('Product::admin.variation.index', compact('product','variations'));
    }

}
