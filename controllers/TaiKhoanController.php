<?php
class TaiKhoanControllerClient
{
    public $modelSanPham;
    public $modelTaiKhoan;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
    }
    public function formLogin()
    {
        $listDanhMuc =  $this->modelSanPham->getAllDanhMuc();

        if (isset($_SESSION['user_client'])) {
            header('location:' . BASE_URL);
            exit();
        }
        require_once('./views/auth/formDangNhap.php');
        deleteSessionError();
    }
    public function postLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //lay dl
            $email = $_POST['email'];
            // var_dump($email);die();
            $password = $_POST['password'];

            $result = $this->modelTaiKhoan->checkLogin($email, $password);

            //    var_dump($user);die();
            if (is_array($result)) {
                // Đăng nhập thành công
                $email = $result['email'];
                $id = $result['id'];

                // Lưu thông tin vào session
                $_SESSION['user_client'] = [
                    'email' => $email,
                    'id' => $id
                ];
                header("Location:" . BASE_URL);
                exit();
            } else {
                // Lỗi thì lưu lỗi vào session
                $_SESSION['errors'] = $result;
                //    var_dump($_SESSION['errors']);die();

                $_SESSION['flash'] = true;

                header("Location:" . BASE_URL . '?act=form-login');
                exit();
            }
        }
    }
    public function formDangKy()
    {


        if (isset($_SESSION['user_client'])) {
            header('location:' . BASE_URL);
            exit();
        }
        $listDanhMuc =  $this->modelSanPham->getAllDanhMuc();
        require_once('./views/auth/formDangKy.php');
        deleteSessionError();
    }
    public function dangKy()
    { {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $ho_ten = $_POST['ho_ten'] ?? '';
              
                $email = $_POST['email'] ?? '';
                $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
                $gioi_tinh = $_POST['gioi_tinh'] ?? '';
                $dia_chi = $_POST['dia_chi'] ?? '';
                $mat_khau = $_POST['mat_khau'] ?? '';
              

                $chuc_vu = 2;

                $_SESSION['old_data'] = array(
                    'ho_ten' => $_POST['ho_ten'],
                    'email' => $_POST['email'],
                    'so_dien_thoai' => $_POST['so_dien_thoai'],
                    'gioi_tinh' => $_POST['gioi_tinh'],
                    'dia_chi' => $_POST['dia_chi'],
                    'mat_khau' => $_POST['mat_khau'],


                );

                // Tạo 1 mảng trống để chứa dl
                $errors = [];
                if (empty($ho_ten)) {
                    $errors['ho_ten'] = 'Họ tên không được để trống';
                }
   
                if (empty($email)) {
                    $errors['email'] = 'Email không được để trống';
                }
                if (empty($so_dien_thoai)) {
                    $errors['so_dien_thoai'] = 'Số điện thoại không được để trống';
                }

                if (empty($mat_khau)) {
                    $errors['mat_khau'] = 'Mật khẩu không được để trống';
                }
                if (empty($dia_chi)) {
                    $errors['dia_chi'] = 'Địa chỉ  không được để trống';
                }
                $_SESSION['errors'] = $errors;

                //   var_dump($_SESSION['errors']);die();
                // Nếu k có lỗi thì thêm sản phẩm
                if (empty($errors)) {

                
                
                     $this->modelTaiKhoan->addTaiKhoan($ho_ten, $email, $so_dien_thoai, $gioi_tinh, $dia_chi, $mat_khau, $chuc_vu);
                      
                    $_SESSION['thongBao'] = 'Đăng kí thành công. Vui lòng đăng nhập để mua hàng và bình luận';

                    header("Location: " . BASE_URL . '?act=form-dang-ky');


                    exit();
                } else {
                    // trả lỗi
                    // Đặt chỉ thị xóa session sau khi hiển thị form

                    $_SESSION['flash'] = true;
                    $_SESSION['thongBao'] = 'Đăng ký thất bại';

                    header("Location: " . BASE_URL . '?act=form-dang-ky');
                    exit();
                }
            }
        }
    }
    public function logoutClient()
    {
        if (isset($_SESSION['user_client'])) {
            unset($_SESSION['user_client']);
            header('Location:' . BASE_URL . '?act=form-login');
        }
    }
    
}