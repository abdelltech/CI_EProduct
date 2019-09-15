-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2018 at 03:40 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_products`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_category`
--

CREATE TABLE `t_category` (
  `idCategory` int(11) NOT NULL,
  `labelCategory` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_category`
--

INSERT INTO `t_category` (`idCategory`, `labelCategory`) VALUES
(1, 'vegetables'),
(2, 'fruits');

-- --------------------------------------------------------

--
-- Table structure for table `t_membre`
--

CREATE TABLE `t_membre` (
  `id` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_membre`
--

INSERT INTO `t_membre` (`id`, `login`, `email`, `pass`, `access`) VALUES
(6, 'wafaa', 'lp@gmail.com', 'wafaa', 1),
(7, 'abdelwahab', 'abdo@gmail.com', 'developer', 2);

-- --------------------------------------------------------

--
-- Table structure for table `t_product`
--

CREATE TABLE `t_product` (
  `idProduct` int(11) NOT NULL,
  `idCategory` int(11) DEFAULT NULL,
  `labelProduct` varchar(30) DEFAULT NULL,
  `priceProduct` int(11) DEFAULT NULL,
  `qteProduct` int(11) DEFAULT NULL,
  `photoProduct` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_product`
--

INSERT INTO `t_product` (`idProduct`, `idCategory`, `labelProduct`, `priceProduct`, `qteProduct`, `photoProduct`) VALUES
(1, 2, 'apples', 10, 20, 'apples.jpg'),
(2, 2, 'avocado', 20, 0, 'avocado.jpg'),
(4, 2, 'blueberries', 14, 14, 'blueberries.jpg'),
(5, 1, 'carrots', 15, 20, 'carrot.jpg'),
(8, 2, 'raspberries', 22, 20, 'raspberries.jpg'),
(9, 2, 'tomatoes', 14, 10, 'tomato.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_category`
--
ALTER TABLE `t_category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Indexes for table `t_membre`
--
ALTER TABLE `t_membre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_product`
--
ALTER TABLE `t_product`
  ADD PRIMARY KEY (`idProduct`),
  ADD KEY `t_product_ibfk_1` (`idCategory`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_category`
--
ALTER TABLE `t_category`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_membre`
--
ALTER TABLE `t_membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `t_product`
--
ALTER TABLE `t_product`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_product`
--
ALTER TABLE `t_product`
  ADD CONSTRAINT `t_product_ibfk_1` FOREIGN KEY (`idCategory`) REFERENCES `t_category` (`idCategory`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
