-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2018 at 02:27 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eradionica`
--

-- --------------------------------------------------------

--
-- Table structure for table `ukupno`
--

CREATE TABLE `ukupno` (
  `num` int(11) NOT NULL,
  `oib` int(11) DEFAULT NULL,
  `rez_vrijeme` FLOAT DEFAULT NULL,
  `mjesec` int(11) DEFAULT NULL,
  `godina` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ukupno`
--

INSERT INTO `ukupno` (`num`, `oib`, `rez_vrijeme`, `mjesec`, `godina`) VALUES
(1, 331215335, 4, 4, 2017);

-- --------------------------------------------------------

--
-- Table structure for table `ulaz`
--

CREATE TABLE `ulaz` (
  `indeks` int(11) NOT NULL,
  `oib` int(11) DEFAULT NULL,
  `ime` varchar(255) NOT NULL,
  `prezime` varchar(255) DEFAULT NULL,
  `vr_ulaz` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ulaz`
--

INSERT INTO `ulaz` (`indeks`, `oib`, `ime`, `prezime`, `vr_ulaz`) VALUES
(1, 331215335, 'David', 'Zovko', '2017/04/04 10:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ukupno`
--
ALTER TABLE `ukupno`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `ulaz`
--
ALTER TABLE `ulaz`
  ADD PRIMARY KEY (`indeks`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ukupno`
--
ALTER TABLE `ukupno`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ulaz`
--
ALTER TABLE `ulaz`
  MODIFY `indeks` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
