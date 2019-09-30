-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: fluxo-caixa
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

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
-- Table structure for table `contas_pagar`
--

DROP TABLE IF EXISTS `contas_pagar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contas_pagar` (
  `id_contas_pagar` int(11) NOT NULL AUTO_INCREMENT,
  `valor_contas_pagar` varchar(255) NOT NULL,
  `situacao` int(11) NOT NULL DEFAULT '0',
  `descricao` varchar(500) NOT NULL,
  `vencimento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fornecedor` varchar(255) NOT NULL,
  `data_pagamento` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_contas_pagar`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contas_pagar`
--

LOCK TABLES `contas_pagar` WRITE;
/*!40000 ALTER TABLE `contas_pagar` DISABLE KEYS */;
INSERT INTO `contas_pagar` VALUES (4,'10000.00',1,'Descrição','2019-09-30 15:59:50','CEMAR','2019-01-01 02:00:00'),(5,'100.90',1,'NoteBook','2019-09-30 15:56:25','UNVERSAL INFORMATICA','2020-02-01 02:00:00'),(6,'10.00',1,'cadeira','2019-09-30 16:00:31','ARMAZEM PARAIBA','2010-01-01 02:00:00');
/*!40000 ALTER TABLE `contas_pagar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contas_receber`
--

DROP TABLE IF EXISTS `contas_receber`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contas_receber` (
  `id_contas_receber` int(11) NOT NULL AUTO_INCREMENT,
  `valor_contas_receber` varchar(255) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `situacao` int(11) NOT NULL DEFAULT '0',
  `prazo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `data_pagamento` timestamp NULL DEFAULT NULL,
  `cliente` varchar(200) NOT NULL,
  PRIMARY KEY (`id_contas_receber`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contas_receber`
--

LOCK TABLES `contas_receber` WRITE;
/*!40000 ALTER TABLE `contas_receber` DISABLE KEYS */;
INSERT INTO `contas_receber` VALUES (4,'122.22','Divida',1,'2019-09-30 16:16:29','2000-01-01 02:00:00','Fulano da silva'),(5,'1200.00','serviço',0,'2019-09-30 15:16:09',NULL,'Beutrano');
/*!40000 ALTER TABLE `contas_receber` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fluxo_caixa`
--

DROP TABLE IF EXISTS `fluxo_caixa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fluxo_caixa` (
  `id_fluxo_caixa` int(11) NOT NULL AUTO_INCREMENT,
  `valor` varchar(255) NOT NULL,
  `tipo` int(1) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_fluxo_caixa`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fluxo_caixa`
--

LOCK TABLES `fluxo_caixa` WRITE;
/*!40000 ALTER TABLE `fluxo_caixa` DISABLE KEYS */;
INSERT INTO `fluxo_caixa` VALUES (1,'çkjbçkj',1,'kjbçkjb','2019-09-30 07:20:30'),(2,'çkjbçkj',1,'kjbçkjb','2019-09-30 07:24:06'),(3,'asdas',1,'kjbçkjb','2019-09-30 07:24:32'),(4,'1.000,00',1,'Descrição','2019-09-30 09:02:31');
/*!40000 ALTER TABLE `fluxo_caixa` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-30 13:28:36
