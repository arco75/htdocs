-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2024 at 02:27 PM
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
-- Database: `biblioteka`
--
CREATE DATABASE IF NOT EXISTS `biblioteka` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;
USE `biblioteka`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `tytul` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `wydawnictwo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `czytelnicy`
--

CREATE TABLE `czytelnicy` (
  `id` int(11) NOT NULL,
  `imie` varchar(50) NOT NULL,
  `nazwisko` varchar(50) NOT NULL,
  `telefon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `czytelnicy`
--

INSERT INTO `czytelnicy` (`id`, `imie`, `nazwisko`, `telefon`) VALUES
(3, 'Jan', 'Nowak', '111-222-333'),
(4, 'Anna', 'Sowa', '222-222-333'),
(5, 'Tomasz', 'Kot', '123-123-123'),
(6, 'Alicja', 'Nowakowska', '123123123'),
(7, 't35342', '54325325', '5342532'),
(8, '11111', '222', '333333'),
(9, '', '', ''),
(10, 'aaaaaaa', 'bbbbbbb', '11111111'),
(11, '1', '1', '2'),
(12, '32', '32', '32'),
(13, '222', '222', '222'),
(14, '111', '1111', '1111');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `operacje`
--

CREATE TABLE `operacje` (
  `id` int(11) NOT NULL,
  `idk` int(11) NOT NULL,
  `idc` int(11) NOT NULL,
  `data` date NOT NULL,
  `stan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `operator`
--

CREATE TABLE `operator` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `haslo` varchar(100) NOT NULL,
  `imienazwisko` varchar(50) NOT NULL,
  `pu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`id`, `login`, `haslo`, `imienazwisko`, `pu`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Jan Administratowski', 0),
(2, 'operator', 'e10adc3949ba59abbe56e057f20f883e', 'Anna Operatorska', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `czytelnicy`
--
ALTER TABLE `czytelnicy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `operacje`
--
ALTER TABLE `operacje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idk` (`idk`),
  ADD KEY `idc` (`idc`);

--
-- Indeksy dla tabeli `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `czytelnicy`
--
ALTER TABLE `czytelnicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `operacje`
--
ALTER TABLE `operacje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `operacje`
--
ALTER TABLE `operacje`
  ADD CONSTRAINT `operacje_ibfk_1` FOREIGN KEY (`idk`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `operacje_ibfk_2` FOREIGN KEY (`idc`) REFERENCES `czytelnicy` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
