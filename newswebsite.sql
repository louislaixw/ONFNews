-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2022 at 06:54 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_news`
--

-- --------------------------------------------------------

--
-- Table structure for table `news_list`
--

CREATE TABLE `news_list` (
  `id` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `likes` int(255) NOT NULL DEFAULT 0,
  `dislikes` int(255) NOT NULL DEFAULT 0,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news_list`
--

INSERT INTO `news_list` (`id`, `url`, `likes`, `dislikes`, `comment`) VALUES
('aHR0cHM6Ly93d3cucm9sbGluZ3N0b25lLmNvbS90di1tb3ZpZXMvdHYtbW92aWUtbmV3cy93aWxsLXNtaXRoLXRyZXZvci1ub2FoLWRhaWx5LXNob3ctb3NjYXJzLXNsYXAtMTIzNDYzODA1OS8=', 'https://www.rollingstone.com/tv-movies/tv-movie-news/will-smith-trevor-noah-daily-show-oscars-slap-1234638059/', 0, 0, NULL),
('aHR0cHM6Ly93d3cucmV1dGVycy5jb20vdGVjaG5vbG9neS9jcnlwdG8tZXhjaGFuZ2UtYml0ZnJvbnQtc2h1dHMtZG93bi0yMDIyLTExLTI5Lw==', 'https://www.reuters.com/technology/crypto-exchange-bitfront-shuts-down-2022-11-29/', 0, 0, NULL),
('aHR0cHM6Ly93d3cuY25iYy5jb20vMjAyMi8xMS8yOC9zdG9jay1tYXJrZXQtZnV0dXJlcy1vcGVuLXRvLWNsb3NlLW5ld3MuaHRtbA==', 'https://www.cnbc.com/2022/11/28/stock-market-futures-open-to-close-news.html', 0, 0, '[{\"name\":\"abc\",\"comment\":\"fdg\"},{\"name\":\"abc\",\"comment\":\"fdg\"},{\"name\":\"abc\",\"comment\":\"ddsfdsff\"},{\"name\":\"abc\",\"comment\":\"hihi\"}]'),
('aHR0cHM6Ly93d3cuZm94c3BvcnRzLmNvbS9zdG9yaWVzL3NvY2Nlci93b3JsZC1jdXAtMjAyMi10b3AtcGxheXMtZWN1YWRvci1zZW5lZ2Fs', 'https://www.foxsports.com/stories/soccer/world-cup-2022-top-plays-ecuador-senegal', 0, 0, NULL),
('aHR0cHM6Ly93d3cuZm94c3BvcnRzLmNvbS9zdG9yaWVzL3NvY2Nlci9leHBlcnQtcGlja3MtZm9yLXVzbW50LXhpLXdoby13aWxsLWdyZWdnLWJlcmhhbHRlci1zdGFydC12cy1pcmFu', 'https://www.foxsports.com/stories/soccer/expert-picks-for-usmnt-xi-who-will-gregg-berhalter-start-vs-iran', 17, 11, '[{\"name\":\"abc\",\"comment\":\"fdfd\"},{\"name\":\"abc\",\"comment\":\"dsdfdfs\"}]'),
('aHR0cHM6Ly9hcnN0ZWNobmljYS5jb20vc2NpZW5jZS8yMDIyLzExL29yaW9uLWZsaWVzLWZhci1iZXlvbmQtdGhlLW1vb24tcmV0dXJucy1hbi1pbnN0YW50bHktaWNvbmljLXBob3RvLw==', 'https://arstechnica.com/science/2022/11/orion-flies-far-beyond-the-moon-returns-an-instantly-iconic-photo/', 1, 0, NULL),
('aHR0cHM6Ly9yaWNobW9uZC5jb20vbmV3cy9zdGF0ZS1hbmQtcmVnaW9uYWwvZ292dC1hbmQtcG9saXRpY3MvdG9uaWdodC1oZS1sb3N0LXRoYXQtYmF0dGxlLWNvbmdyZXNzbWFuLWRvbmFsZC1tY2VhY2hpbi1kaWVzLWF0LTYxL2FydGljbGVfYTQzNzE2YzUtMWM2Yi01M2RiLWE2MDEtMTdmYjI3YzZmOGZjLmh0bWw=', 'https://richmond.com/news/state-and-regional/govt-and-politics/tonight-he-lost-that-battle-congressman-donald-mceachin-dies-at-61/article_a43716c5-1c6b-53db-a601-17fb27c6f8fc.html', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(2, 'ben', 'ben@mail.com', '698d51a19d8a121ce581499d7b701668'),
(3, 'john', 'john@mail.com', '202cb962ac59075b964b07152d234b70'),
(4, 'abc', 'abc@mail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, 'abcd', 'abcd@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news_list`
--
ALTER TABLE `news_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
