-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2017 at 09:10 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmarlon`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminNo` int(11) NOT NULL,
  `type` set('admin') NOT NULL,
  `photo` varchar(45) NOT NULL,
  `employeeName` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `position` varchar(45) NOT NULL,
  `dateRegistered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminNo`, `type`, `photo`, `employeeName`, `password`, `position`, `dateRegistered`) VALUES
(16, '', 'webcam-toy-photo10.jpg', 'marlon', 'c8f759a539858b08e9e46251b1ae9f09', 'admin', '2000-12-11'),
(17, '', 'Desert.jpg', 'mar', '5fa9db2e335ef69a4eeb9fe7974d61f4', 'admin', '2000-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `agentNo` int(11) NOT NULL,
  `type` set('agent') DEFAULT NULL,
  `password` varchar(45) NOT NULL,
  `photo` varchar(45) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `middleName` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `contactNo` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `rank` varchar(45) NOT NULL,
  `qualification` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`agentNo`, `type`, `password`, `photo`, `firstName`, `lastName`, `middleName`, `gender`, `address`, `contactNo`, `birthdate`, `rank`, `qualification`) VALUES
(4, 'agent', 'maria', 'lon3.jpg', 'maria', 'tamo', 'francesca', 'Female', '9 evangelista st', 1234567890, '2013-11-12', 'Police Officer 1', 'dasad'),
(5, 'agent', 'ruel', 'webcam-toy-photo6.jpg', 'ruel', 'loco', 'carcha', 'Male', '9 evangelista st', 1234567890, '2013-11-14', 'Senior Police Officer 2', 'dasdasd'),
(6, 'agent', 'gary', 'Koala1_thumb.jpg', 'gary', 'santos', 'canlas', 'Female', 'bayan park', 32138, '2013-12-18', 'Police Officer 2', 'asAS');

-- --------------------------------------------------------

--
-- Table structure for table `agentassigned`
--

CREATE TABLE `agentassigned` (
  `agentAssignedNo` int(11) NOT NULL,
  `agentNo` int(11) NOT NULL,
  `caseNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `agentassigned`
--

INSERT INTO `agentassigned` (`agentAssignedNo`, `agentNo`, `caseNo`) VALUES
(12, 5, 8),
(15, 4, 7),
(18, 5, 6),
(19, 5, 9),
(24, 4, 8),
(25, 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `allcase`
--

CREATE TABLE `allcase` (
  `caseNo` int(11) NOT NULL,
  `adminNo` int(11) DEFAULT NULL,
  `agentNo` int(11) DEFAULT NULL,
  `victim` varchar(45) DEFAULT NULL,
  `typeOfCrime` varchar(45) DEFAULT NULL,
  `dateFilled` date DEFAULT NULL,
  `precinctNo` int(11) DEFAULT NULL,
  `caseStatus` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `allcase`
--

INSERT INTO `allcase` (`caseNo`, `adminNo`, `agentNo`, `victim`, `typeOfCrime`, `dateFilled`, `precinctNo`, `caseStatus`) VALUES
(6, 16, 4, 'lumen', 'arson', '2013-12-10', 2, 'ongoing'),
(7, 16, 4, 'hilda', 'murder', '2013-12-10', 3, 'new case'),
(8, 16, 5, 'narciso', 'rubbery', '2013-12-16', 3, 'wala'),
(9, NULL, NULL, 'margarette', 'homicide', NULL, NULL, 'newcase');

-- --------------------------------------------------------

--
-- Table structure for table `evidence`
--

CREATE TABLE `evidence` (
  `evidenceNo` int(11) NOT NULL,
  `caseNo` int(11) NOT NULL,
  `agentNo` int(11) NOT NULL,
  `evidence_type` varchar(45) NOT NULL,
  `file_description` varchar(45) NOT NULL,
  `evidence_file` varchar(45) NOT NULL,
  `dateSubmitted` date NOT NULL,
  `timeSubmitted` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `evidence`
--

INSERT INTO `evidence` (`evidenceNo`, `caseNo`, `agentNo`, `evidence_type`, `file_description`, `evidence_file`, `dateSubmitted`, `timeSubmitted`) VALUES
(6, 6, 5, 'Photographic', 'ffadfas', 'Tulips5.jpg', '2013-12-03', '00:26:55'),
(7, 6, 4, 'Forensic', 'jhgjhg', 'Lighthouse.jpg', '2013-12-03', '00:48:27'),
(9, 7, 4, 'Photographic', 'fafadasda', 'Koala.jpg', '2013-12-03', '20:41:10'),
(10, 8, 5, 'Forensic', 'kgkgjhg', 'Tulips6.jpg', '2013-12-04', '19:25:26');

-- --------------------------------------------------------

--
-- Table structure for table `suspect`
--

CREATE TABLE `suspect` (
  `suspectNo` int(11) NOT NULL,
  `photo` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `middleName` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `birthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suspect`
--

INSERT INTO `suspect` (`suspectNo`, `photo`, `lastName`, `firstname`, `middleName`, `gender`, `birthdate`) VALUES
(8, '', 'tamo', 'marlonie', 'balingit', 'M', '1995-02-14'),
(9, 'Lighthouse.jpg', 'clavio', 'arnold', 'jimenez', 'M', '1993-10-17'),
(10, 'Jellyfish.jpg', 'pish', 'jelly', 'dilis', 'F', '1996-12-19');

-- --------------------------------------------------------

--
-- Table structure for table `suspectassigned`
--

CREATE TABLE `suspectassigned` (
  `suspectAssignedNo` int(11) NOT NULL,
  `suspectNo` int(11) NOT NULL,
  `caseNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suspectassigned`
--

INSERT INTO `suspectassigned` (`suspectAssignedNo`, `suspectNo`, `caseNo`) VALUES
(2, 8, 6),
(5, 9, 7),
(6, 9, 8),
(11, 10, 7),
(13, 8, 9);

-- --------------------------------------------------------

--
-- Table structure for table `suspectattributes`
--

CREATE TABLE `suspectattributes` (
  `suspectAttributeNo` int(11) NOT NULL,
  `suspectNo` int(11) NOT NULL,
  `attributeName` varchar(45) DEFAULT NULL,
  `attributeValue` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userNo` int(45) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `type` enum('agent','admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userNo`, `username`, `password`, `type`) VALUES
(9, 'lon', 'a7bc1ad1c147dbc4667201f231d1d7fa', 'admin'),
(10, 'maria', '263bce650e68ab4e23f28263760b9fa5', 'agent'),
(11, 'ruel', '82236d1ad8a0b58227554d25949dc139', 'agent'),
(12, 'gary', '03b083fd0aadc8883198881ba88111ab', 'agent'),
(13, 'mar', '5fa9db2e335ef69a4eeb9fe7974d61f4', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminNo`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`agentNo`);

--
-- Indexes for table `agentassigned`
--
ALTER TABLE `agentassigned`
  ADD PRIMARY KEY (`agentAssignedNo`),
  ADD KEY `agentAssigned_fk1_idx` (`agentNo`),
  ADD KEY `agentAssigned_fk2_idx` (`caseNo`);

--
-- Indexes for table `allcase`
--
ALTER TABLE `allcase`
  ADD PRIMARY KEY (`caseNo`),
  ADD KEY `admin_fk1_idx` (`adminNo`);

--
-- Indexes for table `evidence`
--
ALTER TABLE `evidence`
  ADD PRIMARY KEY (`evidenceNo`),
  ADD KEY `evidence_fk1_idx` (`agentNo`),
  ADD KEY `evidence_fk2_idx` (`caseNo`);

--
-- Indexes for table `suspect`
--
ALTER TABLE `suspect`
  ADD PRIMARY KEY (`suspectNo`);

--
-- Indexes for table `suspectassigned`
--
ALTER TABLE `suspectassigned`
  ADD PRIMARY KEY (`suspectAssignedNo`),
  ADD KEY `fk_suspectAssigned_suspect1_idx` (`suspectNo`),
  ADD KEY `caseNo_fk1_idx` (`caseNo`);

--
-- Indexes for table `suspectattributes`
--
ALTER TABLE `suspectattributes`
  ADD PRIMARY KEY (`suspectAttributeNo`),
  ADD KEY `fk_suspectAttributes_suspect1_idx` (`suspectNo`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `agentNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `agentassigned`
--
ALTER TABLE `agentassigned`
  MODIFY `agentAssignedNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `allcase`
--
ALTER TABLE `allcase`
  MODIFY `caseNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `evidence`
--
ALTER TABLE `evidence`
  MODIFY `evidenceNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `suspect`
--
ALTER TABLE `suspect`
  MODIFY `suspectNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `suspectassigned`
--
ALTER TABLE `suspectassigned`
  MODIFY `suspectAssignedNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `suspectattributes`
--
ALTER TABLE `suspectattributes`
  MODIFY `suspectAttributeNo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userNo` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `agentassigned`
--
ALTER TABLE `agentassigned`
  ADD CONSTRAINT `agentAssignedNo_fk1` FOREIGN KEY (`agentNo`) REFERENCES `agent` (`agentNo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `agentAssignedNo_fk2` FOREIGN KEY (`caseNo`) REFERENCES `allcase` (`caseNo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `allcase`
--
ALTER TABLE `allcase`
  ADD CONSTRAINT `adminNo_fk1` FOREIGN KEY (`adminNo`) REFERENCES `admin` (`adminNo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `evidence`
--
ALTER TABLE `evidence`
  ADD CONSTRAINT `evidence_fk1` FOREIGN KEY (`agentNo`) REFERENCES `agent` (`agentNo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `evidence_fk2` FOREIGN KEY (`caseNo`) REFERENCES `allcase` (`caseNo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `suspectassigned`
--
ALTER TABLE `suspectassigned`
  ADD CONSTRAINT `caseNo_fk1` FOREIGN KEY (`caseNo`) REFERENCES `allcase` (`caseNo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `suspectNo_fk2` FOREIGN KEY (`suspectNo`) REFERENCES `suspect` (`suspectNo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `suspectattributes`
--
ALTER TABLE `suspectattributes`
  ADD CONSTRAINT `fk_suspectAttributes_suspect1` FOREIGN KEY (`suspectNo`) REFERENCES `suspect` (`suspectNo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
