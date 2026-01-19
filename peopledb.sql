--
-- Usage: mysql -u root -p < peopledb.sql
--

--
-- Database: `peopledb`
--

CREATE DATABASE `peopledb`;
USE `peopledb`;

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE IF NOT EXISTS `people` (
  `people_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `mid_name` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`people_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`people_id`, `first_name`, `last_name`, `mid_name`, `address`, `contact`, `comment`) VALUES
(1, 'Joken', 'Villanuevas', 'Entierro', 'Kabankalan City', '9289324734', 'Programming is fun!'),
(2, 'Charlotte', 'Embang', 'Etabag', 'Guanzon Street', '23124123', 'just another comment!');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `games_id` int(11) NOT NULL AUTO_INCREMENT,
  `game_name` varchar(50) NOT NULL,
  `studio` varchar(50) NOT NULL,
  `release_date` date NOT NULL,
  `comment` text,
  `rating` float CHECK (rating >= 0 AND rating <= 10),
  PRIMARY KEY (`games_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `studios`
--

CREATE TABLE IF NOT EXISTS `studios` (
  `studio_id` int(11) NOT NULL AUTO_INCREMENT,
  `studio_name` varchar(50) NOT NULL,
  PRIMARY KEY (`studio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
