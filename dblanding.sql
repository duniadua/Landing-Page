-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: dblanding
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.12.04.1

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `uid` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `privileges` varchar(255) DEFAULT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_ip` varchar(18) DEFAULT NULL,
  `level` int(11) DEFAULT '1',
  `active` int(11) DEFAULT NULL,
  `failed` int(11) DEFAULT '0',
  `usertype` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'ROOT','342936','SUPER ADMIN USER','3','2014-08-12 04:44:42',NULL,1,NULL,0,3);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `affiliate_member`
--

DROP TABLE IF EXISTS `affiliate_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `affiliate_member` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `dfno` char(40) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `pinbb` char(8) DEFAULT NULL,
  `email` char(120) DEFAULT NULL,
  `short_url` char(10) DEFAULT NULL,
  `fb` char(80) DEFAULT NULL,
  `twitter` char(80) DEFAULT NULL,
  `phone` char(80) DEFAULT NULL,
  `act` int(11) DEFAULT NULL,
  `createnm` varchar(30) NOT NULL,
  `updatenm` varchar(30) NOT NULL,
  `createdt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `affiliate_member`
--

LOCK TABLES `affiliate_member` WRITE;
/*!40000 ALTER TABLE `affiliate_member` DISABLE KEYS */;
INSERT INTO `affiliate_member` VALUES (2,'IDJHID001829AT','ABDUL AZIZAT','5AVCCG','info@k-link.co.id','4vHDtn5Vo7','www.facebook.com/tulus','@kacang_kulit1','081295883808',1,'ROOT','ROOT','2015-01-17 07:05:46'),(3,'IDJHID000069','UJANG','5AVCCG','info@k-link.co.id','k1BGxtIvvF','www.facebook.com/putus','@kacang_kulit2','08561155880',1,'ROOT','ROOT','2015-01-17 07:05:42'),(4,'IDJHID000065','CAMEL','5AVCCG','sahid@k-link.co.id','BrL0tRGhMh','www.facebook.com/putus','@kacang_kulit12','081295883808',1,'ROOT','ROOT','2015-01-17 07:05:37'),(5,'IDJHID000069','CAMEL','5AVCCG','info@k-link.co.id','ihgbZGcTUr','www.facebook.com/putus','@kacang_kulit123','081295883808',1,'ROOT','ROOT','2015-01-17 07:05:40');
/*!40000 ALTER TABLE `affiliate_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ftp_param`
--

DROP TABLE IF EXISTS `ftp_param`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ftp_param` (
  `id` int(11) NOT NULL,
  `username` varchar(220) DEFAULT NULL,
  `password` char(120) DEFAULT NULL,
  `host` char(120) DEFAULT NULL,
  `port` int(11) DEFAULT NULL,
  `createdt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastsync` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ftp_param`
--

LOCK TABLES `ftp_param` WRITE;
/*!40000 ALTER TABLE `ftp_param` DISABLE KEYS */;
INSERT INTO `ftp_param` VALUES (1,'u2442_2','123456','ftp.k-link.co.id',21,'2014-10-24 09:05:38','2014-12-24 09:55:40');
/*!40000 ALTER TABLE `ftp_param` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `grp_article`
--

DROP TABLE IF EXISTS `grp_article`;
/*!50001 DROP VIEW IF EXISTS `grp_article`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `grp_article` (
  `ld_title` tinyint NOT NULL,
  `ld_content` tinyint NOT NULL,
  `shorturl` tinyint NOT NULL,
  `ip_address` tinyint NOT NULL,
  `createdt` tinyint NOT NULL,
  `createnm` tinyint NOT NULL,
  `ld_type` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `landing`
--

DROP TABLE IF EXISTS `landing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `landing` (
  `id` bigint(20) NOT NULL,
  `ld_title` varchar(220) DEFAULT NULL,
  `ld_image` char(40) DEFAULT NULL,
  `ld_theme` char(30) DEFAULT NULL,
  `ld_content` longtext,
  `ld_type` int(11) DEFAULT NULL,
  `ld_act` int(11) DEFAULT '0',
  `ld_fb` varchar(100) DEFAULT NULL,
  `ld_twitter` varchar(100) DEFAULT NULL,
  `ip_address` varchar(20) NOT NULL,
  `createdt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `viewed` int(11) DEFAULT NULL,
  `shorturl` char(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `landing`
--

LOCK TABLES `landing` WRITE;
/*!40000 ALTER TABLE `landing` DISABLE KEYS */;
INSERT INTO `landing` VALUES (1,'Cara Mengatasi Jerawat Membandal','jerawat.jpg','rahasia-style.css','<p>Pernah gak kalian dengar ato liat orang yang komplain ‘Ah, saya udah coba semua cara untuk hilangin jerawat tapi gak ada yang berhasil’ atau ‘Semua ini dusta…’ </p><p> Saya sempat heran karena ada orang-orang yang berhasil dengan mencoba cara tertentu, tapi kenapa ada orang lain yang gak berhasil sama sekali?  </p>Dari interview saya dengan beberapa dokter spesialis kencantikan, ternyata terlepas dari cara apapun yang kita pilih untuk menghilangkan jerawat, ada beberapa  hal dasar yang WAJIB Anda ketahui :      Bersihkan wajah di pagi dan malam hari secara konsisten     Kurangi makan makanan berminyak (This is your biggest enemy!)     Jangan memencet jerawat (hal ini bisa menyebabkan bekas jerawat dan noda hitam)     Jangan berada di bawah matahari terus menerus  So searang jelas kan, kalo kamu males bersihin muka, terlepas dari berapa seringnya kamu pergi facial atau pakai krim ini itu, jerawat kamu masih nongol terus.  Sama juga, kalo kamu makan gorengan terus ya pasti jerawat donk! Hayo, mau cantik ato makan enak?',1,1,NULL,NULL,'127.0.0.1','2014-10-20 06:17:16','2014-10-20 06:17:16',95,NULL),(2,'Cara Mengatasi Pacar yang Membandal','pacar2.jpg','green-style.css','<p>Pernah gak kalian dengar ato liat orang yang komplain ‘Ah, saya udah coba semua cara untuk hilangin jerawat tapi gak ada yang berhasil’ atau ‘Semua ini dusta…’ </p><p> Saya sempat heran karena ada orang-orang yang berhasil dengan mencoba cara tertentu, tapi kenapa ada orang lain yang gak berhasil sama sekali?  </p>Dari interview saya dengan beberapa dokter spesialis kencantikan, ternyata terlepas dari cara apapun yang kita pilih untuk menghilangkan jerawat, ada beberapa  hal dasar yang WAJIB Anda ketahui :      Bersihkan wajah di pagi dan malam hari secara konsisten     Kurangi makan makanan berminyak (This is your biggest enemy!)     Jangan memencet jerawat (hal ini bisa menyebabkan bekas jerawat dan noda hitam)     Jangan berada di bawah matahari terus menerus  So searang jelas kan, kalo kamu males bersihin muka, terlepas dari berapa seringnya kamu pergi facial atau pakai krim ini itu, jerawat kamu masih nongol terus.  Sama juga, kalo kamu makan gorengan terus ya pasti jerawat donk! Hayo, mau cantik ato makan enak?',1,0,NULL,NULL,'127.0.0.1','2014-10-20 06:17:16','2014-10-21 06:17:16',1,NULL),(3,'3 Langkah Mencari Uang Dengan Mudah','uang.jpg','green1-style.css','<p>Pernah gak kalian dengar ato liat orang yang komplain ‘Ah, saya udah coba semua cara untuk hilangin jerawat tapi gak ada yang berhasil’ atau ‘Semua ini dusta…’ </p><p> Saya sempat heran karena ada orang-orang yang berhasil dengan mencoba cara tertentu, tapi kenapa ada orang lain yang gak berhasil sama sekali?  </p>Dari interview saya dengan beberapa dokter spesialis kencantikan, ternyata terlepas dari cara apapun yang kita pilih untuk menghilangkan jerawat, ada beberapa  hal dasar yang WAJIB Anda ketahui :      Bersihkan wajah di pagi dan malam hari secara konsisten     Kurangi makan makanan berminyak (This is your biggest enemy!)     Jangan memencet jerawat (hal ini bisa menyebabkan bekas jerawat dan noda hitam)     Jangan berada di bawah matahari terus menerus  So searang jelas kan, kalo kamu males bersihin muka, terlepas dari berapa seringnya kamu pergi facial atau pakai krim ini itu, jerawat kamu masih nongol terus.  Sama juga, kalo kamu makan gorengan terus ya pasti jerawat donk! Hayo, mau cantik ato makan enak?',1,0,NULL,NULL,'127.0.0.1','2014-10-20 06:17:16','2014-10-20 06:17:16',NULL,NULL),(4,'Mesin uang','time_uang.jpg','green1-style.css','<p>Pernah gak kalian dengar ato liat orang yang komplain ‘Ah, saya udah coba semua cara untuk hilangin jerawat tapi gak ada yang berhasil’ atau ‘Semua ini dusta…’ </p><p> Saya sempat heran karena ada orang-orang yang berhasil dengan mencoba cara tertentu, tapi kenapa ada orang lain yang gak berhasil sama sekali?  </p>Dari interview saya dengan beberapa dokter spesialis kencantikan, ternyata terlepas dari cara apapun yang kita pilih untuk menghilangkan jerawat, ada beberapa  hal dasar yang WAJIB Anda ketahui :      Bersihkan wajah di pagi dan malam hari secara konsisten     Kurangi makan makanan berminyak (This is your biggest enemy!)     Jangan memencet jerawat (hal ini bisa menyebabkan bekas jerawat dan noda hitam)     Jangan berada di bawah matahari terus menerus  So searang jelas kan, kalo kamu males bersihin muka, terlepas dari berapa seringnya kamu pergi facial atau pakai krim ini itu, jerawat kamu masih nongol terus.  Sama juga, kalo kamu makan gorengan terus ya pasti jerawat donk! Hayo, mau cantik ato makan enak?',1,0,NULL,NULL,'127.0.0.1','2014-10-20 06:17:16','2014-10-20 06:17:16',NULL,NULL),(5,'Time Mesin uang','time_uang.jpg','green1-style.css','<p>Pernah gak kalian dengar ato liat orang yang komplain ‘Ah, saya udah coba semua cara untuk hilangin jerawat tapi gak ada yang berhasil’ atau ‘Semua ini dusta…’ </p><p> Saya sempat heran karena ada orang-orang yang berhasil dengan mencoba cara tertentu, tapi kenapa ada orang lain yang gak berhasil sama sekali?  </p>Dari interview saya dengan beberapa dokter spesialis kencantikan, ternyata terlepas dari cara apapun yang kita pilih untuk menghilangkan jerawat, ada beberapa  hal dasar yang WAJIB Anda ketahui :      Bersihkan wajah di pagi dan malam hari secara konsisten     Kurangi makan makanan berminyak (This is your biggest enemy!)     Jangan memencet jerawat (hal ini bisa menyebabkan bekas jerawat dan noda hitam)     Jangan berada di bawah matahari terus menerus  So searang jelas kan, kalo kamu males bersihin muka, terlepas dari berapa seringnya kamu pergi facial atau pakai krim ini itu, jerawat kamu masih nongol terus.  Sama juga, kalo kamu makan gorengan terus ya pasti jerawat donk! Hayo, mau cantik ato makan enak?',1,0,NULL,NULL,'127.0.0.1','2014-10-20 06:17:16','2014-10-20 06:17:16',NULL,NULL);
/*!40000 ALTER TABLE `landing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `landing_type`
--

DROP TABLE IF EXISTS `landing_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `landing_type` (
  `id` bigint(20) NOT NULL,
  `ld_title` char(40) DEFAULT NULL,
  `ld_act` int(11) DEFAULT '0',
  `createdt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `createnm` varchar(30) NOT NULL,
  `updatenm` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `landing_type`
--

LOCK TABLES `landing_type` WRITE;
/*!40000 ALTER TABLE `landing_type` DISABLE KEYS */;
INSERT INTO `landing_type` VALUES (1,'jerawat',0,'2014-10-20 06:19:44','2014-10-20 06:19:44','SAHID','SAHID'),(2,'Awet Muda',0,'2014-10-20 06:19:44','2014-10-20 06:19:44','SAHID','SAHID'),(3,'Menurunkan Berat Badan',0,'2014-11-04 10:07:48','2014-11-04 10:07:48','CREATOR','CREATOR'),(5,'Awet Muda Sekali lagi',0,'2014-11-04 10:47:53','2014-11-04 10:51:09','CREATOR','CREATOR'),(6,'Jantung Sehat Sekali',0,'2014-11-04 10:53:24','2014-11-04 10:53:39','CREATOR','CREATOR');
/*!40000 ALTER TABLE `landing_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mailist`
--

DROP TABLE IF EXISTS `mailist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mailist` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `uid` varchar(50) DEFAULT NULL,
  `name` char(40) NOT NULL,
  `email` char(80) NOT NULL,
  `replyto` varchar(50) DEFAULT NULL,
  `ld_type` int(11) NOT NULL,
  `runno` bigint(20) DEFAULT '0',
  `runregno` int(11) DEFAULT NULL,
  `act` int(11) DEFAULT '0',
  `ip_address` varchar(20) DEFAULT NULL,
  `subscribedt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `unsubscribedt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `failuresdt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `createdt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `registered` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mailist`
--

LOCK TABLES `mailist` WRITE;
/*!40000 ALTER TABLE `mailist` DISABLE KEYS */;
INSERT INTO `mailist` VALUES (1,'OtLG24w4zI','Udin Kadung','marmudin@gmail.com',NULL,1,0,NULL,0,'127.0.0.1','2015-01-26 06:46:31','0000-00-00 00:00:00','0000-00-00 00:00:00','2015-01-26 06:46:31',0),(2,'qAWz7hbctz','Gombloh','gombloh@gmail.com',NULL,1,0,NULL,0,'127.0.0.1','2015-01-26 12:02:49','0000-00-00 00:00:00','0000-00-00 00:00:00','2015-01-26 12:02:49',0),(3,'ELhqTtYCkl','Rasputin','rasput@gmail.com',NULL,1,0,NULL,0,'127.0.0.1','2015-02-18 05:39:15','0000-00-00 00:00:00','0000-00-00 00:00:00','2015-02-18 05:39:15',0),(4,'uoTJN82TkC','Rasbootie','rasbut@gmail.com',NULL,1,0,NULL,0,'127.0.0.1','2015-02-18 06:11:10','0000-00-00 00:00:00','0000-00-00 00:00:00','2015-02-18 06:11:10',0),(5,'OPrT163wFo','Mas Kornah','gmas@gmail.com',NULL,1,0,NULL,0,'127.0.0.1','2015-02-18 06:15:53','0000-00-00 00:00:00','0000-00-00 00:00:00','2015-02-18 06:15:53',0),(6,'f5dPe03L9B','Rombooter','rompie@gmail.com',NULL,1,0,NULL,0,'127.0.0.1','2015-02-18 06:46:42','0000-00-00 00:00:00','0000-00-00 00:00:00','2015-02-18 06:46:42',0);
/*!40000 ALTER TABLE `mailist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` char(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `category` char(10) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'Mengeset Landing Page','/landing/set_default','SD','Untuk Pengaturan Landing Page'),(2,'Daftar Landing Page','/landing/list_art','SD','Daftar dari Landing Page'),(4,'Bank Artikel','/contributor/bank_list','SD','Daftar dari Bank Artikel'),(5,'Afiliasi','/afiliasi','SD','Mendaftarkan Afiliasi'),(6,'Mengset Parameter','/landing/setup','PA','Parameter Domain'),(7,'FTP Parameter','/landing/ftp_setup','PA','Parameter FTP'),(8,'Membuat User','/contributor/account','PA','Create user Login'),(9,'Aktifasi Registered Member','/mailist_members','SD','Approve member yang telah terdaftar');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `param`
--

DROP TABLE IF EXISTS `param`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `param` (
  `id` bigint(20) NOT NULL,
  `name` varchar(220) DEFAULT NULL,
  `email` char(120) DEFAULT NULL,
  `pinbb` char(8) DEFAULT NULL,
  `phone` char(16) DEFAULT NULL,
  `mailist_email` char(120) DEFAULT NULL,
  `smtp_host` char(120) DEFAULT NULL,
  `smtp_pwd` char(120) DEFAULT NULL,
  `smtp_port` char(120) DEFAULT NULL,
  `fb` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `ip_address` varchar(20) NOT NULL,
  `createdt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `owner` varchar(210) DEFAULT NULL,
  `greet` longtext,
  `privatekey` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `param`
--

LOCK TABLES `param` WRITE;
/*!40000 ALTER TABLE `param` DISABLE KEYS */;
INSERT INTO `param` VALUES (1,'Rahasia Hebat','sahid@k-link.co.id','9hc33z','08561155880','info@k-link.co.id','mail.k-link.co.id','125219','26','www.facebook.com/tulus','@putuputrayasa','127.0.0.1','2014-12-29 09:00:27','Putu Putra Yasa','<p>Selamat datang di newsletter ini, salam dari kami anak indonesia</p>','OnNOY9ixfCqlX2PWHZa9n3laDx5ir0g9');
/*!40000 ALTER TABLE `param` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `grp_article`
--

/*!50001 DROP TABLE IF EXISTS `grp_article`*/;
/*!50001 DROP VIEW IF EXISTS `grp_article`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = latin1 */;
/*!50001 SET character_set_results     = latin1 */;
/*!50001 SET collation_connection      = latin1_swedish_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `grp_article` AS select `u2442_indklink`.`bank_article`.`ld_title` AS `ld_title`,`u2442_indklink`.`bank_article`.`ld_content` AS `ld_content`,`u2442_indklink`.`bank_article`.`shorturl` AS `shorturl`,`u2442_indklink`.`bank_article`.`ip_address` AS `ip_address`,`u2442_indklink`.`bank_article`.`createdt` AS `createdt`,`u2442_indklink`.`bank_article`.`createnm` AS `createnm`,`u2442_indklink`.`landing_type`.`ld_title` AS `ld_type` from (`u2442_indklink`.`bank_article` left join `u2442_indklink`.`landing_type` on((`u2442_indklink`.`landing_type`.`id` = `u2442_indklink`.`bank_article`.`ld_type`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-06 16:21:53
