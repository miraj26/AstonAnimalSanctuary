-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2019 at 03:57 PM
-- Server version: 5.5.62
-- PHP Version: 7.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shahm23_animalSanctuary`
--
CREATE DATABASE IF NOT EXISTS `shahm23_animalSanctuary` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `shahm23_animalSanctuary`;

-- --------------------------------------------------------

--
-- Table structure for table `adoption_requests`
--

CREATE TABLE `adoption_requests` (
  `id` bigint(100) UNSIGNED NOT NULL,
  `animalId` int(11) NOT NULL,
  `petname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accepted` enum('Approved','Pending','Rejected','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adoption_requests`
--

INSERT INTO `adoption_requests` (`id`, `animalId`, `petname`, `username`, `accepted`, `created_at`, `updated_at`) VALUES
(1, 1, 'Rex', 'test', 'Approved', '2019-04-18 09:38:15', '2019-04-24 09:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longblob NOT NULL,
  `availability` enum('Available','Unavailable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Available',
  `type` enum('Dog','Cat','Aquarium','Bird','Mammal','Rodent','Reptile','Amphibian','Horse') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Dog',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `name`, `dob`, `description`, `image`, `availability`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Rex', '2019-04-01', 'Rex is a kind little dog that is full of energy.', 0x7265785f313535353138323733385f313535353333343136392e6a7067, 'Unavailable', 'Dog', '2019-04-13 18:12:18', '2019-04-24 09:38:18'),
(2, 'Whiskers', '2018-01-31', 'Whiskers was left in an alley and needs a new home', 0x636174325f313535353138353135392e6a706567, 'Available', 'Cat', '2019-04-13 18:52:39', '2019-04-13 18:52:39'),
(3, 'Albey', '2017-06-15', 'A vibrant parrot, that will listen to your problems and talk to you.', 0x706172726f745f313535353138363331352e6a7067, 'Available', 'Bird', '2019-04-13 19:11:55', '2019-04-13 19:11:55'),
(4, 'Anglel', '2016-06-16', 'Full of joy and will crack a joke or two.', 0x38643036306664643962313036356261363234656465663938313862323236345f313535363039373233312e6a706567, 'Available', 'Bird', '2019-04-24 08:13:51', '2019-04-24 08:13:51'),
(5, 'Lucas', '2015-07-21', 'Loves to run the wheel and eat lots of leaves.', 0x68616d737465725f313535363130323834322e6a706567, 'Available', 'Rodent', '2019-04-24 09:47:22', '2019-04-24 09:47:22'),
(6, 'Nemo', '2018-02-04', 'Clown fish', 0x6e656d6f5f313535363130323939352e6a7067, 'Available', 'Aquarium', '2019-04-24 09:49:55', '2019-04-24 09:49:55'),
(7, 'Monty', '2019-01-01', 'A python. Unique type of pet, envy of all your friends.', 0x736e616b655f313535363130333232302e6a7067, 'Available', 'Reptile', '2019-04-24 09:53:40', '2019-04-24 09:53:40'),
(8, 'Lola', '2019-01-25', 'Sweet little dog, that needs a caring home. Perfect dog for a house with children.', 0x646f672d61742d686f6d655f313535363130333336392e6a7067, 'Available', 'Dog', '2019-04-24 09:56:09', '2019-04-24 09:56:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(25, '2014_10_12_000000_create_users_table', 1),
(26, '2014_10_12_100000_create_password_resets_table', 1),
(27, '2019_04_03_194234_create_animals_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `email`, `email_verified_at`, `password`, `remember_token`, `address`, `postcode`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Miraj', 'Shah', 'admin@admin.com', NULL, '$2y$10$hF5aeUqRy5ruHoa7/r/BReoYw0aO8BehXSPoEZYelYJPyxvn3N0XO', NULL, 'Old Fire Station', 'B47DA', 1, '2019-04-13 18:08:15', '2019-04-13 18:08:15'),
(2, 'test', 'Test1', 'Accounts', 'test@fmail.com', NULL, '$2y$10$UGRTcF8WGFJb4OjBUcutruPjjztgptO8sQwr7JWdQwZ93tNcAVZB.', NULL, '123 Fake Street', 'B47DA', 0, '2019-04-13 18:21:37', '2019-04-18 09:31:52'),
(3, 'bobby19', 'Bobby', 'Firmino', 'bob@fmail.com', NULL, '$2y$10$vePq0XWmqTUqcuo5QjOGJuau2q3ghgL6166rOpEWjC6GTRRg9t8Mm', NULL, '56 Red Street', 'B61LG', 0, '2019-04-24 09:41:25', '2019-04-24 09:41:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoption_requests`
--
ALTER TABLE `adoption_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
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
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoption_requests`
--
ALTER TABLE `adoption_requests`
  MODIFY `id` bigint(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
