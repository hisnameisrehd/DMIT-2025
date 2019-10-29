-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 28, 2019 at 08:56 PM
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
-- Table structure for table `npe_blog`
--

CREATE TABLE `npe_blog` (
  `npe_title` varchar(50) NOT NULL,
  `npe_message` text NOT NULL,
  `npe_timedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `npe_blog`
--

INSERT INTO `npe_blog` (`npe_title`, `npe_message`, `npe_timedate`, `bid`) VALUES
('It\'s Snowing', 'Well, there go my plans of a late night snack...too cold to go outside. Maybe next time. O-O', '2019-10-29 01:42:24', 53),
('And....', 'DONE!\r\n\r\nAll that\'s left now is populating the database with blog posts.', '2019-10-29 00:57:57', 52),
('Fading Away', '...It\'s been far too long since I\'ve had something to eat. I think it\'s time for a break from homework for now.', '2019-10-29 00:22:42', 51),
('It Begins', 'I suppose I should document my progress of this assignment. Hopefully this will ensure that my pagination can effectively be demonstrated.  8)', '2019-10-25 16:13:32', 10),
('Paws, I need a break', 'At long-last, I can now relax and check on Wilfred Warrior.\r\nhttps://www.instagram.com/wilfredwarrior/?hl=en\r\n\r\nPurrfect way to end the night   ;) \r\n', '2019-10-28 05:39:21', 47),
('Distractions', 'I got carried away browsing through Wilfred\'s page. It\'s time for sleep; I can finish this assignment tomorrow.', '2019-10-28 06:04:26', 48),
('Pagination', 'Bootstrap pagination styling has begun.\r\n\r\nI think I will add some custom styles as well  8)', '2019-10-28 20:31:21', 49),
('Deja Vu', 'And I\'m stuck on the update...Still not grabbing the right \'ID\' for the update query. Maybe I\'m just getting sleepy.', '2019-10-28 04:47:26', 45),
('Keep Track of Time', 'Now that I have added a \'current time\' field to the insert page, I can ensure that I post at the exact moment that I choose. Right now it is Monday, October 28th 2019 @ 22:07:09', '2019-10-28 22:07:09', 50),
('This Is #15', 'I was hoping to add more posts before submitting it, but I\'m too tired to wait it out any longer.', '2019-10-29 02:54:08', 57),
('Emoticons!', 'Now there are 7!  :S  :D  8)  O-O  :(  :P  ;)', '2019-10-29 02:48:58', 56),
('Lucky', 'Good thing I already finished my assignments for my other classes. I\'ll be able to sleep in peace  :D', '2019-10-29 02:41:40', 55),
('No Hope', 'https://www.theweathernetwork.com/ca/weather/alberta/edmonton\r\n\r\n :(', '2019-10-29 02:27:45', 54),
('Stuck', 'I still cant seem to get it working :(', '2019-10-28 04:16:04', 43),
('EUREKA!', 'Finally, after what seems like an eternity, I have managed to get the other form to populate on select change  :D', '2019-10-28 04:29:40', 44);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `npe_blog`
--
ALTER TABLE `npe_blog`
  ADD PRIMARY KEY (`bid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `npe_blog`
--
ALTER TABLE `npe_blog`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
