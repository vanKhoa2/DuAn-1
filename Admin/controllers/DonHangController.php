<?php 

class DonHangController
{
    public $modelDonHang;
    // public $modelTrangThai;
    
    public function __construct()
    {
        $this->modelDonHang = new DonHang();
        // $this->modelDanhMuc =new DanhMuc();
    }
    
    public function getAllDonHang(){
        $listDonHang = $this->modelDonHang->getAllDonHang();
         require_once './views/donhang/listDonHang.php';
    }

    public function formEditDonHang(){
        $id_don_hang = $_GET['id_don_hang'];
        $listTrangThai = $this->modelDonHang->getAllTrangThai();
        $donHang = $this->modelDonHang->getDetailDonHang($id_don_hang);
         require_once './views/donhang/editDonHang.php';
         deleteSessionError();
    }
    

    public function postEditDonHang(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){


            $id_don_hang = $_GET['id_don_hang'];
            $ma_don_hang = $_POST['ma_don_hang'];
            $trang_thai_don_hang = $_POST['trang_thai_don_hang'];

            $error = [];

            if(empty($ma_don_hang)){
                $error['ma_don_hang'] = "Tên sản phẩm không được bỏ trống";
            }
           
            $_SESSION['Error'] = $error;
             
        
            if(empty($error)){
                $this->modelDonHang->editDonHang($id_don_hang,$ma_don_hang,$trang_thai_don_hang);
                header("location:" . BASE_URL_ADMIN .'?act=don-hang');
             }
             else {
                 $_SESSION['flash'] = true;
                 header('location:'.BASE_URL_ADMIN.'?act=form-edit-don-hang');
             }

        }
    }
    

    
    public function chiTietDonHang(){
       $id_don_hang = $_GET['id_don_hang'];
       $chi_tiet_don_hang = $this->modelDonHang->getChiTietDonHang($id_don_hang);
       $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
       $trangThaiDonHang = array_column($arrTrangThaiDonHang,'ten_trang_thai','id');
      // Lấy ra phương thức thanh toán
      $arrPhuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
      $phuongThucThanhToan = array_column($arrPhuongThucThanhToan,'ten_phuong_thuc','id');

       $donHang = $this->modelDonHang->getDetailDonHangById($id_don_hang);
        require_once './views/donhang/viewDonHang.php';
   
    }


    // public function deleteSanPham(){
    //     $id = $_GET['id_san_pham'];
    //     if($this->modelSanPham->deleteSanPham($id)){
    //         header('location:'.BASE_URL_ADMIN .'./?act=san-pham');
    //     }
    // }
    
}