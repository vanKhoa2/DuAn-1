<?php 

class TaiKhoanController
{
    public $modelTaiKhoan;
    
    public function __construct()
    {
        $this->modelTaiKhoan = new TaiKhoan();

    }
    
    public function getAllTaiKhoan(){
        $listTaiKhoan = $this->modelTaiKhoan->getAllTaiKhoan();
         require_once './views/sanpham/listTaiKhoan.php';
    }

    // public function deleteSanPham(){
    //     $id = $_GET['id_san_pham'];
    //     if($this->modelSanPham->deleteSanPham($id)){
    //         header('location:'.BASE_URL .'./?act=san-pham');
    //     }
    // }
    
}