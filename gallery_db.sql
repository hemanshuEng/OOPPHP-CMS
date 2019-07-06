-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2019 at 09:55 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `photo_id`, `author`, `body`) VALUES
(2, 15, 'Hemanshu', 'This is my second comment'),
(5, 14, 'Hemanshu', 'THis is photots for id 13\r\n'),
(9, 12, 'sdfas', 'sdfa'),
(10, 12, 'sdfasd', 'adsfasdf'),
(12, 21, 'Hemanshu', 'that is fucked up\r\n'),
(13, 18, 'Hemanshu', 'This is dope');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `filename` varchar(255) NOT NULL,
  `alternate_text` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `title`, `caption`, `description`, `filename`, `alternate_text`, `type`, `size`) VALUES
(12, 'car3', 'fsdasdf', '<p>fdsafdasafdasdffasfas</p>', 'images-43 copy.jpg', 'asasdas', 'image/jpeg', 27955),
(13, 'car1', 'sdgad', '<p>fsadfasdfa</p>', 'images-3.jpg', '', 'image/jpeg', 18096),
(14, 'car3', '', '', 'images-4.jpg', '', 'image/jpeg', 23270),
(15, 'car2', '', '', 'images-6 copy.jpg', '', 'image/jpeg', 21886),
(16, 'car3', '', '', '_large_image_1.jpg', '', 'image/jpeg', 479843),
(17, 'car3', '', '', '_large_image_2.jpg', '', 'image/jpeg', 309568),
(18, 'assa', '', '', '_large_image_4.jpg', '', 'image/jpeg', 554659),
(19, 'car3', '', '', 'images-1 copy.jpg', '', 'image/jpeg', 28947),
(20, 'assa', '', '', 'images-40 copy.jpg', '', 'image/jpeg', 24385),
(21, 'car3', '', '', 'images-15 copy.jpg', '', 'image/jpeg', 28466),
(22, 'car3', '', '', 'images-50.jpg', '', 'image/jpeg', 21652),
(23, 'car3', '', '', 'images-14 copy.jpg', '', 'image/jpeg', 21992),
(24, 'car1', '', '', 'images-42 copy.jpg', '', 'image/jpeg', 22401),
(25, 'car1', '', '', 'images-5 copy.jpg', '', 'image/jpeg', 33192),
(26, '', '', '', 'images-7 copy.jpg', '', 'image/jpeg', 24140),
(27, 'car3', '', '', 'images-18 copy.jpg', '', 'image/jpeg', 27595),
(28, 'car3', '', '', 'images-38 copy.jpg', '', 'image/jpeg', 21857);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `user_image`) VALUES
(1, 'HEmanshu87', '1234', 'hemanshu', 'Khodiyar', 'image.jpg'),
(2, 'bhagvanji98', '12345', 'bhagvanji', 'khodiyar', ''),
(3, 'rico', '1234', 'rico', 'jay45', 'images-9.jpg'),
(11, 'krishna85', '1234', 'krishna', 'masani', ''),
(12, 'krishna8555555', '1234', 'krishna', 'masani', 'image-1.jpg'),
(18, 'krishna85', '1234', 'krishna', 'masani', 'images-4 copy.jpg'),
(25, 'rico3555', '12e', 'hello', 'kittennnnnn', 'images-37.jpg'),
(27, 'jhon', '7dLUTXc9NNK7L6B', 'jhon', 'doe', 'download.jpg'),
(34, 'HEmanshu87', 'sdf', 'afa', 'asfda', 'images-2 copy.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photo_id` (`photo_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
