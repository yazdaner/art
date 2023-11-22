@extends("Dashboard::master")
@section('breadcrumb')
<li><a href="#" title="ویرایش تنظیمات">ویرایش تنظیمات</a></li>
@endsection
@section("content")
  <div class="main-content">
    <div class="col-12 bg-white">
        <p class="box__title">ویرایش تنظیمات</p>
        <form action="{{ route("admin.delivery.update", $delivery->id) }}" method="post" class="padding-30" enctype="multipart/form-data">
            @csrf
            @method("put")
            <x-input type="text" placeholder="تلفن" name="telephone" value="{{ $delivery->telephone }}"/>
            <x-input type="text" placeholder="ایمیل" name="email" value="{{ $delivery->email }}"/>
            <x-input type="text" placeholder="آدرس" name="address" value="{{ $delivery->address }}"/>
            <x-input type="text" placeholder="توضیحات" name="description" value="{{ $delivery->description }}"/>
            <x-input type="text" placeholder="کپی رایت" name="copyright" value="{{ $delivery->copyright }}"/>
            <x-input type="text" placeholder="اینستاگرام" name="instagram" value="{{ $delivery->instagram }}"/>
            <x-input type="text" placeholder="تلگرام" name="telegram" value="{{ $delivery->telegram }}"/>
            <x-input type="text" placeholder="فیسبوک" name="facebook" value="{{ $delivery->facebook }}"/>
            <x-input type="text" placeholder="واتساپ" name="whatsapp" value="{{ $delivery->whatsapp }}"/>
            <x-input type="text" placeholder="یوتیوب" name="youtube" value="{{ $delivery->youtube }}"/>
            <x-input type="text" placeholder="لینکدین" name="linkedin" value="{{ $delivery->linkedin }}"/>
            <x-input type="text" placeholder="توییتر" name="twitter" value="{{ $delivery->twitter }}"/>
            <button type="submit" class="btn btn-yazdan">بروزرسانی</button>
        </form>
    </div>
  </div>
@endsection
