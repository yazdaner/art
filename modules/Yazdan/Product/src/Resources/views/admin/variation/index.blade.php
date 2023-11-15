@extends('Dashboard::master')
@section('breadcrumb')
    <li><a href="#" title="متغییر های محصول">متغییر های محصول</a></li>
@endsection
@section('content')
<div class="main-content padding-0">
    <div class="row no-gutters  ">
        <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">
            <p class="box__title">متغییر های محصول</p>
            <div class="table__box">
                <table class="table">
                    <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>شناسه</th>
                            <th>نام دسته بندی</th>
                            <th>نام انگلیسی دسته بندی</th>
                            <th>دسته پدر</th>
                            <th>نوع</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($variations as $key => $variation)
                            <tr role="row">
                                <td><a href="">{{++$key}}</a></td>
                                <td><a href="">{{$variation->title}}</a></td>
                                <td>{{$variation->quantity}}</td>
                                <td>{{$variation->price}}</td>
                                <td>{{$variation->price2}}</td>
                                <td>{{$variation->sku}}</td>
                                <td>
                                    <a href="" onclick="deleteItem(event,'{{route('admin.variations.destroy',$variation->id)}}')" class="item-delete mlg-15" title="حذف"></a>
                                    <a href="{{route('admin.variations.edit',$variation->id)}}" class="item-edit" title="ویرایش"></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @include('Product::admin.variation.create')
    </div>
</div>
@endsection
