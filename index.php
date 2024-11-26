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


// Require toàn bộ file Models
require_once './models/SanPham.php';
require_once './models/TaiKhoan.php';
// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ   
    '/' => (new HomeController()) ->home(),


    //San Pham
    'chi-tiet-san-pham' =>(new HomeController())->chiTietSanPham(),





    //route  Client

    'form-login' =>(new TaiKhoanControllerClient())->formLogin(),
    'check-login' =>(new TaiKhoanControllerClient())->postLogin(),
    
    'form-dang-ky' =>(new TaiKhoanControllerClient())->formDangKy(),
    'dang-ky' =>(new TaiKhoanControllerClient())->dangKy(),

    'logout' =>(new TaiKhoanControllerClient())->logoutClient()


};