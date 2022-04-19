-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2022 at 05:30 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `artist` varchar(50) NOT NULL,
  `album` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `yearReleased` varchar(50) NOT NULL,
  `path` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`id`, `name`, `artist`, `album`, `genre`, `yearReleased`, `path`, `created_at`) VALUES
(1, 'All Star', 'Smash Mouth', 'Astro Lounge', 'Pop', '1999', '', '2022-04-17 23:54:22'),
(2, 'Nuthin', 'Lecrae ', 'Anomaly', 'rap', '2014', 'e', '2022-04-18 00:08:21'),
(8, 'This Is Life ', 'KB ', 'HisGloryAlone', 'hiphop', '2020', 'f', '2022-04-18 00:10:40'),
(9, 'Sandstorm', 'Darude', 'Before the Storm', 'EDM', '2000', 'g', '2022-04-18 00:10:40'),
(10, 'a', 'a', 'a', 'a', 'a', 'a', '2022-04-18 21:51:12');

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `Playlist Id` int(11) NOT NULL,
  `User` varchar(50) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`Playlist Id`, `User`) VALUES
(1, 'username');

-- --------------------------------------------------------

--
-- Table structure for table `playlist contents`
--

CREATE TABLE `playlist contents` (
  `Playlist Id` int(11) NOT NULL,
  `Song Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlist contents`
--

INSERT INTO `playlist contents` (`Playlist Id`, `Song Id`) VALUES
(1, 9),
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(2, 'b', '$2y$10$hriax3Yyovp.Jy3mFhUU9uhMFD747jBiWTCdgQCbOG40iTjwGliwq', '2022-04-17 23:41:34'),
(3, 'username', '$2y$10$QbXCJ2kDkOqLtsrFf9K37uFPhn7T07QtESu8hn5iV78zgNi0tcBoW', '2022-04-18 19:20:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `artist` (`artist`),
  ADD UNIQUE KEY `album` (`album`),
  ADD UNIQUE KEY `genre` (`genre`),
  ADD UNIQUE KEY `yearReleased` (`yearReleased`),
  ADD UNIQUE KEY `path` (`path`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`Playlist Id`),
  ADD KEY `Playlist Id` (`Playlist Id`),
  ADD KEY `User` (`User`);

--
-- Indexes for table `playlist contents`
--
ALTER TABLE `playlist contents`
  ADD KEY `Playlist Id` (`Playlist Id`),
  ADD KEY `Song Id` (`Song Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `User Id` FOREIGN KEY (`User`) REFERENCES `users` (`username`);

--
-- Constraints for table `playlist contents`
--
ALTER TABLE `playlist contents`
  ADD CONSTRAINT `Playlist Id` FOREIGN KEY (`Playlist Id`) REFERENCES `playlist` (`Playlist Id`),
  ADD CONSTRAINT `Song Id` FOREIGN KEY (`Song Id`) REFERENCES `music` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2022 at 04:14 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `artist` varchar(50) NOT NULL,
  `album` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `yearReleased` varchar(50) NOT NULL,
  `path` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`id`, `name`, `artist`, `album`, `genre`, `yearReleased`, `path`, `created_at`) VALUES
(1, 'All Star', 'Smash Mouth', 'Astro Lounge', 'Pop', '1999', '', '2022-04-17 23:54:22'),
(2, 'Nuthin', 'Lecrae ', 'Anomaly', 'rap', '2014', 'e', '2022-04-18 00:08:21'),
(8, 'This Is Life ', 'KB ', 'HisGloryAlone', 'hiphop', '2020', 'f', '2022-04-18 00:10:40'),
(9, 'Sandstorm', 'Darude', 'Before the Storm', 'EDM', '2000', 'g', '2022-04-18 00:10:40'),
(10, 'a', 'a', 'a', 'a', 'a', 'a', '2022-04-18 21:51:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(2, 'b', '$2y$10$hriax3Yyovp.Jy3mFhUU9uhMFD747jBiWTCdgQCbOG40iTjwGliwq', '2022-04-17 23:41:34'),
(3, 'username', '$2y$10$QbXCJ2kDkOqLtsrFf9K37uFPhn7T07QtESu8hn5iV78zgNi0tcBoW', '2022-04-18 19:20:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `artist` (`artist`),
  ADD UNIQUE KEY `album` (`album`),
  ADD UNIQUE KEY `genre` (`genre`),
  ADD UNIQUE KEY `yearReleased` (`yearReleased`),
  ADD UNIQUE KEY `path` (`path`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
