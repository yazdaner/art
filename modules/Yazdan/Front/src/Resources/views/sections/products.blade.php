<section class="section bg-light my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title">
                    <h4 class="title mb-4">گالری نقاشی ها</h4>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($products as $product)
            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                @include('Product::front.singleProduct')
            </div>
            @endforeach
        </div>
    </div>
</section>
