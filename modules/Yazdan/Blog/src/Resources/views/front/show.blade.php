@extends('Front::master')
@section('content')
<section class="bg-half bg-light d-table w-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="page-next-level">
                    <h2> {{$blog->title}} </h2>
                    <ul class="list-unstyled mt-4">
                        <li class="list-inline-item h6 user text-muted me-2"><i class="mdi mdi-account"></i> {{$blog->user->name != "" ? $blog->user->name : $blog->user->username}}</li>
                        <li class="list-inline-item h6 date text-muted"><i class="mdi mdi-calendar-check"></i>{{verta($blog->created_at)->format('%B %Y')}}</li>
                    </ul>
                    <div class="page-next">
                        <nav aria-label="breadcrumb" class="d-inline-block">
                            <ul class="breadcrumb bg-white rounded shadow mb-0">
                                <li class="breadcrumb-item"><a href="/">صفحه اصلی</a></li>
                                <li class="breadcrumb-item"><a href="{{route('blogs')}}">وبلاگ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">جزئیات وبلاگ</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="section">
    <div class="container">
        <div class="row">
            <!-- BLog Start -->
            <div class="col-lg-8 col-md-6">
                <div class="card blog blog-detail border-0 shadow rounded">
                    <img src="{{$blog->getAvatar()}}" class="img-fluid rounded-top" alt="">
                    <div class="card-body">
                        <div class="post-meta mb-4">
                            <ul class="list-unstyled mb-0">
                                <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>
                            </ul>
                        </div>
                        <div class="content">
                            {!! $blog->content !!}
                        </div>
                    </div>
                </div>

                @include('Comment::front.index')

                <div class="card shadow rounded border-0 mt-4">
                    <div class="card-body">
                        <h5 class="card-title mb-0">پست های اخیر :</h5>

                        <div class="row">
                            <div class="col-lg-6 mt-4 pt-2">
                                <div class="card blog rounded border-0 shadow">
                                    <div class="position-relative">
                                        <img src="images/blog/01.jpg" class="card-img-top rounded-top" alt="...">
                                    <div class="overlay rounded-top bg-dark"></div>
                                    </div>
                                    <div class="card-body content">
                                        <h5><a href="javascript:void(0)" class="card-title title text-dark">برنامه های خود را به روش خود طراحی کنید</a></h5>
                                        <div class="post-meta d-flex justify-content-between mt-3">
                                            <ul class="list-unstyled mb-0">
                                                <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>
                                                <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>
                                            </ul>
                                            <a href="page-blog-detail.html" class="text-muted readmore">ادامه مطلب  <i class="uil uil-angle-left-b align-middle"></i></a>
                                        </div>
                                    </div>
                                    <div class="author">
                                        <small class="text-light user d-block"><i class="uil uil-user"></i> کالوین لورس</small>
                                        <small class="text-light date"><i class="uil uil-calendar-alt"></i> اردیبهشت 1400</small>
                                    </div>
                                </div>
                            </div><!--end col-->

                            <div class="col-lg-6 mt-4 pt-2">
                                <div class="card blog rounded border-0 shadow">
                                    <div class="position-relative">
                                        <img src="images/blog/02.jpg" class="card-img-top rounded-top" alt="...">
                                    <div class="overlay rounded-top bg-dark"></div>
                                    </div>
                                    <div class="card-body content">
                                        <h5><a href="javascript:void(0)" class="card-title title text-dark">برنامه ها چگونه دنیای اطلاعات را تغییر می دهند</a></h5>
                                        <div class="post-meta d-flex justify-content-between mt-3">
                                            <ul class="list-unstyled mb-0">
                                                <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>
                                                <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>
                                            </ul>
                                            <a href="page-blog-detail.html" class="text-muted readmore">ادامه مطلب  <i class="uil uil-angle-left-b align-middle"></i></a>
                                        </div>
                                    </div>
                                    <div class="author">
                                        <small class="text-light user d-block"><i class="uil uil-user"></i> کالوین لورس</small>
                                        <small class="text-light date"><i class="uil uil-calendar-alt"></i> اردیبهشت 1400</small>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </div>
            </div>
            <!-- BLog End -->

            @include('Blog::front.sidebar')

        </div><!--end row-->
    </div><!--end container-->
</section>
@endsection
