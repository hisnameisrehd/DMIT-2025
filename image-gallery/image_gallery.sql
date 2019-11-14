-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 14, 2019 at 12:06 AM
-- Server version: 5.5.60-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `npeters5_dmit2025`
--

-- --------------------------------------------------------

--
-- Table structure for table `image_gallery`
--

CREATE TABLE `image_gallery` (
  `npe_file` varchar(255) NOT NULL,
  `npe_title` varchar(255) NOT NULL,
  `npe_description` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_gallery`
--

INSERT INTO `image_gallery` (`npe_file`, `npe_title`, `npe_description`, `id`) VALUES
('image_5dcc4b29bd3b0.jpg', 'Leftovers', 'A simple plate of leftovers. I had chicken, broccoli salad, cheese garlic bread, and spicy corn salad.', 35),
('image_5dccdd40515de.jpg', 'Piano', 'Just a close up of my piano which I dont know how to play. Maybe one day I\'ll learn.', 36),
('image_5dccdfdd2b9f1.jpg', 'Bluzen', 'Color changing oil diffuser creates peaceful environment.  Operates quietly in the background.', 37),
('image_5dcce2633cc75.jpg', 'Clown', 'Here is my clown painting collection. I\'m pretty sure I can call it that, even though it\'s the only one I own.', 38),
('image_5dcce70feebc8.jpg', 'Emergency ', 'Incase anyone wanted to know, here are the emergency codes heard throughout hospitals.', 39),
('image_5dccef6283264.jpg', 'College', 'The only way to survive as a student and save money. Mr. Noodle is a staple in many students diet.', 42),
('image_5dccf3917b038.jpg', 'Red Pillow', 'Need to take pictures of everything in site...maybe I\'ll just take a nap instead.', 43),
('image_5dccf4c3ab8fe.jpg', 'Mountains', 'Beautiful photo of mountains.', 44),
('image_5dccf5236545a.jpg', 'Desserts', 'Chocolate flower and hedgehog dessert. ', 45),
('image_5dccf89798678.jpg', 'Dog Walk', 'Walking a dog in a park in the evening. This is not my dog...not cute enough.', 48),
('image_5dccf8b52a720.jpg', 'Music', 'Fairly useless book of songs considering I dont know how to play piano. One day.....', 49),
('image_5dccf915a7380.jpg', 'Desert', 'Not to be mistaken with dessert. A glimpse of land without snow.', 50),
('image_5dccf91f93f4c.jpg', 'Bird', 'Not quite sure where it came from, but it\'s on my wall to distract people from my empty apartment. ', 51),
('image_5dccf9ad20e86.jpg', 'Sunset', 'A beautiful summer sunset.', 52),
('image_5dccfa83d41c6.jpg', 'Sushi', 'You\'re on a roll!\r\n', 53);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image_gallery`
--
ALTER TABLE `image_gallery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image_gallery`
--
ALTER TABLE `image_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
