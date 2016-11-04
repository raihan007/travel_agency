-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2016 at 07:21 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `travel_agency`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_history`
--

CREATE TABLE IF NOT EXISTS `access_history` (
`EntityNo` int(11) NOT NULL,
  `UserId` varchar(50) NOT NULL,
  `LoginTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `access_history`
--

INSERT INTO `access_history` (`EntityNo`, `UserId`, `LoginTime`) VALUES
(1, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-01 08:31:00'),
(2, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-01 15:51:22'),
(3, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-01 15:55:24'),
(4, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-01 20:58:23'),
(5, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-01 22:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `users_access`
--

CREATE TABLE IF NOT EXISTS `users_access` (
`EntityNo` int(11) NOT NULL,
  `UserId` varchar(50) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Role` varchar(10) DEFAULT 'Client'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users_access`
--

INSERT INTO `users_access` (`EntityNo`, `UserId`, `Username`, `Password`, `Role`) VALUES
(1, '88BA3B01-7C9B-406C-9757-783B1192CB14', 'Admin', 'n5LfaGLkqZCGhUvD21bFI1v187HH3Gpb6p105DJW2hE5Uv1ZkWzrk7SNdrKTzc6TAiaAAqEvZqAGzVsBEoz/gA==', 'Admin'),
(2, 'F541AD85-AF3F-4C84-A5D7-1352EE339676', 'Onik', 'S3aLMNj1DZv9ppSj70l7SgVcAHFiORjlLlJuTDykKUjEkL6XhgXjLMpX+Cy49ikAJW3sk7/Fp/0gxmGaxD9xvA==', 'Client');

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE IF NOT EXISTS `users_info` (
`EntityNo` int(11) NOT NULL,
  `UserId` varchar(50) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Gender` varchar(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Photo` varchar(150) DEFAULT NULL,
  `PermanentAddress` varchar(150) NOT NULL,
  `PresentAddress` varchar(150) NOT NULL,
  `PhoneNo` varchar(20) NOT NULL,
  `Birthdate` date NOT NULL,
  `BloodGroup` varchar(5) NOT NULL,
  `NationalIdNo` varchar(50) NOT NULL,
  `Type` varchar(10) NOT NULL DEFAULT 'Regular'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`EntityNo`, `UserId`, `FirstName`, `LastName`, `Gender`, `Email`, `Photo`, `PermanentAddress`, `PresentAddress`, `PhoneNo`, `Birthdate`, `BloodGroup`, `NationalIdNo`, `Type`) VALUES
(1, '88BA3B01-7C9B-406C-9757-783B1192CB14', 'Md. Raihan', 'Talukder', 'Male', 'raihan.cse92@gmail.com', '88BA3B01-7C9B-406C-9757-783B1192CB14.jpg', '257,East Goran,Dhaka-1219', '257,East Goran,Dhaka-1219', '+8801685072115', '1992-08-10', 'O+', '123456987', 'Regular'),
(2, 'F541AD85-AF3F-4C84-A5D7-1352EE339676', 'Zishan Ahmed', 'Onik', 'Male', 'onik@gmail.com', 'F541AD85-AF3F-4C84-A5D7-1352EE339676.jpg', 'Mohammadpur,Dhaka:1207', 'Mohammadpur,Dhaka:1207', '01680000000', '1994-06-25', 'B+', '123456', 'Regular');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_history`
--
ALTER TABLE `access_history`
 ADD PRIMARY KEY (`EntityNo`), ADD UNIQUE KEY `EntityNo` (`EntityNo`);

--
-- Indexes for table `users_access`
--
ALTER TABLE `users_access`
 ADD PRIMARY KEY (`UserId`), ADD UNIQUE KEY `EntityNo` (`EntityNo`,`Username`,`Password`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
 ADD PRIMARY KEY (`UserId`), ADD UNIQUE KEY `EntityNo` (`EntityNo`,`UserId`,`Email`,`PhoneNo`,`NationalIdNo`,`Photo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_history`
--
ALTER TABLE `access_history`
MODIFY `EntityNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users_access`
--
ALTER TABLE `users_access`
MODIFY `EntityNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
MODIFY `EntityNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
