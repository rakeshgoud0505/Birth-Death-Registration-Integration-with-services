-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2024 at 12:05 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `obcsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(200) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp(),
  `RoleId` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`, `RoleId`) VALUES
(1, 'municipality', 'municipality', 8979555556, 'municipality@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2023-01-05 12:05:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblapplication`
--

CREATE TABLE `tblapplication` (
  `ID` int(10) NOT NULL,
  `UserID` int(5) NOT NULL,
  `ApplicationID` varchar(200) DEFAULT NULL,
  `DateofBirth` varchar(200) DEFAULT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `PlaceofBirth` varchar(200) DEFAULT NULL,
  `NameofFather` varchar(200) DEFAULT NULL,
  `NameOfMother` varchar(120) DEFAULT NULL,
  `PermanentAdd` mediumtext DEFAULT NULL,
  `PostalAdd` mediumtext DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Dateofapply` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(200) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `HStatus` varchar(255) DEFAULT NULL,
  `DateofDeath` date DEFAULT NULL,
  `bd_Id` int(11) DEFAULT NULL,
  `MotherAadharNumber` varchar(20) DEFAULT NULL,
  `FatherAadharNumber` varchar(20) DEFAULT NULL,
  `HospitalName` varchar(100) DEFAULT NULL,
  `H_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblapplication`
--

INSERT INTO `tblapplication` (`ID`, `UserID`, `ApplicationID`, `DateofBirth`, `Gender`, `FullName`, `PlaceofBirth`, `NameofFather`, `NameOfMother`, `PermanentAdd`, `PostalAdd`, `MobileNumber`, `Email`, `Dateofapply`, `Remark`, `Status`, `UpdationDate`, `HStatus`, `DateofDeath`, `bd_Id`, `MotherAadharNumber`, `FatherAadharNumber`, `HospitalName`, `H_id`) VALUES
(6, 6, '725632617', '2024-01-09', 'Male', 'vinay', 'kkkkk', 'kkkkkk', 'kkkkkk', 'aa', 'a', 6363885750, 'chetanwali2001@gmail.com', '2024-01-07 07:36:14', 'aproved', 'HVerified', '2024-01-08 07:26:00', 'HVerified', NULL, 1, NULL, NULL, NULL, 1),
(7, 6, '652842971', '2024-01-08', 'Female', 'aaaa', 'aaaaa', 'aa', 'aaaaaaa', 'aaa', 'aaa', 1234567890, 'a@gmail.com', '2024-01-07 11:20:30', 'ok', 'HVerified', '2024-01-08 07:42:56', 'HVerified', NULL, 1, '12356789897', '12345679789', 'hospital', 1),
(8, 6, '881541880', NULL, 'Female', 'aaaa', 'aaaaa', 'aa', 'aaaaaaa', 'ww', 'ww', 1234567890, 'a@gmail.com', '2024-01-07 11:40:00', NULL, NULL, '2024-01-08 07:26:14', NULL, '2024-01-17', 2, '12356789897', '12345679789', 'hospital', 1),
(9, 7, '509590111', '2024-01-08', 'Male', 'aaaa', 'aaaaa', 'aa', 'aaaaaaa', 'aa', 'aa', 987654321, 'a@gmail.com', '2024-01-07 11:42:44', NULL, NULL, '2024-01-08 07:26:18', NULL, NULL, 1, '12356789897', '12345679789', 'city_hospital', 2),
(10, 7, '551036411', '2024-01-09', 'Female', 'aaaa', 'aaaaa', 'aa', 'aaaaaaa', 'gokak', 'gokak', 987654321, 'a@gmail.com', '2024-01-07 18:31:29', NULL, NULL, '2024-01-08 07:26:27', NULL, NULL, 1, '12356789897', '12345679789', 'hospital2', 3),
(11, 7, '637161957', NULL, 'Female', 'mm', 'mmmmmmmmmmmm', 'm', 'm', 'mm', 'etrt', 987654321, 'a@gmail.com', '2024-01-07 18:32:38', NULL, NULL, '2024-01-08 07:26:32', NULL, '2024-01-10', 2, '12356789866', '123456797866', 'hospital2', 3),
(12, 8, '4568931654', NULL, 'Female', 'ss', 'ss', 's', 'ss', 'ss', 'ss', 987654321, 's@gmail.com', '2024-01-10 18:32:38', NULL, NULL, '2024-01-08 07:26:35', NULL, '2024-01-11', 2, '12356789866', '123456797866', 'hospital2', 3),
(13, 7, '515106684', '2024-01-09', 'Female', 'ffff', 'ffffffffff', 'm', 'm', 'ff', 'ff', 987654321, 'a@gmail.com', '2024-01-07 19:08:53', 'k', 'HVerified', '2024-01-08 07:49:00', NULL, NULL, 1, '12356789866', '123456797866', 'hospital2', 3),
(14, 7, '821100971', '2024-01-13', 'Female', 'vinay', 'kkkkk', 'kkkkkk', 'kkkkkk', 'aaaaa', 'aaaaa', 6363885750, 'chetanwali2001@gmail.com', '2024-01-08 05:02:57', 'ok', 'HRejected', '2024-01-08 07:44:18', 'HRejected', NULL, 1, '12356789866', '12345679789', 'hospital', 1),
(15, 7, '950237331', '2024-01-18', 'Male', 'vinay', 'kkkkk', 'kkkkkk', 'kkkkkk', 'Bangalore', 'Bangalore', 6363885750, 'chetanwali2001@gmail.com', '2024-01-08 05:51:30', NULL, NULL, '2024-01-08 07:26:50', NULL, NULL, 1, '12356789866', '12345679789', 'hospital', 1),
(16, 7, '220746065', NULL, 'Female', 'jjj', 'jjj', 'j', 'j', 'jj', 'jj', 9591080994, 'vinay4@gmail.com', '2024-01-08 09:32:52', NULL, NULL, NULL, NULL, '2024-01-12', 2, 'jjj', 'jj', NULL, NULL),
(17, 7, '486631569', NULL, 'Female', 'm', 'm', 'm', 'm', 'nn', 'nnn', 987654321, 'a@gmail.com', '2024-01-08 09:40:47', NULL, NULL, NULL, NULL, '2024-01-17', 2, '12356789866', '12345679789', NULL, NULL),
(18, 7, '746845882', NULL, 'Female', 'm', 'm', 'm', 'm', 'sssss', 'ssss', 987654321, 'a@gmail.com', '2024-01-08 09:47:39', NULL, NULL, NULL, NULL, '2024-01-12', 2, '12356789866', '12345679789', NULL, NULL),
(19, 7, '163502254', NULL, 'Male', 'jan', 'm', 'm', 'm', 'aaa', 'aaa', 987654321, 'a@gmail.com', '2024-01-08 09:49:03', NULL, NULL, NULL, NULL, '2024-01-18', 2, '12356789866', '12345679789', NULL, NULL),
(20, 7, '806156248', NULL, 'Male', 'manu', 'm', 'm', 'm', 'ss', 'ss', 987654321, 'a@gmail.com', '2024-01-08 10:00:50', NULL, NULL, '2024-01-08 10:04:30', NULL, '2024-01-10', 2, '12356789866', '12345679789', 'hospital2', 3),
(21, 7, '277679556', '2024-01-18', 'Female', 'manussss', 'm', 'm', 'm', 's', 's', 987654321, 'a@gmail.com', '2024-01-08 10:01:55', NULL, NULL, '2024-01-08 10:04:23', NULL, NULL, 1, '12356789866', '12345679789', 'hospital', 1),
(22, 7, '149936475', NULL, 'Male', 'ooooooo', 'oooo', 'o', 'ooooooo', 'o', 'o', 9591080994, 'vinay4@gmail.com', '2024-01-08 10:11:05', NULL, NULL, NULL, NULL, '2024-01-10', 2, '12356789897', '123456797866', 'city_hospital', NULL),
(23, 7, '756079956', NULL, 'Male', 'ooooooo', 'oooo', 'o', 'ooooooo', 'gokak', 'gokak', 9591080994, 'vinay4@gmail.com', '2024-01-08 10:29:30', NULL, NULL, NULL, NULL, '2024-01-18', 2, '12356789897', '123456797866', 'hospital', NULL),
(24, 7, '765907259', NULL, 'Female', 'ooooooo', 'oooo', 'o', 'ooooooo', 'adming', 'admin', 9591080994, 'vinay4@gmail.com', '2024-01-08 10:36:32', NULL, NULL, NULL, NULL, '2024-01-05', 2, '12356789897', '123456797866', 'hospital', 1),
(25, 7, '457198685', NULL, 'Female', 'ooooooo', 'oooo', 'o', 'ooooooo', 'we', '222222', 9591080994, 'vinay4@gmail.com', '2024-01-08 10:38:09', NULL, NULL, NULL, NULL, '2024-01-17', 2, '12356789897', '123456797866', 'city_hospital', 2),
(26, 7, '123374590', NULL, 'Male', 'ooooooo', 'oooo', 'o', 'ooooooo', 'lllllllllll', 'llllllll', 9591080994, 'vinay4@gmail.com', '2024-01-08 10:47:16', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 'city_hospital', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblhospital`
--

CREATE TABLE `tblhospital` (
  `ID` int(10) NOT NULL,
  `HospitalName` varchar(200) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `HospitalRegdate` timestamp NULL DEFAULT current_timestamp(),
  `RoleId` int(11) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblhospital`
--

INSERT INTO `tblhospital` (`ID`, `HospitalName`, `UserName`, `MobileNumber`, `Email`, `Password`, `HospitalRegdate`, `RoleId`) VALUES
(1, 'hospital', 'hospital', 8979555556, 'hospital@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2023-01-05 06:35:09', 2),
(2, 'city_hospital', 'city_hospital', 8979555556, 'city_hospital@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2023-01-05 06:35:09', 2),
(3, 'hospital2', 'hospital2', 8979555556, 'hospital2@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2023-01-05 06:35:09', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FirstName` varchar(200) DEFAULT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `Password` varchar(200) NOT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Address`, `Password`, `RegDate`) VALUES
(6, 'chetan', 'wali', 6363885750, '6363885750', '81dc9bdb52d04dc20036dbd8313ed055', '2024-01-07 07:35:45'),
(7, 'raju', 'k', 987654321, 'aaa', '81dc9bdb52d04dc20036dbd8313ed055', '2024-01-07 11:41:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblapplication`
--
ALTER TABLE `tblapplication`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_application_hospital` (`H_id`);

--
-- Indexes for table `tblhospital`
--
ALTER TABLE `tblhospital`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblapplication`
--
ALTER TABLE `tblapplication`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblapplication`
--
ALTER TABLE `tblapplication`
  ADD CONSTRAINT `fk_application_hospital` FOREIGN KEY (`H_id`) REFERENCES `tblhospital` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
