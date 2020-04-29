-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: 192.168.10.10    Database: laravel-shop
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.18.04.1

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
-- Dumping data for table `admin_menu`
--

LOCK TABLES `admin_menu` WRITE;
/*!40000 ALTER TABLE `admin_menu` DISABLE KEYS */;
INSERT INTO `admin_menu` VALUES (1,0,1,'首页','fa-bar-chart','/',NULL,NULL,'2019-12-02 16:37:36'),(2,0,7,'系统管理','fa-tasks',NULL,NULL,NULL,'2020-04-29 12:14:36'),(3,2,8,'管理员','fa-users','auth/users',NULL,NULL,'2020-04-29 12:14:36'),(4,2,9,'角色','fa-user','auth/roles',NULL,NULL,'2020-04-29 12:14:36'),(5,2,10,'权限','fa-ban','auth/permissions',NULL,NULL,'2020-04-29 12:14:36'),(6,2,11,'菜单','fa-bars','auth/menu',NULL,NULL,'2020-04-29 12:14:36'),(7,2,12,'系统日志','fa-history','auth/logs',NULL,NULL,'2020-04-29 12:14:36'),(8,0,2,'用户列表','fa-users','/users',NULL,'2019-12-02 17:23:48','2019-12-02 17:25:10'),(9,2,13,'系统工具','fa-gears',NULL,NULL,'2019-12-02 17:48:30','2020-04-29 12:14:36'),(10,9,14,'Scaffold','fa-keyboard-o','helpers/scaffold',NULL,'2019-12-02 17:48:30','2020-04-29 12:14:36'),(11,9,15,'Database terminal','fa-database','helpers/terminal/database',NULL,'2019-12-02 17:48:30','2020-04-29 12:14:36'),(12,9,16,'Laravel artisan','fa-terminal','helpers/terminal/artisan',NULL,'2019-12-02 17:48:30','2020-04-29 12:14:36'),(13,9,17,'Routes','fa-list-alt','helpers/routes',NULL,'2019-12-02 17:48:30','2020-04-29 12:14:36'),(14,9,18,'Redis manager','fa-database','redis',NULL,'2019-12-18 14:56:28','2020-04-29 12:14:36'),(15,9,20,'EnvManager','fa-gears','env-manager',NULL,'2019-12-18 14:59:26','2020-04-29 12:14:36'),(16,9,19,'Log viewer','fa-database','logs',NULL,'2019-12-18 15:01:29','2020-04-29 12:14:36'),(17,0,4,'商品管理','fa-cubes','/products',NULL,'2019-12-18 15:37:41','2020-04-29 12:14:36'),(18,0,5,'订单管理','fa-rmb','/orders',NULL,'2020-04-03 15:01:54','2020-04-29 12:14:36'),(19,0,6,'优惠券管理','fa-tags','/coupon_codes',NULL,'2020-04-28 11:30:33','2020-04-29 12:14:36'),(20,0,3,'类目管理','fa-bars','/categories',NULL,'2020-04-29 12:14:27','2020-04-29 12:14:36');
/*!40000 ALTER TABLE `admin_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_permissions`
--

LOCK TABLES `admin_permissions` WRITE;
/*!40000 ALTER TABLE `admin_permissions` DISABLE KEYS */;
INSERT INTO `admin_permissions` VALUES (1,'All permission','*','','*',NULL,NULL),(2,'Dashboard','dashboard','GET','/',NULL,NULL),(3,'Login','auth.login','','/auth/login\r\n/auth/logout',NULL,NULL),(4,'User setting','auth.setting','GET,PUT','/auth/setting',NULL,NULL),(5,'Auth management','auth.management','','/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs',NULL,NULL),(6,'Admin helpers','ext.helpers','','/helpers/*','2019-12-02 17:48:30','2019-12-02 17:48:30'),(7,'用户管理','users','','/users*','2019-12-18 14:43:39','2019-12-18 14:43:39'),(8,'Redis Manager','ext.redis-manager','','/redis*','2019-12-18 14:56:28','2019-12-18 14:56:28'),(9,'Logs','ext.log-viewer','','/logs*','2019-12-18 15:01:29','2019-12-18 15:01:29'),(10,'商品管理','products','','/products*','2020-04-28 17:22:20','2020-04-28 17:23:27'),(11,'订单管理','orders','','/orders*','2020-04-28 17:22:41','2020-04-28 17:23:19'),(12,'优惠券管理','coupon_codes','','/coupon_codes*','2020-04-28 17:23:10','2020-04-28 17:23:10');
/*!40000 ALTER TABLE `admin_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_role_menu`
--

LOCK TABLES `admin_role_menu` WRITE;
/*!40000 ALTER TABLE `admin_role_menu` DISABLE KEYS */;
INSERT INTO `admin_role_menu` VALUES (1,2,NULL,NULL),(1,9,NULL,NULL),(1,14,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_role_permissions`
--

LOCK TABLES `admin_role_permissions` WRITE;
/*!40000 ALTER TABLE `admin_role_permissions` DISABLE KEYS */;
INSERT INTO `admin_role_permissions` VALUES (1,1,NULL,NULL),(2,2,NULL,NULL),(2,3,NULL,NULL),(2,4,NULL,NULL),(2,7,NULL,NULL),(2,10,NULL,NULL),(2,11,NULL,NULL),(2,12,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_role_users`
--

LOCK TABLES `admin_role_users` WRITE;
/*!40000 ALTER TABLE `admin_role_users` DISABLE KEYS */;
INSERT INTO `admin_role_users` VALUES (1,1,NULL,NULL),(2,2,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_roles`
--

LOCK TABLES `admin_roles` WRITE;
/*!40000 ALTER TABLE `admin_roles` DISABLE KEYS */;
INSERT INTO `admin_roles` VALUES (1,'Administrator','administrator','2019-12-02 16:19:34','2019-12-02 16:19:34'),(2,'运营','operator','2019-12-18 14:44:28','2019-12-18 14:44:28');
/*!40000 ALTER TABLE `admin_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_user_permissions`
--

LOCK TABLES `admin_user_permissions` WRITE;
/*!40000 ALTER TABLE `admin_user_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_user_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_users`
--

LOCK TABLES `admin_users` WRITE;
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` VALUES (1,'admin','$2y$10$/iSok0D0Ohe35w5xAQt0dOZBQ8HF45IsiiKUEKMj/0muuDR2.kBfK','Administrator',NULL,'HEL1pwwABrWkIVi70UhCpwcw2ZEP2VXVqHnzijDOEQvMseYO8obXwmoUfn35','2019-12-02 16:19:34','2019-12-02 16:19:34'),(2,'operator','$2y$10$X41f1O84ynvKhk3kbTZiH.sVJjg/IyCVsjoZUNxM7YgMJLD7OEWCu','运营',NULL,'pCZA1jzhCVxv4V4iZX8kgqWUtvch5tAsNhzgNkaz5CwuM2KKFkDjL4A4ydAn','2019-12-18 14:45:08','2019-12-18 14:45:08');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-29  5:52:22
