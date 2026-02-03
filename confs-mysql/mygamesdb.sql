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
  `games_id` INT(11) NOT NULL AUTO_INCREMENT,
  `game_name` VARCHAR(50) NOT NULL,
  `studio_id` INT(11) NOT NULL,
  `release_date` DATE NOT NULL,
  `comment` TEXT,
  `rating` FLOAT CHECK (rating >= 0 AND rating <= 10),
  PRIMARY KEY (`games_id`),
  CONSTRAINT `fk_games_studio`
    FOREIGN KEY (`studio_id`)
    REFERENCES `studios` (`studio_id`)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
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

INSERT INTO `games` (`game_name`, `studio_id`, `release_date`, `comment`, `rating`) VALUES
(
  'The Legend of Zelda: Breath of the Wild',
  (SELECT studio_id FROM studios WHERE studio_name = 'Nintendo'),
  '2017-03-03',
  'An open-world adventure game set in Hyrule.',
  9.5
),
(
  'Assassin''s Creed Valhalla',
  (SELECT studio_id FROM studios WHERE studio_name = 'Ubisoft'),
  '2020-11-10',
  'A Viking-themed action RPG.',
  8.7
),
(
  'FIFA 21',
  (SELECT studio_id FROM studios WHERE studio_name = 'Electronic Arts'),
  '2020-10-09',
  'Same thing always. Yeah.',
  6.9
),
(
  'The Elder Scrolls V: Skyrim',
  (SELECT studio_id FROM studios WHERE studio_name = 'Bethesda Softworks'),
  '2011-11-11',
  'Good as hell',
  9.3
),
(
  'Red Dead Redemption 2',
  (SELECT studio_id FROM studios WHERE studio_name = 'Rockstar Games'),
  '2018-10-26',
  'I like horses and the horses ball shrinking',
  10.0
);
