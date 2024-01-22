-- MySQL dump 10.13  Distrib 8.2.0, for Win64 (x86_64)
--
-- Host: localhost    Database: fhopeonl_gestion_fhope
-- ------------------------------------------------------
-- Server version	8.2.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `banco`
--

LOCK TABLES `banco` WRITE;
/*!40000 ALTER TABLE `banco` DISABLE KEYS */;
/*!40000 ALTER TABLE `banco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (1,'EVER VILLATORO','89343530',NULL,NULL,1,'2023-06-02 22:40:58','2023-06-02 22:40:58');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (2,'ALEJANDRO','99146990',NULL,NULL,1,'2023-06-02 22:59:36','2023-06-02 22:59:36');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (3,'MARY','94984220',NULL,NULL,1,'2023-06-02 23:06:41','2023-06-02 23:06:41');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (4,'JENNY MERAZ','94710538',NULL,NULL,1,'2023-06-02 23:15:33','2023-06-02 23:15:33');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (5,'JOSUE','96639681',NULL,NULL,1,'2023-06-02 23:18:30','2023-06-02 23:18:30');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (6,'EDGAR PORTILLO','32346877',NULL,NULL,1,'2023-06-02 23:20:42','2023-06-02 23:20:42');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (7,'ECNYER','97167236',NULL,NULL,1,'2023-06-02 23:24:48','2023-06-02 23:24:48');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (8,'ANDY','99461649','NA',NULL,1,'2023-06-03 22:41:02','2023-06-03 22:41:02');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (9,'JUSTIN MEDINA','94036513',NULL,NULL,1,'2023-06-06 17:57:12','2023-06-06 17:57:12');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (14,'ZAMIR VARGAS','87300519',NULL,'0801200421798',1,'2023-06-07 17:05:53','2023-06-07 17:05:53');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (15,'JOSE NUÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã‹Å“EZ','89272373',NULL,'1207199800097',1,'2023-06-07 17:21:35','2023-06-07 17:21:35');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (16,'ARIEL','33869353',NULL,NULL,1,'2023-06-09 21:44:38','2023-06-09 21:44:38');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (17,'RICARDO ORDOÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã‹Å“EZ','88566567',NULL,'0602199200015',1,'2023-06-09 23:59:19','2023-06-09 23:59:19');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (19,'JIMMY ALEXANDER REYES','94054252',NULL,'0801200010073',1,'2023-06-10 00:00:49','2023-06-10 00:00:49');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (20,'BANESSA BAQUEDANO','32417506',NULL,NULL,1,'2023-06-10 00:02:01','2023-06-10 00:02:01');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (21,'JOSIMAR CALIX','98802060',NULL,NULL,1,'2023-06-10 00:02:43','2023-06-10 00:02:43');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (24,'GERARDO LOPEZ','33224568',NULL,'080148488897',2,'2023-06-24 14:57:26','2023-06-28 14:04:56');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (26,'CESAR ROBERTO WILL','87998579',NULL,NULL,1,'2023-06-28 14:09:06','2023-06-28 14:09:06');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (27,'CESAR ROBERTO WILL','87998579',NULL,NULL,2,'2023-06-28 14:09:06','2023-06-28 14:09:34');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (28,'CRISTIAN SAMUEL ALVARADO','94863638',NULL,NULL,1,'2023-06-28 14:34:45','2023-06-28 14:34:45');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (29,'SERGIO FLORES','94978695',NULL,'0801199503369',1,'2023-07-06 06:57:37','2023-07-06 06:57:37');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (30,'BICS ESPINO','89014766',NULL,'0801199303966',1,'2023-07-06 06:58:43','2023-07-06 06:58:43');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (31,'ANDERSON PALENCIA','97591279',NULL,'0801200217905',1,'2023-07-12 00:34:19','2023-07-12 00:34:19');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (32,'JAZMIN','33411046',NULL,NULL,1,'2023-07-12 00:34:54','2023-07-12 00:34:54');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (33,'EDIN ABRAHAM ANDINO SIERRA','95213164',NULL,'0818199700017',1,'2023-07-17 19:53:50','2023-07-17 19:53:50');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (34,'SARA PAVON','32168972',NULL,NULL,1,'2023-07-17 19:56:01','2023-07-17 19:56:01');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (36,'YANELY FONSECA','98277914',NULL,NULL,1,'2023-07-17 19:57:04','2023-07-17 19:57:04');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (37,'VICTOR JOSUE RAMOS','33581468',NULL,'0801199200077',1,'2023-08-18 19:40:42','2023-08-18 19:40:42');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (38,'DAVID ALEJANDRO FONSECA','88404649',NULL,NULL,1,'2023-08-18 19:41:32','2023-08-18 19:41:32');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (41,'BRAYAN FONSECA','0',NULL,NULL,1,'2023-08-30 17:05:20','2023-08-30 17:05:20');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (42,'FRANKLIN MONCADA','32589653',NULL,'08012000203970',1,'2023-08-30 17:12:40','2023-08-30 17:12:40');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (43,'JOSUE','31715931',NULL,NULL,1,'2023-08-30 18:28:42','2023-08-30 18:28:42');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (44,'MELISSA GALEAS','95136079',NULL,NULL,1,'2023-10-13 05:16:46','2023-10-13 05:16:46');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (45,'IRVIN','89754178',NULL,NULL,1,'2023-10-13 05:28:53','2023-10-13 05:28:53');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (46,'BRENDA','33954089',NULL,NULL,1,'2023-12-02 23:02:15','2023-12-02 23:02:15');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (47,'HELEN ORELLANA','0',NULL,NULL,1,'2023-12-02 23:03:14','2023-12-02 23:03:14');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (49,'JONATHAN','33175134',NULL,NULL,1,'2023-12-02 23:03:59','2023-12-02 23:03:59');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (50,'JOSUE ARTURO SIERRA','0',NULL,NULL,1,'2023-12-02 23:29:43','2023-12-02 23:29:43');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (51,'CARLOS PONCE','97717966',NULL,NULL,2,'2023-12-02 23:41:49','2023-12-02 23:42:03');
INSERT INTO `cliente` (`id`, `cliente_nom`, `cliente_tel`, `cliente_correo`, `cliente_DNI`, `estado`, `created_at`, `updated_at`) VALUES (52,'CARLOS PONCE','97717966',NULL,NULL,1,'2023-12-02 23:41:49','2023-12-02 23:41:49');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `colaborador`
--

LOCK TABLES `colaborador` WRITE;
/*!40000 ALTER TABLE `colaborador` DISABLE KEYS */;
/*!40000 ALTER TABLE `colaborador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `color`
--

LOCK TABLES `color` WRITE;
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
/*!40000 ALTER TABLE `color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cuenta`
--

LOCK TABLES `cuenta` WRITE;
/*!40000 ALTER TABLE `cuenta` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuenta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cuentabancaria`
--

LOCK TABLES `cuentabancaria` WRITE;
/*!40000 ALTER TABLE `cuentabancaria` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuentabancaria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `detalle_producto_venta`
--

LOCK TABLES `detalle_producto_venta` WRITE;
/*!40000 ALTER TABLE `detalle_producto_venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_producto_venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `detallebanco`
--

LOCK TABLES `detallebanco` WRITE;
/*!40000 ALTER TABLE `detallebanco` DISABLE KEYS */;
/*!40000 ALTER TABLE `detallebanco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `detalleventa`
--

LOCK TABLES `detalleventa` WRITE;
/*!40000 ALTER TABLE `detalleventa` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalleventa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `errores`
--

LOCK TABLES `errores` WRITE;
/*!40000 ALTER TABLE `errores` DISABLE KEYS */;
/*!40000 ALTER TABLE `errores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` (`id`, `valor`, `created_at`, `updated_at`) VALUES (1,'ACTIVO','2023-07-15 22:25:36','2023-07-15 22:25:36');
INSERT INTO `estado` (`id`, `valor`, `created_at`, `updated_at`) VALUES (2,'INACTIVO','2023-07-15 22:25:36','2023-07-15 22:25:36');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES (65,'9beea08b-92af-411d-9d57-e8f2b2976b13','database','default','{\"uuid\":\"9beea08b-92af-411d-9d57-e8f2b2976b13\",\"displayName\":\"App\\\\Jobs\\\\ExecuteClosure\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ExecuteClosure\",\"command\":\"O:23:\\\"App\\\\Jobs\\\\ExecuteClosure\\\":2:{s:11:\\\"descripcion\\\";s:45:\\\"CIERRE DE BASE DE DATOS - 2024-01-21 16:13:48\\\";s:10:\\\"connection\\\";s:8:\\\"database\\\";}\"}}','ErrorException: fgets(): SSL: Se ha forzado la interrupción de una conexión existente por el host remoto in C:\\APPFHOPE\\vendor\\symfony\\mailer\\Transport\\Smtp\\Stream\\AbstractStream.php:80\nStack trace:\n#0 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bootstrap\\HandleExceptions.php(255): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'fgets(): SSL: S...\', \'C:\\\\APPFHOPE\\\\ven...\', 80)\n#1 [internal function]: Illuminate\\Foundation\\Bootstrap\\HandleExceptions->Illuminate\\Foundation\\Bootstrap\\{closure}(2, \'fgets(): SSL: S...\', \'C:\\\\APPFHOPE\\\\ven...\', 80)\n#2 C:\\APPFHOPE\\vendor\\symfony\\mailer\\Transport\\Smtp\\Stream\\AbstractStream.php(80): fgets(Resource id #992)\n#3 C:\\APPFHOPE\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(346): Symfony\\Component\\Mailer\\Transport\\Smtp\\Stream\\AbstractStream->readLine()\n#4 C:\\APPFHOPE\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(200): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->getFullResponse()\n#5 C:\\APPFHOPE\\vendor\\symfony\\mailer\\Transport\\Smtp\\EsmtpTransport.php(117): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->executeCommand(\'NOOP\\r\\n\', Array)\n#6 C:\\APPFHOPE\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(316): Symfony\\Component\\Mailer\\Transport\\Smtp\\EsmtpTransport->executeCommand(\'NOOP\\r\\n\', Array)\n#7 C:\\APPFHOPE\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(209): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->ping()\n#8 C:\\APPFHOPE\\vendor\\symfony\\mailer\\Transport\\AbstractTransport.php(69): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->doSend(Object(Symfony\\Component\\Mailer\\SentMessage))\n#9 C:\\APPFHOPE\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(137): Symfony\\Component\\Mailer\\Transport\\AbstractTransport->send(Object(Symfony\\Component\\Mime\\Email), Object(Symfony\\Component\\Mailer\\DelayedEnvelope))\n#10 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(573): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->send(Object(Symfony\\Component\\Mime\\Email), Object(Symfony\\Component\\Mailer\\DelayedEnvelope))\n#11 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(335): Illuminate\\Mail\\Mailer->sendSymfonyMessage(Object(Symfony\\Component\\Mime\\Email))\n#12 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(205): Illuminate\\Mail\\Mailer->send(\'success\', Array, Object(Closure))\n#13 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#14 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(198): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#15 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(357): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\Mailer))\n#16 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(301): Illuminate\\Mail\\Mailer->sendMailable(Object(App\\Mail\\PersonaSuccessEmail))\n#17 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\PendingMail.php(124): Illuminate\\Mail\\Mailer->send(Object(App\\Mail\\PersonaSuccessEmail))\n#18 C:\\APPFHOPE\\app\\Listeners\\ClosureFinished.php(40): Illuminate\\Mail\\PendingMail->send(Object(App\\Mail\\PersonaSuccessEmail))\n#19 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Events\\Dispatcher.php(478): App\\Listeners\\ClosureFinished->handle(Object(App\\Events\\SendEmailPostClosure))\n#20 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Events\\Dispatcher.php(286): Illuminate\\Events\\Dispatcher->Illuminate\\Events\\{closure}(\'App\\\\Events\\\\Send...\', Array)\n#21 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Events\\Dispatcher.php(266): Illuminate\\Events\\Dispatcher->invokeListeners(\'App\\\\Events\\\\Send...\', Array, false)\n#22 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\helpers.php(433): Illuminate\\Events\\Dispatcher->dispatch(\'App\\\\Events\\\\Send...\')\n#23 C:\\APPFHOPE\\app\\Jobs\\ExecuteClosure.php(90): event(Object(App\\Events\\SendEmailPostClosure))\n#24 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\ExecuteClosure->handle()\n#25 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#26 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#27 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#28 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#29 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#30 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\ExecuteClosure))\n#31 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\ExecuteClosure))\n#32 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#33 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(123): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\ExecuteClosure), false)\n#34 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\ExecuteClosure))\n#35 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\ExecuteClosure))\n#36 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#37 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\ExecuteClosure))\n#38 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#39 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#40 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#41 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#42 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(137): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#43 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(120): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#44 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#45 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#46 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#47 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#48 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#49 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#50 C:\\APPFHOPE\\vendor\\symfony\\console\\Command\\Command.php(326): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#51 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(180): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#52 C:\\APPFHOPE\\vendor\\symfony\\console\\Application.php(1096): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#53 C:\\APPFHOPE\\vendor\\symfony\\console\\Application.php(324): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#54 C:\\APPFHOPE\\vendor\\symfony\\console\\Application.php(175): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#55 C:\\APPFHOPE\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(201): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#56 C:\\APPFHOPE\\artisan(35): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#57 {main}','2024-01-21 22:14:10');
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `httperrors`
--

LOCK TABLES `httperrors` WRITE;
/*!40000 ALTER TABLE `httperrors` DISABLE KEYS */;
/*!40000 ALTER TABLE `httperrors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `inventory_header`
--

LOCK TABLES `inventory_header` WRITE;
/*!40000 ALTER TABLE `inventory_header` DISABLE KEYS */;
INSERT INTO `inventory_header` (`id`, `id_producto`, `total_stock`, `estado`, `created_at`, `updated_at`) VALUES (33,1,0,1,'2024-01-21 06:00:00','2024-01-21 06:00:00');
INSERT INTO `inventory_header` (`id`, `id_producto`, `total_stock`, `estado`, `created_at`, `updated_at`) VALUES (34,2,0,1,'2024-01-21 06:00:00','2024-01-21 06:00:00');
INSERT INTO `inventory_header` (`id`, `id_producto`, `total_stock`, `estado`, `created_at`, `updated_at`) VALUES (35,4,0,1,'2024-01-21 06:00:00','2024-01-21 06:00:00');
INSERT INTO `inventory_header` (`id`, `id_producto`, `total_stock`, `estado`, `created_at`, `updated_at`) VALUES (36,5,0,1,'2024-01-21 06:00:00','2024-01-21 06:00:00');
INSERT INTO `inventory_header` (`id`, `id_producto`, `total_stock`, `estado`, `created_at`, `updated_at`) VALUES (37,6,0,1,'2024-01-21 06:00:00','2024-01-21 06:00:00');
/*!40000 ALTER TABLE `inventory_header` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES (133,'default','{\"uuid\":\"a3f2ba8c-50a9-4260-a1b3-ce4b3c0fa6bf\",\"displayName\":\"App\\\\Jobs\\\\ExecuteClosure\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ExecuteClosure\",\"command\":\"O:23:\\\"App\\\\Jobs\\\\ExecuteClosure\\\":2:{s:11:\\\"descripcion\\\";s:45:\\\"CIERRE DE BASE DE DATOS - 2024-01-21 16:20:04\\\";s:10:\\\"connection\\\";s:8:\\\"database\\\";}\"}}',1,1705875605,1705875604,1705875604);
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `models`
--

LOCK TABLES `models` WRITE;
/*!40000 ALTER TABLE `models` DISABLE KEYS */;
/*!40000 ALTER TABLE `models` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `moneda`
--

LOCK TABLES `moneda` WRITE;
/*!40000 ALTER TABLE `moneda` DISABLE KEYS */;
/*!40000 ALTER TABLE `moneda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` (`id`, `producto_nom`, `producto_des`, `precio`, `estado`, `created_at`, `updated_at`) VALUES (1,'CHAQUETA JEAN DE CAPUCHA','CHAQUETA JEAN CON PARCHADOS EN LAS MANGAS Y EN LA CAPUCHA',800.00,1,'2023-06-03 04:46:40','2023-06-03 04:46:40');
INSERT INTO `producto` (`id`, `producto_nom`, `producto_des`, `precio`, `estado`, `created_at`, `updated_at`) VALUES (2,'CHAQUETAS DE JEAN DE MUJER','CHAQUETAS DE JEAN DE MUJER, MANGA BAJA - SLIM FIT',960.00,1,'2023-06-03 04:47:38','2023-07-06 04:36:37');
INSERT INTO `producto` (`id`, `producto_nom`, `producto_des`, `precio`, `estado`, `created_at`, `updated_at`) VALUES (4,'CHAQUETA JEAN ROTA UNISEX','CHAQUETA JEAN DE COLORES VARIADOS, ESTILO ROTO',850.00,1,'2023-06-03 04:51:52','2023-06-03 04:51:52');
INSERT INTO `producto` (`id`, `producto_nom`, `producto_des`, `precio`, `estado`, `created_at`, `updated_at`) VALUES (5,'CHAQUETA ALCOLCHADA FELPA','CHAQUETA ALCOLCHADA DE CUADROS, FORRO DE FELPA',850.00,1,'2023-06-03 04:53:18','2023-06-03 04:53:18');
INSERT INTO `producto` (`id`, `producto_nom`, `producto_des`, `precio`, `estado`, `created_at`, `updated_at`) VALUES (6,'CHAQUETA IMPERMEABLES','Estilo Casual',980.00,1,'2023-06-10 06:14:09','2023-06-10 06:14:09');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `puesto`
--

LOCK TABLES `puesto` WRITE;
/*!40000 ALTER TABLE `puesto` DISABLE KEYS */;
/*!40000 ALTER TABLE `puesto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `servicios`
--

LOCK TABLES `servicios` WRITE;
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
INSERT INTO `servicios` (`id`, `service_name`, `endpoint`, `estado`, `created_at`, `updated_at`, `method`) VALUES (1,'2','2',1,NULL,NULL,NULL);
INSERT INTO `servicios` (`id`, `service_name`, `endpoint`, `estado`, `created_at`, `updated_at`, `method`) VALUES (100,'TRASFORMACION_ERROR','http://services.fhope.online/api/errorGeneric',1,NULL,NULL,'POST');
INSERT INTO `servicios` (`id`, `service_name`, `endpoint`, `estado`, `created_at`, `updated_at`, `method`) VALUES (101,'TRASFORMACION_ERROR_HTTP','http://services.fhope.online/api/error/basic',1,NULL,NULL,'POST');
INSERT INTO `servicios` (`id`, `service_name`, `endpoint`, `estado`, `created_at`, `updated_at`, `method`) VALUES (102,'getTableNamesRest','http://localhost:8002/api/config/getTablesNamesRest',1,NULL,NULL,'POST');
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `size`
--

LOCK TABLES `size` WRITE;
/*!40000 ALTER TABLE `size` DISABLE KEYS */;
/*!40000 ALTER TABLE `size` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tablesnodebugables`
--

LOCK TABLES `tablesnodebugables` WRITE;
/*!40000 ALTER TABLE `tablesnodebugables` DISABLE KEYS */;
INSERT INTO `tablesnodebugables` (`id`, `name`) VALUES (1,'users');
INSERT INTO `tablesnodebugables` (`id`, `name`) VALUES (2,'producto');
INSERT INTO `tablesnodebugables` (`id`, `name`) VALUES (3,'servicios');
INSERT INTO `tablesnodebugables` (`id`, `name`) VALUES (4,'cliente');
INSERT INTO `tablesnodebugables` (`id`, `name`) VALUES (5,'tablesnodebugables');
INSERT INTO `tablesnodebugables` (`id`, `name`) VALUES (6,'estado');
INSERT INTO `tablesnodebugables` (`id`, `name`) VALUES (7,'httperrors');
INSERT INTO `tablesnodebugables` (`id`, `name`) VALUES (8,'roles');
INSERT INTO `tablesnodebugables` (`id`, `name`) VALUES (9,'moneda');
INSERT INTO `tablesnodebugables` (`id`, `name`) VALUES (10,'banco');
INSERT INTO `tablesnodebugables` (`id`, `name`) VALUES (11,'cuenta');
INSERT INTO `tablesnodebugables` (`id`, `name`) VALUES (12,'puesto');
INSERT INTO `tablesnodebugables` (`id`, `name`) VALUES (13,'size');
INSERT INTO `tablesnodebugables` (`id`, `name`) VALUES (14,'transaccion');
INSERT INTO `tablesnodebugables` (`id`, `name`) VALUES (15,'color');
INSERT INTO `tablesnodebugables` (`id`, `name`) VALUES (16,'errores');
INSERT INTO `tablesnodebugables` (`id`, `name`) VALUES (17,'inventory_header');
INSERT INTO `tablesnodebugables` (`id`, `name`) VALUES (18,'inventory');
INSERT INTO `tablesnodebugables` (`id`, `name`) VALUES (19,'colaborador');
INSERT INTO `tablesnodebugables` (`id`, `name`) VALUES (20,'cuentabancaria');
/*!40000 ALTER TABLE `tablesnodebugables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `testtemp`
--

LOCK TABLES `testtemp` WRITE;
/*!40000 ALTER TABLE `testtemp` DISABLE KEYS */;
/*!40000 ALTER TABLE `testtemp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `transaccion`
--

LOCK TABLES `transaccion` WRITE;
/*!40000 ALTER TABLE `transaccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `user`, `intentos`, `token`, `estado`, `remember_token`, `ApiToken`, `created_at`, `updated_at`) VALUES (1,'admin@fhope.online',NULL,'$2y$10$U5BYY3D1V/KxttsRmgnrJu4/o2NGCL6AsR/8dxz0FFHtoiOD/BtCG','admin',100,NULL,1,NULL,'eyJpdiI6IjhlTnVYamxPMjhzS1dMSDhvbytZNHc9PSIsInZhbHVlIjoib1I1ZXZkeTJsS3A0dkQvcUFnSDNOZmVBek8wbGlSU2lrL3hDRUdyUTM4UlFnUnd0MDQvK0RGVUVWZUpHdWdpY3A1RVh4c1M1T1NnekNJL0txSE9wSFE9PSIsIm1hYyI6IjdjNTMzN2E0YjZiM2Y0ZWFmYjc1ZGMyN2Q2N2M1ZWM4MTgyMTZmOTcwZmM3ZTQxODI4OTg1ZDkyNDJlMzU3MGYiLCJ0YWciOiIifQ==','2023-07-15 22:25:36','2023-07-15 22:25:36');
INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `user`, `intentos`, `token`, `estado`, `remember_token`, `ApiToken`, `created_at`, `updated_at`) VALUES (2,'helen.orellana@fhope.online',NULL,'$2y$10$./HkU2Fi1gU6wF/fWYvrs.dVVGvSaFVmtATPPpJoyiCGIE8RApEFe','helen.orellana',3,NULL,1,NULL,'eyJpdiI6IlpLY1JwWGIrQUltUjgrRm04T05oYmc9PSIsInZhbHVlIjoiRm1wTE9BVk00MlJuQkU5aithQkd2R3lHSHViWjE4YnczNkNodlFxSTQ5VkxnKzduem1OaGNwR3FSRjcxcW9NMlFIS0piUitkWkFyMVpyNnQvNE14M0E9PSIsIm1hYyI6ImVhNjU2N2VkYWZlZDEwOTk1YjRhMjA1YTc3ZDAwMTViM2IzMmVkNmY5ODdkNzU3ZjVhMmNjZjNhMDQ0ZjMxOGEiLCJ0YWciOiIifQ==','2023-06-21 20:07:24','2023-10-13 05:14:10');
INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `user`, `intentos`, `token`, `estado`, `remember_token`, `ApiToken`, `created_at`, `updated_at`) VALUES (3,'rafael.mendoza@fhope.online',NULL,'$2y$10$w0pipwNtdRxVTPLqu4yxYugHeOFHuQ.lbm1S0KGsV2jCQ85RCCXrG','rafael.mendoza',3,NULL,1,NULL,'eyJpdiI6Ikp6Zjd5Z2xyYWJPc2huZm1KaVJGRHc9PSIsInZhbHVlIjoiYXRwakY3eEpaSHlQL1RTV3BVU3VTOEVONmxwb3N0alJxNjZaNFBva0szL1dOWGdrZXNwM3ZaeVB0REloMjlTV3NXM2FnbURDdGk3eE4xcEJuL21PNGc9PSIsIm1hYyI6IjgwN2Q4MmUxZDFkMWVlNjIxNDA2OWIzNGU1ZWE0NzAyMTQ0ZmEzYzRhN2M3MzczZmM5Y2U0Mjk2MTZmNTFjNjkiLCJ0YWciOiIifQ==','2023-06-21 20:08:16','2023-10-04 10:51:24');
INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `user`, `intentos`, `token`, `estado`, `remember_token`, `ApiToken`, `created_at`, `updated_at`) VALUES (4,'QA@fhope.online',NULL,'$2y$10$PyKEMqM4YeYDNIRoV97R4OiLNiFq9Uhq8P8du0SdcWVegZupS8tPa','QA',3,NULL,1,NULL,'eyJpdiI6Ino5eC9aM0FQTkx3R1JhYUtOTGRYSUE9PSIsInZhbHVlIjoiVTl3Tno0bFhDVjBsdkxEQXk4K3dBZGJTQ05pcTIrQ09xRlEwMCtmUnF5NkZFbVprUnlOeHQxY0I2NzVZOFp4ODcwell6Rmtxd1lzMFhDM2JPVlRNN0E9PSIsIm1hYyI6IjcwNThiN2IzNWY2ODhiM2ZlNjYwMGQ5ZGM1NTMyNzNiZTUwNWY0NTg1ZGU0N2UwZThlYWZmZTc5ZGI3ZTI3YzEiLCJ0YWciOiIifQ==','2023-06-21 20:10:30','2023-06-21 20:10:30');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `venta`
--

LOCK TABLES `venta` WRITE;
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-21 16:20:06
