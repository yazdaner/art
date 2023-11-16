{{-- <div class="card features feature-clean explore-feature p-4 px-md-3 border-0 rounded-md shadow text-center">
    <div class="icons text-primary text-center mx-auto">
        <a href="{{$product->path()}}" class="title text-dark">
            <img src="{{$product->getImage(600)}}" alt="{{$product->title}}" class="product_img">
        </a>
    </div>
    <div class="card-body p-0 content">
        <h5 class="mt-4">
            <a href="{{$product->path()}}" class="title text-dark">{{$product->title}} </a>
        </h5>
        <p class="text-muted">{{$product->description}}</p>
        <a href="{{$product->path()}}" class="btn-product btn btn-primary"> مشاهده دوره </a>
    </div>
</div> --}}


    <div class="card shop-list border-0 position-relative shadow">

        <div class="shop-image position-relative overflow-hidden rounded-top shadow">
            <a href="{{$product->path()}}"><img src="{{$product->getImage(600)}}" class="img-fluid" alt=""></a>
        </div>
        <div class="card-body content pt-4 p-2">
            <a href="{{$product->path()}}" class="text-dark product-name h6">{{$product->title}}</a>
            <div class="d-flex justify-content-between mt-1">
                <h6 class="text-muted small fst-italic mb-0 mt-1">{{$product->getPrice()}} تومان</h6>
            </div>
        </div>
    </div>
