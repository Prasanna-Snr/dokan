-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2024 at 04:30 PM
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
-- Database: `db_dokan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `fullname`, `username`, `email`, `password`) VALUES
(1, 'aaa', 'bhavirazz', 'bhavirazzsunuwar123@gmail.com', '011c945f30ce2cbafc452f39840f025693339c42'),
(2, 'example', 'bbb', 'prasannasunwar03@gmail.com', '011c945f30ce2cbafc452f39840f025693339c42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `c_name`) VALUES
(2, 'electronic'),
(3, 'change'),
(4, 'mini drone'),
(5, 'racing drone');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `fullname`, `username`, `email`, `password`) VALUES
(2, 'Anita Rai', 'anitar', 'anita.rai@example.com', 'securePass1'),
(3, 'Ravi Shrestha', 'ravish', 'ravi.shrestha@example.com', 'password321'),
(4, 'Sita Gurung', 'sitag', 'sita.gurung@example.com', 'mypassword'),
(5, 'Suresh Koirala', 'sureshk', 'suresh.koirala@example.com', 'pass1234'),
(6, 'Pooja Adhikari', 'poojaa', 'pooja.adhikari@example.com', '123password'),
(7, 'Bikash Tamang', 'bikasht', 'bikash.tamang@example.com', 'mySecurePass'),
(8, 'Sarita Bhattarai', 'saritab', 'sarita.bhattarai@example.com', 'password456'),
(9, 'Krishna Poudel', 'krishnap', 'krishna.poudel@example.com', 'simplePass1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `offer` int(11) DEFAULT 0,
  `discount` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `name`, `category`, `image_path`, `description`, `price`, `offer`, `discount`, `created_at`) VALUES
(15, 'drone', 'electronics', '../uploads/674bd9ef0b93a_drone1 (2).png', '1234567', 2345, 0, 0, '2024-11-30 07:00:56'),
(16, 'fghjk', 'fashion', '../uploads/674c7a62d94f1_img2.png', 'sdfghjkl', 1, 0, 0, '2024-12-01 14:12:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
