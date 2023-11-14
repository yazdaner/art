@extends("Dashboard::master")
@section('breadcrumb')
<li><a href="#" title="ویرایش درباره ما">ویرایش درباره ما</a></li>
@endsection
@section("content")
<div class="main-content">
    <div class="col-12 bg-white">
        <p class="box__title">ویرایش درباره ما</p>
        <form action="{{ route("admin.about.update", $about->id) }}" method="post" class="padding-30"
            enctype="multipart/form-data">
            @csrf
            @method("put")

            <x-file-upload type="file" name="banner4" placeholder="تصویر 1" :value="$about->getModelBanner(4)" />
            <x-file-upload type="file" name="banner5" placeholder="تصویر 2" :value="$about->getModelBanner(5)" />
            <x-file-upload type="file" name="banner6" placeholder="تصویر 3" :value="$about->getModelBanner(6)" />

            <x-text-area placeholder="توضیح صفحه اصلی" name="frontBody" id="frontBody" value="{{$about->frontBody ?? ''}}" />

            <hr class="py-4 mt-5"/>

            <x-file-upload type="file" name="banner1" placeholder="بنر 1" :value="$about->getModelBanner(1)" />
            <x-file-upload type="file" name="banner2" placeholder="بنر 2" :value="$about->getModelBanner(2)" />
            <x-file-upload type="file" name="banner3" placeholder="بنر 3" :value="$about->getModelBanner(3)" />

            <x-text-area placeholder="توضیح 1" name="description1" value="{{$about->description1 ?? ''}}" />
            <x-text-area placeholder="توضیح 2" name="description2" value="{{$about->description2 ?? ''}}" />
            <x-text-area placeholder="توضیح 3" name="description3" value="{{$about->description3 ?? ''}}" />

            <x-text-area placeholder="توضیح اصلی" name="body" id="body" value="{{$about->body ?? ''}}" />

            <button type="submit" class="btn btn-yazdan">بروزرسانی</button>
        </form>
    </div>
</div>
@endsection

@include('Common::views.admin.ckeditor',['names' => ['body','frontBody']])

