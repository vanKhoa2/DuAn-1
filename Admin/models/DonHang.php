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
}
