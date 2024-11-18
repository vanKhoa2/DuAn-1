<?php

class TaiKhoan
{
    public $conn;

    public function __construct()
    { // Hàm khởi tạo kết nối đối tượng
        $this->conn = connectDB();
    }

    public function getAllTaiKhoan()
    {
        try {
            $sql = 'SELECT * FROM tai_khoans';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function deleteTaiKhoan($id)
    {
        try {
            $sql = 'DELETE FROM danh_mucs WHERE id = ?';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);
            return true;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


    public function checkLogin($email, $mat_khau)
    {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE  email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();


            if ($user && password_verify($mat_khau, $user['mat_khau'])) {
                //   var_dump('abbs');die;
                if ($user['chuc_vu_id'] == 1) {
                    if ($user['trang_thai'] == 1) {
                        return true;
                    }else {
                        return 'Tài Khoản bị cấm';
                    }
                } else {
                    return 'Tài khoản không có quyền đăng nhập';
                }
            }else{
                return 'Bạn nhập sai thông tin  mật khẩu hoặc  tài khoản';
            }
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
            return false;
        }
    }
    
}
