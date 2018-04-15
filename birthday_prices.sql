-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 15, 2018 at 08:18 AM
-- Server version: 5.7.21
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e3creative`
--

-- --------------------------------------------------------

--
-- Table structure for table `birthday_prices`
--

CREATE TABLE `birthday_prices` (
  `id` int(11) NOT NULL,
  `birthday` date DEFAULT NULL,
  `price` decimal(10,6) NOT NULL,
  `currency` varchar(3) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `birthday_prices`
--

INSERT INTO `birthday_prices` (`id`, `birthday`, `price`, `currency`, `created_at`, `updated_at`) VALUES
(5, '2018-04-02', '0.875444', 'GBP', '2018-04-15 14:02:01', '2018-04-15 14:02:01'),
(7, '2017-06-05', '0.872460', 'GBP', '2018-04-15 14:21:24', '2018-04-15 14:21:24'),
(8, '2017-06-05', '0.872460', 'GBP', '2018-04-15 14:33:18', '2018-04-15 14:33:18'),
(9, '2017-06-05', '0.872460', 'GBP', '2018-04-15 14:33:18', '2018-04-15 14:33:18'),
(11, '2017-06-04', '0.876641', 'GBP', '2018-04-15 14:35:34', '2018-04-15 14:35:34'),
(13, '2017-12-01', '0.883417', 'GBP', '2018-04-15 14:45:37', '2018-04-15 14:45:37'),
(14, '2017-12-01', '0.883417', 'GBP', '2018-04-15 14:47:34', '2018-04-15 14:47:34'),
(15, '2017-12-01', '0.883417', 'GBP', '2018-04-15 14:47:52', '2018-04-15 14:47:52'),
(16, '2017-12-01', '0.883417', 'GBP', '2018-04-15 14:48:08', '2018-04-15 14:48:08'),
(17, '2017-12-01', '0.883417', 'GBP', '2018-04-15 14:50:47', '2018-04-15 14:50:47'),
(18, '2017-07-01', '0.877712', 'GBP', '2018-04-15 15:10:51', '2018-04-15 15:10:51'),
(19, '2017-07-01', '0.877712', 'GBP', '2018-04-15 15:11:02', '2018-04-15 15:11:02'),
(20, '2017-06-04', '0.876641', 'GBP', '2018-04-15 15:16:22', '2018-04-15 15:16:22'),
(21, '2017-06-04', '0.876641', 'GBP', '2018-04-15 15:16:30', '2018-04-15 15:16:30'),
(22, '2017-06-04', '0.876641', 'GBP', '2018-04-15 15:16:35', '2018-04-15 15:16:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `birthday_prices`
--
ALTER TABLE `birthday_prices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `birthday_prices`
--
ALTER TABLE `birthday_prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
