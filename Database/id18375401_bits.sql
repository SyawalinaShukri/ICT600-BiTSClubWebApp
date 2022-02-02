-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 31, 2022 at 05:37 PM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id18375401_bits`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `about_id` int(10) NOT NULL,
  `admin_id` int(10) NOT NULL,
  `vision` text NOT NULL,
  `misision` text NOT NULL,
  `executive_list` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`about_id`, `admin_id`, `vision`, `misision`, `executive_list`) VALUES
(2, 1, 'Melahirkan ahli yang bekepimpinan, berdaya saing serta berupaya menguasai kemahiran ICT', 'Berazam dan komited untuk melahirkan keluarga BiTS yang lebih efisyen bagi membina sebuah persatuan yang aktif dan dinamik di samping menaikkan nama UiTM ke pentas antarabangsa', 'Exco Publisiti, Exco Multimedia, Exco Kebajikan, Exco Akademik, Exco Keusahawanan');

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activity_id` int(10) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `activity_title` text NOT NULL,
  `activity_pic` varchar(100) NOT NULL,
  `activity_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `studentID` int(10) NOT NULL,
  `admin_name` text NOT NULL,
  `admin_gender` text NOT NULL,
  `admin_prog` text NOT NULL,
  `admin_group` text NOT NULL,
  `admin_phone` text NOT NULL,
  `admin_email` text NOT NULL,
  `admin_pass` text NOT NULL,
  `admin_reg_date` date NOT NULL,
  `admin_position` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `studentID`, `admin_name`, `admin_gender`, `admin_prog`, `admin_group`, `admin_phone`, `admin_email`, `admin_pass`, `admin_reg_date`, `admin_position`) VALUES
(1, 2019230076, 'Farahizah', 'Female', 'CS240', 'RCS2405B', '0123456787', 'farah@mail.com', '1234', '2022-01-25', 'Vice  President'),
(6, 2020987650, 'Putera', 'Male', 'CS240', 'RCS2404A', '0123456789', 'putera@mail.com', '1234', '2022-01-26', 'President');

-- --------------------------------------------------------

--
-- Table structure for table `executive`
--

CREATE TABLE `executive` (
  `executive_id` int(10) NOT NULL,
  `admin_id` int(10) NOT NULL,
  `executive_title` int(11) NOT NULL,
  `executive_pic` int(11) NOT NULL,
  `executive_desc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `studentID` int(10) NOT NULL,
  `guest_name` text NOT NULL,
  `guest_email` text NOT NULL,
  `guest_pass` text NOT NULL,
  `guest_confirm_pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`studentID`, `guest_name`, `guest_email`, `guest_pass`, `guest_confirm_pass`) VALUES
(2016682573, 'Elsa', 'elsa@mail.com', '12345678', '12345678'),
(2017678987, 'Nur', 'nur@mail.com', '12345678', '12345678'),
(2019234567, 'Nina ', 'nina@mail.com', '12345678', '12345678'),
(2019891732, 'william dazai', 'dazai10@gmail.com', 'november21', 'november21'),
(2019987650, 'Lala', 'lala@mail.com', '12345678', '12345678'),
(2020123456, 'Ahmad', 'ahmad@mail.com', '1234', '1234'),
(2020567890, 'Noah', 'noah@mail.com', '12345678', '12345678'),
(2020969295, 'Syawalina', 'syawal@mail.com', '12345678', '12345678'),
(2020969296, 'Ali', 'ali@mail.com', '12345678', '12345678'),
(2020971657, 'Izzati', 'izzati@gmail.com', 'Izzati99', 'Izzati99'),
(2022123456, 'Ren Kanagi', 'renkanagi@mail.com', '12345678', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `member_approval`
--

CREATE TABLE `member_approval` (
  `member_id` int(10) NOT NULL,
  `studentID` int(10) NOT NULL,
  `adminID` int(10) DEFAULT NULL,
  `mbr_name` text NOT NULL,
  `mbr_gender` text NOT NULL,
  `mbr_prog` text NOT NULL,
  `mbr_group` text NOT NULL,
  `mbr_phone` text NOT NULL,
  `mbr_email` text NOT NULL,
  `mbr_pass` text NOT NULL,
  `mbr_confirm_pass` text NOT NULL,
  `mbr_reg_date` date NOT NULL,
  `mbr_approval` text DEFAULT NULL,
  `mbr_type` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_approval`
--

INSERT INTO `member_approval` (`member_id`, `studentID`, `adminID`, `mbr_name`, `mbr_gender`, `mbr_prog`, `mbr_group`, `mbr_phone`, `mbr_email`, `mbr_pass`, `mbr_confirm_pass`, `mbr_reg_date`, `mbr_approval`, `mbr_type`) VALUES
(2, 2020123456, 0, 'Ahmad', 'Male', 'CS245', 'RCS2452B', '0171239431', 'ahmad@mail.com', '1234', '1234', '2022-01-25', 'Approved', 'Member'),
(5, 2020567890, 6, 'Noah', 'Male', 'CS245', 'RCS2451B', '0198765432', 'noah@mail.com', '1234', '1234', '2022-01-26', 'Rejected', 'Unqualified'),
(8, 2020969295, 4, 'Syawalina', 'Female', 'CS240', 'RCS2405B', '0134567890', 'syawal@mail.com', '12345678', '12345678', '2022-01-26', 'Rejected', 'Unqualified'),
(9, 2020971657, 1, 'Izzati', 'Female', 'CS240', 'RCS2405B', '0137561044', 'izzati@gmail.com', 'Izzati99', 'Izzati99', '2022-01-31', 'Approved', 'Member'),
(10, 2022123456, 2, 'Ren Kanagi', 'Male', 'CS245', 'CS2454B', '0154321234', 'renkanagi@mail.com', '12345678', '12345678', '2022-01-31', 'Approved', 'Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`about_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `executive`
--
ALTER TABLE `executive`
  ADD PRIMARY KEY (`executive_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `member_approval`
--
ALTER TABLE `member_approval`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `adminID` (`adminID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `about_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activity_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `executive`
--
ALTER TABLE `executive`
  MODIFY `executive_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_approval`
--
ALTER TABLE `member_approval`
  MODIFY `member_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
