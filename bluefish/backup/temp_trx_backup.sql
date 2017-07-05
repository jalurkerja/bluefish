-- MySQL dump 10.13  Distrib 5.5.22, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: bluefish
-- ------------------------------------------------------
-- Server version	5.5.22-0ubuntu1

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
-- Table structure for table `trx_backup`
--

DROP TABLE IF EXISTS `trx_backup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trx_backup` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `updateby` varchar(20) NOT NULL,
  `updatedate` datetime NOT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=345 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trx_backup`
--

LOCK TABLES `trx_backup` WRITE;
/*!40000 ALTER TABLE `trx_backup` DISABLE KEYS */;
INSERT INTO `trx_backup` VALUES (8,'NULL','805007520111026110210.sql','superuser','2011-10-26 11:01:51','2011-10-26 04:01:51'),(9,'STORE POINT 20111124','378913920111124090536.sql','superuser','2011-11-24 21:05:37','2011-11-24 14:05:37'),(10,'STORE POINT 20111124 II','394117920111124111358.sql','superuser','2011-11-24 23:13:58','2011-11-24 16:13:58'),(11,'20111130','531750920111130074139.sql','superuser','2011-11-30 19:41:40','2011-11-30 12:41:40'),(12,'PELATIHAN 20111130','240747720111130085427.sql','superuser','2011-11-30 20:54:27','2011-11-30 13:54:27'),(13,'Mrs Iola','627652920111130095804.sql','superuser','2011-11-30 21:58:04','2011-11-30 14:58:04'),(14,'Master Barang','213784520111207091308.sql','lestari','2011-12-07 09:13:08','2011-12-07 02:13:08'),(15,'Stock Kontrol','263332820111207050522.sql','lestari','2011-12-07 17:05:22','2011-12-07 10:05:22'),(16,'Keuangan081211','023199320111208073821.sql','lestari','2011-12-08 19:38:21','2011-12-08 12:38:21'),(17,'Stock Brg 6/12/11','016350220111219084018.sql','lestari','2011-12-19 08:40:18','2011-12-19 01:40:18'),(18,'Master barang ME','995219020111219074527.sql','weweng','2011-12-19 19:45:27','2011-12-19 12:45:27'),(19,'master brg ME(2)','146110020111220082732.sql','','2011-12-20 20:27:32','2011-12-20 13:27:32'),(20,'warih','684190620111221031329.sql','superuser','2011-12-21 15:13:29','2011-12-21 08:13:29'),(21,'test sinkronasi kupang','799317120130328035718.sql','superuser','2013-03-28 15:57:19','2013-03-28 08:57:19'),(22,'Eka23/12/11','753795520111223031713.sql','','2011-12-23 15:17:13','2011-12-23 08:17:13'),(23,'Billing Lestari30/12/11','009934920111230042747.sql','lestari','2011-12-30 16:27:47','2011-12-30 09:27:47'),(24,'20120102_1024','033360320120102102400.sql','superuser','2012-01-02 10:24:01','2012-01-02 03:24:01'),(25,'20120102_1309','270933320120102010859.sql','superuser','2012-01-02 13:08:59','2012-01-02 06:08:59'),(26,'RESET BILLING ','417108520120102011056.sql','superuser','2012-01-02 13:10:56','2012-01-02 06:10:56'),(27,'RESET BILLING N REUPDATE BOOKING','934461920120102011117.sql','superuser','2012-01-02 13:11:17','2012-01-02 06:11:17'),(28,'Lestari 15/1/12','790172920120115124609.sql','','2012-01-15 12:46:09','2012-01-15 05:46:09'),(29,'Lestari Jurnal 18/1/12','339145720120118095400.sql','lestari','2012-01-18 09:54:00','2012-01-18 02:54:00'),(30,'Lestari Jurnal  19/1/12','800580520120119045116.sql','lestari','2012-01-19 16:51:16','2012-01-19 09:51:16'),(31,'20120120_1258','410932120120120125732.sql','superuser','2012-01-20 12:57:32','2012-01-20 05:57:32'),(32,'Bill Tamu 21/1/12','639599620120121061313.sql','lestari','2012-01-21 18:13:13','2012-01-21 11:13:13'),(33,'Billing Mr Rezal','148371420120123113340.sql','lestari','2012-01-23 11:33:40','2012-01-23 04:33:40'),(34,'20120124_0851','707297520120124085338.sql','superuser','2012-01-24 08:53:38','2012-01-24 01:53:38'),(35,'20120125_1056_jurnal 2011 mau dihapus','379420720120125105852.sql','superuser','2012-01-25 10:58:52','2012-01-25 03:58:52'),(36,'20120125_1108_jurnal 2011 terhapus','800098020120125111058.sql','superuser','2012-01-25 11:10:58','2012-01-25 04:10:58'),(37,'20120125_1117_jrnal 1 sampai 7 januari terhapus','714773520120125111908.sql','superuser','2012-01-25 11:19:08','2012-01-25 04:19:08'),(38,'20120125_1117_jurnal 1 sampai 7 januari terhapus','194267320120125112103.sql','superuser','2012-01-25 11:21:03','2012-01-25 04:21:03'),(39,'persiapan_empty_jurnal','548832720120206082959.sql','superuser','2012-02-06 08:29:59','2012-02-06 01:29:59'),(40,'jurnal_2012_terhapus','594716620120206084821.sql','superuser','2012-02-06 08:48:22','2012-02-06 01:48:22'),(41,'menu_upload_kas','398287920120206085550.sql','superuser','2012-02-06 08:55:50','2012-02-06 01:55:50'),(42,'lestari7/2/12','554244520120207124807.sql','lestari','2012-02-07 12:48:07','2012-02-07 05:48:07'),(43,'20120214_1041','735760320120214104250.sql','superuser','2012-02-14 10:42:50','2012-02-14 03:42:50'),(44,'20120215_1000','211264820120215100214.sql','superuser','2012-02-15 10:02:14','2012-02-15 03:02:14'),(45,'Billing_20120217','976854420120217084914.sql','lestari','2012-02-17 08:49:14','2012-02-17 01:49:14'),(46,'20120217_1048','545998220120217105011.sql','','2012-02-17 10:50:12','2012-02-17 03:50:12'),(47,'20120217_1107_setelah_melakukan_billing_pari5','584448520120217110908.sql','','2012-02-17 11:09:08','2012-02-17 04:09:08'),(48,'Maintenance_sebelum_billing','365423720120217112404.sql','superuser','2012-02-17 11:24:04','2012-02-17 04:24:04'),(49,'Restaurant Walk in','526590320120217122704.sql','lestari','2012-02-17 12:27:04','2012-02-17 05:27:04'),(50,'Master_20120217','652568320120217051606.sql','lestari','2012-02-17 17:16:06','2012-02-17 10:16:06'),(51,'Master_weweng','982596120120217092532.sql','lestari','2012-02-17 21:25:32','2012-02-17 14:25:32'),(52,'20120220_0922','513684320120220092357.sql','superuser','2012-02-20 09:23:57','2012-02-20 02:23:57'),(53,'20120220_0944','874083020120220094528.sql','superuser','2012-02-20 09:45:28','2012-02-20 02:45:28'),(54,'20120220_1004','077434120120220100610.sql','superuser','2012-02-20 10:06:10','2012-02-20 03:06:10'),(55,'20120220_1016_setelah_stokopname','615207620120220101823.sql','superuser','2012-02-20 10:18:23','2012-02-20 03:18:23'),(56,'stock uploded','075373020120220103139.sql','superuser','2012-02-20 10:31:39','2012-02-20 03:31:39'),(57,'Maintenance Start','577142520120220122515.sql','superuser','2012-02-20 12:25:15','2012-02-20 05:25:15'),(58,'Maintenance step 1','380749920120220020637.sql','superuser','2012-02-20 14:06:37','2012-02-20 07:06:37'),(59,'Maintenance step 2','090643120120220021945.sql','superuser','2012-02-20 14:19:45','2012-02-20 07:19:45'),(60,'Maintenance step 2.5','573506020120220022423.sql','superuser','2012-02-20 14:24:24','2012-02-20 07:24:24'),(61,'Maintenance step 3','970671120120220032617.sql','superuser','2012-02-20 15:26:17','2012-02-20 08:26:17'),(62,'Maintenance step 3.5','985999420120220034929.sql','superuser','2012-02-20 15:49:29','2012-02-20 08:49:29'),(63,'Maintenance End','143418120120220042739.sql','superuser','2012-02-20 16:27:39','2012-02-20 09:27:39'),(64,'Jurnal_20120222','190150320120222103735.sql','lestari','2012-02-22 10:37:35','2012-02-22 03:37:35'),(65,'Maintenance Start 20120222','788504220120222011458.sql','','2012-02-22 13:14:58','2012-02-22 06:14:58'),(66,'Laporan_20120224','624637720120225100855.sql','lestari','2012-02-25 10:08:55','2012-02-25 03:08:55'),(67,'Jurnal_alfamidi','178924420120225103955.sql','lestari','2012-02-25 10:39:56','2012-02-25 03:39:56'),(68,'Maintenance Start 20120227','799987420120227113758.sql','superuser','2012-02-27 11:37:58','2012-02-27 04:37:58'),(69,'Maintenance Start 20120228','596970320120228093857.sql','superuser','2012-02-28 09:38:57','2012-02-28 02:38:57'),(70,'20120229_0940','309321120120229094154.sql','superuser','2012-02-29 21:41:54','2012-02-29 14:41:54'),(71,'20120301_1034','547156220120301103527.sql','superuser','2012-03-01 10:35:28','2012-03-01 03:35:28'),(72,'20120301_1143','328405320120301114423.sql','superuser','2012-03-01 11:44:24','2012-03-01 04:44:24'),(73,'20120303_1128','965401020120303112915.sql','','2012-03-03 11:29:15','2012-03-03 04:29:15'),(74,'20120304-1119','831703620120304112002.sql','lestari','2012-03-04 11:20:02','2012-03-04 04:20:02'),(75,'20120304_2124','587551120120304092452.sql','','2012-03-04 21:24:52','2012-03-04 14:24:52'),(76,'20120305_1115','355236820120305111648.sql','','2012-03-05 11:16:48','2012-03-05 04:16:48'),(77,'20120307_0916','451028820120307091747.sql','superuser','2012-03-07 09:17:47','2012-03-07 02:17:47'),(78,'20120307_1645','504232920120307044653.sql','superuser','2012-03-07 16:46:54','2012-03-07 09:46:54'),(79,'20120309_1043_start_maintenance','548483320120309104430.sql','superuser','2012-03-09 10:44:30','2012-03-09 03:44:30'),(80,'20120309_maintenance_step1','273098720120309105903.sql','superuser','2012-03-09 10:59:03','2012-03-09 03:59:03'),(81,'20120309_maintenance_end','373875920120309112036.sql','superuser','2012-03-09 11:20:36','2012-03-09 04:20:36'),(82,'20120310_1211','999719020120310121150.sql','lestari','2012-03-10 12:11:50','2012-03-10 05:11:50'),(83,'20120316','041015320120316091326.sql','lestari','2012-03-16 09:13:26','2012-03-16 02:13:26'),(84,'backup 20120319','878689420120319031228.sql','','2012-03-19 15:12:28','2012-03-19 08:12:28'),(85,'20120320_0931','467064820120320093147.sql','superuser','2012-03-20 09:31:47','2012-03-20 02:31:47'),(86,'20120323_1015','914271720120323101639.sql','lestari','2012-03-23 10:16:39','2012-03-23 03:16:39'),(87,'20120324_1110','277200420120324111107.sql','lestari','2012-03-24 11:11:07','2012-03-24 04:11:07'),(88,'20120325_1653','019856120120325045418.sql','lestari','2012-03-25 16:54:18','2012-03-25 09:54:18'),(89,'20120326_0834','045885620120326083554.sql','lestari','2012-03-26 08:35:54','2012-03-26 01:35:54'),(90,'maintenance_20120326','366138420120326093247.sql','superuser','2012-03-26 09:32:47','2012-03-26 02:32:47'),(91,'Billing_1012','133974120120326101306.sql','lestari','2012-03-26 10:13:06','2012-03-26 03:13:06'),(92,'maintenance_20120326','976243820120326103434.sql','superuser','2012-03-26 10:34:34','2012-03-26 03:34:34'),(93,'20120327_0854','166558720120327085530.sql','superuser','2012-03-27 08:55:30','2012-03-27 01:55:30'),(94,'20120329_0752','578657820120329075318.sql','lestari','2012-03-29 07:53:19','2012-03-29 00:53:19'),(95,'20120402_0803','160733620120402080431.sql','superuser','2012-04-02 08:04:32','2012-04-02 01:04:32'),(96,'20120402_1018','453592820120402101915.sql','superuser','2012-04-02 10:19:15','2012-04-02 03:19:15'),(97,'20120507_0913','307246820120507091443.sql','superuser','2012-05-07 09:14:47','2012-05-07 02:14:47'),(98,'20120511_0908','077877620120511090920.sql','lestari','2012-05-11 09:09:21','2012-05-11 02:09:21'),(99,'20120513_0841','888630020120513084227.sql','lestari','2012-05-13 08:42:27','2012-05-13 01:42:27'),(100,'20120514_0938','238138420120514093941.sql','lestari','2012-05-14 09:39:41','2012-05-14 02:39:41'),(101,'20120517_1537','087854620120517034114.sql','lestari','2012-05-17 15:41:14','2012-05-17 08:41:14'),(102,'20120517_2330','591346520120517113402.sql','lestari','2012-05-17 23:34:02','2012-05-17 16:34:02'),(103,'20120518_2323','077609320120518112646.sql','lestari','2012-05-18 23:26:47','2012-05-18 16:26:47'),(104,'20120519_0719','171809820120519072307.sql','lestari','2012-05-19 07:23:07','2012-05-19 00:23:07'),(105,'20120520_0851','324776820120520085413.sql','lestari','2012-05-20 08:54:14','2012-05-20 01:54:14'),(106,'20120520_2123','628829420120520092649.sql','lestari','2012-05-20 21:26:50','2012-05-20 14:26:50'),(107,'20120521_0840','104071420120521084357.sql','superuser','2012-05-21 08:43:58','2012-05-21 01:43:58'),(108,'20120521_0908','596269620120521091200.sql','lestari','2012-05-21 09:12:00','2012-05-21 02:12:00'),(109,'20120522_0905','728828420120522090823.sql','lestari','2012-05-22 09:08:23','2012-05-22 02:08:23'),(110,'20120522_1733','376981820120522053609.sql','lestari','2012-05-22 17:36:09','2012-05-22 10:36:09'),(111,'20120523_0724','277606820120523072729.sql','lestari','2012-05-23 07:27:29','2012-05-23 00:27:29'),(112,'20120524_0853','548128520120524085622.sql','lestari','2012-05-24 08:56:23','2012-05-24 01:56:23'),(113,'20120525_0759','142206820120525080242.sql','lestari','2012-05-25 08:02:43','2012-05-25 01:02:43'),(114,'Daily','066532920120525011143.sql','superuser','2012-05-25 13:11:44','2012-05-25 06:11:44'),(115,'Fitur Harga Barang Toko','538273220120525025716.sql','superuser','2012-05-25 14:57:17','2012-05-25 07:57:17'),(116,'20120526_2006','454846920120526080946.sql','lestari','2012-05-26 20:09:46','2012-05-26 13:09:46'),(117,'20120526_2332','446241620120526113521.sql','lestari','2012-05-26 23:35:22','2012-05-26 16:35:22'),(118,'20120527_0853','409272120120527085701.sql','lestari','2012-05-27 08:57:02','2012-05-27 01:57:02'),(119,'20120626_1640','018006120120616044311.sql','lestari','2012-06-16 16:43:12','2012-06-16 09:43:12'),(120,'20120616_1702','964114820120616050513.sql','lestari','2012-06-16 17:05:13','2012-06-16 10:05:13'),(121,'20120616_1808','996629020120616061106.sql','lestari','2012-06-16 18:11:06','2012-06-16 11:11:06'),(122,'20120616_0922','343192620120617092426.sql','lestari','2012-06-17 09:24:27','2012-06-17 02:24:27'),(123,'20120618_1043','457752420120618104546.sql','lestari','2012-06-18 10:45:47','2012-06-18 03:45:47'),(124,'20120618_2231','501538120120618103339.sql','lestari','2012-06-18 22:33:39','2012-06-18 15:33:39'),(125,'20120619_2122','540830420120619092421.sql','lestari','2012-06-19 21:24:22','2012-06-19 14:24:22'),(126,'20120621_1438','383036620120621024026.sql','lestari','2012-06-21 14:40:27','2012-06-21 07:40:27'),(127,'20120622_1734','312584620120622053715.sql','lestari','2012-06-22 17:37:16','2012-06-22 10:37:16'),(128,'210120622_2342','856218720120622114435.sql','lestari','2012-06-22 23:44:35','2012-06-22 16:44:35'),(129,'20120623_1404','283963120120623020617.sql','lestari','2012-06-23 14:06:18','2012-06-23 07:06:18'),(130,'20120623_1952','943118220120623075458.sql','lestari','2012-06-23 19:54:58','2012-06-23 12:54:58'),(131,'20120623_2251','763772720120623105336.sql','lestari','2012-06-23 22:53:36','2012-06-23 15:53:36'),(132,'20120623_1957','849818320120624075959.sql','lestari','2012-06-24 19:59:59','2012-06-24 12:59:59'),(133,'20120624_0927','671582720120625092922.sql','lestari','2012-06-25 09:29:22','2012-06-25 02:29:22'),(134,'20120629_2059','780723620120629090122.sql','lestari','2012-06-29 21:01:22','2012-06-29 14:01:22'),(135,'20120630_1631','959343120120630043339.sql','lestari','2012-06-30 16:33:40','2012-06-30 09:33:40'),(136,'20120701_2023','485208520120701082518.sql','lestari','2012-07-01 20:25:18','2012-07-01 13:25:18'),(137,'20120703_1816','988827120120703061800.sql','lestari','2012-07-03 18:18:00','2012-07-03 11:18:00'),(138,'20120706_1814','775752920120706061619.sql','lestari','2012-07-06 18:16:20','2012-07-06 11:16:20'),(139,'20120707_2315','423116920120707111753.sql','lestari','2012-07-07 23:17:54','2012-07-07 16:17:54'),(140,'20120708_2157','035738320120708095910.sql','lestari','2012-07-08 21:59:10','2012-07-08 14:59:10'),(141,'20120709_2009','413392020120709081134.sql','lestari','2012-07-09 20:11:34','2012-07-09 13:11:34'),(142,'20120710_2257','501875520120710105942.sql','lestari','2012-07-10 22:59:42','2012-07-10 15:59:42'),(143,'20120713_2103','045122120120713090527.sql','lestari','2012-07-13 21:05:28','2012-07-13 14:05:28'),(144,'20120714_1314','672899620120714011621.sql','lestari','2012-07-14 13:16:22','2012-07-14 06:16:22'),(145,'20120714_2228','693296720120714102945.sql','lestari','2012-07-14 22:29:46','2012-07-14 15:29:46'),(146,'maintenance','960574720120724091444.sql','superuser','2012-07-24 09:14:45','2012-07-24 02:14:45'),(147,'20120725_1911','205542320120725071643.sql','lestari','2012-07-25 19:16:44','2012-07-25 12:16:44'),(148,'20120727_1605','746081520120727041229.sql','lestari','2012-07-27 16:12:30','2012-07-27 09:12:30'),(149,'20120811_2210','545622120120811101720.sql','lestari','2012-08-11 22:17:20','2012-08-11 15:17:20'),(150,'20120815_1100','355416820120815110816.sql','lestari','2012-08-15 11:08:17','2012-08-15 04:08:17'),(151,'20120818_2150','913738820120818095752.sql','lestari','2012-08-18 21:57:53','2012-08-18 14:57:53'),(152,'20120819_2320','355985820120819112807.sql','lestari','2012-08-19 23:28:08','2012-08-19 16:28:08'),(153,'29120820_1705','511084220120820051218.sql','lestari','2012-08-20 17:12:18','2012-08-20 10:12:18'),(154,'20120820_0105','416286220120821011226.sql','lestari','2012-08-21 01:12:27','2012-08-20 18:12:27'),(155,'20120822_0036','013921520120822124310.sql','lestari','2012-08-22 00:43:10','2012-08-21 17:43:10'),(156,'20120822_1800','853119020120822060720.sql','lestari','2012-08-22 18:07:20','2012-08-22 11:07:20'),(157,'20120823_0044','778016220120823125207.sql','lestari','2012-08-23 00:52:07','2012-08-22 17:52:07'),(158,'20120823_2252','307750420120823105948.sql','lestari','2012-08-23 22:59:48','2012-08-23 15:59:48'),(159,'20120824_2247','932534720120824105501.sql','lestari','2012-08-24 22:55:02','2012-08-24 15:55:02'),(160,'daily','011935020120826093202.sql','superuser','2012-08-26 09:32:03','2012-08-26 02:32:03'),(161,'20120826_1323','563967820120826013156.sql','lestari','2012-08-26 13:31:56','2012-08-26 06:31:56'),(162,'daily','147361920120826014248.sql','superuser','2012-08-26 13:42:48','2012-08-26 06:42:48'),(163,'20120826_1323','834770220120826080800.sql','','2012-08-26 20:08:00','2012-08-26 13:08:00'),(164,'20120827_0326','894847220120827033443.sql','','2012-08-27 03:34:44','2012-08-26 20:34:44'),(165,'20120827_2348','468098620120827115600.sql','lestari','2012-08-27 23:56:00','2012-08-27 16:56:00'),(166,'daily','210267220120828043611.sql','superuser','2012-08-28 16:36:11','2012-08-28 09:36:11'),(167,'daily','602012320120903023405.sql','superuser','2012-09-03 14:34:06','2012-09-03 07:34:06'),(168,'daily','290519520120912102853.sql','superuser','2012-09-12 22:28:54','2012-09-12 15:28:54'),(169,'daily','784342420120912103428.sql','superuser','2012-09-12 22:34:28','2012-09-12 15:34:28'),(170,'New Release','925078620120913093205.sql','superuser','2012-09-13 14:32:05','2012-09-13 07:32:05'),(171,'New Relesae','890309620120913093303.sql','superuser','2012-09-13 14:33:13','2012-09-13 07:33:13'),(172,'20120914_1016','501529320120914051618.sql','lestari','2012-09-14 10:16:33','2012-09-14 03:16:33'),(173,'20120917_1020','833832720120917052055.sql','lestari','2012-09-17 10:21:08','2012-09-17 03:21:08'),(174,'backup','114354820120917111745.sql','superuser','2012-09-17 16:17:59','2012-09-17 09:17:59'),(175,'20120918_1329','990426320120918082918.sql','lestari','2012-09-18 13:29:31','2012-09-18 06:29:31'),(176,'20120923_0617','845599520120923011756.sql','lestari','2012-09-23 06:18:14','2012-09-22 23:18:14'),(177,'20120924_0844','285102720120924034444.sql','lestari','2012-09-24 08:44:57','2012-09-24 01:44:57'),(178,'20120925_0834','581718720120925033438.sql','lestari','2012-09-25 08:34:54','2012-09-25 01:34:54'),(179,'maintenance','152581620120925040025.sql','lestari','2012-09-25 09:00:37','2012-09-25 02:00:37'),(180,'20120926_1651','214303320120926115147.sql','lestari','2012-09-26 16:51:59','2012-09-26 09:51:59'),(181,'transfer server','511580220120927114333.sql','superuser','2012-09-27 11:43:33','2012-09-27 04:43:33'),(182,'20120929_2159','161907820120929100710.sql','lestari','2012-09-29 22:07:11','2012-09-29 15:07:11'),(183,'20120930_1525','587455320120930033348.sql','lestari','2012-09-30 15:33:48','2012-09-30 08:33:48'),(184,'maintenance','355603420121001045305.sql','superuser','2012-10-01 16:53:06','2012-10-01 09:53:06'),(185,'Daily backup','493334020121003090656.sql','superuser','2012-10-03 09:06:57','2012-10-03 02:06:57'),(186,'maintenance','691726320121003033759.sql','superuser','2012-10-03 15:37:59','2012-10-03 08:37:59'),(187,'backup daily','220959120121003045507.sql','superuser','2012-10-03 16:55:07','2012-10-03 09:55:07'),(188,'backup daily','113481520121005125717.sql','superuser','2012-10-05 12:57:18','2012-10-05 05:57:18'),(189,'20121010','162537820121010085210.sql','superuser','2012-10-10 08:52:11','2012-10-10 01:52:11'),(190,'maintenance','945369720121011092256.sql','superuser','2012-10-11 21:22:56','2012-10-11 14:22:56'),(191,'backup_20121015','830697720121015092751.sql','superuser','2012-10-15 09:27:52','2012-10-15 02:27:52'),(192,'backup_20121015','807896120121015093049.sql','superuser','2012-10-15 09:30:49','2012-10-15 02:30:49'),(193,'2012001016_0716','137306020121016072411.sql','lestari','2012-10-16 07:24:12','2012-10-16 00:24:12'),(194,'backup_20121018','168587020121018083544.sql','superuser','2012-10-18 08:35:45','2012-10-18 01:35:45'),(195,'20121020_1138','062108720121020114618.sql','lestari','2012-10-20 11:46:19','2012-10-20 04:46:19'),(196,'daily','773859820121020122800.sql','superuser','2012-10-20 12:28:00','2012-10-20 05:28:00'),(197,'20121020_2054','190232920121020090251.sql','lestari','2012-10-20 21:02:52','2012-10-20 14:02:52'),(198,'backup 25102012','957357520121025092829.sql','superuser','2012-10-25 09:28:40','2012-10-25 02:28:40'),(199,'20121026_2312','403475720121026112009.sql','lestari','2012-10-26 23:20:10','2012-10-26 16:20:10'),(200,'20121027_2319','970128220121027112647.sql','lestari','2012-10-27 23:26:56','2012-10-27 16:26:56'),(201,'20121028_0035','173363420121028124317.sql','lestari','2012-10-28 00:43:26','2012-10-27 17:43:26'),(202,'20121029_1000','940953820121029100723.sql','','2012-10-29 10:07:35','2012-10-29 03:07:35'),(203,'backup 29102012','143849820121029104223.sql','superuser','2012-10-29 10:42:29','2012-10-29 03:42:29'),(1,'demo','726917120121107124315.sql','admin','2012-11-07 12:43:15','2012-11-07 05:43:15'),(204,'20121108_1000','771409320121108100456.sql','lestari','2012-11-08 10:04:57','2012-11-08 03:04:57'),(205,'20121111_1850','297642820121111065638.sql','lestari','2012-11-11 18:56:39','2012-11-11 11:56:39'),(2,'backup','707570820121112084208.sql','superuser','2012-11-12 20:42:08','2012-11-12 13:42:08'),(206,'201211115_2215','019180020121115102312.sql','lestari','2012-11-15 22:23:20','2012-11-15 15:23:20'),(207,'20121116_0900','548828820121116091316.sql','weweng','2012-11-16 09:13:24','2012-11-16 02:13:24'),(208,'20121116_0900','559830020121116091324.sql','weweng','2012-11-16 09:13:25','2012-11-16 02:13:25'),(209,'20121117_2245','328768620121117105252.sql','lestari','2012-11-17 22:52:53','2012-11-17 15:52:53'),(210,'20121120_1813','453862120121120062037.sql','lestari','2012-11-20 18:20:46','2012-11-20 11:20:46'),(211,'20121122_1058','658160820121122110517.sql','lestari','2012-11-22 11:05:26','2012-11-22 04:05:26'),(212,'backup_26112012_1458','590249120121126030608.sql','superuser','2012-11-26 15:06:19','2012-11-26 08:06:19'),(213,'20121126_1625','713226120121126043217.sql','','2012-11-26 16:32:26','2012-11-26 09:32:26'),(214,'backup_20121128_0716','298535120121128072325.sql','superuser','2012-11-28 07:23:33','2012-11-28 00:23:33'),(215,'Backup_20121204_1041','303285920121204104814.sql','superuser','2012-12-04 10:48:25','2012-12-04 03:48:25'),(216,'20121205)1749','259187920121205055629.sql','lestari','2012-12-05 17:56:45','2012-12-05 10:56:45'),(217,'20121205_1749','936386420121205055646.sql','lestari','2012-12-05 17:56:48','2012-12-05 10:56:48'),(218,'20121207_2346','957612120121207115331.sql','lestari','2012-12-07 23:54:14','2012-12-07 16:54:14'),(219,'20121207_2346','326496420121207115415.sql','lestari','2012-12-07 23:54:15','2012-12-07 16:54:15'),(220,'backup_20121210_1147','393823920121210115545.sql','superuser','2012-12-10 11:55:46','2012-12-10 04:55:46'),(221,'backup_20121211','046442820121211090319.sql','superuser','2012-12-11 09:03:20','2012-12-11 02:03:20'),(222,'daily','312788320121214091304.sql','superuser','2012-12-14 09:13:05','2012-12-14 02:13:05'),(223,'daily','744867120121214043901.sql','superuser','2012-12-14 16:39:02','2012-12-14 09:39:02'),(224,'20121214_2036','956995920121214084522.sql','lestari','2012-12-14 20:45:23','2012-12-14 13:45:23'),(225,'daily','461203020121217085231.sql','superuser','2012-12-17 08:52:32','2012-12-17 01:52:32'),(226,'20121222_2121','699956620121222093002.sql','lestari','2012-12-22 21:30:03','2012-12-22 14:30:03'),(227,'20121224_0033','114960520121224124244.sql','lestari','2012-12-24 00:42:45','2012-12-23 17:42:45'),(228,'20130102_0122','707299520130102013057.sql','lestari','2013-01-02 01:31:06','2013-01-01 18:31:06'),(229,'Daily','612348420130102102114.sql','superuser','2013-01-02 10:21:15','2013-01-02 03:21:15'),(230,'maintenance','933047620130118031055.sql','superuser','2013-01-18 15:10:59','2013-01-18 08:10:59'),(231,'backup 20130121','531496220130121093113.sql','superuser','2013-01-21 09:31:14','2013-01-21 02:31:14'),(232,'20130121_1147','982282720130121115819.sql','lestari','2013-01-21 11:58:20','2013-01-21 04:58:20'),(233,'backup_20130128','715354520130128110802.sql','superuser','2013-01-28 11:08:03','2013-01-28 04:08:03'),(234,'backup_20130205','064472520130205101903.sql','superuser','2013-02-05 10:19:03','2013-02-05 03:19:03'),(235,'backup_20130206_1425','664000920130206023630.sql','superuser','2013-02-06 14:36:31','2013-02-06 07:36:31'),(236,'backup maintenace','880772620130212102433.sql','superuser','2013-02-12 10:24:33','2013-02-12 03:24:33'),(237,'20130218_1450','108239320130218030203.sql','lestari','2013-02-18 15:02:04','2013-02-18 08:02:04'),(238,'20120221_1156','880523220130221120157.sql','lestari','2013-02-21 12:01:58','2013-02-21 05:01:58'),(239,'MAintenance','649324320130228113544.sql','superuser','2013-02-28 11:35:44','2013-02-28 04:35:44'),(240,'20130228_1206','007374420130228121742.sql','lestari','2013-02-28 12:17:42','2013-02-28 05:17:42'),(241,'20130302_1025','832965720130302102643.sql','lestari','2013-03-02 10:26:43','2013-03-02 03:26:43'),(242,'maintenance','735944620130320105127.sql','superuser','2013-03-20 10:51:28','2013-03-20 03:51:28'),(243,'maintenance 2 riza haerudin','626756720130320110543.sql','superuser','2013-03-20 11:05:44','2013-03-20 04:05:44'),(244,'20130321_1038','936751720130321104949.sql','lestari','2013-03-21 10:49:50','2013-03-21 03:49:50'),(245,'Maintenance Kunjungan','287754320130330075148.sql','superuser','2013-03-30 19:51:48','2013-03-30 12:51:48'),(246,'Update datatype tipe pembayaran toko','381379620130330083951.sql','superuser','2013-03-30 20:39:52','2013-03-30 13:39:52'),(247,'UpdatePrivileges Transaksi Toko','308685420130330093131.sql','superuser','2013-03-30 21:31:31','2013-03-30 14:31:31'),(248,'20130331_0737','157294220130331074532.sql','lestari','2013-03-31 07:45:33','2013-03-31 00:45:33'),(249,'20130331_2336','247784020130331114743.sql','lestari','2013-03-31 23:47:43','2013-03-31 16:47:43'),(250,'20130409_1018','914967920130409102858.sql','lestari','2013-04-09 10:28:59','2013-04-09 03:28:59'),(251,'20130419_1322','560652820130419013300.sql','lestari','2013-04-19 13:33:00','2013-04-19 06:33:00'),(252,'20130427_0913','969097320130427092548.sql','lestari','2013-04-27 09:25:49','2013-04-27 02:25:49'),(253,'20130428_0349','137987020130428040024.sql','','2013-04-28 16:00:25','2013-04-28 09:00:25'),(254,'20130503_1040','953901320130503105207.sql','lestari','2013-05-03 10:52:07','2013-05-03 03:52:07'),(255,'20130505_1004','500074220130505101538.sql','lestari','2013-05-05 10:15:39','2013-05-05 03:15:39'),(256,'maintenance','816273820130506094854.sql','superuser','2013-05-06 09:48:55','2013-05-06 02:48:55'),(257,'20130309_1757','918521120130509060900.sql','lestari','2013-05-09 18:09:00','2013-05-09 11:09:00'),(258,'20130510_0722','935516920130510073431.sql','lestari','2013-05-10 07:34:32','2013-05-10 00:34:32'),(259,'20130514_1314','943555220130514015257.sql','lestari','2013-05-14 13:52:58','2013-05-14 06:52:58'),(260,'backup_20130517','012177820130517041929.sql','superuser','2013-05-17 16:19:29','2013-05-17 09:19:29'),(261,'backup_maintenace','916661220130520094149.sql','superuser','2013-05-20 09:41:50','2013-05-20 02:41:50'),(262,'20130513_1657','266109020130525050927.sql','lestari','2013-05-25 17:09:28','2013-05-25 10:09:28'),(263,'20130606_1101','698409420130606111312.sql','lestari','2013-06-06 11:13:13','2013-06-06 04:13:13'),(264,'maintenance','621102320130610100130.sql','superuser','2013-06-10 10:01:31','2013-06-10 03:01:31'),(265,'Update PAtch','775430720130610110121.sql','superuser','2013-06-10 11:01:21','2013-06-10 04:01:21'),(266,'20130615_1854','428690320130615070557.sql','lestari','2013-06-15 19:05:59','2013-06-15 12:05:59'),(267,'20130620_0820','209595620130620083155.sql','lestari','2013-06-20 08:31:56','2013-06-20 01:31:56'),(268,'duplicate key','133081420130620085502.sql','superuser','2013-06-20 08:55:02','2013-06-20 01:55:02'),(269,'20130701_1816','557210920130701062821.sql','lestari','2013-07-01 18:28:21','2013-07-01 11:28:21'),(270,'20130708_2312','105192320130708112427.sql','lestari','2013-07-08 23:24:28','2013-07-08 16:24:28'),(271,'20130724_1451','618309820130724030429.sql','lestari','2013-07-24 15:04:30','2013-07-24 08:04:30'),(272,'20130729_1630','739992920130729044353.sql','lestari','2013-07-29 16:43:53','2013-07-29 09:43:53'),(273,'20130729_1630','370079620130729044354.sql','lestari','2013-07-29 16:43:54','2013-07-29 09:43:54'),(274,'20130807_1548','171222720130807040123.sql','lestari','2013-08-07 16:01:24','2013-08-07 09:01:24'),(275,'Maintenance','132438120130814032949.sql','superuser','2013-08-14 15:29:50','2013-08-14 08:29:50'),(276,'billing tanpa nama','694493320130820041324.sql','superuser','2013-08-20 16:13:24','2013-08-20 09:13:24'),(277,'maintenance','251150420130905042608.sql','superuser','2013-09-05 16:26:10','2013-09-05 09:26:10'),(278,'20130906_0843','038589620130906085747.sql','lestari','2013-09-06 08:57:48','2013-09-06 01:57:48'),(279,'maintenance','804000420130917035015.sql','superuser','2013-09-17 15:50:19','2013-09-17 08:50:19'),(280,'Lestari20131012_0813','657035020131012082905.sql','lestari','2013-10-12 08:29:06','2013-10-12 01:29:06'),(281,'Lestari20131012_2232','305387120131012104600.sql','lestari','2013-10-12 22:46:01','2013-10-12 15:46:01'),(282,'Lestari20131013_2319','455185520131013113256.sql','lestari','2013-10-13 23:32:57','2013-10-13 16:32:57'),(283,'backup','369915120131014071943.sql','superuser','2013-10-14 07:19:44','2013-10-14 00:19:44'),(284,'Lestari20131014_1352','526068720131014020611.sql','lestari','2013-10-14 14:06:12','2013-10-14 07:06:12'),(285,'Lestari20131014_1736','662165020131014055018.sql','lestari','2013-10-14 17:50:18','2013-10-14 10:50:18'),(286,'Lestari20131014_2139','336433820131014095320.sql','lestari','2013-10-14 21:53:21','2013-10-14 14:53:21'),(287,'Lestari20131015_1405','436707020131015021837.sql','lestari','2013-10-15 14:18:37','2013-10-15 07:18:37'),(288,'group','758957120131020074518.sql','lestari','2013-10-20 07:45:19','2013-10-20 00:45:19'),(289,'20131030_0939','301971320131030095454.sql','lestari','2013-10-30 09:54:55','2013-10-30 02:54:55'),(290,'20131108_1636','894992820131108045106.sql','lestari','2013-11-08 16:51:07','2013-11-08 09:51:07'),(291,'20131201_1048','852590620131201110252.sql','lestari','2013-12-01 11:02:53','2013-12-01 04:02:53'),(292,'20131210_1321','100662620131210013535.sql','lestari','2013-12-10 13:35:37','2013-12-10 06:35:37'),(293,'20131225_2215','200256520131225102906.sql','lestari','2013-12-25 22:29:07','2013-12-25 15:29:07'),(294,'20121226_1321','596295020131226013534.sql','lestari','2013-12-26 13:35:34','2013-12-26 06:35:34'),(295,'20121227_2148','056068720131227100144.sql','lestari','2013-12-27 22:01:45','2013-12-27 15:01:45'),(296,'20131228_1656','439945320131228051018.sql','lestari','2013-12-28 17:10:19','2013-12-28 10:10:19'),(297,'20121229_2216','407570820131229102940.sql','lestari','2013-12-29 22:29:40','2013-12-29 15:29:40'),(298,'20140102_2024','695663720140102083729.sql','lestari','2014-01-02 20:37:30','2014-01-02 13:37:30'),(299,'20140105_0000','737151420140105121301.sql','lestari','2014-01-05 00:13:03','2014-01-04 17:13:03'),(300,'20140113_1522','246458320140113033610.sql','lestari','2014-01-13 15:36:11','2014-01-13 08:36:11'),(301,'20140118_2211','225211220140118102454.sql','lestari','2014-01-18 22:24:55','2014-01-18 15:24:55'),(302,'Maintenance','524921020140203115808.sql','superuser','2014-02-03 11:58:10','2014-02-03 04:58:10'),(303,'Maintenance','333566920140206111533.sql','superuser','2014-02-06 11:15:34','2014-02-06 04:15:34'),(304,'20140313_0855','336494520140313091051.sql','lestari','2014-03-13 09:10:53','2014-03-13 02:10:53'),(305,'20140321_2101','504319520140321092031.sql','lestari','2014-03-21 21:20:32','2014-03-21 14:20:32'),(306,'20140322_2221','893204420140322104100.sql','lestari','2014-03-22 22:41:01','2014-03-22 15:41:01'),(307,'20140404_0819','248211020140404083856.sql','lestari','2014-04-04 08:38:57','2014-04-04 01:38:57'),(308,'20140418_1612','872345820140418043105.sql','lestari','2014-04-18 16:31:06','2014-04-18 09:31:06'),(309,'20140418_2142','048031220140418100031.sql','lestari','2014-04-18 22:00:32','2014-04-18 15:00:32'),(310,'20140421_1104','802035820140421112411.sql','lestari','2014-04-21 11:24:11','2014-04-21 04:24:11'),(311,'20140425_2029','578718620140425084858.sql','lestari','2014-04-25 20:48:59','2014-04-25 13:48:59'),(312,'20140425_2029','695652320140425084914.sql','lestari','2014-04-25 20:49:14','2014-04-25 13:49:14'),(313,'20140513_2123','633234820140513094427.sql','lestari','2014-05-13 21:44:28','2014-05-13 14:44:28'),(314,'20140514_1012','264499520140514103137.sql','lestari','2014-05-14 10:31:38','2014-05-14 03:31:38'),(315,'20140613_2116','917166720140613093439.sql','lestari','2014-06-13 21:34:40','2014-06-13 14:34:40'),(316,'20140614_0922','121631820140614094052.sql','lestari','2014-06-14 09:40:53','2014-06-14 02:40:53'),(317,'20140614_2020','792079820140614083846.sql','lestari','2014-06-14 20:38:47','2014-06-14 13:38:47'),(318,'20140629_1048','488488220140629110613.sql','lestari','2014-06-29 11:06:14','2014-06-29 04:06:14'),(319,'maintenance','566028620140811094755.sql','superuser','2014-08-11 21:47:59','2014-08-11 14:47:59'),(320,'20140814_1853','787779820140814065320.sql','weweng','2014-08-14 18:53:22','2014-08-14 11:53:22'),(321,'20140818_0844','940425620140818084449.sql','lestari','2014-08-18 08:44:50','2014-08-18 01:44:50'),(322,'20140823_0901','431353820140823090200.sql','lestari','2014-08-23 09:02:01','2014-08-23 02:02:01'),(323,'20140824_1438','348620620140824023819.sql','lestari','2014-08-24 14:38:20','2014-08-24 07:38:20'),(324,'20140911_2104','961335020140911090413.sql','lestari','2014-09-11 21:04:14','2014-09-11 14:04:14'),(325,'20140913_1957','235315420140913075721.sql','lestari','2014-09-13 19:57:22','2014-09-13 12:57:22'),(326,'20141003_1455','903566320141003025535.sql','lestari','2014-10-03 14:55:37','2014-10-03 07:55:37'),(327,'20141012_1819','296226720141012061907.sql','lestari','2014-10-12 18:19:08','2014-10-12 11:19:08'),(328,'20141017_0740','865430220141017074041.sql','lestari','2014-10-17 07:40:42','2014-10-17 00:40:42'),(329,'20141201_1335','964310220141201013536.sql','','2014-12-01 13:35:37','2014-12-01 06:35:37'),(330,'20141202_1348','853033120141202014507.sql','superuser','2014-12-02 13:45:08','2014-12-02 06:45:08'),(331,'cek_database','152780020141202014537.sql','superuser','2014-12-02 13:45:38','2014-12-02 06:45:38'),(332,'20141217_1420','802333920141217022036.sql','lestari','2014-12-17 14:20:36','2014-12-17 07:20:36'),(333,'20150112_0918','249802820150112091847.sql','lestari','2015-01-12 09:18:49','2015-01-12 02:18:49'),(334,'20150116_1453','607776120150116025318.sql','lestari','2015-01-16 14:53:19','2015-01-16 07:53:19'),(335,'20150116_1837','439462520150116063736.sql','lestari','2015-01-16 18:37:37','2015-01-16 11:37:37'),(336,'20150117_1534','264789120150117033501.sql','lestari','2015-01-17 15:35:02','2015-01-17 08:35:02'),(337,'20150117_2048','918827820150117084814.sql','lestari','2015-01-17 20:48:15','2015-01-17 13:48:15'),(338,'20150117_2048','493215420150117084817.sql','lestari','2015-01-17 20:48:17','2015-01-17 13:48:17'),(339,'20150120_0939','017197420150120093915.sql','lestari','2015-01-20 09:39:16','2015-01-20 02:39:16'),(340,'20150123_2112','599648120150123091300.sql','lestari','2015-01-23 21:13:01','2015-01-23 14:13:01'),(341,'20150207_2205','033100220150207100613.sql','','2015-02-07 22:06:14','2015-02-07 15:06:14'),(342,'20150209_0939','899265320150209093339.sql','superuser','2015-02-09 09:33:39','2015-02-09 02:33:39'),(343,'20150214_0908','217218720150214090908.sql','lestari','2015-02-14 09:09:09','2015-02-14 02:09:09'),(344,'20150215_0753','289200320150215075311.sql','lestari','2015-02-15 07:53:12','2015-02-15 00:53:12');
/*!40000 ALTER TABLE `trx_backup` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-02-15  8:17:08