@extends('User::front.master')
@section('content')
<section class="bg-home bg-circle-gradiant d-flex align-items-center">
    <div class="bg-overlay bg-overlay-white"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8">
                    <div class="card login-page bg-white shadow rounded border-0">
                        <div class="card-body">
                            <h4 class="card-title text-center">فعال سازی حساب</h4>
                            <form action="{{ route('verification.verify') }}" method="post">

                                @csrf

                                @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification code has been sent to your email address.') }}
                                </div>
                                @endif

                                <div class="mb-4">
                                    <p class="">کد فرستاده شده به ایمیل <span>{{auth()->user()->email}}</span>
                                        را وارد کنید . ممکن است ایمیل به پوشه spam فرستاده شده باشد
                                    </p>
                                </div>

                                <x-input-home name="verify_code" label="کد فعال سازی">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-key fea icon-sm icons">
                                    <path
                                        d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4">
                                    </path>
                                </svg>
                                </x-input-home>




                                <button type="submit" class="btn btn-primary">فعال سازی</button>
                                <div class="mt-4 d-flex justify-content-between">

                                    <a href="#" onclick="
                                    event.preventDefault();
                                    document.getElementById('resend-code').submit();
                                    ">ارسال مجدد</a>

                                    <a href="" class="lost-your-password" onclick="
                                    event.preventDefault();
                                    document.getElementById('logout').submit();
                                    ">خروج</a>
                                </div>
                            </form>
                            <form id="resend-code" action="{{route('verification.resend')}}" method="post">@csrf
                            </form>
                            <form id="logout" action="{{route('logout')}}" method="post">@csrf</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
