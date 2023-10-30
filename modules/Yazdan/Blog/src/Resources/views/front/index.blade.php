<!-- Start Blog Area -->
{{-- <section class="blog-area ptb-100 mt-5">
    <div class="container">
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-post-box">
                        <div class="post-image">
                            <a href="{{route('blog.show',$blog->slug)}}">
                                <img src="{{$blog->getAvatar(600)}}" alt="image">
                            </a>
                        </div>

                        <div class="post-content">
                            <ul class="post-meta">
                                <li>{{verta($blog->created_at)->format('Y/n/j')}}</li>
                                <li><a href="{{route('blog.show',$blog->slug)}}">{{$blog->category->title}}</a></li>
                            </ul>
                            <h3><a href="{{route('blog.show',$blog->slug)}}">{{$blog->title}}</a></h3>
                            <a href="{{route('blog.show',$blog->slug)}}" class="read-more-btn">ادامه خواندن <i
                                    class="flaticon-left"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-lg-12 col-md-12">
                <div class="d-flex justify-content-center mt-5">
                    {{ $blogs->links('pagination.front') }}
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- End Blog Area -->

@extends('Front::master')
@section('content')

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="features-absolute blog-search">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="text-center subcribe-form">
                                <form style="max-width: 800px;">
                                    <input type="text" id="course" name="name" class="rounded-pill shadow-md bg-white" placeholder="جستجوی کلمه کلیدی...">
                                        <button type="submit" class="btn btn-pills btn-primary">جستجو </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-100 mt-60">
        <div class="row align-items-center mb-4 pb-2">
            <div class="col-md-8">
                <div class="section-title text-center text-md-start">
                    <h4 class="mb-4">همه اخبار یا پست وبلاگ</h4>
                </div>
            </div>
        </div>

        <div class="row">

            @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-6 mt-4 pt-2">
                    <div class="card blog rounded border-0 shadow overflow-hidden">
                        <div class="position-relative">
                            <img src="{{$blog->getAvatar(600)}}" class="card-img-top" alt="...">
                            <div class="overlay rounded-top bg-dark"></div>
                        </div>
                        <div class="card-body content">
                            <h5><a href="{{route('blog.show',$blog->slug)}}" class="card-title title text-dark">{{$blog->title}}</a></h5>
                            <div class="post-meta d-flex justify-content-between mt-3">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item me-2 mb-0"><a href="{{route('blog.show',$blog->slug)}}" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>
                                    <li class="list-inline-item"><a href="{{route('blog.show',$blog->slug)}}" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>
                                </ul>
                                <a href="{{route('blog.show',$blog->slug)}}" class="text-muted readmore">ادامه مطلب  <i class="uil uil-angle-left-b align-middle"></i></a>
                            </div>
                        </div>
                        <div class="author">
                            <small class="text-light user d-block"><i class="uil uil-user"></i> {{$blog->user->name != "" ? $blog->user->name : $blog->user->username}} </small>
                            <small class="text-light date"><i class="uil uil-calendar-alt"></i>{{verta($blog->created_at)->format('%B %Y')}}</small>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="col-12 mt-4 pt-2">
                <div class="d-flex justify-content-center">
                    {{$blogs->links()}}
                </div>
            </div>
        </div>
    </div>

</section>
@endsection

