@extends('User::front.master')

@section('content')
@include('Front::sections.navbar')

<section class="bg-home d-flex align-items-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-6 d-none d-md-block">
                <div class="me-lg-5">
                    <img src="/assets/images/user/recovery.svg" class="img-fluid d-block mx-auto" alt="">
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <div class="card shadow rounded border-0">
                    <div class="card-body">
                        <h4 class="card-title text-center"> بازیابی رمز عبور </h4>


                        <form class="login-form mt-4" method="get" action="{{route('password.sendVerifyCode')}}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <p class="text-muted">لطفا آدرس ایمیل خود را وارد کنید. لینکی برای ایجاد گذرواژه
                                        جدید از طریق ایمیل دریافت خواهید کرد.</p>
                                    <x-input-home name="email" label="ایمیل" required="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-mail fea icon-sm icons">
                                            <path
                                                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                            </path>
                                            <polyline points="22,6 12,13 2,6"></polyline>
                                        </svg>
                                    </x-input-home>
                                    <div class="form-group required">
                                        <div class="col-sm-offset-4 col-sm-6">
                                            <img src="{{captcha_src()}}" alt="کد امنیتی" title="کد امنیتی">
                                        </div>
                                    </div>
                                    <x-input-home name="captcha" label="کد امنیتی" required="true" id="captcha">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-key fea icon-sm icons">
                                            <path
                                                d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4">
                                            </path>
                                        </svg>
                                    </x-input-home>
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
                                            آورید؟</small> <a href="{{route('login')}}" class="text-dark fw-bold">وارد
                                            شوید
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
