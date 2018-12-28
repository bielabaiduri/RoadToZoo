-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2018 at 04:09 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `r2z`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
`Bookingid` int(11) NOT NULL,
  `Cusid` int(11) DEFAULT NULL,
  `Packageid` int(11) NOT NULL,
  `Ticketquantity` int(11) DEFAULT NULL,
  `transcode` varchar(200) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`Bookingid`, `Cusid`, `Packageid`, `Ticketquantity`, `transcode`) VALUES
(26, 1, 6, 1, 'dzzn63hw'),
(27, 1, 2, 1, 'dzzn63hw'),
(28, 5, 6, 1, '5yi06cdm'),
(29, 3, 3, 1, '8jubz0hj'),
(30, 5, 6, 1, '4ifm5mjz'),
(31, 5, 3, 1, '4ifm5mjz'),
(32, 5, 2, 1, '2pvhp8z2'),
(33, 5, 3, 1, 'bps2cymv'),
(34, 5, 2, 1, 'vrz4pwz4'),
(35, 4, 6, 1, 'qf0agsmz'),
(36, 4, 2, 1, 'qf0agsmz'),
(37, 6, 3, 1, 'cjv74dnb');

-- --------------------------------------------------------

--
-- Table structure for table `booking_detail`
--

CREATE TABLE IF NOT EXISTS `booking_detail` (
`id` int(11) NOT NULL,
  `Cusid` int(11) DEFAULT NULL,
  `totalpayment` decimal(16,2) DEFAULT NULL,
  `bookingdate` date DEFAULT NULL,
  `order_status` varchar(25) DEFAULT NULL,
  `transcode` varchar(200) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `booking_detail`
--

INSERT INTO `booking_detail` (`id`, `Cusid`, `totalpayment`, `bookingdate`, `order_status`, `transcode`) VALUES
(17, 1, '24.50', '2018-08-03', 'Paid', 'dzzn63hw'),
(18, 5, '17.50', '2018-08-04', 'Paid', '5yi06cdm'),
(21, 3, '15.50', '2018-08-04', 'Paid', '8jubz0hj'),
(22, 5, '33.00', '2018-08-06', 'Collect & Done', '4ifm5mjz'),
(23, 5, '7.00', '2018-08-06', 'Collect & Done', '2pvhp8z2'),
(24, 5, '15.50', '2018-08-06', 'Paid', 'bps2cymv'),
(25, 5, '7.00', '2018-08-06', 'Paid', 'vrz4pwz4'),
(26, 4, '24.50', '2018-12-03', 'Paid', 'qf0agsmz'),
(27, 6, '15.50', '2018-12-03', 'Paid', 'cjv74dnb');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`Cusid` int(11) NOT NULL,
  `Cususername` varchar(25) DEFAULT NULL,
  `Ic` varchar(12) DEFAULT NULL,
  `Cusname` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Notel` varchar(25) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Cusid`, `Cususername`, `Ic`, `Cusname`, `Password`, `Email`, `Address`, `Notel`) VALUES
(1, 'sham', '870105035699', 'Nur Shamsinar', 'r40tXLqSv9m/peVnAhDM+o7JSqE0qbz7S04PNk3qTi4=', 'sham_cnat49@yahoo.com', 'Kajang, Selangor', '0133034627'),
(2, 'shah', '780512415699', 'shah Iskandar', '202cb962ac59075b964b07152d234b70', 'syafiqahshah1830@gmail.com', 'Selangor', '013456789'),
(3, 'iskandar', '951230145548', 'iskandar', 'r40tXLqSv9m/peVnAhDM+o7JSqE0qbz7S04PNk3qTi4=', 'iskandar.aziz92@gmail.com', 'Kajang, Selangor', '0133034626'),
(4, 'nabilah', '950218115492', 'Nabilah Syafiqah Binti Elias', 'r40tXLqSv9m/peVnAhDM+o7JSqE0qbz7S04PNk3qTi4=', 'bielabaiduri@gmail.com', '23000 Dungun Terengganu', '0199880272'),
(5, 'lily', '950218115482', 'Nur Laily Jalil', 'Vd+MzJe5qo0R+I17Rd7VY5dtPGWppfn1P5tUXsyQVOQ=', 'lailyjalil.@gmail.com', 'Termeloh, Pahang', '0148120715'),
(6, 'omar', 'B031610416', 'omar abdulsattar', 'XeFp7qWoRH8epeLjJQYI7FmNPFHeGd+nDygHasU5QgE=', 'omarabdulsattar2020@gmail.com', 'melaka', '0123456789');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
`Eventid` int(11) NOT NULL,
  `Eventname` varchar(255) DEFAULT NULL,
  `Eventdate` date DEFAULT NULL,
  `Eventtime` varchar(50) DEFAULT NULL,
  `Eventplace` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Handleby` varchar(25) DEFAULT NULL,
  `Targetcus` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`Eventid`, `Eventname`, `Eventdate`, `Eventtime`, `Eventplace`, `Description`, `Handleby`, `Targetcus`) VALUES
(1, 'Bird Show', '2018-11-01', '8:00AM - 9:00AM', 'Hall A', 'Watch our birds play the ball and dance.', 'Biela', 'All'),
(2, 'Panda', '2018-11-03', '8:00 AM - 9:00 AM', 'Panda Corner', 'Do you love panda? Lets play with panda and get panda souvenir .', 'Biela', 'All'),
(6, 'This is Home Truly', '2018-11-04', '10:00AM - 11:45AM', 'Kasturi Park', 'From nature walk to keeper interaction centered around us.', 'biela', 'All'),
(7, 'Rainforest Lumia', '2018-11-07', '6:00PM - 9:00PM', 'Zoo Corner', 'A multimedia night walk on the wide side.', 'Biela', 'Adult only'),
(8, 'Play Days at The Farm', '2018-11-25', '9:30 AM - 11:30AM', 'Hall A', 'Learn and join our play assistants for hand-on nature play activities.', 'Biela', 'Child Only'),
(10, 'Drawing with Us', '2018-12-01', '8.00pm ', 'Zoo Corner', 'Let''s Fun', 'biela', 'Adult Only'),
(11, 'Gorilla show', '2018-12-03', '12.00PM - 1.00PM', 'Park A', 'Lets play', 'Biela', 'All'),
(12, 'Crow Show', '2018-12-25', '10.00 am', 'Bird Cage', 'Crow from all over the world', 'Biela', 'Adult Only'),
(15, 'gajah terbang', '2018-12-03', '9.00am', 'hall a', 'bola-bola', 'Biela', 'All');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
`Packageid` int(11) NOT NULL,
  `Packagename` varchar(255) DEFAULT NULL,
  `Packagetime` varchar(50) DEFAULT NULL,
  `Packagetype` varchar(50) DEFAULT NULL,
  `Price` decimal(16,2) DEFAULT NULL,
  `Pictureurl` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`Packageid`, `Packagename`, `Packagetime`, `Packagetype`, `Price`, `Pictureurl`) VALUES
(2, 'Children', '9:00 AM - 5:00 PM', 'Day', '7.00', '3989-2018-08-03.png'),
(3, 'Senior Citizen', '9:00 AM - 4:00 PM', 'Day', '15.50', '8350-2018-08-03.png'),
(6, 'Adult', '9:00 AM - 5:00 PM', 'Day', '17.50', '1108-2018-08-03.png'),
(7, 'omar kids', '2:00 pm - 4:00 pm', 'Day', '50.00', '5293-2018-12-03.png');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
`Staffid` int(11) NOT NULL,
  `Staffusername` varchar(25) DEFAULT NULL,
  `Staffic` varchar(12) DEFAULT NULL,
  `Staffname` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Notel` varchar(25) DEFAULT NULL,
  `Status` varchar(25) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staffid`, `Staffusername`, `Staffic`, `Staffname`, `Password`, `Email`, `Address`, `Notel`, `Status`) VALUES
(1, 'Biela', '900331115135', 'Biela', 'r40tXLqSv9m/peVnAhDM+o7JSqE0qbz7S04PNk3qTi4=', 'bielabaiduri@gmail.com', 'Dungun,terengganu', '0196767666', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `storetoken`
--

CREATE TABLE IF NOT EXISTS `storetoken` (
  `token` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
 ADD PRIMARY KEY (`Bookingid`);

--
-- Indexes for table `booking_detail`
--
ALTER TABLE `booking_detail`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`Cusid`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
 ADD PRIMARY KEY (`Eventid`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
 ADD PRIMARY KEY (`Packageid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
 ADD PRIMARY KEY (`Staffid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
MODIFY `Bookingid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `booking_detail`
--
ALTER TABLE `booking_detail`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `Cusid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
MODIFY `Eventid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
MODIFY `Packageid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
MODIFY `Staffid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
