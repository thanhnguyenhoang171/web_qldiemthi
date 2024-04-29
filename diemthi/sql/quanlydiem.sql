-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 10:22 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlydiem`
--

-- --------------------------------------------------------

--
-- Table structure for table `day`
--

CREATE TABLE `day` (
  `MaDayHoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaMonHoc` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Magv` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaLopHoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaHocKy` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `MoTaPhanCong` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `day`
--

INSERT INTO `day` (`MaDayHoc`, `MaMonHoc`, `Magv`, `MaLopHoc`, `MaHocKy`, `MoTaPhanCong`) VALUES
('1', 'KTPM23', '2300000001', 'CS02C', '23HK2', 'Giảng Viên Lý Thuyết'),
('2', 'CV2024', '2300000002', 'CS02C', '23HK2', 'Thỉnh giảng về dạy'),
('4', 'CSDL0201', '2300000004', 'CS02C', '23HK1', 'Giảng Viên Thường Trực'),
('5', 'TH223', '2300000005', 'CS02C', '23HK1', 'Giảng Viên Thường Trực'),
('6', 'MMT0102', '2300000006', 'CS01C', '23HK1', 'Thỉnh giảng về dạy');

-- --------------------------------------------------------

--
-- Table structure for table `diem`
--

CREATE TABLE `diem` (
  `MaDiem` int(6) NOT NULL,
  `MaHocKy` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `MaMonHoc` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `MaHS` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaLopHoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `DiemMieng` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `Diem15Phut1` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `Diem15Phut2` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `Diem1Tiet1` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `Diem1Tiet2` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `DiemThi` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `DiemTB` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `diem`
--

INSERT INTO `diem` (`MaDiem`, `MaHocKy`, `MaMonHoc`, `MaHS`, `MaLopHoc`, `DiemMieng`, `Diem15Phut1`, `Diem15Phut2`, `Diem1Tiet1`, `Diem1Tiet2`, `DiemThi`, `DiemTB`) VALUES
(109, '23HK2', 'KTPM23', '1111111111', 'CS02C', '-4', '6', '6', '2', '5', '8', 4.6),
(110, '23HK2', 'KTPM23', '1212121212', 'CS02C', '2', '1', '1', '4', '3', '2', 1.9),
(111, '23HK2', 'KTPM23', '1234567890', 'CS02C', '1', '2', '5', '5', '8', '7', 4.9),
(112, '23HK2', 'KTPM23', '1313131313', 'CS02C', '5', '2', '3', '3', '2', '2', 2.6),
(113, '23HK2', 'KTPM23', '1414141414', 'CS02C', '4', '4', '6', '5', '4', '5', 4.8),
(114, '23HK2', 'KTPM23', '2151013042', 'CS02C', '7', '8', '9', '6', '5', '2', 5.8),
(115, '23HK2', 'KTPM23', '2151013087', 'CS02C', '4', '5', '6', '3', '2', '8', 5.5),
(116, '23HK2', 'KTPM23', '2222222222', 'CS02C', '5', '4', '7', '8', '9', '6', 6.2),
(117, '23HK2', 'KTPM23', '3333333333', 'CS02C', '2', '5', '6', '3', '1', '4', 4),
(118, '23HK2', 'KTPM23', '4444444444', 'CS02C', '7', '8', '5', '2', '3', '6', 5.6),
(119, '23HK2', 'KTPM23', '5555555555', 'CS02C', '4', '7', '8', '5', '5', '6', 6.2),
(120, '23HK2', 'KTPM23', '6666666666', 'CS02C', '2', '5', '6', '3', '2', '1', 3.2),
(121, '23HK2', 'KTPM23', '7777777777', 'CS02C', '4', '7', '8', '5', '2', '3', 5),
(122, '23HK2', 'KTPM23', '8888888888', 'CS02C', '7', '8', '9', '9', '6', '2', 6.2),
(123, '23HK2', 'KTPM23', '9876543210', 'CS02C', '4', '5', '6', '3', '5', '8', 5.8),
(124, '23HK2', 'KTPM23', '9999999999', 'CS02C', '7', '8', '5', '2', '3', '5', 5.3);

-- --------------------------------------------------------

--
-- Table structure for table `giaovien`
--

CREATE TABLE `giaovien` (
  `Magv` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaMonHoc` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Tengv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `MaHocKy` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `passwordgv` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giaovien`
--

INSERT INTO `giaovien` (`Magv`, `MaMonHoc`, `Tengv`, `DiaChi`, `SDT`, `MaHocKy`, `passwordgv`) VALUES
('2300000001', 'KTPM23', 'Phan Trần Minh Khuê', 'TP. Hồ Chí Minh  ', '1234567890', '23HK2', '8516374aa34fb836e33fbc6e0e5bfe14'),
('2300000002', 'CV2024', 'Trương Quốc Việt', 'TP. Hà Nội   ', '1234567898', '23HK2', '249702181ecfd6a7d7eb4489ed013c96'),
('2300000004', 'CTDLGT23', 'Nguyễn Hồng Thái', 'TP. Đà Nẵng', '0989878765', '23HK1', '988eaa130248c456e61a35b37b779b33'),
('2300000005', 'TH223', 'Trần Văn Quyết', 'TP. Sơn La', '0305882828', '23HK1', 'bfdd2aa14723a0134aada9e6ea499c55'),
('2300000006', 'MMT0102', 'Trần Văn Sơn', 'TP. Hải Phòng', '1243736745', '23HK1', '7633dc9f6fb8ad9eb64816792d491cfd');

-- --------------------------------------------------------

--
-- Table structure for table `hocky`
--

CREATE TABLE `hocky` (
  `MaHocKy` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TenHocKy` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `HeSoHK` int(1) NOT NULL,
  `NamHoc` char(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hocky`
--

INSERT INTO `hocky` (`MaHocKy`, `TenHocKy`, `HeSoHK`, `NamHoc`) VALUES
('23HK1', 'Học Kỳ 1', 2, '2023-2024'),
('23HK2', 'Học Kỳ 2', 2, '2023-2024');

-- --------------------------------------------------------

--
-- Table structure for table `hocsinh`
--

CREATE TABLE `hocsinh` (
  `MaHS` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaLopHoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TenHS` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinh` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `noisinh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dantoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `hotencha` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hotenme` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `passwordhs` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hocsinh`
--

INSERT INTO `hocsinh` (`MaHS`, `MaLopHoc`, `TenHS`, `GioiTinh`, `NgaySinh`, `noisinh`, `dantoc`, `hotencha`, `hotenme`, `passwordhs`) VALUES
('1111111111', 'CS02C', 'Phạm Thị Lan', 'Nữ', '2010-05-20', 'Hà Nội', 'Kinh', 'Phạm Văn Nam', 'Nguyễn Thị Hương', 'e11170b8cbd2d74102651cb967fa28e5'),
('1212121212', 'CS02C', 'Trần Văn Hưng', 'Nam', '2011-01-25', 'Thanh Hóa', 'Kinh', 'Trần Văn Lợi', 'Nguyễn Thị Tâm', '00cedcf91beffa9ee69f6cfe23a4602d'),
('1234567890', 'CS02C', 'Nguyễn Văn Sơn', 'Nam', '2010-01-01', 'Hà Nội', 'Kinh', 'Nguyễn Văn B', 'Nguyễn Thị C', 'e807f1fcf82d132f9bb018ca6738a19f'),
('1313131313', 'CS02C', 'Nguyễn Thị Nhung', 'Nữ', '2010-10-14', 'Vĩnh Phúc', 'Kinh', 'Nguyễn Văn Thắng', 'Trần Thị Uyên', 'e5d4b739db1226088177e6f8b70c3a6f'),
('1414141414', 'CS02C', 'Lê Văn Nam', 'Nam', '2010-02-28', 'Cần Thơ', 'Kinh', 'Lê Văn Đức', 'Nguyễn Thị Yến', 'f6f79a5086f1f0923b1dfc3c603b6e36'),
('2023202400', 'CS02C', 'Nguyễn Sĩ Bình', 'Nam', '2010-07-08', 'Thái Bình', 'Kinh', 'Nguyễn Văn Hòa', 'Trần Thị Phương', '21f23495d26550af5862e32c70e08e82'),
('2108959190', 'CS01C', 'Ngô Văn I', 'Nam', '2009-03-20', 'Nghệ An', 'Kinh', 'Ngô Văn K', 'Ngô Thị L', '2108959190'),
('2151013042', 'CS02C', 'Nguyễn Lê Minh Khuê', 'Nữ', '2003-10-02', 'Tây Ninh', 'Kinh', 'Hide', 'Hide', '80c5571067e54d78bee830f37fdc6eda'),
('2151013087', 'CS02C', 'Nguyễn Hoàng Thanh', 'Nam', '2003-01-17', 'TP. Hồ Chí Minh', 'Kinh', 'Hide', 'Hide', '55c190ea3c263095c08ee461833dfc9b'),
('2151030555', 'CS01C', 'Nguyễn Hoàng Thanh', 'Nam', '2024-04-09', 'Hà Nội', 'Kinh', 'Trần Hùng Hoàn', 'Nguyễn Thị Mỹ Hà', '7b349a0223d7617c664faababfdacd90'),
('2158806459', 'CS02C', 'Ngô Thị P', 'Nữ', '2007-09-14', 'Hải Dương', 'Kinh', 'Ngô Văn Q', 'Ngô Thị R', '2158806459'),
('2191555594', 'CS02C', 'Hoàng Văn V', 'Nam', '2008-11-18', 'Hà Nội', 'Kinh', 'Hoàng Văn X', 'Hoàng Thị Y', '2191555594'),
('2222222222', 'CS02C', 'Lê Văn Tùng', 'Nam', '2010-08-15', 'Hồ Chí Minh', 'Kinh', 'Lê Văn An', 'Nguyễn Thị Hoa', '3a08fe7b8c4da6ed09f21c3ef97efce2'),
('2335473806', 'CS02C', 'Lê Thị D', 'Nữ', '2008-03-25', 'Hồ Chí Minh', 'Kinh', 'Lê Văn E', 'Lê Thị F', '2335473806'),
('2464784523', 'CS02C', 'Đinh Văn Q', 'Nam', '2009-10-07', 'Quảng Nam', 'Kinh', 'Đinh Văn R', 'Đinh Thị S', '2464784523'),
('2504027700', 'CS01C', 'Phạm Văn A', 'Nam', '2007-04-01', 'Thái Bình', 'Kinh', 'Phạm Văn B', 'Phạm Thị C', '2504027700'),
('2574926925', 'CS02C', 'Đinh Văn Y', 'Nam', '2009-10-02', 'Quảng Nam', 'Kinh', 'Đinh Văn Z', 'Đinh Thị A', '2574926925'),
('2638655572', 'CS02C', 'Đinh Văn M', 'Nam', '2009-10-04', 'Đà Nẵng', 'Kinh', 'Đinh Văn N', 'Đinh Thị P', '2638655572'),
('2925966089', 'CS01C', 'Phạm Thị P', 'Nữ', '2007-04-02', 'Hải Dương', 'Kinh', 'Phạm Văn Q', 'Phạm Thị R', '2925966089'),
('2930102826', 'CS02C', 'Trần Văn C', 'Nam', '2009-01-20', 'Đà Nẵng', 'Kinh', 'Trần Văn D', 'Trần Thị E', '2930102826'),
('3137829742', 'CS02C', 'Lê Thị I', 'Nữ', '2009-08-16', 'Nghệ An', 'Kinh', 'Lê Văn K', 'Lê Thị L', '3137829742'),
('3333333333', 'CS02C', 'Trần Văn Nam', 'Nam', '2010-03-10', 'Đà Nẵng', 'Kinh', 'Trần Văn Đức', 'Nguyễn Thị Mai', '4aee3e28df37ea1af64bd636eca59dcb'),
('3610022955', 'CS01C', 'Minh Kha Bảo', 'Nam', '2003-08-01', 'TP. Hà Nội', 'Kinh', 'Vũ Trần Xuân', 'Hình Vi Tường', '3610022955'),
('3826998313', 'CS01C', 'Mai Sáng Sớm', 'Nữ', '2003-04-01', 'TP. Hà Nội', 'Hoa', 'Trần Thiên Hoàng', 'Liêu Ái Quốc', '3826998313'),
('4019934056', 'CS02C', 'Hoàng Văn O', 'Nam', '2008-11-27', 'Hà Nội', 'Kinh', 'Hoàng Văn P', 'Hoàng Thị Q', '4019934056'),
('4038296803', 'CS01C', 'Nguyễn Thị G', 'Nữ', '2008-02-06', 'Hà Nội', 'Kinh', 'Nguyễn Văn H', 'Nguyễn Thị I', '4038296803'),
('4109277699', 'CS01C', 'Nguyễn Văn V', 'Nam', '2008-02-09', 'Hà Tĩnh', 'Kinh', 'Nguyễn Văn W', 'Nguyễn Thị X', '4109277699'),
('4111165981', 'CS02C', 'Lý Thị R', 'Nữ', '2008-03-24', 'Phú Thọ', 'Kinh', 'Lý Văn S', 'Lý Thị T', '4111165981'),
('4249435123', 'CS02C', 'Đinh Thị B', 'Nữ', '2009-10-06', 'Quảng Ninh', 'Kinh', 'Đinh Văn C', 'Đinh Thị D', '4249435123'),
('4359415005', 'CS02C', 'Bùi Thị K', 'Nữ', '2008-04-25', 'Hà Tĩnh', 'Kinh', 'Bùi Văn L', 'Bùi Thị M', '4359415005'),
('4444444444', 'CS02C', 'Lê Thị Hương', 'Nữ', '2011-07-05', 'Hải Phòng', 'Kinh', 'Lê Văn Tú', 'Nguyễn Thị Linh', 'e53a68903e2c336a890907125b489abd'),
('4463601296', 'CS01C', 'Vũ Thị Z', 'Nữ', '2008-07-07', 'Hưng Yên', 'Kinh', 'Vũ Văn A', 'Vũ Thị B', '4463601296'),
('4466441475', 'CS01C', 'Trần Văn H', 'Nam', '2007-05-11', 'Hải Phòng', 'Kinh', 'Trần Văn I', 'Trần Thị K', '4466441475'),
('4541952486', 'CS01C', 'Lê Văn M', 'Nam', '2007-05-18', 'Nam Định', 'Kinh', 'Lê Văn N', 'Lê Thị O', '4541952486'),
('4775930338', 'CS01C', 'Nguyễn Văn A', 'Nam', '2008-05-10', 'Hà Nội', 'Kinh', 'Nguyễn Văn B', 'Nguyễn Thị C', '4775930338'),
('4898792922', 'CS01C', 'Vũ Thị N', 'Nữ', '2008-07-09', 'Thanh Hóa', 'Kinh', 'Vũ Văn P', 'Vũ Thị Q', '4898792922'),
('5122881012', 'CS01C', 'Phạm Thị L', 'Nữ', '2007-03-29', 'Cần Thơ', 'Kinh', 'Phạm Văn M', 'Phạm Thị N', '5122881012'),
('5555555555', 'CS02C', 'Nguyễn Văn Cường', 'Nam', '2010-09-12', 'Quảng Ninh', 'Kinh', 'Nguyễn Văn Dũng', 'Trần Thị Hà', '0b5de470bdace90bd6cfb2541eb79f99'),
('5793609066', 'CS02C', 'Lê Thị U', 'Nữ', '2009-08-13', 'Bình Dương', 'Kinh', 'Lê Văn V', 'Lê Thị X', '5793609066'),
('5967523606', 'CS02C', 'Đặng Thị H', 'Nữ', '2007-12-15', 'Thanh Hóa', 'Kinh', 'Đặng Văn I', 'Đặng Thị K', '5967523606'),
('6288666875', 'CS02C', 'Lý Thị F', 'Nữ', '2008-03-26', 'Phú Thọ', 'Kinh', 'Lý Văn G', 'Lý Thị H', '6288666875'),
('6330273895', 'CS02C', 'Nguyễn Thị N', 'Nữ', '2009-08-22', 'Bình Dương', 'Kinh', 'Nguyễn Văn O', 'Nguyễn Thị P', '6330273895'),
('6439102451', 'CS01C', 'Vũ Thị R', 'Nữ', '2008-07-12', 'Hưng Yên', 'Kinh', 'Vũ Văn S', 'Vũ Thị T', '6439102451'),
('6622134518', 'CS01C', 'Vũ Văn G', 'Nam', '2008-09-10', 'Quảng Ninh', 'Kinh', 'Vũ Văn H', 'Vũ Thị I', '6622134518'),
('6666666666', 'CS02C', 'Trần Thị Hoa', 'Nữ', '2010-11-18', 'Nghệ An', 'Kinh', 'Trần Văn Anh', 'Nguyễn Thị Huệ', '0ff5247ca8a0dd247b3ed7428922b7ef'),
('6953281862', 'CS01C', 'Trần Thị X', 'Nữ', '2007-05-15', 'Quảng Bình', 'Kinh', 'Trần Văn Y', 'Trần Thị Z', '6953281862'),
('7064457194', 'CS01C', 'Y Vệ Quốc', 'Nam', '2003-04-03', 'TP. Hồ Chí Minh', 'Kinh', 'Trần Y Lý', 'Nguyễn Trần Ly', '7064457194'),
('7115669613', 'CS02C', 'Lê Văn Y', 'Nam', '2009-08-20', 'Đắk Lắk', 'Kinh', 'Lê Văn Z', 'Lê Thị A', '7115669613'),
('7175470262', 'CS01C', 'Vũ Văn C', 'Nam', '2008-07-11', 'Hưng Yên', 'Kinh', 'Vũ Văn D', 'Vũ Thị E', '7175470262'),
('7224804375', 'CS02C', 'Hoàng Thị F', 'Nữ', '2009-06-05', 'Bắc Ninh', 'Kinh', 'Hoàng Văn G', 'Hoàng Thị H', '7224804375'),
('7341295430', 'CS01C', 'Trần Văn T', 'Nam', '2007-05-08', 'Nam Định', 'Kinh', 'Trần Văn U', 'Trần Thị V', '7341295430'),
('7361204726', 'CS02C', 'Ngô Văn S', 'Nam', '2007-09-17', 'Thái Nguyên', 'Kinh', 'Ngô Văn T', 'Ngô Thị U', '7361204726'),
('7679226963', 'CS02C', 'Hoàng Thị Z', 'Nữ', '2008-11-25', 'Hải Phòng', 'Kinh', 'Hoàng Văn A', 'Hoàng Thị B', '7679226963'),
('7768612009', 'CS01C', 'Sứ Thanh Hoa', 'Nữ', '2003-05-10', 'TP. Hồ Chí Minh', 'Kinh', 'Liên Hoang Đường', 'Võ Hoa Viên', '7768612009'),
('7777777777', 'CS02C', 'Hoàng Văn Phúc', 'Nam', '2010-04-22', 'Lâm Đồng', 'Kinh', 'Hoàng Văn Hùng', 'Trần Thị Lan', '664fae06a748e656511d55b59fc6f85e'),
('7846390082', 'CS01C', 'Lê Văn Duyệt', 'Nam', '2003-04-10', 'TP. Hồ Chí Minh', 'Kinh', 'Lê Văn Trường', 'Lý Thiên Cảnh', '7846390082'),
('8371502212', 'CS01C', 'Trần Thị L', 'Nữ', '2008-02-12', 'Hà Nam', 'Kinh', 'Trần Văn M', 'Trần Thị N', '8371502212'),
('8423708510', 'CS02C', 'Lý Thị C', 'Nữ', '2008-03-22', 'Phú Thọ', 'Kinh', 'Lý Văn D', 'Lý Thị E', '8423708510'),
('8652489881', 'CS01C', 'Trương Văn E', 'Nam', '2009-12-21', 'Ninh Bình', 'Kinh', 'Trương Văn F', 'Trương Thị G', '8652489881'),
('8820736508', 'CS01C', 'Trương Thị T', 'Nữ', '2009-12-22', 'Ninh Bình', 'Kinh', 'Trương Văn U', 'Trương Thị V', '8820736508'),
('8888888888', 'CS02C', 'Phạm Thị Mai', 'Nữ', '2010-12-30', 'Bắc Ninh', 'Kinh', 'Phạm Văn Lâm', 'Nguyễn Thị Ngọc', '312f04f99be9e857bfb2c033eeb1d3e2'),
('8931902716', 'CS01C', 'Trương Văn Q', 'Nam', '2009-12-19', 'Ninh Bình', 'Kinh', 'Trương Văn R', 'Trương Thị S', '8931902716'),
('8992756307', 'CS01C', 'Nai Giườn Mỹ', 'Nữ', '2003-06-10', 'TP. Hồ Chí Minh', 'Kinh', 'Mỹ Thành Nhân', 'Thi Tri Sử', '8992756307'),
('9091636387', 'CS01C', 'Nguyễn Thị S', 'Nữ', '2008-02-03', 'Hà Nam', 'Kinh', 'Nguyễn Văn T', 'Nguyễn Thị U', '9091636387'),
('9226806831', 'CS01C', 'Phạm Văn E', 'Nam', '2007-11-30', 'Cần Thơ', 'Kinh', 'Phạm Văn F', 'Phạm Thị G', '9226806831'),
('9273160983', 'CS02C', 'Ngô Thị D', 'Nữ', '2007-09-16', 'Thái Nguyên', 'Kinh', 'Ngô Văn E', 'Ngô Thị F', '9273160983'),
('9278821349', 'CS01C', 'Nguyễn Thị B', 'Nữ', '2007-08-15', 'Hải Phòng', 'Kinh', 'Nguyễn Văn D', 'Nguyễn Thị E', '9278821349'),
('9424027293', 'CS01C', 'Trương Văn B', 'Nam', '2009-12-17', 'Ninh Bình', 'Kinh', 'Trương Văn C', 'Trương Thị D', '9424027293'),
('9466324972', 'CS01C', 'Phạm Thị X', 'Nữ', '2007-03-25', 'Hải Dương', 'Kinh', 'Phạm Văn Y', 'Phạm Thị Z', '9466324972'),
('9490858525', 'CS02C', 'Lý Văn U', 'Nam', '2008-03-27', 'Phú Thọ', 'Kinh', 'Lý Văn V', 'Lý Thị X', '9490858525'),
('9690449718', 'CS02C', 'Ngô Thị A', 'Nữ', '2007-09-12', 'Thái Nguyên', 'Kinh', 'Ngô Văn B', 'Ngô Thị C', '9690449718'),
('9732290071', 'CS01C', 'Trên Bử Liên', 'Nữ', '2003-12-12', 'TP. Hà Nội', 'Kinh', 'Ai Trường Kinh', 'Mai Quỳnh Thảo', '9732290071'),
('9876543210', 'CS02C', 'Nguyễn Thị Linh', 'Nữ', '2011-02-02', 'TP.Hồ Chí Minh', 'Kinh', 'Nguyễn Văn D', 'Nguyễn Thị E', 'e388c1c5df4933fa01f6da9f92595589'),
('9916456884', 'CS02C', 'Hoàng Văn K', 'Nam', '2008-11-21', 'Hồ Chí Minh', 'Kinh', 'Hoàng Văn L', 'Hoàng Thị M', '9916456884'),
('9999999999', 'CS02C', 'Nguyễn Văn Đức', 'Nam', '2010-06-08', 'Thái Bình', 'Kinh', 'Nguyễn Văn Hòa', 'Trần Thị Phương', 'e0ec043b3f9e198ec09041687e4d4e8d');

-- --------------------------------------------------------

--
-- Table structure for table `lophoc`
--

CREATE TABLE `lophoc` (
  `MaLopHoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Tenlophoc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `KhoiHoc` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lophoc`
--

INSERT INTO `lophoc` (`MaLopHoc`, `Tenlophoc`, `KhoiHoc`) VALUES
('CS01C', 'Khoa Học Máy Tính 1', 'IT'),
('CS02C', 'Khoa Học Máy Tính 2', 'IT'),
('IT01C', 'Công Nghê Thông Tin 1', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `monhoc`
--

CREATE TABLE `monhoc` (
  `MaMonHoc` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `TenMonHoc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SoTiet` int(20) NOT NULL,
  `HeSoMonHoc` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `monhoc`
--

INSERT INTO `monhoc` (`MaMonHoc`, `TenMonHoc`, `SoTiet`, `HeSoMonHoc`) VALUES
('CSDL0201', 'Cơ Sở Dữ Liệu', 130, 2),
('CTDLGT23', 'Cấu Trúc Dữ Liệu & Giải Thuật', 120, 2),
('CV2024', 'Thị Giác Máy Tính', 100, 2),
('KTPM23', 'Kiểm Thử Phần Mềm', 120, 2),
('MMT0102', 'Mạng Máy Tính', 120, 2),
('TH223', 'Triết Học Mác-Lênin', 80, 1),
('TTHCM223', 'Tư Tưởng Hồ Chí Minh', 80, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(10) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `level`) VALUES
(1, 'qldtou', '21232f297a57a5a743894a0e4a801fc3', 1),
(4, 'httdhmo', '8689a2e3b18a30cdf2f90211eff2ff53', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `day`
--
ALTER TABLE `day`
  ADD PRIMARY KEY (`MaDayHoc`),
  ADD KEY `fk_day_monhoc` (`MaMonHoc`),
  ADD KEY `fk_day_gv` (`Magv`),
  ADD KEY `fk_day_hocky` (`MaHocKy`),
  ADD KEY `fk_day_lophoc` (`MaLopHoc`);

--
-- Indexes for table `diem`
--
ALTER TABLE `diem`
  ADD PRIMARY KEY (`MaDiem`),
  ADD KEY `fk_diem_mahk` (`MaHocKy`),
  ADD KEY `fk_diem_monhoc` (`MaMonHoc`),
  ADD KEY `fk_diem_hocsinh` (`MaHS`),
  ADD KEY `MaLopHoc` (`MaLopHoc`);

--
-- Indexes for table `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`Magv`),
  ADD UNIQUE KEY `SDT` (`SDT`),
  ADD KEY `fk_gv_mh` (`MaMonHoc`);

--
-- Indexes for table `hocky`
--
ALTER TABLE `hocky`
  ADD PRIMARY KEY (`MaHocKy`);

--
-- Indexes for table `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD PRIMARY KEY (`MaHS`),
  ADD KEY `fk_hs_lh` (`MaLopHoc`);

--
-- Indexes for table `lophoc`
--
ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`MaLopHoc`);

--
-- Indexes for table `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`MaMonHoc`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diem`
--
ALTER TABLE `diem`
  MODIFY `MaDiem` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `day`
--
ALTER TABLE `day`
  ADD CONSTRAINT `fk_day_gv` FOREIGN KEY (`Magv`) REFERENCES `giaovien` (`Magv`),
  ADD CONSTRAINT `fk_day_hocky` FOREIGN KEY (`MaHocKy`) REFERENCES `hocky` (`MaHocKy`),
  ADD CONSTRAINT `fk_day_lophoc` FOREIGN KEY (`MaLopHoc`) REFERENCES `lophoc` (`MaLopHoc`),
  ADD CONSTRAINT `fk_day_monhoc` FOREIGN KEY (`MaMonHoc`) REFERENCES `monhoc` (`MaMonHoc`);

--
-- Constraints for table `diem`
--
ALTER TABLE `diem`
  ADD CONSTRAINT `diem_ibfk_1` FOREIGN KEY (`MaLopHoc`) REFERENCES `lophoc` (`MaLopHoc`),
  ADD CONSTRAINT `fk_diem_hocsinh` FOREIGN KEY (`MaHS`) REFERENCES `hocsinh` (`MaHS`),
  ADD CONSTRAINT `fk_diem_mahk` FOREIGN KEY (`MaHocKy`) REFERENCES `hocky` (`MaHocKy`),
  ADD CONSTRAINT `fk_diem_monhoc` FOREIGN KEY (`MaMonHoc`) REFERENCES `monhoc` (`MaMonHoc`);

--
-- Constraints for table `giaovien`
--
ALTER TABLE `giaovien`
  ADD CONSTRAINT `fk_gv_mh` FOREIGN KEY (`MaMonHoc`) REFERENCES `monhoc` (`MaMonHoc`);

--
-- Constraints for table `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD CONSTRAINT `fk_hs_lh` FOREIGN KEY (`MaLopHoc`) REFERENCES `lophoc` (`MaLopHoc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
