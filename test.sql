-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2022 at 04:45 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `artist` varchar(50) NOT NULL,
  `album` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `yearReleased` varchar(50) NOT NULL,
  `path` varchar(150) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`id`, `name`, `artist`, `album`, `genre`, `yearReleased`, `path`, `created_at`) VALUES
(1, 'Never Gonna Give You Up', 'Rick Astley', 'Whenever You Need Somebody', 'Pop', '1987', 'MusicLibrary\\Never Gonnna Give You Up.mp3', '2022-04-21 21:34:28'),
(2, 'Sandstorm', 'Darude', 'Before The Storm', 'EDM', '2000', 'MusicLibrary\\Sandstorm', '2022-04-21 21:38:01'),
(3, 'All Star', 'Smash Mouth', 'Astro Lounge', 'Pop', '1999', 'MusicLibrary\\All Star', '2022-04-21 21:41:15'),
(4, 'Blue', 'Eiffel 65', 'Blue (Da Ba Dee)', 'Pop', '1998', 'MusicLibrary\\Blue', '2022-04-21 21:42:41'),
(5, 'Carmelldansen', 'Caramell', 'Supergot', 'Pop', '2001', 'MusicLibrary\\Carmelldansen', '2022-04-21 21:44:54'),
(6, 'Nuthin', 'Lacrae', 'Anomaly', 'Rap', '2014', 'MusicLibrary\\Nuthin', '2022-04-21 21:54:32'),
(7, 'I\'ll Find You', 'Lacrae', 'All Things Work Together', 'Rap', '2017', 'MusicLibrary\\I\'ll Find You.mp3', '2022-04-21 21:54:32'),
(8, 'This is Life', 'KB', 'HisGloryAlone', 'Hip Hop', '2020', 'MusicLibrary\\This is Life.mp3', '2022-04-21 21:54:32'),
(9, 'Yes Song', 'KB', 'HisGloryAlone', 'Hip Hop', '2020', 'MusicLibrary\\Yes Song.mp3', '2022-04-21 21:54:32'),
(10, 'Diamonds', 'GAMVI', 'Diamonds', 'Dance', '2017', 'MusicLibrary\\Diamonds.mp3', '2022-04-21 21:54:32'),
(11, 'Make Believe', 'Kero Kero Bonito', 'Time n Place', 'Alternative', '2018', 'MusicLibrary\\Make Belive.mp3', '2022-04-21 21:54:32'),
(12, 'Cat', 'C418', 'Minecraft, Volume Alpha', 'EDM', '2011', 'MusicLibrary\\Cat.mp3', '2022-04-21 21:54:32'),
(13, 'Price of a Mile', 'Sabaton', 'Art of War', 'Rock', '2008', 'MusicLibrary\\Price of a Mile.mp3', '2022-04-21 21:54:32'),
(14, 'Glitter & Gold', 'Barns Courtney', 'The Attractions of Youth', 'Alternative', '2012', 'MusicLibrary\\Glitter & Gold.mp3', '2022-04-21 21:54:32'),
(15, 'Dancing in the Moon Light', 'King Harvest', 'Dancing on the Moon Light', 'Rock', '1972', 'MusicLibrary\\Dancing on the Moon Light.mp3', '2022-04-21 21:54:32'),
(16, 'Afraid to Shoot Strangers', 'Iron Maiden', 'Fear of the Dark', 'Rock', '1992', 'MusicLibrary\\Afraid to Shoot Strangers.mp3', '2022-04-21 21:54:32'),
(17, 'Just Like You', 'NF', 'CLOUDS (THE MIXTAPE)', 'Rap', '2021', 'MusicLibrary\\Just Like You.mp3', '2022-04-21 21:54:32'),
(18, 'Waltz in E Minor, Op. Posth., B. 56', 'Frederic Chopin', 'Arthur Rubinstien: The Chopin Collection', 'Classical', '2018', 'MusicLibrary\\Waltz in E Minor, Op. Posth., B. 56.mp3', '2022-04-21 21:54:32'),
(19, 'Na Na Na (Na Na Na Na Na Na Na Na Na)', 'My Chemical Romance', 'Danger Days: The True Lives of the Fabulos Killjoy', 'Rock', '2010', 'MusicLibrary\\Na Na Na (Na Na Na Na Na Na Na Na Na).mp3', '2022-04-21 21:54:32'),
(20, 'Hallowed Be Thy Name', 'Iron Maiden', 'The Number of the Beast', 'Rock', '1982', 'MusicLibrary\\Hallowed Be Thy Name.mp3', '2022-04-21 21:54:32');

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `Playlist_Id` int(11) NOT NULL,
  `User` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `Playlist_Name` varchar(30) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`Playlist_Id`, `User`, `Playlist_Name`) VALUES
(1, 'username', 'Vibes'),
(2, 'b', 'Fill'),
(3, 'username', 'Uhh'),
(4, 'filler', 'Dab');

-- --------------------------------------------------------

--
-- Table structure for table `playlist_contents`
--

CREATE TABLE `playlist_contents` (
  `Playlist_Id` int(11) NOT NULL,
  `Song_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playlist_contents`
--

INSERT INTO `playlist_contents` (`Playlist_Id`, `Song_Id`) VALUES
(1, 9),
(1, 1),
(2, 8),
(2, 10),
(3, 1),
(3, 2),
(3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `last_song` varchar(50) DEFAULT NULL,
  `last_position_lat` float NOT NULL,
  `last_position_long` float NOT NULL,
  `last_playlist` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `last_song`, `last_position_lat`, `last_position_long`, `last_playlist`) VALUES
(2, 'b', '$2y$10$hriax3Yyovp.Jy3mFhUU9uhMFD747jBiWTCdgQCbOG40iTjwGliwq', '2022-04-17 23:41:34', NULL, 0, 0, NULL),
(3, 'username', '$2y$10$QbXCJ2kDkOqLtsrFf9K37uFPhn7T07QtESu8hn5iV78zgNi0tcBoW', '2022-04-18 19:20:28', NULL, 0, 0, NULL),
(4, 'filler', '$2y$10$QbXCJ2kDkOqLtsrFf9K37uFPhn7T07QtESu8hn5iV78zgNi0tcBoW', '2022-04-19 19:55:10', NULL, 0, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `path` (`path`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`Playlist_Id`),
  ADD KEY `Playlist Id` (`Playlist_Id`),
  ADD KEY `User` (`User`);

--
-- Indexes for table `playlist_contents`
--
ALTER TABLE `playlist_contents`
  ADD KEY `Playlist Id` (`Playlist_Id`),
  ADD KEY `Song Id` (`Song_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `Last Song` (`last_song`),
  ADD KEY `Last Playlist` (`last_playlist`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `Playlist_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `User Id` FOREIGN KEY (`User`) REFERENCES `users` (`username`);

--
-- Constraints for table `playlist_contents`
--
ALTER TABLE `playlist_contents`
  ADD CONSTRAINT `Playlist Id` FOREIGN KEY (`Playlist_Id`) REFERENCES `playlist` (`Playlist_Id`),
  ADD CONSTRAINT `Song Id` FOREIGN KEY (`Song_Id`) REFERENCES `music` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `Last Playlist` FOREIGN KEY (`last_playlist`) REFERENCES `playlist` (`Playlist_Id`),
  ADD CONSTRAINT `Last Song` FOREIGN KEY (`last_song`) REFERENCES `music` (`name`);
COMMIT;
