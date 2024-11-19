<?php

class TaiKhoanController
{
    public $modelTaiKhoan;

    public function __construct()
    {
        $this->modelTaiKhoan = new TaiKhoan();
    }
<<<<<<< HEAD
    
    public function getAllTaiKhoan(){

        $listTaiKhoan = $this->modelTaiKhoan->getAllTaiKhoan();
       
         require_once './views/taikhoan/listTaiKhoan.php';
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
                $error['ho_ten'] = "Tên sản phẩm không được bỏ trống";
            }
            if(empty($email)){
                $error['email'] = "Giá sản phẩm không được bỏ trống";
            }
            if(empty($ngay_sinh)){
                $error['ngay_sinh'] = "Giá khuyến mãi sản phẩm không được bỏ trống";
            }
            if(empty($so_dien_thoai)){
                $error['so_dien_thoai'] = "Số lượng sản phẩm không được bỏ trống";
            }
            if(empty($gioi_tinh)){
                $error['gioi_tinh'] = "Ngày nhập sản phẩm không được bỏ trống";
            }
         
            $_SESSION['Error'] = $error;

            if(empty($error)){
               $this->modelTaiKhoan->insertTaiKhoan($ho_ten,$email,$ngay_sinh,$so_dien_thoai,$dia_chi,$mat_khau,$chuc_vu_id,$gioi_tinh,$file_anh);
               header("location:" . BASE_URL_ADMIN .'/?act=tai-khoan');
            }
            else {
                $_SESSION['flash'] = true;
                header('location:'.BASE_URL_ADMIN.'?act=form-add-tai-khoan');
            }

        }
    }
    
}
=======

    public function getAllTaiKhoan()
    {
        $listTaiKhoan = $this->modelTaiKhoan->getAllTaiKhoan();
        require_once './views/sanpham/listTaiKhoan.php';
    }

    // public function deleteSanPham(){
    //     $id = $_GET['id_san_pham'];
    //     if($this->modelSanPham->deleteSanPham($id)){
    //         header('location:'.BASE_URL .'./?act=san-pham');
    //     }
    // }



    public function formLogin()
    {
        require_once './views/auth/formLogin.php';

        deleteSessionError();
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // var_dump($password); die;

            $user = $this->modelTaiKhoan->checkLogin($email, $password);

           
            if ($user) {

                $_SESSION['user_admin'] = $user;
                header("Location: " . BASE_URL_ADMIN );
                exit();
            } else {
                $_SESSION['error'] = $user;
                $_SESSION['flash']  = true;

                header("Location:" . BASE_URL_ADMIN . '?act=login-admin');
                exit();
            }
        }
    }
}
>>>>>>> a494f278bf2ff04e9f8ec3cf1dbf5206a6c27d21
