-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 05, 2022 at 06:08 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myfoodkart`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categorieId` int(12) NOT NULL,
  `categorieName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categorieId`, `categorieName`) VALUES
(1, 'GUJARATI'),
(2, 'PANJABI'),
(3, 'CHAINESE'),
(4, 'PIZZA'),
(5, 'BEVERAGES'),
(6, 'SOUTH-INDIAN');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `mobile`, `message`) VALUES
('Rushi Gandhi', 'rushigandhi14@gmail.com', '7359044104', '1234\r\n'),
('Rushi Gandhi', 'rushigandhi14@gmail.com', '7359044104', '1234\r\n'),
('Rushi Gandhi', 'rushigandhi14@gmail.com', '7359044104', 'Hello, We hope You all will like our website.'),
('Rushi Gandhi', 'rushigandhi14@gmail.com', '7359044104', 'Hello guys, We hope that we all will like our website. Please like it and give your valuable feedbacks.'),
('Rushi Gandhi', 'rushigandhi14@gmail.com', '7359044104', 'jhg'),
('Rushi Gandhi', 'rushigandhi14@gmail.com', '7359044104', 'Hello Connections, Hope you all will like our website'),
('Rushi Gandhi', 'rushigandhi14@gmail.com', '7359044104', 'Hello guys, hope you all will like our website');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemId` int(12) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `itemPrice` int(12) NOT NULL,
  `itemCategorieId` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemId`, `itemName`, `itemPrice`, `itemCategorieId`) VALUES
(1, 'MIX-VEG', 120, 1),
(2, 'PULKA', 20, 1),
(3, 'DAL-BHAT \r\n', 50, 1),
(4, 'SHRIKHAND', 50, 1),
(5, 'RAS\r\n', 40, 1),
(6, 'BHAJIYA', 60, 1),
(7, 'KHANDVI\r\n', 60, 1),
(8, 'KHAMAN-DHOKLA', 70, 1),
(9, 'PATRA\r\n', 60, 1),
(10, 'PANEER-MASALA\r\n', 120, 2),
(11, 'CHOLE-KULCHE', 180, 2),
(12, 'SPACIAL LASSI', 50, 2),
(13, 'ALOO PARATHA', 25, 2),
(14, 'PALAK PANEER', 160, 2),
(15, 'MALAI KOFTA', 180, 2),
(16, 'CHANA DAL\r\n', 150, 2),
(17, 'SHAHI PANNER', 200, 2),
(18, 'DAL MAKHANI', 190, 2),
(19, 'NUDDLES', 120, 3),
(20, 'MANCHURIAN', 60, 3),
(21, 'GRAVY-MANCHURIAN', 80, 3),
(22, 'PASTA', 80, 3),
(23, 'CHAINESE-BHEL', 120, 3),
(24, 'WONTON-SOUP', 100, 3),
(25, 'VEG-FRIED-RICE', 70, 3),
(26, 'SPRING-ROLLS', 120, 3),
(27, 'CHOP-SUEY', 180, 3),
(28, 'ITALIAN', 180, 4),
(29, 'MARGHERITA', 99, 4),
(30, 'MEXICAN-DELIGHT', 140, 4),
(31, 'PEPPY-PANNER', 150, 4),
(32, 'PANEER-MAKHANI', 120, 4),
(33, 'PEPPERONI', 120, 4),
(34, 'FARM-DELIGHT', 150, 4),
(35, 'CHOCOLATE', 190, 4),
(36, 'AMERICAN', 150, 4),
(37, 'THUMS UP', 40, 5),
(38, 'STRING ENERGY DRINK', 20, 5),
(39, 'SPRITE BOTTLE', 40, 5),
(40, 'REDBULL CAN', 120, 5),
(41, 'PEPSI BLACK CAN', 40, 5),
(42, 'MOUNTAIN DEW CAN', 40, 5),
(43, 'MIRINDA ORANGE BOTTLE', 40, 5),
(44, 'KINLEY SODA', 40, 5),
(45, 'MONSTER ENERGY DRINK', 40, 5),
(46, 'DOSA', 120, 6),
(47, 'RAVA-DOSA', 180, 6),
(48, 'MYSORE-DOSA', 150, 6),
(49, 'IDALI', 70, 6),
(50, 'MEDU-VADA', 50, 6),
(51, 'UTTAPAM', 70, 6),
(52, 'UPMA', 50, 6),
(53, 'LEMON-RICE', 50, 6),
(54, 'PAPER-DOSA', 100, 6);

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(21) NOT NULL,
  `orderId` int(21) NOT NULL,
  `itemId` int(21) NOT NULL,
  `itemQuantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `orderId`, `itemId`, `itemQuantity`) VALUES
(0, 0, 1, 16),
(0, 0, 2, 1),
(0, 0, 5, 1),
(0, 0, 4, 1),
(0, 0, 1, 1),
(0, 0, 2, 1),
(0, 0, 3, 1),
(0, 0, 36, 3),
(0, 0, 30, 2),
(0, 0, 31, 6),
(0, 0, 32, 1),
(0, 0, 33, 1),
(0, 0, 34, 1),
(0, 0, 35, 1),
(0, 0, 2, 1),
(0, 0, 3, 1),
(0, 0, 5, 1),
(0, 0, 38, 89),
(0, 0, 41, 1),
(0, 0, 11, 1),
(0, 0, 11, 1),
(0, 8, 5, 1),
(0, 8, 6, 1),
(0, 9, 19, 15),
(0, 9, 20, 1),
(0, 9, 21, 1),
(0, 9, 23, 1),
(0, 9, 24, 1),
(0, 9, 36, 1),
(0, 9, 28, 1),
(0, 9, 29, 1),
(0, 11, 17, 1),
(0, 11, 18, 1),
(0, 12, 12, 1),
(0, 12, 2, 1),
(0, 12, 3, 1),
(0, 13, 38, 5),
(0, 14, 2, 6),
(0, 15, 4, 2),
(0, 15, 5, 2),
(0, 15, 6, 1),
(0, 16, 2, 3),
(0, 16, 3, 1),
(0, 16, 5, 1),
(0, 16, 4, 1),
(0, 18, 1, 1),
(0, 19, 1, 1),
(0, 19, 2, 1),
(0, 19, 3, 1),
(0, 19, 7, 1),
(0, 19, 38, 1),
(0, 19, 37, 1),
(0, 19, 36, 1),
(0, 19, 28, 1),
(0, 19, 29, 1),
(0, 19, 31, 1),
(0, 19, 30, 1),
(0, 19, 32, 1),
(0, 19, 34, 1),
(0, 19, 35, 1),
(0, 19, 33, 1),
(0, 20, 1, 8),
(0, 21, 11, 1),
(0, 21, 10, 1),
(0, 22, 15, 2),
(0, 22, 1, 1),
(0, 22, 3, 1),
(0, 22, 14, 1),
(0, 22, 34, 1),
(0, 22, 43, 1),
(0, 22, 44, 1),
(0, 22, 45, 1),
(0, 23, 29, 1),
(0, 23, 30, 1),
(0, 23, 31, 1),
(0, 23, 32, 1),
(0, 24, 2, 1),
(0, 24, 5, 1),
(0, 24, 6, 1),
(0, 24, 7, 1),
(0, 25, 1, 1),
(0, 25, 2, 1),
(0, 26, 2, 1),
(0, 26, 5, 1),
(0, 26, 4, 1),
(0, 26, 38, 1),
(0, 27, 10, 6),
(0, 27, 15, 1),
(0, 27, 17, 1),
(0, 27, 41, 1),
(0, 28, 15, 5),
(0, 28, 16, 2),
(0, 28, 13, 1),
(0, 28, 41, 1),
(0, 29, 10, 5),
(0, 29, 12, 6),
(0, 29, 47, 1),
(0, 29, 49, 1),
(0, 29, 51, 1),
(0, 30, 38, 4),
(0, 30, 39, 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(21) NOT NULL,
  `userId` int(21) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipCode` int(21) NOT NULL,
  `phoneNo` bigint(21) NOT NULL,
  `amount` int(200) NOT NULL,
  `paymentMode` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=cash on delivery, \r\n1=online ',
  `orderStatus` enum('0','1','2','3','4','5','6') NOT NULL DEFAULT '0' COMMENT '0=Order Placed.\r\n1=Order Confirmed.\r\n2=Preparing your Order.\r\n3=Your order is on the way!\r\n4=Order Delivered.\r\n5=Order Denied.\r\n6=Order Cancelled.',
  `orderDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `userId`, `address`, `zipCode`, `phoneNo`, `amount`, `paymentMode`, `orderStatus`, `orderDate`) VALUES
(19, 16, 'SardarPol, Paradarwaja , Kheda, -', 387411, 2334343553, 0, '0', '0', '2022-05-20 12:13:48'),
(20, 16, 'SardarPol, Paradarwaja , Kheda, -', 387411, 7576756465, 0, '0', '0', '2022-05-20 12:21:53'),
(21, 16, 'SardarPol, Paradarwaja , Kheda, ', 387411, 8937866767, 300, '0', '0', '2022-05-20 12:25:47'),
(22, 12, 'SardarPol, Paradarwaja , Kheda, -', 387411, 5858585858, 960, '0', '0', '2022-05-20 19:24:24'),
(23, 16, 'heloo, hii', 387411, 7359044104, 509, '0', '0', '2022-05-20 22:27:08'),
(24, 20, 'D-401 Hari Tower , Near BAPS Swaminarayan Mandir, Upleta', 360490, 2334343553, 180, '0', '0', '2022-05-22 10:50:45'),
(25, 20, 'SardarPol, Paradarwaja , Kheda, -', 387411, 6868686868, 140, '0', '0', '2022-05-22 11:02:54'),
(26, 21, 'Dharmsinh Desai University, College Road', 387411, 7576756465, 130, '0', '0', '2022-05-23 20:07:12'),
(27, 22, 'Dharmsinh Desai University, Near College Road', 387411, 8937866767, 1140, '0', '0', '2022-05-23 20:27:26'),
(28, 23, 'Dharmsinh Desai University, Near College Road', 387411, 8937866767, 1265, '0', '0', '2022-05-23 20:36:25'),
(29, 24, 'Dharmsinh Desai University, Near College Road', 387411, 5858585858, 1220, '0', '0', '2022-05-23 20:44:33'),
(30, 25, 'Dharmsinh Desai University, Near College Road', 387411, 7359044104, 240, '0', '0', '2022-05-23 20:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` int(10) NOT NULL,
  `password` varchar(60) NOT NULL,
  `joinDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `firstName`, `lastName`, `email`, `phone`, `password`, `joinDate`) VALUES
(3, 'golsrushti1', 'srushti', 'gol', 'golsrushti1@gmail.com', 2147483647, '$2y$10$8', '2022-05-12'),
(4, 'uhi', 'joj', 'jojk;', 'joljln@gmail.com', 1234567890, '$2y$10$H', '2022-05-12'),
(5, 'rushi gandhi', '', '', 'rushigandhi14@gmail.com', 0, '$2y$10$P', '2022-05-12'),
(6, 'rushi_0508', '', '', 'rushigandhi14@gmail.com', 0, '$2y$10$k', '2022-05-12'),
(7, 'qwerty', '', '', 'rushigandhi0@gmail.com', 0, '$2y$10$b', '2022-05-12'),
(9, 'gandhirushi', '', '', 'lkfjfjk@gmail.com', 0, '$2y$10$L', '2022-05-12'),
(10, 'manan', '', '', 'bhavsarmanan21@gmail.com', 0, '$2y$10$K', '2022-05-12'),
(11, 'rcg', '', '', 'rcg@ddu.in', 0, '$2y$10$d', '2022-05-12'),
(12, 'dhruv', '', '', 'dhruv@gmail.com', 0, '$2y$10$jg9Ww1AIsphSQz0NUBsY3eMhx64i5p43p83w51kkh9.Gi.tZpmkU2', '2022-05-13'),
(13, 'rushi123', '', '', 'rushigandhi14@gmail.com', 0, '$2y$10$VpvLRPXFfVupVjkoSniPhuIt5kuQQGrxBoSpeqL/jbARlYbYxdcPK', '2022-05-13'),
(15, 'mihirpatel05', '', '', 'mihir@ddu.ac.in', 0, '$2y$10$aaiVNPDQj1s9ZmxJ8kBHRuVWRCIh7Is/QpDQmm/yNB50DsERvPX0m', '2022-05-14'),
(16, 'try', '', '', 'rushigandhi14@gmail.com', 0, '$2y$10$0mJwzDUpEKDvmTeffpelpunNqdhszIZsVJVvEloJTWRuZPjxbGllu', '2022-05-14'),
(17, 'vaibhav', '', '', 'vaibhav@gmail.com', 0, '$2y$10$zmjdFX/mvlhXz8mKEMMfEepq/odc2XM8JLBTAG/ZkU8.6izZpGAji', '2022-05-17'),
(18, 'dev', '', '', 'dev@gmail.com', 0, '$2y$10$KfuedoFfStYLUe2O8RfjROx0fmlETSy0CMLCnS74bMOw7JvYDVcZm', '2022-05-18'),
(19, 'srushti', '', '', 'golsrushti1@gmail.com', 0, '$2y$10$fjyi0x4H1BsUEN6F.BI31.O5YkrH9O.7hWmLILKPuHd4g43HWyvdq', '2022-05-19'),
(20, 'rushigandhi', '', '', 'rushigandhi14@gmail.com', 0, '$2y$10$c27wiX2f9egVYU5PyTsFlOwPB72OySDUp9V4bPXrhb6w.leOXgN7i', '2022-05-22'),
(21, 'rushigandhi123', '', '', 'rushigandhi14@gmail.com', 0, '$2y$10$o4wpphgbqQcOfsPaTB77lOqWc/IfobCf3q0GO48WO06IigeJe7iOm', '2022-05-23'),
(22, 'rushi_gandhi', '', '', 'rushigandhi14@gmail.com', 0, '$2y$10$O9odg79kJixidlLP5uO2YuuFVOQ6QIudiEvY.Ankb1nlNptyFHG.y', '2022-05-23'),
(23, 'rushi_gandhi123', '', '', 'rushigandhi14@gmail.com', 0, '$2y$10$ItHzepsMP0PjXlUCTTez/eCmYe57lDArySSB1Y29qDhyO4ybVMc0W', '2022-05-23'),
(24, 'rushi@123', '', '', 'rushigandhi14@gmail.com', 0, '$2y$10$XiNK6ofu.6DYgah2EppK3OFVmBT8owJPHjUu9og/xGR6qSTnabdoW', '2022-05-23'),
(25, 'rushi_050803', '', '', 'rushigandhi14@gmail.com', 0, '$2y$10$bXeM6a4V9Kam6cOASsPEN.mD1y.z0Ac3ErXVXrPU9FScFp2uM5fiK', '2022-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `viewcart`
--

CREATE TABLE `viewcart` (
  `cartItemId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `itemQuantity` int(100) NOT NULL,
  `userId` int(11) NOT NULL,
  `addedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `viewcart`
--

INSERT INTO `viewcart` (`cartItemId`, `itemId`, `itemQuantity`, `userId`, `addedDate`) VALUES
(126, 11, 1, 19, '2022-05-19 21:24:34'),
(129, 2, 2, 19, '2022-05-19 22:05:07'),
(130, 1, 1, 19, '2022-05-19 22:05:15'),
(132, 17, 1, 19, '2022-05-19 22:25:25'),
(134, 39, 1, 19, '2022-05-19 22:25:54'),
(135, 41, 1, 19, '2022-05-19 22:25:56'),
(136, 47, 1, 19, '2022-05-19 22:32:08'),
(137, 48, 1, 19, '2022-05-19 22:32:09'),
(138, 28, 1, 19, '2022-05-19 22:32:58'),
(139, 29, 1, 19, '2022-05-19 22:32:59'),
(173, 11, 1, 12, '2022-05-20 22:51:24'),
(174, 12, 1, 12, '2022-05-20 22:51:26'),
(175, 10, 1, 12, '2022-05-20 22:51:27'),
(176, 13, 1, 12, '2022-05-20 22:51:30'),
(177, 14, 1, 12, '2022-05-20 22:51:31'),
(178, 41, 1, 12, '2022-05-20 23:11:01'),
(179, 40, 1, 12, '2022-05-20 23:11:03'),
(180, 42, 1, 12, '2022-05-20 23:11:04'),
(181, 43, 1, 12, '2022-05-20 23:11:06'),
(182, 44, 1, 12, '2022-05-20 23:11:07'),
(184, 1, 1, 16, '2022-05-21 17:15:50'),
(185, 2, 1, 16, '2022-05-21 17:15:52'),
(186, 3, 1, 16, '2022-05-21 17:15:53'),
(188, 19, 1, 16, '2022-05-21 18:50:02'),
(189, 6, 1, 16, '2022-05-21 19:00:20'),
(196, 1, 1, 20, '2022-05-22 11:08:04'),
(197, 2, 1, 20, '2022-05-22 11:08:06'),
(198, 3, 1, 20, '2022-05-22 11:08:08'),
(199, 4, 1, 20, '2022-05-22 11:08:10'),
(200, 5, 1, 20, '2022-05-22 11:08:11'),
(201, 6, 90, 20, '2022-05-22 11:08:13'),
(202, 37, 1, 16, '2022-05-22 23:25:27'),
(203, 39, 1, 16, '2022-05-22 23:25:31'),
(204, 45, 1, 16, '2022-05-22 23:25:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `viewcart`
--
ALTER TABLE `viewcart`
  ADD PRIMARY KEY (`cartItemId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `viewcart`
--
ALTER TABLE `viewcart`
  MODIFY `cartItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
