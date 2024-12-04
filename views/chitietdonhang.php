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
                        <div class="col-lg-6">
                            <!-- Cart Table Area -->
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                           <th colspan="6" >Thông Tin Sản Phẩm</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                       <th>Hình Ảnh</th>
                                       <th>Tên Sản Phẩm</th>
                                       <th>Size</th>
                                       <th>Giá </th>
                                       <th>Số Lượng</th>
                                       <th>Thành Tiền</th>
                                       </tr>
                                       <?php foreach($chiTietDonHang as $item){ ?>
                                       <tr>
                                        <th><img height="100px" width="100px" src="<?php echo $item['hinh_anh'] ?>" alt=""></th>
                                        <th><?php echo $item['ten_san_pham'] ?></th>
                                        <th><?php echo $item['size'] ?></th>
                                        <th><?php echo $item['don_gia'] ?></th>
                                        <th><?php echo $item['so_luong'] ?></th>
                                        <th><?php echo $item['thanh_tien'] ?></th>
                                       </tr>
                                       <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Cart Update Option -->

                        </div>


                        <div class="col-lg-6">
                            <!-- Cart Table Area -->
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                       
                                        <tr>
                                           <th colspan="2" >Thông Tin Đơn Hàng</th>
                                        </tr>
                                
                                    </thead>
                                    <tbody>
                                    <tr>
                                       <th>Mã Đơn Hàng</th>
                                       <td><?php echo $donHang['ma_don_hang'] ?></td>
                                     <tr>
                                     <tr>
                                       <th>Người Nhận</th>
                                       <td><?php echo $donHang['ten_nguoi_nhan'] ?></td>
                                     <tr>
                                     <tr>
                                       <th>Email</th>
                                       <td><?php echo $donHang['email_nguoi_nhan'] ?></td>
                                     <tr>
                                     <tr>
                                       <th>Địa Chỉ</th>
                                       <td><?php echo $donHang['dia_chi_nguoi_nhan'] ?></td>
                                     <tr>
                                     <tr>
                                       <th>Ngày Đặt</th>
                                       <td><?php echo $donHang['ngay_dat'] ?></td>
                                     <tr>
                                     <tr>
                                       <th>Ghi Chú</th>
                                       <td><?php echo $donHang['ghi_chu'] ?></td>
                                     <tr>
                                     <tr>
                                       <th>Tổng Tiền</th>
                                       <td><?php echo $donHang['tong_tien'] ?></td>
                                     <tr>
                                     <tr>
                                       <th>Phương Thức Thanh Toán</th>
                                       <td><?php echo $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']]  ?></td>
                                     <tr>
                                     <tr>
                                       <th>Trạng Thái Đơn Hàng</th>
                                       <td><?php echo $trangThaiDonHang[$donHang['trang_thai_id']] ?></td>
                                     <tr>
                                 

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