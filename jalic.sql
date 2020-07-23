-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2020 at 09:55 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jalic`
--

-- --------------------------------------------------------

--
-- Table structure for table `contributions`
--

CREATE TABLE `contributions` (
  `id` int(11) NOT NULL,
  `contribution_id` varchar(50) NOT NULL,
  `customer_id` varchar(20) NOT NULL,
  `amount` float NOT NULL,
  `savings_type` varchar(50) NOT NULL,
  `collected_by` varchar(50) NOT NULL,
  `posted_by` varchar(20) NOT NULL,
  `approved_by` varchar(20) NOT NULL,
  `balance` decimal(11,0) NOT NULL,
  `gain` decimal(11,0) NOT NULL,
  `loan` decimal(10,0) DEFAULT NULL,
  `request_type` varchar(10) NOT NULL,
  `collected_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL,
  `description` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contributions`
--

INSERT INTO `contributions` (`id`, `contribution_id`, `customer_id`, `amount`, `savings_type`, `collected_by`, `posted_by`, `approved_by`, `balance`, `gain`, `loan`, `request_type`, `collected_on`, `status`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '7VDVKOFO11K17827', '976PLELN22', 100000, 'loan', 'Collect Igbokwe', 'K12692B1WR', '467l557ksa172474', '0', '0', '100000', 'debit', '2020-07-09 23:00:00', 'approved', 'A little test', '2020-07-21 13:22:59', '2020-07-22 19:16:59', NULL),
(2, '267IX4S2F76UT8J7', '976PLELN22', 200000, 'loan', 'Collect Igbokwe', 'K12692B1WR', '467l557ksa172474', '0', '0', '300000', 'debit', '2020-07-24 23:00:00', 'approved', 'a debit 2 u', '2020-07-21 13:24:35', '2020-07-22 19:17:29', NULL),
(3, '9394OB25NZ5E5527', '976PLELN22', 100000, 'loan', 'Mgbeogi Kwusa', '467l557ksa172474', '467l557ksa172474', '0', '0', '200000', 'credit', '2020-07-10 23:00:00', 'approved', 'Working', '2020-07-21 13:56:46', '2020-07-22 19:23:12', NULL),
(4, '1F33V4ZU98N9ITBI', '976PLELN22', 1000, 'savings', 'Collect Igbokwe', '7bzs7331j4c52f33', '467l557ksa172474', '967', '33', '0', 'credit', '2020-07-01 23:00:00', 'approved', 'a credit 2', '2020-07-21 14:07:20', '2020-07-22 19:23:20', NULL),
(8, 'N6SI29C15WXUAH3U', '976PLELN22', 250000, 'savings', 'Collect Igbokwe', '7bzs7331j4c52f33', '467l557ksa172474', '242717', '8250', '0', 'credit', '2020-07-01 23:00:00', 'approved', 'a credit 2', '2020-07-21 14:34:45', '2020-07-22 19:23:30', NULL),
(9, '5F9DM83XELPNTAYV', '976PLELN22', 100000, 'savings', 'Mgbeogi Kwusa', 'K12692B1WR', '467l557ksa172474', '339417', '3300', '0', 'credit', '2020-07-17 23:00:00', 'approved', 'Working', '2020-07-22 07:49:06', '2020-07-22 19:23:37', NULL),
(10, 'Q5EV632798269ME4', '976PLELN22', 100000, 'savings', 'Mgbeogi Kwusa', 'K12692B1WR', '467l557ksa172474', '239417', '0', '0', 'debit', '2020-07-17 23:00:00', 'approved', 'Working deniaa', '2020-07-22 07:58:04', '2020-07-22 19:23:44', NULL),
(11, '6WP553KH8U9YQ9R4', '976PLELN22', 500000, 'savings', 'Mgbeogi Kwusa', 'K12692B1WR', 'K12692B1WR', '722917', '16500', '0', 'credit', '2020-07-17 23:00:00', 'approved', 'Working deniaal', '2020-07-22 07:59:31', '2020-07-23 09:27:33', NULL),
(12, '86OSEOT7LGAH8262', '976PLELN22', 100000, 'loan', 'Mgbeogi Kwusa', '467l557ksa172474', 'K12692B1WR', '722917', '0', '100000', 'debit', '2020-07-10 23:00:00', 'approved', 'A little test to see if it is working 100000', '2020-07-22 11:06:58', '2020-07-23 09:27:27', NULL),
(13, 'J6LU8OY63LSD43GQ', '976PLELN22', 235000, 'savings', 'Mgbeogi Kwusa', '467l557ksa172474', 'K12692B1WR', '487917', '0', '0', 'debit', '2020-07-10 23:00:00', 'approved', 'Working', '2020-07-22 11:56:07', '2020-07-23 09:27:40', NULL),
(14, '6Z2QR77G363GAQIQ', '976PLELN22', 25000, 'savings', 'Mgbeogi Kwusa', '467l557ksa172474', 'K12692B1WR', '462917', '0', '0', 'debit', '2020-07-10 23:00:00', 'approved', 'Working', '2020-07-22 12:00:44', '2020-07-23 09:27:46', NULL),
(15, 'QKREX11UCW3362JE', '976PLELN22', 62917, 'savings', 'Mgbeogi Kwusa', '467l557ksa172474', 'K12692B1WR', '400000', '0', '0', 'debit', '2020-07-10 23:00:00', 'approved', 'Working', '2020-07-22 12:01:47', '2020-07-23 09:27:51', NULL),
(16, '6323YZBH746U9SV2', '976PLELN22', 200000, 'savings', 'Mgbeogi Kwusa', '467l557ksa172474', 'K12692B1WR', '200000', '0', '0', 'debit', '2020-07-10 23:00:00', 'approved', 'Working', '2020-07-22 12:02:37', '2020-07-23 09:27:56', NULL),
(17, '5882X87NQV5Y732W', '976PLELN22', 150000, 'loan', 'Mgbeogi Kwusa', '467l557ksa172474', 'K12692B1WR', '200000', '0', '150000', 'debit', '2020-07-10 23:00:00', 'approved', 'Working', '2020-07-22 12:19:15', '2020-07-23 09:28:03', NULL),
(18, '8L77B68654744619', '976PLELN22', 150000, 'loan', 'Mgbeogi Kwusa', '467l557ksa172474', 'K12692B1WR', '200000', '0', '0', 'credit', '2020-07-10 23:00:00', 'approved', 'Working', '2020-07-22 12:20:23', '2020-07-23 09:28:08', NULL),
(19, 'LAJX4772GT1NY3JR', '516924jwe69g67b8', 250000, 'savings', 'Collect Igbokwe', '6RN25GHW6O', '467l557ksa172474', '241750', '8250', '0', 'credit', '2020-07-02 23:00:00', 'approved', 'A little test', '2020-07-23 14:51:14', '2020-07-23 16:20:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `title` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `dob` timestamp NULL DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `address` varchar(200) NOT NULL,
  `image` varchar(150) NOT NULL,
  `saving_period` varchar(50) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `purpose` text DEFAULT NULL,
  `account_name` varchar(100) DEFAULT NULL,
  `account_number` varchar(15) DEFAULT NULL,
  `bank` varchar(100) DEFAULT NULL,
  `kin_name` varchar(100) DEFAULT NULL,
  `kin_address` varchar(100) DEFAULT NULL,
  `kin_phone` varchar(15) DEFAULT NULL,
  `kin_relationship` varchar(20) DEFAULT NULL,
  `kin_image` varchar(100) DEFAULT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `unit_manager` varchar(50) DEFAULT NULL,
  `unit_manager_phone` varchar(15) DEFAULT NULL,
  `user_id` varchar(20) NOT NULL,
  `office` varchar(100) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `created_at` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_id`, `title`, `name`, `email`, `phone`, `marital_status`, `sex`, `dob`, `occupation`, `address`, `image`, `saving_period`, `amount`, `purpose`, `account_name`, `account_number`, `bank`, `kin_name`, `kin_address`, `kin_phone`, `kin_relationship`, `kin_image`, `branch`, `unit_manager`, `unit_manager_phone`, `user_id`, `office`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'QccepDpoBvHDgP6Yo', 'Mr', 'Ojukwu Nobility', 'ksn@gmail.com', '09028374859', 'single', 'Male', '0000-00-00 00:00:00', 'Welder', 'Nsugbe Obosi Ararume', '', 'Quaterly', '500', 'I just wanna save bro', NULL, NULL, NULL, 'Ojukwu Ndidi', 'Okpoke Estate, Ugwunso', '09087865643', 'mother', NULL, NULL, NULL, NULL, '', 'No 12 Ibeku Street, Onitsha', 1, '2020-05-07 00:24:13', '2020-07-07 07:30:14', '2020-07-07 07:30:14'),
(15, '516924jwe69g67b8', 'Mrs', 'Mandeka Grace', 'brenda@gmail.com', '09023546172', 'married', 'Male', '1996-06-29 23:00:00', 'Traders', 'No 8 Ikeokwe Street, Onitsha', '', 'Yearly', '500', 'No 15 Abaina Lukuso', 'Amenda Barbie', '09098765234', 'First Bank', 'Mabkuso', 'Tshazuja House', '09089878765', 'father', NULL, NULL, NULL, NULL, '', 'Main market', 0, '2020-07-06 13:01:29', '2020-07-07 07:17:34', NULL),
(16, '976PLELN22', 'Mr', 'Abulumo Ntako', 'bababab@gmail.com', '07033194937', 'single', 'Male', '0000-00-00 00:00:00', 'Farmer', 'No 30 Obanye Street, Onitsha', '', 'annually', '500', 'Buy a car', 'Ntako Ntako', '9384758695', 'Zenith', 'Mma Love', 'No 12 Obanye Street, Utako', '07033194937', 'father', NULL, NULL, NULL, NULL, '', 'No 12 New Market Road, Onitsha', 0, '2020-07-18 20:53:07', '2020-07-22 20:46:08', NULL),
(17, 'PW2HO5V4BD', 'Mrs', 'ifeoma', 'ogechukwuuhoo@gemai.coml', '07061808545', 'married', 'Female', '1987-07-05 23:00:00', 'Farmer', 'No 30 Obanye Street, Onitsha', '', '3 month', '1000', 'to obtain loan', 'Ntako Ntako', '9384758695', 'Zenith', 'Mma Love', 'No 12 Obanye Street, Utako', '09058685931', 'daughter', NULL, NULL, NULL, NULL, '', 'No 12 New Market Road, Onitsha', 0, '2020-07-20 16:47:56', '2020-07-23 16:42:40', '2020-07-23 16:42:40');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `district_id` varchar(20) NOT NULL,
  `route_id` varchar(20) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `parcel_name` varchar(255) NOT NULL,
  `parcel_size` int(11) NOT NULL,
  `parcel_quantity` int(11) NOT NULL DEFAULT 1,
  `pick_up_address` varchar(255) DEFAULT NULL,
  `pick_up_landmark` varchar(255) DEFAULT NULL,
  `delivery_address` varchar(255) DEFAULT NULL,
  `delivery_landmark` varchar(255) DEFAULT NULL,
  `description` longtext NOT NULL,
  `request_type` varchar(20) NOT NULL,
  `service_type` varchar(11) NOT NULL,
  `rider_id` varchar(20) NOT NULL,
  `order_status` varchar(20) NOT NULL,
  `due_date` timestamp NULL DEFAULT NULL,
  `barcode` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(11) NOT NULL,
  `district_id` varchar(20) NOT NULL,
  `route_id` varchar(20) NOT NULL,
  `district` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `district_id`, `route_id`, `district`, `name`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, '3633648qetz9fwl9', '7sf962g5i7d35639', 'Aguata', 'Ejikeme Road', 'godspower', '2020-06-18 20:58:14', '2020-07-01 16:15:48', NULL),
(5, '3633648qetz9fwl9', 'h8yax3192rtnt84f', 'Maitama', 'Ugwunso Obosi is a goal', 'godspower', '2020-06-18 21:17:32', '2020-06-18 23:25:26', NULL),
(7, '68baql91t6v7634h', 'op4ch6461lsgn8t5', 'Ibadan', 'Aboki Lane', 'godspower', '2020-06-19 13:08:43', '2020-06-19 13:08:43', NULL),
(8, 'pusf7x9x2dfq149m', 't3q4928dfn3916wu', 'Ojuelegba', 'Costain', 'godspower', '2020-06-19 14:52:53', '2020-06-19 14:52:53', NULL),
(9, '2dqvg47mf36gfg8c', 't916vwzp657y34pz', 'Surulere', 'Hallo', 'Chinedu', '2020-07-01 16:11:34', '2020-07-01 16:11:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `admin_right` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `branch` varchar(100) NOT NULL,
  `unit_manager` varchar(100) NOT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `job_description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `online_status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `email`, `password`, `phone`, `firstname`, `lastname`, `admin_right`, `address`, `branch`, `unit_manager`, `job_title`, `job_description`, `image`, `online_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(23, '467l557ksa172474', '1@2.com', '$2y$10$kn23bUMC5nfpjS.JvDfqKefL5V1a9NELi9nCd2Qz1zAqtblPMC2R.', '09087654367', 'Joshua', 'hans', 'Admin', 'No 10 Obnaye', 'Onitsha', 'Udochukwu Onyinye', 'Manager', 'managing operations at anambra', 'img\\uploads\\profile\\quick_hotel_reservation-5942731c8ccc9291027a164557f81571.PNG', NULL, '2020-06-19 15:19:52', '2020-07-07 09:07:56', NULL),
(29, '7bzs7331j4c52f33', 'edu@gmail.com', '$2y$10$kn23bUMC5nfpjS.JvDfqKefL5V1a9NELi9nCd2Qz1zAqtblPMC2R.', '09083726453', 'Chinedu', 'Omesu', 'Staff', 'Obanye4', 'Onitsha', 'Milicent Nonye', 'Manager', 'Manage it', 'img\\uploads\\profile\\frontdesk_admin-229d25c51f73220d2805b8cd2511731d.png', NULL, '2020-06-20 22:00:32', '2020-07-07 09:08:14', NULL),
(39, '6RN25GHW6O', 'edu@mail.com', '$2y$10$Ixtuqn5ghbH7PRXtuxvFturHJT2BJ3czjjr5RTG6lRnn/0DlJIqsG', '09087865453', 'Abulo', 'Ikem', 'Staff', 'No 10 Isiokwe Street, Onitsha', 'Onitsha', 'Onyinye Nwosu', 'Accountant', 'Manage accounts', 'img\\uploads\\profile\\111node-122e972c6fab3a9cf07c09d981b2c203.png', NULL, '2020-07-07 08:24:03', '2020-07-07 09:08:26', NULL),
(41, 'K12692B1WR', 'ogechukwuuhoo@gemai.coml', '$2y$10$zhceZJGeVjBj1OAtJah8tOZ8peE0lxXYzJsBPu0fKMFynohlq5LBm', '07061808545', 'chiamaka', 'okafor', 'Staff', 'No 30 Obanye Street, Onitsha', 'tony umueh', '', 'markert', '', 'img\\uploads\\profile\\dashboard-925b410cfb1c59edb394bd787d216141.png', NULL, '2020-07-20 15:56:51', '2020-07-23 06:30:02', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contributions`
--
ALTER TABLE `contributions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `route_id` (`route_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contributions`
--
ALTER TABLE `contributions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
