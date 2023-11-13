@extends('Dashboard::master')
@section('breadcrumb')
<li><a href="{{route('admin.products.index')}}" title="محصول ها">محصول ها</a></li>
<li><a href="#" title="ایجاد">ایجاد</a></li>
@endsection
@section('content')
<div class="main-content users">
    <div class="row no-gutters bg-white">
        <div class="col-12 p-0">
            <p class="box__title">ایجاد محصول</p>
            <form action="{{route('admin.products.store')}}" method="post" class="padding-30"
                enctype="multipart/form-data">
                @csrf

                <x-input name="title" type="text" placeholder="عنوان" />
                <x-input name="slug" type="text" placeholder="عنوان انگلیسی" />

                <x-input name="delivery_amount" type="number" placeholder="مبلغ ارسال" />
                <x-input name="delivery_amount_per_product" type="number" placeholder="مبلغ ارسال به ازای هر محصول" />

                <x-select name="status" placeholder="دسته بندی محصول">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" @if (old('category') == $category->title) selected @endif>{{$category->title}}</option>
                    @endforeach
                </x-select>

                <x-select name="status" placeholder="وضعیت محصول">
                    @foreach ($statuses as $status)
                        <option value="{{$status}}" @if (old('status') == $status) selected @endif>@lang($status)</option>
                    @endforeach
                </x-select>

                <x-file-upload name="primary_image" placeholder="تصویر اصلی محصول" />
                <x-file-upload name="images[]" placeholder="تصاویر محصول" multiple="true" />

                <div class="col-12">
                    <x-text-area name="body" placeholder="محتوا" />
                </div>

                <button type="submit" class="btn btn-yazdan">ایجاد</button>

            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="//cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('body', {
        language: 'fa',
        filebrowserUploadUrl: '{{ route('admin.editor-upload', ['_token' => csrf_token()]) }}',
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection
