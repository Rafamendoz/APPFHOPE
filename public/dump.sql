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
INSERT INTO `banco` (`id`, `banco_nombre`, `estado`, `created_at`, `updated_at`) VALUES (1,'BAC CREDOMATIC',1,'2023-07-02 10:47:47','2023-07-02 10:47:47');
INSERT INTO `banco` (`id`, `banco_nombre`, `estado`, `created_at`, `updated_at`) VALUES (2,'FICOHSA',1,'2023-07-02 10:47:57','2023-07-02 10:47:57');
INSERT INTO `banco` (`id`, `banco_nombre`, `estado`, `created_at`, `updated_at`) VALUES (3,'ATLANTIDA',1,'2023-07-02 10:48:05','2023-07-02 10:48:05');
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
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `colaborador`
--

LOCK TABLES `colaborador` WRITE;
/*!40000 ALTER TABLE `colaborador` DISABLE KEYS */;
INSERT INTO `colaborador` (`id`, `colaborador_nombres`, `colaborador_apellidos`, `colaborador_DNI`, `colaborador_puesto`, `colaborador_idusuario`, `estado`, `created_at`, `updated_at`) VALUES (1,'EDWIN RAFAEL','ESPINO MENDOZA','0801200112106',1,3,1,'2023-06-26 11:49:43','2023-06-26 11:49:43');
INSERT INTO `colaborador` (`id`, `colaborador_nombres`, `colaborador_apellidos`, `colaborador_DNI`, `colaborador_puesto`, `colaborador_idusuario`, `estado`, `created_at`, `updated_at`) VALUES (2,'HELEN MADELAINE','ORELLANA GALO','0801199803983',2,2,1,'2023-07-22 21:03:26','2023-07-22 21:03:26');
/*!40000 ALTER TABLE `colaborador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `color`
--

LOCK TABLES `color` WRITE;
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
INSERT INTO `color` (`id`, `name_color`, `hex`, `estado`, `created_at`, `updated_at`) VALUES (1,'ROJO','FF0000',1,'2023-07-15 22:25:36','2023-07-15 22:25:36');
INSERT INTO `color` (`id`, `name_color`, `hex`, `estado`, `created_at`, `updated_at`) VALUES (2,'VERDE MILITAR','667c3e',1,'2023-07-15 22:25:36','2023-07-15 22:25:36');
INSERT INTO `color` (`id`, `name_color`, `hex`, `estado`, `created_at`, `updated_at`) VALUES (3,'AZUL CLARO','E0FFFF',1,'2023-07-15 22:25:36','2023-07-15 22:25:36');
INSERT INTO `color` (`id`, `name_color`, `hex`, `estado`, `created_at`, `updated_at`) VALUES (4,'ROSADO','ff0080',1,'2023-07-15 22:25:36','2023-07-15 22:25:36');
INSERT INTO `color` (`id`, `name_color`, `hex`, `estado`, `created_at`, `updated_at`) VALUES (5,'AMARILLO','FFFF00',1,'2023-07-15 22:25:36','2023-07-15 22:25:36');
INSERT INTO `color` (`id`, `name_color`, `hex`, `estado`, `created_at`, `updated_at`) VALUES (6,'AZUL OSCURO','191970',1,'2023-07-15 22:25:36','2023-07-15 22:25:36');
INSERT INTO `color` (`id`, `name_color`, `hex`, `estado`, `created_at`, `updated_at`) VALUES (7,'BLANCO','FFFFFF',1,'2023-07-15 22:25:36','2023-07-15 22:25:36');
INSERT INTO `color` (`id`, `name_color`, `hex`, `estado`, `created_at`, `updated_at`) VALUES (8,'NEGRO','000000',1,'2023-07-15 22:25:36','2023-07-15 22:25:36');
INSERT INTO `color` (`id`, `name_color`, `hex`, `estado`, `created_at`, `updated_at`) VALUES (9,'BEIGE','f5f5dc ',1,'2023-07-15 22:25:36','2023-07-15 22:25:36');
INSERT INTO `color` (`id`, `name_color`, `hex`, `estado`, `created_at`, `updated_at`) VALUES (10,'OCRE','920d3e',1,'2023-07-15 22:25:36','2023-07-15 22:25:36');
INSERT INTO `color` (`id`, `name_color`, `hex`, `estado`, `created_at`, `updated_at`) VALUES (11,'AZUL ELECTRICO','172bde',1,'2023-07-15 22:25:36','2023-07-15 22:25:36');
INSERT INTO `color` (`id`, `name_color`, `hex`, `estado`, `created_at`, `updated_at`) VALUES (12,'GRIS','9b9b9b',1,'2023-07-15 22:25:36','2023-07-15 22:25:36');
INSERT INTO `color` (`id`, `name_color`, `hex`, `estado`, `created_at`, `updated_at`) VALUES (13,'VERDE AQUA','1df8b5',1,'2023-07-15 22:25:36','2023-07-15 22:25:36');
INSERT INTO `color` (`id`, `name_color`, `hex`, `estado`, `created_at`, `updated_at`) VALUES (14,'AZUL NAVY','00304E',1,'2023-07-15 22:25:36','2023-07-15 22:25:36');
/*!40000 ALTER TABLE `color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cuenta`
--

LOCK TABLES `cuenta` WRITE;
/*!40000 ALTER TABLE `cuenta` DISABLE KEYS */;
INSERT INTO `cuenta` (`id`, `cuenta_nombre`, `estado`, `created_at`, `updated_at`) VALUES (1,'AHORROS',1,'2023-07-02 10:48:40','2023-07-02 10:48:40');
/*!40000 ALTER TABLE `cuenta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cuentabancaria`
--

LOCK TABLES `cuentabancaria` WRITE;
/*!40000 ALTER TABLE `cuentabancaria` DISABLE KEYS */;
INSERT INTO `cuentabancaria` (`id`, `cBancaria_nCuenta`, `cBancaria_idBanco`, `cBancaria_tipoCuenta`, `cBancaria_tipoMoneda`, `cBancaria_total`, `estado`, `created_at`, `updated_at`) VALUES (1,'742811581',1,1,1,9375.62,1,'2023-07-02 10:50:06','2023-07-02 10:50:06');
INSERT INTO `cuentabancaria` (`id`, `cBancaria_nCuenta`, `cBancaria_idBanco`, `cBancaria_tipoCuenta`, `cBancaria_tipoMoneda`, `cBancaria_total`, `estado`, `created_at`, `updated_at`) VALUES (2,'14720915454',3,1,1,1740.00,1,'2023-07-02 11:43:15','2023-07-02 11:43:15');
INSERT INTO `cuentabancaria` (`id`, `cBancaria_nCuenta`, `cBancaria_idBanco`, `cBancaria_tipoCuenta`, `cBancaria_tipoMoneda`, `cBancaria_total`, `estado`, `created_at`, `updated_at`) VALUES (3,'200011141357',2,1,1,5700.00,1,'2023-07-02 12:37:45','2023-07-02 12:37:45');
/*!40000 ALTER TABLE `cuentabancaria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `detalle_producto_venta`
--

LOCK TABLES `detalle_producto_venta` WRITE;
/*!40000 ALTER TABLE `detalle_producto_venta` DISABLE KEYS */;
INSERT INTO `detalle_producto_venta` (`id`, `venta_id`, `producto_id`, `cantidad`, `size_id`, `color_id`, `estado`, `created_at`, `updated_at`) VALUES (70,76,2,2,2,3,1,'2024-01-01 07:14:22','2024-01-01 07:14:22');
INSERT INTO `detalle_producto_venta` (`id`, `venta_id`, `producto_id`, `cantidad`, `size_id`, `color_id`, `estado`, `created_at`, `updated_at`) VALUES (71,76,2,1,2,6,1,'2024-01-01 07:14:22','2024-01-01 07:14:22');
INSERT INTO `detalle_producto_venta` (`id`, `venta_id`, `producto_id`, `cantidad`, `size_id`, `color_id`, `estado`, `created_at`, `updated_at`) VALUES (72,76,2,2,3,6,1,'2024-01-01 07:14:23','2024-01-01 07:14:23');
/*!40000 ALTER TABLE `detalle_producto_venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `detallebanco`
--

LOCK TABLES `detallebanco` WRITE;
/*!40000 ALTER TABLE `detallebanco` DISABLE KEYS */;
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (9,1,1,'412405788',800.00,'2023-05-31 12:00:00','TEF DE:HELEN MADELE',1,'2023-07-02 11:36:07','2023-07-02 11:36:07');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (10,1,1,'412400166',860.00,'2023-06-01 12:00:00','TEF DE:EDGAR IVAN P',1,'2023-07-02 11:37:18','2023-07-02 11:37:18');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (11,2,1,'126168564890190100',850.00,'2023-06-01 12:00:00','CHAMARRA',1,'2023-07-02 11:47:44','2023-07-02 11:47:44');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (12,1,1,'412404976',1540.00,'2023-06-02 12:00:00','TEF DE:HELEN MADELE',1,'2023-07-02 11:51:58','2023-07-02 11:51:58');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (13,1,1,'412407800',800.00,'2023-06-07 12:00:00','TEF DE:HELEN MADELE',1,'2023-07-02 11:53:03','2023-07-02 11:53:03');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (14,1,1,'412408174',800.00,'2023-06-07 12:00:00','TEF DE:HELEN MADELE',1,'2023-07-02 11:53:45','2023-07-02 11:53:45');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (15,1,1,'412408774',800.00,'2023-06-07 12:00:00','TEF DE:HELEN MADELE',1,'2023-07-02 11:54:18','2023-07-02 11:54:18');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (16,1,1,'412402892',800.00,'2023-06-14 12:00:00','TEF DE:HELEN MADELE-PAGO DE JUSTIN MEDINA',1,'2023-07-02 11:57:48','2023-07-02 11:57:48');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (17,1,1,'412403458',800.00,'2023-06-14 12:00:00','TEF DE:HELEN MADELE - PAGO DE ZAMIR VARGAS',1,'2023-07-02 11:58:37','2023-07-02 11:58:37');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (18,1,1,'412404278',800.00,'2023-06-14 12:00:00','TEF DE:HELEN MADELE  - PAGO JOSE NUÃƒâ€˜EZ',1,'2023-07-02 11:59:30','2023-07-02 11:59:30');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (19,1,1,'412405188',980.00,'2023-06-14 12:00:00','TEF DE:HELEN MADELE - PAGO DE BANNESSA',1,'2023-07-02 12:00:07','2023-07-02 12:00:07');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (20,1,1,'412406901',890.00,'2023-06-14 12:00:00','TEF DE:HELEN MADELE - PAGO DE RICARDO ORDOÃƒâ€˜EZ',1,'2023-07-02 12:00:51','2023-07-02 12:00:51');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (21,1,1,'412407564',850.00,'2023-06-14 12:00:00','TEF DE:HELEN MADELE - PAGO ARIEL',1,'2023-07-02 12:01:28','2023-07-02 12:01:28');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (22,1,1,'412408585',800.00,'2023-06-14 12:00:00','TEF DE:HELEN MADELE - PAGO DE JIMMY REYES',1,'2023-07-02 12:02:10','2023-07-02 12:02:10');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (23,1,1,'412409654',780.00,'2023-06-14 12:00:00','TEF DE:HELEN MADELE - PAGO DE JOSIMAR',1,'2023-07-02 12:02:47','2023-07-02 12:02:47');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (24,1,1,'412402758',850.00,'2023-06-27 12:00:00','TEF DE:HELEN MADELE - PAGO DE CRISTIAN ALVARADO',1,'2023-07-02 12:03:51','2023-07-02 12:03:51');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (25,1,2,'230',503.44,'2023-07-02 12:00:00','PAGO TC 0675 - PAGO PUBLI 3 JUNIO 23',1,'2023-07-02 12:21:16','2023-07-02 12:21:16');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (26,1,2,'234',503.44,'2023-07-02 12:00:00','PAGO 4551-47**-****-0675 - PAGO PUBLI 4 JUNIO 23',1,'2023-07-02 12:23:53','2023-07-02 12:23:53');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (27,1,2,'248',503.44,'2023-07-02 12:00:00','PAGO 4551-47**-****-0675 - PAGO PUBLI 5 JUN 2023',1,'2023-07-02 12:25:53','2023-07-02 12:25:53');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (28,1,2,'261',259.51,'2023-07-02 12:00:00','PAGO 4551-47**-****-0675 - PAGO PUBLI 13 JUN 2023',1,'2023-07-02 12:28:26','2023-07-02 12:28:26');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (29,3,1,'FT23167FHH81',850.00,'2023-06-16 12:00:00','TRANSFERENCIA ENTRE CUENTAS- JULIAN LORENA REDONDO',1,'2023-07-02 12:41:25','2023-07-02 12:41:25');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (30,1,2,'412805399',60.00,'2023-07-02 12:00:00','PAGO MOTO EXPRESS REGRESO DE CHAQUETA',1,'2023-07-02 13:02:00','2023-07-02 13:02:00');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (31,1,2,'96412028',108.00,'2023-07-05 12:00:00','PAGO SUPER RECARGAS TIGO 96412',1,'2023-07-05 21:30:10','2023-07-05 21:30:10');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (32,1,2,'412404570',80.00,'2023-07-05 12:00:00','TEF A : 741671811 - DEVOLUCION DE PEDIDO MOTOEXPRESS',1,'2023-07-05 21:36:35','2023-07-05 21:36:35');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (33,1,1,'412404763',850.00,'2023-07-06 12:00:00','TEF DE:HELEN MADELEINE ORELLAN - PAGO DE SERGIO CHAQUETA JEAN L NEGRA',1,'2023-07-07 11:43:00','2023-07-07 11:43:00');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (34,1,1,'412405034',850.00,'2023-07-06 12:00:00','TEF DE:HELEN MADELEINE ORELLAN - PAGO CHAQUETA ROJA L BICS ESPINO',1,'2023-07-07 11:44:00','2023-07-07 11:44:00');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (35,3,1,'FT2318737YQX',1600.00,'2023-07-06 12:00:00','TRANSFERENCIA ENTRE CUENTAS--EDWIN RAFAEL ESPINO MENDOZA',1,'2023-07-07 11:46:55','2023-07-07 11:46:55');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (36,1,1,'412404052',840.00,'2023-07-11 12:00:00','TEF DE:HELEN MADELEINE ORELLANA - CHAQUETA ROSADA TALLA M ANDERSON PALENCIA',1,'2023-07-12 02:12:07','2023-07-12 02:12:07');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (37,1,1,'412404351',880.00,'2023-07-12 02:13:18','TEF DE:HELEN MADELEINE ORELLAN - CHAQUETA BASQUET NEGRA TALLA S JASMIN',1,'2023-07-12 02:13:18','2023-07-12 02:13:18');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (38,2,1,'136168943157850700',890.00,'2023-07-15 06:00:00','PAGO DE SARA',1,'2023-07-15 23:46:16','2023-07-15 23:46:16');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (39,1,2,'68093',3165.50,'2023-07-07 06:00:00','PAGO DE HOSTING, DOMINIO',1,'2023-07-16 00:08:04','2023-07-16 00:08:04');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (40,3,1,'FT23198XSZBT',850.00,'2023-07-17 06:00:00','TRANSFERENCIA ENTRE CUENTAS-HELEN MADELEINE ORELLANA GALO-PAGO EDIN CHAQUETA ROJA S',1,'2023-07-19 16:27:15','2023-07-19 16:27:15');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (41,3,1,'FT2319892KRB',800.00,'2023-07-17 06:00:00','TRANSFERENCIA ENTRE CUENTAS-HELEN MADELEINE ORELLANA GALO - CHAQUETA MUJER JEAN TALLA M AZUL CELESTE',1,'2023-07-19 16:28:28','2023-07-19 16:28:28');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (42,1,2,'8397',2011.05,'2023-08-06 06:00:00','PAGO DE PUBLICIDAD - 4 CUOTAS',1,'2023-08-07 03:36:47','2023-08-07 03:36:47');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (43,3,1,'FT23230RBK5B',800.00,'2023-08-18 06:00:00','PAGO CHAQUETA DE VICTOR L CON CAPUCHA',1,'2023-08-19 17:58:10','2023-08-19 17:58:10');
INSERT INTO `detallebanco` (`id`, `id_cuentaBancaria`, `id_tipoTransaccion`, `referencia`, `monto`, `fecha`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES (44,3,1,'FT232302LRTP',800.00,'2023-08-18 06:00:00','PAGO CHAQUETA DE VICTOR L CON CAPUCHA',1,'2023-08-19 17:59:30','2023-08-19 17:59:30');
/*!40000 ALTER TABLE `detallebanco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `detalleventa`
--

LOCK TABLES `detalleventa` WRITE;
/*!40000 ALTER TABLE `detalleventa` DISABLE KEYS */;
INSERT INTO `detalleventa` (`id`, `venta_id`, `producto_id`, `precio`, `cantidad`, `descuento`, `isv`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES (1,1,1,800.00,1,0.00,0.00,800.00,1,'2023-06-02 22:57:35','2023-06-02 22:57:35');
INSERT INTO `detalleventa` (`id`, `venta_id`, `producto_id`, `precio`, `cantidad`, `descuento`, `isv`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES (2,2,1,800.00,1,0.00,0.00,800.00,1,'2023-06-02 23:00:22','2023-06-02 23:00:22');
INSERT INTO `detalleventa` (`id`, `venta_id`, `producto_id`, `precio`, `cantidad`, `descuento`, `isv`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES (3,3,1,800.00,1,0.00,0.00,800.00,1,'2023-06-02 23:07:32','2023-06-02 23:07:32');
INSERT INTO `detalleventa` (`id`, `venta_id`, `producto_id`, `precio`, `cantidad`, `descuento`, `isv`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES (4,4,1,800.00,1,0.00,0.00,800.00,1,'2023-06-02 23:16:43','2023-06-02 23:16:43');
INSERT INTO `detalleventa` (`id`, `venta_id`, `producto_id`, `precio`, `cantidad`, `descuento`, `isv`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES (5,5,1,800.00,1,0.00,0.00,800.00,1,'2023-06-02 23:19:31','2023-06-02 23:19:31');
INSERT INTO `detalleventa` (`id`, `venta_id`, `producto_id`, `precio`, `cantidad`, `descuento`, `isv`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES (6,6,1,800.00,1,0.00,0.00,800.00,1,'2023-06-02 23:22:14','2023-06-02 23:22:14');
INSERT INTO `detalleventa` (`id`, `venta_id`, `producto_id`, `precio`, `cantidad`, `descuento`, `isv`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES (7,7,5,850.00,1,0.00,0.00,850.00,1,'2023-06-02 23:26:14','2023-06-02 23:26:14');
INSERT INTO `detalleventa` (`id`, `venta_id`, `producto_id`, `precio`, `cantidad`, `descuento`, `isv`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES (8,8,1,800.00,1,0.00,0.00,800.00,1,'2023-06-03 22:46:14','2023-06-03 22:46:14');
INSERT INTO `detalleventa` (`id`, `venta_id`, `producto_id`, `precio`, `cantidad`, `descuento`, `isv`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES (9,9,1,800.00,1,0.00,0.00,800.00,1,'2023-06-07 17:07:05','2023-06-07 17:07:05');
INSERT INTO `detalleventa` (`id`, `venta_id`, `producto_id`, `precio`, `cantidad`, `descuento`, `isv`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES (10,10,1,800.00,1,0.00,0.00,800.00,1,'2023-06-07 17:20:23','2023-06-07 17:20:23');
INSERT INTO `detalleventa` (`id`, `venta_id`, `producto_id`, `precio`, `cantidad`, `descuento`, `isv`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES (11,11,1,800.00,1,0.00,0.00,800.00,1,'2023-06-07 17:22:19','2023-06-07 17:22:19');
INSERT INTO `detalleventa` (`id`, `venta_id`, `producto_id`, `precio`, `cantidad`, `descuento`, `isv`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES (12,12,4,850.00,1,70.00,0.00,780.00,1,'2023-06-10 00:06:33','2023-06-10 00:06:33');
INSERT INTO `detalleventa` (`id`, `venta_id`, `producto_id`, `precio`, `cantidad`, `descuento`, `isv`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES (13,13,4,850.00,1,0.00,0.00,850.00,1,'2023-06-10 00:09:46','2023-06-10 00:09:46');
INSERT INTO `detalleventa` (`id`, `venta_id`, `producto_id`, `precio`, `cantidad`, `descuento`, `isv`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES (14,14,3,890.00,1,0.00,0.00,890.00,1,'2023-06-10 00:10:37','2023-06-10 00:10:37');
INSERT INTO `detalleventa` (`id`, `venta_id`, `producto_id`, `precio`, `cantidad`, `descuento`, `isv`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES (15,15,1,800.00,1,0.00,0.00,800.00,1,'2023-06-10 00:11:41','2023-06-10 00:11:41');
INSERT INTO `detalleventa` (`id`, `venta_id`, `producto_id`, `precio`, `cantidad`, `descuento`, `isv`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES (16,21,6,980.00,1,0.00,0.00,980.00,1,'2023-06-10 00:18:24','2023-06-10 00:18:24');
INSERT INTO `detalleventa` (`id`, `venta_id`, `producto_id`, `precio`, `cantidad`, `descuento`, `isv`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES (18,23,4,850.00,1,0.00,0.00,850.00,1,'2023-06-28 14:17:59','2023-06-28 14:17:59');
INSERT INTO `detalleventa` (`id`, `venta_id`, `producto_id`, `precio`, `cantidad`, `descuento`, `isv`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES (20,25,4,850.00,1,0.00,0.00,850.00,1,'2023-07-06 07:02:37','2023-07-06 07:02:37');
INSERT INTO `detalleventa` (`id`, `venta_id`, `producto_id`, `precio`, `cantidad`, `descuento`, `isv`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES (21,26,4,850.00,1,0.00,0.00,850.00,1,'2023-07-06 07:03:25','2023-07-06 07:03:25');
INSERT INTO `detalleventa` (`id`, `venta_id`, `producto_id`, `precio`, `cantidad`, `descuento`, `isv`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES (22,27,4,850.00,1,10.00,0.00,840.00,1,'2023-07-12 00:36:14','2023-07-12 00:36:14');
INSERT INTO `detalleventa` (`id`, `venta_id`, `producto_id`, `precio`, `cantidad`, `descuento`, `isv`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES (23,28,3,890.00,1,10.00,0.00,880.00,1,'2023-07-12 00:37:52','2023-07-12 00:37:52');
INSERT INTO `detalleventa` (`id`, `venta_id`, `producto_id`, `precio`, `cantidad`, `descuento`, `isv`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES (24,29,4,850.00,1,0.00,0.00,850.00,1,'2023-07-17 19:55:07','2023-07-17 19:55:07');
INSERT INTO `detalleventa` (`id`, `venta_id`, `producto_id`, `precio`, `cantidad`, `descuento`, `isv`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES (50,60,1,800.00,3,0.00,0.00,2400.00,1,'2024-01-01 05:03:44','2024-01-01 05:03:44');
INSERT INTO `detalleventa` (`id`, `venta_id`, `producto_id`, `precio`, `cantidad`, `descuento`, `isv`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES (51,60,1,800.00,2,0.00,0.00,1600.00,1,'2024-01-01 05:03:45','2024-01-01 05:03:45');
INSERT INTO `detalleventa` (`id`, `venta_id`, `producto_id`, `precio`, `cantidad`, `descuento`, `isv`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES (52,60,1,800.00,3,0.00,0.00,2400.00,1,'2024-01-01 05:08:27','2024-01-01 05:08:27');
INSERT INTO `detalleventa` (`id`, `venta_id`, `producto_id`, `precio`, `cantidad`, `descuento`, `isv`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES (53,60,1,800.00,2,0.00,0.00,1600.00,1,'2024-01-01 05:08:28','2024-01-01 05:08:28');
INSERT INTO `detalleventa` (`id`, `venta_id`, `producto_id`, `precio`, `cantidad`, `descuento`, `isv`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES (54,62,1,800.00,1,0.00,0.00,800.00,1,'2024-01-01 05:12:09','2024-01-01 05:12:09');
INSERT INTO `detalleventa` (`id`, `venta_id`, `producto_id`, `precio`, `cantidad`, `descuento`, `isv`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES (55,62,1,800.00,1,0.00,0.00,800.00,1,'2024-01-01 05:12:10','2024-01-01 05:12:10');
INSERT INTO `detalleventa` (`id`, `venta_id`, `producto_id`, `precio`, `cantidad`, `descuento`, `isv`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES (56,63,1,800.00,1,0.00,0.00,800.00,1,'2024-01-01 05:14:46','2024-01-01 05:14:46');
INSERT INTO `detalleventa` (`id`, `venta_id`, `producto_id`, `precio`, `cantidad`, `descuento`, `isv`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES (57,63,1,800.00,1,0.00,0.00,800.00,1,'2024-01-01 05:14:47','2024-01-01 05:14:47');
INSERT INTO `detalleventa` (`id`, `venta_id`, `producto_id`, `precio`, `cantidad`, `descuento`, `isv`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES (97,76,2,960.00,2,0.00,0.00,1920.00,1,'2024-01-01 07:14:21','2024-01-01 07:14:21');
INSERT INTO `detalleventa` (`id`, `venta_id`, `producto_id`, `precio`, `cantidad`, `descuento`, `isv`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES (98,76,2,960.00,1,0.00,0.00,960.00,1,'2024-01-01 07:14:22','2024-01-01 07:14:22');
INSERT INTO `detalleventa` (`id`, `venta_id`, `producto_id`, `precio`, `cantidad`, `descuento`, `isv`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES (99,76,2,960.00,2,0.00,0.00,1920.00,1,'2024-01-01 07:14:23','2024-01-01 07:14:23');
/*!40000 ALTER TABLE `detalleventa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `errores`
--

LOCK TABLES `errores` WRITE;
/*!40000 ALTER TABLE `errores` DISABLE KEYS */;
INSERT INTO `errores` (`identificador`, `id`, `codigo_error`, `descripcion`, `subcodigo`, `errorApp`, `created_at`, `updated_at`) VALUES (4,'E04','23000','Registro de entrada duplicado','1062',500,NULL,NULL);
INSERT INTO `errores` (`identificador`, `id`, `codigo_error`, `descripcion`, `subcodigo`, `errorApp`, `created_at`, `updated_at`) VALUES (6,'E06','CP-E1-T01','ERROR EN SP','100',500,NULL,NULL);
INSERT INTO `errores` (`identificador`, `id`, `codigo_error`, `descripcion`, `subcodigo`, `errorApp`, `created_at`, `updated_at`) VALUES (8,'E08','23000','Hay campos obligatorios requeridos que estan vacios, revisar request','1048',400,NULL,NULL);
INSERT INTO `errores` (`identificador`, `id`, `codigo_error`, `descripcion`, `subcodigo`, `errorApp`, `created_at`, `updated_at`) VALUES (15,'E00','23000','No se puede agregar o actualizar un registro secundario. Existe una restricción de clave externa que no se cumple','1216',500,NULL,NULL);
INSERT INTO `errores` (`identificador`, `id`, `codigo_error`, `descripcion`, `subcodigo`, `errorApp`, `created_at`, `updated_at`) VALUES (17,'E016','HY000','Faltan campos requeridos en el request','1364',400,'2024-01-01 01:50:02','2024-01-01 01:50:02');
INSERT INTO `errores` (`identificador`, `id`, `codigo_error`, `descripcion`, `subcodigo`, `errorApp`, `created_at`, `updated_at`) VALUES (28,'E028','APP0','General Application Error','0',500,'2024-01-01 02:16:34','2024-01-01 02:16:34');
INSERT INTO `errores` (`identificador`, `id`, `codigo_error`, `descripcion`, `subcodigo`, `errorApp`, `created_at`, `updated_at`) VALUES (84,'E029','APP0','General Application Error','23',500,'2024-01-01 03:17:03','2024-01-01 03:17:03');
INSERT INTO `errores` (`identificador`, `id`, `codigo_error`, `descripcion`, `subcodigo`, `errorApp`, `created_at`, `updated_at`) VALUES (87,'E085','401','NO AUTORIZADO','401',401,'2024-01-01 03:39:45','2024-01-01 03:39:45');
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
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `httperrors`
--

LOCK TABLES `httperrors` WRITE;
/*!40000 ALTER TABLE `httperrors` DISABLE KEYS */;
INSERT INTO `httperrors` (`httpCode`, `httpCodeTraslate`, `Status`, `id`) VALUES (200,'OK','SUCCESS',1);
INSERT INTO `httperrors` (`httpCode`, `httpCodeTraslate`, `Status`, `id`) VALUES (202,'CREATED','SUCCESS',2);
INSERT INTO `httperrors` (`httpCode`, `httpCodeTraslate`, `Status`, `id`) VALUES (400,'BAD REQUEST','FAILED',3);
INSERT INTO `httperrors` (`httpCode`, `httpCodeTraslate`, `Status`, `id`) VALUES (401,'UNAAUTHORIZED','FAILED',4);
INSERT INTO `httperrors` (`httpCode`, `httpCodeTraslate`, `Status`, `id`) VALUES (500,'INTERNAL SERVER ERROR','FAILED',5);
/*!40000 ALTER TABLE `httperrors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
INSERT INTO `inventory` (`id`, `id_producto`, `id_size`, `id_color`, `stock`, `estado`, `created_at`, `updated_at`) VALUES (1,4,2,1,1,1,'2023-07-16 19:34:52','2023-07-16 19:34:52');
INSERT INTO `inventory` (`id`, `id_producto`, `id_size`, `id_color`, `stock`, `estado`, `created_at`, `updated_at`) VALUES (2,4,3,1,1,1,'2023-07-16 19:35:38','2023-07-16 19:35:38');
INSERT INTO `inventory` (`id`, `id_producto`, `id_size`, `id_color`, `stock`, `estado`, `created_at`, `updated_at`) VALUES (3,4,3,8,9,1,'2023-07-16 19:47:07','2023-07-16 19:47:07');
INSERT INTO `inventory` (`id`, `id_producto`, `id_size`, `id_color`, `stock`, `estado`, `created_at`, `updated_at`) VALUES (4,4,4,8,1,1,'2023-07-16 19:47:22','2023-07-16 19:47:22');
INSERT INTO `inventory` (`id`, `id_producto`, `id_size`, `id_color`, `stock`, `estado`, `created_at`, `updated_at`) VALUES (5,4,5,8,1,1,'2023-07-16 19:47:42','2023-07-16 19:47:42');
INSERT INTO `inventory` (`id`, `id_producto`, `id_size`, `id_color`, `stock`, `estado`, `created_at`, `updated_at`) VALUES (6,5,2,8,3,1,'2023-07-16 19:49:48','2023-07-16 19:49:48');
INSERT INTO `inventory` (`id`, `id_producto`, `id_size`, `id_color`, `stock`, `estado`, `created_at`, `updated_at`) VALUES (7,5,3,8,4,1,'2023-07-16 19:50:00','2023-07-16 19:50:00');
INSERT INTO `inventory` (`id`, `id_producto`, `id_size`, `id_color`, `stock`, `estado`, `created_at`, `updated_at`) VALUES (8,5,4,8,2,1,'2023-07-16 19:50:32','2023-07-16 19:50:32');
INSERT INTO `inventory` (`id`, `id_producto`, `id_size`, `id_color`, `stock`, `estado`, `created_at`, `updated_at`) VALUES (9,5,2,12,3,1,'2023-07-16 19:51:51','2023-07-16 19:51:51');
INSERT INTO `inventory` (`id`, `id_producto`, `id_size`, `id_color`, `stock`, `estado`, `created_at`, `updated_at`) VALUES (10,5,3,12,5,1,'2023-07-16 19:52:16','2023-07-16 19:52:16');
INSERT INTO `inventory` (`id`, `id_producto`, `id_size`, `id_color`, `stock`, `estado`, `created_at`, `updated_at`) VALUES (11,5,4,12,3,1,'2023-07-16 19:52:44','2023-07-16 19:52:44');
INSERT INTO `inventory` (`id`, `id_producto`, `id_size`, `id_color`, `stock`, `estado`, `created_at`, `updated_at`) VALUES (12,3,2,14,1,1,'2023-07-16 19:54:40','2023-07-16 19:54:40');
INSERT INTO `inventory` (`id`, `id_producto`, `id_size`, `id_color`, `stock`, `estado`, `created_at`, `updated_at`) VALUES (13,3,3,14,1,1,'2023-07-16 19:54:50','2023-07-16 19:54:50');
INSERT INTO `inventory` (`id`, `id_producto`, `id_size`, `id_color`, `stock`, `estado`, `created_at`, `updated_at`) VALUES (14,3,4,14,2,1,'2023-07-16 19:55:02','2023-07-16 19:55:02');
INSERT INTO `inventory` (`id`, `id_producto`, `id_size`, `id_color`, `stock`, `estado`, `created_at`, `updated_at`) VALUES (15,3,2,1,0,1,'2023-07-16 19:55:14','2023-07-16 19:55:14');
INSERT INTO `inventory` (`id`, `id_producto`, `id_size`, `id_color`, `stock`, `estado`, `created_at`, `updated_at`) VALUES (16,3,3,1,1,1,'2023-07-16 19:55:42','2023-07-16 19:55:42');
INSERT INTO `inventory` (`id`, `id_producto`, `id_size`, `id_color`, `stock`, `estado`, `created_at`, `updated_at`) VALUES (17,3,4,1,2,1,'2023-07-16 19:56:35','2023-07-16 19:56:35');
INSERT INTO `inventory` (`id`, `id_producto`, `id_size`, `id_color`, `stock`, `estado`, `created_at`, `updated_at`) VALUES (18,3,4,8,2,1,'2023-07-16 19:56:54','2023-07-16 19:56:54');
INSERT INTO `inventory` (`id`, `id_producto`, `id_size`, `id_color`, `stock`, `estado`, `created_at`, `updated_at`) VALUES (19,2,2,3,0,1,'2023-07-16 19:58:19','2023-07-16 19:58:19');
INSERT INTO `inventory` (`id`, `id_producto`, `id_size`, `id_color`, `stock`, `estado`, `created_at`, `updated_at`) VALUES (20,2,3,3,1,1,'2023-07-16 19:58:39','2023-07-16 19:58:39');
INSERT INTO `inventory` (`id`, `id_producto`, `id_size`, `id_color`, `stock`, `estado`, `created_at`, `updated_at`) VALUES (21,2,4,3,2,1,'2023-07-16 19:58:52','2023-07-16 19:58:52');
INSERT INTO `inventory` (`id`, `id_producto`, `id_size`, `id_color`, `stock`, `estado`, `created_at`, `updated_at`) VALUES (22,2,2,6,0,1,'2023-07-16 19:59:16','2023-07-16 19:59:16');
INSERT INTO `inventory` (`id`, `id_producto`, `id_size`, `id_color`, `stock`, `estado`, `created_at`, `updated_at`) VALUES (23,2,3,6,0,1,'2023-07-16 19:59:28','2023-07-16 19:59:28');
INSERT INTO `inventory` (`id`, `id_producto`, `id_size`, `id_color`, `stock`, `estado`, `created_at`, `updated_at`) VALUES (24,2,4,6,2,1,'2023-07-16 19:59:41','2023-07-16 19:59:41');
INSERT INTO `inventory` (`id`, `id_producto`, `id_size`, `id_color`, `stock`, `estado`, `created_at`, `updated_at`) VALUES (25,1,3,6,2,1,'2023-07-16 20:01:28','2023-07-16 20:08:05');
INSERT INTO `inventory` (`id`, `id_producto`, `id_size`, `id_color`, `stock`, `estado`, `created_at`, `updated_at`) VALUES (26,1,4,6,3,1,'2023-07-16 20:01:43','2023-07-16 20:08:46');
INSERT INTO `inventory` (`id`, `id_producto`, `id_size`, `id_color`, `stock`, `estado`, `created_at`, `updated_at`) VALUES (27,1,4,3,1,1,'2023-07-16 20:09:40','2023-07-16 20:09:40');
/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `inventory_header`
--

LOCK TABLES `inventory_header` WRITE;
/*!40000 ALTER TABLE `inventory_header` DISABLE KEYS */;
INSERT INTO `inventory_header` (`id`, `id_producto`, `total_stock`, `estado`, `created_at`, `updated_at`) VALUES (1,1,6,1,'2023-07-15 06:00:00','2023-07-15 06:00:00');
INSERT INTO `inventory_header` (`id`, `id_producto`, `total_stock`, `estado`, `created_at`, `updated_at`) VALUES (2,2,5,1,'2023-07-15 06:00:00','2023-07-15 06:00:00');
INSERT INTO `inventory_header` (`id`, `id_producto`, `total_stock`, `estado`, `created_at`, `updated_at`) VALUES (3,3,9,1,'2023-07-15 06:00:00','2023-07-15 06:00:00');
INSERT INTO `inventory_header` (`id`, `id_producto`, `total_stock`, `estado`, `created_at`, `updated_at`) VALUES (4,4,13,1,'2023-07-15 06:00:00','2023-07-15 06:00:00');
INSERT INTO `inventory_header` (`id`, `id_producto`, `total_stock`, `estado`, `created_at`, `updated_at`) VALUES (5,5,20,1,'2023-07-15 06:00:00','2023-07-15 06:00:00');
INSERT INTO `inventory_header` (`id`, `id_producto`, `total_stock`, `estado`, `created_at`, `updated_at`) VALUES (6,6,0,1,'2023-07-15 06:00:00','2023-07-15 06:00:00');
/*!40000 ALTER TABLE `inventory_header` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1,'2014_10_12_000000_create_users_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (2,'2014_10_12_100000_create_password_reset_tokens_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (3,'2019_08_19_000000_create_failed_jobs_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (4,'2019_12_14_000001_create_personal_access_tokens_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (5,'2023_04_06_183010_create_colaborador',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (6,'2023_04_06_183120_create_puesto',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (7,'2023_04_11_230006_create_estado_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (8,'2023_04_12_041806_create_table_errors',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (9,'2023_04_12_223129_create_cuenta',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (10,'2023_04_12_223135_create_moneda',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (11,'2023_04_12_223149_create_transaccion',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (12,'2023_04_12_223158_create_Cuentabancaria',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (13,'2023_04_12_223204_create_detallebanco',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (14,'2023_04_12_223301_create_cliente',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (15,'2023_04_12_223312_create_venta',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (16,'2023_04_12_223317_create_detalleventa',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (17,'2023_04_12_223326_create_producto',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (18,'2023_05_28_031826_create_permission_tables',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (19,'2023_06_15_155524_create__banco',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (20,'2023_07_05_123518_create_color',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (21,'2023_07_05_123525_create_size',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (22,'2023_07_05_123706_create_inventory',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (23,'2023_07_06_151208_create_inventory_header',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (24,'2023_07_06_215900_create_detalle_producto_venta',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (25,'2023_07_08_225421_create_foreighkeys',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (26,'2023_07_09_202910_insert_datos_tablas',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (27,'2023_11_11_154558_services_migration',2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (28,'2024_01_14_142845_create_jobs_table',3);
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
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`, `id`) VALUES (1,'App\\Models\\User',1,NULL);
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`, `id`) VALUES (1,'App\\Models\\User',3,NULL);
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`, `id`) VALUES (3,'App\\Models\\User',2,NULL);
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
INSERT INTO `moneda` (`id`, `moneda_nombre`, `estado`, `created_at`, `updated_at`) VALUES (1,'LEMPIRAS',1,'2023-07-02 10:48:55','2023-07-02 10:48:55');
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
INSERT INTO `producto` (`id`, `producto_nom`, `producto_des`, `precio`, `estado`, `created_at`, `updated_at`) VALUES (1,'CHAQUETA JEAN DE CAPUCHA','CHAQUETA JEAN CON PARCHADOS EN LAS MANGAS Y EN LA CAPUCHA',800.00,1,'2023-06-02 22:46:40','2023-06-02 22:46:40');
INSERT INTO `producto` (`id`, `producto_nom`, `producto_des`, `precio`, `estado`, `created_at`, `updated_at`) VALUES (2,'CHAQUETAS DE JEAN DE MUJER','CHAQUETAS DE JEAN DE MUJER, MANGA BAJA - SLIM FIT',960.00,1,'2023-06-02 22:47:38','2023-07-05 22:36:37');
INSERT INTO `producto` (`id`, `producto_nom`, `producto_des`, `precio`, `estado`, `created_at`, `updated_at`) VALUES (3,'CHAQUETA ESTILO UNIVERSITARIO DE MUJER','Chaqueta estilo Universitario con Letras Parchadas - Slim Fit',890.00,1,'2023-06-02 22:49:22','2023-06-02 22:49:22');
INSERT INTO `producto` (`id`, `producto_nom`, `producto_des`, `precio`, `estado`, `created_at`, `updated_at`) VALUES (4,'CHAQUETA JEAN ROTA UNISEX','CHAQUETA JEAN DE COLORES VARIADOS, ESTILO ROTO',850.00,1,'2023-06-02 22:51:52','2023-06-02 22:51:52');
INSERT INTO `producto` (`id`, `producto_nom`, `producto_des`, `precio`, `estado`, `created_at`, `updated_at`) VALUES (5,'CHAQUETA ALCOLCHADA FELPA','CHAQUETA ALCOLCHADA DE CUADROS, FORRO DE FELPA',850.00,1,'2023-06-02 22:53:18','2023-06-02 22:53:18');
INSERT INTO `producto` (`id`, `producto_nom`, `producto_des`, `precio`, `estado`, `created_at`, `updated_at`) VALUES (6,'CHAQUETA IMPERMEABLES','Estilo Casual',980.00,1,'2023-06-10 00:14:09','2023-06-10 00:14:09');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `puesto`
--

LOCK TABLES `puesto` WRITE;
/*!40000 ALTER TABLE `puesto` DISABLE KEYS */;
INSERT INTO `puesto` (`id`, `puesto_nombre`, `estado`, `created_at`, `updated_at`) VALUES (1,'GERENTE GENERAL',1,'2023-06-26 11:48:39','2023-06-26 11:48:39');
INSERT INTO `puesto` (`id`, `puesto_nombre`, `estado`, `created_at`, `updated_at`) VALUES (2,'GERENTE COMERCIAL',1,'2023-06-26 11:48:48','2023-06-26 11:48:48');
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
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (1,'ADMINISTRADOR','web','2023-07-15 22:25:36','2023-07-15 22:25:36');
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (2,'GERENTE GENERAL','web','2023-07-15 22:25:36','2023-07-15 22:25:36');
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (3,'GERENTE COMERCIAL','web','2023-07-15 22:25:36','2023-07-15 22:25:36');
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (4,'VENDEDOR','web','2023-07-25 21:38:27','2023-07-25 21:38:27');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `servicios`
--

LOCK TABLES `servicios` WRITE;
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
INSERT INTO `servicios` (`id`, `service_name`, `endpoint`, `estado`, `created_at`, `updated_at`, `method`) VALUES (100,'TRASFORMACION_ERROR','http://services.fhope.online/api/errorGeneric',1,NULL,NULL,'POST');
INSERT INTO `servicios` (`id`, `service_name`, `endpoint`, `estado`, `created_at`, `updated_at`, `method`) VALUES (101,'TRASFORMACION_ERROR_HTTP','http://services.fhope.online/api/error/basic',1,NULL,NULL,'POST');
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `size`
--

LOCK TABLES `size` WRITE;
/*!40000 ALTER TABLE `size` DISABLE KEYS */;
INSERT INTO `size` (`id`, `name_size`, `estado`, `created_at`, `updated_at`) VALUES (1,'XS',1,'2023-07-15 22:25:36','2023-07-15 22:25:36');
INSERT INTO `size` (`id`, `name_size`, `estado`, `created_at`, `updated_at`) VALUES (2,'S',1,'2023-07-15 22:25:36','2023-07-15 22:25:36');
INSERT INTO `size` (`id`, `name_size`, `estado`, `created_at`, `updated_at`) VALUES (3,'M',1,'2023-07-15 22:25:36','2023-07-15 22:25:36');
INSERT INTO `size` (`id`, `name_size`, `estado`, `created_at`, `updated_at`) VALUES (4,'L',1,'2023-07-15 22:25:36','2023-07-15 22:25:36');
INSERT INTO `size` (`id`, `name_size`, `estado`, `created_at`, `updated_at`) VALUES (5,'XL',1,'2023-07-15 22:25:36','2023-07-15 22:25:36');
INSERT INTO `size` (`id`, `name_size`, `estado`, `created_at`, `updated_at`) VALUES (6,'XXL',1,'2023-07-15 22:25:36','2023-07-15 22:25:36');
INSERT INTO `size` (`id`, `name_size`, `estado`, `created_at`, `updated_at`) VALUES (7,'XXXL',1,'2023-07-15 22:25:36','2023-07-15 22:25:36');
/*!40000 ALTER TABLE `size` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `testtemp`
--

LOCK TABLES `testtemp` WRITE;
/*!40000 ALTER TABLE `testtemp` DISABLE KEYS */;
INSERT INTO `testtemp` (`id`, `tableName`) VALUES (1,'detalleVenta');
INSERT INTO `testtemp` (`id`, `tableName`) VALUES (2,'estado');
INSERT INTO `testtemp` (`id`, `tableName`) VALUES (3,'venta');
/*!40000 ALTER TABLE `testtemp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `transaccion`
--

LOCK TABLES `transaccion` WRITE;
/*!40000 ALTER TABLE `transaccion` DISABLE KEYS */;
INSERT INTO `transaccion` (`id`, `trans_nombre`, `estado`, `created_at`, `updated_at`) VALUES (1,'ENTRADA',1,'2023-07-02 10:49:11','2023-07-02 10:49:11');
INSERT INTO `transaccion` (`id`, `trans_nombre`, `estado`, `created_at`, `updated_at`) VALUES (2,'SALIDA',1,'2023-07-02 10:49:20','2023-07-02 10:49:20');
/*!40000 ALTER TABLE `transaccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `user`, `intentos`, `token`, `estado`, `remember_token`, `ApiToken`, `created_at`, `updated_at`) VALUES (1,'admin@fhope.online',NULL,'$2y$10$U5BYY3D1V/KxttsRmgnrJu4/o2NGCL6AsR/8dxz0FFHtoiOD/BtCG','admin',100,NULL,1,NULL,'eyJpdiI6IjhlTnVYamxPMjhzS1dMSDhvbytZNHc9PSIsInZhbHVlIjoib1I1ZXZkeTJsS3A0dkQvcUFnSDNOZmVBek8wbGlSU2lrL3hDRUdyUTM4UlFnUnd0MDQvK0RGVUVWZUpHdWdpY3A1RVh4c1M1T1NnekNJL0txSE9wSFE9PSIsIm1hYyI6IjdjNTMzN2E0YjZiM2Y0ZWFmYjc1ZGMyN2Q2N2M1ZWM4MTgyMTZmOTcwZmM3ZTQxODI4OTg1ZDkyNDJlMzU3MGYiLCJ0YWciOiIifQ==','2023-07-15 22:25:36','2023-07-15 22:25:36');
INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `user`, `intentos`, `token`, `estado`, `remember_token`, `ApiToken`, `created_at`, `updated_at`) VALUES (2,'helen.orellana@fhope.online',NULL,'$2y$10$nhaskv19VdV2/qW0Cm4cq.JsUauRcv50M4o0HaAUTo76/o2SLkLPy','helen.orellana',3,NULL,1,NULL,'eyJpdiI6IndiekMvRS9rK0dJdE4zcTI5OEZPM1E9PSIsInZhbHVlIjoiWEpNNERGaTRvaFQwbnlRMW5Ec2xvNzJqTS85VE9ub2hXcFNoQUdmeTAzSEVpb0ZTRWU3YnE0RkJvSWZtUVpVQ2JDYWJ3RC9Lc2FZMUVsZ05JSlVCL3c9PSIsIm1hYyI6IjE3ZDRiYTQxYmMzYzM4NWI5NWJkOTIxYTI5ZGNhM2EyMmJiYmE0ZTQ0MzU1YzAwMmNlMWRhMjZjMjQyNWRkMTUiLCJ0YWciOiIifQ==','2023-06-21 20:07:24','2023-08-13 20:41:55');
INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `user`, `intentos`, `token`, `estado`, `remember_token`, `ApiToken`, `created_at`, `updated_at`) VALUES (3,'rafael.mendoza@fhope.online',NULL,'$2y$10$2hJ6GFE8MvNpP6rDV2fVSeZ1dDwNHHKrJEo2xwysitt1mI1etKK6e','rafael.mendoza',3,NULL,1,NULL,'eyJpdiI6IkJyck5PRElHZkRlZy9ZeHhkcUlQQlE9PSIsInZhbHVlIjoiaUN2aW1GK2xEUkd5WXlCZVFHK0l1a25Ca0xTM0pRRi9nTVR3T0lTM201THA1dHBhZk1yWDcyRHU4MEw3amxLU1llR2J4WnJOMzFhc0ttZ1dpQ1BoaWc9PSIsIm1hYyI6IjAzZTk5NzY0MTFmZTllNjExYmZlNzVlZTI5MzhlZmY4ZjczNzcxMDI3ZmJiNzhjNzliZGM5N2JmOGExZTkwYTAiLCJ0YWciOiIifQ==','2023-06-21 20:08:16','2023-08-13 20:46:10');
INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `user`, `intentos`, `token`, `estado`, `remember_token`, `ApiToken`, `created_at`, `updated_at`) VALUES (4,'QA@fhope.online',NULL,'$2y$10$PyKEMqM4YeYDNIRoV97R4OiLNiFq9Uhq8P8du0SdcWVegZupS8tPa','QA',3,NULL,1,NULL,'eyJpdiI6Ino5eC9aM0FQTkx3R1JhYUtOTGRYSUE9PSIsInZhbHVlIjoiVTl3Tno0bFhDVjBsdkxEQXk4K3dBZGJTQ05pcTIrQ09xRlEwMCtmUnF5NkZFbVprUnlOeHQxY0I2NzVZOFp4ODcwell6Rmtxd1lzMFhDM2JPVlRNN0E9PSIsIm1hYyI6IjcwNThiN2IzNWY2ODhiM2ZlNjYwMGQ5ZGM1NTMyNzNiZTUwNWY0NTg1ZGU0N2UwZThlYWZmZTc5ZGI3ZTI3YzEiLCJ0YWciOiIifQ==','2023-06-21 20:10:30','2023-06-21 20:10:30');
INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `user`, `intentos`, `token`, `estado`, `remember_token`, `ApiToken`, `created_at`, `updated_at`) VALUES (2025,'test@fhope.online',NULL,'$2y$10$rPNCdx5arvFEwef3Hv4iyeTOkTJPQgERKOs2dMnjQH5NATsk/AJP.','test',3,NULL,1,NULL,'eyJpdiI6IklPa01sYy9PV3pwOHhUZS9NdENPSVE9PSIsInZhbHVlIjoicGdsa0YwRHpKVVFyTTVhOHhIK0R4RFJJUXVqSFNYR2xiL2NZd3lSaS8rNk9yVFhEMmFtOHBxRmFEK0Nza2tHdSIsIm1hYyI6IjJlZWIzMDNiYzc1ZDc2ZjlhMmM3N2FhYTA4YjM5ZjI0N2Q5M2QwYzFmMjEzOWI5MzE5YzBlMzVjMmVjMjZiOTkiLCJ0YWciOiIifQ==','2024-01-01 04:08:29','2024-01-01 04:08:29');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `venta`
--

LOCK TABLES `venta` WRITE;
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (1,1,3,'2023-06-01 22:57:35','Unah edificio administrativoÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â AlmaÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â mater',800.00,1,'2023-06-02 22:57:35','2023-06-02 22:57:35');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (2,2,3,'2023-06-01 23:00:22','Tegucigalpa en comayaguela primera avenida en el autolote Emmanuel en el puente JuanÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â RamÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³nÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â Molina',800.00,1,'2023-06-02 23:00:22','2023-06-02 23:00:22');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (3,3,3,'2023-06-01 23:07:33','Tegucigalpa en comayaguela primera avenida en el autolote Emmanuel en el puente JuanÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â RamÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³nÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â Molina',800.00,1,'2023-06-02 23:07:32','2023-06-02 23:07:32');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (4,4,3,'2023-06-01 23:16:43','Col: villa nueva.. Calle principal.. Salida a DanlÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â­, pulp lesly colorÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â anaranjado',800.00,1,'2023-06-02 23:16:43','2023-06-02 23:16:43');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (5,5,3,'2023-06-01 23:19:31','MALL PREMIER',800.00,1,'2023-06-02 23:19:30','2023-06-02 23:19:30');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (6,6,3,'2023-06-01 23:22:14','Frente al Instituto San Miguel al par de ClÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â­nica Med Estetic,ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â Tegucigalpa',800.00,1,'2023-06-02 23:22:14','2023-06-02 23:22:14');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (7,7,3,'2023-06-01 23:26:14','Juzgado deÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â letrasÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â Danl',850.00,1,'2023-06-02 23:26:14','2023-06-02 23:26:14');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (8,8,2,'2023-06-02 22:46:14','Mall Premier',800.00,1,'2023-06-03 22:46:14','2023-06-03 22:46:14');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (9,9,2,'2023-06-06 17:07:04','Comayaguela, libreria reyes',800.00,1,'2023-06-07 17:07:05','2023-06-07 17:07:05');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (10,14,2,'2023-06-06 17:20:22','Infop San felipwe',800.00,1,'2023-06-07 17:20:23','2023-06-07 17:20:23');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (11,15,2,'2023-06-06 17:22:18','Colonia el Pedregal',800.00,1,'2023-06-07 17:22:19','2023-06-07 17:22:19');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (12,21,2,'2023-06-09 00:06:33','Col. America',780.00,1,'2023-06-10 00:06:33','2023-06-10 00:06:33');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (13,16,2,'2023-06-09 00:09:46','Col. Victor Ardon',850.00,1,'2023-06-10 00:09:46','2023-06-10 00:09:46');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (14,17,2,'2023-06-09 00:10:38','Mall Cascadas',890.00,1,'2023-06-10 00:10:37','2023-06-10 00:10:37');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (15,19,2,'2023-06-09 00:11:42','Metromall',800.00,1,'2023-06-10 00:11:41','2023-06-10 00:11:41');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (21,20,2,'2023-06-09 00:18:25','Plaza Milenio',980.00,1,'2023-06-10 00:18:24','2023-06-10 00:18:24');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (23,26,2,'2023-06-27 20:17:58','Villanueva Cortes',850.00,1,'2023-06-28 14:17:59','2023-06-28 14:17:59');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (25,30,2,'2023-07-05 19:02:35','COL VILLA NUEVA',850.00,1,'2023-07-06 07:02:37','2023-07-06 07:02:37');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (26,29,2,'2023-07-05 19:03:23','VILLA VIEJA',850.00,1,'2023-07-06 07:03:25','2023-07-06 07:03:25');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (27,31,2,'2023-07-11 12:36:14','Diunsa Miraflores',840.00,1,'2023-07-12 00:36:14','2023-07-12 00:36:14');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (28,32,2,'2023-07-11 12:37:52','Plaza miraflores',880.00,1,'2023-07-12 00:37:51','2023-07-12 00:37:51');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (29,33,2,'2023-07-17 13:55:05','Loarque',850.00,1,'2023-07-17 19:55:06','2023-07-17 19:55:06');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (42,1,2,'2020-03-02 00:00:00','Las colinas',900.00,1,'2024-01-01 00:42:00','2024-01-01 00:42:00');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (43,1,2,'2023-12-31 00:00:00','Las colinas',1000.00,1,'2024-01-01 00:42:30','2024-01-01 00:42:30');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (44,1,2,'2023-12-31 00:00:00','YUGOPOTAMIA',1000.00,1,'2024-01-01 00:56:21','2024-01-01 00:56:21');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (51,1,1,'2023-12-31 00:00:00','YUGOPOTAMIA',1000.00,1,'2024-01-01 01:36:22','2024-01-01 01:36:22');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (57,1,1,'2023-12-31 22:51:39','530 LINWOOD AVE',2400.00,1,'2024-01-01 04:51:40','2024-01-01 04:51:40');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (60,1,1,'2023-12-31 23:03:43','530 LINWOOD AVE',4000.00,1,'2024-01-01 05:03:44','2024-01-01 05:03:44');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (61,1,1,'2023-12-31 23:08:27','530 LINWOOD AVE',4000.00,1,'2024-01-01 05:08:27','2024-01-01 05:08:27');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (62,1,1,'2023-12-31 23:12:09','Colonia San Francisco, sector #3, 4 casas después de la iglesia Eben - Ezer',1600.00,1,'2024-01-01 05:12:09','2024-01-01 05:12:09');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (63,1,1,'2023-12-31 23:14:45','Col. San Fransisco',1600.00,1,'2024-01-01 05:14:45','2024-01-01 05:14:45');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (65,1,1,'2023-12-31 23:21:01','Col. San Fransisco',800.00,1,'2024-01-01 05:21:02','2024-01-01 05:21:02');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (66,1,1,'2023-12-31 23:22:44','Col. San Fransisco',800.00,1,'2024-01-01 05:22:44','2024-01-01 05:22:44');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (68,1,1,'2024-01-01 00:17:15','Col. San Fransisco',2550.00,1,'2024-01-01 06:17:15','2024-01-01 06:17:15');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (69,1,1,'2024-01-01 00:17:47','Col. San Fransisco',2550.00,1,'2024-01-01 06:17:47','2024-01-01 06:17:47');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (71,1,1,'2024-01-01 00:36:59','Col. San Fransisco',2880.00,1,'2024-01-01 06:36:59','2024-01-01 06:36:59');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (73,1,1,'2024-01-01 00:54:27','Col. San Fransisco',3840.00,1,'2024-01-01 06:54:27','2024-01-01 06:54:27');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (74,1,1,'2024-01-01 00:55:15','Col. San Fransisco',1920.00,1,'2024-01-01 06:55:16','2024-01-01 06:55:16');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (75,1,1,'2024-01-01 00:56:04','Col. San Fransisco',1920.00,1,'2024-01-01 06:56:05','2024-01-01 06:56:05');
INSERT INTO `venta` (`id`, `cliente_id`, `usuario_id`, `fecha`, `direccionEnvio`, `total`, `estado`, `created_at`, `updated_at`) VALUES (76,1,1,'2024-01-01 01:14:21','Col. San Fransisco',4800.00,1,'2024-01-01 07:14:21','2024-01-01 07:14:21');
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

-- Dump completed on 2024-01-15  1:11:28
