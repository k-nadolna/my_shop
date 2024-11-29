-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Lis 29, 2024 at 01:00 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_shop`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cart`
--

CREATE TABLE `cart` (
  `Id` float DEFAULT NULL,
  `ProductImage` varchar(200) DEFAULT NULL,
  `ProductName` varchar(200) DEFAULT NULL,
  `ProductPrice` varchar(200) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `TotalValue` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Id`, `ProductImage`, `ProductName`, `ProductPrice`, `Quantity`, `TotalValue`) VALUES
(25, 'reindeer.jpg', 'Ball', '55', 1, 55),
(17, 'car.jpg', 'Car', '45', 1, 45),
(20, 'train.jpg', 'Train', '30', 2, 60),
(33, 'puzzle.jpg', 'Puzzle', '15', 3, 45);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
