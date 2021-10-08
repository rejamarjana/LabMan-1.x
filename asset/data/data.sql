-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: db
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB-0+deb9u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alat`
--

DROP TABLE IF EXISTS `alat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alat` (
  `Update` varchar(10) DEFAULT NULL,
  `Kode` varchar(24) DEFAULT NULL,
  `Nama` varchar(15) DEFAULT NULL,
  `Spesifikasi` varchar(12) DEFAULT NULL,
  `Kategori` tinyint(4) DEFAULT NULL,
  `Kondisi` varchar(4) DEFAULT NULL,
  `Keterangan` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alat`
--

LOCK TABLES `alat` WRITE;
/*!40000 ALTER TABLE `alat` DISABLE KEYS */;
INSERT INTO `alat` VALUES ('2020-01-30','PT25.221.02.FD.21a-01/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-02/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-03/46','Dudukan Baterai','2 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-04/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-05/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-06/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-07/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-08/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-09/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-10/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-11/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-12/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-13/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-14/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-15/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-16/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-17/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-18/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-19/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-20/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-21/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-22/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-23/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-24/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-25/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-26/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-27/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-28/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-29/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-30/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-31/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-32/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-33/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-34/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-35/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-36/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-37/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-38/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-39/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-40/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-41/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-42/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-43/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-44/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-45/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21a-46/46','Dudukan Baterai','1 baterai AA',1,'baik',''),('2020-01-30','PT25.221.02.FD.21b-1/4','Dudukan Baterai','4 baterai D',1,'baik',''),('2020-01-30','PT25.221.02.FD.21b-2/4','Dudukan Baterai','4 baterai D',1,'baik',''),('2020-01-30','PT25.221.02.FD.21b-3/4','Dudukan Baterai','4 baterai D',1,'baik',''),('2020-01-30','PT25.221.02.FD.21b-4/4','Dudukan Baterai','4 baterai D',1,'baik',''),('2020-01-30','PT25.221.02.FD.21c-1/24','Dudukan Baterai','1 baterai D',1,'baik',''),('2020-01-30','PT25.221.02.FD.21c-2/24','Dudukan Baterai','1 baterai D',1,'baik',''),('2020-01-30','PT25.221.02.FD.21c-3/24','Dudukan Baterai','1 baterai D',1,'baik',''),('2020-01-30','PT25.221.02.FD.21c-4/24','Dudukan Baterai','1 baterai D',1,'baik',''),('2020-01-30','PT25.221.02.FD.21c-5/24','Dudukan Baterai','1 baterai D',1,'baik',''),('2020-01-30','PT25.221.02.FD.21c-6/24','Dudukan Baterai','1 baterai D',1,'baik',''),('2020-01-30','PT25.221.02.FD.21c-7/24','Dudukan Baterai','1 baterai D',1,'baik',''),('2020-01-30','PT25.221.02.FD.21c-8/24','Dudukan Baterai','1 baterai D',1,'baik',''),('2020-01-30','PT25.221.02.FD.21c-9/24','Dudukan Baterai','1 baterai D',1,'baik',''),('2020-01-30','PT25.221.02.FD.21c-10/24','Dudukan Baterai','1 baterai D',1,'baik',''),('2020-01-30','PT25.221.02.FD.21c-11/24','Dudukan Baterai','1 baterai D',1,'baik',''),('2020-01-30','PT25.221.02.FD.21c-12/24','Dudukan Baterai','1 baterai D',1,'baik',''),('2020-01-30','PT25.221.02.FD.21c-13/24','Dudukan Baterai','1 baterai D',1,'baik',''),('2020-01-30','PT25.221.02.FD.21c-14/24','Dudukan Baterai','1 baterai D',1,'baik',''),('2020-01-30','PT25.221.02.FD.21c-15/24','Dudukan Baterai','1 baterai D',1,'baik',''),('2020-01-30','PT25.221.02.FD.21c-16/24','Dudukan Baterai','1 baterai D',1,'baik',''),('2020-01-30','PT25.221.02.FD.21c-17/24','Dudukan Baterai','1 baterai D',1,'baik',''),('2020-01-30','PT25.221.02.FD.21c-18/24','Dudukan Baterai','1 baterai D',1,'baik',''),('2020-01-30','PT25.221.02.FD.21c-19/24','Dudukan Baterai','1 baterai D',1,'baik',''),('2020-01-30','PT25.221.02.FD.21c-20/24','Dudukan Baterai','1 baterai D',1,'baik',''),('2020-01-30','PT25.221.02.FD.21c-21/24','Dudukan Baterai','1 baterai D',1,'baik',''),('2020-01-30','PT25.221.02.FD.21c-22/24','Dudukan Baterai','1 baterai D',1,'baik',''),('2020-01-30','PT25.221.02.FD.21c-23/24','Dudukan Baterai','1 baterai D',1,'baik',''),('2020-01-30','PT25.221.02.FD.21c-24/24','Dudukan Baterai','1 baterai D',1,'baik','');
/*!40000 ALTER TABLE `alat` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-22 15:20:24
