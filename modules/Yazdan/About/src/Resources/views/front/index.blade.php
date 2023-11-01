@extends('Front::master')
@section('content')

<section class="bg-half d-table w-100" style="background: url('{{$about->getBanner(1)}}');">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="page-next-level title-heading">
                    <h1 class="text-white title-dark"> درباره ما </h1>
                    <p class="text-white-50 para-desc mb-0 mx-auto">{{$about->description1}}</p>
                    <div class="page-next">
                        <nav aria-label="breadcrumb" class="d-inline-block">
                            <ul class="breadcrumb bg-white rounded shadow mb-0">
                                <li class="breadcrumb-item"><a href="/" dideo-checked="true">صفحه
                                        اصلی </a></li>
                                <li class="breadcrumb-item active" aria-current="page">درباره ما</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>
<section class="section">
    <div class="container">
        <div class="row align-items-center" id="counter">
            <div class="col-md-6">
                <img src="{{$about->getBanner(2)}}" class="img-fluid" alt="">
            </div>
            <!--end col-->

            <div class="col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0">
                <div class="ms-lg-4">
                    <div class="d-flex mb-4">
                        <span class="text-primary h1 mb-0"><span class="counter-value display-1 fw-bold"
                                data-target="15">10</span>+</span>
                        <span class="h6 align-self-end ms-2">سال <br> تجربه </span>
                    </div>
                    <div class="section-title">
                        <h4 class="title mb-4">ما کی هستیم ؟</h4>
                        <p class="text-muted"> </p>
                        <div class="section-title mb-4 pb-2">
                            {!! $about->body !!}
                        </div>
                        <ul>
                        </ul>
                        <p></p>
                        <a href="https://atabakart.com/contact-us" class="btn btn-primary mt-3"
                            dideo-checked="true">تماس با ما</a>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>
<section class="section bg-light pt-4 pb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title text-center mb-4">
                    <h6 class="text-primary">فرآیند کار</h6>
                    <h4 class="title mb-4">دوره های ما</h4>
                    <p class="text-muted para-desc mx-auto mb-0">اطلاعات دوره ها رو می&zwnj;توانید اینجا ببینید: </p>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

        <div class="row">

            <div class="col-md-3 mt-3 pt-2">
                <div class="card features feature-clean work-process bg-transparent process-arrow border-0 text-center">
                    <div class="icons text-primary text-center mx-auto">
                        <img src="{{asset('assets/images/t4.jpg')}}" alt="دوره رنگ روغن " class="course_img2">
                    </div>

                    <div class="card-body">
                        <a href="https://atabakart.com/course/4" dideo-checked="true">
                            <h6 class="text-dark">دوره رنگ روغن </h6>
                            <p class="text-muted mb-0">بعد از این دوره هر تصویر را می&zwnj;توانید با رنگ روغن نقاشی
                                کنید. </p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-3 pt-2">
                <div class="card features feature-clean work-process bg-transparent process-arrow border-0 text-center">
                    <div class="icons text-primary text-center mx-auto">
                        <img src="{{asset('assets/images/t3.jpg')}}" alt="دوره طراحی مقدماتی" class="course_img2">
                    </div>

                    <div class="card-body">
                        <a href="https://atabakart.com/course/3" dideo-checked="true">
                            <h6 class="text-dark">دوره طراحی مقدماتی </h6>
                            <p class="text-muted mb-0">این دوره، پایه و اساس یادگیری دوره&zwnj;های نقاشی و تصویرسازی
                                است. </p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-3 pt-2">
                <div class="card features feature-clean work-process bg-transparent process-arrow border-0 text-center">
                    <div class="icons text-primary text-center mx-auto">
                        <img src="{{asset('assets/images/t2.jpg')}}" alt="دوره طراحی پیشرفته" class="course_img2">
                    </div>

                    <div class="card-body">
                        <a href="https://atabakart.com/course/2" dideo-checked="true">
                            <h6 class="text-dark">دوره طراحی پیشرفته </h6>
                            <p class="text-muted mb-0">این دوره برای یادگیری طراحی حرفه&zwnj;ای در نقاشی دیجیتال آرت
                                لازم است. </p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-3 pt-2">
                <div class="card features feature-clean work-process bg-transparent process-arrow border-0 text-center">
                    <div class="icons text-primary text-center mx-auto">
                        <img src="{{asset('assets/images/t1.jpg')}}" alt="دوره دیجیتال آرت" class="course_img2">
                    </div>

                    <div class="card-body">
                        <a href="https://atabakart.com/course/1" dideo-checked="true">
                            <h6 class="text-dark">دوره دیجیتال آرت </h6>
                            <p class="text-muted mb-0">در این دوره با بهترین نرم افزارها، نقاشی دیجیتال آرت را یاد
                                می&zwnj;گیرید. </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('Front::sections.latestPaintings')
<section class="section bg-light pt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="video-solution-cta position-relative" style="z-index: 1;">
                    <div class="position-relative">
                        <img src="{{$about->getBanner(3)}}" class="img-fluid rounded-md shadow-lg" alt="">
                        <div class="play-icon">
                            <!--  <a href="#!" data-type="youtube" data-id="yba7hPeTSjk" class="play-btn lightbox">
                                <i class="mdi mdi-play text-primary rounded-circle bg-white shadow-lg"></i>
                            </a> -->
                        </div>
                    </div>
                    <div class="content mt-md-4 pt-md-2">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 text-center">
                                <div class="row align-items-center">
                                    <div class="col-md-6 mt-4 pt-2">
                                        <div class="section-title text-md-start">
                                            <h4 class="title text-white title-dark mb-0">{{$about->description2}}</h4>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12 mt-4 pt-md-2">
                                        <div class="section-title text-md-start">
                                            <p class="text-white-50 para-desc">{{$about->description3}}</p>
                                            <a href="javascript:void(0)" class="text-white title-dark"
                                                dideo-checked="true">ادامه مطلب <i
                                                    class="uil uil-angle-left-b align-middle"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row -->
        <div class="feature-posts-placeholder bg-primary bg-gradient"></div>
    </div>
    <!--end container-->
</section>

@endsection
