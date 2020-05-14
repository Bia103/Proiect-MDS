-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 10, 2020 at 11:42 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proiectmds`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uname` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `umail` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uname`, `username`, `password`, `umail`) VALUES
('Larisa Eyre', 'Lary', '123', 'lary@yahoo.com'),
('Ana-Maria Yokai', 'Ana', '000', 'maria_ana@yahoo.com'),
('Bianca Evergreen', 'Bia', '555', 'evergreen1347@nyu.edu'),
('Oana Passenger', 'Oana', '111', 'at_puppy@fmi.ro');

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `sid` int(45) NOT NULL,
  `stitle` varchar(45) NOT NULL,
  `aname` varchar(45) NOT NULL,
  `albid` int(45) NOT NULL,
  `year` year(4) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `count` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`sid`, `stitle`, `aname`, `albid`, `year`, `link`, `count`) VALUES
(1, 'Sweet but Psycho', 'Ava Max', 1, 2018, 'Muzica/Ava Max - Sweet but Psycho.mp3', 11),
(2, 'bad guy', 'Billie Eilish', 2, 2019, 'Muzica/bad guy (Audio) - Billie Eilish.mp3', 0),
(3, 'Black Swan', 'BTS', 3, 2020, 'Muzica/Black Swan - BTS.mp3', 10),
(4, 'Kill This Love', 'BLACKPINK', 4, 2019, 'Muzica/BLACKPINK - Kill This Love.mp3', 5),
(5, 'Blood Sweat & Tears', 'BTS', 5, 2016, 'Muzica/BTS - Blood Sweat & Tears.mp3', 20),
(6, 'Not Today', 'BTS', 6, 2017, 'Muzica/BTS - Not Today.mp3', 0),
(7, 'Obsession', 'EXO', 7, 2019, 'Muzica/EXO Obsession.mp3', 0),
(8, 'Natural', 'Imagine Dragons', 8, 2018, 'Muzica/Imagine Dragons - Natural.mp3', 9),
(9, 'Intro: Boy Meets Evil', 'BTS', 5, 2016, 'Muzica/Intro Boy Meets Evil - j-hope & Jungkook (BTS).mp3', 0),
(10, 'Lie', 'BTS', 5, 2016, 'Muzica/Lie - Jimin (BTS).mp3', 11) ,
(11, 'Love Shot', 'EXO', 9, 2018, 'Muzica/Love Shot - EXO.mp3', 21) ,
(12, 'ON', 'BTS', 3, 2020, 'Muzica/ON - BTS.mp3', 30),
(13, 'River', 'Bishop Briggs', 10, 2016, 'Muzica/River - Bishop Briggs.mp3', 4),
(14, 'Fake Love', 'BTS', 11, 2018, 'Muzica/BTS - FAKE LOVE.mp3', 0),
(15, 'IDOL', 'BTS', 11, 2018, 'Muzica/BTS - IDOL Feat. Nicki Minaj.mp3', 17),
(16, 'Sanctify', 'Years & Years', 12, 2018, 'Muzica/Sanctify - Years & Years.mp3', 0),
(17, 'Tear You Apart', 'She Wants Revenge', 13, 2006, 'Muzica/She Wants Revenge - Tear You Apart.mp3', 0),
(18, 'Lunisolar', 'Shaun', 14, 2019, 'Muzica/Shaun - Lunisolar.mp3', 0),
(19, 'Everything Black', 'Unlike Pluto', 15, 2017, 'Muzica/Unlike Pluto - Everything Black.mp3', 7),
(20, 'Cause Disarray', 'Galneryus', 16, 2008, 'Muzica/Cause Disarray - Galneryus.mp3', 5),
(21, 'Alsatia', 'Galneryus', 16, 2008, 'Muzica/Cause Disarray - Galneryus.mp3', 3);

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `albid` int(45) NOT NULL,
  `albtitle` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`albid`, `albtitle`) VALUES
(1, 'Sweet but Psycho'),
(2, 'bad guy'),
(3, 'Map of the Soul: 7'),
(4, 'Kill This Love'),
(5, 'Wings'),
(6, 'Not Today'),
(7, 'Obsession'),
(8, 'Natural'),
(9, 'Love Shot'),
(10, 'River'),
(11, 'Love Yourself'),
(12, 'Sanctify'),
(13, 'Tear You Apart'),
(14, 'Lunisolar'),
(15, 'Everything Black'),
(16, 'Rin ~Daughters of Mnemosyne~ OST');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `aid` int(45) NOT NULL,
  `aname` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`aid`, `aname`) VALUES
(1, 'Ava Max'),
(2, 'Billie Eilish'),
(3, 'BTS'),
(4, 'BLACKPINK'),
(5, 'EXO'),
(6, 'Imagine Dragons'),
(7, 'Bishop Briggs'),
(8, 'Years & Years'),
(9, 'She Wants Revenge'),
(10, 'Shaun'),
(11, 'Unlike Pluto'),
(12, 'Galneryus');

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `lid` int(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `ltitle` varchar(45) NOT NULL,
  `lissuedate` date NOT NULL,
  `ispublic` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`lid`, `username`, `ltitle`, `lissuedate`, `ispublic`) VALUES
(1, 'Lary', 'My Songs', '2020-05-11', 1),
(2, 'Oana', 'Favorites', '2020-05-12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `listcontains`
--

CREATE TABLE `listcontains` (
  `sid` int(45) NOT NULL,
  `lid` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listcontains`
--

INSERT INTO `listcontains` (`sid`, `lid`) VALUES
(3, 1),
(5, 1),
(6, 1),
(7, 1),
(12, 1),
(1, 2),
(2, 2),
(13, 2),
(8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `username1` varchar(45) NOT NULL,
  `username2` varchar(45) NOT NULL,
  `followtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`username1`, `username2`, `followtime`) VALUES
('Lary', 'Oana', '2020-05-11 22:31:38'),
('Bia', 'Ana', '2020-05-12 05:49:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
  
--
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `artist_fk` (`aname`),
  ADD KEY `album_fkn` (`albid`);
  
--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`albid`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`aname`);
  
--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`lid`),
  ADD KEY `user_fk2` (`username`);

--
-- Indexes for table `listcontains`
--
ALTER TABLE `listcontains`
  ADD PRIMARY KEY (`lid`,`sid`),
  ADD KEY `song_fk2` (`sid`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`username1`,`username2`),
  ADD KEY `user_fk5` (`username2`);  
  
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `lid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
-- 

--
-- Constraints for table `song`
--
ALTER TABLE `song`
  ADD CONSTRAINT `album_fkn` FOREIGN KEY (`albid`) REFERENCES `album` (`albid`),
  ADD CONSTRAINT `artist_fk` FOREIGN KEY (`aname`) REFERENCES `artist` (`aname`);
COMMIT;

--
-- Constraints for table `list`
--
ALTER TABLE `list`
  ADD CONSTRAINT `user_fk2` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `listcontains`
--
ALTER TABLE `listcontains`
  ADD CONSTRAINT `list_fk2` FOREIGN KEY (`lid`) REFERENCES `list` (`lid`),
  ADD CONSTRAINT `song_fk2` FOREIGN KEY (`sid`) REFERENCES `song` (`sid`);
  
--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `user_fk4` FOREIGN KEY (`username1`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `user_fk5` FOREIGN KEY (`username2`) REFERENCES `user` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;