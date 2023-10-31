<div class="col-lg-4 col-md-6 col-12 d-lg-block d-none">
    <div class="sidebar sticky-bar p-4 rounded shadow">
        <div class="widget">
            <ul class="list-unstyled sidebar-nav mb-0" id="navmenu-nav">
                @foreach (config('sidebarHome.items') as $item)
                @if ($item)
                @if ( !array_key_exists('permission',$item) ||
                auth()->user()->hasAnyPermission($item['permission']) ||
                auth()->user()->hasPermissionTo(\Yazdan\RolePermissions\Repositories\PermissionRepository::PERMISSION_SUPER_ADMIN))
                <li class="navbar-item account-menu px-0">
                    <a href="{{$item['url']}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                        <span class="h4 mb-0"><i class="uil {{$item['icon']}}"></i></span>
                        <h6 class="mb-0 ms-2">{{$item['title']}}</h6>
                    </a>
                </li>
                @endif
                @endif
                @endforeach
                <li class="navbar-item account-menu px-0">
                    <a href="{{route('logout')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                        <span class="h4 mb-0"><i class="uil"></i></span>
                        <h6 class="mb-0 ms-2">خروج</h6>
                    </a>
                </li>
            </ul>
        </div>
        <div class="widget mt-4 pt-2">
            <h5 class="widget-title">دنبال کردن ما :</h5>
            <ul class="list-unstyled social-icon mb-0 mt-4">
                @include('Setting::front.social')
            </ul>
        </div>
    </div>
</div>
