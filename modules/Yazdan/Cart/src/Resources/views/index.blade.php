@extends('Front::master')
@section('content')

        <!-- Hero Start -->
        <section class="bg-half bg-light d-table w-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <div class="page-next-level">
                            <h4 class="title"> سبد خرید </h4>
                            <div class="page-next">
                                <nav aria-label="breadcrumb" class="d-inline-block">
                                    <ul class="breadcrumb bg-white rounded shadow mb-0">
                                        <li class="breadcrumb-item"><a href="index.html">لنـدریـک </a></li>
                                        <li class="breadcrumb-item"><a href="index-shop.html">فروشگاه </a></li>
                                        <li class="breadcrumb-item active" aria-current="page">سبد خرید </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div> <!--end container-->
        </section><!--end section-->
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
            <div class="col-12">
                <div class="table-responsive bg-white shadow">
                    <table class="table table-center table-padding mb-0">
                        <thead>
                            <tr>
                                <th class="border-bottom py-3" style="min-width:20px "></th>
                                <th class="border-bottom py-3" style="min-width: 300px;">محصول </th>
                                <th class="border-bottom text-center py-3" style="min-width: 160px;">قیمت </th>
                                <th class="border-bottom text-center py-3" style="min-width: 160px;">تعداد </th>
                                <th class="border-bottom text-center py-3" style="min-width: 160px;">مجموع </th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="shop-list">
                                <td class="h6"><a href="javascript:void(0)" class="text-danger">X</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="images/shop/product/s1.jpg" class="img-fluid avatar avatar-small rounded shadow" style="height:auto;" alt="">
                                        <h6 class="mb-0 ms-3">تی شرت </h6>
                                    </div>
                                </td>
                                <td class="text-center">250000 تومان</td>
                                <td class="text-center qty-icons">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="btn btn-icon btn-soft-primary minus">-</button>
                                    <input min="0" name="quantity" value="7" type="number" class="btn btn-icon btn-soft-primary qty-btn quantity">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="btn btn-icon btn-soft-primary plus">+</button>
                                </td>
                                <td class="text-center fw-bold">51000 تومان</td>
                            </tr>

                            <tr class="shop-list">
                                <td class="h6"><a href="javascript:void(0)" class="text-danger">X</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="images/shop/product/s3.jpg" class="img-fluid avatar avatar-small rounded shadow" style="height:auto;" alt="">
                                        <h6 class="mb-0 ms-3">ساعت مچی</h6>
                                    </div>
                                </td>
                                <td class="text-center">52000 تومان</td>
                                <td class="text-center qty-icons">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="btn btn-icon btn-soft-primary minus">-</button>
                                    <input min="0" name="quantity" value="1" type="number" class="btn btn-icon btn-soft-primary qty-btn quantity">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="btn btn-icon btn-soft-primary plus">+</button>
                                </td>
                                <td class="text-center fw-bold">22000 تومان</td>
                            </tr>

                            <tr class="shop-list">
                                <td class="h6"><a href="javascript:void(0)" class="text-danger">X</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="images/shop/product/s6.jpg" class="img-fluid avatar avatar-small rounded shadow" style="height:auto;" alt="">
                                        <h6 class="mb-0 ms-3">تی شرت </h6>
                                    </div>
                                </td>
                                <td class="text-center">16000 تومان</td>
                                <td class="text-center qty-icons">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="btn btn-icon btn-soft-primary minus">-</button>
                                    <input min="0" name="quantity" value="2" type="number" class="btn btn-icon btn-soft-primary qty-btn quantity">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="btn btn-icon btn-soft-primary plus">+</button>
                                </td>
                                <td class="text-center fw-bold">230 هزار تومان</td>
                            </tr>

                            <tr class="shop-list">
                                <td class="h6"><a href="javascript:void(0)" class="text-danger">X</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="images/shop/product/s10.jpg" class="img-fluid avatar avatar-small rounded shadow" style="height:auto;" alt="">
                                        <h6 class="mb-0 ms-3">عینک آفتابی </h6>
                                    </div>
                                </td>
                                <td class="text-center">26000 تومان</td>
                                <td class="text-center qty-icons">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="btn btn-icon btn-soft-primary minus">-</button>
                                    <input min="0" name="quantity" value="2" type="number" class="btn btn-icon btn-soft-primary qty-btn quantity">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="btn btn-icon btn-soft-primary plus">+</button>
                                </td>
                                <td class="text-center fw-bold">22000 تومان</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        <div class="row">
            <div class="col-lg-8 col-md-6 mt-4 pt-2">
                <a href="javascript:void(0)" class="btn btn-primary">خرید بیشتر </a>
                <a href="javascript:void(0)" class="btn btn-soft-primary ms-2">بروز رسانی سبد</a>
            </div>
            <div class="col-lg-4 col-md-6 ms-auto mt-4 pt-2">
                <div class="table-responsive bg-white rounded shadow">
                    <table class="table table-center table-padding mb-0">
                        <tbody>
                            <tr>
                                <td class="h6">مجموع </td>
                                <td class="text-center fw-bold">219000 تومان</td>
                            </tr>
                            <tr>
                                <td class="h6">مالیات </td>
                                <td class="text-center fw-bold">219000 تومان</td>
                            </tr>
                            <tr class="bg-light">
                                <td class="h6">مجموع </td>
                                <td class="text-center fw-bold">289000 تومان</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-4 pt-2 text-end">
                    <a href="shop-checkouts.html" class="btn btn-primary">ادامه به پرداخت </a>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End -->
@endsection
