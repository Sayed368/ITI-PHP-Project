-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 01, 2021 at 10:44 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafeteria1`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(30) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(2, 'hot drink'),
(3, 'soft drink'),
(4, 'water');

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

DROP TABLE IF EXISTS `order_info`;
CREATE TABLE IF NOT EXISTS `order_info` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(30) NOT NULL DEFAULT 'process',
  `user_fk` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `room` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `amount` int DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_fk` (`user_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_info`
--

INSERT INTO `order_info` (`order_id`, `status`, `user_fk`, `date`, `room`, `note`, `amount`) VALUES
(26, 'delivery', 29, '2021-01-01 22:10:01', '1', 'suger 2', NULL),
(27, 'delivery', 30, '2021-01-01 22:18:48', '2', 'hgggggggggggg', NULL),
(28, 'delivery', 32, '2021-01-01 22:19:29', '4', 'jjjjjjjjjjjjjjjjjjjjjjj', NULL),
(29, 'process', 33, '2021-01-01 22:19:59', '7', '55555555555555555555555555555555', NULL),
(30, 'process', 31, '2021-01-01 22:20:34', '3', 'jhjuiiiiiiiiiiiiiiiiiiiiii', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

DROP TABLE IF EXISTS `order_product`;
CREATE TABLE IF NOT EXISTS `order_product` (
  `order_fk` int NOT NULL,
  `product_fk` int NOT NULL,
  `count` int NOT NULL,
  PRIMARY KEY (`order_fk`,`product_fk`),
  KEY `product_fk` (`product_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_fk`, `product_fk`, `count`) VALUES
(26, 8, 2),
(26, 9, 2),
(26, 10, 1),
(27, 8, 5),
(27, 9, 1),
(28, 10, 1),
(29, 9, 2),
(30, 8, 1),
(30, 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` int NOT NULL,
  `img_name` varchar(100) NOT NULL,
  `img_dir` varchar(100) NOT NULL,
  `cat_fk` int DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `cat_fk` (`cat_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `price`, `img_name`, `img_dir`, `cat_fk`) VALUES
(8, 'coffee', 15, '1_pJsrTGA1D-BxwxeZniRCUw.jpeg', 'images/1_pJsrTGA1D-BxwxeZniRCUw.jpeg', NULL),
(9, 'tea', 10, 'product image.jpg', 'images/product image.jpg', NULL),
(10, 'mango', 50, 'download.jpg', 'images/download.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE IF NOT EXISTS `user_info` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `ext` int NOT NULL,
  `img_name` varchar(100) NOT NULL,
  `img_dir` varchar(100) NOT NULL,
  `room_num` int NOT NULL,
  `type` enum('admin','user') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `user_name`, `email`, `password`, `ext`, `img_name`, `img_dir`, `room_num`, `type`) VALUES
(29, 'sayed', 'sayed@gmail.com', '123456789', 1, 'review_1.jpg', 'user_img/review_1.jpg', 1, 'user'),
(30, 'ahmed', 'ahmed1@gmail.com', '123456789', 3, 'team_1.jpg', 'user_img/team_1.jpg', 2, 'user'),
(31, 'ahmed', 'ahmed2@gmail.com', '123456789', 2, 'team_2.jpg', 'user_img/team_2.jpg', 3, 'user'),
(32, 'omima', 'omima@gmail.com', '123456789', 5, 'review_3.jpg', 'user_img/review_3.jpg', 4, 'user'),
(33, 'bassant', 'bassant@gmail.com', '123456789', 9, 'review_2.jpg', 'user_img/review_2.jpg', 7, 'user');

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
