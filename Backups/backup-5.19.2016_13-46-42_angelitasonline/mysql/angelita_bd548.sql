-- MySQL dump 10.13  Distrib 5.5.42-37.1, for Linux (x86_64)
--
-- Host: localhost    Database: angelita_bd548
-- ------------------------------------------------------
-- Server version	5.5.42-37.1

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
INSERT INTO `blockedcountry` (`id`, `model`, `cc`) VALUES (0000000166,'Model','AO'),(0000000165,'Model','AD'),(0000000164,'Model','DZ'),(0000000163,'Model','AL');
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
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `name`) VALUES (52,'Girl'),(54,'Mature Woman'),(53,'Lesbian'),(63,'Fetish'),(57,'Gay'),(60,'Men'),(61,'Couple');
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
INSERT INTO `chatmodels` (`id`, `user`, `password`, `email`, `language1`, `language2`, `language3`, `language4`, `birthDate`, `braSize`, `birthSign`, `weight`, `weightMeasure`, `height`, `heightMeasure`, `eyeColor`, `ethnicity`, `message`, `position`, `fantasies`, `hobby`, `hairColor`, `hairLength`, `pubicHair`, `tImage`, `cpm`, `epercentage`, `minimum`, `category`, `name`, `country`, `state`, `city`, `zip`, `adress`, `actImage`, `pMethod`, `pInfo`, `dateRegistered`, `owner`, `lastLogIn`, `phone`, `fax`, `idtype`, `idmonth`, `idyear`, `idnumber`, `birthplace`, `ssnumber`, `msn`, `yahoo`, `icq`, `broadcastplace`, `emailtype`, `status`, `lastupdate`, `onlinemembers`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `sunday`, `saturday`, `gmt`, `forcedOnline`) VALUES ('38f97587a8eef7bd7cd3b855d2093209','Amber','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,'White','I am a demo performer so there is not really much to say here since I do not really exist..',NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Category3','demo','236','demo','demo','demo','demo','',NULL,NULL,1403990727,NULL,0,'demo',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('41b1e034ae9c0adf3630d881fe33cfe7','Tanya','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,'White','I am a demo performer so there is not really much to say here since I do not really exist..',NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Category7','demo','236','demo','demo','demo','demo','',NULL,NULL,1403990888,NULL,0,'demo',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('bdc0f2cdeced3bb15d1883c0272c03e7','Trinity','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,'White','I am a demo performer so there is not really much to say here since I do not really exist..',NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Category3','demo','236','demo','demo','demo','demo','',NULL,NULL,1403991157,NULL,0,'demo',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('e34fd4a32f2c1fe85995b6bfa4bb0878','Tiffany','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,'White','I am a demo performer so there is not really much to say here since I do not really exist..',NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Category1','demo','236','demo','demo','demo','demo','',NULL,NULL,1403991241,NULL,0,'demo',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('a19e121f61184d8dbaa1e85f04a96210','Tori','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,'White','I am a demo performer so there is not really much to say here since I do not really exist..',NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Category1','demo','236','demo','demo','demo','demo','',NULL,NULL,1403991499,NULL,0,'demo',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('ca68ff52ae5d99e40ce86a52dfa5d1cb','Frankie','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,'White','I am a demo performer so there is not really much to say here since I do not really exist..',NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Category2','demo','236','demo','demo','demo','demo','',NULL,NULL,1403989318,NULL,0,'demo',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('3683c3be2dfe2960e6a1d855d8f38342','Eve','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,'White','I am a demo performer so there is not really much to say here since I do not really exist..',NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Category5','demo','236','demo','demo','demo','demo','',NULL,NULL,1403989631,NULL,0,'demo',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('253d96ff3e76832ffd9d030c67c50f6a','Destiny','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,'Black','I am a demo performer so there is not really much to say here since I do not really exist..',NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Category1','demo','236','demo','demo','demo','demo','',NULL,NULL,1403989806,NULL,0,'demo',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('10fdae79a9726141a258bc4646e7b99b','Annette','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,'White','I am a demo performer so there is not really much to say here since I do not really exist..',NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Category1','demo','236','demo','demo','demo','demo','',NULL,NULL,1403990647,NULL,0,'demo',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('00e1fddcf14ac4b64fd39e6857d673e9','Beverley','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,'White','I am a demo performer so there is not really much to say here since I do not really exist..',NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Category1','demo','236','demo','demo','demo','demo','',NULL,NULL,1403990371,NULL,0,'demo',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('c178d44b6e269cedb799463411aaee0f','Holly','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,'White','I am a demo performer so there is not really much to say here since I do not really exist..',NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Category1','demo','236','demo','demo','demo','demo','',NULL,NULL,1403976813,NULL,0,'demo',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('70eddecc3e0f00c488dc73b98f0dc58a','Hannah','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,'White','I am a demo performer so there is not really much to say here since I do not really exist..',NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Category6','demo','236','demo','demo','demo','demo','',NULL,NULL,1403976958,NULL,0,'demo',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('383789dcce4bc2ad2bf3aac94794f7da','Gina','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,'White','I am a demo performer so there is not really much to say here since I do not really exist..',NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Category2','demo','236','demo','demo','demo','demo','',NULL,NULL,1403977141,NULL,0,'demo',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('9425d5151c2342c45bbbaa05dff658bd','Gabriel','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,'White','I am a demo performer so there is not really much to say here since I do not really exist..',NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Category7','demo','236','demo','demo','demo','demo','',NULL,NULL,1403989219,NULL,0,'demo',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('e8771964c5c212dedbc5b57fcdf13352','Katie','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,'White','I am a demo performer so there is not really much to say here since I do not really exist..',NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Category5','demo','40','demo','demo','demo','demo','',NULL,NULL,1403976442,NULL,0,'demo',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('4c0b40f86517d3441d72376bd3b33f1e','Julie','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,'White','I am a demo performer so there is not really much to say here since I do not really exist..',NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Category7','demo','236','demo','demo','demo','demo','',NULL,NULL,1403976565,NULL,0,'demo',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('8f53a4ba62f8ff89d0a8d0ae4fae768d','Nicole','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,'White','I am a demo performer so there is not really much to say here since I do not really exist..',NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Category1','demo','236','demo','demo','demo','demo','',NULL,NULL,1403975893,NULL,0,'demo',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('dc0d4a90c79549ef4471792cedd19174','Lori','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,'White','I am a demo performer so there is not really much to say here since I do not really exist..',NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Category1','demo','236','demo','demo','demo','demo','',NULL,NULL,1403976041,NULL,0,'demo',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('160d739cffb7d219494150757ff4ffeb','Kira','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,'White','I am a demo performer so there is not really much to say here since I do not really exist..',NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Category4','demo','236','demo','demo','demo','demo','',NULL,NULL,1403976226,NULL,0,'demo',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('345b4f4aad7476bfc85201d62fa24d73','Paige','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,'White','I am a demo performer so there is not really much to say here since I do not really exist..',NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Category1','demo','236','demo','demo','demo','demo','',NULL,NULL,1403975321,NULL,0,'demo',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('16f908cbe7b8ef8e7f4bb8313a57238d','Pamela','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,'White','I am a demo performer so there is not really much to say here since I do not really exist..',NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Category6','demo','236','demo','demo','demo','demo','',NULL,NULL,1403975726,NULL,0,'demo',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('bf34f053a25ed117fb0ea90464870851','Teresa','e10adc3949ba59abbe56e057f20f883e','support@camscripts.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,'White','I am a demo performer so there is not really much to say here since I do not really exist..',NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Category7','demo','1','demo','demo','demo','demo','',NULL,NULL,1403973713,NULL,0,'demo',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('6a3fb06889322952dfd9b4a5537e6ad6','Sylvia','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,'White','I am a demo performer so there is not really much to say here since I do not really exist..',NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Category5','demo','236','demo','demo','demo','demo','',NULL,NULL,1403974267,NULL,0,'demo',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('6282477e44aeb0bdfaad584f1c23421c','Sadie','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,'White','I am a demo performer so there is not really much to say here since I do not really exist..',NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Category1','demo','236','demo','demo','demo','demo','',NULL,NULL,1403975045,NULL,0,'demo',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('1dac4a3f61e69bebbeee6096c34e48af','Rachel','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,'White','I am a demo performer so there is not really much to say here since I do not really exist..',NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Category4','demo','236','demo','demo','demo','demo','',NULL,NULL,1403975251,NULL,0,'demo',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('8072dedb2eaf7f5a3cc933573f4f30a6','Victoria','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English',NULL,NULL,NULL,'01/Jan/1995',NULL,NULL,'0',NULL,'0',NULL,NULL,'White','I am a demo performer so there is not really much to say here since I do not really exist..',NULL,NULL,NULL,NULL,NULL,NULL,'',10,50,500,'Category1','demo','1','demo','demo','demo','demo','',NULL,NULL,1403972881,NULL,0,'demo',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,'text','online',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'+0',1),('28c88c11c9c86e61238ba78acc5fd66f','Tara','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English','','','','01/Jan/1995','','','','','','','','White','I am a demo performer so there is not really much to say here since I do not really exist..','','','','','','','',10,50,500,'Category1','demo','236','demo','demo','demo','demo','','pp','demo@demo.com',1403967350,NULL,1403970647,'demo','','','','','','','','','','','Michigan','text','online',NULL,0,'12pm-6pm','12pm-6pm','12pm-6pm','12pm-6pm','12pm-6pm','12pm-6pm','12pm-6pm','+0',1),('761b3270aa157b6523e2c8902638373e','Summer','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English','','','','01/Jan/1995','','','','','','','','White','I am a demo performer so there is not really much to say here since I do not really exist..','','','','','','','',10,50,500,'Category5','demo','1','demo','demo','demo','demo','','pp','demo@demo.com',1403967435,NULL,1403969958,'demo','','','','','','','','','','','California','text','online',NULL,0,'1am-6am','1am-6am','1am-6am','1am-6am','1am-6am','1am-6am','1am-6am','+0',1),('1a07a930cc85efe8215e98b8f4f5ff29','Aurora','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English','','','','01/Jan/1995','','','','','','','','White','I am a demo performer so there is not really much to say here since I do not really exist..','','','','','','','',10,50,500,'Category1','demo','1','demo','demo','demo','demo','','pp','demo@demo.com',1403960758,NULL,1403970503,'demo','','','','','','','','','','','Texas','text','online',NULL,0,'12am-5am','12am-5am','12am-5am','12am-5am','12am-5am','12am-5am','12am-5am','+0',1),('434e01fee27faa8749fbf1e1d004c9e0','Becky','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English','','','','01/Jan/1995','','','','','','','','White','I am a demo performer so there is not really much to say here since I do not really exist..','','','','','','','',10,50,500,'Category3','demo','236','demo','demo','demo','demo','','pp','demo@demo.com',1403963171,NULL,1403970228,'demo','','','','','','','','','','','California','text','online',NULL,0,'1am-12am','12am-12am','12am-12am','12am-12am','12am-12am','12am-12am','12am-12am','+0',1),('6a2c1fc88846463f99a090412cf9da23','Ella','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English','','','','01/Jan/1995','','','','','','','','White','I am a demo performer so there is not really much to say here since I do not really exist..','','','','','','','',10,50,500,'Category6','demo','236','demo','demo','demo','demo','','pp','demo@demo.com',1403965289,NULL,1403965531,'demo','','','','','','','','','','','California','text','online',NULL,0,'12am-9am','12am-4am','12am-4am','12am-9am','12am-4am','off-off','12am-4am','+0',1),('5deaec5c44dd35753ddb1471479b88a8','Wendy','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English','','','','01/Jan/1995','','','','','','','','White','I am a demo performer so there is not really much to say here since I do not really exist..','','','','','','','',10,50,500,'Category7','demo','236','demo','demo','demo','demo','','pp','demo@demo.com',1403967111,NULL,1403969109,'demo','','','','','','','','','','','','text','online',NULL,0,'12am-3am','12am-4am','12am-3am','12am-5am','2am-4am','1pm-6pm','1pm-6pm','+0',1),('25bf9d928f1eeb729fe18ea1b4415def','Angel','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English','','','','01/Jan/1995','','','','','','','','White','I am a demo performer so there is not really much to say here since I do not really exist..','','','','','','','',10,50,500,'Category3','demo','236','demo','demo','demo','demo','','pp','demo@demo.com',1403959965,NULL,1403968636,'demo','','','','','','','','','','','California','text','online',NULL,0,'1pm-6pm','1pm-6pm','1pm-6pm','1pm-6pm','1pm-6pm','1pm-6pm','1pm-6pm','+0',1),('ebc4c9412e1b0f879e009e0eb53adf52','Anna','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English','','','','01/Jan/1995','','','','','','','','White','I am a demo performer so there is not really much to say here since I do not really exist..','','','','','','','',10,50,500,'Category2','demo','1','demo','demo','demo','demo','','pp','test@test.com',1403960123,NULL,1403967879,'demo','','','','','','','','','','','','text','online',NULL,0,'12am-4am','12am-4am','12am-4am','12am-4am','12am-4am','12am-4am','12am-4am','+0',1),('13247bf0825aa3a12dab0072400ab4dd','Model','e10adc3949ba59abbe56e057f20f883e','support@camscripts.com','English','','','','01/Jan/1972','','','','','','','','White','LSD is, without a doubt, the king of hallucinogens. It is rather difficult to make by total synthesis, but with the right starting materials (lysergic acid, ergotamine) it is as easy to produce as your average THC or amphetamine. I call it the king because of the awesome potency.','','','','','','','Thumbnail Image',10,50,100,'Category1','Joe Blow','236','Florida','Jacksonville','12345','1234 Some Rd.','IdentityImage','pp','support@camscripts.com',1341610577,'none',1403981241,'123-456-7890','','','','','','','','','','','United States','text','online',1403985937,3,'12am-4am','12am-4am','12am-4am','12am-4am','12am-4am','off-off','1am-7am','+0',1),('941f639fbf60cf93e1b89d5fe53a8c17','Amanda','e10adc3949ba59abbe56e057f20f883e','support@fluffvision.com','English','','','','01/Jan/1995','','','','','','','','White','I am a demo performer so there is not really much to say here since I do not really exist..','','','','','','','',10,50,500,'Category1','demo','236','demo','demo','demo','demo','','pp','demo@demo.com',1403959796,NULL,1403969253,'demo','','','','','','','','','','','California','text','online',NULL,0,'12am-4am','12am-4am','12am-4am','12am-4am','12am-4am','12am-4am','12am-4am','+0',1),('361710fbffc346408e84ef3f8d87c04b','lolita','22ffd61b0e0ebff15c8f1e1a5318018e','correo@live.com.co','Dutch','','','','01/Jan/1975','','','','','','','','White','','','','','','','','',10,50,100,'Couple','lolita','49','valle','cali','253102','cl 25 25 25','','pp','',1462250825,NULL,1463538798,'3003224440','','','','','','','','','','','','text','offline',1463539575,1,'off-off','off-off','off-off','off-off','off-off','off-off','off-off','+0',1);
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
  `money` varchar(255) NOT NULL DEFAULT '1',
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
INSERT INTO `chatusers` (`id`, `user`, `password`, `email`, `name`, `country`, `state`, `city`, `phone`, `zip`, `adress`, `dateRegistered`, `lastLogIn`, `money`, `emailnotify`, `smsnotify`, `status`, `emailtype`, `freetime`, `freetimeexpired`) VALUES ('5f70b0b90efac1184027c721204130c8','demo26','c5c2d6df29f197bf9a1ecdbaef03ee01','julian@live.com.co','demo demo','49','valle','cali','','763022','',1462251510,1462251535,'821','0','0','active','text',120,0),('9f2aeb9db688cbb49f54e7b5f3d7f0e9','carlitos','3e91a2f1c51260456d0e6eeb78f841ab','carloshernanmoreraorjuela@hotmai','carlos hernanmorera','49','cundinmarca','bogota','','253201','',1462226932,2147483647,'1','0','0','active','text',120,0);
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
INSERT INTO `countries` (`id`, `name`, `code`) VALUES (33,'British Indian Ocean Ter',246),(32,'Brazil',55),(31,'Bouvet Island',0),(30,'Botswana',267),(29,'Bosnia and Herzegovina',387),(28,'Bonaire, Sint Eustatius ',599),(27,'Bolivia',591),(26,'Bhutan',975),(25,'Bermuda',1),(24,'Benin',229),(23,'Belize',501),(22,'Belgium',32),(21,'Belarus',375),(20,'Barbados',1),(19,'Bangladesh',880),(18,'Bahrain',973),(17,'Bahamas',1),(16,'Azerbaijan',994),(15,'Austria',43),(14,'Australia',61),(13,'Aruba',297),(12,'Armenia',374),(11,'Argentina',54),(10,'Antigua and Barbuda',1),(9,'Antarctica',672),(8,'Anguilla',1),(7,'Angola',244),(6,'Andorra',376),(5,'American Samoa',1),(4,'Algeria',213),(3,'Albania',355),(2,'Aland Islands',358),(1,'Afghanistan',93),(34,'Brunei',673),(35,'Bulgaria',359),(36,'Burkina Faso',226),(37,'Burundi',257),(38,'Cambodia',855),(39,'Cameroon',237),(40,'Canada',1),(41,'Cape Verde',238),(42,'Cayman Islands',1),(43,'Central African Republic',236),(44,'Chad',235),(45,'Chile',56),(46,'China',86),(47,'Christmas Island',61),(48,'Cocos (Keeling) Islands',61),(49,'Colombia',57),(50,'Comoros',269),(51,'Congo',242),(52,'Cook Islands',682),(53,'Costa Rica',506),(54,'Cote d\'ivoire (Ivory Coa',225),(55,'Croatia',385),(56,'Cuba',53),(57,'Curacao',599),(58,'Cyprus',357),(59,'Czech Republic',420),(60,'Democratic Republic of t',243),(61,'Denmark',45),(62,'Djibouti',253),(63,'Dominica',1),(64,'Dominican Republic',1),(65,'Ecuador',593),(66,'Egypt',20),(67,'El Salvador',503),(68,'Equatorial Guinea',240),(69,'Eritrea',291),(70,'Estonia',372),(71,'Ethiopia',251),(72,'Falkland Islands (Malvin',500),(73,'Faroe Islands',298),(74,'Fiji',679),(75,'Finland',358),(76,'France',33),(77,'French Guiana',594),(78,'French Polynesia',689),(79,'French Southern Territor',NULL),(80,'Gabon',241),(81,'Gambia',220),(82,'Georgia',995),(83,'Germany',49),(84,'Ghana',233),(85,'Gibraltar',350),(86,'Greece',30),(87,'Greenland',299),(88,'Grenada',1),(89,'Guadaloupe',590),(90,'Guam',1),(91,'Guatemala',502),(92,'Guernsey',44),(93,'Guinea',224),(94,'Guinea-Bissau',245),(95,'Guyana',592),(96,'Haiti',509),(97,'Heard Island and McDonal',0),(98,'Honduras',504),(99,'Hong Kong',852),(100,'Hungary',36),(101,'Iceland',354),(102,'India',91),(103,'Indonesia',62),(104,'Iran',98),(105,'Iraq',964),(106,'Ireland',353),(107,'Isle of Man',44),(108,'Israel',972),(109,'Italy',39),(110,'Jamaica',1),(111,'Japan',81),(112,'Jersey',44),(113,'Jordan',962),(114,'Kazakhstan',7),(115,'Kenya',254),(116,'Kiribati',686),(117,'Kosovo',381),(118,'Kuwait',965),(119,'Kyrgyzstan',996),(120,'Laos',856),(121,'Latvia',371),(122,'Lebanon',961),(123,'Lesotho',266),(124,'Liberia',231),(125,'Libya',218),(126,'Liechtenstein',423),(127,'Lithuania',370),(128,'Luxembourg',352),(129,'Macao',853),(130,'Macedonia',389),(131,'Madagascar',261),(132,'Malawi',265),(133,'Malaysia',60),(134,'Maldives',960),(135,'Mali',223),(136,'Malta',356),(137,'Marshall Islands',692),(138,'Martinique',596),(139,'Mauritania',222),(140,'Mauritius',230),(141,'Mayotte',262),(142,'Mexico',52),(143,'Micronesia',691),(144,'Moldava',373),(145,'Monaco',377),(146,'Mongolia',976),(147,'Montenegro',382),(148,'Montserrat',1),(149,'Morocco',212),(150,'Mozambique',258),(151,'Myanmar (Burma)',95),(152,'Namibia',264),(153,'Nauru',674),(154,'Nepal',977),(155,'Netherlands',31),(156,'New Caledonia',687),(157,'New Zealand',64),(158,'Nicaragua',505),(159,'Niger',227),(160,'Nigeria',234),(161,'Niue',683),(162,'Norfolk Island',672),(163,'North Korea',850),(164,'Northern Mariana Islands',1),(165,'Norway',47),(166,'Oman',968),(167,'Pakistan',92),(168,'Palau',680),(169,'Palestine',970),(170,'Panama',507),(171,'Papua New Guinea',675),(172,'Paraguay',595),(173,'Peru',51),(174,'Phillipines',63),(175,'Pitcairn',0),(176,'Poland',48),(177,'Portugal',351),(178,'Puerto Rico',1),(179,'Qatar',974),(180,'Reunion',262),(181,'Romania',40),(182,'Russia',7),(183,'Rwanda',250),(184,'Saint Barthelemy',590),(185,'Saint Helena',290),(186,'Saint Kitts and Nevis',1),(187,'Saint Lucia',1),(188,'Saint Martin',590),(189,'Saint Pierre and Miquelo',508),(190,'Saint Vincent and the Gr',1),(191,'Samoa',685),(192,'San Marino',378),(193,'Sao Tome and Principe',239),(194,'Saudi Arabia',966),(195,'Senegal',221),(196,'Serbia',381),(197,'Seychelles',248),(198,'Sierra Leone',232),(199,'Singapore',65),(200,'Sint Maarten',1),(201,'Slovakia',421),(202,'Slovenia',386),(203,'Solomon Islands',677),(204,'Somalia',252),(205,'South Africa',27),(206,'South Georgia and the So',500),(207,'South Korea',82),(208,'South Sudan',211),(209,'Spain',34),(210,'Sri Lanka',94),(211,'Sudan',249),(212,'Suriname',597),(213,'Svalbard and Jan Mayen',47),(214,'Swaziland',268),(215,'Sweden',46),(216,'Switzerland',41),(217,'Syria',963),(218,'Taiwan',886),(219,'Tajikistan',992),(220,'Tanzania',255),(221,'Thailand',66),(222,'Timor-Leste (East Timor)',670),(223,'Togo',228),(224,'Tokelau',690),(225,'Tonga',676),(226,'Trinidad and Tobago',1),(227,'Tunisia',216),(228,'Turkey',90),(229,'Turkmenistan',993),(230,'Turks and Caicos Islands',1),(231,'Tuvalu',688),(232,'Uganda',256),(233,'Ukraine',380),(234,'United Arab Emirates',971),(235,'United Kingdom',44),(236,'United States',1),(237,'United States Minor Outl',0),(238,'Uruguay',598),(239,'Uzbekistan',998),(240,'Vanuatu',678),(241,'Vatican City',39),(242,'Venezuela',58),(243,'Vietnam',84),(244,'Virgin Islands, British',1),(245,'Virgin Islands, US',1),(246,'Wallis and Futuna',681),(247,'Western Sahara',212),(248,'Yemen',967),(249,'Zambia',260),(250,'Zimbabwe',263);
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
INSERT INTO `country` (`id`, `country_code`, `country_name`, `hits`, `last_hits`) VALUES (1,'US','United States',911,0),(2,'CA','Canada',45,0),(3,'AF','Afghanistan',50,0),(4,'AL','Albania',8,0),(5,'DZ','Algeria',106,0),(6,'DS','American Samoa',0,0),(7,'AD','Andorra',0,0),(8,'AO','Angola',23,0),(9,'AI','Anguilla',0,0),(10,'AQ','Antarctica',0,0),(11,'AG','Antigua and/or Barbuda',0,0),(12,'AR','Argentina',18,0),(13,'AM','Armenia',24,0),(14,'AW','Aruba',0,0),(15,'AU','Australia',60,0),(16,'AT','Austria',1,0),(17,'AZ','Azerbaijan',25,0),(18,'BS','Bahamas',0,0),(19,'BH','Bahrain',337,0),(20,'BD','Bangladesh',11915,0),(21,'BB','Barbados',0,0),(22,'BY','Belarus',0,0),(23,'BE','Belgium',11,0),(24,'BZ','Belize',0,0),(25,'BJ','Benin',2,0),(26,'BM','Bermuda',0,0),(27,'BT','Bhutan',24,0),(28,'BO','Bolivia',5,0),(29,'BA','Bosnia and Herzegovina',0,0),(30,'BW','Botswana',2,0),(31,'BV','Bouvet Island',0,0),(32,'BR','Brazil',105,0),(33,'IO','British lndian Ocean Territory',0,0),(34,'BN','Brunei Darussalam',68,0),(35,'BG','Bulgaria',5,0),(36,'BF','Burkina Faso',1,0),(37,'BI','Burundi',2,0),(38,'KH','Cambodia',43,0),(39,'CM','Cameroon',1,0),(40,'CV','Cape Verde',3,0),(41,'KY','Cayman Islands',0,0),(42,'CF','Central African Republic',0,0),(43,'TD','Chad',1,0),(44,'CL','Chile',4,0),(45,'CN','China',817,0),(46,'CX','Christmas Island',0,0),(47,'CC','Cocos (Keeling) Islands',0,0),(48,'CO','Colombia',11,0),(49,'KM','Comoros',0,0),(50,'CG','Congo',1,0),(51,'CK','Cook Islands',0,0),(52,'CR','Costa Rica',10,0),(53,'HR','Croatia (Hrvatska)',2,0),(54,'CU','Cuba',0,0),(55,'CY','Cyprus',6,0),(56,'CZ','Czech Republic',0,0),(57,'DK','Denmark',0,0),(58,'DJ','Djibouti',11,0),(59,'DM','Dominica',0,0),(60,'DO','Dominican Republic',1,0),(61,'TP','East Timor',0,0),(62,'EC','Ecuador',1,0),(63,'EG','Egypt',165,0),(64,'SV','El Salvador',1,0),(65,'GQ','Equatorial Guinea',0,0),(66,'ER','Eritrea',0,0),(67,'EE','Estonia',0,0),(68,'ET','Ethiopia',122,0),(69,'FK','Falkland Islands (Malvinas)',0,0),(70,'FO','Faroe Islands',0,0),(71,'FJ','Fiji',0,0),(72,'FI','Finland',0,0),(73,'FR','France',71,0),(74,'FX','France, Metropolitan',0,0),(75,'GF','French Guiana',0,0),(76,'PF','French Polynesia',0,0),(77,'TF','French Southern Territories',0,0),(78,'GA','Gabon',0,0),(79,'GM','Gambia',0,0),(80,'GE','Georgia',13,0),(81,'DE','Germany',122,0),(82,'GH','Ghana',79,0),(83,'GI','Gibraltar',0,0),(84,'GR','Greece',12,0),(85,'GL','Greenland',0,0),(86,'GD','Grenada',0,0),(87,'GP','Guadeloupe',0,0),(88,'GU','Guam',0,0),(89,'GT','Guatemala',4,0),(90,'GN','Guinea',1,0),(91,'GW','Guinea-Bissau',0,0),(92,'GY','Guyana',5,0),(93,'HT','Haiti',7,0),(94,'HM','Heard and Mc Donald Islands',0,0),(95,'HN','Honduras',6,0),(96,'HK','Hong Kong',513,0),(97,'HU','Hungary',1,0),(98,'IS','Iceland',0,0),(99,'IN','India',430804,0),(100,'ID','Indonesia',9820,0),(101,'IR','Iran (Islamic Republic of)',625,0),(102,'IQ','Iraq',42,0),(103,'IE','Ireland',1,0),(104,'IL','Israel',364,0),(105,'IT','Italy',58,0),(106,'CI','Ivory Coast',7,0),(107,'JM','Jamaica',12,0),(108,'JP','Japan',15,0),(109,'JO','Jordan',40,0),(110,'KZ','Kazakhstan',16,0),(111,'KE','Kenya',48,0),(112,'KI','Kiribati',0,0),(113,'KP','Korea, Democratic People\'s Republic of',0,0),(114,'KR','Korea, Republic of',25,0),(115,'XK','Kosovo',0,0),(116,'KW','Kuwait',759,0),(117,'KG','Kyrgyzstan',14,0),(118,'LA','Lao People\'s Democratic Republic',6,0),(119,'LV','Latvia',1,0),(120,'LB','Lebanon',11,0),(121,'LS','Lesotho',0,0),(122,'LR','Liberia',0,0),(123,'LY','Libyan Arab Jamahiriya',16,0),(124,'LI','Liechtenstein',0,0),(125,'LT','Lithuania',2,0),(126,'LU','Luxembourg',3,0),(127,'MO','Macau',0,0),(128,'MK','Macedonia',1,0),(129,'MG','Madagascar',2,0),(130,'MW','Malawi',0,0),(131,'MY','Malaysia',2230,0),(132,'MV','Maldives',105,0),(133,'ML','Mali',1,0),(134,'MT','Malta',0,0),(135,'MH','Marshall Islands',0,0),(136,'MQ','Martinique',0,0),(137,'MR','Mauritania',4,0),(138,'MU','Mauritius',29,0),(139,'TY','Mayotte',0,0),(140,'MX','Mexico',25,0),(141,'FM','Micronesia, Federated States of',0,0),(142,'MD','Moldova, Republic of',0,0),(143,'MC','Monaco',12,0),(144,'MN','Mongolia',0,0),(145,'ME','Montenegro',0,0),(146,'MS','Montserrat',0,0),(147,'MA','Morocco',44,0),(148,'MZ','Mozambique',5,0),(149,'MM','Myanmar',13,0),(150,'NA','Namibia',4,0),(151,'NR','Nauru',0,0),(152,'NP','Nepal',500,0),(153,'NL','Netherlands',40,0),(154,'AN','Netherlands Antilles',0,0),(155,'NC','New Caledonia',0,0),(156,'NZ','New Zealand',8,0),(157,'NI','Nicaragua',1,0),(158,'NE','Niger',12,0),(159,'NG','Nigeria',298,0),(160,'NU','Niue',0,0),(161,'NF','Norfork Island',0,0),(162,'MP','Northern Mariana Islands',0,0),(163,'NO','Norway',1,0),(164,'OM','Oman',1222,0),(165,'PK','Pakistan',32862,0),(166,'PW','Palau',0,0),(167,'PA','Panama',4,0),(168,'PG','Papua New Guinea',31,0),(169,'PY','Paraguay',9,0),(170,'PE','Peru',72,0),(171,'PH','Philippines',133,0),(172,'PN','Pitcairn',0,0),(173,'PL','Poland',22,0),(174,'PT','Portugal',3,0),(175,'PR','Puerto Rico',0,0),(176,'QA','Qatar',837,0),(177,'RE','Reunion',0,0),(178,'RO','Romania',35,0),(179,'RU','Russian Federation',103,0),(180,'RW','Rwanda',3,0),(181,'KN','Saint Kitts and Nevis',0,0),(182,'LC','Saint Lucia',0,0),(183,'VC','Saint Vincent and the Grenadines',0,0),(184,'WS','Samoa',0,0),(185,'SM','San Marino',0,0),(186,'ST','Sao Tome and Principe',0,0),(187,'SA','Saudi Arabia',4469,0),(188,'SN','Senegal',10,0),(189,'RS','Serbia',1,0),(190,'SC','Seychelles',7,0),(191,'SL','Sierra Leone',0,0),(192,'SG','Singapore',177,0),(193,'SK','Slovakia',14,0),(194,'SI','Slovenia',0,0),(195,'SB','Solomon Islands',0,0),(196,'SO','Somalia',1,0),(197,'ZA','South Africa',368,0),(198,'GS','South Georgia South Sandwich Islands',0,0),(199,'ES','Spain',25,0),(200,'LK','Sri Lanka',970,0),(201,'SH','St. Helena',0,0),(202,'PM','St. Pierre and Miquelon',0,0),(203,'SD','Sudan',160,0),(204,'SR','Suriname',1,0),(205,'SJ','Svalbarn and Jan Mayen Islands',0,0),(206,'SZ','Swaziland',0,0),(207,'SE','Sweden',295,0),(208,'CH','Switzerland',3,0),(209,'SY','Syrian Arab Republic',17,0),(210,'TW','Taiwan',3,0),(211,'TJ','Tajikistan',3,0),(212,'TZ','Tanzania, United Republic of',99,0),(213,'TH','Thailand',114,0),(214,'TG','Togo',1,0),(215,'TK','Tokelau',0,0),(216,'TO','Tonga',0,0),(217,'TT','Trinidad and Tobago',9,0),(218,'TN','Tunisia',25,0),(219,'TR','Turkey',445,0),(220,'TM','Turkmenistan',0,0),(221,'TC','Turks and Caicos Islands',0,0),(222,'TV','Tuvalu',0,0),(223,'UG','Uganda',28,0),(224,'UA','Ukraine',30,0),(225,'AE','United Arab Emirates',4517,0),(226,'GB','United Kingdom',987,0),(227,'UM','United States minor outlying islands',0,0),(228,'UY','Uruguay',4,0),(229,'UZ','Uzbekistan',103,0),(230,'VU','Vanuatu',0,0),(231,'VA','Vatican City State',0,0),(232,'VE','Venezuela',3,0),(233,'VN','Vietnam',33,0),(234,'VG','Virigan Islands (British)',0,0),(235,'VI','Virgin Islands (U.S.)',0,0),(236,'WF','Wallis and Futuna Islands',0,0),(237,'EH','Western Sahara',0,0),(238,'YE','Yemen',100,0),(239,'YU','Yugoslavia',0,0),(240,'ZR','Zaire',0,0),(241,'ZM','Zambia',11,0),(242,'ZW','Zimbabwe',8,0);
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
INSERT INTO `favorites` (`member`, `model`, `dateadded`) VALUES ('info@lasgrutasrn.com.ar','$tempUser','2012-05-29 09:05:29'),('iuri_maicon@hotmail.com','$tempUser','2012-05-28 10:05:44'),('diminossi@yahoo.com.br','$tempUser','2012-05-28 10:05:09'),('','Model','2014-01-24 03:01:12'),('','','2016-05-06 01:05:42'),('','Amanda','2016-05-03 12:05:42'),('','Amber','2016-05-03 12:05:44'),('','Angel','2016-05-03 12:05:54'),('','Anna','2016-05-03 12:05:56'),('','Annette','2016-05-03 12:05:05'),('','Aurora','2016-05-03 12:05:06'),('','Becky','2016-05-03 12:05:18'),('','Beverley','2016-05-03 12:05:19'),('','Alyssa','2016-05-06 04:05:40'),('','Sasha','2016-05-06 03:05:05'),('','Destiny','2016-05-03 12:05:12'),('','Ella','2016-05-03 12:05:14'),('','Eve','2016-05-03 12:05:20'),('','Frankie','2016-05-03 12:05:22'),('','Gabriel','2016-05-03 12:05:29'),('','lolita','2016-05-06 07:05:18'),('','Gina','2016-05-03 12:05:38'),('','Hannah','2016-05-03 12:05:39'),('','Holly','2016-05-03 12:05:05'),('','Julie','2016-05-03 12:05:16'),('','Katie','2016-05-03 12:05:21'),('','Kira','2016-05-03 12:05:58'),('','Lori','2016-05-03 12:05:24'),('','Nicole','2016-05-03 12:05:39'),('','Paige','2016-05-03 12:05:44'),('','Pamela','2016-05-03 12:05:46'),('','Rachel','2016-05-03 12:05:52'),('','Sadie','2016-05-03 12:05:01'),('','Zoe','2016-05-06 01:05:30'),('','Summer','2016-05-03 12:05:08'),('','Sylvia','2016-05-03 12:05:09'),('','Tanya','2016-05-03 12:05:16'),('','Tara','2016-05-03 12:05:19'),('','Teresa','2016-05-03 12:05:26'),('','Tiffany','2016-05-03 12:05:27'),('','Tori','2016-05-03 12:05:34'),('','Trinity','2016-05-03 12:05:35'),('','Cassy','2016-05-06 02:05:16'),('','Victoria','2016-05-03 12:05:42'),('','Wendy','2016-05-03 12:05:48'),('','Abby','2016-05-06 01:05:28');
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
) ENGINE=MyISAM AUTO_INCREMENT=111288 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modelpictures`
--

LOCK TABLES `modelpictures` WRITE;
/*!40000 ALTER TABLE `modelpictures` DISABLE KEYS */;
INSERT INTO `modelpictures` (`ID`, `user`, `name`, `dateuploaded`) VALUES (111275,'Model','8242888fd5f7c9a53aeb80f9bcb8fb83',1390707097),(111276,'Model','99c98ba43c244bb5595e3a8d6eb2b2eb',1390707108),(111277,'Model','54bf46273f56f2f031c571ac952c3fe0',1390707117),(111278,'Model','3eb2172223a9af906df710a80374566d',1390707127),(111279,'Model','060ebbfa6396ed9e78c6fe5aebd6fc7e',1390707147),(111280,'Model','ea3b97cb053686ef6ccdae31aeaa504d',1390707165),(111281,'Model','24b7f0dba249f84810d3894c40220bad',1390707176),(111282,'Model','77233bcdd6101cc95d36c0662616f999',1390707186),(111283,'Model','4ac4520a0a7dd35517355ac4a7ded065',1390707201),(111284,'Model','7da7c98e77c79581c73bcec3cba1665b',1390707212);
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
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `package`
--

LOCK TABLES `package` WRITE;
/*!40000 ALTER TABLE `package` DISABLE KEYS */;
INSERT INTO `package` (`id`, `name`, `price`, `tokens`) VALUES (34,'Bigger',79.99,1000),(33,'Big',62.99,750),(32,'Gold',44.99,500),(31,'Silver',20.99,200),(30,'Broze',10.99,100);
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
  `referencia` varchar(15) NOT NULL,
  `fecha` datetime NOT NULL,
  `usuario` varchar(32) NOT NULL,
  `item` varchar(20) NOT NULL,
  `descrip` varchar(50) NOT NULL,
  `valor` int(11) NOT NULL,
  `moneda` varchar(10) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `id_transac` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `referencia` (`referencia`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagseguro`
--

LOCK TABLES `pagseguro` WRITE;
/*!40000 ALTER TABLE `pagseguro` DISABLE KEYS */;
INSERT INTO `pagseguro` (`id`, `referencia`, `fecha`, `usuario`, `item`, `descrip`, `valor`, `moneda`, `estado`, `id_transac`) VALUES (22,'20120528153703','2012-05-28 15:37:03','svvg6@yahoo.es','C25','25 Creditos',25,'BRL','Pré',''),(2,'20120517155304','2012-05-17 15:53:04','diminossi@yahoo.com.br','C1','1 Creditos',1,'BRL','Cancelado','A926C0860F164C7E97318C0AEF262BA8'),(3,'20120517155511','2012-05-17 15:55:11','diminossi@yahoo.com.br','C1','1 Creditos',1,'BRL','Completo','DBEFB6EDC2034A94B0CCD68E1A8F3B40'),(21,'20120523165309','2012-05-23 16:53:09','jeffersonrn17@hotmail.com','C10','10 Creditos',10,'BRL','Pré',''),(5,'20120517160908','2012-05-17 16:09:08','diminossi@yahoo.com.br','C1','1 Creditos',1,'BRL','Completo','BE56EA962BFC451BB0EF96DA3093FDAD'),(6,'20120517182359','2012-05-17 18:23:59','diminossi@yahoo.com.br','C10','10 Creditos',10,'BRL','Completo','34629C9F2B0346068D96FC7FC866417A'),(20,'20120523153333','2012-05-23 15:33:33','prwesley@gmail.com','C50','50 Creditos',50,'BRL','Pré',''),(19,'20120521180758','2012-05-21 18:07:58','diminossi@yahoo.com.br','C10','10 Creditos',10,'BRL','Completo','FC92A73C014C414D8FEE3BE47265BCD7'),(10,'20120518001059','2012-05-18 00:10:59','diminossi@yahoo.com.br','C10','10 Creditos',10,'BRL','WAITING_PAYMENT',''),(23,'20120602084128','2012-06-02 08:41:28','mario.hiroshiishihara@gmail.com','C150','150 Creditos',150,'BRL','Aprovado','1E3839B76C0B42EBBDAFC4E35A156D96'),(16,'20120518224535','2012-05-18 22:45:35','diminossi@yahoo.com.br','C10','10 Creditos',10,'BRL','Completo','3C5BB5D2779F4761BB10433933EB414D'),(17,'20120521115146','2012-05-21 11:51:46','diminossi@yahoo.com.br','C10','10 Creditos',10,'BRL','Completo','7E90218859814F3FB58580A6E582F94F'),(18,'20120521122507','2012-05-21 12:25:07','diminossi@yahoo.com.br','C1','1 Creditos',1,'BRL','Completo','A814F85106254340AA7712294E00649C'),(24,'20120606204138','2012-06-06 20:41:38','cmessias4@gmail.com','C25','25 Creditos',25,'BRL','Pré','');
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
INSERT INTO `payccbill` (`code`, `act`, `subact`, `frmname`, `codtxt`) VALUES (1,'945650','0002','211ck','IKfjAKCiPZoFfSHpid6TEbb6');
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
  `email` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paymentgate`
--

LOCK TABLES `paymentgate` WRITE;
/*!40000 ALTER TABLE `paymentgate` DISABLE KEYS */;
INSERT INTO `paymentgate` (`code`, `email`, `url`) VALUES (1,'dfg','dfg');
/*!40000 ALTER TABLE `paymentgate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `id` varchar(32) NOT NULL DEFAULT '',
  `date` bigint(24) NOT NULL DEFAULT '0',
  `ammount` varchar(24) NOT NULL DEFAULT '',
  `taxes` varchar(24) NOT NULL DEFAULT '',
  `method` varchar(12) NOT NULL DEFAULT '',
  `details` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`date`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` (`id`, `date`, `ammount`, `taxes`, `method`, `details`) VALUES ('',1403982450,'','0','',''),('',1403956227,'','0','',''),('13247bf0825aa3a12dab0072400ab4dd',1403982446,'195','0','pp','support@camscripts.com'),('13247bf0825aa3a12dab0072400ab4dd',1403956226,'150','0','pp','support@camscripts.com'),('13247bf0825aa3a12dab0072400ab4dd',1403983492,'195','0','pp','support@camscripts.com'),('13247bf0825aa3a12dab0072400ab4dd',1403983251,'195','0','pp','support@camscripts.com'),('',1403982985,'','0','',''),('',1403982885,'','0','',''),('13247bf0825aa3a12dab0072400ab4dd',1403982981,'195','0','pp','support@camscripts.com'),('13247bf0825aa3a12dab0072400ab4dd',1403982882,'195','0','pp','support@camscripts.com');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
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
INSERT INTO `setting` (`type`, `value`) VALUES ('license_key','478d31493b0eb2070d956e6d562678be');
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
INSERT INTO `videosessions` (`sessionid`, `member`, `model`, `sop`, `cpm`, `epercentage`, `date`, `duration`, `paid`, `soppaid`, `type`) VALUES ('b263b187cdd84fff34c1d20f53d35a97','Member','Model','none',200,50,1403981334,60,'1','0','tip'),('6fb140d28058b0926777e7042e595728','Member','Model','none',190,50,1403981283,60,'1','0','tip'),('e86041e417ddc20fc8374399fb0a0e26','Member','Model','none',100,50,1403956184,60,'1','0','tip'),('ae4696dd0a89a68fe7cb9f479af89672','Member','Model','none',200,50,1403956025,60,'1','0','tip'),('51cd252fcc3a757ed2e157ff00349baa','demo26','lolita','',10,50,1462251619,60,'0','0','tip'),('0d266ce2ced7c3f3aa940c422160c00e','demo26','lolita','',140,50,1462251660,60,'0','0','tip'),('f67742fcda6b09b86bee401068befc00','demo26','lolita','',10,50,1462251707,60,'0','0','show'),('359107f2069a6f749a5aaae3afa6f5ad','demo26','lolita','',10,50,1462251717,60,'0','0','show'),('4f80a0fe21c1076ed5847afe6d37c76f','demo26','lolita','',10,50,1462251732,60,'0','0','show');
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
INSERT INTO `welcome` (`members`, `models`) VALUES ('<html><h1>Welcome Members</h1></html> dfgdfgdfgdfgdgdfgdgdfgdfgdfgdfgdfgdfgdfgdfgdfdffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff	            ','<h3>You can add anything you want performers to see in this area. It will also allow HTML. <br>We decided to embed a nice YouTube video here.</h3>\r\n<html><center><iframe width=\"560\" height=\"315\" src=\"//www.youtube.com/embed/-DGYO5wC4hE?autoplay=1\" frameborder=\"0\" allowfullscreen></iframe></center></html>										');
/*!40000 ALTER TABLE `welcome` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'angelita_bd548'
--

--
-- Dumping routines for database 'angelita_bd548'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-19 13:46:46
