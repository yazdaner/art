@extends('Front::master')
@section('content')

<section class="bg-half bg-light d-table w-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="page-next-level">
                    <h4 class="title">جستجو : {{request()->search}}</h4>
                    <div class="page-next">
                        <nav aria-label="breadcrumb" class="d-inline-block">
                            <ul class="breadcrumb bg-white rounded shadow mb-0">
                                <li class="breadcrumb-item"><a href="/" dideo-checked="true">صفحه اصلی </a></li>
                                <li class="breadcrumb-item"><a href="#" dideo-checked="true">جستجو</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if ($blogs->isNotEmpty())

<section class="blog-area ptb-100 mt-5">
    <div class="container">
    <h3 class="mb-4">بلاگ ها : </h3>
        <div class="row">
            @foreach ($blogs as $post)
            <div class="col-lg-4 col-md-6">
                @include('Blog::front.singlePost')
            </div>
            @endforeach
            <div class="col-lg-12 col-md-12">
                <div class="d-flex justify-content-center mt-5">
                    {{ $blogs->links('pagination.front') }}
                </div>
            </div>
        </div>
    </div>
</section>


@endif


@if ($products->isNotEmpty())

<section class="blog-area ptb-100 mt-5">
    <div class="container">
    <h3 class="mb-4">گالری : </h3>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-lg-4 col-md-6 mt-5">
                    @include('Product::front.singleProduct')
                </div>
            @endforeach
            <div class="col-lg-12 col-md-12">
                <div class="d-flex justify-content-center mt-5">
                    {{ $products->links('pagination.front') }}
                </div>
            </div>
        </div>
    </div>
</section>


@endif



@if ($courses->isNotEmpty())
<section class="blog-area ptb-100 mt-5">
    <div class="container">
    <h3>دوره ها : </h3>
        <div class="row">
            @foreach ($courses as $course)
            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                @include('Course::front.singleCourse')
            </div>
            @endforeach
            <div class="col-lg-12 col-md-12">
                <div class="d-flex justify-content-center mt-5">
                    {{ $courses->links('pagination.front') }}
                </div>
            </div>
        </div>
    </div>
</section>
@endif





@if ($blogs->isEmpty() && $products->isEmpty() && $courses->isEmpty())
<section class="blog-area ptb-100 mb-5">
    <div class="container">
        <div class="row">
            <div class="container w-100" style="height: 50vh">
                <div class="row mt-5 justify-content-center">

                    <div class="alert alert-light text-center mt-5 p-5" role="alert">
                        <h5 class="text-danger"><strong>{{ request()->search }}</strong></h5><h4>با این عنوان چیزی یافت نشد !</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@endsection
