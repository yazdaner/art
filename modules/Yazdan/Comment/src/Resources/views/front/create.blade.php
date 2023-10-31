<div class="card shadow rounded border-0 mt-4">
    <div class="card-body">
        <h5 class="card-title mb-0" id="comment">ارسال نظر :</h5>
        <form action="{{ route("admin.comments.store") }}" method="post">
            @csrf
            <input type="hidden" name="commentable_type" value="{{ get_class($commentable) }}">
            <input type="hidden" name="commentable_id" value="{{ $commentable->id }}">
            <div class="row">
                <div class="col-md-12">
                    <x-textarea-home name="body" label="نظر شما" required>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-message-circle fea icon-sm icons clearfix">
                            <path
                                d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
                            </path>
                        </svg>
                    </x-textarea-home>
                </div>
                <div class="col-md-12">
                    <div class="send d-grid">
                        <button type="submit" class="btn btn-primary">ارسال پیام</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
