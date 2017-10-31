-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Úte 31. říj 2017, 19:39
-- Verze serveru: 10.1.19-MariaDB
-- Verze PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `network`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uid` text NOT NULL,
  `first` text NOT NULL,
  `last` text NOT NULL,
  `img` text,
  `bio` text,
  `pwd` text NOT NULL,
  `em` text NOT NULL,
  `f_list` text,
  `f_req` text,
  `f_sent` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `uid`, `first`, `last`, `img`, `bio`, `pwd`, `em`, `f_list`, `f_req`, `f_sent`) VALUES
(5, 'admin', 'MatyÃ¡Å¡', 'TeplÃ½', NULL, NULL, '$2y$10$iJXe54oaqzrLLCDe1OInNexq2Q2niEsZSGFS/SRSOtMEHTc.SNG4i', 'updater19@gmail.com', NULL, NULL, NULL),
(7, 'Jinambo', 'JiÅ™Ã­', 'Å rytr', NULL, NULL, '$2y$10$hOONMx0GXhtGi5sWDZHsdOOycprWJ9oYeQpoIxGKsP3HF7J1YGlGW', 'jinambo@seznam.cz', NULL, NULL, NULL),
(8, 'Wolfinek', 'TomÃ¡Å¡', 'PÅ¯ltr', NULL, NULL, '$2y$10$hyoH1EAKNqekFUz2XAJS0.Oo9gHEC45Gysw4hPhOsBZsfWiXUBtZm', 'wolfinek@gmail.com', NULL, NULL, NULL);

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
