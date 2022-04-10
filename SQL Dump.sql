DROP DATABASE IF EXISTS QUANLYQUANAN;
CREATE DATABASE QUANLYQUANAN;

USE QUANLYQUANAN;

SET NAMES utf8mb4;

DELIMITER $$
--
--
-- Thủ tục
--

-- chi tiết hoá đơn
CREATE DEFINER=`root`@`localhost` PROCEDURE `chitiet_hoadon` (IN `maDon` INT)  BEGIN
SELECT h.maHD,k.tenKH,k.diaChi,k.sdt,t.TenTA,c.soluong,SUM(c.soluong*c.giaban) AS tonggia,h.ngayDH
FROM hoadon h 
JOIN chitiethoadon c ON h.maHD=c.maHD 
JOIN thucan t ON t.maTA=c.maTA 
JOIN khachhang k ON k.maKH=h.maKH 
WHERE h.maHD=maDon
GROUP BY h.maHD,k.tenKH,k.diaChi,k.sdt,t.TenTA,c.soluong,h.ngayDH;
end$$

-- Sửa khách hàng
CREATE DEFINER=`root`@`localhost` PROCEDURE `edit_kh` (IN `KH` INT, IN `ten` VARCHAR(40), IN `dc` VARCHAR(30), IN `dt` INT)  BEGIN
UPDATE khachhang SET khachhang.tenKH=ten, khachhang.diaChi=dc,khachhang.sdt=dt WHERE khachhang.maKH=KH;
END$$

-- Sửa nhân viên
CREATE DEFINER=`root`@`localhost` PROCEDURE `edit_nv` (IN `NV` INT, IN `ten` VARCHAR(50), IN `gt` VARCHAR(20), IN `ns` DATE, IN `nglam` DATE, IN `dc` VARCHAR(50), IN `cv` VARCHAR(40), IN `dt` INT, IN `tien` INT)  BEGIN
UPDATE nhanvien SET nhanvien.tenNV=ten,nhanvien.gioiTinh=gt ,nhanvien.Ngaysinh=ns ,nhanvien.ngayLamviec=nglam ,nhanvien.Diachi=dc ,nhanvien.Chucvu=cv ,nhanvien.sdt=dt,nhanvien.luong=tien WHERE nhanvien.maNV=NV;
END$$

-- Sửa món ăn
CREATE DEFINER=`root`@`localhost` PROCEDURE `edit_thucan` (IN `ten` VARCHAR(50), IN `gia` INT, IN `maAN` INT)  BEGIN
UPDATE thucan SET thucan.TenTA=ten, thucan.Dongia=gia WHERE maTA=maAn;
END$$

-- Thông kê lương nhân viên cao nhất
CREATE DEFINER=`root`@`localhost` PROCEDURE `luongcaonhat` ()  BEGIN
 	SELECT maNV,tenNV,luong,Chucvu FROM nhanvien
WHERE luong=(SELECT MAX(nhanvien.luong) FROM nhanvien);
 END$$

-- Thông kê lương nhân viên thấp nhất
CREATE DEFINER=`root`@`localhost` PROCEDURE `luongthapnhat` ()  BEGIN
 	SELECT maNV,tenNV,luong,Chucvu FROM nhanvien
WHERE luong=(SELECT MIN(nhanvien.luong) FROM nhanvien);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `show_kh_by_id` (IN `id` INT)  SELECT * FROM khachhang WHERE maKH = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `show_nhanvien_by_id` (IN `id` INT)  SELECT * FROM nhanvien WHERE maNV = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `show_thucan_id` (IN `id` INT)  SELECT * FROM thucan WHERE maTA = id$$

-- Thêm khách hàng
CREATE DEFINER=`root`@`localhost` PROCEDURE `them_kh` (IN `ten` VARCHAR(50), IN `dc` VARCHAR(50), IN `dt` INT)  BEGIN
INSERT INTO khachhang (tenKH,diaChi,sdt) VALUES
(ten,dc,dt); 
END$$

-- Thêm nhân viên
CREATE DEFINER=`root`@`localhost` PROCEDURE `them_nv` (IN `ten` VARCHAR(50), IN `gt` VARCHAR(28), IN `dt` INT(30), IN `dc` VARCHAR(30), IN `sinh` DATE, IN `lam` DATE, IN `cv` VARCHAR(20), IN `tien` INT(30))  BEGIN
INSERT INTO nhanvien (tenNV, gioiTinh,sdt, Diachi, Ngaysinh, ngayLamviec, Chucvu, luong) VALUES (ten,gt,dt,dc,sinh,lam,cv,tien);
END$$

-- Thêm món ăn
CREATE DEFINER=`root`@`localhost` PROCEDURE `them_thucan` (IN `ten` VARCHAR(30), IN `gia` INT)  BEGIN
INSERT INTO thucan (TenTA,Dongia) VALUES (ten,gia);
END$$

-- Thống kê số lượng món ăn đã bán
CREATE DEFINER=`root`@`localhost` PROCEDURE `thongkebanhang` (IN `maAn` INT)  SELECT t.maTA,t.TenTA, t.Dongia, SUM(c.soluong) AS tongsl
    FROM thucan t LEFT OUTER JOIN chitiethoadon c ON t.maTA=c.maTA
    WHERE t.maTA=maAn
    GROUP BY t.maTA,t.TenTA$$

-- Thống kê số lượng món ăn bán chạy
CREATE DEFINER=`root`@`localhost` PROCEDURE `thucanbanchay` ()  SELECT t.maTA,t.TenTA,SUM(c.soluong) AS tongsl
    FROM thucan t JOIN chitiethoadon c ON t.maTA=c.maTA
    GROUP BY t.maTA,t.TenTA$$

-- Xoá hoá đơn
CREATE DEFINER=`root`@`localhost` PROCEDURE `xoahd` (IN `maDon` INT)  BEGIN
	DELETE FROM hoadon WHERE maHD=maDon;
END$$

-- Xoá khách hàng
CREATE DEFINER=`root`@`localhost` PROCEDURE `xoa_khachhang` (IN `makhach` INT)  BEGIN
DELETE FROM khachhang WHERE khachhang.maKH=makhach;
END$$

-- Xoá nhân viên
CREATE DEFINER=`root`@`localhost` PROCEDURE `xoa_nv` (IN `NV` INT)  BEGIN
DELETE FROM nhanvien WHERE maNV=NV;
END$$

-- Xoá món ăn
CREATE DEFINER=`root`@`localhost` PROCEDURE `xoa_thucan` (IN `maAN` INT)  BEGIN
DELETE FROM thucan WHERE maTA= maAN;
END$$

--
-- Các hàm
--

-- Thống kê doanh thu theo năm
CREATE DEFINER=`root`@`localhost` FUNCTION `doanhthutheonam` () RETURNS INT(11) BEGIN
  DECLARE tien int;
  SELECT sum(chitiethoadon.soluong*giaban) INTO tien
	from chitiethoadon JOIN hoadon ON chitiethoadon.maHD=hoadon.maHD
	WHERE year(hoadon.ngayDH)=YEAR(CURDATE());
    RETURN tien;
END$$

-- Thống kê thâm niên làm việc của nhân viên
CREATE DEFINER=`root`@`localhost` FUNCTION `thoigian_dalam` (`ma` INT(10)) RETURNS INT(11) BEGIN 
	DECLARE ngay date;
    DECLARE kq int;
    DECLARE ngay_hientai date DEFAULT now();
    SELECT nhanvien.ngayLamviec INTO ngay
    FROM nhanvien WHERE nhanvien.maNV=ma;
    SELECT (DATEDIFF(ngay_hientai,ngay)) INTO kq;
    RETURN kq;
 END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--
DROP TABLE IF EXISTS `chitiethoadon`;
CREATE TABLE `chitiethoadon` (
  `maHD` int(10) NOT NULL,
  `maTA` int(10) NOT NULL,
  `soluong` int(30) NOT NULL,
  `giaban` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`maHD`, `maTA`, `soluong`, `giaban`) VALUES
(1, 2, 2, 30000),
(2, 3, 1, 15000),
(3, 4, 3, 72000),
(4, 6, 1, 45000),
(5, 4, 4, 96000),
(6, 1, 1, 130000),
(7, 9, 2, 64000),
(8, 8, 4, 480000),
(9, 7, 2, 132000),
(10, 10, 2, 24000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--
DROP TABLE IF EXISTS `hoadon`;
CREATE TABLE `hoadon` (
  `maHD` int(10) NOT NULL,
  `maKH` int(10) NOT NULL,
  `maNV` int(10) NOT NULL,
  `ngayDH` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`maHD`, `maKH`, `maNV`, `ngayDH`) VALUES
(1, 8, 5, '2022-03-17'),
(2, 5, 7, '2022-03-01'),
(3, 1, 2, '2022-04-28'),
(4, 2, 7, '2022-04-22'),
(5, 3, 2, '2022-04-05'),
(6, 4, 9, '2022-04-10'),
(7, 6, 3, '2022-04-16'),
(8, 7, 1, '2022-04-19'),
(9, 10, 1, '2022-04-14'),
(10, 9, 4, '2022-04-30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--
DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE `khachhang` (
  `maKH` int(10) NOT NULL,
  `tenKH` varchar(50) NOT NULL,
  `diaChi` varchar(50) NOT NULL,
  `sdt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`maKH`, `tenKH`, `diaChi`, `sdt`) VALUES
(1, 'Trần Thị Ngọc Diêp', 'Đường Nguyễn Văn Linh', 123466889),
(2, 'Nguyễn Phương Thảo', 'Đường 3/2', 223334441),
(3, 'Phạm Ngọc Thạch', 'Đường 3/2', 223335551),
(4, 'Trang Thanh Tuấn', 'Đường Mậu Thân', 113334441),
(5, 'Phan Tuấn Kiệt', 'Đường Nguyễn Văn Cừ', 226664441),
(6, 'Nguyễn Minh Lộc', 'Đường 30/4', 324564441),
(7, 'Lê Văn Cam', 'Đường Nguyễn Mậu Thân', 219384441),
(8, 'Bành Thị Ngọc', 'Đường Nguyễn Cư Trinh', 227638441),
(9, 'Nguyễn Lê Phi Long', 'Đường Trần Văn Hoài', 287648241),
(10, 'Bá Học Cung', 'Đường Trường Chinh', 123418241);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--
DROP TABLE IF EXISTS `nhanvien`;
CREATE TABLE `nhanvien` (
  `maNV` int(50) NOT NULL,
  `tenNV` varchar(50) NOT NULL,
  `gioiTinh` varchar(10) NOT NULL,
  `Ngaysinh` date NOT NULL,
  `ngayLamviec` date NOT NULL,
  `Diachi` varchar(50) NOT NULL,
  `Chucvu` varchar(30) NOT NULL,
  `sdt` int(20) NOT NULL,
  `luong` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`maNV`, `tenNV`, `gioiTinh`, `Ngaysinh`, `ngayLamviec`, `Diachi`, `Chucvu`, `sdt`, `luong`) VALUES
(1, 'Phạm Mỹ Hạnh', 'Nữ', '1997-04-06', '2019-11-11', 'Đường 3/2', 'Quản lý', 214724836, 5000000),
(2, 'Trần Anh Tu', 'Nam', '1999-10-18', '2019-08-10', 'Đường Lý Tự Trọng', 'Phục vụ', 963335551, 3500000),
(3, 'Phan Anh Thư', 'Nữ', '1996-01-10', '2019-02-10', 'Đường Mạc Thiên Tích', 'Quản lý', 884445551, 5000000),
(4, 'Lê Thu Thảo', 'Nữ', '1997-06-06', '2018-08-09', 'Đường 30/4', 'Thu ngân', 968845551, 4000000),
(5, 'Lưu Trọng Phúc', 'Nam', '1996-09-21', '2018-08-01', 'Đường Mậu Thân', 'Đầu bếp', 967779991, 4700000),
(6, 'Trúc Anh Đài', 'Nam', '1998-10-11', '2019-03-04', 'Đường Trần Hoàng Na', 'Đầu bếp', 147483647, 9900000),
(7, 'Lương Sơn Bá', 'Nữ', '2022-03-28', '2022-03-29', 'Đường Trần Văn Hoài', 'Phục vụ', 728931369, 30000000),
(8, 'Tạ Tốn', 'Nam', '2022-03-28', '2022-03-29', 'Đường 30/4', 'Phục vụ', 123431369, 24000000),
(9, 'Đường Bá Hổ', 'Nam', '2022-03-28', '2022-03-29', 'Đường 30/4', 'Chủ tịch', 212341369, 24000000),
(10, 'Trương Vô Kỵ', 'Nam', '2022-03-28', '2022-03-29', 'Đường 3/2', 'Phục vụ', 839931321, 30000000),
(11, 'Nguyễn Văn Trọng', 'Nam', '2022-04-06', '2022-04-22', 'Đường Nguyễn Khuyến', 'Phục vụ', 963312312, 2000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thucan`
--
DROP TABLE IF EXISTS `thucan`;
CREATE TABLE `thucan` (
  `maTA` int(10) NOT NULL,
  `TenTA` varchar(30) NOT NULL,
  `Dongia` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thucan`
--

INSERT INTO `thucan` (`maTA`, `TenTA`, `Dongia`) VALUES
(1, 'Ba chỉ nướng ', 130000),
(2, 'Mỳ tương đen', 45000),
(3, 'Lẩu kim chi ', 1110000),
(4, 'Cơm cháy', 24000),
(5, 'Gà Chiên', 24000),
(6, 'Bò nướng lá lốt', 45000),
(7, 'Bò Hầm', 66000),
(8, 'Bò Nướng Lúc Lắc', 120000),
(9, 'Lẩu Gà Lá Giang', 32000),
(10, 'Cơm Chiên Dương Châu', 12000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`maHD`,`maTA`) USING BTREE,
  ADD UNIQUE KEY `maHD` (`maHD`),
  ADD KEY `maTA` (`maTA`) USING BTREE;

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`maHD`),
  ADD KEY `maKH` (`maKH`),
  ADD KEY `maNV` (`maNV`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`maKH`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`maNV`);

--
-- Chỉ mục cho bảng `thucan`
--
ALTER TABLE `thucan`
  ADD PRIMARY KEY (`maTA`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `maHD` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `maKH` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `maNV` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `thucan`
--
ALTER TABLE `thucan`
  MODIFY `maTA` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `fk_maHD_HoaDon_ChiTietHoaDon` FOREIGN KEY (`maHD`) REFERENCES `hoadon` (`maHD`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_maTA_ThucAn_ChiTietHoaDon` FOREIGN KEY (`maTA`) REFERENCES `thucan` (`maTA`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `khach1` FOREIGN KEY (`maKH`) REFERENCES `khachhang` (`maKH`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `manhanVien1` FOREIGN KEY (`maNV`) REFERENCES `nhanvien` (`maNV`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;