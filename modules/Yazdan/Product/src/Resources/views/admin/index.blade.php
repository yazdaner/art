@extends('Dashboard::master')
@section('breadcrumb')
    <li><a href="#" title="محصولات">محصولات</a></li>
@endsection
@section('content')
<div class="main-content padding-0">
    <div class="row no-gutters">
        <div class="col-12 margin-left-10 margin-bottom-15 border-radius-3">
            <div class="justify-content-between box__title pb-4">
                <h3 class="btn">محصولات</h3>
                <a class="btn btn-yazdan" href="{{route('admin.products.create')}}">ایجاد محصول</a>
            </div>
            <div class="table__box">
                <table class="table">
                    <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>شناسه</th>
                            <th>بنر</th>
                            <th>عنوان</th>
                            <th>اسلاگ</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $product)
                            <tr role="row" class="">
                                <td><a href="">{{$products->firstItem() + $key}}</a></td>
                                <td>
                                    <a href="{{$product->getImage()}}" target="_blank"><img src="{{$product->getImage(60)}}" class="profile_sm"></a>
                                </td>
                                <td><a href="">{{$product->title}}</a></td>
                                <td>{{$product->slug}}</td>
                                <td>
                                    <a href="" onclick="deleteItem(event,'{{route('admin.products.destroy',$product->id)}}')" class="item-delete mlg-15" title="حذف"></a>
                                    <a href="{{route('admin.products.edit',$product->id)}}" class="item-edit" title="ویرایش"></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $products->links('pagination.admin') }}
        </div>
    </div>
</div>
@endsection
