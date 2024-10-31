-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para asistencialito
CREATE DATABASE IF NOT EXISTS `asistencialito` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `asistencialito`;

-- Volcando estructura para tabla asistencialito.alumnos
CREATE TABLE IF NOT EXISTS `alumnos` (
  `id_alumno` int NOT NULL AUTO_INCREMENT,
  `nombre_alumno` varchar(100) NOT NULL,
  `apellido_alumno` varchar(100) NOT NULL,
  `fecha_nacimiento_alumno` date NOT NULL,
  `id_materia` varchar(50) NOT NULL,
  PRIMARY KEY (`id_alumno`),
  KEY `id_materia` (`id_materia`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla asistencialito.alumnos: ~2 rows (aproximadamente)
INSERT INTO `alumnos` (`id_alumno`, `nombre_alumno`, `apellido_alumno`, `fecha_nacimiento_alumno`, `id_materia`) VALUES
	(1, 'Fausto', 'Parada', '1996-08-21', '1'),
	(2, 'Lucas', 'Cedres', '2002-08-25', '1');

-- Volcando estructura para tabla asistencialito.asistencias
CREATE TABLE IF NOT EXISTS `asistencias` (
  `id_asistencia` int NOT NULL AUTO_INCREMENT,
  `id_alumno` int DEFAULT NULL,
  `id_materia` int DEFAULT NULL,
  `fecha_asistencia` date NOT NULL,
  PRIMARY KEY (`id_asistencia`),
  KEY `id_alumno` (`id_alumno`),
  KEY `id_materia` (`id_materia`),
  CONSTRAINT `asistencias_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`),
  CONSTRAINT `asistencias_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla asistencialito.asistencias: ~0 rows (aproximadamente)
INSERT INTO `asistencias` (`id_asistencia`, `id_alumno`, `id_materia`, `fecha_asistencia`) VALUES
	(21, 1, 1, '2024-10-31');

-- Volcando estructura para tabla asistencialito.institucion
CREATE TABLE IF NOT EXISTS `institucion` (
  `id_institucion` int NOT NULL AUTO_INCREMENT,
  `nombre_institucion` varchar(255) NOT NULL,
  `direccion_institucion` varchar(255) NOT NULL,
  `cue` int NOT NULL,
  PRIMARY KEY (`id_institucion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla asistencialito.institucion: ~0 rows (aproximadamente)
INSERT INTO `institucion` (`id_institucion`, `nombre_institucion`, `direccion_institucion`, `cue`) VALUES
	(1, 'sedes', 'santa fe', 123);

-- Volcando estructura para tabla asistencialito.materias
CREATE TABLE IF NOT EXISTS `materias` (
  `id_materia` int NOT NULL AUTO_INCREMENT,
  `nombre_materia` varchar(100) NOT NULL,
  `id_profesor` int NOT NULL,
  `id_institucion` int NOT NULL,
  PRIMARY KEY (`id_materia`),
  KEY `id_profesor` (`id_profesor`),
  KEY `id_institucion` (`id_institucion`),
  CONSTRAINT `materias_ibfk_1` FOREIGN KEY (`id_profesor`) REFERENCES `profesores` (`id_profesor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla asistencialito.materias: ~1 rows (aproximadamente)
INSERT INTO `materias` (`id_materia`, `nombre_materia`, `id_profesor`, `id_institucion`) VALUES
	(1, 'programacion II', 1, 1);

-- Volcando estructura para tabla asistencialito.notas
CREATE TABLE IF NOT EXISTS `notas` (
  `id_nota` int NOT NULL AUTO_INCREMENT,
  `id_alumno` int DEFAULT NULL,
  `id_materia` int DEFAULT NULL,
  `parcial1` decimal(20,6) DEFAULT NULL,
  `parcial2` decimal(20,6) DEFAULT NULL,
  `final` decimal(20,6) DEFAULT NULL,
  PRIMARY KEY (`id_nota`),
  KEY `id_alumno` (`id_alumno`),
  KEY `id_materia` (`id_materia`),
  CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`),
  CONSTRAINT `notas_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla asistencialito.notas: ~0 rows (aproximadamente)

-- Volcando estructura para tabla asistencialito.profesores
CREATE TABLE IF NOT EXISTS `profesores` (
  `id_profesor` int NOT NULL AUTO_INCREMENT,
  `email_profesor` varchar(50) NOT NULL,
  `contrasena_profesor` varchar(50) NOT NULL,
  `nombre_profesor` varchar(100) NOT NULL,
  `apellido_profesor` varchar(100) NOT NULL,
  `fecha_nacimiento_profesor` date NOT NULL,
  `legajo` int NOT NULL,
  PRIMARY KEY (`id_profesor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla asistencialito.profesores: ~2 rows (aproximadamente)
INSERT INTO `profesores` (`id_profesor`, `email_profesor`, `contrasena_profesor`, `nombre_profesor`, `apellido_profesor`, `fecha_nacimiento_profesor`, `legajo`) VALUES
	(1, 'lucas@gmail.com', 'lucas123', 'Lucas', 'CedrÃ©s', '2002-08-25', 2);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
