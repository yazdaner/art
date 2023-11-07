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
                <a href="{{route('about')}}" class="btn btn-soft-primary">بیشتر بدانید</a>
                <ul class="list-unstyled social-icon foot-social-icon mb-0 mt-4">
                    @include('Setting::front.social')
                </ul>
            </div>
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
                        <a href="{{route('contact')}}" class="text-foot"><i class="uil uil-angle-left-b me-1"></i> تماس
                            با
                            ما
                        </a>
                    </li>

                </ul>
            </div>
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
        </div>
    </div>
</footer>
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
        </div>
    </div>
</footer>
<!-- Footer End -->
