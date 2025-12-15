-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Lis 29, 2024 at 01:01 PM
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
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `Id` int(11) NOT NULL,
  `ProductName` varchar(200) DEFAULT NULL,
  `ProductImage` varchar(200) DEFAULT NULL,
  `ProductPrice` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Id`, `ProductName`, `ProductImage`, `ProductPrice`) VALUES
(1, 'Car', 'car.jpg', 45),
(2, 'Train', 'train.jpg', 30),
(3, 'Ball', 'reindeer.jpg', 55),
(4, 'Lego', 'lego.jpg', 50),
(5, 'Puzzle', 'puzzle.jpg', 15),
(6, 'Turkey', 'turkey.jpg', 22),
(7, 'Bear', 'bear.jpg', 17),
(8, 'Dog', 'dog.jpg', 10),
(9, 'Frog', 'frog.jpg', 9),
(10, 'Reindeer', 'reindeer.jpg', 22),
(11, 'Sheep', 'sheep.jpg', 18),
(12, 'Truck', 'turkey.jpg', 22),
(13, 'Pop-it', 'pop-it.jpg', 6),
(14, 'Puppets', 'puppets.jpg', 20);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
