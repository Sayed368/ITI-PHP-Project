-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2020 at 05:03 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafeteria`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

CREATE TABLE `order_info` (
  `order_id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'process',
  `user_fk` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `room` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_info`
--

INSERT INTO `order_info` (`order_id`, `status`, `user_fk`, `date`, `room`, `note`, `amount`) VALUES
(2, 'process', 11, '2020-12-10 20:15:00', '5', 'dc,sdmvlmlrmv', NULL),
(3, 'process', 11, '2020-12-11 20:38:00', '5', 'rs,vlldglbr,e;g,tr', NULL),
(4, 'process', 11, '2020-12-10 21:10:00', '5', 'evwerjogvregrt', NULL),
(5, 'process', 26, '2020-12-11 21:17:00', '11', 'weklvnkre', NULL),
(6, 'process', 26, '2020-12-17 21:27:00', '11', 'kaemvkkskvr', NULL),
(7, 'process', 27, '2020-12-10 22:08:00', '2', 'ewkgnvke4ne5', NULL),
(8, 'process', 26, '2020-12-02 22:13:00', '2', 'awefewlkfks', NULL),
(9, 'process', 26, '2020-12-10 22:14:00', '5', 'aelfmlewmlgfmewr', NULL),
(10, 'process', 11, '2020-12-10 16:09:00', '11', 'asekcmfegfr', NULL),
(11, 'process', 11, '2020-12-11 16:09:00', '11', 'aksmckfesfmdr', NULL),
(12, 'process', 26, '2020-12-23 16:14:00', '5', 'naevinehwijngfvoesromvolr', NULL),
(13, 'process', 11, '2020-12-17 16:29:00', '11', 'aekmvewnkflewrm', NULL),
(14, 'process', 11, '2020-12-17 16:31:00', '11', 'samneckeskcvmsd', NULL),
(15, 'process', 11, '2020-12-10 16:36:00', '5', 'as lallcmlsdmcmelsm', NULL),
(16, 'process', 11, '2020-12-10 16:36:00', '5', 'as lallcmlsdmcmelsm', NULL),
(17, 'process', 11, '2020-12-17 16:43:00', '5', 'kMEWCMWEMFCEWMLFMW', NULL),
(18, 'process', 11, '2020-12-04 16:47:00', '5', 'ksencknewrkckre', NULL),
(19, 'process', 26, '0000-00-00 00:00:00', '11', 'LASKNcknsenckedsk', NULL),
(20, 'process', 27, '2020-12-11 17:49:00', '11', 'ndcnescrsd', NULL),
(21, 'process', 11, '2020-12-04 17:50:00', '11', 'sancinsirfierigfierjgfjerjgvierjivjgie', NULL),
(22, 'process', 11, '2020-12-18 17:53:00', '11', 'ndecjnwbsefciewjnicj', NULL),
(23, 'process', 11, '2020-12-10 18:00:00', '5', 'admlcmdddddddd', NULL),
(24, 'process', 27, '2020-12-10 18:01:00', '2', 'sssssssssssssssssssss', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_fk` int(11) NOT NULL,
  `product_fk` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_fk`, `product_fk`, `count`) VALUES
(3, 1, 0),
(3, 5, 0),
(17, 5, 0),
(18, 5, 0),
(19, 5, 0),
(20, 5, 0),
(21, 5, 0),
(22, 5, 0),
(23, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `img_name` varchar(100) NOT NULL,
  `img_dir` varchar(100) NOT NULL,
  `cat_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `price`, `img_name`, `img_dir`, `cat_fk`) VALUES
(1, 'Tea drink', 55, 'logo.png', 'd', NULL),
(5, 'coffe drink', 100, 'd.png', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `ext` int(11) NOT NULL,
  `img_name` varchar(100) NOT NULL,
  `img_dir` varchar(100) NOT NULL,
  `room_num` int(11) NOT NULL,
  `type` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `user_name`, `email`, `password`, `ext`, `img_name`, `img_dir`, `room_num`, `type`) VALUES
(11, 'sayed', 'sayed.abdallah@gmail.com', '123456789', 11, 'placeholder_wide.jpg', 'user_img/IMG_20201125_010240_598.JPG', 2, 'user'),
(26, 'shrife', 'shrife@gmail.com', '123456789', 5, 'iti_logo.5b9a0fd125be.png', 'user_img/iti_logo.5b9a0fd125be.png', 5, 'user'),
(27, 'fvdfvdf', 'sayed.abddfvdvdfvallah1998@gmail.com', '11', 11, 'flower.jpg', 'user_img/flower.jpg', 11, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `order_info`
--
ALTER TABLE `order_info`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_fk` (`user_fk`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_fk`,`product_fk`),
  ADD KEY `product_fk` (`product_fk`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `cat_fk` (`cat_fk`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_info`
--
ALTER TABLE `order_info`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_info`
--
ALTER TABLE `order_info`
  ADD CONSTRAINT `order_info_ibfk_1` FOREIGN KEY (`user_fk`) REFERENCES `user_info` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`product_fk`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`order_fk`) REFERENCES `order_info` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cat_fk`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
