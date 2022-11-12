-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 12, 2022 lúc 01:02 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_drink`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) UNSIGNED NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `pro_id` int(11) UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pro_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(11) UNSIGNED NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`, `cat_img`) VALUES
(1, 'Cafe', 'cat-3.jpg'),
(2, 'Sinh tố', 'cat-2.jpg'),
(3, 'Nước ép', 'cat.jpg'),
(4, 'Trà sữa', 'cat-4.jpg'),
(5, 'Trà', 'cat-5.jpg'),
(6, 'Đá xay', 'cat-7.jpg'),
(7, 'Trái cây', 'cat-8.jpg'),
(8, 'Soda', 'cat-6.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `customer_pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_address`, `customer_email`, `customer_phone`, `customer_pass`) VALUES
(1, 'Chu Bá Hiếu', 'Cần Thơ', 'admin111@gmail.com', '09732462**', '111111'),
(2, 'admin', 'CT', 'admin222@gmail.com', '019488881', '222222');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) UNSIGNED NOT NULL,
  `cart_id` int(11) UNSIGNED NOT NULL,
  `pro_id` int(11) UNSIGNED NOT NULL,
  `pro_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `cart_id`, `pro_id`, `pro_name`, `customer_id`, `quantity`, `price`, `size`, `img`, `order_date`) VALUES
(71, 79, 30, 'Sinh Tố Việt Quốc', 1, 1, '20.000', 'M', 'st-2.png', '2022-10-13 18:41:13'),
(72, 80, 26, 'Bạc Xỉu', 1, 1, '37.000', 'M', 'cafe-4.png', '2022-10-13 18:41:13'),
(74, 84, 29, 'Sinh Tố Dâu', 1, 3, '20.000', 'XL', 'st-1.png', '2022-10-20 12:53:32'),
(75, 85, 23, 'Cafe Sữa Đá', 2, 1, '35.000', 'M', 'cafe-1.png', '2022-11-07 13:57:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `pro_id` int(11) UNSIGNED NOT NULL,
  `pro_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cat_id` int(11) UNSIGNED NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `decription` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`pro_id`, `pro_name`, `cat_id`, `price`, `img`, `decription`) VALUES
(23, 'Cafe Sữa Đá', 1, '35.000', 'cafe-1.png', ''),
(24, 'Cafe Đen Đá', 1, '20.000', 'cafe-2.png', ''),
(25, 'Cafe Expreeso', 1, '45.000', 'cafe-3.png', ''),
(26, 'Bạc Xỉu', 1, '37.000', 'cafe-4.png', ''),
(27, 'Cafe Latte', 1, '36.000', 'cafe-5.png', ''),
(28, 'Cafe Capuchino', 1, '49.000', 'cafe-6.png', ''),
(29, 'Sinh Tố Dâu', 2, '20.000', 'st-1.png', ''),
(30, 'Sinh Tố Việt Quốc', 2, '20.000', 'st-2.png', ''),
(31, 'Sinh Tố Kiwi', 2, '20.000', 'st-3.png', ''),
(32, 'Sinh Tố Bơ', 2, '20.000', 'st-4.png', ''),
(33, 'Sinh Tố Thơm', 2, '20.000', 'st-5.png', ''),
(34, 'Sinh Tố Mãng Cầu', 2, '20.000', 'st-6.png', ''),
(35, 'Nước Ép Táo', 3, '18.000', 'ne-1.png', ''),
(36, 'Nước Ép Dâu', 3, '18.000', 'ne-2.png', ''),
(37, 'Nước Ép Bưởi', 3, '18.000', 'ne-3.png', ''),
(38, 'Nước Ép Cam', 3, '18.000', 'ne-4.png', ''),
(39, 'Nước Ép Dưa Hấu', 3, '18.000', 'ne-5.png', ''),
(40, 'Nước Ép Cà Chua', 3, '18.000', 'ne-6.png', ''),
(41, 'Trà Sữa Truyền Thống', 4, '22.000', 'ts-1.png', ''),
(42, 'Trà Sữa Bạc Hà', 4, '27.000', 'ts-2.png', ''),
(43, 'Trân Châu Đường Đen', 4, '25.000', 'ts-3.png', ''),
(44, 'Trà Sữa Khoai Môn', 4, '28.000', 'ts-4.png', ''),
(45, 'Trà Sữa Thái Xanh', 4, '27.000', 'ts-5.png', ''),
(46, 'Trà Sữa Chocolate', 4, '26.000', 'ts-6.png', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `cart_id` (`cart_id`,`pro_id`,`customer_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `cart_id_2` (`cart_id`),
  ADD KEY `cart_id_3` (`cart_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `pro_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `tbl_product` (`pro_id`),
  ADD CONSTRAINT `tbl_cart_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`customer_id`);

--
-- Các ràng buộc cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`customer_id`),
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `tbl_product` (`pro_id`);

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `tbl_category` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
