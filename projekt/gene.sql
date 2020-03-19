-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Värd: localhost
-- Tid vid skapande: 24 jan 2020 kl 08:36
-- Serverversion: 5.7.28-0ubuntu0.18.04.4-log
-- PHP-version: 7.3.12-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `gene`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `bilar`
--

CREATE TABLE `bilar` (
  `reg` char(10) NOT NULL,
  `marke` char(50) DEFAULT NULL,
  `modell` char(50) DEFAULT NULL,
  `arsmodell` int(11) DEFAULT NULL,
  `pris` int(11) DEFAULT NULL,
  `agare` int(11) DEFAULT NULL
) ENGINE=InnoDBdock;

--
-- Dumpning av Data i tabell `bilar`
--

INSERT INTO `bilar` (`reg`, `marke`, `modell`, `arsmodell`, `pris`, `agare`) VALUES
('ABC123', 'Saab', '9-5', 2003, 130000, 1),
('ABC456', 'Volkswagen', 'Polo', 2003, 75000, 1),
('DEF123', 'Volvo', 'S-80', 2002, 140000, 2),
('DEF456', 'Toyota', 'Carina II', 1998, 30000, 2),
('GHI123', 'Mazda', '626', 2001, 80000, 3),
('JKL123', 'Audi', 'A8', 2001, 150000, 5),
('MNO123', 'BMW', '323', 1998, 60000, 5),
('PQR123', 'Ford', 'Mondeo', 2001, 90000, 4),
('STU123', 'Volvo', '740', 1987, 35000, 5),
('VYX123', 'Volkswagen', 'Golf', 1988, 40000, 5);

-- --------------------------------------------------------

--
-- Tabellstruktur `blogg`
--

CREATE TABLE `blogg` (
  `id` int(4) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `inlagg` text CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `rubrik` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDBdock;

--
-- Dumpning av Data i tabell `blogg`
--

INSERT INTO `blogg` (`id`, `datum`, `inlagg`, `rubrik`) VALUES
(6, '2020-01-13 08:08:33', 'test123', 'test123'),
(7, '2020-01-13 08:10:18', 'TESTTESt', 'Rubrik'),
(8, '2020-01-13 08:24:30', 'fasadsada', 'testing');

-- --------------------------------------------------------

--
-- Tabellstruktur `filmer`
--

CREATE TABLE `filmer` (
  `id` int(11) NOT NULL,
  `betyg` int(2) NOT NULL,
  `recension` text NOT NULL,
  `namn` varchar(50) NOT NULL,
  `film-id` int(11) NOT NULL
) ENGINE=InnoDBdock;

--
-- Dumpning av Data i tabell `filmer`
--

INSERT INTO `filmer` (`id`, `betyg`, `recension`, `namn`, `film-id`) VALUES
(1, 8, 'reerewrqr', 'tewrw', 0);

-- --------------------------------------------------------

--
-- Tabellstruktur `personer`
--

CREATE TABLE `personer` (
  `id` int(11) NOT NULL,
  `fnamn` char(50) DEFAULT NULL,
  `enamn` char(50) DEFAULT NULL
) ENGINE=InnoDBdock;

--
-- Dumpning av Data i tabell `personer`
--

INSERT INTO `personer` (`id`, `fnamn`, `enamn`) VALUES
(1, 'Kalle', 'Anka'),
(2, 'Kajsa', 'Anka'),
(3, 'Knatte', 'Anka'),
(4, 'Tjatte', 'Anka'),
(5, 'Fnatte', 'Anka'),
(6, 'Knase', 'Anka'),
(7, 'Alexander', 'Lukas');

-- --------------------------------------------------------

--
-- Tabellstruktur `test`
--

CREATE TABLE `test` (
  `namn` varchar(10) DEFAULT NULL
) ENGINE=InnoDBdock;

--
-- Dumpning av Data i tabell `test`
--

INSERT INTO `test` (`namn`) VALUES
('Kalle');

-- --------------------------------------------------------

--
-- Tabellstruktur `test2`
--

CREATE TABLE `test2` (
  `namn` varchar(20) DEFAULT NULL,
  `enamn` varchar(20) DEFAULT NULL
) ENGINE=InnoDBdock;

--
-- Dumpning av Data i tabell `test2`
--

INSERT INTO `test2` (`namn`, `enamn`) VALUES
('Kalle', 'Anka');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `bilar`
--
ALTER TABLE `bilar`
  ADD PRIMARY KEY (`reg`);

--
-- Index för tabell `blogg`
--
ALTER TABLE `blogg`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `filmer`
--
ALTER TABLE `filmer`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `personer`
--
ALTER TABLE `personer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `blogg`
--
ALTER TABLE `blogg`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT för tabell `filmer`
--
ALTER TABLE `filmer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT för tabell `personer`
--
ALTER TABLE `personer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
