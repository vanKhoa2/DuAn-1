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
                                    <li class="breadcrumb-item active" aria-current="page">cart</li>
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
                                            <th class="pro-thumbnail">Ảnh Sản Phẩm</th>
                                            <th class="pro-title">Tên Sản Phẩm</th>
                                            <th>Size</th>
                                            <th class="pro-price">Giá Tiền</th>
                                            <th class="pro-quantity">Số lượng</th>
                                            <th class="pro-subtotal">Tổng tiền</th>
                                            <th class="pro-remove">Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $tongGioHang = 0;
                                         foreach($chiTietGioHang as $sanPham) {?>
                                        <tr>
                                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="<?php echo BASE_URL. $sanPham['hinh_anh'] ?>" alt="Product" /></a></td>
                                            <td class="pro-title"><?php echo $sanPham['ten_san_pham'] ?></td>
                                            <td class="pro-title"><?php echo $sanPham['size'] ?></td>
                                            
                                            <td class="pro-price"><span><?php if($sanPham['gia_khuyen_mai']){
                                                echo formatPrice($sanPham['gia_san_pham']);
                                            }else{
                                                echo formatPrice($sanPham['gia_san_pham']);
                                            } ?></span></td>
                                            <td class="pro-quantity">
                                                <div class="pro-qty"><input type="text" value="<?php echo $sanPham['so_luong'] ?>"></div>
                                            </td>
                                            <td class="pro-subtotal"><span><?php 
                                                 $tongTien = 0;
                                                 if($sanPham['gia_khuyen_mai']){
                                                    $tongTien = $sanPham['gia_khuyen_mai']*$sanPham['so_luong'];
                                                 }
                                                 else{
                                                    $tongTien = $sanPham['gia_san_pham']*$sanPham['so_luong'];
                                                 }
                                                 $tongGioHang += $tongTien;
                                                 echo formatPrice($tongTien)
                                               
                                             ?></span></td>
                                            <td class="pro-remove"><a href="<?php echo BASE_URL . '?act=delete-san-pham-gio-hang&id_chi_tiet_gio_hang='.$sanPham['id'] ?>"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Cart Update Option -->
                            <div class="cart-update-option d-block d-md-flex justify-content-between">
                           
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 ml-auto">
                            <!-- Cart Calculation Area -->
                            <div class="cart-calculator-wrapper">
                                <div class="cart-calculate-items">
                                    <h6>Cart Totals</h6>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <td>Tổng tiền Sản phẩm</td>
                                                <td><?php echo formatPrice($tongGioHang) ?></td>
                                            </tr>
                                            <tr>
                                                <td>Phí Vận CHuyển</td>
                                                <td>30.000đ</td>
                                            </tr>
                                            <tr class="total">
                                                <td>Tổng Tiền</td>
                                                <td class="total-amount"><?php echo formatPrice($tongGioHang+30000) ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <a href="<?php echo BASE_URL . '?act=check-out' ?>" class="btn btn-sqr d-block">Tiến Hành Thanh Toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart main wrapper end -->
    </main>
<?php if (isset($_SESSION['error'])) {
    
 
echo "<script>alert('" . $_SESSION['error'] . "');</script>";
 
unset($_SESSION['error']); // Clear the session message after it's displayed
}?>
<?php require_once "layout/footer.php" ?>