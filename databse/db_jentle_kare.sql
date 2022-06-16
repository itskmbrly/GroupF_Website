-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2022 at 10:13 PM
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
-- Database: `db_jentle_kare`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address`
--

CREATE TABLE `tbl_address` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `zip` int(5) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_address`
--

INSERT INTO `tbl_address` (`id`, `user_id`, `address`, `barangay`, `city`, `province`, `zip`, `country`) VALUES
(1, 1, 'a', 'a', 'a', 'a', 1212, 'Philippines'),
(2, 2, '1', '1', '1', '1', 1111, 'Philippines'),
(3, 3, 'Lot 2 Block 7 Road 1 Upehco', 'Brgy San Luis', 'Antipolo City', 'Rizal', 1870, 'Philippines');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Hair Services', 1, '2022-05-10 07:32:55', '2022-05-10 07:32:55'),
(2, 'Nail Services', 1, '2022-05-10 07:32:55', '2022-05-10 07:32:55'),
(3, 'Spa Services', 1, '2022-05-10 07:32:55', '2022-05-10 07:32:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_documents`
--

CREATE TABLE `tbl_documents` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `id_type` enum('Passport','Driver''s License','PhilHealth ID','SSS UMID Card','Postal ID','TIN ID','Voter''s ID','PRC ID','Senior Citizen ID','PWD ID','OFW ID','National ID','Student ID') NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kraftsman`
--

CREATE TABLE `tbl_kraftsman` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_name` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `service_picture` varchar(255) NOT NULL DEFAULT 'blank.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kraftsman`
--

INSERT INTO `tbl_kraftsman` (`id`, `user_id`, `service_name`, `price`, `service_picture`) VALUES
(1, 3, 1, 150.00, 'blank.png'),
(2, 3, 2, 200.00, 'blank.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role_types`
--

CREATE TABLE `tbl_role_types` (
  `id` int(11) NOT NULL,
  `role_type` varchar(50) NOT NULL
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
  `service_name` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`id`, `service_name`, `category`) VALUES
(1, 'Hair Cut', '1'),
(2, 'Hair Rebond', '1'),
(3, 'Hair Color', '1'),
(4, 'Manicure', '2'),
(5, 'Pedicure', '2'),
(6, 'Manicure and Pedicure', '3'),
(7, 'Foot Spa with Massage', '3'),
(8, 'Body Scrub with Massage', '3'),
(9, 'Coconut Scrub', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sex`
--

CREATE TABLE `tbl_sex` (
  `id` int(11) NOT NULL,
  `sex_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sex`
--

INSERT INTO `tbl_sex` (`id`, `sex_type`) VALUES
(1, 'Female'),
(2, 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transactions`
--

CREATE TABLE `tbl_transactions` (
  `id` int(11) NOT NULL,
  `kraftsman_id` int(10) NOT NULL,
  `klient_id` int(10) NOT NULL,
  `service` varchar(200) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile_no` varchar(11) NOT NULL,
  `birthdate` date NOT NULL,
  `sex` varchar(50) NOT NULL,
  `address_id` int(10) NOT NULL,
  `role_id` int(3) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `verified` tinyint(1) NOT NULL,
  `credentials` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL DEFAULT 'user.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `first_name`, `last_name`, `email`, `password`, `mobile_no`, `birthdate`, `sex`, `address_id`, `role_id`, `created_at`, `updated_at`, `verified`, `credentials`, `profile_picture`) VALUES
(1, 'Kimberly Edge', 'de Guzman', 'guzmankimberlyedgede@yahoo.com', '$2y$10$wSUyyyFrLqovwkp6StcZpO3Tm3mH.Im4QrNF.tuJM5zZMPWBbtrGG', '12345678910', '1992-05-28', '2', 1, 3, '2022-05-28 22:28:53', NULL, 0, '', 'user.png'),
(2, 'Erica Edge', 'de Guzman', 'guzmanericaedgede@yahoo.com', '$2y$10$MBuEDzyYkLO/emOc27EPNeKJ85mILPqQeS8L6BHuLV8wPA/jEWTTW', '09195198723', '1992-02-12', '1', 2, 2, '2022-06-02 15:13:40', NULL, 0, '', 'user.png'),
(3, 'Kimberly Edge', 'de Guzman', 'itskmbrly@yahoo.com', '$2y$10$MBuEDzyYkLO/emOc27EPNeKJ85mILPqQeS8L6BHuLV8wPA/jEWTTW', '01010101010', '2002-06-06', '1', 3, 1, '2022-06-08 13:50:44', NULL, 0, '', 'user.png');

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
-- Indexes for table `tbl_documents`
--
ALTER TABLE `tbl_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kraftsman`
--
ALTER TABLE `tbl_kraftsman`
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
-- Indexes for table `tbl_sex`
--
ALTER TABLE `tbl_sex`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_documents`
--
ALTER TABLE `tbl_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kraftsman`
--
ALTER TABLE `tbl_kraftsman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_role_types`
--
ALTER TABLE `tbl_role_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_sex`
--
ALTER TABLE `tbl_sex`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
