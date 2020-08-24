-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 25. Mai 2020 um 06:45
-- Server-Version: 10.1.26-MariaDB
-- PHP-Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `spendenaktion`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `abteilung`
--

CREATE TABLE `abteilung` (
  `AID` int(20) NOT NULL,
  `AName` enum('WebEntwicklung','Sachbearbeitung','Betreuung') NOT NULL,
  `BossMID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `abteilung`
--

INSERT INTO `abteilung` (`AID`, `AName`, `BossMID`) VALUES
(1, 'WebEntwicklung', 2),
(2, 'Sachbearbeitung', 3),
(3, 'Betreuung', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `betreut`
--

CREATE TABLE `betreut` (
  `MID` int(20) NOT NULL,
  `PID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `betreut`
--

INSERT INTO `betreut` (`MID`, `PID`) VALUES
(1, 1),
(1, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `charity_event`
--

CREATE TABLE `charity_event` (
  `ChEID` int(20) NOT NULL,
  `ChName` varchar(40) NOT NULL,
  `ChAdresse` varchar(40) NOT NULL,
  `ChDatum` datetime NOT NULL,
  `BildDateiName` text CHARACTER SET utf8 NOT NULL,
  `Bildbeschreibung` text CHARACTER SET utf8 NOT NULL,
  `Beschreibung` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `charity_event`
--

INSERT INTO `charity_event` (`ChEID`, `ChName`, `ChAdresse`, `ChDatum`, `BildDateiName`, `Bildbeschreibung`, `Beschreibung`) VALUES
(1, 'Konzert', 'Hofburg, Wien', '2020-05-01 14:00:00', '1.jpg', '', '<p style=\"text-align: justify;\">Zentralasiatische Musik. Das Geld wird f&uuml;r die Kinder oder f&uuml;r die Bildung oder f&uuml;r die Gesundheit gespendet, nachdem Sie das Projekt ausgew&auml;hlt haben.</p>\r\n'),
(2, 'Abendessen mit Musik', 'Rathaus, Wien', '2020-11-01 14:00:00', '2.jpg', '', '<p style=\"text-align: justify;\">Abendessen mit Musik.&nbsp;Das Geld wird f&uuml;r die Kinder oder f&uuml;r die Bildung oder f&uuml;r die Gesundheit gespendet, nachdem Sie das Projekt ausgew&auml;hlt haben.</p>\r\n');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `gehalt`
--

CREATE TABLE `gehalt` (
  `MID` int(20) NOT NULL,
  `von` date NOT NULL,
  `bis` date DEFAULT NULL,
  `Betrag` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `gehalt`
--

INSERT INTO `gehalt` (`MID`, `von`, `bis`, `Betrag`) VALUES
(1, '2020-05-01', '2020-05-31', '2047.00'),
(2, '2020-05-01', '2020-05-31', '817.00'),
(3, '2020-05-01', '2020-05-31', '2000.00'),
(4, '2020-05-01', '2020-05-31', '2047.00');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mitarbeiter`
--

CREATE TABLE `mitarbeiter` (
  `MID` int(20) NOT NULL,
  `AID` int(20) NOT NULL,
  `VName` varchar(40) NOT NULL,
  `NName` varchar(40) NOT NULL,
  `GebDatum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `mitarbeiter`
--

INSERT INTO `mitarbeiter` (`MID`, `AID`, `VName`, `NName`, `GebDatum`) VALUES
(1, 3, 'Stefan', 'Reiter', '1990-10-08'),
(2, 1, 'Umut', 'Muratbekova', '1991-01-08'),
(3, 2, 'Andrea', 'Mueller', '1989-11-08'),
(4, 1, 'Jasmin', 'Roschek', '1988-01-01');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `projekt`
--

CREATE TABLE `projekt` (
  `PID` int(20) NOT NULL,
  `PName` varchar(40) NOT NULL,
  `Pvon` date NOT NULL,
  `Pbis` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `projekt`
--

INSERT INTO `projekt` (`PID`, `PName`, `Pvon`, `Pbis`) VALUES
(1, 'Kinder', '2020-01-01', '2020-12-31'),
(2, 'Bildung', '2020-01-01', '2020-12-31'),
(3, 'Gesundheit', '2020-01-01', '2020-12-31');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `spender`
--

CREATE TABLE `spender` (
  `SID` int(20) NOT NULL,
  `vorname` varchar(40) DEFAULT NULL,
  `nachname` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `passwort` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `spender`
--

INSERT INTO `spender` (`SID`, `vorname`, `nachname`, `email`, `passwort`) VALUES
(8, 'angst', 'hase', 'hase@htl.com', '$2y$10$JEt8a2nK/8gq1WrNG3Zh8.5JMwwfqnw/OnPao7C7tuctveud9Jt7y');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `spendet`
--

CREATE TABLE `spendet` (
  `PID` int(20) NOT NULL,
  `SID` int(20) NOT NULL,
  `ChEID` int(20) NOT NULL,
  `Betrag` decimal(10,2) NOT NULL,
  `Datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `spendet`
--

INSERT INTO `spendet` (`PID`, `SID`, `ChEID`, `Betrag`, `Datum`) VALUES
(1, 8, 1, '100.00', '2020-05-22'),
(2, 8, 1, '50.00', '2020-05-19'),
(3, 8, 2, '1000.00', '2020-03-04');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `abteilung`
--
ALTER TABLE `abteilung`
  ADD PRIMARY KEY (`AID`),
  ADD KEY `BossMID` (`BossMID`);

--
-- Indizes für die Tabelle `betreut`
--
ALTER TABLE `betreut`
  ADD PRIMARY KEY (`MID`,`PID`),
  ADD KEY `PID` (`PID`);

--
-- Indizes für die Tabelle `charity_event`
--
ALTER TABLE `charity_event`
  ADD PRIMARY KEY (`ChEID`);

--
-- Indizes für die Tabelle `gehalt`
--
ALTER TABLE `gehalt`
  ADD PRIMARY KEY (`MID`,`von`),
  ADD KEY `MID` (`MID`);

--
-- Indizes für die Tabelle `mitarbeiter`
--
ALTER TABLE `mitarbeiter`
  ADD PRIMARY KEY (`MID`),
  ADD KEY `AID` (`MID`,`AID`),
  ADD KEY `AID_2` (`AID`);

--
-- Indizes für die Tabelle `projekt`
--
ALTER TABLE `projekt`
  ADD PRIMARY KEY (`PID`);

--
-- Indizes für die Tabelle `spender`
--
ALTER TABLE `spender`
  ADD PRIMARY KEY (`SID`);

--
-- Indizes für die Tabelle `spendet`
--
ALTER TABLE `spendet`
  ADD PRIMARY KEY (`PID`,`SID`,`ChEID`) USING BTREE,
  ADD KEY `SID` (`SID`),
  ADD KEY `ChEID` (`ChEID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `abteilung`
--
ALTER TABLE `abteilung`
  MODIFY `AID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `mitarbeiter`
--
ALTER TABLE `mitarbeiter`
  MODIFY `MID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `projekt`
--
ALTER TABLE `projekt`
  MODIFY `PID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `spender`
--
ALTER TABLE `spender`
  MODIFY `SID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `abteilung`
--
ALTER TABLE `abteilung`
  ADD CONSTRAINT `abteilung_ibfk_1` FOREIGN KEY (`BossMID`) REFERENCES `mitarbeiter` (`MID`) ON UPDATE CASCADE;

--
-- Constraints der Tabelle `betreut`
--
ALTER TABLE `betreut`
  ADD CONSTRAINT `betreut_ibfk_3` FOREIGN KEY (`MID`) REFERENCES `mitarbeiter` (`MID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `betreut_ibfk_4` FOREIGN KEY (`PID`) REFERENCES `projekt` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `gehalt`
--
ALTER TABLE `gehalt`
  ADD CONSTRAINT `gehalt_ibfk_1` FOREIGN KEY (`MID`) REFERENCES `mitarbeiter` (`MID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `mitarbeiter`
--
ALTER TABLE `mitarbeiter`
  ADD CONSTRAINT `mitarbeiter_ibfk_1` FOREIGN KEY (`AID`) REFERENCES `abteilung` (`AID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `spendet`
--
ALTER TABLE `spendet`
  ADD CONSTRAINT `spendet_ibfk_3` FOREIGN KEY (`PID`) REFERENCES `projekt` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `spendet_ibfk_4` FOREIGN KEY (`SID`) REFERENCES `spender` (`SID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `spendet_ibfk_5` FOREIGN KEY (`ChEID`) REFERENCES `charity_event` (`ChEID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
