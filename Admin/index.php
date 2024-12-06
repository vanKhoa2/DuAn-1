<?php 
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/SanPhamController.php';
require_once './controllers/DanhMucController.php';
require_once './controllers/TaiKhoanController.php';
require_once './controllers/DonHangController.php';
require_once './controllers/BinhLuanController.php';
require_once './controllers/DashboardController.php';

// Require toàn bộ file Models
require_once './models/SanPham.php';
require_once './models/DanhMuc.php';
require_once './models/TaiKhoan.php';
require_once './models/DonHang.php';
require_once './models/BinhLuan.php';


// Route
$act = $_GET['act'] ?? '/';
if ($act !== 'login-admin' && $act !== 'check-login-admin' && $act !== 'logout-admin') {
    checkLoginAdmin();
}

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
     
    // Trang chủ
    '/' => (new DashboardController())->Home(), 
    'danh-muc'=> (new DanhMucController())->getAllDanhMuc(),
    // Route Sản Phẩm
    'san-pham' => (new SanPhamController())->getAllSanPham(),
    'form-add-san-pham' => (new SanPhamController())->formAddSanPham(),
    'post-add-san-pham' => (new SanPhamController())->postAddSanPham(),
    'form-edit-san-pham' => (new SanPhamController())->formEditSanPham(),
    'post-edit-san-pham' => (new SanPhamController())->postEditSanPham(),
    'delete-san-pham' => (new SanPhamController())->deleteSanPham(),
    'views-san-pham' => (new SanPhamController())->viewsSanPham(),
   
    // Route Danh Mục  
    'post-add-danh-muc' => (new DanhMucController())->postAddDanhMuc(), 
    'form-add-danh-muc' => (new DanhMucController())->formAddDanhMuc(), 
    'post-edit-danh-muc' => (new DanhMucController())->postEditDanhMuc(), 
    'form-edit-danh-muc' => (new DanhMucController())->formEditDanhMuc(), 
    'delete-danh-muc' => (new DanhMucController())->deleteDanhMuc(), 
    // Route Bình Luận
    'binh-luan' => (new BinhLuanController())->getAllBinhLuan(),
    // Route Tài Khoản
    'tai-khoan-admin' => (new TaiKhoanController())->getAllTaiKhoanAdmin(),
    'form-add-tai-khoan' => (new TaiKhoanController())->formAddTaiKhoan(),
    'post-add-tai-khoan' => (new TaiKhoanController())->postAddTaiKhoan(),
    'tai-khoan-user' => (new TaiKhoanController())->getAllTaiKhoanUser(),
    // 'post-edit-tai-khoan' => (new TaiKhoanController())->postEdidTaiKhoan(),
    'delete-tai-khoan' => (new TaiKhoanController())->deleteTaiKhoan(),
    // Route Giỏ Hàng, Đơn Hàng
    'don-hang' => (new DonHangController())->getAllDonHang(),
    'form-edit-don-hang' => (new DonHangController())->formEditDonHang(),
    'post-edit-don-hang' => (new DonHangController())->postEditDonHang(),
    'chi-tiet-don-hang' => (new DonHangController())->chiTietDonHang(),
    // 'post-edit-don-hang' => (new SanPhamController())->postEditDonHang(),
    // 'delete-don-hang' => (new SanPhamController())->deleteDonHang(),  
     

    //route auth
    'login-admin' => (new TaiKhoanController())->formLogin(),
    'check-login-admin' => (new TaiKhoanController())->login(),
    'logout-admin' => (new TaiKhoanController())->logout(),
    'delete-binh-luan'=> (new BinhLuanController())->deleteBinhLuan(),
};