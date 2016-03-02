-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.6.14


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Definition of table `basket`
--

DROP TABLE IF EXISTS `basket`;
CREATE TABLE `basket` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bunch` int(10) unsigned NOT NULL,
  `count` int(10) unsigned NOT NULL,
  `descritption` text,
  `uid` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `FK_basket_1` (`bunch`),
  CONSTRAINT `FK_basket_1` FOREIGN KEY (`bunch`) REFERENCES `product_relation_package` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `basket`
--

/*!40000 ALTER TABLE `basket` DISABLE KEYS */;
/*!40000 ALTER TABLE `basket` ENABLE KEYS */;


--
-- Definition of table `discount`
--

DROP TABLE IF EXISTS `discount`;
CREATE TABLE `discount` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `discount` decimal(6,2) NOT NULL,
  `bunch` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_discount_1` (`bunch`),
  CONSTRAINT `FK_discount_1` FOREIGN KEY (`bunch`) REFERENCES `product_relation_package` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `discount`
--

/*!40000 ALTER TABLE `discount` DISABLE KEYS */;
INSERT INTO `discount` (`id`,`discount`,`bunch`) VALUES 
 (3,'50.00',2),
 (4,'70.00',3);
/*!40000 ALTER TABLE `discount` ENABLE KEYS */;


--
-- Definition of table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migration_versions`
--

/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
INSERT INTO `migration_versions` (`version`) VALUES 
 ('20160302083325');
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;


--
-- Definition of table `package`
--

DROP TABLE IF EXISTS `package`;
CREATE TABLE `package` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `package`
--

/*!40000 ALTER TABLE `package` DISABLE KEYS */;
INSERT INTO `package` (`id`,`name`,`description`) VALUES 
 (1,'one-off','one-off price'),
 (2,'monthly','monthly price');
/*!40000 ALTER TABLE `package` ENABLE KEYS */;


--
-- Definition of table `price`
--

DROP TABLE IF EXISTS `price`;
CREATE TABLE `price` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `price` decimal(9,2) unsigned NOT NULL,
  `bunch` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_price_1` (`bunch`),
  CONSTRAINT `FK_price_1` FOREIGN KEY (`bunch`) REFERENCES `product_relation_package` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `price`
--

/*!40000 ALTER TABLE `price` DISABLE KEYS */;
INSERT INTO `price` (`id`,`price`,`bunch`) VALUES 
 (1,'10.00',1),
 (2,'50.00',2),
 (3,'15.00',3);
/*!40000 ALTER TABLE `price` ENABLE KEYS */;


--
-- Definition of table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `descriprion` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`,`name`,`descriprion`) VALUES 
 (1,'First product','first desc'),
 (2,'Second product','sec desc');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;


--
-- Definition of table `product_relation_package`
--

DROP TABLE IF EXISTS `product_relation_package`;
CREATE TABLE `product_relation_package` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product` int(10) unsigned NOT NULL,
  `package` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_bunch_1` (`product`),
  KEY `FK_bunch_2` (`package`),
  CONSTRAINT `FK_bunch_1` FOREIGN KEY (`product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_bunch_2` FOREIGN KEY (`package`) REFERENCES `package` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_relation_package`
--

/*!40000 ALTER TABLE `product_relation_package` DISABLE KEYS */;
INSERT INTO `product_relation_package` (`id`,`product`,`package`) VALUES 
 (1,1,1),
 (2,1,2),
 (3,2,1);
/*!40000 ALTER TABLE `product_relation_package` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
