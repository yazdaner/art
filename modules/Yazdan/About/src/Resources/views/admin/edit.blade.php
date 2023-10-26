@extends("Dashboard::master")
@section('breadcrumb')
<li><a href="#" title="ویرایش درباره ما">ویرایش درباره ما</a></li>
@endsection
@section("content")
  <div class="main-content">
    <div class="col-12 bg-white">
        <p class="box__title">ویرایش درباره ما</p>
        <form action="{{ route("admin.about.update", $about->id) }}" method="post" class="padding-30" enctype="multipart/form-data">
            @csrf
            @method("put")
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
