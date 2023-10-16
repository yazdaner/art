@extends('User::front.master')

@section('content')
{{-- <div class="col-lg-5 col-md-7 col-sm-9 col-12 my-5 mx-auto">
    <div class="login-form">
        <h2 class="text-center">بازیابی گذرواژه</h2>

        <form action="{{ route('password.sendVerifyCode') }}" method="get">

            @csrf
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <x-inputHome type="text" name="email" label="ایمیل" />


            <button type="submit">بازیابی</button>
            <div class="mt-4">
                <a href="{{ route('login') }}" class="lost-your-password">صفحه ورود</a>
            </div>
        </form>

    </div>
</div> --}}
@include('Front::sections.navbar')

<section class="bg-home d-flex align-items-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-6">
                <div class="me-lg-5">
                    <img src="/assets/images/user/recovery.svg" class="img-fluid d-block mx-auto" alt="">
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <div class="card shadow rounded border-0">
                    <div class="card-body">
                        <h4 class="card-title text-center"> بازیابی رمز عبور </h4>


                        <form class="login-form mt-4" method="post" action="./forgot.html">
                            <input type="hidden" name="csrf"
                                value="bc8b0df96da468290c27538adfebef653ab2706f3528d78d3acf286cf25ccf11c5b15a2458913b8e">

                            <div class="row">
                                <div class="col-lg-12">
                                    <p class="text-muted">لطفا آدرس ایمیل خود را وارد کنید. لینکی برای ایجاد گذرواژه
                                        جدید از طریق ایمیل دریافت خواهید کرد.</p>
                                    <div class="mb-3">
                                        <label class="form-label">آدرس ایمیل <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <input type="email" class="form-control ps-5"
                                                placeholder="آدرس ایمیل خود را وارد کنید" name="email" required="">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <div class="col-sm-offset-4 col-sm-6">
                                            <img src="/inc/classes/simple-captcha/simple-php-captcha.php?_CAPTCHA&amp;t=0.05734200+1697282392&amp;mod=forgot"
                                                alt="کد امنیتی" title="کد امنیتی">
                                        </div>
                                    </div>

                                    <div class="form-group required mt-4">
                                        <label class="col-sm-4" for="captcha">کد امنیتی : </label>
                                        <div class="col-sm-6 mb-4">
                                            <input type="text" class="form-control" id="captcha" name="captcha"
                                                dir="ltr" required="">
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="d-grid">
                                        <button class="btn btn-primary">ارسال </button>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="mx-auto">
                                    <p class="mb-0 mt-3"><small class="text-dark me-2">رمز عبور خود را به خاطر می
                                            آورید؟</small> <a href="{{route('login')}}" class="text-dark fw-bold">وارد شوید
                                        </a></p>
                                </div>
                            </div>
                        </form>
                        <!--end col-->
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@include('Front::sections.footer')
@endsection
