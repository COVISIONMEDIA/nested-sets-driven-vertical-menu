-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 01. Aug 2022 um 06:45
-- Server-Version: 10.4.20-MariaDB
-- PHP-Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `coExample`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `co_sections`
--

CREATE TABLE `co_sections` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(255) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `co_sections`
--

INSERT INTO `co_sections` (`id`, `menu_name`, `lft`, `rgt`) VALUES
(1, 'Home', 1, 2),
(2, 'Products', 3, 15),
(3, 'Jackets', 10, 15),
(4, 'Shorts', 4, 9),
(5, 'Black shorts', 5, 6),
(6, 'White shots', 7, 8),
(7, 'Contact', 16, 17),
(8, 'Imprint', 18, 19),
(9, 'Yellow Jackets', 11, 12),
(10, 'Green Jackets', 13, 14);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `co_sections`
--
ALTER TABLE `co_sections`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `co_sections`
--
ALTER TABLE `co_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
