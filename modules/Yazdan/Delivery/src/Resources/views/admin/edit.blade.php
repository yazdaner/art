@extends("Dashboard::master")
@section('breadcrumb')
<li><a href="#" title="ویرایش هزینه ارسال">ویرایش هزینه ارسال</a></li>
@endsection
@section("content")
  <div class="main-content">
    <div class="col-12 bg-white">
        <p class="box__title">ویرایش هزینه ارسال</p>
        <form action="{{ route("admin.delivery.update", $delivery->id) }}" method="post" class="padding-30">
            @csrf
            @method("put")
            <x-input type="text" placeholder="هزینه ارسال" name="delivery_amount" value="{{ $delivery->delivery_amount }}"/>
            <x-input type="text" placeholder="هزینه ارسال به ازای هر محصول" name="delivery_amount_per_product" value="{{ $delivery->delivery_amount_per_product }}"/>
            <button type="submit" class="btn btn-yazdan">بروزرسانی</button>
        </form>
    </div>
  </div>
@endsection
