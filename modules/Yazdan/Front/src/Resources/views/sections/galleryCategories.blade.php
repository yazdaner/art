<section class="bg-half-50 pb-10 d-table w-100 my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="title-heading text-center mt-4">
                    <h1 class="heading mb-3"> دسته بندی گالری </h1>
                    <p class="para-desc mx-auto text-muted">
                        تابلوی مورد نظر خود را در دو دسته نقاشی رنگ روغن و دیجیتال آرت انتخاب کنید.
                    </p>
                </div>
                <div class="row justify-content-center mt-lg-4">

                    @if ($categories[0])

                    <div class="col-md-6 mt-4 pt-2">
                        <div class="card rounded shadow bg-light border-0">
                            <a href="{{$categories[0]->path()}}">
                                <img src="https://atabakart.com/app/files/category/orginal/62bac0eea0868.jpg"
                                    class="w-100">
                                <div class="text-center mt-4">
                                    <h5 class="">{{$categories[0]->title}}</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endif

                    @if ($categories[1])
                    <div class="col-md-6 mt-4 pt-2">
                        <div class="card rounded shadow bg-light border-0">
                            <a href="{{$categories[1]->path()}}">
                                <img src="https://atabakart.com/app/files/category/orginal/62bac0f6a9b61.jpg"
                                    class="w-100">
                                <div class="text-center mt-4">
                                    <h5 class="">{{$categories[1]->title}}</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endif

                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>
