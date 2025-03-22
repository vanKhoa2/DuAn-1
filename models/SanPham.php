<?php

class SanPham
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllSanPham()
    {
        try {
            $sql = 'SELECT san_phams.*, 
                    danh_mucs.ten_danh_muc
                    FROM san_phams
                INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id;';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }
    public function getDetailSanPham($id)
    {
        try {
            $sql = "SELECT  san_phams.*, danh_mucs.ten_danh_muc 
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id  
          WHERE san_phams.id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':id' => $id
                ]
            );
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getListAnhSanPham($id)
    {
        try {
            $sql = "SELECT * FROM hinh_anh_san_phams WHERE san_pham_id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':id' => $id
                ]
            );
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function getBinhLuanFromSanPham($id)
    {
        try {
            $sql = "SELECT binh_luans.*, tai_khoans.ho_ten, tai_khoans.anh_dai_dien FROM binh_luans
            INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id
            WHERE binh_luans.san_pham_id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function getAllDanhMuc()
    {
        try {
            $sql = "SELECT * FROM danh_mucs";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function getListSanPhamdDanhMuc($danh_muc_id)
    {
        try {
            $sql = 'SELECT san_phams.*, 
                    danh_mucs.ten_danh_muc
                    FROM san_phams
                INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id WHERE san_phams.danh_muc_id = ?;';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$danh_muc_id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }

    public function getSanPhamByDanhMuc($id_danh_muc)
    {
        try {
            $sql = "SELECT * FROM san_phams WHERE danh_muc_id=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id_danh_muc]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getSanPhamByKey($key)
    {
        try {
            $key = '%' . $key . '%';
            $sql = "SELECT * FROM san_phams WHERE ten_san_pham LIKE ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$key]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function addBinhLuan($id_san_pham, $tai_khoan_id, $noi_dung, $ngay_dang)
    {
        try {

            $sql = "INSERT INTO binh_luans (san_pham_id,tai_khoan_id,noi_dung,ngay_dang)  VALUES (?,?,?,?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id_san_pham, $tai_khoan_id, $noi_dung, $ngay_dang]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function getSanPhamByKeyPrice($minPrice,$maxPrice)
{
    try {

        $sql = "SELECT * FROM san_phams 
                WHERE gia_san_pham BETWEEN ? AND ?  ";
            
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$minPrice, $maxPrice]);

        return $stmt->fetchAll();
    } catch (Exception $e) {
        echo "Lỗi: " . $e->getMessage();
        return [];
    }
}
}
