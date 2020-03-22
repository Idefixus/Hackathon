-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 22. Mrz 2020 um 16:01
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
-- Datenbank: `wissensdatenbank3`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `antworten`
--

CREATE TABLE `antworten` (
  `ID` int(11) NOT NULL,
  `Antworttext` text NOT NULL,
  `Quelle` text NOT NULL,
  `Upvote` int(11) DEFAULT 0,
  `Downvote` int(11) DEFAULT 0,
  `Serioes` int(11) DEFAULT NULL,
  `Frage_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `antworten`
--

INSERT INTO `antworten` (`ID`, `Antworttext`, `Quelle`, `Upvote`, `Downvote`, `Serioes`, `Frage_ID`) VALUES
(1, 'Der Effekt von Ibuprofen auf den Coronavirus ist aktuell noch unbekannt. ', 'https://www.tagesschau.de/faktenfinder/corona-ibuprofen-101.html', NULL, NULL, NULL, 1),
(2, 'Nein eine Ausgangssperre ist völlig unbedenklich. Es ist wichtig seinen wöchentlichen Alkoholkonsum aufrecht zu erhalten.', 'https://www.der-postillon.com/2020/03/ausgangssperre.html', NULL, 1, NULL, 2),
(3, 'Sie behauptet, dass es einen Zusammenhang zwischen Corona-Fällen mit schweren Verläufen und Ibuprofen gebe. Das haben Ärzte des Wiener Uniklinikums herausgefunden. Weil das aber noch keine offizielle Forschung ist, wird die Nachricht aus Angst vor Schadenersatzforderungen durch Pharmaunternehmen zurückgehalten.', 'Sprachnachricht von einer Sprecherin des Wiender Uniklinikums', NULL, NULL, NULL, 1),
(4, 'Dem BfR sind bisher keine Infektionen mit SARS-CoV-2 über diesen Übertragungsweg bekannt. Grundsätzlich können Coronaviren durch direktes Niesen oder Husten einer infizierten Person auf Türklinken gelangen und eine Zeit lang überleben. Eine Schmierinfektion einer weiteren Person erscheint dann möglich, wenn das Virus kurz danach über die Hände auf die Schleimhäute des Mund- und Rachenraumes oder die Augen übertragen wird. Deshalb ist eine gute Händehygiene mit regelmäßigem Händewaschen und Fernhalten der Hände aus dem Gesicht wichtig.', 'https://www.bfr.bund.de/de/kann_das_neuartige_coronavirus_ueber_lebensmittel_und_gegenstaende_uebertragen_werden_-244062.html', NULL, NULL, NULL, 7),
(5, 'Das Virus hält sich bis zu 9 Tagen. ', 'https://www.n-tv.de/wissen/Coronavirus-ueberlebt-tagelang-auf-Flaechen-article21562809.html', NULL, NULL, NULL, 7),
(6, 'In China werden bereits Geldschiene von der Regierunge eingezogen, weil sie Angst haben, dass dadurch Corona übertragen werden kann.', 'https://www.tagesspiegel.de/wirtschaft/coronavirus-durch-bargeld-uebertragbar-china-zieht-wegen-covid-19-geldscheine-ein/25588432.html', NULL, NULL, NULL, 6),
(7, 'Das Virus kann auf Pappe bis zu 24h überleben. Daher ist es zwar möglich, dass der Virus auf dem Geldschein haftet, allerdings ist das nur kritisch, falls man sich danach direkt ins Gesicht an Mund oder Nase fasst. Daher bitte gut Hände waschen nach dem Einkaufen. ', 'https://www.bayern3.de/fakt-fake-corona-anstecken-ueber-bargeld', NULL, NULL, NULL, 6),
(8, 'Die Einschränkungen in Bayern gelten aktuell für jeden.', 'https://www.sueddeutsche.de/bayern/coronavirus-bayern-ausgangsbeschraenkung-regeln-1.4852160', NULL, NULL, NULL, 5),
(9, 'Nein, Luft anhalten ist kein Selbsttest für Covid-19, kann aber auf andere Atemwegserkrankungen hinweisen.\r\n', 'https://www.sueddeutsche.de/gesundheit/gesundheit-ist-luftanhalten-ein-schnelltest-auf-das-coronavirus-dpa.urn-newsml-dpa-com-20090101-200321-99-417668', NULL, NULL, NULL, 8);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fragen`
--

CREATE TABLE `fragen` (
  `ID` int(11) NOT NULL,
  `Fragestellung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `fragen`
--

INSERT INTO `fragen` (`ID`, `Fragestellung`) VALUES
(1, 'Verschlimmert Ibuprofen die Symptome von Corona?'),
(2, 'Kann ich während der Ausgangssperre trotzdem in den Biergarten gehen?'),
(3, 'Hilft Alkohol gegen Corona?'),
(4, 'Wie gefährlich ist Corona für mich? '),
(5, 'Ich gehöre nicht zu einer Risikogruppe und kenne auch niemanden, der sich in einer befindet. Muss ich mich trotzdem einschränken? Ich wohne in München.'),
(6, 'Kann ich unbesorgt mit Bargeld zahlen ohne mich zu infizieren?'),
(7, 'Wie lange hält sich das Virus auf Türklinken?'),
(8, 'Gibt es Möglichkeiten für einen Selbsttest? ');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `keywords`
--

CREATE TABLE `keywords` (
  `ID` int(11) NOT NULL,
  `Keyword` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `keywords`
--

INSERT INTO `keywords` (`ID`, `Keyword`) VALUES
(1, 'Ausgangssperre'),
(2, 'Ibuprofen'),
(3, 'Alkohol'),
(4, 'Gefahr'),
(5, 'Risikogruppe'),
(6, 'Bargeld'),
(7, 'Türklinken'),
(8, 'Selbsttest');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mapping key:frage`
--

CREATE TABLE `mapping key:frage` (
  `ID_Frage` int(11) NOT NULL,
  `ID_Keyword` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `mapping key:frage`
--

INSERT INTO `mapping key:frage` (`ID_Frage`, `ID_Keyword`) VALUES
(1, 2),
(2, 1),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8);

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
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Keyword` (`Keyword`) USING HASH;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `fragen`
--
ALTER TABLE `fragen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `keywords`
--
ALTER TABLE `keywords`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
--
UPDATE `antworten` SET `Upvote` = '0' WHERE `antworten`.`ID` = 1; 
UPDATE `antworten` SET `Upvote` = '0' WHERE `antworten`.`ID` = 2; 
UPDATE `antworten` SET `Upvote` = '0' WHERE `antworten`.`ID` = 3; 
UPDATE `antworten` SET `Upvote` = '0' WHERE `antworten`.`ID` = 4; 
UPDATE `antworten` SET `Upvote` = '0' WHERE `antworten`.`ID` = 5; 
UPDATE `antworten` SET `Upvote` = '0' WHERE `antworten`.`ID` = 6; 
UPDATE `antworten` SET `Upvote` = '0' WHERE `antworten`.`ID` = 7; 
UPDATE `antworten` SET `Upvote` = '0' WHERE `antworten`.`ID` = 8; 
UPDATE `antworten` SET `Upvote` = '0' WHERE `antworten`.`ID` = 9; 

UPDATE `antworten` SET `Downvote` = '0' WHERE `antworten`.`ID` = 1; 
UPDATE `antworten` SET `Downvote` = '0' WHERE `antworten`.`ID` = 2; 
UPDATE `antworten` SET `Downvote` = '0' WHERE `antworten`.`ID` = 3; 
UPDATE `antworten` SET `Downvote` = '0' WHERE `antworten`.`ID` = 4; 
UPDATE `antworten` SET `Downvote` = '0' WHERE `antworten`.`ID` = 5; 
UPDATE `antworten` SET `Downvote` = '0' WHERE `antworten`.`ID` = 6; 
UPDATE `antworten` SET `Downvote` = '0' WHERE `antworten`.`ID` = 7; 
UPDATE `antworten` SET `Downvote` = '0' WHERE `antworten`.`ID` = 8; 
UPDATE `antworten` SET `Downvote` = '0' WHERE `antworten`.`ID` = 9; 
