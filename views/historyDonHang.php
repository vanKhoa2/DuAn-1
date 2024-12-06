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
                                    <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="shop.html">shop</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">bill</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- cart main wrapper start -->
        <div class="cart-main-wrapper section-padding">
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Cart Table Area -->
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="pro-thumbnail">Mã Đơn Hàng</th>
                                            <th class="pro-title">Ngày Đặt</th>
                                            <th class="pro-price">Tổng Tiền</th>
                                            <th class="pro-quantity">Phương Thức Thanh Toán</th></th>
                                            <th class="pro-subtotal">Trạng Thái</th>
                                            <th class="pro-remove">Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($donHang as $donHang){?>
                                         <tr>
                                            <td><?=$donHang['ma_don_hang']?></td>
                                            <td><?=$donHang['ngay_dat']?></td>
                                            <td><?=formatPrice($donHang['tong_tien'])?></td>
                                            <td><?=$phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']]  ?></td>
                                            <td><?=$trangThaiDonHang[$donHang['trang_thai_id']]?></td>
                                            <td>
                                                <a  href="<?php echo BASE_URL.  '?act=chi-tiet-don-hang&id='. $donHang['id']; ?>" class="btn btn-sqr ">Chi Tiết Đơn Hàng</a>
                                                <?php if($donHang['trang_thai_id'] == 1) { ?>
                                                    <a href="<?php echo BASE_URL.  '?act=huy-don-hang&id='. $donHang['id']; ?>" class="btn btn-sqr"
                                                     onclick="return confirm('Bạn Muốn Hủy Đơn Hàng')" >Hủy</a>
                                                    <?php } ?>
                                            </td>
                                         </tr>
                                         <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Cart Update Option -->

                        </div>
                    </div>
                 
                </div>
            </div>
        </div>
        <!-- cart main wrapper end -->
    </main>
<?php require_once "layout/footer.php" ?>