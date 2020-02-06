-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: dating_db
-- ------------------------------------------------------
-- Server version	5.7.27

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'テスト2','test@gmail.com',NULL,'$2y$10$BPyhq4CDZqMI1vinri0RCeATTOem9mLqfwdEAT2W4RNdx/lgYSSfe','6SaryTpzCPkhriea1XUZmBMYLqedlAbPkJN949xAs3qY1UQhx8kA6OVla1Yr','2019-04-05 11:18:22','2019-07-20 10:29:48'),(2,'XenCit','4e7dfdg@yandex.com',NULL,'$2y$10$ca9aSMhWCmuKbW.ChEMC7uW0kENgM/OYllJm9lVdVA64oYkovigGm',NULL,'2019-05-05 11:24:39','2019-05-05 11:24:39');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL COMMENT '名称',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='カテゴリ一覧';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'友達募集','2019-06-19 17:57:16','2019-11-26 17:19:36'),(2,'写メ投稿','2019-07-01 00:19:31','2019-11-26 17:19:56'),(3,'日記投稿','2019-07-01 00:19:53','2019-11-26 17:20:06');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'ユーザーID',
  `post_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'ポストID',
  `body` text COMMENT 'ボデイ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='ポスト';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,1,4,'コメントテスト','2019-07-03 02:03:51','2019-07-03 02:03:51'),(2,1,4,'テスト再度確認','2019-07-03 02:06:36','2019-07-03 02:06:36'),(3,1,4,'本当にテストですけど。','2019-07-03 02:06:57','2019-07-03 02:06:57'),(4,1,4,'ですけど。','2019-07-03 09:58:41','2019-07-03 09:58:41'),(5,1,4,'AAABB','2019-07-03 18:55:37','2019-07-03 18:55:37'),(6,3,3,'テスト投稿コメント','2019-07-22 20:01:49','2019-07-22 20:01:49'),(7,6,18,'こんにちは','2019-10-21 17:39:41','2019-10-21 17:39:41'),(8,6,24,'ご連絡ください。','2019-10-21 19:39:19','2019-10-21 19:39:19'),(9,1,26,'ご連絡ください。','2019-10-21 19:53:53','2019-10-21 19:53:53'),(10,1,28,'連絡お願いいたします','2019-10-21 20:04:20','2019-10-21 20:04:20');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL COMMENT 'タイトル',
  `name` varchar(200) DEFAULT NULL,
  `body` text COMMENT 'ボデイ',
  `email` varchar(200) DEFAULT NULL COMMENT 'メール',
  `tel` varchar(200) DEFAULT NULL COMMENT '電話',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='お問い合わせ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `followers`
--

DROP TABLE IF EXISTS `followers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `followers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `follower_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Follower User ID',
  `following_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Following User ID',
  `status` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '状態',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='フォロワー';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `followers`
--

LOCK TABLES `followers` WRITE;
/*!40000 ALTER TABLE `followers` DISABLE KEYS */;
INSERT INTO `followers` VALUES (7,5,1,0,NULL,NULL),(13,4,1,0,NULL,NULL),(14,4,1,0,NULL,NULL),(18,3,1,0,NULL,NULL),(19,1,3,0,NULL,NULL);
/*!40000 ALTER TABLE `followers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `likes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'POST ID',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'ユーザーID',
  `status` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '状態',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COMMENT='いいね';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES (19,5,3,0,'2019-07-22 19:58:05','2019-07-22 19:58:05'),(20,4,3,0,'2019-07-22 19:58:10','2019-07-22 19:58:10'),(21,2,3,0,'2019-07-22 19:58:15','2019-07-22 19:58:15'),(22,11,1,0,'2019-07-30 17:55:46','2019-07-30 17:55:46'),(23,3,3,0,'2019-09-25 18:29:15','2019-09-25 18:29:15');
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `thread_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,1,1,'test','2019-07-20 17:48:24','2019-07-20 17:48:24',NULL),(2,2,1,'Hello test4','2019-07-20 17:49:47','2019-07-20 17:49:47',NULL),(3,3,1,'こんにちは　Test4さん','2019-07-20 17:52:45','2019-07-20 17:52:45',NULL),(4,4,1,'こんにちは　Xencitさん','2019-07-20 17:53:27','2019-07-20 17:53:27',NULL),(5,5,3,'Hello, テスト２さん','2019-07-20 17:55:17','2019-07-20 17:55:17',NULL),(6,6,1,'onley for test4dddddd','2019-07-20 18:18:06','2019-07-20 18:18:06',NULL),(7,6,3,'Got that...','2019-07-20 18:18:54','2019-07-20 18:18:54',NULL),(8,7,1,'to noboday','2019-07-20 18:19:49','2019-07-20 18:19:49',NULL),(9,8,3,'Hello','2019-07-20 19:14:17','2019-07-20 19:14:17',NULL),(10,8,1,'Heloo,Got','2019-07-20 19:14:37','2019-07-20 19:14:37',NULL),(11,8,3,'OKKK','2019-07-20 19:34:12','2019-07-20 19:34:12',NULL),(12,9,3,'TTTTTTTTTTTTTT','2019-07-20 21:18:24','2019-07-20 21:18:24',NULL),(13,9,1,'got that, thanks','2019-07-20 21:21:46','2019-07-20 21:21:46',NULL),(14,10,3,'test','2019-09-25 18:54:34','2019-09-25 18:54:34',NULL),(15,11,3,'test','2019-09-25 18:55:26','2019-09-25 18:55:26',NULL),(16,12,3,'To trump sirTo trump sirTo trump sir','2019-09-25 19:00:24','2019-09-25 19:00:24',NULL),(17,13,3,'to trump 3333','2019-09-25 19:08:07','2019-09-25 19:08:07',NULL),(18,14,3,'to trump 3333','2019-09-25 19:09:08','2019-09-25 19:09:08',NULL),(19,15,3,'test','2019-09-25 19:10:02','2019-09-25 19:10:02',NULL),(20,16,1,'こんにちは','2019-10-21 19:48:45','2019-10-21 19:48:45',NULL),(21,17,1,'こんにちは！','2019-10-21 19:54:22','2019-10-21 19:54:22',NULL),(22,18,1,'いま時間はありますか。','2019-10-21 20:04:55','2019-10-21 20:04:55',NULL);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2014_10_28_175635_create_threads_table',2),(4,'2014_10_28_175710_create_messages_table',2),(5,'2014_10_28_180224_create_participants_table',2),(6,'2014_11_03_154831_add_soft_deletes_to_participants_table',2),(7,'2014_12_04_124531_add_softdeletes_to_threads_table',2),(8,'2017_03_30_152742_add_soft_deletes_to_messages_table',2),(9,'2019_07_24_133127_create_notifications_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES ('01a842f8-d9eb-473f-b4d5-9e73399dad49','App\\Notifications\\NewPostNotifi','App\\User',4,'{\"following_id\":1,\"following_name\":\"\\u30c6\\u30b9\\u30c82\",\"post_id\":10}',NULL,'2019-07-24 20:46:21','2019-07-24 20:46:21'),('036061d7-6869-4ace-a199-5db8351451fe','App\\Notifications\\NewPostNotifi','App\\User',3,'{\"following_id\":1,\"following_name\":\"\\u30c6\\u30b9\\u30c82\",\"post_id\":27}',NULL,'2019-10-21 19:45:38','2019-10-21 19:45:38'),('065daa0e-040f-4f6b-b1a1-5782b769c837','App\\Notifications\\NewPostNotifi','App\\User',3,'{\"following_id\":1,\"following_name\":\"\\u30e6\\u30a6\\u30b9\\u30b1\",\"post_id\":29}',NULL,'2019-10-21 20:06:01','2019-10-21 20:06:01'),('0b759396-df02-4c69-b01f-6dd429a29238','App\\Notifications\\NewPostNotifi','App\\User',4,'{\"following_id\":1,\"following_name\":\"\\u30e6\\u30a6\\u30b9\\u30b1\",\"post_id\":29}',NULL,'2019-10-21 20:06:01','2019-10-21 20:06:01'),('1083ca17-b44a-4ecd-a299-a67c0bbeea15','App\\Notifications\\NewPostNotifi','App\\User',3,'{\"following_id\":1,\"following_name\":\"\\u30c6\\u30b9\\u30c82\",\"post_id\":9}',NULL,'2019-07-24 20:15:01','2019-07-24 20:15:01'),('272b2664-fd4d-419a-bb45-478ba55ff185','App\\Notifications\\NewMessageNotifi','App\\User',3,'{\"message_id\":\"124\",\"receiver_id\":[\"1\"]}','2019-09-25 19:29:56','2019-09-25 19:00:24','2019-09-25 19:29:56'),('2731e144-181e-47e5-bd23-5818bdbbe3e3','App\\Notifications\\NewMessageNotifi','App\\User',1,'{\"message_id\":\"124\",\"sender_id\":3}',NULL,'2019-09-25 19:09:09','2019-09-25 19:09:09'),('31021878-caef-472a-be74-517c51c31c60','App\\Notifications\\NewPostNotifi','App\\User',3,'{\"following_id\":1,\"following_name\":\"\\u30c6\\u30b9\\u30c82\",\"post_id\":10}',NULL,'2019-07-24 20:46:21','2019-07-24 20:46:21'),('347fe2a3-3a7c-4809-9177-2702ab1d8990','App\\Notifications\\UserFollowedNotifi','App\\User',1,'{\"follower_id\":4,\"follower_name\":\"test2\"}',NULL,'2019-07-24 13:58:53','2019-07-24 13:58:53'),('35be78d1-10ae-4060-a589-036e792e73ea','App\\Notifications\\NewPostNotifi','App\\User',4,'{\"following_id\":1,\"following_name\":\"\\u30c6\\u30b9\\u30c82\",\"post_id\":27}',NULL,'2019-10-21 19:45:39','2019-10-21 19:45:39'),('3a6121db-4f16-469c-b973-2fd769624b9d','App\\Notifications\\UserFollowedNotifi','App\\User',1,'{\"follower_id\":4,\"follower_name\":\"test2\"}','2019-07-24 15:00:51','2019-07-24 14:48:06','2019-07-24 15:00:51'),('41480c36-01eb-423a-891b-10cd453151c0','App\\Notifications\\UserFollowedNotifi','App\\User',1,'{\"follower_id\":3,\"follower_name\":\"test4\"}',NULL,'2019-09-24 20:11:55','2019-09-24 20:11:55'),('43ed7f41-d2f5-4370-906d-097da533a6c9','App\\Notifications\\NewPostNotifi','App\\User',4,'{\"following_id\":1,\"following_name\":\"\\u30c6\\u30b9\\u30c82\",\"post_id\":11}',NULL,'2019-07-24 20:48:23','2019-07-24 20:48:23'),('443f8816-cc02-4f8d-ba1a-3b138bab28ce','App\\Notifications\\NewPostNotifi','App\\User',4,'{\"following_id\":1,\"following_name\":\"\\u30c6\\u30b9\\u30c82\",\"post_id\":10}',NULL,'2019-07-24 20:46:21','2019-07-24 20:46:21'),('4b2ff858-82f9-4164-890c-3b5030d72d47','App\\Notifications\\NewPostNotifi','App\\User',3,'{\"following_id\":1,\"following_name\":\"\\u30e6\\u30a6\\u30b9\\u30b1\",\"post_id\":28}',NULL,'2019-10-21 19:55:27','2019-10-21 19:55:27'),('58f94138-1b93-4208-93f4-1abe6a80385c','App\\Notifications\\NewMessageNotifi','App\\User',1,'{\"message_id\":\"124\",\"sender_id\":3}',NULL,'2019-09-25 19:10:02','2019-09-25 19:10:02'),('5e276abc-e7c9-4697-8793-7d7464701aa5','App\\Notifications\\NewPostNotifi','App\\User',5,'{\"following_id\":1,\"following_name\":\"\\u30c6\\u30b9\\u30c82\",\"post_id\":11}',NULL,'2019-07-24 20:48:23','2019-07-24 20:48:23'),('6847c2d7-1324-43cb-b48f-2f8f9454ea05','App\\Notifications\\NewPostNotifi','App\\User',3,'{\"following_id\":1,\"following_name\":\"\\u30c6\\u30b9\\u30c82\",\"post_id\":11}',NULL,'2019-07-24 20:48:22','2019-07-24 20:48:22'),('7360039e-0e23-4413-9adb-96ab29ad87b6','App\\Notifications\\NewPostNotifi','App\\User',5,'{\"following_id\":1,\"following_name\":\"\\u30c6\\u30b9\\u30c82\",\"post_id\":9}',NULL,'2019-07-24 20:15:01','2019-07-24 20:15:01'),('7b20d081-6507-4b0b-9f0b-206f907a85c6','App\\Notifications\\NewPostNotifi','App\\User',5,'{\"following_id\":1,\"following_name\":\"\\u30c6\\u30b9\\u30c82\",\"post_id\":10}',NULL,'2019-07-24 20:46:22','2019-07-24 20:46:22'),('7c1d3790-1873-4b61-b685-d321283a9946','App\\Notifications\\NewMessageNotifi','App\\User',3,'{\"message_id\":\"124\",\"receiver_id\":[\"1\"]}','2019-09-25 19:39:32','2019-09-25 18:55:26','2019-09-25 19:39:32'),('85593a73-c989-4ae0-aeb0-2cbd8812de7e','App\\Notifications\\NewPostNotifi','App\\User',1,'{\"following_id\":3,\"following_name\":\"test4\",\"post_id\":15}',NULL,'2019-09-25 18:26:44','2019-09-25 18:26:44'),('8881eba4-0dcc-4432-9f12-943ebd311dde','App\\Notifications\\NewPostNotifi','App\\User',4,'{\"following_id\":1,\"following_name\":\"\\u30c6\\u30b9\\u30c82\",\"post_id\":27}',NULL,'2019-10-21 19:45:39','2019-10-21 19:45:39'),('923791f2-f70b-47b3-bf9e-d4d39c64ea44','App\\Notifications\\UserFollowedNotifi','App\\User',1,'{\"follower_id\":3,\"follower_name\":\"test4\"}',NULL,'2019-09-24 20:45:40','2019-09-24 20:45:40'),('967c2df5-0c4c-4f7c-848b-cba9b4352c3b','App\\Notifications\\UserFollowedNotifi','App\\User',1,'{\"follower_id\":6,\"follower_name\":\"dating\"}',NULL,'2019-10-21 13:45:09','2019-10-21 13:45:09'),('96d6ef0e-023a-43aa-bba5-894b7ecd13c9','App\\Notifications\\UserFollowedNotifi','App\\User',1,'{\"follower_id\":3,\"follower_name\":\"test4\"}','2019-09-25 18:28:45','2019-09-24 20:47:06','2019-09-25 18:28:45'),('972dfb09-e274-4b26-ba5c-00609831da75','App\\Notifications\\NewMessageNotifi','App\\User',3,'{\"message_id\":\"124\",\"receiver_id\":[\"1\"]}','2019-09-25 19:39:42','2019-09-25 18:54:34','2019-09-25 19:39:42'),('98b6fa8e-7e39-4588-b4a4-83b85d06b5f5','App\\Notifications\\NewPostNotifi','App\\User',4,'{\"following_id\":1,\"following_name\":\"\\u30c6\\u30b9\\u30c82\",\"post_id\":11}',NULL,'2019-07-24 20:48:23','2019-07-24 20:48:23'),('a223cabb-af68-46e4-b412-e409cea63ecd','App\\Notifications\\NewMessageNotifi','App\\User',6,'{\"message_id\":\"124\",\"sender_id\":1}',NULL,'2019-10-21 19:48:45','2019-10-21 19:48:45'),('af3fa7aa-e898-45ab-b865-a41360279647','App\\Notifications\\NewPostNotifi','App\\User',4,'{\"following_id\":1,\"following_name\":\"\\u30c6\\u30b9\\u30c82\",\"post_id\":9}',NULL,'2019-07-24 20:15:01','2019-07-24 20:15:01'),('b38253a2-a768-4d97-bb5c-5cb386f3938b','App\\Notifications\\UserFollowedNotifi','App\\User',1,'{\"follower_id\":3,\"follower_name\":\"test4\"}',NULL,'2019-09-24 20:26:24','2019-09-24 20:26:24'),('c96098f9-70c3-487f-beaf-94aeb93b87bd','App\\Notifications\\NewPostNotifi','App\\User',5,'{\"following_id\":1,\"following_name\":\"\\u30c6\\u30b9\\u30c82\",\"post_id\":27}',NULL,'2019-10-21 19:45:39','2019-10-21 19:45:39'),('c9647425-16dd-48f3-a132-1ae269fad619','App\\Notifications\\NewMessageNotifi','App\\User',6,'{\"message_id\":\"124\",\"sender_id\":1}',NULL,'2019-10-21 20:04:56','2019-10-21 20:04:56'),('ce5606ca-6490-4fc7-b831-bf86f654a1cf','App\\Notifications\\NewPostNotifi','App\\User',5,'{\"following_id\":1,\"following_name\":\"\\u30e6\\u30a6\\u30b9\\u30b1\",\"post_id\":28}',NULL,'2019-10-21 19:55:27','2019-10-21 19:55:27'),('ceaf99f5-2cc7-4170-b593-c540a0239cdb','App\\Notifications\\NewPostNotifi','App\\User',1,'{\"following_id\":3,\"following_name\":\"test4\",\"post_id\":14}',NULL,'2019-09-25 18:26:18','2019-09-25 18:26:18'),('d1c7b2b7-a7ed-4d01-9fd5-a6ec925632ee','App\\Notifications\\NewMessageNotifi','App\\User',6,'{\"message_id\":\"124\",\"sender_id\":1}',NULL,'2019-10-21 19:54:23','2019-10-21 19:54:23'),('d83b156a-b012-41da-9925-a6da51d0a677','App\\Notifications\\NewPostNotifi','App\\User',5,'{\"following_id\":1,\"following_name\":\"\\u30e6\\u30a6\\u30b9\\u30b1\",\"post_id\":29}',NULL,'2019-10-21 20:06:01','2019-10-21 20:06:01'),('e2efc419-d155-47dc-84d1-4a9969cb6c9f','App\\Notifications\\NewPostNotifi','App\\User',4,'{\"following_id\":1,\"following_name\":\"\\u30e6\\u30a6\\u30b9\\u30b1\",\"post_id\":29}',NULL,'2019-10-21 20:06:01','2019-10-21 20:06:01'),('e50eb577-89c8-41f4-9539-6a80495ccadc','App\\Notifications\\NewPostNotifi','App\\User',4,'{\"following_id\":1,\"following_name\":\"\\u30e6\\u30a6\\u30b9\\u30b1\",\"post_id\":28}',NULL,'2019-10-21 19:55:27','2019-10-21 19:55:27'),('e8f35594-23fb-4935-8e9d-ac65c3d611fe','App\\Notifications\\NewPostNotifi','App\\User',1,'{\"following_id\":3,\"following_name\":\"test4\",\"post_id\":13}',NULL,'2019-09-25 18:03:38','2019-09-25 18:03:38'),('ef5e0ef3-888d-42f3-a555-3cd2d3729c5c','App\\Notifications\\NewPostNotifi','App\\User',4,'{\"following_id\":1,\"following_name\":\"\\u30e6\\u30a6\\u30b9\\u30b1\",\"post_id\":28}',NULL,'2019-10-21 19:55:27','2019-10-21 19:55:27'),('f6e5c278-d69f-48ac-a768-d4be3309b8b5','App\\Notifications\\UserFollowedNotifi','App\\User',3,'{\"follower_id\":1,\"follower_name\":\"\\u30c6\\u30b9\\u30c82\"}',NULL,'2019-09-25 18:03:12','2019-09-25 18:03:12'),('f97b8b8e-b97a-45f0-92c2-5c9a55577e15','App\\Notifications\\NewPostNotifi','App\\User',4,'{\"following_id\":1,\"following_name\":\"\\u30c6\\u30b9\\u30c82\",\"post_id\":9}',NULL,'2019-07-24 20:15:01','2019-07-24 20:15:01');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participants`
--

DROP TABLE IF EXISTS `participants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `thread_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `last_read` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participants`
--

LOCK TABLES `participants` WRITE;
/*!40000 ALTER TABLE `participants` DISABLE KEYS */;
INSERT INTO `participants` VALUES (1,1,1,'2019-07-20 18:46:48','2019-07-20 17:48:24','2019-07-20 18:46:48',NULL),(2,2,1,'2019-07-20 19:13:18','2019-07-20 17:49:47','2019-07-20 19:13:18',NULL),(3,2,3,'2019-07-20 18:20:45','2019-07-20 17:49:47','2019-07-20 18:20:45',NULL),(4,3,1,'2019-07-20 19:13:15','2019-07-20 17:52:46','2019-07-20 19:13:15',NULL),(5,3,3,'2019-07-20 21:12:41','2019-07-20 17:52:46','2019-07-20 21:12:41',NULL),(6,4,1,'2019-07-20 19:13:07','2019-07-20 17:53:27','2019-07-20 19:13:07',NULL),(7,4,2,NULL,'2019-07-20 17:53:27','2019-07-20 17:53:27',NULL),(8,5,3,'2019-07-20 18:20:23','2019-07-20 17:55:17','2019-07-20 18:20:23',NULL),(9,5,1,'2019-07-20 19:12:53','2019-07-20 17:55:17','2019-07-20 19:12:53',NULL),(10,6,1,'2019-07-20 19:13:40','2019-07-20 18:18:06','2019-07-20 19:13:40',NULL),(11,6,3,'2019-07-20 19:36:42','2019-07-20 18:18:06','2019-07-20 19:36:42',NULL),(12,7,1,'2019-07-20 19:12:59','2019-07-20 18:19:49','2019-07-20 19:12:59',NULL),(13,8,3,'2019-07-20 23:02:09','2019-07-20 19:14:17','2019-07-20 23:02:09',NULL),(14,8,1,'2019-07-20 19:34:31','2019-07-20 19:14:17','2019-07-20 19:34:31',NULL),(15,9,3,'2019-07-20 21:18:24','2019-07-20 21:18:24','2019-07-20 21:18:24',NULL),(16,9,1,'2019-07-20 21:21:47','2019-07-20 21:18:24','2019-07-20 21:21:47',NULL),(17,10,3,'2019-09-25 18:54:34','2019-09-25 18:54:34','2019-09-25 18:54:34',NULL),(18,10,1,NULL,'2019-09-25 18:54:34','2019-09-25 18:54:34',NULL),(19,11,3,'2019-09-25 18:55:26','2019-09-25 18:55:26','2019-09-25 18:55:26',NULL),(20,11,1,NULL,'2019-09-25 18:55:26','2019-09-25 18:55:26',NULL),(21,12,3,'2019-09-25 19:00:24','2019-09-25 19:00:24','2019-09-25 19:00:24',NULL),(22,12,1,NULL,'2019-09-25 19:00:24','2019-09-25 19:00:24',NULL),(23,13,3,'2019-09-25 19:08:07','2019-09-25 19:08:07','2019-09-25 19:08:07',NULL),(24,13,1,NULL,'2019-09-25 19:08:07','2019-09-25 19:08:07',NULL),(25,14,3,'2019-09-25 19:09:08','2019-09-25 19:09:08','2019-09-25 19:09:08',NULL),(26,14,1,NULL,'2019-09-25 19:09:08','2019-09-25 19:09:08',NULL),(27,15,3,'2019-09-25 19:10:02','2019-09-25 19:10:02','2019-09-25 19:10:02',NULL),(28,15,1,NULL,'2019-09-25 19:10:02','2019-09-25 19:10:02',NULL),(29,16,1,'2019-10-21 19:48:45','2019-10-21 19:48:45','2019-10-21 19:48:45',NULL),(30,16,6,NULL,'2019-10-21 19:48:45','2019-10-21 19:48:45',NULL),(31,17,1,'2019-10-21 19:54:22','2019-10-21 19:54:22','2019-10-21 19:54:22',NULL),(32,17,6,NULL,'2019-10-21 19:54:22','2019-10-21 19:54:22',NULL),(33,18,1,'2019-10-21 20:04:55','2019-10-21 20:04:55','2019-10-21 20:04:55',NULL),(34,18,6,NULL,'2019-10-21 20:04:55','2019-10-21 20:04:55',NULL);
/*!40000 ALTER TABLE `participants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_tag`
--

DROP TABLE IF EXISTS `post_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'POST ID',
  `tag_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'タグID',
  `status` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '状態',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COMMENT='POST--TAG';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_tag`
--

LOCK TABLES `post_tag` WRITE;
/*!40000 ALTER TABLE `post_tag` DISABLE KEYS */;
INSERT INTO `post_tag` VALUES (1,4,3,0,NULL,NULL),(2,2,3,0,NULL,NULL),(3,2,4,0,NULL,NULL),(4,4,4,0,NULL,NULL),(5,5,4,0,NULL,NULL),(6,6,4,0,NULL,NULL),(7,9,4,0,NULL,NULL),(8,10,5,0,NULL,NULL),(9,11,5,0,NULL,NULL),(10,12,4,0,NULL,NULL),(11,13,5,0,NULL,NULL),(12,14,5,0,NULL,NULL),(13,15,4,0,NULL,NULL),(14,17,3,0,NULL,NULL),(19,18,16,0,NULL,NULL),(20,19,17,0,NULL,NULL),(21,20,18,0,NULL,NULL),(23,22,19,0,NULL,NULL),(24,23,19,0,NULL,NULL),(25,24,19,0,NULL,NULL),(26,25,20,0,NULL,NULL),(27,25,21,0,NULL,NULL),(28,26,22,0,NULL,NULL),(29,27,23,0,NULL,NULL),(30,27,24,0,NULL,NULL),(31,27,25,0,NULL,NULL),(32,28,20,0,NULL,NULL),(33,28,24,0,NULL,NULL),(34,28,26,0,NULL,NULL),(35,29,23,0,NULL,NULL),(36,29,20,0,NULL,NULL),(37,1,20,0,NULL,NULL),(38,30,20,0,NULL,NULL),(40,32,28,0,NULL,NULL),(41,31,20,0,NULL,NULL),(42,34,17,0,NULL,NULL),(43,41,21,0,NULL,NULL),(44,42,23,0,NULL,NULL);
/*!40000 ALTER TABLE `post_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL COMMENT 'タイトル',
  `body` text COMMENT 'ボデイ',
  `category_id` int(10) unsigned DEFAULT '0' COMMENT 'カテゴリ',
  `user_id` int(10) unsigned DEFAULT '0' COMMENT '投稿主',
  `likes_count` int(10) unsigned DEFAULT '0' COMMENT 'いいね数',
  `thumbnail` varchar(200) DEFAULT NULL COMMENT 'サムネイルファイル名',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8 COMMENT='ポスト';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (30,'初めてです','初めまして、\r\nこのサイト気になって初めてみました〜\r\nよろしくお願いします。',NULL,7,0,'/storage/upload/RT4VQGSjmnlrtrMPZAUJZL5aGifAhmNpXsmfWyY4.jpeg','2019-11-26 17:56:41','2019-11-26 17:56:41'),(31,'Aaaaaaaa','<p>Bbbbbbbbb</p>',1,8,0,'/files/1/post_img_2/114.14348093810003.jpg','2019-11-26 18:27:27','2019-11-29 15:11:56'),(32,'流石です','<p>面白いぞこれ</p>',1,9,0,'/files/1/post_img_2/1.37ef73547bc686b7cd7ca28d5e29f7d3.jpg','2019-11-26 19:37:19','2019-11-29 15:12:10'),(33,'毎日という暇を、今日もあける。','<p>暇だよ</p>',1,10,1,'/files/1/post_img_2/11.9005b96a7417c16-6.jpg',NULL,'2019-11-29 15:14:48'),(34,'目標を作ろう！暇','<p>誰か会えないかな？</p>',1,11,1,'/files/1/post_img_2/102.aHR0cDovL2ltZzEuaW1ndG4uYmRpbWcuY29tL2l0L3U9MTY0NDgwMjAzOCwzODAyNjc4ODk1JmZtPTE1JmdwPTAuanBn.jpg',NULL,'2019-11-29 15:15:46'),(35,'暇女性が集まってきてる','<p>おじさまがいいです</p>',1,12,1,'/files/1/post_img_2/116.200906242054111670.jpg',NULL,'2019-11-29 15:18:20'),(36,'なぜかお金が貯まる人が','<p>「暇」にしている 75の習慣</p>',1,13,1,'/files/1/post_img_2/141.a620b621-b999-4f24-83e8-afe568f3880e.jpg',NULL,'2019-11-29 15:18:49'),(37,'小悪魔女子大生の暇日記','<p>会えないかな？</p>',1,10,1,'/files/1/post_img_2/139.42025344.jpg',NULL,'2019-11-29 15:19:41'),(38,'暇が悲鳴をあげるくらい','<p>暇を使い倒す方法</p>',1,14,1,'/files/1/post_img_2/14.1-1Z52R30K60-L.jpg',NULL,'2019-11-29 15:20:34'),(39,'暇の超具体的使用例。','<p>暇総数「4837」ねこの暇を公開します！</p>',1,15,1,'/files/1/post_img_2/12.200GQV2-2.jpg',NULL,'2019-11-29 15:22:13'),(40,'2万円','<p>のベストセラー本｢1日62分暇法｣が凄すぎる！</p>',1,16,1,'/files/1/post_img_2/110.2017-04-13-16-13-134681549430762.jpg',NULL,'2019-11-29 15:22:44'),(41,'暇史上','<p>最もはてなブックマークのついた暇 73選</p>',1,25,1,'/files/1/post_img_2/125.3638558161.jpg',NULL,'2019-11-29 15:23:13'),(42,'暇でカネを稼ぐ方法は9つしかない！',NULL,1,56,1,'/files/1/post_img_2/151.aHR0cDovL2ltZzEuZ3RpbWcuY29tL2VudC9waWNzL2h2MS8yNDcvMTU2LzEzOTkvOTEwMTAwMDIuanBn.jpg',NULL,'2019-11-29 15:24:16'),(43,'【人生楽しい！】','<p>お得な人生を送る暇大公開！</p>',1,7,1,'/files/1/img/Zyp1Gr7JMaQnmqAE0nABZItPNrB3fBYzMSDn1tnV.jpeg',NULL,'2019-11-27 17:52:04'),(44,'ネットで見れるすごい暇',NULL,1,34,1,'/files/1/post_img_2/154.20191003095827838.jpg',NULL,'2019-11-29 15:24:45'),(45,'素人の欠点を人と一緒に笑えるのは','<p>その人の暇です。</p>',1,44,1,'/files/1/post_img_2/148.sacwecwcx.jpeg',NULL,'2019-11-29 15:25:30'),(46,'暇初心者へ送る。','<p>衝撃的で斬新だった使用例を集めてみた</p>',1,70,1,'/files/1/post_img_2/149.b7fd495b4a65cba4e13464d9634deb12.jpg',NULL,'2019-11-29 15:25:55'),(47,'暇文章を書くための技法',NULL,1,76,1,'/files/1/post_img_2/156.1-1Z513142034-50.jpg',NULL,'2019-11-29 15:26:25'),(48,'とんでもない暇系ウェブアプリが出た',NULL,1,25,1,'/files/1/post_img_2/134.13451D300I530-1I08.jpg',NULL,'2019-11-29 15:17:49'),(49,'買ってよかった暇まとめサイト',NULL,1,73,1,'/files/1/post_img_2/170.a90hvh8657340770542.jpg',NULL,'2019-11-29 15:28:13'),(50,'おじさんでも出来た暇学習方法',NULL,1,46,1,'/files/1/post_img_2/174.a2854fa5209684c2b9c5a7891cfe55ce.jpg',NULL,'2019-11-29 15:29:15'),(51,'超夜更かしだったオタクが','<p>朝型人間になるために実行した暇の大切なこと13</p>',1,11,1,'/files/1/post_img_2/210.23543023725.jpg',NULL,'2019-11-29 15:31:52'),(52,'超簡単! ','暇の画像を6分で切り抜く方法まとめ',1,42,1,NULL,NULL,NULL),(53,'目標を作ろう！','遊びでもお金が貯まる目標管理方法',1,24,1,NULL,NULL,NULL),(54,'2019年に遊びを学んでどう感じたか','',1,32,1,NULL,NULL,NULL),(55,'遊びを定価の2割引きで買うための7つの法則。','',1,33,1,NULL,NULL,NULL),(56,'遊びの最強関数は遊び','まずこれだけ覚えて社会に出よう！',1,54,1,NULL,NULL,NULL),(57,'遊び！','美的に見える全43通りとそのコツの解説動画',1,13,1,NULL,NULL,NULL),(58,'遊びができる人と','できない人の具体的な違い',1,18,1,NULL,NULL,NULL),(59,'人生を素敵に変える今年1年の究極の遊び記事まとめ','',1,49,1,NULL,NULL,NULL),(60,'「遊び業界という無法地帯へ」','',1,28,1,NULL,NULL,NULL),(61,'おばさんでも出来た遊び学習方法','',1,16,1,NULL,NULL,NULL),(62,'おっぱいが大きかったので','遊びを辞めてポールダンサーになった話',1,64,1,NULL,NULL,NULL),(63,'これからが苦しんでいる。','どこの国のこれからが助けてもいいじゃないか。',1,77,1,NULL,NULL,NULL),(64,'妊娠中の旦那のこれからを美人は一生忘れない','',1,44,1,NULL,NULL,NULL),(65,'これからの発音が一瞬で上達する方法【母音編】','',1,55,1,NULL,NULL,NULL),(66,'印象が良いこれからの言い回し','',1,73,1,NULL,NULL,NULL),(67,'学校では教えないこれからの作り方(これからの知識)','',1,25,1,NULL,NULL,NULL),(68,'表やグラフが','<p>「見やすいね」と言われるこれからの小ワザ</p>',1,15,1,'/files/1/post_img_2/220.8b07128dc02d9a87e07c0c13af9c0eb6.jpg',NULL,'2019-11-29 15:32:40'),(69,'わたくしがLinuxサーバに','ログインしたらいつもやっているこれから',1,63,1,NULL,NULL,NULL),(70,'人生を素敵に変える今年2年の究極のこれから記事まとめ','',1,53,1,NULL,NULL,NULL),(71,'コピペで使える','オシャレなこれから見本 52 （全組み合わせ付）',1,34,1,NULL,NULL,NULL),(72,'必ず読んでおきたい','今までで最もブックマークされたこれからの本ベスト31',1,74,1,NULL,NULL,NULL),(73,'インターネットの出会いでとっておきの重宝している便利サイト','',1,24,1,NULL,NULL,NULL),(74,'あの超人気出会いがまた復活するらしい！','',1,33,1,NULL,NULL,NULL),(75,'少しの出会いで実装可能な76のjQuery小技集','',1,12,1,NULL,NULL,NULL),(76,'新入社員に叩き込んでいる88の具体的な仕事術を紹介するよ','',1,22,1,NULL,NULL,NULL),(77,'出会いコンプのニートでも','投資ゼロでTOEIC558に達するたったひとつの方法',1,25,1,NULL,NULL,NULL),(78,'出会いできない人たちが持つ6つの悪習慣【激震】','',1,45,1,NULL,NULL,NULL),(79,'出会いの汚れを真っ白にする裏技','',1,55,1,NULL,NULL,NULL),(80,'わたくしをお呼びした出会いが','総額36,545円で完璧に出来たお話',1,64,1,NULL,NULL,NULL),(81,'出会い業者の営業が仕組みや値段について書くよ',NULL,1,53,1,'/files/1/post_img_2/233.1431B50B62c0-11405032.jpg',NULL,'2019-11-29 15:36:24'),(82,'【悪用厳禁】出会いが超出来なくてダメアルバイト','ダメ社員だったお坊さんがいかに｢出会い｣を変えてできる社員となったか。',1,57,1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL COMMENT '名称',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COMMENT='タグ一覧';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (16,'情報','2019-10-21 17:08:18','2019-10-21 17:08:18'),(17,'画像','2019-10-21 18:52:41','2019-10-21 18:52:41'),(20,'友達募集','2019-10-21 19:36:24','2019-10-21 19:36:24'),(21,'遊び','2019-10-21 19:36:24','2019-10-21 19:36:24'),(23,'映画','2019-10-21 19:45:37','2019-10-21 19:45:37'),(27,'Test','2019-11-26 18:27:27','2019-11-26 18:27:27'),(28,'','2019-11-26 19:37:19','2019-11-26 19:37:19');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `threads`
--

DROP TABLE IF EXISTS `threads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `threads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `threads`
--

LOCK TABLES `threads` WRITE;
/*!40000 ALTER TABLE `threads` DISABLE KEYS */;
INSERT INTO `threads` VALUES (1,'Hello,','2019-07-20 17:48:24','2019-07-20 17:48:24',NULL),(2,'Test','2019-07-20 17:49:47','2019-07-20 17:49:47',NULL),(3,'Hello,','2019-07-20 17:52:45','2019-07-20 17:52:45',NULL),(4,'Hello,','2019-07-20 17:53:27','2019-07-20 17:53:27',NULL),(5,'Hello','2019-07-20 17:55:17','2019-07-20 17:55:17',NULL),(6,'onley for test4','2019-07-20 18:18:06','2019-07-20 18:18:54',NULL),(7,'to noboday','2019-07-20 18:19:49','2019-07-20 18:19:49',NULL),(8,'Hello.','2019-07-20 19:14:17','2019-07-20 19:34:12',NULL),(9,'TTTT','2019-07-20 21:18:24','2019-07-20 21:21:46',NULL),(10,'test','2019-09-25 18:54:34','2019-09-25 18:54:34',NULL),(11,'test','2019-09-25 18:55:26','2019-09-25 18:55:26',NULL),(12,'To trump sir','2019-09-25 19:00:23','2019-09-25 19:00:24',NULL),(13,'to trump','2019-09-25 19:08:07','2019-09-25 19:08:07',NULL),(14,'to trump','2019-09-25 19:09:08','2019-09-25 19:09:08',NULL),(15,'test','2019-09-25 19:10:02','2019-09-25 19:10:02',NULL),(16,'こんにちは','2019-10-21 19:48:45','2019-10-21 19:48:45',NULL),(17,'こんにちは','2019-10-21 19:54:22','2019-10-21 19:54:22',NULL),(18,'こんにちは','2019-10-21 20:04:55','2019-10-21 20:04:55',NULL);
/*!40000 ALTER TABLE `threads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'プロフィールサムネイル',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (7,'ツボ','aaa@aaa.com','/files/1/img/Zyp1Gr7JMaQnmqAE0nABZItPNrB3fBYzMSDn1tnV.jpeg',NULL,'$2y$10$lxcOli/VIAD5BhTCW3eyiuvqdsaqSIIPLVYxWgr0j9eEr04iqifWy',NULL,'2019-11-26 17:55:26','2019-11-27 16:10:34'),(8,'Matsuo','matsuo@otsubo.com','/files/1/img/VtnEK60h2xgRQRv4aCu6z33xFLfSFOB2jOVWJF3l.jpeg',NULL,'$2y$10$hgpow7fxENkUq00xAzJBd.tArClBc3G9raU38jGWKr33NgCIkDweS',NULL,'2019-11-26 18:26:32','2019-11-27 16:10:51'),(9,'ユウ','bbb@bbb.com','/files/1/post_img/1_1571654841.png',NULL,'$2y$10$P15p3YFynoSdnx2u3mBTR.CCYIL9n0TABZrPPlt4L9DcmMsJ8JbZ.',NULL,'2019-11-26 18:27:27','2019-11-27 16:10:13'),(10,'さな','a1@aaa.com','/files/1/icon_img/1.DkxxWohP_400x400.jpg',NULL,'12345678',NULL,NULL,'2019-11-27 17:39:00'),(11,'雫','a2@aaa.com','/files/1/icon_img/11.3.jpg',NULL,'12345678',NULL,NULL,'2019-11-27 17:39:13'),(12,'あき','a3@aaa.com','/files/1/icon_img/13.C9_3fJ8VwAAa6Bb.jpg',NULL,'12345678',NULL,NULL,'2019-11-27 17:39:21'),(13,'ユナ','a4@aaa.com','/files/1/icon_img/19.9aa26f6bb46830767ca494251dedfe83.jpg',NULL,'12345678',NULL,NULL,'2019-11-27 17:40:32'),(14,'こん','a5@aaa.com','/files/1/icon_img/2.q70Wap7I.jpg',NULL,'12345678',NULL,NULL,'2019-11-27 17:40:40'),(15,'なん','a6@aaa.com','/files/1/icon_img/20.s_skorea-41582.jpg',NULL,'12345678',NULL,NULL,'2019-11-27 17:40:54'),(16,'あんな','a7@aaa.com','/files/1/icon_img/21.0-5078-9-REU0NjU5ODEtQ0E2Ny00Q0ZFLTk3QTMtQzRCQUIwNDVCODYxLmpwZWc-r-.jpeg',NULL,'12345678',NULL,NULL,'2019-11-27 17:44:49'),(17,'ナナ','a8@aaa.com','/files/1/icon_img/23.0210.jpg',NULL,'12345678',NULL,NULL,'2019-11-27 17:45:00'),(18,'なぎさ','a9@aaa.com','/files/1/icon_img/26.1210385_615.jpg',NULL,'12345678',NULL,NULL,'2019-11-27 17:45:24'),(19,'リン','a10@aaa.com','/files/1/icon_img/28.921222.jpg',NULL,'12345678',NULL,NULL,'2019-11-27 17:45:38'),(20,'ヌヌキ','a11@aaa.com','/files/1/icon_img/29.7.jpg',NULL,'12345678',NULL,NULL,'2019-11-27 17:45:52'),(21,'ややか','a12@aaa.com','/files/1/icon_img/43.15306.jpg',NULL,'12345678',NULL,NULL,'2019-11-27 17:46:11'),(22,'さやか','a13@aaa.com','/files/1/icon_img/49.shutterstock_644254087-e1546954115986.jpg',NULL,'12345678',NULL,NULL,'2019-11-27 17:46:32'),(23,'らい','a14@aaa.com','/files/1/icon_img/56.1567144750801.jpg',NULL,'12345678',NULL,NULL,'2019-11-27 17:46:45'),(24,'みゅ','a15@aaa.com','/files/1/icon_img/41.cr7VfDAzvbETSPe_ZMNww_75.jpeg',NULL,'12345678',NULL,NULL,'2019-11-27 17:47:19'),(25,'夢','a16@aaa.com','/files/1/icon_img/18.14-kimura-noriko-saisyuu_01214259008925_xxlarge.jpg',NULL,'12345678',NULL,NULL,'2019-11-27 17:39:52'),(26,'Amu','a17@aaa.com','/files/1/icon_img/14.1518b52251720b6d5a20f97e7fe5a38f.jpg',NULL,'12345678',NULL,NULL,'2019-11-27 17:39:32'),(27,'チョコ','a18@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(28,'Love','a19@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(29,'エリカ','a20@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(30,'エマ','a21@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(31,'さとみ','a22@aaa.com','/files/1/icon_img/44.cityshop-190409-01-800x450.jpg',NULL,'12345678',NULL,NULL,'2019-11-27 17:48:20'),(32,'のりこ','a23@aaa.com','/files/1/icon_img/4.o0800120013936543707.jpg',NULL,'12345678',NULL,NULL,'2019-11-27 17:47:58'),(33,'みちよ','a24@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(34,'かおり','a25@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(35,'ゆりえ','a26@aaa.com','/files/1/icon_img/45.img_5fb0a2215c771c60e4d60bfb3073b2032275316.jpg',NULL,'12345678',NULL,NULL,'2019-11-27 17:48:34'),(36,'さおり','a27@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(37,'まゆみ','a28@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(38,'さやか','a29@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(39,'ふみこ','a30@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(40,'みさと','a31@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(41,'ゆきこ','a32@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(42,'さとみ','a33@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(43,'はるよ','a34@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(44,'かづき','a35@aaa.com','/files/1/icon_img/55.135865749_14803809210651n.jpg',NULL,'12345678',NULL,NULL,'2019-11-27 17:49:36'),(45,'わかば','36a@aaa.com','/files/1/icon_img/50.750380eb3e7cabd6fa1534f61cc9d75647ff6d0f.png',NULL,'12345678',NULL,NULL,'2019-11-27 17:49:19'),(46,'ありな','a37@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(47,'えりか','a38@aaa.com','/files/1/icon_img/25.20180630_japan1_gi-650x433.jpg',NULL,'12345678',NULL,NULL,'2019-11-27 17:41:10'),(48,'すみえ','a39@aaa.com','/files/1/icon_img/46.iwate3-1-1.jpg',NULL,'12345678',NULL,NULL,'2019-11-27 17:48:55'),(49,'あんな','a40@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(50,'ふゆか','a41@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(51,'さえこ','a42@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(52,'ふみよ','a43@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(53,'ひろえ','a44@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(54,'ちえこ','a45@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(55,'えみこ','a46@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(56,'ちかこ','a47@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(57,'さゆみ','a48@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(58,'むつえ','a49@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(59,'ゆきみ','a50@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(60,'のどか','a51@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(61,'ありさ','a52@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(62,'まきこ','a53@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(63,'ゆうか','a54@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(64,'まゆみ','a55@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(65,'ゆうな','a56@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(66,'りえこ','a57@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(67,'さちえ','a58@aaa.com','/files/1/icon_img/61.20170904092412247.jpg',NULL,'12345678',NULL,NULL,'2019-11-27 17:49:54'),(68,'りさこ','a59@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(69,'さだみ','a60@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(70,'さりな','a61@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(71,'くによ','a62@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(72,'あやみ','a63@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(73,'ゆきこ','a64@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(74,'りさこ','a65@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(75,'つきみ','a66@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(76,'かずこ','a67@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(77,'かつき','a68@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(78,'なつよ','a69@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(79,'はるか','a70@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(80,'よしみ','a71@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(81,'えりか','a72@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(82,'かよこ','a73@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(83,'まさえ','a74@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(84,'ななこ','a75@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(85,'はるな','a76@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(86,'ゆかり','a77@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(87,'あさり','a78@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(88,'あづさ','a79@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL),(89,'けいな','a80@aaa.com',NULL,NULL,'12345678',NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-12  7:17:41
