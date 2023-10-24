<section class="home-slider position-relative">
    <div id="carouselExampleInterval" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($sliders as $slider)
            <div class="carousel-item  @if($loop->first) active @endif" data-bs-interval="3000">
                <div class="bg-home bg-animation-left d-flex align-items-center"
                    style="background-image:url('{{$slider->getAvatar()}}')">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-5">
                                <div class="title-heading position-relative mt-4" style="z-index: 1;">
                                    <h1 class="heading mb-3 text-break">{{$slider->title}}</h1>
                                    <p class="para-desc text-break">{{$slider->description}}</p>
                                    <div class="mt-4 pt-2">
                                        <a href="{{$slider->link}}" class="btn btn-primary">ادامه مطلب</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">قبلی </span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">بعدی </span>
        </a>

    </div>
</section>
