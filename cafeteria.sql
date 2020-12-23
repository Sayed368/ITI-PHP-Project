-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 23, 2020 at 08:34 PM
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
-- Database: `cafeteria`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

DROP TABLE IF EXISTS `order_info`;
CREATE TABLE IF NOT EXISTS `order_info` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `order_name` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'process',
  `amount` int NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

DROP TABLE IF EXISTS `order_product`;
CREATE TABLE IF NOT EXISTS `order_product` (
  `order_fk` int NOT NULL,
  `product_fk` int NOT NULL,
  PRIMARY KEY (`order_fk`,`product_fk`),
  KEY `product_fk` (`product_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` int NOT NULL,
  `image` int NOT NULL,
  `cat_fk` int NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `cat_fk` (`cat_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `room_id` int NOT NULL AUTO_INCREMENT,
  `room_no` int NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `img` int NOT NULL,
  `room_num` int NOT NULL,
  `type` enum('admin','user') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `user_name`, `email`, `password`, `ext`, `img`, `room_num`, `type`) VALUES
(11, 'sayed abdallah', 'sayed.abdallah@gmail.com', '123456789', 11, 0, 2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_order_room`
--

DROP TABLE IF EXISTS `user_order_room`;
CREATE TABLE IF NOT EXISTS `user_order_room` (
  `order_fk` int NOT NULL,
  `user_fk` int NOT NULL,
  `room_fk` int NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_fk`,`user_fk`,`room_fk`),
  KEY `room_fk` (`room_fk`),
  KEY `user_fk` (`user_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_product`
--

DROP TABLE IF EXISTS `user_product`;
CREATE TABLE IF NOT EXISTS `user_product` (
  `user_fk` int NOT NULL,
  `product_fk` int NOT NULL,
  `count` int NOT NULL,
  PRIMARY KEY (`user_fk`,`product_fk`),
  KEY `user_fk` (`user_fk`),
  KEY `product_fk` (`product_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`product_fk`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`order_fk`) REFERENCES `order_info` (`order_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cat_fk`) REFERENCES `categories` (`cat_id`);

--
-- Constraints for table `user_order_room`
--
ALTER TABLE `user_order_room`
  ADD CONSTRAINT `user_order_room_ibfk_1` FOREIGN KEY (`room_fk`) REFERENCES `room` (`room_id`),
  ADD CONSTRAINT `user_order_room_ibfk_2` FOREIGN KEY (`order_fk`) REFERENCES `order_info` (`order_id`),
  ADD CONSTRAINT `user_order_room_ibfk_3` FOREIGN KEY (`user_fk`) REFERENCES `user_info` (`user_id`);

--
-- Constraints for table `user_product`
--
ALTER TABLE `user_product`
  ADD CONSTRAINT `user_product_ibfk_1` FOREIGN KEY (`user_fk`) REFERENCES `user_info` (`user_id`),
  ADD CONSTRAINT `user_product_ibfk_2` FOREIGN KEY (`product_fk`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
