<?php

class Cart
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getGioHangFromUser($id)
    {
        try {
            $sql = "SELECT * FROM gio_hangs WHERE tai_khoan_id = :tai_khoan_id ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':tai_khoan_id' => $id]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function getDetailGioHang($id)
    {
        try {
            $sql = "SELECT chi_tiet_gio_hangs.*, san_phams.ten_san_pham, san_phams.hinh_anh, san_phams.gia_san_pham, san_phams.gia_khuyen_mai
              FROM chi_tiet_gio_hangs
              INNER JOIN san_phams ON chi_tiet_gio_hangs.san_pham_id = san_phams.id
              WHERE chi_tiet_gio_hangs.gio_hang_id = :gio_hang_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':gio_hang_id' => $id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function addGioHang($id)
    {
        try {
            $sql = "INSERT INTO gio_hangs (tai_khoan_id) VALUES (?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function updateSoLuong($gio_hang_id, $san_pham_id, $so_luong)
    {
        try {
            $sql = "UPDATE chi_tiet_gio_hangs
             SET so_luong=:so_luong 
             WHERE gio_hang_id =:gio_hang_id AND san_pham_id=:san_pham_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['gio_hang_id' => $gio_hang_id, 'so_luong' => $so_luong, 'san_pham_id' => $san_pham_id]);

            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function addDetailGioHang($gio_hang_id, $san_pham_id, $so_luong,$size)
    {
        try {
            $sql = "INSERT INTO chi_tiet_gio_hangs (gio_hang_id,san_pham_id,so_luong,size)VALUES (:gio_hang_id,:san_pham_id,:so_luong,:size)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':gio_hang_id'=>$gio_hang_id,':san_pham_id'=> $san_pham_id,':so_luong'=> $so_luong,':size'=>$size]);

            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function clearDetailGioHang($gio_hang_id)
    {
        try {
            $sql = "DELETE FROM chi_tiet_gio_hangs WHERE gio_hang_id = :gio_hang_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':gio_hang_id'=>$gio_hang_id,]);

            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    
    public function clearGioHang($tai_khoan_id)
    {
        try {
            $sql = "DELETE FROM chi_tiet_gio_hangs WHERE tai_khoan_id = :tai_khoan_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':tai_khoan_id'=>$tai_khoan_id,]);

            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function deleteSanPhamGioHang($id_chi_tiet_gio_hang){
        try {
            $sql = "DELETE FROM chi_tiet_gio_hangs WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id'=>$id_chi_tiet_gio_hang,]);

            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
