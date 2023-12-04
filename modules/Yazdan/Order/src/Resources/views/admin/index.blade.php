@extends('Dashboard::master')
@section('breadcrumb')
    <li><a href="#" title="بلاگ ها">بلاگ ها</a></li>
@endsection
@section('content')
<div class="main-content padding-0">
    <div class="row no-gutters">
        <div class="col-12 margin-left-10 margin-bottom-15 border-radius-3">
            <div class="justify-content-between box__title pb-4">
                <h3 class="btn">بلاگ ها</h3>
            </div>
            <div class="table__box">
                <table class="table">
                    <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>شناسه</th>
                            <th>بنر</th>
                            <th>عنوان</th>
                            <th>تاریخ خرید</th>
                            <th>مبلغ پرداختی</th>
                            <th>تعداد</th>
                            <th>شناسه پرداخت</th>
                            <th>نام کاربر</th>
                            <th>آدرس</th>
                            <th>وضعیت</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $key => $payment)
                            <tr role="row" class="">
                                <td><a href="">{{$payments->firstItem() + $key}}</a></td>
                                <td>
                                    <a href="{{$payment->paymentable->product->getImage()}}" target="_blank"><img src="{{$payment->paymentable->product->getImage(60)}}" class="profile_sm"></a>
                                </td>
                                <td>{{$payment->paymentable->product->title}} ({{$payment->paymentable->title}})</tf>
                                <td>{{verta($payment->created_at)}}</td>
                                <td>{{number_format($payment->totalAmount)}}</td>
                                <td>{{$payment->quantity}}</td>
                                <td>{{$payment->invoice_id}}</td>
                                <td>{{$payment->user->username}}</td>
                                @php
                                    $address = $payment->user->address;
                                @endphp
                                <td><a class="btn-show btn btn-yazdan" href="#rolesModal" rel="modal:open" onclick="showComment(event,'{{json_encode($address)}}','{{$address->province->name}}','{{$address->city->name}}')">نمایش</a></td>
                                <td>{{__($payment->order->status ?? '')}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @include("Order::admin.address")
            {{ $payments->links('pagination.admin') }}
        </div>
    </div>
</div>
@endsection
@section('style')
    <link rel="stylesheet" href="../panel/css/modal.css">
@endsection
@section('script')
<script src="../panel/js/modal.js"></script>
<script>
    function showComment(e,address,province,city){
        e.preventDefault();
        let data = JSON.parse(address);
        $("#ShowComment .name").text(data.name);
        $("#ShowComment .address").text(data.address);
        $("#ShowComment .phone").text(data.phone);
        $("#ShowComment .postal_code").text(data.postal_code);
        $("#ShowComment .province").text(province);
        $("#ShowComment .city").text(city);
    }
</script>
@endsection
