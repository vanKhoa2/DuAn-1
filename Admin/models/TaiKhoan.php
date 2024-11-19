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
            $sql = 'SELECT tai_khoans.*,chuc_vus.ten_chuc_vu
            FROM tai_khoans
            INNER JOIN chuc_vus ON tai_khoans.chuc_vu_id = chuc_vus.id ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function getAllChucVu()
    {
        try {
            $sql = 'SELECT * FROM chuc_vus ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }



    public function deleteTaiKhoan($id)
    { {
            try {
                $sql = 'DELETE FROM tai_khoans WHERE id = ?';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$id]);
                return true;
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
    }
    public function insertTaiKhoan($ho_ten, $email, $ngay_sinh, $so_dien_thoai, $dia_chi, $mat_khau, $chuc_vu_id, $gioi_tinh, $file_anh)
    {
        try {
            $sql = 'INSERT INTO tai_khoans (ho_ten,email,ngay_sinh,so_dien_thoai,dia_chi,mat_khau,chuc_vu_id,gioi_tinh,anh_dai_dien) VALUES (?,?,?,?,?,?,?,?,?)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$ho_ten, $email, $ngay_sinh, $so_dien_thoai, $dia_chi, $mat_khau, $chuc_vu_id, $gioi_tinh, $file_anh]);
            return true;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function editTaiKhoan($id, $ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $new_file)
    {
        try {
            $sql = 'UPDATE san_phams SET ten_san_pham=:ten_san_pham,
                                        gia_san_pham=:gia_san_pham,
                                        gia_khuyen_mai=:gia_khuyen_mai,
                                        so_luong=:so_luong,
                                        ngay_nhap=:ngay_nhap,
                                        danh_muc_id=:danh_muc_id,
                                        trang_thai=:trang_thai,
                                        mo_ta=:mo_ta,
                                        hinh_anh=:hinh_anh
                                        WHERE id=:id ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ten_san_pham' => $ten_san_pham,
                ':gia_san_pham' => $gia_san_pham,
                ':gia_khuyen_mai' => $gia_khuyen_mai,
                ':so_luong' => $so_luong,
                ':ngay_nhap' => $ngay_nhap,
                ':danh_muc_id' => $danh_muc_id,
                ':trang_thai' => $trang_thai,
                ':mo_ta' => $mo_ta,
                ':hinh_anh' => $new_file,
                ':id' => $id
            ]);
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
                //   var_dump($user);die;
                if ($user['chuc_vu_id'] == 1) {
                    if ($user['trang_thai'] == 1) {
                        return true;
                    } else {
                        return 'Tài Khoản bị cấm';
                    }
                } else {
                    return 'Tài khoản không có quyền đăng nhập';
                }
            } else {
                return 'Bạn nhập sai thông tin  mật khẩu hoặc  tài khoản';
            }
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
            return false;
        }
    }
}
