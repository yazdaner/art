<div class="card features feature-clean explore-feature p-4 px-md-3 border-0 rounded-md shadow text-center">
    <div class="icons text-primary text-center mx-auto">
        <a href="{{$course->path()}}" class="title text-dark">
            <img src="{{$course->getImage(600)}}" alt="{{$course->title}}" class="course_img">
        </a>
    </div>
    <div class="card-body p-0 content">
        <h5 class="mt-4">
            <a href="{{$course->path()}}" class="title text-dark">{{$course->title}} </a>
        </h5>
        <p class="text-muted">{{$course->description}}</p>
        <a href="{{$course->path()}}" class="btn-course btn btn-primary"> مشاهده دوره </a>
    </div>
</div>
