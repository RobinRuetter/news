-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 31. Mai 2023 um 16:41
-- Server-Version: 10.4.28-MariaDB
-- PHP-Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `m295_projekt`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kategories`
--

CREATE TABLE `kategories` (
  `kid` int(10) UNSIGNED NOT NULL,
  `kategorie` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `kategories`
--

INSERT INTO `kategories` (`kid`, `kategorie`) VALUES
(1, 'Schule'),
(2, 'Freizeit'),
(3, 'Sport'),
(4, 'Sonstiges');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `news`
--

CREATE TABLE `news` (
  `newsID` int(11) NOT NULL,
  `titel` varchar(255) NOT NULL,
  `inhalt` text DEFAULT NULL,
  `gueltigVon` datetime DEFAULT NULL,
  `gueltigBis` datetime DEFAULT NULL,
  `erstelltam` datetime DEFAULT NULL,
  `kid` int(10) UNSIGNED NOT NULL,
  `link` varchar(50) DEFAULT NULL,
  `bild` varchar(255) DEFAULT NULL,
  `autor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `news`
--

INSERT INTO `news` (`newsID`, `titel`, `inhalt`, `gueltigVon`, `gueltigBis`, `erstelltam`, `kid`, `link`, `bild`, `autor`) VALUES
(8, 'Nashorn', 'Nashorn Gesichtet', '2023-05-25 00:00:00', '2023-06-09 00:00:00', '2023-05-27 00:00:00', 4, 'bing.com', 'https://th.bing.com/th?id=ABTE4103F810D7EB7016CB13E1C9BE39D65A7047D0732085F79F272BB8C1A51A382&w=608&h=200&c=2&rs=1&o=6&dpr=1.3&pid=SANGAM', 1),
(9, 'MAN', 'DER MAN LION\'S CITY E-BUS', '2023-05-11 00:00:00', '2023-06-10 00:00:00', '2023-05-27 00:00:00', 4, 'bing.com', 'https://www.man.eu/ntg_media/media/content_medien/img/bw_master_1/bus/stadtbusse/lion_s_city_e/Lions-City-E-stage_2400x1350_width_1600_height_900.jpg', 1),
(12, 'Nashorn', 'Nashorn gesichtet', '2023-05-11 00:00:00', '2023-05-19 00:00:00', '2023-05-29 00:00:00', 4, 'bing.com', 'https://th.bing.com/th?id=ABTE4103F810D7EB7016CB13E1C9BE39D65A7047D0732085F79F272BB8C1A51A382&w=608&h=200&c=2&rs=1&o=6&dpr=1.3&pid=SANGAM', 2),
(13, 'Nashorn2', 'Nashorn2', '2023-05-03 00:00:00', '2023-05-12 00:00:00', '2023-05-29 00:00:00', 2, 'bing.com', 'https://th.bing.com/th?id=ABTE4103F810D7EB7016CB13E1C9BE39D65A7047D0732085F79F272BB8C1A51A382&w=608&h=200&c=2&rs=1&o=6&dpr=1.3&pid=SANGAM', 2),
(14, 'Nashorn3', 'Nashorn3', '2023-05-10 00:00:00', '2023-05-20 00:00:00', '2023-05-29 00:00:00', 2, 'bing.com', 'https://th.bing.com/th?id=ABTE4103F810D7EB7016CB13E1C9BE39D65A7047D0732085F79F272BB8C1A51A382&w=608&h=200&c=2&rs=1&o=6&dpr=1.3&pid=SANGAM', 2),
(15, 'Nashorn4', 'Nashorn4', '2023-05-19 00:00:00', '2023-05-21 00:00:00', '2023-05-29 00:00:00', 3, 'bing.com', 'https://th.bing.com/th?id=ABTE4103F810D7EB7016CB13E1C9BE39D65A7047D0732085F79F272BB8C1A51A382&w=608&h=200&c=2&rs=1&o=6&dpr=1.3&pid=SANGAM', 2),
(16, 'Nashorn5', 'Nashorn5', '2023-05-24 00:00:00', '2023-05-27 00:00:00', '2023-05-29 00:00:00', 1, 'bing.com', 'https://th.bing.com/th?id=ABTE4103F810D7EB7016CB13E1C9BE39D65A7047D0732085F79F272BB8C1A51A382&w=608&h=200&c=2&rs=1&o=6&dpr=1.3&pid=SANGAM', 2),
(17, 'Nashorn6', 'Nashorn6', '2023-05-25 00:00:00', '2023-05-28 00:00:00', '2023-05-29 00:00:00', 4, 'bing.com', 'https://th.bing.com/th?id=ABTE4103F810D7EB7016CB13E1C9BE39D65A7047D0732085F79F272BB8C1A51A382&w=608&h=200&c=2&rs=1&o=6&dpr=1.3&pid=SANGAM', 2),
(20, 'Ausflugtipp', 'Wandern im Schwarzwald am Schluchsee. Die Wanderung um den Schluchsee kann mit einer Bahn- oder Schifffahrt kombiniert werden.', '2023-05-29 00:00:00', '2023-06-30 00:00:00', '2023-05-29 00:00:00', 3, 'https://www.outdooractive.com/de/route/wanderung/s', 'https://img.oastatic.com/img2/27970230/834x417r/t.jpg', 3),
(21, 'Pferd', 'Frau Duc und das Pferd von Frau Duc  ', '2023-05-18 00:00:00', '2023-06-22 00:00:00', '2023-05-31 00:00:00', 2, 'https://ch.linkedin.com/in/beatrice-duc-47310925', 'https://media.licdn.com/dms/image/C4E03AQF1RB0RU0iuMg/profile-displayphoto-shrink_800_800/0/1642666846910?e=2147483647&v=beta&t=EWgevIIDcY3vDiSBgVKt8UCqeD4BqZtJiKc2mfbiiE8', 5),
(22, 'MAN', 'Der MAN Lion\'s City E', '2023-05-17 00:00:00', '2023-06-09 00:00:00', '2023-05-31 00:00:00', 4, 'https://www.man.eu/ch/de/bus/der-man-lion_s-city/e', 'https://www.man.eu/ntg_media/media/content_medien/img/bw_master_1/bus/stadtbusse/lion_s_city_e/Lions-City-E-stage_2400x1350_width_1600_height_900.jpg', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `Benutzername` varchar(20) NOT NULL,
  `Passwort` varchar(255) NOT NULL,
  `Anrede` char(4) DEFAULT NULL,
  `Vorname` varchar(50) NOT NULL,
  `Nachname` varchar(50) NOT NULL,
  `Strasse` varchar(50) DEFAULT NULL,
  `PLZ` varchar(15) DEFAULT NULL,
  `Ort` varchar(50) DEFAULT NULL,
  `Land` varchar(50) DEFAULT NULL,
  `EMail_Adresse` varchar(30) DEFAULT NULL,
  `Telefon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`uid`, `Benutzername`, `Passwort`, `Anrede`, `Vorname`, `Nachname`, `Strasse`, `PLZ`, `Ort`, `Land`, `EMail_Adresse`, `Telefon`) VALUES
(2, 'nashorn', '$2y$10$kqow9XGySD964Uz38NXeB.WIUg.5fgufmCHgXx77cjSIvJ6qE5IwG', 'Herr', 'Robin', 'Rütter', 'Rüchiweg 21', '4106', 'Therwil', 'Schweiz', 'robin.ruetter@bluewin.ch', 79),
(3, 'Loewe', '$2y$10$yP0jwN2VR4LzYpJRb0yH1Ov08OJZyvxQ.w/ieXZ7f1RVuDEK1wsbu', 'Frau', 'Catherine', 'Ruetter', 'Rüchiweg 21', '4106', 'Therwil', 'Schweiz', 'catherine.ruetter@bluewin.ch', 79),
(4, 'nashorn2', '$2y$10$DDkQZz87nplVh8CQhdn2rOiYzoqsrCKPXGbol3s3axn/md9pmqeNK', 'Frau', 'Robin', 'Rütter', 'Rüchiweg 21', '4106', 'Therwil', 'Schweiz', 'robin.ruetter@bluewin.ch', 79),
(5, 'DUCB', '$2y$10$rvCuRyO5J8myWhkREwSYueDejPOJsJOvGjYbmg5q7sKlUHrtFPf76', 'Frau', 'Beatrice', 'Duc', 'Allschwilerstrasse 99', '4055', 'Basel', 'Schweiz', 'beatrice.duc@edubs.ch', 78);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `kategories`
--
ALTER TABLE `kategories`
  ADD PRIMARY KEY (`kid`);

--
-- Indizes für die Tabelle `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`newsID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `kategories`
--
ALTER TABLE `kategories`
  MODIFY `kid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `news`
--
ALTER TABLE `news`
  MODIFY `newsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
