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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bids`
--

LOCK TABLES `bids` WRITE;
/*!40000 ALTER TABLE `bids` DISABLE KEYS */;
INSERT INTO `bids` VALUES (20,49000,43,23,'2023-02-02 22:59:45'),(21,50000,43,23,'2023-02-02 23:00:13'),(29,51000,43,23,'2023-02-09 13:08:07'),(30,52000,43,23,'2023-02-09 13:08:08'),(31,53000,43,23,'2023-02-09 13:08:09'),(32,54000,43,23,'2023-02-09 13:08:10'),(33,55000,43,23,'2023-02-09 13:08:10'),(34,56000,43,23,'2023-02-09 13:08:11'),(35,57000,43,23,'2023-02-09 13:08:11'),(36,24999,46,23,'2023-02-09 15:47:09'),(37,25999,46,23,'2023-02-09 15:47:15'),(38,49000,45,23,'2023-02-10 12:00:55'),(39,50000,45,23,'2023-02-10 12:00:58'),(40,51000,45,23,'2023-02-10 13:13:38'),(41,52000,45,23,'2023-02-10 13:13:42'),(42,53000,45,23,'2023-02-10 13:13:45'),(43,54000,45,23,'2023-02-10 16:03:36'),(44,65999,44,23,'2023-02-10 16:35:27'),(45,66999,44,23,'2023-02-10 16:36:24'),(46,20222,49,23,'2023-02-10 17:35:55');
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
INSERT INTO `categories` VALUES (2,'Electronics','Electronic Product','2023-01-21 16:36:28','2023-01-26 06:03:00','uploads/ProductsImages/47591151547291ec.jpg'),(9,'Jewellery','Trendy Jewellery items','2023-01-26 10:22:09','2023-02-10 03:42:08','uploads/ProductsImages/77301524050208jewellerycover.jpg'),(10,'Handbags','Luxury handbags','2023-02-01 00:08:36',NULL,'uploads/ProductsImages/86115525923830hangbagcover.jpg'),(11,'Interior','Luxury interior collection','2023-02-01 00:10:00',NULL,'uploads/ProductsImages/7733145010803interiorcover.jpg');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contactus`
--

DROP TABLE IF EXISTS `contactus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contactus` (
  `userid` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `message` varchar(2500) NOT NULL,
  KEY `userid` (`userid`),
  CONSTRAINT `contactus_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactus`
--

LOCK TABLES `contactus` WRITE;
/*!40000 ALTER TABLE `contactus` DISABLE KEYS */;
INSERT INTO `contactus` VALUES (21,'Myseller','myseller@gmail.com','Bid Status','Hey! I dont like the way bid status is showing up on my profile. can you please fix that. Also please provide more information on the seller once someone wins the bid. Regards.');
/*!40000 ALTER TABLE `contactus` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (10,9,43,'Camera case shoulder bag crafted from beige and ebony GG Supreme Canvas','Gucci',48000,'The Ophidia line is a recent addition to Gucci’s bag range and we love how the styles consider all of the luxury brand’s classic design elements. This durable rounded crossbody, made of coated canvas, is super easy to wear.\r\nThis piece was featured during the 2018 Pre-Spring collection.\r\nThe interior is lined in a tonal leather.\r\nThis item is final sale and not eligible for return.\r\nNo visible signs of wear.\r\nHeight: 6.3 inches / 16 cm\r\nWidth: 9.45 inches / 24 cm\r\nDepth: 2.95 inches / 7.5 cm\r\nShoulder Strap Drop Max: 20 inches / 50.8 cm\r\nShoulder Strap Drop Min: 10.98 inches / 27.9 cm',1,'uploads/ProductsImages/27651623784981bag1.2.jpg','uploads/ProductsImages/66485591071653bag1.1.jpg','uploads/ProductsImages/28909257638243bag1.3.jpg','2023-02-01 00:36:28','2023-02-03 19:00:00',22),(10,9,44,'Broadway Square Velvet Crystal Clutch in Pink','Gucci',64999,'Remember Alessandro Michele’s AW18 collection? This had to be one of our favourite pieces! Vintage inspired details satisfy our 80’s obsession. Luxurious in velvet but easy to wear with a practical rope strap. Not to mention the sparkling crystal addition - glam.\nColour: Pink\nMaterial: Velvet\nDimensions: Height: 13 cm - Width: 20 cm - Depth: 5 cm\nYear: 2018\nCountry of Origin: Italy',1,'uploads/ProductsImages/99153017846748bag2.1.jpg','uploads/ProductsImages/41860713011418bag2.2.jpg','uploads/ProductsImages/41233885487807bag2.3.jpg','2023-02-01 00:50:00','2023-02-10 19:00:00',24),(10,11,45,' Takashi Murakami Pochette Accessoires in Black Multicolour 2003','Louis Vuitton',48000,'Color: Black\r\nMaterial: Leather\r\nDimensions: Height: 12.5cm - Width: 21cm - Depth: 4cm\r\nYear: 2003\r\nMade from premium materials for durability and elegance\r\nSpacious interior with multiple compartments for organization\r\nTwo large exterior pockets for easy access to frequently used items\r\nAdjustable shoulder strap for comfortable carrying\r\nElegant design that complements any outfit\r\nThis Murakami 2003 Pochette is the shoulder bag you need to inject some fun into your summer wardrobe. Featuring the brand’s iconic logo print and leather studded detailing, this is a favourite vintage piece of ours.',1,'uploads/ProductsImages/35476894617827bag1.jpg','uploads/ProductsImages/78454937897940bag11.jpg','uploads/ProductsImages/91288904209775bag12.jpg','2023-02-09 08:50:19','2023-02-11 19:00:00',22),(10,9,46,'GG Marmont Small Shoulder Bag in Original GG Canvas','Gucci',23999,'Colour: Brown\r\nMaterial: Canvas with Leather\r\nDimensions: Height: 15cm - Width: 26cm - Depth: 7cm - Shoulder Strap Drop: 55cm\r\nMade from premium materials for durability and elegance\r\nSpacious interior with multiple compartments for organization\r\nTwo large exterior pockets for easy access to frequently used items\r\nAdjustable shoulder strap for comfortable carrying\r\nElegant design that complements any outfit\r\nA little (or maybe a lot of) monogram goes a long way with Gucci’s GG Marmont chain shoulder bag. A true statement bag, who can deny the allure of the Italian fashion house’s quilted chain shoulder style? The black leather details compliment the archetypal beige canvas to create a design that is at once classic and unique, and set to make you stand out. Let the shining gold GG logo do the talking for you, as you add something extra to your everyday outfits while wearing it as a crossbody. Then transform it into a shoulder or top handle bag to offset your evening affairs.',2,'uploads/ProductsImages/48914821819983bag2.jpg','uploads/ProductsImages/45194320907238bag21.jpg','uploads/ProductsImages/83062343331904bag23.jpg','2023-02-09 09:53:49','2023-02-12 19:00:00',22),(10,9,47,'GG Marmont Small Matelassé Shoulder Bag in Rose Beige','Gucci',5299,'Colour: Rose Beige\r\nMaterial: Leather\r\nDimensions: Width: 26cm x Height: 15cm x Depth: 7cm\r\nCountry of Origin: Italy\r\nAccessories: Dustbag\r\nMade from premium materials for durability and elegance\r\nSpacious interior with multiple compartments for organization\r\nTwo large exterior pockets for easy access to frequently used items\r\nAdjustable shoulder strap for comfortable carrying\r\nElegant design that complements any outfit\r\nThe double GG logo hardware features front and centre on bags in the Marmont range, a favourite of celebrities and fashion insiders. Combining sophistication with playfulness, this Wild Rose version of the GG Marmont Small Matelassé Shoulder Bag is highly coveted. Crafted in luxurious zigzag quilted leather, this bag features and oversized flap closure and chain strap. Style this bag with everything from jeans and a tee to a floaty dress and heels.  ',1,'uploads/ProductsImages/26856238919798bag3.jpg','uploads/ProductsImages/28201189953160bag32.jpg','uploads/ProductsImages/76364715170737bag33.jpg','2023-02-10 08:33:19','2023-02-13 19:00:00',24),(9,8,49,'BAROQUE PEARL BEADED T-BAR NECKLACE','Missoma',19222,'Metal: 18ct Gold Plated on Brass\r\nGemstone: White freshwater pearl\r\nBead dimensions: 6mm\r\nLength: 500mm\r\nWeight: 41g\r\nHandcrafted with expert attention to detail\r\nMade with high-quality materials, such as gold, silver, and precious gems\r\nA wide range of styles, from classic and traditional to modern and trendy\r\nPerfect for any occasion, whether its a special event or everyday wear\r\nOffers a variety of options, including necklaces, bracelets, earrings, and rings\r\nProvides a timeless and elegant look that will never go out of style\r\nMix your materials. Said to bring wisdom and knowledge uniquely shaped freshwater pearls form this distinctive necklace  paired with smooth beads graduating in size and a tbar fastening. The ultimate way to add texture to your layers.\r\nThis piece should be stored in a cool dry place and cleaned carefully with a soft nonabrasive cloth to maintain shine.',1,'uploads/ProductsImages/62345738905050necklace1.jpg','uploads/ProductsImages/84623356876011necklace12.jpg','uploads/ProductsImages/40231312135797necklace13.jpg','2023-02-10 08:58:57','2023-02-11 19:00:00',24),(9,8,50,'SEED PEARL BEADED CHOKER WITH GOLDEN BEADS','Missoma',21000,'Metal: 18ct Gold Plated on Brass\r\nGemstone: Freshwater seed pearls\r\nPearl dimensions: 3.5mm x 6mm\r\nTotal length: 420mm with continuous extension starting at 380mm\r\nWeight: 5.62g\r\nHandcrafted with expert attention to detail\r\nMade with high-quality materials, such as gold, silver, and precious gems\r\nA wide range of styles, from classic and traditional to modern and trendy\r\nPerfect for any occasion, whether its a special event or everyday wear\r\nOffers a variety of options, including necklaces, bracelets, earrings, and rings\r\nProvides a timeless and elegant look that will never go out of style.\r\nInspired by natural forms. Bringing wisdom and knowledge, freshwater seed pearls form this choker necklace, contrasted and offset with small gold beads for a distinctive finish. The ultimate way to add texture to your layers.',0,'uploads/ProductsImages/59791295786156neck2.jpg','uploads/ProductsImages/10452252503224neck22.jpg','uploads/ProductsImages/46366583834298neck23.jpg','2023-02-10 09:04:10','2023-02-12 19:00:00',24),(9,12,51,'HARRIS REED NORTH STAR PEARL HOOP EARRINGS','Missoma',2850,'Metal: 18ct Recycled Gold Vermeil on Recycled Sterling Silver\r\nCharm dimensions: 18.6mm x 18.6mm\r\nStones: Pearl Cabochon and White Cubic Zirconia\r\nWeight: 4.09g\r\nThis piece is handcrafted with recycled metal elements to help us reduce our environmental impact.\r\n\r\nThese hoop earrings have star charms that shine with graduated white cubic zirconia pavé on black rhodium surrounded by four pearls.\r\nDiscover the world of Harris Reed x Missoma with jewellery for everyone, embracing your individuality, acceptance and being fabulously who you are.',1,'uploads/ProductsImages/48538404374959ear1.jpg','uploads/ProductsImages/90673536393092ear12.jpg','uploads/ProductsImages/10985051840881ear13.jpg','2023-02-10 09:10:13','2023-02-12 19:00:00',24),(9,12,52,'MINI PYRAMID CHARM HOOP EARRINGS','Missoma',31000,'Metal: 18ct Gold Plated Vermeil on Sterling Silver\r\nGemstone: Amazonite\r\nDimensions: 11.5 mm hoops 10.7 mm x 9.2 mm charms 3 mm stone thickness\r\nWeight: 2.3g hoops and charms\r\nPower of the pyramid. Expertly handcrafted, these unique best selling earrings feature amazonite gemstones – known for healing – suspended from pared back hoops with a pyramid design. Create contrast by teaming with chubby huggies.\r\nThis piece has a beautiful irregularly shaped gemstone that is natural, making each stone completely unique. Therefore it may look slightly different from the images with slight variations in its shape and size.',1,'uploads/ProductsImages/10553241230633ear2.jpg','uploads/ProductsImages/98203388583943ear22.jpg','uploads/ProductsImages/28838828765308ear23.jpg','2023-02-10 10:00:33','2023-02-14 19:00:00',24),(9,8,53,'JELLY HEART GEMSTONE CHARM NECKLACE','Missoma',25999,'Metal: 18ct Recycled Gold Plated on Brass\r\nCharm Dimensions: 8mm x 7.4mm x 2.9mm\r\nTotal Length: 450 mm with continuous extension from 410 mm to 450 mm Gemstone: Black Onyx\r\nWeight: 19.1g\r\nhis retro-inspired necklace features five black onyx jelly heart charms, known as the protection gemstone, floating on a chunky curb chain. Layer with more chains, wear solo for everyday styling or pair with the Jelly Heart Gemstone Bracelet.\r\nHandcrafted with expert attention to detail\r\nMade with high-quality materials, such as gold, silver, and precious gems\r\nA wide range of styles, from classic and traditional to modern and trendy\r\nPerfect for any occasion, whether its a special event or everyday wear\r\nOffers a variety of options, including necklaces, bracelets, earrings, and rings\r\nProvides a timeless and elegant look that will never go out of style\r\n\r\n',1,'uploads/ProductsImages/83474211816085neck3.jpg','uploads/ProductsImages/26142563631312neck32.jpg','uploads/ProductsImages/15855125367533neck33.jpg','2023-02-10 12:03:41','2023-02-10 19:00:00',24);
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategories`
--

LOCK TABLES `subcategories` WRITE;
/*!40000 ALTER TABLE `subcategories` DISABLE KEYS */;
INSERT INTO `subcategories` VALUES (2,'Tablet','2023-01-22 00:44:07','2023-01-22 22:50:48',2),(8,'Necklace','2023-01-26 10:22:58','2023-02-10 03:42:35',9),(9,'Gucci','2023-02-01 00:08:46',NULL,10),(10,'Furniture','2023-02-01 00:10:24',NULL,11),(11,'Louis Vuitton','2023-02-09 08:46:10',NULL,10),(12,'Earring','2023-02-10 08:42:44','2023-02-10 04:07:44',9);
/*!40000 ALTER TABLE `subcategories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `fname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone` int(11) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `user_role_id` int(11) NOT NULL,
  PRIMARY KEY (`userid`),
  KEY `user_role_id` (`user_role_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_role_id`) REFERENCES `user_role` (`userrole_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('','',21,'Rafia Ahmed','rafiaahmed90@hehe.com',0,'qwerty123',10),('','',22,'Myseller','myseller@gmail.com',0,'qwerty123',11),('','',23,'Mybidder','mybidder@gmail.com',0,'qwerty123',12),('','',24,'Myseller2','test123@gmail.com',0,'qwerty123',11),('Baby','Shark',29,'Babyshark12','babyshark12@gmail.com',90078601,'fgbjigaojf',12),('Lee ','Jongsuk',30,'Mybidder2','mybidder2@gmail.com',90023444,'qwerty123',12);
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

-- Dump completed on 2023-02-10 21:17:56
