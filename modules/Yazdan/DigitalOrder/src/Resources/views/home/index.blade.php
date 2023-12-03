@extends('Home::master')
@section('homeContent')
<div class="col-lg-8 col-12">
    <div class="card border-0 rounded shadow">
        <div class="card-body">
            <div class="myaccount-content address-content">
                <h3> پرداخت ها </h3>
                <div class="mt-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">عنوان</th>
                                <th scope="col">تاریخ پرداخت</th>
                                <th scope="col">مقدار پرداختی</th>
                                <th scope="col">شماره تراکنش</th>
                                <th scope="col">وضعیت پرداخت</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                            <tr>
                                <th scope="row">{{$payment->paymentable->product->title}} ({{$payment->paymentable->title}})</th>
                                <td>{{$payment->created_at}}</td>
                                <td>{{$payment->totalAmount}}</td>
                                <td>{{$payment->invoice_id}}</td>
                                <td>{{$payment->status}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
