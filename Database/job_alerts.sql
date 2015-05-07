-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2015 at 05:59 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `job_alerts`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `sectorid` int(2) NOT NULL,
  `companyid` int(5) NOT NULL DEFAULT '0',
  `companyname` varchar(20) NOT NULL,
  `phone` bigint(10) DEFAULT NULL,
  `website` varchar(20) DEFAULT NULL,
  `street` varchar(20) DEFAULT NULL,
  `area` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  PRIMARY KEY (`companyid`),
  KEY `sectorid` (`sectorid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`sectorid`, `companyid`, `companyname`, `phone`, `website`, `street`, `area`, `city`, `state`, `country`) VALUES
(4, 10001, 'Infosys', NULL, 'www.infosys.com', NULL, 'Electronics City', 'Bengaluru', 'Karnataka', 'India'),
(7, 10002, 'State Bank of India', NULL, 'www.sbi.co.in', NULL, 'Nariman Point', 'Mumbai', 'Maharashtra', 'India'),
(6, 10003, 'Oil and Natural Gas ', NULL, 'www.ongcindia.com', NULL, 'Tel Bhavan', 'Dehradun', 'Uttaranchal', 'India'),
(9, 10004, 'Bharti Airtel', NULL, 'www.airtel.in', NULL, 'Vasant Kunj', 'New Delhi', 'Delhi', 'India'),
(3, 10005, 'Tata Motors', NULL, 'www.tatamotors.com', 'Homi Modi Street', 'Fort', 'Mumbai', 'Maharashtra', 'India'),
(12, 10006, 'DLF', NULL, 'www.dlf.in', NULL, 'Sansad Marg', 'New Delhi', 'Delhi', 'India'),
(13, 10007, 'Samsung Electronics', NULL, 'www.samsung.com', NULL, 'Yongin-si', 'Suwon', 'Gyeongi Province', 'South Korea');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `loc_key` int(3) NOT NULL DEFAULT '0',
  `loc_name` varchar(20) NOT NULL,
  `views` int(5) NOT NULL,
  PRIMARY KEY (`loc_key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`loc_key`, `loc_name`, `views`) VALUES
(1, 'Bangalore', 1),
(2, 'Chennai', 1),
(3, 'Mumbai', 1),
(4, 'New Delhi', 1),
(5, 'Kolkata', 0),
(6, 'Ahmedabad', 0),
(7, 'Chandigarh', 0),
(8, 'Pune', 0),
(9, 'Jaipur', 0),
(10, 'Hyderabad', 0);

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE IF NOT EXISTS `qualification` (
  `coursename` varchar(50) NOT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `courseid` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`courseid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`coursename`, `branch`, `courseid`) VALUES
('High School', '10th/equivalent', 1),
('High School', '11th/equivalent', 2),
('High School', '12th/equivalent', 3),
('Diploma', 'Civil Engineering', 11),
('Diploma', 'Chemical Engineering', 12),
('Diploma', 'Computer Science and Engineering', 13),
('Diploma', 'Electrical and Electronics Engineering', 14),
('Diploma', 'Electronics and Communication Engineering', 15),
('Diploma', 'Mechanical Engineering', 16),
('Bachelor of Arts', 'Economics', 101),
('Bachelor of Arts', 'Hotel Management', 102),
('Bachelor of Arts', 'Journalism', 103),
('Bachelor of Arts', 'Political Science', 104),
('Bachelor of Commerce', 'Banking and Finance', 201),
('Bachelor of Commerce', 'Business Administration', 202),
('Bachelor of Commerce', 'Cost & Works Accounting', 203),
('Bachelor of Commerce', 'Marketting Management', 204),
('Bachelor of Computer Applications', NULL, 301),
('Bachelor of Engineering', 'Civil Engineering', 401),
('Bachelor of Engineering', 'Computer Science and Engineering', 402),
('Bachelor of Engineering', 'Information Science and Engineering', 403),
('Bachelor of Engineering', 'Electrical & Electronics Engineering', 404),
('Bachelor of Engineering', 'Electronics & Communications Engineering', 405),
('Bachelor of Engineering', 'Mechanical Engineering', 406),
('Bachelor of Science', 'Home Science', 501),
('Bachelor of Science', 'Bio-Chemistry', 502),
('Bachelor of Science', 'Mathematics', 503),
('Bachelor of Science', 'Electronics', 504),
('Master of Arts', 'History', 5101),
('Master of Arts', 'Kannada', 5102),
('Master of Arts', 'English', 5103),
('Master of Arts', 'Economics', 5104),
('Master of Commerce', 'Business Environment', 5201),
('Master of Commerce', 'E-Commerce', 5202),
('Master of Commerce', 'Financial Management', 5203),
('Master of Commerce', 'Statistical Analysis', 5204),
('Master of Computer Applications', NULL, 5301),
('Master of Technology', 'Digital Communication', 5401),
('Master of Technology', 'Engineering Materials', 5402),
('Master of Technology', 'Thermal Engineering', 5403),
('Master of Technology', 'Transportation Engineering', 5404),
('Master of Science', 'Physics', 5501),
('Master of Science', 'Chemistry', 5502),
('Master of Science', 'Electronics', 5503),
('Master of Science', 'Mathematics', 5504),
('Master of Science', 'Biology', 5505);

-- --------------------------------------------------------

--
-- Table structure for table `sector`
--

CREATE TABLE IF NOT EXISTS `sector` (
  `sectorid` int(2) NOT NULL DEFAULT '0',
  `sectorname` varchar(35) DEFAULT NULL,
  `views` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sectorid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sector`
--

INSERT INTO `sector` (`sectorid`, `sectorname`, `views`) VALUES
(1, 'Aviation', 0),
(2, 'Agriculture', 0),
(3, 'Automobile', 0),
(4, 'I.T (Software)', 0),
(5, 'PSU', 0),
(6, 'Energy', 0),
(7, 'Banking', 0),
(8, 'BPO', 0),
(9, 'Telecom', 0),
(10, 'Infrastructure', 0),
(11, 'Government', 0),
(12, 'Real Estate', 0),
(13, 'I.T (Hardware)', 0),
(14, 'Bratessh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `phone` bigint(10) NOT NULL,
  `date_of_join` date DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `password`, `fname`, `lname`, `dob`, `phone`, `date_of_join`) VALUES
('gagan94@gmail.com', 'jobalerts', 'Gagan', 'K', '1994-03-10', 9739806462, '2014-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `vacancy`
--

CREATE TABLE IF NOT EXISTS `vacancy` (
  `vacancyid` int(4) NOT NULL DEFAULT '0',
  `companyid` int(5) NOT NULL,
  `post` varchar(20) DEFAULT NULL,
  `salary` int(6) DEFAULT NULL,
  `lastdate` date NOT NULL,
  PRIMARY KEY (`vacancyid`),
  KEY `companyid` (`companyid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vacancy`
--

INSERT INTO `vacancy` (`vacancyid`, `companyid`, `post`, `salary`, `lastdate`) VALUES
(1, 10001, 'Software Developer', 500000, '2014-08-01'),
(2, 10001, 'Vice President', 800000, '2014-08-01'),
(3, 10002, 'Clerk', 200000, '2014-08-01'),
(4, 10003, 'Janitor', 150000, '2014-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `vacancy_location`
--

CREATE TABLE IF NOT EXISTS `vacancy_location` (
  `vacancyid` int(4) NOT NULL DEFAULT '0',
  `location` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`vacancyid`,`location`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vacancy_location`
--

INSERT INTO `vacancy_location` (`vacancyid`, `location`) VALUES
(1, 'Bangalore'),
(1, 'Chennai'),
(2, 'Bangalore'),
(3, 'Mumbai'),
(4, 'Mumbai');

-- --------------------------------------------------------

--
-- Table structure for table `vacancy_qual`
--

CREATE TABLE IF NOT EXISTS `vacancy_qual` (
  `courseid` int(4) NOT NULL DEFAULT '0',
  `percentage` float DEFAULT NULL,
  `vacancyid` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`vacancyid`,`courseid`),
  KEY `courseid` (`courseid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vacancy_qual`
--

INSERT INTO `vacancy_qual` (`courseid`, `percentage`, `vacancyid`) VALUES
(402, 60, 1),
(403, 60, 1),
(5301, 60, 1),
(5201, 75, 2),
(3, 60, 3),
(1, 35, 4);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`sectorid`) REFERENCES `sector` (`sectorid`);

--
-- Constraints for table `vacancy`
--
ALTER TABLE `vacancy`
  ADD CONSTRAINT `vacancy_ibfk_1` FOREIGN KEY (`companyid`) REFERENCES `company` (`companyid`);

--
-- Constraints for table `vacancy_location`
--
ALTER TABLE `vacancy_location`
  ADD CONSTRAINT `vacancy_location_ibfk_1` FOREIGN KEY (`vacancyid`) REFERENCES `vacancy` (`vacancyid`);

--
-- Constraints for table `vacancy_qual`
--
ALTER TABLE `vacancy_qual`
  ADD CONSTRAINT `vacancy_qual_ibfk_1` FOREIGN KEY (`vacancyid`) REFERENCES `vacancy` (`vacancyid`),
  ADD CONSTRAINT `vacancy_qual_ibfk_2` FOREIGN KEY (`courseid`) REFERENCES `qualification` (`courseid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
