-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 14, 2020 at 07:01 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
(16, 'Rin ~Daughters of Mnemosyne~ OST'),
(17, 'League of Legends OST'),
(18, 'Enjoy The Silence'),
(19, 'Fallen'),
(20, 'Origin'),
(21, 'Divisions'),
(22, 'Life in Cartoon Motion'),
(23, 'Waiting On the Sky to Change'),
(24, 'Puddle Of Mudd'),
(25, 'Perfect Words'),
(26, 'Dreaming Out Loud'),
(27, 'All The Little Lights');

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
(7, 'Bishop Briggs'),
(4, 'BLACKPINK'),
(19, 'Blurry'),
(3, 'BTS'),
(18, 'Downplay'),
(15, 'Evanescence'),
(5, 'EXO'),
(12, 'Galneryus'),
(6, 'Imagine Dragons'),
(14, 'Lacuna Coil'),
(13, 'League of Legends'),
(17, 'MIKA'),
(21, 'OneRepublic'),
(22, 'Passenger'),
(10, 'Shaun'),
(9, 'She Wants Revenge'),
(16, 'Starset'),
(20, 'Steve Cash'),
(11, 'Unlike Pluto'),
(8, 'Years & Years');

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
('Bia', 'Ana', '2020-05-12 05:49:35'),
('Lary', 'Oana', '2020-05-11 22:31:38');

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `lid` int(10) NOT NULL,
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
(1, 2),
(2, 2),
(3, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 2),
(12, 1),
(13, 2),
(27, 1);

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
(1, 'Sweet but Psycho', 'Ava Max', 1, 2018, '../Muzica/Ava Max - Sweet but Psycho.mp3', 11),
(2, 'bad guy', 'Billie Eilish', 2, 2019, '../Muzica/bad guy (Audio) - Billie Eilish.mp3', 0),
(3, 'Black Swan', 'BTS', 3, 2020, '../Muzica/Black Swan - BTS.mp3', 10),
(4, 'Kill This Love', 'BLACKPINK', 4, 2019, '../Muzica/BLACKPINK - Kill This Love.mp3', 5),
(5, 'Blood Sweat & Tears', 'BTS', 5, 2016, '../Muzica/BTS - Blood Sweat & Tears.mp3', 20),
(6, 'Not Today', 'BTS', 6, 2017, '../Muzica/BTS - Not Today.mp3', 0),
(7, 'Obsession', 'EXO', 7, 2019, '../Muzica/EXO Obsession.mp3', 0),
(8, 'Natural', 'Imagine Dragons', 8, 2018, '../Muzica/Imagine Dragons - Natural.mp3', 9),
(9, 'Intro: Boy Meets Evil', 'BTS', 5, 2016, '../Muzica/Intro Boy Meets Evil - j-hope & Jungkook (BTS).mp3', 0),
(10, 'Lie', 'BTS', 5, 2016, '../Muzica/Lie - Jimin (BTS).mp3', 11),
(11, 'Love Shot', 'EXO', 9, 2018, '../Muzica/Love Shot - EXO.mp3', 21),
(12, 'ON', 'BTS', 3, 2020, '../Muzica/ON - BTS.mp3', 30),
(13, 'River', 'Bishop Briggs', 10, 2016, '../Muzica/River - Bishop Briggs.mp3', 4),
(14, 'Fake Love', 'BTS', 11, 2018, '../Muzica/BTS - FAKE LOVE.mp3', 0),
(15, 'IDOL', 'BTS', 11, 2018, '../Muzica/BTS - IDOL Feat. Nicki Minaj.mp3', 19),
(16, 'Sanctify', 'Years & Years', 12, 2018, '../Muzica/Sanctify - Years & Years.mp3', 2),
(17, 'Tear You Apart', 'She Wants Revenge', 13, 2006, '../Muzica/She Wants Revenge - Tear You Apart.mp3', 0),
(18, 'Lunisolar', 'Shaun', 14, 2019, '../Muzica/Shaun - Lunisolar.mp3', 0),
(19, 'Everything Black', 'Unlike Pluto', 15, 2017, '../Muzica/Unlike Pluto - Everything Black.mp3', 7),
(20, 'Cause Disarray', 'Galneryus', 16, 2008, '../Muzica/Cause Disarray - Galneryus.mp3', 5),
(21, 'Alsatia', 'Galneryus', 16, 2008, '../Muzica/Cause Disarray - Galneryus.mp3', 3),
(22, 'As We Fall', 'League of Legends', 17, 2019, '../Muzica/As We Fall - League of Legends.mp3', 12),
(23, 'Awaken', 'League of Legends', 17, 2019, '../Muzica/Awaken - League of Legends.mp3', 11),
(24, 'Legends Never Die', 'League of Legends', 17, 2018, '../Muzica/Legends Never Die - League of Legends.mp3', 21),
(25, 'Light & Shadow', 'League of Legends', 17, 2019, '../Muzica/Light & Shadow - League of Legends.mp3', 10),
(26, 'RISE', 'League of Legends', 17, 2020, '../Muzica/RISE - League of Legends.mp3', 4),
(27, 'Enjoy The Silence', 'Lacuna Coil', 18, 2015, '../Muzica/Enjoy The Silence - Lacuna Coil.mp3', 13),
(28, 'Bring Me To Life', 'Evanescence', 19, 2003, '../Muzica/Evanescence - Bring Me To Life.mp3', 25),
(29, 'Going Under', 'Evanescence', 19, 2003, '../Muzica/Going Under - Evanescence.mp3', 6),
(30, 'Imaginary', 'Evanescence', 20, 2000, '../Muzica/Imaginary - Evanescence.mp3', 0),
(31, 'MANIFEST', 'Starset', 21, 2019, '../Muzica/MANIFEST - Starset.mp3', 24),
(32, 'Antigravity', 'Starset', 21, 2019, '../Muzica/Starset - Antigravity.mp3', 0),
(33, 'It Has Begun', 'Starset', 21, 2019, '../Muzica/Starset - It Has Begun.mp3', 18),
(34, 'Last To Fall', 'Starset', 21, 2019, '../Muzica/Starset - Last To Fall.mp3', 10),
(35, 'PERFECT MACHINE', 'Starset', 21, 2019, '../Muzica/STARSET - PERFECT MACHINE.mp3', 0),
(36, 'Point of No Return', 'Starset', 21, 2019, '../Muzica/Starset - Point of No Return.mp3', 0),
(37, 'Telepathic', 'Starset', 21, 2019, '../Muzica/Starset - Telepathic.mp3', 5),
(38, 'Telescope', 'Starset', 21, 2019, '../Muzica/Starset - Telescope.mp3', 0),
(39, 'WHERE THE SKIES END', 'Starset', 21, 2019, '../Muzica/WHERE THE SKIES END - Starset.mp3', 0),
(40, 'Grace Kelly', 'MIKA', 22, 2007, '../Muzica/MIKA - Grace Kelly.mp3', 18),
(41, 'Relax, Take It Easy ', 'MIKA', 22, 2007, '../Muzica/MIKA - Relax, Take It Easy .mp3', 19),
(42, 'Waiting On the Sky to Change', 'Downplay', 23, 2020, '../Muzica/Waiting On the Sky to Change - Downplay.mp3', 0),
(43, 'Puddle Of Mudd', 'Blurry', 24, 2001, '../Muzica/Puddle Of Mudd - Blurry.mp3', 0),
(44, 'Perfect Words', 'Steve Cash', 25, 2002, '../Muzica/Perfect Words - Steve Cash.mp3', 0),
(45, 'Apologize', 'OneRepublic', 26, 2006, '../Muzica/OneRepublic - Apologize.mp3', 20),
(46, 'Start Again', 'OneRepublic', 26, 2006, '../Muzica/OneRepublic - Start Again.mp3', 0),
(47, 'All The Little Lights', 'Passenger', 27, 2012, '../Muzica/Passenger - All The Little Lights.mp3', 0),
(48, 'Simple Song', 'Passenger', 27, 2012, '../Muzica/Passenger - Simple Song.mp3', 0),
(49, 'The Wrong Direction ', 'Passenger', 27, 2012, '../Muzica/Passenger - The Wrong Direction .mp3', 0);

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
('Ana-Maria Yokai', 'Ana', '000', 'maria_ana@yahoo.com'),
('Bianca Evergreen', 'Bia', '555', 'evergreen1347@nyu.edu'),
('Larisa Eyre', 'Lary', '123', 'lary@yahoo.com'),
('Oana Passenger', 'Oana', '111', 'at_puppy@fmi.ro');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`username1`,`username2`),
  ADD KEY `user_fk5` (`username2`);

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
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `artist_fk` (`aname`),
  ADD KEY `album_fkn` (`albid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `lid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `user_fk4` FOREIGN KEY (`username1`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `user_fk5` FOREIGN KEY (`username2`) REFERENCES `user` (`username`);

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
-- Constraints for table `song`
--
ALTER TABLE `song`
  ADD CONSTRAINT `album_fkn` FOREIGN KEY (`albid`) REFERENCES `album` (`albid`),
  ADD CONSTRAINT `artist_fk` FOREIGN KEY (`aname`) REFERENCES `artist` (`aname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
