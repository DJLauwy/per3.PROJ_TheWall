-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 31 mrt 2020 om 20:08
-- Serverversie: 10.4.11-MariaDB
-- PHP-versie: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thewall`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `fotos`
--

CREATE TABLE `fotos` (
  `id` int(11) NOT NULL,
  `titel` varchar(50) NOT NULL,
  `omschrijving` varchar(500) NOT NULL,
  `bestand` varchar(500) NOT NULL,
  `datum` datetime(6) NOT NULL,
  `gebruiker_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `fotos`
--

INSERT INTO `fotos` (`id`, `titel`, `omschrijving`, `bestand`, `datum`, `gebruiker_id`) VALUES
(1, 'me', 'hello it\'s me! :)', '28957F37-3413-4EE4-A0B0-1E5F5FACFF22.jpg', '2020-03-23 13:13:58.000000', 1),
(24, 'shoes', 'my new shoes. what u think?', 'IMG_0386.JPG', '2020-03-23 14:01:45.000000', 1),
(25, 'test', '123', 'nieuws-header-dit-is-een-test.png', '2020-03-23 16:20:01.000000', 6),
(26, 'time', 'time set test', 'download.jpg', '2020-03-30 17:02:15.000000', 6),
(27, 'me again', 'I use this photo a lot for my DJ Lauwy socials. Give it a star if you like this photo!', 'IMG_1925.JPG', '2020-03-30 17:04:24.000000', 1),
(29, 'modelletje wel', 'of nee toch niet', 'TQEP6616.JPG', '2020-03-31 17:44:05.000000', 1),
(30, 'matties', 'op MA jwz', 'IMG_1405.JPG', '2020-03-31 17:45:06.000000', 1),
(34, 'mini me', 'hier was ik echt 4 ofzo', 'QLAA2334.JPG', '2020-03-31 17:51:12.000000', 1),
(35, 'test2', 'ik ben de test-meneer', '783px-Test-Logo.svg.png', '2020-03-31 19:21:29.000000', 6);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE `gebruikers` (
  `id` int(11) NOT NULL,
  `rol` int(1) NOT NULL,
  `voornaam` varchar(50) NOT NULL,
  `achternaam` varchar(100) NOT NULL,
  `wachtwoord` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`id`, `rol`, `voornaam`, `achternaam`, `wachtwoord`, `email`) VALUES
(1, 1, 'Lauwy', 'de Hoop', '$2y$10$AaKEWY4NdV9L3xwOtFn2kObGrbpj2uf1x3oeFkolMNjDszaG3PlYC', 'laudehoop@hotmail.com'),
(6, 0, 'test', 'gebruiker', '$2y$10$rhBLHgDC.Q2VpmDj.Hstb.s3GQ1.vrM8uni113QFY8plJooVLO0I6', 'spamjongen@hotmail.com');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `likes`
--

CREATE TABLE `likes` (
  `gebruiker_id` int(11) NOT NULL,
  `foto_id` int(11) NOT NULL,
  `datum` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`gebruiker_id`),
  ADD UNIQUE KEY `foto_id` (`foto_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `likes`
--
ALTER TABLE `likes`
  MODIFY `gebruiker_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
