-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2022 at 06:43 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ibscfsuml`
--

-- --------------------------------------------------------

--
-- Table structure for table `cusexpriance`
--

CREATE TABLE `cusexpriance` (
  `user` varchar(50) NOT NULL,
  `nameofins` varchar(50) NOT NULL,
  `inputparameters` varchar(100) NOT NULL,
  `outpudata` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inistitutionaddmins`
--

CREATE TABLE `inistitutionaddmins` (
  `nameofins` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `substype` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `phno` int(10) DEFAULT NULL,
  `stutes` int(2) DEFAULT NULL,
  `exdate` timestamp NULL DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inistitutionaddmins`
--

INSERT INTO `inistitutionaddmins` (`nameofins`, `email`, `substype`, `username`, `phno`, `stutes`, `exdate`, `id`) VALUES
('cx', 'izzygamil.com', 1, 'izzy', 9876, 0, '2022-05-04 10:24:10', 2);

-- --------------------------------------------------------

--
-- Table structure for table `inistitutionusers`
--

CREATE TABLE `inistitutionusers` (
  `nameofins` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `email` varchar(25) NOT NULL,
  `mobile` int(10) NOT NULL,
  `status` int(2) NOT NULL,
  `exdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id` int(11) NOT NULL,
  `roleid` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inistitutionusers`
--

INSERT INTO `inistitutionusers` (`nameofins`, `name`, `username`, `email`, `mobile`, `status`, `exdate`, `id`, `roleid`) VALUES
('cx', 'izzy', 'izzy', 'izzy@gmail.com', 123456, 0, '2022-06-11 12:21:42', 4, 2),
('cx', 'leul', 'leul', 'leul@gmail.com', 3216544, 0, '2022-06-11 18:49:16', 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `investoers`
--

CREATE TABLE `investoers` (
  `email` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `phno` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `exdate` timestamp NULL DEFAULT NULL,
  `roleid` int(1) DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `investoers`
--

INSERT INTO `investoers` (`email`, `name`, `username`, `phno`, `status`, `exdate`, `roleid`, `id`) VALUES
('natti@gamil.com', 'natti', 'natti', '9876', 0, '2022-04-25 16:23:07', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `type` text NOT NULL,
  `message` text NOT NULL,
  `status` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `name`, `type`, `message`, `status`, `date`) VALUES
(10, '', 'comment', 'Hi crush', 'read', '2018-02-09 00:21:21'),
(11, 'Irene', 'like', '', 'read', '2018-02-09 00:21:34'),
(12, 'Joe', 'like', '', 'unread', '2018-02-09 00:22:25');

-- --------------------------------------------------------

--
-- Table structure for table `subscribtionrequest`
--

CREATE TABLE `subscribtionrequest` (
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneno` int(11) NOT NULL,
  `accounttype` varchar(50) NOT NULL,
  `subscribtionntype` int(11) NOT NULL,
  `password` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `systemaddmis`
--

CREATE TABLE `systemaddmis` (
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `systemaddmis`
--

INSERT INTO `systemaddmis` (`username`, `email`) VALUES
('kerie', 'kk@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mobile` varchar(25) DEFAULT NULL,
  `roleid` tinyint(4) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT 0,
  `startdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `enddate` timestamp NOT NULL DEFAULT current_timestamp(),
  `nameofins` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `username`, `email`, `password`, `mobile`, `roleid`, `isActive`, `startdate`, `enddate`, `nameofins`) VALUES
(1, 'kibre', 'kerie', 'kk@gmail.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', '123456', 1, 0, '2022-04-25 16:06:56', '2022-04-25 16:06:56', 'system addmin'),
(2, 'natti', 'natti', 'natti@gamil.com', '5e6bf79b9cf60c92c7fc0ce9a2c3f2daea9f017c', '9876', 4, 0, '2022-04-25 16:23:07', '2022-04-25 16:23:07', 'private investor'),
(4, 'izzy', 'izzy', 'izzy@gmail.com', '92e2004a89be3619fed993dd41abe7f31486d99e', '123456', 2, 0, '2022-04-25 16:30:06', '2022-04-25 16:30:06', 'cx'),
(5, 'leul', 'leul', 'leul@gmail.com', '29161622761bc9404d4c7caa3b39e8d25fd7e016', '321654', 3, 0, '2022-04-25 16:30:42', '2022-04-25 16:30:42', 'cx'),
(6, 'kasu', 'kasu1', 'kasu@gmail.comm', '826f02274c6c2aa6800ee118c76a4f7312f6c066', '9568858562', 3, 0, '2022-05-23 10:04:10', '2022-05-23 10:04:10', 'cx');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cusexpriance`
--
ALTER TABLE `cusexpriance`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `inistitutionaddmins`
--
ALTER TABLE `inistitutionaddmins`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `nameofins` (`nameofins`);

--
-- Indexes for table `inistitutionusers`
--
ALTER TABLE `inistitutionusers`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `investoers`
--
ALTER TABLE `investoers`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribtionrequest`
--
ALTER TABLE `subscribtionrequest`
  ADD PRIMARY KEY (`email`,`phoneno`),
  ADD UNIQUE KEY `phoneno` (`phoneno`);

--
-- Indexes for table `systemaddmis`
--
ALTER TABLE `systemaddmis`
  ADD PRIMARY KEY (`username`,`email`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inistitutionusers`
--
ALTER TABLE `inistitutionusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
