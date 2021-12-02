-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 02, 2021 at 08:53 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todoitems`
--

-- --------------------------------------------------------

--
-- Table structure for table `addeditems`
--

CREATE TABLE `addeditems` (
  `id` int(11) NOT NULL,
  `itemid` varchar(100) NOT NULL,
  `todoitem` varchar(200) NOT NULL,
  `statuses` text NOT NULL,
  `addeddate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addeditems`
--

INSERT INTO `addeditems` (`id`, `itemid`, `todoitem`, `statuses`, `addeddate`) VALUES
(1, 'TD_33432', 'rawlings', 'Pending', '2021-11-25 14:09:16'),
(2, 'TD_6191', 'Library Management System', 'Pending', '2021-11-25 13:16:53'),
(3, 'TD_25002', 'Project Store', 'Pending', '2021-11-25 13:02:57'),
(4, 'TD_21831', 'Spend Tracker', 'Done', '2021-11-25 16:39:51'),
(5, 'TD_31872', 'Random Quote Generator', 'Pending', '2021-11-25 13:33:14'),
(6, 'TD_25225', 'Chart App React', 'Pending', '2021-11-25 13:22:06'),
(7, 'TD_79013', 'Facebook Clone', 'Pending', '2021-11-25 13:05:31'),
(8, 'TD_37130', 'Hotel Management System', 'Pending', '2021-11-25 13:20:28'),
(9, 'TD_79552', 'Project Idears & to do', 'Pending', '2021-11-26 08:34:14'),
(10, 'TD_7783', 'Photography', 'Pending', '2021-11-26 08:34:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addeditems`
--
ALTER TABLE `addeditems`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addeditems`
--
ALTER TABLE `addeditems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
