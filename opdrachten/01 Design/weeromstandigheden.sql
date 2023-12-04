-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Gegenereerd op: 27 nov 2023 om 14:18
-- Serverversie: 11.1.2-MariaDB-1:11.1.2+maria~ubu2204
-- PHP-versie: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `m6prog_db`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `weeromstandigheden`
--

CREATE TABLE `weeromstandigheden` (
  `idWeeromstandighedenPerDag` int(10) UNSIGNED NOT NULL,
  `datum` date NOT NULL,
  `aantalGraden` decimal(10,0) NOT NULL,
  `windkracht` int(11) NOT NULL,
  `regenInMilimeters` decimal(10,0) DEFAULT NULL,
  `plaats` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `weeromstandigheden`
--

INSERT INTO `weeromstandigheden` (`idWeeromstandighedenPerDag`, `datum`, `aantalGraden`, `windkracht`, `regenInMilimeters`, `plaats`) VALUES
(1, '2023-01-01', 1, 10, 80, 'amsterdam'),
(2, '2023-01-01', 4, 1, 10, 'den bosch'),
(3, '2023-01-02', 10, 1, 0, 'den haag'),
(4, '2023-01-03', 3, 3, 20, 'almere');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `weeromstandigheden`
--
ALTER TABLE `weeromstandigheden`
  ADD PRIMARY KEY (`idWeeromstandighedenPerDag`),
  ADD UNIQUE KEY `idweeromstandighedenPerDag_UNIQUE` (`idWeeromstandighedenPerDag`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `weeromstandigheden`
--
ALTER TABLE `weeromstandigheden`
  MODIFY `idWeeromstandighedenPerDag` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
