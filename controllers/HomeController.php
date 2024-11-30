<?php

class HomeController
{
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;
    public $modelDonHang;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang = new Cart();
        $this->modelDonHang = new DonHang();
    }
    public  function home()
    {   
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        $listSanPham = $this->modelSanPham->getAllSanPham(


        );
        require_once './views/home.php';
    }
    
    public function listSanPham(){
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        $listSanPham = $this->modelSanPham->getAllSanPham(

            
        );
        require_once './views/sanpham.php';
    }

    public function chiTietSanPham(){
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
        $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamdDanhMuc($sanPham['id'], $sanPham['danh_muc_id']);

        if (isset($sanPham)) {
            require_once './views/detailSanPham.php';
        } else {
            header("Location: " . BASE_URL);
            exit();
        }
    }

    public function addCart(){
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            if(isset($_SESSION['user_client'])){
            $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']['email']);
            
            $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
             if(!$gioHang){
                $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                $gioHang = ['id'=>$gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
             }
             else{
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

             }

            

            $san_pham_id = $_POST['san_pham_id'];
            $so_luong = $_POST['so_luong'];
            $checkSanPham = false;
            foreach($chiTietGioHang as $detail){
                 if($detail['san_pham_id']== $san_pham_id){
                    $new_so_luong = $detail['so_luong']+ $so_luong;
                    $this->modelGioHang->updateSoLuong($gioHang['id'],$san_pham_id,$new_so_luong);
                    $checkSanPham = true;
                    break;
                 }
              

            }
            if(!$checkSanPham){
                $this->modelGioHang->addDetailGioHang($gioHang['id'],$san_pham_id,$so_luong);
             }
             header('Location:' . BASE_URL . '?act=cart');
            }  else {
                header('Location:' . BASE_URL . '?act=form-login');
      

        }
         
        }
    }

    public function gioHang(){
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
            if(isset($_SESSION['user_client'])){
           
            $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']['email']);
       
            $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
             if(!$gioHang){
                $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                $gioHang = ['id'=>$gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                }
                else{
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

                 }
                 require_once './views/cart.php';
            }  else {
                header('Location:' . BASE_URL . '?act=form-login');
      

        }
         
    }
    public function lichSuMuaHang(){
        if(isset($_SESSION['user_client'])){
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']['email']);
            $tai_khoan_id = $user['id'];
            // Lấy ra danh sách trạng thái
            $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
            $trangThaiDonHang = array_column($arrTrangThaiDonHang,'ten_trang_thai','id');
           // Lấy ra phương thức thanh toán
           $arrPhuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
           $phuongThucThanhToan = array_column($arrPhuongThucThanhToan,'ten_phuong_thuc','id');
            $donHang = $this->modelDonHang->getDonHangFromUser($tai_khoan_id);
            require_once './views/historyDonHang.php';
        }
    }
    public function chiTietMuaHang(){
        
    }
    public function huyDonHang(){
        if(isset($_SESSION['user_client'])){
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']['email']);
            $tai_khoan_id = $user['id'];
            $donHangId = $_GET['id'];
            $donHang = $this->modelDonHang->getDonHangById($donHangId);
            if($donHang['tai_khoan_id'] != $tai_khoan_id){
                  echo "Bạn ko làm gì đc";
                  exit;
            }
            if($donHang['trang_thai_id'] != 1){
                echo "Bạn ko làm gì đc";
                exit;
          }
          $this->modelDonHang->updateTrangThaiDonHang($donHangId,6);
          header('location:'.BASE_URL.'?act=lich-su-mua-hang');
            
           
    }
}
    
}
