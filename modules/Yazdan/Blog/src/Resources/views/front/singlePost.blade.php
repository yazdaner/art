<div class="card blog rounded border-0 shadow overflow-hidden">
    <div class="position-relative">
        <img src="{{$post->getMedia(600)}}" class="card-img-top single-post-image" alt="...">
        <div class="overlay rounded-top bg-dark"></div>
    </div>
    <div class="card-body content">
        <h5><a href="{{$post->path()}}" class="card-title title text-dark">{{$post->title}}</a></h5>
        <div class="post-meta d-flex justify-content-between mt-3">
            <ul class="list-unstyled mb-0">
                <li class="list-inline-item me-2 mb-0"><a href="{{$post->category->path()}}" class="text-muted like"><i class="bi bi-grid"></i> {{$post->category->title}}</a></li>
                <li class="list-inline-item"><a href="{{$post->path()}}" class="text-muted comments"><i class="uil uil-comment me-1"></i>{{$post->ApprovedCommentsCount()}}</a></li>
            </ul>
            <a href="{{$post->path()}}" class="text-muted readmore">ادامه مطلب  <i class="uil uil-angle-left-b align-middle"></i></a>
        </div>
    </div>
    <div class="author">
        {{-- <small class="text-light user d-block"><i class="uil uil-user"></i> {{$post->user->name != "" ? $post->user->name : $post->user->username}} </small> --}}
        <small class="text-light user d-block"><i class="bi bi-grid"></i> {{$post->category->title}} </small>
        <small class="text-light date"><i class="uil uil-calendar-alt"></i> {{verta($post->created_at)->format('%B %Y')}}</small>
    </div>
</div>
