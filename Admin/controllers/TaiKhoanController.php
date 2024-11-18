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
