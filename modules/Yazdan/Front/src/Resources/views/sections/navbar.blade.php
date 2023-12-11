<header id="topnav" class="defaultscroll sticky">
    <div class="container-fluid">
        <div>
            <a class="logo" href="/">
                <img src="/assets/images/logo-dark.png" height="24" alt="" />
            </a>
        </div>
        <div class="buy-button">
            @auth
            @include('Cart::navCart')
            <a href="{{route('users.profile')}}" class="btn btn-primary btn-p">
                <i class="uil uil-user align-middle icons"></i>
            </a>
            <a href="{{route('logout')}}" class="btn btn-primary btn-p">خروج</a>
            @else
            <div class="option-item d-flex">
                <div class="ml-3 me-2">
                    <a class="btn btn-primary btn-p" href="{{route('login')}}">ورود</a>
                </div>
                <div>
                    <a class="btn btn-primary btn-p" href="{{route('register')}}">ثبت نام</a>
                </div>
            </div>
            @endauth
        </div>
        <div class="buy-button me-3 cursor-pointer" data-bs-toggle="modal" data-bs-target="#search">
            <img src="/assets/images/search.png" width="40" alt="search">
        </div>
        <div class="menu-extras">
            <div class="menu-item">
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
            </div>
        </div>
        <div id="navigation">
            <ul class="navigation-menu">
                <li><a href="/" class="sub-menu-item">صفحه اصلی </a></li>
                <li class="has-submenu parent-parent-menu-item">
                    <a href="javascript:void(0)">گالری </a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        @foreach ($productCategories as $category)
                        <li class="@if(count($category->subCategory)) has-submenu @endif parent-menu-item"><a
                                href="{{$category->path()}}"> {{$category->title}}
                            </a>@if(count($category->subCategory))<span class="submenu-arrow"></span> @endif
                            @if (count($category->subCategory))
                            <ul class="submenu">
                                @foreach ($category->subCategory as $subCategory)
                                <li><a href="{{$subCategory->path()}}" class="sub-menu-item">
                                        {{$subCategory->title}}</a></li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li class="has-submenu parent-menu-item">
                    <a class="d-none d-sm-none d-md-block d-lg-block" href="{{route('courses')}}">دوره ها </a>
                    <a class="d-block d-sm-block d-md-none d-lg-none" href="javascript:void(0)">دوره ها </a>
                    <span class="menu-arrow"></span>
                    <ul class="submenu">
                        @foreach ($courses as $course)
                            <li>
                                <a href="{{$course->path()}}" class="sub-menu-item">{{$course->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li><a href="{{route('customer.orders.create')}}" class="sub-menu-item">سفارش نقاشی</a></li>

                <li class="has-submenu parent-parent-menu-item">
                    <a href="javascript:void(0)">مجله اتابک </a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        @foreach ($blogCategories as $category)
                        <li class="@if(count($category->subCategory)) has-submenu @endif parent-menu-item"><a
                                href="{{$category->path()}}"> {{$category->title}}
                            </a>@if(count($category->subCategory))<span class="submenu-arrow"></span> @endif
                            @if (count($category->subCategory))
                            <ul class="submenu">
                                @foreach ($category->subCategory as $subCategory)
                                <li><a href="{{$subCategory->path()}}" class="sub-menu-item">
                                        {{$subCategory->title}}</a></li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </li>

                <li><a href="{{route('about')}}" class="sub-menu-item">درباره ما </a></li>
                <li><a href="{{route('contact')}}" class="sub-menu-item">تماس با ما </a></li>
            </ul>
        </div>
    </div>
</header>
@include('Front::sections.search')
