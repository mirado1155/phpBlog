-- Adminer 4.7.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `blog_entry`;
CREATE TABLE `blog_entry` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL,
  `entry` varchar(1500) DEFAULT NULL,
  `entry_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `blog_entry` (`id`, `title`, `entry`, `entry_date`) VALUES
(16,	'Second Post',	'This is the second post that I\'m taking seriously. \'Sup?',	'2020-04-24 14:29:15'),
(17,	'Project 3',	'This project has actually been really fun overall. As with anything, it got daunting and frustrating, but when I got into grooves, it made it all worth it.',	'2020-04-24 14:30:41'),
(18,	'Future Features',	'Some features to add when I have more free time: \r\n<ul>\r\n<li>An option to search for posts - both for users and admin.</li>\r\n<li>Edit Posts</li>\r\n<li>Add Comments to Posts</li>\r\n</ul>\r\n',	'2020-04-24 14:33:44'),
(19,	'Addition to Previous Post',	'<ul>\r\n<li>Viewers would need to register to add comments</li>\r\n<li>Or, should I allow anonymous comments and suffer the consequences?</li>\r\n<li>Maybe comments are just a bad idea :( </li>\r\n</ul>',	'2020-04-24 14:36:13'),
(22,	'A Fifth Post On The Page',	'To show how a 6th post will create pagination',	'2020-04-24 16:18:08'),
(24,	'New Post',	'New post again, for more demo purposes!',	'2020-04-24 16:21:30'),
(25,	'7th Post Test',	'This is to demo pagination',	'2020-04-24 16:22:06');

-- 2020-04-24 21:30:15