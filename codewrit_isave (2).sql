-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 30, 2023 at 09:01 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codewrit_isave`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `acc_number` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `acc_type_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `association_id` int(11) DEFAULT NULL,
  `status` enum('open','suspended','close') NOT NULL DEFAULT 'open',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  `ownership` enum('individual','association') NOT NULL DEFAULT 'individual'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `acc_number`, `name`, `acc_type_id`, `member_id`, `association_id`, `status`, `updated_at`, `created_at`, `deleted_at`, `ownership`) VALUES
(1, '23010001', 'Eric Mensah', 1, 1, NULL, 'open', NULL, '2023-01-30 14:07:02', NULL, 'individual');

-- --------------------------------------------------------

--
-- Table structure for table `acc_types`
--

CREATE TABLE `acc_types` (
  `id` int(11) NOT NULL,
  `label` varchar(60) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acc_types`
--

INSERT INTO `acc_types` (`id`, `label`, `status`, `updated_at`, `created_at`) VALUES
(1, 'Saving Account', 1, NULL, '2023-01-30 14:42:46');

-- --------------------------------------------------------

--
-- Table structure for table `associations`
--

CREATE TABLE `associations` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `community` varchar(100) NOT NULL,
  `cluster_office_address` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `assigned_person_name` varchar(60) DEFAULT NULL,
  `assigned_person_phone` varchar(10) DEFAULT NULL,
  `status` enum('open','close') NOT NULL DEFAULT 'open',
  `user_id` bigint(20) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `associations`
--

INSERT INTO `associations` (`id`, `name`, `community`, `cluster_office_address`, `email`, `assigned_person_name`, `assigned_person_phone`, `status`, `user_id`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'Association 1', 'community 1', 'cluster office address 1', NULL, 'Eric Mensah', '02345678', 'open', 1, NULL, '2023-01-30 15:07:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` bigint(20) NOT NULL,
  `account_id` int(11) NOT NULL,
  `depositor_name` varchar(60) NOT NULL,
  `depositor_phone` varchar(10) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `identity_card_types`
--

CREATE TABLE `identity_card_types` (
  `id` int(11) NOT NULL,
  `label` varchar(60) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `update_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `identity_card_types`
--

INSERT INTO `identity_card_types` (`id`, `label`, `status`, `update_at`, `created_at`) VALUES
(1, 'GHANA CARD', 1, NULL, '2023-01-30 00:29:26');

-- --------------------------------------------------------

--
-- Table structure for table `internal_transfers`
--

CREATE TABLE `internal_transfers` (
  `id` bigint(20) NOT NULL,
  `from_account_id` int(11) NOT NULL,
  `to_account_id` int(11) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` bigint(20) NOT NULL,
  `loan_type_id` int(11) NOT NULL,
  `principal_amount` int(11) NOT NULL,
  `interest_amount` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime NOT NULL,
  `appl_status` enum('pending','approved','paid_out') NOT NULL DEFAULT 'pending',
  `setl_status` enum('not_paid','started','paid') NOT NULL DEFAULT 'not_paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loan_payments`
--

CREATE TABLE `loan_payments` (
  `id` bigint(20) NOT NULL,
  `principal_amount` decimal(8,2) NOT NULL,
  `interest_amount` decimal(8,2) NOT NULL,
  `loan_id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loan_types`
--

CREATE TABLE `loan_types` (
  `id` int(11) NOT NULL,
  `label` varchar(45) NOT NULL,
  `rate` decimal(3,1) NOT NULL,
  `rate_type` enum('flat_rate','reducing_balance') NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_types`
--

INSERT INTO `loan_types` (`id`, `label`, `rate`, `rate_type`, `status`, `updated_at`, `created_at`) VALUES
(1, 'Boafo', '0.1', 'flat_rate', 1, '2023-01-30 18:55:05', '2023-01-30 18:55:05');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) DEFAULT NULL,
  `othername` varchar(60) DEFAULT NULL,
  `sex` enum('male','female','other') NOT NULL,
  `dateofbirth` date DEFAULT NULL,
  `marital_status` enum('single','married','divorced','widowed') DEFAULT NULL,
  `primary_phone` varchar(20) NOT NULL,
  `other_phone` varchar(20) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `address` tinytext DEFAULT NULL,
  `occupation` varchar(60) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `photo_url` varchar(100) DEFAULT NULL,
  `identity_card_number` varchar(30) NOT NULL,
  `identity_card_type_id` int(11) NOT NULL,
  `identity_card_url` varchar(100) DEFAULT NULL,
  `association_id` int(11) DEFAULT NULL,
  `rstate` enum('open','closed') NOT NULL DEFAULT 'open',
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `firstname`, `lastname`, `othername`, `sex`, `dateofbirth`, `marital_status`, `primary_phone`, `other_phone`, `email`, `address`, `occupation`, `title`, `photo_url`, `identity_card_number`, `identity_card_type_id`, `identity_card_url`, `association_id`, `rstate`, `username`, `password`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'Andrews', NULL, NULL, 'male', NULL, 'single', '0246092155', NULL, NULL, NULL, 'Teacher', NULL, NULL, '12345566484', 1, NULL, NULL, 'open', NULL, NULL, NULL, '2023-01-22 09:34:10', NULL),
(2, 'Philip', NULL, NULL, 'male', NULL, 'married', '', NULL, NULL, NULL, 'Miner', NULL, NULL, '123455664', 1, NULL, NULL, 'open', NULL, NULL, NULL, '2023-01-23 10:55:20', NULL),
(3, 'Eric', NULL, NULL, 'male', NULL, 'single', '0246092145', NULL, NULL, NULL, 'Teacher', NULL, NULL, '12345566434', 2, NULL, NULL, 'open', NULL, NULL, NULL, '2023-01-23 10:55:57', NULL),
(4, 'Fred', NULL, NULL, 'male', NULL, 'married', '0246092155', NULL, NULL, NULL, 'Teacher', 'Mr', NULL, '12345566484', 2, NULL, NULL, 'open', NULL, NULL, NULL, '2023-01-30 11:44:35', NULL),
(5, 'Paul', NULL, NULL, 'male', NULL, 'single', '023456789', NULL, NULL, NULL, 'Woker', NULL, NULL, '123456780', 1, NULL, NULL, 'open', NULL, NULL, NULL, '2023-01-30 11:44:35', NULL),
(6, 'Mark', 'Joe', NULL, 'male', NULL, 'married', '0246092145', NULL, NULL, NULL, 'Teacher', NULL, NULL, '12345566484', 1, NULL, 1, 'open', NULL, NULL, NULL, '2023-01-30 11:45:59', NULL),
(7, 'Tony', NULL, NULL, 'male', NULL, 'single', '', NULL, NULL, NULL, 'Woker', NULL, NULL, '12343289390', 1, NULL, NULL, 'open', NULL, NULL, NULL, '2023-01-30 11:45:59', NULL),
(8, 'John', 'Joe', NULL, 'male', NULL, 'married', '0246033145', NULL, NULL, NULL, 'Teacher', NULL, NULL, '1289566484', 1, NULL, 1, 'open', NULL, NULL, NULL, '2023-01-30 11:47:00', NULL),
(9, 'Ato', NULL, NULL, 'male', NULL, 'single', '', NULL, NULL, NULL, 'Woker', NULL, NULL, '12003289390', 1, NULL, NULL, 'open', NULL, NULL, NULL, '2023-01-30 11:47:00', NULL),
(10, 'Nathaniel', 'Joe', NULL, 'male', NULL, 'married', '0246033145', NULL, NULL, NULL, 'Teacher', NULL, NULL, '1289566484', 1, NULL, 1, 'open', NULL, NULL, NULL, '2023-01-30 11:47:34', NULL),
(11, 'Isaac', NULL, NULL, 'male', NULL, 'single', '', NULL, NULL, NULL, 'Woker', NULL, NULL, '12003289390', 1, NULL, NULL, 'open', NULL, NULL, NULL, '2023-01-30 11:47:34', NULL),
(12, 'Philip', 'Menu', NULL, 'male', NULL, NULL, '02348947498', NULL, NULL, NULL, 'Programmer', NULL, NULL, '1234556498', 1, NULL, NULL, 'open', NULL, NULL, NULL, '2023-01-30 11:49:06', NULL),
(13, 'Augustina', NULL, NULL, 'female', NULL, 'single', '0233484798', NULL, NULL, NULL, 'Woker', NULL, NULL, '123432844490', 1, NULL, NULL, 'open', NULL, NULL, NULL, '2023-01-30 11:49:06', NULL),
(14, 'Eric', 'Mensah', '', 'male', '0000-00-00', 'single', '0246092155', '', NULL, 'Atonsu Aporabo, Kumasi', '', 'Mr.', NULL, '2032309328', 1, NULL, 1, 'open', NULL, NULL, NULL, '2023-01-30 16:06:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `label` varchar(60) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `permission_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `label`, `status`, `permission_id`, `updated_at`, `created_at`) VALUES
(1, 'Administrator', 1, 1, '2023-01-30 10:47:14', '2023-01-30 10:47:14');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `keyword` varchar(60) NOT NULL,
  `value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `phone` varchar(10) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `phone_verified_at` datetime DEFAULT NULL,
  `sex` enum('male','female','other') NOT NULL,
  `salary` decimal(8,2) DEFAULT NULL,
  `photo_url` varchar(255) DEFAULT NULL,
  `permission_id` bigint(20) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `rstatus` enum('open','close') NOT NULL DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `phone`, `firstname`, `lastname`, `email_verified_at`, `phone_verified_at`, `sex`, `salary`, `photo_url`, `permission_id`, `role_id`, `updated_at`, `deleted_at`, `created_at`, `rstatus`) VALUES
(1, 'admin', '4321asdfkaj43i98r3u4io', NULL, '0244056789', 'Eric', 'Menu', NULL, NULL, 'male', '1000.00', NULL, NULL, 1, NULL, NULL, '2023-01-30 18:43:22', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acc_types`
--
ALTER TABLE `acc_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `associations`
--
ALTER TABLE `associations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `identity_card_types`
--
ALTER TABLE `identity_card_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internal_transfers`
--
ALTER TABLE `internal_transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_payments`
--
ALTER TABLE `loan_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_types`
--
ALTER TABLE `loan_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`keyword`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`phone`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `acc_types`
--
ALTER TABLE `acc_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `associations`
--
ALTER TABLE `associations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `identity_card_types`
--
ALTER TABLE `identity_card_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `internal_transfers`
--
ALTER TABLE `internal_transfers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_payments`
--
ALTER TABLE `loan_payments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_types`
--
ALTER TABLE `loan_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
