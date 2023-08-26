-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 26, 2023 at 03:36 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nbsoft-4zadatak`
--

-- --------------------------------------------------------

--
-- Table structure for table `orderItems`
--

CREATE TABLE `orderItems` (
  `id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `value` float NOT NULL,
  `productId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderItems`
--

INSERT INTO `orderItems` (`id`, `orderId`, `value`, `productId`) VALUES
(1, 1, 3, 1),
(2, 1, 2, 1),
(3, 2, 5, 2),
(4, 2, 2, 3),
(5, 1, 2, 3),
(6, 1, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `value` float DEFAULT NULL,
  `dateCreate` datetime NOT NULL DEFAULT current_timestamp(),
  `dateEdit` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `value`, `dateCreate`, `dateEdit`) VALUES
(1, 1, NULL, '2023-08-24 22:40:47', '2023-08-24 22:40:41'),
(2, 4, NULL, '2023-08-25 00:50:23', NULL),
(4, 1, NULL, '2023-08-25 01:33:26', '2023-08-25 01:33:23');

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`id`, `name`, `price`) VALUES
(1, 'Banana', 149.99),
(2, 'Cips', 49.99),
(3, 'Jabuke', 99.99);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefon` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `grad` varchar(50) NOT NULL,
  `postanski_broj` varchar(10) NOT NULL,
  `adresa` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user',
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ime`, `prezime`, `email`, `telefon`, `username`, `password`, `grad`, `postanski_broj`, `adresa`, `role`, `last_login`) VALUES
(1, 'Vukadin', 'Lazarevic', 'vlazarevic@raf.rs', '0603413252', 'vlazarevic', 'd2a8d138cd31136f906fca85e81986d60df9a97c2551c63144ac4d370da38622', 'Beograd', '11130', 'Kozaracka 15', 'admin', '2023-08-25 22:07:10'),
(2, 'Marko', 'Bozic', 'mbozic@raf.rs', '060123456', 'mbozic', '406892809c1d9de3b80b9ba86f7b332c6cd8f8d131d69bb1c3f0ab5c9b668b5f', 'Beograd', '11000', 'Usce', 'user', '2023-08-24 22:42:45'),
(4, 'Ana', 'Rajkovic', 'anarajkovic101@gmail.com', '060123456', 'arajkovic', '2dd591b21d63deb5c0ddef813831f7d09e82d0fa8f9d385ef0b82fd8bf9cef0a', 'Beograd', '11130', 'Branka Copica 32', 'user', NULL),
(5, 'Jovan', 'Lazarevic', 'jovanlazarevic@gmail.com', '060123456', 'jlazarevic', '4314d9a52a45a17930f5d1127cfc9f640611376f7514530f6c5c782832dfec57', 'Beograd', '11130', 'Kozaracka 15', 'user', NULL),
(7, 'admin', 'admin', 'admin@admin.rs', '060123456', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Beograd', '11130', 'Kozaracka 15', 'admin', '2023-08-25 22:06:54'),
(8, 'user', 'user', 'user@user.rs', '060123456', 'user', '04f8996da763b7a969b1028ee3007569eaf3a635486ddab211d512c85b9df8fb', 'Beograd', '11130', 'Branka Copica 32', 'user', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderItems`
--
ALTER TABLE `orderItems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderId` (`orderId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orderItems`
--
ALTER TABLE `orderItems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderItems`
--
ALTER TABLE `orderItems`
  ADD CONSTRAINT `orderitems_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orderitems_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `Product` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
