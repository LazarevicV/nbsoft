-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 26, 2023 at 03:37 AM
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
-- Database: `nbsoft_2zadatak`
--

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `pol` varchar(255) NOT NULL,
  `godinaRodjenja` int(11) NOT NULL,
  `grad` varchar(255) NOT NULL,
  `adresa` varchar(255) NOT NULL,
  `prihvati` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `firstName`, `lastName`, `pol`, `godinaRodjenja`, `grad`, `adresa`, `prihvati`) VALUES
(1, 'Vukadin', 'Lazarevic', 'muski', 2002, 'Beograd', 'Kozaracka 15', 0),
(2, 'David', 'Stevic', 'drugo', 2010, 'NS', 'Kod pajica', 1),
(3, 'Ana', 'Rajkovic', 'zenski', 2003, 'Beograd', 'Branka Copica 32', 0),
(4, 'Filip', 'Pajic', 'drugo', 1990, 'NS', 'Kod Milice', 1),
(5, 'Marko', 'Lazarevic', 'muski', 2002, 'Beograd', 'Kozaracka 15', 1),
(6, 'Vukadin', 'Lazarevic', 'muski', 1234, 'Beograd', '123123312', 1),
(7, 'Jovan', 'Lazarevic', 'zenski', 2007, 'Beograd', 'Kozaracka 15', 0),
(8, 'Marko', 'Bozic', 'muski', 2001, 'Beograd', 'Usce', 1),
(10, 'Vukadin', 'Lazarevic', 'muski', 2002, 'Beograd', 'Kozaracka 15', 1),
(11, 'Pera', 'Peric', 'zenski', 1999, 'Beograd', 'Kozaracka 15', 1),
(12, 'Marko', 'Bozic', 'muski', 2001, 'Beograd', 'usce', 1),
(22, 'Vukadin', 'Lazarevic', 'muski', 2010, 'Beograd', 'Kozaracka 15', 1),
(23, 'Vukadin', 'Lazarevic', 'muski', 1999, 'Beograd', 'Kozaracka 15', 1),
(24, 'Vukadin', 'Lazarevic', 'muski', 1999, 'Beograd', 'Kozaracka 15', 1),
(25, 'Jovan', 'Lazarevic', 'muski', 2007, 'Beograd', 'Kozaracka 15', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
