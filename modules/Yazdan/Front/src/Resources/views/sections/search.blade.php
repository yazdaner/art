<div class="modal fade" id="search" tabindex="-1" aria-labelledby="search" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
            <form action="{{route('search')}}" id="search">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <input type="text" name="search" class="form-control my-4" placeholder="جستجو" required>
                <button type="submit" class="btn btn-primary">جستجو</button>
            </form>
            </div>
        </div>
    </div>
</div>
