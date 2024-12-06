<?php

class DonHang
{
    public $conn;

    public function __construct()
    { // Hàm khởi tạo kết nối đối tượng
        $this->conn = connectDB();
    }

    public function getAllDonHang()
    {
        try {
            $sql = 'SELECT don_hangs.*, trang_thai_don_hangs.ten_trang_thai
                    FROM don_hangs
                    INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id;';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function getDetailDonHang($id_don_hang) {
        $query = "SELECT don_hangs.*, trang_thai_don_hangs.ten_trang_thai
                  FROM don_hangs
                  INNER JOIN trang_thai_don_hangs 
                  ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
                  WHERE don_hangs.id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id_don_hang]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllTrangThai(){
        try {
            $sql = 'SELECT * FROM trang_thai_don_hangs;
                    ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function editDonHang($id_don_hang,$ma_don_hang,$trang_thai_don_hang){
        $sql = 'UPDATE don_hangs  SET ma_don_hang =? ,trang_thai_id = ? WHERE id=?';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
             $ma_don_hang,
            $trang_thai_don_hang,
           $id_don_hang,
        ]);
        return true;
    }

    public function getChiTietDonHang($id_don_hang) {
        try {
            $sql = "SELECT chi_tiet_don_hangs.*,san_phams.ten_san_pham,san_phams.hinh_anh
                     FROM chi_tiet_don_hangs
                     JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
                    WHERE chi_tiet_don_hangs.don_hang_id = :don_hang_id ";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':don_hang_id'=>$id_don_hang]);
                 
                return $stmt->fetchAll();
        } catch (\Throwable $th) {  
            //throw $th;
        }
        
    }
    public function getDetailDonHangById($id_don_hang){
        try {
            $sql = "SELECT * FROM don_hangs WHERE id=:id";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':id'=>$id_don_hang]);

                return $stmt->fetch();
        } catch (\Throwable $th) {  
            //throw $th;
        }
    }
    public function getTrangThaiDonHang(){
        try {
            $sql = "SELECT * FROM trang_thai_don_hangs";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([]);

                return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {  
            //throw $th;
        }
    }

    public function getPhuongThucThanhToan(){
        try {
            $sql = "SELECT * FROM phuong_thuc_thanh_toans";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([]);

                return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {  
            //throw $th;
        }
    }

    public function getAllDonHangByTT($trang_thai_id){
        try {
            $sql = "SELECT * FROM don_hangs WHERE trang_thai_id = ?";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$trang_thai_id]);

                return $stmt->fetchAll();
        } catch (\Throwable $th) {  
            //throw $th;
        }
    }


}
