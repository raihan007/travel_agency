-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2016 at 06:11 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `access_history`
--

INSERT INTO `access_history` (`EntityNo`, `UserId`, `LoginTime`) VALUES
(1, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-01 08:31:00'),
(2, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-01 15:51:22'),
(3, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-01 15:55:24'),
(4, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-01 20:58:23'),
(5, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-01 22:22:23'),
(6, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-02 19:37:09'),
(7, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-02 23:44:55'),
(8, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-02 23:50:56'),
(9, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-02 23:52:14'),
(10, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-03 20:24:45'),
(11, 'F541AD85-AF3F-4C84-A5D7-1352EE339676', '2016-11-03 20:52:29'),
(12, 'F541AD85-AF3F-4C84-A5D7-1352EE339676', '2016-11-04 10:41:36'),
(13, 'F541AD85-AF3F-4C84-A5D7-1352EE339676', '2016-11-05 11:27:23'),
(14, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-05 11:28:45'),
(15, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-05 22:57:31'),
(16, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-06 08:41:48'),
(17, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-06 11:00:22'),
(18, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-06 21:32:57');

-- --------------------------------------------------------

--
-- Table structure for table `packages_booking_info`
--

CREATE TABLE IF NOT EXISTS `packages_booking_info` (
`EntityNo` int(11) NOT NULL,
  `PackageId` varchar(50) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `TotalCost` float NOT NULL,
  `ClientId` varchar(50) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `packages_booking_info`
--

INSERT INTO `packages_booking_info` (`EntityNo`, `PackageId`, `Quantity`, `TotalCost`, `ClientId`, `Date`) VALUES
(1, '42C19C61-4B4A-4C29-9958-536B7884E3A6', 3, 21600, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-06 23:09:51');

-- --------------------------------------------------------

--
-- Table structure for table `packages_days_info`
--

CREATE TABLE IF NOT EXISTS `packages_days_info` (
`EntityNo` int(11) NOT NULL,
  `ID` varchar(50) NOT NULL,
  `DayTitle` varchar(10) NOT NULL,
  `Details` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `packages_food_info`
--

CREATE TABLE IF NOT EXISTS `packages_food_info` (
  `ID` varchar(50) NOT NULL,
  `Breakfast` varchar(500) NOT NULL,
  `Lunch` varchar(500) NOT NULL,
  `Dinner` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `packages_info`
--

CREATE TABLE IF NOT EXISTS `packages_info` (
`EntityNo` int(11) NOT NULL,
  `ID` varchar(50) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Gallery` int(11) NOT NULL,
  `Cost` int(11) NOT NULL,
  `Type` varchar(20) NOT NULL DEFAULT 'Local Tour',
  `Discount` float NOT NULL DEFAULT '0',
  `Remarks` varchar(1500) NOT NULL,
  `BookingLastDate` date NOT NULL,
  `IsDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `packages_info`
--

INSERT INTO `packages_info` (`EntityNo`, `ID`, `Title`, `Gallery`, `Cost`, `Type`, `Discount`, `Remarks`, `BookingLastDate`, `IsDeleted`) VALUES
(1, '42C19C61-4B4A-4C29-9958-536B7884E3A6', 'Sundarban Tour Package Cruise Koromjal-Kotka-Harbaria', 1, 8000, 'Local Tour', 10, 'Sundarban tour package cruise for 3 days 2 nights. Travel Route : Khulna-Sundarban-Koromjal-Kotka-Harbaria-Khulna. This Sundarban tourism package includes food menu for 3 days including breakfast, lunch & dinner. Tourists of this Sundarban travel package will depart from Khulna. Experience a Bangladesh domestic holiday vacation trip package with us. The quoted price of the cruise package is per person. Snacks two times a day - biscuits / cakes / fruits, tea/coffee.', '2016-11-30', 0),
(2, 'BC39E2F2-1B07-4E62-BBA7-F01DC14C7277', 'Dhaka-Chittagong-Dhaka 3 Nights 2 Days', 1, 5000, 'Local Tour', 2, 'Dhaka-Chittagong-Dhaka local travel package includes return A/C bus ticket, everyday breakfast, stay in 3 star hotel, sightseeing and guide service.', '2016-11-01', 0),
(3, '2E6B33CD-0306-4925-8822-0EB94C91A066', 'Malaysia-Singapore-Thailand 6D 5N Under Water Dolphin Tour', 1, 59500, 'International Tour', 5, 'Malaysia-Singapore-Thailand tour package total duration 6 days and 5 nights, 2 nights in Malaysia, 1 night in Singapore and 2 nights in Thailand, Metro Hotel in Kuala Lumpur, Venue Hotel The Lily in Singapore, Unico Express in Bangkok. Package includes round trip air ticket, airport pickup, buffet breakfast, city tour, safari world tour with lunch, under water world and dolphin lagoon tour, visa assistance and all taxes.', '2016-11-16', 0),
(4, '4AF12104-8640-4A80-9B2B-859B95D80F47', 'Kuala Lumpur-Langkawi-Penang 7D 6N', 0, 52500, 'Local Tour', 10, 'Kuala Lumpur-Langkawi-Penang 7 days and 6 nights Malaysia tour package, 2 nights in Kuala Lumpur, 2 nights in Langkawi, 2 nights in Penang, Radius International Hotel in Kuala Lumpur, Bella Vista Waterfront Resort and Spa in Langkawi, Hotel Malaysia in Penang. Package includes round trip air ticket, airport pickup, buffet breakfast, city tour, island hoping in Langkawi, visa assistance and all taxes.', '2016-12-22', 0),
(5, '200BC58F-571E-4CEA-9BD4-8492E8702935', 'Exclusive 2N-Bangkok 2N-Pattaya', 1, 32500, 'International Tour', 5, 'Exclusive 2N-Bangkok 2N-Pattaya holiday package tour. This exclusive Thailand holiday vacation tour package deal includes: Dhaka - Bangkok - Dhaka return air flight ticket; 2 nights accommodation in RS. Sea Side Hotel or similar (Pattaya - 1st 2 nights); 2 nights accommodation in Best Bangkok House Hotel or similar (Bangkok - last 2 nights); round trip private transfer (Bangkok Airport - Pattaya Hotel - Bangkok Hotel - Bangkok Airport); half day tour to Royal Grand Palace & Emerald Buddha without lunch; full day Coral island tour with Lunch; English speaking tour guide (only during pick up at hotel); everyday breakfast at the hotel; all Gov. taxes.; extension nights are allowed.', '2016-12-15', 0),
(6, 'D0F15F9F-104D-4E13-9432-5696F51B6737', '5 Day 4 Night Nepal Tour Package to Kathmandu Pokhara', 1, 29400, 'International Tour', 2, 'Exclusive 5 days 4 nights Kathmandu-Pokhara holiday package tour. This exclusive Nepal vacation package deal includes: Dhaka - Kathmandu - Dhaka return airline ticket, 2 nights accommodation in Kathmandu, 2 nights accommodation in Pokhara, return private airport land transfer to hotel, everyday breakfast at the hotel, half day sightseeing in Kathmandu Valley, half day sightseeing in Pokhara. Conditions: Package for minimum 2 persons.', '2016-12-29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `packages_photos_info`
--

CREATE TABLE IF NOT EXISTS `packages_photos_info` (
`EntityNo` int(11) NOT NULL,
  `ID` varchar(50) NOT NULL,
  `FileName` varchar(100) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `packages_photos_info`
--

INSERT INTO `packages_photos_info` (`EntityNo`, `ID`, `FileName`) VALUES
(1, '42C19C61-4B4A-4C29-9958-536B7884E3A6', '42C19C61-4B4A-4C29-9958-536B7884E3A6_0.jpg'),
(2, '42C19C61-4B4A-4C29-9958-536B7884E3A6', '42C19C61-4B4A-4C29-9958-536B7884E3A6_1.jpg'),
(3, '42C19C61-4B4A-4C29-9958-536B7884E3A6', '42C19C61-4B4A-4C29-9958-536B7884E3A6_2.jpg'),
(4, '42C19C61-4B4A-4C29-9958-536B7884E3A6', '42C19C61-4B4A-4C29-9958-536B7884E3A6_3.jpg'),
(5, '42C19C61-4B4A-4C29-9958-536B7884E3A6', '42C19C61-4B4A-4C29-9958-536B7884E3A6_4.jpg'),
(6, '2E6B33CD-0306-4925-8822-0EB94C91A066', '2E6B33CD-0306-4925-8822-0EB94C91A066_1478420369.jpg'),
(7, '2E6B33CD-0306-4925-8822-0EB94C91A066', '2E6B33CD-0306-4925-8822-0EB94C91A066_1478420370.jpg'),
(8, '2E6B33CD-0306-4925-8822-0EB94C91A066', '2E6B33CD-0306-4925-8822-0EB94C91A066_1478420371.jpg'),
(9, '200BC58F-571E-4CEA-9BD4-8492E8702935', '200BC58F-571E-4CEA-9BD4-8492E8702935_1478420978.jpg'),
(10, '200BC58F-571E-4CEA-9BD4-8492E8702935', '200BC58F-571E-4CEA-9BD4-8492E8702935_1478420979.jpg'),
(11, '200BC58F-571E-4CEA-9BD4-8492E8702935', '200BC58F-571E-4CEA-9BD4-8492E8702935_1478420980.jpg'),
(12, 'D0F15F9F-104D-4E13-9432-5696F51B6737', 'D0F15F9F-104D-4E13-9432-5696F51B6737_1478421286.jpg'),
(13, 'BC39E2F2-1B07-4E62-BBA7-F01DC14C7277', 'BC39E2F2-1B07-4E62-BBA7-F01DC14C7277_1478429119.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `package_details`
--

CREATE TABLE IF NOT EXISTS `package_details` (
  `ID` varchar(50) NOT NULL,
  `Duration` varchar(20) NOT NULL,
  `Departure` varchar(20) NOT NULL,
  `Destination` varchar(20) NOT NULL,
  `Transport` varchar(50) NOT NULL,
  `Accommodation` varchar(50) NOT NULL,
  `Sight Seeing` varchar(5) NOT NULL DEFAULT 'YES',
  `Guide Service` varchar(5) NOT NULL DEFAULT 'YES'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users_access`
--

INSERT INTO `users_access` (`EntityNo`, `UserId`, `Username`, `Password`, `Role`) VALUES
(1, '88BA3B01-7C9B-406C-9757-783B1192CB14', 'Admin', 'n5LfaGLkqZCGhUvD21bFI1v187HH3Gpb6p105DJW2hE5Uv1ZkWzrk7SNdrKTzc6TAiaAAqEvZqAGzVsBEoz/gA==', 'Admin'),
(3, 'B14FF4ED-33E6-4917-84CF-25C7C4D3305E', 'Sheikh', 'lFfFqtzcGsh6vs7Q4P6AAqZarIAubIZY5Ob6bdUGcKSXnq5NH8G/w0ZNKnD7PlPKs1SLlYSCntFZdX3Kl2RjbA==', 'Client'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`EntityNo`, `UserId`, `FirstName`, `LastName`, `Gender`, `Email`, `Photo`, `PermanentAddress`, `PresentAddress`, `PhoneNo`, `Birthdate`, `BloodGroup`, `NationalIdNo`, `Type`) VALUES
(1, '88BA3B01-7C9B-406C-9757-783B1192CB14', 'Md. Raihan', 'Talukder', 'Male', 'raihan.cse92@gmail.com', '88BA3B01-7C9B-406C-9757-783B1192CB14.jpg', '257,East Goran,Dhaka-1219', '257,East Goran,Dhaka-1219', '+8801685072115', '1992-08-10', 'O+', '123456987', 'Regular'),
(3, 'B14FF4ED-33E6-4917-84CF-25C7C4D3305E', 'Sheikh', 'Kousheik', 'Male', 'sk@gmail.com', 'B14FF4ED-33E6-4917-84CF-25C7C4D3305E.jpg', 'Shahabag', 'Shahabag', '+880170000000', '1993-03-16', 'A+', '147852369', 'Regular'),
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
-- Indexes for table `packages_booking_info`
--
ALTER TABLE `packages_booking_info`
 ADD PRIMARY KEY (`EntityNo`);

--
-- Indexes for table `packages_days_info`
--
ALTER TABLE `packages_days_info`
 ADD PRIMARY KEY (`EntityNo`);

--
-- Indexes for table `packages_food_info`
--
ALTER TABLE `packages_food_info`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `packages_info`
--
ALTER TABLE `packages_info`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `EntityNo` (`EntityNo`,`Title`);

--
-- Indexes for table `packages_photos_info`
--
ALTER TABLE `packages_photos_info`
 ADD PRIMARY KEY (`EntityNo`);

--
-- Indexes for table `package_details`
--
ALTER TABLE `package_details`
 ADD PRIMARY KEY (`ID`);

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
MODIFY `EntityNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `packages_booking_info`
--
ALTER TABLE `packages_booking_info`
MODIFY `EntityNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `packages_days_info`
--
ALTER TABLE `packages_days_info`
MODIFY `EntityNo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `packages_info`
--
ALTER TABLE `packages_info`
MODIFY `EntityNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `packages_photos_info`
--
ALTER TABLE `packages_photos_info`
MODIFY `EntityNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users_access`
--
ALTER TABLE `users_access`
MODIFY `EntityNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
MODIFY `EntityNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
