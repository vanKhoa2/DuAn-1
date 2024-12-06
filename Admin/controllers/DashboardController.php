<?php 

class DashBoardController
{
    public $modelDanhMuc;
    public $modelDonHang;
    
    public function __construct()
    {
        $this->modelDanhMuc =new DanhMuc();
        $this->modelDonHang =new DonHang();
    }
    public function home(){
        $trang_thai_id = 5;
        $fullDonHang = $this->modelDonHang->getAllDonHang($trang_thai_id);
        $listDonHang = $this->modelDonHang->getAllDonHangByTT($trang_thai_id);
        require_once './views/dashboard/dashboard.php';
    }
}

    
