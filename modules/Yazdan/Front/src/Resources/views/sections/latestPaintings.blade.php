<div class="container-fluid mt-100 mb-100 my-5">
    <div class="row">
        <div class="col-md-12 mt-4 pt-2">
            <h4 class="title mb-4 text-center mt-4">جدیدترین نقاشی ها</h4>
            <div class="tiny-six-item owl-carousel owl-carousel-slider owl-theme">

                @foreach ($products as $product)
                <div class="tiny-slide">
                    <div
                        class="card border-0 work-container work-grid position-relative d-block overflow-hidden item mx-2">
                        <div class="card-body p-0">
                            <a href="{{$product->path()}}" class="lightbox d-inline-block w-100p" title="">
                                <img src="{{$product->getImage(300)}}"
                                    class="img-fluid shadow rounded prod2_img w-100" alt="{{$product->title}}" />
                            </a>
                            <div class="content bg-white p-3">
                                <h5 class="mb-0">
                                    <a href="{{$product->path()}}" class="text-dark title">{{$product->title}}</a>
                                </h5>
                                @include('Product::front.productPrice')
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>

</div>
