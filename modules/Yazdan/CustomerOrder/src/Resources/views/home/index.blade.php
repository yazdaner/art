@extends('Home::master')
@section('homeContent')
<div class="col-lg-8 col-12">
    <div class="card border-0 rounded shadow">
        <div class="card-body">
            <div class="myaccount-content address-content">
              <div class="d-flex justify-content-between align-items-center">
                <h3>لیست سفارشات نقاشی</h3>
                <a class="btn btn-primary" href="{{route('customer.orders.create')}}">سفارش</a>
              </div>

            </div>
        </div>
    </div>
</div>
@endsection
