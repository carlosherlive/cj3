-- MySQL dump 10.13  Distrib 5.7.31, for Linux (x86_64)
--
-- Host: localhost    Database: live_db
-- ------------------------------------------------------
-- Server version	5.7.31-0ubuntu0.16.04.1

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
-- Table structure for table `blockedcountry`
--

DROP TABLE IF EXISTS `blockedcountry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blockedcountry` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `model` varchar(35) CHARACTER SET utf8 NOT NULL,
  `cc` varchar(2) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `model` (`model`,`cc`)
) ENGINE=MyISAM AUTO_INCREMENT=167 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blockedcountry`
--

LOCK TABLES `blockedcountry` WRITE;
/*!40000 ALTER TABLE `blockedcountry` DISABLE KEYS */;
INSERT INTO `blockedcountry` VALUES (0000000166,'Model','AO'),(0000000165,'Model','AD'),(0000000164,'Model','DZ'),(0000000163,'Model','AL');
/*!40000 ALTER TABLE `blockedcountry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (96,'Babes'),(94,'Petite Body'),(90,'Medium Tits'),(92,'Asian'),(103,'Latina'),(95,'Trimmed Pussy'),(91,'Toys'),(97,'Couples'),(98,'Huge Tits'),(93,'College Girls'),(89,'Mature'),(99,'PornStar'),(100,'Hairy Pussy'),(101,'Curvy'),(104,'Group Sex'),(105,'Blonde'),(106,'Ebony'),(107,'Big Tits'),(108,'Anal Sex'),(109,'Lesbian'),(110,'Granny'),(111,'Teen 18 +'),(112,'Brunette');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chatmodels`
--

DROP TABLE IF EXISTS `chatmodels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chatmodels` (
  `id` varchar(32) NOT NULL DEFAULT '',
  `user` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `email` varchar(32) NOT NULL DEFAULT '',
  `language1` varchar(12) NOT NULL DEFAULT '',
  `language2` varchar(12) DEFAULT NULL,
  `language3` varchar(12) DEFAULT NULL,
  `language4` varchar(32) DEFAULT NULL,
  `birthDate` varchar(11) DEFAULT NULL,
  `braSize` varchar(12) DEFAULT NULL,
  `birthSign` varchar(12) DEFAULT NULL,
  `weight` varchar(12) DEFAULT '0',
  `weightMeasure` varchar(12) DEFAULT NULL,
  `height` varchar(12) DEFAULT '0',
  `heightMeasure` varchar(12) DEFAULT NULL,
  `eyeColor` varchar(12) DEFAULT NULL,
  `ethnicity` varchar(32) DEFAULT NULL,
  `message` text,
  `position` varchar(255) DEFAULT NULL,
  `fantasies` varchar(255) DEFAULT NULL,
  `hobby` varchar(255) DEFAULT NULL,
  `hairColor` varchar(32) DEFAULT NULL,
  `hairLength` varchar(32) DEFAULT NULL,
  `pubicHair` varchar(32) DEFAULT NULL,
  `tImage` varchar(32) NOT NULL DEFAULT '',
  `cpm` smallint(6) NOT NULL DEFAULT '0',
  `epercentage` tinyint(4) NOT NULL DEFAULT '0',
  `minimum` int(11) NOT NULL DEFAULT '500',
  `category` varchar(32) NOT NULL DEFAULT '',
  `name` varchar(32) NOT NULL DEFAULT '',
  `country` varchar(32) NOT NULL DEFAULT '',
  `state` varchar(32) NOT NULL DEFAULT '',
  `city` varchar(32) NOT NULL DEFAULT '',
  `zip` varchar(12) NOT NULL DEFAULT '',
  `adress` varchar(32) NOT NULL DEFAULT '',
  `actImage` varchar(32) NOT NULL DEFAULT '',
  `pMethod` varchar(12) DEFAULT NULL,
  `pInfo` varchar(255) DEFAULT NULL,
  `dateRegistered` int(11) NOT NULL DEFAULT '0',
  `owner` varchar(32) DEFAULT NULL,
  `lastLogIn` int(11) NOT NULL DEFAULT '0',
  `phone` varchar(16) NOT NULL DEFAULT '',
  `fax` varchar(16) DEFAULT NULL,
  `idtype` varchar(32) NOT NULL DEFAULT '',
  `idmonth` varchar(32) NOT NULL DEFAULT '',
  `idyear` varchar(4) NOT NULL DEFAULT '',
  `idnumber` varchar(32) NOT NULL DEFAULT '',
  `birthplace` varchar(32) NOT NULL DEFAULT '',
  `ssnumber` varchar(32) DEFAULT NULL,
  `msn` varchar(32) DEFAULT NULL,
  `yahoo` varchar(32) DEFAULT NULL,
  `icq` varchar(32) DEFAULT NULL,
  `broadcastplace` varchar(32) DEFAULT NULL,
  `emailtype` enum('text','html') NOT NULL DEFAULT 'text',
  `status` varchar(8) NOT NULL DEFAULT '',
  `lastupdate` int(11) DEFAULT NULL,
  `onlinemembers` tinyint(4) NOT NULL DEFAULT '0',
  `monday` varchar(12) DEFAULT NULL,
  `tuesday` varchar(12) DEFAULT NULL,
  `wednesday` varchar(12) DEFAULT NULL,
  `thursday` varchar(12) DEFAULT NULL,
  `friday` varchar(12) DEFAULT NULL,
  `sunday` varchar(12) DEFAULT NULL,
  `saturday` varchar(12) DEFAULT NULL,
  `gmt` varchar(5) NOT NULL DEFAULT '+0',
  `forcedOnline` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chatmodels`
--

LOCK TABLES `chatmodels` WRITE;
/*!40000 ALTER TABLE `chatmodels` DISABLE KEYS */;
INSERT INTO `chatmodels` VALUES ('88d8ed9ec8f9a9e43460df61bdbe3f02','SOPHIE','12e6b278c03cc04eb1af429b6ed88c35','angela.chavez.robles@hotmail.com','English',NULL,NULL,NULL,'01/Aug/1996',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','SOPHIE','49','valle','cali','255487','carerra35 NO 25-14','',NULL,NULL,1492958387,NULL,0,'3124547884',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('70bad4aca72aa90cf7d7422d4ed386b7','KATIE','d012579609897872f6bc921ee8f72cdc','angela.chavez.robles@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1996',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','KATIE','49','valle','cali','255487','carerra35 NO 25-14','',NULL,NULL,1492958235,NULL,0,'3124547884',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('5866812192b6832a1f4c1c8652ce1f6a','Ginger77_love','c682dd0a0bd754600f45fc3c493f1a20','stephaniebrown311@gmail.com','English',NULL,NULL,NULL,'24/Feb/1993',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','Stephanie Brown','236','Florida','Lake Wales','33859','168 Dinner Lake Loop','',NULL,NULL,1494375021,NULL,0,'8632248281',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('5b42bde3584b824648670eccf96db627','CAMLOVE','d3e89a9a677e04633397456cd5bce950','angela.chavez.robles@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1996',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Couple','CAM','49','valle','cali','255487','carerra35 NO 25-14','',NULL,NULL,1492778363,NULL,0,'3124547884',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('314567830a90236ab5691aa6b2863543','ANDYYSAN','c1dfd810ad2a321a46672f4bdbd00c11','angela.chavez.robles@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Couple','ANDY','49','valle','cali','255487','carerra35 NO 25-14','',NULL,NULL,1492777889,NULL,0,'3124547884',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('3d649019770a6f5a8923e89926f5ee17','NICOLETTE','27a367134aab1bb2324ee446cfcd710a','nicolettemartinezxxx@gmail.com','Dutch','','','','01/Jan/1974','','','','','','','','White','','','','','','','','',10,50,500,'Mature Woman','nicolette martinez','49','antioquia','medellin','050027','calle 25 BIS 15-40','','pp','',1493906968,NULL,1496361347,'','','','','','','','','','','','','text','online',1496361871,1,'off-off','off-off','off-off','off-off','off-off','off-off','off-off','+0',1),('e70b56f014b1ec1cc875e1627892f28c','GRACE','d6c56c0cbc61a8deedf18edddc18d04d','angela.chavez.robles@hotmail.com','English',NULL,NULL,NULL,'01/Jun/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','GRACE','49','valle','cali','255487','carerra35 NO 25-14','',NULL,NULL,1492776647,NULL,0,'3124547884',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('ace3aeef626f440fc0d9457ddfc35ff0','ETHAN','8cbe42e6a66c1f597a98ad44e2cc5690','angela.chavez.robles@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Men','ETHAN','49','valle','cali','255487','carerra35 NO 25-14','',NULL,NULL,1492524813,NULL,1492739476,'3124547884',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',1492740488,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('91d241a9ab841e783edb0cf484e6c3b9','AMELIANICK','19d4d492efdc53f08aad092be9a20a11','angela.chavez.robles@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','AMELIA','49','valle','cali','255487','carerra35 NO 25-14','',NULL,NULL,1492524986,NULL,0,'3124547884',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('257d5e3ca26dce65924cb51281bea3bd','DALENA','696486b700fba09ab51dc6292ed2c4c3','angela.chavez.robles@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1994',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','DALENA','49','valle','cali','255487','carerra35 NO 25-14','',NULL,NULL,1492775624,NULL,0,'3124547884',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('94ae364ba45befd4f233c60986e004f4','CAROL','9e80a48b37e4e27150ac83abce2c4003','angela.chavez.robles@hotmail.com','English',NULL,NULL,NULL,'9/Jun/1994',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Couple','CAROL','49','valle','cali','255487','carerra35 NO 25-14','',NULL,NULL,1491777552,NULL,0,'3124547884',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('82ba60cc5bbe6c11b66f9a58038470a4','NASLY','aa23cf45a94fbe33af2c933d781663b7','angela.chavez.robles@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1986',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Mature Woman','NASLY NASLY','49','valle','cali','255487','carerra35 NO 25-14','',NULL,NULL,1491851768,NULL,0,'3124547884',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('680f3b73287d10d4766366a10c3249d5','VANESSAWILLIAMS','dcf60c348b2b2735d0c74db4e0ed156e','angela.chavez.robles@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1999',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','VANESSA WILLIAMS','49','valle','cali','255487','carerra35 NO 25-14','',NULL,NULL,1491851337,NULL,0,'3124547884',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('6013b443b4fdaddb058d9829d8e3a099','MICKYDENY','e3a4f0fbd727efb93c8cae4ba4391271','angela.chavez.robles@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Couple','MICK DELIN','49','valle','cali','255487','carerra35 NO 25-14','',NULL,NULL,1494446291,NULL,0,'3124547884',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('b1eb2e20e8dca15b578e9d5247f89a67','SINDYCREIN','dd531921b8a3b856144e5aa640fae618','angela.chavez.robles@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1994',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Couple','SINDY','49','valle','cali','255487','carerra35 NO 25-14','',NULL,NULL,1491870412,NULL,0,'3124547884',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('1c8ea09b69f3f8fa75a96c273358b742','CATRIA','639c25268519cc0fb8e82a80bf4cbab4','angela.chavez.robles@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1998',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','CATRIA','49','valle','cali','255487','carerra35 NO 25-14','',NULL,NULL,1491851054,NULL,0,'3124547884',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('fece15f6a4453bce9aaf9e88acdf4113','WENDY','aa3d760862958208a3d51cc5e5907f01','angela.chavez.robles@hotmail.com','English','','','','01/Jan/1998','','','','','','','','White','','','','','','','','',10,50,500,'Girl','WENDY SMITH','49','valle','cali','255487','carerra35 NO 25-14','','PayPal','sdasdasd',1491850598,NULL,1505511511,'','','','','','','','','','','','','text','online',1505513183,0,'off-off','off-off','off-off','off-off','off-off','off-off','off-off','+0',1),('171e8f2588565635083a090849c6a83b','DENISFOX','9cdae841c2dcddd3c0a88e4ddd63e031','angelitasonline@gmail.com','English',NULL,NULL,NULL,'01/Apr/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'NiÃ±a','DENIS FOX','236','QUIN','NEN YORK','24454','AVENUE REAMON HILL AVE 1455-144','',NULL,NULL,1491451543,NULL,0,'+3245447775',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('a538d7ad7c5d0c2994a872d3be60eef2','BIANCATALLER','0e92d67761ceb2ce6b0a069f041c06f9','angelitasonline@gmail.com','English',NULL,NULL,NULL,'08/Jan/1993',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','BIANCA TALLER','236','RIGMON HILL','NEW YORK','245588','AVENUE 123-45 ','',NULL,NULL,1491568008,NULL,0,'+153245554',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('ef48da054ab97d7221e343628b437261','SHIRLEYCUAN','6422d130d2cc724d0d99e085f62d7b8d','angela.chavez.robles@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1992',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Couple','SHIRLEY CUAN','49','valle','cali','255487','carerra 44 NO 27-14','',NULL,NULL,1491626799,NULL,0,'3124547884',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('6bcfca4b0456b364edd42cc2be3e1526','NICOLEVIL','74e78a67302fff3ff1644178dcd5a3c8','angela.chavez.robles@hotmail.com','English',NULL,NULL,NULL,'05/May/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','NICOLE','49','valle','CALI','255487','carerra35 NO 25-14','',NULL,NULL,1491795759,NULL,0,'3124547884',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('61f91b5bd1cb763cabd7c4cad4d2c334','MILA92','ce736c595c13d60a11589444460c914f','angela.chavez.robles@hotmail.com','English',NULL,NULL,NULL,'06/Jan/1992',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Couple','MILA','49','valle','cali','255487','carerra 55 NO 25-14','',NULL,NULL,1491626021,NULL,0,'3124547884',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('e2acefb9644e77c24fa32640e95b2fc5','KrystinaKisses','d4d03e2fd3e26e3af8bcd54ef07f6870','Krystinakisses4u@gmail.com','English',NULL,NULL,NULL,'15/Dec/1985',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Fetish','Krystina Bickford','236','Florida','Lurz','33558','20915 leonard rd','',NULL,NULL,1494623606,NULL,0,'8635019010',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('d72556b66f9e88859afea8bab33b3a59','XIMENA','b805701b0012ba4822366b09d197741d','angela.chavez.robles@hotmail.com','English',NULL,NULL,NULL,'06/Aug/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Couple','XIMENA ','49','valle','cali','255487','carerra35 NO 25-14','',NULL,NULL,1491777664,NULL,0,'3124547884',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('23daedc5f23a6be7c86954bddc1e19bc','SUSAN','ef8ebb452b82d300c20dcf2e517b3a69','angela.chavez.robles@hotmail.com','English',NULL,NULL,NULL,'15/May/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Couple','SUSAN','49','valle','cali','255487','carerra35 NO 25-14','',NULL,NULL,1491703437,NULL,1493099674,'3124547884',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('d308c810a069ed70eb1f4053b64549ad','SARAYCASTILLO','157f0935e6b6fd799278dd248058826a','angela.chavez.robles@hotmail.com','English',NULL,NULL,NULL,'18/Jan/1994',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Couple','SARAY','49','valle','cali','255487','carerra35 NO 25-14','',NULL,NULL,1491703610,NULL,0,'3124547884',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('860053bcef9633a9b3ffe80cf8ab4074','KELLY','ed224097a0672cc97130a483a6e0738f','angela.chavez.robles@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1994',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Mature Woman','KELLY MARTINES','49','valle','cali','255487','carerra35 NO 25-14','','PayPal','',1498866474,NULL,0,'3124547884',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('197ba5abce3d14c254c1e82b23c88d0e','Beautyfull','c91007b4a43524e3b0a52f7895c02d29','Stwyman5@gmail.com','English',NULL,NULL,NULL,'19/Mar/1994',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Men','Shyann Twyman','236','New York','bronx','10466','924 E 227st','',NULL,NULL,1496242583,NULL,0,'9292257254',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('2823d238bef556d556c78a7662c27ee3','belalexandra','127fb7cf86a0b3a12144f39cbf99b813','mahasi@rambler.ru','English',NULL,NULL,NULL,'28/Jun/1994',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','Mariia Kozlovska','209','Barcelona','Barcelona','08017','Doctor Carulla 53','',NULL,NULL,1495126223,NULL,1585478788,'0034696394582',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','offline',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('3a591df173a56b178ef65554569e29e9','SANDY','93b8bdbafefd2852ce9b3786d1bee5d2','angela.chavez.robles@hotmail.com','English',NULL,NULL,NULL,'05/Jul/1993',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Fetish','SANDY CARDONA','49','valle','cali','255487','carerra3 NO 15-14','',NULL,NULL,1491793069,NULL,0,'3124547884',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('a5b05e99f97fc4b4421b6833dfaf113d','ADDISON','0cd81c276dd01e46dba941d44e6abe78','angela.chavez.robles@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1993',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Couple','ADDISON ','49','valle','cali','255487','carerra35 NO 25-14','',NULL,NULL,1491870874,NULL,0,'3124547884',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('5a490621aef9f163b451ec2555cf8381','PAREJITASEX','b10f622f275f876e5d7a26efd058f7f3','angela.chavez.robles@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1994',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Couple','PAREJITA','49','valle','cali','255487','carerra35 NO 25-14','',NULL,NULL,1492777720,NULL,0,'3124547884',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('11b0cb6eaf2bc5ec59618f8303d9f1da','SAMANTA','13476d6ab69fcde70db3abaf04a46eed','angelitasonline@gmail.com','English',NULL,NULL,NULL,'10/Jan/1994',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','SAMANTA QUIN','49','VALLE','CALI','32548','CALLE 38 -21-14','',NULL,NULL,1491625905,NULL,0,'+1534788956',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('c0752f0199c9e1322a3cb5f7d3e37037','EMYLI','c5dfaf779ff2e23cf03847ba48ed9206','angela.chavez.robles@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1996',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','EMYLI','49','valle','cali','255487','carerra35 NO 25-14','',NULL,NULL,1492526372,NULL,0,'3124547884',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('c30975bef7e9985ed2abc92435e77359','ADELA','a37eedd57e191384b0253cfcf10cf8fc','angela.chavez.robles@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1993',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Couple','ADELA','49','valle','cali','255487','carerra35 NO 25-14','',NULL,NULL,1491870719,NULL,0,'3124547884',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('5444ce64d42150c3ced7b67909f28241','LOLITA','9adf078901457ea08a1892621554178e','angela.chavez.robles@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1993',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,100,'Girl','LOLITA LOPEZ','49','valle','cali','255487','carerra35 NO 25-14','',NULL,NULL,1491851649,NULL,1493048787,'3124547884',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',1492635046,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('e4f4737d1c1c37e1b01df5c69f28380a','SARA','a14547befdfaa7df4918a23be92da5d2','angela.chavez.robles@hotmail.com','English',NULL,NULL,NULL,'9/Apr/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','SARA','49','valle','cali','255487','carerra3 NO 25-1','',NULL,NULL,1491703331,NULL,0,'3124547884',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('588e283cb2c5981a87077643eb4f0bcc','KolaBaby','b71c25f771d570a4cfe5c5ccb196a39b','babiluv697@aim.com','English',NULL,NULL,NULL,'02/Jul/1988',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','nicole stavitskie','236','florida','spring hill','34606','5071 juliet ct','',NULL,NULL,1496102315,NULL,0,'3523983532',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('97f76ffba681ef8020fa344ec5f535be','MARY','30dac4e081b9df066ab8a897f00263ad','angela.chavez.robles@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1997',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','MARY SAR','45','valle','cali','255487','carerra35 NO 25-14','','PayPal','',1498866651,NULL,0,'3124547884',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('fca38b5b3810cdbec4f9153e25f87ca3','ANGIE','2043a220df8a4f6302f74b5ad3031a14','angela.chavez.robles@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1996',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Lesbian','ANGIE SOR','40','valle','cali','255487','carerra35 NO 25-14','','PayPal','',1498866824,NULL,0,'3124547884',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('290a24dd4023005a3adc48b806477428','katrina','c9bca0162d4e2e44dd04bd7f866ec27c','katrina@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1996',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','kat','65','diri','ecuador','2334','Av','','PayPal','',1508437525,NULL,0,'234',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('ad92f13c14ab8e58f41b0f4365876e4b','Tanya','e10adc3949ba59abbe56e057f20f883e','randy@motorsoul.us','English',NULL,NULL,NULL,'01/Feb/1999',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','Tanya Belle','236','Nevada','Los Vegas','67721','1041 S. Crestrun Blvd.','','PayPal','',1505364140,NULL,1505364197,'201-411-1221',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('8c7584e118bf5bbfb0fe6f6f728e0bd5','lola','17ebfeb66d2173e72ce691d018169841','lola@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1997',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','lola','110','lim','cuzic','234','Av','','PayPal','',1507897062,NULL,0,'234566778',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('d24552dc0bef8b5796c7336b11880177','roxi','062eadcf604ffb8da8fb1e7780d5f911','roxi@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1992',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','roxi','65','quit','ecuador','232','Av23','','PayPal','',1507895346,NULL,0,'324224455',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('4ab99a0300b8339a583c840fcbfccbf3','roxana','848df9bb06c02a5023fb1576577ed1da','roxana@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1997',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Fetish','roxana','98','av','barcelona','234','Ab','','PayPal','',1507895526,NULL,1560432410,'234566',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','offline',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('4bc872957ec4813455e9a7ab176a9398','mick','091459ef2b25992a6627bdbe3c624be3','mick@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1996',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','mick martinez','49','cundinamarca','bogota','24545','calle 127 no 54-30','','PayPal','',1507770761,NULL,0,'3124545877',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('e65f0aa9e598be744beaa78ab98ce16f','mariana','c6395fc2a20ef14c669de0a8fc196280','marina@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Lesbian','mariana murcia','49','cundinamarca','bogota','2451','cra27 no 54-74','','PayPal','',1507771174,NULL,0,'3154578788',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('e15eafbffe454c4b8a6eb004188ecc61','amelia','4338bdd345300e0bc575352a5637dc60','amelia@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1998',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',0,50,500,'Mature Woman','amelia fox','236','quin','new york','55544587-7','avenida recmon hill','','PayPal','',1507771422,NULL,1559319828,'6457897881',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','offline',1559321492,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('b0cacde502f5a04deb2314cf50387d48','catalina','d6c5f6941c109da65333f7194233be8e','catalina@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1996',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','catalina fula','49','antioquia','medellin','87887','calle39 no 44-12','','PayPal','',1507771649,NULL,0,'3164578988',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('0ab39b5cfa5cca35fd952c21c9738d27','talia','6c20d2f097a817d290bf170cd5cf306d','talia@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1989',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Mature Woman','talia fine','236','california','calle state','2415','ave145-547','','PayPal','',1507772042,NULL,1576263540,'45478777878',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','offline',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('68afcb6ccd8a860a182b07128b704990','yaridza','6a12bc73445d10d27b25773696b8253d','yari@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1986',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Mature Woman','yaridza milet','76','rituee','paris','21477778','av ritue ','','PayPal','',1507772543,NULL,0,'3414554415551',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('d19c41094da7df5d63386acf1d2e402a','marlu','d16b6a44af17eef762573ef1a498b4fa','mary@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1993',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Lesbian','mary fact','10','catiner','franforten','24545','retain avenue','','PayPal','',1507774009,NULL,0,'24557887777',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('e78b2b56130230fe84636ca58c4ff684','yurany','30b1d00a47f02ec24c368be13f71ae47','yurany@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1981',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','sara','49','atlantico','baranquilla','2555','cra 23 no 16-78','','PayPal','',1507774258,NULL,0,'245778877444',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('345c6750a3dd0b67db0b67db20cc1b3b','marynela','f9dd64c4a6ea6a1a1b9b40cf107e6ec6','mary@hotmail.com','Spanish',NULL,NULL,NULL,'01/Jan/1997',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','marynela melanie','173','lima','lima','5844555','454444','','PayPal','',1507774502,NULL,0,'4544454477454',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('fa545057b156dda8354b1d7b0745bc8d','luci','3132a14e1005a0345ca8dddc17d202be','luci@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','luci','49','cund','bogota','2345','Av5','','PayPal','',1507859691,NULL,0,'312456786',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('b56796c188f538eeaa15f45fd12a082f','dali','0364c1f3be218dbbcc31cfe4ca958d00','dali@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1996',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Lesbian','dali','49','valle','cali','2134','Av12','','PayPal','',1507860101,NULL,0,'32456789',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('b47c5c09f3b77b3f8314f12e33d7952f','sandra','3fc5586bed4fb9f745500c0605197924','sandy@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1994',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','sandy','49','valee','cartago','123','123','','PayPal','',1507860319,NULL,0,'23456671',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('62d760a141b3461f54ba27c7e5402b3a','eva','c22cbce29ad4475eb7dc401ac4680333','eva@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1998',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','eva','49','cundi','bogota','1234','12','','PayPal','',1507860468,NULL,0,'23145678',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('c869d4653fbd2ec822a13d4ac55d86ab','candy','1989969397e9ffc6f30ab4a76305288e','candy@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1993',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Lesbian','csndy','49','valle','cali','2345','12','','PayPal','',1507860606,NULL,0,'31523457',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('5938a15cb1df8b7df0c414e405946458','maite','cd1242b76cc708c577341b2f7a5b63fe','mary@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1994',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','mary','49','cundi','bogota','2134','124','','PayPal','',1507861176,NULL,0,'2135677',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('56fb528088ab6c22639adcfa141106a0','pamela','4479014fbad231347f3a47fffa75b01c','pamela@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','pamela','49','valle','cali','234','Av','','PayPal','',1507931336,NULL,0,'234',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('bdadad01b86fef9ad999d272048ce007','mali','a11936db73aee0e2b17eef7cb49ca4c0','mali@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','mali','236','remonhill','New york','2345','Av','','PayPal','',1508608166,NULL,0,'32456',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('bda7937ffd07d6d413fd9a26f34c3390','Andrea','54910c5c09962d6d268b1f3231fded77','andrea@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1996',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','andrea','49','antioquia','medellin','2345','Av','','PayPal','',1508608373,NULL,0,'233456',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('ef82d8f93a6c3c9eef3b2b37830f38e7','melan','821df4ab2bbdff3c09321172339763ba','melan@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1993',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,100,'Girl','melani','49','valle','cali','2345','Av54','','PayPal','',1510405953,NULL,1598146820,'3245566666',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','offline',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('52f91ceec967514502501298cffe9b79','kira','a041b89dbace66c5b219d43397a42661','kira@hotmail.com','English','','','','01/Jan/1995','','','','','','','','White','','','','','','','','',0,50,500,'Lesbian','kira','49','cundi','bogota','3244','Av43','','PayPal','',1510406102,NULL,1598148870,'','','','','','','','','','','','','text','offline',1559352428,0,'off-off','off-off','off-off','off-off','off-off','off-off','off-off','+0',1),('c831f0efae7891cb990145ba102d764b','lauri','0905fd19e849031c8feddbcd3cf15ce3','lauri@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1997',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Mature Woman','lauri','23','lis','cancun','324','Av','','PayPal','',1510406270,NULL,1561252384,'2345',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','offline',1559519059,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('fd690aea8d6f25533a1e3126e6493a40','mina','308a29557d589f5e2c9d9b0975ff9c82','mina@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1988',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','mina','49','atlantico','cartagena','3577','Av34no','','PayPal','',1510406413,NULL,0,'3456',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('1adb619ed2826749392a0745ca01e9df','ali','984d8144fa08bfc637d2825463e184fa','ali@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1992',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Fetish','ali','49','antioquia','medellin','2444','Av','','PayPal','',1510406600,NULL,1576182261,'356778',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('c28d676ea7eed43f39c812fa0720e0ea','maria','f8461b554d59b3014e8ff5165dc62fac','maria@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1984',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','maria','49','Cundinamarca','bogota','253212','Cra4n2_14','','PayPal','',1555003144,NULL,0,'31234334341',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('d79383306c4fdfd1f7174ab466befe25','Mike','5cc64c5b1aae5970e2378b48d452ba2b','mike@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1990',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','Mike RodrÃ­guez','49','Cundinamarca','bogota','12345','Calle 150 N12_30','','PayPal','',1555003450,NULL,0,'3122345678',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('4ef390d8cee86c5d243f54fe5dddcf4e','Soraida','cc3d6b9eb22def48ade6c67a9480c9b0','soraida@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1998',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Fetish','Soraida MÃ¡rquez','61','reimon g','New york','23444_4','4_1234','','PayPal','',1555003701,NULL,0,'3142543223',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('cf38ea2ed79c89584008a74baaf8e604','mara','f3f54b076867988993b8895bccc94805','mara@hotmai.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','Mara Robles','142','juares','mexico','2345','CRA 1_30','','PayPal','',1555004433,NULL,0,'320213345',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('bff35c470dd446658f0dbd4202e6b45c','ana','5390489da3971cbbcd22c159d54d24da','alix@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1998',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,10,500,'Lesbian','Alix  Garzon','69','andalucia','barcelona','3456','123-234','','PayPal','',1555005310,NULL,0,'3124567893',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('c370952c47a2a4c71eca17699a2df0e4','dina','f093c0fed979519fbc43d772b76f5c86','dina@hotmail','English',NULL,NULL,NULL,'01/Jan/1999',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Mature Woman','dina milen','242','zulia','maracaibo','2317','av123-34','','PayPal','',1555005523,NULL,0,'312+23456882',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('ac44be73c065812d1d19cc8937db4fa1','rosi','4de3bb737dfb9522dce0f9e7b35d50b1','rosi@hotmail.com','Spanish',NULL,NULL,NULL,'01/Jan/1980',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','elan corner','49','valle','cali','21345','cra3no 21-21','','PayPal','',1555006085,NULL,0,'213456697',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('7bfc0b5b81fcc2a945a15df103e61c25','kina','85cc3afe99460c21e8fd9749b338a271','kina@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1990',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Lesbian','niÃ±a m','49','cundinamrca','bogota','24351','341-23','','PayPal','',1555009541,NULL,0,'3124674433',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('93671ced282fc81258c8a74e19f8fef9','loni','8f562ed7eebf4f4d6aadabd30403e00e','loni@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1994',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Lesbian','loni martin','49','cundinamrca','bogota','22334','cra123 no 44-12','','PayPal','',1555009745,NULL,0,'233455662',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('f58ec3171fb912e3341dd5331be5560e','lili','1a676730b0c7f54654b0e09184448289','lili@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1999',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Mature Woman','lili ramos','49','cundinamrca','bogots','2334','cra34n12','','PayPal','',1555009901,NULL,1585479118,'213455653',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','offline',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('d2f2c2f0a8bd2e36e93efa27ad08715b','heidy','2b3fa384f44b8cd2706a952cf183065e','heidy123','English',NULL,NULL,NULL,'01/Jan/1997',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','Heidy forero','49','valle','cali','3456','123-23','','PayPal','',1555010843,NULL,0,'21254234',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('1d5a20c540434483bbb63fb439d350da','alici','4f34dd6dbc590e0341b653236becefe4','alici@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1988',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Lesbian','alicigonzales','49','atlantico','cartagena','2334','1234-23','','PayPal','',1555010977,NULL,1556413400,'3214677442',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('edd404ab65cc4b11d0bb9f687c72c182','paola','34aef4c51369a68070ba077c09cdd0f8','paola@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1993',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','paola vargas','49','cundinamrca','bogota','3245','av12No123-30','','PayPal','',1555039269,NULL,0,'3122445545',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('b04ce3c077a14a03f5eaa236b8cbd45c','luciana','e79be9d750b820a767088c56c646b4b6','luciana@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1999',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Lesbian','luciana molano','49','cundinamrca','bogota','21344','12-30','','PayPal','',1555039412,NULL,1590279768,'312270234',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','offline',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('2ec0de63d11062b63d0f34d5fae73d62','lilis','7b080e20389cc733ff4ca9525851d90f','lili@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1998',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','lili martini','49','cundinmarca','bogota','253205','av 134No 12-70','','PayPal','',1555122236,NULL,1556677550,'312270254',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','offline',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('38c966d0bffbba53238689f2fc8a7fcd','mile','25246931c7ac64c98980d1579e18c7a3','mile@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Lesbian','miles ran','1','valle','cali','2334','213_233','','PayPal','',1555192054,NULL,1576244714,'2345532234',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','offline',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('f3770163eba199af77b45df532821864','mine','1a29d541f20063af2e12e1a6f25ba791','mine@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1998',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','aÃ±o colem','49','emvigado','medellin','23456','av21_32','','PayPal','',1555192303,NULL,1565394517,'22345676',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','offline',1559352919,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('fbebc741e3b8b77e671262127b30dbe1','lulu','a73d49f03849fa768255780c7f4d2cec','Ã±ulu@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1997',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Girl','lulu casoner','49','cundinamrca','bogota','2345','avamwricas No 34_21','','PayPal','',1555192908,NULL,0,'3134134556',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('4d74d9c40b01617432dc7ba92b365e66','wel','47ab59f8efc18829f26191fd556312e1','wel@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Lesbian','wel mendez','49','cundinamrca','bogota','2317','21_232','','PayPal','',1555193602,NULL,0,'23456724',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('763d2d3ca5bf6b66519a0bb4f3b29296','mire','1a5ee100d8cf0d8845881dd56f1bbee5','mire@hotmail.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,100,'Lesbian','mire gar','49','valle','cali','2344','cra12No 12_23','','PayPal','',1555193779,NULL,1559228026,'3134567890',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','offline',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1);
/*!40000 ALTER TABLE `chatmodels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chatoperators`
--

DROP TABLE IF EXISTS `chatoperators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chatoperators` (
  `id` varchar(32) NOT NULL DEFAULT '',
  `user` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `email` varchar(32) NOT NULL DEFAULT '',
  `name` varchar(32) NOT NULL DEFAULT '',
  `country` varchar(32) NOT NULL DEFAULT '',
  `state` varchar(32) NOT NULL DEFAULT '',
  `city` varchar(32) NOT NULL DEFAULT '',
  `zip` varchar(12) NOT NULL DEFAULT '',
  `phone` varchar(12) NOT NULL DEFAULT '',
  `adress` varchar(32) NOT NULL DEFAULT '',
  `pMethod` varchar(12) DEFAULT NULL,
  `pInfo` varchar(255) DEFAULT NULL,
  `dateRegistered` int(11) NOT NULL DEFAULT '0',
  `lastLogIn` int(11) NOT NULL DEFAULT '0',
  `moneyEarned` varchar(24) NOT NULL DEFAULT '',
  `moneySent` varchar(24) NOT NULL DEFAULT '',
  `minimum` mediumint(9) NOT NULL DEFAULT '0',
  `status` varchar(12) NOT NULL DEFAULT '',
  `epercentage` tinyint(4) NOT NULL DEFAULT '0',
  `emailtype` enum('text','html') NOT NULL DEFAULT 'text',
  `company` varchar(32) DEFAULT NULL,
  `idtax` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`,`user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chatoperators`
--

LOCK TABLES `chatoperators` WRITE;
/*!40000 ALTER TABLE `chatoperators` DISABLE KEYS */;
/*!40000 ALTER TABLE `chatoperators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chatusers`
--

DROP TABLE IF EXISTS `chatusers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chatusers` (
  `id` varchar(32) NOT NULL DEFAULT '',
  `user` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `email` varchar(32) NOT NULL DEFAULT '',
  `name` varchar(32) NOT NULL DEFAULT '',
  `country` varchar(32) NOT NULL DEFAULT '',
  `state` varchar(32) NOT NULL DEFAULT '',
  `city` varchar(32) NOT NULL DEFAULT '',
  `phone` varchar(16) NOT NULL DEFAULT '',
  `zip` varchar(12) NOT NULL DEFAULT '',
  `adress` varchar(255) NOT NULL DEFAULT '',
  `dateRegistered` int(11) NOT NULL DEFAULT '0',
  `lastLogIn` int(11) NOT NULL DEFAULT '0',
  `money` varchar(255) NOT NULL DEFAULT '5',
  `emailnotify` char(1) NOT NULL DEFAULT '0',
  `smsnotify` char(1) NOT NULL DEFAULT '0',
  `status` varchar(12) NOT NULL DEFAULT '',
  `emailtype` enum('html','text') DEFAULT 'text',
  `freetime` smallint(6) NOT NULL DEFAULT '120',
  `freetimeexpired` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chatusers`
--

LOCK TABLES `chatusers` WRITE;
/*!40000 ALTER TABLE `chatusers` DISABLE KEYS */;
INSERT INTO `chatusers` VALUES ('3c208bb353f5f96d1935d4df30626a49','Hard&deep','skay0509','robbie0509@gmail.com','','','','','','','',1493708459,2147483647,'1','0','0','pending','text',120,0),('f69788277f7df535cf58dd00d656300f','Tapatio ','ac4c6eed6b1b964f1db0712dd9afa0f2','Kikegdl1980@gmail.com','','','','','','','',1494535024,2147483647,'1','0','0','active','text',120,0),('98671fd9c4c4719be0fd2c2c01ac94b5','Blaze_Fawn','bf6f53448320817f2691ff136c49cfb7','lulaberri@yahoo.com','','','','','','','',1493138593,2147483647,'1','0','0','active','text',120,0),('253ec9b69fcedf28456e9f81d09efa8e','paolo_gaspareti','d58a6c0f9edb3116913ee136074ffb73','gasparetti_paolo@yahoo.com','','','','','','','',1495652258,1495652536,'5','0','0','active','text',120,0),('012519b472afa5eb4ea2015b3b29be77','Lugomatrixsex','e7322afc5b7a5cff9704df718fa28ed9','israel-5@hotmail.es','','','','','','','',1495666557,2147483647,'5','0','0','active','text',120,0),('45cf5e02607abffcb6514e022928bf53','letyjuanjo','30731f46a3defadcdf95ffc8b1248896','juanjosecarbajal@yahoo.com.mx','leticia carbajal','142','distrito federal','distrito federal','','06600','',1487770654,1487771766,'1','0','0','active','text',120,0),('88b36dbd76f57df85263d8993db05b53','francc','ec6b6e68a06679c24b926aa7b9c96389','mystic-f@hotmail.com','francisco','242','venezuela','venezuela','','4005','',1488418297,1488418444,'1','0','0','active','text',120,0),('f3fde8b1fac354661be79f38903d2bf2','pruebas','ee2ec3cc66427bb422894495068222a8','ander_4554@hotmail.com','pruebas','49','nn','nn','55','0000','ghjgh',1489758558,1505511419,'656.95','0','0','active','text',120,0),('7c396343734872a22ea83e7c7b69d9e0','FDiHDro21','c405f5bb126db08cbefd64e56096b27a','ghostrayder9321@gmail.com','Priest NoNo','1','NY','US','','800600','',1493164724,1493164802,'1','0','0','active','text',120,0),('051854f7461079dde878c395f50878ac','TheOne&TheOnly','fcfb6344f5b8878a651680b5218d05f7','Teganriley4you@yahoo.com ','Tegan Riley','236','Ca','Santa Ana','','92706','',1492974593,1493001389,'1','0','0','active','text',120,0),('69fa064a48a81b609536edb360922a20','johnbl38','0bb629acea2bd89d17eca3ebfee3d76e','kareotis@hotmail.com','','','','','','','',1493855204,2147483647,'1','0','0','active','text',120,0),('16ecfa8ee00504fed756fdcd3249b3c2','shdylane000','483dd73c1a12740533b0ca972339ceb0','shdylane000@aol.com','jack wolosz','236','California','martinez','','94553','',1493942602,1493942670,'1','0','0','active','text',120,0),('400efdd823270a925a555ebf1715b479','pedro50maduro','d8692f248b1236ae6b140cb45f1df6d8','pedro__g@hotmail.com','','','','','','','',1494024603,1496269396,'1','0','0','active','text',120,0),('88da9573c8a5f802f5039b3fc6c07ee7','capote22','ed3c6813ee366de070e145d1f3112f3e','elcarpo22@hotmail.com','ariel robles','11','provincia de buenos aire','buenos aires','','1650','',1495754343,1495852754,'5','0','0','active','text',120,0),('f7b08cc17b134127933d1faa91c87264','Thegol','f6b2e44d1d02127d615cf1c5e0a6787e','sincerekaye@gmail.com','Kajanay brown ','236','Nevada ','Las Vegas ','','89156','',1496316299,1496317308,'5','0','0','active','text',120,0),('b1ce9d8b3f75dd2a94c2f7dae330ad5b','jasonsophia','sophia5833','angelperaltanyc@gmail.com','','','','','','','',1495737832,2147483647,'5','0','0','pending','text',120,0),('6469b2a24b473cf41e97e4402cd89875','cojedor','19f461f6cae97e3766e757911592831d','keano_29@hotmail.com','','','','','','','',1495686778,1496261012,'5','0','0','active','text',120,0),('7536703aa08c75b933b4ea9adaaace46','bokulhoqe','110130md','shohidul251289@gmail.com','','','','','','','',1494264756,2147483647,'1','0','0','pending','text',120,0),('5184ec1e18b35a5d7aca33d5e45d675b','Candie69','c9b20823b4dba068e38b65f215fe6709','ccandie93@gmail.com','','','','','','','',1494503428,1494504945,'1','0','0','active','text',120,0),('5851c3468ae2e38ea105cc7d0160cacb','yertx78','ff5329400672826493e6526c7ecaa0ed','yepes454@hotmail.com','','','','','','','',1494535627,1496531588,'1','0','0','active','text',120,0),('dc0c7f294554d04ef81aa5142bac2541','frankie86','50b483d799f6b531772078e9cd0fa509','cfwwip@emlhub.com','','','','','','','',1494863399,1494863430,'0','0','0','active','text',120,0),('86d3c638a77f8c04152e64c6d3c7a75b','elktriko','fbc4313b45b5b9ed088db6aca9bdb114','leo-94-ss@hotmail.com','','','','','','','',1494975017,2147483647,'5','0','0','active','text',120,0),('09320145eebf21d8c2484304c2226a44','bigfrankie1986','50b483d799f6b531772078e9cd0fa509','unpzfyb@emlhub.com','','','','','','','',1494977701,1494977750,'5','0','0','active','text',120,0),('feb59a953b78dcdfdc791eed05a7a6f6','Beautyfull ','Little33','Stwyman5@gmail.com','','','','','','','',1496241936,2147483647,'5','0','0','pending','text',120,0),('d3536e717ea1eef82d29b41f0f776d90','Nicole123','cheeseisgreen','Breev833@gmail.com','','','','','','','',1496195486,2147483647,'5','0','0','pending','text',120,0),('af0647f156894fa7e93f3c5a3b0cc4f1','JaydenSkyePadal','23b3e6722746e916057953970cd448e2','BabyJayden89@gmail.com','Cheyenne M Sifuentes','236','North Carolina ','Raleigh','','27529','',1495486762,2147483647,'5','0','0','active','text',120,0),('17bc727ee8defe72ba2775b57f384310','blondiechick678','ffa6fa1ff1dbd5bade72529f377a4cba','blondiechick678@gmail.com','','','','','','','',1495558335,1495558714,'5','0','0','active','text',120,0),('ebd2f5acfe6976c149e0c3ab9546ebb4','andres_333','cariÃ±o**','yesquano_34@hotmail.com','','','','','','','',1495842314,2147483647,'5','0','0','pending','text',120,0),('f5584e561c2d5baaed270539d1039ce0','bigfrankie8686','50b483d799f6b531772078e9cd0fa509','mtjarnuc@yomail.info','','','','','','','',1495841126,1495841184,'5','0','0','active','text',120,0),('3f350d83a30780b14b178e9a64fa677b','ajajajajaj','123456','asdf@asdf.com','asdf','1','asdf','asdf','','12345','',1508472856,2147483647,'105','0','0','pending','text',120,0),('54c3cd6faa3f6201b2d38c126aa13986','asdf123','e10adc3949ba59abbe56e057f20f883e','ffgamer08@gmail.com','asdf','1','asdf','asdf','','12345','',1508472908,1508473032,'5','0','0','active','text',120,0),('f92c1bcc099b2d61414fb3a6e7115f82','carlitos','carlitos123','carloshernanmoreraorjuela@hotmai','','','','','','','',1515013582,2147483647,'205','0','0','pending','text',120,0),('19b39ab23de23c446493931c34667373','DarrylDiuct','y97xYq%u7jN','monicalee923@yahoo.com','','','','','','','',1518292068,2147483647,'5','0','0','pending','text',120,0),('4684825a3b99b750e8b739d8aab4727e','ZilliamLor','9n1vAc6wgW','buncolip@yandex.com','','','','','','','',1520880361,2147483647,'5','0','0','pending','text',120,0),('a310fbbdbdb113083d0990de0080a790','Jazesneoff','9n1vAc6wgW','diklaber@yandex.com','','','','','','','',1520883032,2147483647,'5','0','0','pending','text',120,0),('c033a6094b7f2bba53d2865de5f96c76','Johnzynuara','7v8bv5TeoW','kilmafes@yandex.com','','','','','','','',1520887666,2147483647,'5','0','0','pending','text',120,0),('351a3f01f16a1063f3fb0afee2e5d0d5','WhitnezTup','9n1vAc6wgW','dufgetik@yandex.com','','','','','','','',1520916462,2147483647,'5','0','0','pending','text',120,0),('552f4851ab46d5db07b9a1b46bc7fac2','Wayzenem','9n1vAc6wgW','vukropix@yandex.com','','','','','','','',1520942173,2147483647,'5','0','0','pending','text',120,0),('05cba8620debb5063f4446b206c8d24c','CezilBip','7v8bv5TeoW','canfetir@yandex.com','','','','','','','',1521802957,2147483647,'5','0','0','pending','text',120,0),('8de6e11fccdf1df823598937a8bd3d79','ThozasVepay','7v8bv5TeoW','voklafed@yandex.com','','','','','','','',1522124128,2147483647,'5','0','0','pending','text',120,0),('f2a5c4cd97600adb085624002dfd0807','MelvizAbsom','7v8bv5TeoW','ciklafen@yandex.com','','','','','','','',1522128177,2147483647,'5','0','0','pending','text',120,0),('03c06fa41dd01373dae95b5e1e757217','BilzyCargy','7v8bv5TeoW','likmafek@yandex.com','','','','','','','',1522143116,2147483647,'5','0','0','pending','text',120,0),('4269fff6f87a7ffc4de7de4be0dbdd3a','JasozGor','7v8bv5TeoW','cuklafet@yandex.com','','','','','','','',1522215128,2147483647,'5','0','0','pending','text',120,0),('14bc97f089b728015d7d8a0fe0631c82','RomeztGef','7v8bv5TeoW','binzader@yandex.com','','','','','','','',1522244821,2147483647,'5','0','0','pending','text',120,0),('8d0c16e38b8e8315ba43b5b410e739eb','MiltozLuT','7v8bv5TeoW','vikladex@yandex.com','','','','','','','',1522278679,2147483647,'5','0','0','pending','text',120,0),('06024845300fb69b3979f2b057a02384','Waznedraip','7v8bv5TeoW','viklager@yandex.com','','','','','','','',1522540895,2147483647,'5','0','0','pending','text',120,0),('c7b8f19edc72ffde6520943b4de834ce','Guestknodo','gs8U9f4t2cR','samburton202@aol.co.uk','','','','','','','',1522566031,2147483647,'5','0','0','pending','text',120,0),('12981495d91605e4d562f8e2ed4666e6','ThozasHom','7v8bv5TeoW','calfetir@yandex.com','','','','','','','',1523023228,2147483647,'5','0','0','pending','text',120,0),('39bc3cf85581b03e727ee1dc0ce7d6eb','RickezErets','7v8bv5TeoW','mildevis@yandex.com','','','','','','','',1523196541,2147483647,'5','0','0','pending','text',120,0),('29d847d62de3a967eba53d105c7d10d6','Antoziomit','9n1vAc6wgW','vildenix@yandex.com','','','','','','','',1523284325,2147483647,'5','0','0','pending','text',120,0),('f4e7ecc202aaf9500d8d8813cd35a959','Frazklam','7v8bv5TeoW','bansedix@yandex.com','','','','','','','',1523804381,2147483647,'5','0','0','pending','text',120,0),('eabbe37a4b8c9c4f2e805db1bbe96af1','Mazueltup','7v8bv5TeoW','vunselih@yandex.com','','','','','','','',1523834681,2147483647,'5','0','0','pending','text',120,0),('68d6a4713677d7be37ecb289258c44ea','JaizeVulty','7v8bv5TeoW','silkerot@yandex.com','','','','','','','',1524991092,2147483647,'5','0','0','pending','text',120,0),('e36e42aab04a809c558acfef9e5dc1b9','Irvingtrali','z7Vt1v5t#oN','makhmatw9iil@mail.ru','','','','','','','',1554180900,2147483647,'5','0','0','pending','text',120,0),('71d15b085769697bdfc98ff867afbbd5','He-Man ','4122ea4f5490094a33d7cdba65136cf8','Hahahapapa735@gmail.com','','','','','','','',1556535230,2147483647,'205','0','0','active','text',120,0),('dc830a4b82e88909821f79dec4b12604','Kishan456','8bb0178fbf5a2fddf04d9490c202c754','hahahapapa735@gmail.com','SAKSHAM','102','Rajasthan','JAIPUR','','302015','',1556536023,1556559776,'505','0','0','active','text',120,0);
/*!40000 ALTER TABLE `chatusers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(24) DEFAULT NULL,
  `code` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=251 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (33,'British Indian Ocean Ter',246),(32,'Brazil',55),(31,'Bouvet Island',0),(30,'Botswana',267),(29,'Bosnia and Herzegovina',387),(28,'Bonaire, Sint Eustatius ',599),(27,'Bolivia',591),(26,'Bhutan',975),(25,'Bermuda',1),(24,'Benin',229),(23,'Belize',501),(22,'Belgium',32),(21,'Belarus',375),(20,'Barbados',1),(19,'Bangladesh',880),(18,'Bahrain',973),(17,'Bahamas',1),(16,'Azerbaijan',994),(15,'Austria',43),(14,'Australia',61),(13,'Aruba',297),(12,'Armenia',374),(11,'Argentina',54),(10,'Antigua and Barbuda',1),(9,'Antarctica',672),(8,'Anguilla',1),(7,'Angola',244),(6,'Andorra',376),(5,'American Samoa',1),(4,'Algeria',213),(3,'Albania',355),(2,'Aland Islands',358),(1,'Afghanistan',93),(34,'Brunei',673),(35,'Bulgaria',359),(36,'Burkina Faso',226),(37,'Burundi',257),(38,'Cambodia',855),(39,'Cameroon',237),(40,'Canada',1),(41,'Cape Verde',238),(42,'Cayman Islands',1),(43,'Central African Republic',236),(44,'Chad',235),(45,'Chile',56),(46,'China',86),(47,'Christmas Island',61),(48,'Cocos (Keeling) Islands',61),(49,'Colombia',57),(50,'Comoros',269),(51,'Congo',242),(52,'Cook Islands',682),(53,'Costa Rica',506),(54,'Cote d\'ivoire (Ivory Coa',225),(55,'Croatia',385),(56,'Cuba',53),(57,'Curacao',599),(58,'Cyprus',357),(59,'Czech Republic',420),(60,'Democratic Republic of t',243),(61,'Denmark',45),(62,'Djibouti',253),(63,'Dominica',1),(64,'Dominican Republic',1),(65,'Ecuador',593),(66,'Egypt',20),(67,'El Salvador',503),(68,'Equatorial Guinea',240),(69,'Eritrea',291),(70,'Estonia',372),(71,'Ethiopia',251),(72,'Falkland Islands (Malvin',500),(73,'Faroe Islands',298),(74,'Fiji',679),(75,'Finland',358),(76,'France',33),(77,'French Guiana',594),(78,'French Polynesia',689),(79,'French Southern Territor',NULL),(80,'Gabon',241),(81,'Gambia',220),(82,'Georgia',995),(83,'Germany',49),(84,'Ghana',233),(85,'Gibraltar',350),(86,'Greece',30),(87,'Greenland',299),(88,'Grenada',1),(89,'Guadaloupe',590),(90,'Guam',1),(91,'Guatemala',502),(92,'Guernsey',44),(93,'Guinea',224),(94,'Guinea-Bissau',245),(95,'Guyana',592),(96,'Haiti',509),(97,'Heard Island and McDonal',0),(98,'Honduras',504),(99,'Hong Kong',852),(100,'Hungary',36),(101,'Iceland',354),(102,'India',91),(103,'Indonesia',62),(104,'Iran',98),(105,'Iraq',964),(106,'Ireland',353),(107,'Isle of Man',44),(108,'Israel',972),(109,'Italy',39),(110,'Jamaica',1),(111,'Japan',81),(112,'Jersey',44),(113,'Jordan',962),(114,'Kazakhstan',7),(115,'Kenya',254),(116,'Kiribati',686),(117,'Kosovo',381),(118,'Kuwait',965),(119,'Kyrgyzstan',996),(120,'Laos',856),(121,'Latvia',371),(122,'Lebanon',961),(123,'Lesotho',266),(124,'Liberia',231),(125,'Libya',218),(126,'Liechtenstein',423),(127,'Lithuania',370),(128,'Luxembourg',352),(129,'Macao',853),(130,'Macedonia',389),(131,'Madagascar',261),(132,'Malawi',265),(133,'Malaysia',60),(134,'Maldives',960),(135,'Mali',223),(136,'Malta',356),(137,'Marshall Islands',692),(138,'Martinique',596),(139,'Mauritania',222),(140,'Mauritius',230),(141,'Mayotte',262),(142,'Mexico',52),(143,'Micronesia',691),(144,'Moldava',373),(145,'Monaco',377),(146,'Mongolia',976),(147,'Montenegro',382),(148,'Montserrat',1),(149,'Morocco',212),(150,'Mozambique',258),(151,'Myanmar (Burma)',95),(152,'Namibia',264),(153,'Nauru',674),(154,'Nepal',977),(155,'Netherlands',31),(156,'New Caledonia',687),(157,'New Zealand',64),(158,'Nicaragua',505),(159,'Niger',227),(160,'Nigeria',234),(161,'Niue',683),(162,'Norfolk Island',672),(163,'North Korea',850),(164,'Northern Mariana Islands',1),(165,'Norway',47),(166,'Oman',968),(167,'Pakistan',92),(168,'Palau',680),(169,'Palestine',970),(170,'Panama',507),(171,'Papua New Guinea',675),(172,'Paraguay',595),(173,'Peru',51),(174,'Phillipines',63),(175,'Pitcairn',0),(176,'Poland',48),(177,'Portugal',351),(178,'Puerto Rico',1),(179,'Qatar',974),(180,'Reunion',262),(181,'Romania',40),(182,'Russia',7),(183,'Rwanda',250),(184,'Saint Barthelemy',590),(185,'Saint Helena',290),(186,'Saint Kitts and Nevis',1),(187,'Saint Lucia',1),(188,'Saint Martin',590),(189,'Saint Pierre and Miquelo',508),(190,'Saint Vincent and the Gr',1),(191,'Samoa',685),(192,'San Marino',378),(193,'Sao Tome and Principe',239),(194,'Saudi Arabia',966),(195,'Senegal',221),(196,'Serbia',381),(197,'Seychelles',248),(198,'Sierra Leone',232),(199,'Singapore',65),(200,'Sint Maarten',1),(201,'Slovakia',421),(202,'Slovenia',386),(203,'Solomon Islands',677),(204,'Somalia',252),(205,'South Africa',27),(206,'South Georgia and the So',500),(207,'South Korea',82),(208,'South Sudan',211),(209,'Spain',34),(210,'Sri Lanka',94),(211,'Sudan',249),(212,'Suriname',597),(213,'Svalbard and Jan Mayen',47),(214,'Swaziland',268),(215,'Sweden',46),(216,'Switzerland',41),(217,'Syria',963),(218,'Taiwan',886),(219,'Tajikistan',992),(220,'Tanzania',255),(221,'Thailand',66),(222,'Timor-Leste (East Timor)',670),(223,'Togo',228),(224,'Tokelau',690),(225,'Tonga',676),(226,'Trinidad and Tobago',1),(227,'Tunisia',216),(228,'Turkey',90),(229,'Turkmenistan',993),(230,'Turks and Caicos Islands',1),(231,'Tuvalu',688),(232,'Uganda',256),(233,'Ukraine',380),(234,'United Arab Emirates',971),(235,'United Kingdom',44),(236,'United States',1),(237,'United States Minor Outl',0),(238,'Uruguay',598),(239,'Uzbekistan',998),(240,'Vanuatu',678),(241,'Vatican City',39),(242,'Venezuela',58),(243,'Vietnam',84),(244,'Virgin Islands, British',1),(245,'Virgin Islands, US',1),(246,'Wallis and Futuna',681),(247,'Western Sahara',212),(248,'Yemen',967),(249,'Zambia',260),(250,'Zimbabwe',263);
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `last_hits` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `country_code` (`country_code`)
) ENGINE=InnoDB AUTO_INCREMENT=243 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'US','United States',911,0),(2,'CA','Canada',45,0),(3,'AF','Afghanistan',50,0),(4,'AL','Albania',8,0),(5,'DZ','Algeria',106,0),(6,'DS','American Samoa',0,0),(7,'AD','Andorra',0,0),(8,'AO','Angola',23,0),(9,'AI','Anguilla',0,0),(10,'AQ','Antarctica',0,0),(11,'AG','Antigua and/or Barbuda',0,0),(12,'AR','Argentina',18,0),(13,'AM','Armenia',24,0),(14,'AW','Aruba',0,0),(15,'AU','Australia',60,0),(16,'AT','Austria',1,0),(17,'AZ','Azerbaijan',25,0),(18,'BS','Bahamas',0,0),(19,'BH','Bahrain',337,0),(20,'BD','Bangladesh',11915,0),(21,'BB','Barbados',0,0),(22,'BY','Belarus',0,0),(23,'BE','Belgium',11,0),(24,'BZ','Belize',0,0),(25,'BJ','Benin',2,0),(26,'BM','Bermuda',0,0),(27,'BT','Bhutan',24,0),(28,'BO','Bolivia',5,0),(29,'BA','Bosnia and Herzegovina',0,0),(30,'BW','Botswana',2,0),(31,'BV','Bouvet Island',0,0),(32,'BR','Brazil',105,0),(33,'IO','British lndian Ocean Territory',0,0),(34,'BN','Brunei Darussalam',68,0),(35,'BG','Bulgaria',5,0),(36,'BF','Burkina Faso',1,0),(37,'BI','Burundi',2,0),(38,'KH','Cambodia',43,0),(39,'CM','Cameroon',1,0),(40,'CV','Cape Verde',3,0),(41,'KY','Cayman Islands',0,0),(42,'CF','Central African Republic',0,0),(43,'TD','Chad',1,0),(44,'CL','Chile',4,0),(45,'CN','China',817,0),(46,'CX','Christmas Island',0,0),(47,'CC','Cocos (Keeling) Islands',0,0),(48,'CO','Colombia',11,0),(49,'KM','Comoros',0,0),(50,'CG','Congo',1,0),(51,'CK','Cook Islands',0,0),(52,'CR','Costa Rica',10,0),(53,'HR','Croatia (Hrvatska)',2,0),(54,'CU','Cuba',0,0),(55,'CY','Cyprus',6,0),(56,'CZ','Czech Republic',0,0),(57,'DK','Denmark',0,0),(58,'DJ','Djibouti',11,0),(59,'DM','Dominica',0,0),(60,'DO','Dominican Republic',1,0),(61,'TP','East Timor',0,0),(62,'EC','Ecuador',1,0),(63,'EG','Egypt',165,0),(64,'SV','El Salvador',1,0),(65,'GQ','Equatorial Guinea',0,0),(66,'ER','Eritrea',0,0),(67,'EE','Estonia',0,0),(68,'ET','Ethiopia',122,0),(69,'FK','Falkland Islands (Malvinas)',0,0),(70,'FO','Faroe Islands',0,0),(71,'FJ','Fiji',0,0),(72,'FI','Finland',0,0),(73,'FR','France',71,0),(74,'FX','France, Metropolitan',0,0),(75,'GF','French Guiana',0,0),(76,'PF','French Polynesia',0,0),(77,'TF','French Southern Territories',0,0),(78,'GA','Gabon',0,0),(79,'GM','Gambia',0,0),(80,'GE','Georgia',13,0),(81,'DE','Germany',122,0),(82,'GH','Ghana',79,0),(83,'GI','Gibraltar',0,0),(84,'GR','Greece',12,0),(85,'GL','Greenland',0,0),(86,'GD','Grenada',0,0),(87,'GP','Guadeloupe',0,0),(88,'GU','Guam',0,0),(89,'GT','Guatemala',4,0),(90,'GN','Guinea',1,0),(91,'GW','Guinea-Bissau',0,0),(92,'GY','Guyana',5,0),(93,'HT','Haiti',7,0),(94,'HM','Heard and Mc Donald Islands',0,0),(95,'HN','Honduras',6,0),(96,'HK','Hong Kong',513,0),(97,'HU','Hungary',1,0),(98,'IS','Iceland',0,0),(99,'IN','India',430804,0),(100,'ID','Indonesia',9820,0),(101,'IR','Iran (Islamic Republic of)',625,0),(102,'IQ','Iraq',42,0),(103,'IE','Ireland',1,0),(104,'IL','Israel',364,0),(105,'IT','Italy',58,0),(106,'CI','Ivory Coast',7,0),(107,'JM','Jamaica',12,0),(108,'JP','Japan',15,0),(109,'JO','Jordan',40,0),(110,'KZ','Kazakhstan',16,0),(111,'KE','Kenya',48,0),(112,'KI','Kiribati',0,0),(113,'KP','Korea, Democratic People\'s Republic of',0,0),(114,'KR','Korea, Republic of',25,0),(115,'XK','Kosovo',0,0),(116,'KW','Kuwait',759,0),(117,'KG','Kyrgyzstan',14,0),(118,'LA','Lao People\'s Democratic Republic',6,0),(119,'LV','Latvia',1,0),(120,'LB','Lebanon',11,0),(121,'LS','Lesotho',0,0),(122,'LR','Liberia',0,0),(123,'LY','Libyan Arab Jamahiriya',16,0),(124,'LI','Liechtenstein',0,0),(125,'LT','Lithuania',2,0),(126,'LU','Luxembourg',3,0),(127,'MO','Macau',0,0),(128,'MK','Macedonia',1,0),(129,'MG','Madagascar',2,0),(130,'MW','Malawi',0,0),(131,'MY','Malaysia',2230,0),(132,'MV','Maldives',105,0),(133,'ML','Mali',1,0),(134,'MT','Malta',0,0),(135,'MH','Marshall Islands',0,0),(136,'MQ','Martinique',0,0),(137,'MR','Mauritania',4,0),(138,'MU','Mauritius',29,0),(139,'TY','Mayotte',0,0),(140,'MX','Mexico',25,0),(141,'FM','Micronesia, Federated States of',0,0),(142,'MD','Moldova, Republic of',0,0),(143,'MC','Monaco',12,0),(144,'MN','Mongolia',0,0),(145,'ME','Montenegro',0,0),(146,'MS','Montserrat',0,0),(147,'MA','Morocco',44,0),(148,'MZ','Mozambique',5,0),(149,'MM','Myanmar',13,0),(150,'NA','Namibia',4,0),(151,'NR','Nauru',0,0),(152,'NP','Nepal',500,0),(153,'NL','Netherlands',40,0),(154,'AN','Netherlands Antilles',0,0),(155,'NC','New Caledonia',0,0),(156,'NZ','New Zealand',8,0),(157,'NI','Nicaragua',1,0),(158,'NE','Niger',12,0),(159,'NG','Nigeria',298,0),(160,'NU','Niue',0,0),(161,'NF','Norfork Island',0,0),(162,'MP','Northern Mariana Islands',0,0),(163,'NO','Norway',1,0),(164,'OM','Oman',1222,0),(165,'PK','Pakistan',32862,0),(166,'PW','Palau',0,0),(167,'PA','Panama',4,0),(168,'PG','Papua New Guinea',31,0),(169,'PY','Paraguay',9,0),(170,'PE','Peru',72,0),(171,'PH','Philippines',133,0),(172,'PN','Pitcairn',0,0),(173,'PL','Poland',22,0),(174,'PT','Portugal',3,0),(175,'PR','Puerto Rico',0,0),(176,'QA','Qatar',837,0),(177,'RE','Reunion',0,0),(178,'RO','Romania',35,0),(179,'RU','Russian Federation',103,0),(180,'RW','Rwanda',3,0),(181,'KN','Saint Kitts and Nevis',0,0),(182,'LC','Saint Lucia',0,0),(183,'VC','Saint Vincent and the Grenadines',0,0),(184,'WS','Samoa',0,0),(185,'SM','San Marino',0,0),(186,'ST','Sao Tome and Principe',0,0),(187,'SA','Saudi Arabia',4469,0),(188,'SN','Senegal',10,0),(189,'RS','Serbia',1,0),(190,'SC','Seychelles',7,0),(191,'SL','Sierra Leone',0,0),(192,'SG','Singapore',177,0),(193,'SK','Slovakia',14,0),(194,'SI','Slovenia',0,0),(195,'SB','Solomon Islands',0,0),(196,'SO','Somalia',1,0),(197,'ZA','South Africa',368,0),(198,'GS','South Georgia South Sandwich Islands',0,0),(199,'ES','Spain',25,0),(200,'LK','Sri Lanka',970,0),(201,'SH','St. Helena',0,0),(202,'PM','St. Pierre and Miquelon',0,0),(203,'SD','Sudan',160,0),(204,'SR','Suriname',1,0),(205,'SJ','Svalbarn and Jan Mayen Islands',0,0),(206,'SZ','Swaziland',0,0),(207,'SE','Sweden',295,0),(208,'CH','Switzerland',3,0),(209,'SY','Syrian Arab Republic',17,0),(210,'TW','Taiwan',3,0),(211,'TJ','Tajikistan',3,0),(212,'TZ','Tanzania, United Republic of',99,0),(213,'TH','Thailand',114,0),(214,'TG','Togo',1,0),(215,'TK','Tokelau',0,0),(216,'TO','Tonga',0,0),(217,'TT','Trinidad and Tobago',9,0),(218,'TN','Tunisia',25,0),(219,'TR','Turkey',445,0),(220,'TM','Turkmenistan',0,0),(221,'TC','Turks and Caicos Islands',0,0),(222,'TV','Tuvalu',0,0),(223,'UG','Uganda',28,0),(224,'UA','Ukraine',30,0),(225,'AE','United Arab Emirates',4517,0),(226,'GB','United Kingdom',987,0),(227,'UM','United States minor outlying islands',0,0),(228,'UY','Uruguay',4,0),(229,'UZ','Uzbekistan',103,0),(230,'VU','Vanuatu',0,0),(231,'VA','Vatican City State',0,0),(232,'VE','Venezuela',3,0),(233,'VN','Vietnam',33,0),(234,'VG','Virigan Islands (British)',0,0),(235,'VI','Virgin Islands (U.S.)',0,0),(236,'WF','Wallis and Futuna Islands',0,0),(237,'EH','Western Sahara',0,0),(238,'YE','Yemen',100,0),(239,'YU','Yugoslavia',0,0),(240,'ZR','Zaire',0,0),(241,'ZM','Zambia',11,0),(242,'ZW','Zimbabwe',8,0);
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `favorites`
--

DROP TABLE IF EXISTS `favorites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `favorites` (
  `member` varchar(32) NOT NULL DEFAULT '',
  `model` varchar(32) NOT NULL DEFAULT '',
  `dateadded` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favorites`
--

LOCK TABLES `favorites` WRITE;
/*!40000 ALTER TABLE `favorites` DISABLE KEYS */;
INSERT INTO `favorites` VALUES ('info@lasgrutasrn.com.ar','$tempUser','2012-05-29 09:05:29'),('iuri_maicon@hotmail.com','$tempUser','2012-05-28 10:05:44'),('diminossi@yahoo.com.br','$tempUser','2012-05-28 10:05:09'),('','Model','2017-06-04 10:06:51'),('paolo_gaspareti','NICOLETTE','2017-05-25 02:05:49'),('yertx78','NICOLETTE','0000-00-00 00:00:00'),('','culi','2017-06-06 07:06:14'),('','Annette','2017-06-05 09:06:20'),('','Holly','2017-06-05 10:06:04'),('pruebas','','2017-03-27 01:03:10'),('','menlindo','2017-06-02 12:06:38'),('','Tara','2017-05-27 12:05:04'),('','Gabriel','2017-05-27 09:05:12'),('','Nicole','2017-05-26 11:05:05'),('','Ella','2017-05-26 11:05:32'),('','GRACE','2017-05-26 08:05:02'),('','CAROL','2017-05-26 01:05:31'),('','EMYLI','2017-05-26 01:05:11'),('','SAMANTA','2017-06-27 11:06:25'),('','KATIE','2017-06-27 07:06:44'),('','DENISFOX','2017-06-27 08:06:05'),('','WENDY','2017-07-05 05:07:46'),('','NASLY','2017-07-05 05:07:16'),('','LOLITA','2017-07-05 05:07:21'),('','VANESSAWILLIAMS','2017-07-05 05:07:11'),('','SINDYCREIN','2017-07-05 05:07:33'),('','ANDYYSAN','2017-07-24 09:07:10'),('','Tanya','2017-10-01 08:10:33'),('','amelia','2017-11-04 02:11:45'),('','ADELA','2017-11-04 03:11:54'),('','eva','2017-11-04 04:11:49'),('','KolaBaby','2017-11-24 05:11:52'),('','roxi','2017-11-04 08:11:51'),('','yurany','2017-11-05 10:11:20'),('','maite','2018-01-22 03:01:08'),('','talia','2018-01-22 03:01:42'),('','mali','2018-01-22 04:01:53'),('','SHIRLEYCUAN','2018-01-22 04:01:33'),('','AMELIANICK','2018-01-22 05:01:15'),('','SARAYCASTILLO','2018-01-22 05:01:14'),('','mariana','2018-01-22 06:01:39'),('','NICOLETTE','2018-01-25 10:01:05'),('','Beautyfull','2018-02-15 05:02:57'),('','XIMENA','2018-02-15 05:02:58'),('','SARA','2018-02-16 07:02:46'),('','mina','2018-02-16 07:02:35'),('','ETHAN','2018-03-15 04:03:28'),('','belalexandra','2018-04-04 08:04:24'),('','MARY','2018-04-05 09:04:07'),('','roxana','2019-03-29 06:03:38'),('','MICKYDENY','2019-03-30 04:03:21'),('','Zoe','2019-03-30 09:03:56'),('','marynela','2019-04-05 10:04:48'),('','sandra','2019-04-06 10:04:11'),('','CAMLOVE','2019-04-06 11:04:59'),('','Cassy','2019-04-14 01:04:09'),('','marlu','2019-04-24 10:04:55'),('','yaridza','2019-04-25 08:04:27'),('','Mike','2019-06-02 11:06:58'),('','','2019-06-10 10:06:03'),('','Abby','2019-06-13 03:06:34'),('','Eve','2019-06-13 04:06:39'),('','roxana-0','2019-07-10 07:07:03'),('','roxanas3','2019-07-10 07:07:03'),('','wel','2019-09-02 03:09:09'),('','dali','2019-09-03 04:09:05'),('','dina','2019-09-04 09:09:30'),('','roxanaâ€˜â€™','2019-09-25 08:09:35'),('','ali','2019-11-05 05:11:11'),('','SOPHIE','2019-11-23 04:11:55'),('','pamela','2019-11-23 12:11:55'),('','SUSAN','2019-11-24 06:11:11'),('','katrina','2019-11-27 05:11:19'),('','c:/Windows/system.ini','2020-03-29 10:03:46'),('','c:Windowssystem.ini','2020-03-29 10:03:47'),('','/etc/passwd','2020-03-29 10:03:48'),('','c:/','2020-03-29 10:03:48'),('','/','2020-03-29 10:03:49'),('','WEB-INF/web.xml','2020-03-29 10:03:49'),('','WEB-INFweb.xml','2020-03-29 10:03:50'),('','/WEB-INF/web.xml','2020-03-29 10:03:50'),('','roxana\"','2020-04-01 10:04:03');
/*!40000 ALTER TABLE `favorites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modelpictures`
--

DROP TABLE IF EXISTS `modelpictures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modelpictures` (
  `ID` int(25) NOT NULL AUTO_INCREMENT,
  `user` varchar(32) NOT NULL DEFAULT '',
  `name` varchar(32) NOT NULL DEFAULT '',
  `dateuploaded` bigint(20) NOT NULL DEFAULT '0',
  KEY `ID` (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=111307 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modelpictures`
--

LOCK TABLES `modelpictures` WRITE;
/*!40000 ALTER TABLE `modelpictures` DISABLE KEYS */;
INSERT INTO `modelpictures` VALUES (111298,'lauri','15c3ae5662d11f273ecf1ac4eab0144b',1520194517),(111295,'lauri','fa22f9007cdbc00134df69e9364a025d',1513531478),(111296,'lauri','d01df87e63181c25a5ada5448f75844a',1513531517),(111297,'lauri','70b9b82487e017a6e42097788c62c131',1513531537),(111299,'lauri','c6064ea187095cf2e8aa85b9f9f5b516',1520194546),(111300,'lauri','3cda0499eaef299271819982594f6519',1520194770),(111301,'lauri','1ba64a1120775189cb39a9646373dabb',1520194793),(111303,'lauri','954baccd0db16959352aa271a5556311',1520194832),(111304,'lauri','8cbde754c48788324a8504a2989af601',1520195038),(111305,'lauri','bbfd7203c7748053898555470af35cca',1520195060),(111306,'lauri','f9c6e61445592c781a8fc8ed802ee311',1520195157);
/*!40000 ALTER TABLE `modelpictures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modelshows`
--

DROP TABLE IF EXISTS `modelshows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modelshows` (
  `user` varchar(32) NOT NULL DEFAULT '',
  `name` varchar(24) NOT NULL DEFAULT '',
  `string` varchar(32) NOT NULL DEFAULT '',
  `previewtime` bigint(20) NOT NULL DEFAULT '0',
  `movietime` bigint(20) NOT NULL DEFAULT '0',
  `price` mediumint(9) NOT NULL DEFAULT '300',
  PRIMARY KEY (`user`,`string`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modelshows`
--

LOCK TABLES `modelshows` WRITE;
/*!40000 ALTER TABLE `modelshows` DISABLE KEYS */;
/*!40000 ALTER TABLE `modelshows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `package`
--

DROP TABLE IF EXISTS `package`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `tokens` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `package`
--

LOCK TABLES `package` WRITE;
/*!40000 ALTER TABLE `package` DISABLE KEYS */;
/*!40000 ALTER TABLE `package` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagseguro`
--

DROP TABLE IF EXISTS `pagseguro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagseguro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `referencia` varchar(35) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `usuario` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `item` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `valor` decimal(11,2) NOT NULL,
  `moneda` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `metodo` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_transac` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `referencia` (`referencia`),
  UNIQUE KEY `email` (`referencia`),
  UNIQUE KEY `email_2` (`referencia`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagseguro`
--

LOCK TABLES `pagseguro` WRITE;
/*!40000 ALTER TABLE `pagseguro` DISABLE KEYS */;
INSERT INTO `pagseguro` VALUES (22,'20120528153703','2012-05-28 15:37:03','svvg6@yahoo.es','C25','25 Creditos',25.00,'BRL','Pré','',''),(2,'20120517155304','2012-05-17 15:53:04','diminossi@yahoo.com.br','C1','1 Creditos',1.00,'BRL','Cancelado','','A926C0860F164C7E97318C0AEF262BA8'),(3,'20120517155511','2012-05-17 15:55:11','diminossi@yahoo.com.br','C1','1 Creditos',1.00,'BRL','Completo','','DBEFB6EDC2034A94B0CCD68E1A8F3B40'),(21,'20120523165309','2012-05-23 16:53:09','jeffersonrn17@hotmail.com','C10','10 Creditos',10.00,'BRL','Pré','',''),(5,'20120517160908','2012-05-17 16:09:08','diminossi@yahoo.com.br','C1','1 Creditos',1.00,'BRL','Completo','','BE56EA962BFC451BB0EF96DA3093FDAD'),(6,'20120517182359','2012-05-17 18:23:59','diminossi@yahoo.com.br','C10','10 Creditos',10.00,'BRL','Completo','','34629C9F2B0346068D96FC7FC866417A'),(20,'20120523153333','2012-05-23 15:33:33','prwesley@gmail.com','C50','50 Creditos',50.00,'BRL','Pré','',''),(19,'20120521180758','2012-05-21 18:07:58','diminossi@yahoo.com.br','C10','10 Creditos',10.00,'BRL','Completo','','FC92A73C014C414D8FEE3BE47265BCD7'),(10,'20120518001059','2012-05-18 00:10:59','diminossi@yahoo.com.br','C10','10 Creditos',10.00,'BRL','WAITING_PAYMENT','',''),(23,'20120602084128','2012-06-02 08:41:28','mario.hiroshiishihara@gmail.com','C150','150 Creditos',150.00,'BRL','Aprovado','','1E3839B76C0B42EBBDAFC4E35A156D96'),(16,'20120518224535','2012-05-18 22:45:35','diminossi@yahoo.com.br','C10','10 Creditos',10.00,'BRL','Completo','','3C5BB5D2779F4761BB10433933EB414D'),(17,'20120521115146','2012-05-21 11:51:46','diminossi@yahoo.com.br','C10','10 Creditos',10.00,'BRL','Completo','','7E90218859814F3FB58580A6E582F94F'),(18,'20120521122507','2012-05-21 12:25:07','diminossi@yahoo.com.br','C1','1 Creditos',1.00,'BRL','Completo','','A814F85106254340AA7712294E00649C'),(24,'20120606204138','2012-06-06 20:41:38','cmessias4@gmail.com','C25','25 Creditos',25.00,'BRL','Pré','',''),(33,'88Y50389EC011633F','2017-03-21 00:55:33','pruebas','Little','50 Tokens',5.99,'USD','Pending','PayPal','88Y50389EC011633F'),(35,'8DG33177TS465811E','2017-03-21 01:24:30','pruebas','Little','50 Tokens',5.99,'USD','Pending','PayPal - S','8DG33177TS465811E'),(36,'0KW93572X8552891F','2017-03-21 01:41:55','pruebas','Little','50 Tokens',5.99,'USD','Pending','PayPal - S','0KW93572X8552891F'),(37,'1FD41909KT477905K','2017-03-21 08:06:02','hernan','Bronze','100 Tokens',10.99,'USD','Pending','PayPal - S','1FD41909KT477905K');
/*!40000 ALTER TABLE `pagseguro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payccbill`
--

DROP TABLE IF EXISTS `payccbill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payccbill` (
  `code` int(11) NOT NULL,
  `act` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `frmname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codtxt` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payccbill`
--

LOCK TABLES `payccbill` WRITE;
/*!40000 ALTER TABLE `payccbill` DISABLE KEYS */;
INSERT INTO `payccbill` VALUES (1,'945650','0002','211ck','IKfjAKCiPZoFfSHpid6TEbb6');
/*!40000 ALTER TABLE `payccbill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paymentgate`
--

DROP TABLE IF EXISTS `paymentgate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paymentgate` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paymentgate`
--

LOCK TABLES `paymentgate` WRITE;
/*!40000 ALTER TABLE `paymentgate` DISABLE KEYS */;
INSERT INTO `paymentgate` VALUES (1,'angelitasonline@gmail.com','');
/*!40000 ALTER TABLE `paymentgate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `id` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `date` bigint(24) NOT NULL DEFAULT '0',
  `ammount` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `taxes` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `method` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `details` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`date`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES ('88Y50389EC011633F',1490075733,'5.99','','PayPal','pruebas -\n 50 tokens - anderson.osorio2010@gmail.com'),('8DG33177TS465811E',1490077470,'5.99','','PayPal - San','pruebas -\n 50 tokens - anderson.osorio2010@gmail.com'),('0KW93572X8552891F',1490078515,'5.99','','PayPal - San','pruebas -\n 50 tokens - anderson.osorio2010@gmail.com'),('1FD41909KT477905K',1490101562,'10.99','','PayPal - San','hernan -\n 100 tokens - angelitasonline@gmail.com');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paypal`
--

DROP TABLE IF EXISTS `paypal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paypal` (
  `code` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sandbox_mode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paypal`
--

LOCK TABLES `paypal` WRITE;
/*!40000 ALTER TABLE `paypal` DISABLE KEYS */;
INSERT INTO `paypal` VALUES (1,'angelitasonline@gmail.com','Yes','USD');
/*!40000 ALTER TABLE `paypal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setting` (
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting`
--

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` VALUES ('license_key','123');
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videosessions`
--

DROP TABLE IF EXISTS `videosessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `videosessions` (
  `sessionid` varchar(32) NOT NULL DEFAULT '',
  `member` varchar(32) NOT NULL DEFAULT '',
  `model` varchar(32) NOT NULL DEFAULT '',
  `sop` varchar(32) NOT NULL DEFAULT '',
  `cpm` mediumint(9) NOT NULL DEFAULT '0',
  `epercentage` smallint(6) NOT NULL DEFAULT '0',
  `date` int(11) NOT NULL DEFAULT '0',
  `duration` mediumint(9) NOT NULL DEFAULT '0',
  `paid` char(1) NOT NULL DEFAULT '',
  `soppaid` char(1) NOT NULL DEFAULT '0',
  `type` varchar(12) NOT NULL DEFAULT '',
  KEY `sessionid` (`sessionid`,`member`,`model`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videosessions`
--

LOCK TABLES `videosessions` WRITE;
/*!40000 ALTER TABLE `videosessions` DISABLE KEYS */;
INSERT INTO `videosessions` VALUES ('b263b187cdd84fff34c1d20f53d35a97','Member','Model','none',200,50,1403981334,60,'1','0','tip'),('6fb140d28058b0926777e7042e595728','Member','Model','none',190,50,1403981283,60,'1','0','tip'),('e86041e417ddc20fc8374399fb0a0e26','Member','Model','none',100,50,1403956184,60,'1','0','tip'),('ae4696dd0a89a68fe7cb9f479af89672','Member','Model','none',200,50,1403956025,60,'1','0','tip'),('51cd252fcc3a757ed2e157ff00349baa','demo26','lolita','',10,50,1462251619,60,'0','0','tip'),('0d266ce2ced7c3f3aa940c422160c00e','demo26','lolita','',140,50,1462251660,60,'0','0','tip'),('f67742fcda6b09b86bee401068befc00','demo26','lolita','',10,50,1462251707,60,'0','0','show'),('359107f2069a6f749a5aaae3afa6f5ad','demo26','lolita','',10,50,1462251717,60,'0','0','show'),('4f80a0fe21c1076ed5847afe6d37c76f','demo26','lolita','',10,50,1462251732,60,'0','0','show'),('2df95a952a0593246ab4b22f08113d63','carloscarlos','madura','',1,50,1485449901,60,'0','0','tip'),('ba8a47ab42be30554a9a0023e3c667cc','carloscarlos','madura','',1,50,1485638708,60,'0','0','tip'),('c19263828764c9ed399a82c62001aac9','carloscarlos','madura','',10,50,1485638717,60,'0','0','show'),('a4c5d3ce0735846ff3fadfb602bed4f9','carloscarlos','madura','',10,50,1485638722,60,'0','0','show'),('cc450484eaeaed4a760c0ea8c94a6b7d','carloscarlos','madura','',1,50,1485639012,60,'0','0','tip'),('b3f0d76406797de607a0807a41fe0dc4','carloscarlos','madura','',10,50,1485639024,60,'0','0','show'),('471be92b229d585c903bcd85281f9278','carloscarlos','madura','',10,50,1485639028,60,'0','0','show'),('79fab9e5a6f9ce4e371c2f1d49a5237a','carloscarlos','madura','',10,50,1485816962,60,'0','0','show'),('1eeac1110dc2d290ccf31e4d43f7f247','hernan','madura','',4,50,1485890749,60,'0','0','tip'),('652a341ecfd2a47aba83023a646ffa5c','hernan','madura','',2,50,1485890813,60,'0','0','tip'),('e0b1cd48efb80c4a36ccbbab3c3e2873','hernan','madura','',1,50,1485890859,60,'0','0','tip'),('6464899bf3cd78a79a30d92f0cb9195f','hernan','madura','',10,50,1485890946,60,'0','0','show'),('7af99709aba1119a859dbfba94905bbe','hernan','madura','',1,50,1485891212,60,'0','0','tip'),('2018d8ee6b92df56f5ff33842ef2ab63','hernan','madura','',10,50,1485892682,60,'0','0','show'),('fa74972e98dcd1e3a0a0aa990bd3a1a7','hernan','madura','',10,50,1485892748,60,'0','0','show'),('ca8d4f81854073042e09b0e928d6e84d','hernan','madura','',10,50,1485892807,60,'0','0','show'),('e11419950bf7b7704c3348d79dc1b823','hernan','madura','',1,50,1485892881,60,'0','0','tip'),('f795eb04413d12879358771a2c0324d9','hernan','madura','',2,50,1485892936,60,'0','0','tip'),('46c5853414803417645b4498678728e4','hernan','wendy','',1,50,1486259345,60,'0','0','tip'),('40e7b1b78a6ad1c14553fbb8d44aea2a','hernan','wendy','',3,50,1486259502,60,'0','0','tip'),('1233fc18659a935b0446ee2f0a9925c2','hernan','wendy','',1,50,1486347433,60,'0','0','tip'),('84e439fcb8d0b42f6fbfc8e8ac7d302c','hernan','wendy','',1,50,1486347623,60,'0','0','tip'),('b386681f0980329c690e78004f617cd4','hernan','wendy','',2,50,1486348853,60,'0','0','tip'),('841c843c3a33f4ede1a308debb09a6d1','hernan','wendy','',1,50,1486414176,60,'0','0','tip'),('d01a18a70cd7fb258f647c04a31a9834','hernan','wendy','',3,50,1486414246,60,'0','0','tip'),('a99941c442ac10165587e3121a6e3579','','wendy','',0,50,1491353953,60,'0','0','tip'),('faff275b33f66ed710761e7f96e2f23c','','wendy','',0,50,1491353981,60,'0','0','tip'),('3a398be60839180eb4b22b072468392c','','wendy','',0,50,1491354228,60,'0','0','tip'),('f11dd8e897893de258a131f2a100f7fd','','wendy','',0,50,1491354424,60,'0','0','tip'),('40506388b08307de7e6c4ff00dfa46bb','','wendy','',0,50,1491355668,60,'0','0','tip'),('4d626cc740ed1e525671306b11ac45ec','','wendy','',0,50,1491355844,60,'0','0','tip'),('33e996b6f69672abc5fd26785aae393d','','wendy','',0,50,1491364306,60,'0','0','tip'),('f8b6b52a64e45abee4bd6389195fda15','','wendy','',0,50,1491364411,60,'0','0','tip'),('10225634488c330854b35d9a1af338ac','','wendy','',10,50,1491366045,60,'0','0','show'),('6c9368c9abb08529c76a5dfe478aae00','','wendy','',0,50,1491366087,60,'0','0','tip'),('76b9d003ea3d98274950dbb926268ad1','pruebas','wendy','',10,50,1491415519,60,'0','0','show'),('6ecde1cbbe2d6dc6b9200825098bfb27','hernan','wendy','',0,50,1491418553,60,'0','0','tip'),('9ab331e0d561fd22af069f23b542348a','hernan','wendy','',0,50,1491419324,60,'0','0','tip'),('3a38231a63ad064342c5c3cf5d58fbba','pruebas','wendy','',0,50,1491420836,60,'0','0','tip'),('86a4bedb45c41825b677734b3ee95f73','hernan','wendy','',0,50,1491426299,60,'0','0','tip'),('582fb0bc54b0e365d0895c6f8dc047ad','hernan','wendy','',0,50,1491427018,60,'0','0','tip'),('0e87d4a83026d606a390b3f4640bbc6a','hernan','wendy','',0,50,1491427956,60,'0','0','tip'),('661a4a1c82625ab366b7f67bebf7757f','hernan','wendy','',0,50,1491428291,60,'0','0','tip'),('9d0574f5cf22fbf4383b8363b83cf4fb','hernan','wendy','',0,50,1491446434,60,'0','0','tip'),('6126ed42b279b81985a107f903488f6d','pruebas','wendy','',0,50,1491446453,60,'0','0','tip'),('81a18c7dfe80768881dc2ce579307f23','hernan','wendy','',10,50,1491446784,60,'0','0','show'),('0ea32e8c385da01ee62e5e69834f1136','hernan','wendy','',0,50,1491446808,60,'0','0','tip'),('1c8c2892d6679b210ec07a68e88e8693','hernan','wendy','',10,50,1491446849,60,'0','0','show'),('4af997ec1bbe369cc6a31b9d63307d87','hernan','wendy','',10,50,1491446851,60,'0','0','show'),('ea195025b69472b74103c442af99a448','hernan','wendy','',10,50,1491446855,60,'0','0','show'),('defeebfcda34a24999a893dfdb45ea6c','hernan','wendy','',10,50,1491446915,60,'0','0','show'),('2c25cdab2ed6bff48efac34aacd5af0f','hernan','wendy','',10,50,1491446975,60,'0','0','show'),('370490cd7b3cb480090025c11b1ad948','hernan','wendy','',10,50,1491447035,60,'0','0','show'),('ca33bc99c603da97ba93fdd93d2c4cf3','hernan','wendy','',10,50,1491447095,60,'0','0','show'),('f6bf40c28cbee31dc3a66ba3c0409691','hernan','wendy','',0,50,1491447145,60,'0','0','tip'),('35f4ae8c61c0bbf6dbe5c4d6a20a7bb2','hernan','wendy','',0,50,1491447566,60,'0','0','tip'),('7382fb2525e3f10a5621a0f84ca0d04b','pruebas','wendy','',0,50,1491447953,60,'0','0','tip'),('9af10c9d470080aa4a6f2b277f70b490','pruebas','wendy','',0,50,1491447973,60,'0','0','tip'),('a86856ba2c889c9e8fea1efacaea7004','pruebas','wendy','',10,50,1491449312,60,'0','0','tip'),('6f2a9766fd3e2138c1d1dd97cafba44c','pruebas','wendy','',0,50,1491449777,60,'0','0','tip'),('b1a00d7a08df3b20f68c68303b56fd53','pruebas','wendy','',0,50,1491450178,60,'0','0','tip'),('b30de61165227c144de942395e80d358','pruebas','wendy','',10,50,1491450252,60,'0','0','tip'),('4ac82da8f0991947e1b640b4cb142fc7','hernan','wendy','',1,50,1491452362,60,'0','0','tip'),('e2f1c8d386b331db38b9d0a0ff14f375','hernan','wendy','',2,50,1491452406,60,'0','0','tip'),('6a0b3053539635ad50a269b4098c2527','pruebas','wendy','',0,50,1491453128,60,'0','0','tip'),('ebfd97caea80243004b924b9aa9c0a9e','hernan','chicodeli','',1,50,1491488469,60,'0','0','tip'),('b36f5669f1566ca810e57a76d8c7e40b','hernan','wendy','',1,50,1491493167,60,'0','0','tip'),('6a1c97c5156038241faf3a182b55736a','hernan','wendy','',1,50,1491493266,60,'0','0','tip'),('bedcbb14211734e89988f82aa7a369a0','hernan','wendy','',2,50,1491592777,60,'0','0','tip'),('5dc14a7df12f1431cf8c08b635fa9ba2','hernan','wendy','',10,50,1491592859,60,'0','0','show'),('7732e7c6f2b96a0b7681ac5abc7ae1e7','hernan','wendy','',10,50,1491592861,60,'0','0','show'),('686eaf2dcbdeaf93043c82abb5401269','hernan','wendy','',10,50,1491592921,60,'0','0','show'),('b1122744e42a3e75ead729dfa13cc23c','hernan','wendy','',10,50,1491592980,60,'0','0','show'),('396f35a2f3ad03effa694a2d0e5eb207','hernan','wendy','',10,50,1491593041,60,'0','0','show'),('e5dd7741bfc7ad621129b5de4554b50d','hernan','wendy','',10,50,1491593104,60,'0','0','show'),('e085a676bfc2806178e451710c6cd821','hernan','wendy','',10,50,1491593161,60,'0','0','show'),('188bee69b3a10c6cfd02ea3024079428','hernan','wendy','',10,50,1491593223,60,'0','0','show'),('bc07c037b0b28571bcfc235e37518b31','hernan','wendy','',10,50,1491593283,60,'0','0','show'),('5d5d0d0b0d802d4bd6de7a240fbe7fc0','hernan','wendy','',10,50,1491593344,60,'0','0','show'),('b658ec54ba5d18de1ae32dd8e7be5d08','frankie86','NICOLETTE','',5,50,1494864488,60,'0','0','tip'),('004a78091685bcf7809e3e8c641a0f76','hernan','NICOLETTE','',10,50,1495650358,60,'0','0','show'),('a5ca99d7aaf4acc8d6711e9602eb8d65','hernan','NICOLETTE','',10,50,1495650360,60,'0','0','show'),('06ae2a97137860f00fd8b2322ab8f8cf','hernan','NICOLETTE','',10,50,1495650366,60,'0','0','show'),('3afa781a03d2a4a6605632e58ff3f4b6','hernan','NICOLETTE','',10,50,1495650428,60,'0','0','show'),('7982931699a4a67a30e792a40cd35220','hernan','NICOLETTE','',10,50,1495650487,60,'0','0','show'),('3b9296316d43e91a3759b3193b994a03','hernan','NICOLETTE','',10,50,1495650547,60,'0','0','show'),('fc6c02e29b2990218757badc798f92d1','hernan','NICOLETTE','',10,50,1495650607,60,'0','0','show'),('427b7a6310c02806d8653126a2fa483d','hernan','NICOLETTE','',10,50,1495650667,60,'0','0','show'),('cf0745b9aa459594d0f04bfec7a8a91c','hernan','NICOLETTE','',10,50,1495650738,60,'0','0','show'),('d26e1a86d16976230c867d39f3297fc7','hernan','NICOLETTE','',10,50,1495650797,60,'0','0','show'),('a8a48ef7ff0597f4633098ad2eea6308','pruebas','WENDY','',10,50,1496241147,60,'0','0','tip'),('83a968b51c17159a7cdbd1250862bbe2','pruebas','WENDY','',10,50,1496241170,60,'0','0','tip'),('93ee3b401a7bc85cc822fe81144c9307','pruebas','WENDY','',10,50,1496251444,60,'0','0','tip'),('47a27873ae574a1f4c834cd91aca401c','pruebas','WENDY','',10,50,1496251548,60,'0','0','tip'),('ffaa55f1af77c358f5e3929ea45f67eb','pruebas','WENDY','',1,50,1496286238,60,'0','0','tip'),('46279fbe263881b5f8fe6b897a8c30d3','pruebas','WENDY','',1,50,1496286345,60,'0','0','tip'),('73d6ffc758b672edb504475229bbb8b0','pruebas','WENDY','',1,50,1496286386,60,'0','0','tip'),('b91241d63bc6a6c962871b70961468d8','pruebas','WENDY','',1,50,1496286481,60,'0','0','tip'),('3bb65699eff8e9b6871cf9c186a7721d','pruebas','WENDY','',0,50,1497297235,60,'0','0','tip'),('242f57b6da9faac9acd0c5dfab896386','pruebas','WENDY','',0,50,1497297302,60,'0','0','tip');
/*!40000 ALTER TABLE `videosessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videosessions1`
--

DROP TABLE IF EXISTS `videosessions1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `videosessions1` (
  `sessionid` varchar(32) NOT NULL DEFAULT '',
  `member` varchar(32) NOT NULL DEFAULT '',
  `model` varchar(32) NOT NULL DEFAULT '',
  `sop` varchar(32) NOT NULL DEFAULT '',
  `cpm` mediumint(9) NOT NULL DEFAULT '0',
  `epercentage` smallint(6) NOT NULL DEFAULT '0',
  `date` int(11) NOT NULL DEFAULT '0',
  `duration` mediumint(9) NOT NULL DEFAULT '0',
  `paid` char(1) NOT NULL DEFAULT '',
  `soppaid` char(1) NOT NULL DEFAULT '0',
  `type` varchar(12) NOT NULL DEFAULT '',
  KEY `sessionid` (`sessionid`,`member`,`model`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videosessions1`
--

LOCK TABLES `videosessions1` WRITE;
/*!40000 ALTER TABLE `videosessions1` DISABLE KEYS */;
/*!40000 ALTER TABLE `videosessions1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `welcome`
--

DROP TABLE IF EXISTS `welcome`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `welcome` (
  `members` text,
  `models` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `welcome`
--

LOCK TABLES `welcome` WRITE;
/*!40000 ALTER TABLE `welcome` DISABLE KEYS */;
INSERT INTO `welcome` VALUES ('<html><h1>Welcome Members</h1></html> dfgdfgdfgdfgdgdfgdgdfgdfgdfgdfgdfgdfgdfgdfgdfdffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff	            ','<iframe width=\"560px\" height=\"315px\" src=\"//www.youtube.com/embed/VO21ytV5WUE?autoplay=1\" frameborder=\"0\" allowfullscreen></iframe>																										');
/*!40000 ALTER TABLE `welcome` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-08-30 20:28:44
