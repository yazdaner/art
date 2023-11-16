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
                <div class="tns-outer" id="tns1-ow"><div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide <span class="current">5</span>  of 5</div><div id="tns1-mw" class="tns-ovh"><div class="tns-inner" id="tns1-iw"><div class="tiny-single-item  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal" id="tns1" style="transform: translate3d(-80%, 0px, 0px);">
                    <div class="tiny-slide tns-item" id="tns1-item0" aria-hidden="true" tabindex="-1"><img src="images/shop/product/single-2.jpg" class="img-fluid rounded" alt=""></div>
                    <div class="tiny-slide tns-item" id="tns1-item1" aria-hidden="true" tabindex="-1"><img src="images/shop/product/single-3.jpg" class="img-fluid rounded" alt=""></div>
                    <div class="tiny-slide tns-item" id="tns1-item2" aria-hidden="true" tabindex="-1"><img src="images/shop/product/single-4.jpg" class="img-fluid rounded" alt=""></div>
                    <div class="tiny-slide tns-item" id="tns1-item3" aria-hidden="true" tabindex="-1"><img src="images/shop/product/single-5.jpg" class="img-fluid rounded" alt=""></div>
                    <div class="tiny-slide tns-item tns-slide-active" id="tns1-item4"><img src="images/shop/product/single-6.jpg" class="img-fluid rounded" alt=""></div>
                </div></div></div><div class="tns-nav" aria-label="Carousel Pagination"><button type="button" data-nav="0" aria-controls="tns1" style="" aria-label="Carousel Page 1" class="" tabindex="-1"></button><button type="button" data-nav="1" aria-controls="tns1" style="" aria-label="Carousel Page 2" class="" tabindex="-1"></button><button type="button" data-nav="2" aria-controls="tns1" style="" aria-label="Carousel Page 3" class="" tabindex="-1"></button><button type="button" data-nav="3" aria-controls="tns1" style="" aria-label="Carousel Page 4" class="" tabindex="-1"></button><button type="button" data-nav="4" aria-controls="tns1" style="" aria-label="Carousel Page 5 (Current Slide)" class="tns-nav-active"></button></div></div>
            </div><!--end col-->

            <div class="col-md-7 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="section-title ms-md-4">
                    <h4 class="title">{{$product->title}}</h4>
                    <h5 class="text-muted">21000 تومان <del class="text-danger ms-2">25000 تومان</del> </h5>

                    <h5 class="mt-4 py-2">بررسی:</h5>
                    <div class="description">
                        {!! $product->body !!}
                    </div>

                    <div class="row mt-4 pt-2">
                        <div class="col-lg-6 col-12">
                            <div class="d-flex align-items-center">
                                <h6 class="mb-0">سایز شما: </h6>
                                <ul class="list-unstyled mb-0 ms-3">
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-soft-primary">S</a></li>
                                    <li class="list-inline-item ms-1"><a href="javascript:void(0)" class="btn btn-icon btn-soft-primary">M</a></li>
                                    <li class="list-inline-item ms-1"><a href="javascript:void(0)" class="btn btn-icon btn-soft-primary">L</a></li>
                                    <li class="list-inline-item ms-1"><a href="javascript:void(0)" class="btn btn-icon btn-soft-primary">XL</a></li>
                                </ul>
                            </div>
                        </div><!--end col-->

                        <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                            <div class="d-flex shop-list align-items-center">
                                <h6 class="mb-0">تعداد: </h6>
                                <div class="qty-icons ms-3">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="btn btn-icon btn-soft-primary minus">-</button>
                                    <input min="0" name="quantity" value="0" type="number" class="btn btn-icon btn-soft-primary qty-btn quantity">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="btn btn-icon btn-soft-primary plus">+</button>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->

                    <div class="mt-4 pt-2">
                        <a href="javascript:void(0)" class="btn btn-primary">اکنون بخرید </a>
                        <a href="shop-cart.html" class="btn btn-soft-primary ms-2">افزودن به سبد</a>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->

    <div class="container mt-100 mt-60">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-pills shadow flex-column flex-sm-row d-md-inline-flex mb-0 p-1 bg-white rounded position-relative overflow-hidden" id="pills-tab" role="tablist">
                    <li class="nav-item m-1">
                        <a class="nav-link py-2 px-5 active rounded" id="description-data" data-bs-toggle="pill" href="#description" role="tab" aria-controls="description" aria-selected="false">
                            <div class="text-center">
                                <h6 class="mb-0">توضیحات </h6>
                            </div>
                        </a><!--end nav link-->
                    </li><!--end nav item-->

                    <li class="nav-item m-1">
                        <a class="nav-link py-2 px-5 rounded" id="additional-info" data-bs-toggle="pill" href="#additional" role="tab" aria-controls="additional" aria-selected="false">
                            <div class="text-center">
                                <h6 class="mb-0">اطلاعات تکمیلی</h6>
                            </div>
                        </a><!--end nav link-->
                    </li><!--end nav item-->

                    <li class="nav-item m-1">
                        <a class="nav-link py-2 px-5 rounded" id="review-comments" data-bs-toggle="pill" href="#review" role="tab" aria-controls="review" aria-selected="false">
                            <div class="text-center">
                                <h6 class="mb-0">نظرات </h6>
                            </div>
                        </a><!--end nav link-->
                    </li><!--end nav item-->
                </ul>

                <div class="tab-content mt-5" id="pills-tabContent">
                    <div class="card border-0 tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-data">
                        <p class="text-muted mb-0">به دلیل استفاده گسترده از آن به عنوان متن پر کننده برای طرح بندی, غیرقابل خواندن از اهمیت زیادی برخوردار است:ادراک انسان برای شناسایی الگوها و تکرارهای خاص در متن تنظیم شده است. اگر توزیع حروف و کلمات تصادفی باشد ، خواننده از قضاوت بی طرف در مورد تأثیر بصری و خوانایی انواع حروف (تایپوگرافی) یا توزیع متن در صفحه (طرح یا منطقه نوع) منحرف نخواهد شد. . به همین دلیل ، متن ساختگی معمولاً از یک سری کلمات یا هجاهای کم و بیش تصادفی تشکیل شده است.</p>
                    </div>

                    <div class="card border-0 tab-pane fade" id="additional" role="tabpanel" aria-labelledby="additional-info">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td style="width: 100px;">رنگ </td>
                                    <td class="text-muted">قرمز ، سفید ، سیاه ، نارنجی</td>
                                </tr>

                                <tr>
                                    <td>متریال </td>
                                    <td class="text-muted">پنبه </td>
                                </tr>

                                <tr>
                                    <td>سایزها </td>
                                    <td class="text-muted">S, M, L, XL, XXL</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card border-0 tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-comments">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="media-list list-unstyled mb-0">
                                    <li>
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <a class="pe-3" href="#">
                                                    <img src="images/client/01.jpg" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
                                                </a>
                                                <div class="flex-1 commentor-detail">
                                                    <h6 class="mb-0"><a href="javascript:void(0)" class="text-dark media-heading">لورنزو پیترسون</a></h6>
                                                    <small class="text-muted">اردیبهشت 1400 - ساعت 14:40 بعد ظهر</small>
                                                </div>
                                            </div>
                                            <ul class="list-unstyled mb-0">
                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                            </ul>
                                        </div>
                                        <div class="mt-3">
                                            <p class="text-muted fst-italic p-3 bg-light rounded">" محصول عالی هست "</p>
                                        </div>
                                    </li>

                                    <li class="mt-4">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <a class="pe-3" href="#">
                                                    <img src="images/client/02.jpg" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
                                                </a>
                                                <div class="flex-1 commentor-detail">
                                                    <h6 class="mb-0"><a href="javascript:void(0)" class="media-heading text-dark">تامی کاماچو</a></h6>
                                                    <small class="text-muted">اردیبهشت 1400 - ساعت 15:40 بعد ظهر</small>
                                                </div>
                                            </div>
                                            <ul class="list-unstyled mb-0">
                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                <li class="list-inline-item"><i class="mdi mdi-star-outline text-warning"></i></li>
                                            </ul>
                                        </div>
                                        <div class="mt-3">
                                            <p class="text-muted fst-italic p-3 bg-light rounded mb-0">" خوبه "</p>
                                        </div>
                                    </li>
                                </ul>
                            </div><!--end col-->

                            <div class="col-lg-6 mt-4 mt-lg-0 pt-2 pt-lg-0">
                                <form class="ms-lg-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5>اضافه کردن نظر:</h5>
                                        </div>
                                        <div class="col-12 mt-4">
                                        <div class="col-md-12 mt-3">
                                            <div class="mb-3">
                                                <label class="form-label">نظر شما:</label>
                                                <div class="form-icon position-relative">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle fea icon-sm icons"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                                    <textarea id="message" placeholder="کامنت شما" rows="5" name="message" class="form-control ps-5" required=""></textarea>
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">نام  <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                                    <input id="name" name="name" type="text" placeholder="نام" class="form-control ps-5" required="">
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">ایمیل شما <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail fea icon-sm icons"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                                    <input id="email" type="email" placeholder="ایمیل" name="email" class="form-control ps-5" required="">
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-md-12">
                                            <div class="send d-grid">
                                                <button type="submit" class="btn btn-primary">ارسال </button>
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form><!--end form-->
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </div>
            </div>
        </div>
    </div><!--end container-->

    <div class="container mt-100 mt-60">
        <div class="row">
            <div class="col-12">
                <h5 class="mb-0">محصولات اخیر</h5>
            </div><!--end col-->

            <div class="col-12 mt-4">
                <div class="tns-outer" id="tns2-ow"><div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide <span class="current">5</span>  of 8</div><div id="tns2-mw" class="tns-ovh"><div class="tns-inner" id="tns2-iw"><div class="tiny-four-item  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal" id="tns2" style="transform: translate3d(-50%, 0px, 0px);">
                    <div class="tiny-slide tns-item" id="tns2-item0" aria-hidden="true" tabindex="-1">
                        <div class="card shop-list border-0 position-relative m-2">
                            <ul class="label list-unstyled mb-0">
                                <li><a href="javascript:void(0)" class="badge badge-link rounded-pill bg-danger">داغ </a></li>
                            </ul>
                            <div class="shop-image position-relative overflow-hidden rounded shadow">
                                <a href="shop-product-detail.html"><img src="images/shop/product/s1.jpg" class="img-fluid" alt=""></a>
                                <a href="shop-product-detail.html" class="overlay-work">
                                    <img src="images/shop/product/s-1.jpg" class="img-fluid" alt="">
                                </a>
                                <ul class="list-unstyled shop-icons">
                                    <li><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-soft-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart icons"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></a></li>
                                    <li class="mt-2"><a href="shop-product-detail.html" class="btn btn-icon btn-pills btn-soft-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye icons"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a></li>
                                    <li class="mt-2"><a href="shop-cart.html" class="btn btn-icon btn-pills btn-soft-warning"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart icons"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg></a></li>
                                </ul>
                            </div>
                            <div class="card-body content pt-4 p-2">
                                <a href="shop-product-detail.html" class="text-dark product-name h6">تی شرت بردان  </a>
                                <div class="d-flex justify-content-between mt-1">
                                    <h6 class="text-muted small fst-italic mb-0 mt-1">16000 تومان<del class="text-danger ms-2">21000 تومان</del> </h6>
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
                                <a href="shop-product-detail.html"><img src="images/shop/product/s2.jpg" class="img-fluid" alt=""></a>
                                <a href="shop-product-detail.html" class="overlay-work">
                                    <img src="images/shop/product/s-2.jpg" class="img-fluid" alt="">
                                </a>
                                <ul class="list-unstyled shop-icons">
                                    <li><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-soft-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart icons"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></a></li>
                                    <li class="mt-2"><a href="shop-product-detail.html" class="btn btn-icon btn-pills btn-soft-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye icons"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a></li>
                                    <li class="mt-2"><a href="shop-cart.html" class="btn btn-icon btn-pills btn-soft-warning"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart icons"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg></a></li>
                                </ul>
                            </div>
                            <div class="card-body content pt-4 p-2">
                                <a href="shop-product-detail.html" class="text-dark product-name h6">کیسه خرید </a>
                                <div class="d-flex justify-content-between mt-1">
                                    <h6 class="text-muted small fst-italic mb-0 mt-1">21000 تومان <del class="text-danger ms-2">25000 تومان</del> </h6>
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

                </div></div></div><div class="tns-nav" aria-label="Carousel Pagination"><button type="button" data-nav="0" aria-controls="tns2" style="" aria-label="Carousel Page 1" class="" tabindex="-1"></button><button type="button" data-nav="1" aria-controls="tns2" style="" aria-label="Carousel Page 2" class="" tabindex="-1"></button><button type="button" data-nav="2" aria-controls="tns2" style="" aria-label="Carousel Page 3" class="" tabindex="-1"></button><button type="button" data-nav="3" aria-controls="tns2" style="" aria-label="Carousel Page 4" class="" tabindex="-1"></button><button type="button" data-nav="4" aria-controls="tns2" style="" aria-label="Carousel Page 5 (Current Slide)" class="tns-nav-active"></button><button type="button" data-nav="5" tabindex="-1" aria-controls="tns2" style="" aria-label="Carousel Page 6"></button><button type="button" data-nav="6" tabindex="-1" aria-controls="tns2" style="" aria-label="Carousel Page 7"></button><button type="button" data-nav="7" tabindex="-1" aria-controls="tns2" style="" aria-label="Carousel Page 8"></button></div></div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->


</section>
@endsection
