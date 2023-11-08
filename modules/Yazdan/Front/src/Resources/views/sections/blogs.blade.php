<div class="container mt-100 mt-60">
    <div class="row align-items-center mb-4 pb-2">
        <div class="col-md-12">
            <div class="section-title text-center text-md-start">
                <h4 class="mb-4 text-center">همه اخبار یا پست وبلاگ</h4>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach ($blogs as $post)
        <div class="col-lg-4 col-md-6 mt-4 pt-2">
            @include('Blog::front.singlePost')
        </div>
        @endforeach

        <div class="col-12 mt-4 pt-2">
            <div class="text-center">
                <a href="{{route('blogs')}}" class="btn btn-primary">نمایش بیشتر <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left fea icon-sm"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg></a>
            </div>
        </div>
    </div>
</div>
