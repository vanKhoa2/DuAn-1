<?php require_once 'layout/header.php' ?>
<?php require_once 'layout/menu.php' ?>
<main>
    <!-- hero slider area start -->
    <!-- <section class="hero-slider-area">
        <div class="container custom-container p-0">
            <div class="hero-slider-active-4 slick-dot-style">
                <div class="slider-item">
                    <a href="shop.html">
                        <figure class="slider-thumb">
                            <img src="assets/img/banner/banner2.jpg" alt="">
                        </figure>
                        <div class="slider-item-content">
                            <h2>new collection</h2>
                            <h3>Jewelry 2024</h3>
                            <div class="btn btn-text">shop now</div>
                        </div>
                    </a>
                </div>
                <div class="slider-item">
                    <a href="shop.html">
                        <figure class="slider-thumb">
                            <img src="assets/img/banner/banner1.webp" alt="" style="width: 100%;">
                        </figure>
                        <div class="slider-item-content">
                            <h2>top collection</h2>
                            <h3>Jewelry 2022</h3>
                            <div class="btn btn-text">shop now</div>
                        </div>
                    </a>
                </div>
                <div class="slider-item">
                    <a href="shop.html">
                        <figure class="slider-thumb">
                            <img src="assets/img/banner/banner3.webp" alt="">
                        </figure>
                        <div class="slider-item-content">
                            <h2>best collection</h2>
                            <h3>Jewelry 2022</h3>
                            <div class="btn btn-text">shop now</div>
                        </div>
                    </a>
                </div>             
            </div>
        </div>
    </section> -->
    <section class="slider-area">
        <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
            <!-- single slider item start -->
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="assets/img/banner/banner5.png">
                    <div class="container">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
            <!-- single slider item start -->
            <!-- single slider item start -->
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="assets/img/banner/banner2.jpg">
                    <div class="container">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
            <!-- single slider item start -->

            <!-- single slider item start -->
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="assets/img/banner/banner6.jpg">
                    <div class="container">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
            <!-- single slider item start -->
        </div>
    </section>
    <!-- hero slider area end -->

    <!-- service policy area start -->
    <div class="service-policy">
        <div class="container">
            <div class="policy-block section-padding">
                <div class="row mtn-30">
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-plane"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Giao hàng</h6>
                                <p>Miễn phí giao hàng</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-help2"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Hỗ trợ</h6>
                                <p>Hỗ trợ 24/7</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-back"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Hoàn tiền</h6>
                                <p>Hoàn tiền trong 30 ngày</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-credit"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Thanh toán</h6>
                                <p>Bảo mật thanh toán</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service policy area end -->


    <!-- product area start -->
    <section class="product-area section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center"><br>
                        <h2 class="title">Sản phẩm của chúng tôi </h2>
                        <p class="sub-title">Sản phẩm của chúng tôi được cập nhật liên tục</p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-container">

                        <!-- product tab menu end -->

                        <!-- product tab content start -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab1">
                                <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                    <!-- product item start -->

                                    <?php foreach ($listSanPham as $key => $sanPham): ?>
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham='  . $sanPham['id'] ?>">
                                                    <img class="pri-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                                                    <img class="sec-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                                                </a>
                                                <div class="product-badge">
                                                    <?php
                                                    $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                                    $ngayHienTai = new DateTime();
                                                    $tinhNgay = $ngayHienTai->diff($ngayNhap);
                                                    if ($tinhNgay->days <= 7) {    ?>

                                                        <div class="product-label new">
                                                            <span>Mới</span>
                                                        </div>
                                                    <?php } ?>
                                                    <?php if ($sanPham['gia_khuyen_mai'] > 0) { ?>
                                                        <div class="product-label discount">
                                                            <span>Giảm giá</span>
                                                        </div>
                                                    <?php } ?>

                                                </div>

                                                <div class="cart-hover">
                                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                                                        <button class="btn btn-cart">Xem chi tiết</button>
                                                    </a>

                                                </div>
                                            </figure>
                                            <div class="product-caption">
                                                <h6 class="product-name">
                                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>"><?= $sanPham['ten_san_pham'] ?></a>
                                                </h6>
                                                <div class="price-box">
                                                    <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                                        <span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ'; ?></span>
                                                        <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) . 'đ'; ?></del></span>
                                                    <?php } else { ?>
                                                        <span class="price-regular"><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></span>
                                                    <?php }    ?>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endforeach  ?>
                                    <!-- product item end -->
                                </div>
                            </div>
                        </div>
                        <!-- product tab content end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product area end -->



    <!-- featured product area start -->
    <section class="feature-product section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">Sản phẩm nổi bật</h2>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-carousel-4_2 slick-row-10 slick-arrow-style">
                        <!-- product item start -->
                        <figure class="product-thumb">
                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham='  . $sanPham['id'] ?>">
                                <img class="pri-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                                <img class="sec-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                            </a>
                            <div class="product-badge">
                                <?php
                                $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                $ngayHienTai = new DateTime();
                                $tinhNgay = $ngayHienTai->diff($ngayNhap);
                                if ($tinhNgay->days <= 7) {    ?>

                                    <div class="product-label new">
                                        <span>Mới</span>
                                    </div>
                                <?php } ?>
                                <?php if ($sanPham['gia_khuyen_mai'] > 0) { ?>
                                    <div class="product-label discount">
                                        <span>Giảm giá</span>
                                    </div>
                                <?php } ?>

                            </div>

                            <div class="cart-hover">
                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                                    <button class="btn btn-cart">Xem chi tiết</button>
                                </a>
                            </div>
                        </figure>
                        <div class="product-caption">
                            <h6 class="product-name">
                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>"><?= $sanPham['ten_san_pham'] ?></a>
                            </h6>
                            <div class="price-box">
                                <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                    <span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ'; ?></span>
                                    <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) . 'đ'; ?></del></span>
                                <?php } else { ?>
                                    <span class="price-regular"><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></span>
                                <?php }    ?>
                            </div>
                        </div>

                        <!-- product item start -->
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="product-details.html">
                                    <img class="pri-img" src="assets/img/product/product-1.jpg" alt="product">
                                    <img class="sec-img" src="assets/img/product/product-18.jpg" alt="product">
                                </a>
                                <div class="product-badge">
                                    <div class="product-label new">
                                        <span>Mới</span>
                                    </div>
                                    
                                </div>
                                <div class="button-group">
                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                    <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                </div>
                                <div class="cart-hover">
                                    <button class="btn btn-cart">Xem chi tiết</button>
                                </div>
                            </figure>
                            <div class="product-caption">
                                <div class="product-identity">
                                   
                                </div>
                                <h6 class="product-name">
                                    <a href="product-details.html">Perfect Diamond Jewelry</a>
                                </h6>
                                <div class="price-box">
                                    <span class="price-regular">$60.00</span>
                                    <span class="price-old"><del>$70.00</del></span>
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="product-details.html">
                                    <img class="pri-img" src="assets/img/product/product-1.jpg" alt="product">
                                    <img class="sec-img" src="assets/img/product/product-18.jpg" alt="product">
                                </a>
                                <div class="product-badge">
                                    <div class="product-label new">
                                        <span>Mới</span>
                                    </div>
                                    <div class="product-label discount">
                                        
                                    </div>
                                </div>
                                <div class="button-group">
                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                    <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                </div>
                                <div class="cart-hover">
                                    <button class="btn btn-cart">Xem chi tiết</button>
                                </div>
                            </figure>
                            <div class="product-caption">
                                <div class="product-identity">
                                    
                                </div>
                                <h6 class="product-name">
                                    <a href="product-details.html">Perfect Diamond Jewelry</a>
                                </h6>
                                <div class="price-box">
                                    <span class="price-regular">$60.00</span>
                                    <span class="price-old"><del>$70.00</del></span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- product item end -->

                        <!-- product item start -->
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="product-details.html">
                                    <img class="pri-img" src="assets/img/product/product-2.jpg" alt="product">
                                    <img class="sec-img" src="assets/img/product/product-17.jpg" alt="product">
                                </a>
                                <div class="product-badge">
                                    <div class="product-label new">
                                        <span>Giảm giá</span>
                                    </div>
                                    <div class="product-label discount">
                                        <span>20%</span>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                    <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                </div>
                                <div class="cart-hover">
                                    <button class="btn btn-cart">Xem chi tiết</button>
                                </div>
                            </figure>
                            <div class="product-caption">
                                <div class="product-identity">
                                   
                                </div>
                                <h6 class="product-name">
                                    <a href="product-details.html">Handmade Golden Necklace</a>
                                </h6>
                                <div class="price-box">
                                    <span class="price-regular">$50.00</span>
                                    <span class="price-old"><del>$80.00</del></span>
                                </div>
                            </div>
                        </div>
                        <!-- product item end -->

                        <!-- product item start -->
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="product-details.html">
                                    <img class="pri-img" src="assets/img/product/product-3.jpg" alt="product">
                                    <img class="sec-img" src="assets/img/product/product-16.jpg" alt="product">
                                </a>
                                <div class="product-badge">
                                    <div class="product-label new">
                                        <span>Mới</span>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                    <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                </div>
                                <div class="cart-hover">
                                    <button class="btn btn-cart">Xem chi tiết</button>
                                </div>
                            </figure>
                            <div class="product-caption">
                                
                                <h6 class="product-name">
                                    <a href="product-details.html">Perfect Diamond Jewelry</a>
                                </h6>
                                <div class="price-box">
                                    <span class="price-regular">$99.00</span>
                                    <span class="price-old"><del></del></span>
                                </div>
                            </div>
                        </div>
                        <!-- product item end -->

                        <!-- product item start -->
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="product-details.html">
                                    <img class="pri-img" src="assets/img/product/product-4.jpg" alt="product">
                                    <img class="sec-img" src="assets/img/product/product-15.jpg" alt="product">
                                </a>
                                <div class="product-badge">
                                    <div class="product-label new">
                                        <span>Giảm giá</span>
                                    </div>
                                    <div class="product-label discount">
                                        <span>15%</span>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                    <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                </div>
                                <div class="cart-hover">
                                    <button class="btn btn-cart">Xem chi tiết</button>
                                </div>
                            </figure>
                            <div class="product-caption">
                               
                                <h6 class="product-name">
                                    <a href="product-details.html">Diamond Exclusive Ornament</a>
                                </h6>
                                <div class="price-box">
                                    <span class="price-regular">$55.00</span>
                                    <span class="price-old"><del>$75.00</del></span>
                                </div>
                            </div>
                        </div>
                        <!-- product item end -->

                        <!-- product item start -->
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="product-details.html">
                                    <img class="pri-img" src="assets/img/product/product-5.jpg" alt="product">
                                    <img class="sec-img" src="assets/img/product/product-14.jpg" alt="product">
                                </a>
                                <div class="product-badge">
                                    <div class="product-label new">
                                        <span>Mới</span>
                                    </div>
                                    <div class="product-label discount">
                                        <span>Giảm giá 20%</span>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                    <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                </div>
                                <div class="cart-hover">
                                    <button class="btn btn-cart">Xem chi tiết</button>
                                </div>
                            </figure>
                            <div class="product-caption">
                                <div class="product-identity">
                                   
                                </div>
                                <h6 class="product-name">
                                    <a href="product-details.html">Citygold Exclusive Ring</a>
                                </h6>
                                <div class="price-box">
                                    <span class="price-regular">$60.00</span>
                                    <span class="price-old"><del>$70.00</del></span>
                                </div>
                            </div>
                        </div>
                        <!-- product item end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- brand logo area start -->
    <div class="brand-logo section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand-logo-carousel slick-row-10 slick-arrow-style">
                        <!-- single brand start -->
                        <div class="brand-item">
                            <a href="#">
                                <img src="assets/img/brand/1.png" alt="">
                            </a>
                        </div>
                        <!-- single brand end -->

                        <!-- single brand start -->
                        <div class="brand-item">
                            <a href="#">
                                <img src="assets/img/brand/2.png" alt="">
                            </a>
                        </div>
                        <!-- single brand end -->

                        <!-- single brand start -->
                        <div class="brand-item">
                            <a href="#">
                                <img src="assets/img/brand/3.png" alt="">
                            </a>
                        </div>
                        <!-- single brand end -->

                        <!-- single brand start -->
                        <div class="brand-item">
                            <a href="#">
                                <img src="assets/img/brand/4.png" alt="">
                            </a>
                        </div>
                        <!-- single brand end -->

                        <!-- single brand start -->
                        <div class="brand-item">
                            <a href="#">
                                <img src="assets/img/brand/5.png" alt="">
                            </a>
                        </div>
                        <!-- single brand end -->

                        <!-- single brand start -->
                        <div class="brand-item">
                            <a href="#">
                                <img src="assets/img/brand/6.png" alt="">
                            </a>
                        </div>
                        <!-- single brand end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brand logo area end -->
</main>
<?php require_once 'layout/footer.php' ?>