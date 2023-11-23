@extends('Front::master')
@section('content')

{{-- header --}}
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
                                <li class="breadcrumb-item"><a href="{{route('products')}}">گالری</a></li>
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

    {{-- product --}}
    <div class="container">
        <div class="row align-items-center">

            {{-- gallery --}}
            <div class="col-md-5">
                <div class="tiny-single-item">
                    <div class="tiny-slide"><img src="{{$product->getImage(600)}}" class="img-fluid rounded" alt="">
                    </div>
                    @foreach ($product->galleries as $gallery)
                    <div class="tiny-slide"><img src="{{$gallery->getImage(600)}}" class="img-fluid rounded" alt="">
                    </div>
                    @endforeach
                </div>
            </div>


            <div class="col-md-7 mt-4 mt-sm-0 pt-2 pt-sm-0">
                {{-- form cart --}}
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf

                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div class="section-title ms-md-4">
                        <h4 class="title">{{$product->title}}</h4>

                        {{-- start price --}}
                        @include('Product::front.productPrice')
                        {{-- end price --}}

                        <h5 class="mt-4 py-2">بررسی:</h5>
                        <div class="description text-break">
                            {!! $product->description !!}
                        </div>

                        @if ($product->variations->isNotEmpty())
                            <div class="row mt-4 pt-2 d-flex align-items-center">

                                {{-- start variation --}}
                                <div class="col-lg-6 col-12">
                                    <div>
                                        <label class="form-label">نوع : </label>
                                        <select name="variation" class="form-control variation-select">
                                            @foreach ($product->variations as $variation)
                                            <option
                                                value="{{ json_encode($variation->only(['id' , 'quantity','is_sale' , 'price2' , 'price'])) }}">
                                                {{$variation->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- end variation --}}

                                {{-- start quantity --}}
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
                                {{-- end quantity --}}

                            </div>
                            {{-- btn cart --}}
                            <div class="mt-4 pt-2">
                                <button type="submit" class="btn btn-primary">افزودن به سبد خرید</button>
                            </div>
                            {{-- end btn cart --}}

                        @endif

                    </div>
                </form>
                {{-- end form cart --}}

            </div>
        </div>
    </div>


    <div class="container mt-100 mt-60">
        <div class="row">
            <div class="col-12">
                {{-- navbar comment & body --}}
                <ul class="nav nav-pills shadow flex-column flex-sm-row d-md-inline-flex mb-0 p-1 bg-white rounded position-relative overflow-hidden"
                    id="pills-tab" role="tablist">
                    <li class="nav-item m-1">
                        <a class="nav-link py-2 px-5 active rounded" id="description-data" data-bs-toggle="pill"
                            href="#description" role="tab" aria-controls="description" aria-selected="false">
                            <div class="text-center">
                                <h6 class="mb-0">توضیحات </h6>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item m-1">
                        <a class="nav-link py-2 px-5 rounded" id="review-comments" data-bs-toggle="pill" href="#review"
                            role="tab" aria-controls="review" aria-selected="false">
                            <div class="text-center">
                                <h6 class="mb-0">نظرات </h6>
                            </div>
                        </a>
                        <!--end nav link-->
                    </li>
                    <!--end nav item-->
                </ul>
                {{-- end navbar comment & body --}}

                <div class="tab-content mt-5" id="pills-tabContent">

                    {{-- body --}}
                    <div class="card border-0 tab-pane fade show active" id="description" role="tabpanel"
                        aria-labelledby="description-data">
                        {!! $product->body !!}
                    </div>
                    {{-- end body --}}

                    {{-- comment --}}
                    <div class="card border-0 tab-pane fade" id="review" role="tabpanel"
                        aria-labelledby="review-comments">
                        <div class="row">
                            <div class="col-12">
                                <div class="mt-5 px-5">
                                    <div class="px-5">
                                        @include('Comment::front.index',["commentable" => $product])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end comment --}}

                </div>
            </div>
        </div>
    </div>

    {{-- end new --}}


    {{-- latest products --}}
    <div class="container mt-100 mt-60">
        <div class="row">
            <div class="col-12">
                <h5 class="mb-0">محصولات اخیر</h5>
            </div>

            <div class="col-12 my-4 mb-5">
                <div class="tiny-four-item">
                    @foreach ($latestProducts as $product)
                    <div class="tiny-slide">
                        @include('Product::front.singleProduct')
                    </div>
                    @endforeach
                </div>
            </div>


        </div>

    </div>
    {{-- end latest products --}}

</section>
@endsection
