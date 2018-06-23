# ************************************************************
# Sequel Pro SQL dump
# Version 4529
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.38)
# Database: easyDesignerCMS
# Generation Time: 2018-05-10 21:20:42 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table field_image
# ------------------------------------------------------------

CREATE TABLE `field_image` (
  `FIId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `FIDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `FITitle` text,
  `FIName` text,
  `FI_X` int(11) DEFAULT NULL,
  `FI_Y` int(11) DEFAULT NULL,
  PRIMARY KEY (`FIId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table field_text
# ------------------------------------------------------------

CREATE TABLE `field_text` (
  `FTId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `FTDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `FTTitle` text,
  `FTText` mediumtext,
  PRIMARY KEY (`FTId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table users
# ------------------------------------------------------------

CREATE TABLE `users` (
  `userId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) DEFAULT NULL,
  `userPass` varchar(255) DEFAULT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `userFirstName` varchar(200) DEFAULT NULL,
  `userLastName` varchar(200) DEFAULT NULL,
  `userActive` int(1) DEFAULT '0',
  `userCreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `userAdmin` int(1) DEFAULT '0',
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
