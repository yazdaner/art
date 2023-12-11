<!-- Footer Start -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
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
            <div class="col-lg-4 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <h5 class="text-light footer-head">صفحات مهم</h5>
                <ul class="list-unstyled footer-list mt-4">
                    <li>
                        <a href="{{route('courses')}}" class="text-foot"><i class="uil uil-angle-left-b me-1"></i> دوره های آموزشی
                        </a>
                    </li>
                    <li>
                        <a href="{{route('products')}}" class="text-foot"><i class="uil uil-angle-left-b me-1"></i> گالری محصولات
                        </a>
                    </li>
                    <li>
                        <a href="{{route('customer.orders.create')}}" class="text-foot"><i class="uil uil-angle-left-b me-1"></i> سفارش نقاشی
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
            <div class="col-lg-4 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <h5 class="text-light footer-head">جدیدترین مقالات</h5>
                <ul class="list-unstyled footer-list mt-4">
                   @foreach ($blogs as $blog)
                   <li>
                    <a href="{{$blog->path()}}" class="text-foot"><i class="uil uil-angle-left-b me-1"></i>{{$blog->title}}</a>
                    </li>
                   @endforeach
                </ul>
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
