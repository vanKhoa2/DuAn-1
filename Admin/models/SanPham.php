<?php

class SanPham
{
    public $conn;

    public function __construct()
    { // Hàm khởi tạo kết nối đối tượng
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
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


    public function getDetailSanPham($id_san_pham)
    {
        try {
            $sql = 'SELECT * FROM san_phams WHERE id=? ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id_san_pham]);
            return $stmt->fetch();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }




    public function insertSanPham($ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $file_anh)
    {
        try {
            $sql = 'INSERT INTO san_phams (ten_san_pham,gia_san_pham,gia_khuyen_mai,so_luong,ngay_nhap,danh_muc_id,trang_thai,mo_ta,hinh_anh) VALUES (:ten_san_pham,:gia_san_pham,:gia_khuyen_mai,:so_luong,:ngay_nhap,:danh_muc_id,:trang_thai,:mo_ta,:hinh_anh) ';
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
                ':hinh_anh' => $file_anh
            ]);
            return true;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function editSanPham($ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $new_file, $id)
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

    public function deleteSanPham($id)
    {
        try {
            $sql = 'DELETE FROM san_phams WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return true;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
