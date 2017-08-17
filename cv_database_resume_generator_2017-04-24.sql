# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.16)
# Database: cv_database_resume_generator
# Generation Time: 2017-04-24 17:14:10 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table fos_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `fos_user`;

CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `firstName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `fos_user` WRITE;
/*!40000 ALTER TABLE `fos_user` DISABLE KEYS */;

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `firstName`, `lastName`, `phone`, `city`, `country`)
VALUES
	(1,'JamalAfridi','jamalafridi','jamal_96@hotmail.co.uk','jamal_96@hotmail.co.uk',1,NULL,'$2y$13$nE/52kVoeh6MRtK64RG9zeKELhG3wsyfcHH5q7RrQboLvjiTqgEqG','2017-04-19 16:27:17',NULL,NULL,'a:2:{i:0;s:10:\"ROLE_ADMIN\";i:1;s:16:\"ROLE_SUPER_ADMIN\";}','Jamal','Afridi','07821833440','Manchester','USA'),
	(2,'Example1','example1','jamal@afridi.com','jamal@afridi.com',1,NULL,'$2y$13$EwS2M8NyxLlpH2jWGtik7OSb9Dqxb6V5swt9sr5mWsuDkUMHD.sY6','2017-04-11 22:44:35',NULL,NULL,'a:0:{}','Jamal','Afridi','01234567890','Manchester','United Kingdom'),
	(3,'RobertWantling','robertwantling','robert_95@hotmail.co.uk','robert_95@hotmail.co.uk',1,NULL,'$2y$13$9X3zyHUmNOeqjIti6MLJ7u7qCV8ZwAt/WEL8aEqyPuVaxCt7Tx3Qy','2017-04-13 19:10:21',NULL,NULL,'a:0:{}','qwfwef','ewfe','ef','ewfe','sefsef'),
	(4,'test','test','test@test.com','test@test.com',1,NULL,'$2y$13$4mHyeYPzUSgfNaJtRRE2Gu0w3YC/9ijrcbQb7NU7b9WN6Vnw44ba6','2017-04-19 16:08:26',NULL,NULL,'a:0:{}',NULL,NULL,NULL,NULL,NULL),
	(5,'fwefe','fwefe','efw@gt.com','efw@gt.com',1,NULL,'$2y$13$Yhzd.9IawdORj7R0hBZ3YOImzm4HGaBvBkRDlT18CY15Ls2I0wbgC','2017-04-19 16:10:23',NULL,NULL,'a:0:{}',NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `fos_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table interest
# ------------------------------------------------------------

DROP TABLE IF EXISTS `interest`;

CREATE TABLE `interest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6C3E1A67A76ED395` (`user_id`),
  CONSTRAINT `FK_6C3E1A67A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `interest` WRITE;
/*!40000 ALTER TABLE `interest` DISABLE KEYS */;

INSERT INTO `interest` (`id`, `description`, `user_id`)
VALUES
	(9,'Learning programming in Java, C#, HTML and CSS, JS and other languages to excel my performance at university and to aid my career in computer science.',1),
	(10,'Completing coding challenges to improve coding and problem solving skills, on sites such as CodingBat and HackerRank.',1),
	(13,'Travel experience: San Fransisco, Oakland, Los Angeles, San Diego, London, New York City, Rome, Amsterdam, Paris and Belgium, enjoy meeting new people of different cultures, experiences and gathering new skills',1),
	(14,'A description of your interest.',2),
	(15,'A description of your interest.',2),
	(16,'reading books',3);

/*!40000 ALTER TABLE `interest` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table qualification
# ------------------------------------------------------------

DROP TABLE IF EXISTS `qualification`;

CREATE TABLE `qualification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grade` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B712F0CEA76ED395` (`user_id`),
  CONSTRAINT `FK_B712F0CEA76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `qualification` WRITE;
/*!40000 ALTER TABLE `qualification` DISABLE KEYS */;

INSERT INTO `qualification` (`id`, `type`, `subject`, `grade`, `user_id`, `name`, `startDate`, `endDate`)
VALUES
	(1,'Bsc Hons ','Computer Science ','First',1,'MMU','2014-09-28','2017-05-17'),
	(3,'Qualification','Subject','Grade',2,'College/University','2012-02-07','2015-04-06'),
	(4,'Qualification','Subject','Grade',2,'College/University','2012-02-07','2015-04-06');

/*!40000 ALTER TABLE `qualification` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table reference
# ------------------------------------------------------------

DROP TABLE IF EXISTS `reference`;

CREATE TABLE `reference` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jobTitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_AEA34913A76ED395` (`user_id`),
  CONSTRAINT `FK_AEA34913A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `reference` WRITE;
/*!40000 ALTER TABLE `reference` DISABLE KEYS */;

INSERT INTO `reference` (`id`, `jobTitle`, `user_id`)
VALUES
	(1,'Senior Development',1);

/*!40000 ALTER TABLE `reference` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table skill
# ------------------------------------------------------------

DROP TABLE IF EXISTS `skill`;

CREATE TABLE `skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `competency` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5E3DE477A76ED395` (`user_id`),
  CONSTRAINT `FK_5E3DE477A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `skill` WRITE;
/*!40000 ALTER TABLE `skill` DISABLE KEYS */;

INSERT INTO `skill` (`id`, `description`, `competency`, `user_id`)
VALUES
	(1,'HTML5','Expert',1),
	(4,'PHP','Expert',1),
	(6,'SQL','Expert',1),
	(7,'A Key Skill','Expert',2),
	(10,'A Key Skill','Expert',2),
	(12,'CSS','Expert',1);

/*!40000 ALTER TABLE `skill` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table work_history
# ------------------------------------------------------------

DROP TABLE IF EXISTS `work_history`;

CREATE TABLE `work_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jobTitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `responsibilities` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F271C869A76ED395` (`user_id`),
  CONSTRAINT `FK_F271C869A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `work_history` WRITE;
/*!40000 ALTER TABLE `work_history` DISABLE KEYS */;

INSERT INTO `work_history` (`id`, `jobTitle`, `responsibilities`, `user_id`, `name`, `startDate`, `endDate`)
VALUES
	(1,'Intern','Worked independently to learn basic programming skills – Python, HTML, CSS, JS. Completed assigned programming tasks and reported to senior developer. Helped to increase my desire to pursue a career in computer engineering',1,'Atlassian','2013-08-20','2013-09-20'),
	(2,'Intern','Creating layouts of rooms for basic accommodation at hotels such as kitchens and living rooms – required creativity, imagination and own initiative as had to come up with own original layouts\n\n',1,'St. Alban\'s House','2011-04-20','2011-05-20'),
	(3,'Job Title','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ultricies massa et erat luctus hendrerit. Curabitur non consequat enim. Vestibulum bibendum mattis dignissim. Proin id sapien quis libero interdum porttitor.',2,'Company','2015-02-04','2015-04-11'),
	(4,'Job Title','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ultricies massa et erat luctus hendrerit. Curabitur non consequat enim. Vestibulum bibendum mattis dignissim. Proin id sapien quis libero interdum porttitor.',2,'Company','2015-02-04','2015-04-11');

/*!40000 ALTER TABLE `work_history` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
