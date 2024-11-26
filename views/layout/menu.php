<header class="header-area header-wide">
    <!-- main header start -->
    <div class="main-header d-none d-lg-block">
        <!-- header middle area start -->
        <div class="header-main-area sticky">
            <div class="container">
                <div class="row align-items-center position-relative">

                    <!-- start logo area -->
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="index-3.html">
                                <img src="assets/img/logo/logo-adidas.webp" alt="Brand Logo">
                            </a>
                        </div>
                    </div>
                    <!-- start logo area -->

                    <!-- main menu area start -->
                    <div class="col-lg-5 position-static">
                        <div class="main-menu-area">
                            <div class="main-menu">
                                <!-- main menu navbar start -->
                                <nav class="desktop-menu">
                                    <ul>
                                        <li><a href="<?= BASE_URL ?>">Trang chủ</a>

                                        </li>
                                       
                                        <li><a href="blog-left-sidebar.html">Sản phẩm <i class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="blog-left-sidebar.html">blog left sidebar</a></li>
                                                <li><a href="blog-list-left-sidebar.html">blog list left sidebar</a></li>
                                                <li><a href="blog-right-sidebar.html">blog right sidebar</a></li>
                                                <li><a href="blog-list-right-sidebar.html">blog list right sidebar</a></li>
                                                <li><a href="blog-grid-full-width.html">blog grid full width</a></li>
                                                <li><a href="blog-details.html">blog details</a></li>
                                                <li><a href="blog-details-left-sidebar.html">blog details left sidebar</a></li>
                                                <li><a href="blog-details-audio.html">blog details audio</a></li>
                                                <li><a href="blog-details-video.html">blog details video</a></li>
                                                <li><a href="blog-details-image.html">blog details image</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="<?=BASE_URL.'?act=gioi-thieu'?>">Giới thiệu</a></li>
                                        <li><a href="<?=BASE_URL .'?act=lien-he'?>">Liên hệ</a></li>
                                    </ul>
                                </nav>
                                <!-- main menu navbar end -->
                            </div>
                        </div>
                    </div>
                    <!-- main menu area end -->

                    <!-- mini cart area start -->
                    <div class="col-lg-5">
                    <div class="header-right d-flex align-items-center justify-content-xl-between justify-content-lg-end">
                            <div class="header-search-container">
                                <button class="search-trigger d-xl-none d-lg-block"><i class="pe-7s-search"></i></button>
                                <form class="header-search-box d-lg-none d-xl-block" action="<?= BASE_URL . '?act=search' ?>" method="POST">
                                      <input type="text" name="keyword" placeholder="Nhập tên sản phẩm" class="header-search-field">
                                      <button class="header-search-btn" type="submit"><i class="pe-7s-search"></i></button>
                                </form>
                            </div>
                            <div class="header-configure-area">
                                <ul class="nav justify-content-end">
                                    <label for="">
                                          <?php
                                            if (isset($_SESSION['user_client'])) {
                                                echo $_SESSION['user_client']['email'];
                                            }

                                            ?>
                                    </label>
                                    <li class="user-hover">
                                        <a href="#">
                                              <i class="pe-7s-user"></i>
                                        </a>
                                        <ul class="dropdown-list">
                                              <?php
                                                if (!isset($_SESSION['user_client'])) { ?>
                                                  <li><a href="<?= BASE_URL . '?act=form-login' ?>">Đăng nhập</a></li>
                                                  <li><a href="<?= BASE_URL . '?act=form-dang-ky' ?>">Đăng ký</a></li>
                                                  <li><a href="<?= BASE_URL_ADMIN ?>">Đăng nhập Admin</a></li>


                                              <?php } else { ?>

                                                  <li><a href="<?= BASE_URL . '?act=quan-ly-tai-khoan' ?>">Tài khoản</a></li>
                                                  <li><a href="<?= BASE_URL . '?act=quen-mat-khau' ?>">Quên mật khẩu</a></li>
                                                  <li><a href="<?= BASE_URL . '?act=logout' ?>">Đăng xuất</a></li>
                                              <?php } ?>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="minicart-btn">
                                              <i class="pe-7s-shopbag"></i>
                                              <div class=""></div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- mini cart area end -->

                </div>
            </div>
        </div>
        <!-- header middle area end -->
    </div>
    <!-- main header start -->

</header>