@extends('Home::master')
@section('homeContent')
<div class="col-lg-8 col-12">
    <div class="card border-0 rounded shadow">
        <div class="card-body">
            <div class="myaccount-content address-content">
                <h3>سفارش نقاشی</h3>
                <form action="{{ route('customer.orders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-md-6">
                            <x-input-home name="name" label="نام و نام خانوادگی">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                            </x-input-home>
                        </div>
                        <div class="col-md-6">
                            <x-input-home type="tel" name="phone" label="شماره تماس">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                            </x-input-home>
                        </div>

                        <div class="col-md-6">
                            <x-select-home name="size" label="ابعاد">
                                @foreach ($sizes as $size)
                                <option value="{{ $size }}">{{ __($size) }}</option>
                                @endforeach
                            </x-select-home>
                        </div>

                        <div class="col-md-6">
                            <x-select-home name="canvas" label="نوع بوم">
                                @foreach ($canvas_types as $canvas_type)
                                <option value="{{ $canvas_type }}">{{ __($canvas_type) }}</option>
                                @endforeach
                            </x-select-home>
                        </div>

                        <div class="col-md-6">
                            <x-select-home name="shape" label="شکل">
                                @foreach ($shapes as $shape)
                                <option value="{{ $shape }}">{{ __($shape) }}</option>
                                @endforeach
                            </x-select-home>
                        </div>

                        <div class="col-md-6">
                            <x-file-upload-home name="media" label="تصویر"/>
                        </div>

                        <div class="col-md-12">
                            <x-textarea-home name="description" label="توضیحات">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                            </x-textarea-home>
                        </div>

                        <x-checkbox-home :value="$invoicing" name="invoicing" label="ارسال فاکتور از طریق"/>

                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit"> ثبت سفارش</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
