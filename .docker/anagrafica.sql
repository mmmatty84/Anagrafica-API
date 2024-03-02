-- MySQL dump 10.13  Distrib 8.3.0, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: anagrafica
-- ------------------------------------------------------
-- Server version	8.0.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cittadino`
--

DROP TABLE IF EXISTS `cittadino`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cittadino` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cognome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codice_fiscale` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cittadino`
--

LOCK TABLES `cittadino` WRITE;
/*!40000 ALTER TABLE `cittadino` DISABLE KEYS */;
INSERT INTO `cittadino` VALUES (1,'Enoch','Volkman','ETJAIK42D42R823Y'),(2,'Myrtie','Wiegand','MMQGMQ68R56N199B'),(3,'Justyn','Stark','CYKFPZ71E24D442R'),(4,'Donna','Schuppe','HJRUFP64S66N543Z'),(5,'Jena','Gottlieb','AEIQZA69D58A721C'),(6,'Nils','Dach','QANGSY96S72T195D'),(7,'Jayda','Boehm','FGNHAP61P88G327S'),(8,'Lewis','Barton','BBPLYD32E08L715W'),(9,'Zetta','Shanahan','CLQWUT20M94I205N'),(10,'Lorenz','Krajcik','ZWWPNW01A38D573Y'),(11,'Zoie','Fritsch','CCDQVY53C06H578L'),(12,'Erin','Stark','TCBTTR42A99T726D'),(13,'Heidi','Heller','WOLRGC92R89Q976M'),(14,'Maxwell','Kirlin','TEYTOX33S65I963A'),(15,'Roslyn','Stanton','BUVBOX51T02X920O'),(16,'Marcus','Bartell','EFWSNU66C13Z731I'),(17,'Esta','Hickle','FKLVNU40H29F509N'),(18,'Yasmeen','Davis','CNGVRO55R63R184O'),(19,'Mathias','Hills','MXGHOD95B02W575P'),(20,'Adrian','Grimes','BLFBJA29P98U613G'),(21,'Addison','Halvorson','YGVGAU47L03K486K'),(22,'Orpha','Williamson','YEVOQX01S03E670R'),(23,'Noe','Boehm','GSAKQC01R12Y077S'),(24,'Desiree','Schneider','JKLAQK66T04M329L'),(25,'Rogers','Schamberger','WCUXYA20R72X085M'),(26,'Anna','Braun','CGABJL96H78A412W'),(27,'Marguerite','Smith','NSJYIZ78B87M330Q'),(28,'Steve','Gaylord','JWHIFB70P61Q964I'),(29,'Baron','Feil','WDKYYY84S32F680D'),(30,'Sid','Harber','MNUROQ41R54Q451P'),(31,'Shea','Roberts','FAACCV78R27S161L'),(32,'Seamus','Marks','YPXYBM58C97N022C'),(33,'Alivia','McKenzie','OTIQVK78P45G639Z'),(34,'Yoshiko','Ferry','LQRRQH46H79Z372A'),(35,'Demarco','Schinner','FIWYFO21M05V975S'),(36,'Karina','Prosacco','VNZCJM94T46O554C'),(37,'Marjory','Shanahan','DCMGVS91B09T981R'),(38,'Leif','Gibson','KKXNQD73L22T305J'),(39,'Marcella','Deckow','PJJSPH35P89Q628T'),(40,'Leanne','Lehner','UBLYFV66A09C410W'),(41,'Shyanne','Heathcote','XQHOZE94R24I164X'),(42,'Brielle','Herman','ZLETUI98C15G799I'),(43,'Albin','Daniel','QIYHCV59E60A284O'),(44,'Mervin','Daniel','ULMWUP46A60N685Y'),(45,'Willa','Bergstrom','HRWVWU95R53P386T'),(46,'Lou','Fisher','MUQGTC47D32P891M'),(47,'Gudrun','Bradtke','ANTPXY50M10Z956F'),(48,'Savanah','Olson','ATTMRW99A04H433K'),(49,'Federico','Thompson','YJWEFU99E85U254Y'),(50,'Shyann','Beer','XAUMVY36H35E538P');
/*!40000 ALTER TABLE `cittadino` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20240229144157','2024-03-02 09:06:41',337),('DoctrineMigrations\\Version20240301103830','2024-03-02 09:06:41',33),('DoctrineMigrations\\Version20240302075254','2024-03-02 09:06:41',157);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `famiglia`
--

DROP TABLE IF EXISTS `famiglia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `famiglia` (
  `id` int NOT NULL AUTO_INCREMENT,
  `responsabile_id` int DEFAULT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1799446271869329` (`responsabile_id`),
  CONSTRAINT `FK_1799446271869329` FOREIGN KEY (`responsabile_id`) REFERENCES `cittadino` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `famiglia`
--

LOCK TABLES `famiglia` WRITE;
/*!40000 ALTER TABLE `famiglia` DISABLE KEYS */;
INSERT INTO `famiglia` VALUES (1,NULL,'Dietrich LLC'),(2,19,'Bosco PLC'),(3,42,'Bins, Prohaska and Padberg'),(4,37,'Beier, Tillman and Collier'),(5,44,'Russel Group'),(6,NULL,'Kihn-Padberg'),(7,25,'Wuckert, Baumbach and Kihn'),(8,21,'Thompson, Rohan and Anderson'),(9,3,'Beer-Howe'),(10,NULL,'Kautzer-Carroll'),(11,29,'Borer Ltd'),(12,NULL,'Welch-Ziemann'),(13,NULL,'Sporer-Stoltenberg'),(14,18,'Thiel Inc'),(15,NULL,'Jacobs Group'),(16,NULL,'Rolfson Group'),(17,NULL,'Luettgen, King and Schroeder'),(18,26,'Gorczany Inc'),(19,NULL,'Russel-Hammes'),(20,NULL,'Christiansen-Adams'),(21,9,'Pfannerstill, Rutherford and Glover'),(22,20,'Orn Group'),(23,NULL,'Oberbrunner, Nienow and Fay'),(24,NULL,'Carter-Lockman'),(25,22,'West and Sons'),(26,28,'Farrell PLC'),(27,NULL,'Heidenreich, Reinger and Gerhold'),(28,NULL,'Bahringer, Harber and Douglas'),(29,NULL,'Berge LLC'),(30,NULL,'Hermann-Mraz');
/*!40000 ALTER TABLE `famiglia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nucleo_familiare`
--

DROP TABLE IF EXISTS `nucleo_familiare`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nucleo_familiare` (
  `id` int NOT NULL AUTO_INCREMENT,
  `famiglia_id` int NOT NULL,
  `cittadino_id` int NOT NULL,
  `ruolo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:ruolo_enum)',
  PRIMARY KEY (`id`),
  KEY `IDX_1A1E1FE730D47B88` (`famiglia_id`),
  KEY `IDX_1A1E1FE7CD69C30B` (`cittadino_id`),
  CONSTRAINT `FK_1A1E1FE730D47B88` FOREIGN KEY (`famiglia_id`) REFERENCES `famiglia` (`id`),
  CONSTRAINT `FK_1A1E1FE7CD69C30B` FOREIGN KEY (`cittadino_id`) REFERENCES `cittadino` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=491 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nucleo_familiare`
--

LOCK TABLES `nucleo_familiare` WRITE;
/*!40000 ALTER TABLE `nucleo_familiare` DISABLE KEYS */;
INSERT INTO `nucleo_familiare` VALUES (1,11,18,'genitore'),(2,11,41,'tutore'),(3,11,42,'tutore'),(4,30,14,'genitore'),(5,17,26,'figlio'),(6,17,7,'genitore'),(7,17,13,'genitore'),(8,17,10,'figlio'),(9,12,22,'genitore'),(10,12,35,'figlio'),(11,12,32,'tutore'),(12,19,30,'figlio'),(13,19,9,'tutore'),(14,6,43,'tutore'),(15,6,12,'tutore'),(16,6,25,'figlio'),(17,26,22,'figlio'),(18,23,36,'genitore'),(19,23,46,'genitore'),(20,23,4,'figlio'),(21,8,5,'tutore'),(22,3,3,'figlio'),(23,3,24,'genitore'),(24,3,44,'genitore'),(25,28,4,'genitore'),(26,28,44,'figlio'),(27,21,7,'tutore'),(28,21,25,'tutore'),(29,21,25,'genitore'),(30,21,14,'genitore'),(31,8,40,'tutore'),(32,8,27,'tutore'),(33,18,40,'genitore'),(34,18,36,'tutore'),(35,6,23,'tutore'),(36,6,30,'genitore'),(37,6,24,'tutore'),(38,6,28,'tutore'),(39,5,26,'figlio'),(40,5,20,'figlio'),(41,4,14,'genitore'),(42,4,16,'tutore'),(43,4,25,'genitore'),(44,4,49,'genitore'),(45,22,49,'genitore'),(46,2,31,'genitore'),(47,12,48,'genitore'),(48,12,47,'genitore'),(49,13,18,'tutore'),(50,13,43,'genitore'),(51,5,6,'genitore'),(52,5,27,'figlio'),(53,28,17,'tutore'),(54,28,24,'figlio'),(55,5,47,'figlio'),(56,5,47,'tutore'),(57,5,14,'tutore'),(58,5,23,'tutore'),(59,5,47,'genitore'),(60,5,19,'figlio'),(61,24,35,'genitore'),(62,10,45,'genitore'),(63,10,50,'figlio'),(64,10,25,'figlio'),(65,18,12,'figlio'),(66,18,34,'figlio'),(67,18,16,'figlio'),(68,28,30,'genitore'),(69,28,25,'tutore'),(70,7,47,'tutore'),(71,7,44,'figlio'),(72,7,27,'genitore'),(73,2,48,'genitore'),(74,2,32,'tutore'),(75,2,5,'tutore'),(76,30,31,'figlio'),(77,23,26,'figlio'),(78,23,17,'tutore'),(79,23,41,'tutore'),(80,23,25,'tutore'),(81,27,3,'tutore'),(82,27,18,'tutore'),(83,27,23,'genitore'),(84,16,28,'genitore'),(85,16,5,'tutore'),(86,9,47,'genitore'),(87,9,22,'figlio'),(88,9,49,'tutore'),(89,29,30,'figlio'),(90,29,43,'tutore'),(91,29,37,'figlio'),(92,29,15,'tutore'),(93,27,33,'genitore'),(94,22,16,'genitore'),(95,22,30,'figlio'),(96,22,8,'tutore'),(97,8,7,'tutore'),(98,11,28,'tutore'),(99,11,15,'tutore'),(100,6,39,'tutore'),(101,22,47,'genitore'),(102,22,10,'tutore'),(103,8,15,'tutore'),(104,8,33,'figlio'),(105,30,27,'genitore'),(106,30,3,'tutore'),(107,30,26,'genitore'),(108,7,29,'genitore'),(109,7,11,'genitore'),(110,7,42,'tutore'),(111,7,3,'tutore'),(112,21,42,'figlio'),(113,21,44,'genitore'),(114,6,39,'figlio'),(115,6,39,'tutore'),(116,6,45,'figlio'),(117,17,15,'figlio'),(118,17,32,'tutore'),(119,17,40,'genitore'),(120,3,22,'genitore'),(121,3,21,'genitore'),(122,3,41,'tutore'),(123,3,11,'genitore'),(124,3,30,'figlio'),(125,26,5,'tutore'),(126,26,29,'genitore'),(127,26,8,'genitore'),(128,1,33,'genitore'),(129,21,43,'genitore'),(130,21,25,'figlio'),(131,22,36,'tutore'),(132,26,6,'figlio'),(133,1,45,'genitore'),(134,23,35,'tutore'),(135,23,2,'genitore'),(136,3,33,'figlio'),(137,27,45,'figlio'),(138,25,18,'figlio'),(139,25,43,'genitore'),(140,25,38,'figlio'),(141,25,32,'tutore'),(142,25,15,'genitore'),(143,25,35,'figlio'),(144,16,18,'figlio'),(145,16,25,'figlio'),(146,16,8,'figlio'),(147,16,4,'tutore'),(148,25,21,'tutore'),(149,25,7,'tutore'),(150,19,28,'figlio'),(151,19,48,'tutore'),(152,19,22,'genitore'),(153,19,32,'tutore'),(154,18,19,'tutore'),(155,28,18,'tutore'),(156,28,11,'tutore'),(157,28,17,'genitore'),(158,28,15,'tutore'),(159,29,41,'tutore'),(160,1,45,'figlio'),(161,1,21,'genitore'),(162,1,32,'figlio'),(163,1,29,'genitore'),(164,1,33,'tutore'),(165,26,41,'genitore'),(166,26,18,'figlio'),(167,26,25,'figlio'),(168,26,14,'tutore'),(169,26,39,'tutore'),(170,1,25,'figlio'),(171,1,25,'figlio'),(172,17,34,'tutore'),(173,17,46,'figlio'),(174,7,38,'genitore'),(175,7,43,'genitore'),(176,13,11,'tutore'),(177,13,3,'figlio'),(178,9,3,'genitore'),(179,9,40,'genitore'),(180,9,20,'genitore'),(181,9,41,'figlio'),(182,30,29,'genitore'),(183,4,19,'figlio'),(184,4,43,'tutore'),(185,4,9,'genitore'),(186,30,25,'figlio'),(187,29,40,'tutore'),(188,29,29,'tutore'),(189,5,25,'figlio'),(190,5,13,'tutore'),(191,5,26,'tutore'),(192,5,44,'genitore'),(193,2,15,'genitore'),(194,29,41,'tutore'),(195,29,12,'tutore'),(196,29,38,'tutore'),(197,29,16,'tutore'),(198,24,26,'figlio'),(199,24,13,'genitore'),(200,13,8,'genitore'),(201,13,38,'figlio'),(202,13,13,'genitore'),(203,1,4,'tutore'),(204,1,33,'figlio'),(205,30,34,'figlio'),(206,30,32,'figlio'),(207,8,37,'figlio'),(208,8,26,'tutore'),(209,8,15,'figlio'),(210,8,8,'tutore'),(211,8,4,'tutore'),(212,7,47,'tutore'),(213,7,46,'tutore'),(214,25,23,'tutore'),(215,25,22,'genitore'),(216,25,47,'figlio'),(217,21,48,'tutore'),(218,21,21,'genitore'),(219,22,7,'genitore'),(220,22,19,'figlio'),(221,14,37,'genitore'),(222,14,41,'figlio'),(223,14,1,'genitore'),(224,14,35,'genitore'),(225,14,7,'figlio'),(226,2,36,'genitore'),(227,2,19,'figlio'),(228,2,9,'tutore'),(229,10,12,'tutore'),(230,10,9,'figlio'),(231,10,37,'tutore'),(232,16,17,'figlio'),(233,16,32,'tutore'),(234,16,5,'figlio'),(235,16,28,'tutore'),(236,9,50,'tutore'),(237,9,10,'figlio'),(238,9,4,'genitore'),(239,9,50,'tutore'),(240,16,43,'genitore'),(241,19,44,'genitore'),(242,2,21,'tutore'),(243,20,19,'figlio'),(244,20,24,'tutore'),(245,21,19,'figlio'),(246,21,17,'genitore'),(247,21,18,'genitore'),(248,21,35,'genitore'),(249,21,29,'tutore'),(250,2,35,'figlio'),(251,14,46,'genitore'),(252,24,20,'genitore'),(253,9,10,'genitore'),(254,9,26,'tutore'),(255,9,20,'figlio'),(256,9,47,'genitore'),(257,9,26,'genitore'),(258,14,45,'tutore'),(259,14,44,'tutore'),(260,13,10,'figlio'),(261,18,44,'genitore'),(262,18,44,'tutore'),(263,30,29,'figlio'),(264,30,27,'figlio'),(265,30,44,'tutore'),(266,26,1,'figlio'),(267,26,44,'genitore'),(268,26,26,'genitore'),(269,26,48,'tutore'),(270,26,18,'tutore'),(271,15,25,'tutore'),(272,15,4,'tutore'),(273,15,34,'figlio'),(274,15,11,'tutore'),(275,16,38,'figlio'),(276,16,13,'genitore'),(277,7,23,'tutore'),(278,7,2,'figlio'),(279,3,27,'tutore'),(280,3,45,'figlio'),(281,3,20,'genitore'),(282,3,21,'figlio'),(283,16,42,'tutore'),(284,16,40,'figlio'),(285,16,27,'tutore'),(286,16,32,'genitore'),(287,25,40,'genitore'),(288,25,11,'genitore'),(289,3,8,'tutore'),(290,7,28,'genitore'),(291,7,26,'genitore'),(292,7,20,'figlio'),(293,17,16,'figlio'),(294,17,26,'figlio'),(295,17,36,'genitore'),(296,20,10,'figlio'),(297,20,46,'genitore'),(298,20,15,'genitore'),(299,27,11,'genitore'),(300,27,16,'figlio'),(301,27,30,'figlio'),(302,27,25,'tutore'),(303,27,27,'figlio'),(304,10,24,'tutore'),(305,10,48,'tutore'),(306,10,18,'genitore'),(307,10,45,'genitore'),(308,20,42,'figlio'),(309,20,1,'tutore'),(310,19,27,'tutore'),(311,19,43,'genitore'),(312,19,10,'figlio'),(313,20,16,'tutore'),(314,20,14,'genitore'),(315,9,1,'genitore'),(316,9,6,'genitore'),(317,25,7,'genitore'),(318,25,24,'figlio'),(319,25,50,'figlio'),(320,25,6,'tutore'),(321,21,26,'tutore'),(322,21,33,'genitore'),(323,18,21,'genitore'),(324,18,49,'tutore'),(325,18,5,'genitore'),(326,4,11,'genitore'),(327,8,9,'genitore'),(328,8,42,'tutore'),(329,14,38,'genitore'),(330,14,32,'tutore'),(331,6,7,'genitore'),(332,6,34,'genitore'),(333,6,20,'genitore'),(334,6,47,'genitore'),(335,9,43,'tutore'),(336,9,11,'tutore'),(337,3,22,'genitore'),(338,3,32,'figlio'),(339,20,39,'tutore'),(340,20,47,'genitore'),(341,20,4,'genitore'),(342,28,3,'figlio'),(343,28,38,'tutore'),(344,11,10,'figlio'),(345,30,33,'figlio'),(346,30,18,'genitore'),(347,30,19,'figlio'),(348,16,21,'genitore'),(349,16,15,'tutore'),(350,22,45,'figlio'),(351,22,5,'figlio'),(352,22,15,'figlio'),(353,3,18,'figlio'),(354,3,39,'figlio'),(355,3,39,'genitore'),(356,3,11,'genitore'),(357,28,15,'tutore'),(358,28,16,'genitore'),(359,15,17,'genitore'),(360,15,39,'tutore'),(361,15,32,'genitore'),(362,12,47,'tutore'),(363,12,25,'tutore'),(364,12,42,'figlio'),(365,25,11,'tutore'),(366,25,38,'figlio'),(367,1,31,'genitore'),(368,2,46,'genitore'),(369,2,45,'genitore'),(370,2,22,'genitore'),(371,22,36,'figlio'),(372,22,35,'tutore'),(373,23,12,'figlio'),(374,23,36,'tutore'),(375,23,8,'figlio'),(376,22,37,'figlio'),(377,22,9,'genitore'),(378,22,31,'figlio'),(379,30,2,'tutore'),(380,30,24,'genitore'),(381,30,7,'figlio'),(382,15,7,'tutore'),(383,15,35,'genitore'),(384,15,32,'figlio'),(385,15,43,'tutore'),(386,15,26,'tutore'),(387,7,3,'genitore'),(388,7,27,'genitore'),(389,7,30,'figlio'),(390,24,25,'figlio'),(391,5,33,'genitore'),(392,11,50,'genitore'),(393,11,32,'genitore'),(394,11,40,'tutore'),(395,11,20,'genitore'),(396,21,27,'figlio'),(397,21,50,'genitore'),(398,21,49,'tutore'),(399,21,29,'genitore'),(400,8,7,'tutore'),(401,24,13,'figlio'),(402,4,50,'genitore'),(403,18,12,'tutore'),(404,20,19,'genitore'),(405,22,40,'figlio'),(406,22,19,'figlio'),(407,29,32,'genitore'),(408,29,18,'genitore'),(409,29,5,'tutore'),(410,1,44,'genitore'),(411,1,16,'tutore'),(412,1,21,'genitore'),(413,10,24,'figlio'),(414,10,5,'tutore'),(415,10,38,'tutore'),(416,23,27,'tutore'),(417,23,42,'genitore'),(418,6,41,'tutore'),(419,6,5,'tutore'),(420,6,35,'figlio'),(421,6,18,'tutore'),(422,24,15,'genitore'),(423,24,28,'tutore'),(424,24,26,'genitore'),(425,24,34,'tutore'),(426,24,45,'figlio'),(427,16,7,'genitore'),(428,16,27,'tutore'),(429,14,33,'figlio'),(430,12,36,'figlio'),(431,12,26,'genitore'),(432,2,35,'tutore'),(433,2,22,'tutore'),(434,2,48,'tutore'),(435,2,38,'tutore'),(436,8,25,'genitore'),(437,8,26,'genitore'),(438,22,39,'figlio'),(439,22,38,'genitore'),(440,22,43,'genitore'),(441,28,16,'tutore'),(442,28,50,'figlio'),(443,20,18,'figlio'),(444,20,19,'genitore'),(445,20,16,'genitore'),(446,6,18,'tutore'),(447,6,50,'figlio'),(448,6,36,'figlio'),(449,28,46,'figlio'),(450,28,48,'figlio'),(451,28,3,'figlio'),(452,28,23,'tutore'),(453,28,40,'genitore'),(454,26,44,'tutore'),(455,26,47,'genitore'),(456,26,21,'figlio'),(457,3,48,'figlio'),(458,3,28,'genitore'),(459,3,48,'genitore'),(460,3,25,'genitore'),(461,15,33,'tutore'),(462,15,12,'tutore'),(463,11,42,'tutore'),(464,11,32,'tutore'),(465,11,15,'genitore'),(466,11,13,'tutore'),(467,11,6,'genitore'),(468,5,18,'figlio'),(469,5,27,'tutore'),(470,5,12,'tutore'),(471,8,36,'tutore'),(472,20,15,'tutore'),(473,14,23,'tutore'),(474,14,20,'figlio'),(475,14,12,'genitore'),(476,24,50,'genitore'),(477,24,8,'tutore'),(478,9,50,'genitore'),(479,9,31,'genitore'),(480,9,11,'genitore'),(481,5,8,'tutore'),(482,5,12,'figlio'),(483,12,28,'figlio'),(484,12,38,'genitore'),(485,10,23,'tutore'),(486,10,46,'figlio'),(487,10,21,'figlio'),(488,20,9,'tutore'),(489,20,47,'genitore'),(490,20,43,'tutore');
/*!40000 ALTER TABLE `nucleo_familiare` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-02 10:08:59
