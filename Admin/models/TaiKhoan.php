<?php 

class TaiKhoan
{
    public $conn;

    public function __construct() { // Hàm khởi tạo kết nối đối tượng
        $this->conn = connectDB();
    }
    
    public function getAllTaiKhoan(){
        try {
            $sql = 'SELECT * FROM tai_khoans';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function deleteTaiKhoan($id){
        try {
            $sql = 'DELETE FROM danh_mucs WHERE id = ?';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);
            return true;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}