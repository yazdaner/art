@extends('Home::master')
@section('homeContent')
<div class="col-lg-8 col-12">
    <div class="card border-0 rounded shadow">
        <div class="card-body">
            <h5 class="text-md-start text-center">جزئیات شخصی :</h5>
            <form>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">نام اصلی </label>
                            <div class="form-icon position-relative">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                                <input name="name" id="first" type="text" class="form-control ps-5"
                                    placeholder="نام اول :">
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">نام خانوادگی </label>
                            <div class="form-icon position-relative">
                                <i data-feather="user-check" class="fea icon-sm icons"></i>
                                <input name="name" id="last" type="text" class="form-control ps-5"
                                    placeholder="نام خانوادگی :">
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-6">
                        {{-- <div class="mb-3">
                            <label class="form-label">ایمیل شما </label>
                            <div class="form-icon position-relative">
                                <i data-feather="mail" class="fea icon-sm icons"></i>
                                <input name="email" id="email" type="email" class="form-control ps-5"
                                    placeholder="ایمیل شما :">
                            </div>
                        </div> --}}
                        <x-input-home name="email" label="ایمیل شما" value="{{auth()->user()->email}}" disabled>
                            <i data-feather="mail" class="fea icon-sm icons"></i>
                        </x-input-home>

                    </div>
                    <!--end col-->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">اشتغال </label>
                            <div class="form-icon position-relative">
                                <i data-feather="bookmark" class="fea icon-sm icons"></i>
                                <input name="name" id="occupation" type="text" class="form-control ps-5"
                                    placeholder="کار :">
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label">توضیحات </label>
                            <div class="form-icon position-relative">
                                <i data-feather="message-circle" class="fea icon-sm icons"></i>
                                <textarea name="comments" id="comments" rows="4" class="form-control ps-5"
                                    placeholder="توضیحات :"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
                <div class="row">
                    <div class="col-sm-12">
                        <input type="submit" id="submit" name="send" class="btn btn-primary" value="ذخیره تغییرات">
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </form>
            <!--end form-->
        </div>
    </div>
</div>
<!--end col-->
@endsection
