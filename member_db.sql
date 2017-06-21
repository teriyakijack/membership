-- Adminer 4.2.4 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `member`;
CREATE DATABASE `member` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `member`;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `username`, `password`, `name`, `lastname`) VALUES
(3,	'jack',	'1234',	'jack',	'hotelier'),
(4,	'root',	'1234',	'root',	'rootLastName');

DROP TABLE IF EXISTS `user_balance`;
CREATE TABLE `user_balance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `balance_amount` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user_balance` (`id`, `user_id`, `balance_amount`) VALUES
(19,	3,	5000),
(20,	4,	5000);

DROP TABLE IF EXISTS `user_friends`;
CREATE TABLE `user_friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `friend_id` (`friend_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user_friends` (`id`, `user_id`, `friend_id`) VALUES
(41,	4,	3);

-- 2017-06-20 04:12:18
