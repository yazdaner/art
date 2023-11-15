<?php

namespace Yazdan\Product\App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yazdan\Media\App\Models\Gallery;
use Yazdan\Product\App\Models\Product;
use Yazdan\Common\Responses\AjaxResponses;
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
        return view('Product::admin.create', compact('statuses', 'categories'));
    }


    public function store(ProductRequest $request)
    {
        $this->authorize('manage', Product::class);

        try {
            DB::beginTransaction();

            $request = storeImage($request);
            $request = storeImages($request);
            ProductRepository::store($request);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            newFeedbacks('error', $ex->getMessage(), 'error');
            return redirect(route('admin.products.index'));
        }

        newFeedbacks();
        return redirect(route('admin.products.index'));
    }

    public function edit(Product $product)
    {
        $this->authorize('manage', Product::class);
        $statuses = ProductRepository::$statuses;
        $categories = CategoryRepository::getTypeAll(Product::class);
        return view('Product::admin.edit', compact('product', 'statuses', 'categories'));
    }

    public function update(Product $product, ProductRequest $request)
    {
        $this->authorize('manage', Product::class);
        $request = updateImage($request, $product);
        ProductRepository::update($product->id, $request);
        newFeedbacks();
        return redirect(route('admin.products.index'));
    }

    public function destroy($id)
    {
        $this->authorize('manage', Product::class);
        try {
            DB::beginTransaction();
                ProductRepository::delete($id);
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            return AjaxResponses::ErrorResponses();
        }
        return AjaxResponses::SuccessResponses();
    }

    public function editGallery(Product $product)
    {
        $this->authorize('manage', Product::class);
        return view('Product::admin.editGallery', compact('product'));
    }

    public function deleteImageGallery(Gallery $gallery)
    {
        $this->authorize('manage', Product::class);
        try {
            DB::beginTransaction();
                destroyImage($gallery);
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            newFeedbacks('error', $ex->getMessage(), 'error');
            return back();
        }
        newFeedbacks();
        return back();
    }

    public function addImagesGallery(Product $product,Request $request)
    {
        $this->authorize('manage', Product::class);

        try {
            DB::beginTransaction();

            $request = storeImages($request);
            ProductRepository::addImagesGallery($product,$request);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            newFeedbacks('error', $ex->getMessage(), 'error');
            return back();
        }

        newFeedbacks();
        return back();
    }



}
