-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 08, 2023 at 03:09 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `parent` varchar(200) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `thumb` varchar(200) NOT NULL DEFAULT 'placeholder.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent`, `description`, `thumb`) VALUES
(1, 'Bags', '', 'Product Details Cream-coloured regular Button-down lapel shirt jacket Gather effect at the waist Tie up detail at the front V-neck, long sleeves, flared sleeves Woven Size & Fit The model (height 5\'8) is wearing a size S Material & Care 100% Modal Satin Dry Clean', 'placeholder.png'),
(2, 'rfrefrf', '', '', 'placeholder.png'),
(3, 'rfrefrf', '', '', 'placeholder.png');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `r_price` int(15) NOT NULL,
  `s_price` varchar(15) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `category` varchar(300) NOT NULL,
  `stock` varchar(50) NOT NULL DEFAULT '0',
  `image` varchar(200) NOT NULL DEFAULT 'placeholder.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `r_price`, `s_price`, `description`, `category`, `stock`, `image`) VALUES
(62, 'Cream-Coloured Empire Top', 400, '400', 'Product Details Cream-coloured regular Button-down lapel shirt jacket Gather effect at the waist Tie up detail at the front V-neck, long sleeves, flared sleeves Woven Size & Fit The model (height 5\'8) is wearing a size S Material & Care 100% Modal Satin Dry Clean', 'Tops', '30', '229222-Cream-Coloured-Empire-Top.webp'),
(85, 'Cream-Coloured Empire Top', 300, '200', 'evervrve', 'Tops', '0', '663019-home_featured.png'),
(87, 'Shopping Bags', 500, '100', 'sdbrgrg egergegr ergrehe', 'Bags', '100', 'placeholder.png');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `value` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`) VALUES
(1, 'siteurl', 'http://localhost/project/'),
(2, 'currency', '€');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL DEFAULT 'customer',
  `image` varchar(200) NOT NULL DEFAULT 'default_avtar.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `type`, `image`) VALUES
(6, 'admin', 'admin', 'nikul.techworld@icloud.com', 'admin', '555237-FB_IMG_1627740411228.jpg'),
(14, 'nikulpatel', 'meAGeF2UR7ebvVh', 'patelnikul@gm.com', 'admin', '277583-sports_band.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
