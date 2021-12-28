-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2021 at 03:45 AM
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
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `concour_register`
--

CREATE TABLE `concour_register` (
  `id` int(11) NOT NULL,
  `Name` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `School` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Date_of_Birth` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Contact` int(20) NOT NULL,
  `Gender` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Concour` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Registration_date` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `concour_register`
--

INSERT INTO `concour_register` (`id`, `Name`, `School`, `Date_of_Birth`, `Contact`, `Gender`, `Concour`, `Address`, `Registration_date`) VALUES
(65, 'NFOR NDE NYAMBI', 'G.B.H.S Ndop', '30th  August 2003', 675874066, 'Male', 'COT Buea', 'Dschang', '14th  September 2021, 02:28:11 PM'),
(66, 'OJONG MARTIN NDE', 'INSET Bonaberi', '12th  September 2005', 654091234, 'Female', 'FHS Buea', 'Yaounde', '14th  September 2021, 07:28:11 PM');

-- --------------------------------------------------------

--
-- Table structure for table `concour_tuition`
--

CREATE TABLE `concour_tuition` (
  `id` int(11) NOT NULL,
  `Name` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Date_of_Birth` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Payment_date` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `concour_tuition`
--

INSERT INTO `concour_tuition` (`id`, `Name`, `Date_of_Birth`, `Payment_date`) VALUES
(30, 'NFOR NDE NYAMBI', '30th  August 2003', '14th  September 2021, 02:57:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `cot`
--

CREATE TABLE `cot` (
  `id` int(11) NOT NULL,
  `Name` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cot`
--

INSERT INTO `cot` (`id`, `Name`, `url`) VALUES
(1, 'COT Buea 2017 all papers', 'past questions COT Buea 2017.pdf'),
(2, 'COT Buea 2018 all papers', 'past questions COT Buea year1 2018.pdf'),
(3, 'COT English 2019', 'COT_English_Proficiency_2019.pdf'),
(4, 'COT mathematics 2019', 'COT_Mathematics_paper_year_1_2019_Eng.pdf'),
(5, 'COT physics 2019', 'COT_Physics_paper_year_1_2019_Eng.pdf'),
(6, 'COT third year electrical technology 2019', 'COT_Third_year_Electrical_technology_speciality_2019.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `fet`
--

CREATE TABLE `fet` (
  `id` int(11) NOT NULL,
  `Name` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fet`
--

INSERT INTO `fet` (`id`, `Name`, `url`) VALUES
(1, 'FET Buea mathematics 2018', 'Past question Mathematics FET 2018.pdf'),
(2, 'FET Buea physics 2019', 'Past_question_Physics_FET_2019.pdf'),
(3, 'FET mathematics 2017', 'FET 2017 mathematics paper entrance english.pdf'),
(4, 'FET physics 2018', 'Past question Physics FET 2018.pdf'),
(5, 'FET mathematics 2019', 'Past_question_Mathematics_FET_2019.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `gce_al`
--

CREATE TABLE `gce_al` (
  `id` int(11) NOT NULL,
  `Name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(2048) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Price (FCFA)` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gce_al`
--

INSERT INTO `gce_al` (`id`, `Name`, `url`, `Price (FCFA)`) VALUES
(24, 'A/L chemistry P1 2018', 'ADV_CHEMISTRY_12018.pdf', 25),
(25, 'A/L chemistry P2 2018', 'ADV_CHEMISTRY-2_2018.pdf', 25),
(26, 'A/L biology P1 2019', 'GCE_ALevel_Biology_1_2019.pdf', 25),
(27, 'A/L biology P2 2019', 'GCE_ALevel_Biology_paper2_2019.pdf', 25),
(28, 'A/L chemistry P1 2019', 'GCE_ALevel_Chemistry_1_2019.pdf', 25),
(29, 'A/L chemistry P2 2018', 'GCE_ALevel_Chemistry_paper2_2018.pdf', 25),
(30, 'A/L computer science P2 2018', 'GCE_ALevel_ComputerScience_paper_2_2018.pdf', 25),
(31, 'A/L computer science P2 2019', 'GCE_ALevel_ComputerScience_paper2_2019.pdf', 25),
(32, 'A/L further mathematics P2 2019', 'GCE_ALevel_further_Mathematics_paper2_2019.pdf', 25),
(33, 'A/L further mathematics p3 2019', 'GCE_ALevel_further_Mathematics_paper3_2019.pdf', 25),
(34, 'A/L further mathematics P1', 'GCE_ALevel_Further_maths_1_2019.pdf', 25),
(35, 'A/L biology P1 2018', 'GCEAL_Biology_1_2018.pdf', 25),
(36, 'A/L biology P2 2016', 'GCEAL_biology_2_2016.pdf', 25),
(37, 'A/L biology P2 2017', 'GCEAL_Biology_2017_2.pdf', 25),
(38, 'A/L computer science P3 2019', 'GCEAL_computer-science-3_2019.pdf', 25),
(39, 'A/L physics P1 2019', 'GCEAL_physics_1_2019.pdf', 25),
(40, 'A/L physics P2 2019', 'GCEAL_physics_2_2019.pdf', 25),
(41, 'A/L pure mathematics with statistics P1 2019', 'GCEAL_pureMathsWithStatistics_1_2019.pdf', 25),
(42, 'A/L pure mathematics with statistics P2 2019', 'GCEAL_pureMathsWithStatistics_2_2019.pdf', 25),
(43, 'A/L chemistry P2 2018', 'JUNE-2018-AL-CHEMISTRY-P2-yqjh7n.jpg', 25),
(44, 'A/L pure mathematics with mechanics P2 2019', 'ADV_Pure_Mathematics_With_Mechanics_2_2019.pdf', 25),
(45, 'A/L Geology P2 2016', 'ADV_GEOLOGY_2016.pdf', 25),
(46, 'A/L History P2 2019', 'ADV_HISTORY-2_2019.pdf', 25),
(47, 'A/L History P3 2019', 'ADV_HISTORY-3_2019.pdf', 25),
(48, 'A/L Pure mathematics with mechanics P2 2019', 'ADV_Pure_Mathematics_With_Mechanics_2_2019.pdf', 25),
(49, 'A/L Economics P1 2019', 'GCE_ALevel_Economics_1_2019.pdf', 25),
(50, 'A/L Economics P2 2019', 'GCE_ALevel_Economics_paper2_2019.pdf', 25),
(51, 'A/L Geography P1 2019', 'GCE_ALevel_geography_paper1_2019.pdf', 25),
(52, 'A/L Geography P2 2019', 'GCE_ALevel_Geography_paper2_2019.pdf', 25),
(53, 'A/L History P1 2019', 'GCE_ALevel_History_1_2019.pdf', 25),
(54, 'A/L Literature P3 2019', 'GCE_ALevel_literature_3_2019.pdf', 25),
(55, 'A/L English P1 2019', 'GCEAL_ENGLISH_1_2019.pdf', 25),
(56, 'A/L French P1 2019', 'GCEAL_french_1_2019.pdf', 25),
(57, 'A/L Literature P1 2019', 'GCEAL_literature_1_2019.pdf', 25);

-- --------------------------------------------------------

--
-- Table structure for table `graphic_design`
--

CREATE TABLE `graphic_design` (
  `id` int(11) NOT NULL,
  `Name` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(2048) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Price (FCFA)` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `graphic_design`
--

INSERT INTO `graphic_design` (`id`, `Name`, `url`, `Price (FCFA)`) VALUES
(1, 'Beautiful orange roses', 'pexels-jeff-wang-462402.jpg', 2000),
(2, 'Beautiful pink rose', 'pexels-pixabay-54323.jpg', 1500),
(3, 'Awesome computer scientist', 'computer1.jpg', 500),
(4, 'Beautiful river', 'pic1.jpg', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `Name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Date_of_Birth` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Gender` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Contact` int(20) NOT NULL,
  `Address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Membership_date` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `Name`, `Email`, `Date_of_Birth`, `Gender`, `Contact`, `Address`, `Membership_date`) VALUES
(8, 'NFOR NDE NYAMBI', 'prinzxino7@gmail.com', '18th  January 1970', 'Male', 675874066, 'Buea', '15th  September 2021, 09:34:33 AM'),
(9, 'KUETCHE TCHAMYOU SCOTT BRADLEY', 'kuetchetchamyouscottbradley@gmail.com', '14th  February 2002', 'Male', 683917001, 'Douala-Bonaberi', '15th  September 2021, 12:14:51 PM'),
(10, 'MERLIN MUTAS', 'merlin@hotmail.com', '1st  January 1970', 'Male', 675876456, '123 Buea Street', '6th  October 2021, 02:54:17 PM');

-- --------------------------------------------------------

--
-- Table structure for table `ub_past_papers`
--

CREATE TABLE `ub_past_papers` (
  `id` int(11) NOT NULL,
  `Name` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ub_past_papers`
--

INSERT INTO `ub_past_papers` (`id`, `Name`, `url`) VALUES
(1, 'EEC305 Access Networks 2020', 'ACCESS NETWORKS_EEC305_20.pdf'),
(2, 'EEC205 Analogue Electronics CA 2018', 'analog electronics_EEC205_18_ca.pdf'),
(3, 'EEC231 Circuit Analysis I CA 2020', 'circuit analysis 1_EEC231_20_ca.pdf'),
(4, 'EEC207 & EEC223 Circuit Analysis & Fundermentals of electrical engineering CA 2018', 'circuit analysis_EEC207 - fundamentals of electrical engineering_EEC223_18_ca.pdf'),
(5, 'EEC207 circuit analysis CA 2018', 'circuit analysis_EEC207_18_ca.pdf'),
(6, 'CEC207 computer for business CA 2018', 'computer for business_CEC207_18_ca.pdf'),
(7, 'CEC322 computer network protocols 2020', 'COMPUTER NETWORK PROTOCOLS_CEC322_20.pdf'),
(8, 'EEC405 computer wireless communication 2020', 'COMPUTER WIRELESS COMMUNICATION_EEC405_20.pdf'),
(9, 'EEC302 Digital electronic laboratory 2020', 'DIGITAL ELECTRONIC LABORATORY_EEC302_20.pdf'),
(10, 'EEC342 electrical power transmission and distribution CA 2020', 'electrical power transmission and distribution_EEC342_20_ca.pdf'),
(11, 'ENG101 Use of English I 2014', 'ENG101_14.pdf'),
(12, 'ENG101 Use of English I 2018', 'ENG101_18.pdf'),
(13, 'ENG101 Use of English I CA 2019', 'ENG101_19_ca.pdf'),
(14, 'ENG102 Use of English II 2020', 'ENG102_20.pdf'),
(15, 'FRE101 Functional French I', 'FRE101 past questions.pdf'),
(16, 'CEC315 Introduction to cloud computing 2020', 'INTRODUCTION TO CLOUD COMPUTING_CEC315_20.pdf'),
(17, 'CEC335 Introduction to networking and security 2020', 'INTRODUCTION TO NETWORKING AND SECURITY_CEC335_20.pdf'),
(18, 'EEC213 material science CA 2018', 'materials science_EEC213_18_ca.pdf'),
(19, 'EEC209 mathematics I CA 2018', 'mathematics 1_EEC209_18_ca.pdf'),
(20, 'EEC209 mathematics I tutorials', 'mathematics 1_EEC209_ts.pdf'),
(21, 'COT305 Mathematics III 2019', 'MATHEMATICS 3_COT305_19.pdf'),
(22, 'EEC211 Physics I 2018', 'PHYSICS 1_EEC211_18.pdf'),
(23, 'EEC211 physics I CA 2018', 'physics 1_EEC211_18_ca.pdf'),
(24, 'EEC211 physics I tutorials', 'physics 1_EEC211_ts.pdf'),
(25, 'CEC213 Programming I 2019', 'PROGRAMMING 1_CEC213_19.pdf'),
(26, 'CEC213 Programming I CA 2019', 'programming 1_CEC213_19_ca.pdf'),
(27, 'CEC321 Programming with UML 2020', 'PROGRAMMING WITH UML_CEC321_20.pdf'),
(28, 'CEC321 Programming with UML CA 2020', 'programming with uml_CEC321_20_ca.pdf'),
(29, 'EEC319 Radio communications 2020', 'RADIO COMMUNICATIONS_EEC319_20.pdf'),
(30, 'Signals and Systems 2018', 'SIGNALS AND SYSTEMS_18.pdf'),
(31, 'MAT207 Tutorial Sheet 4', 'MAT207 Tutorial Sheet 4.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `web_design`
--

CREATE TABLE `web_design` (
  `id` int(11) NOT NULL,
  `Name` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(2048) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `web_first_installment`
--

CREATE TABLE `web_first_installment` (
  `id` int(11) NOT NULL,
  `Name` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Date_of_Birth` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Payment_date` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_first_installment`
--

INSERT INTO `web_first_installment` (`id`, `Name`, `Date_of_Birth`, `Payment_date`) VALUES
(6, 'KUM LESLIE MUA', '28th  April 2000', '14th  September 2021, 03:14:04 PM');

-- --------------------------------------------------------

--
-- Table structure for table `web_register`
--

CREATE TABLE `web_register` (
  `id` int(11) NOT NULL,
  `Name` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Date_of_Birth` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` int(50) NOT NULL,
  `Gender` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Registration_date` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_register`
--

INSERT INTO `web_register` (`id`, `Name`, `Date_of_Birth`, `Phone`, `Gender`, `Address`, `Registration_date`) VALUES
(14, 'KUM LESLIE MUA', '28th  April 2000', 654345678, 'Male', 'Douala', '14th  September 2021, 03:13:11 PM');

-- --------------------------------------------------------

--
-- Table structure for table `web_second_installment`
--

CREATE TABLE `web_second_installment` (
  `id` int(11) NOT NULL,
  `Name` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Date_of_Birth` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Payment_date` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_second_installment`
--

INSERT INTO `web_second_installment` (`id`, `Name`, `Date_of_Birth`, `Payment_date`) VALUES
(6, 'KUM LESLIE MUA', '28th  April 2000', '14th  September 2021, 03:14:56 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `concour_register`
--
ALTER TABLE `concour_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `concour_tuition`
--
ALTER TABLE `concour_tuition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cot`
--
ALTER TABLE `cot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fet`
--
ALTER TABLE `fet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gce_al`
--
ALTER TABLE `gce_al`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `graphic_design`
--
ALTER TABLE `graphic_design`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ub_past_papers`
--
ALTER TABLE `ub_past_papers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_design`
--
ALTER TABLE `web_design`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_first_installment`
--
ALTER TABLE `web_first_installment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_register`
--
ALTER TABLE `web_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_second_installment`
--
ALTER TABLE `web_second_installment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `concour_register`
--
ALTER TABLE `concour_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `concour_tuition`
--
ALTER TABLE `concour_tuition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `cot`
--
ALTER TABLE `cot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fet`
--
ALTER TABLE `fet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gce_al`
--
ALTER TABLE `gce_al`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `graphic_design`
--
ALTER TABLE `graphic_design`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ub_past_papers`
--
ALTER TABLE `ub_past_papers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `web_design`
--
ALTER TABLE `web_design`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `web_first_installment`
--
ALTER TABLE `web_first_installment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `web_register`
--
ALTER TABLE `web_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `web_second_installment`
--
ALTER TABLE `web_second_installment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
