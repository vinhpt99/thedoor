-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 22, 2020 lúc 04:56 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thedoor`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `describe` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `delete_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `describe`, `slug`, `thumbnail`, `content`, `author_id`, `status`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, 'Du lịch Việt một năm chống chọi thảm họa kép', 'Covid-19 bùng phát; bão lũ kỷ lục ở miền Trung giáng đòn nặng nề lên ngành kinh tế vốn đóng góp 9,2% GDP. Giữa bối cảnh đó, du lịch Việt vẫn lập kỳ tích nhờ sự năng động, sáng tạo.', 'du-lich-viet-mot-nam-chong-choi-tham-hoa-kep', '59758_1.png', '<p>Bước sang 2020, du lịch Việt Nam giữ đ&agrave; tăng trưởng ngoạn mục, đ&oacute;n xấp xỉ 2 triệu lượt kh&aacute;ch quốc tế trong th&aacute;ng 1, tăng 32,8% so với c&ugrave;ng kỳ năm 2019. Mọi thứ đột ngột thay đổi khi Việt Nam x&aacute;c nhận&nbsp;<a href=\"https://vnexpress.net/ap-luc-chua-benh-nhan-covid-19-dau-tien-o-viet-nam-4060194.html\">ca nhiễm nCoV đầu ti&ecirc;n</a>.</p>\r\n\r\n<p>Từ 1/4, Việt Nam&nbsp;<a href=\"https://vnexpress.net/viet-nam-cach-ly-toan-xa-hoi-trong-15-ngay-4077462.html\">c&aacute;ch ly to&agrave;n x&atilde; hội</a>, dừng to&agrave;n bộ đường bay thương mại với c&aacute;c nước. C&aacute;c điểm tham quan, du lịch nội địa đ&oacute;ng cửa, người d&acirc;n được y&ecirc;u cầu kh&ocirc;ng ra khỏi nh&agrave; khi kh&ocirc;ng c&oacute; việc cấp thiết.</p>', 1, 1, 1, '2020-12-21 00:39:46', '2020-12-21 00:39:46'),
(2, 'Hơn 100 tỷ đồng mở rộng đường ở Sài Gòn', 'Dự án mở rộng đường Đình Giao Khẩu, quận 12, tổng vốn gần 104 tỷ đồng khởi công sáng 21/12 giúp giảm kẹt xe, ô nhiễm ở cửa ngõ tây bắc TP HCM.\r\n\r\nCông trình thực hiện trên đoạn dài gần 2 km từ giao lộ với đường Hà Huy Giáp đến bờ bao dọc sông Sài Gòn (phường Thạnh Lộc).', 'hon-100-ty-dong-mo-rong-duong-o-sai-gon', '21878_2.png', '<ul>\r\n	<li><a href=\"https://vnexpress.net/thoi-su\" title=\"Thời sự\">Thời sự</a></li>\r\n	<li><a href=\"https://vnexpress.net/thoi-su/giao-thong\" title=\"Giao thông\">Giao th&ocirc;ng</a></li>\r\n</ul>\r\n\r\n<p>Thứ hai, 21/12/2020, 12:26 (GMT+7)</p>\r\n\r\n<h1>Hơn 100 tỷ đồng mở rộng đường ở S&agrave;i G&ograve;n</h1>\r\n\r\n<p>Dự &aacute;n mở rộng đường Đ&igrave;nh Giao Khẩu, quận 12, tổng vốn gần 104 tỷ đồng khởi c&ocirc;ng s&aacute;ng 21/12 gi&uacute;p giảm kẹt xe, &ocirc; nhiễm ở cửa ng&otilde; t&acirc;y bắc TP HCM.</p>\r\n\r\n<p>C&ocirc;ng tr&igrave;nh thực hiện tr&ecirc;n đoạn d&agrave;i gần 2 km từ giao lộ với đường H&agrave; Huy Gi&aacute;p đến bờ bao dọc s&ocirc;ng S&agrave;i G&ograve;n (phường Thạnh Lộc). Đoạn n&agrave;y mở rộng mặt đường từ 5-8 m l&ecirc;n 16 m, trong đ&oacute; phần đường rộng 10 m, vỉa h&egrave; mỗi b&ecirc;n 3 m. Ri&ecirc;ng đoạn từ rạch Ch&uacute; Kỳ đến cuối tuyến, hai nh&aacute;nh dọc b&ecirc;n mở rộng l&ecirc;n 5 m mỗi nh&aacute;nh c&ugrave;ng 3 m cho vỉa h&egrave;.</p>\r\n\r\n<p>Ngo&agrave;i ra, dự &aacute;n l&agrave;m mới hệ thống cống tho&aacute;t nước dọc hai b&ecirc;n vỉa h&egrave; c&ugrave;ng cống hộp băng ngang rạch Cầu Đồng v&agrave; &Ocirc;ng M&ocirc;; nạo v&eacute;t rạch Ch&uacute; Kỳ v&agrave; bổ sung c&acirc;y xanh, chiếu s&aacute;ng... C&ocirc;ng tr&igrave;nh dự kiến ho&agrave;n th&agrave;nh th&aacute;ng 3/2022.</p>', 1, 1, 0, '2020-12-21 00:44:27', '2020-12-21 19:23:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `candidates`
--

CREATE TABLE `candidates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept_id` bigint(20) UNSIGNED NOT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `candidates`
--

INSERT INTO `candidates` (`id`, `name`, `email`, `phone`, `dept_id`, `profile`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, 'Phạm Trọng Vinh', 'vinhpt51@gmail.com', '0365844891', 1, '10594_Webp.net-compress-image-16.jpg', 1, '2020-12-21 10:28:08', '2020-12-21 19:08:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `phone`, `email`, `address`, `image`, `delete_status`, `created_at`, `updated_at`) VALUES
(3, 'Bùi Đức Khánh', '0987581100', 'vinhpt01@gmail.com', 'Cầu Giay, Hà Nội', '89191_2.PNG', 0, '2020-12-20 23:38:48', '2020-12-21 19:25:23'),
(4, 'Phạm Trọng Vinh', '0365844881', 'qdfgfdgd@gmail.com', '48 ngõ 189 nguyễn ngọc vũ', '39596_p3-o2.png', 1, '2020-12-21 20:19:36', '2020-12-21 20:19:36'),
(5, 'mfigsigh', '0387949897', 'dnminh11@gmail.com', 'thanh hóa', '64080_upload-icon.png', 1, '2020-12-21 20:25:30', '2020-12-21 20:25:30'),
(6, 'apple', '0838970828', 'dongocminh.mfc@gmail.com', 'bắc từ liêm', '13060_p3-pre.png', 1, '2020-12-21 20:27:00', '2020-12-21 20:27:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `depts`
--

CREATE TABLE `depts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dept_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leader_id` tinyint(4) DEFAULT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `depts`
--

INSERT INTO `depts` (`id`, `dept_name`, `slug`, `phone`, `leader_id`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, 'Thiết kế', 'thiet-ke', '0365844881', 1, 1, NULL, NULL),
(2, 'Nhân sự', 'nhan-su', '0365844882', 1, 1, NULL, NULL),
(3, 'Phòng Kế Toán', '', '0365844889', 5, 0, '2020-12-19 07:04:34', '2020-12-19 08:59:04'),
(4, 'Phòng Học', '', '03658448889', 5, 0, '2020-12-19 07:32:08', '2020-12-21 18:55:21'),
(5, 'Phòng Công Đoàn', '', '0365844807', 10, 1, '2020-12-21 18:55:14', '2020-12-21 18:55:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_products`
--

CREATE TABLE `detail_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `media` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `describe` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feed_backs`
--

CREATE TABLE `feed_backs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_fb` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `feed_backs`
--

INSERT INTO `feed_backs` (`id`, `sender_name`, `email`, `content_fb`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, 'Phạm Trọng Vinh', 'vinhpt01@gmail.com', 'cừv', 1, '2020-12-21 18:34:40', '2020-12-21 18:34:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hire_pages`
--

CREATE TABLE `hire_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `partner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `budget` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hire_pages`
--

INSERT INTO `hire_pages` (`id`, `partner_name`, `email`, `phone`, `service_id`, `budget`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, 'Phạm Trọng Vinh', 'hire@gmail.com', '0365844782', 2, '14', 1, '2020-12-21 02:18:45', '2020-12-21 02:18:45'),
(2, 'Phạm Trọng Vinh', 'vinhpto5@gmail.com', '0345844882', 2, '15', 1, '2020-12-21 03:17:11', '2020-12-21 03:17:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `layouts`
--

CREATE TABLE `layouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `offset` tinyint(4) NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `layouts`
--

INSERT INTO `layouts` (`id`, `offset`, `link`, `delete_status`, `created_at`, `updated_at`) VALUES
(2, 2, '59853_giphy-9-1352.gif', '1', '2020-12-20 21:50:20', '2020-12-21 20:42:53'),
(3, 3, 'page-3.png', '1', '2020-12-20 22:01:33', '2020-12-20 22:01:33'),
(4, 4, 'page-4.png', '1', '2020-12-20 22:03:21', '2020-12-20 22:03:21'),
(5, 5, 'page-5.png', '1', '2020-12-20 22:04:58', '2020-12-20 22:04:58'),
(6, 6, 'page-6.png', '1', '2020-12-20 22:06:26', '2020-12-20 22:06:26'),
(7, 7, 'page-7.png', '1', '2020-12-20 22:08:19', '2020-12-20 22:08:19'),
(8, 8, 'page-8.png', '0', '2020-12-20 22:13:38', '2020-12-21 03:32:24'),
(9, 4, '96230_bgr.jpg', '0', '2020-12-20 22:17:29', '2020-12-20 22:17:34'),
(10, 2, '31979_anh-gif-1-min.gif', '0', '2020-12-21 20:40:56', '2020-12-21 20:42:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_05_21_100000_create_teams_table', 1),
(7, '2020_05_21_200000_create_team_user_table', 1),
(8, '2020_11_23_072934_create_services_table', 1),
(9, '2020_11_24_072743_create_hire_pages_table', 1),
(10, '2020_11_25_072642_create_depts_table', 1),
(11, '2020_11_25_072654_create_staff_table', 1),
(12, '2020_11_26_072718_create_slides_table', 1),
(13, '2020_11_26_072824_create_feed_backs_table', 1),
(14, '2020_11_26_072837_create_candidates_table', 1),
(15, '2020_11_26_072853_create_customers_table', 1),
(16, '2020_11_27_072903_create_products_table', 1),
(17, '2020_11_27_072918_create_detail_products_table', 1),
(18, '2020_11_30_040852_create_sessions_table', 1),
(19, '2020_11_30_041724_fixregister', 1),
(20, '2020_12_02_185350_create_blogs_table', 1),
(21, '2020_12_02_224909_create_layouts_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_customer` bigint(20) UNSIGNED NOT NULL,
  `id_service` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `begin_day` date NOT NULL,
  `finish_date` date NOT NULL,
  `members` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `id_customer`, `id_service`, `name`, `slug`, `begin_day`, `finish_date`, `members`, `delete_status`, `created_at`, `updated_at`) VALUES
(2, 3, 2, 'Web The Dor', 'web-the-dor', '2020-12-21', '2020-12-25', '2', 1, '2020-12-20 23:50:44', '2020-12-20 23:50:44'),
(3, 3, 2, 'Makerting', 'makerting', '2020-12-02', '2020-12-18', '3', 1, '2020-12-21 00:04:14', '2020-12-21 00:04:14'),
(4, 3, 2, 'Đồ án thuê bb', 'do-an-thue-bb', '2020-12-22', '2020-12-26', '4', 1, '2020-12-21 00:05:37', '2020-12-21 18:44:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `describe` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `services`
--

INSERT INTO `services` (`id`, `service_name`, `logo`, `describe`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, 'Marketing', 'home-6_1607945919.png', 'affasdffadfsdfsdfdsaf', 0, '2020-12-14 04:38:39', '2020-12-20 07:40:07'),
(2, 'Dịch vụ code Web', '39407_nha-hang-la-vong-164873.jpg', '<p>Dịch vụ code web thu&ecirc; vinh</p>', 1, '2020-12-20 06:59:46', '2020-12-20 07:25:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('BLRJDslqfLZtJxqDLEc6B8gDmaNcXnPWxDooC65L', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSjFFa3dpYUwzSGFpZ3d6aXh2d2k1cDVWajBpU3JaWDNKUEF2ME9lUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3QvdGhlZG9vci9wdWJsaWMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1608608987);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `describe` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slides`
--

INSERT INTO `slides` (`id`, `image`, `link`, `title`, `describe`, `active_status`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, '62850_home-test.png', 'https://www.vietlaravel.com/huong-dan-tich-hop-ckeditor-va-ckfinder-chuan-nhat-cho-laravel.html', 'Slide thứ nhất', '<p>sdffdf</p>', 1, 1, '2020-12-21 20:02:54', '2020-12-21 20:10:50'),
(2, '23558_1.png', 'https://www.vietlaravel.com/huong-dan-tich-hop-ckeditor-va-ckfinder-chuan-nhat-cho-laravel.html', 'Slide test 133', '<p>xcvxcvxcvxc</p>', 1, 1, '2020-12-21 20:04:28', '2020-12-21 20:04:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_dept` bigint(20) UNSIGNED DEFAULT NULL,
  `staff_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `story` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `staff`
--

INSERT INTO `staff` (`id`, `id_dept`, `staff_name`, `slug`, `phone`, `address`, `email`, `photo`, `story`, `delete_status`, `created_at`, `updated_at`) VALUES
(5, 1, 'Phạm Trọng Vinh', 'pham-trong-vinh', '0365844889', 'Hà Tây', 'edit1@gmail.com', '86839_p3-o1.png', '<p>fwgw</p>', 1, NULL, '2020-12-21 19:54:06'),
(11, 2, 'Đỗ Ngọc Minh', 'do-ngoc-minh', '0365844890', 'Hà Tây', 'Minh@gmail.com', '75217_p3-o2.png', '<p>Đỗ Ngọc Minh</p>', 1, '2020-12-21 19:57:16', '2020-12-21 19:57:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_staff` int(11) NOT NULL,
  `delete_status` int(5) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `remember_token`, `current_team_id`, `profile_photo_path`, `id_staff`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$vG4WiZ/NbGAb/wveMZ.yFOyUd2ECNN6e3IsLKXK5dkwlBk5p79ENW', 1, NULL, NULL, NULL, 5, 1, NULL, NULL),
(9, 'Đỗ Ngọc Minh', 'Minh@gmail.com', NULL, '$2y$10$F24jC3hGkgEY/iy7mZO3MeKKoORzUibXccMn.F8fsjfGaP/syLrc6', 0, NULL, NULL, NULL, 11, 1, '2020-12-21 19:57:17', '2020-12-21 19:57:17');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidates_dept_id_foreign` (`dept_id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `depts`
--
ALTER TABLE `depts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `detail_products`
--
ALTER TABLE `detail_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_products_id_product_foreign` (`id_product`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `feed_backs`
--
ALTER TABLE `feed_backs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hire_pages`
--
ALTER TABLE `hire_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hire_pages_service_id_foreign` (`service_id`);

--
-- Chỉ mục cho bảng `layouts`
--
ALTER TABLE `layouts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_customer_foreign` (`id_customer`),
  ADD KEY `products_id_service_foreign` (`id_service`);

--
-- Chỉ mục cho bảng `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Chỉ mục cho bảng `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `depts`
--
ALTER TABLE `depts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `detail_products`
--
ALTER TABLE `detail_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `feed_backs`
--
ALTER TABLE `feed_backs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `hire_pages`
--
ALTER TABLE `hire_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `layouts`
--
ALTER TABLE `layouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `candidates`
--
ALTER TABLE `candidates`
  ADD CONSTRAINT `candidates_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `depts` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `detail_products`
--
ALTER TABLE `detail_products`
  ADD CONSTRAINT `detail_products_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `hire_pages`
--
ALTER TABLE `hire_pages`
  ADD CONSTRAINT `hire_pages_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_id_service_foreign` FOREIGN KEY (`id_service`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_id_dept_foreign` FOREIGN KEY (`id_dept`) REFERENCES `depts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
