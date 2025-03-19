-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2024 at 04:21 PM
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
-- Database: `mediguru`
--

-- --------------------------------------------------------

--
-- Table structure for table `mg_admin`
--

CREATE TABLE `mg_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `mg_admin`
--

INSERT INTO `mg_admin` (`id`, `name`, `password`) VALUES
(1, 'AMAN', '123');

-- --------------------------------------------------------

--
-- Table structure for table `mg_catagories`
--

CREATE TABLE `mg_catagories` (
  `id` int(11) NOT NULL,
  `cat_id` int(5) DEFAULT NULL,
  `cat_name` text DEFAULT NULL,
  `meta_title` text DEFAULT NULL,
  `meta_key` text DEFAULT NULL,
  `meta_desc` text DEFAULT NULL,
  `slug_url` varchar(255) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `added_on` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `mg_catagories`
--

INSERT INTO `mg_catagories` (`id`, `cat_id`, `cat_name`, `meta_title`, `meta_key`, `meta_desc`, `slug_url`, `status`, `added_on`) VALUES
(12, 19441, 'Medicine', 'Medicine', 'Medicine', 'Medicine', 'medicine', 1, '24 Sep, 2024'),
(13, 11426, 'Health Care', 'Health Care', 'Health Care', 'Health Care', 'health-care', 1, '30 Sep, 2024'),
(14, 90064, 'Lab Test', 'Lab Test', 'Lab Test', 'Lab Test', 'lab-test', 1, '30 Sep, 2024');

-- --------------------------------------------------------

--
-- Table structure for table `mg_products`
--

CREATE TABLE `mg_products` (
  `id` int(11) NOT NULL,
  `pro_id` int(10) DEFAULT NULL,
  `pro_name` varchar(255) DEFAULT NULL,
  `pro_cat` int(10) DEFAULT NULL,
  `pro_sub_cat` int(10) DEFAULT NULL,
  `pro_desc` text DEFAULT NULL,
  `stock` int(10) DEFAULT NULL,
  `mrp` float DEFAULT NULL,
  `selling_price` float DEFAULT NULL,
  `pro_img` text DEFAULT NULL,
  `meta_title` text DEFAULT NULL,
  `meta_desc` text DEFAULT NULL,
  `meta_key` text DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `slug_url` text DEFAULT NULL,
  `added_on` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `mg_products`
--

INSERT INTO `mg_products` (`id`, `pro_id`, `pro_name`, `pro_cat`, `pro_sub_cat`, `pro_desc`, `stock`, `mrp`, `selling_price`, `pro_img`, `meta_title`, `meta_desc`, `meta_key`, `status`, `slug_url`, `added_on`) VALUES
(10, 76291, 'Dolo 650mg', 19441, 18510, 'Dolo 650mg', 55, 60, 55, 'pro-img/uploades/WhatsApp Image 2024-09-23 at 13.11.51_2c5ecd5c.jpg', 'Dolo 650mg', 'Dolo 650mg', 'Dolo 650mg', 1, 'dolo-650mg', '24 Sep, 2024'),
(11, 81019, 'Paracitamol', 19441, 18510, 'Paracitamol', 50, 40, 38, 'pro-img/uploades/medicines.jpg', 'Paracitamol', 'Paracitamol', 'Paracitamol', 1, 'paracitamol', '25 Sep, 2024');

-- --------------------------------------------------------

--
-- Table structure for table `mg_sub_catagories`
--

CREATE TABLE `mg_sub_catagories` (
  `id` int(11) NOT NULL,
  `cat_id` int(5) DEFAULT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `cat_name` text DEFAULT NULL,
  `meta_title` text DEFAULT NULL,
  `meta_key` text DEFAULT NULL,
  `meta_desc` text DEFAULT NULL,
  `slug_url` varchar(255) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `added_on` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `mg_sub_catagories`
--

INSERT INTO `mg_sub_catagories` (`id`, `cat_id`, `parent_id`, `cat_name`, `meta_title`, `meta_key`, `meta_desc`, `slug_url`, `status`, `added_on`) VALUES
(9, 18510, 19441, 'Tablets', 'Tablets', 'Tablets', 'Tablets', 'tablets', 1, '24 Sep, 2024');

-- --------------------------------------------------------

--
-- Table structure for table `registered_user`
--

CREATE TABLE `registered_user` (
  `id` int(100) NOT NULL,
  `user_id` int(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  `is_verified` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `registered_user`
--

INSERT INTO `registered_user` (`id`, `user_id`, `full_name`, `username`, `email`, `password`, `verification_code`, `is_verified`) VALUES
(19, 86148, 'aman', 'AMAN', 'amanshrivastav8388@gmail.com', '$2y$10$mTmOfU4YaWQF0M4TMruJb.G.PaaxAoJxj64.N5dI7UqQpl9a9uVZC', '3ae9adf657f39cf0e7c46de00463fd2cd2908487', 1),
(20, 73064, 'SYD', 'syd', 'sonali83vrn@gmail.com', '$2y$10$mox7GiYTvL8l3FPoN5iMpeXLSH9cquyTTfzBn2ZHUHRxVYSnRx9Fe', '92aec16a442973cf5da13d27f1bb0a5e066260a4', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mg_admin`
--
ALTER TABLE `mg_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mg_catagories`
--
ALTER TABLE `mg_catagories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mg_products`
--
ALTER TABLE `mg_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mg_sub_catagories`
--
ALTER TABLE `mg_sub_catagories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registered_user`
--
ALTER TABLE `registered_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mg_admin`
--
ALTER TABLE `mg_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mg_catagories`
--
ALTER TABLE `mg_catagories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mg_products`
--
ALTER TABLE `mg_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mg_sub_catagories`
--
ALTER TABLE `mg_sub_catagories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `registered_user`
--
ALTER TABLE `registered_user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
