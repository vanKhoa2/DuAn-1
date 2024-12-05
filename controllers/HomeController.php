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
        $listSanPham = $this->modelSanPham->getAllSanPham();
        $chiTietGioHang=[];
   
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
    }
    require_once './views/home.php';
  
}
    
    public function listSanPham(){
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        $listSanPham = $this->modelSanPham->getAllSanPham();
        $chiTietGioHang=[];
   
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
    }
        
        require_once './views/sanpham.php';
    }
    public function listSanPhamByDanhMuc(){
        $id_danh_muc = $_GET['id_danh_muc'];
        $listSanPham = $this->modelSanPham->getSanPhamByDanhMuc($id_danh_muc);
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        
        require_once './views/sanpham.php';
    }


    public function lienHe()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        $chiTietGioHang=[];
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
        }
        require_once './views/lienhe.php';
    }
    public function gioithieu(){
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        $chiTietGioHang=[];
   
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
        }
         require_once './views/gioithieu.php';
    }
     







    public function chiTietSanPham(){
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
    }
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
            $size = $_POST['size'];
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
                $this->modelGioHang->addDetailGioHang($gioHang['id'],$san_pham_id,$so_luong,$size);
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
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
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
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        if(isset($_SESSION['user_client'])){
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']['email']);
            $tai_khoan_id = $user['id'];
            $donHangId = $_GET['id'];
            $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
            $trangThaiDonHang = array_column($arrTrangThaiDonHang,'ten_trang_thai','id');
           // Lấy ra phương thức thanh toán
           $arrPhuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
           $phuongThucThanhToan = array_column($arrPhuongThucThanhToan,'ten_phuong_thuc','id');
            $donHang = $this->modelDonHang->getDonHangById($donHangId);

            $chiTietDonHang = $this->modelDonHang->chiTietDonHangByDonHangId($donHangId);
            // echo "<pre>";
            // print_r($donHang);
            // print_r($chiTietDonHang);
            
            if($donHang['tai_khoan_id'] != $tai_khoan_id){
                    echo "bạn k truy cập đc";
            }
            require_once './views/chitietdonhang.php';
        }
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
    public function search(){
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        $key = $_POST['timkiem'];
        $listSanPham = $this->modelSanPham->getSanPhamByKey($key);
        require_once './views/sanpham.php';
        
    }
    public function addBinhLuan(){
        if(isset($_SESSION['user_client'])){
           $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']['email']);
           $tai_khoan_id = $user['id'];
           $id_san_pham = $_GET['id_san_pham'];

           $noi_dung = $_POST['noi_dung'];
           $ngay_dang = date('Y-m-d');

           if ($this->modelSanPham->addBinhLuan($id_san_pham,$tai_khoan_id,$noi_dung,$ngay_dang)){ 
                header('location:'. BASE_URL.'?act=chi-tiet-san-pham&id_san_pham='.$id_san_pham);
           }
            }else {
                var_dump('lỗi');die;
            }
    }
    public function deleteSanPhamGioHang(){
        if(isset($_SESSION['user_client'])){
            $id_chi_tiet_gio_hang = $_GET['id_chi_tiet_gio_hang'];
            $this->modelGioHang->deleteSanPhamGioHang($id_chi_tiet_gio_hang);
            header('location:'.BASE_URL.'?act=cart') ;       
        }
    }
}
