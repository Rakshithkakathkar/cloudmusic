-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2018 at 10:24 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `albs` ()  NO SQL
SELECT DISTINCT(A.album_name),A.genre,A.year from songs S,album A where A.album_name=S.album_name$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `username` varchar(50) DEFAULT NULL,
  `album_name` varchar(50) NOT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `year` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`username`, `album_name`, `genre`, `year`) VALUES
('shamala', 'hello', 'pop', 2018);

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `username` varchar(50) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`username`, `email`, `password`) VALUES
('shamala', ' shy@gmail.com', '39c0b138e665c85c1510db5b320179f5');

-- --------------------------------------------------------

--
-- Table structure for table `artist_det`
--

CREATE TABLE `artist_det` (
  `username` varchar(50) NOT NULL,
  `age` int(2) DEFAULT NULL,
  `phone` int(10) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artist_det`
--

INSERT INTO `artist_det` (`username`, `age`, `phone`, `address`) VALUES
('shamala', 19, 2147483647, 'bangalore');

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `username` varchar(50) DEFAULT NULL,
  `award_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`username`, `award_name`) VALUES
('shamala', 'emmys');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `m_id` int(10) NOT NULL,
  `user_name` varchar(80) DEFAULT NULL,
  `user_email` varchar(80) DEFAULT NULL,
  `artist_name` varchar(80) DEFAULT NULL,
  `msg` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`m_id`, `user_name`, `user_email`, `artist_name`, `msg`) VALUES
(1, 'simran', 'simran@gmail.com', 'shamala', 'hey supp');

--
-- Triggers `message`
--
DELIMITER $$
CREATE TRIGGER `msg` BEFORE INSERT ON `message` FOR EACH ROW Insert into msg_time(id,msg_date) VALUES('',CURRENT_DATE)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `msg_time`
--

CREATE TABLE `msg_time` (
  `id` int(11) NOT NULL,
  `msg_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msg_time`
--

INSERT INTO `msg_time` (`id`, `msg_date`) VALUES
(1, '2018-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `song_title` varchar(50) NOT NULL,
  `album_name` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`song_title`, `album_name`, `name`) VALUES
('abc', 'hello', '5bfe534a676de2.10039766.mp3'),
('xyz', 'hello', '5bfe5aa6eb7583.20235436.mp3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`album_name`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `artist_det`
--
ALTER TABLE `artist_det`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD KEY `username` (`username`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `artist_name` (`artist_name`);

--
-- Indexes for table `msg_time`
--
ALTER TABLE `msg_time`
  ADD KEY `id` (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`song_title`),
  ADD KEY `album_name` (`album_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `m_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `msg_time`
--
ALTER TABLE `msg_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`username`) REFERENCES `artist` (`username`) ON DELETE CASCADE;

--
-- Constraints for table `artist_det`
--
ALTER TABLE `artist_det`
  ADD CONSTRAINT `artist_det_ibfk_1` FOREIGN KEY (`username`) REFERENCES `artist` (`username`) ON DELETE CASCADE;

--
-- Constraints for table `awards`
--
ALTER TABLE `awards`
  ADD CONSTRAINT `awards_ibfk_1` FOREIGN KEY (`username`) REFERENCES `artist` (`username`) ON DELETE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`artist_name`) REFERENCES `artist` (`username`);

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`album_name`) REFERENCES `album` (`album_name`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
