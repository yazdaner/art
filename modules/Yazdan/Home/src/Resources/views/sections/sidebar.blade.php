<!-- My Account Tab Menu Start -->
{{-- <div class="col-lg-3 col-md-4 my-5 my-md-1">
    <div class="myaccount-tab-menu nav" role="tablist">

        @foreach (config('sidebarHome.items') as $item)
        @if ($item)
        @if ( !array_key_exists('permission',$item) ||
        auth()->user()->hasAnyPermission($item['permission']) ||
        auth()->user()->hasPermissionTo(\Yazdan\RolePermissions\Repositories\PermissionRepository::PERMISSION_SUPER_ADMIN))

        <a href="{{$item['url']}}" class="{{ str_starts_with(request()->url(),$item['url']) ? 'active' : ''}}">
            <i class="{{$item['icon']}}"></i>
            {{$item['title']}}
        </a>

        @endif
        @endif
        @endforeach

        <a href="{{route('logout')}}">
            خروج
        </a>

    </div>
</div> --}}












<!-- My Account Tab Menu End -->
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
                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="github" class="fea icon-sm fea-social"></i></a></li>
                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="youtube" class="fea icon-sm fea-social"></i></a></li>
                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="gitlab" class="fea icon-sm fea-social"></i></a></li>
            </ul><!--end icon-->
        </div>
    </div>
</div><!--end col-->
