-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 07, 2024 lúc 11:05 AM
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
-- Cơ sở dữ liệu: `qltv`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `groups`
--

INSERT INTO `groups` (`id`, `name`, `update_at`, `create_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Độc giả', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisach`
--

CREATE TABLE `loaisach` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisach`
--

INSERT INTO `loaisach` (`id`, `name`) VALUES
(1, 'Văn học'),
(2, 'Lịch sử'),
(3, 'Kinh tế'),
(4, 'Toán học'),
(5, 'Tiểu thuyết'),
(6, 'Tiếng anh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, 'admin', 123456);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muon`
--

CREATE TABLE `muon` (
  `id` int(11) NOT NULL,
  `sdt` varchar(11) DEFAULT NULL,
  `id_muon` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `ngaymuon` timestamp NULL DEFAULT NULL,
  `ngaytra` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `muon`
--

INSERT INTO `muon` (`id`, `sdt`, `id_muon`, `id_product`, `ngaymuon`, `ngaytra`) VALUES
(5, '0988663855', 34, 48, '2024-01-07 05:35:56', '2024-01-07 09:19:39'),
(6, '0988663855Z', 34, 43, '2024-01-07 09:20:06', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `tensach` varchar(100) DEFAULT NULL,
  `tacgia` varchar(100) DEFAULT NULL,
  `maloai` int(11) DEFAULT NULL,
  `tinhtrang` tinyint(4) NOT NULL,
  `hinhsach` text DEFAULT NULL,
  `ngaythem` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `tensach`, `tacgia`, `maloai`, `tinhtrang`, `hinhsach`, `ngaythem`) VALUES
(43, 'Hoàng Tử Bé', 'Tác giả A', 5, 1, 'hoangtube13.jpg', '2024-01-07 05:55:32'),
(44, 'Kinh tế học hài hước', 'Tác giả B', 3, 0, 'kinh te hoc hai huoc25.png', '2023-12-27 23:53:45'),
(45, 'Lịch sử thế giới', 'Tác giả C', 2, 0, 'lich su the gioi80.jpg', '2023-12-27 23:54:02'),
(46, 'Marketing quốc tế', 'Tác giả D', 3, 0, 'marketing quoc te21.jpg', '2023-12-27 23:54:23'),
(47, 'Mẹ ơi, con sợ đến trường', 'Tác giả E', 1, 0, 'sach thieu nhi15.jpg', '2023-12-27 23:54:50'),
(48, 'Tắt Đèn', 'Ngô Tất Tố', 1, 0, 'tatden26.jpg', '2023-12-27 23:55:13'),
(49, 'Văn Học Việt Nam', 'Tác Giả AA', 1, 0, 'vanhocvietnam32.jpg', '2023-12-28 11:02:34'),
(58, 'Tắt đèn ABCC', 'Ngô Tất TốC', 2, 1, 'ls352.jpg', '2023-12-28 15:26:35'),
(59, 'Tắt đèn ABC', 'Ngô Tất Tố', 1, 0, 'vh27.jpg', '2024-01-07 06:01:15'),
(60, 'Thầy bói xem voi', 'Tô Hoài', 2, 0, 'sach984.jpg', '2024-01-07 06:02:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `group_id`, `status`, `create_at`, `update_at`) VALUES
(34, 'Nguyễn Thái Điềna ', 'thaidien989@gmail.com', 1, 1, '2023-12-16 06:28:17', '2023-12-16 07:03:44'),
(35, 'Nguyễn Thái Điền b', 'enma@gmail.com', 1, 1, '2023-12-17 10:27:35', '2023-12-18 12:06:41'),
(36, 'Nguyễn Thái Điền c', 'thaidien@gmail.com', 1, 0, '2023-12-17 16:28:45', NULL),
(38, 'Thái Thái a', 'Thai@gmail.com', 2, 0, '2023-12-20 12:19:38', NULL),
(39, 'Thái Thái b', 'Thai1@gmail.com', 1, 0, '2023-12-20 12:50:45', NULL),
(40, 'Điền Điền c', 'dien@gmail.com', 1, 0, '2023-12-20 14:01:46', NULL),
(41, 'Hoàng tử béa', 'Thai2@gmail.com', 1, 0, '2023-12-23 12:32:02', '2023-12-28 08:56:30'),
(42, 'Nguyễn Thái Điền d', 'thaidien9@gmail.com', 2, 0, '2023-12-24 10:32:29', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loaisach`
--
ALTER TABLE `loaisach`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `muon`
--
ALTER TABLE `muon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_muon` (`id_muon`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maloai` (`maloai`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `loaisach`
--
ALTER TABLE `loaisach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `muon`
--
ALTER TABLE `muon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `muon`
--
ALTER TABLE `muon`
  ADD CONSTRAINT `muon_ibfk_1` FOREIGN KEY (`id_muon`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `muon_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`maloai`) REFERENCES `loaisach` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
