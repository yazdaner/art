<div class="comments-area">
    @include('Comment::front.create', ["commentable" => $commentable])
    @include("Comment::front.reply", ["commentable" => $commentable])
    <div class="card shadow rounded border-0 mt-4">
        <div class="card-body">
            <h5 class="card-title mb-0">نظرات :</h5>
            <ul class="media-list list-unstyled mb-0">
                @foreach($comments as $comment)
                <li class="mt-4">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <a class="pe-3" href="#">
                                <img src="{{$comment->user->getImage(60)}}"
                                    class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
                            </a>
                            <div class="commentor-detail">
                                <h6 class="mb-0"><a href="javascript:void(0)"
                                        class="text-dark media-heading">{{$comment->user->username}}</a></h6>
                                <small class="text-muted">{{$comment->created_at->diffForHumans()}}</small>
                            </div>
                        </div>
                        <a href="#" class="text-muted btn-answer" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            onclick="setCommentId(event,{{ $comment->id }})"><i class="mdi mdi-reply"></i> پاسخ </a>
                    </div>
                    <div class="mt-3">
                        <p class="text-muted fst-italic p-3 bg-light rounded">{{$comment->body}}</p>
                    </div>
                    @foreach($comment->comments->sortByDesc('updated_at') as $reply)
                    <ul class="list-unstyled ps-4 ps-md-5 sub-comment">
                        <li class="mt-4">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a class="pe-3" href="#">
                                        <img src="{{$reply->user->getImage(60)}}"
                                            class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
                                    </a>
                                    <div class="commentor-detail">
                                        <h6 class="mb-0"><a href="javascript:void(0)"
                                                class="text-dark media-heading">{{$reply->user->username}}</a></h6>
                                        <small class="text-muted">{{$reply->created_at->diffForHumans()}}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <p class="text-muted fst-italic p-3 bg-light rounded">{{$reply->body}}</p>
                            </div>
                        </li>
                    </ul>
                    @endforeach
                </li>
                @endforeach
            </ul>
            <div class="mt-5">
                {{$comments->links()}}
            </div>
        </div>
    </div>
</div>

@section('script')
<script>
    function setCommentId(e,commentableId){
        e.preventDefault();
        $("#comment_id").val(commentableId)
    }
</script>
@endsection
