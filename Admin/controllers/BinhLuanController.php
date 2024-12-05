<?php 

class BinhLuanController
{
    public $modelBinhLuan;
    public $modelTaiKhoan;
    
    public function __construct()
    {
        $this->modelBinhLuan =new BinhLuan();
        $this->modelTaiKhoan =new TaiKhoan();
    }
    
    public function getAllBinhLuan() {
        $listBinhLuan = $this->modelBinhLuan->getAllBinhLuan();
         require_once "./views/binhluan/listBinhLuan.php";
    }
    public function deleteBinhLuan(){
        $id_binh_luan = $_GET['id_binh_luan'];
        $this->modelBinhLuan->deleteBinhLuan($id_binh_luan);
        header('location:'.BASE_URL_ADMIN.'?act=binh-luan');
    }
}

    