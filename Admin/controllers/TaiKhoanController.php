<?php

class TaiKhoanController
{
    public $modelTaiKhoan;

    public function __construct()
    {
        $this->modelTaiKhoan = new TaiKhoan();
    }

    public function getAllTaiKhoan()
    {
        $listTaiKhoan = $this->modelTaiKhoan->getAllTaiKhoan();
        require_once './views/taikhoan/listTaiKhoan.php';
    }

    public function deleteTaiKhoan()
    {
        $id = $_GET['id_tai_khoan'];
        if ($this->modelTaiKhoan->deleteTaiKhoan($id)) {
            header('Location: ' . BASE_URL_ADMIN . '/?act=tai-khoan');
        }
    }

    public function formAddTaiKhoan()
    {
        $listChucVu = $this->modelTaiKhoan->getAllChucVu();
        require_once './views/taikhoan/addTaiKhoan.php';
        deleteSessionError();
    }

    public function postAddTaiKhoan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $ngay_sinh = $_POST['ngay_sinh'];
            $hinh_anh = $_FILES['hinh_anh'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $dia_chi = $_POST['dia_chi'];
            $mat_khau = $_POST['mat_khau'];
            $gioi_tinh = $_POST['gioi_tinh'];
            $chuc_vu_id = $_POST['chuc_vu_id'];

            $file_anh = uploadFile($hinh_anh, './images/');

            $error = [];
            if (empty($ho_ten)) {
                $error['ho_ten'] = "Họ tên không được bỏ trống";
            }
            if (empty($email)) {
                $error['email'] = "Email không được bỏ trống";
            }
            if (empty($ngay_sinh)) {
                $error['ngay_sinh'] = "Ngày sinh không được bỏ trống";
            }
            if (empty($so_dien_thoai)) {
                $error['so_dien_thoai'] = "Số điện thoại không được bỏ trống";
            }
            if (empty($gioi_tinh)) {
                $error['gioi_tinh'] = "Giới tính không được bỏ trống";
            }

            $_SESSION['Error'] = $error;

            if (empty($error)) {
                $this->modelTaiKhoan->insertTaiKhoan(
                    $ho_ten,
                    $email,
                    $ngay_sinh,
                    $so_dien_thoai,
                    $dia_chi,
                    $mat_khau,
                    $chuc_vu_id,
                    $gioi_tinh,
                    $file_anh
                );
                header("Location: " . BASE_URL_ADMIN . '/?act=tai-khoan');
            } else {
                $_SESSION['flash'] = true;
                header('Location: ' . BASE_URL_ADMIN . '?act=form-add-tai-khoan');
            }
        }
    }

    public function formLogin()
    {
        require_once './views/auth/formLogin.php';
        deleteSessionError();
    }

}
