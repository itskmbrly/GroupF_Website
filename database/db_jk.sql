-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2022 at 10:03 PM
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
(1, 1, 'L2 B7', 'Brgy San Luis', 'Antipolo City', 'Rizal', 1870, 'Philippines'),
(2, 2, 'Lot 2 Block 7 Road 1 Upehco', 'Brgy San Luis', 'Antipolo City', 'Rizal', 1870, 'Philippines'),
(3, 3, 'L2 B7', 'Brgy San Luis', 'Cainta', 'Rizal', 1870, 'Philippines'),
(4, 4, 'Lot 2 Block 7 Road 1 Upehco', 'Brgy San Luis', 'Antipolo City', 'Rizal', 1870, 'Philippines');

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
  `credentials` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_favorites`
--

CREATE TABLE `tbl_favorites` (
  `id` int(11) NOT NULL,
  `klient_id` int(11) NOT NULL,
  `kraftsman_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedbacks`
--

CREATE TABLE `tbl_feedbacks` (
  `id` int(11) NOT NULL,
  `kraftsman_id` int(11) NOT NULL,
  `klient_id` int(11) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 3, 1, 1, 100.00, 'Option 1.png'),
(2, 3, 2, 1, 1500.00, 'Option 2.png'),
(3, 3, 3, 1, 1500.00, 'Option 6.png'),
(4, 3, 5, 2, 250.00, 'Option 1.png'),
(5, 3, 5, 2, 250.00, 'Option 5.png'),
(6, 3, 6, 2, 480.00, 'Option 7.png'),
(7, 3, 7, 3, 350.00, 'Option 4.png'),
(8, 3, 8, 3, 480.00, 'Option 1.png'),
(9, 3, 9, 3, 430.00, 'Option 7.png');

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
(10, 1, 'Testing');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `mobile_no` bigint(11) NOT NULL,
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
(1, 'James Matthew', 'Reyes', 'jmsr101102@gmail.com', '$2y$10$Y5xwbYDnXpSYd.E9CIeQhevZoYMx/zGO2p4n2vVGlu2Ib4C5DIiQ6', 9195198723, '2002-11-10', 'Male', 1, 3, '2022-07-07 13:13:07', '2022-07-08 15:15:31', 0, 'user.png'),
(2, 'Kimberly', 'Edge', 'guzmankimberlyedgede@yahoo.com', '$2y$10$Y5xwbYDnXpSYd.E9CIeQhevZoYMx/zGO2p4n2vVGlu2Ib4C5DIiQ6', 9458952631, '2002-06-06', 'Female', 2, 2, '2022-07-07 13:13:55', '2022-07-19 13:42:28', 0, 'user.png'),
(3, 'Fraulyn Ajyl', 'Perez', 'fjperez@yahoo.com', '$2y$10$Y5xwbYDnXpSYd.E9CIeQhevZoYMx/zGO2p4n2vVGlu2Ib4C5DIiQ6', 1234567890, '2000-05-25', 'Female', 3, 1, '2022-07-07 13:20:37', '2022-07-08 11:27:55', 0, 'user.png'),
(4, 'Erica Edge', 'de Guzman', 'guzmanericaedgede@yahoo.com', '$2y$10$EuGfAay2y8LWOZvngRnTSetQOUo.ZvmQA14wS1uPyNusyK0VSkc8a', 9876543210, '1992-12-02', 'Female', 4, 2, '2022-07-07 13:25:01', '2022-07-08 11:27:55', 0, 'user.png');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_credentials`
--
ALTER TABLE `tbl_credentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_favorites`
--
ALTER TABLE `tbl_favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_feedbacks`
--
ALTER TABLE `tbl_feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_time`
--
ALTER TABLE `tbl_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
