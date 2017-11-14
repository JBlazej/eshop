-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Počítač: localhost
-- Vytvořeno: Pát 16. čen 2017, 08:14
-- Verze serveru: 10.1.21-MariaDB
-- Verze PHP: 7.0.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `blaj05`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `Admin`
--

CREATE TABLE `Admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `passwd` varchar(255) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `Admin`
--

INSERT INTO `Admin` (`id`, `email`, `passwd`) VALUES
(1, 'blaj05@vse.cz', '$2y$10$pBjw1b.exC89FGWHJsPZtuKbDvGoJawi0ZkqHa7zGb.SthP2votuO');

-- --------------------------------------------------------

--
-- Struktura tabulky `Goods`
--

CREATE TABLE `Goods` (
  `id` int(11) NOT NULL,
  `nameGoods` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `price` int(12) NOT NULL,
  `type` int(3) NOT NULL,
  `ks` int(5) NOT NULL,
  `note` text COLLATE utf8_czech_ci NOT NULL,
  `last_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `Goods`
--

INSERT INTO `Goods` (`id`, `nameGoods`, `image`, `price`, `type`, `ks`, `note`, `last_updated_at`) VALUES
(1, 'Palace tee', 'PalaceTee.jpg', 1500, 1, 50, 'This is so fly.', '2017-05-14 22:00:00'),
(2, 'Yezzy Boost V2', 'YezzyBoost.jpg', 8500, 3, 150, 'Very special pieces', '0000-00-00 00:00:00'),
(3, 'Supreme Brick', 'SupremeBrick.jpg', 55000, 2, 1, 'Supreme new brick.', '0000-00-00 00:00:00'),
(5, 'Supreme Money Gun', 'SuprmGun.jpg', 22000, 2, 20, 'Look at this beauty.', '0000-00-00 00:00:00'),
(6, 'Saint Pablo T-shirt', 'SaintPablo.jpg', 4500, 1, 2, 'Saint Pablo loves you.', '0000-00-00 00:00:00'),
(26, 'SAINT PABLO', 'SaintPabloX.png', 4500, 1, 52, 'Saint Pablo Loves You', '0000-00-00 00:00:00'),
(27, 'SAINT PABLO', 'SaintPabloX.png', 4500, 1, 20, 'Saint Pablo Loves You', '0000-00-00 00:00:00'),
(28, 'SAINT PABLO', 'SaintPabloX.png', 4500, 1, 1, 'Saint Pablo Loves You', '0000-00-00 00:00:00'),
(29, 'SAINT PABLO', 'SaintPabloX.png', 4500, 1, 1, 'Saint Pablo Loves You', '0000-00-00 00:00:00'),
(30, 'SAINT PABLO', 'SaintPabloX.png', 4500, 1, 1, 'Saint Pablo Loves You', '0000-00-00 00:00:00'),
(31, 'SAINT PABLO', 'SaintPabloX.png', 4500, 1, 1, 'Saint Pablo Loves You', '0000-00-00 00:00:00'),
(32, 'SAINT PABLO', 'SaintPabloX.png', 4500, 1, 10, 'Saint Pablo Loves You', '0000-00-00 00:00:00'),
(33, 'SAINT PABLO', 'SaintPabloX.png', 4500, 1, 20, 'Saint Pablo Loves You', '0000-00-00 00:00:00'),
(34, 'SAINT PABLO', 'SaintPabloX.png', 4500, 1, 20, 'Saint Pablo Loves You', '0000-00-00 00:00:00'),
(35, 'SAINT PABLO', 'SaintPabloX.png', 4500, 1, 20, 'Saint Pablo Loves You', '0000-00-00 00:00:00'),
(36, 'SAINT PABLO', 'SaintPabloX.png', 4500, 1, 20, 'Saint Pablo Loves You', '0000-00-00 00:00:00'),
(37, 'SAINT PABLO', 'SaintPabloX.png', 4500, 1, 3, 'Saint Pablo Loves You', '0000-00-00 00:00:00'),
(47, 'Jarda', 'jarda.png', 1200, 1, 10, 'Jarda je Buh!!', '2017-05-28 16:05:25');

-- --------------------------------------------------------

--
-- Struktura tabulky `Orders2`
--

CREATE TABLE `Orders2` (
  `Idko` int(11) NOT NULL,
  `NumberOrder` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `ID_User` int(11) NOT NULL,
  `ID_Product` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Big` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `TotalPrice` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Ok` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `Orders2`
--

INSERT INTO `Orders2` (`Idko`, `NumberOrder`, `ID_User`, `ID_Product`, `Amount`, `Big`, `TotalPrice`, `Date`, `Ok`) VALUES
(1, 'ls3MKrKDZW', 213, 47, 1, 'S', 1200, '2017-05-29 18:42:42', 0),
(2, 'Izx0TmNqnB', 213, 5, 1, 'S', 26500, '2017-05-29 18:43:07', 0),
(3, 'Izx0TmNqnB', 213, 37, 1, 'S', 26500, '2017-05-29 18:43:07', 0),
(4, '4Rrnx57iDY', 213, 47, 1, 'S', 1200, '2017-05-29 18:43:10', 0),
(5, 'Mgw51KmAn0', 213, 5, 1, 'S', 27700, '2017-05-29 18:44:09', 1),
(6, 'Mgw51KmAn0', 213, 47, 1, 'S', 27700, '2017-05-29 18:44:09', 1),
(7, 'Mgw51KmAn0', 213, 33, 1, 'S', 27700, '2017-05-29 18:44:09', 1),
(8, '55LstCQmUo', 213, 47, 1, 'S', 2400, '2017-05-29 18:44:33', 0),
(9, '55LstCQmUo', 213, 47, 1, 'M', 2400, '2017-05-29 18:44:33', 0),
(10, 'OCE6dVVmRE', 213, 47, 1, 'L', 1200, '2017-05-29 19:20:06', 1),
(11, 'ExiMvcaDvb', 224, 47, 1, 'S', 1200, '2017-06-04 12:23:21', 1),
(12, 'J5TkVYG9wE', 224, 47, 1, 'S', 2400, '2017-06-04 12:23:40', 0),
(13, 'J5TkVYG9wE', 224, 47, 1, 'M', 2400, '2017-06-04 12:23:40', 0),
(14, 'A0uBFICWa1', 224, 47, 1, 'S', 1200, '2017-06-06 13:57:40', 0),
(15, 'kgxqMDPJhE', 224, 37, 1, 'S', 9000, '2017-06-06 13:57:47', 0),
(16, 'kgxqMDPJhE', 224, 36, 1, 'S', 9000, '2017-06-06 13:57:47', 0),
(17, '0uD1Ar8Wuw', 224, 47, 1, 'S', 1200, '2017-06-06 14:08:50', 0),
(18, 'mhSMSipcy7', 224, 37, 1, 'S', 4500, '2017-06-06 14:08:54', 0),
(19, 'mMGeUnFmKJ', 224, 34, 1, 'S', 4500, '2017-06-06 14:08:58', 0),
(20, 'MNtVJXs6fk', 224, 47, 1, 'S', 1200, '2017-06-06 14:24:09', 0),
(21, 'afZq6mlKFG', 224, 47, 1, 'S', 14700, '2017-06-06 17:50:34', 1),
(22, 'afZq6mlKFG', 224, 37, 1, 'S', 14700, '2017-06-06 17:50:34', 1),
(23, 'afZq6mlKFG', 224, 35, 1, 'S', 14700, '2017-06-06 17:50:34', 1),
(24, 'afZq6mlKFG', 224, 30, 1, 'S', 14700, '2017-06-06 17:50:34', 1),
(25, '5YtNBbo7vr', 224, 37, 1, 'S', 4500, '2017-06-15 18:28:04', 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `TMP`
--

CREATE TABLE `TMP` (
  `Id` int(11) NOT NULL,
  `IDUser` int(11) NOT NULL,
  `IDProd` int(11) NOT NULL,
  `Big` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `Amount` int(11) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `TypeGoods`
--

CREATE TABLE `TypeGoods` (
  `id` int(11) NOT NULL,
  `typeGods` varchar(255) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `TypeGoods`
--

INSERT INTO `TypeGoods` (`id`, `typeGods`) VALUES
(1, 'T-shirt'),
(2, 'Accessories'),
(3, 'Art');

-- --------------------------------------------------------

--
-- Struktura tabulky `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `firstName` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `passwd` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `psc` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `activation` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `Users`
--

INSERT INTO `Users` (`id`, `email`, `firstName`, `lastName`, `passwd`, `adress`, `city`, `psc`, `activation`, `status`) VALUES
(213, 'jarda4@seznam.cz', 'Jarda', 'Jaroš', '$2y$10$ntkHFFgsIbtKKRAU86nCNOgV3UeeX3inyhhNENmKSVbDrcsc0O9kS', 'Pragoš', 'Vrahoš', '66600', '', 1),
(224, 'blaj05@vse.cz', 'Janek', 'Buš', '$2y$10$pBjw1b.exC89FGWHJsPZtuKbDvGoJawi0ZkqHa7zGb.SthP2votuO', 'Oráčova 5a', 'Praha', '70030', 'ttrQGrm1mKIni2irN6NYodrtxSSu85frgn7GsYdhRjI=', 1);

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `Goods`
--
ALTER TABLE `Goods`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `Orders2`
--
ALTER TABLE `Orders2`
  ADD PRIMARY KEY (`Idko`);

--
-- Klíče pro tabulku `TMP`
--
ALTER TABLE `TMP`
  ADD PRIMARY KEY (`Id`);

--
-- Klíče pro tabulku `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `Admin`
--
ALTER TABLE `Admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pro tabulku `Goods`
--
ALTER TABLE `Goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT pro tabulku `Orders2`
--
ALTER TABLE `Orders2`
  MODIFY `Idko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pro tabulku `TMP`
--
ALTER TABLE `TMP`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT pro tabulku `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
