-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 14, 2022 at 12:51 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edoc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aemail` varchar(255) NOT NULL,
  `apassword` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aemail`, `apassword`) VALUES
('admin@edoc.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appoid` int(11) NOT NULL,
  `pid` int(10) DEFAULT NULL,
  `apponum` int(3) DEFAULT NULL,
  `scheduleid` int(10) DEFAULT NULL,
  `appodate` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appoid`, `pid`, `apponum`, `scheduleid`, `appodate`) VALUES
(1, 1, 1, 1, '2022-06-03');

-- --------------------------------------------------------

--
-- Table structure for table `counselor`
--

CREATE TABLE `counselor` (
  `cid` int(11) NOT NULL,
  `cemail` varchar(255) DEFAULT NULL,
  `cname` varchar(255) DEFAULT NULL,
  `copassword` varchar(255) DEFAULT NULL,
  `caddress` varchar(255) DEFAULT NULL,
  `cRegid` varchar(15) DEFAULT NULL,
  `ctel` varchar(15) DEFAULT NULL,
  `cdob` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counselor`
--

INSERT INTO `counselor` (`cid`, `cemail`, `cname`, `copassword`, `caddress`, `cRegid`, `ctel`, `cdob`) VALUES
(1, 'counselor@edoc.com', 'Counselor', '123', 'abcd', '12345', '10792972783', '2022-10-19');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `docid` int(11) NOT NULL,
  `docemail` varchar(255) DEFAULT NULL,
  `docname` varchar(255) DEFAULT NULL,
  `docpassword` varchar(255) DEFAULT NULL,
  `docaddress` varchar(255) DEFAULT NULL,
  `docRegid` varchar(15) DEFAULT NULL,
  `doctel` varchar(15) DEFAULT NULL,
  `docdob` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`docid`, `docemail`, `docname`, `docpassword`, `docaddress`, `docRegid`, `doctel`, `docdob`) VALUES
(1, 'doctor@edoc.com', 'Test Doctor', '123', NULL, '000000000', '0110000000', '2000-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `pid` int(11) NOT NULL,
  `pemail` varchar(255) DEFAULT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `ppassword` varchar(255) DEFAULT NULL,
  `paddress` varchar(255) DEFAULT NULL,
  `pnic` varchar(15) DEFAULT NULL,
  `pdob` date DEFAULT NULL,
  `ptel` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pid`, `pemail`, `pname`, `ppassword`, `paddress`, `pnic`, `pdob`, `ptel`) VALUES
(4, 'patient@edoc.com', 'Test Patient', '123', NULL, NULL, NULL, '17021802845'),
(9, 'db17@gmail.com', 'Patient 2', '123', '1', NULL, '2022-12-31', '1470218028');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `qid` int(2) NOT NULL,
  `question` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`qid`, `question`) VALUES
(1, 'Over the past 2 weeks, how often have you been bothered by any of the following problems: Little interest or pleasure in doing things'),
(2, 'Over the past 2 weeks, how often have you been bothered by any of the following problems: Feeling down, depressed or hopless'),
(3, 'Over the past 2 weeks, how often have you been bothered by any of the following problems: Trouble falling asleep, staying asleep, or sleeping too much'),
(4, 'Over the past 2 weeks, how often have you been bothered by any of the following problems: Feeling tired or having little energy'),
(5, 'Over the past 2 weeks, how often have you been bothered by any of the following problems: Poor appetite or overeating'),
(6, 'Over the past 2 weeks, how often have you been bothered by any of the following problems: Feeling bad about yourself - or that you are a failure or have let yourself or your family down'),
(7, 'Over the past 2 weeks, how often have you been bothered by any of the following problems: Trouble concentrating on things, such as reading the newspaper or watching television'),
(8, 'Over the past 2 weeks, how often have you been bothered by any of the following problems: Moving or speaking so slowly that other people could have noticed. Or, the opposite - being so fidgety or restless that you have been moving around a lot more than u'),
(9, 'Over the past 2 weeks, how often have you been bothered by any of the following problems: Thoughts that you would be better off dead or of hurting yourself in some way');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire`
--

CREATE TABLE `questionnaire` (
  `id` int(10) NOT NULL,
  `pid` int(10) DEFAULT NULL,
  `qid` int(2) DEFAULT NULL,
  `a` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionnaire`
--

INSERT INTO `questionnaire` (`id`, `pid`, `qid`, `a`) VALUES
(58, 9, 9, '3'),
(57, 9, 8, '3'),
(56, 9, 7, '3'),
(55, 9, 6, '3'),
(54, 9, 5, '3'),
(53, 9, 4, '3'),
(52, 9, 3, '3'),
(51, 9, 2, '3'),
(50, 9, 1, '3'),
(49, 4, 9, '0'),
(48, 4, 8, '3'),
(47, 4, 7, '3'),
(46, 4, 6, '3'),
(45, 4, 5, '3'),
(44, 4, 4, '3'),
(43, 4, 3, '3'),
(42, 4, 2, '3'),
(41, 4, 1, '3');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `scheduleid` int(11) NOT NULL,
  `docid` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `scheduledate` date DEFAULT NULL,
  `scheduletime` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`scheduleid`, `docid`, `pid`, `title`, `scheduledate`, `scheduletime`) VALUES
(10, 1, 4, '123', '2022-12-31', '12:58:00'),
(11, 4, 4, 'test', '2022-12-31', '11:59:00'),
(12, 4, 9, 'TP2', '2022-12-31', '12:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

CREATE TABLE `specialties` (
  `id` int(2) NOT NULL,
  `sname` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specialties`
--

INSERT INTO `specialties` (`id`, `sname`) VALUES
(1, 'Accident and emergency medicine'),
(2, 'Allergology'),
(3, 'Anaesthetics'),
(4, 'Biological hematology'),
(5, 'Cardiology'),
(6, 'Child psychiatry'),
(7, 'Clinical biology'),
(8, 'Clinical chemistry'),
(9, 'Clinical neurophysiology'),
(10, 'Clinical radiology'),
(11, 'Dental, oral and maxillo-facial surgery'),
(12, 'Dermato-venerology'),
(13, 'Dermatology'),
(14, 'Endocrinology'),
(15, 'Gastro-enterologic surgery'),
(16, 'Gastroenterology'),
(17, 'General hematology'),
(18, 'General Practice'),
(19, 'General surgery'),
(20, 'Geriatrics'),
(21, 'Immunology'),
(22, 'Infectious diseases'),
(23, 'Internal medicine'),
(24, 'Laboratory medicine'),
(25, 'Maxillo-facial surgery'),
(26, 'Microbiology'),
(27, 'Nephrology'),
(28, 'Neuro-psychiatry'),
(29, 'Neurology'),
(30, 'Neurosurgery'),
(31, 'Nuclear medicine'),
(32, 'Obstetrics and gynecology'),
(33, 'Occupational medicine'),
(34, 'Ophthalmology'),
(35, 'Orthopaedics'),
(36, 'Otorhinolaryngology'),
(37, 'Paediatric surgery'),
(38, 'Paediatrics'),
(39, 'Pathology'),
(40, 'Pharmacology'),
(41, 'Physical medicine and rehabilitation'),
(42, 'Plastic surgery'),
(43, 'Podiatric Medicine'),
(44, 'Podiatric Surgery'),
(45, 'Psychiatry'),
(46, 'Public health and Preventive Medicine'),
(47, 'Radiology'),
(48, 'Radiotherapy'),
(49, 'Respiratory medicine'),
(50, 'Rheumatology'),
(51, 'Stomatology'),
(52, 'Thoracic surgery'),
(53, 'Tropical medicine'),
(54, 'Urology'),
(55, 'Vascular surgery'),
(56, 'Venereology');

-- --------------------------------------------------------

--
-- Table structure for table `webuser`
--

CREATE TABLE `webuser` (
  `email` varchar(255) NOT NULL,
  `usertype` char(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webuser`
--

INSERT INTO `webuser` (`email`, `usertype`) VALUES
('admin@edoc.com', 'a'),
('doctor@edoc.com', 'd'),
('patient@edoc.com', 'p'),
('db17@gmail.com', 'p'),
('counselor@edoc.com', 'c'),
('a@gmail.com', 'p');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aemail`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appoid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `scheduleid` (`scheduleid`);

--
-- Indexes for table `counselor`
--
ALTER TABLE `counselor`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `cRegid` (`cRegid`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`docid`),
  ADD UNIQUE KEY `docRegid` (`docRegid`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`scheduleid`);

--
-- Indexes for table `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webuser`
--
ALTER TABLE `webuser`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `counselor`
--
ALTER TABLE `counselor`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `docid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `scheduleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
