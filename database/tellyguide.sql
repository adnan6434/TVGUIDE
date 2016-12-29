-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2016 at 06:08 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tellyguide`
--
CREATE DATABASE IF NOT EXISTS `tellyguide` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tellyguide`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`) VALUES
(1, 'Sports'),
(2, 'Regional'),
(3, 'Information and science'),
(4, 'Entertainment'),
(5, 'News'),
(6, 'Children'),
(7, 'Music'),
(8, 'Movies');

-- --------------------------------------------------------

--
-- Table structure for table `channel`
--

CREATE TABLE `channel` (
  `ChannelID` int(11) NOT NULL,
  `ChannelName` varchar(50) NOT NULL,
  `ChannelDescription` text NOT NULL,
  `ChannelLOGOUrl` varchar(50) NOT NULL,
  `ChannelCategoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `channel`
--

INSERT INTO `channel` (`ChannelID`, `ChannelName`, `ChannelDescription`, `ChannelLOGOUrl`, `ChannelCategoryID`) VALUES
(1, 'Star sports 1', 'telecasts sports like cricket football etc.', 'img/p3.png', 1),
(2, 'EKATTOR TV', 'telecasts news of all types', 'img/p9.png', 2),
(3, 'DISCOVERY HD', 'telecasts various type of program related to knowledge & science ', 'img/p7.png', 3),
(4, 'Zcafe HD', 'telecasts program related to fashion & life style', 'img/p0.png', 4),
(5, 'BTV', 'telecasts various type of program like sports, national ceremony, movie, songs etc.', 'img/btv.png', 2),
(6, 'Cartoon Network(CN)', 'shows cartoon & other regional program.', 'img/p8.png', 6),
(7, 'Mtunes', 'telecasts music ', 'img/p6.png', 7),
(8, 'Zstudio', 'telecasts movies', 'img/p2.png', 8),
(9, 'ATN Bangla', 'Regional Entertainment channel ', 'img/atn.jpg', 2),
(10, 'Channel I', 'Regional Entertainment channel ', 'img/channeli.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `channelbookmark`
--

CREATE TABLE `channelbookmark` (
  `ChannelBookMarkID` int(11) NOT NULL,
  `ChannelID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `channelbookmark`
--

INSERT INTO `channelbookmark` (`ChannelBookMarkID`, `ChannelID`, `UserID`) VALUES
(1, 9, 2),
(7, 6, 2),
(17, 1, 2),
(22, 6, 1),
(23, 9, 1),
(24, 2, 1),
(27, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `GenreID` int(11) NOT NULL,
  `GenreName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`GenreID`, `GenreName`) VALUES
(1, 'food'),
(2, 'children'),
(3, 'wildlife'),
(4, 'Scientific '),
(5, 'action'),
(6, 'reality show'),
(7, 'horror'),
(8, 'travel'),
(9, 'manufactural '),
(10, 'live sports'),
(11, 'historical '),
(12, 'documentary'),
(13, 'Entertainment ');

-- --------------------------------------------------------

--
-- Table structure for table `programme`
--

CREATE TABLE `programme` (
  `ProgrammeID` int(11) NOT NULL,
  `ChannelID` int(11) NOT NULL,
  `ProgrameName` varchar(50) NOT NULL,
  `GenreID` int(11) NOT NULL,
  `ProgrammeDescription` varchar(750) NOT NULL,
  `ProgrammeTime` datetime NOT NULL,
  `TimeSlotID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programme`
--

INSERT INTO `programme` (`ProgrammeID`, `ChannelID`, `ProgrameName`, `GenreID`, `ProgrammeDescription`, `ProgrammeTime`, `TimeSlotID`) VALUES
(1, 1, 'England vs Pakistan T20', 10, 'cricket game  .', '2016-09-01 05:00:00', 3),
(2, 1, 'Post match review', 10, 'match report  . .', '2016-09-01 08:00:11', 1),
(3, 1, 'pre match review of Arsenal vs Liverpool', 10, 'football analysis', '2016-09-01 09:00:00', 1),
(4, 1, 'Arsenal vs Liverpool live', 10, 'live football of BPL', '2016-09-01 10:00:00', 3),
(5, 2, 'Tritiyo mattra', 1, 'political discussion of various personality', '2016-09-01 05:00:00', 3),
(6, 2, 'news @ 8', 1, 'news of current hour', '2016-09-01 08:00:00', 1),
(7, 2, 'rater adda', 1, 'discussion of various interesting topics ', '2016-09-01 09:00:00', 3),
(8, 3, 'Man vs wild', 3, 'surviving in wild life ', '2016-09-01 05:00:00', 3),
(9, 3, 'How sex changed this world', 4, 'revulation of mankind', '2016-09-01 08:00:00', 3),
(10, 3, 'under the sea', 1, 'shows world under sea water', '2016-09-01 11:00:00', 1),
(11, 4, 'here we go!!', 6, 'reality show which include many stuns', '2016-09-01 05:00:00', 3),
(12, 4, 'Coffee with Karan', 12, 'Karan takes interview of celebraties ', '2016-09-01 08:00:00', 3),
(13, 4, 'Can you do it!', 6, 'performs impossible magic', '2016-09-01 11:00:00', 1),
(14, 5, 'Ittadi', 1, 'program directed by Hanif Shogket', '2016-09-01 05:00:00', 3),
(15, 5, 'Preview Bangladesh vs India ', 10, 'cricket match', '2016-09-01 08:00:00', 1),
(16, 5, 'Bangladesh vs India T20 live', 10, 'live cricket between Bangladesh & India', '2016-09-16 09:00:00', 3),
(17, 6, 'Tom & jerry', 2, 'cartoon show', '2016-09-01 05:00:00', 3),
(18, 6, 'Papai ', 2, 'cartoon show', '2016-09-01 08:00:00', 1),
(19, 6, 'Batman Returns', 5, 'movie of comic hero Batman', '2016-09-01 09:00:00', 3),
(20, 7, 'hit it', 1, 'songs', '2016-09-01 05:00:00', 3),
(21, 7, 'evening hits', 1, 'songs', '2016-09-01 08:00:00', 3),
(22, 7, 'Romance hour', 1, 'romantic songs', '2016-09-01 11:00:00', 1),
(23, 8, 'Titanic', 1, 'movie . .', '2016-09-01 05:00:01', 3),
(24, 8, 'Battleships', 5, 'movie', '2016-09-01 08:00:00', 3),
(25, 8, 'action hour', 5, 'movie clips of action scenes', '2016-09-01 11:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `programmebookmark`
--

CREATE TABLE `programmebookmark` (
  `ProgrammeBookmarkID` int(11) NOT NULL,
  `ProgrammeID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programmebookmark`
--

INSERT INTO `programmebookmark` (`ProgrammeBookmarkID`, `ProgrammeID`, `UserID`) VALUES
(7, 1, 1),
(9, 8, 1),
(10, 4, 8),
(11, 19, 8),
(13, 16, 9),
(14, 25, 9),
(15, 6, 1),
(16, 10, 2),
(17, 17, 2);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ReviewID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProgrammeID` int(11) NOT NULL,
  `Rating` float NOT NULL DEFAULT '0',
  `ReviewTitle` varchar(50) NOT NULL,
  `ReviewDescription` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`ReviewID`, `UserID`, `ProgrammeID`, `Rating`, `ReviewTitle`, `ReviewDescription`) VALUES
(1, 1, 3, 3.5, 'Title', 'aaaaaaaaaaaa'),
(2, 1, 3, 1, 'Title', 'fdfdfdfd'),
(3, 8, 4, 5, 'nice game', 'some description'),
(4, 9, 25, 5, 'very nice', 'some description');

-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

CREATE TABLE `rights` (
  `RightID` int(11) NOT NULL,
  `Rights` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rights`
--

INSERT INTO `rights` (`RightID`, `Rights`) VALUES
(1, 'view'),
(2, 'add'),
(3, 'update'),
(4, 'delete');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `RoleID` int(11) NOT NULL,
  `Rolename` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`RoleID`, `Rolename`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `roledefination`
--

CREATE TABLE `roledefination` (
  `RightID` int(11) NOT NULL,
  `RoleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roledefination`
--

INSERT INTO `roledefination` (`RightID`, `RoleId`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shoutbox`
--

CREATE TABLE `shoutbox` (
  `ShoutID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProgrammeID` int(11) DEFAULT NULL,
  `Message` varchar(250) NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shoutbox`
--

INSERT INTO `shoutbox` (`ShoutID`, `UserID`, `ProgrammeID`, `Message`, `Time`) VALUES
(29, 1, 1, 'very weird show indeed', '10:24:14'),
(52, 2, 0, 'very weird show indeed', '01:25:51'),
(53, 2, 1, 'very weird show indeed', '01:26:44'),
(55, 1, 0, 'chatbox complete', '01:42:28'),
(67, 1, 2, 'Good show ,but missed the last episode :(', '02:00:48'),
(68, 1, 14, 'kalk eta dekhbo, apni ki dekhben?', '01:37:09');

-- --------------------------------------------------------

--
-- Table structure for table `timeslot`
--

CREATE TABLE `timeslot` (
  `TimeslotID` int(11) NOT NULL,
  `SlotDuration` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeslot`
--

INSERT INTO `timeslot` (`TimeslotID`, `SlotDuration`) VALUES
(1, 'Half_hour'),
(2, '1 Hour'),
(3, '2 hour'),
(4, '3 hour');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `RoleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `FirstName`, `LastName`, `UserName`, `Email`, `Password`, `DateOfBirth`, `RoleID`) VALUES
(1, 'ADMIN', 'ADMINPRIME', 'admin', 'admin@tellyguide.com', '123456', '2016-08-13', 1),
(2, 'Kabir', 'Khan', 'user', 'KK@gmail.com', '123456', '2016-08-02', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`),
  ADD UNIQUE KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `channel`
--
ALTER TABLE `channel`
  ADD PRIMARY KEY (`ChannelID`),
  ADD UNIQUE KEY `ChannelID` (`ChannelID`),
  ADD KEY `CategoryID_idx` (`ChannelCategoryID`);

--
-- Indexes for table `channelbookmark`
--
ALTER TABLE `channelbookmark`
  ADD PRIMARY KEY (`ChannelBookMarkID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`GenreID`),
  ADD UNIQUE KEY `GenreID` (`GenreID`);

--
-- Indexes for table `programme`
--
ALTER TABLE `programme`
  ADD PRIMARY KEY (`ProgrammeID`),
  ADD UNIQUE KEY `ProgrammeID` (`ProgrammeID`),
  ADD KEY `ChannelId_idx` (`ChannelID`),
  ADD KEY `GenreID_idx` (`GenreID`),
  ADD KEY `TimeslotID_idx` (`TimeSlotID`);

--
-- Indexes for table `programmebookmark`
--
ALTER TABLE `programmebookmark`
  ADD PRIMARY KEY (`ProgrammeBookmarkID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ReviewID`),
  ADD UNIQUE KEY `ReviewID` (`ReviewID`),
  ADD KEY `UserID_idx` (`UserID`),
  ADD KEY `ProgrammeID_idx` (`ProgrammeID`);

--
-- Indexes for table `rights`
--
ALTER TABLE `rights`
  ADD PRIMARY KEY (`RightID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `shoutbox`
--
ALTER TABLE `shoutbox`
  ADD PRIMARY KEY (`ShoutID`),
  ADD UNIQUE KEY `ShoutID` (`ShoutID`),
  ADD KEY `ID_idx` (`UserID`),
  ADD KEY `ProgrammeID_idx` (`ProgrammeID`);

--
-- Indexes for table `timeslot`
--
ALTER TABLE `timeslot`
  ADD PRIMARY KEY (`TimeslotID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id` (`Id`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `RoleID_idx` (`RoleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `channel`
--
ALTER TABLE `channel`
  MODIFY `ChannelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `channelbookmark`
--
ALTER TABLE `channelbookmark`
  MODIFY `ChannelBookMarkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `GenreID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `programme`
--
ALTER TABLE `programme`
  MODIFY `ProgrammeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `programmebookmark`
--
ALTER TABLE `programmebookmark`
  MODIFY `ProgrammeBookmarkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `ReviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `shoutbox`
--
ALTER TABLE `shoutbox`
  MODIFY `ShoutID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `timeslot`
--
ALTER TABLE `timeslot`
  MODIFY `TimeslotID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `channel`
--
ALTER TABLE `channel`
  ADD CONSTRAINT `CategoryID` FOREIGN KEY (`ChannelCategoryID`) REFERENCES `category` (`CategoryID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `programme`
--
ALTER TABLE `programme`
  ADD CONSTRAINT `ChID` FOREIGN KEY (`ChannelID`) REFERENCES `channel` (`ChannelID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `GenreID` FOREIGN KEY (`GenreID`) REFERENCES `genre` (`GenreID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `TimeslotId` FOREIGN KEY (`TimeSlotID`) REFERENCES `timeslot` (`TimeslotID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `ProgID` FOREIGN KEY (`ProgrammeID`) REFERENCES `programme` (`ProgrammeID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `RID` FOREIGN KEY (`RoleID`) REFERENCES `role` (`RoleID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
