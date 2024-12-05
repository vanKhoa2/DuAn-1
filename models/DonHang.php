<?php

class DonHang
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function addDonHang(
        $tai_khoan_id,
        $ten_nguoi_nhan,
        $email_nguoi_nhan,
        $sdt_nguoi_nhan,
        $dia_chi_nguoi_nhan,
        $ghi_chu,
        $tong_tien,
        $phuong_thuc_thanh_toan_id,
        $ngay_dat,
        $trang_thai_id,
        $ma_don_hang
    ) { {
            try {
                $sql = "INSERT INTO don_hangs (tai_khoan_id,ten_nguoi_nhan,
                                                                email_nguoi_nhan,
                                                                sdt_nguoi_nhan,
                                                                dia_chi_nguoi_nhan,
                                                                ghi_chu,
                                                                tong_tien,
                                                                phuong_thuc_thanh_toan_id,
                                                                ngay_dat,
                                                                trang_thai_id,
                                                                ma_don_hang )
                                                                 
                                                                 VALUES (?,?,?,?,?,?,?,?,?,?,?)";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$tai_khoan_id,
                $ten_nguoi_nhan,
                $email_nguoi_nhan,
                $sdt_nguoi_nhan,
                $dia_chi_nguoi_nhan,
                $ghi_chu,
                $tong_tien,
                $phuong_thuc_thanh_toan_id,
                $ngay_dat,
                $trang_thai_id,
                $ma_don_hang]);

                return $this->conn->lastInsertId();
            } catch (Exception $e) {
                echo "Lỗi: " . $e->getMessage();
            }
        }
    }
    public function addChiTietDonHang($donHangId,$sanPhamId,$donGia,$soLuong,$thanhTien,$size){
        try {
            $sql = "INSERT INTO chi_tiet_don_hangs (don_hang_id,san_pham_id,don_gia,so_luong,thanh_tien,size)
                    VALUES (?,?,?,?,?,?)";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$donHangId,$sanPhamId,$donGia,$soLuong,$thanhTien,$size]);

                return $this->conn->lastInsertId();
        } catch (\Throwable $th) {  
            //throw $th;
        }
    }
    public function getDonHangFromUser($tai_khoan_id){
        try {
            $sql = "SELECT * FROM don_hangs WHERE tai_khoan_id = ?";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$tai_khoan_id]);

                return $stmt->fetchAll();
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

    
    public function getDonHangById($donHangId){
        try {
            $sql = "SELECT * FROM don_hangs WHERE id=:id";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':id'=>$donHangId]);

                return $stmt->fetch();
        } catch (\Throwable $th) {  
            //throw $th;
        }
    }

    public function updateTrangThaiDonHang($donHangId,$trangThaiId){
        try {
            $sql = "UPDATE don_hangs SET trang_thai_id=:trang_thai_id WHERE id=:id";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(['trang_thai_id'=>$trangThaiId ,':id'=>$donHangId]);

                return true;
        } catch (\Throwable $th) {  
            //throw $th;
        }
    }
   
    public function chiTietDonHangByDonHangId($donHangId){
        try {
            $sql = "SELECT chi_tiet_don_hangs.*,san_phams.ten_san_pham,san_phams.hinh_anh
                     FROM chi_tiet_don_hangs
                     JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
                       WHERE chi_tiet_don_hangs.don_hang_id = :don_hang_id ";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':don_hang_id'=>$donHangId]);
                 
                return $stmt->fetchAll();
        } catch (\Throwable $th) {  
            //throw $th;
        }
    }
        
}
