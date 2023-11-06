@extends('Front::master')
@section('content')
<section class="bg-half bg-light d-table w-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="page-next-level">
                    <h2> {{$blog->title}} </h2>
                    <ul class="list-unstyled mt-4">
                        {{-- <li class="list-inline-item h6 user text-muted me-2"><i class="mdi mdi-account"></i>
                            {{$blog->user->name != "" ? $blog->user->name : $blog->user->username}}</li> --}}
                            <li class="list-inline-item h6 date text-muted"><i
                                class="bi bi-grid"></i> {{$blog->category->title}} </li>

                            <li class="list-inline-item h6 date text-muted"><i
                                class="mdi mdi-calendar-check"></i>{{verta($blog->created_at)->format('%B %Y')}} </li>
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
            <div class="col-lg-8 col-md-6">
                <div class="card blog blog-detail border-0 shadow rounded">
                    <img src="{{$blog->getMedia()}}" class="img-fluid rounded-top post-main-img" alt="">
                    <div class="card-body">
                        <div class="post-meta mb-4">
                            <ul class="list-unstyled mb-0">

                                <li class="list-inline-item me-2 mb-0"><a href="{{$blog->category->path()}}"
                                        class="text-muted like"><i class="bi bi-grid"></i>
                                        {{$blog->category->title}}</a></li>
                                <li class="list-inline-item"><a href="#comment" class="text-muted comments"><i
                                            class="uil uil-comment me-1"></i>{{$blog->ApprovedCommentsCount()}}</a></li>
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
                        <h5 class="card-title mb-0">پست های مرتبط :</h5>

                        <div class="row">
                            @foreach ($relatedPosts as $post)
                            <div class="col-lg-6 mt-4 pt-2">
                                @include('Blog::front.singlePost')
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @include('Blog::front.sidebar')
        </div>
    </div>
</section>
@endsection
