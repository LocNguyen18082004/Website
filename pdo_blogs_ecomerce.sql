-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 04, 2024 lúc 05:52 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pdo_blogs_ecomerce`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `username`, `password`) VALUES
(1, 'locadmin', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'locuser', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_post`
--

CREATE TABLE `tbl_category_post` (
  `id_category_post` int(11) UNSIGNED NOT NULL,
  `title_category_post` varchar(200) NOT NULL,
  `desc_category_post` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_post`
--

INSERT INTO `tbl_category_post` (`id_category_post`, `title_category_post`, `desc_category_post`) VALUES
(6, 'SamSung', 'Iphone sẽ phát triển trong nửa năm sắp tới'),
(32, 'Đây là Gìay', 'Đây là Gìay'),
(33, 'Đây Là Giày Pro', 'Đây Là Giày Pro');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_product`
--

CREATE TABLE `tbl_category_product` (
  `id_category_product` int(11) UNSIGNED NOT NULL,
  `title_category_product` varchar(100) NOT NULL,
  `desc_category_product` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`id_category_product`, `title_category_product`, `desc_category_product`) VALUES
(32, 'Lining', 'Giày Lining'),
(46, 'Yonex', 'Yonex'),
(47, 'Victor', 'Victor');

--
-- Bẫy `tbl_category_product`
--
DELIMITER $$
CREATE TRIGGER `update_category_config` AFTER UPDATE ON `tbl_category_product` FOR EACH ROW BEGIN
    IF NEW.title_category_product = 'Yonex' THEN
        UPDATE tbl_config SET config_value = NEW.id_category_product WHERE config_key = 'yonex_category_id';
    END IF;
    
    IF NEW.title_category_product = 'Lining' THEN
        UPDATE tbl_config SET config_value = NEW.id_category_product WHERE config_key = 'lining_category_id';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id_comment` int(11) NOT NULL,
  `author_comment` varchar(255) NOT NULL,
  `content_comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_product` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_comment`
--

INSERT INTO `tbl_comment` (`id_comment`, `author_comment`, `content_comment`, `created_at`, `id_product`) VALUES
(19, '23131', '32132131312312', '2024-08-02 04:32:27', 82),
(20, '3123123213', '21312312312', '2024-08-02 04:32:30', 82),
(24, 'Lộc comment', '321312', '2024-08-02 04:36:59', 81),
(25, 'Lộc Pro', 'SẢN PHẨM ĐẸP CHẤT LƯỢNG', '2024-08-02 04:37:17', 81);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_config`
--

CREATE TABLE `tbl_config` (
  `config_key` varchar(255) NOT NULL,
  `config_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_config`
--

INSERT INTO `tbl_config` (`config_key`, `config_value`) VALUES
('lining_category_id', '32'),
('yonex_category_id', '33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `customer_id` int(11) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` varchar(100) NOT NULL,
  `customer_email` varchar(200) NOT NULL,
  `customer_password` varchar(100) NOT NULL,
  `customer_address` varchar(200) NOT NULL,
  `customer_gender` varchar(10) DEFAULT NULL,
  `customer_dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customers`
--

INSERT INTO `tbl_customers` (`customer_id`, `customer_name`, `customer_phone`, `customer_email`, `customer_password`, `customer_address`, `customer_gender`, `customer_dob`) VALUES
(1, 'Nguyễn Lộc', '0364364600', 'nguyenducloc215@gmail.com', '123', '37 Đà Nẵng', NULL, NULL),
(2, 'Nguyễn Lộc', '0364364600', 'nguyenducloc215@gmail.com', '9bbc49478d48ef14b894668406f9985c', '', NULL, NULL),
(8, 'Lacula', '0364364600', '123456@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', NULL, NULL),
(9, '123', '0364364600', '12345@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', NULL, NULL),
(10, 'Naruto', '0364364600', 'naruto@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', NULL, NULL),
(11, 'Lộc Pro', '0364364600', 'locdeptraipro@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', '', NULL, NULL),
(12, 'Nguyễn Lộc', '0364364600', 'nguyenducloc215@gmail.com', '25f9e794323b453885f5181f1b624d0b', '37 Nguyễn Trãi Thành Phố Đà Nẵng', 'Nam', '2004-08-18'),
(13, 'Na Nguyễn', '0364364600', 'text123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '37 Nguyễn Trãi Thành Phố Đà Nẵng', 'Nam', '2004-08-18'),
(14, 'Nguyễn Lộc', '0364364600', 'nguyenducloc215@gmail.com', 'fa61f827f0f5373133b11cc20d835a79', '', NULL, NULL),
(15, 'Trần Lộc', '0933831313', 'tranlocnam@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '37 Nguyễn Trãi Thành Phố Đà Nẵng', 'Nam', '2004-08-18'),
(20, 'John Doe', '', '', '', '', NULL, NULL),
(21, 'Lộc đẹp trai', '0364364600', 'texter@gmail.com', '25f9e794323b453885f5181f1b624d0b', '', NULL, NULL),
(22, 'Trần B', '0364364600', 'loc481446@gmail.com', '25f9e794323b453885f5181f1b624d0b', '37 Nguyễn Trãi Thành Phố Đà Nẵng', 'Nam', '2004-08-18'),
(23, 'Hiếu Trần', '1234567890', 'enderhieu14@gmail.com', '25f9e794323b453885f5181f1b624d0b', '', NULL, NULL),
(24, 'Vũ Ngu', '0364364600', 'phuongvune2004@gmail.com', '25f9e794323b453885f5181f1b624d0b', '', NULL, NULL),
(25, 'Hiếu Ngu', '0364364600', 'lengochieu010503@gmail.com', '25f9e794323b453885f5181f1b624d0b', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer_order`
--

CREATE TABLE `tbl_customer_order` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `order_code` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `processed_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer_order`
--

INSERT INTO `tbl_customer_order` (`id`, `customer_id`, `order_code`, `order_date`, `order_status`, `processed_date`) VALUES
(28, 22, '5167', '2024-08-04 14:33:10', '0', NULL),
(29, 12, '2199', '2024-08-04 16:33:47', '0', NULL),
(30, 12, '6146', '2024-08-04 16:35:22', '0', NULL),
(31, 12, '7793', '2024-08-04 16:49:19', '0', NULL),
(32, 12, '8921', '2024-08-04 17:00:42', '0', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_favourite`
--

CREATE TABLE `tbl_favourite` (
  `id_favourite` int(11) NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `id_product` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `order_code` varchar(100) NOT NULL,
  `order_date` varchar(100) NOT NULL,
  `order_status` int(11) NOT NULL,
  `customer_id` int(11) UNSIGNED DEFAULT NULL,
  `processed_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `order_code`, `order_date`, `order_status`, `customer_id`, `processed_date`) VALUES
(69, '5167', '2024-08-04 14:33:10', 0, NULL, NULL),
(70, '2199', '2024-08-04 16:33:47', 1, NULL, '2024-08-04 11:48:45'),
(71, '6146', '2024-08-04 16:35:22', 1, NULL, '2024-08-04 11:37:34'),
(72, '8432', '2024-08-04 16:35:39', 1, NULL, '2024-08-04 11:36:32'),
(73, '9040', '2024-08-04 16:35:43', 0, NULL, NULL),
(74, '7793', '2024-08-04 16:49:19', 1, NULL, NULL),
(75, '8921', '2024-08-04 17:00:42', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(11) NOT NULL,
  `order_code` varchar(100) NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `content` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_code`, `product_id`, `product_quantity`, `name`, `phone`, `email`, `address`, `content`) VALUES
(42, '1805', 80, 1, 'Nguyễn Lộc', '0364364600', 'nguyenducloc215@gmail.com', '37 Nguyễn Trãi Thành Phố Đà Nẵng', ''),
(43, '1489', 81, 1, 'Nguyễn Lộc', '0364364600', 'nguyenducloc215@gmail.com', '37 Nguyễn Trãi Thành Phố Đà Nẵng', ''),
(44, '8024', 81, 1, 'Trần Lộc', '0933831313', 'tranlocnam@gmail.com', '37 Nguyễn Trãi Thành Phố Đà Nẵng', ''),
(45, '7972', 81, 1, 'Nguyễn Lộc', '0364364600', 'nguyenducloc215@gmail.com', '37 Nguyễn Trãi Thành Phố Đà Nẵng', ''),
(46, '9598', 80, 1, 'Nguyễn Lộc', '0364364600', 'nguyenducloc215@gmail.com', '37 Nguyễn Trãi Thành Phố Đà Nẵng', ''),
(47, '9598', 82, 1, 'Nguyễn Lộc', '0364364600', 'nguyenducloc215@gmail.com', '37 Nguyễn Trãi Thành Phố Đà Nẵng', ''),
(48, '8298', 80, 1, 'Nguyễn Lộc', '0364364600', 'nguyenducloc215@gmail.com', '37 Nguyễn Trãi Thành Phố Đà Nẵng', ''),
(49, '104', 81, 1, 'Nguyễn Lộc', '0364364600', 'nguyenducloc215@gmail.com', '37 Nguyễn Trãi Thành Phố Đà Nẵng', ''),
(50, '3657', 80, 1, 'Nguyễn Lộc', '0364364600', 'nguyenducloc215@gmail.com', '37 Nguyễn Trãi Thành Phố Đà Nẵng', ''),
(51, '8864', 80, 1, 'Nguyễn Lộc', '0364364600', 'nguyenducloc215@gmail.com', '37 Nguyễn Trãi Thành Phố Đà Nẵng', ''),
(52, '9618', 80, 15, 'Nguyễn Lộc', '0364364600', 'nguyenducloc215@gmail.com', '37 Nguyễn Trãi ', 'ABC'),
(53, '7505', 80, 1, 'Nguyễn Lộc', '0364364600', 'nguyenducloc215@gmail.com', '37 Đà Nẵng', ''),
(54, '3478', 80, 1, 'Lộc đẹp trai', '0364364600', 'texter@gmail.com', '', ''),
(55, '3478', 82, 1, 'Lộc đẹp trai', '0364364600', 'texter@gmail.com', '', ''),
(56, '940', 81, 6, 'Lộc đẹp trai', '0364364600', 'texter@gmail.com', '37 Nguyễn Trãi Đà Nẵng', ''),
(57, '8419', 82, 1, 'Trần B', '0364364600', 'loc481446@gmail.com', '37 Nguyễn Trãi Thành Phố Đà Nẵng', ''),
(58, '6864', 80, 1, 'Trần B', '0364364600', 'loc481446@gmail.com', '37 Nguyễn Trãi Thành Phố Đà Nẵng', ''),
(59, '6828', 82, 1, 'Trần B', '0364364600', 'loc481446@gmail.com', '37 Nguyễn Trãi Thành Phố Đà Nẵng', ''),
(60, '7598', 82, 1, 'Trần B', '0364364600', 'loc481446@gmail.com', '37 Nguyễn Trãi Thành Phố Đà Nẵng', ''),
(61, '7598', 80, 1, 'Trần B', '0364364600', 'loc481446@gmail.com', '37 Nguyễn Trãi Thành Phố Đà Nẵng', ''),
(62, '3477', 82, 1, 'Trần B', '0364364600', 'loc481446@gmail.com', '37 Nguyễn Trãi Thành Phố Đà Nẵng', ''),
(63, '3477', 81, 1, 'Trần B', '0364364600', 'loc481446@gmail.com', '37 Nguyễn Trãi Thành Phố Đà Nẵng', ''),
(64, '505', 82, 1, 'Trần B', '0364364600', 'loc481446@gmail.com', '37 Nguyễn Trãi Thành Phố Đà Nẵng', ''),
(65, '5302', 82, 1, 'Trần B', '0364364600', 'loc481446@gmail.com', '37 Nguyễn Trãi Thành Phố Đà Nẵng', ''),
(66, '5302', 80, 1, 'Trần B', '0364364600', 'loc481446@gmail.com', '37 Nguyễn Trãi Thành Phố Đà Nẵng', ''),
(67, '5098', 81, 1, 'Trần B', '0364364600', 'loc481446@gmail.com', '37 Nguyễn Trãi Thành Phố Đà Nẵng', ''),
(68, '9704', 82, 1, 'Trần B', '0364364600', 'loc481446@gmail.com', '37 Nguyễn Trãi Thành Phố Đà Nẵng', ''),
(69, '1647', 82, 1, 'Hiếu Trần', '1234567890', 'enderhieu14@gmail.com', '.....', '321312312'),
(70, '1647', 81, 1, 'Hiếu Trần', '1234567890', 'enderhieu14@gmail.com', '.....', '321312312'),
(71, '2229', 80, 1, 'Hiếu Trần', '1234567890', 'enderhieu14@gmail.com', '37 Nguyễn Trãi', ''),
(72, '3701', 80, 1, 'Vũ Ngu', '0364364600', 'phuongvune2004@gmail.com', '37 Nguyễn Trãi', '3213213123'),
(73, '3701', 79, 1, 'Vũ Ngu', '0364364600', 'phuongvune2004@gmail.com', '37 Nguyễn Trãi', '3213213123'),
(74, '7496', 80, 1, 'Hiếu Ngu', '0364364600', 'lengochieu010503@gmail.com', '37 Nguyễn Trãi', ''),
(75, '7496', 82, 1, 'Hiếu Ngu', '0364364600', 'lengochieu010503@gmail.com', '37 Nguyễn Trãi', ''),
(76, '3167', 80, 1, 'Trần B', '0364364600', 'loc481446@gmail.com', '37 Nguyễn Trãi Thành Phố Đà Nẵng', ''),
(77, '5167', 82, 3, 'Trần B', '0364364600', 'loc481446@gmail.com', '37 Nguyễn Trãi Thành Phố Đà Nẵng', ''),
(78, '5167', 80, 1, 'Trần B', '0364364600', 'loc481446@gmail.com', '37 Nguyễn Trãi Thành Phố Đà Nẵng', ''),
(79, '2199', 80, 1, 'Nguyễn Lộc', '0364364600', 'nguyenducloc215@gmail.com', '37 Nguyễn Trãi Thành Phố Đà Nẵng', ''),
(80, '6146', 80, 1, 'Nguyễn Lộc', '0364364600', 'nguyenducloc215@gmail.com', '37 Nguyễn Trãi Thành Phố Đà Nẵng', ''),
(81, '8432', 80, 1, 'Nguyễn Lộc', '0364364600', 'nguyenducloc215@gmail.com', '37 Nguyễn Trãi Thành Phố Đà Nẵng', ''),
(82, '7793', 80, 1, 'Nguyễn Lộc', '0364364600', 'nguyenducloc215@gmail.com', '37 Nguyễn Trãi Thành Phố Đà Nẵng', ''),
(83, '8921', 82, 1, 'Nguyễn Lộc', '0364364600', 'nguyenducloc215@gmail.com', '37 Nguyễn Trãi Thành Phố Đà Nẵng', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id_post` int(11) NOT NULL,
  `title_post` varchar(255) NOT NULL,
  `content_post` text NOT NULL,
  `image_post` varchar(200) NOT NULL,
  `id_category_post` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_post`
--

INSERT INTO `tbl_post` (`id_post`, `title_post`, `content_post`, `image_post`, `id_category_post`) VALUES
(5, 'Người đàn ông mang giày', '<h1>Loạt smartphone &#39;&aacute;t chủ b&agrave;i&#39; nửa cuối 2024</h1>\r\n\r\n<p>Thị trường smartphone nửa cuối năm hứa hẹn s&ocirc;i động khi Apple, Samsung, Xiaomi, Oppo v&agrave; Google đều tung ra &quot;&aacute;t chủ b&agrave;i&quot; của m&igrave;nh.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://vnexpress.net/loat-smartphone-at-chu-bai-nua-cuoi-2024-4774585.html#box_comment_vne\">24</a></p>\r\n\r\n<p><img alt=\"\" src=\"https://i1-sohoa.vnecdn.net/2024/07/26/DSC0029-1720452459-1722012234.jpg?w=1200&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=1uHGw1GXZC4aOmFJwdeOcw\" /></p>\r\n\r\n<p><strong>Samsung Galaxy Z Fold6 (th&aacute;ng 7)</strong></p>\r\n\r\n<p>Smartphone gập cao cấp nhất của Samsung được c&ocirc;ng bố ng&agrave;y 10/7 v&agrave; b&aacute;n tại Việt Nam cuối th&aacute;ng n&agrave;y. M&aacute;y c&oacute; thiết kế vu&ocirc;ng vắn, ngắn v&agrave; rộng hơn Z Fold5, gi&uacute;p thay đổi tỷ lệ m&agrave;n h&igrave;nh hợp l&yacute;. M&aacute;y cũng nhẹ hơn trước khi nặng 239 gram. K&iacute;ch thước m&agrave;n h&igrave;nh trong v&agrave; ngo&agrave;i giữ nguy&ecirc;n, vẫn d&ugrave;ng tấm nền Dynamic AMOLED 2X với tần số qu&eacute;t 120 Hz. Điện thoại trang bị chip Snapdragon 8 Gen 3, RAM 12 GB, bộ nhớ tối đa 1 TB.</p>\r\n\r\n<p>Cụm camera sau với camera ch&iacute;nh 50 megapixel, g&oacute;c si&ecirc;u rộng 12 megapixel v&agrave; tele 10 megapixel c&oacute; zoom quang 3x. Camera selfie ở m&agrave;n h&igrave;nh ngo&agrave;i độ ph&acirc;n giải 10 megapixel, c&ograve;n b&ecirc;n trong 4 megapixel. Dung lượng pin của Z Fold6 vẫn l&agrave; 4.400 mAh, hỗ trợ sạc nhanh 25 W. Ảnh:&nbsp;<em>Huy Đức</em></p>\r\n\r\n<p><img alt=\"\" src=\"https://i1-sohoa.vnecdn.net/2024/07/26/DSC0078-1720461253-1722012262.jpg?w=1200&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=JhSitY41YarQZx3jp-eEyA\" /></p>\r\n\r\n<p><strong>Samsung Galaxy Z Flip6 (th&aacute;ng 7)</strong></p>\r\n\r\n<p>Mẫu smartphone gập mới của Samsung c&oacute; c&aacute;c cạnh được l&agrave;m phẳng v&agrave; vu&ocirc;ng vắn hơn thế hệ trước với độ d&agrave;y tăng từ 6,9 l&ecirc;n 7,4 mm. M&aacute;y vẫn trang bị m&agrave;n h&igrave;nh trong 6,7 inch v&agrave; m&agrave;n h&igrave;nh ngo&agrave;i 3,4 inch.</p>\r\n\r\n<p>Smartphone mới trang bị vi xử l&yacute; Snapdragon 8 Gen 3, RAM 12 GB v&agrave; bộ nhớ tối đa 512 GB. Hai camera trước gồm camera ch&iacute;nh tăng l&ecirc;n 50 megapixel, c&ograve;n g&oacute;c si&ecirc;u rộng 12 megapixel. Pin dung lượng 4.000 mAh, hỗ trợ sạc nhanh 25 W. Sản phẩm đi k&egrave;m c&aacute;c t&iacute;nh năng AI tạo sinh mới của Samsung. Ảnh:&nbsp;<em>Huy Đức</em></p>\r\n\r\n<p><img alt=\"\" src=\"https://i1-sohoa.vnecdn.net/2024/07/26/Xiaomi-Mix-Fold-4-1722012214.jpg?w=1200&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=JHpnxbivJ20Ix-AzfwZKfQ\" /></p>\r\n\r\n<p><strong>Xiaomi Mix Fold 4 (th&aacute;ng 7)</strong></p>\r\n\r\n<p>Mix Fold 4 l&agrave; một trong những smartphone gập mỏng nhẹ nhất hiện nay, chỉ d&agrave;y 4, 59 mm khi mở ra v&agrave; nặng 226 gram. M&aacute;y c&oacute; m&agrave;n h&igrave;nh ngo&agrave;i AMOLED 6.56 inch, độ ph&acirc;n giải Full HD+ v&agrave; tần số qu&eacute;t 120 Hz. M&agrave;n h&igrave;nh trong AMOLED LTPO 7,8 inch với độ s&aacute;ng 3.000 nit.</p>\r\n\r\n<p>Điện thoại gập của Xiaomi trang bị chip xử l&yacute; Snapdragon 8 Gen 3, hai phi&ecirc;n bản RAM 12 GB v&agrave; 16 GB, bộ nhớ trong tối đa 1 TB. Model n&agrave;y c&oacute; ba camera sau với camera ch&iacute;nh v&agrave; tele 50 megapixel, ống k&iacute;nh tiềm vọng 12 megapixel. Ngo&agrave;i khả năng kh&aacute;ng nước IPX8, Mix Fold 4 c&ograve;n c&oacute; t&iacute;nh năng li&ecirc;n lạc vệ tinh. Pin dung lượng 5.100 mAh hỗ trợ sạc nhanh 67 W v&agrave; sạc nhanh kh&ocirc;ng d&acirc;y 50 W. Ảnh:&nbsp;<em>Xiaomi</em></p>\r\n', 'banner11721763408.png', 6),
(6, 'Người đàn bà mang giày', 'Người đàn bà mang giày đã đi chơi và gặp rất nhiều người khi cô ấy mang giày của chúng tôi, rất mềm ái và mềm mại, chúng tôi rất vui khi cô ấy vui', 'Banner21721763117.png', 6),
(32, 'Giày này đi được và Nhiều thứ khác và là ', '<h2><strong>Kết quả khai quật khảo cổ đợt 2 phế t&iacute;ch th&aacute;p Đại Hữu ở x&atilde; C&aacute;t Nhơn, huyện Ph&ugrave; C&aacute;t, tỉnh B&igrave;nh Định cho thấy đ&acirc;y l&agrave; căn cứ qu&acirc;n sự quan trọng của nh&agrave; T&acirc;y Sơn.</strong></h2>\r\n\r\n<p>Ng&agrave;y 31-7, tại Bảo t&agrave;ng tỉnh B&igrave;nh Định, Sở VH-TT B&igrave;nh Định đ&atilde; tổ chức b&aacute;o c&aacute;o sơ bộ kết quả khai quật khảo cổ đợt 2 phế t&iacute;ch th&aacute;p Đại Hữu. TS Phạm Văn Triệu - Viện Khảo cổ học Việt Nam, chủ tr&igrave; khai quật phế t&iacute;ch th&aacute;p Đại Hữu - b&aacute;o c&aacute;o sơ bộ kết quả khai quật.</p>\r\n\r\n<p><img alt=\"Các chuyên gia tham quan hiện vật khai quật tại phế tích tháp Đại Hữu\" src=\"https://icdn.24h.com.vn/upload/3-2024/images/2024-07-31/1722416908-chuyen-gia-tham-quan-cac-hien-vat-khai-quat-tai-bao-tang-binh-dinh-1722411520444655334699-width640height418.jpg\" style=\"width:740px\" /></p>\r\n\r\n<p>C&aacute;c chuy&ecirc;n gia tham quan hiện vật khai quật tại phế t&iacute;ch th&aacute;p Đại Hữu</p>\r\n\r\n<p>Theo TS Phạm Văn Triệu, cuộc khai quật phế t&iacute;ch th&aacute;p Đại Hữu đ&atilde; xuất lộ to&agrave;n bộ phần th&acirc;n th&aacute;p, nền m&oacute;ng tiền sảnh ph&iacute;a Đ&ocirc;ng; nền m&oacute;ng ch&acirc;n đế ph&iacute;a Bắc; một phần nền m&oacute;ng ch&acirc;n đế ph&iacute;a Nam v&agrave; T&acirc;y. Qu&aacute; tr&igrave;nh khai quật đ&atilde; ph&aacute;t hiện 156 hiện vật đ&aacute; với nhiều loại h&igrave;nh v&agrave; k&iacute;ch thước kh&aacute;c nhau.</p>\r\n\r\n<p>Về chất liệu đ&aacute;, c&oacute; 3 loại l&agrave; đ&aacute; c&aacute;t kết, đ&aacute; hoa cương v&agrave; đ&aacute; ong. Trong đ&oacute;, những hiện vật c&oacute; trang tr&iacute; được tạc tr&ecirc;n đ&aacute; c&aacute;t kết, bao gồm c&aacute;c loại h&igrave;nh bệ thờ, mảnh minh văn, l&aacute; nhĩ đ&aacute;, đ&aacute; trang tr&iacute; điểm g&oacute;c, ph&ugrave; đi&ecirc;u trang tr&iacute; h&igrave;nh người, tượng h&igrave;nh động vật, ph&ugrave; đi&ecirc;u trang tr&iacute; h&igrave;nh c&aacute;nh sen&hellip;</p>\r\n\r\n<p>Về quy m&ocirc; kiến tr&uacute;c, th&aacute;p Đại Hữu c&oacute; b&igrave;nh đồ h&igrave;nh vu&ocirc;ng. Th&aacute;p c&oacute; cửa ra v&agrave;o ph&iacute;a Đ&ocirc;ng v&agrave; hệ thống cửa giả. So s&aacute;nh về b&igrave;nh diện với c&aacute;c th&aacute;p Chăm Pa kh&aacute;c th&igrave; b&igrave;nh diện th&aacute;p Đại Hữu c&oacute; quy m&ocirc; lớn.</p>\r\n\r\n<p>Phế t&iacute;ch th&aacute;p Đại Hữu được x&acirc;y dựng tr&ecirc;n đỉnh n&uacute;i với bề mặt l&agrave; đ&aacute;. Trước khi x&acirc;y dựng th&aacute;p, người Chăm đ&atilde; đục những tảng đ&aacute; để tạo mặt bằng nhất định. Tiếp theo người thợ cho một lớp đất mỏng đầm nện chặt, lớp n&agrave;y c&oacute; t&aacute;c dụng ổn định phần m&oacute;ng v&agrave; mặt bằng, rồi tiến h&agrave;nh cho x&acirc;y gạch v&agrave; đ&aacute; l&ecirc;n. Hệ thống m&oacute;ng th&aacute;p được sử dụng nhiều loại vật liệu kh&aacute;c nhau: gạch, đ&aacute; ong, đ&aacute; hoa cương, đ&aacute; c&aacute;t kết.</p>\r\n\r\n<p><img alt=\"Nền phế tích tháp Đại Hữu lộ diện sau khi khai quật\" src=\"https://icdn.24h.com.vn/upload/3-2024/images/2024-07-31/1722416909-nen-thap-dai-huu-lo-dien-khi-khai-quat-17224112994421061809733-width615height422.jpg\" style=\"width:740px\" /></p>\r\n\r\n<p>Nền phế t&iacute;ch th&aacute;p Đại Hữu lộ diện sau khi khai quật</p>\r\n\r\n<p>&quot;So s&aacute;nh với kiến tr&uacute;c th&aacute;p Chăm Pa đ&atilde; được khai quật nghi&ecirc;n cứu, kết hợp c&aacute;c minh văn đ&atilde; được ph&aacute;t hiện từ trước cho đến nay, c&oacute; khả năng phế t&iacute;ch th&aacute;p Đại Hữu c&oacute; ni&ecirc;n đại khoảng giữa thế kỷ 13. Trong qu&aacute; tr&igrave;nh khai quật ph&aacute;t hiện c&aacute;c mảnh gốm gia dụng c&oacute; ni&ecirc;n đại khoảng thế kỷ 17 - 18. Những hiện vật n&agrave;y gắn liền với th&agrave;nh Ch&aacute;nh Mẫn được nh&agrave; T&acirc;y Sơn cho x&acirc;y dựng tại ph&iacute;a Đ&ocirc;ng Bắc dưới ch&acirc;n đỉnh n&uacute;i Đất. Qua đ&oacute;, phản &aacute;nh v&agrave;o giai đoạn cuối thế kỷ 18, khu vực phế t&iacute;ch th&aacute;p Đại Hữu l&agrave; căn cứ qu&acirc;n sự quan trọng của nh&agrave; T&acirc;y Sơn&quot;, TS Triệu nhận định.</p>\r\n\r\n<p>&Ocirc;ng Huỳnh Văn Lợi, Ph&oacute; Gi&aacute;m đốc Sở VH-TT B&igrave;nh Định, cho biết qu&aacute; tr&igrave;nh khai quật, điểm phế t&iacute;ch th&aacute;p Đại Hữu xuất hiện nền m&oacute;ng, c&aacute;c hiện vật rất gi&aacute; trị, hơn hẳn c&aacute;c di t&iacute;ch v&agrave; th&aacute;p kh&aacute;c tr&ecirc;n địa b&agrave;n. Đối với c&aacute;c hiện vật đ&atilde; xuất lộ, khai quật được th&igrave; tỉnh c&oacute; kế hoạch bảo quản, nghi&ecirc;n cứu để đưa v&agrave;o trong hệ thống c&aacute;c hiện vật Chăm tr&ecirc;n địa b&agrave;n.</p>\r\n', 'Banner-51722444677.jpg', 33);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id_product` int(11) UNSIGNED NOT NULL,
  `title_product` varchar(255) NOT NULL,
  `code_product` varchar(200) NOT NULL,
  `price_product` varchar(100) NOT NULL,
  `desc_product` text NOT NULL,
  `quantity_product` int(11) NOT NULL,
  `image_product` varchar(100) NOT NULL,
  `id_category_product` int(11) UNSIGNED NOT NULL,
  `product_hot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`id_product`, `title_product`, `code_product`, `price_product`, `desc_product`, `quantity_product`, `image_product`, `id_category_product`, `product_hot`) VALUES
(75, 'Giày Cầu Lông Yonex 88 Dial 3 2024 - Đen (Nội Địa Trung)', 'YN001', '2690000', '<p>rưq</p>\r\n', 100, 'Yonex11722441818.jpg', 46, 1),
(79, 'Giày Cầu Lông Yonex SHB 65Z3 Men - Trắng (Nội địa Trung)', 'YN002', '2750000', '<h2><strong>1. Giới thiệu&nbsp;Gi&agrave;y Cầu L&ocirc;ng Yonex SHB 65Z3 Men - Trắng (Nội địa Trung)</strong></h2>\r\n\r\n<p><a href=\"https://banhang.shopvnb.com/giay-cau-long-yonex-shb-65z3-men-trang-noi-dia-trung\">Gi&agrave;y Cầu L&ocirc;ng Yonex SHB 65Z3 Men - Trắng (Nội địa Trung)</a>&nbsp;l&agrave; si&ecirc;u phẩm trong ph&acirc;n kh&uacute;c cao cấp của nh&agrave; Yonex với thiết kế hiện đại, t&iacute;ch hợp rất nhiều c&ocirc;ng nghệ bổ trợ&nbsp;gi&uacute;p người chơi c&oacute; trải nghiệm thoải m&aacute;i v&agrave; an to&agrave;n nhất c&oacute; thể. Với gam&nbsp;m&agrave;u trắng&nbsp;mang lại cảm gi&aacute;c thanh tho&aacute;t, lịch sự nhưng vẫn c&oacute; n&eacute;t cuốn h&uacute;t g&acirc;y được ấn tượng lớn với người mua.&nbsp;Được trang bị c&ocirc;ng nghệ Power Cushion + gi&uacute;p hấp thụ lực sau những c&uacute; nhảy đập, tr&aacute;nh được những chấn thương nguy hiểm.&nbsp;</p>\r\n\r\n<p>Ng&agrave;y nay, với kĩ thuật v&agrave;&nbsp;tốc độ chơi tr&ecirc;n s&acirc;n&nbsp;của&nbsp;m&ocirc;n cầu l&ocirc;ng ng&agrave;y c&agrave;ng tăng cao, c&aacute;c đường cầu tr&ecirc;n 300km/h được c&aacute;c vận động vi&ecirc;n thực hiện li&ecirc;n tục&nbsp;v&igrave; thế đ&ocirc;i gi&agrave;y bắt buộc phải c&oacute; độ ổn định cao cộng với&nbsp;độ b&aacute;m s&acirc;n tốt để phản ứng nhanh ch&oacute;ng&nbsp;c&aacute;c pha cầu tốc độ&nbsp;v&agrave; xoay trở&nbsp;nhanh ch&oacute;ng, chuẩn bị cho c&aacute;c t&igrave;nh huống tiếp theo. Do đ&oacute;, c&ocirc;ng nghệ mới&nbsp;RADIAL BLADE SOLE&nbsp;được t&iacute;ch hợp tr&ecirc;n&nbsp;Yonex&nbsp;65Z3 Men được h&atilde;ng Yonex ph&aacute;t triển&nbsp;với&nbsp;thiết kế đế mới&nbsp;mang lại độ b&aacute;m s&acirc;n cao nhất với bề mặt cao su c&oacute; hoa văn giống&nbsp;như&nbsp;ng&ocirc;i sao Ninja.&nbsp;M&ocirc; h&igrave;nh đế&nbsp;cao cấp&nbsp;n&agrave;y được Yonex t&iacute;nh to&aacute;n rất kĩ lưỡng&nbsp;để đảm bảo độ b&aacute;m s&acirc;n&nbsp;được tối ưu nhất&nbsp;cho c&aacute;c chuyển động dọc, ngang,&nbsp;ch&eacute;o li&ecirc;n tục.</p>\r\n\r\n<p><img alt=\"Giày Cầu Lông Yonex SHB 65Z3 Men - Trắng (Nội địa Trung)\" src=\"https://cdn.shopvnb.com/uploads/images/Giay-Cau-Long-Yonex-SHB-65Z3-men-Trang-Chinh-Hang.jpg\" /></p>\r\n\r\n<h2><strong>2. Th&ocirc;ng số&nbsp;Gi&agrave;y Cầu L&ocirc;ng Yonex SHB 65Z3 Men - Trắng (Nội địa Trung)</strong></h2>\r\n\r\n<p><strong>- C&ocirc;ng Nghệ:&nbsp;</strong>DOUBLE RUSSEL MESH, Tru-cushion Sockliner, TruShape,...</p>\r\n\r\n<p><strong>- Mũ Gi&agrave;y:&nbsp;</strong>Synthetic Resin</p>\r\n\r\n<p><strong>- Đế Giữa:</strong>&nbsp;Power Cushion+, Synthetic Leather</p>\r\n\r\n<p><strong>- Đế Ngo&agrave;i:&nbsp;</strong>Cao Su</p>\r\n\r\n<p><strong>- Bảng size gi&agrave;y Yonex&nbsp;:</strong></p>\r\n\r\n<p><img alt=\"bảng size Giày Cầu Lông Yonex SHB 65Z3 Men - Trắng (Nội địa Trung)\" src=\"https://cdn.shopvnb.com/uploads/images/bang-giay-yonex.jpg\" /></p>\r\n\r\n<p>Ngo&agrave;i ra bạn c&oacute; thể xem th&ecirc;m c&aacute;c mẫu&nbsp;<a href=\"https://shopvnb.com/giay-cau-long-yonex.html\">gi&agrave;y cầu l&ocirc;ng Yonex</a>&nbsp;đang được b&aacute;n tại ShopVNB.</p>\r\n\r\n<h2><strong>3. C&ocirc;ng nghệ&nbsp;Gi&agrave;y Cầu L&ocirc;ng Yonex SHB 65Z3 Men - Trắng (Nội địa Trung)</strong></h2>\r\n\r\n<p><strong>- Durable Skin Light:</strong>&nbsp;Kết hợp t&iacute;nh linh hoạt giống như cao su với độ cứng của nhựa cứng. Đ&ocirc;i gi&agrave;y dựa tr&ecirc;n polyurethane tạo cho bạn cảm gi&aacute;c cực k&igrave; nhẹ nh&agrave;ng ở phần bề mặt tiếp&nbsp;s&uacute;c l&ecirc;n tr&ecirc;n đ&ocirc;i ch&acirc;n của m&igrave;nh trong khi vẫn giữ được cảm gi&aacute;c &ocirc;m ch&acirc;n v&agrave; chắc chắn tự tin trong c&aacute;c bước di chuyển.</p>\r\n\r\n<p><strong>- Power Cushion +:&nbsp;</strong>L&agrave; c&ocirc;ng nghệ th&agrave;nh c&ocirc;ng nhất của Yonex trong việc sản xuất v&agrave; &aacute;p dụng tr&ecirc;n c&aacute;c d&ograve;ng gi&agrave;y cao cấp của h&atilde;ng. So s&aacute;nh với c&aacute;c vật liệu đệm th&ocirc;ng thường v&agrave; Power Cushion trước đo của Yonex, Ở việc n&acirc;ng cấp l&ecirc;n Power Cushion + lần n&agrave;y, Khả năng hấp thụ sốc hơn tăng l&ecirc;n 28% v&agrave; lực đẩy mạnh hơn 62%. L&agrave; c&ocirc;ng nghệ hỗ trợ đ&agrave;n hồi cho gi&agrave;y tốt nhất thế giới hiện nay. Theo nghi&ecirc;n cứu của Yonex khi thử nghiệm, 1 quả trứng g&agrave; được thả từ độ cao 12m x&uacute;n bề mặt đất c&oacute; thảm Power Cushion+, Đệm Cushion+ hấp thụ chấn động v&agrave; quả trứng bật ngược trở lại hơn 6m m&agrave; kh&ocirc;ng bị vỡ.</p>\r\n\r\n<p><img alt=\"công nghệ power cushion của Giày Cầu Lông Yonex SHB 65Z3 Men - Trắng (Nội địa Trung)\" src=\"https://cdn.shopvnb.com/uploads/images/cong-nghe-power-cushion(1).jpg\" /></p>\r\n\r\n<p><strong>- Synchro-Fit Insole:&nbsp;</strong>Kết cấu đế đồng bộ mới của YONEX cho ph&eacute;p tạo sự vừa vặn hơn giữa gi&agrave;y v&agrave; ch&acirc;n.&nbsp;Gi&uacute;p giảm thiểu tổn thất điện năng ở mức tối thiểu để đạt được chuyển động mượt m&agrave; hơn v&agrave; thao t&aacute;c ch&acirc;n nhanh hơn. So với gi&agrave;y d&eacute;p th&ocirc;ng thường. Khu vực giữa đến g&oacute;t ch&acirc;n tr&ecirc;n đế được n&acirc;ng l&ecirc;n để tạo sự vừa vặn giữa gi&agrave;y v&agrave; ch&acirc;n. Bằng c&aacute;ch giữ g&oacute;t ch&acirc;n chắc chắn hơn so với đế. Khoảng c&aacute;ch giữa gi&agrave;y v&agrave; ch&acirc;n được giảm bớt. Cải thiện sự thoải m&aacute;i v&agrave; đảm bảo b&agrave;n ch&acirc;n kh&ocirc;ng bị trượt về ph&iacute;a trong gi&agrave;y.</p>\r\n\r\n<p><img alt=\"công nghệ synchro fit insole Giày Cầu Lông Yonex SHB 65Z3 Men - Trắng (Nội địa Trung)\" src=\"https://cdn.shopvnb.com/uploads/images/cong-nghe-synchro-fit-insole.jpg\" /></p>\r\n\r\n<p><strong>- Feather Bounce Foam:</strong>&nbsp;&ldquo;Bọt l&ocirc;ng vũ&rdquo; tạo ra lực đẩy cao trong khi vẫn duy tr&igrave; độ nhẹ v&agrave; đệm Đế giữa sử dụng vật liệu mới, &ldquo;Feather Bounce Foam&rdquo;, c&oacute; khả năng bật lại nhiều hơn 20% so với sản phẩm hiện tại (Piper Feather Light) trong khi vẫn duy tr&igrave; độ nhẹ v&agrave; độ đệm. Đạt được lực đẩy cao trong khi vẫn duy tr&igrave; độ nhẹ v&agrave; đệm.</p>\r\n\r\n<p><img alt=\"công nghệ feather bounce foam Giày Cầu Lông Yonex SHB 65Z3 Men - Trắng (Nội địa Trung)\" src=\"https://cdn.shopvnb.com/uploads/images/cong-nghe-feather-bounce-foam(1).jpg\" /></p>\r\n\r\n<p><strong>- Double Raschel Mesh:</strong>&nbsp;L&agrave; một loại lưới si&ecirc;u mịn, cực kỳ nhẹ v&agrave; bền. Loại lưới n&agrave;y cung cấp khả năng trao đổi kh&ocirc;ng kh&iacute; nhiều hơn t&aacute;m lần để giải ph&oacute;ng độ ẩm so với vải lưới th&ocirc;ng thường.Vỏ b&ecirc;n tr&ecirc;n v&agrave; b&ecirc;n liền mạch để vừa vặn v&agrave; giữ chặt Phần tr&ecirc;n gi&uacute;p loại bỏ ứng suất khi uốn cong bằng c&aacute;ch giảm sự chồng ch&eacute;o của vật liệu v&agrave; mở rộng khu vực liền mạch để đạt được độ vừa vặn mềm mại. Ngo&agrave;i ra, &ldquo;lớp vỏ b&ecirc;n&rdquo; k&eacute;o d&agrave;i đến ch&acirc;n sau của gi&agrave;y mang lại cảm gi&aacute;c thoải m&aacute;i v&agrave; mềm mại.</p>\r\n\r\n<p><img alt=\"công nghệ double raschel mesh Giày Cầu Lông Yonex SHB 65Z3 Men - Trắng (Nội địa Trung)\" src=\"https://cdn.shopvnb.com/uploads/images/cong-nghe-double-raschel-mesh.jpg\" /></p>\r\n\r\n<p><strong>- Toe Assist Shape:&nbsp;</strong>Thiết kế tập trung v&agrave;o ng&oacute;n ch&acirc;n gi&uacute;p giảm &aacute;p lực ở ng&oacute;n ch&acirc;n c&aacute;i. Cũng như cung cấp sự hỗ trợ được cải thiện ở giữa b&agrave;n ch&acirc;n v&agrave; g&oacute;t ch&acirc;n. Để mang lại cảm gi&aacute;c vừa vặn ổn định. Giảm tổn thất điện năng, cho ph&eacute;p thực hiện c&aacute;c động t&aacute;c ch&acirc;n nhanh ch&oacute;ng.</p>\r\n\r\n<p><strong>- Round Sole:&nbsp;</strong>Được thiết kế để hỗ trợ to&agrave;n diện cho việc di chuyển bằng ch&acirc;n nhanh ch&oacute;ng v&agrave; trơn tru. Round Sole đảm bảo chuyển động trơn tru v&agrave; truyền năng lượng tối đa.Đế sử dụng h&igrave;nh dạng mới &ldquo;đế lưỡi hướng t&acirc;m&rdquo; khuyến kh&iacute;ch sự biến dạng của hoa văn. Bằng c&aacute;ch kết hợp c&aacute;c khu vực c&oacute; biến dạng lớn v&agrave; c&aacute;c khu vực c&oacute; biến dạng nhỏ, độ b&aacute;m theo hướng dọc, ngang v&agrave; ch&eacute;o đ&atilde; được cải thiện.</p>\r\n\r\n<p><strong>- 3D POWER GRAPHITE SHEET</strong>&nbsp;được Yonex thiết kế với tấm 3D Power Carbon được ch&egrave;n&nbsp;v&agrave;o đế giữa, gi&uacute;p giảm trọng lượng của&nbsp;gi&agrave;y&nbsp;cầu l&ocirc;ng&nbsp;v&agrave; củng cố sự ổn định&nbsp;trong mỗi bước di chuyển m&agrave; kh&ocirc;ng mất đi sự thoải m&aacute;i.</p>\r\n\r\n<p><strong>- LATERAL SHELL&nbsp;AND STABILITY REINFORCEMEN&nbsp;</strong>của h&atilde;ng Yonex sử dụng tấm cao su cứng c&oacute; cấu tr&uacute;c như một chiếc vỏ s&ograve; được đặt để hỗ trợ khu vực hấp thụ lực nhiều nhất cũng như&nbsp;giảm rung lắc&nbsp;trong c&aacute;c pha chuyển động ngang.&nbsp;N&oacute; l&agrave;m giảm tổn thất điện năng, tăng phản ứng của bước ch&acirc;n v&agrave; tạo ra những chuyển động ch&acirc;n mượt m&agrave;, uyển chuyển. Được t&iacute;ch hợp để n&acirc;ng đỡ phần chịu t&aacute;c động lực nhiều nhất v&agrave; trợ lực cho b&agrave;n ch&acirc;n từ&nbsp;mặt b&ecirc;n đến g&oacute;t.</p>\r\n\r\n<p><strong>- RADIAL BLADE SOLE</strong>&nbsp;l&agrave; c&ocirc;ng nghệ đế gi&agrave;y c&oacute; độ b&aacute;m s&acirc;n mới&nbsp;nhất của nh&agrave;&nbsp;Yonex với những cải tiến vượt bậc so với loại đế lục gi&aacute;c.&nbsp;Hoa văn h&igrave;nh phi ti&ecirc;u 4 c&aacute;nh của ninja được sắp xếp một c&aacute;ch tỉ mỉ gi&uacute;p ph&acirc;n t&aacute;n đều trọng lượng gi&agrave;y v&agrave; cải thiện độ b&aacute;m s&acirc;n th&ecirc;m 3%. C&ocirc;ng nghệ n&agrave;y&nbsp;cho ph&eacute;p những pha chuyển hướng đột ngột được diễn ra một c&aacute;ch hiệu quả hơn, gi&uacute;p người chơi&nbsp;hạn chế khả năng chấn thương ở ch&acirc;n do t&igrave;nh trạng trượt t&eacute; g&acirc;y ra.</p>\r\n\r\n<h2><strong>4. Ưu điểm của Gi&agrave;y Cầu L&ocirc;ng Yonex SHB 65Z3 Men - Trắng (Nội địa Trung)</strong></h2>\r\n\r\n<p>Gi&agrave;y Cầu L&ocirc;ng Yonex SHB 65Z3 Men - Trắng (Nội địa Trung)&nbsp;thuộc d&ograve;ng gi&agrave;y 65Z nổi trội về khả năng&nbsp;&quot;&Ecirc;m &aacute;i&quot; n&ecirc;n khi l&ecirc;n ch&acirc;n sẽ cho người sử dụng cảm gi&aacute;c v&ocirc; c&ugrave;ng ưng &yacute; ngay từ những bước chạy đầu ti&ecirc;n với độ nhẹ nh&agrave;ng, độ &ecirc;m &aacute;i, độ ổn định m&agrave; đ&ocirc;i gi&agrave;y mang lại v&ocirc; c&ugrave;ng tuyệt vời.</p>\r\n\r\n<p>Sử dụng tốt trong cả Đ&aacute;nh Đơn v&agrave; Đ&aacute;nh Đ&ocirc;i.&nbsp;T&ocirc;ng m&agrave;u Trắng&nbsp;thiết kế mang vẻ thanh lịch, nhẹ nh&agrave;ng những vẫn c&oacute; sức h&uacute;t rất ph&ugrave; hợp&nbsp;cho Ph&aacute;i Nam với&nbsp;size gi&agrave;y trải d&agrave;i từ 39-45&nbsp;tha hồ cho c&aacute;c l&ocirc;ng thủ lựa chọn.</p>\r\n', 100, 'Yonex21722443097.jpg', 46, 1),
(80, 'Giày cầu lông Lining AYZU001-3 Đen (Nội Địa Trung)', 'ln001', '2300000', '<h2><strong>1. Giới thiệu&nbsp;Gi&agrave;y cầu l&ocirc;ng Lining AYZU001-3&nbsp;Đen&nbsp;(Nội Địa Trung)</strong></h2>\r\n\r\n<p><a href=\"https://shopvnb.com/giay-cau-long-lining-ayzu001-3-den-noi-dia-trung.html\">Gi&agrave;y cầu l&ocirc;ng Lining AYZU001-3&nbsp;Đen&nbsp;(Nội Địa Trung</a>&nbsp;được thiết kế tinh sảo với kiểu d&aacute;ng thể thao với gam m&agrave;u đen huyền b&iacute; nhưng kh&ocirc;ng k&eacute;m phần hiện đại. Đế&nbsp;giữa lượn s&oacute;ng cung cấp lớp đệm &ecirc;m &aacute;i. Vải lưới được l&agrave;m từ kết cấu đặc biệt phối hợp với thiết kế phần da cao cấp gi&uacute;p tăng bộ bền của gi&agrave;y, hỗ trợ&nbsp;khả năng bảo vệ ch&acirc;n tuyệt đối.</p>\r\n\r\n<p>Phần mũi&nbsp;Gi&agrave;y cầu l&ocirc;ng Lining AYZU001-3&nbsp;Đen&nbsp;(Nội Địa Trung)&nbsp;được thiết kế tỉ mỉ để bảo vệ từng ng&oacute;n ch&acirc;n, giảm thiểu nguy cơ chấn thương trong c&aacute;c t&igrave;nh huống va chạm. Với form gi&agrave;y cứng c&aacute;p, đ&ocirc;i gi&agrave;y n&agrave;y đem lại sự ổn định v&agrave; hỗ trợ tuyệt vời cho b&agrave;n ch&acirc;n trong những pha chạy, nhảy v&agrave; di chuyển đầy nhanh nhẹn.</p>\r\n\r\n<p><img alt=\"Giày cầu lông Lining AYZU001-3 Đen (Nội Địa Trung)\" src=\"https://cdn.shopvnb.com/uploads/images/giay-cau-long-lining-ayzu001-3-den-noi-dia-trung.jpg\" /></p>\r\n\r\n<p>Một t&iacute;nh năng độc đ&aacute;o của Gi&agrave;y cầu l&ocirc;ng Lining AYZU001-3&nbsp;Đen&nbsp;(Nội Địa Trung) l&agrave; tấm carbon chống vặn xoắn, gi&uacute;p tăng cường sự ổn định trong c&aacute;c t&igrave;nh huống thay đổi hướng đột ngột. Điều n&agrave;y đảm bảo bạn lu&ocirc;n kiểm so&aacute;t tối đa mọi chuyển động của m&igrave;nh tr&aacute;nh xảy ra c&aacute;c chấn thương.</p>\r\n\r\n<p>Nếu bạn đang t&igrave;m kiếm một đ&ocirc;i gi&agrave;y cao cấp, to&agrave;n diện v&agrave; tối ưu c&aacute;c pha di chuyển tr&ecirc;n s&acirc;n&nbsp;th&igrave;&nbsp;Gi&agrave;y cầu l&ocirc;ng Lining AYZU001-3&nbsp;Đen&nbsp;(Nội Địa Trung) kh&ocirc;ng thể thiếu trong danh s&aacute;ch của bạn. Ngo&agrave;i ra&nbsp;c&aacute;c bạn cũng c&oacute; thể tham khảo th&ecirc;m nhiều mẫu&nbsp;<a href=\"https://shopvnb.com/giay-cau-long-lining.html\">gi&agrave;y cầu l&ocirc;ng Lining</a>&nbsp;để lựa chọn cho m&igrave;nh một mẫu sản phẩm ph&ugrave; hợp với bản th&acirc;n m&igrave;nh nh&eacute;.</p>\r\n\r\n<h2><strong>2. Th&ocirc;ng số&nbsp;Gi&agrave;y cầu l&ocirc;ng Lining AYZU001-3&nbsp;Đen&nbsp;(Nội Địa Trung)</strong></h2>\r\n\r\n<p>- Thương hiệu: Lining</p>\r\n\r\n<p>- M&agrave;u sắc: Đen</p>\r\n\r\n<p>- Th&acirc;n tr&ecirc;n: Syntheric + Textile + TPU</p>\r\n\r\n<p>- Đế: Rubber + PHYLON + TPU</p>\r\n\r\n<p>- Bảng size Gi&agrave;y cầu l&ocirc;ng Lining AYZU001-3&nbsp;Đen&nbsp;(Nội Địa Trung)</p>\r\n\r\n<p><img alt=\"Bảng size Giày Cầu Lông Lining AYZU001-3 Đen (Nội Địa Trung)\" src=\"https://cdn.shopvnb.com/uploads/images/bang%20size%20gi%C3%A0y%20lining(4).jpg\" /></p>\r\n\r\n<h2><strong>3.&nbsp;C&ocirc;ng nghệ t&iacute;ch hợp tr&ecirc;n&nbsp;Gi&agrave;y cầu l&ocirc;ng Lining AYZU001-3&nbsp;Đen&nbsp;(Nội Địa Trung)</strong></h2>\r\n\r\n<p><strong>-</strong>&nbsp;<strong>TUFF RB:</strong>&nbsp;l&agrave; chất liệu cao su c&oacute; khả năng chống m&agrave;i m&ograve;n cao, tốt hơn chất liệu cao su th&ocirc;ng thường v&agrave; c&oacute; thể cải thiện hiệu quả khả năng chống m&agrave;i m&ograve;n của đế, từ đ&oacute; k&eacute;o d&agrave;i tuổi thọ của gi&agrave;y</p>\r\n\r\n<p><img alt=\"Công nghệ TUFF RB của Giày Cầu Lông Lining AYZU001-3 Đen (Nội Địa Trung)\" src=\"https://cdn.shopvnb.com/uploads/images/cong-nghe-tuff-RB(2).jpg\" /></p>\r\n\r\n<p><strong>-</strong>&nbsp;<strong>TUFF TIP:</strong>&nbsp;l&agrave; vật liệu chống m&agrave;i m&ograve;n tr&ecirc;n mũi gi&agrave;y<strong>&nbsp;</strong>được &aacute;p dụng để giảm sự m&agrave;i m&ograve;n v&agrave; k&eacute;o d&agrave;i tuổi thọ của gi&agrave;y.</p>\r\n\r\n<p><img alt=\"Công nghệ TUFF TIP của Giày Cầu Lông Lining AYZU001-3 Đen (Nội Địa Trung)\" src=\"https://cdn.shopvnb.com/uploads/images/cong-nghe-TUFF-TIP(2).jpg\" /></p>\r\n\r\n<p><strong>-&nbsp;CARBON-FIBER PLATE:</strong>&nbsp;Tấm Carbon-Fiber nhẹ hơn v&agrave; mạnh hơn vật liệu TPU truyền thống.&nbsp;N&oacute; c&oacute; độ dẻo dai cao, chống sốc v&agrave; chống va đập&nbsp;gi&uacute;p Gi&agrave;y cầu l&ocirc;ng Lining AYZU001-1 Trắng (Nội Địa Trung)&nbsp;cung cấp hỗ trợ tốt v&agrave; truyền lực trong khi chơi thể thao, giảm mất vận động v&agrave; tăng cường hiệu suất thể thao.</p>\r\n\r\n<p><img alt=\"Công nghệ  CARBON-FIBER PLATE của Giày Cầu Lông Lining AYZU001-3 Đen (Nội Địa Trung)\" src=\"https://cdn.shopvnb.com/uploads/images/CARBON-FIBER-PLATE(2).jpg\" /></p>\r\n\r\n<p><strong>-&nbsp;PROBAR LOC:</strong>&nbsp;l&agrave; một thiết bị ổn định được để trong v&ograve;m của đế giữa v&agrave; được kết nối với b&agrave;n ch&acirc;n trước v&agrave; g&oacute;t ch&acirc;n, c&oacute; thể gi&uacute;p v&ograve;m b&agrave;n ch&acirc;n được hỗ trợ v&agrave; bảo vệ đ&uacute;ng c&aacute;ch trong mỗi bước tập luyện, đồng thời cải thiện độ ổn định.</p>\r\n\r\n<p><img alt=\"Công nghệ  PROBAR LOC của Giày Cầu Lông Lining AYZU001-3 Đen (Nội Địa Trung)\" src=\"https://cdn.shopvnb.com/uploads/images/cong-nghe-probar-loc(2).jpg\" /></p>\r\n\r\n<p><strong>-</strong>&nbsp;<strong>COOL SHELL:</strong>&nbsp;l&agrave; c&ocirc;ng nghệ giải quyết t&igrave;nh trạng tăng nhiệt độ của b&agrave;n ch&acirc;n khi chơi thể thao. Hệ thống l&agrave;m m&aacute;t tho&aacute;ng kh&iacute; bao gồm lưỡi g&agrave;, th&acirc;n gi&agrave;y&nbsp;v&agrave; cấu tr&uacute;c đế tho&aacute;ng kh&iacute; 360 độ mang lại hiệu quả l&agrave;m m&aacute;t.</p>\r\n\r\n<p><img alt=\"Công nghệ Cool Shell của Giày Cầu Lông Lining AYZU001-3 Đen (Nội Địa Trung)\" src=\"https://cdn.shopvnb.com/uploads/images/cong-nghe-COOL-SHELL(2).jpg\" /></p>\r\n\r\n<p><strong>- NON-MARKING</strong>: l&agrave; c&ocirc;ng nghệ đế kh&ocirc;ng để lại dấu vết khi thi đấu tr&ecirc;n mặt s&acirc;n thảm, s&agrave;n bằng phẳng. Đ&acirc;y l&agrave; c&ocirc;ng nghệ của h&atilde;ng Lining thường được sử dụng tr&ecirc;n c&aacute;c đ&ocirc;i gi&agrave;y cầu l&ocirc;ng. C&ocirc;ng nghệ n&agrave;y sử dụng chất liệu cao su cao cấp để l&agrave;m phần đế ngo&agrave;i, gia tăng độ bền, đặc biệt l&agrave; độ b&aacute;m s&agrave;n cao v&agrave; kh&ocirc;ng để lại dấu vết tr&ecirc;n mặt s&acirc;n thi đấu.</p>\r\n\r\n<p><img alt=\"Công nghệ NON_MAKING của Giày Cầu Lông Lining AYZU001-3 Đen (Nội Địa Trung)\" src=\"https://cdn.shopvnb.com/uploads/images/cong-nghe-non-marking(2).jpg\" /></p>\r\n\r\n<p><strong>-&nbsp;LI-NING CLOUD:</strong>&nbsp;LI-NING CLOUD l&agrave; c&ocirc;ng nghệ độc đ&aacute;o của Li-Ning, sử dụng đế giữa polyme để tạo ra sự hấp thụ sốc v&agrave; chuyển đổi năng lượng hiệu quả trong qu&aacute; tr&igrave;nh tập luyện. C&ocirc;ng nghệ n&agrave;y&nbsp;mang đến&nbsp;sự mềm mại v&agrave; trọng lượng nhẹ gi&uacute;p&nbsp;giảm t&aacute;c động b&ecirc;n ngo&agrave;i v&agrave; cải thiện hiệu suất hoạt động tr&ecirc;n s&acirc;n.</p>\r\n\r\n<p><img alt=\"Công nghệ  LI-NING CLOUD của Giày Cầu Lông Lining AYZU001-3 Đen (Nội Địa Trung)\" src=\"https://cdn.shopvnb.com/uploads/images/cong-nghe-LI-NING-CLOUD(2).jpg\" /></p>\r\n\r\n<p><strong>- Lining Boom</strong>: C&ocirc;ng nghệ Flick của Li-Ning l&agrave; một vật liệu đế giữa cải tiến được ph&aacute;t triển bởi Li Ning. Được điều chế th&ocirc;ng qua quy tr&igrave;nh tạo bọt chất lỏng. So với c&aacute;c vật liệu th&ocirc;ng thường, c&ocirc;ng nghệ gi&uacute;p l&agrave;m giảm&nbsp;trọng lượng của đế giữa v&agrave; cải thiện&nbsp;hiệu suất bật của gi&agrave;y,.gi&uacute;p gi&agrave;y c&oacute; tuổi thọ d&agrave;i hơn.&nbsp;</p>\r\n\r\n<p><img alt=\"Công nghệ Lining Boom của Giày Cầu Lông Lining AYZU001-3 Đen (Nội Địa Trung)\" src=\"https://cdn.shopvnb.com/uploads/images/cong-nghe-Lining-BOOM(2).jpg\" /></p>\r\n\r\n<p><strong>- Lining Boom Fiber:&nbsp;</strong>của Li Ning l&agrave; một loại chất đ&agrave;n hồi nhựa nhiệt dẻo mới.Th&ocirc;ng qua c&ocirc;ng nghệ k&eacute;o sợi mới nhất, n&oacute; c&oacute; thể được chế biến th&agrave;nh 1 loại &quot;lụa&quot; mới c&oacute; t&iacute;nh linh hoạt, đ&agrave;n hồi v&agrave; độ bền&nbsp;tốt hơn c&aacute;c loại sợi th&ocirc;ng thường.V&agrave; cảm gi&aacute;c rất thoải m&aacute;i khi mang. Kết hợp&nbsp;với c&ocirc;ng nghệ dệt ti&ecirc;n tiến, gi&uacute;p gi&agrave;y&nbsp;c&oacute; được phần tr&ecirc;n nhẹ nh&agrave;ng, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i, kh&ocirc;ng bị biến dạng v&agrave; c&oacute; độ bền tốt hơn.</p>\r\n\r\n<h2><strong>4. Ưu điểm v&agrave; trải nghiệm thực tế&nbsp;Gi&agrave;y cầu l&ocirc;ng Lining AYZU001-3&nbsp;Đen&nbsp;(Nội Địa Trung)</strong></h2>\r\n\r\n<p>-&nbsp;Gi&agrave;y cầu l&ocirc;ng Lining AYZU001-3&nbsp;Đen&nbsp;(Nội Địa Trung) chắc chắn sẽ l&agrave;m c&aacute;c l&ocirc;ng thủ cực ưng &yacute;&nbsp;&igrave; độ &ecirc;m &aacute;i mang lại với form gi&agrave;y&nbsp;chắc chắn v&agrave;&nbsp;&ocirc;m ch&acirc;n c&ugrave;ng&nbsp;phần đế cong,&nbsp;uốn theo l&ograve;ng b&agrave;n ch&acirc;n tạo cảm gi&aacute;c thoải m&aacute;i cho người d&ugrave;ng khi tập luyện, thi đấu.</p>\r\n\r\n<p>- Mũi gi&agrave;y được thiết kế chắc chắn cộng với những lỗ tho&aacute;ng kh&iacute; nhỏ nhưng vẫn đảm bảo độ &ecirc;m ch&acirc;n v&agrave; mềm mại cho người chơi khi di chuyển.</p>\r\n\r\n<p>- Bộ đế cao su của gi&agrave;y cầu l&ocirc;ng Lining AYZU001-3&nbsp;Đen&nbsp;(Nội Địa Trung) cho độ b&aacute;m s&acirc;n ho&agrave;n hảo, c&aacute;c bước di chuyển gấp của người chơi tr&ecirc;n s&acirc;n sẽ được đ&ocirc;i gi&agrave;y hỗ trợ cực tốt.</p>\r\n\r\n<p>- Ngo&agrave;i ra, với c&aacute;c c&ocirc;ng nghệ cao cấp được t&iacute;nh hợp mang đến một sự ổn định tuyệt vời tr&ecirc;n từng chuyển động, hạn chế tối đa khả năng lật cổ ch&acirc;n kh&ocirc;ng mong muốn.</p>\r\n', 30, 'Lining41722443288.jpg', 32, 1),
(81, 'Giày cầu lông Lining AYZU001-1 Trắng (Nội Địa Trung)', 'ln002', '2300000', '<h2><strong>1. Giới thiệu&nbsp;Gi&agrave;y cầu l&ocirc;ng Lining AYZU001-1 Trắng (Nội Địa Trung)</strong></h2>\r\n\r\n<p><a href=\"https://shopvnb.com/giay-cau-long-lining-ayzu001-1-trang-noi-dia-trung.html\">Gi&agrave;y cầu l&ocirc;ng Lining AYZU001-1 Trắng (Nội Địa Trung)</a>&nbsp;l&agrave; mẫu gi&agrave;y cao cấp của thương hiệu Li-ning nổi tiếng về sản xuất dụng cụ thể thao tr&ecirc;n thế giới n&oacute;i chung v&agrave; cầu l&ocirc;ng n&oacute;i ri&ecirc;ng đ&atilde; cho ra mắt với thiết kế hiện đại, t&iacute;ch hợp nhiều c&ocirc;ng nghệ cao&nbsp;nhằm hướng tới c&aacute;c đối tượng người chơi phong tr&agrave;o, đặc biệt&nbsp;người b&aacute;n chuy&ecirc;n v&agrave; chuy&ecirc;n nghiệp.</p>\r\n\r\n<p>Lining AYZU001-1 Trắng&nbsp;mang đến cho người chơi cảm gi&aacute;c&nbsp;nhẹ nh&agrave;ng, thoải m&aacute;i, chắc chắn v&agrave; b&aacute;m s&acirc;n tuyệt đối.&nbsp;Sở hữu ngoại h&igrave;nh thời trang, hiện đại v&agrave;&nbsp;linh hoạt th&iacute;ch hợp cho nhiều đối tượng kh&aacute;c nhau cả nam v&agrave; nữ.</p>\r\n\r\n<p><img alt=\"Giày Cầu Lông Lining AYZU001-1 Trắng (Nội Địa Trung)\" src=\"https://cdn.shopvnb.com/uploads/images/giay-cau-long-lining-ayzu001-1-trang-noi-dia-trung.jpg\" /></p>\r\n\r\n<p>Gi&agrave;y được thiết kế tinh sảo với kiểu d&aacute;ng thể thao với gam m&agrave;u trắng. Đế&nbsp;giữa lượn s&oacute;ng cung cấp lớp đệm &ecirc;m &aacute;i. Vải lưới được l&agrave;m từ kết cấu đặc biệt phối hợp với thiết kế phần da cao cấp gi&uacute;p tăng bộ bền của gi&agrave;y, hỗ trợ&nbsp;khả năng bảo vệ ch&acirc;n tuyệt đối.</p>\r\n\r\n<p>Một t&iacute;nh năng độc đ&aacute;o của Gi&agrave;y cầu l&ocirc;ng Lining AYZU001-1 Trắng (Nội Địa Trung) l&agrave; tấm carbon chống vặn xoắn, gi&uacute;p tăng cường sự ổn định trong c&aacute;c t&igrave;nh huống thay đổi hướng đột ngột. Điều n&agrave;y đảm bảo bạn lu&ocirc;n kiểm so&aacute;t tối đa mọi chuyển động của m&igrave;nh tr&aacute;nh xảy ra c&aacute;c chấn thương.</p>\r\n\r\n<p>Phần mũi&nbsp;Gi&agrave;y cầu l&ocirc;ng Lining AYZU001-1 Trắng (Nội Địa Trung)&nbsp;được thiết kế tỉ mỉ để bảo vệ từng ng&oacute;n ch&acirc;n, giảm thiểu nguy cơ chấn thương trong c&aacute;c t&igrave;nh huống va chạm. Với form gi&agrave;y cứng c&aacute;p, đ&ocirc;i gi&agrave;y n&agrave;y đem lại sự ổn định v&agrave; hỗ trợ tuyệt vời cho b&agrave;n ch&acirc;n trong những pha chạy, nhảy v&agrave; di chuyển đầy nhanh nhẹn.</p>\r\n\r\n<p><img alt=\"Giày Cầu Lông Lining AYZU001-1 Trắng (Nội Địa Trung)\" src=\"https://cdn.shopvnb.com/uploads/images/giay-cau-long-lining-ayzu001-1-trang-noi-dia-trung-2.jpg\" /></p>\r\n\r\n<p>Nếu bạn đang t&igrave;m kiếm một đ&ocirc;i gi&agrave;y cao cấp, to&agrave;n diện v&agrave; tối ưu c&aacute;c pha di chuyển tr&ecirc;n s&acirc;n&nbsp;th&igrave;&nbsp;Gi&agrave;y cầu l&ocirc;ng Lining AYZU001-1 Trắng (Nội Địa Trung) kh&ocirc;ng thể thiếu trong danh s&aacute;ch của bạn. Ngo&agrave;i ra&nbsp;c&aacute;c bạn cũng c&oacute; thể tham khảo th&ecirc;m nhiều mẫu&nbsp;<a href=\"https://shopvnb.com/giay-cau-long-lining.html\">gi&agrave;y cầu l&ocirc;ng Lining</a>&nbsp;để lựa chọn cho m&igrave;nh một mẫu sản phẩm ph&ugrave; hợp với bản th&acirc;n m&igrave;nh nh&eacute;.</p>\r\n\r\n<h2><strong>2. Th&ocirc;ng số&nbsp;Gi&agrave;y cầu l&ocirc;ng Lining AYZU001-1 Trắng (Nội Địa Trung)</strong></h2>\r\n\r\n<p>- Thương hiệu: Lining</p>\r\n\r\n<p>- M&agrave;u sắc: Trắng</p>\r\n\r\n<p>- Th&acirc;n tr&ecirc;n: Syntheric + Textile + TPU</p>\r\n\r\n<p>- Đế: Rubber + PHYLON + TPU</p>\r\n\r\n<p>- Bảng size Gi&agrave;y cầu l&ocirc;ng Lining AYZU001-1 Trắng (Nội Địa Trung)</p>\r\n\r\n<p><img alt=\"Bảng size Giày Cầu Lông Lining AYZU001-1 Trắng (Nội Địa Trung)\" src=\"https://cdn.shopvnb.com/uploads/images/bang%20size%20gi%C3%A0y%20lining(3).jpg\" /></p>\r\n\r\n<h2><strong>3.&nbsp;C&ocirc;ng nghệ t&iacute;ch hợp tr&ecirc;n&nbsp;Gi&agrave;y cầu l&ocirc;ng Lining AYZU001-1 Trắng (Nội Địa Trung)</strong></h2>\r\n\r\n<p><strong>-</strong>&nbsp;<strong>TUFF RB:</strong>&nbsp;l&agrave; chất liệu cao su c&oacute; khả năng chống m&agrave;i m&ograve;n cao, tốt hơn chất liệu cao su th&ocirc;ng thường v&agrave; c&oacute; thể cải thiện hiệu quả khả năng chống m&agrave;i m&ograve;n của đế, từ đ&oacute; k&eacute;o d&agrave;i tuổi thọ của gi&agrave;y</p>\r\n\r\n<p><img alt=\"Công nghệ TUFF RB của Giày Cầu Lông Lining AYZU001-1 Trắng (Nội Địa Trung)\" src=\"https://cdn.shopvnb.com/uploads/images/cong-nghe-tuff-RB.jpg\" /></p>\r\n\r\n<p><strong>-</strong>&nbsp;<strong>TUFF TIP:</strong>&nbsp;l&agrave; vật liệu chống m&agrave;i m&ograve;n tr&ecirc;n mũi gi&agrave;y<strong>&nbsp;</strong>được &aacute;p dụng để giảm sự m&agrave;i m&ograve;n v&agrave; k&eacute;o d&agrave;i tuổi thọ của gi&agrave;y.</p>\r\n\r\n<p><img alt=\"Công nghệ TUFF TIP của Giày Cầu Lông Lining AYZU001-1 Trắng (Nội Địa Trung)\" src=\"https://cdn.shopvnb.com/uploads/images/cong-nghe-TUFF-TIP.jpg\" /></p>\r\n\r\n<p><strong>-&nbsp;CARBON-FIBER PLATE:</strong>&nbsp;Tấm Carbon-Fiber nhẹ hơn v&agrave; mạnh hơn vật liệu TPU truyền thống.&nbsp;N&oacute; c&oacute; độ dẻo dai cao, chống sốc v&agrave; chống va đập&nbsp;gi&uacute;p Gi&agrave;y cầu l&ocirc;ng Lining AYZU001-1 Trắng (Nội Địa Trung)&nbsp;cung cấp hỗ trợ tốt v&agrave; truyền lực trong khi chơi thể thao, giảm mất vận động v&agrave; tăng cường hiệu suất thể thao.</p>\r\n\r\n<p><img alt=\"Công nghệ  CARBON-FIBER PLATE của Giày Cầu Lông Lining AYZU001-1 Trắng (Nội Địa Trung)\" src=\"https://cdn.shopvnb.com/uploads/images/CARBON-FIBER-PLATE.jpg\" /></p>\r\n\r\n<p><strong>-&nbsp;PROBAR LOC:</strong>&nbsp;l&agrave; một thiết bị ổn định được để trong v&ograve;m của đế giữa v&agrave; được kết nối với b&agrave;n ch&acirc;n trước v&agrave; g&oacute;t ch&acirc;n, c&oacute; thể gi&uacute;p v&ograve;m b&agrave;n ch&acirc;n được hỗ trợ v&agrave; bảo vệ đ&uacute;ng c&aacute;ch trong mỗi bước tập luyện, đồng thời cải thiện độ ổn định.</p>\r\n\r\n<p><img alt=\"Công nghệ  PROBAR LOC của Giày Cầu Lông Lining AYZU001-1 Trắng (Nội Địa Trung)\" src=\"https://cdn.shopvnb.com/uploads/images/cong-nghe-probar-loc.jpg\" /></p>\r\n\r\n<p><strong>-</strong>&nbsp;<strong>COOL SHELL:</strong>&nbsp;l&agrave; c&ocirc;ng nghệ giải quyết t&igrave;nh trạng tăng nhiệt độ của b&agrave;n ch&acirc;n khi chơi thể thao. Hệ thống l&agrave;m m&aacute;t tho&aacute;ng kh&iacute; bao gồm lưỡi g&agrave;, th&acirc;n gi&agrave;y&nbsp;v&agrave; cấu tr&uacute;c đế tho&aacute;ng kh&iacute; 360 độ mang lại hiệu quả l&agrave;m m&aacute;t.</p>\r\n\r\n<p><img alt=\"Công nghệ Cool Shell của Giày Cầu Lông Lining AYZU001-1 Trắng (Nội Địa Trung)\" src=\"https://cdn.shopvnb.com/uploads/images/cong-nghe-COOL-SHELL.jpg\" /></p>\r\n\r\n<p><strong>- NON-MARKING</strong>:&nbsp;l&agrave; c&ocirc;ng nghệ đế kh&ocirc;ng để lại dấu vết khi thi đấu tr&ecirc;n mặt s&acirc;n thảm, s&agrave;n bằng phẳng. Đ&acirc;y l&agrave; c&ocirc;ng nghệ của h&atilde;ng Lining thường được sử dụng tr&ecirc;n c&aacute;c đ&ocirc;i gi&agrave;y cầu l&ocirc;ng. C&ocirc;ng nghệ n&agrave;y sử dụng chất liệu cao su cao cấp để l&agrave;m phần đế ngo&agrave;i, gia tăng độ bền, đặc biệt l&agrave; độ b&aacute;m s&agrave;n cao v&agrave; kh&ocirc;ng để lại dấu vết tr&ecirc;n mặt s&acirc;n thi đấu.</p>\r\n\r\n<p><img alt=\"Công nghệ NON_MAKING của Giày Cầu Lông Lining AYZU001-1 Trắng (Nội Địa Trung)\" src=\"https://cdn.shopvnb.com/uploads/images/cong-nghe-non-marking.jpg\" /></p>\r\n\r\n<p><strong>-&nbsp;LI-NING CLOUD:</strong>&nbsp;LI-NING CLOUD l&agrave; c&ocirc;ng nghệ độc đ&aacute;o của Li-Ning, sử dụng đế giữa polyme để tạo ra sự hấp thụ sốc v&agrave; chuyển đổi năng lượng hiệu quả trong qu&aacute; tr&igrave;nh tập luyện. C&ocirc;ng nghệ n&agrave;y&nbsp;mang đến&nbsp;sự mềm mại v&agrave; trọng lượng nhẹ gi&uacute;p&nbsp;giảm t&aacute;c động b&ecirc;n ngo&agrave;i v&agrave; cải thiện hiệu suất hoạt động tr&ecirc;n s&acirc;n.</p>\r\n\r\n<p><img alt=\"Công nghệ  LI-NING CLOUD của Giày Cầu Lông Lining AYZU001-1 Trắng (Nội Địa Trung)\" src=\"https://cdn.shopvnb.com/uploads/images/cong-nghe-LI-NING-CLOUD.jpg\" /></p>\r\n\r\n<p><strong>- Lining Boom</strong>: C&ocirc;ng nghệ Flick của Li-Ning l&agrave; một vật liệu đế giữa cải tiến được ph&aacute;t triển bởi Li Ning. Được điều chế th&ocirc;ng qua quy tr&igrave;nh tạo bọt chất lỏng. So với c&aacute;c vật liệu th&ocirc;ng thường, c&ocirc;ng nghệ gi&uacute;p l&agrave;m giảm&nbsp;trọng lượng của đế giữa v&agrave; cải thiện&nbsp;hiệu suất bật của gi&agrave;y,.gi&uacute;p gi&agrave;y c&oacute; tuổi thọ d&agrave;i hơn.&nbsp;</p>\r\n\r\n<p><img alt=\"Công nghệ Lining Boom của Giày Cầu Lông Lining AYZU001-1 Trắng (Nội Địa Trung)\" src=\"https://cdn.shopvnb.com/uploads/images/cong-nghe-Lining-BOOM.jpg\" /></p>\r\n\r\n<p><strong>- Lining Boom Fiber:&nbsp;</strong>của Li Ning l&agrave; một loại chất đ&agrave;n hồi nhựa nhiệt dẻo mới.Th&ocirc;ng qua c&ocirc;ng nghệ k&eacute;o sợi mới nhất, n&oacute; c&oacute; thể được chế biến th&agrave;nh 1 loại &quot;lụa&quot; mới c&oacute; t&iacute;nh linh hoạt, đ&agrave;n hồi v&agrave; độ bền&nbsp;tốt hơn c&aacute;c loại sợi th&ocirc;ng thường.V&agrave; cảm gi&aacute;c rất thoải m&aacute;i khi mang. Kết hợp&nbsp;với c&ocirc;ng nghệ dệt ti&ecirc;n tiến, gi&uacute;p gi&agrave;y&nbsp;c&oacute; được phần tr&ecirc;n nhẹ nh&agrave;ng, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i, kh&ocirc;ng bị biến dạng v&agrave; c&oacute; độ bền tốt hơn.</p>\r\n\r\n<h2><strong>4. Ưu điểm v&agrave; trải nghiệm thực tế&nbsp;Gi&agrave;y cầu l&ocirc;ng Lining AYZU001-1 Trắng (Nội Địa Trung)</strong></h2>\r\n\r\n<p>-&nbsp;Gi&agrave;y cầu l&ocirc;ng Lining AYZU001-1 Trắng (Nội Địa Trung) chắc chắn sẽ l&agrave;m c&aacute;c l&ocirc;ng thủ cực ưng &yacute; ngay từ lần đầu ti&ecirc;n xỏ ch&acirc;n v&agrave;o v&igrave; độ &ecirc;m &aacute;i b&ecirc;n trong gi&agrave;y mang lại v&ocirc; c&ugrave;ng tuyệt vời&nbsp;với form gi&agrave;y&nbsp;chắc chắn v&agrave;&nbsp;&ocirc;m ch&acirc;n c&ugrave;ng&nbsp;phần đế cong,&nbsp;uốn theo l&ograve;ng b&agrave;n ch&acirc;n tạo cảm gi&aacute;c thoải m&aacute;i cho người d&ugrave;ng khi tập luyện, thi đấu.</p>\r\n\r\n<p>- Mũi gi&agrave;y được thiết kế chắc chắn cộng với những lỗ tho&aacute;ng kh&iacute; nhỏ nhưng vẫn đảm bảo độ &ecirc;m ch&acirc;n v&agrave; mềm mại cho người chơi khi di chuyển.</p>\r\n\r\n<p>- Bộ đế cao su của gi&agrave;y cầu l&ocirc;ng Lining AYZU001-1 Trắng (Nội Địa Trung) cho độ b&aacute;m s&acirc;n ho&agrave;n hảo, c&aacute;c bước di chuyển gấp của người chơi tr&ecirc;n s&acirc;n sẽ được đ&ocirc;i gi&agrave;y hỗ trợ cực tốt.</p>\r\n\r\n<p>- Ngo&agrave;i ra, với c&aacute;c c&ocirc;ng nghệ cao cấp được t&iacute;nh hợp mang đến một sự ổn định tuyệt vời tr&ecirc;n từng bước di chuyển, hạn chế tối đa khả năng lật cổ ch&acirc;n kh&ocirc;ng mong muốn.</p>\r\n', 10, 'Lining51722443419.jpg', 32, 1),
(82, 'Giày cầu lông Victor P9200A Trắng chính hãng', 'VT001', '2090000', '<h2><strong>1. Giới thiệu Gi&agrave;y cầu l&ocirc;ng Victor P9200A Trắng ch&iacute;nh h&atilde;ng</strong></h2>\r\n\r\n<p>Gi&agrave;y cầu l&ocirc;ng Victor P9200A Trắng ch&iacute;nh h&atilde;ng thuộc thế hệ cao cấp tiếp theo của h&atilde;ng sau những đ&agrave;n anh trước đ&oacute;. Nếu ở c&aacute;c phi&ecirc;n bản trước c&oacute;&nbsp;t&ocirc;ng m&agrave;u đen chủ đạo th&igrave; ở phi&ecirc;n bản lần n&agrave;y, sự sang trọng v&agrave; c&aacute; t&iacute;nh ch&iacute;nh l&agrave; điểm nổi bật đến từ t&ocirc;ng m&agrave;u trắng. Những người chơi&nbsp;mong muốn c&oacute; một trải nghiệm tốt nhất khi thi đấu tr&ecirc;n s&acirc;n th&igrave; đ&acirc;y ch&iacute;nh l&agrave; một lựa chọn tuyệt vời.</p>\r\n\r\n<p>Victor P9200A&nbsp;l&agrave; thế hệ mới từ d&ograve;ng Stability c&oacute; thể cho ph&eacute;p di chuyển v&agrave; chuyển hướng nhanh ch&oacute;ng,&nbsp;cũng như mang lại sự thoải m&aacute;i, ổn định v&agrave; bảo vệ khi tiếp đất.&nbsp;Phần g&oacute;t được chế tạo bằng NEO DUPLEX, trong khi đệm chống sốc được n&acirc;ng cấp với E-TPU cho b&agrave;n ch&acirc;n của bạn lu&ocirc;n &ecirc;m &aacute;i trong mọi thời điểm.</p>\r\n\r\n<p>Sử dụng chất liệu cao cấp v&agrave; tu&acirc;n thủ quy tr&igrave;nh sản xuất kỹ lưỡng, c&aacute;c chi tiết gia c&ocirc;ng tr&ecirc;n&nbsp;Gi&agrave;y cầu l&ocirc;ng Victor P9200A Trắng ch&iacute;nh h&atilde;ng&nbsp;đảm bảo t&iacute;nh bền bỉ v&agrave; độ chắc chắn của đ&ocirc;i gi&agrave;y.&nbsp;Phần đế cũng được l&agrave;m từ chất liệu cao su chuy&ecirc;n dụng với hệ thống rảnh đảm bảo chống trượt tốt nhất để người chơi tự tin trong mỗi bước di chuyển của m&igrave;nh.</p>\r\n\r\n<p>Phần ngo&agrave;i&nbsp;th&acirc;n gi&agrave;y&nbsp;<strong><a href=\"https://banhang.shopvnb.com/giay-cau-long-victor-p9200a-trang-chinh-hang\">Gi&agrave;y cầu l&ocirc;ng Victor P9200A Trắng ch&iacute;nh h&atilde;ng</a></strong>&nbsp;được cấu tạo bằng một lớp da PU gi&uacute;p bạn dễ d&agrave;ng vệ sinh, giữ cho đ&ocirc;i gi&agrave;y kh&ocirc;ng bị thấm nước khi gặp phải thời tiết mưa. Ngo&agrave;i ra, c&aacute;c hệ thống lỗ nhỏ li ti tại c&aacute;c vị tr&iacute; t&iacute;nh to&aacute;n mang lại sự th&ocirc;ng tho&aacute;ng v&agrave; m&aacute;t mẻ cho đ&ocirc;i ch&acirc;n khi hoạt động li&ecirc;n tục trong khoảng thời gian d&agrave;i.&nbsp;</p>\r\n\r\n<p><img alt=\"Giày cầu lông Victor P9200A Trắng chính hãng\" src=\"https://cdn.shopvnb.com/uploads/images/giay-cau-long-victor-p9200a-trang-chinh-hang.jpg\" /></p>\r\n\r\n<h2><strong>2. Kết cấu tổng thể Gi&agrave;y cầu l&ocirc;ng Victor P9200A Trắng ch&iacute;nh h&atilde;ng</strong></h2>\r\n\r\n<p>- Thương hiệu: Victor</p>\r\n\r\n<p>- M&agrave;u sắc: Trắng phối c&aacute;c họa tiết đen</p>\r\n\r\n<p>- Phần th&acirc;n (Upper):&nbsp;Microfiber PU Leather + V-Tough + Double Mesh</p>\r\n\r\n<p>- Phần đế giữa (Midsole):&nbsp;Light Resilient EVA + ENERGYMAX 3.0 + TPU + Carbon Power + Solid EVA</p>\r\n\r\n<p>- Phần đế ngo&agrave;i (Outsole):&nbsp;VSR Rubber</p>\r\n\r\n<p>- Size 36 - 44</p>\r\n\r\n<p>- Bảng đo size&nbsp;gi&agrave;y cầu l&ocirc;ng Victor:</p>\r\n\r\n<p><img alt=\"Giày cầu lông Victor P9200A Trắng chính hãng\" src=\"https://cdn.shopvnb.com/uploads/images/tin_tuc/giay-cau-long-victor-p9200c-den-chinh-hang-1-1699822311.webp\" /></p>\r\n\r\n<p>C&ograve;n rất nhiều mẫu&nbsp;<a href=\"https://shopvnb.com/giay-cau-long-victor.html\">gi&agrave;y cầu l&ocirc;ng Victor</a>&nbsp;kh&aacute;c&nbsp;tại ShopVNB xem ngay để c&oacute; cho m&igrave;nh sự lựa chọn&nbsp;l&acirc;u d&agrave;i với đ&ocirc;i ch&acirc;n tr&ecirc;n s&acirc;n cầu nh&eacute;.</p>\r\n\r\n<h2><strong>3. C&ocirc;ng nghệ v&agrave; c&aacute;c ưu điểm nổi bật tr&ecirc;n Gi&agrave;y cầu l&ocirc;ng Victor P9200A Trắng ch&iacute;nh h&atilde;ng</strong></h2>\r\n\r\n<p><strong>- Light Resilient EVA:&nbsp;</strong>Một đế giữa nhẹ, đ&agrave;n hồi cao v&agrave; bền được n&acirc;ng cấp ho&agrave;n to&agrave;n mới, c&oacute; độ bền tăng 16%. C&ocirc;ng nghệ n&agrave;y gi&uacute;p cải thiện tuổi thọ của gi&agrave;y Victor P9200A, giảm 19% trọng lượng, tăng 5% t&iacute;nh linh hoạt v&agrave; giảm g&aacute;nh nặng cơ bắp trong c&aacute;c b&agrave;i tập cường độ cao.</p>\r\n\r\n<p><img alt=\"Giày cầu lông Victor P9200A Trắng chính hãng\" src=\"https://cdn.shopvnb.com/uploads/images/tin_tuc/giay-cau-long-victor-p9200c-den-chinh-hang-2-1699823519.webp\" /></p>\r\n\r\n<p><strong>-&nbsp;BREATHING</strong>: &nbsp;Một lớp lưới thở độc đ&aacute;o được sử dụng để tăng th&ocirc;ng gi&oacute;.&nbsp;N&oacute; tạo điều kiện cho tản nhiệt.&nbsp;Điều n&agrave;y tạo ra một m&ocirc;i trường thoải m&aacute;i hơn cho b&agrave;n ch&acirc;n.</p>\r\n\r\n<p><img alt=\"Giày cầu lông Victor P9200A Trắng chính hãng\" src=\"https://cdn.shopvnb.com/uploads/images/tin_tuc/giay-cau-long-victor-p9200c-den-chinh-hang-3-1699823519.webp\" /></p>\r\n\r\n<p><strong>-&nbsp;NEO DUPLEX</strong>: &nbsp;Đế giữa cấu tr&uacute;c n&ecirc;m k&eacute;p mới được ph&aacute;t minh dựa&nbsp;tr&ecirc;n nguy&ecirc;n l&yacute; cơ sinh học, vật liệu đệm/đ&agrave;n hồi đặc biệt được phủ l&ecirc;n vật liệu đệm để tạo ra đế giữa cấu tr&uacute;c n&ecirc;m k&eacute;p vừa hấp thụ năng lượng vừa hỗ trợ ổn định.</p>\r\n\r\n<p><img alt=\"Giày cầu lông Victor P9200A Trắng chính hãng\" src=\"https://cdn.shopvnb.com/uploads/images/tin_tuc/giay-cau-long-victor-p9200c-den-chinh-hang-4-1699823519.webp\" /></p>\r\n\r\n<p><strong>-&nbsp;VSR ANTI-SLIP RUBBER</strong>: Cao su đế ngo&agrave;i được n&acirc;ng cấp, hiệu suất chống trượt tăng 21% tr&ecirc;n s&agrave;n PU kh&ocirc;.</p>\r\n\r\n<p><img alt=\"Giày cầu lông Victor P9200A Trắng chính hãng\" src=\"https://cdn.shopvnb.com/uploads/images/tin_tuc/giay-cau-long-victor-p9200c-den-chinh-hang-5-1699823524.webp\" /></p>\r\n\r\n<p><strong>- V-Tough</strong>: C&ocirc;ng nghệ n&agrave;y gi&uacute;p bề mặt b&ecirc;n trong của ng&oacute;n ch&acirc;n được l&agrave;m bằng vật liệu đặc biệt si&ecirc;u chống m&agrave;i m&ograve;n gi&uacute;p k&eacute;o d&agrave;i đ&aacute;ng kể độ bền của Gi&agrave;y cầu l&ocirc;ng Victor P9200A Trắng ch&iacute;nh h&atilde;ng. C&ocirc;ng nghệ si&ecirc;u chống m&agrave;i m&ograve;n đ&atilde; chứng minh khả năng chống m&agrave;i m&ograve;n gấp 16 lần so với da PU th&ocirc;ng thường.</p>\r\n\r\n<p><img alt=\"Giày cầu lông Victor P9200A Trắng chính hãng\" src=\"https://cdn.shopvnb.com/uploads/images/tin_tuc/giay-cau-long-victor-p9200c-den-chinh-hang-6-1699823525.webp\" /></p>\r\n\r\n<p><strong>- LS-S</strong>: Mặt ngo&agrave;i của b&agrave;n ch&acirc;n trước được thiết kế bằng TPU c&oacute; độ bền cao. Điều n&agrave;y tăng cường đ&aacute;ng kể sự ổn định trong qu&aacute; tr&igrave;nh chuyển hướng nhanh v&agrave; đột ngột.</p>\r\n\r\n<p><img alt=\"Giày cầu lông Victor P9200A Trắng chính hãng\" src=\"https://cdn.shopvnb.com/uploads/images/tin_tuc/giay-cau-long-victor-p9200ii-a-trang-chinh-hang-5-1687568236.webp\" /></p>\r\n\r\n<p><strong>-&nbsp;CARBON POWER</strong>: &nbsp;Tấm sợi carbon ba chiều cung cấp sự ổn định giữa đế v&agrave; giảm lực xoắn tr&ecirc;n v&ograve;m b&agrave;n ch&acirc;n.</p>\r\n\r\n<p><img alt=\"Giày cầu lông Victor P9200A Trắng chính hãng\" src=\"https://cdn.shopvnb.com/uploads/images/tin_tuc/giay-cau-long-victor-p9200c-den-chinh-hang-9-1699823525.webp\" /></p>\r\n\r\n<p><strong>- ENERGY MAX3.0:&nbsp;</strong>Gi&agrave;y cầu l&ocirc;ng Victor P9200A Trắng ch&iacute;nh h&atilde;ng&nbsp;sử dụng&nbsp;vật liệu c&oacute; độ đ&agrave;n hồi cao, tăng khả năng đ&agrave;n hồi v&agrave; hấp thụ sốc, c&oacute; thể tăng cường đ&aacute;ng kể khả&nbsp;năng phục hồi tức thời, hấp thu sốc v&agrave; t&aacute;c dụng đệm giảm bớt chấn động khi tiếp đất.</p>\r\n\r\n<p><img alt=\"Giày cầu lông Victor P9200A Trắng chính hãng\" src=\"https://cdn.shopvnb.com/uploads/images/cong-nghe-ENERGY-MAX3_0(1).png\" /></p>\r\n\r\n<p><strong>- ASYS:&nbsp;</strong>L&agrave; c&ocirc;ng nghệ của h&atilde;ng Victor được &aacute;p dụng l&ecirc;n v&ograve;m gi&agrave;y cầu l&ocirc;ng. Hỗ trợ v&ograve;m TPU bằng nhựa nhiệt dẻo được đặt trong v&ograve;m với trọng lượng nhẹ v&agrave; độ bền cao. Điều n&agrave;y ngăn ngừa hiện tượng biến dạng xoắn đồng thời mang lại sự ổn định cho b&agrave;n ch&acirc;n trong qu&aacute; tr&igrave;nh di chuyển tr&ecirc;n s&acirc;n.</p>\r\n\r\n<p><img alt=\"Giày cầu lông Victor P9200A Trắng chính hãng\" src=\"https://cdn.shopvnb.com/uploads/images/cong-nghe-ASYS(1).png\" /></p>\r\n', 200, 'Victor11722444824.jpg', 47, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product_images`
--

CREATE TABLE `tbl_product_images` (
  `id_image` int(11) NOT NULL,
  `id_product` int(11) UNSIGNED DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product_images`
--

INSERT INTO `tbl_product_images` (`id_image`, `id_product`, `image_path`) VALUES
(168, 75, 'Yonex117224418180.jpg'),
(169, 75, 'Yonex117224418181.jpg'),
(170, 75, 'Yonex117224418182.jpg'),
(180, 79, 'Yonex217224430970.jpg'),
(181, 79, 'Yonex217224430971.jpg'),
(182, 79, 'Yonex217224430972.jpg'),
(183, 80, 'Lining417224432880.jpg'),
(184, 80, 'Lining417224432881.jpg'),
(185, 80, 'Lining417224432882.jpg'),
(186, 81, 'Lining517224434190.jpg'),
(187, 81, 'Lining517224434191.jpg'),
(188, 81, 'Lining517224434192.jpg'),
(189, 82, 'Victor117224448240.jpg'),
(190, 82, 'Victor117224448241.jpg'),
(191, 82, 'Victor117224448242.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_category_post`
--
ALTER TABLE `tbl_category_post`
  ADD PRIMARY KEY (`id_category_post`);

--
-- Chỉ mục cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`id_category_product`);

--
-- Chỉ mục cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `tbl_config`
--
ALTER TABLE `tbl_config`
  ADD PRIMARY KEY (`config_key`);

--
-- Chỉ mục cho bảng `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_customer_order`
--
ALTER TABLE `tbl_customer_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_favourite`
--
ALTER TABLE `tbl_favourite`
  ADD PRIMARY KEY (`id_favourite`),
  ADD KEY `id_user` (`customer_id`,`id_product`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_category_post` (`id_category_post`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_category_product` (`id_category_product`);

--
-- Chỉ mục cho bảng `tbl_product_images`
--
ALTER TABLE `tbl_product_images`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `id_product` (`id_product`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_category_post`
--
ALTER TABLE `tbl_category_post`
  MODIFY `id_category_post` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `id_category_product` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `customer_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `tbl_customer_order`
--
ALTER TABLE `tbl_customer_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `tbl_favourite`
--
ALTER TABLE `tbl_favourite`
  MODIFY `id_favourite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT cho bảng `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id_product` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT cho bảng `tbl_product_images`
--
ALTER TABLE `tbl_product_images`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD CONSTRAINT `tbl_comment_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `tbl_product` (`id_product`);

--
-- Các ràng buộc cho bảng `tbl_favourite`
--
ALTER TABLE `tbl_favourite`
  ADD CONSTRAINT `tbl_favourite_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `tbl_product` (`id_product`),
  ADD CONSTRAINT `tbl_favourite_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customers` (`customer_id`);

--
-- Các ràng buộc cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `fk_customer` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customers` (`customer_id`);

--
-- Các ràng buộc cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD CONSTRAINT `tbl_order_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD CONSTRAINT `tbl_post_ibfk_1` FOREIGN KEY (`id_category_post`) REFERENCES `tbl_category_post` (`id_category_post`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`id_category_product`) REFERENCES `tbl_category_product` (`id_category_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_product_images`
--
ALTER TABLE `tbl_product_images`
  ADD CONSTRAINT `tbl_product_images_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `tbl_product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
