-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 30 Maj 2018, 08:54
-- Wersja serwera: 10.1.32-MariaDB
-- Wersja PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `geek`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'wakacje'),
(2, 'kulinarne'),
(3, 'hobby'),
(4, 'sport');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL COMMENT 'Klucz',
  `name` varchar(250) COLLATE utf8_polish_ci NOT NULL,
  `link` varchar(500) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `photos`
--

INSERT INTO `photos` (`id`, `name`, `link`) VALUES
(1, 'ja na wakacjach', '#'),
(2, 'piwko', '#'),
(3, 'jajko', '#');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL COMMENT 'Klucz',
  `title` varchar(250) COLLATE utf8_polish_ci NOT NULL,
  `description` text COLLATE utf8_polish_ci NOT NULL,
  `photo_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `hidden` varchar(1) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `active` varchar(1) COLLATE utf8_polish_ci NOT NULL DEFAULT '1',
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `photo_id`, `category_id`, `hidden`, `active`, `created`) VALUES
(1, 'dupa', 'dupa', 0, 1, '0', '1', '2017-09-14 08:36:13'),
(2, 'WÅ‚ochy', 'wino i makaron', 1, 1, '0', '1', '2017-10-11 05:11:13'),
(3, 'Kurs gotowania', 'jajko', 2, 2, '0', '1', '2017-10-01 18:17:29'),
(4, 'Makaron z curry', 'Makaron\r\ncurry\r\nwoÅ‚owina\r\ndupa', 3, 2, '0', '1', '2017-10-11 03:30:15'),
(5, 'news 1', 'news 1', 4, 0, '0', '1', '0000-00-00 00:00:00'),
(6, 'news 2', 'news 2', 5, 0, '0', '1', '0000-00-00 00:00:00'),
(7, 'news 3', 'news 3', 6, 0, '0', '1', '0000-00-00 00:00:00'),
(8, 'news 4', 'news 4', 7, 0, '0', '1', '0000-00-00 00:00:00'),
(9, 'news 5', 'news 5', 8, 0, '0', '1', '0000-00-00 00:00:00'),
(10, 'news 6', 'news 6', 9, 0, '0', '1', '0000-00-00 00:00:00'),
(11, 'news 7', 'news 7', 10, 0, '0', '1', '0000-00-00 00:00:00'),
(12, 'news 8', 'news 8', 11, 0, '0', '1', '0000-00-00 00:00:00'),
(13, 'news 9', 'news 9', 12, 0, '0', '1', '0000-00-00 00:00:00'),
(14, 'news 10', 'news 10', 13, 0, '0', '1', '0000-00-00 00:00:00'),
(15, 'news 11', 'news 11', 14, 0, '0', '1', '0000-00-00 00:00:00'),
(16, 'news 12', 'news 12', 15, 0, '0', '1', '0000-00-00 00:00:00'),
(17, 'news 13', 'news 13', 16, 0, '0', '1', '0000-00-00 00:00:00'),
(18, 'news 14', 'news 14', 17, 0, '0', '1', '0000-00-00 00:00:00'),
(19, 'news 15', 'news 15', 18, 0, '0', '1', '0000-00-00 00:00:00'),
(20, 'news 16', 'news 16', 19, 0, '0', '1', '0000-00-00 00:00:00'),
(21, 'news 17', 'news 17', 20, 0, '0', '1', '0000-00-00 00:00:00'),
(22, 'news 18', 'news 18', 21, 0, '0', '1', '0000-00-00 00:00:00'),
(23, 'news 19', 'news 19', 22, 0, '0', '1', '0000-00-00 00:00:00'),
(24, 'news 20', 'news 20', 23, 0, '0', '1', '0000-00-00 00:00:00'),
(25, 'To jest mÃ³j tytuÅ‚', 'JestÄ™ zajebisty', 0, 1, '0', '1', '0000-00-00 00:00:00'),
(26, '', '', 0, 0, '0', '1', '0000-00-00 00:00:00'),
(27, '', '', 0, 0, '0', '1', '0000-00-00 00:00:00'),
(28, 'Nie lubie piÅ‚ki', 'Noga jest do dupy', 0, 4, '0', '1', '2017-11-11 14:26:59'),
(29, '', '', 0, 0, '0', '1', '2017-11-11 14:36:39');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `post_tags`
--

CREATE TABLE `post_tags` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `post_tags`
--

INSERT INTO `post_tags` (`id`, `post_id`, `tag_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 2, 1),
(5, 1, 3),
(6, 3, 1),
(7, 3, 2),
(8, 3, 9),
(9, 1, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_polish_ci NOT NULL,
  `value` varchar(250) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`) VALUES
(1, 'Jakiś', 'Random'),
(2, 'Drugi', 'Random');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_polish_ci NOT NULL,
  `link` varchar(500) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `tags`
--

INSERT INTO `tags` (`id`, `name`, `link`) VALUES
(1, 'GF', ''),
(2, 'rozrywka', ''),
(3, 'kuchnia', ''),
(4, 'gotowanie', ''),
(5, 'wycieczka', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(250) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_polish_ci NOT NULL,
  `created` datetime NOT NULL,
  `ban` varchar(1) COLLATE utf8_polish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `created`, `ban`) VALUES
(1, 'Wiktor0216', 'lubie123', '2017-11-12 12:59:48', '0');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Klucz', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Klucz', AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT dla tabeli `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
