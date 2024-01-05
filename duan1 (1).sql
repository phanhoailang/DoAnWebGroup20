-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307:3307
-- Thời gian đã tạo: Th1 04, 2024 lúc 02:31 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Trà sữa'),
(2, 'Cà phê'),
(3, 'Nước uống trái cây'),
(4, 'Trà kem phô mai'),
(11, 'Sữa chua dẽo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment_content` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `comment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`comment_id`, `user_id`, `product_id`, `comment_content`, `comment_date`) VALUES
(36, 8, 46, 'Thật sự thức uống này rất ngon.', '2023-12-30 14:04:26'),
(37, 7, 48, 'Thật sự rất ổn khi chúng tôi thưởng thức nó.', '2023-12-30 14:05:59'),
(38, 8, 42, 'tuyệt vời', '2024-01-01 13:38:03'),
(39, 8, 55, 'rất ngon', '2024-01-01 14:24:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `likes` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `likes`, `created_at`, `updated_at`) VALUES
(0, 'Trà Mãng Cầu', 'Một loại trà trái cây vô cùng hot hiện nay chính là trà mãng cầu xiêm miền tây loại trái cây tuổi thơ của rất nhiều người, với hương vị thơm ngon đặc trưng riêng của mãng cầu, kết hợp cùng vị chát nhẹ của trà, chua ngọt của mãng cầu, khiến ai nếm thử cũng mê đắm món thức uống này.', 'mvc/public/images/news/10-cong-thuc-do-uong-hottrend-2023.jpg', 0, '2023-12-02 14:35:07', '2023-12-02 14:35:07'),
(0, 'Cà phê muối', 'Cà phê muối là một trong các loại đồ uống hot nhất hiện nay trong các quán cafe. Cà phê muối được biết đến lần đầu từ Huế, được cho là công thức đặc biệt của một quán cà phê nằm trên đường Nguyễn Lương Bằng, ngoài ra chưa có nhiều thông tin về nguồn gốc của đồ uống này. \r\n\r\nThay vì đường hoặc sữa, người pha chế sẽ sử dụng một lượng muối nhất định để dung hòa bớt vị đắng của cà phê, đồng thời giải phóng Ion Natri nhưng không làm thay đổi hương vị tổng quát. Nhờ vậy, ly cà phê sẽ mang lại cảm giác ngon miệng hơn khi thưởng thức, phù hợp khẩu vị người Việt. Cafe muối với hương vị đặc biệt, đậm đà khiến khách hàng có cảm giác độc đáo, thú vị khi thưởng thức và trở thành xu hướng trong thời gian gần đây.\r\n\r\n', 'mvc/public/images/news/do1.jpg', 0, '2023-12-02 15:07:53', '2023-12-02 15:07:53'),
(0, 'Cà phê sữa chua', 'Cà phê sữa chua là một trong các loại đồ uống Hot nhất hiện nay, rất dễ uống và phù hợp khẩu vị người Việt. Cách làm món này cũng không quá khó. Cụ thể, bạn pha cà phê để nguội, sau đó xay sinh tố sữa chua và đổ phần cà phê đã pha lên trên. Nếu không dùng máy xay, bạn có thể dùng bình lắc sữa chua, sữa đặc, đá và chanh. Cafe giúp tỉnh táo, sữa chua có nhiều tác dụng tốt cho tiêu hóa, làm đẹp da là sự kết hợp tuyệt vời cho một ngày mới. ', 'mvc/public/images/news/do4.jpg', 0, '2023-12-02 15:09:45', '2023-12-02 15:09:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `note` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `method` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` varchar(25) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `address`, `phone`, `note`, `method`, `status`, `order_date`) VALUES
(78, 7, 'Túy Loan Đông 2', '0905752450', 'Giao Nhanh', 'payLater', 'Đang tiến hành', '2023-12-30 14:02:35'),
(79, 8, 'Phước Thuận Hòa Nhơn', '0777409563', 'Cẩn thận đừng làm rơi rớt', 'payLater', 'Đã nhận hàng', '2023-12-30 14:04:00'),
(80, 7, 'Hòa Phong , Hòa Vang', '1905752450', 'Giao kịp cho tôi', 'payLater', 'Đang tiến hành', '2023-12-30 14:05:25'),
(81, 8, 'Phước Thuận', '0777409563', 'Ít đá', 'payLater', 'Đang tiến hành', '2024-01-01 13:28:25'),
(82, 8, 'phuoc thuan city', '0777409563', 'ít đá', 'banking', 'Đã nhận hàng', '2024-01-01 13:33:13'),
(83, 8, 'hòa nhơn hòa vang', '0777409563', 'nhiều đá', 'payLater', 'Đang tiến hành', '2024-01-01 13:34:08'),
(84, 8, 'hòa nhơn hòa vang', '0777409563', 'ít đá', 'payLater', 'Đang tiến hành', '2024-01-01 13:39:30'),
(85, 8, 'Túy Loannnnnn', '0777409563', 'ít đá', 'payLater', 'Đang tiến hành', '2024-01-01 14:22:49'),
(86, 8, 'túy loan đông 2', '0777409563', 'ít đá', 'payLater', 'Đang tiến hành', '2024-01-01 14:27:09'),
(87, 10, 'Túy Loan Đông 2', '0777409563', 'it đá', 'payLater', 'Đang tiến hành', '2024-01-01 17:26:25'),
(88, 8, 'Hòa Nhơn Hòa Vang', '0777409563', 'Ít đá', 'payLater', 'Đang tiến hành', '2024-01-02 02:57:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `details_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `variant_id` int(11) NOT NULL,
  `price_total` float NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`details_id`, `order_id`, `variant_id`, `price_total`, `num`) VALUES
(64, 78, 117, 18000, 1),
(65, 79, 129, 18000, 1),
(66, 80, 129, 18000, 1),
(67, 81, 129, 18000, 1),
(68, 81, 130, 22000, 1),
(69, 81, 131, 28000, 1),
(70, 82, 135, 36000, 2),
(71, 82, 136, 44000, 2),
(72, 83, 136, 22000, 1),
(73, 83, 137, 24000, 1),
(74, 84, 135, 38000, 2),
(75, 85, 126, 22000, 1),
(76, 86, 135, 38000, 2),
(77, 87, 129, 18000, 1),
(78, 88, 127, 25000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `price_sale` float NOT NULL,
  `active` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `import_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `product_name`, `thumbnail`, `description`, `price_sale`, `active`, `view`, `import_date`) VALUES
(36, 11, 'Sữa chua trắng', 'mvc/public/images/products/sua-chua-trang-.png', 'Menu của Metaa Coffee sẽ bắt đầu với 3 thức uống cà phê cơ bản của người Việt Nam là cà phê đen, cà phê sữa và bạc sỉu. Cà phê được chuẩn bị sẵn ở nhà vào sáng sớm, cẩn thận đóng kín bỏ vào bình giữ nhiệt để bảo đảm chất lượng cà phê không thay đổi tro', 0, 1, 0, '2023-12-30 13:43:17'),
(37, 11, 'Sữa chua dâu tằm Hoàng Kim', 'mvc/public/images/products/sua-chua-dau-tam-hoang-kim.png', 'Menu của Meta Coffee sẽ bắt đầu với 3 thức uống cà phê cơ bản của người Việt Nam là cà phê đen, cà phê sữa và bạc sỉu. Cà phê được chuẩn bị sẵn ở nhà vào sáng sớm, cẩn thận đóng kín bỏ vào bình giữ nhiệt để bảo đảm chất lượng cà phê không thay đổi tro', 0, 1, 0, '2023-12-30 13:44:32'),
(38, 4, 'Kem Trân Châu Ngũ Cốc', 'mvc/public/images/products/Kem-Trân-Châu-Ngũ-Cốc.jpg', 'Menu của Meta Coffee sẽ bắt đầu với 3 thức uống cà phê cơ bản của người Việt Nam là cà phê đen, cà phê sữa và bạc sỉu. Cà phê được chuẩn bị sẵn ở nhà vào sáng sớm, cẩn thận đóng kín bỏ vào bình giữ nhiệt để bảo đảm chất lượng cà phê không thay đổi tro', 0, 1, 0, '2023-12-30 13:45:50'),
(39, 4, 'Matcha Kem Phô Mai', 'mvc/public/images/products/matcha-kem-pho-mai_09b3b54997614aea86d2b61bcd7f548c_73a9e7cd539949718b13b06c5db9522f_grande.png', 'Menu của Meta Coffee sẽ bắt đầu với 3 thức uống cà phê cơ bản của người Việt Nam là cà phê đen, cà phê sữa và bạc sỉu. Cà phê được chuẩn bị sẵn ở nhà vào sáng sớm, cẩn thận đóng kín bỏ vào bình giữ nhiệt để bảo đảm chất lượng cà phê không thay đổi vị của ', 0, 1, 0, '2023-12-30 13:47:35'),
(40, 4, 'Trà Xanh Kem Phô Mai', 'mvc/public/images/products/tra_xanh_kem_pho_mai_1ed02f821288425d87dd9fc096c62768_40b394e0280f4d55819de201a4405718_grande.jpg', 'Menu của Meta Coffee sẽ bắt đầu với 3 thức uống cà phê cơ bản của người Việt Nam là cà phê đen, cà phê sữa và bạc sỉu. Cà phê được chuẩn bị sẵn ở nhà vào sáng sớm, cẩn thận đóng kín bỏ vào bình giữ nhiệt để bảo đảm chất lượng cà phê không thay đổi vị của ', 0, 1, 0, '2023-12-30 13:48:29'),
(41, 4, 'Hồng Trà Kem Phô Mai', 'mvc/public/images/products/hong_tra_kem_pho_mai_bea768e4679b4a2bbea0d5730fc75ffa_4dbc2f739c184bbbad3cee27aab5cfcd_grande.jpg', 'Menu của Meta Coffee sẽ bắt đầu với 3 thức uống cà phê cơ bản của người Việt Nam là cà phê đen, cà phê sữa và bạc sỉu. Cà phê được chuẩn bị sẵn ở nhà vào sáng sớm, cẩn thận đóng kín bỏ vào bình giữ nhiệt để bảo đảm chất lượng cà phê không thay đổi vị của ', 0, 1, 0, '2023-12-30 13:49:14'),
(42, 4, 'Dâu tằm kem phô mai', 'mvc/public/images/products/dau_tam_kem_pho_mai_09a4c4b857694d918a86542225fc2867_grande.jpg', 'Menu của Meta Coffee sẽ bắt đầu với 3 thức uống cà phê cơ bản của người Việt Nam là cà phê đen, cà phê sữa và bạc sỉu. Cà phê được chuẩn bị sẵn ở nhà vào sáng sớm, cẩn thận đóng kín bỏ vào bình giữ nhiệt để bảo đảm chất lượng cà phê không thay đổi các hươ', 0, 1, 0, '2023-12-30 13:49:57'),
(43, 2, 'Cafe Sữa Mochi', 'mvc/public/images/products/Cà-Phê-Sữa-Mochi.jpg', 'Menu của Meta Coffee sẽ bắt đầu với 3 thức uống cà phê cơ bản của người Việt Nam là cà phê đen, cà phê sữa và bạc sỉu. Cà phê được chuẩn bị sẵn ở nhà vào sáng sớm, cẩn thận đóng kín bỏ vào bình giữ nhiệt để bảo đảm chất lượng cà phê không thay đổi các hươ', 0, 1, 0, '2023-12-30 13:50:34'),
(44, 2, 'Cafe Sữa Đá', 'mvc/public/images/products/Grass-Jelly-Milk-Coffee.png', 'Menu của Meta Coffee sẽ bắt đầu với 3 thức uống cà phê cơ bản của người Việt Nam là cà phê đen, cà phê sữa và bạc sỉu. Cà phê được chuẩn bị sẵn ở nhà vào sáng sớm, cẩn thận đóng kín bỏ vào bình giữ nhiệt để bảo đảm chất lượng cà phê không thay đổi các hươ', 0, 1, 0, '2023-12-30 13:51:22'),
(45, 2, 'Cafe Pearl ', 'mvc/public/images/products/Royal-Pearl-Milk-Coffee.png', 'Menu của Meta Coffee sẽ bắt đầu với 3 thức uống cà phê cơ bản của người Việt Nam là cà phê đen, cà phê sữa và bạc sỉu. Cà phê được chuẩn bị sẵn ở nhà vào sáng sớm, cẩn thận đóng kín bỏ vào bình giữ nhiệt để bảo đảm chất lượng cà phê không thay đổi các hươ', 0, 1, 0, '2023-12-30 13:52:20'),
(46, 1, 'Trà sữa Original', 'mvc/public/images/products/Original-Milk-Tea.jpg', 'Menu của Meta Coffee sẽ bắt đầu với 3 thức uống cà phê cơ bản của người Việt Nam là cà phê đen, cà phê sữa và bạc sỉu. Cà phê được chuẩn bị sẵn ở nhà vào sáng sớm, cẩn thận đóng kín bỏ vào bình giữ nhiệt để bảo đảm chất lượng cà phê không thay đổi các hươ', 0, 1, 0, '2023-12-30 13:53:39'),
(47, 1, 'Ô Long Thái Cực', 'mvc/public/images/products/ezgif.com-gif-maker-19.jpg', 'Menu của Meta Coffee sẽ bắt đầu với 3 thức uống cà phê cơ bản của người Việt Nam là cà phê đen, cà phê sữa và bạc sỉu. Cà phê được chuẩn bị sẵn ở nhà vào sáng sớm, cẩn thận đóng kín bỏ vào bình giữ nhiệt để bảo đảm chất lượng cà phê không thay đổi các hươ', 0, 1, 0, '2023-12-30 13:54:33'),
(48, 1, 'Trà Xanh', 'mvc/public/images/products/ezgif.com-gif-maker-13.jpg', 'Menu của Meta Coffee sẽ bắt đầu với 3 thức uống cà phê cơ bản của người Việt Nam là cà phê đen, cà phê sữa và bạc sỉu. Cà phê được chuẩn bị sẵn ở nhà vào sáng sớm, cẩn thận đóng kín bỏ vào bình giữ nhiệt để bảo đảm chất lượng cà phê không thay đổi các hươ', 0, 1, 0, '2023-12-30 13:55:08'),
(49, 1, 'Sữa Tươi Trân Châu Đường Đen', 'mvc/public/images/products/ezgif.com-gif-maker-6 (1).jpg', 'Menu của Meta Coffee sẽ bắt đầu với 3 thức uống cà phê cơ bản của người Việt Nam là cà phê đen, cà phê sữa và bạc sỉu. Cà phê được chuẩn bị sẵn ở nhà vào sáng sớm, cẩn thận đóng kín bỏ vào bình giữ nhiệt để bảo đảm chất lượng cà phê không thay đổi các hươ', 0, 1, 0, '2023-12-30 13:56:52'),
(50, 3, 'Hồng Trà Bưởi', 'mvc/public/images/products/ezgif.com-gif-maker-7.jpg', 'Menu của Meta Coffee sẽ bắt đầu với 3 thức uống cà phê cơ bản của người Việt Nam là cà phê đen, cà phê sữa và bạc sỉu. Cà phê được chuẩn bị sẵn ở nhà vào sáng sớm, cẩn thận đóng kín bỏ vào bình giữ nhiệt để bảo đảm chất lượng cà phê không thay đổi các hươ', 0, 1, 0, '2023-12-30 13:58:32'),
(52, 3, 'Trà Dâu Tằm', 'mvc/public/images/products/dâu-tằm-pha-lê-tuyết.jpg', 'Menu của Meta Coffee sẽ bắt đầu với 3 thức uống cà phê cơ bản của người Việt Nam là cà phê đen, cà phê sữa và bạc sỉu. Cà phê được chuẩn bị sẵn ở nhà vào sáng sớm, cẩn thận đóng kín bỏ vào bình giữ nhiệt để bảo đảm chất lượng cà phê không thay đổi các hươ', 0, 1, 0, '2023-12-30 14:00:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Người dùng'),
(2, 'Quản lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `verify` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `role_id`, `name`, `email`, `phone`, `password`, `address`, `verify`) VALUES
(1, 2, 'Đăng Thành', 'admin@gmail.com', '0387578520', '1234567', 'Hai Ba, Hai Lang, Quang Tri', '26333'),
(4, 1, 'Nguyễn Đăng Thành', '1@gmail.com', '15454545', '54545454', '1212121', '1'),
(7, 1, 'Phan Hoài Lăng', 'langphan@gmail.com', '0905752450', '1234567', '', '11381'),
(8, 1, 'Võ Thị Ngọc Hạnh', 'hanhvo@gmail.com', '0777409563', '1234567', '', '33930'),
(10, 1, 'hoàng ny', 'hoangny@gmail.com', '0777409563', '1234567', '', '60369');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `variant`
--

CREATE TABLE `variant` (
  `variant_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `variant`
--

INSERT INTO `variant` (`variant_id`, `product_id`, `size`, `price`) VALUES
(87, 36, 'Nhỏ', 18000),
(88, 36, 'Vừa', 22000),
(89, 36, 'Lớn', 24000),
(90, 37, 'Nhỏ', 14000),
(91, 37, 'Vừa', 17000),
(92, 37, 'Lớn', 22000),
(93, 38, 'Nhỏ', 12000),
(94, 38, 'Vừa', 15000),
(95, 38, 'Lớn', 18000),
(96, 39, 'Nhỏ', 18000),
(97, 39, 'Vừa', 20000),
(98, 39, 'Lớn', 24000),
(99, 40, 'Nhỏ', 14000),
(100, 40, 'Vừa', 19000),
(101, 40, 'Lớn', 22000),
(102, 41, 'Nhỏ', 12000),
(103, 41, 'Vừa', 16000),
(104, 41, 'Lớn', 22000),
(105, 42, 'Nhỏ', 15000),
(106, 42, 'Vừa', 18000),
(107, 42, 'Lớn', 23000),
(108, 43, 'Nhỏ', 12000),
(109, 43, 'Vừa', 14000),
(110, 43, 'Lớn', 21000),
(111, 44, 'Nhỏ', 11000),
(112, 44, 'Vừa', 16000),
(113, 44, 'Lớn', 23000),
(114, 45, 'Nhỏ', 12000),
(115, 45, 'Vừa', 15000),
(116, 45, 'Lớn', 18000),
(117, 46, 'Nhỏ', 18000),
(118, 46, 'Vừa', 22000),
(119, 46, 'Lớn', 26000),
(120, 47, 'Nhỏ', 20000),
(121, 47, 'Vừa', 22000),
(122, 47, 'Lớn', 27000),
(123, 48, 'Nhỏ', 21000),
(124, 48, 'Vừa', 26000),
(125, 48, 'Lớn', 28000),
(126, 49, 'Nhỏ', 22000),
(127, 49, 'Vừa', 25000),
(128, 49, 'Lớn', 28000),
(129, 50, 'Nhỏ', 18000),
(130, 50, 'Vừa', 22000),
(131, 50, 'Lớn', 28000),
(135, 52, 'Nhỏ', 19000),
(136, 52, 'Vừa', 22000),
(137, 52, 'Lớn', 24000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`details_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `variant_id` (`variant_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Chỉ mục cho bảng `variant`
--
ALTER TABLE `variant`
  ADD PRIMARY KEY (`variant_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `variant`
--
ALTER TABLE `variant`
  MODIFY `variant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
