<!-- START SIDEBAR -->
<div class="col-lg-4 col-md-6 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
    <div class="card border-0 sidebar sticky-bar rounded shadow">
        <div class="card-body">
            <!-- SEARCH -->
            <div class="widget">
                <form role="search" method="get">
                    <div class="input-group mb-3 border rounded">
                        <input type="text" id="s" name="s" class="form-control border-0" placeholder="جستجوی ...">
                        <button type="submit" class="input-group-text bg-transparent border-0" id="searchsubmit"><i
                                class="uil uil-search"></i></button>
                    </div>
                </form>
            </div>
            <!-- SEARCH -->
            <!-- پست های اخیر -->
            <div class="widget mb-4 pb-2">
                <h5 class="widget-title">پست های اخیر</h5>
                <div class="mt-4">
                    @foreach ($latestPosts as $post)
                    <div class="clearfix post-recent">
                        <div class="post-recent-thumb float-start"> <a href="{{$post->path()}}"> <img alt="img"
                                    src="{{$post->getImage(60)}}" class="img-fluid rounded"></a></div>
                        <div class="post-recent-content float-start"><a href="{{$post->path()}}">{{$post->title}} </a><span
                                class="text-muted mt-2">{{verta($post->created_at)->format('%B %Y')}}</span></div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- پست های اخیر -->
            <!-- SOCIAL -->
            <div class="widget">
                <h5 class="widget-title">دنبال کردن ما</h5>
                <ul class="list-unstyled social-icon mb-0 mt-4">
                    @include('Setting::front.social')
                </ul>
            </div>
            <!-- SOCIAL -->
        </div>
    </div>
</div>
