<?php 

class DanhMuc
{
    public $conn;

    public function __construct() { // Hàm khởi tạo kết nối đối tượng
        $this->conn = connectDB();
    }
    
    public function getAllDanhMuc(){
        try {
            $sql = 'SELECT * FROM danh_mucs';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function insertDanhMuc($ten_danh_muc,$mo_ta){
        try {
            $sql = 'INSERT INTO danh_mucs (ten_danh_muc,mo_ta) VALUES (?,?) ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$ten_danh_muc,$mo_ta]);
            return true;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function getDetailDanhMuc($id){
        try {
            $sql = 'SELECT * FROM danh_mucs WHERE id = ?' ;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function EditDanhMuc($ten_danh_muc,$mo_ta,$id){
        try {
            $sql = 'UPDATE danh_mucs SET ten_danh_muc = ?, mo_ta = ?  WHERE id = ?';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$ten_danh_muc,$mo_ta,$id]);
            return true;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function deleteDanhMuc($id){
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