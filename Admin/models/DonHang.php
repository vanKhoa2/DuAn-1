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
}
