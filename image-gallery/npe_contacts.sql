-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 21, 2019 at 08:02 PM
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
-- Table structure for table `npe_contacts`
--

CREATE TABLE `npe_contacts` (
  `npe_business_name` varchar(255) NOT NULL,
  `npe_person_name` varchar(255) NOT NULL,
  `npe_email` varchar(255) NOT NULL,
  `npe_url` varchar(255) NOT NULL,
  `npe_phone` varchar(255) NOT NULL,
  `npe_address1` varchar(255) NOT NULL,
  `npe_postal` varchar(255) NOT NULL,
  `npe_city` varchar(255) NOT NULL,
  `npe_province` varchar(255) NOT NULL,
  `npe_resume` tinyint(1) NOT NULL,
  `npe_description` text NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `npe_contacts`
--

INSERT INTO `npe_contacts` (`npe_business_name`, `npe_person_name`, `npe_email`, `npe_url`, `npe_phone`, `npe_address1`, `npe_postal`, `npe_city`, `npe_province`, `npe_resume`, `npe_description`, `cid`) VALUES
('FreshWorks Studio', 'Samarth Mod', 'contact@freshworks.io', 'https://freshworks.io/', '(250) 412-3470', 'Unit 101 - 736 Broughton Street', 'V8W 1E1', 'Victoria', 'BC', 1, 'FreshWorks Studio is an award winning, full life cycle, design and development company with offices in Victoria, Vancouver and Seattle.', 12),
('Intuit Inc.', 'Sasan Goodarzi', 'support@intuit.com', 'https://www.intuit.com/ca', '888-843-5449', '5100 Spectrum Way', 'L4W 5G1', 'Mississauga', 'ON', 0, 'More consumers trust Intuit products for their tax prep, small business accounting, and personal financial management than any other brand.', 13),
('Pleasant Solutions', 'Thomas Stachura', 'general@pleasantsolutions.com', 'https://pleasantsolutions.com/', '780 463 8875', '8525 Davies Road NW', 'T6E 4N3', 'Edmonton', 'AB', 0, 'Pleasant Solutions specializes in making your software or website ideas a reality. Past work includes OcÃ©, AUPE and Edmonton Valley Zoo.', 14),
('Devfacto', 'Greg Miller', 'greg.miller@devfacto.com', 'https://www.devfacto.com/', '877-323-3832', '#910 - 150 9th Ave SW', 'T2P 3H9', 'Calgary', 'AB', 1, 'DevFacto specializes in software development and BI consulting. Past work includes Gimmal and NINTEX.', 15),
('OpenText', 'Mark J. Barrenechea', 'partners@opentext.com', 'https://www.opentext.com/', '519-888-7111', '275 Frank Tompa Dr', 'N2L 0A1', 'Waterloo', 'ON', 0, 'Their EIM products enable businesses to grow faster, lower operational costs, and reduce information governance and security risks by improving business insight, impact and process speed.', 20),
('Redknee', 'Lucas Skoczkowski', 'lucas.skoczkowski@redknee.com', 'http://www.redknee.com/', '905-625-2622', '2560 Matheson Boulevard East', 'L4W 4Y9', 'Mississauga', 'ON', 0, 'Redknee supports communications service providers with a complete portfolio of monetization and subscriber management solutions.', 21),
('GIRO', 'Jean Aubin', 'info@giro.ca', 'http://www.giro.ca/en', '514.383.0404', '75, rue de Port-Royal Est, bureau 500', 'H3L 3T1', 'MontrÃ©al', 'QC', 0, 'Public transport and postal organizations trust GIROâ€™s software solutions to plan, optimize, and manage their operations.', 22),
('Points', 'Rob MacLean', 'info@points.com', 'https://www.points.com/', '416.596.6370', '111 Richmond St. W., Suite 700', 'M5H 2G4', 'Toronto', 'ON', 0, 'Points (TSX:PTS) (Nasdaq:PCOM) is committed to helping loyalty programs build better experiences for their members.', 23),
('ETAP Canada', 'Farrokh Shokooh', 'support@etap.com', 'https://etap.com/ca/home/', '780-758-0500', '#102, 1289 â€“ 91 Street SW', 'T6X 1H1', 'Edmonton', 'AB', 0, 'ETAP is the global market and technology leader in modeling, design, analysis, optimization, monitoring, control, and automation software for electrical power systems.', 24),
('Code and Effect', 'Ashley Janssen', 'hello@codeandeffect.com', 'https://codeandeffect.com/', '780-218-3344', '204-8540 109 Street', 'T6G 1E6', 'Edmonton', 'AB', 1, 'They design, develop, and improve mobile and web applications with ruby on rails.', 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `npe_contacts`
--
ALTER TABLE `npe_contacts`
  ADD PRIMARY KEY (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `npe_contacts`
--
ALTER TABLE `npe_contacts`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
