-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2025 at 02:03 PM
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
-- Database: `bookid`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_cred`
--

CREATE TABLE `admin_cred` (
  `sr_no` int(11) NOT NULL,
  `admin_name` varchar(150) NOT NULL,
  `admin_pass` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_cred`
--

INSERT INTO `admin_cred` (`sr_no`, `admin_name`, `admin_pass`) VALUES
(1, 'chayanne', '123123'),
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `audit_trail`
--

CREATE TABLE `audit_trail` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `action` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audit_trail`
--

INSERT INTO `audit_trail` (`id`, `admin_name`, `action`, `description`, `timestamp`) VALUES
(1, 'chayanne', 'LOGIN', 'Admin logged in successfully', '2025-04-03 00:04:07'),
(2, 'chayanne', 'LOGOUT', 'Admin logged out successfully', '2025-04-03 00:05:29'),
(3, 'chayanne', 'LOGIN', 'Admin logged in successfully', '2025-04-03 00:05:35'),
(4, 'chayanne', 'LOGOUT', 'Admin logged out successfully', '2025-04-03 00:14:42'),
(5, 'chayanne', 'LOGIN', 'Admin logged in successfully', '2025-04-03 00:14:51'),
(6, 'chayanne', 'DELETE', 'Deleted user query ID 27.', '2025-04-03 00:18:32'),
(7, 'chayanne', 'UPDATE', 'Marked all user queries as read.', '2025-04-03 00:19:28'),
(8, 'chayanne', 'UPDATE', 'Marked user query ID 29 as read.', '2025-04-03 00:20:09'),
(9, 'chayanne', 'UPDATE', 'Updated site settings: Title - MINANGUN, About - Minangun Farm Resort offers a peaceful escape in the Philippines, perfect for relaxation, nature adventures, and memorable stays with family and friends. 🌿✨', '2025-04-03 00:28:45'),
(10, 'chayanne', 'UPDATE', 'Updated site settings: Title - BOOKID, About - Minangun Farm Resort offers a peaceful escape in the Philippines, perfect for relaxation, nature adventures, and memorable stays with family and friends. 🌿✨', '2025-04-03 00:29:07'),
(11, 'chayanne', 'ADD', 'Added carousel image: IMG_61527.png', '2025-04-03 00:35:11'),
(12, 'chayanne', 'DELETE', 'Deleted carousel image with ID: ', '2025-04-03 00:38:36'),
(13, 'chayanne', 'DELETE', 'Deleted carousel image with ID: ', '2025-04-03 00:38:38'),
(14, 'chayanne', 'ADD', 'Added carousel image: IMG_90907.png', '2025-04-03 00:39:21'),
(15, 'chayanne', 'ADD', 'Added carousel image: IMG_74189.png', '2025-04-03 00:41:41'),
(16, 'chayanne', 'DELETE', 'Deleted user query ID 29.', '2025-04-03 04:39:48'),
(17, 'chayanne', 'UPDATE', 'Marked all user queries as read.', '2025-04-03 04:40:21'),
(18, 'chayanne', 'UPDATE', 'Marked user query ID 31 as read.', '2025-04-03 04:40:55'),
(19, 'chayanne', 'UPDATE', 'Updated site settings: Title - MINANGUN, About - Minangun Farm Resort offers a peaceful escape in the Philippines, perfect for relaxation, nature adventures, and memorable stays with family and friends. 🌿✨', '2025-04-03 04:44:52'),
(20, 'chayanne', 'UPDATE', 'Updated site settings: Title - BOOKID, About - Minangun Farm Resort offers a peaceful escape in the Philippines, perfect for relaxation, nature adventures, and memorable stays with family and friends. 🌿✨', '2025-04-03 04:45:11'),
(21, 'chayanne', 'UPDATE', 'Updated shutdown status: enabled', '2025-04-03 04:46:15'),
(22, 'chayanne', 'UPDATE', 'Updated shutdown status: disabled', '2025-04-03 04:46:24'),
(23, 'chayanne', 'ADD', 'Added carousel image: IMG_39605.png', '2025-04-03 04:47:47'),
(24, 'chayanne', 'DELETE', 'Deleted carousel image: IMG_39605.png', '2025-04-03 04:48:20'),
(25, 'chayanne', 'UPDATE', 'Marked user query ID 32 as read.', '2025-04-03 04:50:53'),
(26, 'chayanne', 'ADD', 'Added feature: infinity pool', '2025-04-03 04:55:10'),
(27, 'chayanne', 'DELETE', 'Deleted feature ID: 15', '2025-04-03 04:55:15'),
(28, 'chayanne', 'UPDATE', 'Updated shutdown status: enabled', '2025-04-03 05:44:53'),
(29, 'chayanne', 'UPDATE', 'Updated shutdown status: disabled', '2025-04-03 05:45:11'),
(30, 'chayanne', 'LOGIN', 'Admin logged in successfully', '2025-04-19 04:28:00'),
(31, 'chayanne', 'LOGIN', 'Admin logged in successfully', '2025-04-22 16:08:05'),
(32, 'chayanne ', 'LOGIN', 'Admin logged in successfully', '2025-04-24 03:45:00'),
(33, 'chayanne', 'LOGIN', 'Admin logged in successfully', '2025-04-24 03:46:31'),
(34, 'chayanne', 'LOGIN', 'Admin logged in successfully', '2025-04-24 04:03:50'),
(35, 'chayanne', 'LOGIN', 'Admin logged in successfully', '2025-04-24 11:15:13'),
(36, 'chayanne', 'LOGIN', 'Admin logged in successfully', '2025-04-24 12:34:51'),
(37, 'chayanne', 'LOGIN', 'Admin logged in successfully', '2025-04-24 12:38:18'),
(38, 'chayanne', 'LOGIN', 'Admin logged in successfully', '2025-04-24 12:41:39'),
(39, 'chayanne', 'LOGIN', 'Admin logged in successfully', '2025-04-24 15:00:53'),
(40, 'chayanne', 'LOGIN', 'Admin logged in successfully', '2025-04-24 16:42:40'),
(41, 'chayanne', 'LOGIN', 'Admin logged in successfully', '2025-04-24 17:03:32'),
(42, 'chayanne ', 'LOGIN', 'Admin logged in successfully', '2025-04-25 06:11:05'),
(43, 'admin', 'LOGIN', 'Admin logged in successfully', '2025-04-25 06:52:47'),
(44, 'admin', 'LOGOUT', 'Admin logged out successfully', '2025-04-25 07:16:59'),
(45, 'admin', 'LOGIN', 'Admin logged in successfully', '2025-04-25 07:33:18'),
(46, 'admin', 'LOGOUT', 'Admin logged out successfully', '2025-04-25 07:41:12'),
(47, 'admin', 'LOGIN', 'Admin logged in successfully', '2025-04-25 07:41:19'),
(48, 'chayanne', 'LOGIN', 'Admin logged in successfully', '2025-04-30 04:48:48'),
(49, 'chayanne', 'LOGIN', 'Admin logged in successfully', '2025-05-01 04:57:25'),
(50, 'chayanne', 'UPDATE', 'Updated shutdown status: enabled', '2025-05-01 04:58:39'),
(51, 'chayanne', 'UPDATE', 'Updated shutdown status: disabled', '2025-05-01 04:58:56'),
(52, 'chayanne', 'UPDATE', 'Updated shutdown status: enabled', '2025-05-01 04:59:03'),
(53, 'chayanne', 'UPDATE', 'Updated shutdown status: disabled', '2025-05-01 04:59:17'),
(54, 'Chayanne Calderon', 'LOGIN', 'User logged in', '2025-05-01 05:39:35'),
(55, 'Chayanne Calderon', 'LOGOUT', 'User logged out', '2025-05-01 05:54:18'),
(56, 'Chayanne Calderon', 'LOGIN', 'User logged in', '2025-05-03 10:57:07'),
(57, 'Chayanne Calderon', 'LOGOUT', 'User logged out', '2025-05-03 10:57:13'),
(58, 'chayanne', 'LOGIN', 'Admin logged in successfully', '2025-05-03 10:57:58'),
(59, 'Chayanne Calderon', 'LOGIN', 'User logged in', '2025-05-03 11:04:08'),
(60, 'Chayanne Calderon', 'LOGOUT', 'User logged out', '2025-05-03 11:04:12'),
(61, 'Chayanne Calderon', 'LOGIN', 'User logged in', '2025-05-03 11:05:34'),
(62, 'Chayanne Calderon', 'LOGOUT', 'User logged out', '2025-05-03 11:07:52'),
(63, 'chayanne', 'LOGIN', 'Admin logged in successfully', '2025-05-03 11:09:12'),
(64, 'Chayanne Calderon', 'LOGIN', 'User logged in', '2025-05-03 11:41:49'),
(65, 'Chayanne Calderon', 'LOGOUT', 'User logged out', '2025-05-03 11:41:54'),
(66, 'chayanne', 'LOGIN', 'Admin logged in successfully', '2025-05-03 11:42:11'),
(67, 'chayanne', 'DELETE', 'Deleted user query ID 31.', '2025-05-03 11:44:33'),
(68, 'chayanne', 'UPDATE', 'Marked all user queries as read.', '2025-05-03 11:47:26'),
(69, 'chayanne', 'UPDATE', 'Marked all user queries as read.', '2025-05-03 11:47:59'),
(70, 'chayanne', 'UPDATE', 'Marked user query ID 35 as read.', '2025-05-03 11:48:34'),
(71, 'chayanne', 'DELETE', 'Deleted user query ID 35.', '2025-05-03 11:51:25'),
(72, 'chayanne', 'DELETE', 'Deleted user query ID 34.', '2025-05-03 11:51:31'),
(73, 'chayanne', 'DELETE', 'Deleted user query ID 33.', '2025-05-03 11:51:33'),
(74, 'chayanne', 'UPDATE', 'Marked user query ID 36 as read.', '2025-05-03 11:51:54'),
(75, 'chayanne', 'LOGOUT', 'Admin logged out successfully', '2025-05-03 12:00:06');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) DEFAULT NULL,
  `event_start_date` varchar(255) DEFAULT NULL,
  `event_end_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`event_id`, `event_name`, `event_start_date`, `event_end_date`) VALUES
(2, 'busy', '25-02-05', '25-02-06'),
(3, 'busy', '25-02-23', '25-02-24'),
(4, 'BOOKED', '25-02-24', '25-02-25'),
(5, 'BUSY', '25-02-23', '25-02-24'),
(6, 'BOOKED', '25-03-30', '25-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `sr_no` int(11) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`sr_no`, `image`) VALUES
(10, 'IMG_16321.png'),
(12, 'IMG_15106.png');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `sr_no` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gmap` varchar(100) NOT NULL,
  `pn1` bigint(20) NOT NULL,
  `pn2` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `insta` varchar(100) NOT NULL,
  `iframe` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`sr_no`, `address`, `gmap`, `pn1`, `pn2`, `email`, `fb`, `insta`, `iframe`) VALUES
(1, 'Delta 5 Purok 6 Lacmit Arayat Pampanga', 'https://maps.app.goo.gl/H4p4bnqvZuFZdfst6', 639171540725, 639778214255, 'ask.minangun@gmail.com', 'https://www.facebook.com/profile.php?id=61556336086266', 'https://www.instagram.com/mi.na.ngun?fbclid=IwY2xjawFX1WZleHRuA2FlbQIxMAABHfRK_u72vD7RncrTgsDkV7b3um', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30809.800575394034!2d120.71499720298148!3d15.145979166063023!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3396e535504c8dfd:0x785c105da2e13deb!2sLacmit, Arayat, Pampanga!5e0!3m2!1sen!2sph!4v1738491006222!5m2!1sen!2sph');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `color` varchar(7) DEFAULT '#3788d8'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `title`, `start`, `end`, `color`) VALUES
(62, 'Booked', '2025-04-25', '2025-04-27', '#FF6B6B'),
(63, 'Booked', '2025-04-25', '2025-04-27', '#FF6B6B'),
(64, 'Booked', '2025-05-02', '2025-05-05', '#FF6B6B');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `pic`, `name`, `description`) VALUES
(7, 'IMG_90450.png', '1', 'Minangun Farm Resort features a shimmering pool that glows with colorful lights beneath the surface,\r\n             creating a magical atmosphere for evening swims and serene nights under the stars.'),
(8, 'IMG_54092.png', '2', 'Minangun Farm Resort’s mini bar offers hard liquor, refreshing drinks, snacks, and a Bluetooth speaker,\r\n             making it ideal for a fun night. Gather your friends and let the good times roll!'),
(9, 'IMG_96839.png', '3', 'The charming outdoor pavilion serves as the perfect gathering spot for friends and families,\r\n              where laughter and conversation blend seamlessly with the serene sounds of nature.');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`) VALUES
(10, 'bedroom'),
(11, 'bar'),
(12, 'pool'),
(13, 'spa'),
(14, 'billiard');

-- --------------------------------------------------------

--
-- Table structure for table `payment_confirmations`
--

CREATE TABLE `payment_confirmations` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `remarks` text DEFAULT NULL,
  `payment_proof` varchar(255) NOT NULL,
  `payment` decimal(10,2) DEFAULT NULL,
  `status` enum('Pending','Paid') DEFAULT 'Pending',
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_confirmations`
--

INSERT INTO `payment_confirmations` (`id`, `name`, `email`, `remarks`, `payment_proof`, `payment`, `status`, `submitted_at`) VALUES
(56, 'Jhon Loyd', 'gomezjohnloyd10@gmail.com', 'Room Type: Overnight\nCheck-in: April 25, 2025\nCheck-out: April 26, 2025', 'uploads/PAYMENT_23238.jpg', 2500.00, 'Paid', '2025-04-25 08:19:01'),
(57, 'Chayanne Calderon', 'chayanne12calderon@gmail.com', 'Room Type: Overnight\nCheck-in: May 2, 2025\nCheck-out: May 4, 2025', 'uploads/PAYMENT_35379.jpg', 5000.00, 'Paid', '2025-05-01 04:57:04');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `area` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `adult` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `description` varchar(350) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `removed` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `area`, `price`, `quantity`, `adult`, `children`, `description`, `status`, `removed`) VALUES
(5, 'Overnight', 1, 5000, 1, 10, 5, 'Experience a peaceful overnight stay at Minangun Farm Resort in the Philippines, surrounded by nature, fresh air, and relaxing vibes. 🌿✨', 1, 0),
(6, 'Daytour', 1, 3500, 1, 10, 5, 'Enjoy a refreshing day tour at Minangun Farm Resort in the Philippines, perfect for relaxation, sightseeing, and nature-filled adventures. 🌿☀️', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_facilities`
--

CREATE TABLE `room_facilities` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `facilities_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_facilities`
--

INSERT INTO `room_facilities` (`sr_no`, `room_id`, `facilities_id`) VALUES
(87, 5, 7),
(88, 6, 8);

-- --------------------------------------------------------

--
-- Table structure for table `room_features`
--

CREATE TABLE `room_features` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `features_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_features`
--

INSERT INTO `room_features` (`sr_no`, `room_id`, `features_id`) VALUES
(16, 5, 10),
(17, 5, 11),
(18, 5, 12),
(19, 6, 10),
(20, 6, 11),
(21, 6, 12);

-- --------------------------------------------------------

--
-- Table structure for table `room_images`
--

CREATE TABLE `room_images` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `thumb` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_images`
--

INSERT INTO `room_images` (`sr_no`, `room_id`, `image`, `thumb`) VALUES
(13, 5, 'IMG_76651.jpg', 1),
(14, 6, 'IMG_27432.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `sr_no` int(11) NOT NULL,
  `site_title` varchar(50) NOT NULL,
  `site_about` varchar(255) NOT NULL,
  `shutdown` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`sr_no`, `site_title`, `site_about`, `shutdown`) VALUES
(1, 'BOOKID', 'Minangun Farm Resort offers a peaceful escape in the Philippines, perfect for relaxation, nature adventures, and memorable stays with family and friends. 🌿✨', 0);

-- --------------------------------------------------------

--
-- Table structure for table `team_details`
--

CREATE TABLE `team_details` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `picture` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team_details`
--

INSERT INTO `team_details` (`sr_no`, `name`, `picture`) VALUES
(19, 'Chayanne', 'IMG_79613.jpg'),
(20, 'Sheen', 'IMG_86499.jpg'),
(21, 'Loyd', 'IMG_56353.jpg'),
(22, 'Ian', 'IMG_83066.jpg'),
(23, 'Christian', 'IMG_68993.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_cred`
--

CREATE TABLE `user_cred` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(120) NOT NULL,
  `phonenum` varchar(100) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `dob` date NOT NULL,
  `profile` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `token` varchar(200) DEFAULT NULL,
  `t_expire` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `datentime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_cred`
--

INSERT INTO `user_cred` (`id`, `name`, `email`, `address`, `phonenum`, `zipcode`, `dob`, `profile`, `password`, `is_verified`, `token`, `t_expire`, `status`, `datentime`) VALUES
(22, 'Jhon Loyd', 'gomezjohnloyd10@gmail.com', 'Central Luzon, Aurora, Dilasag, Dilaguidi, 123123', '9982321875', 2012, '2007-04-19', 'IMG_69563.jpeg', '$2y$10$8LYFK.A4d4WOrLGLaFd1SeloVxMs/DrFItaFVdvYOvKF6NkHuqlW6', 1, NULL, NULL, 1, '2025-04-25 16:14:47'),
(24, 'Chayanne Calderon', 'chayanne12calderon@gmail.com', 'Central Luzon, Pampanga, City of San Fernando, Magliman, La Vista Solana', '9603341221', 2000, '2003-10-27', 'IMG_97238.jpeg', '$2y$10$Hjt7Eh9QdFc7sMEyFyPi4.aAEk1n2xDyyWoeLF6iH14KRIRdYDU4y', 1, 'c1a2b8aa8221fe05767229080742224e', '2025-05-04', 1, '2025-04-30 21:51:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_queries`
--

CREATE TABLE `user_queries` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `seen` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_queries`
--

INSERT INTO `user_queries` (`sr_no`, `name`, `email`, `subject`, `message`, `date`, `seen`) VALUES
(28, 'lloyd', 'gomezjohnloyd10@gmail.com', 'concern', 'MA ANONG ULAMM', '2025-04-02', 1),
(30, 'lloyd', 'gomezjohnloyd10@gmail.com', 'concern', 'ADOBO ANAK', '2025-04-02', 1),
(32, 'chayanne', 'chayanne12calderon@gmail.com', 'concern', 'HMMM SARAP', '2025-04-02', 1),
(36, 'test', 'test123123@gmail.com', 'test', 'test', '2025-05-03', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_cred`
--
ALTER TABLE `admin_cred`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `audit_trail`
--
ALTER TABLE `audit_trail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_confirmations`
--
ALTER TABLE `payment_confirmations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `room id` (`room_id`),
  ADD KEY `facilities id` (`facilities_id`);

--
-- Indexes for table `room_features`
--
ALTER TABLE `room_features`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `features id` (`features_id`),
  ADD KEY `rm id` (`room_id`);

--
-- Indexes for table `room_images`
--
ALTER TABLE `room_images`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `team_details`
--
ALTER TABLE `team_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `user_cred`
--
ALTER TABLE `user_cred`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_queries`
--
ALTER TABLE `user_queries`
  ADD PRIMARY KEY (`sr_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_cred`
--
ALTER TABLE `admin_cred`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `audit_trail`
--
ALTER TABLE `audit_trail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payment_confirmations`
--
ALTER TABLE `payment_confirmations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `room_facilities`
--
ALTER TABLE `room_facilities`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `room_features`
--
ALTER TABLE `room_features`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `room_images`
--
ALTER TABLE `room_images`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team_details`
--
ALTER TABLE `team_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_cred`
--
ALTER TABLE `user_cred`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_queries`
--
ALTER TABLE `user_queries`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD CONSTRAINT `facilities id` FOREIGN KEY (`facilities_id`) REFERENCES `facilities` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `room id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `room_features`
--
ALTER TABLE `room_features`
  ADD CONSTRAINT `features id` FOREIGN KEY (`features_id`) REFERENCES `features` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `rm id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `room_images`
--
ALTER TABLE `room_images`
  ADD CONSTRAINT `room_images_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
