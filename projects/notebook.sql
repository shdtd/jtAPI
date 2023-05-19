-- MariaDB dump 10.19  Distrib 10.6.12-MariaDB, for Linux (x86_64)
--
-- Host: db    Database: notebook
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2023_04_18_105602_create_notebook_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notebook`
--

DROP TABLE IF EXISTS `notebook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notebook` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notebook`
--

LOCK TABLES `notebook` WRITE;
/*!40000 ALTER TABLE `notebook` DISABLE KEYS */;
INSERT INTO `notebook` VALUES (2,'Наталья Горбунова','ООО Восход','(918) 724-6932','nata@voshod.ru','31/07/1979','9275debecfa732f17f8c711d247d83fa.jpeg','2023-04-19 22:53:06','2023-04-22 06:01:11'),(3,'Алёна Голубева','ООО Серафима','(495) 429-8856','hlukin@list.ru','20/05/1977','b3ddc5cad9593747f9ce5154e75786ee.jpeg','2023-04-19 22:53:06','2023-04-22 06:01:22'),(4,'Радислав Медведев','','+7 (922) 340-2205','vladislav.kuznecova@kuzmina.org','30/01/1995','ad1bc0e6e1d86e941225333faa9f1922.jpeg','2023-04-19 22:53:06','2023-04-22 06:03:11'),(6,'Вероника Киселёв','','(812) 139-49-10','nika.knazeva@hotmail.com','23/01/1991','304801aeb824a69c7020367ebf716a05.jpeg','2023-04-19 22:53:06','2023-04-22 06:03:33'),(7,'Валериан Кузьмина','ОАО Реч','+7 (922) 142-2796','german02@mail.ru','','c589ecdd5d94e6340f855a1472d1c378.jpeg','2023-04-19 22:53:06','2023-04-22 06:03:49'),(9,'Анатолий Белоусова','ПАО МорВодВектор','(812) 619-36-03','svetlana.arhipov@hotmail.com','','9b3bc8e7031a7c6719852bf9323816f1.jpeg','2023-04-19 22:53:06','2023-04-22 06:04:00'),(10,'Искра Назаров','','8-800-238-4894','miroslav.vinogradov@turov.com','23/02/1981','','2023-04-19 22:53:06','2023-04-19 22:53:06'),(14,'Алла Власов','ООО Компания ТверьФинансХозБанк','7 (922) 333-3923','dara.efimov@baranov.ru','09/04/1986','','2023-04-20 02:57:37','2023-04-20 03:00:26'),(15,'Иван Петров','ООО Телесистемы','+7 (912) 328-2831','ivan@petrov.ru','11/12/1991','4bba3f809a57bddb7617a657eaa02fe0.jpeg','2023-04-21 06:38:50','2023-04-22 06:01:48'),(16,'Лисицин Сергей','','+7 (919) 987-2976','user512@mail.ru','','','2023-04-21 07:01:40','2023-04-21 07:01:40'),(47,'Бронислав Бобылёв','ОАО Сантех','8-800-298-2040','rozalina.sokolova@gmail.com','18/12/1973','','2023-04-22 05:47:38','2023-04-22 05:47:38'),(48,'Пётр Силин','МКК ИнжРемITЛизинг','(35222) 40-0526','tretakova.izabella@gmail.com','26/08/1993','','2023-04-22 05:47:38','2023-04-22 05:47:38'),(49,'Марк Некрасова','','+7 (922) 828-8833','tkopylov@mail.ru','','','2023-04-22 05:47:38','2023-04-22 05:47:38'),(50,'Лилия Алексеева','','8-800-245-9354','ignatij.kononova@ya.ru','','','2023-04-22 05:47:38','2023-04-22 05:47:38'),(51,'Дина Рогова','ООО АвтоГаз','(495) 351-5010','galina48@strelkov.net','','','2023-04-22 05:47:38','2023-04-22 05:47:38'),(52,'Яна Гордеева','ООО Креп','+7 (922) 601-2947','gordej.orlova@muhin.ru','','','2023-04-22 05:47:38','2023-04-22 05:47:38'),(53,'Иммануил Лукин','МФО ВостокМеталГараж','(35222) 79-7076','sorokin.fedor@makarov.com','08/09/1971','','2023-04-22 05:47:38','2023-04-22 05:47:38'),(54,'Юлий Максимов','','(35222) 61-7175','sgalkina@yandex.ru','20/07/1978','','2023-04-22 05:47:38','2023-04-22 05:47:38'),(55,'Мария Гордеев','','(812) 920-83-59','garri08@naumova.com','07/11/1988','','2023-04-22 05:47:38','2023-04-22 05:47:38'),(56,'Лариса Некрасов','ОАО РемЦементХмель','8-800-202-4833','panova.dina@yandex.ru','','','2023-04-22 05:47:38','2023-04-22 05:47:38'),(57,'Лариса Мартынова','ЗАО Финанс','(495) 471-4657','ulian.gulaeva@akusev.com','','','2023-04-22 05:47:41','2023-04-22 05:47:41'),(58,'Денис Федосеев','ПАО ИнфоМясГлав','(495) 164-3062','viktor.akuseva@konovalova.ru','','','2023-04-22 05:47:41','2023-04-22 05:47:41'),(59,'Розалина Суворова','','(495) 302-1768','izolda.kudravceva@ya.ru','15/06/1974','','2023-04-22 05:47:41','2023-04-22 05:47:41'),(60,'Анжелика Филиппов','МКК Монтаж','(812) 974-64-11','larisa39@inbox.ru','','','2023-04-22 05:47:41','2023-04-22 05:47:41'),(61,'Макар Некрасов','','(35222) 75-6113','taisia.lihacev@hotmail.com','','','2023-04-22 05:47:41','2023-04-22 05:47:41'),(62,'Эльвира Дмитриев','ООО ТелекомСервис','(812) 466-33-29','esoboleva@grisin.ru','','','2023-04-22 05:47:41','2023-04-22 05:47:41'),(63,'Нина Игнатьев','','8-800-682-6568','david61@gordeeva.ru','12/02/1981','','2023-04-22 05:47:41','2023-04-22 05:47:41'),(64,'Евгения Матвеева','','(495) 712-9902','markov.vera@narod.ru','','','2023-04-22 05:47:41','2023-04-22 05:47:41'),(65,'Виталий Некрасов','','8-800-746-0219','sgolubeva@yandex.ru','14/03/1980','','2023-04-22 05:47:41','2023-04-22 05:47:41'),(66,'Клим Устинова','МФО СервисОрион','(812) 629-20-72','ezuravlev@rambler.ru','','','2023-04-22 05:47:41','2023-04-22 05:47:41');
/*!40000 ALTER TABLE `notebook` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-06 12:09:35
