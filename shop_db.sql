-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2023 at 01:53 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`) VALUES
(1, 'Admin', '7af2d10b73ab7cd8f603937f7697cb5fe432c7ff');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(1, 1, 10, 'TULLE PRINTED GATHERED DRESS', 82, 1, 'TULLE PRINTED GATHERED DRESS 1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(1, 1, 'Diona','diona.orllani@gmail.com' '049676060', 'You\'re the best!!');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(1, 1, 'Diona', '049676060', 'diona.orllani@gmail.com', 'cash on delivery', 'flat no. 7, \"Meshari\";, Prishtine, Kosovo, Kosovo - 10000', 'VOLUMINOUS FLORAL DRESS (97 x 2) - ', 194, '2023-02-26', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(10) NOT NULL,
  `image_01` varchar(100) NOT NULL,
  `image_02` varchar(100) NOT NULL,
  `image_03` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `details`, `price`, `image_01`, `image_02`, `image_03`) VALUES
(4, 'CROPPED TUXEDO BLAZER', 'CROPPED TUXEDO BLAZER', 78, 'CROPPED TUXEDO BLAZER.png.jpg', 'CROPPED TUXEDO BLAZER 2.jpg', 'CROPPED TUXEDO BLAZER 3.jpg'),
(5, 'VOLUMINOUS FLORAL DRESS', 'VOLUMINOUS FLORAL DRESS', 97, 'VOLUMINOUS FLORAL DRESS 1.jpg', 'VOLUMINOUS FLORAL DRESS 2.jpg', 'VOLUMINOUS FLORAL DRESS 3.jpg'),
(8, 'MIDI DRESS WITH FEATHERS', 'MIDI DRESS WITH FEATHERS', 78, 'MIDI DRESS WITH FEATHERS 1.jpg', 'MIDI DRESS WITH FEATHERS 2.jpg', 'MIDI DRESS WITH FEATHERS 3.jpg'),
(9, 'TULLE BODYSUIT', 'TULLE BODYSUIT', 46, 'TULLE BODYSUIT 1.jpg', 'TULLE BODYSUIT 2.jpg', 'TULLE BODYSUIT 3.jpg'),
(10, 'TULLE PRINTED GATHERED DRESS', 'TULLE PRINTED GATHERED DRESS', 82, 'TULLE PRINTED GATHERED DRESS 1.jpg', 'TULLE PRINTED GATHERED DRESS 2.jpg', 'TULLE PRINTED GATHERED DRESS 3.jpg'),
(11, 'BODYSUIT WITH SHOULDER PADS AND BOW', 'BODYSUIT WITH SHOULDER PADS AND BOW', 52, 'BODYSUIT WITH SHOULDER PADS AND BOW 1.jpg', 'BODYSUIT WITH SHOULDER PADS AND BOW 2.jpg', 'BODYSUIT WITH SHOULDER PADS AND BOW 3.jpg'),
(12, 'WIDE LEG FIT LONG LENGTH JEANS', 'WIDE LEG FIT LONG LENGTH JEANS', 46, 'WIDE LEG FIT LONG LENGTH JEANS 1.jpg', 'WIDE LEG FIT LONG LENGTH JEANS 2.jpg', 'WIDE LEG FIT LONG LENGTH JEANS 3.jpg'),
(13, 'CHECK OVERSHIRT', 'CHECK OVERSHIRT', 45, 'CHECK OVERSHIRT 1.jpg', 'CHECK OVERSHIRT 2.jpg', 'CHECK OVERSHIRT 3.jpg'),
(14, 'COMBINED QUILTED WINDPROOF AND WATERPROOF BOOTS', 'COMBINED QUILTED WINDPROOF AND WATERPROOF BOOTS', 89, 'COMBINED QUILTED WINDPROOF AND WATERPROOF BOOTS 1.jpg', 'COMBINED QUILTED WINDPROOF AND WATERPROOF BOOTS 2.jpg', 'COMBINED QUILTED WINDPROOF AND WATERPROOF BOOTS 3.jpg'),
(15, 'FAUX FUR CARDIGAN', 'FAUX FUR CARDIGAN', 93, 'FAUX FUR CARDIGAN 1.jpg', 'FAUX FUR CARDIGAN 2.jpg', 'FAUX FUR CARDIGAN 3.jpg'),
(16, 'SOFT SWEATSHIRT', 'SOFT SWEATSHIRT', 32, 'SOFT SWEATSHIRT 1.jpg', 'SOFT SWEATSHIRT 2.jpg', 'SOFT SWEATSHIRT 3.jpg'),
(18, 'ASYMMETRIC BUSTIER', 'ASYMMETRIC BUSTIER', 36, 'ASYMMETRIC BUSTIER 1.jpg', 'ASYMMETRIC BUSTIER 2.jpg', 'ASYMMETRIC BUSTIER 3.jpg'),
(19, 'STRAIGHT OVERSIZE BLAZER', 'STRAIGHT OVERSIZE BLAZER', 54, 'STRAIGHT OVERSIZE BLAZER 1.jpg', 'STRAIGHT OVERSIZE BLAZER 2.jpg', 'STRAIGHT OVERSIZE BLAZER 3.jpg'),
(20, 'CHAIN TOP WITH RHINESTONES', 'CHAIN TOP WITH RHINESTONES', 127, 'CHAIN TOP WITH RHINESTONES 1.jpg', 'CHAIN TOP WITH RHINESTONES 2.jpg', 'CHAIN TOP WITH RHINESTONES 3.jpg'),
(21, 'WOOL BLEND DOUBLE-BREASTED COAT', 'WOOL BLEND DOUBLE-BREASTED COAT', 82, 'WOOL BLEND DOUBLE-BREASTED COAT 1.jpg', 'WOOL BLEND DOUBLE-BREASTED COAT 2.jpg', 'WOOL BLEND DOUBLE-BREASTED COAT 3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Diona', 'diona.orllani@gmail.com', 'a1b4c24d4c74e02cad9780505f35d672b0556925');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `pid`, `name`, `price`, `image`) VALUES
(1, 1, 20, 'CHAIN TOP WITH RHINESTONES', 127, 'CHAIN TOP WITH RHINESTONES 1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
