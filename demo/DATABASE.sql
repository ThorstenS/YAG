# Sequel Pro dump
# Version 1191
# http://code.google.com/p/sequel-pro
#
# Host: schmidt (MySQL 5.0.51a-24+lenny1)
# Database: YAG
# Generation Time: 2009-08-29 12:43:37 +0200
# ************************************************************

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table demotable
# ------------------------------------------------------------

CREATE TABLE `demotable` (
  `id` int(11) NOT NULL auto_increment,
  `text` varchar(100) collate utf8_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `demotable` WRITE;
/*!40000 ALTER TABLE `demotable` DISABLE KEYS */;
INSERT INTO `demotable` (`id`,`text`,`number`,`date`)
VALUES
	(1,'Text 1',1,'2009-05-01 00:00:00'),
	(2,'Text 2',2,'2009-05-02 00:00:00'),
	(3,'Text 3',3,'2009-05-03 00:00:00'),
	(4,'Text 4',4,'2009-05-04 00:00:00'),
	(5,'Text 5',5,'2009-05-05 00:00:00'),
	(6,'Text 6',6,'2009-05-06 00:00:00'),
	(7,'Text 7',7,'2009-05-07 00:00:00'),
	(8,'Text 8',8,'2009-05-08 00:00:00'),
	(9,'Text 9',9,'2009-05-09 00:00:00'),
	(10,'Text 10',10,'2009-05-10 00:00:00'),
	(11,'Text 11',11,'2009-05-11 00:00:00'),
	(12,'Text 12',12,'2009-05-12 00:00:00'),
	(13,'Text 13',13,'2009-05-13 00:00:00'),
	(14,'Text 14',14,'2009-05-14 00:00:00'),
	(15,'Text 15',15,'2009-05-15 00:00:00'),
	(16,'Text 16',16,'2009-05-16 00:00:00'),
	(17,'Text 17',17,'2009-05-17 00:00:00'),
	(18,'Text 18',18,'2009-05-18 00:00:00'),
	(19,'Text 19',19,'2009-05-19 00:00:00'),
	(20,'Text 20',20,'2009-05-20 00:00:00'),
	(21,'Text 21',21,'2009-05-21 00:00:00'),
	(22,'Text 22',22,'2009-05-22 00:00:00'),
	(23,'Text 23',23,'2009-05-23 00:00:00'),
	(24,'Text 24',24,'2009-05-24 00:00:00'),
	(25,'Text 25',25,'2009-05-25 00:00:00'),
	(26,'Text 26',26,'2009-05-26 00:00:00');

/*!40000 ALTER TABLE `demotable` ENABLE KEYS */;
UNLOCK TABLES;





/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
