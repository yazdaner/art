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
            @foreach ($blogs as $post)
                <div class="col-lg-4 col-md-6 mt-4 pt-2">
                    @include('Blog::front.singlePost')
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
