<?php 
session_start();

// tạo chuỗi password mã hóa đơn giản
// // sau này làm đăng ký cần thêm code này vào 
// $p = password_hash("123", PASSWORD_DEFAULT);
// echo $p;


// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/TaiKhoanController.php';
require_once './controllers/CheckOutController.php';


// Require toàn bộ file Models
require_once './models/SanPham.php';
require_once './models/TaiKhoan.php';
require_once './models/CheckOut.php';
require_once './models/Cart.php';
require_once './models/DonHang.php';
// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ   
    '/' => (new HomeController()) ->home(), 
    'lien-he' =>(new HomeController())->lienhe(),
    'gioi-thieu' =>(new HomeController())->gioithieu(),


    //San Pham
    'list-san-pham' => (new HomeController())->listSanPham(),
    'chi-tiet-san-pham' =>(new HomeController())->chiTietSanPham(),
    'list-san-pham-danh-muc' => (new HomeController())->listSanPhamByDanhMuc(), 
    'check-out'=> (new CheckOutController())->CheckOut(),
    'post-check-out'=> (new CheckOutController())->postCheckOut(),
    'cart'=> (new HomeController())->gioHang(),
    'add-cart'=> (new HomeController())->addCart(),
    'lich-su-mua-hang'=> (new HomeController())->lichSuMuaHang(),
    'chi-tiet-don-hang'=> (new HomeController())->chiTietMuaHang(),
    'huy-don-hang'=> (new HomeController())->huyDonHang(),
    //route  Client
     'form-re-pass'=>(new TaiKhoanControllerClient())->formQuenPass(),
    'form-login' =>(new TaiKhoanControllerClient())->formLogin(),
    'check-login' =>(new TaiKhoanControllerClient())->postLogin(),
    'check-quen-pass'=>(new TaiKhoanControllerClient())->checkQuenPass(),
    'form-dang-ky' =>(new TaiKhoanControllerClient())->formDangKy(),
    'dang-ky' =>(new TaiKhoanControllerClient())->dangKy(),
     'quen-pass'=>(new TaiKhoanControllerClient())->quenPass(),
    'logout' => (new TaiKhoanControllerClient())->logoutClient(),
    // // Route thanh toán , giỏ hàng

    //
    'bt-tim-kiem' => (new HomeController())->search(),
    'post-binh-luan'=>(new HomeController())->addBinhLuan(),
    'delete-san-pham-gio-hang'=>(new HomeController())->deleteSanPhamGioHang(),
    'update-pass'=> (new TaiKhoanControllerClient())->postUpdatePass(),
    'bt-price'=>(new HomeController())->searchPrice(),
    
};

