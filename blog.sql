-- Adminer 4.7.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `post_id` smallint(6) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `comment` text,
  `comment_date` datetime NOT NULL,
  `comment_signal` tinyint(1) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  CONSTRAINT `comments_ibfk_4` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`, `comment_signal`) VALUES
(1,	NULL,	'Irene',	'Très bonne idée',	'2019-12-05 15:50:42',	0),
(2,	2,	'Paul',	'ceci est un nouveau post je m\'y essai',	'2019-12-05 15:55:01',	0),
(3,	1,	'Farouk',	'Wouf Wouf',	'2019-12-05 16:01:56',	0),
(4,	NULL,	'Malik',	'Mal mal mal ',	'2019-12-05 16:03:59',	0),
(5,	NULL,	'fzafraz',	'zafgazogbo',	'2019-12-05 16:04:03',	0);

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `content` text,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`) VALUES
(1,	'Ceci est mon premier billet',	'On va voir ce que ça va donner ',	'2019-12-05 15:51:12'),
(2,	'Second billet c\'est parti pour l\'aventure',	'Je me trouvais seul dans mon grand lit ce soir, il me manquais juste la télé pour que tout soit parfait ',	'2019-12-05 15:51:56');

-- 2019-12-05 15:07:39
