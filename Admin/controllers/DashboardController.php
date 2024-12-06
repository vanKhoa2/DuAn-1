<?php 

class DashBoardController
{
    public $modelDanhMuc;
    
    public function __construct()
    {
        $this->modelDanhMuc =new DanhMuc();
    }
    public function home(){
        require_once './views/dashboard/dashboard.php';
    }
}

    
