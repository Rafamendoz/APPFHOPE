//

CREATE TABLE `compra_header` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_cliente` bigint unsigned NOT NULL,
  `total` double(8,2) NOT NULL,
  `id_tipoCompra` bigint unsigned NOT NULL,
  `id_tipoMoneda` bigint unsigned NOT NULL,
  `estado` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `compra_header_cliente_FK` (`id_cliente`),
  KEY `compra_header_estado_FK` (`estado`),
  KEY `compra_header_moneda_FK` (`id_tipoMoneda`),
  KEY `compra_header_tipocompra_FK` (`id_tipoCompra`),
  CONSTRAINT `compra_header_cliente_FK` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `compra_header_estado_FK` FOREIGN KEY (`estado`) REFERENCES `estado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `compra_header_moneda_FK` FOREIGN KEY (`id_tipoMoneda`) REFERENCES `moneda` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `compra_header_tipocompra_FK` FOREIGN KEY (`id_tipoCompra`) REFERENCES `tipocompra` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;


CREATE TABLE `tipocompra` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `estado` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tipocompra_estado_FK` (`estado`),
  CONSTRAINT `tipocompra_estado_FK` FOREIGN KEY (`estado`) REFERENCES `estado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO fhopeonl_gestion_fhope.tipocompra (nombre,estado,created_at,updated_at) VALUES
	 ('CONTADO',1,NULL,NULL),
	 ('TARJETA CREDITO',1,NULL,NULL),
	 ('TARJETA DEBITO',1,NULL,NULL);

   CREATE TABLE `detalle_compra` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_compra` bigint unsigned NOT NULL,
  `producto_ext_nombre` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio` double(8,2) NOT NULL,
  `cantidad` int NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `estado` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detalle_compra_compra_header_FK` (`id_compra`),
  KEY `detalle_compra_estado_FK` (`estado`),
  CONSTRAINT `detalle_compra_compra_header_FK` FOREIGN KEY (`id_compra`) REFERENCES `compra_header` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detalle_compra_estado_FK` FOREIGN KEY (`estado`) REFERENCES `estado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;


CREATE TABLE `profile_users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_profile` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `estado` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_users_estado_FK` (`estado`),
  CONSTRAINT `profile_users_estado_FK` FOREIGN KEY (`estado`) REFERENCES `estado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;




CREATE TABLE `profile_users_auth` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_profile` bigint unsigned NOT NULL,
  `permissions` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `view_name` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULxL,
  PRIMARY KEY (`id`),
  KEY `profile_users_auth_profile_users_FK` (`id_profile`),
  CONSTRAINT `profile_users_auth_profile_users_FK` FOREIGN KEY (`id_profile`) REFERENCES `profile_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;


CREATE TABLE `_user_has_profiles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` bigint unsigned NOT NULL,
  `id_profile` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `_user_has_profiles_id_usuario_IDX` (`id_usuario`) USING BTREE,
  KEY `_user_has_profiles_id_profile_IDX` (`id_profile`) USING BTREE,
  CONSTRAINT `_user_has_profiles_profile_users_FK` FOREIGN KEY (`id_profile`) REFERENCES `profile_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `_user_has_profiles_users_FK` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;


ALTER TABLE fhopeonl_gestion_fhope.inventory MODIFY COLUMN estado bigint unsigned DEFAULT 1 NOT NULL;



CREATE TABLE `routes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `route_name` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `method` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=198 DEFAULT CHARSET=utf8mb4 COLLATE