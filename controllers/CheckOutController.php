<?php

class CheckOutController
{
    public $modelCheckOut;
    public $modelGioHang;
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelDonHang;

    public function __construct()
    {
        $this->modelCheckOut = new CheckOut();
        $this->modelGioHang = new Cart();
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelDonHang = new DonHang();
    }
    public  function CheckOut()
    { 

        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        if(isset($_SESSION['user_client'])){
       
        $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']['email']);
   
        $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);
         if(!$gioHang){
            $gioHangId = $this->modelGioHang->addGioHang($user['id']);
            $gioHang = ['id'=>$gioHangId];
            $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }
            else{
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

             }
             require_once './views/checkout.php';
        }  else {
            header('Location:' . BASE_URL . '?act=form-login');
  

    }

     

}    
    public function postCheckOut() {
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $ten_nguoi_nhan= $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan= $_POST['email_nguoi_nhan'];
            $sdt_nguoi_nhan= $_POST['sdt_nguoi_nhan'];
            $dia_chi_nguoi_nhan= $_POST['dia_chi_nguoi_nhan'];
            $ghi_chu = $_POST['ghi_chu'];
            $tong_tien= $_POST['tong_tien'];
            $phuong_thuc_thanh_toan_id= $_POST['phuong_thuc_thanh_toan_id'];
            $ngay_dat = date('Y-m-d');
            $trang_thai_id = 1;
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']['email']);
            $tai_khoan_id = $user['id'];
            $ma_don_hang = 'DH' . rand(1000,9999);

            $donHang = $this->modelDonHang->addDonHang($tai_khoan_id,$ten_nguoi_nhan,
                                            $email_nguoi_nhan,
                                            $sdt_nguoi_nhan,
                                            $dia_chi_nguoi_nhan,
                                            $ghi_chu,
                                            $tong_tien,                                            
                                            $phuong_thuc_thanh_toan_id,                           
                                            $ngay_dat,
                                            $trang_thai_id,$ma_don_hang)
                                           ;

        $gioHang = $this->modelGioHang->getGioHangFromUser($tai_khoan_id);
        if($donHang){
               $chiTietDonHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
               foreach($chiTietDonHang as $item ){
                    $donGia = $item['gia_khuyen_mai'] ?? $item['gia_san_pham'];
                    $this->modelDonHang->addChiTietDonHang($donHang,$item['san_pham_id'],$donGia,$item['so_luong'],$donGia*$item['so_luong']); 
               }
                $this->modelGioHang->clearDetailGioHang($gioHang['id']);
                $this->modelGioHang->clearGioHang($tai_khoan_id);
                header('location:'.BASE_URL.'?act=lich-su-mua-hang');
                exit;
        }
    }
}
}