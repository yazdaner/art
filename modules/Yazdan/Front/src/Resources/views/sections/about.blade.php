<div class="container mt-30">
    <div class="row align-items-center">
        <div class="col-lg-6 col-md-6">
            <div class="row align-items-center">
                <div class="col-lg-6 col-6 mt-4 mt-lg-0 pt-2 pt-lg-0">
                    <div class="card work-container work-modern overflow-hidden rounded border-0 shadow-md">
                        <div class="card-body p-0">
                            <img src="{{$about->getBanner(4)}}"
                                class="img-fluid" alt="work-image" />
                            <div class="overlay-work bg-dark"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-6">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 mt-4 mt-lg-0 pt-2 pt-lg-0">
                            <div class="card work-container work-modern overflow-hidden rounded border-0 shadow-md">
                                <div class="card-body p-0">
                                    <img src="{{$about->getBanner(5)}}"
                                        class="img-fluid" alt="work-image" />
                                    <div class="overlay-work bg-dark"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 mt-4 pt-2">
                            <div class="card work-container work-modern overflow-hidden rounded border-0 shadow-md">
                                <div class="card-body p-0">
                                    <img src="{{$about->getBanner(6)}}"
                                        class="img-fluid" alt="work-image" />
                                    <div class="overlay-work bg-dark"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 mt-4 mt-lg-0 pt- pt-lg-0">
            <div class="ms-lg-4">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">درباره ما</h4>
                    <p class="text-muted para-desc">
                    <div class="section-title mb-4 pb-2">
                        {!! $about->frontBody !!}
                    </div>

                <div class="mt-4 pt-2">
                    <a href="{{route('about')}}" class="btn btn-primary m-1">ادامه مطلب <i
                            class="uil uil-angle-left-b align-middle"></i></a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
