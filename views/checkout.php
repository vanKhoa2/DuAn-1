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
                                <li class="breadcrumb-item active" aria-current="page">checkout</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- checkout main wrapper start -->
    <div class="checkout-page-wrapper section-padding">
        <div class="container">
            <div class="row">

            </div>
            <form action="<?php echo BASE_URL . '?act=post-check-out' ?>" method="POST" >
            <div class="row">
                <!-- Checkout Billing Details -->
                <div class="col-lg-6">
                    <div class="checkout-billing-details-wrap">
                        <h5 class="checkout-title">Thông Tin Người Nhận</h5>
                        <div class="billing-form-wrap">
                  
                                <div class="row">
                                    <div class="single-input-item">
                                        <label for="f_name" class="required">Họ Tên</label>
                                        <input name="ten_nguoi_nhan" type="text" id="f_name" value="<?php echo $user['ho_ten'] ?>" placeholder="Nhập họ và tên" required="">
                                    </div>
                                </div>

                                <div class="single-input-item">
                                    <label for="email" class="required">Email Address</label>
                                    <input type="email" id="email" name="email_nguoi_nhan" value="<?php echo $user['email'] ?>" placeholder="Hãy nhập email" required="">
                                </div>

                                <div class="single-input-item">
                                    <label for="com-name">Số điện thoại</label>
                                    <input type="text" name="sdt_nguoi_nhan" id="com-name" value="<?php echo $user['so_dien_thoai'] ?>" required="" placeholder="Hãy nhập số điện thoại">
                                </div>

                                <div class="single-input-item">
                                    <label for="street-address" class="required mt-20">Địa Chỉ</label>
                                    <input type="text" name="dia_chi_nguoi_nhan" id="street-address" value="<?php echo $user['dia_chi'] ?>" required="" placeholder="Hãy nhập địa chỉ" required="">
                                </div>


                                <div class="single-input-item">
                                    <label for="ordernote">Ghi Chú</label>
                                    <textarea name="ghi_chu" id="ordernote" cols="30" rows="3" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                            
                        </div>
                    </div>
                </div>

                <!-- Order Summary Details -->
                <div class="col-lg-6">
                    <div class="order-summary-details">
                        <h5 class="checkout-title">Thông tin sản phẩm</h5>
                        <div class="order-summary-content">
                            <!-- Order Summary Table -->
                            <div class="order-summary-table table-responsive text-center">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sản Phẩm </th>
                                            <th>Tổng</th>
                                        </tr>
                                    </thead>    
                                    <tbody>
                                        <?php $tongGioHang =0; foreach($chiTietGioHang as $sanPham){ ?>
                                        <tr>

                                            <td><div style="margin-left: auto;" ><?php echo $sanPham['ten_san_pham'] ?> </div>
                                            <div style="margin-right: auto;">Size:<?php echo $sanPham['size'] ?></div>
                                            </td>
                                            
                                            <td><?php 
                                                 $tongTien = 0;
                                                 if($sanPham['gia_khuyen_mai']){
                                                    $tongTien = $sanPham['gia_khuyen_mai']*$sanPham['so_luong'];
                                                 }
                                                 else{
                                                    $tongTien = $sanPham['gia_san_pham']*$sanPham['so_luong'];
                                                 }
                                                 $tongGioHang += $tongTien;
                                                 echo formatPrice($tongTien)
                                               
                                             ?></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>Tổng Tiền</td>
                                            <td><strong><?php echo formatPrice($tongGioHang)?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Shipping</td>
                                            <td class="d-flex justify-content-center">
                                                <strong>30.000đ</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tổng Tiền</td>
                                            <input type="" name='tong_tien' hidden value="<?php echo $tongGioHang+30000 ?>">
                                            <td><strong><?php echo formatPrice($tongGioHang+30000) ?></strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- Order Payment Method -->
                            <div class="order-payment-method">
                                <div class="single-payment-method show">
                                    <div class="payment-method-name">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="cashon" name="phuong_thuc_thanh_toan_id" value="1" class="custom-control-input" checked="">
                                            <label class="custom-control-label" for="cashon">Thanh Toán Khi Nhận Hàng</label>
                                        </div>
                                    </div>
                                  
                                </div>
                                <div class="single-payment-method">
                                    <div class="payment-method-name">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="directbank" name="phuong_thuc_thanh_toan_id" value="2" class="custom-control-input">
                                            <label class="custom-control-label" for="directbank">Thanh Toán Online</label>
                                        </div>
                                    </div>
                                  
                                </div>
                
                                <div class="summary-footer-area">
                                    <div class="custom-control custom-checkbox mb-20">
                                        <input type="checkbox" class="custom-control-input" id="terms" required="">
                                        <label class="custom-control-label" for="terms">Xác nhận đặt hàng </label>
                                    </div>
                                    <button type="submit" class="btn btn-sqr">Tiến Hành Đặt Hàng</button>
                                </div>
                       
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- checkout main wrapper end -->
</main>

<?php require_once "layout/footer.php" ?>