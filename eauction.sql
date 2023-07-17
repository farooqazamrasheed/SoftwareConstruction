-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: project
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `bids`
--

DROP TABLE IF EXISTS `bids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bids` (
  `bidid` int(11) NOT NULL AUTO_INCREMENT,
  `bidamount` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `buyer_Id` int(11) NOT NULL,
  `biddate` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`bidid`),
  KEY `buyer_Id` (`buyer_Id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `bids_ibfk_1` FOREIGN KEY (`buyer_Id`) REFERENCES `user` (`userid`),
  CONSTRAINT `bids_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`productid`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bids`
--

LOCK TABLES `bids` WRITE;
/*!40000 ALTER TABLE `bids` DISABLE KEYS */;
INSERT INTO `bids` VALUES (8,38000,29,23,'2023-01-31 18:38:28'),(10,39000,29,23,'2023-01-31 19:33:13'),(11,40000,29,23,'2023-01-31 19:33:17'),(12,41000,29,23,'2023-01-31 19:33:19'),(13,42000,29,23,'2023-01-31 19:33:19'),(14,43000,29,23,'2023-01-31 19:33:20'),(15,44000,29,23,'2023-01-31 19:36:05'),(16,45000,29,23,'2023-01-31 19:36:08'),(17,43000,31,23,'2023-02-01 01:54:22'),(18,44000,31,23,'2023-02-01 01:54:52'),(19,46000,29,23,'2023-02-02 14:14:34'),(20,49000,43,23,'2023-02-02 22:59:45'),(21,50000,43,23,'2023-02-02 23:00:13');
/*!40000 ALTER TABLE `bids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `categoryid` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(25) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastupdated` timestamp NULL DEFAULT NULL,
  `coverimg` varchar(2000) NOT NULL,
  PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (2,'Electronics','Electronic Product','2023-01-21 16:36:28','2023-01-26 06:03:00','uploads/ProductsImages/47591151547291ec.jpg'),(9,'Fashion','Trendy Fashion items','2023-01-26 10:22:09',NULL,'uploads/ProductsImages/10990084245792jewellerycover.jpg'),(10,'Handbags','Luxury handbags','2023-02-01 00:08:36',NULL,'uploads/ProductsImages/86115525923830hangbagcover.jpg'),(11,'Interior','Luxury interior collection','2023-02-01 00:10:00',NULL,'uploads/ProductsImages/7733145010803interiorcover.jpg');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `productid` int(11) NOT NULL AUTO_INCREMENT,
  `productname` varchar(256) NOT NULL,
  `productcompany` varchar(256) NOT NULL,
  `startingprice` int(11) NOT NULL,
  `productdescription` varchar(1024) NOT NULL,
  `feature` int(11) NOT NULL,
  `img1` varchar(2000) NOT NULL,
  `img2` varchar(2000) NOT NULL,
  `img3` varchar(2000) NOT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `enddate` timestamp NULL DEFAULT NULL,
  `seller_id` int(11) NOT NULL,
  PRIMARY KEY (`productid`),
  KEY `category_id` (`category_id`),
  KEY `subcategory_id` (`subcategory_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`categoryid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `products_ibfk_2` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`subcategoryid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (9,8,29,'Infinity Ring','Tiffany and co',36000,'Infinity Ring Molten Double Twisted Infinity Stacking Ring 18ct Recycled Gold Plated Vermeil',1,'uploads/ProductsImages/67052933226480ring1.jpg','uploads/ProductsImages/67052933226480ring1.jpg','uploads/ProductsImages/67052933226480ring1.jpg','2023-01-26 10:24:52','2023-01-26 10:24:52',11),(9,8,30,'Hinged Hoop Earrings in silver','Lucy William',2900,'Lucy Williams Mini Beaded Hinged Hoop\r\nEarrings in silver\r\n\r\n',1,'uploads/ProductsImages/17933154030622earring2.jpg','uploads/ProductsImages/17933154030622earring2.jpg','uploads/ProductsImages/17933154030622earring2.jpg','2023-01-26 10:40:28',NULL,11),(9,8,31,'Double Chain Necklace in silver','Lucy William',42000,'Double Chain Necklace in sterling silver\r\nwith small diamonds',0,'uploads/ProductsImages/31031956238680necklace2.jpg','uploads/ProductsImages/31031956238680necklace2.jpg','uploads/ProductsImages/31031956238680necklace2.jpg','2023-01-26 10:45:09',NULL,11),(2,2,33,'OPPO A57','OPPO',780000,'abc def ghi jkl adsaskd wdewkodw edkwodwseokad',1,'uploads/ProductsImages/31737958909178comic3.jpg','uploads/ProductsImages/31737958909178comic3.jpg','uploads/ProductsImages/31737958909178comic3.jpg','2023-01-30 14:49:49','2023-02-01 19:00:00',11),(2,2,34,'Test','OPPO',122333,'safwrfcd gerf4dvcx rgsxzax ewafcsz',1,'uploads/ProductsImages/31430781549282comic3.jpg','uploads/ProductsImages/31430781549282comic3.jpg','uploads/ProductsImages/31430781549282comic3.jpg','2023-01-31 05:21:48','0000-00-00 00:00:00',0),(9,8,36,'sdaSxs','czsxcsx',122333,'vszd',1,'uploads/ProductsImages/36709989838294comic2.jpg','uploads/ProductsImages/36709989838294comic2.jpg','uploads/ProductsImages/36709989838294comic2.jpg','2023-01-31 05:23:22','2023-02-01 19:00:00',0),(2,2,37,'heheh','OPPO',122333,'ddaefqczfzca',1,'uploads/ProductsImages/24776675725941comic3.jpg','uploads/ProductsImages/24776675725941comic3.jpg','uploads/ProductsImages/24776675725941comic3.jpg','2023-01-31 05:24:37','2023-02-01 19:00:00',0),(2,2,38,'hegrdfswf','popo',122333,'SAXQEFDEWSD QFASXWGVS',1,'uploads/ProductsImages/95529003615736comic2.jpg','uploads/ProductsImages/95529003615736comic2.jpg','uploads/ProductsImages/95529003615736comic2.jpg','2023-01-31 05:26:05','2023-02-01 19:00:00',22),(10,9,43,'Camera case shoulder bag crafted from beige and ebony GG Supreme Canvas','Gucci',48000,'The Ophidia line is a recent addition to Gucci’s bag range and we love how the styles consider all of the luxury brand’s classic design elements. This durable rounded crossbody, made of coated canvas, is super easy to wear.\r\nThis piece was featured during the 2018 Pre-Spring collection.\r\nThe interior is lined in a tonal leather.\r\nThis item is final sale and not eligible for return.\r\nNo visible signs of wear.\r\nHeight: 6.3 inches / 16 cm\r\nWidth: 9.45 inches / 24 cm\r\nDepth: 2.95 inches / 7.5 cm\r\nShoulder Strap Drop Max: 20 inches / 50.8 cm\r\nShoulder Strap Drop Min: 10.98 inches / 27.9 cm',1,'uploads/ProductsImages/27651623784981bag1.2.jpg','uploads/ProductsImages/66485591071653bag1.1.jpg','uploads/ProductsImages/28909257638243bag1.3.jpg','2023-02-01 00:36:28','2023-02-03 19:00:00',22),(10,9,44,'Broadway Square Velvet Crystal Clutch in Pink','Gucci',64999,'Remember Alessandro Michele’s AW18 collection? This had to be one of our favourite pieces! Vintage inspired details satisfy our 80’s obsession. Luxurious in velvet but easy to wear with a practical rope strap. Not to mention the sparkling crystal addition - glam.\r\nColour: Pink\r\nMaterial: Velvet\r\nDimensions: Height: 13 cm - Width: 20 cm - Depth: 5 cm\r\nYear: 2018\r\nCountry of Origin: Italy',1,'uploads/ProductsImages/99153017846748bag2.1.jpg','uploads/ProductsImages/41860713011418bag2.2.jpg','uploads/ProductsImages/41233885487807bag2.3.jpg','2023-02-01 00:50:00','2023-02-04 19:00:00',24);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subcategories` (
  `subcategoryid` int(11) NOT NULL AUTO_INCREMENT,
  `subcategory_name` varchar(30) NOT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastupdated` timestamp NULL DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`subcategoryid`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`categoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategories`
--

LOCK TABLES `subcategories` WRITE;
/*!40000 ALTER TABLE `subcategories` DISABLE KEYS */;
INSERT INTO `subcategories` VALUES (2,'Tablet','2023-01-22 00:44:07','2023-01-22 22:50:48',2),(8,'Jewellery','2023-01-26 10:22:58',NULL,9),(9,'Gucci','2023-02-01 00:08:46',NULL,10),(10,'Furniture','2023-02-01 00:10:24',NULL,11);
/*!40000 ALTER TABLE `subcategories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `user_role_id` int(11) NOT NULL,
  PRIMARY KEY (`userid`),
  KEY `user_role_id` (`user_role_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_role_id`) REFERENCES `user_role` (`userrole_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (21,'Rafia Ahmed','rafiaahmed90@hehe.com','qwerty123',10),(22,'Myseller','myseller@gmail.com','qwerty123',11),(23,'Mybidder','mybidder@gmail.com','qwerty123',12),(24,'Myseller2','test123@gmail.com','qwerty123',11);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_role` (
  `userrole_id` int(11) NOT NULL AUTO_INCREMENT,
  `userrole_name` varchar(50) NOT NULL,
  PRIMARY KEY (`userrole_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES (10,'Admin'),(11,'Seller'),(12,'Bidder');
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-02 23:29:17
