-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 07, 2021 at 03:08 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gpr`
--

-- --------------------------------------------------------

--
-- Table structure for table `bscanimages`
--

DROP TABLE IF EXISTS `bscanimages`;
CREATE TABLE IF NOT EXISTS `bscanimages` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PillarID` int(11) NOT NULL,
  `SectionNo` int(11) NOT NULL,
  `ImageName` varchar(20) NOT NULL,
  `ImageExtension` varchar(255) NOT NULL,
  `ImagePath` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `PillarID` (`PillarID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bscanimages`
--

INSERT INTO `bscanimages` (`ID`, `PillarID`, `SectionNo`, `ImageName`, `ImageExtension`, `ImagePath`) VALUES
(1, 1, 20, 'bimage1', '.png', 'hidden');

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

DROP TABLE IF EXISTS `buildings`;
CREATE TABLE IF NOT EXISTS `buildings` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Address` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`ID`, `UserID`, `Name`, `Address`) VALUES
(1, 1, 'building1', 'al shroke city');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `ID` int(11) NOT NULL,
  `IsBlocked` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`ID`, `IsBlocked`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

DROP TABLE IF EXISTS `credentials`;
CREATE TABLE IF NOT EXISTS `credentials` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Type` int(11) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `DOB` date NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`UserID`,`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`UserID`, `Type`, `Email`, `Password`, `FirstName`, `LastName`, `DOB`, `status`) VALUES
(1, 2, 'asd@asd', '123', 'asd1', 'asd2', '2021-03-03', 'Approved'),
(5, 1, 'asd1@asd1', '123123', 'moha', 'moha', '2021-02-16', 'Approved'),
(6, 2, 'asd2@asd2', '123123', 'moha', 'moha', '2021-02-16', 'Approved'),
(26, 2, 'as@asd', '12Qwaszxerdf', 'asd', 'asd', '2021-03-02', 'Approved'),
(27, 1, '12312@g', '12Qwaszxerdf', '1231', '1231', '2021-03-01', 'pending'),
(28, 1, 'asd@asd', '12Qwaszxerdf', 'asdd', 'asdd', '2019-02-27', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `defect_results`
--

DROP TABLE IF EXISTS `defect_results`;
CREATE TABLE IF NOT EXISTS `defect_results` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ImageID` int(11) NOT NULL,
  `DefectID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `DefectID` (`DefectID`),
  KEY `ImageID` (`ImageID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `defect_types`
--

DROP TABLE IF EXISTS `defect_types`;
CREATE TABLE IF NOT EXISTS `defect_types` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DefectName` varchar(255) NOT NULL,
  `DefectDescription` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `defect_types`
--

INSERT INTO `defect_types` (`ID`, `DefectName`, `DefectDescription`) VALUES
(3, 'Diffect1', 'VJ');

-- --------------------------------------------------------

--
-- Table structure for table `experts`
--

DROP TABLE IF EXISTS `experts`;
CREATE TABLE IF NOT EXISTS `experts` (
  `ID` int(11) NOT NULL,
  `Association` varchar(50) NOT NULL,
  `IsBlocked` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `experts`
--

INSERT INTO `experts` (`ID`, `Association`, `IsBlocked`) VALUES
(5, 'The Constructor ', 0),
(6, 'sensors and software', 0),
(17, 'New1', 0),
(26, 'New1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `experts_notes`
--

DROP TABLE IF EXISTS `experts_notes`;
CREATE TABLE IF NOT EXISTS `experts_notes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ExpertID` int(11) NOT NULL,
  `ResultID` int(11) NOT NULL,
  `Note` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ResultID` (`ResultID`),
  KEY `ExpertID` (`ExpertID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `image` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Message` varchar(300) NOT NULL,
  `ExpertID` int(11) DEFAULT NULL,
  `Reply` varchar(255) NOT NULL,
  `Sender` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ExpertID` (`ExpertID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`ID`, `Message`, `ExpertID`, `Reply`, `Sender`) VALUES
(1, 'I need more info about the defects', 5, '', 'mohamed.two@gmail.com'),
(2, 'Hello', 17, '', 'MOHAMED.TWO@GMAIL.COM'),
(11, 'msg', 6, 'replay', 'me@');

-- --------------------------------------------------------

--
-- Table structure for table `pillar_concrete`
--

DROP TABLE IF EXISTS `pillar_concrete`;
CREATE TABLE IF NOT EXISTS `pillar_concrete` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `BuildingID` int(11) NOT NULL,
  `PillarName` varchar(20) NOT NULL,
  `PillarDiscription` varchar(50) NOT NULL,
  `PillarImageName` varchar(20) NOT NULL,
  `PillareImageExtension` varchar(5) NOT NULL,
  `PillarImagePath` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `BuildingID` (`BuildingID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pillar_concrete`
--

INSERT INTO `pillar_concrete` (`ID`, `BuildingID`, `PillarName`, `PillarDiscription`, `PillarImageName`, `PillareImageExtension`, `PillarImagePath`) VALUES
(1, 1, 'Pillaer1', 'virtical', 'imag1', '20', 'C/www/graduation/images');

-- --------------------------------------------------------

--
-- Table structure for table `quicktest`
--

DROP TABLE IF EXISTS `quicktest`;
CREATE TABLE IF NOT EXISTS `quicktest` (
  `UserID` int(11) NOT NULL,
  `BScanImage` varchar(255) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `ResultDefect` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quicktest`
--

INSERT INTO `quicktest` (`UserID`, `BScanImage`, `Description`, `ResultDefect`) VALUES
(1, 'Void.jpg', '123qweqwwe', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `request_expert_review`
--

DROP TABLE IF EXISTS `request_expert_review`;
CREATE TABLE IF NOT EXISTS `request_expert_review` (
  `ID` int(11) NOT NULL,
  `ResultID` int(11) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `ExpertID` int(11) NOT NULL,
  KEY `ExpertID` (`ExpertID`),
  KEY `ResultID` (`ResultID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bscanimages`
--
ALTER TABLE `bscanimages`
  ADD CONSTRAINT `bscanimages_ibfk_1` FOREIGN KEY (`PillarID`) REFERENCES `pillar_concrete` (`ID`);

--
-- Constraints for table `buildings`
--
ALTER TABLE `buildings`
  ADD CONSTRAINT `buildings_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `clients` (`ID`);

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `credentials` (`UserID`);

--
-- Constraints for table `defect_results`
--
ALTER TABLE `defect_results`
  ADD CONSTRAINT `defect_results_ibfk_1` FOREIGN KEY (`DefectID`) REFERENCES `defect_types` (`ID`),
  ADD CONSTRAINT `defect_results_ibfk_2` FOREIGN KEY (`ImageID`) REFERENCES `bscanimages` (`ID`),
  ADD CONSTRAINT `defect_results_ibfk_3` FOREIGN KEY (`ID`) REFERENCES `experts_notes` (`ResultID`);

--
-- Constraints for table `experts`
--
ALTER TABLE `experts`
  ADD CONSTRAINT `experts_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `credentials` (`UserID`);

--
-- Constraints for table `experts_notes`
--
ALTER TABLE `experts_notes`
  ADD CONSTRAINT `experts_notes_ibfk_2` FOREIGN KEY (`ResultID`) REFERENCES `defect_results` (`ID`),
  ADD CONSTRAINT `experts_notes_ibfk_3` FOREIGN KEY (`ExpertID`) REFERENCES `experts` (`ID`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`ExpertID`) REFERENCES `experts` (`ID`);

--
-- Constraints for table `pillar_concrete`
--
ALTER TABLE `pillar_concrete`
  ADD CONSTRAINT `pillar_concrete_ibfk_1` FOREIGN KEY (`BuildingID`) REFERENCES `buildings` (`ID`);

--
-- Constraints for table `request_expert_review`
--
ALTER TABLE `request_expert_review`
  ADD CONSTRAINT `request_expert_review_ibfk_1` FOREIGN KEY (`ExpertID`) REFERENCES `experts` (`ID`),
  ADD CONSTRAINT `request_expert_review_ibfk_2` FOREIGN KEY (`ResultID`) REFERENCES `defect_results` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
