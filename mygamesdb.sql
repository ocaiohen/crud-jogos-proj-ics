--
-- Usage: mysql -u root -p < mygamesdb.sql
--

--
-- Database: `mygames`
--


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


INSERT INTO `studios` (`studio_name`) VALUES
('Nintendo'),
('Ubisoft'),
('Electronic Arts'),
('Bethesda Softworks'),
('Rockstar Games');

INSERT INTO `games` (`game_name`, `studio`, `release_date`, `comment`, `rating`) VALUES
('The Legend of Zelda: Breath of the Wild', 'Nintendo', '2017-03-03', 'An open-world adventure game set in Hyrule.', 9.5),
('Assassin''s Creed Valhalla', 'Ubisoft', '2020-11-10', 'A Viking-themed action RPG.', 8.7),
('FIFA 21', 'Electronic Arts', '2020-10-09', 'The latest installment in the FIFA series.', 7.8),
('The Elder Scrolls V: Skyrim', 'Bethesda Softworks', '2011-11-11', 'An epic fantasy RPG set in the land of Skyrim.', 9.3),
('Red Dead Redemption 2', 'Rockstar Games', '2018-10-26', 'A Western-themed action-adventure game.', 9.8);