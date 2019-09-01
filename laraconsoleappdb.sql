-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: easyPanel
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.16.04.1

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
-- Table structure for table `designations`
--

DROP TABLE IF EXISTS `designations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `designations` (
  `designations_id` int(10) NOT NULL AUTO_INCREMENT,
  `designations_name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `created_by` int(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  PRIMARY KEY (`designations_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `designations`
--

LOCK TABLES `designations` WRITE;
/*!40000 ALTER TABLE `designations` DISABLE KEYS */;
INSERT INTO `designations` VALUES (1,'asasasas','asasasasas',2,'2018-12-28 00:00:00',NULL,'2018-12-28 12:31:08','Active'),(2,'sasasas','asasasasa',2,'2018-12-28 00:00:00',NULL,'2018-12-28 12:31:16','Active'),(3,'sssssssssssss','ssssssssssssssssss',2,'2018-12-28 00:00:00',NULL,'2018-12-28 12:31:28','Active');
/*!40000 ALTER TABLE `designations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_dropdowns`
--

DROP TABLE IF EXISTS `sys_dropdowns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_dropdowns` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `dropdown_slug` varchar(100) DEFAULT NULL,
  `sqltext` text,
  `value_field` varchar(50) DEFAULT NULL,
  `option_field` varchar(100) DEFAULT NULL,
  `multiple` tinyint(1) DEFAULT '0',
  `dropdown_name` varchar(100) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `created_by` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  PRIMARY KEY (`id`),
  UNIQUE KEY `dropdownslug` (`dropdown_slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_dropdowns`
--

LOCK TABLES `sys_dropdowns` WRITE;
/*!40000 ALTER TABLE `sys_dropdowns` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_dropdowns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_menus`
--

DROP TABLE IF EXISTS `sys_menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menus_description` text COLLATE utf8mb4_unicode_ci,
  `menus_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_menus_id` int(11) NOT NULL,
  `modules_id` int(11) NOT NULL,
  `icon_class` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'value after the base url only',
  `sort_number` int(11) NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_menus`
--

LOCK TABLES `sys_menus` WRITE;
/*!40000 ALTER TABLE `sys_menus` DISABLE KEYS */;
INSERT INTO `sys_menus` VALUES (1,'Master','ww','main',1,1,'fa fa-list','/logrrr',0,1,1004,NULL,'2018-08-12 02:24:21','Active'),(2,'Product Settings','Product Settings','main',1,1,'fa fa-list','/',0,1,1004,'2018-08-02 06:27:04','2018-08-12 02:25:15','Active'),(3,'Brand','Brand','child',2,1,'fa fa-list','/product_brands',0,1,0,'2018-08-02 06:27:04','2018-08-02 06:27:09','Active'),(4,'Category','Category','child',2,1,'fa fa-list','/product_categories',0,1,0,'2018-08-02 06:27:04','2018-08-02 06:27:09','Active'),(5,'Model','Model','child',2,1,'fa fa-list','/product_models',0,1,0,'2018-08-02 06:27:04','2018-08-02 06:27:09','Active'),(7,'User List','#','sub',8,1,'fa fa-list','users',1,1,0,'2018-08-07 08:25:41','2018-08-07 08:25:47','Active'),(8,'System','System','main',0,1,'fa fa-list','#',1,1,0,'2018-08-07 08:25:41','2018-08-07 08:25:47','Active'),(9,'Modules','Module','sub',8,1,'fa fa-list','/modules',1,0,0,'2018-08-09 09:46:15','2018-08-09 09:46:19','Active'),(10,'User Level','User Level','sub',8,1,'fa fa-list','/userLevels',1,0,0,'2018-08-09 09:46:15','2018-08-09 09:46:19','Active'),(11,'Memu Assign','Permissions','sub',8,1,'fa fa-list','/permissions',1,0,0,'2018-08-09 09:46:15','2018-08-09 09:46:19','Active'),(12,'Roles','Roles','sub',8,1,'fa fa-list','/roles',1,0,0,'2018-08-09 09:46:15','2018-08-09 09:46:19','Active'),(13,'Menus','Menus','sub',8,1,'fa fa-list','/menus',1,0,0,'2018-08-09 09:46:15','2018-08-09 09:46:19','Active'),(14,'Log','Log','sub',8,1,'fa fa-list','/log',1,1,1,'2018-08-09 09:46:15','2018-08-09 04:53:21','Active'),(15,'Settings','Settings','main',0,1,'fa fa-list','#',1,1,1,'2018-08-09 09:46:15','2018-08-09 04:53:21','Active'),(16,'Company details','Company details','sub',15,1,'fa fa-list','/company',0,2,1,'2018-09-04 18:00:00','2018-09-05 06:04:42','Active'),(17,'System settings','System settings','sub',15,1,'fa fa-list','/system_settings',1,1,1,'2018-08-09 09:46:15','2018-08-09 04:53:21','Active'),(18,'Email Settings','Email Settings','sub',15,1,'fa fa-list','/email_settings',1,1,1,'2018-08-09 09:46:15','2018-08-09 04:53:21','Active'),(19,'Email Template','Email Template','sub',15,1,'fa fa-list','/email_template',1,1,1,'2018-08-09 09:46:15','2018-08-09 04:53:21','Active'),(20,'Invoice Settings','Invoice Settings','sub',15,1,'fa fa-list','/invoice_settings',0,1,1,'2018-08-26 18:00:00','2018-08-26 23:07:00','Active'),(21,'Theme settings','Theme Settings','sub',15,1,'fa fa-list','/theme_settings',1,1,1,'2018-08-09 09:46:15','2018-08-09 04:53:21','Active'),(22,'Dashboard Settings','Dashboard Settings','sub',15,1,'fa fa-list','/dashboard_settings',1,1,1,'2018-08-09 09:46:15','2018-08-09 04:53:21','Active'),(24,'API Settings','API Settings','sub',0,1,'fa fa-list','/api_settings',0,1,1,'2018-08-26 18:00:00','2018-08-26 22:31:07','Active'),(25,'Procurement',NULL,'main',0,1,'fa fa-list','#',0,2,0,'2018-09-17 18:00:00','2018-09-18 01:55:45','Active'),(26,'Products',NULL,'sub',25,1,'fa fa-list','/rawmaterial',0,2,0,'2018-09-17 18:00:00','2018-09-18 02:00:03','Active'),(27,'Vendors','','sub',25,1,'fa fa-list','/suppliers',0,2,0,'2018-09-17 18:00:00','2018-09-18 02:00:03','Active');
/*!40000 ALTER TABLE `sys_menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_modules`
--

DROP TABLE IF EXISTS `sys_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_modules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modules_icon` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `home_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'value only after base url. Should not use the full URL',
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_modules`
--

LOCK TABLES `sys_modules` WRITE;
/*!40000 ALTER TABLE `sys_modules` DISABLE KEYS */;
INSERT INTO `sys_modules` VALUES (1,'Admin','fa fa-list','na','/','Active'),(2,'Accounting','fa fa-list','na','/','Active'),(3,'HR','fa fa-list','na','/','Active'),(4,'Purchase','fa fa-list','na','/','Active'),(5,'Sales','fa fa-list','na','/','Active'),(6,'asdsadas','adasd',NULL,'/','Active');
/*!40000 ALTER TABLE `sys_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_privilege_levels`
--

DROP TABLE IF EXISTS `sys_privilege_levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_privilege_levels` (
  `users_id` int(11) DEFAULT NULL,
  `user_levels_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `privilege_levels_user_id_user_level_id_unique` (`users_id`,`user_levels_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_privilege_levels`
--

LOCK TABLES `sys_privilege_levels` WRITE;
/*!40000 ALTER TABLE `sys_privilege_levels` DISABLE KEYS */;
INSERT INTO `sys_privilege_levels` VALUES (3,1,'2018-08-10 18:00:00',NULL),(1004,1,'2018-08-10 18:00:00',NULL),(1030,1,'2018-08-10 18:00:00',NULL),(10,1,'2018-08-14 18:00:00',NULL),(1036,1,'2018-08-14 18:00:00',NULL),(1046,1,'2018-08-28 18:00:00',NULL),(2,1,'2018-08-28 18:00:00',NULL),(2,3,'2018-08-28 18:00:00',NULL),(2,4,'2018-08-28 18:00:00',NULL),(1047,1,'2018-09-01 18:00:00',NULL),(1047,3,'2018-09-01 18:00:00',NULL),(1047,4,'2018-09-01 18:00:00',NULL),(1,1,'2018-10-09 18:00:00',NULL);
/*!40000 ALTER TABLE `sys_privilege_levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_privilege_menus`
--

DROP TABLE IF EXISTS `sys_privilege_menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_privilege_menus` (
  `menus_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_levels_id` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `all` tinyint(1) DEFAULT '0',
  `create` tinyint(1) DEFAULT '0',
  `edit` tinyint(1) DEFAULT '0',
  `del` tinyint(1) DEFAULT '0',
  UNIQUE KEY `privilege_menus_menu_id_user_level_id_unique` (`menus_id`,`user_levels_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_privilege_menus`
--

LOCK TABLES `sys_privilege_menus` WRITE;
/*!40000 ALTER TABLE `sys_privilege_menus` DISABLE KEYS */;
INSERT INTO `sys_privilege_menus` VALUES (8,2,NULL,'2018-08-12 18:00:00',NULL,0,0,0,0),(7,2,NULL,'2018-08-12 18:00:00','2018-08-15 03:18:59',1,1,1,1),(9,2,NULL,'2018-08-12 18:00:00','2018-08-15 03:42:41',1,0,0,0),(10,2,NULL,'2018-08-12 18:00:00',NULL,0,0,0,0),(13,1,NULL,'2018-08-13 18:00:00','2018-08-15 23:57:48',1,0,0,0),(14,1,NULL,'2018-08-13 18:00:00','2018-08-15 06:15:36',1,0,0,0),(10,1,NULL,'2018-08-14 18:00:00','2018-08-15 03:44:47',1,0,0,0),(12,1,NULL,'2018-08-14 18:00:00','2018-08-15 04:50:01',0,0,0,0),(11,1,NULL,'2018-08-14 18:00:00','2018-08-16 00:02:12',1,0,0,0),(8,1,NULL,'2018-08-14 18:00:00','2018-08-15 06:39:42',0,0,0,0),(9,1,NULL,'2018-08-14 18:00:00','2018-08-15 23:53:20',1,1,1,1),(7,1,NULL,'2018-08-15 18:00:00','2018-10-07 22:40:21',1,1,0,0),(23,1,NULL,'2018-08-24 18:00:00','2018-08-24 23:03:34',0,0,0,0),(27,4,20,'2018-08-25 18:00:00',NULL,0,0,0,0),(27,1,0,'2018-08-25 18:00:00','2018-10-01 02:02:35',1,0,0,0),(27,3,0,'2018-08-25 18:00:00',NULL,0,0,0,0),(28,4,0,'2018-08-26 18:00:00',NULL,0,0,0,0),(28,1,0,'2018-08-26 18:00:00',NULL,0,0,0,0),(28,3,0,'2018-08-26 18:00:00',NULL,0,0,0,0),(28,0,2,'2018-08-26 18:00:00',NULL,0,0,0,0),(30,4,0,'2018-08-26 18:00:00',NULL,0,0,0,0),(30,1,0,'2018-08-26 18:00:00',NULL,0,0,0,0),(30,3,0,'2018-08-26 18:00:00',NULL,0,0,0,0),(30,0,5,'2018-08-26 18:00:00',NULL,0,0,0,0),(29,4,NULL,'2018-08-26 18:00:00',NULL,0,0,0,0),(29,1,NULL,'2018-08-26 18:00:00',NULL,0,0,0,0),(29,3,NULL,'2018-08-26 18:00:00',NULL,0,0,0,0),(29,NULL,3,'2018-08-26 18:00:00',NULL,0,0,0,0),(29,NULL,5,'2018-08-26 18:00:00',NULL,0,0,0,0),(20,4,NULL,'2018-08-26 18:00:00',NULL,0,0,0,0),(20,3,NULL,'2018-08-26 18:00:00',NULL,0,0,0,0),(20,NULL,2,'2018-08-26 18:00:00',NULL,0,0,0,0),(31,4,NULL,'2018-08-26 18:00:00',NULL,0,0,0,0),(31,1,NULL,'2018-08-26 18:00:00',NULL,0,0,0,0),(31,NULL,2,'2018-08-26 18:00:00',NULL,0,0,0,0),(31,NULL,3,'2018-08-26 18:00:00',NULL,0,0,0,0),(8,4,NULL,'2018-08-29 18:00:00','2018-08-30 02:14:52',0,0,0,0),(7,4,NULL,'2018-09-04 18:00:00','2018-09-05 00:55:12',1,0,0,0),(16,NULL,2,'2018-09-04 18:00:00',NULL,0,0,0,0),(16,NULL,3,'2018-09-04 18:00:00',NULL,0,0,0,0),(25,1,NULL,'2018-09-17 18:00:00',NULL,0,0,0,0),(25,NULL,3,'2018-09-17 18:00:00',NULL,0,0,0,0),(26,1,NULL,'2018-09-17 18:00:00',NULL,0,0,0,0),(26,NULL,2,'2018-09-17 18:00:00',NULL,0,0,0,0),(26,NULL,3,'2018-09-17 18:00:00',NULL,0,0,0,0),(15,1,NULL,'2018-10-08 18:00:00','2018-10-09 07:14:50',0,0,0,0),(16,1,NULL,'2018-10-08 18:00:00','2018-10-09 07:14:52',0,0,0,0),(17,1,NULL,'2018-10-08 18:00:00','2018-10-09 07:14:53',0,0,0,0),(18,1,NULL,'2018-10-08 18:00:00','2018-10-09 07:14:54',0,0,0,0),(19,1,NULL,'2018-10-08 18:00:00','2018-10-09 07:14:55',0,0,0,0),(20,1,NULL,'2018-10-08 18:00:00','2018-10-09 07:14:56',0,0,0,0),(21,1,NULL,'2018-10-08 18:00:00','2018-10-09 07:14:57',0,0,0,0),(22,1,NULL,'2018-10-08 18:00:00','2018-10-09 07:14:57',0,0,0,0);
/*!40000 ALTER TABLE `sys_privilege_menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_privilege_modules`
--

DROP TABLE IF EXISTS `sys_privilege_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_privilege_modules` (
  `users_id` int(11) NOT NULL DEFAULT '0',
  `modules_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_levels_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_privilege_modules`
--

LOCK TABLES `sys_privilege_modules` WRITE;
/*!40000 ALTER TABLE `sys_privilege_modules` DISABLE KEYS */;
INSERT INTO `sys_privilege_modules` VALUES (1036,2,'2018-08-14 18:00:00',NULL,NULL),(1046,1,'2018-08-28 18:00:00',NULL,NULL),(1046,2,'2018-08-28 18:00:00',NULL,NULL),(2,1,'2018-08-28 18:00:00',NULL,NULL),(2,2,'2018-08-28 18:00:00',NULL,NULL),(2,3,'2018-08-28 18:00:00',NULL,NULL),(1047,1,'2018-09-01 18:00:00',NULL,NULL),(1047,2,'2018-09-01 18:00:00',NULL,NULL),(1047,3,'2018-09-01 18:00:00',NULL,NULL),(1047,4,'2018-09-01 18:00:00',NULL,NULL),(1047,5,'2018-09-01 18:00:00',NULL,NULL),(1,1,'2018-10-09 18:00:00',NULL,NULL),(1,2,'2018-10-09 18:00:00',NULL,NULL),(1,3,'2018-10-09 18:00:00',NULL,NULL),(1,5,'2018-10-09 18:00:00',NULL,NULL);
/*!40000 ALTER TABLE `sys_privilege_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_system_settings`
--

DROP TABLE IF EXISTS `sys_system_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_system_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_key` varchar(100) NOT NULL,
  `option_status` varchar(100) DEFAULT NULL,
  `option_value` varchar(100) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_system_settings`
--

LOCK TABLES `sys_system_settings` WRITE;
/*!40000 ALTER TABLE `sys_system_settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_system_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_user_levels`
--

DROP TABLE IF EXISTS `sys_user_levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_user_levels` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `privilege_edit` tinyint(1) NOT NULL DEFAULT '0',
  `privilege_delete` tinyint(1) NOT NULL DEFAULT '0',
  `privilege_add` tinyint(1) NOT NULL DEFAULT '0',
  `privilege_view_all` tinyint(1) NOT NULL DEFAULT '0',
  `all_privilege` tinyint(1) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_levels_user_level_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_user_levels`
--

LOCK TABLES `sys_user_levels` WRITE;
/*!40000 ALTER TABLE `sys_user_levels` DISABLE KEYS */;
INSERT INTO `sys_user_levels` VALUES (1,'Admin',NULL,0,0,0,0,0,'Active'),(3,'level1',NULL,0,0,0,0,0,'Active'),(4,'Accountant',NULL,0,0,0,0,0,'Active');
/*!40000 ALTER TABLE `sys_user_levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_users`
--

DROP TABLE IF EXISTS `sys_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_users` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(150) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL COMMENT 'Encrypted Value will store here',
  `password_key` varchar(50) DEFAULT NULL,
  `password_expire_days` int(3) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT 'Male',
  `religion` enum('Muslim','Hindu','Christian','Buddhist') DEFAULT 'Muslim',
  `last_login` datetime DEFAULT NULL,
  `default_module_id` int(11) DEFAULT '0',
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `user_image` varchar(100) DEFAULT 'images/default/avatar.jpg',
  `address` varchar(255) DEFAULT NULL,
  `default_url` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_by` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_users`
--

LOCK TABLES `sys_users` WRITE;
/*!40000 ALTER TABLE `sys_users` DISABLE KEYS */;
INSERT INTO `sys_users` VALUES (1,'mizan.rahaman@apsissolutions.com','Mizanur ccc','mizan.rahaman@apsissolutions.com','$2y$10$h2ta8.meqZSg9iHt.eiQs.Ay/I6M9gXxz7VsvbMDY/tOoYQvfzTV.',NULL,NULL,'01734183130','1970-01-01','Male','Muslim',NULL,1,NULL,'20181010052913.png',NULL,NULL,'nuE7ovAVzcAcWn2A6wklCijClYeDYXLToyaYS9tai5uFL5reiyccMjQivU0p',0,NULL,0,'2018-10-09 23:30:45'),(2,'mukul','mukul','apsis@hotmail.com','$2y$10$2nkgX.Wgvs4q3wCgICad/uz2g90yakp5Tb5y9UYGyYSslArBSJXvK','',NULL,'00000000000','1970-01-01','Male','Muslim','2018-06-09 09:20:33',1,'Active','20180905065348.jpg','','','GCrRWl8tDkq3aRqp6a6tJmAP11m85M775Qb0qqZl5HiqSTVCJfgHs1bxw2az',0,'2018-06-09 09:19:37',0,'2018-10-10 13:08:40');
/*!40000 ALTER TABLE `sys_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tests`
--

DROP TABLE IF EXISTS `tests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tests` (
  `tests_id` int(10) NOT NULL AUTO_INCREMENT,
  `tests_name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `created_by` int(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  PRIMARY KEY (`tests_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tests`
--

LOCK TABLES `tests` WRITE;
/*!40000 ALTER TABLE `tests` DISABLE KEYS */;
INSERT INTO `tests` VALUES (1,'asdadsad','asdasdasd',2,'2018-12-28 00:00:00',NULL,'2018-12-28 16:38:36','Active'),(2,'adadasdasd','asdasdasd',2,'2018-12-28 00:00:00',NULL,'2018-12-28 10:39:03',NULL);
/*!40000 ALTER TABLE `tests` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-29 23:54:05
