-- Adminer 4.8.1 MySQL 5.5.5-10.11.2-MariaDB-1:10.11.2+maria~ubu2204 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `auction`;
CREATE TABLE `auction` (
  `endDate` date NOT NULL,
  `auction_id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `bid` double NOT NULL,
  `category` text NOT NULL,
  PRIMARY KEY (`auction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `auction` (`endDate`, `auction_id`, `title`, `description`, `bid`, `category`) VALUES
('2023-05-12',	15,	'laptop',	'Best laptop',	200,	'Electronics'),
('2023-05-10',	16,	'Car',	'Good, Strong, and attractive car so far at budget.',	16000,	'Motors'),
('2023-05-11',	17,	'tshirt',	'Best quality at an affordable price',	200,	'Fashion'),
('2023-05-17',	18,	'phone',	'long-lasting battery and the best ios',	777,	'Electronics'),
('2023-05-18',	19,	'Gamming laptop',	'top gaming laptop to play',	999,	'Electronics'),
('2023-05-19',	20,	'Boots',	'Nice leather boots and long-lasting ',	230,	'Fashion'),
('2023-05-19',	21,	'Bike',	'made with 100% wood plastic free',	45,	'Toys'),
('2023-05-12',	22,	'Herbal medicine',	'made with the best herbals plants out their',	60,	'Health'),
('2023-05-17',	23,	'Bulb',	'longlasting and bright',	23,	'Electronics'),
('2023-05-11',	24,	'nike airforce 1',	'a well-liked sneaker that has existed since 1982.it\'s durable and comfortable',	550,	'Fashion');

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `category_id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `category` (`category_id`, `name`) VALUES
(1,	'Home'),
(3,	'Electronics'),
(4,	'Fashion'),
(8,	'Motors'),
(11,	'Health'),
(18,	'Furniture'),
(19,	'Toys');

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `email` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `register`;
CREATE TABLE `register` (
  `registerid` int(5) NOT NULL AUTO_INCREMENT,
  `contact` varchar(200) NOT NULL,
  `name` varchar(120) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(55) NOT NULL,
  `isAdmin` int(2) NOT NULL,
  PRIMARY KEY (`registerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `register` (`registerid`, `contact`, `name`, `password`, `email`, `isAdmin`) VALUES
(1,	'9826008123',	'Sonam',	'123456',	'sonam@gmail.com',	0),
(2,	'9812345678',	'milan',	'12345',	'milan@gmail.com',	0),
(3,	'98123455678',	'bipin',	'bipin23',	'bipin@gmail.com',	0),
(4,	'9800925635',	'prajwal',	'belbari1',	'prajwal1@gmail.com',	0),
(5,	'9823748298',	'bipin',	'12345',	'bipinn@gmail.com',	0),
(6,	'9812738208',	'bishal',	'54321',	'bishal@gmail.com',	0),
(14,	'21339284',	'bipin',	'abcd1234',	'bipin12@gmail.com',	1),
(15,	'1234',	'phurbu',	'phurbu',	'phurbu12@gmail.com',	0),
(16,	'9800001120',	'ravi',	'111111',	'rabi1@gmail.com',	1),
(19,	'9800012377',	'deepika',	'99999',	'depika2@gmail.com',	0),
(20,	'9811111111',	'furba',	'333333',	'f1@gmail.com',	0),
(21,	'9814555555',	'katy',	'4545454545',	'katy2@gmail.com',	1);

-- 2023-05-14 14:40:17