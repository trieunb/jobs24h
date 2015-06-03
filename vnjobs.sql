-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2015 at 11:48 AM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vnjobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE IF NOT EXISTS `admin_info` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `username`, `email`, `password`, `persist_code`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@localhost.com', 'Vh5mcj7G3opFpYqk17689bf56646a00e4de2292e85dc8bf79efa5d09ec5ad9cf87a7ccde6916fc37', 'ad0c888777e8fa520fb482c3b994a9f5', '2015-05-07 01:17:35', '2015-05-17 19:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE IF NOT EXISTS `application` (
  `id` int(10) unsigned NOT NULL,
  `job_id` int(11) NOT NULL,
  `ntv_id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `nav_id` int(11) NOT NULL DEFAULT '1',
  `prefix_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `headline` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province_id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `folder_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `apply_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `job_id`, `ntv_id`, `cv_id`, `nav_id`, `prefix_title`, `first_name`, `last_name`, `headline`, `email`, `contact_phone`, `address`, `province_id`, `file_name`, `status`, `folder_id`, `created_at`, `updated_at`, `apply_date`) VALUES
(1, 2, 1, 1, 2, '', '123123', '123123', '123123', '', '', '', 0, '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2015-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `average_grade`
--

CREATE TABLE IF NOT EXISTS `average_grade` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blacklist_employers`
--

CREATE TABLE IF NOT EXISTS `blacklist_employers` (
  `id` int(10) unsigned NOT NULL,
  `ntv_id` int(11) NOT NULL,
  `ntd_id` int(11) NOT NULL,
  `blacklist_date` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL,
  `cat_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Bán hàng', 0, '2015-05-07 01:17:35', '2015-05-07 01:17:35'),
(2, 'Dịch vụ', 0, '2015-05-07 01:17:35', '2015-05-07 01:17:35'),
(3, 'Chăm sóc sức khỏe', 0, '2015-05-07 01:17:35', '2015-05-07 01:17:35'),
(4, 'Sản xuất', 0, '2015-05-07 01:17:35', '2015-05-07 01:17:35'),
(5, 'Hàng tiêu dùng', 0, '2015-05-07 01:17:35', '2015-05-07 01:17:35'),
(6, 'Máy tính / Công nghệ thông tin', 0, '2015-05-07 01:17:35', '2015-05-07 01:17:35'),
(7, 'Hành chính / Nhân sự', 0, '2015-05-07 01:17:35', '2015-05-07 01:17:35'),
(8, 'Kế toán / Tài chính', 0, '2015-05-07 01:17:35', '2015-05-07 01:17:35'),
(9, 'Truyền thông / Media', 0, '2015-05-07 01:17:35', '2015-05-07 01:17:35'),
(10, 'Xây dựng', 0, '2015-05-07 01:17:35', '2015-05-07 01:17:35'),
(11, 'Kỹ thuật', 0, '2015-05-07 01:17:35', '2015-05-07 01:17:35'),
(12, 'Giáo dục / Đào tạo', 0, '2015-05-07 01:17:35', '2015-05-07 01:17:35'),
(13, 'Khoa học', 0, '2015-05-07 01:17:35', '2015-05-07 01:17:35'),
(14, 'Khách sạn / Du lịch', 0, '2015-05-07 01:17:35', '2015-05-07 01:17:35'),
(15, 'Ngành khác', 0, '2015-05-07 01:17:35', '2015-05-07 01:17:35'),
(16, 'Bán hàng / Kinh doanh', 1, '2015-05-07 01:17:35', '2015-05-07 01:17:35'),
(17, 'Tiếp thị / Marketing/ Pr', 1, '2015-05-07 01:17:35', '2015-05-07 01:17:35'),
(18, 'Bán lẻ / Bán sỉ', 1, '2015-05-07 01:17:35', '2015-05-07 01:17:35');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(10) unsigned NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ntd_id` int(11) NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full_description` text COLLATE utf8_unicode_ci NOT NULL,
  `work_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_staff` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `video_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_images` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chonchungtoi` text COLLATE utf8_unicode_ci NOT NULL,
  `sodangky` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quymocty` int(11) NOT NULL,
  `nganhnghe` int(11) NOT NULL,
  `giolamviec` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngonngu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loaihinhhoatdong` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `ntd_id`, `website`, `logo`, `full_description`, `work_type`, `total_staff`, `video_link`, `company_images`, `company_address`, `contact_name`, `chonchungtoi`, `sodangky`, `quymocty`, `nganhnghe`, `giolamviec`, `ngonngu`, `loaihinhhoatdong`, `created_at`, `updated_at`) VALUES
(1, 'MP Telecom', 2, '', '', 'Sơ lược', '', '4', '', '["IqoPbuDhOVQ.jpg","zyjbAjWJXc6.png","3RzCDEMFk68.jpg"]', 'Địa chỉ công ty', 'Đạt', '', '', 0, 0, '', '', '', '2015-05-20 03:47:23', '2015-05-25 03:05:39');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(10) unsigned NOT NULL,
  `country_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Việt Nam', 0, '2015-05-07 01:17:35', '2015-05-07 01:17:35');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE IF NOT EXISTS `education` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Chưa tốt nghiệp', '2015-05-07 01:17:35', '2015-05-07 01:17:35'),
(2, 'Trung học', '2015-05-07 01:17:35', '2015-05-07 01:17:35'),
(3, 'Trung cấp', '2015-05-07 01:17:35', '2015-05-07 01:17:35'),
(4, 'Cao đẳng', '2015-05-07 01:17:35', '2015-05-07 01:17:35'),
(5, 'Sau đại học', '2015-05-07 01:17:35', '2015-05-07 01:17:35'),
(6, 'Khác', '2015-05-07 01:17:35', '2015-05-07 01:17:35');

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE IF NOT EXISTS `employers` (
  `id` int(10) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`id`, `email`, `password`, `position`, `address`, `province_id`, `country_id`, `phone_number`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin@localhost.com', '$2y$10$fouetGVRe8pvZKBdsUP6YOZxc0oz/TSCSlmgEOlS3YC8gmI.NaUW6', '', '', 0, 0, '', 0, 'hQPQnAYnzDhWXeVIdko1Axe7C0sdCMDxY5vShin0snm3VfQCUdwqkTakiaV7', '2015-05-20 03:47:23', '2015-05-27 04:07:50'),
(3, 'admin@localhost.com1', '$2y$10$fbSCZyjilA3fxBPZ85I8COC1Fthb9zM1LX8Q3PFjHuGGFIXjql.7a', '', '', 0, 0, '', 0, 'sbIS6itdBY5Y5D0HK3pFPO4WdEaxMVGPRs5srA8QeFOgogg09XooeiLO2aeC', '2015-05-20 04:14:39', '2015-05-20 04:15:30');

-- --------------------------------------------------------

--
-- Table structure for table `employer_folders`
--

CREATE TABLE IF NOT EXISTS `employer_folders` (
  `id` int(10) unsigned NOT NULL,
  `ntd_id` int(11) NOT NULL,
  `folder_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employer_folders`
--

INSERT INTO `employer_folders` (`id`, `ntd_id`, `folder_name`, `created_at`, `updated_at`) VALUES
(1, 2, 'CV VIP', '2015-05-26 00:03:05', '2015-05-26 00:48:47'),
(4, 2, 'CV PHP Developer', '2015-05-26 01:12:22', '2015-05-26 01:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `fields_in_work_exp`
--

CREATE TABLE IF NOT EXISTS `fields_in_work_exp` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(10) unsigned NOT NULL,
  `ntd_id` int(11) NOT NULL,
  `matin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vitri` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chucvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `namkinhnghiem` int(11) DEFAULT NULL,
  `bangcap` int(11) NOT NULL,
  `hinhthuc` int(11) NOT NULL,
  `gioitinh` int(11) NOT NULL,
  `dotuoi_min` int(11) NOT NULL,
  `dotuoi_max` int(11) NOT NULL,
  `mucluong_min` int(11) DEFAULT NULL,
  `mucluong_max` int(11) NOT NULL,
  `sltuyen` int(11) NOT NULL,
  `mota` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `quyenloi` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `yeucaukhac` text COLLATE utf8_unicode_ci NOT NULL,
  `hosogom` text COLLATE utf8_unicode_ci NOT NULL,
  `hannop` date NOT NULL,
  `hinhthucnop` int(11) NOT NULL,
  `keyword_tags` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nguoilienhe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_display` int(11) NOT NULL,
  `is_apply` int(11) NOT NULL DEFAULT '1',
  `expired_date` date NOT NULL,
  `dclienhe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emaillienhe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dienthoailienhe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `yeucaulienhe` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `ntd_id`, `matin`, `vitri`, `chucvu`, `namkinhnghiem`, `bangcap`, `hinhthuc`, `gioitinh`, `dotuoi_min`, `dotuoi_max`, `mucluong_min`, `mucluong_max`, `sltuyen`, `mota`, `quyenloi`, `yeucaukhac`, `hosogom`, `hannop`, `hinhthucnop`, `keyword_tags`, `nguoilienhe`, `is_display`, `is_apply`, `expired_date`, `dclienhe`, `emaillienhe`, `dienthoailienhe`, `yeucaulienhe`, `status`, `created_at`, `updated_at`, `slug`) VALUES
(2, 2, '100002', 'Nhân viên Lập trình web', 'Teamleader', 1, 3, 2, 1, 10, 20, 500, 1000, 50, '- Thực hiện công việc phát triển ứng dụng smartphone \r\n- Có cơ hội đi công tác tại Nhật Bản tùy theo từng dự án. \r\n- Chi tiết sẽ được trao đổi cụ thể hơn trong quá trình phỏng vấn.\r\n★ ĐỊA ĐIỂM LÀM VIỆC: ĐÀ NẴNG', '• Lương chính thức thỏa thuận ( lương thử việc 85% lương chính thức)\r\n• Được đóng bảo hiểm theo đúng quy định sau thời gian thử việc\r\n• Được hưởng chế độ thưởng tết, thưởng sinh nhật, du lịch nghỉ mát hàng năm', '', 'CV\r\nSơ yếu lí lịch', '2015-05-27', 0, '33333333333', 'dat', 0, 1, '2015-06-21', 'Đà Nẵng', 'phongdatgl@gmail.com', '0123123123', 'ádasdasdasd', 1, '2015-05-21 03:10:04', '2015-05-25 01:29:10', ''),
(3, 2, '100003', 'Nhân viên Lập trình web', 'Teamleader', 3, 2, 4, 1, 20, 30, 500, 1000, 50, '• Lương chính thức thỏa thuận ( lương thử việc 85% lương chính thức)\r\n• Được đóng bảo hiểm theo đúng quy định sau thời gian thử việc\r\n• Được hưởng chế độ thưởng tết, thưởng sinh nhật, du lịch nghỉ mát hàng năm', '• Lương chính thức thỏa thuận ( lương thử việc 85% lương chính thức)\r\n• Được đóng bảo hiểm theo đúng quy định sau thời gian thử việc\r\n• Được hưởng chế độ thưởng tết, thưởng sinh nhật, du lịch nghỉ mát hàng năm', '• Lương chính thức thỏa thuận ( lương thử việc 85% lương chính thức)\r\n• Được đóng bảo hiểm theo đúng quy định sau thời gian thử việc\r\n• Được hưởng chế độ thưởng tết, thưởng sinh nhật, du lịch nghỉ mát hàng năm', 'CV\r\nCMND', '2015-05-28', 0, '{"1":"","2":"","3":""}', '', 1, 1, '2015-06-21', '', '', '', '', 1, '2015-05-21 03:22:26', '2015-05-25 01:28:39', ''),
(4, 2, '100004', 'Nhân viên Lập trình web', 'Teamleader', 3, 2, 4, 1, 20, 30, 500, 1000, 50, '• Lương chính thức thỏa thuận ( lương thử việc 85% lương chính thức)\r\n• Được đóng bảo hiểm theo đúng quy định sau thời gian thử việc\r\n• Được hưởng chế độ thưởng tết, thưởng sinh nhật, du lịch nghỉ mát hàng năm', '• Lương chính thức thỏa thuận ( lương thử việc 85% lương chính thức)\r\n• Được đóng bảo hiểm theo đúng quy định sau thời gian thử việc\r\n• Được hưởng chế độ thưởng tết, thưởng sinh nhật, du lịch nghỉ mát hàng năm', '• Lương chính thức thỏa thuận ( lương thử việc 85% lương chính thức)\r\n• Được đóng bảo hiểm theo đúng quy định sau thời gian thử việc\r\n• Được hưởng chế độ thưởng tết, thưởng sinh nhật, du lịch nghỉ mát hàng năm', 'CV\r\nCMND', '2015-05-28', 0, '{"1":"","2":"","3":""}', '', 1, 1, '2015-06-21', '', '', '', '', 1, '2015-05-21 03:22:35', '2015-05-22 02:23:51', ''),
(5, 2, '100005', 'Nhân viên Lập trình web', 'Teamleader', 3, 2, 4, 1, 20, 30, 500, 1000, 50, '• Lương chính thức thỏa thuận ( lương thử việc 85% lương chính thức)\r\n• Được đóng bảo hiểm theo đúng quy định sau thời gian thử việc\r\n• Được hưởng chế độ thưởng tết, thưởng sinh nhật, du lịch nghỉ mát hàng năm', '• Lương chính thức thỏa thuận ( lương thử việc 85% lương chính thức)\r\n• Được đóng bảo hiểm theo đúng quy định sau thời gian thử việc\r\n• Được hưởng chế độ thưởng tết, thưởng sinh nhật, du lịch nghỉ mát hàng năm', '• Lương chính thức thỏa thuận ( lương thử việc 85% lương chính thức)\r\n• Được đóng bảo hiểm theo đúng quy định sau thời gian thử việc\r\n• Được hưởng chế độ thưởng tết, thưởng sinh nhật, du lịch nghỉ mát hàng năm', 'CV\r\nCMND', '2015-05-28', 0, '{"1":"","2":"","3":""}', '', 1, 0, '2015-06-21', '', '', '', '', 1, '2015-05-21 03:22:54', '2015-05-25 01:29:46', ''),
(9, 2, '100009', 'Nhân viên Lập trình web', 'Teamleader', 3, 2, 4, 1, 20, 30, 500, 1000, 50, '• Lương chính thức thỏa thuận ( lương thử việc 85% lương chính thức)\r\n• Được đóng bảo hiểm theo đúng quy định sau thời gian thử việc\r\n• Được hưởng chế độ thưởng tết, thưởng sinh nhật, du lịch nghỉ mát hàng năm', '• Lương chính thức thỏa thuận ( lương thử việc 85% lương chính thức)\r\n• Được đóng bảo hiểm theo đúng quy định sau thời gian thử việc\r\n• Được hưởng chế độ thưởng tết, thưởng sinh nhật, du lịch nghỉ mát hàng năm', '• Lương chính thức thỏa thuận ( lương thử việc 85% lương chính thức)\r\n• Được đóng bảo hiểm theo đúng quy định sau thời gian thử việc\r\n• Được hưởng chế độ thưởng tết, thưởng sinh nhật, du lịch nghỉ mát hàng năm', 'CV\r\nCMND', '2015-05-28', 0, '{"1":"","2":"","3":""}', '', 1, 1, '2015-06-21', '', '', '', '', 1, '2015-05-21 03:36:16', '2015-05-22 02:23:51', ''),
(10, 2, '100010', 'Nhân viên Lập trình web', 'Teamleader', 3, 2, 4, 1, 20, 30, 500, 1000, 50, '• Lương chính thức thỏa thuận ( lương thử việc 85% lương chính thức)\r\n• Được đóng bảo hiểm theo đúng quy định sau thời gian thử việc\r\n• Được hưởng chế độ thưởng tết, thưởng sinh nhật, du lịch nghỉ mát hàng năm', '• Lương chính thức thỏa thuận ( lương thử việc 85% lương chính thức)\r\n• Được đóng bảo hiểm theo đúng quy định sau thời gian thử việc\r\n• Được hưởng chế độ thưởng tết, thưởng sinh nhật, du lịch nghỉ mát hàng năm', '• Lương chính thức thỏa thuận ( lương thử việc 85% lương chính thức)\r\n• Được đóng bảo hiểm theo đúng quy định sau thời gian thử việc\r\n• Được hưởng chế độ thưởng tết, thưởng sinh nhật, du lịch nghỉ mát hàng năm', 'CV\r\nCMND', '2015-05-28', 0, '{"1":"","2":"","3":""}', '', 0, 1, '2015-06-21', '', '', '', '', 1, '2015-05-21 03:36:26', '2015-05-25 01:29:56', ''),
(11, 2, '100011', 'Nhân viên Lập trình web', 'Teamleader', 3, 2, 4, 1, 20, 30, 500, 1000, 50, '• Lương chính thức thỏa thuận ( lương thử việc 85% lương chính thức)\r\n• Được đóng bảo hiểm theo đúng quy định sau thời gian thử việc\r\n• Được hưởng chế độ thưởng tết, thưởng sinh nhật, du lịch nghỉ mát hàng năm', '• Lương chính thức thỏa thuận ( lương thử việc 85% lương chính thức)\r\n• Được đóng bảo hiểm theo đúng quy định sau thời gian thử việc\r\n• Được hưởng chế độ thưởng tết, thưởng sinh nhật, du lịch nghỉ mát hàng năm', '• Lương chính thức thỏa thuận ( lương thử việc 85% lương chính thức)\r\n• Được đóng bảo hiểm theo đúng quy định sau thời gian thử việc\r\n• Được hưởng chế độ thưởng tết, thưởng sinh nhật, du lịch nghỉ mát hàng năm', 'CV\r\nCMND', '2015-05-28', 0, '{"1":"","2":"","3":""}', '', 1, 1, '2015-06-21', '', '', '', '', 1, '2015-05-21 03:37:25', '2015-05-22 02:23:51', ''),
(14, 2, '100014', '★☆★ Lập Trình Viên Ios, Java, .net★☆★', 'Programmer', 1, 4, 1, 1, 20, 25, 300, 500, 5, '* Mô tả công việc:\r\n- Phát triển các dự án cho khách hàng Nhật;\r\n- Các công việc khác theo yêu cầu, chi tiết sẽ được trao đổi trong quá trình phỏng vấn.\r\n\r\n*** LƯU Ý: ỨNG VIÊN TRÚNG TUYỂN SẼ LÀM VIỆC TẠI ĐÀ NẴNG\r\n* Kỹ sư iOS (SL: 03): Có khả năng lập trình bằng ngôn ngữ Objective-C.\r\n* Kỹ sư .Net (SL: 10): Có khả năng trong lập trình bằng ngôn ngữ VB.Net , C#.Net,\r\n* Kỹ sư Java (SL: 07): Có khả năng lập trình bằng ngôn ngữ Java, JSP/Servlet (đối với kỹ sư Java) - Có kiến thức về triển khai ứng dụng trên môi trường Unix là một lợi thế.\r\n* Kỹ sư HTLM5 (SL: 05): Có kinh nghiệm phát triển bằng HTLM5\r\n\r\n* Yêu cầu chung:\r\n- Có khả năng phát triển với SQL Server và Oracle;\r\n- Có khả năng tự học và nắm bắt nhanh với các công nghệ mới;\r\n- Kỹ năng nói và viết tài liệu bằng tiếng Anh hoặc tiếng Nhật tốt, ưu tiên tiếng Nhật;\r\n- Làm việc với tinh thần trách nhiệm cao;\r\n- Ưu tiên ứng viên đã có kinh nghiệm làm các dự án IT cho khách hàng Nhật.\r\n\r\n* Quyền lợi:\r\n- Làm việc trong môi trường trẻ, năng động;\r\n- Có cơ chế hỗ trợ làm việc với thời gian linh hoạt;\r\n- Thời gian làm việc: 8 giờ/ngày (nghỉ trưa 1h), từ thứ 2 đến thứ 6; nghỉ thứ 7, CN;\r\n- Công ty hỗ trợ phụ cấp cơm trưa, đi lại và bảo hiểm theo luật định;\r\n- Lương cạnh tranh trả theo năng lực, có trả lương ngoài giờ;\r\n- Các quyền lợi khác được thực hiện đúng theo luật quy định.\r\n\r\n*** Chỉ nhận hồ sơ ứng tuyển bằng tiếng Anh\r\n\r\n(JapanWorks)\r\njapanesebeginner', '- Làm việc trong môi trường trẻ, năng động;\r\n- Có cơ chế hỗ trợ làm việc với thời gian linh hoạt;\r\n- Thời gian làm việc: 8 giờ/ngày (nghỉ trưa 1h), từ thứ 2 đến thứ 6; nghỉ thứ 7, CN;\r\n- Công ty hỗ trợ phụ cấp cơm trưa, đi lại và bảo hiểm theo luật định;\r\n- Lương cạnh tranh trả theo năng lực, có trả lương ngoài giờ;\r\n- Các quyền lợi khác được thực hiện đúng theo luật quy định.', '1', '2', '2015-05-28', 1, '{"1":"iOS","2":"PHP","3":"Java"}', 'Admin', 1, 1, '2015-06-21', '02 Quang Trung Đà Nẵng', 'admin@congty.com', '0909 909 909', '', 1, '2015-05-21 18:53:12', '2015-05-25 01:29:28', ''),
(15, 2, '100015', 'Senior PHP Developers', 'PHP Developer', 1, 4, 1, 0, 20, 30, 200, 500, 10, 'As a Senior PHP Developer you will be responsible for building robust and performance new features, and thus directly be an important part of Lazada''s success story.\r\n\r\nYour main responsibilities will be:\r\n\r\n●	Creating reliable, readable and maintainable code\r\n●	Implement new features and improve existing ones\r\n●	Support planning and testing features\r\n●	Profiling and optimization of existing features\r\n●	Proactively research for bottlenecks and propose your solutions', '', '●	Expert level knowledge of PHP and the according experience\r\n●	A strong sense for code quality, and experience with UT or TDD\r\n●	Knowledge of Zend or Yii Framework\r\n●	Experience working with a large codebase and versioning systems, ideally GIT\r\n●	Worked on tasks that are critical regarding performance or security\r\n●	Proactive, team player and positive attitude\r\n●	Intermediate to good English skills\r\n\r\nAny of these would be a big plus:\r\n\r\n●	Experience with integrating online payment providers\r\n●	Knowledge of Phalcon Framework\r\n●	Knowledge of Java / Scala / Python or Ruby', '', '2015-05-31', 0, '{"1":"","2":"","3":""}', 'Nguyễn Văn Đạt', 0, 1, '0000-00-00', 'Đà Nẵng', 'phongdatgl@gmail.com', '0123123123', '', 1, '2015-05-25 03:05:38', '2015-05-25 03:05:38', '');

-- --------------------------------------------------------

--
-- Table structure for table `jobseekers`
--

CREATE TABLE IF NOT EXISTS `jobseekers` (
  `id` int(10) unsigned NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permission` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activated` tinyint(4) NOT NULL,
  `activation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_login` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `persist_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `nghenghiep` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `phone_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `marital_status` tinyint(1) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province_id` int(11) NOT NULL,
  `district_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `nationality_id` int(11) NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gplus_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `linkedin_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subscribe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_publish` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jobseekers`
--

INSERT INTO `jobseekers` (`id`, `password`, `email`, `permission`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `first_name`, `last_name`, `full_name`, `date_of_birth`, `nghenghiep`, `gender`, `phone_number`, `marital_status`, `address`, `province_id`, `district_id`, `country_id`, `nationality_id`, `avatar`, `facebook_ID`, `gplus_ID`, `linkedin_ID`, `subscribe`, `created_at`, `updated_at`, `is_publish`) VALUES
(1, '8jU0oqPgFb27h86Eb49c566784ab8d09e4a0e9208e4519eb65', 'Kieu.Bien@hotmail.com', '', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 'Từ Lưu', '1970-03-07', '', 3, '0977 777 777', 1, '0031 Phó Harbor Apt. 017\nMabury, KS 08370', 38, '', 1, 0, '', '', '', '', '', '2015-05-07 01:17:37', '2015-05-12 03:03:21', 0),
(2, 'maf4Sh3HTGrd2UoFa078c12865d94bb45e2af3316c6afb7ae9', 'Bien.Truc@hotmail.com', '', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 'Trinh Doãn', '1976-11-18', '', 2, '0977 777 777', 0, '14214 An Brooks Suite 245\nNgânland, MA 30220-5667', 30, '', 1, 0, '', '', '', '', '', '2015-05-07 01:17:38', '2015-05-07 01:17:38', 0),
(3, 'aaNNJ1FkPHEgsVqW07da0b96156907dfc5961562eb48180558', 'Mai.Yen@Ma.info', '', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 'Mai', 'Yến', 'Vi Thân', '2004-03-15', '', 1, '0977 777 777', 1, '942 Trình Port Apt. 365Tâmchester, FL 04579', 32, '', 1, 0, '', '', '', '', '', '2015-05-07 01:17:38', '2015-05-15 00:17:57', 0),
(4, '0TSSICRHlAUuqQtE9148e187ff6bcc283cebf00be6317a78b4', 'Khang.Trac@Khu.com', '', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 'Khang', 'Trac', 'Ý Thái', '1976-05-18', '', 1, '0977 777 777', 1, '0365 Bảo ExtensionCườngborough, MS 49655-5256', 39, '', 1, 0, '', '', '', '', '', '2015-05-07 01:17:38', '2015-05-17 19:01:31', 0),
(5, 'EUUldRAKvBNgzOeh6aca68f7b9aaf598baeb5ed23e196a41c9', 'fPhuong@Du.com', '', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 'Giang Lê', '2005-09-20', '', 1, '0977 777 777', 1, '335 Nhàn Locks\nPort Hoànville, CA 95288-9843', 1, '', 1, 0, '', '', '', '', '', '2015-05-07 01:17:38', '2015-05-07 01:17:38', 0),
(6, 'fUxFcqCyh4b8wndAb28fcf1604f013c086ceb6bb55071d6294', 'rTon@gmail.com', '', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 'Kiệt Hán', '2009-08-23', '', 2, '0977 777 777', 0, '124 Tôn Underpass\nBạcton, AL 20616', 28, '', 1, 0, '', '', '', '', '', '2015-05-07 01:17:38', '2015-05-07 01:17:38', 0),
(7, 'MFaPxPDmiQjoRBMJ12819796c59db790b4addf20bd9a117d29', 'Hang81@hotmail.com', '', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 'Trung Trương', '1986-11-24', '', 2, '0977 777 777', 1, '7621 Dân Mill Suite 880\nLạiberg, HI 69042-4229', 31, '', 1, 0, '', '', '', '', '', '2015-05-07 01:17:38', '2015-05-07 01:17:38', 0),
(8, 'tP4y50qO9nqm9oveef5bde06962eeef1669253a3f909eb5875', 'Vi.Thuan@hotmail.com', '', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 'Hiệp An', '2012-07-03', '', 1, '0977 777 777', 1, '46102 Lợi Estate\nHiềnfort, MO 61344-3983', 1, '', 1, 0, '', '', '', '', '', '2015-05-07 01:17:38', '2015-05-07 01:17:38', 0),
(9, 'qYtNXJtEpizErIoOc84728ac57755a89520ec72e09a931b92b', 'nChiem@Tu.com', '', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 'Sa Phạm', '1990-02-18', '', 3, '0977 777 777', 1, '824 Trác Ranch\nSángberg, CA 67575-3820', 37, '', 1, 0, '', '', '', '', '', '2015-05-07 01:17:38', '2015-05-07 01:17:38', 0),
(10, 'H4x59SI8PIN77SWW578cdfea23e65257c9270c9a56d4c0f1ad', 'Hanh28@hotmail.com', '', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 'Minh Vừ', '1999-06-12', '', 2, '0977 777 777', 1, '172 Vũ Plains Apt. 558Lake Cơtown, DE 12371', 41, '', 1, 0, '', '', '', '', '', '2015-05-07 01:17:38', '2015-05-07 01:41:00', 0),
(11, '9cTIcL8kFotskPqY05735e0951dc482fa0d83ff6e02168c661', 'aChau@gmail.com', '', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 'Điệp Trương', '1984-02-11', '', 2, '0977 777 777', 2, '782 Hàn MountLake Nhànland, OR 56376-3667', 17, '', 1, 0, '', '', '', '', '', '2015-05-07 01:17:38', '2015-05-07 02:47:56', 0),
(12, 'E7xA8qDUUMaSaiWc1e7f667b76cb8757bb507ef6c8483330b9', 'qDu@To.com', '', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 'Mạnh Trác', '2003-04-03', '', 2, '0977 777 777', 1, '539 Lương Flats\nNinhside, LA 84814', 22, '', 1, 0, '', '', '', '', '', '2015-05-07 01:17:38', '2015-05-07 01:17:38', 0),
(13, 'PmtuywXD2Y3CoIbTbc7c2c035cfcde54a1a145b9c6afff95f3', 'kNghi@Bu.com', '', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 'Điền Tào', '1977-04-30', '', 2, '0977 777 777', 1, '4923 Lâm Run\nBồstad, OH 16369-2244', 49, '', 1, 0, '', '', '', '', '', '2015-05-07 01:17:38', '2015-05-07 01:17:38', 0),
(14, 'ADsM526GZLaRHptS36c46d48d7bdff6409664fb70f1df0af8a', 'C.Cong@gmail.com', '', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 'Quyền Bạch', '1986-04-19', '', 2, '0977 777 777', 0, '730 Lưu Meadows\nWest Hằng, SC 31493', 41, '', 1, 0, '', '', '', '', '', '2015-05-07 01:17:38', '2015-05-07 01:17:38', 0),
(15, 'cDoeYNPCg6l9Iyn7cde392561dab22a2ae15750e35eee502f6', 'nDu@Giao.com', '', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 'Nữ Thân', '2006-07-01', '', 3, '0977 777 777', 1, '627 Trương Valleys\nBìnhview, TX 45186', 23, '', 1, 0, '', '', '', '', '', '2015-05-07 01:17:38', '2015-05-07 01:17:38', 0),
(16, 'v6JqDBy92fqk5VFnef1253cb9a23e0a9a5e0be59ceddcd3adc', 'oBao@Au.info', '', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 'Tùng Mẫn', '2008-06-01', '', 1, '0977 777 777', 1, '0069 Tín Drive\nNew Pháp, KS 84333', 20, '', 1, 0, '', '', '', '', '', '2015-05-07 01:17:38', '2015-05-07 01:17:38', 0),
(17, 'NquMepwzX6hYJas87cbea9dde83da3be758915fac3ec8e0326', 'Chinh68@Dng.info', '', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 'Vi Hoa', '2012-02-26', '', 2, '0977 777 777', 0, '6177 Lê Ferry\nTôbury, RI 19017', 5, '', 1, 0, '', '', '', '', '', '2015-05-07 01:17:38', '2015-05-07 01:17:38', 0),
(18, 'WQvQa6M1pSIrgAEx85cd10441fa8f38796a23daeefeee331a3', 'kTruong@hotmail.com', '', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 'Hợp Hạ', '1989-12-16', '', 3, '0977 777 777', 0, '9384 Sương Ramp\nTráchaven, CO 90507', 47, '', 1, 0, '', '', '', '', '', '2015-05-07 01:17:38', '2015-05-07 01:17:38', 0),
(19, 'NYUgPIztcEYn6OuJf58ec34cfe9635b4a3acbe52a3627bbd5d', 'vCu@Le.net', '', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 'Kiều Cầm', '1991-09-02', '', 1, '0977 777 777', 1, '4576 Uông Plaza Suite 610\nSouth Trụ, MT 95857', 10, '', 1, 0, '', '', '', '', '', '2015-05-07 01:17:38', '2015-05-07 01:17:38', 0),
(20, 'mcLJt03mKI6V0QyC9456c8ffdbb1b698c792f99f7a11184d41', 'Thinh.Hoai@Banh.biz', '', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 'Nhân Lữ', '1983-10-05', '', 3, '0977 777 777', 0, '7220 Cam Key\nNorth Khêton, NY 30482-6972', 47, '', 1, 0, '', '', '', '', '', '2015-05-07 01:17:38', '2015-05-07 01:17:38', 0),
(21, '0idcdPTFnS9b1uJ779357bb27f8592afe14f00eb3a2142f708', 'tLam@hotmail.com', '', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 'Thành', 'Lâm', 'Lan Đái', '1971-08-18', '', 2, '0977 777 777', 1, '79801 Chung CrossingNorth Kimburgh, DC 31656-4267', 29, '', 1, 0, '', '', '', '', '', '2015-05-07 01:17:38', '2015-05-15 00:17:12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(10) unsigned NOT NULL,
  `lang_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `lang_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `lang_code`, `lang_name`, `created_at`, `updated_at`) VALUES
(1, '', 'Bengali', '2015-05-07 01:17:35', '2015-05-07 01:17:35'),
(2, '', 'Bulgarian', '2015-05-07 01:17:35', '2015-05-07 01:17:35'),
(3, '', 'Burmese', '2015-05-07 01:17:35', '2015-05-07 01:17:35'),
(4, '', 'Cambodian', '2015-05-07 01:17:35', '2015-05-07 01:17:35'),
(5, '', 'Cebuano', '2015-05-07 01:17:35', '2015-05-07 01:17:35'),
(6, '', 'Chinese (Cantonese)', '2015-05-07 01:17:35', '2015-05-07 01:17:35'),
(7, '', 'Chinese (Mandarin)', '2015-05-07 01:17:35', '2015-05-07 01:17:35'),
(8, '', 'Czech', '2015-05-07 01:17:35', '2015-05-07 01:17:35'),
(9, '', 'Danish', '2015-05-07 01:17:35', '2015-05-07 01:17:35'),
(10, '', 'Dutch', '2015-05-07 01:17:35', '2015-05-07 01:17:35'),
(11, '', 'English', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(12, '', 'Finnish', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(13, '', 'French', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(14, '', 'German', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(15, '', 'Greek', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(16, '', 'Hindi', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(17, '', 'Hungarian', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(18, '', 'Indonesian', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(19, '', 'Italian', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(20, '', 'Japanese', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(21, '', 'Javanese', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(22, '', 'Korean', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(23, '', 'Laotian', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(24, '', 'Malay', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(25, '', 'Norwegian', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(26, '', 'Polish', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(27, '', 'Portuguese', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(28, '', 'Romanian', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(29, '', 'Russian', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(30, '', 'Spanish', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(31, '', 'Swedish', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(32, '', 'Tagolog', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(33, '', 'Taiwanese', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(34, '', 'Thai', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(35, '', 'Turkish', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(36, '', 'Ukranian', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(37, '', 'Vietnamese', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(38, '', 'Khác', '2015-05-07 01:17:36', '2015-05-07 01:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE IF NOT EXISTS `levels` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Sinh viên / thực tập sinh', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(2, 'Mới tốt nghiệp', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(3, 'Nhân viên', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(4, 'Trưởng nhóm/ giám sát', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(5, 'Quản lý', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(6, 'Phó giám đốc', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(7, 'Giám đốc', '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(8, 'Phó chủ tịch', '2015-05-07 01:17:36', '2015-05-07 01:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `level_languages`
--

CREATE TABLE IF NOT EXISTS `level_languages` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2012_12_06_225921_migration_cartalyst_sentry_install_users', 1),
('2012_12_06_225929_migration_cartalyst_sentry_install_groups', 1),
('2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot', 1),
('2012_12_06_225988_migration_cartalyst_sentry_install_throttle', 1),
('2015_04_22_075932_create_admin_info_table', 2),
('2015_05_07_022139_create_jobseekers_table', 2),
('2015_05_07_022640_create_my_jobs_table', 3),
('2015_05_07_022844_create_resumes_table', 3),
('2015_05_07_023157_create_mt_languages_table', 3),
('2015_05_07_023301_create_languages_table', 3),
('2015_05_07_023408_create_mt_work_locations_table', 3),
('2015_05_07_023500_create_mt_categories_table', 3),
('2015_05_07_023559_create_certificates_table', 3),
('2015_05_07_023744_create_categories_table', 3),
('2015_05_07_023905_create_mt_letters_table', 3),
('2015_05_07_023959_create_mt_contacts_table', 3),
('2015_05_07_024113_create_mt_work_exps_table', 3),
('2015_05_07_024228_create_provinces_table', 3),
('2015_05_07_024354_create_countries_table', 3),
('2015_05_07_024521_create_mt_education_history_table', 4),
('2015_05_07_024744_create_work_types_table', 4),
('2015_05_07_024856_create_levels_table', 4),
('2015_05_07_024920_create_education_table', 4),
('2015_05_07_025002_create_blacklist_employers_table', 4),
('2015_05_07_073840_add_resumes_table', 5),
('2015_05_07_075318_add_mt_work_exps_table', 6),
('2015_05_07_075747_add_resumes_table', 7),
('2015_05_12_015747_add_jobseekers_table', 8),
('2015_05_13_015633_add_jobseekers1_table', 9),
('2015_05_13_045458_create_mt_certificates_table', 10),
('2015_05_12_080227_create_throttle_table', 11),
('2015_05_15_012016_add_jobseekers_v2_table', 11),
('2015_05_15_094757_create_level_languages_table', 11),
('2015_05_16_162024_add_jobseekers_v3_table', 11),
('2015_05_18_085035_add_mt_work_exps', 11),
('2015_05_18_093217_create_fields_in_work_exp_table', 11),
('2015_05_18_101133_create_specialized_table', 11),
('2015_05_18_113848_create_companies_table', 11),
('2015_05_18_154431_create_average_grade_table', 11),
('2015_05_18_155256_add_mt_education_history_table', 12),
('2015_05_20_091512_create_employers_table', 12),
('2015_05_20_104249_add_companies_table', 13),
('2015_05_20_105250_add_employers1_table', 14),
('2015_05_20_112621_create_jobs_table', 15),
('2015_05_21_013844_add_jobs_table', 16),
('2015_05_21_014442_add_jobs_table', 17),
('2015_05_21_015653_add_jobs_table', 18),
('2015_05_21_015811_add_jobs_table', 19),
('2015_05_21_020545_add_jobs1_table', 20),
('2015_05_21_022303_add_jobs2_table', 21),
('2015_05_21_042843_add_jobs2_table', 22),
('2015_05_21_043107_add_jobs2_table', 23),
('2015_05_21_092928_add_mt_categories_table', 24),
('2015_05_21_093048_add_mt_work_locations_table', 24),
('2015_05_21_112414_add_jobs3_table', 25),
('2015_05_22_021320_add_jobs4_table', 26),
('2015_05_22_022155_add_jobs4_table', 27),
('2015_05_22_033133_add_jobs5_table', 28),
('2015_05_20_024642_add_mt_language_table', 29),
('2015_05_20_031801_add_mt_categories_table', 29),
('2015_05_20_031838_add_mt_work_location_table', 29),
('2015_05_25_072037_create_application_table', 29),
('2015_05_25_072829_add_my_job_v1_table', 29),
('2015_05_25_081606_add_jobs_v1_table', 29),
('2015_05_26_032824_add_application_v1_table', 29),
('2015_05_26_033041_create_employer_folders_table', 30),
('2015_05_26_043016_create_saved_cv_table', 31),
('2015_05_26_043708_add_application_table', 31),
('2015_05_26_044402_add_application_table', 32),
('2015_05_26_071634_add_application2_table', 33),
('2015_05_26_075723_add_application3_table', 34),
('2015_05_26_093436_add_application4_table', 35),
('2015_05_27_070321_add_companies1_table', 36),
('2015_05_27_070902_add_companies2_table', 37),
('2015_05_29_014925_add_jobseekers_v4_table', 38);

-- --------------------------------------------------------

--
-- Table structure for table `mt_categories`
--

CREATE TABLE IF NOT EXISTS `mt_categories` (
  `id` int(10) unsigned NOT NULL,
  `rs_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `mt_type` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `count_cate` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mt_categories`
--

INSERT INTO `mt_categories` (`id`, `rs_id`, `job_id`, `mt_type`, `cat_id`, `created_at`, `updated_at`, `count_cate`) VALUES
(2, 2, 0, 1, 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(3, 2, 0, 1, 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(4, 3, 0, 1, 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(5, 3, 0, 1, 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(6, 3, 0, 1, 18, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(7, 4, 0, 1, 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(8, 0, 1, 2, 18, '2015-05-21 02:55:47', '2015-05-21 02:55:47', 0),
(9, 0, 2, 2, 18, '2015-05-21 03:10:05', '2015-05-21 03:10:05', 0),
(10, 0, 3, 2, 17, '2015-05-21 03:22:26', '2015-05-21 03:22:26', 0),
(11, 0, 4, 2, 17, '2015-05-21 03:22:36', '2015-05-21 03:22:36', 0),
(12, 0, 5, 2, 17, '2015-05-21 03:22:54', '2015-05-21 03:22:54', 0),
(13, 0, 6, 2, 17, '2015-05-21 03:23:20', '2015-05-21 03:23:20', 0),
(14, 0, 7, 2, 17, '2015-05-21 03:35:28', '2015-05-21 03:35:28', 0),
(15, 0, 8, 2, 17, '2015-05-21 03:35:37', '2015-05-21 03:35:37', 0),
(18, 0, 11, 2, 17, '2015-05-21 03:37:26', '2015-05-21 03:37:26', 0),
(19, 0, 12, 2, 18, '2015-05-21 03:59:19', '2015-05-21 03:59:19', 0),
(20, 0, 13, 2, 17, '2015-05-21 18:47:51', '2015-05-21 18:47:51', 0),
(33, 0, 14, 2, 16, '2015-05-22 04:07:17', '2015-05-22 04:07:17', 0),
(34, 0, 14, 2, 18, '2015-05-22 04:07:17', '2015-05-22 04:07:17', 0),
(35, 0, 9, 2, 17, '2015-05-22 18:24:53', '2015-05-22 18:24:53', 0),
(36, 0, 9, 2, 18, '2015-05-22 18:24:53', '2015-05-22 18:24:53', 0),
(37, 0, 15, 2, 16, '2015-05-25 03:05:39', '2015-05-25 03:05:39', 0),
(38, 0, 15, 2, 18, '2015-05-25 03:05:39', '2015-05-25 03:05:39', 0),
(39, 0, 10, 2, 17, '2015-05-25 04:27:05', '2015-05-25 04:27:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mt_certificates`
--

CREATE TABLE IF NOT EXISTS `mt_certificates` (
  `id` int(10) unsigned NOT NULL,
  `rs_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mt_contacts`
--

CREATE TABLE IF NOT EXISTS `mt_contacts` (
  `id` int(10) unsigned NOT NULL,
  `rs_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `another_phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mt_education_history`
--

CREATE TABLE IF NOT EXISTS `mt_education_history` (
  `id` int(10) unsigned NOT NULL,
  `rs_id` int(11) NOT NULL,
  `school` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `study_from` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `study_to` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `achievement` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `average_grade_id` int(11) NOT NULL,
  `field_of_study` int(11) NOT NULL,
  `specialized` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mt_languages`
--

CREATE TABLE IF NOT EXISTS `mt_languages` (
  `id` int(10) unsigned NOT NULL,
  `rs_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `count_lang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mt_letters`
--

CREATE TABLE IF NOT EXISTS `mt_letters` (
  `id` int(10) unsigned NOT NULL,
  `rs_id` int(11) NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mt_work_exps`
--

CREATE TABLE IF NOT EXISTS `mt_work_exps` (
  `id` int(10) unsigned NOT NULL,
  `rs_id` int(11) NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `from_date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `to_date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `specialized` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `salary` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mt_work_locations`
--

CREATE TABLE IF NOT EXISTS `mt_work_locations` (
  `id` int(10) unsigned NOT NULL,
  `rs_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `mt_type` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `count_work_location` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mt_work_locations`
--

INSERT INTO `mt_work_locations` (`id`, `rs_id`, `job_id`, `mt_type`, `province_id`, `created_at`, `updated_at`, `count_work_location`) VALUES
(13, 2, 0, 1, 1, '2015-05-14 21:58:00', '2015-05-14 21:58:00', 0),
(14, 2, 0, 1, 2, '2015-05-14 21:58:00', '2015-05-14 21:58:00', 0),
(15, 2, 0, 1, 6, '2015-05-14 21:58:00', '2015-05-14 21:58:00', 0),
(16, 3, 0, 1, 4, '2015-05-14 23:30:27', '2015-05-14 23:30:27', 0),
(17, 3, 0, 1, 5, '2015-05-14 23:30:27', '2015-05-14 23:30:27', 0),
(18, 3, 0, 1, 8, '2015-05-14 23:30:27', '2015-05-14 23:30:27', 0),
(22, 4, 0, 1, 1, '2015-05-15 03:41:10', '2015-05-15 03:41:10', 0),
(23, 4, 0, 1, 2, '2015-05-15 03:41:10', '2015-05-15 03:41:10', 0),
(24, 0, 1, 2, 3, '2015-05-21 02:55:47', '2015-05-21 02:55:47', 0),
(25, 0, 2, 2, 5, '2015-05-21 03:10:04', '2015-05-21 03:10:04', 0),
(26, 0, 3, 2, 3, '2015-05-21 03:22:26', '2015-05-21 03:22:26', 0),
(27, 0, 4, 2, 3, '2015-05-21 03:22:36', '2015-05-21 03:22:36', 0),
(28, 0, 5, 2, 3, '2015-05-21 03:22:54', '2015-05-21 03:22:54', 0),
(29, 0, 6, 2, 3, '2015-05-21 03:23:20', '2015-05-21 03:23:20', 0),
(30, 0, 7, 2, 3, '2015-05-21 03:35:28', '2015-05-21 03:35:28', 0),
(31, 0, 8, 2, 3, '2015-05-21 03:35:37', '2015-05-21 03:35:37', 0),
(34, 0, 11, 2, 3, '2015-05-21 03:37:25', '2015-05-21 03:37:25', 0),
(35, 0, 12, 2, 3, '2015-05-21 03:59:19', '2015-05-21 03:59:19', 0),
(36, 0, 13, 2, 48, '2015-05-21 18:47:51', '2015-05-21 18:47:51', 0),
(51, 0, 14, 2, 2, '2015-05-22 04:07:17', '2015-05-22 04:07:17', 0),
(52, 0, 14, 2, 4, '2015-05-22 04:07:17', '2015-05-22 04:07:17', 0),
(53, 0, 9, 2, 3, '2015-05-22 18:24:53', '2015-05-22 18:24:53', 0),
(54, 0, 9, 2, 5, '2015-05-22 18:24:53', '2015-05-22 18:24:53', 0),
(55, 0, 15, 2, 1, '2015-05-25 03:05:39', '2015-05-25 03:05:39', 0),
(56, 0, 15, 2, 3, '2015-05-25 03:05:39', '2015-05-25 03:05:39', 0),
(57, 0, 10, 2, 3, '2015-05-25 04:27:05', '2015-05-25 04:27:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `my_jobs`
--

CREATE TABLE IF NOT EXISTS `my_jobs` (
  `id` int(10) unsigned NOT NULL,
  `save_date` date NOT NULL,
  `respond` text COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ntv_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `job_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE IF NOT EXISTS `provinces` (
  `id` int(10) unsigned NOT NULL,
  `province_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `province_name`, `country_id`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Hồ Chí Minh', 1, 1, '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(2, 'Hà Nội', 1, 1, '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(3, 'Đà Nẵng', 1, 1, '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(4, 'An Giang', 1, 1, '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(5, 'Bà Rịa - Vũng Tàu', 1, 1, '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(6, 'Bắc Cạn', 1, 1, '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(7, 'Bắc Giang', 1, 1, '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(8, 'Bạc Liêu', 1, 1, '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(9, 'Bắc Ninh', 1, 1, '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(10, 'Bến Tre', 1, 1, '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(11, 'Bình Định', 1, 1, '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(12, 'Bình Dương', 1, 1, '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(13, 'Bình Phước', 1, 1, '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(14, 'Bình Thuận', 1, 1, '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(15, 'Cà Mau', 1, 1, '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(16, 'Cần Thơ', 1, 1, '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(17, 'Cao Bằng', 1, 1, '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(18, 'Đắk Lắk', 1, 1, '2015-05-07 01:17:36', '2015-05-07 01:17:36'),
(19, 'Đăk Nông', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(20, 'Điện Biên', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(21, 'Đồng Nai', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(22, 'Đồng Tháp', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(23, 'Gia Lai', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(24, 'Hà Giang', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(25, 'Hà Nam', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(26, 'Hà Tây', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(27, 'Hà Tĩnh', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(28, 'Hải Dương', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(29, 'Hải Phòng', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(30, 'Hậu Giang', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(31, 'Hòa Bình', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(32, 'Hưng Yên', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(33, 'Kiên Giang', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(34, 'Khánh Hòa', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(35, 'Kon Tum', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(36, 'Lai Châu', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(37, 'Lâm Đồng', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(38, 'Lạng Sơn', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(39, 'Lào Cai', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(40, 'Long An', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(41, 'Nam Định', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(42, 'Nghệ An', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(43, 'Ninh Bình', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(44, 'Ninh Thuận', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(45, 'Phú Thọ', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(46, 'Phú Yên', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(47, 'Quảng Bình', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(48, 'Quảng Nam', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(49, 'Quảng Ngãi', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(50, 'Quảng Ninh', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(51, 'Quảng Trị', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(52, 'Sóc Trăng', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(53, 'Sơn La', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(54, 'Tây Ninh', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(55, 'Thái Bình', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(56, 'Thái Nguyên', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(57, 'Thanh Hóa', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(58, 'Thừa Thiên - Huế', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(59, 'Tiền Giang', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(60, 'Trà Vinh', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(61, 'Tuyên Quang', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(62, 'Vĩnh Long', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(63, 'Vĩnh Phúc', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(64, 'Yên Bái', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(65, 'Khác', 1, 1, '2015-05-07 01:17:37', '2015-05-07 01:17:37');

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

CREATE TABLE IF NOT EXISTS `resumes` (
  `id` int(10) unsigned NOT NULL,
  `ntv_id` int(11) NOT NULL,
  `tieude_cv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `namkinhnghiem` int(11) NOT NULL,
  `bangcapcaonhat` int(11) NOT NULL,
  `ctyganday` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cvganday` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `capbachientai` int(11) NOT NULL,
  `vitrimongmuon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `capbacmongmuon` int(11) NOT NULL,
  `mucluong` int(11) NOT NULL,
  `loaitien` int(11) NOT NULL,
  `dinhhuongnn` text COLLATE utf8_unicode_ci NOT NULL,
  `kynang` text COLLATE utf8_unicode_ci NOT NULL,
  `danhgiabanthan` text COLLATE utf8_unicode_ci NOT NULL,
  `sothich` text COLLATE utf8_unicode_ci NOT NULL,
  `hinhthuclamviec` int(11) NOT NULL,
  `loaihs` tinyint(4) NOT NULL,
  `trangthai` tinyint(4) NOT NULL,
  `is_public` tinyint(1) NOT NULL,
  `is_visible` tinyint(1) NOT NULL,
  `is_default` tinyint(4) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `resumes`
--

INSERT INTO `resumes` (`id`, `ntv_id`, `tieude_cv`, `namkinhnghiem`, `bangcapcaonhat`, `ctyganday`, `cvganday`, `capbachientai`, `vitrimongmuon`, `capbacmongmuon`, `mucluong`, `loaitien`, `dinhhuongnn`, `kynang`, `danhgiabanthan`, `sothich`, `hinhthuclamviec`, `loaihs`, `trangthai`, `is_public`, `is_visible`, `is_default`, `file_name`, `created_at`, `updated_at`) VALUES
(2, 5, 'Lập trình viên PHP', 3, 5, 'Digitalship', 'Lập trình viên', 3, 'Giám đốc', 3, 0, 1, 'làm giám đốc\r\nmở công ty', 'HTML CSS\r\njQUEYR\r\nPHP\r\nLaravel', 'tu duy tốt\r\nham học hỏi', 'game, internet, bóng đá, sdfsdfsdf', 3, 0, 1, 1, 0, 1, '', '2015-05-12 21:27:20', '2015-05-14 23:30:12'),
(3, 3, 'Lập trình viên', 1, 2, 'Minh Phúc', 'Lập trình viên', 3, 'Giám đốc', 2, 100, 1, 'Đi chơi', 'HTML/CSS\r\njQuery\r\n', 'tư duy\r\nhọc hỏi', 'games, internet', 1, 0, 1, 1, 0, 1, '', '2015-05-13 04:11:16', '2015-05-14 23:30:27'),
(4, 4, 'ádasdasd', 0, 1, '', '', 1, 'ádasdasd', 1, 250, 1, '', '', '', '', 1, 0, 1, 1, 0, 1, '', '2015-05-15 03:40:39', '2015-05-15 19:11:38');

-- --------------------------------------------------------

--
-- Table structure for table `saved_cv`
--

CREATE TABLE IF NOT EXISTS `saved_cv` (
  `id` int(10) unsigned NOT NULL,
  `rs_id` int(11) NOT NULL,
  `folder_id` int(11) NOT NULL,
  `saved_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specialized`
--

CREATE TABLE IF NOT EXISTS `specialized` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE IF NOT EXISTS `throttle` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attempts` int(11) NOT NULL,
  `suspended` tinyint(4) NOT NULL,
  `banned` tinyint(4) NOT NULL,
  `last_attempt_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `suspended_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `banned_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `work_types`
--

CREATE TABLE IF NOT EXISTS `work_types` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `work_types`
--

INSERT INTO `work_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Nhân viên chính thức', '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(2, 'Nhân viên thời vụ', '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(3, 'Bán thời gian', '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(4, 'Làm thêm ngoài giờ', '2015-05-07 01:17:37', '2015-05-07 01:17:37'),
(5, 'Thực tập và dự án', '2015-05-07 01:17:37', '2015-05-07 01:17:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `average_grade`
--
ALTER TABLE `average_grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blacklist_employers`
--
ALTER TABLE `blacklist_employers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer_folders`
--
ALTER TABLE `employer_folders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fields_in_work_exp`
--
ALTER TABLE `fields_in_work_exp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `groups_name_unique` (`name`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobseekers`
--
ALTER TABLE `jobseekers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_languages`
--
ALTER TABLE `level_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mt_categories`
--
ALTER TABLE `mt_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mt_certificates`
--
ALTER TABLE `mt_certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mt_contacts`
--
ALTER TABLE `mt_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mt_education_history`
--
ALTER TABLE `mt_education_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mt_languages`
--
ALTER TABLE `mt_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mt_letters`
--
ALTER TABLE `mt_letters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mt_work_exps`
--
ALTER TABLE `mt_work_exps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mt_work_locations`
--
ALTER TABLE `mt_work_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_jobs`
--
ALTER TABLE `my_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resumes`
--
ALTER TABLE `resumes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_cv`
--
ALTER TABLE `saved_cv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialized`
--
ALTER TABLE `specialized`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`), ADD KEY `users_activation_code_index` (`activation_code`), ADD KEY `users_reset_password_code_index` (`reset_password_code`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`user_id`,`group_id`);

--
-- Indexes for table `work_types`
--
ALTER TABLE `work_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `average_grade`
--
ALTER TABLE `average_grade`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blacklist_employers`
--
ALTER TABLE `blacklist_employers`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `employer_folders`
--
ALTER TABLE `employer_folders`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fields_in_work_exp`
--
ALTER TABLE `fields_in_work_exp`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `jobseekers`
--
ALTER TABLE `jobseekers`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `level_languages`
--
ALTER TABLE `level_languages`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mt_categories`
--
ALTER TABLE `mt_categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `mt_certificates`
--
ALTER TABLE `mt_certificates`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mt_contacts`
--
ALTER TABLE `mt_contacts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mt_education_history`
--
ALTER TABLE `mt_education_history`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mt_languages`
--
ALTER TABLE `mt_languages`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mt_letters`
--
ALTER TABLE `mt_letters`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mt_work_exps`
--
ALTER TABLE `mt_work_exps`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mt_work_locations`
--
ALTER TABLE `mt_work_locations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `my_jobs`
--
ALTER TABLE `my_jobs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `resumes`
--
ALTER TABLE `resumes`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `saved_cv`
--
ALTER TABLE `saved_cv`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `specialized`
--
ALTER TABLE `specialized`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `work_types`
--
ALTER TABLE `work_types`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
