@extends('Front::master')
@section('content')
<section class="bg-half bg-light d-table w-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="page-next-level">
                    <h2>{{$course->title}}</h2>
                    <div class="page-next">
                        <nav aria-label="breadcrumb" class="d-inline-block">
                            <ul class="breadcrumb bg-white rounded shadow mb-0">
                                <li class="breadcrumb-item"><a href="/">صفحه اصلی</a></li>
                                <li class="breadcrumb-item"><a href="{{route('courses')}}">دوره ها</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$course->title}}</li>
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
                <div class="card course course-detail border-0 shadow rounded">
                    <div class="text-center mt-3">
                        <video width="90%" controls class="mt-3">
                            <source src="{{$course->video->download()}}" type="video/mp4">
                        </video>
                    </div>
                    <div class="card-body">
                        <div class="post-meta mb-4">
                            <ul class="list-unstyled mb-0">
                                <li class="list-inline-item">
                                    <a href="#comment" class="text-muted comments">
                                        <i class="uil uil-comment me-1"></i>
                                        {{$course->ApprovedCommentsCount()}}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            {!! $course->body !!}
                        </div>
                    </div>
                </div>
                @include('Comment::front.index',["commentable" => $course])
            </div>
            @include('Course::front.sidebar')
        </div>
    </div>
</section>
@endsection
