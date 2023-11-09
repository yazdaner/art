<!-- todo -->
<div class="col-lg-4 col-md-6 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
    <div class="card border-0 sidebar sticky-bar rounded shadow">
        <div class="card-body">
            <div class="widget mb-4 pb-2">
                <h5 class="widget-title">{{$course->title}}</h5>
                <div class="mt-4">
                    <div class="">
                        <p>وضعیت دوره : {{__($course->status)}}</p>
                        @include('Course::front.coursePrice')
                        <p>نام مدرس دوره : {{__($course->user->name ?? $course->user->username)}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
