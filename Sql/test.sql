-- MySQL dump 10.13  Distrib 5.6.36, for Linux (x86_64)
--
-- Host: localhost    Database: qotsa2_test
-- ------------------------------------------------------
-- Server version	5.6.36

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
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_user` int(1) NOT NULL AUTO_INCREMENT,
  `id_role` int(5) NOT NULL DEFAULT '3',
  `id_lang` tinyint(1) NOT NULL,
  `nick` varchar(16) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `first_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `last_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `password` char(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `confirmed` tinyint(4) NOT NULL,
  `register_random` varchar(64) NOT NULL,
  `api_token` varchar(60) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_language` (`id_lang`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,1,2,'admin','','',1234567890,'5f4dcc3b5aa765d61d8327deb882cf99','rafal@rewe.org',1,1,'','ucWkB196ZfWfSqFPKhhGpa2MlxbmEsV2c2L030hg7ROmyhn2jTxamAodb16d'),(9,3,0,NULL,'','',0,'5f4dcc3b5aa765d61d8327deb882cf99','qotsa@op.pl',1,1,'Z58OFvRlt01CEQrA3ZhILVc8F6pOSKJqLy4UU04yC6Cinp90edZITSPzcoTh35KX','0Ca3GgBAhoCz5qbIhzbbNMMvqNDFctRpBwiteidVk0d2gx1f0NaNXMFlUKl7');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-18 19:40:10
