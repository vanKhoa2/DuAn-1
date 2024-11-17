<?php 

class SanPhamController
{
    public $modelSanPham;
    public $modelDanhMuc;
    
    public function __construct()
    {
        $this->modelSanPham =new SanPham();
        $this->modelDanhMuc =new DanhMuc();
    }
    
    public function getAllSanPham(){
        $listSanPham = $this->modelSanPham->getAllSanPham();
         require_once './views/sanpham/listSanPham.php';
    }

    public function formAddSanPham(){
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
         require_once './views/sanpham/addSanPham.php';
        //  deleteSessionError();
    }
    
    public function postAddSanPham(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
             
            $ten_san_pham = $_POST['ten_san_pham'] ;
            $gia_san_pham = $_POST['gia_san_pham'];
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'];
            $so_luong = $_POST['so_luong'];
            $ngay_nhap = $_POST['ngay_nhap'];
            $danh_muc_id = $_POST['danh_muc_id'];
            $trang_thai = $_POST['trang_thai'];
            $mo_ta = $_POST['mo_ta'];
            $hinh_anh = $_FILES['hinh_anh'];
            $file_anh = uploadFile($hinh_anh,'./images/');
            $error = [];
            if(empty($ten_san_pham)){
                $error['ten_san_pham'] = "Tên sản phẩm không được bỏ trống";
            }
            if(empty($gia_san_pham)){
                $error['gia_san_pham'] = "Giá sản phẩm không được bỏ trống";
            }
            if(empty($gia_khuyen_mai)){
                $error['gia_khuyen_mai'] = "Giá khuyến mãi sản phẩm không được bỏ trống";
            }
            if(empty($so_luong)){
                $error['so_luong'] = "Số lượng sản phẩm không được bỏ trống";
            }
            if(empty($ngay_nhap)){
                $error['ngay_nhap'] = "Ngày nhập sản phẩm không được bỏ trống";
            }
            if(empty($danh_muc_id)){
                $error['danh_muc_id'] = "Danh mục sản phẩm không được bỏ trống";
            }
            if(empty($trang_thai)){
                $error['trang_thai'] = "Tên sản phẩm không được bỏ trống";

            }
            if($hinh_anh['error'] !== 0){
                $error['trang_thai'] = "Ảnh phẩm không được bỏ trống";

            }
            $_SESSION['Error'] = $error;

            if(empty($error)){
               $this->modelSanPham->insertSanPham($ten_san_pham,$gia_san_pham,$gia_khuyen_mai,$so_luong,$ngay_nhap,$danh_muc_id,$trang_thai,$mo_ta,$file_anh);
               header("location:" . BASE_URL .'/?act=san-pham');
            }
            else {
                $_SESSION['flash'] = true;
                header('location:'.BASE_URL.'?act=form-add-san-pham');
            }

        }
    }

    public function postEditSanPham(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){


            $san_pham_id = $_GET['id_san_pham'];
            $san_pham_old = $this->modelSanPham->getDetailSanPham($san_pham_id);
            $old_file = $san_pham_old['hinh_anh'];
            
            $id = $_POST['id_san_pham']; 
            $ten_san_pham = $_POST['ten_san_pham'] ;
            $gia_san_pham = $_POST['gia_san_pham'];
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'];
            $so_luong = $_POST['so_luong'];
            $ngay_nhap = $_POST['ngay_nhap'];
            $danh_muc_id = $_POST['danh_muc_id'];
            $trang_thai = $_POST['trang_thai'];
            $mo_ta = $_POST['mo_ta'];
            $hinh_anh = $_FILES['hinh_anh'];

            $error = [];

            if(empty($ten_san_pham)){
                $error['ten_san_pham'] = "Tên sản phẩm không được bỏ trống";
            }
            if(empty($gia_san_pham)){
                $error['gia_san_pham'] = "Giá sản phẩm không được bỏ trống";
            }
            if(empty($gia_khuyen_mai)){
                $error['gia_khuyen_mai'] = "Giá khuyến mãi sản phẩm không được bỏ trống";
            }
            if(empty($so_luong)){
                $error['so_luong'] = "Số lượng sản phẩm không được bỏ trống";
            }
            if(empty($ngay_nhap)){
                $error['ngay_nhap'] = "Ngày nhập sản phẩm không được bỏ trống";
            }
            if(empty($danh_muc_id)){
                $error['danh_muc_id'] = "Danh mục sản phẩm không được bỏ trống";
            }
            if(empty($trang_thai)){
                $error['trang_thai'] = "Tên sản phẩm không được bỏ trống";

            }
            if($hinh_anh['error'] !== 0){
                $error['trang_thai'] = "Ảnh phẩm không được bỏ trống";

            }
            $_SESSION['Error'] = $error;
             
            // logic sửa ảnh
            if(isset($hinh_anh) && $hinh_anh['error'] == 0){
                $new_file = uploadFile($hinh_anh,'./images/');

                if(!empty($old_file)){
                    deleteFile($old_file);
                }
                
            }else{
                $new_file = $old_file ;
            }
            if(empty($error)){
               $this->modelSanPham->editSanPham($id,$ten_san_pham,$gia_san_pham,$gia_khuyen_mai,$so_luong,$ngay_nhap,$danh_muc_id,$trang_thai,$mo_ta,$new_file);
               header("location:" . BASE_URL .'/?act=san-pham');
            }
            else {
                $_SESSION['flash'] = true;
                header('location:'.BASE_URL.'?act=form-edit-san-pham');
            }

        }
    }
    

    public function formEditSanPham(){

        $id_san_pham = $_GET['id_san_pham'];
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        $sanPham = $this->modelSanPham->getDetailSanPham($id_san_pham);
        require_once './views/sanpham/editSanPham.php';
   
    }


    public function deleteSanPham(){
        $id = $_GET['id_san_pham'];
        if($this->modelSanPham->deleteSanPham($id)){
            header('location:'.BASE_URL .'./?act=san-pham');
        }
    }
    
}