@extends('User::front.master')
@section('content')
{{-- <div class="col-lg-5 col-md-7 col-12 mx-auto mt-5">
    <div class="login-form">
        <h2 class="text-center">ورود کاربران</h2>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <x-inputHome type="text" name="email" label="نام کاربری یا ایمیل" />
            <x-inputHome type="password" name="password" label="گذرواژه" />



            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-6 remember-me-wrap">
                    <p>
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">مرا بخاطر بسپار</label>
                    </p>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 lost-your-password-wrap">
                    <a href="{{ route('password.request') }}" class="lost-your-password">فراموشی گذرواژه؟</a>
                </div>

            </div>

            <button type="submit">وارد شوید</button>

            <div class="mt-4">
                <a href="{{ route('register') }}" class="lost-your-password">صفحه ثبت نام</a>
            </div>
        </form>

    </div>
</div> --}}
@include('Front::sections.navbar')

<section class="bg-home bg-circle-gradiant d-flex align-items-center">
    <div class="bg-overlay bg-overlay-white"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8">
                <div class="card login-page bg-white shadow rounded border-0">
                    <div class="card-body">
                        <h4 class="card-title text-center">وارد شدن </h4>
                        <form class="login-form mt-4" method="post" action="{{route('login')}}">
                            <input type="hidden" name="csrf"
                                value="4c710785442a6a3d2c525fd5373afda946cea9f121eac97d372b0ce49343e5002bf249985d8311bc">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">ایمیل شما <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-user fea icon-sm icons">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                            <input type="email" class="form-control ps-5" placeholder="ایمیل"
                                                name="email" required="">
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-lg-12">
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
                                            <input type="password" name="password" class="form-control ps-5"
                                                placeholder="رمز عبور " required="">
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-between">
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">مرا به خاطر بسپار
                                                </label>
                                            </div>
                                        </div>
                                        <p class="forgot-pass mb-0"><a href="{{ route('password.request') }}"
                                                class="text-dark fw-bold">فراموشی رمز عبور؟ </a></p>
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-lg-12 mb-0">
                                    <div class="d-grid">
                                        <button class="btn btn-primary">ورود </button>
                                    </div>
                                </div>
                                <!--end col-->



                                <div class="col-12 text-center">
                                    <p class="mb-0 mt-3"><small class="text-dark me-2">حسابی ندارید؟ </small> <a
                                            href="{{route('register')}}" class="text-dark fw-bold">ثبت نام کنید </a></p>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                </div>
                <!---->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>
@include('Front::sections.footer')

@endsection
