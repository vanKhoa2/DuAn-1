<?php 

class DashBoardController
{
    public $modelDanhMuc;
    public $modelDonHang;
    public $modelTaiKhoan;
    
    public function __construct()
    {
        $this->modelDanhMuc =new DanhMuc();
        $this->modelDonHang =new DonHang();
        $this->modelTaiKhoan =new TaiKhoan();
    }
    public function home(){
        $trang_thai_id = 5;
        $chuc_vu_id = 2;
        $fullDonHang = $this->modelDonHang->getAllDonHang();
        $listDonHang = $this->modelDonHang->getAllDonHangByTT($trang_thai_id);
        $listNguoiDung = $this->modelTaiKhoan->getAllTaiKhoanUser($chuc_vu_id);
        require_once './views/dashboard/dashboard.php';
    }
}

    
