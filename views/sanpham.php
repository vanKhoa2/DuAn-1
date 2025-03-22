<?php
require_once "layout/header.php";
require_once "layout/menu.php";
?>

<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">shop</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- page main wrapper start -->
    <div class="shop-main-wrapper section-padding">
        <div class="container">
            <div class="row">
                <!-- sidebar area start -->
                <div class="col-lg-3 order-2 order-lg-1">
                    <aside class="sidebar-wrapper">
                        <!-- single sidebar start -->
                        <div class="sidebar-single">
                            <h5 class="sidebar-title">Danh mục sản phẩm</h5>
                            <div class="sidebar-body">

                                <ul class="shop-categories">
                                    <?php foreach ($listDanhMuc as $danhMuc) { ?>
                                        <li><a href="<?php echo BASE_URL . '?act=list-san-pham-danh-muc&id_danh_muc=' . $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></a></li>
                                    <?php } ?>
                                </ul>

                            </div>
                        </div>
                        <!-- single sidebar end -->

                        <!-- single sidebar start -->
                        <div class="sidebar-single">
                            <h5 class="sidebar-title">Giá</h5>
                            <div class="sidebar-body">
                                <div class="price-range-wrap">
                                    <form action="<?php echo BASE_URL . '?act=bt-price' ?>" method="POST" class="price-form">
                                        <!-- Phần nhập giá -->
                                        <div class="price-input">
                                            <label for="min-price">Min Price: </label>
                                            <input name="min-price" type="number" id="min-price" placeholder="Min Price" min="0">
                                        </div>
                                        <div class="price-input">
                                            <label for="max-price">Max Price: </label>
                                            <input name="max-price" type="number" id="max-price" placeholder="Max Price" min="0">
                                        </div>

                                        <!-- Nút filter ở dưới -->
                                        <div class="filter-btn-container">
                                            <button type="submit" class="filter-btn">Filter</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- single sidebar end -->
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                        <!-- single sidebar end -->

                        <!-- single sidebar start -->

                        <!-- single sidebar end -->

                        <!-- single sidebar start -->

                        <!-- single sidebar end -->

                        <!-- single sidebar start -->
                        <!-- <div class="sidebar-banner">
                                <div class="img-container">
                                    <a href="#">
                                        <img src="assets/img/banner/sidebar-banner.jpg" alt="">
                                    </a>
                                </div>
                            </div> -->
                        <!-- single sidebar end -->
                    </aside>
                </div>
                <!-- sidebar area end -->

                <!-- shop main wrapper start -->
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="shop-product-wrapper">
                        <!-- shop product top wrap start -->
                        <div class="shop-top-bar">
                            <h3>Danh Sách Sản Phẩm</h3>
                            <hr>
                            <br>
                        </div>
                        <!-- shop product top wrap start -->

                        <!-- product item list wrapper start -->
                        <div class="shop-product-wrap grid-view row mbn-30">
                            <?php $phan_tram = 0;
                            foreach ($listSanPham as $sanPham) { ?>
                                <div class="col-md-4 col-sm-6">
                                    <!-- product grid start -->

                                    <div class="product-item">

                                        <figure class="product-thumb">
                                            <a href="<?php echo BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                                                <img style="width: 300px; height: 200px;" st class="pri-sec" src="<?php echo BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                                            </a>
                                            <div class="product-badge">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-label discount">
                                                    <span><?php $phan_tram =( 100 - ($sanPham['gia_khuyen_mai'] / $sanPham['gia_san_pham']) * 100);
                                                            echo round($phan_tram) ?>%</span>
                                                </div>
                                            </div>
                                            <div class="button-group">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                                <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                            </div>
                                            <div class="cart-hover">
                                                <a class="btn btn-cart" href="<?php echo BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">Xem Chi Tiết</a>
                                            </div>

                                        </figure>
                                        <div class="product-caption text-center">

                                            <h6 class="product-name">
                                                <a href="product-details.html"><?php echo $sanPham['ten_san_pham']; ?></a>
                                            </h6>
                                            <div class="price-box">
                                                <span class="price-regular"><?php echo formatPrice($sanPham['gia_khuyen_mai']); ?></span>
                                                <span class="price-old"><del><?php echo formatPrice($sanPham['gia_san_pham']); ?></del></span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- product grid end -->

                                    <!-- product list item end -->

                                    <!-- product list item end -->
                                </div>
                            <?php } ?>


                            <!-- product single item start -->

                            <!-- product single item start -->

                            <!-- product single item start -->

                            <!-- product single item start -->

                            <!-- product single item start -->


                            <!-- product single item start -->


                            <!-- product single item start -->

                            <!-- product single item start -->

                            <!-- product single item start -->


                            <!-- product single item start -->


                            <!-- product single item start -->

                            <!-- product single item start -->

                            <!-- product single item start -->

                            <!-- product single item start -->

                            <!-- product single item start -->

                            <!-- product single item start -->

                            <!-- product single item start -->

                            <!-- product single item start -->

                            <!-- product single item start -->

                            <!-- product single item start -->

                            <!-- product single item start -->

                            <!-- product single item start -->

                            <!-- product single item start -->

                            <!-- product single item start -->

                            <!-- product single item start -->

                        </div>
                        <!-- product item list wrapper end -->

                        <!-- start pagination area -->
                        <!-- <div class="paginatoin-area text-center">
                                <ul class="pagination-box">
                                    <li><a class="previous" href="#"><i class="pe-7s-angle-left"></i></a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a class="next" href="#"><i class="pe-7s-angle-right"></i></a></li>
                                </ul>
                            </div> -->
                        <!-- end pagination area -->
                    </div>
                </div>
                <!-- shop main wrapper end -->
            </div>
        </div>
    </div>
    <!-- page main wrapper end -->
</main>
<style>
    .price-range-wrap {
        width: 100%;
        margin: 20px 0;
    }

    .price-form {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .price-input {
        margin-bottom: 15px;
    }

    .price-input label {
        display: block;
        margin-bottom: 5px;
        font-size: 14px;
    }

    .price-input input {
        padding: 8px;
        width: 200px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .filter-btn-container {
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .filter-btn {
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .filter-btn:hover {
        background-color: #0056b3;
    }
</style>

<script>
    $(document).ready(function() {
        // Gán slider với input
        $(".price-range").slider({
            range: true,
            min: 1, // Giá trị nhỏ nhất
            max: 100000000, // Giá trị lớn nhất
            step: 1000, // Bước nhảy
            values: [1, 1000000], // Giá trị mặc định
            slide: function(event, ui) {
                // Cập nhật giá trị min-price và max-price khi người dùng kéo slider
                $("#min-price").val("₫" + ui.values[0]);
                $("#max-price").val("₫" + ui.values[1]);
                // Gửi giá trị min và max khi submit form
                $("input[name='min-price']").val(ui.values[0]);
                $("input[name='max-price']").val(ui.values[1]);
            }
        });

        // Hiển thị giá trị mặc định trong các input
        $("#min-price").val("₫" + $(".price-range").slider("values", 0));
        $("#max-price").val("₫" + $(".price-range").slider("values", 1));
    });
</script>

<?php require_once "layout/footer.php" ?>