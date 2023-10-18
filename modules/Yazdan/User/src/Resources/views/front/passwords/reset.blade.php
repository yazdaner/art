@extends('User::front.master')

@section('content')
<section class="bg-home bg-circle-gradiant d-flex align-items-center">
    <div class="bg-overlay bg-overlay-white"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8">
                <div class="card login-page bg-white shadow rounded border-0">
                    <div class="card-body">
                        <h2 class="text-center">تغییر گذرواژه</h2>
                        <form action="{{ route('password.update') }}" method="post">
                            @csrf
                            <x-input-home type="password" name="password" label="رمز عبور جدید">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-key fea icon-sm icons">
                                    <path
                                        d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4">
                                    </path>
                                </svg>
                            </x-input-home>
                            <x-input-home type="password" name="password_confirmation" label="تایید رمز عبور جدید">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-key fea icon-sm icons">
                                    <path
                                        d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4">
                                    </path>
                                </svg>
                            </x-input-home>
                            <button type="submit" class="btn btn-primary">بروزرسانی رمز عبور</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

@endsection
