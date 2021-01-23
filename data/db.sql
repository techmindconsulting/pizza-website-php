-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: pizza_website
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.12-MariaDB-log

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

CREATE DATABASE  IF NOT EXISTS `pizza_website` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `pizza_website`;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ordered_at` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `total` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_order_user_idx` (`user_id`),
  CONSTRAINT `fk_order_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_item`
--

DROP TABLE IF EXISTS `order_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` varchar(45) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_order_item_order_idx` (`order_id`),
  KEY `fk_order_item_product_idx` (`product_id`),
  CONSTRAINT `fk_order_item_order` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_item_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_item`
--

LOCK TABLES `order_item` WRITE;
/*!40000 ALTER TABLE `order_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `product_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`product_type_id`),
  KEY `fk_product_product_type_idx` (`product_type_id`),
  CONSTRAINT `fk_product_product_type` FOREIGN KEY (`product_type_id`) REFERENCES `product_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Boisson 33cl','Soda, jus de fruits','1.5','assets/images/products/soda-33cl.jpg',1),(2,'Boisson 50cl','Soda, jus de fruits','2','assets/images/products/soda-50cl.jpg',1),(3,'Boisson 50cl','Eau','1.2','assets/images/products/eau-50cl.jpg',1),(4,'Boisson 1,5l','Soda','3','assets/images/products/soda-15l.jpg',1),(5,'Boisson 2l','Jus de fruits','3.5','assets/images/products/jus-2l.jpg',1),(23,'Marguerita','Sauce tomate, mozarella, basilic, huile d\'olive','9',NULL,2),(24,'Calzone','Sauce tomate, jambon, mozarella, oeuf','10.5',NULL,2),(25,'Reine','Sauce tomate, jambon, champignons frais','10.5',NULL,2),(26,'Chèvre Miel','Crème fraîche, mozarella, chèvre, miel','11',NULL,2),(27,'Thono','Sauce tomate, mozarella, thon, oignons rouges','11.5',NULL,2),(28,'Orientale','Sauce tomate, mozarella, champignon, olive, oignon','11.5',NULL,2),(29,'Végétarienne','Sauce tomat, mozarella, champignon, champignon, olive, oignon','11.5',NULL,2),(30,'Montagnarde','Crème fraîche, mozzarella, pommes de terre, lardons, raclette','12',NULL,2),(31,'Fermière','Crème fraiche, mozzarella, poulet, pommes deterre','12',NULL,2),(32,'4 Fromages','Chèvre, mozarella, scarmoza fumée, gorgonzala, parmeson','12',NULL,2),(33,'3 Jambons','Sauce tomate, jambon, chorizo, bacon','12.5',NULL,2),(34,'Pronto','Sauce tomate, burrata, viande hachée, tomates cerises','12.5',NULL,2),(35,'Saumon','Crème fraîche, mozzarella, saumon','13',NULL,2),(36,'Mexicaine','Sauce tomate, viande hachée, merguez, chorizo, poivrons','13',NULL,2),(37,'Texane','Sauce barbecue, mozarella, viande hachée, poivron, oignon','13',NULL,2),(38,'Suprème','Crème fraîche, mozarella, viande hachée, merguez, poulet','13.5',NULL,2),(39,'Tandoori','Crème fraîche, mozzarella, chicken, tandoori, pomme de terre','13.5',NULL,2),(40,'Casa','Sauce tomate, mozzarella, tenders, chorizo, bacon, emmental','13.5',NULL,2),(41,'Penne forestière',NULL,'8.5',NULL,3),(42,'Spagnetti bolognaise',NULL,'8.5',NULL,3),(43,'Tagliatelle carbonara',NULL,'8.5',NULL,3),(44,'Pâtes saumon',NULL,'8.5',NULL,3),(45,'Fabuleux','Pain bio, steak frais 140g, cheddar, salade, oignon frit','11',NULL,4),(46,'Americain','Pain bio, steak frais 140g, oeuf, bacon, salade, oignons frit','12',NULL,4),(47,'Montagnard','Pain bio, steak frai 140g, raclette, lardons, salade, oignon frit','12',NULL,4),(48,'Chèvre miel','Pain bio, steak frais 140g, chèvre, miel','12',NULL,4),(49,'Tiramisu',NULL,'3.5',NULL,5),(50,'Tarte citron meringue',NULL,'3',NULL,5),(51,'Fondant chocolat',NULL,'3',NULL,5),(52,'Tarte au daim',NULL,'2.5',NULL,5),(53,'Sunday','Nappage chocolat ou caramel avec des cacahuètes','3',NULL,5),(54,'Tarte framboise',NULL,'3',NULL,5),(55,'Pain nutella',NULL,'3.5',NULL,5),(56,'Steak','Double steak, cheddar','6.5',NULL,6),(57,'Tenders','Tenders, cheddar','7',NULL,6),(58,'Chicken tandoori','Tandoori maison, cheddar','7.5',NULL,6),(59,'Miya','Steak, jamdon de binde, chorizo, cheddar','7.5',NULL,6),(60,'Triple Steak','3 steaks, bacon, cheddar','8',NULL,6),(61,'Montagnard','Steak, lardons, pomme de terre, fromage à raclette','8.5',NULL,6);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_type`
--

DROP TABLE IF EXISTS `product_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(128) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_type`
--

LOCK TABLES `product_type` WRITE;
/*!40000 ALTER TABLE `product_type` DISABLE KEYS */;
INSERT INTO `product_type` VALUES (1,'Boissons','Découvrez nos boissons','assets/images/products/boisson-type.jpg'),(2,'Pizzas','Préparées avec pâte fraîche faite maison.','assets/images/products/pizza-type.jpg'),(3,'Pâtes','Des pâtes généreuses, goûteuses avec beaucoup de saveurs.','assets/images/products/pates-type.jpg'),(4,'Burgers','Les garnitures et les saveurs de nos burgers font qu’ils sont succulents !','assets/images/products/burger-type.jpg'),(5,'Desserts','Tous nos desserts sont fait maison','assets/images/products/dessert-type.jpg'),(6,'Sandwichs','Des sandwich généreux, goûteux avec beaucoup de saveurs.','assets/images/products/panini-type.jpg');
/*!40000 ALTER TABLE `product_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
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

-- Dump completed on 2021-01-23  9:32:42
