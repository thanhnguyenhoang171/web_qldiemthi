SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE `day` (
  `MaDayHoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaMonHoc` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Magv`  varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaLopHoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaHocKy` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `MoTaPhanCong` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `day` (`MaDayHoc`, `MaMonHoc`, `Magv`, `MaLopHoc`, `MaHocKy`, `MoTaPhanCong`) VALUES
('1', 'ITECT1001', '2300000001', 'CS02C', '23HK2', 'Giảng Viên Lý Thuyết'),
('2', 'ITECT1002', '2300000002', 'CS02C', '23HK2', 'Thỉnh giảng về dạy'),
('4', 'CSDL0201', '2300000004', 'CS02C', '23HK1', 'Giảng Viên Thường Trực'),
('5', 'TH223', '2300000005', 'CS02C', '23HK1', 'Giảng Viên Thường Trực'),
('6', 'MMT0102', '2300000006', 'CS02C', '23HK1', 'Thỉnh giảng về dạy');




CREATE TABLE `diem` (
  `MaDiem` int(10) NOT NULL,
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


CREATE TABLE `giaovien` (
  `Magv`  varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaMonHoc` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Tengv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `passwordgv` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `giaovien` (`Magv`, `MaMonHoc`, `Tengv`, `DiaChi`, `SDT`, `passwordgv`) VALUES
('2300000001', 'ITECT1001', 'Phan Trần Minh Khuê', 'TP. Hồ Chí Minh', '1234567890', '6ae2c1cb2d793d5a534e761f9d3a4927'),
('2300000002', 'ITECT1002', 'Trương Quốc Việt', 'TP. Hà Nội ', '1234567898', '5d53dc77b0119df58a4e3b911153837f'),
('2300000004', 'CSDL0201', 'Nguyễn Hồng Thái', 'TP. Đà Nẵng', '0989878765', '988eaa130248c456e61a35b37b779b33'),
('2300000005', 'TH223', 'Trần Văn Quyết', 'TP. Sơn La', '0305882828', 'bfdd2aa14723a0134aada9e6ea499c55'),
('2300000006', 'MMT0102', 'Trần Văn Sơn', 'TP. Hải Phòng', '1243736745', '7633dc9f6fb8ad9eb64816792d491cfd');




CREATE TABLE `hocky` (
  `MaHocKy` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TenHocKy` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `HeSoHK` int(1) NOT NULL,
  `NamHoc` char(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `hocky` (`MaHocKy`, `TenHocKy`, `HeSoHK`, `NamHoc`) VALUES
('23HK1', 'Học Kỳ 1', 2, '2023-2024'),
('23HK2', 'Học Kỳ 2', 2, '2023-2024');
-- --------------------------------------------------------


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


INSERT INTO `hocsinh` (`MaHS`, `MaLopHoc`, `TenHS`, `GioiTinh`, `NgaySinh`, `noisinh`, `dantoc`, `hotencha`, `hotenme`, `passwordhs`) VALUES
('1111111111', 'CS02C', 'Phạm Thị Lan', 'Nữ', '2010-05-20', 'Hà Nội', 'Kinh', 'Phạm Văn Nam', 'Nguyễn Thị Hương', 'e11170b8cbd2d74102651cb967fa28e5'),
('1212121212', 'CS02C', 'Trần Văn Hưng', 'Nam', '2011-01-25', 'Thanh Hóa', 'Kinh', 'Trần Văn Lợi', 'Nguyễn Thị Tâm', '00cedcf91beffa9ee69f6cfe23a4602d'),
('1234567890', 'CS02C', 'Nguyễn Văn Sơn', 'Nam', '2010-01-01', 'Hà Nội', 'Kinh', 'Nguyễn Văn B', 'Nguyễn Thị C', 'e807f1fcf82d132f9bb018ca6738a19f'),
('1313131313', 'CS02C', 'Nguyễn Thị Nhung', 'Nữ', '2010-10-14', 'Vĩnh Phúc', 'Kinh', 'Nguyễn Văn Thắng', 'Trần Thị Uyên', 'e5d4b739db1226088177e6f8b70c3a6f'),
('1414141414', 'CS02C', 'Lê Văn Nam', 'Nam', '2010-02-28', 'Cần Thơ', 'Kinh', 'Lê Văn Đức', 'Nguyễn Thị Yến', 'f6f79a5086f1f0923b1dfc3c603b6e36'),
('2151013042', 'CS02C', 'Nguyễn Lê Minh Khuê', 'Nữ', '2003-10-02', 'Tây Ninh', 'Kinh', 'Hide', 'Hide', '80c5571067e54d78bee830f37fdc6eda'),
('2151013087', 'CS02C', 'Nguyễn Hoàng Thanh', 'Nam', '2003-01-17', 'TP. Hồ Chí Minh', 'Kinh', 'Hide', 'Hide', '55c190ea3c263095c08ee461833dfc9b'),
('2222222222', 'CS02C', 'Lê Văn Tùng', 'Nam', '2010-08-15', 'Hồ Chí Minh', 'Kinh', 'Lê Văn An', 'Nguyễn Thị Hoa', '3a08fe7b8c4da6ed09f21c3ef97efce2'),
('3333333333', 'CS02C', 'Trần Văn Nam', 'Nam', '2010-03-10', 'Đà Nẵng', 'Kinh', 'Trần Văn Đức', 'Nguyễn Thị Mai', '4aee3e28df37ea1af64bd636eca59dcb'),
('4444444444', 'CS02C', 'Lê Thị Hương', 'Nữ', '2011-07-05', 'Hải Phòng', 'Kinh', 'Lê Văn Tú', 'Nguyễn Thị Linh', 'e53a68903e2c336a890907125b489abd'),
('5555555555', 'CS02C', 'Nguyễn Văn Cường', 'Nam', '2010-09-12', 'Quảng Ninh', 'Kinh', 'Nguyễn Văn Dũng', 'Trần Thị Hà', '0b5de470bdace90bd6cfb2541eb79f99'),
('6666666666', 'CS02C', 'Trần Thị Hoa', 'Nữ', '2010-11-18', 'Nghệ An', 'Kinh', 'Trần Văn Anh', 'Nguyễn Thị Huệ', '0ff5247ca8a0dd247b3ed7428922b7ef'),
('7777777777', 'CS02C', 'Hoàng Văn Phúc', 'Nam', '2010-04-22', 'Lâm Đồng', 'Kinh', 'Hoàng Văn Hùng', 'Trần Thị Lan', '664fae06a748e656511d55b59fc6f85e'),
('8888888888', 'CS02C', 'Phạm Thị Mai', 'Nữ', '2010-12-30', 'Bắc Ninh', 'Kinh', 'Phạm Văn Lâm', 'Nguyễn Thị Ngọc', '312f04f99be9e857bfb2c033eeb1d3e2'),
('9876543210', 'CS02C', 'Nguyễn Thị Linh', 'Nữ', '2011-02-02', 'TP.Hồ Chí Minh', 'Kinh', 'Nguyễn Văn D', 'Nguyễn Thị E', 'e388c1c5df4933fa01f6da9f92595589'),
('9999999999', 'CS02C', 'Nguyễn Văn Đức', 'Nam', '2010-06-08', 'Thái Bình', 'Kinh', 'Nguyễn Văn Hòa', 'Trần Thị Phương', 'e0ec043b3f9e198ec09041687e4d4e8d');


CREATE TABLE `lophoc` (
  `MaLopHoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Tenlophoc` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `KhoiHoc` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `lophoc` (`MaLopHoc`, `Tenlophoc`, `KhoiHoc`) VALUES
('CS01C', 'Khoa Học Máy Tính 1', 'IT'),
('CS02C', 'Khoa Học Máy Tính 2', 'IT');




CREATE TABLE `monhoc` (
  `MaMonHoc` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `TenMonHoc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SoTiet` int(20) NOT NULL,
  `HeSoMonHoc` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



INSERT INTO `monhoc` (`MaMonHoc`, `TenMonHoc`, `SoTiet`, `HeSoMonHoc`) VALUES
('CSDL0201', 'Cơ Sở Dữ Liệu', 130, 2),
('CTDLGT23', 'Cấu Trúc Dữ Liệu & Giải Thuật', 120, 2),
('KTPM23', 'Kiểm Thử Phần Mềm', 120, 2),
('CV2024', 'Thị Giác Máy Tính', 100, 2),
('MMT0102', 'Mạng Máy Tính', 120, 2),
('TH223', 'Triết Học Mác-Lênin', 80, 1),
('TTHCM223', 'Tư Tưởng Hồ Chí Minh', 80, 1);



CREATE TABLE `user` (
  `userid`varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



INSERT INTO `user` (`userid`, `username`, `password`, `level`) VALUES
(1, 'qldtou', '21232f297a57a5a743894a0e4a801fc3', 1),
(4, 'httdhmo', '8689a2e3b18a30cdf2f90211eff2ff53', 1);



ALTER TABLE `day`
  ADD PRIMARY KEY (`MaDayHoc`),
  ADD KEY `fk_day_monhoc` (`MaMonHoc`),
  ADD KEY `fk_day_gv` (`Magv`),
  ADD KEY `fk_day_hocky` (`MaHocKy`),
  ADD KEY `fk_day_lophoc` (`MaLopHoc`);


ALTER TABLE `diem`
  ADD PRIMARY KEY (`MaDiem`),
  ADD KEY `fk_diem_mahk` (`MaHocKy`),
  ADD KEY `fk_diem_monhoc` (`MaMonHoc`),
  ADD KEY `fk_diem_hocsinh` (`MaHS`),
  ADD KEY `MaLopHoc` (`MaLopHoc`);


ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`Magv`),
  ADD UNIQUE KEY `SDT` (`SDT`),
  ADD KEY `fk_gv_mh` (`MaMonHoc`);


ALTER TABLE `hocky`
  ADD PRIMARY KEY (`MaHocKy`);


ALTER TABLE `hocsinh`
  ADD PRIMARY KEY (`MaHS`),
  ADD KEY `fk_hs_lh` (`MaLopHoc`);


ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`MaLopHoc`);


ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`MaMonHoc`);


ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);


ALTER TABLE `diem`
  MODIFY `MaDiem` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;


ALTER TABLE `user`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `day`
  ADD CONSTRAINT `fk_day_gv` FOREIGN KEY (`Magv`) REFERENCES `giaovien` (`Magv`),
  ADD CONSTRAINT `fk_day_hocky` FOREIGN KEY (`MaHocKy`) REFERENCES `hocky` (`MaHocKy`),
  ADD CONSTRAINT `fk_day_lophoc` FOREIGN KEY (`MaLopHoc`) REFERENCES `lophoc` (`MaLopHoc`),
  ADD CONSTRAINT `fk_day_monhoc` FOREIGN KEY (`MaMonHoc`) REFERENCES `monhoc` (`MaMonHoc`);


ALTER TABLE `diem`
  ADD CONSTRAINT `diem_ibfk_1` FOREIGN KEY (`MaLopHoc`) REFERENCES `lophoc` (`MaLopHoc`),
  ADD CONSTRAINT `fk_diem_hocsinh` FOREIGN KEY (`MaHS`) REFERENCES `hocsinh` (`MaHS`),
  ADD CONSTRAINT `fk_diem_mahk` FOREIGN KEY (`MaHocKy`) REFERENCES `hocky` (`MaHocKy`),
  ADD CONSTRAINT `fk_diem_monhoc` FOREIGN KEY (`MaMonHoc`) REFERENCES `monhoc` (`MaMonHoc`);


ALTER TABLE `giaovien`
  ADD CONSTRAINT `fk_gv_mh` FOREIGN KEY (`MaMonHoc`) REFERENCES `monhoc` (`MaMonHoc`);


ALTER TABLE `hocsinh`
  ADD CONSTRAINT `fk_hs_lh` FOREIGN KEY (`MaLopHoc`) REFERENCES `lophoc` (`MaLopHoc`);


