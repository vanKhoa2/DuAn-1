-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 07, 2025 at 02:32 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1_adidas`
--

-- --------------------------------------------------------

--
-- Table structure for table `binh_luans`
--

CREATE TABLE `binh_luans` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `tai_khoan_id` int NOT NULL,
  `noi_dung` text NOT NULL,
  `ngay_dang` date NOT NULL,
  `trang_thai` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `binh_luans`
--

INSERT INTO `binh_luans` (`id`, `san_pham_id`, `tai_khoan_id`, `noi_dung`, `ngay_dang`, `trang_thai`) VALUES
(1, 5, 1, 'Hàng Đẹp Quá Mn ạ', '2024-11-15', 1),
(4, 10, 3, 'Đẹp Quá trời', '2024-12-02', 1),
(5, 10, 3, 'Đẹp Quá trời', '2024-12-02', 1),
(6, 10, 3, 'Toàn Bán Cá', '2024-12-02', 1),
(7, 9, 3, 'Khoa ăn cức', '2024-12-02', 1),
(8, 7, 3, 'Đẹp vcl\r\n', '2024-12-03', 1),
(9, 37, 3, 'Ảnh siêu đẹp\r\n', '2024-12-07', 1),
(10, 22, 3, 'Quá đẹp', '2024-12-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hangs`
--

CREATE TABLE `chi_tiet_don_hangs` (
  `id` int NOT NULL,
  `don_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `don_gia` decimal(10,2) NOT NULL,
  `so_luong` int NOT NULL,
  `thanh_tien` decimal(10,2) NOT NULL,
  `size` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chi_tiet_don_hangs`
--

INSERT INTO `chi_tiet_don_hangs` (`id`, `don_hang_id`, `san_pham_id`, `don_gia`, `so_luong`, `thanh_tien`, `size`) VALUES
(4, 9, 9, '231233.00', 4, '924932.00', 0),
(5, 10, 7, '231233.00', 5, '1156165.00', 0),
(6, 11, 9, '231233.00', 4, '924932.00', 0),
(7, 12, 6, '200000.00', 6, '1200000.00', 0),
(8, 12, 7, '231233.00', 3, '693699.00', 0),
(9, 14, 9, '231233.00', 4, '924932.00', 43),
(10, 15, 31, '11111111.00', 3, '33333333.00', 42),
(11, 19, 22, '2000000.00', 1, '2000000.00', 42),
(12, 24, 22, '2000000.00', 1, '2000000.00', 42),
(13, 25, 22, '2000000.00', 1, '2000000.00', 40),
(14, 26, 22, '2000000.00', 1, '2000000.00', 40),
(15, 27, 35, '4000000.00', 1, '4000000.00', 41),
(16, 28, 26, '2000000.00', 1, '2000000.00', 42),
(17, 29, 22, '2000000.00', 2, '4000000.00', 40);

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_gio_hangs`
--

CREATE TABLE `chi_tiet_gio_hangs` (
  `id` int NOT NULL,
  `gio_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `so_luong` int NOT NULL,
  `size` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chi_tiet_gio_hangs`
--

INSERT INTO `chi_tiet_gio_hangs` (`id`, `gio_hang_id`, `san_pham_id`, `so_luong`, `size`) VALUES
(2, 4, 7, 30, 0),
(3, 4, 10, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `chuc_vus`
--

CREATE TABLE `chuc_vus` (
  `id` int NOT NULL,
  `ten_chuc_vu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chuc_vus`
--

INSERT INTO `chuc_vus` (`id`, `ten_chuc_vu`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `danh_mucs`
--

CREATE TABLE `danh_mucs` (
  `id` int NOT NULL,
  `ten_danh_muc` varchar(255) NOT NULL,
  `mo_ta` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `danh_mucs`
--

INSERT INTO `danh_mucs` (`id`, `ten_danh_muc`, `mo_ta`) VALUES
(2, 'Giày Chạy Bộ', '                                            '),
(5, 'Giày Tập Gym', '                                            '),
(7, 'Giày Bóng Đá', '                                        '),
(9, 'Giày Bóng Rổ', '                    '),
(11, 'Giày Leo Núi', '                    '),
(12, 'Giày Thời Trang', '');

-- --------------------------------------------------------

--
-- Table structure for table `don_hangs`
--

CREATE TABLE `don_hangs` (
  `id` int NOT NULL,
  `ma_don_hang` varchar(50) NOT NULL,
  `tai_khoan_id` int NOT NULL,
  `ten_nguoi_nhan` varchar(255) NOT NULL,
  `email_nguoi_nhan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sdt_nguoi_nhan` varchar(15) NOT NULL,
  `dia_chi_nguoi_nhan` text NOT NULL,
  `ngay_dat` date NOT NULL,
  `tong_tien` decimal(10,2) NOT NULL,
  `ghi_chu` text,
  `phuong_thuc_thanh_toan_id` int NOT NULL,
  `trang_thai_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `don_hangs`
--

INSERT INTO `don_hangs` (`id`, `ma_don_hang`, `tai_khoan_id`, `ten_nguoi_nhan`, `email_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi_nguoi_nhan`, `ngay_dat`, `tong_tien`, `ghi_chu`, `phuong_thuc_thanh_toan_id`, `trang_thai_id`) VALUES
(24, 'DH2129', 3, 'Nam', 'Nam@gmail.com', '0343141231', 'Hà Nội', '2024-12-06', '2030000.00', '', 1, 1),
(25, 'DH5421', 3, 'Nam', 'Nam@gmail.com', '', 'Hà Nội', '2024-12-06', '2030000.00', '', 1, 5),
(26, 'DH3728', 3, 'Nam', 'Nam@gmail.com', '0343141231', 'Hà Nội', '2024-12-06', '2030000.00', '', 1, 6),
(27, 'DH4271', 3, 'Nam', 'Nam@gmail.com', '0343141231', 'Hà Nội', '2024-12-06', '4030000.00', '', 1, 6),
(28, 'DH2031', 3, 'Nam', 'Nam@gmail.com', '0343141231', 'Hà Nội', '2024-12-07', '2030000.00', '', 1, 5),
(29, 'DH1984', 3, 'Nam', 'Nam@gmail.com', '0343141231', 'Hà Nội', '2024-12-07', '4030000.00', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gio_hangs`
--

CREATE TABLE `gio_hangs` (
  `id` int NOT NULL,
  `tai_khoan_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gio_hangs`
--

INSERT INTO `gio_hangs` (`id`, `tai_khoan_id`) VALUES
(4, 7),
(5, 3),
(6, 15);

-- --------------------------------------------------------

--
-- Table structure for table `hinh_anh_san_phams`
--

CREATE TABLE `hinh_anh_san_phams` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `link_hinh_anh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phuong_thuc_thanh_toans`
--

CREATE TABLE `phuong_thuc_thanh_toans` (
  `id` int NOT NULL,
  `ten_phuong_thuc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `phuong_thuc_thanh_toans`
--

INSERT INTO `phuong_thuc_thanh_toans` (`id`, `ten_phuong_thuc`) VALUES
(1, 'Thanh Toán Online'),
(2, 'Thanh Toán Khi Nhận Hàng');

-- --------------------------------------------------------

--
-- Table structure for table `san_phams`
--

CREATE TABLE `san_phams` (
  `id` int NOT NULL,
  `ten_san_pham` varchar(255) NOT NULL,
  `gia_san_pham` decimal(10,2) NOT NULL,
  `gia_khuyen_mai` decimal(10,2) DEFAULT NULL,
  `hinh_anh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `so_luong` int NOT NULL,
  `luot_xem` int DEFAULT '0',
  `ngay_nhap` date NOT NULL,
  `mo_ta` text,
  `danh_muc_id` int DEFAULT NULL,
  `trang_thai` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `san_phams`
--

INSERT INTO `san_phams` (`id`, `ten_san_pham`, `gia_san_pham`, `gia_khuyen_mai`, `hinh_anh`, `so_luong`, `luot_xem`, `ngay_nhap`, `mo_ta`, `danh_muc_id`, `trang_thai`) VALUES
(22, 'Adidas Predator', '3000000.00', '2000000.00', './images/_1733475208_sp8.jpg', 50, 0, '2024-11-24', ' Đế đinh cao, bám sân tốt, phù hợp với sân cỏ thật.', 7, 1),
(26, 'Adidas X', '3000000.00', '2000000.00', './images/_1733475294_sp6.jpg', 50, 0, '2024-11-13', ' Đế đinh cao, bám sân tốt, phù hợp với sân cỏ thật.', 7, 1),
(27, 'Giày FG Predator', '2000000.00', '1000000.00', './images/_1733475360_sp23.jpg', 5, 0, '2024-12-22', 'Đinh ngắn, phân bố đều để giảm chấn và bám sân tốt hơn.', 7, 1),
(28, 'Predator Accuracy', '12213123.00', '11111111.00', './images/_1733475641_sp21.jpg', 10, 0, '2024-12-10', 'Giày sneaker nổi tiếng với thiết kế cổ điển, phần đế cao su giúp tạo cảm giác êm ái và ổn định. Air Force 1 phù hợp với nhiều phong cách thời trang khác nhau và có độ bền cao. Đây là một trong những đôi giày phổ biến nhất trong văn hóa thời trang đường phố.', 7, 1),
(29, 'Adidas Dropset', '2500000.00', '2300000.00', './images/_1733475722_sp27.jpg', 213, 0, '2024-12-06', 'Thiết kế dành riêng cho tập gym, đặc biệt là nâng tạ và tập sức mạnh.', 5, 1),
(30, 'Adidas Powerlift', '3000000.00', '1233211.00', './images/_1733475801_sp19.jpg', 10, 0, '2024-12-19', 'Giày tập chuyên dụng cho powerlifting, hỗ trợ tư thế nâng tạ với đế cứng chắc.', 5, 1),
(31, 'Adidas Terrex Swift R3 GTX', '3000000.00', '1111111.00', './images/_1733480150_sp38.jpg', 213, 0, '2024-12-10', 'Giày sneaker nổi tiếng với thiết kế cổ điển, phần đế cao su giúp tạo cảm giác êm ái và ổn định. Air Force 1 phù hợp với nhiều phong cách thời trang khác nhau và có độ bền cao. Đây là một trong những đôi giày phổ biến nhất trong văn hóa thời trang đường phố.', 11, 1),
(32, 'Columbia Newton Ridge', '10000000.00', '1200000.00', './images/_1733480219_sp4.jpg', 10, 0, '2024-12-18', 'Giày sneaker nổi tiếng với thiết kế cổ điển, phần đế cao su giúp tạo cảm giác êm ái và ổn định. Air Force 1 phù hợp với nhiều phong cách thời trang khác nhau và có độ bền cao. Đây là một trong những đôi giày phổ biến nhất trong văn hóa thời trang đường phố.', 12, 1),
(33, 'Nike Air Force 1', '5000000.00', '3600000.00', './images/_1733480278_sp13.jpg', 10, 0, '2024-12-27', 'Giày sneaker nổi tiếng với thiết kế cổ điển, phần đế cao su giúp tạo cảm giác êm ái và ổn định. Air Force 1 phù hợp với nhiều phong cách thời trang khác nhau và có độ bền cao. Đây là một trong những đôi giày phổ biến nhất trong văn hóa thời trang đường phố.', 12, 1),
(34, 'Giày Adidas Ultraboot', '3400000.00', '2300000.00', './images/_1733480415_sp40.jpg', 10, 0, '2024-12-21', 'Mẫu giày này có thiết kế với các chi tiết đơn giản nhưng mang đậm phong cách streetwear. Được làm từ vải canvas và da lộn, kết hợp với đế cao su giúp tạo cảm giác thoải mái và dễ dàng di chuyển', 12, 1),
(35, 'Adidas Phoenix', '5600000.00', '4000000.00', './images/_1733480508_sp50.webp', 10, 0, '2024-12-29', 'Giày thể thao phong cách chunky, nổi bật với thiết kế đế dày và các lớp chất liệu khác nhau. Balenciaga Triple S đã trở thành biểu tượng của thời trang cao cấp và streetwear. Đôi giày này rất phù hợp với những ai yêu thích phong cách thời trang mạnh mẽ, độc đáo.', 12, 1),
(36, 'Puma Clyde All Pro', '2300000.00', '900000.00', './images/_1733480744_nike-1.jpeg', 213, 0, '2024-12-13', 'Giày bóng rổ cao cấp, với thiết kế nhẹ và phần đệm đế ProFoam+ hỗ trợ sự linh hoạt khi di chuyển. Được trang bị công nghệ bám sân đặc biệt giúp cầu thủ có thể thay đổi hướng nhanh chóng và dễ dàng kiểm soát bóng.', 9, 1),
(37, 'Li-Ning Way of Wade 10', '2300000.00', '2100000.00', './images/_1733480792_th.jpg', 213, 0, '2024-12-06', 'Mẫu giày này mang lại sự kết hợp hoàn hảo giữa thiết kế thẩm mỹ và công nghệ hỗ trợ chơi bóng. Đế giày sử dụng công nghệ Cloud giúp giảm shock và hỗ trợ lực, mang lại cảm giác êm ái và bảo vệ tốt cho chân khi thi đấu.', 9, 1),
(38, 'Nike Air Zoom Pegasus 41', '2500000.00', '2300000.00', './images/_1733480900_sp16.jpg', 10, 0, '2024-12-06', 'Đây là một trong những mẫu giày chạy bộ nổi tiếng của Nike, với đệm Zoom Air giúp giảm shock hiệu quả và mang lại cảm giác thoải mái khi chạy dài. Đế ngoài bằng cao su bền bỉ với độ bám tốt, phù hợp cho cả chạy trên đường bằng và các bề mặt khác.', 2, 1),
(39, 'Giày Adidas Siêu Đẹp', '3000000.00', '1111111.00', './images/_1733555418_sp28.jpg', 3, 0, '2024-12-22', 'Giày sneaker nổi tiếng với thiết kế cổ điển, phần đế cao su giúp tạo cảm giác êm ái và ổn định. Air Force 1 phù hợp với nhiều phong cách thời trang khác nhau và có độ bền cao. Đây là một trong những đôi giày phổ biến nhất trong văn hóa thời trang đường phố.', 12, 1),
(40, 'Giày Chạy Bộ Bền Bỉ', '12213123.00', '1221323.00', './images/_1733555495_sp37.jpg', 10, 0, '2024-12-20', 'Giày sneaker nổi tiếng với thiết kế cổ điển, phần đế cao su giúp tạo cảm giác êm ái và ổn định. Air Force 1 phù hợp với nhiều phong cách thời trang khác nhau và có độ bền cao. Đây là một trong những đôi giày phổ biến nhất trong văn hóa thời trang đường phố.', 2, 1),
(41, 'Giày Siêu Đẹp', '3000000.00', '1232131.00', './images/_1733555596_nike-1.jpeg', 10, 0, '2024-12-19', 'Giày sneaker nổi tiếng với thiết kế cổ điển, phần đế cao su giúp tạo cảm giác êm ái và ổn định. Air Force 1 phù hợp với nhiều phong cách thời trang khác nhau và có độ bền cao. Đây là một trong những đôi giày phổ biến nhất trong văn hóa thời trang đường phố.', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoans`
--

CREATE TABLE `tai_khoans` (
  `id` int NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `anh_dai_dien` varchar(255) DEFAULT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gioi_tinh` tinyint(1) NOT NULL DEFAULT '1',
  `dia_chi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `chuc_vu_id` int NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tai_khoans`
--

INSERT INTO `tai_khoans` (`id`, `ho_ten`, `anh_dai_dien`, `ngay_sinh`, `email`, `so_dien_thoai`, `gioi_tinh`, `dia_chi`, `mat_khau`, `chuc_vu_id`, `trang_thai`) VALUES
(1, 'Toàn', './images/_1731983971_2.jpg', '2024-11-22', 'thieutoan2004@gmail.com', '2132132', 1, 'Hà Nội', '1234', 1, 1),
(3, 'Nam', NULL, '2024-11-12', 'Nam@gmail.com', '0343141231', 2, 'Hà Nội', '12345', 2, 1),
(5, 'Toàn', NULL, NULL, 'toantvhph43215@fpt.edu.vn', '2132132', 1, 'Hà Nội', '1234', 2, 1),
(6, 'Toàn', NULL, NULL, 'thieutoan@gmail.com', '2132132', 1, 'Hà Nội', '333', 2, 1),
(7, 'Toàn ', NULL, NULL, 'duongtuanthanh312@gmail.com', '2132132', 1, 'Hà Nội', '1234', 2, 1),
(8, 'Toàn Bán Ca', NULL, NULL, 'toanbanrau2004@gmail.com', '2132132', 1, 'Hà Nội', '1234', 2, 1),
(11, 'Toàn Bán Ca', NULL, NULL, 'toanbdsa@gmail.com', '2132132', 1, 'Hà Nội', '12345', 2, 1),
(13, 'Toàn Bán Ca', NULL, NULL, 'toanbdsa21321@gmail.com', '2132132', 1, 'Hà Nội', '321321', 2, 1),
(14, 'Toàn Bán Ca', NULL, NULL, 'toanbdsa21321@gmail.com.vn', '2132132', 1, 'Hà Nội', '1234', 2, 1),
(15, 'Toàn', NULL, NULL, 'toanbanca2004@gmail.com', '2132132', 1, 'Hà Nội', '1234', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_don_hangs`
--

CREATE TABLE `trang_thai_don_hangs` (
  `id` int NOT NULL,
  `ten_trang_thai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `trang_thai_don_hangs`
--

INSERT INTO `trang_thai_don_hangs` (`id`, `ten_trang_thai`) VALUES
(1, 'Đang xử lý'),
(2, 'Đã xác nhận'),
(3, 'Đang đóng gói'),
(4, 'Đang vận chuyển'),
(5, 'Đã giao hàng'),
(6, 'Đã hủy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chuc_vus`
--
ALTER TABLE `chuc_vus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binh_luans`
--
ALTER TABLE `binh_luans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `chuc_vus`
--
ALTER TABLE `chuc_vus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
