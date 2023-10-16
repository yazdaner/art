@extends('User::front.master')
@section('content')
{{-- <div class="col-lg-5 col-md-7 col-sm-9 col-12 mx-auto my-5">
    <div class="login-form">
        <h2 class="text-center">ثبت نام کاربران</h2>

        <form action="{{ route('register') }}" method="post">

            @csrf

            <x-inputHome type="text" name="username" label="نام کاربری *" />
            <x-inputHome type="text" name="email" label="ایمیل *" />
            <x-inputHome type="text" name="mobile" label="موبایل" />
            <x-inputHome type="password" name="password" label="گذرواژه *" />
            <x-inputHome type="password" name="password_confirmation" label="تایید رمز عبور *" />

            <span class="rules">رمز عبور باید حداقل ۶ کاراکتر و ترکیبی از حروف بزرگ، حروف کوچک، اعداد و کاراکترهای
                غیر الفبا مانند !@#$%^&*() باشد.</span>

            <button type="submit">ثبت نام</button>

            <div class="mt-4">
                <a href="{{ route('login') }}" class="lost-your-password">صفحه ورود</a>
            </div>
        </form>
    </div>
</div> --}}

@include('Front::sections.navbar')
<section class="bg-auth-home d-table w-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-6">
                <div class="me-lg-5">
                    <img src="/assets/images/user/signup.svg" class="img-fluid d-block mx-auto" alt="">
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <div class="card shadow rounded border-0">
                    <div class="card-body">
                        <h4 class="card-title text-center">ثبت نام </h4>

                        <form class="login-form mt-4" method="post" action="{{route('register')}}">
                            <input type="hidden" name="csrf"
                                value="ad5e4f5a15764cb6250b8c928140725bf2a4de4f437a3b506e16f3b6d240ad2ba9a538d2268f756e">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">نام و نام خانوادگی <span
                                                class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-user fea icon-sm icons">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                            <input type="text" class="form-control ps-5"
                                                placeholder="نام و نام خانوادگی " name="name" required="">
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">ایمیل <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-mail fea icon-sm icons">
                                                <path
                                                    d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                                </path>
                                                <polyline points="22,6 12,13 2,6"></polyline>
                                            </svg>
                                            <input type="email" class="form-control ps-5" placeholder="ایمیل"
                                                name="email" required="">
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">موبایل<span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-user fea icon-sm icons">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                            <input type="text" class="form-control ps-5" placeholder="موبایل"
                                                name="mobile" required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">رمز عبور <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-key fea icon-sm icons">
                                                <path
                                                    d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4">
                                                </path>
                                            </svg>
                                            <input type="password" class="form-control ps-5" placeholder="رمز عبور "
                                                name="password" required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">تکرار رمز عبور<span
                                                class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-key fea icon-sm icons">
                                                <path
                                                    d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4">
                                                </path>
                                            </svg>
                                            <input type="password" class="form-control ps-5"
                                                placeholder="تکرار رمز عبور" name="password2" required="">
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->



                                <div class="col-md-12">
                                    <div class="d-grid">
                                        <button class="btn btn-primary">ثبت نام </button>
                                    </div>
                                </div>
                                <!--end col-->


                                <div class="mx-auto">
                                    <p class="mb-0 mt-3"><small class="text-dark me-2">قبلاً حساب دارید؟</small> <a
                                            href="{{route('login')}}" class="text-dark fw-bold">وارد شوید </a></p>
                                </div>
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>
@include('Front::sections.footer')
@endsection
