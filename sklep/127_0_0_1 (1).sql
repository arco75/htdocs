-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Maj 16, 2024 at 09:15 AM
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
-- Database: `sklep`
--
CREATE DATABASE IF NOT EXISTS `sklep` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;
USE `sklep`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(50) NOT NULL,
  `adres` varchar(100) NOT NULL,
  `telefon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `klienci`
--

INSERT INTO `klienci` (`id`, `nazwa`, `adres`, `telefon`) VALUES
(30, 'BudPlus', 'ul. Las 1', '111-222-333'),
(31, 'Euro Transport', 'ul. Autostradowa 30', '222-222-222'),
(32, 'Pinokio - sklep papierniczy', 'ul. Szkolna 3A', '321-321-321'),
(33, 'Auto Komis \"ZŁOM i SZROT\"', 'ul. Awaryjna 12', '800-111-222'),
(34, 'Salon fryzjerski \"Na Zero\"', 'ul. Szybka 2/4', '111-999-000'),
(35, 'Sklep meblowy \"Stół i krzesło\"', 'ul. Domowa 299', '423-533-645');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `operacje`
--

CREATE TABLE `operacje` (
  `id` int(11) NOT NULL,
  `idk` int(11) NOT NULL,
  `idt` int(11) NOT NULL,
  `data` date NOT NULL,
  `dokument` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `operacje`
--

INSERT INTO `operacje` (`id`, `idk`, `idt`, `data`, `dokument`) VALUES
(1, 32, 9, '0000-00-00', ''),
(2, 33, 10, '0000-00-00', ''),
(3, 32, 6, '0000-00-00', ''),
(4, 34, 5, '2024-05-16', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `towary`
--

CREATE TABLE `towary` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(50) NOT NULL,
  `cena` float NOT NULL,
  `ilosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `towary`
--

INSERT INTO `towary` (`id`, `nazwa`, `cena`, `ilosc`) VALUES
(4, 'TV', 1890, 100),
(5, 'Pralka', 1200, 110),
(6, 'Lodówka', 1900, 22),
(7, 'Konsola', 2500, 10),
(8, 'Głośniki', 120, 10),
(9, 'Klawiatura', 220, 100),
(10, 'Fotel ', 980, 21);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `pu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `pu`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 0),
(2, 'artur', 'e10adc3949ba59abbe56e057f20f883e', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `operacje`
--
ALTER TABLE `operacje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idk` (`idk`),
  ADD KEY `idt` (`idt`);

--
-- Indeksy dla tabeli `towary`
--
ALTER TABLE `towary`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `operacje`
--
ALTER TABLE `operacje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `towary`
--
ALTER TABLE `towary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `operacje`
--
ALTER TABLE `operacje`
  ADD CONSTRAINT `operacje_ibfk_1` FOREIGN KEY (`idk`) REFERENCES `klienci` (`id`),
  ADD CONSTRAINT `operacje_ibfk_2` FOREIGN KEY (`idt`) REFERENCES `towary` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
