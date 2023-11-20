-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table prueba.detalle_permisos
CREATE TABLE IF NOT EXISTS `detalle_permisos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `estado` int NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `id_tipo_usuario` int NOT NULL,
  `id_permiso` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tipo_usuario` (`id_tipo_usuario`),
  KEY `id_permiso` (`id_permiso`),
  CONSTRAINT `detalle_permisos_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuarios` (`id`),
  CONSTRAINT `detalle_permisos_ibfk_2` FOREIGN KEY (`id_permiso`) REFERENCES `permisos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Dumping data for table prueba.detalle_permisos: ~22 rows (approximately)
INSERT INTO `detalle_permisos` (`id`, `estado`, `createdAt`, `updatedAt`, `id_tipo_usuario`, `id_permiso`) VALUES
	(1, 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42', 1, 1),
	(2, 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42', 1, 2),
	(3, 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42', 1, 3),
	(4, 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42', 1, 4),
	(5, 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42', 1, 5),
	(6, 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42', 1, 6),
	(7, 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42', 1, 7),
	(8, 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42', 1, 8),
	(9, 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42', 1, 9),
	(10, 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42', 1, 10),
	(11, 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42', 1, 11),
	(12, 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42', 1, 12),
	(13, 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42', 1, 13),
	(14, 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42', 1, 14),
	(15, 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42', 1, 15),
	(16, 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42', 1, 16),
	(17, 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42', 1, 17),
	(18, 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42', 1, 18),
	(19, 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42', 1, 19),
	(20, 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42', 1, 20),
	(21, 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42', 1, 21),
	(22, 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42', 1, 22);

-- Dumping structure for table prueba.permisos
CREATE TABLE IF NOT EXISTS `permisos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `estado` int NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Dumping data for table prueba.permisos: ~22 rows (approximately)
INSERT INTO `permisos` (`id`, `nombre`, `estado`, `createdAt`, `updatedAt`) VALUES
	(1, 'Panel de Control', 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42'),
	(2, 'Asignación de Usuarios', 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42'),
	(3, 'Compras - Farmacia', 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42'),
	(4, 'Ventas - Farmacia', 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42'),
	(5, 'Inventario - Farmacia', 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42'),
	(6, 'Ajustes de Inventario - Farmacia', 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42'),
	(7, 'Reportes y Estadísticas - Farmacia', 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42'),
	(8, 'Cobros', 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42'),
	(9, 'Cierre de Caja', 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42'),
	(10, 'Reportes y Estadísticas - Caja', 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42'),
	(11, 'Pacientes', 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42'),
	(12, 'Historial de Pacientes', 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42'),
	(13, 'Reportes y Estadísticas - Pacientes', 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42'),
	(14, 'Clínicas', 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42'),
	(15, 'Agenda de Citas - Arrendamiento', 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42'),
	(16, 'Reportes y Estadísticas - Arrendamiento', 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42'),
	(17, 'Exámenes', 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42'),
	(18, 'Compras - Laboratorio', 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42'),
	(19, 'Ventas - Laboratorio', 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42'),
	(20, 'Inventario - Laboratorio', 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42'),
	(21, 'Agenda de Citas - Laboratorio', 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42'),
	(22, 'Reportes y Estadísticas - Laboratorio', 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42');

-- Dumping structure for table prueba.sequelizemeta
CREATE TABLE IF NOT EXISTS `sequelizemeta` (
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`name`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table prueba.sequelizemeta: ~4 rows (approximately)
INSERT INTO `sequelizemeta` (`name`) VALUES
	('20220506172139-tipo_usuario.js'),
	('20220506172156-permisos.js'),
	('20220506172203-usuario.js'),
	('20220506172208-detalle_permisos.js');

-- Dumping structure for table prueba.tipo_usuarios
CREATE TABLE IF NOT EXISTS `tipo_usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `estado` int NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table prueba.tipo_usuarios: ~2 rows (approximately)
INSERT INTO `tipo_usuarios` (`id`, `nombre`, `estado`, `createdAt`, `updatedAt`) VALUES
	(1, 'Administración', 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42'),
	(2, 'Caja', 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42');

-- Dumping structure for table prueba.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `estado` int NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `id_tipo_usuario` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tipo_usuario` (`id_tipo_usuario`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table prueba.usuarios: ~1 rows (approximately)
INSERT INTO `usuarios` (`id`, `user`, `password`, `nombre`, `apellidos`, `telefono`, `correo`, `estado`, `createdAt`, `updatedAt`, `id_tipo_usuario`) VALUES
	(1, 'Alumnos', '$2a$10$RsI/ENKeLXqnPkw8FcQjduEGzecgnZWCdOG9.lKVfKpEoPalGZS7a', 'Alumnos', 'Meso', '5000000', NULL, 1, '2023-05-15 23:54:42', '2023-05-15 23:54:42', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
