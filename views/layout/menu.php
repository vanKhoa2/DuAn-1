<body>
    <!-- Start Header Area -->
    <header class="header-area header-wide">
        <!-- main header start -->
        <div class="main-header d-none d-lg-block">
            <!-- header top start -->

            <!-- header top end -->

            <!-- header middle area start -->
            <div class="header-main-area sticky">
                <div class="container">
                    <div class="row align-items-center position-relative">

                        <!-- start logo area -->
                        <div class="col-lg-2">
                            <div class="logo">
                                <a href="<?php echo BASE_URL .'?act=/' ?>">
                                    <img src="assets/img/logo/logo-adidas.webp" alt="Brand Logo">
                                </a>
                            </div>
                        </div>
                        <!-- start logo area -->

                        <!-- main menu area start -->
                        <div class="col-lg-6 position-static">
                            <div class="main-menu-area">
                                <div class="main-menu">
                                    <!-- main menu navbar start -->
                                    <nav class="desktop-menu">
                                        <ul>
                                            <li><a href="<?= BASE_URL ?>">Trang chủ</a>

                                            </li>

                                            <li><a href="<?= BASE_URL . './?act=list-san-pham' ?>">Sản phẩm <i class="fa fa-angle-down"></i></a>
                                            
                                                <ul class="dropdown">
                                                <?php foreach($listDanhMuc as $danhMuc){ ?>
                                                    <li><a href="<?php echo BASE_URL.'?act=list-san-pham-danh-muc&id_danh_muc='.$danhMuc['id'] ?>"><?php echo $danhMuc['ten_danh_muc'] ?></a></li>
                                                    <?php }?> 
                                                </ul>
                                               
                                            </li>
                                            <li><a href="<?= BASE_URL . '?act=gioi-thieu' ?>">Giới thiệu</a></li>
                                            <li><a href="<?= BASE_URL . '?act=lien-he' ?>">Liên hệ</a></li>
                                        </ul>
                                    </nav>
                                    <!-- main menu navbar end -->
                                </div>
                            </div>
                        </div>
                        <!-- main menu area end -->

                        <!-- mini cart area start -->
                        <div class="col-lg-4">
                            <div class="header-right d-flex align-items-center justify-content-xl-between justify-content-lg-end">
                                <div class="header-search-container">
                                    <button class="search-trigger d-xl-none d-lg-block"><i class="pe-7s-search"></i></button>
                                    <form action="<?php echo BASE_URL.'?act=bt-tim-kiem' ?>" method="POST" class="header-search-box d-lg-none d-xl-block">
                                        <input type="text" name="timkiem" placeholder="Tìm kiếm sản phẩm" class="header-search-field">
                                        <button type="submit" class="header-search-btn"><i class="pe-7s-search"></i></button>
                                    </form>
                                </div>
                                <div class="header-configure-area">
                                    <ul class="nav justify-content-end">
                                        <li class="user-hover">
                                            <label for=""><?php if(isset($_SESSION['user_client'])){ echo  $_SESSION['user_client']['email']
                                                ;} ?></label>
                                            <a href="#">
                                                <i class="pe-7s-user"></i>
                                            </a>
                                            <ul class="dropdown-list">
                                                <?php if (!isset($_SESSION['user_client'])) { ?>
                                                    <li><a href="<?= BASE_URL . '?act=form-dang-ky' ?>">Đăng ký</a></li>
                                                    <li><a href="<?= BASE_URL . '?act=form-login' ?>">Đăng nhập</a></li>
                                                    <li><a href="<?= BASE_URL_ADMIN ?>">Admin</a></li>

                                                <?php } else { ?>

                                                    <li><a href="<?= BASE_URL . '?act=lich-su-mua-hang' ?>">Đơn Hàng</a></li>
                                                    <li><a href="<?= BASE_URL . '?act=quen-mat-khau' ?>">Quên mật khẩu</a></li>

                                                    <li><a href="<?= BASE_URL_ADMIN ?>">Admin</a></li>
                                                    <li><a href="<?= BASE_URL . '?act=logout' ?>">Đăng xuất</a></li>

                                                <?php } ?>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#" class="minicart-btn">
                                                <i class="pe-7s-shopbag"></i>
                                                <div class="notification"><?php $so_luong = 0;foreach($chiTietGioHang as $item){
                                                    $so_luong = $so_luong += $item['so_luong'];
                    
                                                };echo $so_luong ?></div>
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

        <!-- mobile header start -->
        <!-- mobile header start -->
       
        <!-- mobile header end -->
        <!-- mobile header end -->

        <!-- offcanvas mobile menu start -->
        <!-- off-canvas menu start -->

        <!-- off-canvas menu end -->
        <!-- offcanvas mobile menu end -->
    </header>
    <!-- end Header Area -->