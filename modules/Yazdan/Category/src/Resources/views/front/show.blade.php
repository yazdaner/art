@extends('Front::master')
@section('content')
<section class="bg-half bg-light d-table w-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="page-next-level">
                    <h4 class="title">دسته بندی {{$category->title}}</h4>
                    <div class="page-next">
                        <nav aria-label="breadcrumb" class="d-inline-block">
                            <ul class="breadcrumb bg-white rounded shadow mb-0">
                                <li class="breadcrumb-item"><a href="/" dideo-checked="true">صفحه اصلی </a></li>
                                <li class="breadcrumb-item"><a href="{{route('blogs')}}" dideo-checked="true">وبلاگ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$category->title}}</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section p-0">
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

    <div class="container mt-100">

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
