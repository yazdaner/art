<?php

namespace Yazdan\Product\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yazdan\Category\Repositories\CategoryRepository;
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

    public function create()
    {
        $this->authorize('manage', Product::class);
        $statuses = ProductRepository::$statuses;
        $categories = CategoryRepository::getTypeAll(Product::class);
        return view('Product::admin.create', compact('statuses','categories'));
    }


    public function store(Request $request)
    {
        dd($request->all());
        $this->authorize('manage', Course::class);
        $request = storeImage($request);
        $request = storeVideo($request);
        ProductRepository::store($request);
        newFeedbacks();
        return redirect(route('admin.courses.index'));
    }

}
