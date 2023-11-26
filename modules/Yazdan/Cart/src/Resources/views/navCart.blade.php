<li class="list-inline-item mb-0 pe-1">
    <div class="dropdown">
        <button type="button" class="btn btn-icon btn-soft-primary dropdown-toggle" data-bs-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"><i class="uil uil-shopping-cart align-middle icons"></i></button>
        <div class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow rounded border-0 mt-3 p-4"
            style="width: 300px;">
            <div class="pb-4">
                @foreach (\Cart::getContent() as $item)
                    <a href="javascript:void(0)" class="d-flex align-items-center">
                        <img src="images/shop/product/s-1.jpg" class="shadow rounded" style="max-height: 64px;" alt="">
                        <div class="flex-1 text-start ms-3">
                            <h6 class="text-dark mb-0">{{ $item->name }} ({{ $item->attributes->title }})</h6>
                            <p class="text-muted mb-0">{{number_format($item->price)}}</p>
                        </div>
                        <h6 class="text-dark mb-0">{{number_format($item->price)}} تومان</h6>
                    </a>
                @endforeach
            </div>
            <div class="d-flex align-items-center justify-content-between pt-4 border-top">
                <h6 class="text-dark mb-0">مجموع (تومان):</h6>
                <h6 class="text-dark mb-0">1,150,000 تومان</h6>
            </div>
            <div class="mt-3 text-center">
                <a href="{{route('cart.index')}}" class="btn btn-primary">نمایش سبد خرید </a>
                <a href="javascript:void(0)" class="btn btn-primary">پرداخت </a>
            </div>
        </div>
    </div>
</li>
