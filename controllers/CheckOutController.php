<?php

class CheckOutController
{
    public $modelCheckOut;
    public $modelGioHang;
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelDonHang;

    public function __construct()
    {
        $this->modelCheckOut = new CheckOut();
        $this->modelGioHang = new Cart();
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelDonHang = new DonHang();
    }
    public function CheckOut()
    {
        // Lấy danh sách các danh mục sản phẩm
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();

        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (isset($_SESSION['user_client'])) {
            // Lấy thông tin người dùng từ email trong session
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']['email']);

            // Lấy giỏ hàng của người dùng từ cơ sở dữ liệu
            $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);

            // Nếu giỏ hàng chưa tồn tại, tạo mới giỏ hàng
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($user['id']);
                $gioHang = ['id' => $gioHangId];
            }

            // Lấy chi tiết giỏ hàng của người dùng
            $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

            // Kiểm tra xem giỏ hàng có sản phẩm hay không
            if (empty($chiTietGioHang)) {


                // Nếu giỏ hàng không có sản phẩm

                $_SESSION['error'] = "Giỏ hàng của bạn hiện tại không có sản phẩm. Vui lòng thêm sản phẩm trước khi tiếp tục thanh toán.";
                header('location:' . BASE_URL . '?act=cart');
                exit; // Dừng lại, không tiếp tục checkout
            }
            // Nếu giỏ hàng có sản phẩm, hiển thị trang thanh toán
            require_once './views/checkout.php';
        } else {
            // Nếu người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
            header('Location:' . BASE_URL . '?act=form-login');
        }
    }

    public function postCheckOut()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
            $ghi_chu = $_POST['ghi_chu'];
            $tong_tien = $_POST['tong_tien'];
            $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];
            $ngay_dat = date('Y-m-d');
            $trang_thai_id = 1;
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']['email']);
            $tai_khoan_id = $user['id'];
            $ma_don_hang = 'DH' . rand(1000, 9999);

            $donHang = $this->modelDonHang->addDonHang(
                $tai_khoan_id,
                $ten_nguoi_nhan,
                $email_nguoi_nhan,
                $sdt_nguoi_nhan,
                $dia_chi_nguoi_nhan,
                $ghi_chu,
                $tong_tien,
                $phuong_thuc_thanh_toan_id,
                $ngay_dat,
                $trang_thai_id,
                $ma_don_hang
            );

            $gioHang = $this->modelGioHang->getGioHangFromUser($tai_khoan_id);
            if ($donHang) {
                $chiTietDonHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                foreach ($chiTietDonHang as $item) {
                    $donGia = $item['gia_khuyen_mai'] ?? $item['gia_san_pham'];
                    $this->modelDonHang->addChiTietDonHang($donHang, $item['san_pham_id'], $donGia, $item['so_luong'], $donGia * $item['so_luong'], $item['size']);
                }
                $this->modelGioHang->clearDetailGioHang($gioHang['id']);
                $this->modelGioHang->clearGioHang($tai_khoan_id);
            }
            $_SESSION['success_message'] = 'Đặt Hàng Thành Công! Nhấn Xem Chi Tiết Đơn Hàng Để Xem Thông Tin Của Bạn';
            header('location:' . BASE_URL . '?act=lich-su-mua-hang');
            exit;
        }
    }
}
