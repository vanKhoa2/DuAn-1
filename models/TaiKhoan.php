<?php

class TaiKhoan
{
    public $conn;

    public function __construct()
    {
        $this->conn  = connectDB();
    }
    public function checkLogin($email, $mat_khau)
    {
        try {
            $sql = " SELECT * FROM tai_khoans WHERE email=:email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':email' => $email,
                ]
            );
            $user = $stmt->fetch();

            if ($user && $mat_khau == $user['mat_khau']) {
                if ($user['chuc_vu_id'] == 2) {
                    if ($user['trang_thai'] == 1) {
                        return [
                            'email' => $user['email'],
                            'id' => $user['id']
                        ]; // trả về email và id
                    } else {
                        return "Tài khoản bị cấm";
                    }
                }
            } elseif ($user && password_verify($mat_khau, $user['mat_khau'])) {
                if ($user['chuc_vu_id'] == 1) {
                    return "Tài khoản không có quyền đăng nhập khách hàng";
                }
            } else {
                return 'Vui lòng kiểm tra lại thông tin đăng nhập';
            }
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return  false;
        }
    }
    public function getTaiKhoanFromEmail($email)
    {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':email' => $email
                ]
            );
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }


    
    public function addTaiKhoan($ho_ten, $email, $so_dien_thoai, $gioi_tinh, $dia_chi, $mat_khau, $chuc_vu)
    {
        try {
            
            $sql = 'INSERT INTO tai_khoans (ho_ten, email, so_dien_thoai,gioi_tinh, dia_chi, mat_khau, chuc_vu_id )
                    VALUES (?, ?, ?, ?, ?, ?, ?)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$ho_ten, $email, $so_dien_thoai, $gioi_tinh, $dia_chi, $mat_khau, $chuc_vu]);
            return true;
        } catch (\Throwable $th) {
            // Xử lý lỗi
            return false;
        }
    }
    public function getTaiKhoanByChucVu(){
        $vaitro = 2;
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE chuc_vu_id = ?';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$vaitro]);
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            
        }
    }
    public function updatePass($password,$email){
        try {
            $sql = 'UPDATE tai_khoans SET mat_khau=? WHERE email = ?';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$password,$email]);
            return true;
        } catch (\Throwable $th) {
            
        }
    }
}