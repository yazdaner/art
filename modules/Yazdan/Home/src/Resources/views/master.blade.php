@extends('Front::master')
@section('content')
<section class="bg-profile d-table w-100 bg-primary" style="background: url('{{asset('assets/images/account/bg.png')}}') center center;background-color: #5d72b957 !important;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card public-profile border-0 rounded shadow" style="z-index: 1;">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-2 col-md-3 text-md-start text-center">
                                <img src="images/client/05.jpg" class="avatar avatar-large rounded-circle shadow d-block mx-auto" alt="">
                            </div><!--end col-->

                            <div class="col-lg-10 col-md-9">
                                <div class="row align-items-end">
                                    <div class="col-md-7 text-md-start text-center mt-4 mt-sm-0">
                                        <h3 class="title mb-0">جعفر عباسی</h3>
                                        <small class="text-muted h6 me-2">توسعه وب</small>
                                        <ul class="list-inline mb-0 mt-3">
                                            <li class="list-inline-item me-2"><a href="javascript:void(0)" class="text-muted" title="اینستاگرام"><i data-feather="instagram" class="fea icon-sm me-2"></i>jafar_abbasi</a></li>
                                        </ul>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end col-->
                            <div class="mt-3 text-md-start text-center d-sm-flex">
                                <div class="mt-md-4 mt-3 mt-sm-0">
                                    <a href="javascript:void(0)" class="btn btn-primary mt-2">تغییر تصویر</a>
                                    <a href="javascript:void(0)" class="btn btn-outline-primary mt-2 ms-2">حذف </a>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--ed container-->
</section><!--end section-->
<!-- Hero End -->

<!-- Profile Start -->
<section class="section mt-60">
    <div class="container mt-lg-3">
        <div class="row">
            @include('Home::sections.sidebar')
            @yield('homeContent')
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->

@endsection
