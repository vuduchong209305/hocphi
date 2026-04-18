-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 18, 2026 at 02:40 PM
-- Server version: 10.5.29-MariaDB-ubu2004
-- PHP Version: 8.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zz7j_dangkydz7mn`
--

-- --------------------------------------------------------

--
-- Table structure for table `vdh_admins`
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
-- Dumping data for table `vdh_admins`
--

INSERT INTO `vdh_admins` (`id`, `email`, `password`, `phone`, `avatar`, `status`, `fullname`, `birthday`, `passport`, `role_id`, `address`, `forgot_pass_token`, `updated_forgot_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'vuduchong209305@gmail.com', '$2y$12$UEEPNHW884aK0PDrEC92vu/ZqI2JtHh/8MLHt0SHYmmo9WwHZbq1u', '0913206810', NULL, 1, 'Phan Tuấn Khôi', '1993-11-21', NULL, 1, '89 Lạc Long Quân', NULL, NULL, NULL, NULL, '2026-04-13 13:03:08'),
(2, 'ph2h.ge@gmail.com', '$2y$12$jImBKmGSeieYWkkQ7ZmUhuyKWwHuXY4HlVTFTit6wTCnW/u0qpXuS', '0904239996', '/assets/uploads/media/images/files/agency/nguyenphihung.png', 1, 'Nguyễn Phi Hùng', NULL, NULL, 4, NULL, NULL, NULL, NULL, '2026-02-08 04:59:28', '2026-02-08 05:02:02'),
(3, 'quangvinh@globalexpo.com.vn', '$2y$12$EjOXMDEl.y4NVLycNuVQyugEfctis3bX/VF8hNf39ZjQzW6ucbrWm', '0983109909', '/assets/uploads/media/images/files/agency/quangvinh.png', 1, 'Trần Quang Vinh', NULL, NULL, 4, NULL, NULL, NULL, NULL, '2026-02-08 05:04:04', '2026-03-17 14:04:58');

-- --------------------------------------------------------

--
-- Table structure for table `vdh_course`
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
-- Dumping data for table `vdh_course`
--

INSERT INTO `vdh_course` (`id`, `title`, `price`, `sort`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kiểm soát nhiễm khuẩn trong các cơ sở khám bệnh chữa bệnh (CME 48 tiết)', 2200000, 3, 1, '2025-07-25 04:39:18', '2026-04-15 03:38:36'),
(2, 'Sư phạm y học cơ bản (CME 80 tiết)', 2500000, 9, 1, '2025-07-25 04:41:05', '2026-04-14 08:27:14'),
(3, 'An toàn tiêm chủng (CME 40 tiết)', 2200000, 8, 1, '2025-07-25 04:41:16', '2026-04-18 07:03:50'),
(4, 'Quản lý bệnh viện (CME 48 tiết)', 2200000, 1, 1, '2025-07-25 04:41:34', '2026-04-15 03:39:36'),
(5, 'Quản lý chất lượng bệnh viện (CME 48 tiết)', 2200000, 2, 1, '2025-07-25 04:41:39', '2026-04-15 03:39:29'),
(6, 'Dinh dưỡng tiết chế (CME 48 tiết)', 2200000, 12, 1, '2025-07-25 04:43:03', '2026-04-14 04:00:58'),
(7, 'Dinh dưỡng Nhi khoa (CME 48 tiết)', 2200000, 14, 1, '2025-07-25 04:48:55', '2026-04-14 04:01:25'),
(8, 'Quản lý chất thải y tế (CME 48 tiết)', 2200000, 4, 1, '2026-04-07 08:46:16', '2026-04-14 03:56:53'),
(9, 'Quản lý thiết bị y tế (CME 48 tiết)', 2200000, 5, 1, '2026-04-07 08:46:20', '2026-04-14 03:57:32'),
(10, 'Quản lý điều dưỡng (CME 56 tiết)', 2400000, 6, 1, '2026-04-07 08:46:23', '2026-04-18 07:03:22'),
(11, 'Công tác xã hội trong bệnh viện (CME 40 tiết)', 2200000, 7, 1, '2026-04-07 08:46:28', '2026-04-14 03:59:03'),
(12, 'Phương pháp nghiên cứu khoa học trong y học (CME 45 tiết)', 2200000, 10, 1, '2026-04-07 08:46:32', '2026-04-18 07:03:33'),
(13, 'Dinh dưỡng cộng đồng (CME 48 tiết)', 2200000, 11, 1, '2026-04-07 08:46:35', '2026-04-14 03:54:21'),
(14, 'An toàn thực phẩm (CME 48 tiết)', 2200000, 13, 1, '2026-04-07 08:46:38', '2026-04-14 03:54:21'),
(15, 'Nuôi con bằng sữa mẹ  (CME 24 tiết)', 1500000, 20, 1, '2026-04-07 08:46:41', '2026-04-14 04:05:56'),
(16, 'Quản lý chất lượng phòng xét nghiệm (CME 24 tiết)', 1500000, 17, 1, '2026-04-07 08:46:44', '2026-04-14 04:03:21'),
(17, 'An toàn sinh học phòng xét nghiệm cấp I, II (CME 24 tiết)', 1500000, 18, 1, '2026-04-07 08:46:48', '2026-04-14 04:05:14'),
(18, 'Kỹ năng giao tiếp ứng xử cho cán bộ Y tế (CME 24 tiết)', 1500000, 15, 1, '2026-04-07 08:46:51', '2026-04-14 04:02:12'),
(19, 'Quản lý Y tế (CME 24 tiết)', 1500000, 16, 1, '2026-04-07 08:46:54', '2026-04-14 04:02:32'),
(20, 'Tư vấn xét nghiệm HIV (CME 24 tiết)', 1500000, 25, 1, '2026-04-07 08:46:56', '2026-04-15 04:18:46'),
(21, 'Phòng chống các bệnh lây nhiễm qua đường máu và dịch sinh học (CME 24 tiết)', 1500000, 26, 1, '2026-04-07 08:47:00', '2026-04-14 04:10:10'),
(22, 'Quản lý chăm sóc người bệnh toàn diện (CME 24 tiết)', 1500000, 24, 1, '2026-04-07 08:47:08', '2026-04-14 04:07:49'),
(23, 'An toàn người bệnh  (CME 24 tiết)', 1500000, 22, 1, '2026-04-07 08:47:12', '2026-04-14 04:06:24'),
(24, 'Vệ sinh môi trường bề mặt trong các cơ sở y tế  (CME 08 tiết)', 800000, 21, 1, '2026-04-07 08:47:15', '2026-04-14 03:54:21'),
(25, 'Tư vấn truyền thông giáo dục sức khoẻ cho người bệnh (CME 24 tiết)', 1500000, 23, 1, '2026-04-07 08:47:19', '2026-04-15 04:19:14'),
(26, 'Hộ Lý y công  (CME 08 tiết)', 800000, 19, 1, '2026-04-07 08:47:22', '2026-04-14 03:54:21');

-- --------------------------------------------------------

--
-- Table structure for table `vdh_education`
--

CREATE TABLE `vdh_education` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vdh_education`
--

INSERT INTO `vdh_education` (`id`, `title`) VALUES
(1, 'THPT'),
(2, 'Trung cấp'),
(3, 'Cao đẳng'),
(4, 'Đại học'),
(5, 'Sau đại học');

-- --------------------------------------------------------

--
-- Table structure for table `vdh_failed_jobs`
--

CREATE TABLE `vdh_failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `vdh_jobs`
--

CREATE TABLE `vdh_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `vdh_languages`
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
-- Dumping data for table `vdh_languages`
--

INSERT INTO `vdh_languages` (`id`, `name`, `lang_class`, `title`, `description`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'vi', 'vi_vn', 'VIE', 'Tiếng Việt', 1, '/assets/images/flag/vietnam.png', '2020-06-19 16:12:11', '2026-01-04 01:56:03'),
(2, 'en', 'en_es', 'ENG', 'Tiếng Anh', 1, '/assets/images/flag/uk.png', '2020-06-19 16:12:15', '2020-06-19 16:12:17'),
(3, 'cn', 'cn_CN', 'CN', 'Tiếng Trung', 1, '/assets/images/flag/china.png', '2020-07-05 04:42:05', '2026-01-04 01:54:10'),
(4, 'kr', 'kr_KR', 'KR', 'Tiếng Hàn', 1, '/assets/images/flag/korea.png', '2026-02-01 12:00:53', '2026-02-01 12:00:54');

-- --------------------------------------------------------

--
-- Table structure for table `vdh_mail`
--

CREATE TABLE `vdh_mail` (
  `id` tinyint(4) NOT NULL,
  `title` varchar(50) NOT NULL,
  `key` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `vdh_mail`
--

INSERT INTO `vdh_mail` (`id`, `title`, `key`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Đăng ký khóa học', 'register_course', 1, '2026-04-10 08:55:46', '2026-04-10 09:24:01');

-- --------------------------------------------------------

--
-- Table structure for table `vdh_mail_detail`
--

CREATE TABLE `vdh_mail_detail` (
  `mail_id` tinyint(4) NOT NULL,
  `lang_id` tinyint(1) NOT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `vdh_mail_detail`
--

INSERT INTO `vdh_mail_detail` (`mail_id`, `lang_id`, `subject`, `body`, `created_at`, `updated_at`) VALUES
(1, 1, 'Đăng ký khóa học thành công', '<h2 style=\"text-align:center; font-size:24px; font-weight:600; margin-bottom:20px; margin-top:0; color:#009689;\">\r\n    Đăng ký khóa học thành công!\r\n</h2>\r\n\r\n<p style=\"margin-top:0; margin-bottom:10px;\">\r\n    Xin chào <strong>{{ $fullname }}</strong>,\r\n</p>\r\n\r\n<p style=\"margin-top:0; margin-bottom:10px;\">\r\n    Cảm ơn bạn đã đăng ký khóa học tại hệ thống của chúng tôi. Thông tin đăng ký của bạn đã được ghi nhận thành công.\r\n</p>\r\n\r\n<p style=\"margin-top:0; margin-bottom:10px;\">\r\n    Thông tin khóa học:\r\n</p>\r\n\r\n<p style=\"font-size:18px; font-weight:bold; color:#009689; margin: 20px 0; text-align: center;\">\r\n    <span style=\"border:1px dashed #009689; padding:10px 20px; border-radius:4px; display:inline-block;\">\r\n        {{ $course_name }} <br/>\r\n        <span style=\"color:#db398a\">Khai giảng: {{ $start_date }}</span>\r\n    </span>\r\n</p>\r\n\r\n<!-- CTA BUTTON -->\r\n\r\n<div style=\"text-align:center; margin: 20px 0;\">\r\n    <a href=\"{{ url(\'/thanh-toan\') }}\" \r\n       style=\"background: linear-gradient(135deg, #4f46e5, #9333ea); color:#fff; padding:12px 24px; border-radius:6px; text-decoration:none; font-weight:600; display:inline-block;\">\r\n        Thanh toán khóa học\r\n    </a>\r\n</div>\r\n\r\n<h3 style=\"font-size:18px; font-weight:600; margin-bottom:10px; color:#009689;\">Thông tin học viên:</h3>\r\n\r\n<table width=\"100%\" cellpadding=\"8\" cellspacing=\"0\" style=\"border-collapse:collapse; margin-bottom: 20px;\">\r\n    <tbody>\r\n        <tr><td style=\"border:1px solid #ccc;\">Họ tên</td><td style=\"border:1px solid #ccc;\">{{ $fullname }}</td></tr>\r\n        <tr><td style=\"border:1px solid #ccc;\">Số điện thoại</td><td style=\"border:1px solid #ccc;\">{{ $phone }}</td></tr>\r\n        <tr><td style=\"border:1px solid #ccc;\">Email</td><td style=\"border:1px solid #ccc;\">{{ $email }}</td></tr>\r\n        <tr><td style=\"border:1px solid #ccc;\">Giới tính</td><td style=\"border:1px solid #ccc;\">{{ $gender }}</td></tr>\r\n        <tr><td style=\"border:1px solid #ccc;\">Đơn vị công tác</td><td style=\"border:1px solid #ccc;\">{{ $company }}</td></tr>\r\n        <tr><td style=\"border:1px solid #ccc;\">Căn cước công dân</td><td style=\"border:1px solid #ccc;\">{{ $cccd }}</td></tr>\r\n        <tr><td style=\"border:1px solid #ccc;\">Ngày sinh</td><td style=\"border:1px solid #ccc;\">{{ $birthday }}</td></tr>\r\n        <tr><td style=\"border:1px solid #ccc;\">Nơi sinh</td><td style=\"border:1px solid #ccc;\">{{ $birth_place }}</td></tr>\r\n        <tr><td style=\"border:1px solid #ccc;\">Địa chỉ trên CCCD</td><td style=\"border:1px solid #ccc;\">{{ $address}}</td></tr>\r\n        <tr><td style=\"border:1px solid #ccc;\">Địa chỉ nhận CME</td><td style=\"border:1px solid #ccc;\">{{ $address_cme}}</td></tr>\r\n    </tbody>\r\n</table>\r\n\r\n<h3 style=\"font-size:18px; font-weight:600; margin-bottom:10px; color:#009689;\">Thông tin hóa đơn (VAT):</h3>\r\n\r\n<table width=\"100%\" cellpadding=\"8\" cellspacing=\"0\" style=\"border-collapse:collapse; margin-bottom: 20px;\">\r\n    <tbody>\r\n        <tr><td style=\"border:1px solid #ccc;\">Xuất hóa đơn</td><td style=\"border:1px solid #ccc;\">{{ $is_vat ? \'Có\' : \'Không\' }}</td></tr>\r\n        <tr><td style=\"border:1px solid #ccc;\">Mã số thuế</td><td style=\"border:1px solid #ccc;\">{{ $mst ?? null }}</td></tr>\r\n        <tr><td style=\"border:1px solid #ccc;\">Tên đơn vị</td><td style=\"border:1px solid #ccc;\">{{ $mst_name ?? null }}</td></tr>\r\n        <tr><td style=\"border:1px solid #ccc;\">Địa chỉ đơn vị</td><td style=\"border:1px solid #ccc;\">{{ $mst_address ?? null }}</td></tr>\r\n    </tbody>\r\n</table>\r\n\r\n<p style=\"margin-top:0; margin-bottom:10px;\">\r\n    Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất để xác nhận và hướng dẫn các bước tiếp theo.\r\n</p>\r\n\r\n<p style=\"margin-top:20px; margin-bottom:0; font-size:14px; color:#555;\">\r\n    Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ với bộ phận hỗ trợ.\r\n</p>', '2026-04-10 08:55:46', '2026-04-10 09:24:01'),
(1, 2, 'Đăng ký khóa học thành công', NULL, '2026-04-10 08:55:46', '2026-04-10 09:24:01'),
(1, 3, 'Đăng ký khóa học thành công', NULL, '2026-04-10 08:55:46', '2026-04-10 09:24:01'),
(1, 4, 'Đăng ký khóa học thành công', NULL, '2026-04-10 08:55:46', '2026-04-10 09:24:01');

-- --------------------------------------------------------

--
-- Table structure for table `vdh_opening`
--

CREATE TABLE `vdh_opening` (
  `course_id` int(11) NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `start_date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vdh_opening`
--

INSERT INTO `vdh_opening` (`course_id`, `code`, `start_date`, `created_at`, `updated_at`) VALUES
(1, 'KSNK656', '06-05-2026', NULL, NULL),
(2, 'SPYH656', '06-05-2026', NULL, NULL),
(2, 'SPYH2046', '20-04-2026', NULL, NULL),
(3, 'ATTC2256', '22-05-2026', NULL, NULL),
(4, 'QLBV856', '08-05-2026', NULL, NULL),
(5, 'QLCLBV856', '08-05-2026', NULL, NULL),
(6, 'DDTC1156', '11-05-2026', NULL, NULL),
(7, 'DDNK1156', '11-05-2026', NULL, NULL),
(8, 'QLCT2256', '22-05-2026', NULL, NULL),
(9, 'QLTBYT2356', '23-05-2026', NULL, NULL),
(10, 'QLDD756', '07-05-2026', NULL, NULL),
(11, 'CTXH2156', '21-05-2026', NULL, NULL),
(12, 'PPNCKH2156', '21-05-2026', NULL, NULL),
(15, 'NCBSM1556', '15-05-2026', NULL, NULL),
(16, 'QLCLPXN1856', '18-05-2026', NULL, NULL),
(17, 'ATSH1356', '13-05-2026', NULL, NULL),
(18, 'KNGT856', '08-05-2026', NULL, NULL),
(18, 'KNGT1856', '18-05-2026', NULL, NULL),
(19, 'QLYT2056', '20-05-2026', NULL, NULL),
(20, 'HIV1556', '15-05-2026', NULL, NULL),
(20, 'HIV2046', '20-04-2026', NULL, NULL),
(21, 'PCLN2556', '25-05-2026', NULL, NULL),
(22, 'CSNB2356', '23-05-2026', NULL, NULL),
(23, 'ATNB1256', '12-05-2026', NULL, NULL),
(25, 'TTGDSK2046', '20-04-2026', NULL, NULL),
(25, 'TTGDSK2256', '22-05-2026', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vdh_orders`
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
  `birthplace` varchar(255) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `cccd_front` varchar(255) DEFAULT NULL,
  `cccd_back` varchar(255) DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL COMMENT '1 - nam, 2 - nữ',
  `price` decimal(15,0) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `address_cme` varchar(255) DEFAULT NULL,
  `education` tinyint(4) DEFAULT NULL,
  `paid_at` timestamp NULL DEFAULT NULL,
  `graduate_year` varchar(4) DEFAULT NULL,
  `graduate_address` varchar(255) DEFAULT NULL,
  `class_code` varchar(15) DEFAULT NULL,
  `start_date` varchar(15) DEFAULT NULL,
  `is_vat` tinyint(1) DEFAULT NULL,
  `mst` varchar(20) DEFAULT NULL,
  `mst_name` varchar(255) DEFAULT NULL,
  `mst_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vdh_orders`
--

INSERT INTO `vdh_orders` (`id`, `code`, `fullname`, `email`, `phone`, `company`, `cccd`, `birthday`, `birthplace`, `course_id`, `cccd_front`, `cccd_back`, `degree`, `signature`, `gender`, `price`, `address`, `address_cme`, `education`, `paid_at`, `graduate_year`, `graduate_address`, `class_code`, `start_date`, `is_vat`, `mst`, `mst_name`, `mst_address`, `created_at`, `updated_at`) VALUES
(6, 'KHRZ6QU9MC', 'Nguyễn Thị Hảo Như', 'nguyenhaonhu51@gmail.com', '0962873752', 'Đang nghỉ việc', '033194004248', '05-12-1994', 'Đống Long- Hiệp Cường- Hưng Yên', 1, 'images/2026/04/14/CGwc73mPB1Bi7SzBKHDs.webp', 'images/2026/04/14/h7sYsv1yIAbygzii7QKZ.webp', 'images/2026/04/14/6RLTEdQqoNTVW2kpiCaY.webp', 'images/2026/04/14/g6R1UzIwoI4V59nuR3Hw.webp', 2, 2200000, 'Đức Ninh- Đức Hợp- Hưng Yên', 'Nha khoa Như Quỳnh- Đối diện cây xăng Tiên Cầu- Hiệp Cường- Kim Động- Hưng Yên', 4, '2026-04-14 08:10:02', '2018', 'Đại học Y dược Hải Phòng', 'KSNK1446', '14-04-2026', NULL, NULL, NULL, NULL, '2026-04-14 08:02:19', '2026-04-14 08:10:02'),
(7, 'Y83GP4VDC6', 'Lý Văn Hiến', 'lyhienhgpkdm@gmail.com', '0867055689', 'Bệnh viện Đức Minh', '002088005520', '04-10-1988', 'Thôn nà ngoan- Xã phú linh- Tỉnh Tuyên Quang', 1, 'images/2026/04/14/0f60TaCehq8uPlwF5oqZ.webp', 'images/2026/04/14/vCrEizIbBOG88SgsI7YM.webp', 'images/2026/04/14/hpZCNtYPCF2PsGe0by8X.webp', 'images/2026/04/14/F18MZLo5DX0BAzgsV1rz.webp', 1, 2200000, 'Thôn mà ngoan- xã Phú linh - Tỉnh Tuyên Quang', 'Thôn Nà Ngoan- xã Phú linh- Tỉnh Tuyên Quang', 4, '2026-04-15 07:35:53', '2023', 'Hải Dương', 'KSNK1446', '14-04-2026', NULL, NULL, NULL, NULL, '2026-04-14 10:02:59', '2026-04-15 07:35:53'),
(8, 'RLJT3BH0A5', 'Lê Thị Mỹ Hạnh', 'leehanh94@gmail.com', '0913594894', 'MISU BABY SHOP', '052194010022', '10-02-1994', 'Bình Định', 7, 'images/2026/04/14/CPquBK5aEPubGVeWAHxr.webp', 'images/2026/04/14/p7jzTIlUIa7SJGqOo3Ks.webp', 'images/2026/04/14/YpMMSCMErzrsVqVIGodB.webp', 'images/2026/04/14/9huBogCn5BqxPyWdgnM1.webp', 2, 2200000, 'Tổ 2A Khu Phố 58 Phường Quy Nhơn Tỉnh Gia Lai', 'Lô 01 Trần Văn Dũng, Phường Đống Đa, Tp Quy Nhơn, Tỉnh Bình Định', 4, NULL, '2016', 'Trường Đại Học Công Nghiệp Thực Phẩm TPHCM', 'DDNK1156', '11-05-2026', 1, '052194010022', 'HỘ KINH DOANH MISU BABY', 'Lô 01 Trần Văn Dũng, Phường Quy Nhơn, Tỉnh Gia Lai', '2026-04-14 13:56:56', '2026-04-14 13:56:56'),
(9, 'E2ZUIPALDK', 'Phạm Thị Trúc Linh', 'truclinh.pham2294@gmail.com', '0363894910', 'Chưa có', '087194001493', '02-02-1994', 'Đồng Tháp', 17, 'images/2026/04/14/nYcjZLOhmlDehAO6fIqK.webp', 'images/2026/04/14/D53aOy48rLyjxuD8KHax.webp', 'images/2026/04/14/lQG6h1WBLklXFh6Ux7ZV.webp', 'images/2026/04/14/l8xYNF3xIOo0UDsgMSxy.webp', 2, 1500000, 'Ấp Hưng Lợi, xã Thanh Mỹ, tỉnh Đồng Tháp', 'Ấp Hưng Lợi, xã Thanh Mỹ,  huyện Tháp Mười, tỉnh Đồng Tháp', 4, NULL, '2021', 'Trường Đại học Cửu Long', 'ATSH1356', '13-05-2026', NULL, NULL, NULL, NULL, '2026-04-14 15:06:18', '2026-04-14 15:06:18'),
(10, 'HUR5OW6MEV', 'Bùi Trương Kim Duyên', 'duyenkimbuitruong99@gmail.com', '0789978621', 'Không', '074199000913', '17-11-1999', 'Tp.HCM', 16, 'images/2026/04/14/yQMRGzEB1T4jEjyj57nx.webp', 'images/2026/04/14/Zqsu401EYvy7L6srFCc2.webp', 'images/2026/04/14/LyiTu4cLnzt9z6LzIhLn.webp', 'images/2026/04/14/KKr9sjVy9aLss2wbmE7n.webp', 2, 1500000, '27/31, Bình Minh 2, p.Dĩ An, Tp.HCM', '244,Nguyễn An Ninh, kp.Bình Minh 2, p.Dĩ An, Tp.HCM', 4, NULL, '2024', 'Đại học Quốc tế Hồng Bàng', 'QLCLPXN1856', '18-05-2026', NULL, NULL, NULL, NULL, '2026-04-14 15:09:03', '2026-04-14 15:09:03'),
(11, '9QOCD1U76Z', 'Nguyễn Thanh Phong', 'thanhphong270395@gmail.com', '0902736823', 'không', '070095003293', '27-03-1995', 'Đồng Nai', 4, 'images/2026/04/14/SftYCfNjbwu9vTe4A5Nl.webp', 'images/2026/04/14/OB3S1Ainz4Ut1gCzXxFW.webp', 'images/2026/04/14/RlgMTkXqYUlpKCZquW1X.webp', 'images/2026/04/14/BTByLdxb0yHmxDxsnLuP.webp', 1, 2100000, 'khu phố Bình Giang 1 , phường Phước Long, tỉnh Bình Phước', 'B17/14 chung cư Mỹ Phúc, đường 192 phường Phú Định, TP Hồ Chí Minh', 4, NULL, '2017', 'Đại Học Y Dược Thành Phố Hồ Chí Minh', 'QLBV1546', '15-04-2026', NULL, NULL, NULL, NULL, '2026-04-14 15:53:15', '2026-04-15 03:17:03'),
(12, 'XMUSDZJOF1', 'Nguyễn Thị Ngọc Trinh', 'trannguyenaihao@gmail.com', '0934055919', 'Phòng khám đa khoa Nhơn Tâm', '079189010281', '01-12-1989', 'TP HCM', 10, 'images/2026/04/15/M2sB4V5W49ttnzjlH045.webp', 'images/2026/04/15/GUX8JymWc1u3gxmK9zmr.webp', 'images/2026/04/15/bfory7zJNEWuTJodhqQp.webp', 'images/2026/04/15/W5cpVR8kWmUwktP6K00Z.webp', 2, 2400000, 'Số nhà 897 Nguyễn Bình, ấp 6, Xã Hiệp Phước, TP. HCM', '4/9A, ấp 2, xã Nhơn Đức, huyện Nhà Bè, TP. HCM', 4, '2026-04-15 03:32:53', '2023', 'Trường Đại Học Trà Vinh', 'QLDD756', '07-05-2026', NULL, NULL, NULL, NULL, '2026-04-15 01:42:36', '2026-04-15 03:32:53'),
(13, 'EU2A9LIJD5', 'Nguyễn Thị Phương Quỳnh', 'phuongquynh92698@gmail.com', '0935461853', 'Bệnh viện đa khoa Tâm Anh TP.HCM', '046198012058', '16-02-1998', 'Huế', 17, 'images/2026/04/15/LRr0aCF5MB73BTVJOGsX.webp', 'images/2026/04/15/oMWGTD2Qxv5o2qusUJzY.webp', 'images/2026/04/15/VpJcn9XtDYp4kYGZbre0.webp', 'images/2026/04/15/mSi2CxAsPGLATiUCSfgf.webp', 2, 1500000, '110/14/06 đường Kim Long, phường Kim Long, quận Phú Xuân, thành phố Huế', '2B đường Phổ Quang, phường Tân Sơn Hòa, thành phố Hồ Chí Minh', 3, NULL, '2019', 'Trường Cao đẳng y tế Huế', 'ATSH1356', '13-05-2026', 1, '0303920493', 'Bệnh viện đa khoa Tâm Anh TP.HCM', '2B đường Phổ Quang, Phường Tân Sơn Hòa, TP Hồ Chí Minh, Việt Nam', '2026-04-15 03:13:16', '2026-04-15 03:13:16'),
(14, '7CM3NQLI4B', 'Trần Thị Tuyết Nhung', 'trannhungtmh90@gmail.com', '0978898399', 'Khoa Tai Mũi Họng, Bệnh viện Đa khoa tỉnh Phú Thọ', '025190017300', '25-51-990', 'Xã Sơn Lương, Tỉnh Phú Thọ', 10, 'images/2026/04/15/AiGJgkQKISsW4N5GOA4z.webp', 'images/2026/04/15/YD1KEAZIk1vO3FwzYQdP.webp', 'images/2026/04/15/kC4lESy0u2tZJO5i2NE9.webp', 'images/2026/04/15/4Cbkd8sL5q1SAMiINNDh.webp', 2, 2400000, 'Xã Sơn Lương, Tỉnh Phú Thọ', 'Trần Thị Tuyết Nhung, Ngõ 148, Phố Cao Sơn, Phường Minh Phương, Tỉnh Phú Thọ', 5, NULL, '2020', 'Đại học Y tế công cộng', 'QLDD756', '07-05-2026', 1, '2600983563', 'Công ty cổ phần tập đoàn An ninh Việt Nam', 'Khu Vân Cơ, Phường Nông Trang, Phú Thọ', '2026-04-15 03:53:20', '2026-04-15 03:53:20'),
(15, 'Z60834U9HB', 'Nguyễn Thị Ngọc Tuyết', 'tuyetnguyen.tn439@gmail.com', '0772908978', 'Bệnh Viện Xuyên Á', '079196002804', '21-03-1996', 'Thành Phố Hồ Chí Minh', 3, 'images/2026/04/15/l3nZlhVRXYp9FoDnTw3I.webp', 'images/2026/04/15/nRMUwbaKGo8ObCljf2N9.webp', 'images/2026/04/15/ZSOA71BiMaqEoag4cqlQ.webp', 'images/2026/04/15/NavMD7QzIQCdlnt2r4Qt.webp', 2, 2200000, '4/21/1 khu phố 30 Phường Đông Hưng Thuận Thành Phố Hồ Chí Minh', 'Số 42 ql 22 Ấp Chợ Xã Tân Phú Trung huyện Củ Chi Thành Phố Hồ Chí Minh', 4, NULL, '2019', 'Trường Đạ Học Nguyễn Tất Thành Quận 4 Thành Phố Hồ Chí Minh', 'ATTC1746', '17-04-2026', NULL, NULL, NULL, NULL, '2026-04-15 05:05:42', '2026-04-15 05:05:42'),
(16, 'T9CDYJ4VM3', 'Vũ Thị Huyền', 'huyenphongtx@gmail.com', '0972731733', 'Trạm Y tế xã Tràng Xá', '019190002696', '02-05-1990', 'Tràng Xá, Võ Nhai, Thái Nguyên', 10, 'images/2026/04/15/efLySLeLnHiL6A36pUCi.webp', 'images/2026/04/15/CyoyAsmKxFui7wMlqwj3.webp', 'images/2026/04/15/YJiaPRjaAo2RtLstPrJq.webp', 'images/2026/04/15/dRCQVsiel2IqIeqxVrpd.webp', 2, 2400000, 'Cầu Nhọ, Tràng Xá, Thái Nguyên', 'Cầu Nhọ, Tràng Xá, Võ Nhai, Thái Nguyên', 3, NULL, '2018', 'Trường Cao đẳng Y tế Thái Nguyên', 'QLDD1746', '17-04-2026', NULL, NULL, NULL, NULL, '2026-04-15 09:12:01', '2026-04-15 09:12:01'),
(17, 'Z6HYE5L1CM', 'Hoàng Hải Lâm', 'hphaian@gmail.com', '0945249115', 'Bệnh viện Hoàn Mỹ Cửu Long', '044084007002', '28-05-1984', 'Quảng Trị (Quảng Bình cũ)', 12, 'images/2026/04/15/pTMZ6xWmIVQCB5AYwAyn.webp', 'images/2026/04/15/Lou8QNrV258qXUmvBFGk.webp', 'images/2026/04/15/jjvqwUT5KNwY96lcXqQV.webp', 'images/2026/04/15/ETmNNK8qKWAa2dpMcvR1.webp', 1, 2200000, 'C3-39, KV Thạnh Thới, Phường Hưng Phú, Thành phố Cần Thơ', 'C3-39, Đường số 21, KDC 586, KV Thạnh Thới, Phường Hưng Phú, Thành phố Cần Thơ', 4, NULL, '2020', 'Đại học Tây Đô', 'PPNCKH1646', '16-04-2026', NULL, NULL, NULL, NULL, '2026-04-15 12:19:00', '2026-04-15 13:42:36'),
(18, '2QZL4B05JN', 'Nguyễn Văn Nhuệ', 'tamanviet05@gmail.com', '0888255619', 'Phòng khám đa khoa Tâm An Bình Lục thuộc Cty TNHH Dịch Vụ Y Tế Tâm An Việt', '035202003668', '22-06-2002', 'Ninh Bình', 3, 'images/2026/04/15/GtoYZLz0UIWnEEpkGDj3.webp', 'images/2026/04/15/gfi9mPbVb1etpdXEi8jY.webp', 'images/2026/04/15/rDn5oeahrmx6gPSOfYpN.webp', 'images/2026/04/15/unO8DjUoV1Yqvs8rTH3Z.webp', 1, 2200000, 'Xã Thanh Bình, tỉnh Ninh Bình', 'Liêm Trúc, Thanh Liêm , Hà Nam', 2, NULL, '2023', 'Trường Cao Đẳng Y Khoa Hà Nội', 'ATTC1746', '17-04-2026', 1, '0700848109', 'Công Ty TNHH Dịch Vụ Y Tế Tâm An Việt', 'Số 83, đường Trần Tử Bình, xã Bình Mỹ, tỉnh Ninh Bình', '2026-04-15 12:46:01', '2026-04-15 12:46:01'),
(19, '51J3T9OSXK', 'Nguyễn Duy Long', 'danglong31122016@gmail.com', '0356242645', 'Phòng khám đa khoa Tâm An Lý Nhân. khu đô thị Hà Phương, thôn 1 Mai Xá, xã Vĩnh Trụ, tỉnh Ninh Bình', '035091000889', '13-07-1991', 'Phường Phú Lý , tỉnh Ninh Bình', 3, 'images/2026/04/15/BgqRnYSXC4UOyJvjFQ12.webp', 'images/2026/04/15/BVP0XTc2YLAUX1aIMLtT.webp', 'images/2026/04/15/vkikaniTPHrrf6JpU1zr.webp', 'images/2026/04/15/f1Qc8XGX1jO67oICWCKh.webp', 1, 2200000, 'Phường Phú Lý, Tỉnh Ninh Bình', 'Thanh Châu Phú Lý - tỉnh Hà Nam', 2, NULL, '2013', 'Trường trung cấp y tế Hà Nam', 'ATTC1746', '17-04-2026', 1, '0700859100', 'Công ty TNHH Dịch Vụ Y Tế Tâm An Lý Nhân', 'KĐT Hà Phương- thôn 1 Mai Xá - xã Vĩnh Trụ - tỉnh Ninh Bình', '2026-04-15 12:56:55', '2026-04-15 12:56:55'),
(20, 'WVS2L9PQMD', 'Nguyễn Thị Thao', 'nthao9375@gmail.com', '0397005630', 'Bệnh viện quân y 4- CKT HC quân đoàn 34', '001197038498', '14-09-1997', 'Hà Nội', 2, 'images/2026/04/16/PWkhd7I6EnzFTV7Emrnu.webp', 'images/2026/04/16/FJ26keUy5c4Zx7GuT2kX.webp', 'images/2026/04/16/TGBqrRoW4NkQpRgMgZsh.webp', 'images/2026/04/16/LiiVz4vPqvB4QxpaAtoO.webp', 2, 2500000, 'Số nhà 925/52/4 khu phố Tân Long phường Dĩ An tp Hồ Chí Minh', 'Số nhà 925/52/4 khu phố Tân Long phường Tân Đông Hiệp tp Dĩ An Bình Dương', 4, NULL, '2023', 'Đại học Trà Vinh', 'SPYH2046', '20-04-2026', NULL, NULL, NULL, NULL, '2026-04-16 00:12:52', '2026-04-16 00:12:52'),
(21, 'Q7YL8INCEO', 'Lê Thị Thuý Nga', 'lethuynga04021992@gmail.com', '0975486468', 'Trạm y tế phường Lưu Kiếm', '031192004660', '04-02-1992', 'Lưu Kiếm-Hải Phòng', 7, 'images/2026/04/16/UPMAPKDJ1nyEBqItyt8A.webp', 'images/2026/04/16/FLkmCYGRwR4BKsOMOiB1.webp', 'images/2026/04/16/li1xvSfaaX7gkcZAp18p.webp', 'images/2026/04/16/xIQcF5586OmVUvoVHgNT.webp', 2, 2200000, 'Tdp Dưới - phường Lưu Kiếm- Hải Phòng', 'trạm y tế phường Lưu Kiếm - Hải Phòng', 3, NULL, '2014', 'Trường Cao Đẳng y tế Hải Phòng', 'DDNK1156', '11-05-2026', 1, '0202331420', 'Trạm Y Tế Phường Lưu Kiếm', 'Tdp Chợ Tổng - Phường Lưu Kiếm - Hải Phòng', '2026-04-16 00:22:08', '2026-04-16 00:22:08'),
(22, '60GDMSKQH8', 'Nguyễn Hoàng Thanh Nhàn', 'nhannguyen1297@gmail.com', '0819970907', 'Đồng Nai', '075197003202', '12-12-1997', 'Đồng Nai', 16, 'images/2026/04/16/i1qCsua8HrNarDckXmtc.webp', 'images/2026/04/16/2sRIvWNbMzUswgCiqrdS.webp', 'images/2026/04/16/DIvwDVE6RJzJC4Zn1IuW.webp', 'images/2026/04/16/jOO92257nmmbhWAbPipm.webp', 2, 1500000, 'Ấp Suối Cát 1, xã Xuân Lộc, tỉnh Đồng Nai', 'Ấp suối cát 1, xã suối cát, huyện Xuân lộc, tỉnh đồng nai', 4, NULL, '2023', 'Đại học Nguyễn Tất Thành', 'QLCLPXN1856', '18-05-2026', NULL, NULL, NULL, NULL, '2026-04-16 02:28:26', '2026-04-16 02:28:26'),
(23, '39WCKQV5BT', 'Nguyễn Thị Bé Hai', 'ntbhai95@gmail.com', '0964043198', 'BV Phụ Sản TP Cần Thơ', '087195001442', '20-02-1995', 'Đồng Tháp', 15, 'images/2026/04/16/i2U9lV35RqkiPN6bI1PF.webp', 'images/2026/04/16/7HEX9eipU1jNYO2VofZZ.webp', 'images/2026/04/16/fnSBGyIVHgCWOrR1aBmR.webp', 'images/2026/04/16/KNgI6eTOnM7PouubVWzF.webp', 2, 1500000, 'Ấp Hoà Bình, xã Tân Nhuận Đông, tỉnh Đồng Tháp', '106, Cách Mạng Tháng 8, phường Cái Khế, quận Ninh Kiều, thành phố Cần Thơ', 4, NULL, '2017', 'Trường Đại học Y dược Cần Thơ', 'NCBSM1556', '15-05-2026', NULL, NULL, NULL, NULL, '2026-04-16 02:37:44', '2026-04-16 02:37:44'),
(24, 'IZLTPB5AY7', 'Phan Nguyễn Trang Thanh', 'mimoza.1310@gmail.com', '0939702581', 'TTYT Khu Vực Ô Môn', '092196001796', '13-10-1996', 'Cần Thơ', 15, 'images/2026/04/16/ub1Jo5K3aKJko5stoSXA.webp', 'images/2026/04/16/DbVBWmjj0jowB7vo5ZMJ.webp', 'images/2026/04/16/rSnLDyELyCrgCngGjggb.webp', 'images/2026/04/16/QdRzxPDMosVc39YO7Auv.webp', 2, 1500000, 'Khu vực 5, phường Ô Môn, thành phố Cần Thơ', 'Số 27,đường số 6,khu vực 5,phường châu văn liêm,quận ô môn,cần thơ', 4, NULL, '2023', 'Trường đại học Y Dược Cần Thơ', 'NCBSM1556', '15-05-2026', NULL, NULL, NULL, NULL, '2026-04-16 03:04:18', '2026-04-16 03:04:18'),
(25, '3SNP6VE5BH', 'Nguyễn Thị Thu Trang', 'ththutrangnguyen@gmail.com', '0972860740', 'Bệnh Viện Đa Khoa Thống Nhất Đồng Nai', '054184005274', '20-01-1984', 'Đắk Lắk', 20, 'images/2026/04/16/gpQGX6jOj66dSvTktPdd.webp', 'images/2026/04/16/qM3KWgpRXO9F9Vlq7h3X.webp', 'images/2026/04/16/7xh3WFAW8dWworNLwEzy.webp', 'images/2026/04/16/CJ1qgHj28wRuhUpqUUdg.webp', 2, 1500000, '214 Lô C, khu chung cư, tổ 20a1, KP.Cầu Hang, P.Biên Hòa, Đồng Nai', '214 C, chung cư Hóa An, Hóa An, Biên Hòa, Đồng Nai', 4, NULL, '2008', 'TP.HCM', 'HIV2046', '20-04-2026', NULL, NULL, NULL, NULL, '2026-04-16 07:05:06', '2026-04-16 07:05:06'),
(26, 'G3VAOQSIPZ', 'Nguyễn Thị Huyền', 'randomtdsp@gmail.com', '0396461685', 'Bệnh viện đa khoa số 4 tỉnh Lào Cai', '010194000863', '05-02-1994', 'Bảo Thắng- Lào Cai', 3, 'images/2026/04/16/ugAxb9VYN7vxO0XMBIFy.webp', 'images/2026/04/16/9umEfBg6W2EfN6IAKD5o.webp', 'images/2026/04/16/fEShZhmmwjKVFjTQ68cR.webp', 'images/2026/04/16/m39kvhTcnXruQDm7JHAy.webp', 2, 2200000, 'TDP Cầu Mây 1, Phường Sa Pa, tỉnh Lào Cai', '612 Điện Biên Phủ, Phường Phan Si Păng, thị xã Sa Pa, tỉnh Lào Cai', 4, NULL, '2016', 'Trường đại học kỹ thuật y tế Hải Dương', 'ATTC1746', '17-04-2026', 1, '5300316268', 'Bệnh viện đa khoa số 4 tỉnh Lào Cai', '213 đường Điện Biên Phủ, phường Sa Pa, tỉnh Lào Cai', '2026-04-16 07:59:23', '2026-04-16 07:59:23'),
(27, 'DJ2GYCVKEF', 'Bùi Ngọc Phương Nhi', 'nhibui.300901@gmail.com', '0944793272', 'Bệnh viện Đa khoa Tiền Giang', '082301012428', '30-09-2001', 'Tiền Giang', 25, 'images/2026/04/16/x8AfUdzIsZv7M0aLT6vF.webp', 'images/2026/04/16/1BDXtAkPmcIhKsupGXpd.webp', 'images/2026/04/16/Xml18kP8go8fC6BqKsc9.webp', 'images/2026/04/16/vW8KXfKLZm6WpoCnQ1IX.webp', 2, 1500000, 'Tổ 10- ấp Bình Thới A- xã Bình Trưng- tỉnh Đồng Tháp', 'Tổ 10- ấp Bình Thới A- xã Bình Trưng- huyện Châu Thành- tỉnh Tiền Giang', 4, NULL, '2025', 'Trường Đại học Võ Trường Toản', 'TTGDSK2046', '20-04-2026', NULL, NULL, NULL, NULL, '2026-04-16 08:01:00', '2026-04-16 08:01:00'),
(28, 'AR3SHIZPD8', 'Lê Thị Thanh Hải', 'lethithanhhai12.3.1979@gmail.com', '0919986019', 'Bệnh viện đa khoa số 4 tỉnh Lào Cai', '010179000675', '12-03-1979', 'Sa Pa- Lào Cai', 3, 'images/2026/04/16/oQfRCkzJnYayCDfZsQzc.webp', 'images/2026/04/16/3rYNZQyjptmNHJN3mfY1.webp', 'images/2026/04/16/xcpUqRj70APTTsJsCTAm.webp', 'images/2026/04/16/f9CrH9AUI2llebsGfBpF.webp', 2, 2200000, 'TDP Sa Pa 4, Phường Sa Pa, tỉnh Lào Cai', '01/45 Xuân Viên, tổ 4, phường Sa Pa, tỉnh Lào Cai', 3, NULL, '2024', 'Trường cao đẳng y tế Phú Thọ', 'ATTC1746', '17-04-2026', 1, '5300316268', 'Bệnh viện đa khoa số 4 tỉnh Lào Cai', '213 đường Điện Biên Phủ, phường Sa Pa, tỉnh Lào Cai', '2026-04-16 08:10:14', '2026-04-16 08:10:14'),
(29, 'KAHWO9D7TU', 'Phạm Thị Ngọc Hoan', 'ngochoan.pkbk@gmail.com', '0984854422', 'Bệnh viện đa khoa số 4 tỉnh Lào Cai', '025189002507', '12-02-1989', 'Bệnh viện Phú Thọ', 3, 'images/2026/04/16/AmhJqxBwhi3xhnLAc6eF.webp', 'images/2026/04/16/GJuiZqhQeRlPgV2Aotpr.webp', 'images/2026/04/16/Jbe7FnJe1ev5HmIwdMDa.webp', 'images/2026/04/16/aXNc09XaXBXsbTWaKryZ.webp', 2, 2200000, 'TDP Sa Pa 6, Phường Sa Pa, Tỉnh Lào Cai', '024 đường Phan Si Păng, tổ 6, phường Sa Pa, thị xã Sa Pa, tỉnh Lào Cai', 3, NULL, '2024', 'Trường cao đẳng y dược Hà Nội', 'ATTC1746', '17-04-2026', 1, '5300316268', 'Bệnh viện đa khoa số 4 tỉnh Lào Cai', '213 đường Điện Biên Phủ, phường Sa Pa, tỉnh Lào Cai', '2026-04-16 08:19:28', '2026-04-16 08:19:28'),
(30, 'R6MLYSD3X4', 'Mạc Thị Huyền', 'huyenmac.200887@gmail.com', '0978859728', 'Bệnh viện đa khoa số 4 tỉnh Lào Cai', '038187024287', '20-08-1987', 'Trung Hạ- Thanh Hóa', 3, 'images/2026/04/16/upK3ZFa32akd53fbEpT2.webp', 'images/2026/04/16/kuscPCwJSvCUwPTaVA9m.webp', 'images/2026/04/16/HWkyLp8usuhgtcYeFJwS.webp', 'images/2026/04/16/nEwaCtdTmzVt5GwSQBzG.webp', 2, 2200000, 'TDP Hàm Rồng 4, Phường Sa Pa, Tỉnh Lào Cai', 'Tổ 1, phường Sa Pả, thị xã Sa Pa, tỉnh Lào Cai', 3, NULL, '2025', 'Trường cao đẳng quân y I', 'ATTC1746', '17-04-2026', 1, '5300316268', 'Bệnh viện đa khoa số 4 tỉnh Lào Cai', '213 đường Điện Biên Phủ, phường Sa Pa, tỉnh Lào Cai', '2026-04-16 08:27:47', '2026-04-16 08:27:47'),
(31, 'TPZLGC8K2Y', 'Phạm Thế Triển', 'trien@hestiacare.com.vn', '0913977259', 'xx', '054081009551', '20-02-1981', 'Phú Yên', 6, 'images/2026/04/16/nQl8wQcoJikWbfkPYzkv.webp', 'images/2026/04/16/fUuDvY1RWMufe2EnUkaJ.webp', 'images/2026/04/16/cIHLCGXyrODuooIQByAC.webp', 'images/2026/04/16/p05XTncYkcH87anYsI2g.webp', 1, 2200000, '979/11 Lê Văn Lương, Tổ 2, Ấp 3, Phước Kiển, Nhà Bè, TP Hồ Chí Minh', '979/11 Lê Văn Lương, Tổ 2, Ấp 3, Phước Kiển, Nhà Bè, TP Hồ Chí Minh', 1, '2026-04-16 09:18:41', '1999', 'Phú Yên', 'DDTC1156', '11-05-2026', NULL, NULL, NULL, NULL, '2026-04-16 08:41:45', '2026-04-16 09:18:41'),
(32, '04U239NZBH', 'Phạm Thế Triển', 'trien@hestiacare.com.vn', '0913977259', 'Công ty TNHH HESTIA CARE', '054081009551', '20-02-1981', 'Phú Yên', 10, 'images/2026/04/16/NnE5CiEQdfNaaJxPHEYZ.webp', 'images/2026/04/16/LBtXOwO6LcCK8ptBxsf3.webp', 'images/2026/04/16/LT7UkZv8AON4NgEzJc31.webp', 'images/2026/04/16/ed2hndbV0KKJxe3tqo0q.webp', 1, 2400000, '979/11 Lê Văn Lương, Tổ 2, Ấp 3, Phước Kiển, Nhà Bè, TP Hồ Chí Minh', '979/11 Lê Văn Lương, Tổ 2, Ấp 3, Phước Kiển, Nhà Bè, TP Hồ Chí Minh', 1, '2026-04-16 09:18:17', '1999', 'Phú Yên', 'QLDD1746', '17-04-2026', 1, '0313240049', 'Công Ty TNHH HESTIA CARE', '111 Hoàng Trọng Mậu, KDC Him Lam, phường Tân Hưng, Tp Hồ Chí Minh, Việt Nam', '2026-04-16 09:10:29', '2026-04-16 09:18:17'),
(33, 'A4QR5PIB91', 'Bùi Quỳnh Nga', 'quynhnga.081279@gmail.com.vn', '0968737478', 'Công ty TNHH Phòng khám đa khoa Nam Thành phát', '034179020286', '08-12-1979', 'Thái Thụy- Thái Bình', 1, 'images/2026/04/16/qQyQccNoigEtDJJflAfQ.webp', 'images/2026/04/16/eMPaFZm1veru7bzsunYQ.webp', 'images/2026/04/16/5omY3uCZGnKcc8u8gpXs.webp', 'images/2026/04/16/F8toMKKSCl87uqqYHn2r.webp', 2, 2200000, '106/47 kp 6, P Linh Xuân,TpHcm', '74/6 đườg Huỳnh Tấn Phát,kp Đông A,p Đông Hòa.TP Dĩ An, Bình Dương', 2, NULL, '2004', 'Trung học Quân Y 2, Q9, TPHCM', 'KSNK656', '06-05-2026', NULL, NULL, NULL, NULL, '2026-04-16 09:45:16', '2026-04-16 10:28:34'),
(34, 'LVKYAGEJZB', 'Phan Thị Kim Huê', 'phanhue2882@gmail.com', '0898501548', 'Bệnh viện hỗ trợ sinh sản và Nam Học Sài Gòn', '079182035671', '28-04-1982', 'Hồ Chí Minh', 1, 'images/2026/04/16/Z15wgKAOUm3cZpwRO6rO.webp', 'images/2026/04/16/cV5AoGGq2PXTW7pZruJ3.webp', 'images/2026/04/16/UybGqe5tPFlOs7hIqD4a.webp', 'images/2026/04/16/EjnIDaaCn6UmXNxsuo5v.webp', 2, 2200000, '661 Bình Phước, Bình Khánh, Cần Giờ, TP Hồ Chí Minh', '50/41/5 KP66, Nguyễn Quý Yêm, An Lạc, Bình Tân, Hồ Chí Minh', 4, NULL, '2016', 'Trường Đại Học Y Khoa Phạm Ngọc Thạch', 'KSNK656', '06-05-2026', NULL, NULL, NULL, NULL, '2026-04-16 11:14:43', '2026-04-16 11:14:43'),
(35, '2N0RHKSXE4', 'Trương Thị Thanh Thảo', 'thao19513@gmail.com', '0362858357', 'Bệnh viện Nhân dân Gia Đình', '060301003944', '21-09-2001', 'Bình Thuận', 17, 'images/2026/04/16/JqM6QNRwp7X7zcqJkFhm.webp', 'images/2026/04/16/szVfvNpDNbTrzzCWcCzp.webp', 'images/2026/04/16/4e2W7oEmXnjVxzRyi2zR.webp', 'images/2026/04/16/6QXr91Jk7UBZhtB7l6xo.webp', 2, 1500000, 'Lâm Đồng', 'Lâm Đồng', 4, NULL, '2023', 'Trường Đại học Văn Lang', 'ATSH1356', '13-05-2026', NULL, NULL, NULL, NULL, '2026-04-16 12:52:23', '2026-04-16 12:52:23'),
(36, 'OEWVHQBCY3', 'Nguyễn Thị Như Ý', 'yn12345677@gmqil.com', '0985979496', 'Bệnh viện Vạn Phúc City', '049196000410', '21-12-1996', 'Đà Nẵng', 3, 'images/2026/04/16/4mZE9sQpveosRMyMa36c.webp', 'images/2026/04/16/ye0mpn4dGszp0PjvGDtp.webp', 'images/2026/04/16/50n3cGZy0qPwPnr3jEFF.webp', 'images/2026/04/16/xEcAc8HLjDuMCOLIWQXg.webp', 2, 2200000, '31a, đường số 4, Kdc An Phú, Khu Phố Chiêu Liêu A, phường Dĩ An, TP Hồ Chí Minh', 'Số 1 đường số 10, khu đô thị Vạn Phúc , Hiệp Bình Phước, Hiệp Bình, Tp Hồ Chí Minh', 3, NULL, '2017', 'Trường Cao Đẳng Y Tế Quảng Nam', 'ATTC1746', '17-04-2026', NULL, NULL, NULL, NULL, '2026-04-16 14:23:30', '2026-04-16 14:23:30'),
(37, 'GLUF76SKVM', 'Nguyễn Cao Hiệp Anh', 'drnguyencaohiepanh@gmail.com', '0938621899', 'Bv thẩm mỹ paris', '079096016300', '29-07-1996', 'Tphcm', 1, 'images/2026/04/17/pJKIvAAUxFCr8Isz1gm7.webp', 'images/2026/04/17/vU1Ek7QTLhVaxFzgMiVR.webp', 'images/2026/04/17/nGPW9RXUmWcIEvRRb0b4.webp', 'images/2026/04/17/8mJ2Nd7zBj4DfrLS4QxV.webp', 1, 2200000, '90/20 Hoà Bình, khu phố 12, phường Hoà Bình, Tphcm', '90/20 Hoà Bình, phường 5 quận 11, TpHCM', 4, NULL, '2021', 'Trường đại học Võ Trường Toản', 'KSNK656', '06-05-2026', NULL, NULL, NULL, NULL, '2026-04-17 01:36:00', '2026-04-17 01:36:00'),
(38, 'JP86YC3TB7', 'Cao Tấn Hiền', 'caotanhienito@gmail.com', '0932880376', 'Bệnh viện Quốc tế Mỹ (AIH)', '082093000188', '18-06-1993', 'Tiền Giang', 10, 'images/2026/04/17/QAVrLaRkSkH9t42tLL2K.webp', 'images/2026/04/17/TsyC9zl551Wg2quLAhxR.webp', 'images/2026/04/17/XLcW9SmFyWNWtdOeA7i1.webp', 'images/2026/04/17/gGWTQRA4Sc2twQSY6iuQ.webp', 1, 2400000, 'Khu Phố Mỹ Thạnh, Phường Mỹ Phước Tây, tỉnh Đồng Tháp', '6 Bắc Nam 3, Phường An Phú, Quận 2, Thành phố Thủ Đức', 3, NULL, '2014', 'Tiền Giang', 'QLDD1746', '17-04-2026', NULL, NULL, NULL, NULL, '2026-04-17 02:51:35', '2026-04-17 02:51:35'),
(39, '9V3YH8FSWQ', 'Nguyễn Tiến Phước', 'phuoc209@gmail.com', '0979523835', 'Bệnh viện phan châu trinh đà nẵng', '038086050889', '20-09-1986', 'Thanh hoá', 3, 'images/2026/04/17/qAuQVnqmKn30osjwOfLF.webp', 'images/2026/04/17/jnrpN02i7BgPgpfH2dj3.webp', 'images/2026/04/17/A8YId0YwUL8T1CC8UOSj.webp', 'images/2026/04/17/mJVsiKK6tVrc6iu0IEBc.webp', 1, 2200000, 'Đá bàn 3 phong nam phường hoà xuân đà nẵng', 'Nguyễn tiến phước đá bàn 3 phong nam hoà châu hoà vang đà nẵng', 4, NULL, '2017', 'Đà nẵng', 'ATTC1746', '17-04-2026', NULL, NULL, NULL, NULL, '2026-04-17 02:56:44', '2026-04-17 02:56:44'),
(40, '8W97THNM56', 'Phạm Văn Thống', 'thongpham10193@gmail.com', '0352072148', 'Phòng tiêm chủng TH Care Đức Thọ', '042093001285', '10-01-1993', 'Thôn2 xuân lĩnh nghi xuân hà tĩnh', 3, 'images/2026/04/17/1OoLzXtY2z9Jh2UQWRE9.webp', 'images/2026/04/17/jX7EPtHoatvcln6HkJV1.webp', 'images/2026/04/17/ZOuIvYLWRFYLCPP6WiJV.webp', 'images/2026/04/17/99bUbhE0PecwDkfia3YX.webp', 1, 2200000, 'Thôn xuân lĩnh 2 -xã nghi xuân - tỉnh hà tĩnh', 'Ngã 3 phan đình phùng đường nguyễn biểu thị trấn Đức thọ', 2, NULL, '2013', 'Trường cao đẳng y hà tĩnh', 'ATTC1746', '17-04-2026', NULL, NULL, NULL, NULL, '2026-04-17 03:16:20', '2026-04-17 03:16:20'),
(41, 'H9UZW2NQSD', 'Nguyễn Thị Hồng', 'Nguyenhongdsnq@gmail.com', '0948234486', 'Trung tâm Y tế Ngô Quyền Thành phố Hải Phòng', '031170002434', '08-08-1970', 'Hải Phòng', 2, 'images/2026/04/17/fpBig2uEDurefzfAw66M.webp', 'images/2026/04/17/kVCdWDVltbF92Fo1DKdj.webp', 'images/2026/04/17/bMb5usNSFuP2OwO9pWWl.webp', 'images/2026/04/17/sdnaJcYtKZ3y4HmHlnv1.webp', 2, 2500000, 'Số 16 U9/246 Đà Nẵng, Cầu Tre, Ngô Quyền, Hải Phòng', 'Số 7 đường Phạm Minh Đức, phường Gia Viên, Quận Ngô Quyền, Thành phố Hải Phòng', 5, NULL, '2014', 'Thành phố Hà Nội', 'SPYH2046', '20-04-2026', NULL, NULL, NULL, NULL, '2026-04-17 03:47:42', '2026-04-17 03:47:42'),
(42, 'FB59ANEL48', 'Hoàng Lý Thiên Phước', 'hoanglythienphuoc1@gmail.com', '0969868990', 'Bệnh viện đa khoa tâm anh', '079188009602', '17-04-1988', 'Hà nội', 2, 'images/2026/04/17/wxZfHz5epMEnLhuPzOiF.webp', 'images/2026/04/17/MGwZG0751wnvMRB2ymvN.webp', 'images/2026/04/17/CKFXHFJWrQYJ00yv4ZZH.webp', 'images/2026/04/17/7xVeY1icy1WpCUNaJTJ7.webp', 2, 2500000, '1324 trường sa phường tân sơn hoà thành phố hồ chí minh', '540 ấp bình phước xã bình khánh huyện cần giờ, thành phố hồ chí minh', 4, NULL, '2024', 'Trường đại học trà vinb', 'SPYH2046', '20-04-2026', NULL, NULL, NULL, NULL, '2026-04-17 05:41:15', '2026-04-17 05:41:15'),
(43, 'VZHESO0XCL', 'Nguyễn Thị Huế', 'huenguyenpdn@gmail.com', '0973265263', 'Trạm y tế xã Hóc Môn', '027190013733', '18-04-1990', 'Bắc Ninh', 10, 'images/2026/04/17/jmA8Js0ImYDPJwYsB7tD.webp', 'images/2026/04/17/yj7B5mOmc89dyEqm4MgA.webp', 'images/2026/04/17/1OCtV2w5NQYQ6MaTaHLf.webp', 'images/2026/04/17/X0VYQxEa2A9N30wSOnSK.webp', 2, 2400000, 'Tân Thời 2 , Tân Hiệp, Hóc Môn, TP Hồ Chí Minh', '75 Bà Triệu, Thị Trấn Hóc Môn, huyện Hóc Môn', 4, NULL, '2012', 'Trường Đại Học Quốc Tế Hồng Bàng TP HCM', 'QLDD756', '07-05-2026', NULL, NULL, NULL, NULL, '2026-04-17 10:20:24', '2026-04-17 10:20:24'),
(44, 'PIXHT1UD0S', 'Lê Văn Phú', 'phulevanrad.97@gmail.com', '0904681626', 'Bệnh viện đa khoa tâm anh', '046097008837', '16-01-1997', 'Thành phố huế', 2, 'images/2026/04/17/AiKC0cXO3HGtHFNEKcrZ.webp', 'images/2026/04/17/Bg6KW1BzhYc56FhZOrVg.webp', 'images/2026/04/17/9tABgCAJyRiSoESOXQYQ.webp', 'images/2026/04/17/yNDsVtWKcXgyrP1iVxMZ.webp', 1, 2500000, '3/103 nguyễn hữu cảnh, tổ 2, khu vực 1 phường an cựu thành phố huế', '2b phổ quang phường 2 quận tân bình thành phố hồ chí minh', 4, NULL, '2019', 'Trường đại học y dược huế', 'SPYH2046', '20-04-2026', NULL, NULL, NULL, NULL, '2026-04-17 10:54:50', '2026-04-17 10:54:50'),
(45, 'Z3SQ2EB4RC', 'Nguyễn Thị Kiều Nhung', 'nalynguyen69@gmail.com', '0397481199', 'phòng khám nha khoa Vietsmile', '045197000316', '30-08-1997', 'Xã diên Sanh, Hải Lăng, Quảng Trị', 1, 'images/2026/04/17/SWDffDDKHXlNl9LhGKPU.webp', 'images/2026/04/17/OEVobBVy2UzLXT4RxqfE.webp', 'images/2026/04/17/YHyeqKlCi92YKz4aGtDU.webp', 'images/2026/04/17/ZNZ2DU2BLgmavlsJBYDD.webp', 2, 2200000, 'Khóm 3, Thị trấn Diên Sanh, Hải Lăng, Quảng Trị', '221/2 Bùi Thị Xuân, Phường Đúc, TP Huế', 3, NULL, '2020', 'Trường cao đẳng y tế huế', 'KSNK656', '06-05-2026', NULL, NULL, NULL, NULL, '2026-04-17 11:46:05', '2026-04-17 11:46:05'),
(46, 'U4AOH29TRL', 'Lê Thị Tố Tâm', 'totam0631@gmail.com', '0977920631', 'Bệnh viện Quân y 4- Cục Hậu Cần Kĩ Thuật - Quân đoàn 34', '042184014496', '28-03-1984', 'Xã Đức Thọ, Tĩnh Hà Tĩnh', 2, 'images/2026/04/17/TVBjQfJAC9iPjNB8RpST.webp', 'images/2026/04/17/QQXEeVbvHtmJe0w7lYLV.webp', 'images/2026/04/17/1fmc5nqHGxOlhZ0IpTCt.webp', 'images/2026/04/17/HoYTrIjyQByYorTf6fZn.webp', 2, 2500000, 'Số 03 Nguyễn Văn Cừ, kp Đông a, Phường Đông Hòa, Thành Phố Hồ Chí Minh', 'Số 137, Đường ĐT 743B, khu phố Thống Nhất 2, Phường Dĩ An, Thành phố Dĩ An, Tỉnh Bình Dương', 3, NULL, '2018', 'Trường cao Đẳng Đại Việt Sài Gòn', 'SPYH656', '06-05-2026', NULL, NULL, NULL, NULL, '2026-04-17 12:16:39', '2026-04-17 12:16:39'),
(47, '4TJ7DRK2HM', 'Nguyễn Thị Mỹ Linh', 'nguyenlinh06101986@gmail.com', '0978847928', 'Bệnh viện Quân y 4- Cục Hậu Cần Kĩ Thuật - Quân đoàn 34', '044186008759', '06-10-1986', 'Trường Ninh, Quảng Trị', 2, 'images/2026/04/17/oFl3PxtBBbTeIDLImUdi.webp', 'images/2026/04/17/Zp9Iynv2uafFscabIRot.webp', 'images/2026/04/17/r4TIWChVTOy29vUDISjb.webp', 'images/2026/04/17/elWsw1ABjwPRuV8gUofe.webp', 2, 2500000, '108A khu dân cư Tân Bình, khu phố Tân Thắng, Phường Tân Đông Hiệp, Thành phố Hồ chí Minh', 'Số 137, Đường ĐT 743B, khu phố Thống Nhất 2, Phường Dĩ An, Thành phố Dĩ An, Tỉnh Bình Dương', 4, NULL, '2019', 'Trường Đại Học Trà Vinh', 'SPYH656', '06-05-2026', NULL, NULL, NULL, NULL, '2026-04-17 13:21:20', '2026-04-17 13:21:20'),
(48, '0FDVHP4ZBY', 'Võ Thị Mai', 'totam0631@gmail.com', '0984680455', 'Bệnh viện Quân y 4- Cục Hậu Cần Kĩ Thuật - Quân đoàn 34', '040192018688', '08-12-1992', 'Xã Anh Sơn Đông, Tĩnh Nghệ An', 2, 'images/2026/04/17/OEegsYxQe6shnTRITwrk.webp', 'images/2026/04/17/89xnlgUMeockdPLS9KDC.webp', 'images/2026/04/17/cGN8VF462qdTg5uzAsJe.webp', 'images/2026/04/17/O24dWzBu7907a12XT6OR.webp', 2, 2500000, '44  Khu Dân cư 2 tổ 21, Khu phố Bình Phước B, Phường An Phú, thành phố Hồ Chí Minh', 'Số 137, Đường ĐT 743B, khu phố Thống Nhất 2, Phường Dĩ An, Thành phố Dĩ An, Tỉnh Bình Dương', 3, NULL, '2018', 'Trường cao Đẳng Đại Việt Sài Gòn', 'SPYH656', '06-05-2026', NULL, NULL, NULL, NULL, '2026-04-17 13:28:28', '2026-04-17 13:28:28'),
(49, '4ZBOYH0EU9', 'Ngô Văn Sơn', 'huyenson1984199r@gmail.com', '0976071068', 'Bệnh viện Quân y 4- Cục Hậu Cần Kĩ Thuật - Quân đoàn 34', '079084002887', '15-02-1984', 'Xã hải Châu, Tỉnh Nghệ An', 2, 'images/2026/04/17/tCMV0dfx7Fz63TjHdwMH.webp', 'images/2026/04/17/PQ557kFNT37irHvuOt41.webp', 'images/2026/04/17/FOSHIIaF3VocaexLuBpo.webp', 'images/2026/04/17/XCMYi7AElzUBKsuXo70e.webp', 1, 2500000, '29/2 Đường 22, Khu phố 20, Phường Tam Bình, Thành phố Hồ Chí Minh', 'Số 137, Đường ĐT 743B, khu phố Thống Nhất 2, Phường Dĩ An, Thành phố Dĩ An, Tỉnh Bình Dương', 3, NULL, '2025', 'Trường Cao Đẳng Lê Quý Đôn', 'SPYH656', '06-05-2026', NULL, NULL, NULL, NULL, '2026-04-17 13:34:18', '2026-04-17 13:34:18'),
(50, 'BQ3G8EAJRH', 'Nguyễn Thị Thương', 'nguyenthuong120896@gmail.com', '0968306019', 'Bệnh viện Quân y 4- Cục Hậu Cần Kĩ Thuật - Quân đoàn 34', '042196014596', '12-08-1996', 'Xã Hương Sơn, Tĩnh hà Tĩnh', 2, 'images/2026/04/17/rV4i3flXqkrFkMbqZvQe.webp', 'images/2026/04/17/tkZ7SzIRSSOfckRzrgz2.webp', 'images/2026/04/17/HXkm0zm2q900DGj84Jz9.webp', 'images/2026/04/17/dRFE1kZy8369qrkdWpic.webp', 2, 2500000, 'Phường Tân Đông Hiệp, Thành Phố Hồ Chí Minh', 'Số 137, Đường ĐT 743B, khu phố Thống Nhất 2, Phường Dĩ An, Thành phố Dĩ An, Tỉnh Bình Dương', 4, NULL, '2021', 'Trường Đại Học Trà Vinh', 'SPYH656', '06-05-2026', NULL, NULL, NULL, NULL, '2026-04-17 13:39:39', '2026-04-17 13:39:39'),
(51, 'DTR7OAK1ZY', 'Dương Thị Thu Hằng', 'nguyenlinh06101986@gmail.com', '0328715034', 'Bệnh viện Quân y 4- Cục Hậu Cần Kĩ Thuật - Quân đoàn 34', '036181011453', '13-02-1981', 'Xã Trường Thi, Tỉnh Ninh Bình', 2, 'images/2026/04/17/6dWOsJnt6AqLPRxhKYdF.webp', 'images/2026/04/17/o9IBaSEKmvMSRxfNpN4Q.webp', 'images/2026/04/17/ZpqtgwMzcJtlMRWSMZ2g.webp', 'images/2026/04/17/VyMdSNgKVmqsMakLqGp7.webp', 2, 2500000, '299A Khu phố Chiêu Liêu, Phường Dĩ An, Thành Phố Hồ Chí Minh', 'Số 137, Đường ĐT 743B, khu phố Thống Nhất 2, Phường Dĩ An, Thành phố Dĩ An, Tỉnh Bình Dương', 3, NULL, '2020', 'Trường Cao Đẳng Công Nghệ Cao Đồng An', 'SPYH656', '06-05-2026', NULL, NULL, NULL, NULL, '2026-04-17 13:46:08', '2026-04-17 13:46:08'),
(52, 'IWBURG2LN9', 'Nguyễn Thị Trang', 'nguyenthitrang20121989@gmail.com', '0977723388', 'Bệnh viện Quân y 4- Cục Hậu Cần Kĩ Thuật - Quân đoàn 34', '034189010559', '20-12-1989', 'Xã Hưng Hà, Tỉnh Hưng Yên', 2, 'images/2026/04/17/CECNIlwb9d3UzEe6TpRI.webp', 'images/2026/04/17/4Uy5vRRnzxrk7j3yeNHC.webp', 'images/2026/04/17/NSxQ7XsoN8RFbDn7hTJM.webp', 'images/2026/04/17/46Ymt1aM8oyxQL3Vqb63.webp', 2, 2500000, 'DN12, khu phố 1, Phường Bình Dương, Thành Phố Hồ Chí Minh', 'Số 137, Đường ĐT 743B, khu phố Thống Nhất 2, Phường Dĩ An, Thành phố Dĩ An, Tỉnh Bình Dương', 4, NULL, '2019', 'Trường Đại Học Trà Vinh', 'SPYH656', '06-05-2026', NULL, NULL, NULL, NULL, '2026-04-17 13:55:02', '2026-04-17 13:55:02'),
(53, 'RJFUX95O78', 'Tôn Nữ Hoàng Nhi', 'tonnuhoangnhia1@gmail.com', '0384714537', 'Trung tâm Y tế khu vực Quế Sơn', '049196016432', '03-09-1996', 'xã Xuân Phú, thành phố Đà Nẵng', 1, 'images/2026/04/17/DHb6nbBNylk4L0QCiiqi.webp', 'images/2026/04/17/tTgWVpLnt08svEQJLOs5.webp', 'images/2026/04/17/KkCtNFeGtUaZugrCbF4k.webp', 'images/2026/04/17/Grm404HTSMXWnjERwXYK.webp', 2, 2200000, 'thôn Hương Quế Đông, xã Xuân Phú, tp Đà Nẵng', 'cạnh Photo Quá Phước, xã Quế Phú, huyện Quế Sơn, tỉnh Quảng Nam', 4, NULL, '2019', 'Đại học Bách khoa Đà Nẵng', 'KSNK656', '06-05-2026', NULL, NULL, NULL, NULL, '2026-04-17 14:21:36', '2026-04-17 14:21:36'),
(54, 'KYLC60API5', 'Tôn Nữ Hoàng Nhi', 'tonnuhoangnhia1@gmail.com', '0384714537', 'Trung tâm Y tế khu vực Quế Sơn', '049196016432', '03-09-1996', 'xã Xuân Phú, thành phố Đà Nẵng', 8, 'images/2026/04/17/pdVXBGzLJUX12oLjWN2X.webp', 'images/2026/04/17/wjbTIOeVRjA3l1FRIWER.webp', 'images/2026/04/17/MCb5TjthXfxg4n1UtDxW.webp', 'images/2026/04/17/JpHsjW3ePERTCuxs9AZB.webp', 2, 2200000, 'thôn Hương Quế Đông, xã Xuân Phú, tp Đà Nẵng', 'cạnh Photo Quá Phước, xã Quế Phú, huyện Quế Sơn, tỉnh Quảng Nam', 4, NULL, '2019', 'Đại học Bách khoa Đà Nẵng', 'QLCT2256', '22-05-2026', NULL, NULL, NULL, NULL, '2026-04-17 14:24:32', '2026-04-17 14:24:32'),
(55, 'RQUZ80WB59', 'Đỗ Thị Lưu', 'dothiluubv@gmail.com', '0989534177', 'Trung tâm y tế m\'drăk', '054179005596', '26-10-79', 'Đăk lăk', 3, 'images/2026/04/18/zb2MzySj5Fg83VOPks7O.webp', 'images/2026/04/18/vZQX89fHPST0QHQw30sj.webp', 'images/2026/04/18/p1rz3ziStBrTDHNgUTTf.webp', 'images/2026/04/18/kcVxaix6nLJIOh34zxZM.webp', 2, 2200000, 'Thôn 18 xã mdrak đăk lăk', 'Thôn 9 thị trấn mdrak đăk lăk', 4, NULL, '2025', 'Đăk lăk', 'ATTC1746', '17-04-2026', NULL, NULL, NULL, NULL, '2026-04-18 05:07:56', '2026-04-18 05:07:56'),
(56, 'DZ8BL7VGT5', 'Trần Trạng Nguyên', 'nguyentt080291@gmail.com', '0857999988', 'Bệnh viện thẩm mỹ Charming', '080091010530', '08-02-1991', '35 Đường Số 01, KDC Đầu Tư Xây Dựng Giai Đoạn 1, Kp Bình Cư 3, Phường Long An, Tỉnh Tây Ninh', 9, 'images/2026/04/18/DM2v1WVxIDIEW6FTMOdK.webp', 'images/2026/04/18/pYlbUkVXbO18ACG0zwGD.webp', 'images/2026/04/18/NxeFTDUif271oXOsQlin.webp', 'images/2026/04/18/pRI4ALhJ1FGeBU594hre.webp', 1, 2200000, '35 Đường Số 01, KDC Đầu Tư Xây Dựng Giai Đoạn 1, Kp Bình Cư 3, Phường Long An, Tỉnh Tây Ninh', '382 - 384 - 386  Võ Văn Kiệt, P. Cầu Ông Lãnh, Hồ Chí Minh', 4, NULL, '2015', 'Trường đại học GPT', 'QLTBYT2356', '23-05-2026', NULL, NULL, NULL, NULL, '2026-04-18 05:56:33', '2026-04-18 05:56:33'),
(57, 'TK9ADSQBUC', 'Lê Thị Bé Thảo', 'thaole160286@gmail.com', '0868222963', 'Bệnh Viện Thẩm Mỹ Charming', '089186021944', '16-02-1986', 'Chợ Vàm,An Giang.', 23, 'images/2026/04/18/KmSiE6EvKN8BERRofAMj.webp', 'images/2026/04/18/06QwL4vjosHosO2NoNVO.webp', 'images/2026/04/18/d1UfcxPpG1wAuLEMM1Tk.webp', 'images/2026/04/18/lN2Pl3JvZb0Xle9MeEJe.webp', 2, 1500000, 'Chợ Vàm,An Giang.', '382-384-386 Võ Văn Kiệt . p Cầu Ông Lãnh .Tp. Hồ Chí Minh.', 3, NULL, '2024', 'Trường cao đẳng quảng ngãi', 'ATNB1256', '12-05-2026', NULL, NULL, NULL, NULL, '2026-04-18 06:01:58', '2026-04-18 06:01:58'),
(58, 'OW7AHYRL3F', 'Đặng Thị Ngọc', 'Ngocdang.14589@gmail.com', '0389140589', 'Bệnh viện thẫm mỹ charming', '038189052251', '14-05-1989', 'Phường Hạc Thành Tỉnh Thanh Hoá', 23, 'images/2026/04/18/Lmt8XDPPv7XxsVBWv1zB.webp', 'images/2026/04/18/jhKkPKCQNGkpFCRN8Slk.webp', 'images/2026/04/18/19LDzuRiAFyGlCOuIvGP.webp', 'images/2026/04/18/wVV4nhvn5LZhxjNF5Xvj.webp', 2, 1500000, 'Phường Hạc Thành Tỉnh Thanh Hoá', '382-384-386 Võ Văn Kiệt Phường Cầu Ông Lãnh Tp Hồ Chí Minh', 3, NULL, '2024', 'Trường cao đẳng quảng ngãi', 'ATNB1256', '12-05-2026', NULL, NULL, NULL, NULL, '2026-04-18 06:08:08', '2026-04-18 06:08:08');

-- --------------------------------------------------------

--
-- Table structure for table `vdh_roles`
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
-- Dumping data for table `vdh_roles`
--

INSERT INTO `vdh_roles` (`id`, `name`, `permission`, `avatar`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', 'home;user;user.create;user.store;user.update;user.delete;user.profile;user.updateProfile;role;role.create;role.store;role.update;role.delete;category_news;category_news.create;category_news.store;category_news.update;category_news.delete;news;news.create;news.store;news.edit;news.update;news.delete;category_product;category_product.create;category_product.store;category_product.edit;category_product.update;category_product.delete;product;product.create;product.store;product.edit;product.update;product.delete;attribute;attribute.create;attribute.store;attribute.edit;attribute.update;attribute.delete;slide;slide.create;slide.store;slide.edit;slide.update;slide.delete;customer;customer.create;customer.store;customer.edit;customer.update;customer.delete', '/admin/uploads/media/images/files/tai%20khoan/1587997921_crown.png', 'Quyền cao nhất', 1, '2020-12-10 02:32:39', '2022-07-05 17:19:19'),
(4, 'Sales', 'dashboard;customer.index;customer.create;customer.store;customer.update;customer.delete;customer.draft;customer.draft;customer.draft.move;customer.draft.delete;customer.exhibitor.index;customer.exhibitor.add;customer.exhibitor.remove;customer.exhibitor.view;customer.exhibitor.store', NULL, 'Nhân viên kinh doanh', 1, '2020-12-28 04:23:51', '2026-03-17 14:11:31'),
(5, 'Kế toán', 'dashboard', NULL, 'Tài chính kế toán', 1, '2026-03-17 14:00:37', '2026-03-17 14:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `vdh_setting`
--

CREATE TABLE `vdh_setting` (
  `id` int(11) NOT NULL,
  `option_key` varchar(255) DEFAULT NULL,
  `option_value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `vdh_setting`
--

INSERT INTO `vdh_setting` (`id`, `option_key`, `option_value`, `created_at`, `updated_at`) VALUES
(1, 'phone', '0986209305', '2026-02-08 03:22:48', '2026-02-08 03:26:38'),
(2, 'zalo', '0986209305', '2026-02-08 03:22:48', '2026-02-08 03:26:38'),
(3, 'facebook', 'facebook.com/vuduchongdotcom', '2026-02-08 03:22:48', '2026-02-08 03:26:38'),
(4, 'messenger', 'messenger.com/vuduchongdotcom', '2026-02-08 03:22:48', '2026-02-08 03:27:25'),
(5, 'maintenance', NULL, '2026-02-08 03:22:48', '2026-04-14 02:56:19'),
(6, 'seo', '1', '2026-02-08 03:22:48', '2026-02-08 03:26:22'),
(7, 'robot_index', NULL, '2026-02-08 03:28:15', '2026-02-21 02:02:51'),
(8, 'hero_typed', '{\"vi\":\"\\u0110\\u00e0o t\\u1ea1o CME y khoa online\\r\\nC\\u1eadp nh\\u1eadt ki\\u1ebfn th\\u1ee9c y khoa li\\u00ean t\\u1ee5c\\r\\nCME \\u0111\\u01b0\\u1ee3c c\\u00f4ng nh\\u1eadn to\\u00e0n qu\\u1ed1c\\r\\n\\u0110\\u00e0o t\\u1ea1o CME to\\u00e0n qu\\u1ed1c\",\"en\":null,\"cn\":null,\"kr\":null}', '2026-03-06 11:20:11', '2026-04-14 08:57:27'),
(9, 'bank_code', 'BIDV', '2026-04-08 03:41:44', '2026-04-14 02:56:41'),
(10, 'account_number', '8600913668', '2026-04-08 03:41:44', '2026-04-14 02:56:41'),
(11, 'account_owner', 'VIEN KHOA HOC QUAN LY Y TE', '2026-04-08 03:41:44', '2026-04-14 02:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `vdh_users`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `vdh_admins`
--
ALTER TABLE `vdh_admins`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `vdh_course`
--
ALTER TABLE `vdh_course`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `vdh_education`
--
ALTER TABLE `vdh_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vdh_failed_jobs`
--
ALTER TABLE `vdh_failed_jobs`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `vdh_failed_jobs_uuid_unique` (`uuid`) USING BTREE;

--
-- Indexes for table `vdh_jobs`
--
ALTER TABLE `vdh_jobs`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `vdh_jobs_queue_index` (`queue`) USING BTREE;

--
-- Indexes for table `vdh_languages`
--
ALTER TABLE `vdh_languages`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `vdh_mail`
--
ALTER TABLE `vdh_mail`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `vdh_mail_detail`
--
ALTER TABLE `vdh_mail_detail`
  ADD PRIMARY KEY (`mail_id`,`lang_id`) USING BTREE;

--
-- Indexes for table `vdh_opening`
--
ALTER TABLE `vdh_opening`
  ADD PRIMARY KEY (`course_id`,`start_date`) USING BTREE;

--
-- Indexes for table `vdh_orders`
--
ALTER TABLE `vdh_orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `vdh_roles`
--
ALTER TABLE `vdh_roles`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `vdh_setting`
--
ALTER TABLE `vdh_setting`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `option_key` (`option_key`) USING BTREE;

--
-- Indexes for table `vdh_users`
--
ALTER TABLE `vdh_users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vdh_admins`
--
ALTER TABLE `vdh_admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vdh_course`
--
ALTER TABLE `vdh_course`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `vdh_education`
--
ALTER TABLE `vdh_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vdh_failed_jobs`
--
ALTER TABLE `vdh_failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vdh_jobs`
--
ALTER TABLE `vdh_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `vdh_languages`
--
ALTER TABLE `vdh_languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vdh_mail`
--
ALTER TABLE `vdh_mail`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vdh_orders`
--
ALTER TABLE `vdh_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `vdh_roles`
--
ALTER TABLE `vdh_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vdh_setting`
--
ALTER TABLE `vdh_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vdh_users`
--
ALTER TABLE `vdh_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
