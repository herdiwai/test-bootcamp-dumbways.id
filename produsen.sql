-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2020 at 04:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `produsen`
--

-- --------------------------------------------------------

--
-- Table structure for table `impotir_tb`
--

CREATE TABLE `impotir_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `impotir_tb`
--

INSERT INTO `impotir_tb` (`id`, `name`, `address`, `phone`) VALUES
(7, 'Swiss', 'jln. Swiss no.44', '089321314232'),
(8, 'Amerika', 'jln. paman sam no.50', '0223314444');

-- --------------------------------------------------------

--
-- Table structure for table `produk_tb`
--

CREATE TABLE `produk_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `impotir_id` int(11) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_tb`
--

INSERT INTO `produk_tb` (`id`, `name`, `impotir_id`, `photo`, `qty`, `price`) VALUES
(8, 'Sepedah Gunung biasa', 5, 'sepeda2.jpg', 25, 'Rp. 5.000.000'),
(9, 'Sepeda Gunung Giant', 7, 'sepeda1.jpg', 11, 'Rp. 4.000.000'),
(10, 'Sepeda Gunung Trek', 8, 'sepeda3.jpeg', 40, 'Rp. 2.500.000'),
(11, '$name', 0, '$photo', 0, '$price');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `impotir_tb`
--
ALTER TABLE `impotir_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk_tb`
--
ALTER TABLE `produk_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `impotir_id` (`impotir_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk_tb`
--
ALTER TABLE `produk_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `impotir_tb`
--
ALTER TABLE `impotir_tb`
  ADD CONSTRAINT `impotir_tb_ibfk_1` FOREIGN KEY (`id`) REFERENCES `produk_tb` (`impotir_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
