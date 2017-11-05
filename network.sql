-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Ned 05. lis 2017, 19:33
-- Verze serveru: 10.1.21-MariaDB
-- Verze PHP: 5.6.30

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
-- Struktura tabulky `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `gid` text NOT NULL,
  `bio` text,
  `img` text,
  `members` text,
  `invites` text,
  `admins` text,
  `privacy` int(11) DEFAULT '0',
  `blocked` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vypisuji data pro tabulku `groups`
--

INSERT INTO `groups` (`id`, `gid`, `bio`, `img`, `members`, `invites`, `admins`, `privacy`, `blocked`) VALUES
(1, 'Autists', 'Autists unite!', 'uploads/img_grp/Autists.jpg', '8,9', NULL, '8', 0, NULL),
(7, 'Not autists', 'We are not autistic!', 'uploads/img_grp/Not autists.jpg', '5,7', NULL, '5', 0, NULL),
(11, 'Cepikova skupina', 'Moje skupina', 'uploads/img_grp/Cepikova skupina.jpg', '9', NULL, '9', 0, NULL);

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
  `f_sent` text,
  `g_list` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `uid`, `first`, `last`, `img`, `bio`, `pwd`, `em`, `f_list`, `f_req`, `f_sent`, `g_list`) VALUES
(5, 'admin', 'MatyÃ¡Å¡', 'TeplÃ½', 'uploads/img_usr/admin.jpg', ' Ahoj,<br><br>About me uÅ¾ funguje :)', '$2y$10$iJXe54oaqzrLLCDe1OInNexq2Q2niEsZSGFS/SRSOtMEHTc.SNG4i', 'updater19@gmail.com', '8,7', '9,10', NULL, '7'),
(7, 'Jinambo', 'JiÅ™Ã­', 'Å rytr', 'uploads/img_usr/Jinambo.png', NULL, '$2y$10$hOONMx0GXhtGi5sWDZHsdOOycprWJ9oYeQpoIxGKsP3HF7J1YGlGW', 'jinambo@seznam.cz', '5', NULL, NULL, '7'),
(8, 'Wolfinek', 'TomÃ¡Å¡', 'PÅ¯ltr', 'uploads/img_usr/Wolfinek.jpg', NULL, '$2y$10$hyoH1EAKNqekFUz2XAJS0.Oo9gHEC45Gysw4hPhOsBZsfWiXUBtZm', 'wolfinek@gmail.com', '5', NULL, NULL, '1'),
(9, 'Cepik', 'JiÅ™Ã­', 'ÄŒepela', 'uploads/img_usr/Cepik.jpg', NULL, '$2y$10$/XTUxTqsLBUb378MzOEQquQmWz7E4MUBcfzgUEUF7q9wPB.o.HtiK', 'cepik@seznam.cz', '', NULL, '5', '1,11'),
(10, 'user', 'John', 'Doe', 'uploads/img_usr/user.png', NULL, '$2y$10$nm5HtSQHqIusWhvczpVLG.KbrZJpr2buq8kpN/tOvgtgojrIngxVK', 'user123@gmail.com', NULL, NULL, '5', NULL);

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
