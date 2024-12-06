<?php require_once 'layout/header.php' ?>
<?php require_once 'layout/menu.php' ?>
<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="shop.html">shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">product details</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- page main wrapper start -->
    <div class="shop-main-wrapper section-padding pb-0">
        <div class="container">
            <div class="row">
                <!-- product details wrapper start -->
                <div class="col-lg-12 order-1 order-lg-2">
                    <!-- product details inner end -->
                    <div class="product-details-inner">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="product-large-slider">

                                    <div class="pro-large-img border" style="border-color: #d3d3d3;">
                                        <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product-details" />
                                    </div>

                                </div>
                                <div class="pro-nav slick-row-10 slick-arrow-style">
                                    <?php foreach ($listAnhSanPham as $key => $anhSanPham) { ?>
                                        <div class="pro-large-img">
                                            <img src="<?= BASE_URL . $anhSanPham['link_hinh_anh'] ?>" alt="product-details" />
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-des">

                                    <h3 class="product-name"><?= $sanPham['ten_san_pham'] ?></h3>
                                    <div class="ratings d-flex">
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <div class="pro-review">
                                            <span>1 Reviews</span>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <span class="price-regular"><?php echo formatPrice($sanPham['gia_khuyen_mai']) ?></span>
                                        <span class="price-old"><del><?php echo formatPrice($sanPham['gia_san_pham']) ?></del></span>
                                    </div>

                                    <p class="pro-desc"><?php echo $sanPham['mo_ta'] ?></p>
                                    <form action="<?php echo BASE_URL . '?act=add-cart' ?>" method="POST">
                                        <div class="quantity-cart-box d-flex align-items-center">
                                            <h6 class="option-title">Số lượng</h6>
                                            <div class="quantity">
                                                <input hidden type="text" name="san_pham_id" value="<?php echo $sanPham['id'] ?>" id="">
                                                <div class="pro-qty"><input type="text" name="so_luong" value="1"></div>
                                           
                                            </div>
                                            <div class="quantity">
                                            <div class="size-select">
                                                    <select class="form-select" name="size" required>
                                                        <option value="" disabled selected>Chọn size</option>
                                                        <option value="40">Size 40</option>
                                                        <option value="41">Size 41</option>
                                                        <option value="42">Size 42</option>
                                                        <option value="43">Size 43</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="action_link">
                                                <button class="btn btn-cart2">Thêm Giỏ Hàng</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="useful-links">
                                        <a href="#" data-bs-toggle="tooltip" title="Compare"><i
                                                class="pe-7s-refresh-2"></i>compare</a>
                                        <a href="#" data-bs-toggle="tooltip" title="Wishlist"><i
                                                class="pe-7s-like"></i>wishlist</a>
                                    </div>
                                    <div class="like-icon">
                                        <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                        <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                        <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                        <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details inner end -->

                    <!-- product details reviews start -->
                    <div class="product-details-reviews section-padding pb-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="product-review-info">
                                    <ul class="nav review-tab">
                                        <li>
                                            <a class="active" data-bs-toggle="tab" href="#tab_one">Bình Luân</a>
                                        </li>

                                    </ul>
                                    <div class="tab-content reviews-tab">
                                        <div class="tab-pane fade show active" id="tab_one">
                                            <?php foreach ($listBinhLuan as $binhLuan) { ?>
                                                <div class="total-reviews">

                                                    <div class="rev-avatar">
                                                        <img src="<?php echo BASE_URL . $binhLuan['anh_dai_dien'] ?>" alt="">
                                                    </div>
                                                    <div class="review-box">


                                                        <div class="post-author">
                                                            <p><span>Khách Hàng -</span> <?php echo $binhLuan['ngay_dang'] ?></p>
                                                        </div>
                                                        <p><?php echo $binhLuan['noi_dung'] ?></p>
                                                    </div>

                                                </div>
                                            <?php  } ?>
                                            <form action="<?php echo BASE_URL . '?act=post-binh-luan&id_san_pham=' . $sanPham['id'] ?>" method="POST" class="review-form">
                                                <div class="form-group row">

                                                    <label class="col-form-label"><span class="text-danger">*</span>
                                                        Bình Luận</label>
                                                    <textarea class="form-control" name="noi_dung" required></textarea>
                                                </div>
                                        </div>
                                        <div class="buttons">
                                            <button class="btn btn-sqr" type="submit">Bình Luận</button>
                                        </div>
                                        </form> <!-- end of review-form -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- product details reviews end -->
        </div>
        <!-- product details wrapper end -->
    </div>
    </div>
    </div>
    <!-- page main wrapper end -->

    <!-- related products area start -->
    <section class="related-products section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">Sản Phẩm Liên Quan</h2>
                        <p class="sub-title">Add related products to weekly lineup</p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                    <?php foreach($listSanPhamCungDanhMuc as $sanPham){ ?>
                                        <!-- product item start -->
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                
                                                <a href="<?php echo BASE_URL.'?act=chi-tiet-san-pham&id_san_pham='.$sanPham['id'] ?>">
                                                <img style="width: 300px; height: 200px;" class="pri-img" src="<?php echo BASE_URL. $sanPham['hinh_anh'] ?>" alt="product">
                                                <img style="width: 300px; height: 200px;" class="sec-img" src="<?php echo BASE_URL. $sanPham['hinh_anh'] ?>" alt="product">
                                                </a>
                                                <div class="product-badge">
                                                    <div class="product-label new">
                                                        <span>sale</span>
                                                    </div>
                                                    <div class="product-label discount">
                                                        <span>new</span>
                                                    </div>
                                                </div>
                                                <div class="button-group">
                                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                                    <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                                </div>
                                                <div class="cart-hover">
                                                   <a class="btn btn-cart" href="<?php echo BASE_URL.'?act=chi-tiet-san-pham&id_san_pham='.$sanPham['id'] ?>">Xem Chi Tiết</a>
                                                </div>
                                            </figure>
                                            <div class="product-caption text-center">
                                            
                                               
                                                <h6 class="product-name">
                                                    <a href="product-details.html"><?php echo $sanPham['ten_san_pham'] ?></a>
                                                </h6>
                                                <div class="price-box">
                                                    <span class="price-regular"><?php echo formatPrice($sanPham['gia_khuyen_mai'] )?></span>
                                                    <span class="price-old"><del><?php echo formatPrice($sanPham['gia_san_pham']) ?></del></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product item end -->
                                        <?php } ?>

               
                        <!-- product item end -->

                        <!-- product item start -->
                     
                        <!-- product item end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- related products area end -->
</main>

<?php require_once 'layout/footer.php' ?>