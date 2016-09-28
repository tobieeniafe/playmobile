-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2016 at 12:29 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `playmobile`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Afro', 'All Afro Music'),
(2, 'Jazz', 'For the lover of classical'),
(3, 'Soul / R  B', 'Get the cool of the night'),
(4, 'Pop / Rock', 'Party Mode Activated'),
(5, 'Country', 'Country Side Music'),
(6, 'Christian  Gospel', 'In love for God'),
(7, 'Reggae', 'Rasta man music'),
(8, 'Afro Pop', 'A little here, a little there'),
(9, 'Rap', 'Time to make your hip hop ');

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `category_id` int(11) NOT NULL,
  `url` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`id`, `title`, `category_id`, `url`) VALUES
(1, 'Wizkid ft wande coal she wyne it.mp3', 8, 'uploads/Wizkid ft wande coal she wyne it.mp3'),
(2, 'Asa   360.mp3', 1, 'uploads/Asa   360.mp3'),
(3, '11   Redemption Song.mp3', 7, 'uploads/11   Redemption Song.mp3'),
(4, 'Sonnie Badu   Open the flood gates.mp3', 6, 'uploads/Sonnie Badu   Open the flood gates.mp3'),
(5, '06  Rise Up.m4a', 1, 'uploads/06  Rise Up.m4a'),
(6, 'Beautiful Nubia  what a feelin.mp3', 1, 'uploads/Beautiful Nubia  what a feelin.mp3'),
(7, 'don williams till the rivers all run dry.mp3', 5, 'uploads/don williams till the rivers all run dry.mp3'),
(8, 'Brymo   Dem Dey Go.mp3', 2, 'uploads/Brymo   Dem Dey Go.mp3'),
(9, 'Brymo   Happy Memories.mp3', 2, 'uploads/Brymo   Happy Memories.mp3'),
(10, 'Black Eyed Peas Where is the love.mp3', 4, 'uploads/Black Eyed Peas Where is the love.mp3'),
(12, '2FaceIdibia Raindrops.mp3', 3, 'uploads/2FaceIdibia Raindrops.mp3'),
(13, 'Adekunle Gold Sade.mp3', 8, 'uploads/Adekunle Gold Sade.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('admin', 'admin'),
('login', 'login');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cat` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `playlists_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;