@extends('Dashboard::master')
@section('breadcrumb')
    <li><a href="{{route('admin.orders.index')}}" title="سفارش">سفارش</a></li>
    <li><a href="#" title="ویرایش">ویرایش</a></li>
@endsection
@section('content')
    <div class="col-4 bg-white p-0 margin-top-30 margin-auto">
        <p class="box__title">ویرایش سفارش</p>
        <form action="{{route('admin.orders.update',$order->id)}}" method="post" class="padding-30">
            @csrf
            @method('patch')

            <x-select name="status" label="وضعیت">
                @foreach ($statuses as $status)
                    <option {{ $status == $order->status ? 'selected' : '' }} value="{{ $status }}">{{ __($status) }}</option>
                @endforeach
            </x-select>

            <x-input type="text" value="{{$order->tracking_code}}" name="tracking_code" placeholder="کد رهگیری" />

            <button type="submit" class="btn btn-yazdan">ویرایش</button>
        </form>
    </div>
@endsection
