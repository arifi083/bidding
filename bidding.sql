-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2021 at 06:26 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bidding`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `first_name`, `last_name`, `mobile`, `password`) VALUES
(1, 'arif@gmail.com', 'arif', 'islam', '01679364179', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `bid_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`bid_id`, `name`, `email`, `price`, `product_id`) VALUES
(7, 'vinitraj11', '', 3000, 46),
(24, 'ashish11', '', 90000, 1),
(25, 'vinitraj11', '', 600000, 1),
(26, 'ashish11', '', 600500, 1),
(27, 'ashish11', '', 610000, 1),
(28, 'vinitraj11', '', 620000, 1),
(29, 'vinitraj11', '', 620500, 1),
(30, 'ashish11', '', 1234555, 35),
(31, 'wewe', '', 3000, 46),
(32, 'wewe', '', 4000, 46),
(33, 'wewe', '', 300000, 69),
(34, 'wewe', '', 310000, 46),
(35, 'wewe', '', 310000, 64),
(36, 'wewe', '', 4050, 46),
(37, 'wewe', '', 2000, 26),
(38, 'wewe', '', 5555, 46),
(39, 'rimon1135@gmail.com', '', 501, 70),
(40, 'rimon1135@gmail.com', '', 505, 70),
(41, 'jamil@gmail.com', '', 27859, 71),
(42, 'jamil@gmail.com', '', 26000, 71),
(43, 'jamil@gmail.com', '', 30000, 71),
(44, 'rimon@gmail.com', '', 50000, 71),
(45, 'jamil@gmail.com', '', 27859, 73),
(46, 'jamil@gmail.com', '', 30000, 72),
(47, 'jamil@gmail.com', '', 26000, 72),
(48, 'arif@gmail.com', '', 30000, 73);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `label` varchar(50) NOT NULL DEFAULT '',
  `link` varchar(100) NOT NULL DEFAULT '#',
  `parent` int(11) NOT NULL DEFAULT 0,
  `sort` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `label`, `link`, `parent`, `sort`) VALUES
(1, 'Antique', '#', 0, 0),
(2, 'Art', '#', 0, 0),
(3, 'Cars', '#', 0, 0),
(4, 'Bikes', '#', 0, 0),
(5, 'coins', '#', 0, 0),
(6, 'Instruments', '#', 0, 0),
(7, 'Sports', '#', 0, 0),
(8, 'Mobiles', '#', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `title` varchar(55) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(20) NOT NULL,
  `bid_time` datetime NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(55) NOT NULL,
  `mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `title`, `description`, `price`, `bid_time`, `category_id`, `image`, `name`, `email`, `mobile`) VALUES
(72, 'iphone', 'wddd', 4567, '2021-03-10 00:00:00', 8, 'productimages/download (1).jpg', 'Arif islam', 'arif@gmail.com', '01679364179'),
(73, 'car', 'tjfffffffffaf', 23467, '2021-03-11 00:00:00', 3, 'productimages/2.jpg', 'Arif islam', 'arifmiah17103@gmail.com', '01679364179'),
(74, 'motor cycle', 'fffffffffff', 23467, '0000-00-00 00:00:00', 4, 'productimages/motor.jpg', 'Arif islam', 'arifmiah17103@gmail.com', '01679364179');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `first_name`, `last_name`, `mobile`, `password`) VALUES
(1, 'arif@gmail.com', 'arif', 'islam', '01679364179', '123456'),
(15, 'jamil@gmail.com', 'Mr', 'Jamil', '0171066263', '000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`bid_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `cid` (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bid`
--
ALTER TABLE `bid`
  MODIFY `bid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `parent` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
