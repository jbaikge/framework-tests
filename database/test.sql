-- MySQL dump 10.11
--
-- Host: localhost    Database: test
-- ------------------------------------------------------
-- Server version	5.0.51a-17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `aardvarks`
--

DROP TABLE IF EXISTS `aardvarks`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `aardvarks` (
  `aardvark_id` bigint(20) unsigned NOT NULL auto_increment,
  `inno2_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`aardvark_id`),
  UNIQUE KEY `aardvark_id` (`aardvark_id`),
  KEY `inno2_id` (`inno2_id`),
  CONSTRAINT `aardvarks_ibfk_1` FOREIGN KEY (`inno2_id`) REFERENCES `inno2` (`inno2_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `aardvarks`
--

LOCK TABLES `aardvarks` WRITE;
/*!40000 ALTER TABLE `aardvarks` DISABLE KEYS */;
/*!40000 ALTER TABLE `aardvarks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inno1`
--

DROP TABLE IF EXISTS `inno1`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `inno1` (
  `inno1_id` int(10) unsigned NOT NULL auto_increment,
  `user_name` varchar(32) default NULL,
  PRIMARY KEY  (`inno1_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `inno1`
--

LOCK TABLES `inno1` WRITE;
/*!40000 ALTER TABLE `inno1` DISABLE KEYS */;
INSERT INTO `inno1` VALUES (1,'test');
/*!40000 ALTER TABLE `inno1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inno2`
--

DROP TABLE IF EXISTS `inno2`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `inno2` (
  `inno2_id` int(10) unsigned NOT NULL auto_increment,
  `inno1_id` int(10) unsigned NOT NULL,
  `variable` varchar(64) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY  (`inno2_id`),
  KEY `inno1_id` (`inno1_id`),
  CONSTRAINT `inno2_ibfk_1` FOREIGN KEY (`inno1_id`) REFERENCES `inno1` (`inno1_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `inno2`
--

LOCK TABLES `inno2` WRITE;
/*!40000 ALTER TABLE `inno2` DISABLE KEYS */;
INSERT INTO `inno2` VALUES (1,1,'password','pass'),(2,1,'gender','noodle');
/*!40000 ALTER TABLE `inno2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table1`
--

DROP TABLE IF EXISTS `table1`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `table1` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `city` varchar(64) default NULL,
  `state` char(2) default NULL,
  `zip_code` varchar(5) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `city` (`city`,`state`,`zip_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `table1`
--

LOCK TABLES `table1` WRITE;
/*!40000 ALTER TABLE `table1` DISABLE KEYS */;
/*!40000 ALTER TABLE `table1` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2008-12-15 13:43:13
