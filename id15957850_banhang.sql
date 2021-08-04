-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 11, 2021 at 01:15 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id15957850_banhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `ID` int(11) NOT NULL,
  `MaDonHang` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `TenSanPham` varchar(1000) NOT NULL,
  `GiaSanPham` int(11) NOT NULL,
  `SoLuongSanPham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`ID`, `MaDonHang`, `MaSanPham`, `TenSanPham`, `GiaSanPham`, `SoLuongSanPham`) VALUES
(1, 1, 11, 'Điện thoại OPPO Reno5', 8400000, 1),
(2, 2, 3, 'Samsung Galaxy S21+ 5G 128GB', 26000000, 1),
(3, 2, 4, 'OnePlus 8 Pro 5G', 22000000, 1),
(4, 3, 2, 'iPhone 12 Pro Max 512GB\r\n', 41000000, 1),
(5, 4, 2, 'iPhone 12 Pro Max 512GB\r\n', 41000000, 1),
(6, 5, 2, 'iPhone 12 Pro Max 512GB\r\n', 41000000, 1),
(7, 6, 2, 'iPhone 12 Pro Max 512GB\r\n', 41000000, 1),
(8, 7, 2, 'iPhone 12 Pro Max 512GB\r\n', 41000000, 1),
(9, 8, 2, 'iPhone 12 Pro Max 512GB\r\n', 41000000, 1),
(10, 8, 3, 'Samsung Galaxy S21+ 5G 128GB', 26000000, 1),
(11, 9, 2, 'iPhone 12 Pro Max 512GB\r\n', 41000000, 1),
(12, 10, 2, 'iPhone 12 Pro Max 512GB\r\n', 41000000, 1),
(13, 11, 5, 'Laptop Apple MacBook Pro M1 2020 16GB/512GB ', 88000000, 2),
(14, 12, 4, 'OnePlus 8 Pro 5G', 66000000, 3),
(15, 13, 1, 'iPhone 12 64GB', 66000000, 3),
(16, 14, 1, 'iPhone 12 64GB', 66000000, 3),
(17, 14, 2, 'iPhone 12 Pro Max 512GB\r\n', 205000000, 5),
(18, 14, 12, 'Điện thoại Realme 7 Pro', 8500000, 1),
(19, 14, 8, 'Laptop Acer Nitro AN515 44 R9JM R5 4600H/8GB/512GB/4GB GTX1650/144Hz', 66000000, 3),
(20, 15, 2, 'iPhone 12 Pro Max 512GB\r\n', 41000000, 1),
(21, 17, 12, 'Điện thoại Realme 7 Pro', 8500000, 1),
(22, 17, 11, 'Điện thoại OPPO Reno5', 33600000, 4),
(23, 17, 3, 'Samsung Galaxy S21+ 5G 128GB', 104000000, 4),
(24, 16, 12, 'Điện thoại Realme 7 Pro', 8500000, 1),
(25, 16, 11, 'Điện thoại OPPO Reno5', 33600000, 4),
(26, 16, 3, 'Samsung Galaxy S21+ 5G 128GB', 104000000, 4),
(27, 18, 1, 'iPhone 12 64GB', 220000000, 10),
(28, 19, 1, 'iPhone 12 64GB', 44000000, 2),
(29, 19, 4, 'OnePlus 8 Pro 5G', 22000000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `ID` int(11) NOT NULL,
  `TenKhachHang` varchar(200) NOT NULL,
  `SDT` int(11) NOT NULL,
  `Email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`ID`, `TenKhachHang`, `SDT`, `Email`) VALUES
(13, 'dai2353', 987654329, 'dai123@gmail.com'),
(14, 'dai', 985622354, 'dai123@gmail.com'),
(15, 'bdgdjdh', 985643455, 'trungvinh4520@gmail.com'),
(16, 'ghshs', 895632147, 'gmail@gmail.com'),
(17, 'ghshs', 895632147, 'gmail@gmail.com'),
(18, 'khánh', 345803284, 'khanh16dk9cntt@gmail.com'),
(19, 'dai123', 233309875, 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `ID` int(11) NOT NULL,
  `TenLoaiSanPham` varchar(200) NOT NULL,
  `HinhAnhLoaiSanPham` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`ID`, `TenLoaiSanPham`, `HinhAnhLoaiSanPham`) VALUES
(1, 'Điện Thoại', 'https://daiok.000webhostapp.com/hang/phone.png'),
(2, 'Lapttop', 'https://daiok.000webhostapp.com/hang/laptop.png');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `ID` int(11) NOT NULL,
  `TenSanPham` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `GiaSanPham` int(15) NOT NULL,
  `HinhAnhSanPham` varchar(200) NOT NULL,
  `MoTaSanPham` varchar(10000) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `IDLoaiSanPham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`ID`, `TenSanPham`, `GiaSanPham`, `HinhAnhSanPham`, `MoTaSanPham`, `IDLoaiSanPham`) VALUES
(1, 'iPhone 12 64GB', 22000000, 'https://cdn.tgdd.vn/Products/Images/42/213031/iphone-12-xanh-duong-new-600x600-600x600.jpg', 'Apple đã trang bị con chip mới nhất của hãng (tính đến 11/2020) cho iPhone 12 đó là A14 Bionic, được sản xuất trên tiến trình 5 nm với hiệu suất ổn định hơn so với chip A13 được trang bị trên phiên bản tiền nhiệm iPhone 11.', 1),
(2, 'iPhone 12 Pro Max 512GB\r\n', 41000000, 'https://cdn.tgdd.vn/Products/Images/42/228744/iphone-12-pro-max-xanh-duong-new-600x600-600x600.jpg', 'iPhone 12 Pro Max 512GB - đẳng cấp từ tên gọi đến từng chi tiết. Ngay từ khi chỉ là tin đồn thì chiếc smartphone này đã làm đứng ngồi không yên bao “fan cứng” nhà Apple, với những nâng cấp vô cùng nổi bật hứa hẹn sẽ mang đến những trải nghiệm tốt nhất về mọi mặt mà chưa một chiếc iPhone tiền nhiệm nào có được.', 1),
(3, 'Samsung Galaxy S21+ 5G 128GB', 26000000, 'https://cdn.tgdd.vn/Products/Images/42/226385/samsung-galaxy-s21-plus-den-600x600-600x600.jpg', 'Samsung Galaxy S21+ 5G sở hữu thiết kế mới lạ chưa từng có trên các smartphone trước đây với phần cụm camera gắn liền với cạnh mang vẻ đẹp độc đáo, tạo sự kết nối hài hòa, liền mạch.', 1),
(4, 'OnePlus 8 Pro 5G', 22000000, 'https://cdn.tgdd.vn/Products/Images/42/214638/oneplus-8-pro-600x600-2-600x600.jpg', 'OnePlus 8 Pro 5G là chiếc điện thoại đánh dấu bước ngoặt của OnePlus trong năm 2020, smartphone đã và đang khẳng định lại vị trí của mình trên thị trường flagship cao cấp với thiết kế độc đáo, cụm camera ấn tượng, hiệu năng siêu khủng tích hợp nhiều công nghệ hiện đại.', 1),
(5, 'Laptop Apple MacBook Pro M1 2020 16GB/512GB ', 44000000, 'https://cdn.tgdd.vn/Products/Images/44/231255/apple-macbook-pro-2020-z11c-3-600x600.jpg', 'Apple Macbook Pro M1 2020 (Z11C) được nâng cấp với bộ vi xử lý mới cực kỳ mạnh mẽ, con laptop này sẽ phục vụ tốt cho công việc của bạn, đặc biệt bên lĩnh vực đồ họa, kỹ thuật.', 2),
(6, 'Laptop Dell XPS 13 9310 i5 1135G7/8GB/256GB', 39000000, 'https://cdn.tgdd.vn/Products/Images/44/232153/dell-xps-13-9310-i5-70231343-154421-024415-600x600.jpg', 'Laptop Dell XPS 13 9310 i5 (70231343) sở hữu một cấu hình mạnh mẽ đáng gờm trong thân máy siêu mỏng nhẹ, màn hình tràn viền cùng với độ sáng 500 nits rực rỡ đáp ứng trọn vẹn mọi nhu cầu của dân văn phòng.', 2),
(7, 'Laptop Asus ZenBook UX425EA i5 1135G7/8GB/512GB', 22000000, 'https://cdn.tgdd.vn/Products/Images/44/230351/asus-zenbook-ux425ea-i5-bm069t-grey-new-600x600.jpg', 'Siêu phẩm Asus ZenBook UX425EA i5 (BM069T) vừa ra mắt đến từ nhà Asus sở hữu thiết kế đẹp tinh tế, di động tối ưu cùng độ bền chuẩn quân đội. Đặc biệt, chiếc máy này sở hữu con chip Intel thế hệ 11 mới nhất đến thời điểm hiện tại đem đến những tính năng hiện đại và tân tiến nhất.', 2),
(8, 'Laptop Acer Nitro AN515 44 R9JM R5 4600H/8GB/512GB/4GB GTX1650/144Hz', 22000000, 'https://cdn.tgdd.vn/Products/Images/44/235404/acer-nitro-an515-44-r9jm-r5-nhq9msv003-15-600x600.jpg', 'Với card đồ họa rời GTX 1650, Acer Nitro AN515 44 R9JM R5 (NH.Q9MSV.003) trở thành một con laptop đáng gờm bởi hiệu năng vô cùng mạnh mẽ. Đây sẽ là laptop được săn đón trong năm 2021 cũng bởi thiết kế hầm hố đậm chất game thủ của mình.', 2),
(9, 'Điện thoại Samsung Galaxy A51 (8GB/128GB)', 9000000, 'https://cdn.tgdd.vn/Products/Images/42/220903/samsung-galaxy-a51-8gb-xanh-1-org.jpg', 'Samsung Galaxy A51 8GB/128GB là phiên bản cao cấp vừa mới được Samsung giới thiệu tại thị trường Việt Nam. Chiếc điện thoại gây ấn tượng với thiết kế màn hình tràn viền thế hệ mới, hiệu năng tốt cùng cụm camera chất lượng cao, và theo Strategy Analytics, máy là Smartphone Android Bán Chạy Nhất Thế Giới Quý 1/2020', 1),
(10, 'Điện thoại Vsmart Aris Pro', 8500000, 'https://cdn.tgdd.vn/Products/Images/42/228531/vsmart-aris-pro-xanh-1-org.jpg', 'Vsmart Aris Pro là một trong những mẫu điện thoại tiên phong áp dụng thành công công nghệ camera ẩn trong màn hình tiên tiến bậc nhất, chính thức được thương mại hóa và bán ra thị trường. Mở ra một kỉ nguyên mới của những mẫu smartphone với màn hình siêu tràn viền hoàn hảo, không còn khiếm khuyết.', 1),
(11, 'Điện thoại OPPO Reno5', 8400000, 'https://cdn.tgdd.vn/Products/Images/42/220438/oppo-reno5-bac-1-org.jpg', 'Thế hệ thứ 5 của dòng Reno đã chính thức được ra mắt. Với đỉnh cao thiết kế trong từng đường nét, sắc sảo dưới mọi góc nhìn OPPO Reno5 mở ra cánh cửa để bạn bước vào thế giới hiệu năng và khám phá những cung bậc giải trí đa sắc màu.', 1),
(12, 'Điện thoại Realme 7 Pro', 8500000, 'https://cdn.tgdd.vn/Products/Images/42/227689/realme-7-pro-bac-1-org.jpg', 'Realme 7 Pro là mẫu smartphone tầm trung của nhà Realme, chiếc điện thoại thông minh mang trong mình nhiều tính năng ưu việt với cụm camera ấn tượng 64 MP, viên pin khủng cùng khả năng sạc nhanh vượt trội 65W.', 1),
(13, 'Điện thoại iPhone SE 128GB', 13000000, 'https://cdn.tgdd.vn/Products/Images/42/222629/iphone-se-2020-do-1-1-org.jpg', 'Bao nhiêu ngày chờ đợi cùng nhiều tin đồn, iPhone SE 2020 cuối cùng cũng được ra mắt, gây sốt với thiếc kế gần như y chang iPhone 8, nhưng cấu hình thuộc hàng “bất khả chiến bại\" hiện nay trên thị trường smartphone, cùng với đó là mức giá không thể nào dễ chịu hơn.', 1),
(14, 'Điện thoại Xiaomi Redmi Note 10 (6GB/128GB)', 5200000, 'https://cdn.tgdd.vn/Products/Images/42/222758/xiaomi-redmi-note-10-trang-1-org.jpg', 'Xiaomi Redmi Note 10 là chiếc điện thoại thông minh gây ấn tượng mạnh với người tiêu dùng khi sở hữu sức mạnh, hiệu năng tuyệt đỉnh, 4 camera sau 48 MP đẳng cấp, thời lượng pin bền bỉ nhưng lại có mức giá rẻ đến bất ngờ.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `MatKhau` varchar(50) NOT NULL,
  `Phone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Name`, `Email`, `MatKhau`, `Phone`) VALUES
(1, 'admin', 'dai123@gmail.com', 'admin', '0123456789'),
(6, 'dai', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '0865747653'),
(7, 'admin', 'nguyen@gmaim.com', '21232f297a57a5a743894a0e4a801fc3', '0987654321'),
(8, 'admin', 'nguyen@gmaim.com', '21232f297a57a5a743894a0e4a801fc3', '0987654321'),
(9, 'vinh', 'trungvinh4520@gmail.com', 'e00cf25ad42683b3df678c61f42c6bda', '0987654321'),
(10, 'fhdh', 'gmail@gmail.com', 'd8bd79cc131920d5de426f914d17405a', '0987654321'),
(11, 'dai', 'dai@gmail.com', '96e79218965eb72c92a549dd5a330112', '1111111111'),
(12, 'daicac', 'therocklovely@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0345803284'),
(13, 'khánh', 'khanh16dk9cntt@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0345803284'),
(14, 'duy123', 'khanhduy.contact@gmail.com', 'dfa7b5731f0bb52fd9fcbab8d3f99f1c', '0975565991'),
(15, 'dai', 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad', '012345678'),
(16, 'daiok', 'trinhdai23@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '0998378738'),
(17, 'daiok', 'trinhdai23@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '0998378738');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
