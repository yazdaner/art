@extends('Home::master')
@section('homeContent')
<div class="col-lg-8 col-12">
    <div class="card border-0 rounded shadow">
        <div class="card-body">
            <div class="myaccount-content address-content">
                <h3> آدرس </h3>

                <div class="mt-4">
                    @include('Address::home.form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

