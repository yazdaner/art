@extends('Front::master')
@section('content')
<section class="bg-half bg-light d-table w-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="page-next-level">
                    <h2>{{$product->title}}</h2>
                    <div class="page-next">
                        <nav aria-label="breadcrumb" class="d-inline-block">
                            <ul class="breadcrumb bg-white rounded shadow mb-0">
                                <li class="breadcrumb-item"><a href="/">صفحه اصلی</a></li>
                                <li class="breadcrumb-item"><a href="{{route('products')}}">دوره ها</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$product->title}}</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section pb-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5">
                <div class="tiny-single-item">
                    <div class="tiny-slide"><img src="{{$product->getImage(600)}}" class="img-fluid rounded" alt=""></div>
                    @foreach ($product->galleries as $gallery)
                    <div class="tiny-slide"><img src="{{$gallery->getImage(600)}}" class="img-fluid rounded" alt=""></div>
                    @endforeach
                </div>
            </div>
            <!--end col-->

            <div class="col-md-7 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="section-title ms-md-4">
                    <h4 class="title">{{$product->title}}</h4>
                    <div class="variation-price">
                        @if($product->quantity_check)
                        @if($product->sale_check)
                        <span class="new">
                            {{ number_format($product->sale_check->price2) }}
                            تومان
                        </span>
                        <span class="old">
                            {{ number_format($product->sale_check->price) }}
                            تومان
                        </span>
                        @else
                        <span class="mainPrice">
                            {{ number_format($product->price_check->price) }}
                            تومان
                        </span>
                        @endif
                        @else
                        <div class="not-in-stock">
                            <p class="">ناموجود</p>
                        </div>
                        @endif
                    </div>

                    <h5 class="mt-4 py-2">بررسی:</h5>
                    <div class="description">
                        {!! $product->body !!}
                    </div>
                    <div class="row mt-4 pt-2 d-flex align-items-center">
                        <div class="col-lg-6 col-12">
                            <div class="">
                                <label class="form-label">نوع : </label>
                                <select class="form-control variation-select">
                                    @foreach ($product->variations as $variation)
                                    <option
                                        value="{{ json_encode($variation->only(['id' , 'quantity','is_sale' , 'price2' , 'price'])) }}">
                                        {{$variation->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--end col-->

                        <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                            <div class="shop-list">
                                <label class="form-label">تعداد : </label>

                                <div class="qty-icons ms-3">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                        class="btn btn-icon btn-soft-primary minus">-</button>

                                    <input min="1" max="1" name="quantity" value="1" type="number"
                                        class="quantity-input btn btn-icon btn-soft-primary qty-btn quantity">

                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                        class="btn btn-icon btn-soft-primary plus">+</button>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->

                    <div class="mt-4 pt-2">
                        <a href="shop-cart.html" class="btn btn-primary">افزودن به سبد</a>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>

    {{-- comment --}}
    <div class="mt-5 px-5">
        <div class="px-5">
            @include('Comment::front.index',["commentable" => $product])
        </div>
    </div>


    <div class="">
        <div class="container mt-100 mt-60">
            <div class="row">
                <div class="col-12">
                    <h5 class="mb-0">محصولات اخیر</h5>
                </div>
                <!--end col-->


                <div class="col-12 my-4 mb-5">
                    <div class="tiny-four-item">
                        @foreach ($latestProducts as $product)
                        <div class="tiny-slide">
                            @include('Product::front.singleProduct')
                        </div>
                        @endforeach
                    </div>
                </div>

                <!--end col-->
            </div>
            <!--end row-->
        </div>
    </div>
    <!--end container-->



    <!--end container-->
</section>
@endsection
