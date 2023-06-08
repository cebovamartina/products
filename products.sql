-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2023 at 10:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `products`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products`
(
    `id`          int(11) NOT NULL,
    `sku`         varchar(100)   NOT NULL,
    `name`        varchar(100)   NOT NULL,
    `price`       decimal(10, 2) NOT NULL,
    `productType` varchar(100)   NOT NULL,
    `size`        int(10) NOT NULL DEFAULT 0,
    `weight`      int(10) NOT NULL DEFAULT 0,
    `height`      int(10) NOT NULL DEFAULT 0,
    `width`       int(10) NOT NULL DEFAULT 0,
    `length`      int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `price`, `productType`, `size`, `weight`, `height`, `width`, `length`)
VALUES (41, 'JVC200123', 'Acme DISC', 1.00, 'DVD', 700, 0, 0, 0, 0),
       (42, 'JVC200123', 'Acme DISC', 1.00, 'DVD', 700, 0, 0, 0, 0),
       (43, 'JVC200123', 'Acme DISC', 1.00, 'DVD', 700, 0, 0, 0, 0),
       (44, 'JVC200123', 'Acme DISC', 1.00, 'DVD', 700, 0, 0, 0, 0),
       (45, 'GGWP0007', 'War and Peace', 20.00, 'Book', 0, 2, 0, 0, 0),
       (46, 'GGWP0007', 'War and Peace', 20.00, 'Book', 0, 2, 0, 0, 0),
       (47, 'GGWP0007', 'War and Peace', 20.00, 'Book', 0, 2, 0, 0, 0),
       (48, 'GGWP0007', 'War and Peace', 20.00, 'Book', 0, 2, 0, 0, 0),
       (49, 'TR120555', 'Chair', 40.00, 'Furniture', 0, 0, 24, 45, 15),
       (50, 'TR120555', 'Chair', 40.00, 'Furniture', 0, 0, 24, 45, 15),
       (51, 'TR120555', 'Chair', 40.00, 'Furniture', 0, 0, 24, 45, 15),
       (52, 'TR120555', 'Chair', 40.00, 'Furniture', 0, 0, 24, 45, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
