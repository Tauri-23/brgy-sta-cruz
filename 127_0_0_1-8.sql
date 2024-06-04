-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 04:55 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barangay_santa_cruz_makati`
--
CREATE DATABASE IF NOT EXISTS `barangay_santa_cruz_makati` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `barangay_santa_cruz_makati`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` varchar(6) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
('100000', 'brgystacruz.test@gmail.com', 'brgystacruzadmin123', '2024-05-14 05:31:30', '2024-05-14 05:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` varchar(6) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `pic`, `content`, `featured`, `created_at`, `updated_at`) VALUES
('627049', 'Announcement 4', '8mZVljk8GaSjYkbF7QBopbal.jpg', '<p style=\"margin-bottom: 15px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras bibendum felis commodo lectus pellentesque, in sagittis risus fermentum. Nullam facilisis lorem nisl, sit amet ultricies odio fermentum id. Nunc id felis elit. Praesent luctus eleifend porta. Nulla iaculis mi non eros scelerisque, sed pellentesque quam porta. Vivamus vel nibh ligula. Praesent quis convallis turpis, at fringilla nibh. Duis non felis erat. Etiam rutrum semper mauris, vitae sollicitudin neque aliquet eget. Duis molestie ullamcorper ipsum eu rutrum. Maecenas eu suscipit lacus.</p><p style=\"margin-bottom: 15px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Phasellus non fermentum urna, ut tempor orci. Donec euismod massa odio, vitae tempus elit aliquet in. Nulla facilisi. Integer consectetur at diam a vulputate. Donec id lobortis tortor, a scelerisque lectus. Quisque porttitor at mauris et semper. Sed faucibus massa sed magna maximus maximus. In leo sem, molestie ut nulla sed, luctus sodales diam.</p><p style=\"margin-bottom: 15px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Sed eu venenatis elit. Praesent quis convallis nisl. Morbi in justo hendrerit, sagittis velit eu, feugiat velit. Praesent felis neque, dignissim at commodo a, interdum id quam. Nulla ornare, magna non blandit gravida, quam massa dapibus purus, sed interdum dui neque in massa. Vivamus non ligula eleifend, consectetur arcu vel, accumsan nulla. Proin eget condimentum lacus, a aliquet dolor. Praesent pharetra elementum cursus. Donec maximus ornare ex, at mollis ipsum consectetur id. Proin pharetra id dui non mollis. Maecenas non tempor augue. Pellentesque facilisis ultricies nibh eu pretium. Donec vehicula interdum dolor id interdum. Nullam nisl nulla, dignissim non dui ac, molestie gravida sapien.</p><p style=\"margin-bottom: 15px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Phasellus sed ipsum ultrices erat pulvinar bibendum et eu nunc. Proin feugiat est ut commodo consequat. Etiam viverra sit amet diam id feugiat. Pellentesque ut quam vel eros egestas mollis. Ut eget augue quis lectus posuere dictum. Proin placerat, nisl sed euismod interdum, ante lectus mollis arcu, a consectetur sapien ex id orci. Suspendisse sed quam dolor. Sed malesuada metus ut vulputate molestie.</p><p style=\"margin-bottom: 15px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Vestibulum sapien velit, iaculis non tristique ac, lobortis vitae metus. Integer neque arcu, suscipit eu molestie eget, blandit vitae augue. Morbi sollicitudin, orci eu mollis faucibus, risus nibh tempor est, vitae faucibus mauris tellus at tellus. Vestibulum venenatis nibh non pellentesque elementum. Cras leo mi, hendrerit ac eros nec, tempor mattis dolor. Proin lectus purus, ultrices tincidunt bibendum sit amet, scelerisque at lorem. Aliquam at varius sapien, vitae aliquam eros. Cras semper purus vitae sem auctor, eget porttitor est dignissim. Ut molestie ultricies magna, eget ullamcorper neque commodo at. Etiam aliquam mi non interdum porta. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel aliquet lectus, non volutpat magna.</p>', 0, '2024-05-15 05:28:24', '2024-05-15 05:28:24'),
('692862', 'Announcement 2', '1WX47gANTrKzQOD3sOZ7X2oL.png', '<p style=\"margin-bottom: 15px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><ul><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum purus augue, consequat vitae velit et, tempor feugiat nisl. Cras malesuada lacus vitae lacus elementum semper. Curabitur et quam ac urna pellentesque sollicitudin. Donec sed laoreet turpis. Aliquam ut dui sed massa luctus efficitur. In nec mi et turpis commodo viverra quis sed velit. Aliquam pulvinar risus ut sem luctus venenatis. Nulla sed metus gravida, semper elit nec, condimentum lectus. Nulla mi turpis, ultricies nec lacus sed, fringilla eleifend leo. Integer sed nibh tempus, blandit tellus vitae, maximus magna.</li></ul></p><p style=\"margin-bottom: 15px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><ol><li>Aenean tincidunt venenatis tincidunt. Praesent non ligula blandit, malesuada massa a, venenatis neque. Vivamus vulputate id sem eu dignissim. Mauris semper elit vitae orci bibendum consequat. Etiam a eros gravida, pellentesque nisi vitae, vestibulum ex. Aenean semper eu diam vel pharetra. Aliquam at imperdiet erat. Cras hendrerit, elit eu finibus auctor, arcu neque hendrerit est, vitae posuere nunc diam non diam. Nunc cursus tortor at felis eleifend, vel egestas dui ornare. Donec rutrum vulputate metus, iaculis egestas purus sodales ac. Nam interdum leo non odio convallis luctus. Aliquam porttitor pulvinar justo, nec fermentum tellus. Aliquam erat volutpat. Etiam fermentum, ligula non fermentum ultricies, urna risus condimentum sem, quis aliquam nisl lacus id quam. Sed quis tempus turpis.</li></ol></p><p style=\"margin-bottom: 15px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><ul><li>Curabitur placerat massa nunc, nec varius mauris sodales ac. Fusce ante magna, ultrices quis magna ac, sagittis faucibus turpis. Vivamus facilisis vulputate odio eget facilisis. Donec lobortis sollicitudin imperdiet. Donec finibus sollicitudin semper. Quisque faucibus elit a pellentesque tincidunt. Curabitur pulvinar lobortis faucibus. Morbi congue id arcu ac tincidunt. In non diam laoreet, molestie justo a, tempus erat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam commodo pulvinar neque ut mattis.</li></ul></p><p style=\"margin-bottom: 15px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Nunc quis ex luctus nisl efficitur luctus sit amet blandit augue. Ut bibendum lacus sed tincidunt congue. Praesent nec elit a purus tristique faucibus ut commodo elit. Sed viverra finibus ipsum, et fermentum augue pellentesque at. In id feugiat eros. Phasellus at tortor gravida, sagittis ligula ac, semper turpis. Quisque finibus diam est, ac tincidunt eros ornare non. Donec tristique ut velit ac placerat. Nulla facilisi.</p><p style=\"margin-bottom: 15px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Vivamus ornare, augue nec mollis commodo, lorem risus consectetur risus, vel gravida lacus odio quis mauris. Vivamus sit amet felis sit amet dui cursus interdum. Aliquam maximus, sapien nec eleifend feugiat, eros justo gravida mi, blandit fermentum tortor ligula eu dui. Nunc egestas lectus erat, vitae consequat orci lacinia quis. Integer sollicitudin aliquam ante, in euismod tellus. Suspendisse ultricies purus eros. Ut nec lectus sit amet massa rhoncus aliquet quis mattis tellus. Sed sit amet laoreet dui. Nam sed vehicula orci, vel mattis sem. Nam hendrerit urna justo, eget iaculis lacus gravida id. Ut feugiat molestie magna.</p>', 0, '2024-05-14 11:41:42', '2024-05-14 11:41:42'),
('747956', 'Announcement 1', 'TsOcWjbxF7y1WPBNjJNq5t2f.jpg', '<p style=\"margin-bottom: 15px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc efficitur sapien eu nibh laoreet sagittis. Fusce vitae maximus turpis. Integer condimentum, urna ac bibendum feugiat, felis nisi iaculis quam, ut fermentu<b>m magna magna et quam. Vestibulum ac pretium risus. Nam euismod sodales nisl vel consequat. Sed vel nunc a est accumsan venenatis viverra a orci. Praesent nisi metus, cursus a aliquet pulvinar, accumsan sed mi. Aenean pulvinar tellus eget elit varius commodo. Praesent ac tristique odio. Duis in nulla ultrices, pulvinar ligula et, feugiat nibh. Nam vitae varius felis. Ut fringilla porta massa, at porttitor justo iaculis in.</b></p><p style=\"margin-bottom: 15px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">In molestie mi et cursus pretium. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam non odio rhoncus, maximus magna eget, mollis nisl. Integer placerat ex eget tellus volutpat fringilla. Aliquam non faucibus nisi. Nam hendrerit rhoncus lacus, nec ornare erat pellentesque sit amet. Donec at dolor quis mauris finibus mollis malesuada at tellus.</p><p style=\"margin-bottom: 15px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Maecenas consectetur volutpat felis, quis interdum elit accumsan in. Nullam sed lorem mauris. Aliquam tempor urna pellentesque fermentum sodales. Nullam massa mi, vulputate non dictum a, pulvinar at nulla. Pellentesque in lacus fringilla, consequat lorem rutrum, viverra justo. Aenean mollis ullamcorper interdum. Nulla dictum id leo vel ultricies. Quisque consectetur eros felis, non posuere dolor condimentum varius. Donec sollicitudin condimentum faucibus. Maecenas id velit euismod, consectetur est a, consectetur ante. In scelerisque posuere eros nec tempor. Fusce eget diam at lacus mattis condimentum eu ultricies magna.</p><p style=\"margin-bottom: 15px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Sed augue orci, ultrices vitae felis ac, rhoncus egestas turpis. Integer mollis ut mi et congue. Pellentesque nec diam eu risus ultrices sodales at et eros. Duis pulvinar porta dolor vel dignissim. Etiam pulvinar magna nec odio cursus, sit amet euismod nulla dictum. Integer pulvinar dictum mi, at commodo risus porta id. Quisque sed felis est.</p><p style=\"margin-bottom: 15px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Nam pulvinar luctus tellus, at cursus erat placerat vitae. Ut diam nibh, sagittis sit amet posuere non, porttitor vel lorem. Donec vitae magna nisi. Aliquam sit amet rutrum ipsum. Nam varius in enim aliquam aliquam. Vivamus vitae elit leo. Proin euismod imperdiet suscipit. Maecenas ante magna, faucibus quis mauris sit amet, vulputate tempor dolor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vestibulum pellentesque magna nisl, id interdum nisi tincidunt egestas. Donec elementum nisi mauris, facilisis ullamcorper elit tempor consequat. Vestibulum ut lorem blandit, ornare sem eu, suscipit nibh.</p>', 0, '2024-05-14 11:48:20', '2024-05-14 11:48:20'),
('929107', 'Announcement 3', 'e3rymEuNpKJiBwrkFaa9BHkD.jpg', '<div style=\"text-align: justify;\"><b style=\"color: var(--bs-body-color); font-family: var(--bs-body-font-family); font-size: var(--bs-body-font-size); text-align: var(--bs-body-text-align);\"><u>Pogi ni <i>Airich Jay Diawan</i></u></b></div>', 1, '2024-05-14 16:20:47', '2024-05-14 16:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `document_requests`
--

CREATE TABLE `document_requests` (
  `id` varchar(6) NOT NULL,
  `resident` varchar(6) DEFAULT NULL,
  `document_type` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `bdate` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `pickup_date` datetime DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `document_requests`
--

INSERT INTO `document_requests` (`id`, `resident`, `document_type`, `name`, `address`, `phone`, `bdate`, `gender`, `reason`, `pickup_date`, `status`, `created_at`, `updated_at`) VALUES
('341095', NULL, 1, 'Xander Deloso', 'Pasay City', '967 231 8764', '2002-12-02', 'Female', NULL, '2024-05-16 10:00:00', 'Completed', '2024-05-15 09:47:07', '2024-05-15 09:47:07'),
('762919', '472633', 3, 'Airich Jay Diawan', 'Tanza Cavite', '967 764 4695', '2003-04-23', 'Male', 'Wrong Requirements.', NULL, 'Rejected', '2024-05-14 17:24:36', '2024-05-14 17:24:36');

-- --------------------------------------------------------

--
-- Table structure for table `document_request_brgy_ids`
--

CREATE TABLE `document_request_brgy_ids` (
  `id` varchar(6) NOT NULL,
  `resident` varchar(6) DEFAULT NULL,
  `document_type` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `bdate` date NOT NULL,
  `tin` varchar(255) DEFAULT NULL,
  `sss` varchar(255) DEFAULT NULL,
  `bdate_place` varchar(255) NOT NULL,
  `blood_type` varchar(255) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `pickup_date` datetime DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `document_request_brgy_ids`
--

INSERT INTO `document_request_brgy_ids` (`id`, `resident`, `document_type`, `name`, `address`, `phone`, `bdate`, `tin`, `sss`, `bdate_place`, `blood_type`, `reason`, `pickup_date`, `status`, `created_at`, `updated_at`) VALUES
('614218', NULL, 2, 'Xander Deloso', 'Pasay City', '967 231 8764', '2002-12-02', NULL, NULL, 'Manila', NULL, 'Wrong Requirements', NULL, 'Rejected', '2024-05-15 09:44:49', '2024-05-15 09:44:49'),
('788190', '472633', 2, 'Airich Jay Diawan', 'Tanza Cavite', '967 764 4695', '2003-04-23', NULL, NULL, 'Bicol', 'O', NULL, '2024-05-15 08:00:00', 'Completed', '2024-05-14 17:36:23', '2024-05-14 17:36:23');

-- --------------------------------------------------------

--
-- Table structure for table `document_requirements`
--

CREATE TABLE `document_requirements` (
  `id` varchar(6) NOT NULL,
  `document_request` varchar(6) DEFAULT NULL,
  `document_requirement_for` bigint(20) UNSIGNED DEFAULT NULL,
  `filename` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `document_requirements`
--

INSERT INTO `document_requirements` (`id`, `document_request`, `document_requirement_for`, `filename`, `created_at`, `updated_at`) VALUES
('101701', '762919', 5, 'SSxSjisb2arSpTo6HZHOrHnG.pdf', '2024-05-14 17:23:44', '2024-05-14 17:23:44'),
('129859', '762919', 4, 'MrEa8baoacBEOtrlgD3Awx12.pdf', '2024-05-14 17:23:44', '2024-05-14 17:23:44'),
('347805', '762919', 3, 'Z7jRWNRxYuV5YDmWzr48zLnX.pdf', '2024-05-14 17:23:44', '2024-05-14 17:23:44'),
('710199', '341095', 1, 'aKhn5Fu92UU5TcDpiOYSmyMb.jpeg', '2024-05-15 09:41:17', '2024-05-15 09:41:17');

-- --------------------------------------------------------

--
-- Table structure for table `document_requirements_brgy_ids`
--

CREATE TABLE `document_requirements_brgy_ids` (
  `id` varchar(6) NOT NULL,
  `document_request` varchar(6) DEFAULT NULL,
  `document_requirement_for` bigint(20) UNSIGNED DEFAULT NULL,
  `filename` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `document_requirements_brgy_ids`
--

INSERT INTO `document_requirements_brgy_ids` (`id`, `document_request`, `document_requirement_for`, `filename`, `created_at`, `updated_at`) VALUES
('311588', '614218', 2, 'cj4eRQ5jj10e8tyu3w4DejWO.jpg', '2024-05-15 09:39:36', '2024-05-15 09:39:36'),
('556386', '788190', 2, 'wYYk5n10RdQ5cPS6vAu6hdEt.jpg', '2024-05-14 17:20:05', '2024-05-14 17:20:05');

-- --------------------------------------------------------

--
-- Table structure for table `document_types`
--

CREATE TABLE `document_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `document_name` varchar(255) NOT NULL,
  `document_fee` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `document_types`
--

INSERT INTO `document_types` (`id`, `document_name`, `document_fee`, `created_at`, `updated_at`) VALUES
(1, 'Barangay Certificate', 50, '2024-05-10 03:18:58', '2024-05-10 03:18:58'),
(2, 'Barangay I.D.', 100, '2024-05-10 03:19:33', '2024-05-10 03:19:33'),
(3, 'Building Construction Permit', 500, '2024-05-10 03:19:43', '2024-05-10 03:19:51'),
(4, 'Building Renovation Permit', 500, '2024-05-10 03:19:56', '2024-05-10 03:19:56');

-- --------------------------------------------------------

--
-- Table structure for table `document_type_requirements`
--

CREATE TABLE `document_type_requirements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `document_type` bigint(20) UNSIGNED DEFAULT NULL,
  `requirement` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `document_type_requirements`
--

INSERT INTO `document_type_requirements` (`id`, `document_type`, `requirement`, `created_at`, `updated_at`) VALUES
(1, 1, 'Valid I.D.', '2024-05-10 03:20:12', '2024-05-10 03:20:12'),
(2, 2, '1x1 I.D. Picture', '2024-05-10 03:20:12', '2024-05-10 03:20:12'),
(3, 3, 'Building Plan', '2024-05-10 03:22:21', '2024-05-10 03:22:21'),
(4, 3, 'Land Title/Lease of Contract', '2024-05-10 03:22:21', '2024-05-10 03:22:21'),
(5, 3, 'Neighbor\'s Consent', '2024-05-10 03:22:21', '2024-05-10 03:22:21'),
(6, 4, 'Building Plan', '2024-05-10 03:24:25', '2024-05-10 03:24:25'),
(7, 4, 'Land Title/Lease of Contract', '2024-05-10 03:24:25', '2024-05-10 03:24:25'),
(8, 4, 'Neighbor\'s Consent', '2024-05-10 03:24:25', '2024-05-10 03:24:25');

-- --------------------------------------------------------

--
-- Table structure for table `email_verifications`
--

CREATE TABLE `email_verifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_verifications`
--

INSERT INTO `email_verifications` (`id`, `email`, `otp`, `created_at`, `updated_at`) VALUES
(6, 'airichjaydiawan@gmail.com', '155243', '2024-05-09 07:46:14', '2024-05-09 07:46:14'),
(7, 'airichjaydiawan@gmail.com', '656461', '2024-05-09 07:47:31', '2024-05-09 07:47:31'),
(8, 'airichjaydiawan@gmail.com', '112703', '2024-05-14 04:34:29', '2024-05-14 04:34:29'),
(9, 'airichjaydiawan@gmail.com', '136787', '2024-05-14 04:36:41', '2024-05-14 04:36:41'),
(10, 'airichjaydiawan@gmail.com', '344078', '2024-05-14 04:37:50', '2024-05-14 04:37:50'),
(11, 'airichjaydiawan@gmail.com', '341879', '2024-05-14 04:39:31', '2024-05-14 04:39:31'),
(12, 'airichjaydiawan@gmail.com', '771117', '2024-05-14 04:40:32', '2024-05-14 04:40:32'),
(13, 'adiawan.a12137244@umak.edu.ph', '360673', '2024-05-14 04:59:55', '2024-05-14 04:59:55'),
(14, 'airichjaydiawan@gmail.com', '642625', '2024-05-15 08:46:44', '2024-05-15 08:46:44'),
(15, 'airichjaydiawan@gmail.com', '261506', '2024-05-15 08:47:18', '2024-05-15 08:47:18'),
(16, 'airichjaydiawan@gmail.com', '505044', '2024-05-15 08:52:28', '2024-05-15 08:52:28'),
(17, 'airichjaydiawan@gmail.com', '642728', '2024-05-15 08:53:24', '2024-05-15 08:53:24'),
(18, 'airichjaydiawan@gmail.com', '728474', '2024-05-15 08:53:56', '2024-05-15 08:53:56'),
(19, 'airichjaydiawan@gmail.com', '299292', '2024-05-15 09:05:45', '2024-05-15 09:05:45'),
(20, 'airichjaydiawan@gmail.com', '353934', '2024-05-15 09:07:11', '2024-05-15 09:07:11'),
(21, 'airichjaydiawan@gmail.com', '372576', '2024-05-15 09:09:29', '2024-05-15 09:09:29'),
(22, 'airichjaydiawan@gmail.com', '889799', '2024-05-15 09:11:02', '2024-05-15 09:11:02'),
(23, 'airichjaydiawan@gmail.com', '363656', '2024-05-15 09:13:47', '2024-05-15 09:13:47'),
(24, 'airichjaydiawan@gmail.com', '217460', '2024-05-15 09:15:37', '2024-05-15 09:15:37'),
(25, 'airichjaydiawan@gmail.com', '545372', '2024-05-15 09:16:57', '2024-05-15 09:16:57'),
(26, 'airichjaydiawan@gmail.com', '747082', '2024-05-15 09:18:03', '2024-05-15 09:18:03'),
(27, 'airichjaydiawan@gmail.com', '723485', '2024-05-15 09:20:34', '2024-05-15 09:20:34'),
(28, 'airichjaydiawan@gmail.com', '211028', '2024-05-15 09:24:10', '2024-05-15 09:24:10'),
(29, 'xagdeloso@gmail.com', '704759', '2024-05-15 09:32:56', '2024-05-15 09:32:56'),
(30, 'xagdeloso@gmail.com', '840664', '2024-05-15 09:36:41', '2024-05-15 09:36:41'),
(31, 'xagdeloso@gmail.com', '375004', '2024-05-15 09:36:48', '2024-05-15 09:36:48'),
(32, 'xagdeloso@gmail.com', '444869', '2024-05-15 09:36:53', '2024-05-15 09:36:53'),
(33, 'xdeloso.k11936891@umak.edu.ph', '152728', '2024-05-15 09:58:41', '2024-05-15 09:58:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_100000_create_password_resets_table', 2),
(6, '2024_05_09_113540_create_email_verifications_table', 3),
(7, '2024_05_09_040405_create_residents_table', 4),
(8, '2024_05_10_030757_create_document_types_table', 5),
(9, '2024_05_10_030937_create_document_type_requirements_table', 6),
(17, '2024_05_14_131420_create_admins_table', 10),
(19, '2024_05_14_140619_create_announcements_table', 11),
(26, '2024_05_10_032635_create_document_requests_table', 12),
(27, '2024_05_10_061547_create_document_requirements_table', 12),
(28, '2024_05_12_113521_create_document_request_brgy_ids_table', 13),
(29, '2024_05_12_134233_create_document_requirements_brgy_ids_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `residents`
--

CREATE TABLE `residents` (
  `id` varchar(6) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middletname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `bdate` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_activated` tinyint(1) NOT NULL DEFAULT 0,
  `pfp` varchar(255) NOT NULL DEFAULT 'defaultpfp.png',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `residents`
--

INSERT INTO `residents` (`id`, `firstname`, `middletname`, `lastname`, `email`, `address`, `phone`, `gender`, `bdate`, `password`, `is_activated`, `pfp`, `created_at`, `updated_at`) VALUES
('472633', 'Airich Jay', NULL, 'Diawan', 'airichjaydiawan@gmail.com', 'Tanza Cavite', '967 764 4695', 'Male', '2003-04-23', 'asdasd', 1, 'DKChng7HrYIei3vAkFNT5qKc.jpg', '2024-05-15 09:24:27', '2024-05-15 09:24:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_requests`
--
ALTER TABLE `document_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `document_requests_resident_foreign` (`resident`),
  ADD KEY `document_requests_document_type_foreign` (`document_type`);

--
-- Indexes for table `document_request_brgy_ids`
--
ALTER TABLE `document_request_brgy_ids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `document_request_brgy_ids_resident_foreign` (`resident`),
  ADD KEY `document_request_brgy_ids_document_type_foreign` (`document_type`);

--
-- Indexes for table `document_requirements`
--
ALTER TABLE `document_requirements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `document_requirements_document_request_foreign` (`document_request`),
  ADD KEY `document_requirements_document_requirement_for_foreign` (`document_requirement_for`);

--
-- Indexes for table `document_requirements_brgy_ids`
--
ALTER TABLE `document_requirements_brgy_ids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `document_requirements_brgy_ids_document_request_foreign` (`document_request`),
  ADD KEY `document_requirements_brgy_ids_document_requirement_for_foreign` (`document_requirement_for`);

--
-- Indexes for table `document_types`
--
ALTER TABLE `document_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_type_requirements`
--
ALTER TABLE `document_type_requirements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `document_type_requirements_document_type_foreign` (`document_type`);

--
-- Indexes for table `email_verifications`
--
ALTER TABLE `email_verifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `residents`
--
ALTER TABLE `residents`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `document_types`
--
ALTER TABLE `document_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `document_type_requirements`
--
ALTER TABLE `document_type_requirements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `email_verifications`
--
ALTER TABLE `email_verifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `document_requests`
--
ALTER TABLE `document_requests`
  ADD CONSTRAINT `document_requests_document_type_foreign` FOREIGN KEY (`document_type`) REFERENCES `document_types` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `document_requests_resident_foreign` FOREIGN KEY (`resident`) REFERENCES `residents` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `document_request_brgy_ids`
--
ALTER TABLE `document_request_brgy_ids`
  ADD CONSTRAINT `document_request_brgy_ids_document_type_foreign` FOREIGN KEY (`document_type`) REFERENCES `document_types` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `document_request_brgy_ids_resident_foreign` FOREIGN KEY (`resident`) REFERENCES `residents` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `document_requirements`
--
ALTER TABLE `document_requirements`
  ADD CONSTRAINT `document_requirements_document_request_foreign` FOREIGN KEY (`document_request`) REFERENCES `document_requests` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `document_requirements_document_requirement_for_foreign` FOREIGN KEY (`document_requirement_for`) REFERENCES `document_type_requirements` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `document_requirements_brgy_ids`
--
ALTER TABLE `document_requirements_brgy_ids`
  ADD CONSTRAINT `document_requirements_brgy_ids_document_request_foreign` FOREIGN KEY (`document_request`) REFERENCES `document_request_brgy_ids` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `document_requirements_brgy_ids_document_requirement_for_foreign` FOREIGN KEY (`document_requirement_for`) REFERENCES `document_type_requirements` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `document_type_requirements`
--
ALTER TABLE `document_type_requirements`
  ADD CONSTRAINT `document_type_requirements_document_type_foreign` FOREIGN KEY (`document_type`) REFERENCES `document_types` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
