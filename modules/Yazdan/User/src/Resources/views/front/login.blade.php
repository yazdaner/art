@extends('User::front.master')
@section('content')
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
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
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
                                </div>
                                <!--end col-->

                                <div class="col-lg-12">
                                    <x-input-home type="password" name="password" label="رمز عبور" required="true">
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
                                    <div class="d-flex justify-content-between">
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>
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
