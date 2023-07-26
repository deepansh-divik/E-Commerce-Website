-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2023 at 06:31 PM
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
-- Database: `acmegrade_project_webd`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartid`, `pid`, `userid`, `create_date`) VALUES
(17, 4, 7, '2023-07-24 14:29:23');

-- --------------------------------------------------------

--
-- Table structure for table `deliveredorders`
--

CREATE TABLE `deliveredorders` (
  `orderid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deliveredorders`
--

INSERT INTO `deliveredorders` (`orderid`, `pid`, `userid`, `create_date`) VALUES
(4, 5, 9, '2023-07-22 11:53:23'),
(5, 5, 5, '2023-07-22 11:57:48'),
(6, 5, 7, '2023-07-24 14:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `userid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`userid`, `orderid`, `pid`, `create_date`) VALUES
(9, 3, 4, '2023-07-22 09:08:27'),
(9, 5, 6, '2023-07-22 09:08:27'),
(5, 8, 5, '2023-07-22 11:56:40'),
(5, 9, 6, '2023-07-22 11:56:40'),
(5, 10, 9, '2023-07-22 11:56:40'),
(7, 12, 9, '2023-07-24 14:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `details` text NOT NULL,
  `imgpath` varchar(250) NOT NULL,
  `uploaded_by` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `name`, `price`, `details`, `imgpath`, `uploaded_by`, `created_date`) VALUES
(4, 'Lord of the Rings bookset', 3300, 'This is a book set of Lord of the Rings consisting of 3 books written by J.R.R Tolkien.', '../shared/images/lord of the rings.jpg', 4, '2023-07-16 17:48:11'),
(5, 'Bookmarks', 200, 'Here are some beautiful and inspiring bookmarks to keep you motivated while you read your book.', '../shared/images/bookmarks1.jpg', 4, '2023-07-16 18:22:05'),
(6, 'Pens', 350, 'A beautiful pen to write some beautiful text', '../shared/images/golden pens.jpg', 4, '2023-07-16 18:28:26'),
(9, 'Harry Potter merch', 4200, 'This merchandise will take you to Hogwarts', '../shared/images/harrypotter merch.webp', 8, '2023-07-17 14:29:50');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `user_type`, `password`, `create_date`) VALUES
(4, 'Divik', 'vendor', '2858015d63e28f413f13ad47d9199de0', '2023-07-15 11:09:39'),
(5, 'ishu', 'customer', '3e61dae7f9f16e9b40f5084df17fd417', '2023-07-15 11:32:40'),
(7, 'aditi', 'customer', '9d91186f3d16faf3bbedc70e23e8d193', '2023-07-15 16:17:55'),
(8, 'zomya', 'vendor', '67564f0c99b809a7c149cd88b8faff0a', '2023-07-15 16:18:19'),
(9, 'medusa', 'customer', '1068f877f9f5087ddcc602f68870d534', '2023-07-15 16:18:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `deliveredorders`
--
ALTER TABLE `deliveredorders`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `deliveredorders`
--
ALTER TABLE `deliveredorders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
