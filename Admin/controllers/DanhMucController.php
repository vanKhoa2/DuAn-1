<?php 

class DanhMucController
{
    public $modelDanhMuc;
    
    public function __construct()
    {
        $this->modelDanhMuc =new DanhMuc();
    }
    
    public function getAllDanhMuc(){
       $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();

       require_once './views/danhmuc/listDanhMuc.php';

    }
    public function formAddDanhMuc(){
        require_once './views/danhmuc/addDanhMuc.php';
    }
    public function postAddDanhMuc(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];
            
            $error = [];
            if(empty($ten_danh_muc)){
                $error['ten_danh_muc'] = "Tên danh mục không được bỏ trống";
            }
            if(empty($error)){
               $this->modelDanhMuc->insertDanhMuc($ten_danh_muc,$mo_ta);
               header('location:./?act=/');
            }
            else {
                require_once './views/danhmuc/addDanhMuc.php';
            }

        }

        
    }

    public function formEditDanhMuc(){
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        require_once './views/danhmuc/editDanhMuc.php';
    }
    public function postEditDanhMuc(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];
            $id = $_POST['id'];
            $error = [];
            if(empty($ten_danh_muc)){
                $error['ten_danh_muc'] = "Tên danh mục không được bỏ trống";
            }
            if(empty($error)){
               $this->modelDanhMuc->EditDanhMuc($ten_danh_muc,$mo_ta,$id);
               header('location:./?act=/');
            }
            else {
                require_once './views/danhmuc/addDanhMuc.php';
            }

        }

        
    }
    public function deleteDanhMuc(){
        $id = $_GET['id_danh_muc'];
        
        if($this->modelDanhMuc->deleteDanhMuc($id)){
            header('location:./');
        }

    }



}
    
