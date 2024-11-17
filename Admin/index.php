<?php 
session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/SanPhamController.php';
require_once './controllers/DanhMucController.php';
require_once './controllers/TaiKhoanController.php';


// Require toàn bộ file Models
require_once './models/SanPham.php';
require_once './models/DanhMuc.php';
require_once './models/TaiKhoan.php';
// require_once './models/SanPham.php';
// require_once './models/SanPham.php';


// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
     
    // Trang chủ
    '/' => (new DanhMucController())->getAllDanhMuc(), 
    
    // Route Sản Phẩm
    'san-pham' => (new SanPhamController())->getAllSanPham(),
    'form-add-san-pham' => (new SanPhamController())->formAddSanPham(),
    'post-add-san-pham' => (new SanPhamController())->postAddSanPham(),
    'form-edit-san-pham' => (new SanPhamController())->formEditSanPham(),
    'post-edit-san-pham' => (new SanPhamController())->postEditSanPham(),
    'delete-san-pham' => (new SanPhamController())->deleteSanPham(),
    // Route Danh Mục
    
    'post-add-danh-muc' => (new DanhMucController())->postAddDanhMuc(), 
    'form-add-danh-muc' => (new DanhMucController())->formAddDanhMuc(), 
    'post-edit-danh-muc' => (new DanhMucController())->postEditDanhMuc(), 
    'form-edit-danh-muc' => (new DanhMucController())->formEditDanhMuc(), 
    'delete-danh-muc' => (new DanhMucController())->deleteDanhMuc(), 
    // Route Bình Luận
    'binh_luan' => (new BinhLuanController())->getAllBinhLuan(),
    // Route Tài Khoản
    'tai-khoan' => (new TaiKhoanController())->getAllTaiKhoan(),
    // 'form-add-san-pham' => (new SanPhamController())->formAddSanPham(),
    // 'post-add-san-pham' => (new SanPhamController())->postAddSanPham(),
    // 'form-edit-san-pham' => (new SanPhamController())->formEditSanPham(),
    // 'post-edit-san-pham' => (new SanPhamController())->postEditSanPham(),
    // 'delete-san-pham' => (new SanPhamController())->deleteSanPham(),
    // Route Giỏ Hàng, Đơn Hàng
};