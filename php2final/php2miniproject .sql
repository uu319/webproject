-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2018 at 08:15 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php2miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `picname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `mname`, `username`, `password`, `type`, `picname`) VALUES
(4, 'Van', 'Diongzon', 'May', 'van123', 'admin', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `c_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `sc_id` int(11) NOT NULL,
  `sb_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`c_id`, `t_id`, `sc_id`, `sb_id`) VALUES
(4, 4, 5, 5),
(5, 3, 4, 6),
(6, 3, 6, 6),
(7, 3, 4, 5),
(8, 7, 8, 9),
(9, 5, 9, 7);

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `grade_id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `grade` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`grade_id`, `st_id`, `c_id`, `remarks`, `grade`) VALUES
(30, 1, 5, 'Passed', '1'),
(31, 2, 5, 'Passed', '3'),
(32, 8, 8, 'Passed', '-1'),
(33, 9, 8, 'Passed', '2.5'),
(34, 3, 5, 'Passed', '3');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `acc_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `action`, `time`, `acc_id`, `type`) VALUES
(3, 'login', '2018-10-20 11:52:16', 4, 'admin'),
(4, 'Teacher Inserted', '2018-10-20 12:08:24', 4, 'admin'),
(5, 'Student Inserted', '2018-10-20 12:09:06', 4, 'admin'),
(6, 'Section Added', '2018-10-20 12:09:27', 4, 'admin'),
(7, 'Class Added', '2018-10-20 12:09:43', 4, 'admin'),
(8, 'logout', '2018-10-20 12:13:10', 4, 'admin'),
(9, 'login', '2018-10-20 12:13:27', 1, 'student'),
(10, 'logout', '2018-10-20 12:13:36', 1, 'student'),
(11, 'login', '2018-10-20 12:13:50', 3, 'teacher'),
(12, 'Grade Added', '2018-10-20 12:14:10', 3, 'admin'),
(13, 'logout', '2018-10-20 12:14:30', 3, 'teacher'),
(14, 'login', '2018-10-20 12:23:31', 4, 'admin'),
(15, 'login', '2018-10-31 13:08:54', 4, 'admin'),
(16, 'logout', '2018-10-31 13:21:35', 4, 'admin'),
(17, 'login', '2018-10-31 13:21:43', 4, 'admin'),
(18, 'Teacher Inserted', '2018-10-31 13:22:21', 4, 'admin'),
(19, 'Student Inserted', '2018-10-31 13:30:55', 4, 'admin'),
(20, 'Student Inserted', '2018-10-31 13:31:48', 4, 'admin'),
(21, 'Student Inserted', '2018-10-31 13:48:33', 4, 'admin'),
(22, 'Student Inserted', '2018-10-31 13:49:22', 4, 'admin'),
(23, 'Teacher Inserted', '2018-10-31 13:50:12', 4, 'admin'),
(24, 'logout', '2018-10-31 13:54:29', 4, 'admin'),
(25, 'login', '2018-10-31 13:54:52', 14, 'student'),
(26, 'logout', '2018-10-31 13:58:00', 14, 'student'),
(27, 'login', '2018-10-31 13:58:28', 14, 'student'),
(28, 'logout', '2018-10-31 13:58:46', 14, 'student'),
(29, 'login', '2018-10-31 14:01:40', 4, 'admin'),
(30, 'logout', '2018-10-31 14:53:11', 4, 'admin'),
(31, 'login', '2018-10-31 14:53:18', 14, 'student'),
(32, 'logout', '2018-10-31 14:53:37', 14, 'student'),
(33, 'login', '2018-11-01 07:14:26', 10, 'teacher'),
(34, 'logout', '2018-11-01 07:14:44', 10, 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `sc_id` int(11) NOT NULL,
  `sc_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`sc_id`, `sc_name`) VALUES
(4, 'Atis'),
(5, 'Saging'),
(6, 'Rambutan'),
(7, 'Bayabas'),
(8, 'XX'),
(9, 'Gora');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `sc_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fname`, `mname`, `lname`, `sc_id`, `username`, `password`, `picname`) VALUES
(11, 'Polll', 'pll', 'polll', 5, 'pol123', 'pol123', '43095443_2194479514142874_8382346268394913792_n_(1).jpg'),
(12, 'Nyin', 'Nya', 'Nyo', 5, 'nyoo', 'nyoo', '43095443_2194479514142874_8382346268394913792_n_(1)1.jpg'),
(13, 'uuu', 'uuu', 'uuu', 4, 'uuu', 'uuu', '43095443_2194479514142874_8382346268394913792_n_(1)7.jpg'),
(14, 'ppp', 'ppp', 'ppp', 4, 'ppp', 'ppp', '43095443_2194479514142874_8382346268394913792_n_(1)8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sb_id` int(11) NOT NULL,
  `sb_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sb_id`, `sb_name`) VALUES
(4, 'English'),
(5, 'Math'),
(6, 'History'),
(7, 'PHP2'),
(8, 'Datastruct'),
(9, 'YY');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `fname`, `mname`, `lname`, `username`, `password`, `picname`) VALUES
(3, 'Gian', 'Carlo', 'Cataraja', 'gian123', 'gian123', 'Screenshot_(1).png'),
(4, 'Emely', 'Rose', 'Villaceran', 'eme123', 'eme123', 'Screenshot_(2).png'),
(5, 'Sample1', 'Sample1', 'Sample1', 'sam123', 'sam123', 'Screenshot_(1)12.png'),
(6, 'Sample2', 'Sample2', 'Sample2', 'sam2123', 'sam2123', 'Screenshot_(1)13.png'),
(7, 'Hoy', 'Hey', 'Hay', 'hay123', '        ', 'Screenshot_(1)14.png'),
(8, 'John', 'Loui', 'Etcuban', 'john123', 'john123', 'Screenshot_(1)17.png'),
(9, 'Lala', 'Mae', 'Ribo', 'lala123', 'lala123', 'Busy.jpg'),
(10, 'hhh', 'hhh', 'hhh', 'hhh', 'hhh', '43095443_2194479514142874_8382346268394913792_n_(1)9.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `t_id` (`t_id`),
  ADD KEY `sc_id` (`sc_id`),
  ADD KEY `sb_id` (`sb_id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`sc_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sb_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `sc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `teacher` (`id`),
  ADD CONSTRAINT `class_ibfk_2` FOREIGN KEY (`sc_id`) REFERENCES `section` (`sc_id`),
  ADD CONSTRAINT `class_ibfk_3` FOREIGN KEY (`sb_id`) REFERENCES `subject` (`sb_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
