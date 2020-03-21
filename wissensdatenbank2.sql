-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 21. Mrz 2020 um 15:54
-- Server-Version: 10.4.11-MariaDB
-- PHP-Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `wissensdatenbank2`
--
CREATE DATABASE IF NOT EXISTS `wissensdatenbank2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `wissensdatenbank2`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `antworten`
--

CREATE TABLE `antworten` (
  `ID` int(11) NOT NULL,
  `Antworttext` text NOT NULL,
  `Quelle` text NOT NULL,
  `Upvote` int(11) DEFAULT NULL,
  `Downvote` int(11) DEFAULT NULL,
  `Serioes` int(11) DEFAULT NULL,
  `Frage_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fragen`
--

CREATE TABLE `fragen` (
  `ID` int(11) NOT NULL,
  `Fragestellung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `keywords`
--

CREATE TABLE `keywords` (
  `ID` int(11) NOT NULL,
  `Keyword` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mapping key:frage`
--

CREATE TABLE `mapping key:frage` (
  `ID_Frage` int(11) NOT NULL,
  `ID_Keyword` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `antworten`
--
ALTER TABLE `antworten`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Frage_ID` (`Frage_ID`);

--
-- Indizes für die Tabelle `fragen`
--
ALTER TABLE `fragen`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `mapping key:frage`
--
ALTER TABLE `mapping key:frage`
  ADD KEY `ID_Frage` (`ID_Frage`),
  ADD KEY `ID_Keyword` (`ID_Keyword`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `antworten`
--
ALTER TABLE `antworten`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `fragen`
--
ALTER TABLE `fragen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `keywords`
--
ALTER TABLE `keywords`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `antworten`
--
ALTER TABLE `antworten`
  ADD CONSTRAINT `antworten_ibfk_1` FOREIGN KEY (`Frage_ID`) REFERENCES `fragen` (`ID`);

--
-- Constraints der Tabelle `mapping key:frage`
--
ALTER TABLE `mapping key:frage`
  ADD CONSTRAINT `mapping key:frage_ibfk_1` FOREIGN KEY (`ID_Frage`) REFERENCES `fragen` (`ID`),
  ADD CONSTRAINT `mapping key:frage_ibfk_2` FOREIGN KEY (`ID_Keyword`) REFERENCES `keywords` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
