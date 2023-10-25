<!-- Footer Start -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                <a href="#" class="logo-footer">
                    <img src="/assets/images/logo-light.png" height="24" alt="" />
                </a>
                <p class="mt-4">
                    {{$setting->description}}
                </p>
                <a href="/about.html" class="btn btn-soft-primary">بیشتر بدانید</a>
                <ul class="list-unstyled social-icon foot-social-icon mb-0 mt-4">



                    @if ($setting->facebook)
                    <li class="list-inline-item"><a href="{{$setting->facebook}}" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                @endif

                @if ($setting->instagram)
                    <li class="list-inline-item"><a href="{{$setting->instagram}}" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                @endif

                @if ($setting->twitter)
                    <li class="list-inline-item"><a href="{{$setting->twitter}}" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                @endif

                @if ($setting->linkedin)
                    <li class="list-inline-item"><a href="{{$setting->linkedin}}" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                @endif

                @if ($setting->youtube)
                    <li class="list-inline-item"><a href="{{$setting->youtube}}" class="rounded"><i data-feather="youtube" class="fea icon-sm fea-social"></i></a></li>
                @endif

                @if ($setting->whatsapp)
                    <li class="list-inline-item"><a href="{{$setting->whatsapp}}" class="rounded p-top-2"><i class="bi bi-whatsapp"></i></a></li>
                @endif

                @if ($setting->telegram)
                    <li class="list-inline-item"><a href="{{$setting->telegram}}" class="rounded p-top-2"><i class="bi bi-telegram"></i></a></li>
                @endif

                </ul>
                <!--end icon-->
            </div>
            <!--end col-->

            <div class="col-lg-3 col-md-3 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <h5 class="text-light footer-head">دسترسی سریع</h5>
                <ul class="list-unstyled footer-list mt-4">
                    <li>
                        <a href="#" class="text-foot"><i class="uil uil-angle-left-b me-1"></i> شیوه ثبت سفارش
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-foot"><i class="uil uil-angle-left-b me-1"></i> پرسش های متداول
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-foot"><i class="uil uil-angle-left-b me-1"></i> پرطرفدارترین دوره
                        </a>
                    </li>
                    <li>
                        <a href="./contact.html" class="text-foot"><i class="uil uil-angle-left-b me-1"></i> تماس با
                            ما
                        </a>
                    </li>

                </ul>
            </div>
            <!--end col-->

            <div class="col-lg-3 col-md-3 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <h5 class="text-light footer-head">جدیدترین دوره ها</h5>
                <ul class="list-unstyled footer-list mt-4">
                    <li>
                        <a href="./course.html" class="text-foot"><i class="uil uil-angle-left-b me-1"></i> دوره رنگ
                            روغن </a>
                    </li>
                    <li>
                        <a href="./course.html" class="text-foot"><i class="uil uil-angle-left-b me-1"></i> دوره
                            طراحی مقدماتی </a>
                    </li>
                    <li>
                        <a href="./course.html" class="text-foot"><i class="uil uil-angle-left-b me-1"></i> دوره
                            طراحی پیشرفته </a>
                    </li>
                    <li>
                        <a href="./course.html" class="text-foot"><i class="uil uil-angle-left-b me-1"></i> دوره
                            دیجیتال آرت </a>
                    </li>
                </ul>
            </div>
            <!--end col-->

            <div class="col-lg-3 col-md-3 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <h5 class="text-light footer-head">خبرنامه</h5>
                <p class="mt-4">
                    ایمیل خود را وارد کنید تا اخبار دوره‌ها وجدیدترین آثار هنری را برای شما ارسال کنیم.
                </p>
                <form method="post" action="https://atabakart.com/main">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="foot-subscribe mb-3">
                                <label class="form-label">ایمیل خود را بنویسید
                                    <span class="text-danger">*</span></label>
                                <div class="form-icon position-relative">
                                    <i data-feather="mail" class="fea icon-sm icons"></i>
                                    <input type="email" name="email2" value="" id="emailsubscribe"
                                        class="form-control ps-5 rounded" placeholder="ایمیل شما: " required />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="d-grid">
                                <input type="submit" id="submitsubscribe" name="send" class="btn btn-soft-primary"
                                    value="ارسال" />
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</footer>
<!--end footer-->
<footer class="footer footer-bar">
    <div class="container text-center">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="text-sm-start">
                    <p class="mb-0">
                        ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        {{$setting->copyright}}
                    </p>
                </div>
            </div>
            <!--end col-->

            <div class="col-sm-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <ul class="list-unstyled text-sm-end mb-0">
                    <li class="list-inline-item">
                        <a href="javascript:void(0)"><img src="/assets/images/payments/american-ex.png"
                                class="avatar avatar-ex-sm" title="آمریکن اکسپرس" alt="" /></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript:void(0)"><img src="/assets/images/payments/discover.png"
                                class="avatar avatar-ex-sm" title="کشف کردن" alt="" /></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript:void(0)"><img src="/assets/images/payments/master-card.png"
                                class="avatar avatar-ex-sm" title="مستر کارت" alt="" /></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript:void(0)"><img src="/assets/images/payments/paypal.png"
                                class="avatar avatar-ex-sm" title="پی پال" alt="" /></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript:void(0)"><img src="/assets/images/payments/visa.png"
                                class="avatar avatar-ex-sm" title="ویزا" alt="" /></a>
                    </li>
                </ul>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</footer>
<!--end footer-->
<!-- Footer End -->
