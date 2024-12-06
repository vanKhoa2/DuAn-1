<?php

class TaiKhoanController
{
    public $modelTaiKhoan;

    public function __construct()
    {
        $this->modelTaiKhoan = new TaiKhoan();
    }
    
    public function getAllTaiKhoanAdmin(){

        $listTaiKhoan = $this->modelTaiKhoan->getAllTaiKhoanAdmin();
       
         require_once './views/taikhoanadmin/listTaiKhoan.php';
    }
      
    public function getAllTaiKhoanUser(){

        $listTaiKhoan = $this->modelTaiKhoan->getAllTaiKhoanUser();
       
         require_once './views/taikhoanuser/listTaiKhoan.php';
    }

    

    public function deleteTaiKhoan(){
        $id = $_GET['id_tai_khoan'];
        if($this->modelTaiKhoan->deleteTaiKhoan($id)){
            header('location:'.BASE_URL_ADMIN .'./?act=tai-khoan');
        }
    }

    public function formAddTaiKhoan(){
        $listChucVu = $this->modelTaiKhoan->getAllChucVu();
        require_once './views/taikhoan/addTaiKhoan.php';
        deleteSessionError();
    }
    
    public function postAddTaiKhoan(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
             
            $ho_ten = $_POST['ho_ten'] ;
            $email= $_POST['email'];
            $ngay_sinh = $_POST['ngay_sinh'];
            $hinh_anh = $_FILES['hinh_anh'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $dia_chi = $_POST['dia_chi'];
            $mat_khau = $_POST['mat_khau'];
            $gioi_tinh = $_POST['gioi_tinh'];
            $chuc_vu_id = $_POST['chuc_vu_id'];

            $file_anh = uploadFile($hinh_anh,'./images/');
            
            $error = [];
            if(empty($ho_ten)){
                $error['ho_ten'] = "Họ Tên";
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
                header('location:'.BASE_URL_ADMIN.'?act=form-add-tai-khoan');
            }
        }
    }

    public function formLogin()
    {
        // if (isset($_SESSION['user_admin'])) {
        //     header('Location:' . BASE_URL_ADMIN);
        //     exit();
        // }
        require_once './views/auth/formLogin.php';
        deleteSessionError();
    }

    // Xử lý đăng nhập
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Kiểm tra thông tin người dùng từ database
            $user = $this->modelTaiKhoan->checkLogin($email, $password);
            
            if ($user && $user == $email) {
                // Đăng nhập thành công
                $_SESSION['user_admin'] = $user;
                header("Location: " . BASE_URL_ADMIN);
                exit();
            } else {
                // Đăng nhập thất bại
                $_SESSION['errors'] = $user;
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=login-admin');
                exit();
            }
        }
    }

    // Đăng xuất
    public function logout()
    {
        if (isset($_SESSION['user_admin'])) {
            unset($_SESSION['user_admin']);
            header('Location:' . BASE_URL_ADMIN . '?act=login-admin');
        }
    }
}
