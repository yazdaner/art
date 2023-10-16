 <!-- Navbar STart -->
 <header id="topnav" class="defaultscroll sticky">
    <div class="container">
      <!-- Logo container-->
      <div>
        <a class="logo" href="index.html">
          <img src="images/logo-dark.png" height="24" alt="" />
        </a>
      </div>
      <div class="buy-button">
        <a href="./login.html" class="btn btn-primary">حساب کاربری
        </a>
      </div>
      <!--end login button-->
      <!-- End Logo container-->
      <div class="menu-extras">
        <div class="menu-item">
          <!-- Mobile menu toggle-->
          <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
            <div class="lines">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </a>
          <!-- End mobile menu toggle-->
        </div>
      </div>

      <div id="navigation">
        <!-- Navigation Menu-->
        <ul class="navigation-menu">
          <li><a href="https://atabakart.com/" class="sub-menu-item">صفحه اصلی </a></li>
          <li class="has-submenu parent-menu-item">
            <a class="d-none d-sm-none d-md-block d-lg-block" href="https://atabakart.com/gallery">گالری </a>
            <a class="d-block d-sm-block d-md-none d-lg-none" href="javascript:void(0)">گالری </a>
            <span class="menu-arrow"></span>
            <ul class="submenu">
                              <li>
                  <a href="./category.html" class="sub-menu-item">رنگ روغن </a>
                </li>
                              <li>
                  <a href="./category.html" class="sub-menu-item">دیجیتال آرت </a>
                </li>
                          </ul>
          </li>
          <li class="has-submenu parent-menu-item">
              <a class="d-none d-sm-none d-md-block d-lg-block" href="./course.html">دوره ها </a>
            <a class="d-block d-sm-block d-md-none d-lg-none" href="javascript:void(0)">دوره ها </a>
            <span class="menu-arrow"></span>
            <ul class="submenu">
                              <li>
                  <a href="./course.html" class="sub-menu-item">دوره رنگ روغن  </a>
                </li>
                              <li>
                  <a href="./course.html" class="sub-menu-item">دوره طراحی مقدماتی </a>
                </li>
                              <li>
                  <a href="./course.html" class="sub-menu-item">دوره طراحی پیشرفته </a>
                </li>
                              <li>
                  <a href="./course.html" class="sub-menu-item">دوره دیجیتال آرت </a>
                </li>
                          </ul>
          </li>

          <li><a href="/about.html" class="sub-menu-item">درباره ما </a></li>
          <li><a href="./contact.html" class="sub-menu-item">تماس با ما </a></li>
        </ul>
        <!--end navigation menu-->
        <div class="buy-menu-btn d-none">
          <a href="./login.html" class="btn btn-primary">حساب کاربری
          </a>
        </div>
        <!--end login button-->
      </div>
      <!--end navigation-->
    </div>
    <!--end container-->
  </header>
  <!--end header-->
  <!-- Navbar End -->
