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
                            <th>اسلاگ</th>
                            <th>دسته بندی</th>
                            <th>عملیات</th>
                            <th>عملیات</th>
                            <th>عملیات</th>
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
                                <td>{{$payment->created_at}}</td>
                                <td>{{$payment->totalAmount}}</td>
                                <td>{{$payment->invoice_id}}</td>
                                <td>{{$payment->user->username}}</td>
                                <td>{{$payment->user->address}}</td>
                                <td>
                                    {{-- <a href="" onclick="deleteItem(event,'{{route('admin.payments.destroy',$payment->id)}}')" class="item-delete mlg-15" title="حذف"></a>
                                    <a href="{{route('admin.payments.edit',$payment->id)}}" class="item-edit" title="ویرایش"></a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $payments->links('pagination.admin') }}
        </div>
    </div>
</div>
@endsection
