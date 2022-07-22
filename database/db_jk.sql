-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2022 at 11:39 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address`
--

CREATE TABLE `tbl_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `zip` int(4) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_address`
--

INSERT INTO `tbl_address` (`id`, `user_id`, `address`, `barangay`, `city`, `province`, `zip`, `country`) VALUES
(1, 1, 'Lot 2 Block 7 Road 1 Upehco', 'Brgy San Luis', 'Antipolo City', 'Rizal', 1870, 'Philippines'),
(2, 2, 'Lot 2 Block 7 Road 1 Upehco', 'Brgy San Luis', 'Antipolo City', 'Rizal', 1870, 'Philippines'),
(3, 3, 'Lot 2 Block 7 Road 1 Upehco', 'Brgy San Luis', 'Antipolo City', 'Rizal', 1870, 'Philippines'),
(4, 4, 'Lot 2 Block 7 Road 1 Upehco', 'Brgy San Luis', 'Antipolo City', 'Rizal', 1870, 'Philippines'),
(6, 6, 'Lot 2 Block 7 Road 1 Upehco', 'Brgy San Luis', 'Antipolo City', 'Rizal', 1870, 'Philippines'),
(7, 7, 'Lot 2 Block 7 Road 1 Upehco', 'Brgy San Luis', 'Antipolo City', 'Rizal', 1870, 'Philippines');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category`) VALUES
(1, 'Hair Services'),
(2, 'Nail Services'),
(3, 'Spa Services');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_credentials`
--

CREATE TABLE `tbl_credentials` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `credentials` text NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_credentials`
--

INSERT INTO `tbl_credentials` (`id`, `user_id`, `credentials`, `file_type`, `created_at`) VALUES
(1, 1, 'Banned Mind Control Techniques Unleashed_ Learn The Dark Secrets Of Hypnosis, Manipulation, Deception, Persuasion, Brainwashing And Human Psychology.pdf', 'application/pdf', '2022-07-22 14:56:11'),
(2, 3, 'Covert Narcissism.pdf', 'application/pdf', '2022-07-22 15:12:58'),
(3, 4, 'Dark Psychology (3 Books in 1) Manipulation and Dark Psychology Persuasion and Dark Psychology Dark NLP by Jonathan Mind.pdf', 'application/pdf', '2022-07-22 15:15:20'),
(4, 7, 'Manipulation.pdf', 'application/pdf', '2022-07-22 15:17:41'),
(5, 6, 'The Manipulative Man Identify His Behavior, Counter the Abuse, Regain Control.pdf', 'application/pdf', '2022-07-22 15:20:18'),
(6, 5, 'Smart Thinking Skills for Critical Understanding and Writing by Matthew Allen.pdf', 'application/pdf', '2022-07-22 21:39:07'),
(7, 2, 'Working in the Dark.pdf', 'application/pdf', '2022-07-22 22:14:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_declinedappointments`
--

CREATE TABLE `tbl_declinedappointments` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_declinedappointments`
--

INSERT INTO `tbl_declinedappointments` (`id`, `transaction_id`, `reason`) VALUES
(1, 1, 'test'),
(2, 2, 'test'),
(3, 3, 'test\r\n'),
(4, 4, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_favorites`
--

CREATE TABLE `tbl_favorites` (
  `id` int(11) NOT NULL,
  `klient_id` int(11) NOT NULL,
  `kraftsman_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_favorites`
--

INSERT INTO `tbl_favorites` (`id`, `klient_id`, `kraftsman_id`) VALUES
(2, 6, 1),
(3, 6, 3),
(5, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedbacks`
--

CREATE TABLE `tbl_feedbacks` (
  `id` int(11) NOT NULL,
  `kraftsman_id` int(11) NOT NULL,
  `klient_id` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_feedbacks`
--

INSERT INTO `tbl_feedbacks` (`id`, `kraftsman_id`, `klient_id`, `feedback`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 'Test', '2022-07-22 15:35:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kraftsman`
--

CREATE TABLE `tbl_kraftsman` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `service_picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kraftsman`
--

INSERT INTO `tbl_kraftsman` (`id`, `user_id`, `service_id`, `category_id`, `price`, `service_picture`) VALUES
(1, 3, 1, 1, 150.00, 'Option 1.png'),
(2, 3, 2, 1, 1800.00, 'Option 7.png'),
(3, 3, 3, 1, 2000.00, 'Option 6.png'),
(4, 4, 4, 2, 200.00, 'Option 1.png'),
(5, 4, 5, 2, 200.00, 'Option 2.png'),
(6, 4, 6, 2, 350.00, 'Option 5.png'),
(7, 7, 7, 3, 350.00, 'Option 3.png'),
(8, 7, 8, 3, 550.00, 'Option 1.png'),
(9, 7, 9, 3, 360.00, 'Option 5.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pictures`
--

CREATE TABLE `tbl_pictures` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pictures`
--

INSERT INTO `tbl_pictures` (`id`, `category_id`, `picture`) VALUES
(1, 1, 'Option 1'),
(2, 1, 'Option 2'),
(3, 1, 'Option 3'),
(4, 1, 'Option 4'),
(5, 1, 'Option 5'),
(6, 1, 'Option 6'),
(7, 1, 'Option 7'),
(8, 2, 'Option 1'),
(9, 2, 'Option 2'),
(10, 2, 'Option 3'),
(11, 2, 'Option 4'),
(12, 2, 'Option 5'),
(13, 2, 'Option 6'),
(14, 2, 'Option 7'),
(15, 3, 'Option 1'),
(16, 3, 'Option 2'),
(17, 3, 'Option 3'),
(18, 3, 'Option 4'),
(19, 3, 'Option 5'),
(20, 3, 'Option 6'),
(21, 3, 'Option 7');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role_types`
--

CREATE TABLE `tbl_role_types` (
  `id` int(11) NOT NULL,
  `role_type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role_types`
--

INSERT INTO `tbl_role_types` (`id`, `role_type`) VALUES
(1, 'Kraftsman'),
(2, 'Klient'),
(3, 'Admin'),
(4, 'Moderator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `id` int(11) NOT NULL,
  `category_id` int(3) NOT NULL,
  `service_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`id`, `category_id`, `service_name`) VALUES
(1, 1, 'Hair Cut'),
(2, 1, 'Hair Rebond'),
(3, 1, 'Hair Color'),
(4, 2, 'Manicure'),
(5, 2, 'Pedicure'),
(6, 2, 'Manicure and Pedicure'),
(7, 3, 'Foot Spa with Massage'),
(8, 3, 'Body Scrub with Massage'),
(9, 3, 'Coconut Scrub'),
(11, 1, 'Testing'),
(12, 2, 'Testing'),
(13, 3, 'Testing');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_time`
--

CREATE TABLE `tbl_time` (
  `id` int(11) NOT NULL,
  `time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_time`
--

INSERT INTO `tbl_time` (`id`, `time`) VALUES
(1, '7   AM'),
(2, '9   AM'),
(3, '11 AM'),
(4, '1   PM'),
(5, '3   PM'),
(6, '5   PM'),
(7, '7   PM'),
(8, '9  PM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transactions`
--

CREATE TABLE `tbl_transactions` (
  `id` int(11) NOT NULL,
  `kraftsman_id` int(11) NOT NULL,
  `klient_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` int(11) NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transactions`
--

INSERT INTO `tbl_transactions` (`id`, `kraftsman_id`, `klient_id`, `service_id`, `date`, `time`, `created_at`, `status`) VALUES
(1, 4, 6, 5, '2022-07-23', 2, '2022-07-22 14:32:38', 1),
(2, 4, 6, 5, '2022-07-23', 1, '2022-07-22 14:33:56', 2),
(3, 7, 6, 8, '2022-07-23', 1, '2022-07-22 14:54:25', 1),
(4, 7, 6, 8, '2022-07-30', 1, '2022-07-22 14:55:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile_no` varchar(11) NOT NULL,
  `birthdate` date NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `address_id` int(11) NOT NULL,
  `role_id` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `verified` tinyint(1) NOT NULL,
  `profile_picture` varchar(255) NOT NULL DEFAULT 'user.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `first_name`, `last_name`, `email`, `password`, `mobile_no`, `birthdate`, `sex`, `address_id`, `role_id`, `created_at`, `updated_at`, `verified`, `profile_picture`) VALUES
(1, 'Kimberly Edge', 'de Guzman', 'guzmankimberlyedgede@yahoo.com', '$2y$10$PGTuFSiFx0VaYo04y2W1EuQOzLq68ku1OIrQMdITVY86a6ICmeBfW', '09458952631', '2002-06-06', 'Female', 1, 3, '2022-07-22 06:26:32', '2022-07-22 07:02:02', 1, '1_billie.jpg'),
(2, 'James Matthew', 'Reyes', 'jmsr101102@gmail.com', '$2y$10$ZDVsH47KQG2eUEIFTqvzNeuY3YFAEYu/aYsHWoyfRSVC7EliB.doy', '09195198723', '2002-11-10', 'Male', 2, 4, '2022-07-22 06:27:17', '2022-07-22 14:15:10', 1, '2_boy_suyo.jpg'),
(3, 'Fraulyn Ajyl', 'Perez', 'fjperez@yahoo.com', '$2y$10$ccqPayVWgkDf0ApB.9rUHuS27EgUSB1ZzeGSNbM4zgFJWeBCk0GQK', '01234567891', '1999-05-28', 'Female', 3, 1, '2022-07-22 06:28:17', '2022-07-22 14:28:19', 1, '3_girl_ayaw.jpg'),
(4, 'Erica Edge', 'de Guzman', 'guzmanericaedgede@yahoo.com', '$2y$10$iS54LRho6ecyiPTlWnd4rOcCWs2UtV4JmVw9z3hYFngPfRFRSwNwe', '09456872391', '1992-12-02', 'Female', 4, 1, '2022-07-22 06:29:02', '2022-07-22 07:15:35', 1, '4_1ec23d016de45d34ffe533b17ad1976a.jpg'),
(6, 'Thea', 'de Guzman', 'theamdeguzman@yahoo.com', '$2y$10$sAYoAVT2IsurGWVwVjAbnOy6kM4ysNo0tVpMb5Rv0pjpHaII3HdLu', '09690134522', '2003-02-15', 'Female', 6, 2, '2022-07-22 06:39:43', '2022-07-22 13:39:28', 1, '6_274181137_1001574640440406_3384387156726059840_n.png'),
(7, 'Eric', 'de Guzman', 'guzmanericde@yahoo.com', '$2y$10$sAYoAVT2IsurGWVwVjAbnOy6kM4ysNo0tVpMb5Rv0pjpHaII3HdLu', '09663215478', '1973-06-18', 'Male', 7, 1, '2022-07-22 06:53:44', '2022-07-22 07:17:54', 1, '7_boy_suyo.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_address`
--
ALTER TABLE `tbl_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_credentials`
--
ALTER TABLE `tbl_credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_declinedappointments`
--
ALTER TABLE `tbl_declinedappointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_favorites`
--
ALTER TABLE `tbl_favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feedbacks`
--
ALTER TABLE `tbl_feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kraftsman`
--
ALTER TABLE `tbl_kraftsman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pictures`
--
ALTER TABLE `tbl_pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_role_types`
--
ALTER TABLE `tbl_role_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_time`
--
ALTER TABLE `tbl_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_address`
--
ALTER TABLE `tbl_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_credentials`
--
ALTER TABLE `tbl_credentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_declinedappointments`
--
ALTER TABLE `tbl_declinedappointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_favorites`
--
ALTER TABLE `tbl_favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_feedbacks`
--
ALTER TABLE `tbl_feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_kraftsman`
--
ALTER TABLE `tbl_kraftsman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_pictures`
--
ALTER TABLE `tbl_pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_role_types`
--
ALTER TABLE `tbl_role_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_time`
--
ALTER TABLE `tbl_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
