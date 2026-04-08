-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 08, 2026 lúc 04:47 AM
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
-- Cơ sở dữ liệu: `hocphi`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vdh_admins`
--

CREATE TABLE `vdh_admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `avatar` text DEFAULT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `fullname` varchar(50) DEFAULT NULL,
  `birthday` varchar(10) DEFAULT NULL,
  `passport` varchar(20) DEFAULT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `forgot_pass_token` varchar(100) DEFAULT NULL,
  `updated_forgot_token` datetime DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `vdh_admins`
--

INSERT INTO `vdh_admins` (`id`, `email`, `password`, `phone`, `avatar`, `status`, `fullname`, `birthday`, `passport`, `role_id`, `address`, `forgot_pass_token`, `updated_forgot_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'vuduchong209305@gmail.com', '$2y$10$4UdQSmNztB457ugofP3H6.SdzeFwxQ/StlFNutTZ9ZKzD4kNgjOcS', '0986209305', '/assets/uploads/media/images/files/agency/vdh.jpg', 1, 'Vũ Đức Hồng', '06-06-1993', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-17 14:04:38'),
(2, 'ph2h.ge@gmail.com', '$2y$12$jImBKmGSeieYWkkQ7ZmUhuyKWwHuXY4HlVTFTit6wTCnW/u0qpXuS', '0904239996', '/assets/uploads/media/images/files/agency/nguyenphihung.png', 1, 'Nguyễn Phi Hùng', NULL, NULL, 4, NULL, NULL, NULL, NULL, '2026-02-08 04:59:28', '2026-02-08 05:02:02'),
(3, 'quangvinh@globalexpo.com.vn', '$2y$12$EjOXMDEl.y4NVLycNuVQyugEfctis3bX/VF8hNf39ZjQzW6ucbrWm', '0983109909', '/assets/uploads/media/images/files/agency/quangvinh.png', 1, 'Trần Quang Vinh', NULL, NULL, 4, NULL, NULL, NULL, NULL, '2026-02-08 05:04:04', '2026-03-17 14:04:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vdh_course`
--

CREATE TABLE `vdh_course` (
  `id` tinyint(4) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `vdh_course`
--

INSERT INTO `vdh_course` (`id`, `title`, `price`, `sort`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kiểm soát nhiễm khuẩn trong các cơ sở khám bệnh chữa bệnh (CME 48 tiết)', NULL, 14, 1, '2025-07-25 04:39:18', '2026-04-07 08:58:41'),
(2, 'Sư phạm y học cơ bản (CME 80 tiết)', NULL, 2, 1, '2025-07-25 04:41:05', '2026-04-07 08:58:41'),
(3, 'An toàn tiêm chủng (CME 40 tiết)', NULL, 13, 1, '2025-07-25 04:41:16', '2026-04-07 08:58:41'),
(4, 'Quản lý bệnh viện (CME 48 tiết)', NULL, 15, 1, '2025-07-25 04:41:34', '2026-04-07 08:58:41'),
(5, 'Quản lý chất lượng bệnh viện (CME 48 tiết)', NULL, 16, 1, '2025-07-25 04:41:39', '2026-04-07 08:58:41'),
(6, 'Dinh dưỡng tiết chế (CME 48 tiết)', NULL, 17, 1, '2025-07-25 04:43:03', '2026-04-07 08:58:41'),
(7, 'Dinh dưỡng Nhi khoa (CME 48 tiết)', NULL, 18, 1, '2025-07-25 04:48:55', '2026-04-07 08:58:41'),
(8, 'Quản lý chất thải y tế (CME 48 tiết)', NULL, 19, 1, '2026-04-07 08:46:16', '2026-04-07 08:58:41'),
(9, 'Quản lý thiết bị y tế (CME 48 tiết)', NULL, 20, 1, '2026-04-07 08:46:20', '2026-04-07 08:58:41'),
(10, 'Quản lý điều dưỡng (CME 56 tiết)', NULL, 21, 1, '2026-04-07 08:46:23', '2026-04-07 08:58:41'),
(11, 'Công tác xã hội trong bệnh viện (CME 40 tiết)', NULL, 22, 1, '2026-04-07 08:46:28', '2026-04-07 08:58:41'),
(12, 'Phương pháp nghiên cứu khoa học trong y học (CME 45 tiết)', NULL, 23, 1, '2026-04-07 08:46:32', '2026-04-07 08:58:41'),
(13, 'Dinh dưỡng cộng đồng (CME 48 tiết)', NULL, 24, 1, '2026-04-07 08:46:35', '2026-04-07 08:58:41'),
(14, 'An toàn thực phẩm (CME 48 tiết)', NULL, 25, 1, '2026-04-07 08:46:38', '2026-04-07 08:58:41'),
(15, 'Nuôi con bằng sữa mẹ  (CME 24 tiết)', NULL, 26, 1, '2026-04-07 08:46:41', '2026-04-07 08:58:41'),
(16, 'Quản lý chất lượng phòng xét nghiệm (CME 24 tiết)', NULL, 12, 1, '2026-04-07 08:46:44', '2026-04-07 08:58:41'),
(17, 'An toàn sinh học phòng xét nghiệm (CME 24 tiết)', NULL, 4, 1, '2026-04-07 08:46:48', '2026-04-07 08:58:41'),
(18, 'Kỹ năng giao tiếp ứng xử cho cán bộ Y tế (CME 24 tiết)', NULL, 1, 1, '2026-04-07 08:46:51', '2026-04-07 08:58:58'),
(19, 'Quản lý Y tế (CME 24 tiết)', NULL, 5, 1, '2026-04-07 08:46:54', '2026-04-07 08:58:41'),
(20, 'Tư vấn xét nghiệm HIV (CME 24 tiết)', NULL, 6, 1, '2026-04-07 08:46:56', '2026-04-07 08:58:41'),
(21, 'Phòng chống các bệnh lây nhiễm qua đường máu và dịch sinh học (CME 24 tiết)', NULL, 7, 1, '2026-04-07 08:47:00', '2026-04-07 08:58:41'),
(22, 'Quản lý chăm sóc người bệnh toàn diện (CME 24 tiết)', NULL, 8, 1, '2026-04-07 08:47:08', '2026-04-07 08:58:41'),
(23, 'An toàn người bệnh  (CME 24 tiết)', NULL, 9, 1, '2026-04-07 08:47:12', '2026-04-07 08:58:41'),
(24, 'Vệ sinh môi trường bề mặt trong các cơ sở y tế  (CME 08 tiết)', NULL, 10, 1, '2026-04-07 08:47:15', '2026-04-07 08:58:41'),
(25, 'Tư vấn truyền thông giáo dục sức khoẻ cho người bệnh (CME 24 tiết)', NULL, 11, 1, '2026-04-07 08:47:19', '2026-04-07 08:58:41'),
(26, 'Hộ Lý y công  (CME 08 tiết)', NULL, 3, 1, '2026-04-07 08:47:22', '2026-04-07 08:59:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vdh_languages`
--

CREATE TABLE `vdh_languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lang_class` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` tinyint(1) UNSIGNED DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `vdh_languages`
--

INSERT INTO `vdh_languages` (`id`, `name`, `lang_class`, `title`, `description`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'vi', 'vi_vn', 'VIE', 'Tiếng Việt', 1, '/assets/images/flag/vietnam.png', '2020-06-19 16:12:11', '2026-01-04 01:56:03'),
(2, 'en', 'en_es', 'ENG', 'Tiếng Anh', 1, '/assets/images/flag/uk.png', '2020-06-19 16:12:15', '2020-06-19 16:12:17'),
(3, 'cn', 'cn_CN', 'CN', 'Tiếng Trung', 1, '/assets/images/flag/china.png', '2020-07-05 04:42:05', '2026-01-04 01:54:10'),
(4, 'kr', 'kr_KR', 'KR', 'Tiếng Hàn', 1, '/assets/images/flag/korea.png', '2026-02-01 12:00:53', '2026-02-01 12:00:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vdh_orders`
--

CREATE TABLE `vdh_orders` (
  `id` int(11) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `cccd` varchar(20) DEFAULT NULL,
  `birthday` varchar(15) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `cccd_front` varchar(255) DEFAULT NULL,
  `cccd_back` varchar(255) DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `paid_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vdh_orders`
--

INSERT INTO `vdh_orders` (`id`, `code`, `fullname`, `email`, `phone`, `company`, `cccd`, `birthday`, `course_id`, `cccd_front`, `cccd_back`, `degree`, `signature`, `paid_at`, `created_at`, `updated_at`) VALUES
(1, 'BPKFHSYOXL', 'Vũ Đức Hồng', 'vuduchong209305@gmail.com', '0986209305', 'Bệnh viện E', '022093001103', '06-06-1993', 2, 'images/2026/04/07/ElmpzSYD1OGhdqx59iK4.webp', 'images/2026/04/07/2JbDz4ibi2lIBHFHNSEi.webp', 'images/2026/04/07/dxMI3SiojOLuyEF1uY7N.webp', 'images/2026/04/07/TGySFfZOZ4cf8nTcbNha.webp', NULL, '2026-04-07 14:26:50', '2026-04-08 02:34:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vdh_roles`
--

CREATE TABLE `vdh_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `permission` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `vdh_roles`
--

INSERT INTO `vdh_roles` (`id`, `name`, `permission`, `avatar`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', 'home;user;user.create;user.store;user.update;user.delete;user.profile;user.updateProfile;role;role.create;role.store;role.update;role.delete;category_news;category_news.create;category_news.store;category_news.update;category_news.delete;news;news.create;news.store;news.edit;news.update;news.delete;category_product;category_product.create;category_product.store;category_product.edit;category_product.update;category_product.delete;product;product.create;product.store;product.edit;product.update;product.delete;attribute;attribute.create;attribute.store;attribute.edit;attribute.update;attribute.delete;slide;slide.create;slide.store;slide.edit;slide.update;slide.delete;customer;customer.create;customer.store;customer.edit;customer.update;customer.delete', '/admin/uploads/media/images/files/tai%20khoan/1587997921_crown.png', 'Quyền cao nhất', 1, '2020-12-10 02:32:39', '2022-07-05 17:19:19'),
(4, 'Sales', 'dashboard;customer.index;customer.create;customer.store;customer.update;customer.delete;customer.draft;customer.draft;customer.draft.move;customer.draft.delete;customer.exhibitor.index;customer.exhibitor.add;customer.exhibitor.remove;customer.exhibitor.view;customer.exhibitor.store', NULL, 'Nhân viên kinh doanh', 1, '2020-12-28 04:23:51', '2026-03-17 14:11:31'),
(5, 'Kế toán', 'dashboard', NULL, 'Tài chính kế toán', 1, '2026-03-17 14:00:37', '2026-03-17 14:01:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vdh_setting`
--

CREATE TABLE `vdh_setting` (
  `id` int(11) NOT NULL,
  `option_key` varchar(255) DEFAULT NULL,
  `option_value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `vdh_setting`
--

INSERT INTO `vdh_setting` (`id`, `option_key`, `option_value`, `created_at`, `updated_at`) VALUES
(1, 'phone', '0986209305', '2026-02-08 03:22:48', '2026-02-08 03:26:38'),
(2, 'zalo', '0986209305', '2026-02-08 03:22:48', '2026-02-08 03:26:38'),
(3, 'facebook', 'facebook.com/vuduchongdotcom', '2026-02-08 03:22:48', '2026-02-08 03:26:38'),
(4, 'messenger', 'messenger.com/vuduchongdotcom', '2026-02-08 03:22:48', '2026-02-08 03:27:25'),
(5, 'maintenance', NULL, '2026-02-08 03:22:48', '2026-04-08 01:37:38'),
(6, 'seo', '1', '2026-02-08 03:22:48', '2026-02-08 03:26:22'),
(7, 'robot_index', NULL, '2026-02-08 03:28:15', '2026-02-21 02:02:51'),
(8, 'hero_typed', '{\"vi\":\"\\u0110\\u00e0o t\\u1ea1o CME y khoa\\r\\n\\u0110\\u00e0o t\\u1ea1o Online 100%\\r\\nH\\u1ecdc ph\\u00ed ph\\u00f9 h\\u1ee3p\",\"en\":null,\"cn\":null,\"kr\":null}', '2026-03-06 11:20:11', '2026-04-08 01:47:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vdh_users`
--

CREATE TABLE `vdh_users` (
  `id` int(11) NOT NULL,
  `exhibition_id` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `phone_company` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `otp` varchar(20) DEFAULT NULL,
  `updated_otp` timestamp NULL DEFAULT NULL,
  `otp_attempt` tinyint(1) DEFAULT NULL,
  `verified_at` timestamp NULL DEFAULT NULL,
  `position_id` tinyint(4) DEFAULT NULL COMMENT 'chức vụ',
  `avatar` varchar(255) DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL COMMENT 'customer_type',
  `description` text DEFAULT NULL,
  `purpose` text DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `qr_code` longtext DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '0 - khóa, 1 - mở',
  `reference` int(11) DEFAULT NULL COMMENT 'đi cùng người đại diện',
  `agency_id` int(11) DEFAULT NULL,
  `provider` varchar(20) DEFAULT NULL,
  `company_organizer_id` int(11) DEFAULT NULL,
  `provider_id` varchar(100) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `booth` varchar(50) DEFAULT NULL COMMENT 'gian hàng số',
  `contact` varchar(255) DEFAULT NULL,
  `is_send_mail_register` tinyint(1) DEFAULT NULL,
  `count_print` tinyint(4) DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `password_reset_token` varchar(50) DEFAULT NULL,
  `password_reset_token_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `vdh_admins`
--
ALTER TABLE `vdh_admins`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `vdh_course`
--
ALTER TABLE `vdh_course`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `vdh_languages`
--
ALTER TABLE `vdh_languages`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `vdh_orders`
--
ALTER TABLE `vdh_orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Chỉ mục cho bảng `vdh_roles`
--
ALTER TABLE `vdh_roles`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `vdh_setting`
--
ALTER TABLE `vdh_setting`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `option_key` (`option_key`) USING BTREE;

--
-- Chỉ mục cho bảng `vdh_users`
--
ALTER TABLE `vdh_users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `vdh_admins`
--
ALTER TABLE `vdh_admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `vdh_course`
--
ALTER TABLE `vdh_course`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `vdh_languages`
--
ALTER TABLE `vdh_languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `vdh_orders`
--
ALTER TABLE `vdh_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `vdh_roles`
--
ALTER TABLE `vdh_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `vdh_setting`
--
ALTER TABLE `vdh_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `vdh_users`
--
ALTER TABLE `vdh_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
