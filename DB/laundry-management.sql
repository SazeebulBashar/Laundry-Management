-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Generation Time: Sep 16, 2023 at 05:05 PM
=======
-- Generation Time: Sep 16, 2023 at 04:53 PM
>>>>>>> 0a1a6a97fd60c19b12c7d5e59c68d8efc7ecbe39
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
-- Database: `laundry-management`
--

-- --------------------------------------------------------

--
-- Table structure for table `completed_orders`
--

CREATE TABLE `completed_orders` (
  `order_id` int(5) NOT NULL,
  `service_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `running_orders`
--

CREATE TABLE `running_orders` (
  `order_id` int(5) NOT NULL,
  `service_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `s_id` int(10) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(5) NOT NULL,
  `img_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`s_id`, `title`, `description`, `price`, `img_url`) VALUES
(1, 'Regular wash and Ironing', 'Stater Package. Provide services starting from washing your clothes to ironing and pressing.', 9, 'regular_wash.jpg'),
(2, 'Wash and Fold Service', 'Great service at cheap Price. We take your dirty laundry, and wash, dry, fold, and package it for you.', 16, 'wash_fold.jpg'),
(3, 'Dry Cleaning', 'Offer dry cleaning services for delicate or special-care garments that cannot be machine washed.', 19, 'dry_cleaning.jpg'),
(4, 'Express Service', 'Offer faster turnaround times for you who need their laundry done urgently.', 39, 'express.jpg'),
(5, 'Ironing and Pressing', 'Provide ironing and pressing services to ensure your clothing is wrinkle-free and well-presented.', 12, 'ironing_pressing.jpeg'),
(6, 'Stain Removal', 'Specialize in stain removal techniques to tackle tough stains and maintain the quality of clothing.', 30, 'Stain.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `full_name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `address`) VALUES
(1, 'Sazeebul Bashar', 'sazeebul@gmail.com', '$2y$10$r0R3pzIZduXJo83YdLuTT.pl83a5fEO0ryl2.0aLjhUkmnHyraGRW', 'Khilgaon, Dhaka, Bangladesh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `completed_orders`
--
ALTER TABLE `completed_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `running_orders`
--
ALTER TABLE `running_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `running_orders`
--
ALTER TABLE `running_orders`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `s_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
