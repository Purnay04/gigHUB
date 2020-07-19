-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2020 at 10:23 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `comp`
--

CREATE TABLE `comp` (
  `comp_id` int(8) NOT NULL,
  `comp_name` varchar(50) NOT NULL,
  `comp_email` varchar(40) NOT NULL,
  `comp_area` varchar(60) NOT NULL,
  `comp_password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comp`
--

INSERT INTO `comp` (`comp_id`, `comp_name`, `comp_email`, `comp_area`, `comp_password`) VALUES
(1, 'Comito Pvt Ltd', 'comito@gmail.com', 'Pachgani,Satara 415002', 'comito'),
(2, 'SataraITSolution', 'SIT@gmail.com', 'near xyz ,satara', 'SIT'),
(3, 'AOJP', 'aojp@gmail.com', 'Austin          ', 'aojp'),
(4, 'Pacific Coast Healthcare', 'pchealthcare@gmail.com', 'San Diego', 'pch'),
(5, 'Absolute Consulting Group', 'absoluteconsgroup@gmail.com', 'Cincinnati', 'acg'),
(6, 'Go2Group LLC', 'go2group@gmail.com', ' Chicago, IL         ', 'go2'),
(7, 'Visionaire Partners', 'visionairepartners@gmail.com', 'New York, NY 10001 USA      ', 'Visionaire');

-- --------------------------------------------------------

--
-- Table structure for table `inserted_job`
--

CREATE TABLE `inserted_job` (
  `injob_id` int(8) NOT NULL,
  `comp_id` int(8) NOT NULL,
  `injob_title` varchar(50) NOT NULL,
  `injob_type` varchar(20) NOT NULL,
  `injob_date` date NOT NULL,
  `injob_pay` int(10) NOT NULL,
  `injob_exp` int(11) NOT NULL,
  `injob_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inserted_job`
--

INSERT INTO `inserted_job` (`injob_id`, `comp_id`, `injob_title`, `injob_type`, `injob_date`, `injob_pay`, `injob_exp`, `injob_desc`) VALUES
(5, 1, 'ui & ux', 'Full Time', '2019-10-05', 200000, 2, '         131313                   '),
(6, 1, 'web developer', 'Full Time', '2019-10-06', 650000, 3, 'None                        '),
(7, 2, 'Web developer', 'Full-Time', '2019-09-26', 200000, 1, 'xyz'),
(8, 2, 'UI & UX', 'Full-Time', '2019-09-03', 200000, 3, 'xyz'),
(9, 6, 'Web developer', 'Full-Time', '2019-10-09', 200000, 2, 'none'),
(10, 6, 'UI & UX', 'Full-Time', '2019-10-19', 200000, 2, 'We are looking for a Software Engineer to design, develop and test custom interfaces and data visualization elements for Business Intelligence software. He needs someone that can create new features as well as expand on the current client side reporting application that provides in depth records, dashboards and analytics for patients vitals.'),
(11, 1, '', 'Full Time', '2020-05-23', 200000, 0, '                            ');

-- --------------------------------------------------------

--
-- Table structure for table `under_scrutiny`
--

CREATE TABLE `under_scrutiny` (
  `us_id` int(8) NOT NULL,
  `injob_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `us_applieddate` date NOT NULL,
  `us_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `under_scrutiny`
--

INSERT INTO `under_scrutiny` (`us_id`, `injob_id`, `user_id`, `us_applieddate`, `us_status`) VALUES
(1, 6, 7, '2019-10-06', 'Falied'),
(2, 5, 7, '2019-10-06', 'Successful'),
(3, 7, 7, '2019-10-21', 'Falied'),
(4, 8, 9, '2019-10-02', 'Successful'),
(8, 9, 7, '2019-10-19', 'Successful'),
(9, 10, 7, '2019-10-19', 'Pending'),
(19, 10, 15, '2019-10-19', 'Pending'),
(20, 10, 7, '2020-05-23', 'Pending'),
(21, 10, 7, '2020-05-23', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(8) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `user_email` varchar(45) NOT NULL,
  `user_phone` bigint(10) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `resume` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_phone`, `user_password`, `resume`) VALUES
(7, 'Purnay', 'bargeamanpurnay087@gmail.com', 8329629259, '1', 'resume/7.pdf'),
(8, 'Shubham', 'bargeamanpurnay087@gmail.com', 4649846464, '2', ''),
(9, 'Nikita', 'Nikitaranjane14@gmail.com', 8605406850, 'nikita', ''),
(10, 'Samrudhi', 'sam@gmail.com', 2312312312, 'sam', ''),
(11, 'Pratik Sagar', 'ps@gmail.com', 312313131, '1234', ''),
(12, 'Shubham', 'shubham@gmail.com', 7276544534, 'Shubh@2510', ''),
(13, 'Omkar', 'om@gmail.com', 3131231313, 'om', ''),
(14, 'Yash', 'yash@gmail.com', 8329629259, 'password', 'resume/14.pdf'),
(15, 'Nishant', 'nisha@gmail.com', 313131313, 'ni', 'resume/15.pdf');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `tg_table1_insert` BEFORE INSERT ON `user` FOR EACH ROW BEGIN
  SET NEW.user_id = CONCAT('CUID', LAST_INSERT_ID(),4,'0');
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comp`
--
ALTER TABLE `comp`
  ADD PRIMARY KEY (`comp_id`);

--
-- Indexes for table `inserted_job`
--
ALTER TABLE `inserted_job`
  ADD PRIMARY KEY (`injob_id`),
  ADD KEY ` comp_id` (`comp_id`);

--
-- Indexes for table `under_scrutiny`
--
ALTER TABLE `under_scrutiny`
  ADD PRIMARY KEY (`us_id`),
  ADD KEY `injob_id` (`injob_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comp`
--
ALTER TABLE `comp`
  MODIFY `comp_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `inserted_job`
--
ALTER TABLE `inserted_job`
  MODIFY `injob_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `under_scrutiny`
--
ALTER TABLE `under_scrutiny`
  MODIFY `us_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inserted_job`
--
ALTER TABLE `inserted_job`
  ADD CONSTRAINT `comp_id ` FOREIGN KEY (`comp_id`) REFERENCES `comp` (`comp_id`);

--
-- Constraints for table `under_scrutiny`
--
ALTER TABLE `under_scrutiny`
  ADD CONSTRAINT `injob_id to this` FOREIGN KEY (`injob_id`) REFERENCES `inserted_job` (`injob_id`),
  ADD CONSTRAINT `user_id to us` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
