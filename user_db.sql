-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2024 at 09:55 AM
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
(1, 'Shweta Jadhav', 'jadhavshweta817@gmail.com', 'f3e7c590f1332a0d0c0ccf405032350f', 'f3e7c590f1332a0d0c0ccf405032350f', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `college_staff`
--
ALTER TABLE `college_staff`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
