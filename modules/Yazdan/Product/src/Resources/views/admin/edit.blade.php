@extends('Dashboard::master')
@section('breadcrumb')
<li><a href="{{route('admin.products.index')}}" title="محصول ها">محصول ها</a></li>
<li><a href="#" title="ویرایش">ویرایش</a></li>
@endsection
@section('content')
<div class="main-content users">
    <div class="row no-gutters bg-white">
        <div class="col-12 p-0">
            <p class="box__title">ویرایش محصول</p>
            <form action="{{route('admin.products.update',$product->id)}}" method="post" class="padding-30"
                enctype="multipart/form-data">
                @csrf
                @method('put')

                <x-input name="title" type="text" placeholder="عنوان" value="{{$product->title}}" />
                <x-input name="slug" type="text" placeholder="عنوان انگلیسی" value="{{$product->slug}}" />

                <x-select name="category_id" label="دسته بندی محصول">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" @if ($product->category->title == $category->title) selected @endif>{{$category->title}}</option>
                    @endforeach
                </x-select>

                <x-select name="status" label="وضعیت محصول">
                    @foreach ($statuses as $status)
                        <option value="{{$status}}" @if ($product->status == $status) selected @endif>@lang($status)</option>
                    @endforeach
                </x-select>

                <x-file-upload name="media" placeholder="تصویر اصلی محصول" :value="$product->media" />

                <div class="col-12">
                    <x-text-area name="description" placeholder="توضیحات" value="{{$product->description}}" />
                </div>
                <div class="col-12">
                    <x-text-area name="body" placeholder="محتوا" value="{{$product->body}}" />
                </div>

                <button type="submit" class="btn btn-yazdan">ویرایش</button>

            </form>
        </div>
    </div>
</div>
@endsection

@include('Common::views.admin.ckeditor',['names' => ['body','description']])
