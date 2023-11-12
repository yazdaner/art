<?php

namespace Yazdan\Product\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Yazdan\Product\App\Models\Product;
use Yazdan\Product\Repositories\ProductRepository;

class ProductController extends Controller
{

    public function index()
    {
        $this->authorize('manage', Product::class);

        $products = ProductRepository::getAllPaginate(10);
        return view('Product::admin.index', compact('products'));
    }

}
