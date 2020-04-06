-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2019 at 05:42 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_horrr`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `guest_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contactno` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`guest_id`, `username`, `password`, `firstname`, `lastname`, `address`, `contactno`) VALUES
(31, 'tito', 'bbsshadam', 'Tito ', 'Shadam', 'Bogor', '087870781168'),
(32, '', '', 'Alda', 'Febri', 'Bogor', '089889771672'),
(33, '', '', 'Rafli', 'Haryadi', 'Bogor', '087879817723'),
(34, '', '', 'Tito', 'Shadam', 'Bogor', '087870118921');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `price` varchar(11) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_type`, `price`, `photo`) VALUES
(1, 'Standard', '5000000', '1.jpg'),
(2, 'Superior', '7000000', '3.jpg'),
(3, 'Super Duper', '8000000', '4.jpg'),
(4, 'Sooltan', '10000000', '5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Cryan Fajri', 'cryan', 'day6', 'admin'),
(2, 'Tito Shadam', 'tito', 'bbsshadam', 'guest'),
(3, 'Tuffahati Sho', 'tupaa', 'anakkadal', 'guest'),
(4, 'tupa', 'tupacantiq', 'gatau', 'guest'),
(5, 'Rafli', 'rafli', 'rafli', 'guest'),
(7, 'Faiz Dika', 'daki', 'dakidika', 'guest'),
(8, 'Daki', 'dika', 'dakidika', 'guest'),
(9, 'Alda Febri', 'alda', 'alda123', 'guest'),
(10, 'Rafli Haryadi', 'arap', 'arap123', 'guest');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_no` int(5) NOT NULL,
  `status` varchar(20) NOT NULL,
  `days` int(2) NOT NULL,
  `checkin` date NOT NULL,
  `checkin_time` time NOT NULL,
  `checkout` date NOT NULL,
  `checkout_time` time NOT NULL,
  `bill` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `guest_id`, `room_id`, `room_no`, `status`, `days`, `checkin`, `checkin_time`, `checkout`, `checkout_time`, `bill`) VALUES
(27, 31, 2, 2, 'Check Out', 3, '2019-12-01', '10:15:19', '2019-12-01', '10:15:30', '21000000'),
(28, 32, 3, 3, 'Check Out', 5, '2019-12-05', '10:52:13', '2019-12-03', '10:52:16', '40000000'),
(29, 33, 3, 0, 'Pending', 0, '2019-12-07', '00:00:00', '0000-00-00', '00:00:00', ''),
(30, 34, 4, 0, 'Pending', 0, '2019-12-29', '00:00:00', '0000-00-00', '00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
