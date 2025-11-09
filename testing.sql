-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2025 at 09:17 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `item_quantity`) VALUES
(1, 1, 3, 2),
(2, 1, 4, 1),
(3, 1, 9, 2),
(4, 1, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_status` enum('Pending','Processing','Shipped','Received','Cancelled') NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `order_created` datetime NOT NULL DEFAULT current_timestamp(),
  `order_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_status`, `total_price`, `order_created`, `order_updated`) VALUES
(1, 1, 'Pending', 89.99, '2025-11-08 10:31:37', '2025-11-08 10:31:37'),
(2, 1, 'Processing', 49.99, '2025-11-01 17:31:37', '2025-11-03 17:31:37');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_desc` text NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_stock` int(11) NOT NULL,
  `product_img` varchar(512) NOT NULL,
  `product_added` datetime NOT NULL DEFAULT current_timestamp(),
  `product_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_desc`, `product_price`, `product_stock`, `product_img`, `product_added`, `product_updated`) VALUES
(1, 'Smart Fitness Scale', 'Gatehouse', 49.99, 20, 'http://dummyimage.com/233x100.png/ff4444/ffffff', '2025-02-03 13:02:58', '2025-08-07 10:13:37'),
(2, 'Garlic Parmesan Roasted Nuts', 'MacRierie', 4.89, 400, 'http://dummyimage.com/185x100.png/5fa2dd/ffffff', '2025-03-21 18:05:28', '2025-05-22 09:47:49'),
(3, 'Collapsible Water Bottle', 'McGahern', 12.99, 300, 'http://dummyimage.com/241x100.png/cc0000/ffffff', '2024-12-06 05:44:40', '2025-06-07 12:28:23'),
(4, 'Margherita Pizza', 'Arbon', 7.99, 110, 'http://dummyimage.com/138x100.png/ff4444/ffffff', '2025-01-28 17:16:57', '2025-09-21 03:42:16'),
(5, 'Vacuum Sealer Machine', 'Coomber', 89.99, 15, 'http://dummyimage.com/137x100.png/ff4444/ffffff', '2024-12-05 16:38:20', '2025-05-28 14:47:09'),
(6, 'Vegan Mac & Cheese', 'Gotthard.sf', 8.99, 100, 'http://dummyimage.com/250x100.png/ff4444/ffffff', '2024-12-05 21:17:21', '2025-07-24 08:06:18'),
(7, 'Cotton Sweatpants', 'Greatham', 29.99, 50, 'http://dummyimage.com/116x100.png/5fa2dd/ffffff', '2024-11-09 17:15:21', '2025-04-21 04:53:29'),
(8, 'Organic Vanilla Bean Ice Cream', 'Alessandrucci', 5.99, 200, 'http://dummyimage.com/240x100.png/dddddd/000000', '2025-01-13 18:58:56', '2025-05-02 09:50:11'),
(9, 'Maple Breakfast Sausage', 'Smeuin', 5.99, 350, 'http://dummyimage.com/160x100.png/5fa2dd/ffffff', '2025-03-02 00:31:48', '2025-10-12 10:14:17'),
(10, 'Spicy Thai Coconut Soup', 'Pyrke', 3.99, 125, 'http://dummyimage.com/134x100.png/5fa2dd/ffffff', '2025-02-25 13:32:39', '2025-06-01 21:51:35');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Customer'),
(2, 'Staff'),
(3, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `user_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `phone_number`, `user_created`) VALUES
(1, 'AverageJoe', 'user@email.com', '$2a$12$.zAFybakJ3NTdHo4BJANX.0LReEwe7Ts/V/NVPKmLCynYAd3H7AH2', '09123456789', '2025-11-08 10:09:30'),
(2, 'AdminLax', 'pro@email.com', '$2a$12$oOPpbDAkiBU5P5aRO7/wGOLQOldN.LxtQ5UJefr3kLo67ntGOEJ.u', '09987654321', '2025-11-08 10:12:01'),
(3, 'ChiefPadre', 'chief@email.com', '$2a$12$yT0UihDU9gxUSApd56ZS6efEUg2vWTgVOk4qsr3BMhCezgs85va.i', '09998765432', '2025-11-08 17:14:49'),
(9, 'Tester03', 'tester03@gmail.com', '$2y$10$JqWJW7h/5fgR/geu.ngi8.e4djbIjAFBalwUNetoIX8/uH7pV.2.W', '09381039305', '2025-11-09 09:20:05'),
(10, 'Tester04', 'tester04@gmail.com', '$2y$10$KrWAwrpGO3MotfvHwqw.Qu0VjgzbAu5k9gc6Ds0w7b9Ccggucsx.O', '09752313840', '2025-11-09 09:42:03'),
(11, 'terrabitha', 'terra@gmail.com', '$2y$10$v5g6hugxYWXhJhu5hxC3mOp91VWhhheP/9l7CevIXLNizePkr.xee', '09381920945', '2025-11-09 09:48:34'),
(12, 'Piss', 'piss@gmail.com', '$2y$10$tqB/Tchha.0S94UHLvBO1OZj4hRiQomhVCiJu2N47NxRuB9uS626O', '09831235678', '2025-11-09 09:51:59'),
(13, 'Pee', 'pee2@gmail.com', '$2y$10$XAwXQnrsp7SL0n1J3y/ICeG6I4shHBahljoCLsYwotDWhtvhmBSfK', '09321467965', '2025-11-09 09:53:57'),
(14, 'eee', 'e3@gmail.com', '$2y$10$d.rfcBBBARBOC.SkMpZFIeJz5MpXdifV.iQaV9zly9SPmYnYhRiYG', '09321093129', '2025-11-09 09:58:29'),
(15, 'eee; DROP TABLE users', 'sample@email.com', '$2y$10$AcagO/grLyskrk8jQIP8zuXMpINDkNg3nqmUB3j.H8Iyj/gD2jrEW', '09320130921', '2025-11-09 10:04:23'),
(16, 'DROP TABLE users;', 'fecal.funny@gmail.com', '$2y$10$8TusyokZ2W9AHIxQcLG3Du.79keH1UcCz3a5LtgJjyC/nVvfJn38.', '09321019301', '2025-11-09 10:05:19'),
(17, 'DROP TABLE roles;', 'drop@email.com', '$2y$10$QTSvFW3RpC1xzEspudZfU..8iHNWxanT.1fU/YvkOgV51JCcFp3si', '09421019301', '2025-11-09 10:27:28'),
(19, 'eeeeeeeee', 'ezzee@email.com', '$2y$10$PnpUzaFHsDhQCrSYRDgV5udknRr.FQpkFVSHZCLt6Fn1itDefa.Fy', '09120193901', '2025-11-09 11:25:18'),
(20, 'PeeR', 'pepe@gmail.com', '$2y$10$iFEbm70tv.kbBBhoV9PFp.hFWaAF0gAsVVuzk.rKxC0CwdaRe2UZy', '09213950192', '2025-11-09 11:52:36'),
(21, 'User2', 'user2@email.com', '$2y$10$y4yBbysORF7CpZekyfMLBuLnkgwRePZ3nbgncViAs7cRd8mK3FK0y', '09421550921', '2025-11-09 13:56:57'),
(22, 'admin2', 'admin@email.com', '$2y$10$klzzLeN3mlykiHcfjwwMdOryoN/vs8XJQtsje8T5SNy6fHTEcGZJi', '09213450951', '2025-11-09 14:08:22');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`user_role_id`, `user_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 3),
(3, 3, 2),
(5, 9, 1),
(6, 10, 1),
(7, 11, 1),
(8, 12, 1),
(9, 13, 1),
(10, 14, 1),
(11, 15, 1),
(12, 16, 1),
(13, 17, 1),
(15, 19, 1),
(16, 20, 1),
(17, 21, 1),
(18, 22, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `orders_ibfk_1` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_role_id`),
  ADD KEY `user_roles_ibfk_1` (`user_id`),
  ADD KEY `user_roles_ibfk_2` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
