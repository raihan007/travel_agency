-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2016 at 09:00 PM
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
CREATE DATABASE IF NOT EXISTS `travel_agency` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `travel_agency`;

-- --------------------------------------------------------

--
-- Table structure for table `access_history`
--

CREATE TABLE IF NOT EXISTS `access_history` (
`EntityNo` int(11) NOT NULL,
  `UserId` varchar(50) NOT NULL,
  `LoginTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

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
(18, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-06 21:32:57'),
(19, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-07 19:29:42'),
(20, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-08 21:33:58'),
(21, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-08 21:42:41'),
(22, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-09 17:55:03'),
(23, 'F541AD85-AF3F-4C84-A5D7-1352EE339676', '2016-11-10 00:30:05'),
(24, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-10 00:41:37'),
(25, 'F541AD85-AF3F-4C84-A5D7-1352EE339676', '2016-11-10 09:48:46'),
(26, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-10 13:23:21'),
(27, '6D3DA2D0-0FB3-49E0-9C43-776A0BA9C07D', '2016-11-10 13:33:33'),
(28, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-10 13:34:41'),
(29, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-10 15:29:11'),
(30, 'F541AD85-AF3F-4C84-A5D7-1352EE339676', '2016-11-10 15:31:00'),
(31, 'AA314E1C-6C24-4B8C-AA90-7C2B184C1FAB', '2016-11-10 15:45:44'),
(32, '6D3DA2D0-0FB3-49E0-9C43-776A0BA9C07D', '2016-11-10 15:52:19'),
(33, 'C96C334D-D9A6-414A-9909-8100F15E6505', '2016-11-10 15:52:41'),
(34, '6D3DA2D0-0FB3-49E0-9C43-776A0BA9C07D', '2016-11-10 15:55:30'),
(35, 'F541AD85-AF3F-4C84-A5D7-1352EE339676', '2016-11-10 17:21:50'),
(36, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-10 21:32:03'),
(37, '6D3DA2D0-0FB3-49E0-9C43-776A0BA9C07D', '2016-11-10 23:04:58'),
(38, '6D3DA2D0-0FB3-49E0-9C43-776A0BA9C07D', '2016-11-13 14:15:17'),
(39, 'F541AD85-AF3F-4C84-A5D7-1352EE339676', '2016-11-13 14:15:34'),
(40, '6D3DA2D0-0FB3-49E0-9C43-776A0BA9C07D', '2016-11-13 14:20:22'),
(41, '6D3DA2D0-0FB3-49E0-9C43-776A0BA9C07D', '2016-11-13 14:37:36'),
(42, 'F541AD85-AF3F-4C84-A5D7-1352EE339676', '2016-11-13 14:42:09'),
(43, 'C3D765B9-0305-42AE-ADAD-88A08C55420C', '0000-00-00 00:00:00'),
(44, 'C3D765B9-0305-42AE-ADAD-88A08C55420C', '0000-00-00 00:00:00'),
(45, '6D3DA2D0-0FB3-49E0-9C43-776A0BA9C07D', '0000-00-00 00:00:00'),
(46, '6D3DA2D0-0FB3-49E0-9C43-776A0BA9C07D', '0000-00-00 00:00:00'),
(47, '6D3DA2D0-0FB3-49E0-9C43-776A0BA9C07D', '0000-00-00 00:00:00'),
(48, '6D3DA2D0-0FB3-49E0-9C43-776A0BA9C07D', '0000-00-00 00:00:00'),
(49, '6D3DA2D0-0FB3-49E0-9C43-776A0BA9C07D', '0000-00-00 00:00:00'),
(50, '6D3DA2D0-0FB3-49E0-9C43-776A0BA9C07D', '0000-00-00 00:00:00'),
(51, '6D3DA2D0-0FB3-49E0-9C43-776A0BA9C07D', '0000-00-00 00:00:00'),
(52, '6D3DA2D0-0FB3-49E0-9C43-776A0BA9C07D', '0000-00-00 00:00:00'),
(53, '6D3DA2D0-0FB3-49E0-9C43-776A0BA9C07D', '0000-00-00 00:00:00'),
(54, '6D3DA2D0-0FB3-49E0-9C43-776A0BA9C07D', '0000-00-00 00:00:00'),
(55, '6D3DA2D0-0FB3-49E0-9C43-776A0BA9C07D', '0000-00-00 00:00:00'),
(56, '6D3DA2D0-0FB3-49E0-9C43-776A0BA9C07D', '0000-00-00 00:00:00'),
(57, '6D3DA2D0-0FB3-49E0-9C43-776A0BA9C07D', '0000-00-00 00:00:00'),
(58, '6D3DA2D0-0FB3-49E0-9C43-776A0BA9C07D', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `booking_info_view`
--
CREATE TABLE IF NOT EXISTS `booking_info_view` (
`EntityNo` int(11)
,`ClientId` varchar(50)
,`Fullname` varchar(41)
,`PackageId` varchar(50)
,`Title` varchar(100)
,`Quantity` int(11)
,`Cost` int(11)
,`Discount` float
,`TotalCost` float
,`Date` date
);
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
  `Date` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `packages_booking_info`
--

INSERT INTO `packages_booking_info` (`EntityNo`, `PackageId`, `Quantity`, `TotalCost`, `ClientId`, `Date`) VALUES
(1, '42C19C61-4B4A-4C29-9958-536B7884E3A6', 3, 21600, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-06'),
(2, '2E6B33CD-0306-4925-8822-0EB94C91A066', 5, 282625, 'F541AD85-AF3F-4C84-A5D7-1352EE339676', '2016-11-07'),
(3, 'D0F15F9F-104D-4E13-9432-5696F51B6737', 1, 28812, 'B14FF4ED-33E6-4917-84CF-25C7C4D3305E', '2016-11-07'),
(4, 'D0F15F9F-104D-4E13-9432-5696F51B6737', 5, 144060, '064F0A3B-5672-4DF0-8DAD-3AB71455FC95', '2016-11-09'),
(5, '2E6B33CD-0306-4925-8822-0EB94C91A066', 1, 56525, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-09'),
(6, '42C19C61-4B4A-4C29-9958-536B7884E3A6', 10, 72000, 'F541AD85-AF3F-4C84-A5D7-1352EE339676', '2016-11-09'),
(7, '42C19C61-4B4A-4C29-9958-536B7884E3A6', 5, 36000, 'B14FF4ED-33E6-4917-84CF-25C7C4D3305E', '2016-11-09'),
(8, '4AF12104-8640-4A80-9B2B-859B95D80F47', 3, 141750, '064F0A3B-5672-4DF0-8DAD-3AB71455FC95', '2016-11-09'),
(9, 'D0F15F9F-104D-4E13-9432-5696F51B6737', 2, 57624, '064F0A3B-5672-4DF0-8DAD-3AB71455FC95', '2016-11-10'),
(10, '42C19C61-4B4A-4C29-9958-536B7884E3A6', 1, 7999.9, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-10'),
(11, '42C19C61-4B4A-4C29-9958-536B7884E3A6', 5, 36000, '88BA3B01-7C9B-406C-9757-783B1192CB14', '2016-11-13');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `packages_info`
--

INSERT INTO `packages_info` (`EntityNo`, `ID`, `Title`, `Gallery`, `Cost`, `Type`, `Discount`, `Remarks`, `BookingLastDate`, `IsDeleted`) VALUES
(1, '42C19C61-4B4A-4C29-9958-536B7884E3A6', 'Sundarban Tour Package Cruise Koromjal-Kotka-Harbaria', 1, 8000, 'Local Tour', 10, 'Sundarban tour package cruise for 3 days 2 nights. Travel Route : Khulna-Sundarban-Koromjal-Kotka-Harbaria-Khulna. This Sundarban tourism package includes food menu for 3 days including breakfast, lunch & dinner. Tourists of this Sundarban travel package will depart from Khulna. Experience a Bangladesh domestic holiday vacation trip package with us. The quoted price of the cruise package is per person. Snacks two times a day - biscuits / cakes / fruits, tea/coffee.', '2016-11-30', 0),
(2, 'BC39E2F2-1B07-4E62-BBA7-F01DC14C7277', 'Dhaka-Chittagong-Dhaka 3 Nights 2 Days', 1, 5000, 'Local Tour', 2, 'Dhaka-Chittagong-Dhaka local travel package includes return A/C bus ticket, everyday breakfast, stay in 3 star hotel, sightseeing and guide service.', '2016-11-01', 0),
(3, '2E6B33CD-0306-4925-8822-0EB94C91A066', 'Malaysia-Singapore-Thailand 6D 5N Under Water Dolphin Tour', 1, 59500, 'International Tour', 5, 'Malaysia-Singapore-Thailand tour package total duration 6 days and 5 nights, 2 nights in Malaysia, 1 night in Singapore and 2 nights in Thailand, Metro Hotel in Kuala Lumpur, Venue Hotel The Lily in Singapore, Unico Express in Bangkok. Package includes round trip air ticket, airport pickup, buffet breakfast, city tour, safari world tour with lunch, under water world and dolphin lagoon tour, visa assistance and all taxes.', '2016-11-16', 0),
(4, '4AF12104-8640-4A80-9B2B-859B95D80F47', 'Kuala Lumpur-Langkawi-Penang 7D 6N', 0, 52500, 'International Tour', 10, 'Kuala Lumpur-Langkawi-Penang 7 days and 6 nights Malaysia tour package, 2 nights in Kuala Lumpur, 2 nights in Langkawi, 2 nights in Penang, Radius International Hotel in Kuala Lumpur, Bella Vista Waterfront Resort and Spa in Langkawi, Hotel Malaysia in Penang. Package includes round trip air ticket, airport pickup, buffet breakfast, city tour, island hoping in Langkawi, visa assistance and all taxes.', '2016-12-22', 0),
(5, '200BC58F-571E-4CEA-9BD4-8492E8702935', 'Exclusive 2N-Bangkok 2N-Pattaya', 1, 32500, 'International Tour', 5, 'Exclusive 2N-Bangkok 2N-Pattaya holiday package tour. This exclusive Thailand holiday vacation tour package deal includes: Dhaka - Bangkok - Dhaka return air flight ticket; 2 nights accommodation in RS. Sea Side Hotel or similar (Pattaya - 1st 2 nights); 2 nights accommodation in Best Bangkok House Hotel or similar (Bangkok - last 2 nights); round trip private transfer (Bangkok Airport - Pattaya Hotel - Bangkok Hotel - Bangkok Airport); half day tour to Royal Grand Palace & Emerald Buddha without lunch; full day Coral island tour with Lunch; English speaking tour guide (only during pick up at hotel); everyday breakfast at the hotel; all Gov. taxes.; extension nights are allowed.', '2016-12-15', 0),
(6, 'D0F15F9F-104D-4E13-9432-5696F51B6737', '5 Day 4 Night Nepal Tour Package to Kathmandu Pokhara', 1, 29400, 'International Tour', 2, 'Exclusive 5 days 4 nights Kathmandu-Pokhara holiday package tour. This exclusive Nepal vacation package deal includes: Dhaka - Kathmandu - Dhaka return airline ticket, 2 nights accommodation in Kathmandu, 2 nights accommodation in Pokhara, return private airport land transfer to hotel, everyday breakfast at the hotel, half day sightseeing in Kathmandu Valley, half day sightseeing in Pokhara. Conditions: Package for minimum 2 persons.', '2016-12-29', 0),
(8, 'DB635CF1-8ECF-4D06-9135-803020A6FB66', '3 days 2 Nights Italy', 0, 75000, 'International Tour', 1, 'Fun Unlimited', '2017-01-02', 1),
(9, '8E8355E7-41BC-45A6-8E50-50B465F954DA', '3 days 2 Nights Spain', 0, 90000, 'International Tour', 5, 'Coming Soon', '2017-05-05', 0),
(10, '8D2129A3-CBDB-4F62-A407-F02A0E41CE8E', 'Kuakata  3 Nights 4 Days', 1, 5000, 'Local Tour', 10, 'fdsfdsfsdfsdf', '2017-02-28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `packages_photos_info`
--

CREATE TABLE IF NOT EXISTS `packages_photos_info` (
`EntityNo` int(11) NOT NULL,
  `ID` varchar(50) NOT NULL,
  `FileName` varchar(100) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

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
(13, 'BC39E2F2-1B07-4E62-BBA7-F01DC14C7277', 'BC39E2F2-1B07-4E62-BBA7-F01DC14C7277_1478429119.jpg'),
(14, 'F0D2FB3E-11D4-4C97-98F3-26748D3FDE9E', 'F0D2FB3E-11D4-4C97-98F3-26748D3FDE9E_1482953741.jpg'),
(15, 'F0D2FB3E-11D4-4C97-98F3-26748D3FDE9E', 'F0D2FB3E-11D4-4C97-98F3-26748D3FDE9E_1482953742.jpg'),
(16, '8D2129A3-CBDB-4F62-A407-F02A0E41CE8E', '8D2129A3-CBDB-4F62-A407-F02A0E41CE8E_1482953806.jpg'),
(17, '8D2129A3-CBDB-4F62-A407-F02A0E41CE8E', '8D2129A3-CBDB-4F62-A407-F02A0E41CE8E_1482953807.jpg'),
(18, '8D2129A3-CBDB-4F62-A407-F02A0E41CE8E', '8D2129A3-CBDB-4F62-A407-F02A0E41CE8E_1482953808.jpg'),
(19, '8D2129A3-CBDB-4F62-A407-F02A0E41CE8E', '8D2129A3-CBDB-4F62-A407-F02A0E41CE8E_1482953809.jpg');

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
  `Email` varchar(50) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Role` varchar(10) DEFAULT 'Client'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `users_access`
--

INSERT INTO `users_access` (`EntityNo`, `UserId`, `Email`, `Username`, `Password`, `Role`) VALUES
(4, '064F0A3B-5672-4DF0-8DAD-3AB71455FC95', 't@gmail.com', 'tanvir123', 'DYI1UI6ToJBuvZUVZEHzYkUdeda1LJnAXV5+RI4y0IXSn/ZlipltlpHD8vSTcCIeOcSaUhM4d9j9VgrOjOElNw==', 'Client'),
(5, '3126D776-1EB6-40C5-A6AC-3D270E204E94', 'ayman@ymail.com', 'Te$t123', 'i58pQrl+nNDrKJ05l6LLvFKmpHuA0VyEitTcuoDtjwKB9HKadmASnncAqNAtBqd0tLkTIYIvz2jyTip5ccMOlw==', 'Client'),
(14, '49D14CE6-00BF-47CA-B56A-209820F2DFC8', 'Orko@gmail.com', 'Orko123', '9w+XXTDQvuAysplyMneFEYWawKFOeD7uuIGonpK1J1OO7p+LiFikg86HNYyc7tgE79HkaSmYTih/ThHeXjpbbg==', 'default'),
(1, '6D3DA2D0-0FB3-49E0-9C43-776A0BA9C07D', 'rananazrul.bd@gmail.com', 'Admin', '86GW+qL3pnMHVCbueBqXD2pmVFQfMnEv5Y664agcdq7p92Eq6rSdUarY6HSnU/74WHk045bEWm2wjKkN1jMlhA==', 'Admin'),
(6, '858C58F5-690F-42D8-B186-416C3C27C9F3', 's@outlook.com', 'demo12345', 'LEssl87t8kszHAeX09kJvkPid+Dk0YINIlgWJw21nROLx68gzRT9hN3+fW487EptDq3kS39fREn6OwROx6fsWg==', 'Client'),
(8, '88BA3B01-7C9B-406C-9757-783B1192CB14', 'raihan.cse92@gmail.com', 'Raihan', 'zO9PoVlo8HUxSnYQaLoe1TSTCAKakAbJooOkKvzL6St/iDV3ZzcDaC1sgFHmOuFh3E0xIwgLsUo58uE+AGHj0g==', 'Client'),
(11, 'AAFE786C-9BF2-4D50-90B2-FEC856475A08', 'raihan92@gmail.com', 'R@ihan007', 'vhbIUnN+20d35DZ3nSrZA97toe77qiAkv++ka5nd8oVryxO/BMkwBDqzyc/d3lYjMPNnj02MCK/xJGtYfVStzA==', 'Client'),
(3, 'B14FF4ED-33E6-4917-84CF-25C7C4D3305E', 'sk@gmail.com', 'Sheikh', 'lFfFqtzcGsh6vs7Q4P6AAqZarIAubIZY5Ob6bdUGcKSXnq5NH8G/w0ZNKnD7PlPKs1SLlYSCntFZdX3Kl2RjbA==', 'Client'),
(15, 'BA1BDF28-82C1-458C-9F58-2D656E5BE58B', 'superuser@dtl.com', 'superuser', '86GW+qL3pnMHVCbueBqXD2pmVFQfMnEv5Y664agcdq7p92Eq6rSdUarY6HSnU/74WHk045bEWm2wjKkN1jMlhA==', 'default'),
(12, 'C3D765B9-0305-42AE-ADAD-88A08C55420C', 'erfan@d.com', 'erfan', 'W3otVi6QJBjsMKDCqn/ftJ1V/i/IcdNkNaHmVJZHQgI4llDUtNcPMrHH45Hgrmb5vxv+KliY//AUfPfqSmGUAw==', 'Client'),
(10, 'C96C334D-D9A6-414A-9909-8100F15E6505', 'Test@Test.com', 'Test12345', 'k+MqKhUEeECSANsMHfiR8u/KtzAKMSL3d/xdS+aNbywdojNqwD/WnATl7N5OFhnP/HXXCmZJyidZlWoQXm5YHA==', 'Client'),
(7, 'D981DE93-3C51-45E2-8E83-4F3AAB7FFAFB', 'arnab@live.com', 'Arnab', 'cpgAU0mnNCa8sRzR3tj4tOb35RDWzLYVuSX2xj9lrybMn+p0v4cyjLLj+TL4Wg2epuNLZZRiu0SAEsT2UV6S5w==', 'Client'),
(16, 'EDAF4238-2C16-4565-87EF-EF3E29C607FF', 's.alom@gmail.com', 'SAlom', 'qYIOxvQPZSLh9YcEInZR7JCOgjzMGI5DgQafIv3XXv93zAQMLuXHTessvyRrdDaMGiiUbBobocWtIlqYWCBg2g==', 'Client'),
(2, 'F541AD85-AF3F-4C84-A5D7-1352EE339676', 'onik@gmail.com', 'Onik', '86GW+qL3pnMHVCbueBqXD2pmVFQfMnEv5Y664agcdq7p92Eq6rSdUarY6HSnU/74WHk045bEWm2wjKkN1jMlhA==', 'Client');

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
  `Photo` varchar(150) DEFAULT NULL,
  `PermanentAddress` varchar(150) NOT NULL,
  `PresentAddress` varchar(150) NOT NULL,
  `PhoneNo` varchar(20) NOT NULL,
  `Birthdate` date NOT NULL,
  `BloodGroup` varchar(5) NOT NULL,
  `NationalIdNo` varchar(50) NOT NULL,
  `Type` varchar(10) NOT NULL DEFAULT 'Regular',
  `IsDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`EntityNo`, `UserId`, `FirstName`, `LastName`, `Gender`, `Photo`, `PermanentAddress`, `PresentAddress`, `PhoneNo`, `Birthdate`, `BloodGroup`, `NationalIdNo`, `Type`, `IsDeleted`) VALUES
(4, '064F0A3B-5672-4DF0-8DAD-3AB71455FC95', 'Tavir Ahmed', 'Hasan', 'Male', 'user.jpg', 'Dhaka', 'Dhaka', '0147852369', '1980-05-05', 'A+', '123654789', 'Regular', 0),
(5, '3126D776-1EB6-40C5-A6AC-3D270E204E94', 'Ayman', 'Ahmed', 'Male', 'user.jpg', 'Uttora', 'Uttora', '435436346', '1992-05-05', 'AB+', '35345345', 'Regular', 0),
(13, '49D14CE6-00BF-47CA-B56A-209820F2DFC8', 'Md.', 'Orko', 'Male', '', 'sdfsvdsds', 'fdsfsdfxzvxc', '00123635555', '2016-12-18', 'B-', '5345345', 'default', 0),
(8, '6D3DA2D0-0FB3-49E0-9C43-776A0BA9C07D', 'Nazrul', 'Islam', 'Male', '6D3DA2D0-0FB3-49E0-9C43-776A0BA9C07D.jpg', 'Dhaka', 'Dhaka', '3435345464', '1990-12-31', 'B+', 'gfhhgfhfghfghf', 'Regular', 0),
(6, '858C58F5-690F-42D8-B186-416C3C27C9F3', 'gdfgdfg', 'gdfgdf', 'Female', 'user.jpg', 'fdffdfd', 'fsdfsdfs', '53453453', '1992-08-10', 'O+', '34545345353', 'Regular', 0),
(1, '88BA3B01-7C9B-406C-9757-783B1192CB14', 'Md. Raihan', 'Talukder', 'Male', '88BA3B01-7C9B-406C-9757-783B1192CB14.jpg', '257,East Goran,Dhaka-1219', '257,East Goran,Dhaka-1219', '+8801685072115', '1992-08-10', 'O+', '123456987', 'Royal', 0),
(10, 'AAFE786C-9BF2-4D50-90B2-FEC856475A08', 'dffsd', 'fdsfsd', 'Male', 'AAFE786C-9BF2-4D50-90B2-FEC856475A08.jpg', 'dsffsd', 'fsdfsdf', '+880170000000', '1992-08-10', 'O+', 'dfdfs', 'Regular', 1),
(3, 'B14FF4ED-33E6-4917-84CF-25C7C4D3305E', 'Sheikh', 'Kousheik', 'Male', 'B14FF4ED-33E6-4917-84CF-25C7C4D3305E.jpg', 'Shahabag', 'Shahabag', '+880170000000', '1993-03-16', 'A+', '147852369', 'Premium', 0),
(14, 'BA1BDF28-82C1-458C-9F58-2D656E5BE58B', 'Super', 'User', 'Male', '', 'ddgdfgdfgd', 'gdfgdfgdf', '01356456', '2016-12-23', 'O+', '534534534534', 'default', 0),
(11, 'C3D765B9-0305-42AE-ADAD-88A08C55420C', 'Erfan', 'Habib', 'Male', '', 'xvcxvx', 'vxcvxcv', '00123635555', '1988-07-13', 'B+', 'cbcbcvbcvb', 'Regular', 0),
(9, 'C96C334D-D9A6-414A-9909-8100F15E6505', 'Test', 'Test', 'Male', '', 'Test', 'Test', '434234', '1992-08-10', 'B+', 'Test', 'Regular', 1),
(7, 'D981DE93-3C51-45E2-8E83-4F3AAB7FFAFB', 'Arnab', 'Roy', 'Male', 'user.jpg', 'Dhanmondi', 'Dhanmondi', '02315664846', '1968-04-19', 'B-', '32432432435535', 'Regular', 0),
(15, 'EDAF4238-2C16-4565-87EF-EF3E29C607FF', 'Shah', 'Alom', 'Male', 'EDAF4238-2C16-4565-87EF-EF3E29C607FF.jpg', 'Barishal', 'Barishal', '00123635555', '1989-01-10', 'A-', '5345345', 'Royal', 0),
(2, 'F541AD85-AF3F-4C84-A5D7-1352EE339676', 'Zishan Ahmed', 'Onik', 'Male', 'F541AD85-AF3F-4C84-A5D7-1352EE339676.jpg', 'Mohammadpur,Dhaka:1200', 'Mohammadpur,Dhaka:1200', '01680000000', '1994-06-25', 'B+', '123456', 'Regular', 0);

-- --------------------------------------------------------

--
-- Structure for view `booking_info_view`
--
DROP TABLE IF EXISTS `booking_info_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `booking_info_view` AS select `packages_booking_info`.`EntityNo` AS `EntityNo`,`packages_booking_info`.`ClientId` AS `ClientId`,concat(`users_info`.`FirstName`,' ',`users_info`.`LastName`) AS `Fullname`,`packages_booking_info`.`PackageId` AS `PackageId`,`packages_info`.`Title` AS `Title`,`packages_booking_info`.`Quantity` AS `Quantity`,`packages_info`.`Cost` AS `Cost`,`packages_info`.`Discount` AS `Discount`,`packages_booking_info`.`TotalCost` AS `TotalCost`,`packages_booking_info`.`Date` AS `Date` from ((`packages_booking_info` join `users_info` on((`users_info`.`UserId` = `packages_booking_info`.`ClientId`))) join `packages_info` on((`packages_info`.`ID` = `packages_booking_info`.`PackageId`))) where (`packages_info`.`IsDeleted` <> 1);

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
 ADD PRIMARY KEY (`UserId`), ADD UNIQUE KEY `EntityNo` (`EntityNo`,`Username`,`Password`), ADD UNIQUE KEY `Email` (`Email`), ADD UNIQUE KEY `UserId` (`UserId`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
 ADD PRIMARY KEY (`UserId`), ADD UNIQUE KEY `EntityNo` (`EntityNo`,`UserId`,`PhoneNo`,`NationalIdNo`,`Photo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_history`
--
ALTER TABLE `access_history`
MODIFY `EntityNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `packages_booking_info`
--
ALTER TABLE `packages_booking_info`
MODIFY `EntityNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `packages_days_info`
--
ALTER TABLE `packages_days_info`
MODIFY `EntityNo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `packages_info`
--
ALTER TABLE `packages_info`
MODIFY `EntityNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `packages_photos_info`
--
ALTER TABLE `packages_photos_info`
MODIFY `EntityNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users_access`
--
ALTER TABLE `users_access`
MODIFY `EntityNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
MODIFY `EntityNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
