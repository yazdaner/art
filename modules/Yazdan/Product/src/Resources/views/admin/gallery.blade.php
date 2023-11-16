@extends('Dashboard::master')
@section('breadcrumb')
<li><a href="{{route('admin.products.index')}}" title="محصول ها">محصول ها</a></li>
<li><a href="#" title="ویرایش گالری">ویرایش گالری</a></li>
@endsection
@section('content')
<div class="main-content users">
    <div class="row bg-white">
            <p class="box__title">ویرایش گالری محصول</p>

          <div class="container p-4">
            <form action="{{route('admin.products.addImagesGallery',$product->id)}}" method="post" class="padding-30"
                enctype="multipart/form-data">
                @csrf
                <x-file-upload name="images[]" placeholder="تصاویر محصول" multiple="true" />
                <button type="submit" class="btn btn-yazdan">ایجاد</button>
            </form>

           <div class="row">
            @foreach ($product->galleries as $image)
            <div class="col-md-3">
                <div class="card mb-3">

                        <a href="{{$image->getImage()}}" target="_blank">
                            <img src="{{$image->getImage(600)}}" class="card-img-top" alt="...">
                        </a>
                    <div class="card-footer text-center">
                        <a href="{{route('admin.gallery.delete',$image->id)}}" class="btn d-inline-block btn-danger mt-0">حذف</a>
                    </div>
                </div>
            </div>
            @endforeach
           </div>
          </div>
    </div>
</div>
@endsection
