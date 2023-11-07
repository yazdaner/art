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
            <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                <div
                    class="card features feature-clean explore-feature p-4 px-md-3 border-0 rounded-md shadow text-center">
                    <div class="icons text-primary text-center mx-auto">
                        <a href="/" class="title text-dark">
                            <img src="{{$course->getImage(600)}}" alt="{{$course->title}}" class="course_img">
                        </a>
                    </div>
                    <div class="card-body p-0 content">
                        <h5 class="mt-4">
                            <a href="./course.html" class="title text-dark">{{$course->title}} </a>
                        </h5>
                        <p class="text-muted">{{$course->description}}</p>

                        <a href="./course.html" class="show-course"> مشاهده دوره </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>