-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2022 at 02:34 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `img` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `category`, `price`, `img`, `description`, `user_id`, `category_id`) VALUES
(1, 'Hamburger', 'hamburger', 1.5, 'https://i.imgur.com/k8Dr3hU.jpg', 'Hamburgers are traditionally made with ground beef and served with onions, tomatoes, lettuce, ketchup, and other garnishes. ', 3, '0'),
(2, 'Pizza Margarita', 'pizza', 1.5, 'https://i.imgur.com/w7ABCyA.jpg', 'pizza some combination of olive oil, oregano, tomato, olives, mozzarella or other cheese, and many other ingredients..pizza some combination of olive oil, oregano, tomato, olives, mozzarella or other cheese, and many other ingredients..', 3, '0'),
(3, 'Coca Cola', 'pijet', 0.99, 'https://i.imgur.com/9AAVRv0.jpg', 'Pijet freskuese.... Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt...  ', 3, '0'),
(4, 'Pasta Bolognese', 'pasta', 2.5, 'https://i.imgur.com/Et9MJrc.jpg', 'Spaghetti bolognese consists of spaghetti with an Italian ragù (meat sauce) made with minced beef, bacon and tomatoes, served with Parmesan cheese. , ', 3, '0'),
(5, 'Torte me dredhëz', 'torte', 3, 'https://i.imgur.com/8sidexx.jpg', 'strawberry shortcake is a biscuit with whipped cream and fresh strawberries.', 3, '0'),
(6, 'Chicken Burger', 'hamburger', 1.99, 'https://i.imgur.com/APosKzc.jpg', 'hamburger (grilled/broiled ground meat patty) made from ground chicken, which is the only time it would actually be a “chicken burger.', 3, '0'),
(7, 'Caj', 'pijet', 0.99, 'https://i.imgur.com/yZtWbZr.jpg', 'Black tea is first withered to induce protein breakdown and reduce water…', 3, '0'),
(8, 'Hot Chocolate', 'pijet', 1.99, 'https://i.imgur.com/Xt23r6W.jpg', 'Hot chocolate, heated milk or water, and usually a sweetener like whipped cream or marshmallows.', 3, '0'),
(9, 'File pule', 'dreka', 2.99, 'https://i.imgur.com/9foum5k.jpg', 'File Pule pa salcë. File Pule me salcë këpurdhash. File Pule me salcë Escalopo. File Pule me salcë portokalli. .', 3, '0'),
(10, 'Pizza me kërpudha', 'pizza', 1.5, 'https://i.imgur.com/1qPn2gY.jpg', 'Mushroom & Herb Pizza, the crust is light, crispy and oh so flavorful. The mushrooms are earthy, plump, and a bit ...', 3, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
