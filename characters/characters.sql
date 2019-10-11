-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 11, 2019 at 01:09 AM
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
-- Table structure for table `characters`
--

CREATE TABLE `characters` (
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `characters`
--

INSERT INTO `characters` (`first_name`, `last_name`, `description`, `id`) VALUES
('Leonardo', 'Turtle', 'The tactical, courageous leader and devoted student of his sensei, Leonardo wears a blue mask and wields two swords. As the most conscientious of the four, he often bears the burden of responsibility for his brothers, which commonly leads to conflict with Raphael.', 11),
('Raphael', 'Turtle', 'The team\'s bad boy, Raphael wears a red mask and wields a pair of sai. He has an aggressive nature, and seldom hesitates to throw the first punch. He is often depicted with a very pronounced New York accent. His personality can be fierce and sarcastic, and oftentimes delivers deadpan humor. He is intensely loyal to his brothers and sensei.', 12),
('Donatello', 'Turtle', 'The scientist, inventor, engineer, and technological genius, Donatello wears a purple mask and wields a bo (staff). Donatello is perhaps the least violent turtle, preferring to use his knowledge to solve conflicts, but never hesitates to defend his brothers.', 13),
('Michelangelo', 'Turtle', 'The most stereotypical teenager of the team, Michelangelo is a free-spirited, relaxed, goofy and jokester, known for his love of pizza. Michelangelo wears an orange mask and wields a pair of nunchaku. He provides the comic relief, though he still has an adventurous side. The least mature of the four Turtles, he shows characteristics of a \"surfer\" type and is often depicted with a Southern Californian accent.', 14),
('Splinter', 'Rat', 'The Turtles\' sensei and adoptive father. In. The original comics, Splinter is a Japanese mutant rat that learned the ways of ninjutsu from his owner and master, Hamato Yoshi.', 15),
('April O\'Neil', 'Human', 'A former lab assistant to the mad scientist Baxter Stockman, April is the plucky human companion of the Turtles. April first met the Turtles when they saved her from Baxter\'s Mouser robots. She embarks on many of the Turtles\' adventures and aids them by doing the work in public that the Turtles cannot.', 16),
('Casey Jones', 'Human', 'A vigilante who wears a hockey mask to protect his identity, Casey Jones has become one of the Turtles\' closest allies, as well as a love interest to April. Casey first encountered the Turtles after having a fight with Raphael. He fights crime with an assortment of sporting goods he carries in a golf bag, such as baseball bats, golf clubs, and hockey sticks.', 18),
('Shredder', 'Human', 'A villainous ninjutsu master called Oroku Saki, he is the leader of the Foot Clan, an evil ninja clan. In every incarnation of the TMNT franchise, he has been the archenemy of the Turtles and Splinter as well as the main villain in most versions of the franchise. The Shredder prefers to use his armor instead of weapons in some versions.', 19),
('Krang', 'Alien', 'Krang is a small brain-like alien warlord who often appears as one of the main villains of the franchise alongside The Shredder as the second arch-enemy of the turtles. The character was originally inspired by the Utroms, an alien race from the original comics, while in later versions he is a member of the Utroms.', 20),
('Renet Tilley', 'Human', 'A rather reluctant, spoiled, and impulsive teenager whose parents, also denizens of the 79th Level, hoped that apprenticing her to Lord Simultaneous would help her develop some kind of common sense. Curious and impatient as she was, she did not care very much for studying.', 24),
('Pizza', 'Food', 'A savoury dish of Italian origin, consisting of a usually round, flattened base of leavened wheat-based dough topped with tomatoes, cheese, and various other ingredients. Some say there are four turtles who can\'t get enough of it.', 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `characters`
--
ALTER TABLE `characters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
