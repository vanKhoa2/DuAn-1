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
}

    