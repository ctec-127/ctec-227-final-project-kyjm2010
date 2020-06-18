-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2020 at 07:38 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(14, 'Inlay Earrings'),
(15, 'Engraved Earrings');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_amount` float NOT NULL,
  `order_transaction` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_currency` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_amount`, `order_transaction`, `order_status`, `order_currency`) VALUES
(40, 49.98, '3453434', 'Completed', 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `short_desc` text NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_category_id`, `product_price`, `product_qty`, `product_description`, `short_desc`, `product_image`) VALUES
(10, 'Sloth Stud Earrings', 14, 22, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In consequat sit amet arcu quis ultrices. In ullamcorper diam in ante tempor, quis scelerisque leo euismod. Nam ac laoreet enim. Pellentesque sed interdum sem. Cras tristique lacus eu eros commodo ullamcorper. Sed molestie dapibus est, suscipit dapibus nulla ultrices non. Aenean aliquet odio sit amet odio malesuada, vitae porta ligula porttitor. Sed cursus lectus ut tincidunt laoreet. Nullam nunc tortor, maximus ac pulvinar in, semper nec dolor. Nam et mauris quis magna pellentesque tristique. Proin augue ex, posuere eget leo ut, dignissim pellentesque quam. Sed sed blandit nibh, ac dignissim tortor. Nunc pretium ultricies lacus ut rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus nisl est, semper et dui id, congue tincidunt mauris.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In consequat sit amet arcu quis ultrices. In ullamcorper diam in ante tempor, quis scelerisque leo euismod. Nam ac laoreet enim. Pellentesque sed interdum sem. Cras tristique lacus eu eros commodo u', 'IMG_4096.JPG'),
(11, 'Corgi Butt Stud Earrings', 14, 22, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In consequat sit amet arcu quis ultrices. In ullamcorper diam in ante tempor, quis scelerisque leo euismod. Nam ac laoreet enim. Pellentesque sed interdum sem. Cras tristique lacus eu eros commodo ullamcorper. Sed molestie dapibus est, suscipit dapibus nulla ultrices non. Aenean aliquet odio sit amet odio malesuada, vitae porta ligula porttitor. Sed cursus lectus ut tincidunt laoreet. Nullam nunc tortor, maximus ac pulvinar in, semper nec dolor. Nam et mauris quis magna pellentesque tristique. Proin augue ex, posuere eget leo ut, dignissim pellentesque quam. Sed sed blandit nibh, ac dignissim tortor. Nunc pretium ultricies lacus ut rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus nisl est, semper et dui id, congue tincidunt mauris.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In consequat sit amet arcu quis ultrices. In ullamcorper diam in ante tempor, quis scelerisque leo euismod. Nam ac laoreet enim. Pellentesque sed interdum sem. Cras tristique lacus eu eros commodo u', 'IMG_4079.JPG'),
(12, 'Skull Stud Earrings', 14, 22, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In consequat sit amet arcu quis ultrices. In ullamcorper diam in ante tempor, quis scelerisque leo euismod. Nam ac laoreet enim. Pellentesque sed interdum sem. Cras tristique lacus eu eros commodo ullamcorper. Sed molestie dapibus est, suscipit dapibus nulla ultrices non. Aenean aliquet odio sit amet odio malesuada, vitae porta ligula porttitor. Sed cursus lectus ut tincidunt laoreet. Nullam nunc tortor, maximus ac pulvinar in, semper nec dolor. Nam et mauris quis magna pellentesque tristique. Proin augue ex, posuere eget leo ut, dignissim pellentesque quam. Sed sed blandit nibh, ac dignissim tortor. Nunc pretium ultricies lacus ut rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus nisl est, semper et dui id, congue tincidunt mauris.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In consequat sit amet arcu quis ultrices. In ullamcorper diam in ante tempor, quis scelerisque leo euismod. Nam ac laoreet enim. Pellentesque sed interdum sem. Cras tristique lacus eu eros commodo u', 'IMG_4094.JPG'),
(13, 'Fox Inlay Earrings', 14, 22, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla imperdiet convallis felis, a fringilla lacus mollis non. Nunc sodales mi in felis lacinia, vitae tristique massa pretium. Aenean ante tortor, dapibus non tempor eget, posuere nec massa. Aliquam velit enim, pellentesque quis est sit amet, imperdiet sodales augue. Phasellus pellentesque, dui ut ultrices luctus, quam urna volutpat urna, facilisis venenatis nunc nisi eget eros. Sed dignissim leo et tellus lacinia, sed pulvinar magna aliquam. Quisque pretium porttitor tristique. Cras dictum luctus eros in imperdiet. Quisque in est id eros varius rhoncus vitae vestibulum metus. In at velit sed mauris posuere consequat. Nunc dapibus scelerisque quam eu dignissim. Morbi blandit dui eu mi dignissim commodo vitae vitae augue.\\\\r\\\\n\\\\r\\\\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In consequat sit amet arcu quis ultrices. In ullamcorper diam in ante tempor, quis scelerisque leo euismod. Nam ac laoreet enim. Pellentesque sed interdum sem. Cras tristique lacus eu eros commodo u', 'IMG_4080.JPG'),
(14, 'Boston Terrier Inlay Earrings', 14, 22, 13, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla imperdiet convallis felis, a fringilla lacus mollis non. Nunc sodales mi in felis lacinia, vitae tristique massa pretium. Aenean ante tortor, dapibus non tempor eget, posuere nec massa. Aliquam velit enim, pellentesque quis est sit amet, imperdiet sodales augue. Phasellus pellentesque, dui ut ultrices luctus, quam urna volutpat urna, facilisis venenatis nunc nisi eget eros. Sed dignissim leo et tellus lacinia, sed pulvinar magna aliquam. Quisque pretium porttitor tristique. Cras dictum luctus eros in imperdiet. Quisque in est id eros varius rhoncus vitae vestibulum metus. In at velit sed mauris posuere consequat. Nunc dapibus scelerisque quam eu dignissim. Morbi blandit dui eu mi dignissim commodo vitae vitae augue.\\r\\n\\r\\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In consequat sit amet arcu quis ultrices. In ullamcorper diam in ante tempor, quis scelerisque leo euismod. Nam ac laoreet enim. Pellentesque sed interdum sem. Cras tristique lacus eu eros commodo u', 'IMG_4100.JPG'),
(15, 'Owl Stud Earrings', 15, 18, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla imperdiet convallis felis, a fringilla lacus mollis non. Nunc sodales mi in felis lacinia, vitae tristique massa pretium. Aenean ante tortor, dapibus non tempor eget, posuere nec massa. Aliquam velit enim, pellentesque quis est sit amet, imperdiet sodales augue. Phasellus pellentesque, dui ut ultrices luctus, quam urna volutpat urna, facilisis venenatis nunc nisi eget eros. Sed dignissim leo et tellus lacinia, sed pulvinar magna aliquam. Quisque pretium porttitor tristique. Cras dictum luctus eros in imperdiet. Quisque in est id eros varius rhoncus vitae vestibulum metus. In at velit sed mauris posuere consequat. Nunc dapibus scelerisque quam eu dignissim. Morbi blandit dui eu mi dignissim commodo vitae vitae augue.\\r\\n\\r\\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla imperdiet convallis felis, a fringilla lacus mollis non. Nunc sodales mi in felis lacinia, vitae tristique massa pretium.', 'IMG_4099.JPG'),
(17, 'Panda Earring Studs', 15, 18, 20, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec interdum iaculis velit, id eleifend sem tempus eu. Sed ultrices ullamcorper leo, a tempor quam accumsan mollis. Cras pellentesque eu diam vitae porttitor. Cras nec magna eget justo lacinia finibus. Integer sollicitudin finibus diam, ut consectetur nulla cursus vitae. Nam aliquet ullamcorper nisl, sit amet vestibulum urna interdum eu. Suspendisse potenti. Integer convallis a nibh nec accumsan.\r\n\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec interdum iaculis velit, id eleifend sem tempus eu', 'IMG_4088.JPG'),
(20, 'Bigfoot Print Stud Earrings', 15, 18, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pellentesque ultricies mattis. Nam ultricies, sapien sit amet tristique malesuada, sapien nisi blandit orci, vitae lobortis magna mi a purus. Integer sit amet metus hendrerit, egestas augue at, elementum purus. Sed faucibus feugiat felis, id cursus odio elementum non. Vivamus dignissim at lacus nec aliquet. Vivamus consequat, turpis nec posuere rutrum, metus nunc dapibus libero, sed ornare odio nisi in nunc. Aenean auctor, augue eget malesuada condimentum, erat dui aliquet nunc, vel maximus augue ex ut ipsum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pellentesque ultricies mattis.', 'IMG_4089.JPG'),
(21, 'Dragons Hide Scented Candle', 0, 20, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse velit lectus, finibus sit amet arcu eget, eleifend convallis elit. Etiam dolor risus, fringilla non est eu, porttitor suscipit lacus. Nam a gravida massa. Suspendisse vulputate dignissim nulla, lacinia cursus neque. Quisque aliquet, libero nec pretium bibendum, ante nibh gravida odio, nec euismod erat magna ut quam. Curabitur ac metus pharetra, accumsan enim quis, consequat libero. Etiam quam lectus, varius et lacus nec, sodales placerat erat. Ut consequat arcu at velit commodo, at bibendum nibh aliquam. Donec interdum nisi vel purus porttitor, nec dictum arcu pretium.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse velit lectus, finibus sit amet arcu eget, eleifend convallis elit.', '99118314_590402551575304_6060249496615387136_o.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product`, `user`, `rating`, `comment`) VALUES
(32, 10, 'jehayne2016', 5, ''),
(33, 1, 'jehayne2016', 1, ''),
(34, 12, 'jehayne2016', 5, ''),
(66, 1, 'kyjm2010', 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user',
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_type`, `first_name`, `last_name`, `user_name`, `email`, `password`) VALUES
(1, 'admin', 'Kyle', 'McDonald', 'kyjm2010', 'kyjm2010@gmail.com', '0177dd3f00e61ced669a6efe3310dc5b241d20efc7bfa5d8b17846c77940271df5a35c2bb0e5b5563817d8e837527101b1eb815c97459d5d7a3521583c2a9735'),
(2, 'user', 'Sarah', 'Bruce', 'jehayne2016', 'jehayne2016@gmail.com', 'fd7a0d7a13ba7fa155406bbd0050f1c2f8cbecf01d445aa4caa52abce325c172475449ae1720117edc0ead0b518530db600c4af26ebcde4dee0ca2d3de912155'),
(17, 'user', 'Mike', 'McManus', 'jmac', 'example@example.com', '5b722b307fce6c944905d132691d5e4a2214b7fe92b738920eb3fce3a90420a19511c3010a0e7712b054daef5b57bad59ecbd93b3280f210578f547f4aed4d25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
