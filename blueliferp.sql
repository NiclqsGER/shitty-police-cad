-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 25. Nov 2020 um 23:59
-- Server-Version: 10.4.11-MariaDB
-- PHP-Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `blueliferp`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `accounts`
--

CREATE TABLE `accounts` (
  `ID` int(11) NOT NULL,
  `Dienstnummer` varchar(255) DEFAULT NULL,
  `Passwort` varchar(255) DEFAULT NULL,
  `Vorname` varchar(255) DEFAULT NULL,
  `Nachname` varchar(255) DEFAULT NULL,
  `Rang` varchar(255) DEFAULT NULL,
  `Berechtigung` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `akten`
--

CREATE TABLE `akten` (
  `ID` int(11) NOT NULL,
  `Vollständiger_Name` varchar(255) DEFAULT NULL,
  `Aliases` varchar(255) DEFAULT NULL,
  `Geschlecht` varchar(255) DEFAULT NULL,
  `Telefonnummer` varchar(255) DEFAULT NULL,
  `Groeße` varchar(255) DEFAULT NULL,
  `Geburtstag` varchar(255) DEFAULT NULL,
  `Augenfarbe` varchar(255) DEFAULT NULL,
  `Haarfarbe` varchar(255) DEFAULT NULL,
  `Sonstiges` varchar(255) DEFAULT NULL,
  `MotorradFR` varchar(255) DEFAULT NULL,
  `WaffenFR` varchar(255) DEFAULT NULL,
  `PKWFR` varchar(255) DEFAULT NULL,
  `LKWFR` varchar(255) DEFAULT NULL,
  `IS_GEFAHNDET` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ausbildung`
--

CREATE TABLE `ausbildung` (
  `ID` int(11) NOT NULL,
  `AUSBILDUNGSART` varchar(255) DEFAULT NULL,
  `AUSBILDUNGSCONTEXT` varchar(255) DEFAULT NULL,
  `BETROFFENE_EINHEITEN` varchar(255) DEFAULT NULL,
  `DATUM` varchar(255) DEFAULT NULL,
  `CREATE_DATE` varchar(255) DEFAULT NULL,
  `CREATOR_ID` int(255) DEFAULT NULL,
  `CREATOR_NAME` varchar(255) DEFAULT NULL,
  `IS_FINISHED` int(255) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `einsatzbericht`
--

CREATE TABLE `einsatzbericht` (
  `ID` int(11) NOT NULL,
  `TITLE` varchar(255) DEFAULT NULL,
  `NEWS` varchar(5000) DEFAULT NULL,
  `CREATED_AT` varchar(255) DEFAULT NULL,
  `CREATOR_ID` int(255) DEFAULT NULL,
  `CREATOR_NAME` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `gesetzbuch`
--

CREATE TABLE `gesetzbuch` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(2555) DEFAULT NULL,
  `KURZEL` varchar(2555) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `neuigkeiten`
--

CREATE TABLE `neuigkeiten` (
  `ID` int(255) NOT NULL,
  `TITLE` varchar(255) DEFAULT NULL,
  `NEWS` varchar(5000) DEFAULT NULL,
  `CREATED_AT` varchar(255) DEFAULT NULL,
  `CREATOR_ID` int(255) DEFAULT NULL,
  `CREATOR_NAME` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `strafen`
--

CREATE TABLE `strafen` (
  `ID` int(11) NOT NULL,
  `Buch` varchar(255) DEFAULT NULL,
  `BuchID` int(255) DEFAULT NULL,
  `Paragraph` int(255) DEFAULT NULL,
  `Straftat` varchar(255) DEFAULT NULL,
  `Minimalstrafe` varchar(255) DEFAULT NULL,
  `Haftzeit` varchar(255) DEFAULT NULL,
  `Sonstiges` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Dienstnummer` (`Dienstnummer`);

--
-- Indizes für die Tabelle `akten`
--
ALTER TABLE `akten`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Vollständiger_Name` (`Vollständiger_Name`);

--
-- Indizes für die Tabelle `ausbildung`
--
ALTER TABLE `ausbildung`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indizes für die Tabelle `einsatzbericht`
--
ALTER TABLE `einsatzbericht`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indizes für die Tabelle `gesetzbuch`
--
ALTER TABLE `gesetzbuch`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indizes für die Tabelle `neuigkeiten`
--
ALTER TABLE `neuigkeiten`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indizes für die Tabelle `strafen`
--
ALTER TABLE `strafen`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `accounts`
--
ALTER TABLE `accounts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `akten`
--
ALTER TABLE `akten`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `ausbildung`
--
ALTER TABLE `ausbildung`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `einsatzbericht`
--
ALTER TABLE `einsatzbericht`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `gesetzbuch`
--
ALTER TABLE `gesetzbuch`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `neuigkeiten`
--
ALTER TABLE `neuigkeiten`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `strafen`
--
ALTER TABLE `strafen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
