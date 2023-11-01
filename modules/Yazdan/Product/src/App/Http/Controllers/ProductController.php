<?php

namespace Yazdan\Blog\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Yazdan\Product\App\Models\Product;
use Yazdan\Product\Repositories\ProductRepository;

class ProductController extends Controller
{

    public function index()
    {
        $this->authorize('manage', Product::class);

        $blogs = ProductRepository::getAllPaginate(10);
        return view('Blog::admin.index', compact('blogs'));
    }

}
