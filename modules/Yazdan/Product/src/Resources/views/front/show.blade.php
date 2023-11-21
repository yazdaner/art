@extends('Front::master')
@section('content')
<section class="bg-half bg-light d-table w-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="page-next-level">
                    <h2>{{$product->title}}</h2>
                    <div class="page-next">
                        <nav aria-label="breadcrumb" class="d-inline-block">
                            <ul class="breadcrumb bg-white rounded shadow mb-0">
                                <li class="breadcrumb-item"><a href="/">صفحه اصلی</a></li>
                                <li class="breadcrumb-item"><a href="{{route('products')}}">دوره ها</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$product->title}}</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section pb-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5">
                <div class="tns-outer" id="tns1-ow">
                    <div id="tns1-mw" class="tns-ovh">
                        <div class="tns-inner" id="tns1-iw">
                            <div class="tiny-single-item  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal"
                                id="tns1" style="transform: translate3d(-80%, 0px, 0px);">
                                <div class="tiny-slide tns-item" id="tns1-item0" aria-hidden="true" tabindex="-1">
                                    <img src="{{$product->getImage(600)}}" class="img-fluid p-4 rounded" alt="">
                                </div>
                                @foreach ($product->galleries as $gallery)
                                <div class="tiny-slide tns-item" id="tns1-item0" aria-hidden="true" tabindex="-1">
                                    <img src="{{$gallery->getImage(600)}}" class="img-fluid p-4 rounded" alt="">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->

            <div class="col-md-7 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="section-title ms-md-4">
                    <h4 class="title">{{$product->title}}</h4>
                    <div class="variation-price">
                        @if($product->quantity_check)
                        @if($product->sale_check)
                            <span class="new">
                                {{ number_format($product->sale_check->price2) }}
                                تومان
                            </span>
                            <span class="old">
                                {{ number_format($product->sale_check->price) }}
                                تومان
                            </span>
                        @else
                            <span class="mainPrice">
                                {{ number_format($product->price_check->price) }}
                                تومان
                            </span>
                        @endif
                    @else
                        <div class="not-in-stock">
                            <p class="">ناموجود</p>
                        </div>
                    @endif
                    </div>

                    <h5 class="mt-4 py-2">بررسی:</h5>
                    <div class="description">
                        {!! $product->body !!}
                    </div>
                    <div class="row mt-4 pt-2 d-flex align-items-center">
                        <div class="col-lg-6 col-12">
                            <div class="">
                                <label class="form-label">نوع : </label>
                                <select class="form-control variation-select">
                                    @foreach ($variations as $variation)
                                    <option
                                        value="{{ json_encode($variation->only(['id' , 'quantity','is_sale' , 'price2' , 'price'])) }}">
                                        {{$variation->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--end col-->

                        <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                            <div class="shop-list">
                                <label class="form-label">تعداد : </label>

                                <div class="qty-icons ms-3">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                        class="btn btn-icon btn-soft-primary minus">-</button>

                                    <input min="1" max="1" name="quantity" value="1" type="number"
                                        class="quantity-input btn btn-icon btn-soft-primary qty-btn quantity">

                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                        class="btn btn-icon btn-soft-primary plus">+</button>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->

                    <div class="mt-4 pt-2">
                        <a href="shop-cart.html" class="btn btn-primary">افزودن به سبد</a>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>

    {{-- comment --}}
    <div class="mt-5 px-5">
        <div class="px-5">
            @include('Comment::front.index',["commentable" => $product])
        </div>
    </div>
    <div class="container mt-100 mt-60">
        <div class="row">
            <div class="col-12">
                <h5 class="mb-0">محصولات اخیر</h5>
            </div>
            <!--end col-->

            <div class="col-12 mt-4">
                <div class="tns-outer" id="tns2-ow">
                    <div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide <span
                            class="current">5</span> of 8</div>
                    <div id="tns2-mw" class="tns-ovh">
                        <div class="tns-inner" id="tns2-iw">
                            <div class="tiny-four-item  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal"
                                id="tns2" style="transform: translate3d(-50%, 0px, 0px);">
                                <div class="tiny-slide tns-item" id="tns2-item0" aria-hidden="true" tabindex="-1">
                                    <div class="card shop-list border-0 position-relative m-2">
                                        <ul class="label list-unstyled mb-0">
                                            <li><a href="javascript:void(0)"
                                                    class="badge badge-link rounded-pill bg-danger">داغ </a></li>
                                        </ul>
                                        <div class="shop-image position-relative overflow-hidden rounded shadow">
                                            <a href="shop-product-detail.html"><img src="images/shop/product/s1.jpg"
                                                    class="img-fluid" alt=""></a>
                                            <a href="shop-product-detail.html" class="overlay-work">
                                                <img src="images/shop/product/s-1.jpg" class="img-fluid" alt="">
                                            </a>
                                            <ul class="list-unstyled shop-icons">
                                                <li><a href="javascript:void(0)"
                                                        class="btn btn-icon btn-pills btn-soft-danger"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-heart icons">
                                                            <path
                                                                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                            </path>
                                                        </svg></a></li>
                                                <li class="mt-2"><a href="shop-product-detail.html"
                                                        class="btn btn-icon btn-pills btn-soft-primary"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-eye icons">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg></a></li>
                                                <li class="mt-2"><a href="shop-cart.html"
                                                        class="btn btn-icon btn-pills btn-soft-warning"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-shopping-cart icons">
                                                            <circle cx="9" cy="21" r="1"></circle>
                                                            <circle cx="20" cy="21" r="1"></circle>
                                                            <path
                                                                d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                            </path>
                                                        </svg></a></li>
                                            </ul>
                                        </div>
                                        <div class="card-body content pt-4 p-2">
                                            <a href="shop-product-detail.html" class="text-dark product-name h6">تی شرت
                                                بردان </a>
                                            <div class="d-flex justify-content-between mt-1">
                                                <h6 class="text-muted small fst-italic mb-0 mt-1">16000 تومان<del
                                                        class="text-danger ms-2">21000 تومان</del> </h6>
                                                <ul class="list-unstyled text-warning mb-0">
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tiny-slide tns-item" id="tns2-item1" aria-hidden="true" tabindex="-1">
                                    <div class="card shop-list border-0 position-relative m-2">
                                        <div class="shop-image position-relative overflow-hidden rounded shadow">
                                            <a href="shop-product-detail.html"><img src="images/shop/product/s2.jpg"
                                                    class="img-fluid" alt=""></a>
                                            <a href="shop-product-detail.html" class="overlay-work">
                                                <img src="images/shop/product/s-2.jpg" class="img-fluid" alt="">
                                            </a>
                                            <ul class="list-unstyled shop-icons">
                                                <li><a href="javascript:void(0)"
                                                        class="btn btn-icon btn-pills btn-soft-danger"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-heart icons">
                                                            <path
                                                                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                            </path>
                                                        </svg></a></li>
                                                <li class="mt-2"><a href="shop-product-detail.html"
                                                        class="btn btn-icon btn-pills btn-soft-primary"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-eye icons">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg></a></li>
                                                <li class="mt-2"><a href="shop-cart.html"
                                                        class="btn btn-icon btn-pills btn-soft-warning"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-shopping-cart icons">
                                                            <circle cx="9" cy="21" r="1"></circle>
                                                            <circle cx="20" cy="21" r="1"></circle>
                                                            <path
                                                                d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                            </path>
                                                        </svg></a></li>
                                            </ul>
                                        </div>
                                        <div class="card-body content pt-4 p-2">
                                            <a href="shop-product-detail.html" class="text-dark product-name h6">کیسه
                                                خرید </a>
                                            <div class="d-flex justify-content-between mt-1">
                                                <h6 class="text-muted small fst-italic mb-0 mt-1">21000 تومان <del
                                                        class="text-danger ms-2">25000 تومان</del> </h6>
                                                <ul class="list-unstyled text-warning mb-0">
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>
@endsection

