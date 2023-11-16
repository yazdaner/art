@extends('Dashboard::master')
@section('breadcrumb')
<li><a href="{{route('admin.products.index')}}" title="محصولات">محصولات</a></li>
<li><a href="{{ route('admin.variations.index',$variation->product_id) }}" title="متغییر محصول ها">متغییر محصول ها</a>
</li>
<li><a href="#" title="ویرایش متغییر محصول">ویرایش متغییر محصول</a></li>
@endsection
@section('content')
<div class="main-content padding-0">
    <div class="row no-gutters">
        <div class="col-12 bg-white p-0">
            <p class="box__title">بروزرسانی متغییر محصول</p>
            <form action="{{ route('admin.variations.update', $variation->id) }}" method="post" class="padding-30">
                @csrf
                @method('put')
                <x-input name="title" type="text" placeholder="عنوان" value="{{$variation->title}}" />
                <x-input name="quantity" type="number" placeholder="تعداد" value="{{$variation->quantity}}" />
                <x-input name="price" type="number" placeholder="قیمت" value="{{$variation->price}}" />
                <x-input name="price2" type="number" placeholder="قیمت ویژه" value="{{$variation->price2}}" />
                <x-input name="sku" type="text" placeholder="شناسه انبارداری" value="{{$variation->sku}}" />

                <button class="btn btn-yazdan">بروزرسانی</button>
            </form>
        </div>
    </div>
</div>
@endsection
