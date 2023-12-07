@extends('Home::master')
@section('homeContent')
<div class="col-lg-8 col-12">
    <div class="card border-0 rounded shadow">
        <div class="card-body">
            <div class="myaccount-content address-content">
                <h3>محصولات خریداری شده</h3>
                <div class="mt-4">
                    <div class="table-responsive">
                        <table class="table table-center">
                            <thead>
                                <tr>
                                    <th scope="col">عنوان</th>
                                    <th scope="col">مقدار پرداختی</th>
                                    <th scope="col">شماره تراکنش</th>
                                    <th scope="col">وضعیت پرداخت</th>
                                    <th scope="col">تاریخ پرداخت</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $payment)
                                <tr>
                                    <th scope="row">{{$payment->paymentable->product->title ??
                                        $payment->paymentable->title}}</th>
                                    <td>{{number_format($payment->totalAmount)}}</td>
                                    <td>{{$payment->invoice_id}}</td>
                                    <td>{{__($payment->status)}}</td>
                                    <td>{{verta($payment->created_at)->format('Y/n/j H:i')}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
