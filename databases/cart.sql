-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2021 at 08:39 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `monday, 13th of september 2021, 09:33:51 pm`
--

CREATE TABLE `monday, 13th of september 2021, 09:33:51 pm` (
  `id` int(10) NOT NULL,
  `Paper Name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Price (FCFA)` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monday, 13th of september 2021, 09:33:51 pm`
--

INSERT INTO `monday, 13th of september 2021, 09:33:51 pm` (`id`, `Paper Name`, `url`, `Price (FCFA)`) VALUES
(1, 'Beautiful orange roses', 'pexels-jeff-wang-462402.jpg', 100),
(25, 'A/L chemistry P2 2018', 'ADV_CHEMISTRY-2_2018.pdf', 100),
(26, 'A/L biology P1 2019', 'GCE_ALevel_Biology_1_2019.pdf', 100),
(27, 'A/L biology P2 2019', 'GCE_ALevel_Biology_paper2_2019.pdf', 100);

-- --------------------------------------------------------

--
-- Table structure for table `monday, 13th of september 2021, 09:35:11 pm`
--

CREATE TABLE `monday, 13th of september 2021, 09:35:11 pm` (
  `id` int(10) NOT NULL,
  `Paper Name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Price (FCFA)` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monday, 13th of september 2021, 09:35:11 pm`
--

INSERT INTO `monday, 13th of september 2021, 09:35:11 pm` (`id`, `Paper Name`, `url`, `Price (FCFA)`) VALUES
(1, 'Beautiful orange roses', 'pexels-jeff-wang-462402.jpg', 2000),
(25, 'A/L chemistry P2 2018', 'ADV_CHEMISTRY-2_2018.pdf', 25),
(26, 'A/L biology P1 2019', 'GCE_ALevel_Biology_1_2019.pdf', 25),
(27, 'A/L biology P2 2019', 'GCE_ALevel_Biology_paper2_2019.pdf', 25);

-- --------------------------------------------------------

--
-- Table structure for table `monday, 13th of september 2021, 09:36:20 pm`
--

CREATE TABLE `monday, 13th of september 2021, 09:36:20 pm` (
  `id` int(10) NOT NULL,
  `Paper Name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Price (FCFA)` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monday, 13th of september 2021, 09:36:20 pm`
--

INSERT INTO `monday, 13th of september 2021, 09:36:20 pm` (`id`, `Paper Name`, `url`, `Price (FCFA)`) VALUES
(0, 'A/L biology P1 2019', 'GCE_ALevel_Biology_1_2019.pdf', 25);

-- --------------------------------------------------------

--
-- Table structure for table `monday, 13th of september 2021, 09:38:41 pm`
--

CREATE TABLE `monday, 13th of september 2021, 09:38:41 pm` (
  `id` int(10) NOT NULL,
  `Paper Name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Price (FCFA)` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monday, 13th of september 2021, 09:38:41 pm`
--

INSERT INTO `monday, 13th of september 2021, 09:38:41 pm` (`id`, `Paper Name`, `url`, `Price (FCFA)`) VALUES
(1, 'Beautiful orange roses', 'pexels-jeff-wang-462402.jpg', 2000),
(25, 'A/L chemistry P2 2018', 'ADV_CHEMISTRY-2_2018.pdf', 25),
(26, 'A/L biology P1 2019', 'GCE_ALevel_Biology_1_2019.pdf', 25),
(27, 'A/L biology P2 2019', 'GCE_ALevel_Biology_paper2_2019.pdf', 25);

-- --------------------------------------------------------

--
-- Table structure for table `monday, 13th of september 2021, 09:58:48 pm`
--

CREATE TABLE `monday, 13th of september 2021, 09:58:48 pm` (
  `id` int(10) NOT NULL,
  `Paper Name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Price (FCFA)` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monday, 13th of september 2021, 09:58:48 pm`
--

INSERT INTO `monday, 13th of september 2021, 09:58:48 pm` (`id`, `Paper Name`, `url`, `Price (FCFA)`) VALUES
(1, 'Beautiful orange roses', 'pexels-jeff-wang-462402.jpg', 2000),
(2, 'Beautiful pink rose', 'pexels-pixabay-54323.jpg', 1500),
(25, 'A/L chemistry P2 2018', 'ADV_CHEMISTRY-2_2018.pdf', 25),
(27, 'A/L biology P2 2019', 'GCE_ALevel_Biology_paper2_2019.pdf', 25);

-- --------------------------------------------------------

--
-- Table structure for table `monday, 13th of september 2021, 09:59:25 pm`
--

CREATE TABLE `monday, 13th of september 2021, 09:59:25 pm` (
  `id` int(10) NOT NULL,
  `Paper Name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Price (FCFA)` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monday, 13th of september 2021, 09:59:25 pm`
--

INSERT INTO `monday, 13th of september 2021, 09:59:25 pm` (`id`, `Paper Name`, `url`, `Price (FCFA)`) VALUES
(1, 'Beautiful orange roses', 'pexels-jeff-wang-462402.jpg', 2000),
(2, 'Beautiful pink rose', 'pexels-pixabay-54323.jpg', 1500),
(25, 'A/L chemistry P2 2018', 'ADV_CHEMISTRY-2_2018.pdf', 25),
(27, 'A/L biology P2 2019', 'GCE_ALevel_Biology_paper2_2019.pdf', 25);

-- --------------------------------------------------------

--
-- Table structure for table `tuesday, 14th of september 2021, 06:09:56 am`
--

CREATE TABLE `tuesday, 14th of september 2021, 06:09:56 am` (
  `id` int(10) NOT NULL,
  `Paper Name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Price (FCFA)` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tuesday, 14th of september 2021, 06:09:56 am`
--

INSERT INTO `tuesday, 14th of september 2021, 06:09:56 am` (`id`, `Paper Name`, `url`, `Price (FCFA)`) VALUES
(1, 'Beautiful orange roses', 'pexels-jeff-wang-462402.jpg', 2000),
(2, 'Beautiful pink rose', 'pexels-pixabay-54323.jpg', 1500),
(3, 'Awesome computer scientist', 'computer1.jpg', 500),
(4, 'Beautiful river', 'pic1.jpg', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `tuesday, 14th of september 2021, 06:09:57 am`
--

CREATE TABLE `tuesday, 14th of september 2021, 06:09:57 am` (
  `id` int(10) NOT NULL,
  `Paper Name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Price (FCFA)` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tuesday, 14th of september 2021, 06:09:57 am`
--

INSERT INTO `tuesday, 14th of september 2021, 06:09:57 am` (`id`, `Paper Name`, `url`, `Price (FCFA)`) VALUES
(1, 'Beautiful orange roses', 'pexels-jeff-wang-462402.jpg', 2000),
(2, 'Beautiful pink rose', 'pexels-pixabay-54323.jpg', 1500),
(3, 'Awesome computer scientist', 'computer1.jpg', 500),
(4, 'Beautiful river', 'pic1.jpg', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `tuesday, 14th of september 2021, 06:10:29 am`
--

CREATE TABLE `tuesday, 14th of september 2021, 06:10:29 am` (
  `id` int(10) NOT NULL,
  `Paper Name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Price (FCFA)` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tuesday, 14th of september 2021, 06:10:29 am`
--

INSERT INTO `tuesday, 14th of september 2021, 06:10:29 am` (`id`, `Paper Name`, `url`, `Price (FCFA)`) VALUES
(1, 'Beautiful orange roses', 'pexels-jeff-wang-462402.jpg', 2000),
(2, 'Beautiful pink rose', 'pexels-pixabay-54323.jpg', 1500),
(3, 'Awesome computer scientist', 'computer1.jpg', 500),
(4, 'Beautiful river', 'pic1.jpg', 1000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `monday, 13th of september 2021, 09:33:51 pm`
--
ALTER TABLE `monday, 13th of september 2021, 09:33:51 pm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monday, 13th of september 2021, 09:35:11 pm`
--
ALTER TABLE `monday, 13th of september 2021, 09:35:11 pm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monday, 13th of september 2021, 09:36:20 pm`
--
ALTER TABLE `monday, 13th of september 2021, 09:36:20 pm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monday, 13th of september 2021, 09:38:41 pm`
--
ALTER TABLE `monday, 13th of september 2021, 09:38:41 pm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monday, 13th of september 2021, 09:58:48 pm`
--
ALTER TABLE `monday, 13th of september 2021, 09:58:48 pm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monday, 13th of september 2021, 09:59:25 pm`
--
ALTER TABLE `monday, 13th of september 2021, 09:59:25 pm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tuesday, 14th of september 2021, 06:09:56 am`
--
ALTER TABLE `tuesday, 14th of september 2021, 06:09:56 am`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tuesday, 14th of september 2021, 06:09:57 am`
--
ALTER TABLE `tuesday, 14th of september 2021, 06:09:57 am`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tuesday, 14th of september 2021, 06:10:29 am`
--
ALTER TABLE `tuesday, 14th of september 2021, 06:10:29 am`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
