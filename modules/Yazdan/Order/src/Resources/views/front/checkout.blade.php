@extends('Front::master')
@section('content')
<!-- Hero Start -->
<section class="bg-half bg-light d-table w-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="page-next-level">
                    <h4 class="title"> صندوق ها </h4>
                    <div class="page-next">
                        <nav aria-label="breadcrumb" class="d-inline-block">
                            <ul class="breadcrumb bg-white rounded shadow mb-0">
                                <li class="breadcrumb-item"><a href="index.html">لنـدریـک </a></li>
                                <li class="breadcrumb-item"><a href="index-shop.html">فروشگاه </a></li>
                                <li class="breadcrumb-item active" aria-current="page">صندوق ها </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>
<!--end section-->
<div class="position-relative">
    <div class="shape overflow-hidden text-white">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!-- Hero End -->

<!-- Start -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-6">
                <div class="rounded shadow-lg p-4">
                    <h5 class="mb-0">جزئیات صورتحساب :</h5>
                    <div class="mt-4">

                        @include('Address::front.form')

                    </div>
                </div>
            </div>
            <!--end col-->

            <div class="col-lg-5 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="rounded shadow-lg p-4 sticky-bar">
                    <div class="d-flex mb-4 justify-content-between">
                        <h5>{{Cart::getContent()->count()}} آیتم </h5>
                        <a href="{{route('cart.index')}}" class="text-muted h6">نمایش جزئیات</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-center table-padding mb-0">
                            <tbody>
                                <tr>
                                    <td class="h6 border-0">مجموع </td>
                                    <td class="text-end fw-bold border-0">{{ number_format( cartTotal() ) }} تومان</td>
                                </tr>
                                @php
                                $discountPrice = cartTotal() - \Cart::getTotal();
                                @endphp
                                @if ($discountPrice != 0)
                                <tr>
                                    <td class="h6 border-0">مبلغ تخفیف کالا ها</td>
                                    <td class="text-end fw-bold border-0">
                                        <span style="color: red">
                                            {{ number_format( $discountPrice ) }}
                                            تومان
                                        </span>
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <td class="h6">هزینه حمل و نقل</td>
                                    <td class="text-end fw-bold">{{number_format(cartTotalDeliveryAmount())}}</td>
                                </tr>
                                <tr class="bg-light">
                                    <td class="h5 fw-bold">مبلغ قابل پرداخت </td>
                                    <td class="text-end text-primary h4 fw-bold">{{number_format( \Cart::getTotal() +
                                        cartTotalDeliveryAmount() )}} تومان</td>
                                </tr>
                            </tbody>
                        </table>

                        <ul class="list-unstyled mt-4 mb-0">
                            <li>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <div class="form-check mb-0">
                                        <input class="form-check-input" checked type="radio" name="flexRadioDefault"
                                            id="banktransfer">
                                        <label class="form-check-label" for="banktransfer">پرداخت زرین پال</label>
                                    </div>
                                </div>
                            </li>

                        </ul>

                        <div class="mt-4 pt-2">
                            <div class="d-grid">
                                <a href="shop-checkouts.html" class="btn btn-primary">سفارش دهید</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>
<!--end section-->
<!-- End -->
@endsection
