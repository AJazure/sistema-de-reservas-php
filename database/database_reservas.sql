CREATE DATABASE  IF NOT EXISTS `db_reservas2` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_reservas2`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: db_reservas2
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `id_cli` int NOT NULL AUTO_INCREMENT,
  `nombre_cli` varchar(45) NOT NULL,
  `apellido_cli` varchar(45) NOT NULL,
  `dni_cli` varchar(10) NOT NULL,
  `telefono_cli` varchar(12) NOT NULL,
  PRIMARY KEY (`id_cli`),
  UNIQUE KEY `dni_cli_UNIQUE` (`dni_cli`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'Ariel','Quintana','1234567890','123456789'),(2,'Nicolás','Juárez','2345678901','234567890'),(3,'Aldana','Bustos','3456789012','345678901'),(4,'Sofía','Arias','4567890123','456789012'),(5,'Nicolás','Garzón','5678901234','567890123');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `habitaciones`
--

DROP TABLE IF EXISTS `habitaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `habitaciones` (
  `id_hab` int NOT NULL AUTO_INCREMENT,
  `num_hab` varchar(4) NOT NULL,
  `precio_hab` int NOT NULL,
  `tipos_id_tipo_hab` int NOT NULL,
  PRIMARY KEY (`id_hab`,`tipos_id_tipo_hab`),
  UNIQUE KEY `num_habitacion_UNIQUE` (`num_hab`),
  KEY `fk_habitaciones_tipos1_idx` (`tipos_id_tipo_hab`),
  CONSTRAINT `fk_habitaciones_tipos1` FOREIGN KEY (`tipos_id_tipo_hab`) REFERENCES `tipos` (`id_tipo_hab`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `habitaciones`
--

LOCK TABLES `habitaciones` WRITE;
/*!40000 ALTER TABLE `habitaciones` DISABLE KEYS */;
INSERT INTO `habitaciones` VALUES (1,'101',31339,1),(2,'102',26759,2),(3,'103',31780,3),(4,'201',36621,1),(5,'202',28765,2),(6,'203',25963,3),(7,'301',35519,1),(8,'302',40708,2),(9,'303',37981,3),(10,'401',25778,4),(11,'402',40951,4),(12,'403',34420,4),(13,'501',41246,4),(14,'502',26969,4),(15,'503',37108,4);
/*!40000 ALTER TABLE `habitaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservas`
--

DROP TABLE IF EXISTS `reservas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservas` (
  `id_res` int NOT NULL AUTO_INCREMENT,
  `clientes_id_cli` int NOT NULL,
  `habitaciones_id_hab` int NOT NULL,
  `checkin_res` date NOT NULL,
  `checkout_res` date NOT NULL,
  PRIMARY KEY (`id_res`,`clientes_id_cli`,`habitaciones_id_hab`),
  KEY `fk_reservas_clientes_idx` (`clientes_id_cli`),
  KEY `fk_reservas_habitaciones1_idx` (`habitaciones_id_hab`),
  KEY `idx_checkin_checkout_res` (`checkin_res`,`checkout_res`),
  CONSTRAINT `fk_reservas_clientes` FOREIGN KEY (`clientes_id_cli`) REFERENCES `clientes` (`id_cli`),
  CONSTRAINT `fk_reservas_habitaciones1` FOREIGN KEY (`habitaciones_id_hab`) REFERENCES `habitaciones` (`id_hab`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservas`
--

LOCK TABLES `reservas` WRITE;
/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;
INSERT INTO `reservas` VALUES (1,1,1,'2024-02-01','2024-02-05'),(2,2,4,'2024-02-10','2024-02-15'),(3,3,7,'2024-02-20','2024-02-25'),(4,4,10,'2024-03-01','2024-03-05'),(5,5,13,'2024-03-10','2024-03-15');
/*!40000 ALTER TABLE `reservas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos`
--

DROP TABLE IF EXISTS `tipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipos` (
  `id_tipo_hab` int NOT NULL AUTO_INCREMENT,
  `nombre_tipo` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tipo_hab`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos`
--

LOCK TABLES `tipos` WRITE;
/*!40000 ALTER TABLE `tipos` DISABLE KEYS */;
INSERT INTO `tipos` VALUES (1,'Individual'),(2,'Doble'),(3,'Suite'),(4,'Familiar');
/*!40000 ALTER TABLE `tipos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-31 18:02:42
