@extends('Home::master')
@section('homeContent')
<div class="col-lg-8 col-12">
    <div class="card border-0 rounded shadow">
        <div class="card-body">
            <div class="myaccount-content address-content">
                <h3>دوره های شما</h3>
                <div class="mt-4">
                <div class="table-responsive">
                    <table class="table table-center">
                        <thead>
                            <tr>
                                <th scope="col">عنوان</th>
                                <th scope="col">مبلغ پرداختی</th>
                                <th scope="col">تاریخ پرداخت</th>
                                <th scope="col">لایسنس اسپات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($digitalOrders as $digitalOrder)
                            <tr>
                                <td>{{$digitalOrder->payment->paymentable->title}}</td>
                                <td>{{number_format($digitalOrder->payment->totalAmount)}}</td>
                                <td>{{verta($digitalOrder->created_at)->format('Y/n/j H:i')}}</td>
                                <td>{{$digitalOrder->key}}</td>
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
