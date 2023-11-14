<?php

namespace Yazdan\Product\App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yazdan\Product\App\Models\Product;
use Yazdan\Product\Repositories\ProductRepository;
use Yazdan\Category\Repositories\CategoryRepository;
use Yazdan\Product\App\Http\Requests\ProductRequest;

class ProductController extends Controller
{

    public function index()
    {
        $this->authorize('manage', Product::class);
        $products = ProductRepository::getAllPaginate(10);
        return view('Product::admin.index', compact('products'));
    }

    public function create()
    {
        $this->authorize('manage', Product::class);
        $statuses = ProductRepository::$statuses;
        $categories = CategoryRepository::getTypeAll(Product::class);
        return view('Product::admin.create', compact('statuses','categories'));
    }


    public function store(ProductRequest $request)
    {
        $this->authorize('manage', Product::class);
        $request = storeImage($request);
        $request = storeImages($request);
        ProductRepository::store($request);
        newFeedbacks();
        return redirect(route('admin.products.index'));
    }

    public function edit(Product $product)
    {
        $this->authorize('manage', Product::class);
        $statuses = ProductRepository::$statuses;
        $categories = CategoryRepository::getTypeAll(Product::class);
        return view('Product::admin.edit', compact('product', 'statuses','categories'));
    }

    public function update(Product $product,ProductRequest $request)
    {
        $this->authorize('manage', Product::class);
        $request = updateImage($request,$product);
        ProductRepository::update($product->id,$request);
        newFeedbacks();
        return redirect(route('admin.products.index'));
    }

}
