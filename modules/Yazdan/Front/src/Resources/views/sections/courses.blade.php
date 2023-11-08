<section class="section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title">
                    <h4 class="title mb-4">دوره های آموزشی</h4>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($courses as $course)
            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                @include('Course::front.singleCourse')
            </div>
            @endforeach
        </div>
    </div>
</section>
