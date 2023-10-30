<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">نظر خود را در مورد این مقاله مطرح کنید</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route("admin.comments.store") }}">
                @csrf
                <input type="hidden" id="comment_id" name="comment_id" value="">
                <input type="hidden" name="commentable_type" value="{{ get_class($commentable) }}">
                <input type="hidden" name="commentable_id" value="{{ $commentable->id }}">

                <div class="ct-textarea">
                    <div class="form-group">
                        <textarea name="body" class="form-control" id="commentArea" placeholder="ارسال نظر..."
                            rows="5"></textarea>
                    </div>
                </div>
                <div class="send-comment">
                    <button type="submit" class="btn btn-primary mt-3">ثبت پاسخ</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
