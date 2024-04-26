-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2024 at 10:17 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `college_staff`
--

CREATE TABLE `college_staff` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL COMMENT 'Faculty, Office Clerk,Admin',
  `isBan` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=unban,1=ban',
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `college_staff`
--

INSERT INTO `college_staff` (`id`, `name`, `email`, `phone`, `password`, `user_type`, `isBan`, `created_at`) VALUES
(1, 'Jayant', '2021jayantwagh@gmail.com', '9765414237', '3931be9d605e14ca138a67d4fbfab0a5', 'Office Clerk', 0, '2024-03-12'),
(2, 'Kedar Sanglikar', 'kedarsanglikar26@gmail.com', '9765414236', '382da5036c87cf172829d91c45d88954', 'Office Clerk', 0, '2024-03-12'),
(3, 'Roshan', 'roshandalavi16@gmail.com', '9765414239', '5f582e00bd1909baf3ba3e31d3ca871a', 'Faculty', 0, '2024-03-12'),
(4, 'Swarup Dixit ', 'swarupdixit06@gmail.com', '9373929637', '625401c507270811084c65a3b7cc7941', 'Faculty', 0, '2024-03-13'),
(5, 'Sneha Jagtap', 'jagtapsneha39@gmail.com', '7038673432', '9098b4bcd6c552c82d8695ee04338b85', 'Office Clerk', 0, '2024-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `doc_id` int(11) NOT NULL,
  `reg_id` int(255) NOT NULL,
  `Aadhar` mediumblob DEFAULT NULL,
  `Dte` mediumblob DEFAULT NULL,
  `CetScoreCard` mediumblob DEFAULT NULL,
  `IncomeCert` mediumblob DEFAULT NULL,
  `RationCard` mediumblob DEFAULT NULL,
  `LabourCert` mediumblob DEFAULT NULL,
  `CasteCert` mediumblob DEFAULT NULL,
  `CasteValidity` mediumblob DEFAULT NULL,
  `NonCL` mediumblob DEFAULT NULL,
  `Ssc` mediumblob DEFAULT NULL,
  `Hsc` mediumblob DEFAULT NULL,
  `DiplomaScoreCard` mediumblob DEFAULT NULL,
  `LC` mediumblob DEFAULT NULL,
  `MigrationCert` mediumblob DEFAULT NULL,
  `GapCert` mediumblob DEFAULT NULL,
  `Domicile` mediumblob DEFAULT NULL,
  `AdmissionFee` mediumblob DEFAULT NULL,
  `Aadhar_Type` varchar(10) DEFAULT NULL,
  `Dte_Type` varchar(10) DEFAULT NULL,
  `CetScoreCard_Type` varchar(10) DEFAULT NULL,
  `IncomeCert_Type` varchar(10) DEFAULT NULL,
  `RationCard_Type` varchar(10) DEFAULT NULL,
  `LabourCert_Type` varchar(10) DEFAULT NULL,
  `CasteCert_Type` varchar(10) DEFAULT NULL,
  `CasteValidity_Type` varchar(10) DEFAULT NULL,
  `NonCL_Type` varchar(10) DEFAULT NULL,
  `Ssc_Type` varchar(10) DEFAULT NULL,
  `Hsc_Type` varchar(10) DEFAULT NULL,
  `DiplomaScoreCard_Type` varchar(10) DEFAULT NULL,
  `LC_Type` varchar(10) DEFAULT NULL,
  `MigrationCert_Type` varchar(10) DEFAULT NULL,
  `GapCert_Type` varchar(10) DEFAULT NULL,
  `Domicile_Type` varchar(10) DEFAULT NULL,
  `AdmissionFee_Type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `studregistration`
--

CREATE TABLE `studregistration` (
  `reg_id` int(255) NOT NULL,
  `StudentName` varchar(255) NOT NULL,
  `FatherName` varchar(255) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `MotherName` varchar(255) NOT NULL,
  `Branch` varchar(255) NOT NULL,
  `AdmittedFor` varchar(255) NOT NULL,
  `Class` varchar(255) NOT NULL,
  `StudentPhoto` longblob NOT NULL,
  `StudentSignature` longblob NOT NULL,
  `LastExamAttended` varchar(255) NOT NULL,
  `LastExamDate` varchar(255) NOT NULL,
  `AdmissionYear` varchar(255) NOT NULL,
  `AadharNo` varchar(255) NOT NULL,
  `Religion` varchar(255) NOT NULL,
  `Caste` varchar(255) NOT NULL,
  `GuardianName` varchar(255) NOT NULL,
  `GuardianOccupation` varchar(255) NOT NULL,
  `ServiceDetails` varchar(255) NOT NULL DEFAULT 'No',
  `Email` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `PinCode` varchar(255) NOT NULL,
  `PhoneNo` varchar(255) NOT NULL,
  `WhatsAppNo` varchar(255) NOT NULL,
  `DateOfBirth` varchar(255) NOT NULL,
  `ParentSignature` longblob NOT NULL,
  `Approval` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `cpassword`, `user_type`) VALUES
(1, 'Shweta Jadhav', 'jadhavshweta817@gmail.com', 'f3e7c590f1332a0d0c0ccf405032350f', 'f3e7c590f1332a0d0c0ccf405032350f', 'admin'),
(2, 'Sahil', 'sahil@gmail.com', '25d55ad283aa400af464c76d713c07ad', '25d55ad283aa400af464c76d713c07ad', 'admin'),
(3, 'Sahil', 'sahil@gmail.com', '25f9e794323b453885f5181f1b624d0b', '25f9e794323b453885f5181f1b624d0b', 'user'),
(4, 'sanket', 'sanket@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 'user'),
(5, 'ram', 'ram@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `college_staff`
--
ALTER TABLE `college_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`doc_id`),
  ADD KEY `Test` (`reg_id`);

--
-- Indexes for table `studregistration`
--
ALTER TABLE `studregistration`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `college_staff`
--
ALTER TABLE `college_staff`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `studregistration`
--
ALTER TABLE `studregistration`
  MODIFY `reg_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `Test` FOREIGN KEY (`reg_id`) REFERENCES `studregistration` (`reg_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
