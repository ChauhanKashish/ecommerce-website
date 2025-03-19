-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2025 at 02:12 PM
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
(18, 18529, 'xyz', 'erfer', 'rfer', 'erfe', 'xyz', 1, '27 Dec, 2024');

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
(14, 60235, 'Chawanprash', 11426, 76631, 'Boosts immunity and overall health', 5, 250, 350, 'pro-img/uploades/chawanprash.webp', 'Chawanprash', 'health , herbal', 'immunity booster', 1, 'chawanprash', '15 Oct, 2024'),
(15, 54096, 'Mamaearth Onion Oil', 11426, 89352, 'Boosts Hair Growth , adds strength and Shine .', 4, 150, 200, 'pro-img/uploades/mamaearth.webp', 'health', 'health', 'health', 1, 'mamaearth-onion-oil', '15 Oct, 2024'),
(16, 62014, 'Triphala Churna', 11426, 76631, 'Improves Digestion and Detoxification', 12, 199, 220, 'pro-img/uploades/TriphalaChurnapo.webp', 'Triphala Churna', 'Triphala Churna', 'Triphala Churna', 1, 'triphala-churna', '15 Oct, 2024'),
(18, 57894, 'Dolo 650 Tablet', 19441, 18510, 'Dolo 650 Tablet relieves pain and fever by inhibiting the production of particular chemical', 55, 50, 30, 'pro-img/uploades/3606_3.webp', 'Dolo 650 Tablet', 'Dolo 650 Tablet', 'Dolo 650 Tablet', 1, 'dolo-650-tablet', '15 Oct, 2024'),
(19, 80490, 'Vitamin D', 19441, 18510, 'Vegan Calcium & Vitamin D Combination | 60 Tablets', 55, 69, 50, 'pro-img/uploades/images (1).jpeg', 'Vegan Calcium & Vitamin D Combination | 60 Tablets', 'Vegan Calcium & Vitamin D Combination | 60 Tablets', 'Vegan Calcium & Vitamin D Combination | 60 Tablets', 1, 'vitamin-d', '15 Oct, 2024'),
(20, 13086, 'Amoxicillin 500mg Capsule', 19441, 18510, 'Proin ex ipsum, facilisis id tincidunt sed, vulputate in lacus.', 55, 60, 58, 'pro-img/uploades/product11-fetaured.jpg', 'Proin ex ipsum, facilisis id tincidunt sed, vulputate in lacus.', 'Proin ex ipsum, facilisis id tincidunt sed, vulputate in lacus.', 'Proin ex ipsum, facilisis id tincidunt sed, vulputate in lacus.', 1, 'amoxicillin-500mg-capsule', '15 Oct, 2024'),
(21, 83341, 'Levothyroxine Sodium Tablets', 19441, 18510, 'This product is available solely through our 503A Compounding Pharmacy, ensuring personalized care and precision in every order. ', 55, 80, 79, 'pro-img/uploades/empower.jpg', 'Levothyroxine Sodium Tablets', 'Levothyroxine Sodium Tablets', 'Levothyroxine Sodium Tablets', 1, 'levothyroxine-sodium-tablets', '15 Oct, 2024'),
(23, 75688, 'Ibugesic', 19441, 75945, 'Ibugesic Plus Suspension is a non-steroidal anti-inflammatory drug', 55, 120, 118, 'pro-img/uploades/IBU0015_1_1.webp', 'Ibugesic', 'Ibugesic', 'Ibugesic', 1, 'ibugesic', '15 Oct, 2024'),
(24, 99801, 'Amlodipine  syrup', 19441, 75945, 'Amlodipine 1mg/ml Oral Solution', 55, 150, 120, 'pro-img/uploades/Dipyridamole-50mg-150ml-1.png', 'Amlodipine 1mg/ml Oral Solution', 'Amlodipine 1mg/ml Oral Solution', 'Amlodipine 1mg/ml Oral Solution', 1, 'amlodipine--syrup', '15 Oct, 2024'),
(26, 91520, 'Ashwagandha', 11426, 76631, 'MuscleBlaze Koshaveda - Ashwagandha 500mg, 60 tablet(s)', 55, 240, 239, 'pro-img/uploades/images (3).jpeg', 'MuscleBlaze Koshaveda - Ashwagandha 500mg, 60 tablet(s)', 'MuscleBlaze Koshaveda - Ashwagandha 500mg, 60 tablet(s)', 'MuscleBlaze Koshaveda - Ashwagandha 500mg, 60 tablet(s)', 1, 'ashwagandha', '15 Oct, 2024'),
(27, 23685, 'Boswellia', 11426, 76631, 'Boswellia', 55, 155, 134, 'pro-img/uploades/images (4).jpeg', 'Boswellia', 'Boswellia', 'Boswellia', 1, 'boswellia', '15 Oct, 2024'),
(28, 96093, 'Nux Vomica', 11426, 98889, 'Nux vomica can also be used to cure a hangover. ', 55, 350, 339, 'pro-img/uploades/download (2).jpeg', 'Nux Vomica', 'Nux Vomica', 'Nux Vomica', 1, 'nux-vomica', '15 Oct, 2024'),
(29, 72451, 'Patanjali Kesh Kanti Amla Hair Oil (100 ml)', 11426, 89352, 'The ayurvedic formulation strengthens roots, revitalizes the hair, and prevents hair fall, greying, and split ends', 55, 65, 60, 'pro-img/uploades/Patanjali.jpg', 'Patanjali Kesh Kanti Amla Hair Oil (100 ml)', 'Patanjali Kesh Kanti Amla Hair Oil (100 ml)', 'Patanjali Kesh Kanti Amla Hair Oil (100 ml)', 1, 'patanjali-kesh-kanti-amla-hair-oil--100-ml-', '15 Oct, 2024'),
(38, 12638, 'xyz', 11426, 76631, 'ejmersfiokvjIOS', 50, 99, 80, 'pro-img/uploades/logo.jpg', 'kmikos', 'n n s', 'jnjxn', 1, 'xyz', '27 Dec, 2024');

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
(9, 18510, 19441, 'Tablets', 'Tablets', 'Tablets', 'Tablets', 'tablets', 1, '24 Sep, 2024'),
(12, 64564, 11426, 'Allopathy', 'Allopathy', 'allopathy , medicine , health', 'USed for medication , treatment', 'allopathy', 1, '15 Oct, 2024'),
(13, 98889, 11426, 'Homeopathy', 'Homeopathy', 'medicine , homeopathy ', ' Alternative for medications', 'homeopathy', 1, '15 Oct, 2024'),
(14, 76631, 11426, 'Ayurveda', 'Ayurveda', 'Health', 'Herbal based medications', 'ayurveda', 1, '15 Oct, 2024'),
(15, 89352, 11426, 'Personal care', 'Personal care', 'personal health', 'used for personal health', 'personal-care', 1, '15 Oct, 2024'),
(16, 75945, 19441, 'syrup', 'syrup', 'syrup', 'syrup', 'syrup', 1, '15 Oct, 2024'),
(18, 14220, 18529, 'abc', 'weekrkp3w', 'rjnfej', 'fnejrfr', 'abc', 1, '27 Dec, 2024');

-- --------------------------------------------------------

--
-- Table structure for table `order_manage`
--

CREATE TABLE `order_manage` (
  `id` int(10) NOT NULL,
  `pay_id` varchar(200) NOT NULL,
  `user_id` int(10) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` int(52) NOT NULL,
  `address` text NOT NULL,
  `payment` text NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `order_manage`
--

INSERT INTO `order_manage` (`id`, `pay_id`, `user_id`, `name`, `email`, `phone`, `address`, `payment`, `status`) VALUES
(96, 'pay_PBkRGvt71g6Hiq', 86148, 'AMAN', 'amanshrivastav8388@gmail.com', 2147483647, 'refaer', '134', 'panding'),
(97, 'pay_PBknmuRAQDmgrR', 28456, 'BHUMIKA', 'rhythmicwebsite09@gmail.com', 2147483647, 'shjbhj', '339', 'panding'),
(99, 'pay_PBw5fP2Wx63mtC', 28456, 'BHUMIKA', 'rhythmicwebsite09@gmail.com', 2147483647, 'uysheot8hoe8s', '50', 'panding'),
(101, 'pay_Pc8bRpmXeQgYSl', 86148, 'AMAN', 'amanshrivastav8388@gmail.com', 2147483647, 'dygyucg', '578', 'panding'),
(102, 'pay_Pg4QGQ09Ly1wRm', 86148, 'AMAN', 'amanshrivastav8388@gmail.com', 2147483647, 'HGFTYUF', '320', 'panding'),
(104, 'pay_PmQPRUmL35jsUU', 86148, 'AMAN', 'amanshrivastav8388@gmail.com', 2147483647, 'uiuirhhrui4yrf', '160', 'panding'),
(105, 'pay_Ps5pZXzyfwbLFP', 86148, 'AMAN', 'amanshrivastav8388@gmail.com', 2147483647, 'cds  ds', '399', 'panding');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(5) NOT NULL,
  `pid` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `image` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `pid`, `user_id`, `image`) VALUES
(3, 39252, 86148, 'pro-img/uploades/omkar markshit.jpg'),
(6, 15545, 86148, 'pro-img/uploades/tag_4-removebg-preview.png');

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
(20, 73064, 'SYD', 'syd', 'sonali83vrn@gmail.com', '$2y$10$mox7GiYTvL8l3FPoN5iMpeXLSH9cquyTTfzBn2ZHUHRxVYSnRx9Fe', '92aec16a442973cf5da13d27f1bb0a5e066260a4', 0),
(22, 28456, 'Bhumika', 'BHUMIKA', 'rhythmicwebsite09@gmail.com', '$2y$10$cEK5AZQ7cYGuz3YaJDpdU.x2r9S1xqzBsa4B2adM3SOpRQZnI19yi', 'd092c5782a0f66d1d0ba1159a6b5560f060ecc21', 1),
(26, 43416, 'ronit', 'kekaan', 'kekanronit@gmail.com', '$2y$10$vs3/LG3AtF8QiHUytw1h7.te96x.1h6qRNvQbcFsAXLFeY9OiDssy', '1e23026ddb47990e80c7c1bd9a47357e20d71a52', 0),
(28, 72665, 'Gofne', 'gofu', 'gophanesakshi362@gmail.com', '$2y$10$kHJEQdyynHZVdqMxZWVuO.dl6HnZst5q7j.3i/VzQKqTT7kXrIqBG', 'd38c3b36e967d1d0eb2bc2c5d2fa9f0253a12015', 0),
(36, 82433, 'Aman', 'babu', 'amanshrivastav2010@gmail.com', '$2y$10$Z5F7G1ewoQgs2wha6u8lJO0IejioNgAU5mlMftAG.VoZa9JdmC79u', 'a0a93a24f9272dba6fe9ec5349581ca6cfc7d7e7', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `id` int(10) NOT NULL,
  `pay_id` varchar(200) NOT NULL,
  `user_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `pro_name` varchar(150) NOT NULL,
  `price` int(20) NOT NULL,
  `qty` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`id`, `pay_id`, `user_id`, `order_id`, `pro_name`, `price`, `qty`) VALUES
(64, 'pay_PBkRGvt71g6Hiq', 86148, 96, 'Boswellia', 134, 1),
(65, 'pay_PBknmuRAQDmgrR', 28456, 97, 'Nux Vomica', 339, 1),
(67, 'pay_PBw5fP2Wx63mtC', 28456, 99, 'Vitamin D', 50, 1),
(69, 'pay_Pc8bRpmXeQgYSl', 86148, 101, 'Nux Vomica', 339, 1),
(70, 'pay_Pc8bRpmXeQgYSl', 86148, 101, 'Ashwagandha', 239, 1),
(71, 'pay_Pg4QGQ09Ly1wRm', 86148, 102, 'Patanjali Kesh Kanti Amla Hair Oil (100 ml)', 60, 2),
(72, 'pay_Pg4QGQ09Ly1wRm', 86148, 102, 'Mamaearth Onion Oil', 200, 1),
(75, 'pay_PmQPRUmL35jsUU', 86148, 104, 'Vitamin D', 50, 2),
(76, 'pay_PmQPRUmL35jsUU', 86148, 104, 'Patanjali Kesh Kanti Amla Hair Oil (100 ml)', 60, 1),
(77, 'pay_Ps5pZXzyfwbLFP', 86148, 105, 'Patanjali Kesh Kanti Amla Hair Oil (100 ml)', 60, 1),
(78, 'pay_Ps5pZXzyfwbLFP', 86148, 105, 'Nux Vomica', 339, 1);

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
-- Indexes for table `order_manage`
--
ALTER TABLE `order_manage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registered_user`
--
ALTER TABLE `registered_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mg_products`
--
ALTER TABLE `mg_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `mg_sub_catagories`
--
ALTER TABLE `mg_sub_catagories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_manage`
--
ALTER TABLE `order_manage`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `registered_user`
--
ALTER TABLE `registered_user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
