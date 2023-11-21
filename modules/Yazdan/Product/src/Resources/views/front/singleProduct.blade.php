<div class="card shop-list border-0 position-relative shadow">

    <div class="shop-image position-relative overflow-hidden rounded-top shadow">
        <a href="{{$product->path()}}"><img src="{{$product->getImage(600)}}" class="img-fluid" alt=""></a>
    </div>
    <div class="card-body content pt-4 p-2">
        <a href="{{$product->path()}}" class="text-dark product-name h6">{{$product->title}}</a>
        <div class="d-flex justify-content-between mt-1">
            <h6 class="text-muted small fst-italic mb-0 mt-1">{{$product->getPrice()}}</h6>
        </div>
    </div>
</div>
