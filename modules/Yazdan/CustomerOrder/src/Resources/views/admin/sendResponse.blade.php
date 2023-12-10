<div class="modal" id="sendResponseModal">
    <div class="modal-body">
        <div class="modal-body text-break text-right" id="ShowComment">
            <div class="modal-body" id="ShowOrder">
                <form action="" method="post" id="sendResponseForm">
                    @csrf
                    <x-text-area name="response" placeholder="پاسخ" />
                    <button type="submit" class="btn btn-primary">ارسال</button>
                </form>
            </div>
        </div>
    </div>
</div>
