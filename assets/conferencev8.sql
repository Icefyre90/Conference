-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: conference
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.30-MariaDB

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
-- Table structure for table `autor`
--

DROP TABLE IF EXISTS `autor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `autor` (
  `user_iduser` int(11) NOT NULL,
  `project_idproject` int(11) NOT NULL,
  KEY `fk_autor_user1_idx` (`user_iduser`),
  KEY `fk_autor_project1_idx` (`project_idproject`),
  CONSTRAINT `fk_autor_project1` FOREIGN KEY (`project_idproject`) REFERENCES `project` (`idproject`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_autor_user1` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autor`
--

LOCK TABLES `autor` WRITE;
/*!40000 ALTER TABLE `autor` DISABLE KEYS */;
INSERT INTO `autor` VALUES (4,1),(5,2),(5,4),(5,6),(5,7),(4,8),(5,9),(5,10),(5,11),(5,24),(5,25),(5,26),(5,27),(3,27),(1,27),(5,28),(3,28),(4,28),(5,29),(5,30),(5,31),(5,32);
/*!40000 ALTER TABLE `autor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `competence`
--

DROP TABLE IF EXISTS `competence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `competence` (
  `idcompetence` int(11) NOT NULL AUTO_INCREMENT,
  `competence_level` int(11) DEFAULT NULL,
  `reviewer_idreviewer` int(11) NOT NULL,
  `conference_has_field_id_conference_has_field` int(11) NOT NULL,
  PRIMARY KEY (`idcompetence`),
  KEY `fk_competence_reviewer1_idx` (`reviewer_idreviewer`),
  KEY `fk_competence_conference_has_field1_idx` (`conference_has_field_id_conference_has_field`),
  CONSTRAINT `fk_competence_conference_has_field1` FOREIGN KEY (`conference_has_field_id_conference_has_field`) REFERENCES `conference_has_field` (`id_conference_has_field`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_competence_reviewer1` FOREIGN KEY (`reviewer_idreviewer`) REFERENCES `reviewer` (`idreviewer`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competence`
--

LOCK TABLES `competence` WRITE;
/*!40000 ALTER TABLE `competence` DISABLE KEYS */;
INSERT INTO `competence` VALUES (1,2,4,10),(2,4,4,11),(3,5,4,12),(4,4,5,10),(5,3,5,11),(6,4,5,12);
/*!40000 ALTER TABLE `competence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conference`
--

DROP TABLE IF EXISTS `conference`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conference` (
  `idconference` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `place` varchar(45) NOT NULL,
  `event_begin` datetime NOT NULL,
  `event_end` datetime NOT NULL,
  `application_begin` datetime NOT NULL,
  `application_end` datetime NOT NULL,
  `projects_per_autor` int(11) NOT NULL,
  PRIMARY KEY (`idconference`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conference`
--

LOCK TABLES `conference` WRITE;
/*!40000 ALTER TABLE `conference` DISABLE KEYS */;
INSERT INTO `conference` VALUES (1,'conf1','bgd','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',0),(2,'conf2','frt','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',0),(3,'conf3','frrrr','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',0),(4,'conf4','Beograd','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',0),(5,'conf5','Sarajevo','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',0),(6,'conf6','Novisad','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',0),(7,'conf7','Valjevo','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',0),(8,'conf8','Prag','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',0),(9,'conf9','Kikinda','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',0);
/*!40000 ALTER TABLE `conference` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conference_has_field`
--

DROP TABLE IF EXISTS `conference_has_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conference_has_field` (
  `field_idfield` int(11) NOT NULL,
  `conference_idconference` int(11) NOT NULL,
  `id_conference_has_field` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_conference_has_field`),
  KEY `fk_conference_has_field_field1_idx` (`field_idfield`),
  KEY `fk_conference_has_field_conference1_idx` (`conference_idconference`),
  CONSTRAINT `fk_conference_has_field_conference1` FOREIGN KEY (`conference_idconference`) REFERENCES `conference` (`idconference`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_conference_has_field_field1` FOREIGN KEY (`field_idfield`) REFERENCES `field` (`idfield`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conference_has_field`
--

LOCK TABLES `conference_has_field` WRITE;
/*!40000 ALTER TABLE `conference_has_field` DISABLE KEYS */;
INSERT INTO `conference_has_field` VALUES (1,1,1),(2,1,2),(3,1,3),(3,2,4),(2,2,5),(5,2,6),(1,2,7),(1,3,8),(2,3,9),(2,4,10),(3,4,11),(1,4,12);
/*!40000 ALTER TABLE `conference_has_field` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conference_has_project`
--

DROP TABLE IF EXISTS `conference_has_project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conference_has_project` (
  `conference_idconference` int(11) NOT NULL,
  `project_idproject` int(11) NOT NULL,
  PRIMARY KEY (`conference_idconference`,`project_idproject`),
  KEY `fk_conference_has_project_project1_idx` (`project_idproject`),
  KEY `fk_conference_has_project_conference1_idx` (`conference_idconference`),
  CONSTRAINT `fk_conference_has_project_conference1` FOREIGN KEY (`conference_idconference`) REFERENCES `conference` (`idconference`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_conference_has_project_project1` FOREIGN KEY (`project_idproject`) REFERENCES `project` (`idproject`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conference_has_project`
--

LOCK TABLES `conference_has_project` WRITE;
/*!40000 ALTER TABLE `conference_has_project` DISABLE KEYS */;
INSERT INTO `conference_has_project` VALUES (1,2),(1,10),(1,11),(1,32),(2,4),(3,6),(4,8),(4,9),(4,24),(4,25),(5,27),(5,28),(5,29);
/*!40000 ALTER TABLE `conference_has_project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `field`
--

DROP TABLE IF EXISTS `field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `field` (
  `idfield` int(11) NOT NULL AUTO_INCREMENT,
  `name_field` varchar(45) NOT NULL,
  PRIMARY KEY (`idfield`),
  UNIQUE KEY `name_field_UNIQUE` (`name_field`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `field`
--

LOCK TABLES `field` WRITE;
/*!40000 ALTER TABLE `field` DISABLE KEYS */;
INSERT INTO `field` VALUES (2,'bipolar'),(1,'elektro'),(5,'itinerer'),(6,'komedija'),(3,'kontra'),(4,'saobrac');
/*!40000 ALTER TABLE `field` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project` (
  `idproject` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `section_pro` varchar(45) NOT NULL,
  `apstract` varchar(1000) NOT NULL,
  `field_idfield` int(11) NOT NULL,
  `core` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idproject`),
  KEY `fk_project_field1_idx` (`field_idfield`),
  CONSTRAINT `fk_project_field1` FOREIGN KEY (`field_idfield`) REFERENCES `field` (`idfield`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES (1,'destabilizacija regiona','region','paja ','konjizacija u univerzumeu',1,4,0),(2,'kost lomi rano','kosti casica','karaula','saw 3 ili neki drugi deo',2,5,0),(4,'opet neki projekat','neka slobava','neki','dokle vise sa ovbom vrucinom',1,5,0),(6,'pokfefiejf','kejkd operfj','','eiuhfihfvnreifvneofjeo oiejfio jefpoej o ioenf ioejf',1,5,0),(7,'eifohncefnefc','efe fefe fef ','3','fweoi9jhfwefjwefwepfvwe',1,5,0),(8,'otpadanje korisnika','korisnik se ukanalio','1','Neki miodrag stalno kao autor',1,4,1),(9,'Odlazak ljudi sa kosova','siptari seperatisti','kontra','Koliko godina se ratuju a nista ne uspevaju',3,5,0),(10,'Neki projekat','nesto novo','bipolar','svaki dan nesto novo',2,5,0),(11,'ponovo neki projekti','kljucne reci','kontra','neki abstrakt ili kasko se vec zove',3,5,0),(24,'novi projeka t 17','neka rec','elektro','juenfoiefepfmewf',1,5,0),(25,'novi projekat 18','erff fe ','bipolar','efefefefef',2,5,4),(26,'neki projekat napredak','wedwedwdwd wd wd','bipolar','nefne fjef eof ej ef ',2,5,0),(27,'projekat 1224',' frf  fgr f rf','elektro','wdw dwd efd ef ef ef e ',1,1,0),(28,'kerovi','neki reci','bipolar','wdwdwdwdwdwdw',2,3,0),(29,'neki projekat poslednji','','bipolar','',2,5,0),(30,'Proba 10000','wdw d wd wd wd ','kontra','Pausalno',3,5,0),(31,'RADIIIII2','Teske reci ove koje moraju da se upisu V16','kontra','qweqwewweqwe',3,5,0),(32,'projektcina V6 16 ventila','Samo jako','elektro','Automoto',1,5,0);
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_file`
--

DROP TABLE IF EXISTS `project_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_file` (
  `idproject_file` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `time` varchar(20) NOT NULL,
  `project_idproject` int(11) NOT NULL,
  PRIMARY KEY (`idproject_file`),
  KEY `fk_project_file_project1_idx` (`project_idproject`),
  CONSTRAINT `fk_project_file_project1` FOREIGN KEY (`project_idproject`) REFERENCES `project` (`idproject`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_file`
--

LOCK TABLES `project_file` WRITE;
/*!40000 ALTER TABLE `project_file` DISABLE KEYS */;
INSERT INTO `project_file` VALUES (1,'Proba 10000','0000-00-00 00:00:00',30),(2,'RADIIIII2','31_05_2018_17_20_16',31),(3,'projektcina V6 16 ventila','31_05_2018_17_48_11',32);
/*!40000 ALTER TABLE `project_file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `review` (
  `idreview` int(11) NOT NULL AUTO_INCREMENT,
  `rating` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `date_for_review` datetime NOT NULL,
  `reviewer_idreviewer` int(11) NOT NULL,
  `project_idproject` int(11) NOT NULL,
  `project_status` int(11) DEFAULT '0',
  PRIMARY KEY (`idreview`),
  KEY `fk_review_reviewer1_idx` (`reviewer_idreviewer`),
  KEY `fk_review_project1_idx` (`project_idproject`),
  CONSTRAINT `fk_review_project1` FOREIGN KEY (`project_idproject`) REFERENCES `project` (`idproject`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_review_reviewer1` FOREIGN KEY (`reviewer_idreviewer`) REFERENCES `reviewer` (`idreviewer`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviewer`
--

DROP TABLE IF EXISTS `reviewer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviewer` (
  `idreviewer` int(11) NOT NULL AUTO_INCREMENT,
  `user_iduser` int(11) NOT NULL,
  `conference_idconference` int(11) NOT NULL,
  PRIMARY KEY (`idreviewer`),
  KEY `fk_reviewer_user1_idx` (`user_iduser`),
  KEY `fk_reviewer_conference1_idx` (`conference_idconference`),
  CONSTRAINT `fk_reviewer_conference1` FOREIGN KEY (`conference_idconference`) REFERENCES `conference` (`idconference`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reviewer_user1` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviewer`
--

LOCK TABLES `reviewer` WRITE;
/*!40000 ALTER TABLE `reviewer` DISABLE KEYS */;
INSERT INTO `reviewer` VALUES (1,1,1),(2,1,2),(3,1,3),(4,3,4),(5,4,4);
/*!40000 ALTER TABLE `reviewer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(12) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `phone_number` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `organisation` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `coordinator` int(11) NOT NULL,
  PRIMARY KEY (`iduser`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'shomi75','sifra','miodrag','jovanovic','0642004551','shomi75@gmail.com','etf','0000-00-00',1),(3,'pera','Sifra1','Petar','Milovanovic','0640154646','era@gmail.com','uniceff','2018-06-10',0),(4,'nenad','123','Nenad','Erakovic','093589358','ccejf@gmail.com','vitez','2018-06-09',1),(5,'milos','123','Milos','Jovanov','943754735','iefjjdiej@gmail.com','koja','0000-00-00',0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_has_conference`
--

DROP TABLE IF EXISTS `user_has_conference`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_has_conference` (
  `iduser_has_conference` int(11) NOT NULL AUTO_INCREMENT,
  `user_iduser` int(11) NOT NULL,
  `conference_idconference` int(11) NOT NULL,
  PRIMARY KEY (`iduser_has_conference`),
  KEY `fk_user_has_conference_user1_idx` (`user_iduser`),
  KEY `fk_user_has_conference_conference1_idx` (`conference_idconference`),
  CONSTRAINT `fk_user_has_conference_conference1` FOREIGN KEY (`conference_idconference`) REFERENCES `conference` (`idconference`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_conference_user1` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_has_conference`
--

LOCK TABLES `user_has_conference` WRITE;
/*!40000 ALTER TABLE `user_has_conference` DISABLE KEYS */;
INSERT INTO `user_has_conference` VALUES (1,1,1),(2,1,2),(3,3,3),(7,4,4),(8,4,5),(21,4,7),(22,4,8),(23,4,9);
/*!40000 ALTER TABLE `user_has_conference` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-08 18:31:31
