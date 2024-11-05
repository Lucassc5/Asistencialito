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
  `dni_alumno` int NOT NULL,
  `id_materia` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_alumno`),
  KEY `id_materia` (`id_materia`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla asistencialito.alumnos: ~22 rows (aproximadamente)
INSERT INTO `alumnos` (`id_alumno`, `nombre_alumno`, `apellido_alumno`, `fecha_nacimiento_alumno`, `dni_alumno`, `id_materia`) VALUES
	(1, 'Valentino', 'Andrade', '1999-03-12', 35123456, '1'),
	(2, 'Lucas Gabriel', 'Cedres', '1998-09-07', 34876543, '1'),
	(3, 'Facundo', 'Figun', '2000-11-25', 40123789, '1'),
	(4, 'Luca', 'Giordano', '1997-06-02', 32456789, '1'),
	(5, 'Bruno', 'Godoy', '1999-01-18', 36789123, '1'),
	(6, 'Agustin', 'Gomez', '1996-04-30', 33567890, '1'),
	(7, 'Brian', 'Gonzalez', '1997-12-05', 35678901, '1'),
	(8, 'Federico', 'Guigou Scottini', '1998-08-15', 37890123, '1'),
	(9, 'Luna', 'Marrano', '1999-03-10', 38901234, '1'),
	(10, 'Giuliana', 'Mercado Aviles', '1995-10-22', 33345678, '1'),
	(11, 'Lucila', 'Mercado Ruiz', '1996-12-08', 32567890, '1'),
	(12, 'Angel', 'Murillo', '1998-02-27', 34890123, '1'),
	(13, 'Juan', 'Nissero', '1999-07-17', 36123456, '1'),
	(14, 'Fausto', 'Parada', '1997-11-06', 35234567, '1'),
	(15, 'Ignacio', 'Piter', '1996-05-19', 32789012, '1'),
	(16, 'Tomas', 'Planchon', '2000-09-03', 40456789, '1'),
	(17, 'Elisa', 'Ronconi', '1995-01-24', 31678123, '1'),
	(18, 'Exequiel', 'Sanchez', '1998-04-11', 33234567, '1'),
	(19, 'Melina', 'Schimpf Baldo', '1996-10-09', 33789456, '1'),
	(20, 'Diego', 'Segovia', '1997-02-13', 34567890, '1'),
	(21, 'Camila', 'Sittner', '1999-08-20', 36456789, '1'),
	(22, 'Yamil', 'Villa', '1998-06-28', 35345678, '1');

-- Volcando estructura para tabla asistencialito.asistencias
CREATE TABLE IF NOT EXISTS `asistencias` (
  `id_asistencia` int NOT NULL AUTO_INCREMENT,
  `id_alumno` int DEFAULT NULL,
  `id_materia` int DEFAULT NULL,
  `fecha_asistencia` date NOT NULL,
  `presente` tinyint DEFAULT NULL,
  PRIMARY KEY (`id_asistencia`),
  KEY `id_alumno` (`id_alumno`),
  KEY `id_materia` (`id_materia`),
  CONSTRAINT `asistencias_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`),
  CONSTRAINT `asistencias_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla asistencialito.asistencias: ~6 rows (aproximadamente)
INSERT INTO `asistencias` (`id_asistencia`, `id_alumno`, `id_materia`, `fecha_asistencia`, `presente`) VALUES
	(1, 1, 1, '2024-11-05', 1),
	(2, 2, 1, '2024-11-05', 1),
	(3, 3, 1, '2024-11-05', 1),
	(4, 4, 1, '2024-11-05', 1),
	(5, 5, 1, '2024-11-05', 1),
	(6, 6, 1, '2024-11-05', 1);

-- Volcando estructura para tabla asistencialito.institucion
CREATE TABLE IF NOT EXISTS `institucion` (
  `id_institucion` int NOT NULL AUTO_INCREMENT,
  `nombre_institucion` varchar(255) NOT NULL,
  `direccion_institucion` varchar(255) NOT NULL,
  `cue` int NOT NULL,
  `id_profesor` int DEFAULT NULL,
  PRIMARY KEY (`id_institucion`),
  KEY `id_profesor` (`id_profesor`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla asistencialito.institucion: ~2 rows (aproximadamente)
INSERT INTO `institucion` (`id_institucion`, `nombre_institucion`, `direccion_institucion`, `cue`, `id_profesor`) VALUES
	(1, 'sedes', 'santa fe', 123, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla asistencialito.materias: ~2 rows (aproximadamente)
INSERT INTO `materias` (`id_materia`, `nombre_materia`, `id_profesor`, `id_institucion`) VALUES
	(1, 'programacion II', 1, 1),
	(2, 'profesorado historia', 1, 1);

-- Volcando estructura para tabla asistencialito.notas
CREATE TABLE IF NOT EXISTS `notas` (
  `id_nota` int NOT NULL AUTO_INCREMENT,
  `id_alumno` int DEFAULT NULL,
  `id_materia` int DEFAULT NULL,
  `nota1` decimal(20,6) DEFAULT NULL,
  `nota2` decimal(20,6) DEFAULT NULL,
  `nota3` decimal(20,6) DEFAULT NULL,
  PRIMARY KEY (`id_nota`),
  KEY `id_alumno` (`id_alumno`),
  KEY `id_materia` (`id_materia`),
  CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`),
  CONSTRAINT `notas_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`)
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla asistencialito.notas: ~44 rows (aproximadamente)
INSERT INTO `notas` (`id_nota`, `id_alumno`, `id_materia`, `nota1`, `nota2`, `nota3`) VALUES
	(113, NULL, NULL, 8.000000, 9.000000, 10.000000),
	(114, NULL, NULL, 9.000000, 6.000000, 7.000000),
	(115, NULL, NULL, 10.000000, 5.000000, 10.000000),
	(116, NULL, NULL, 10.000000, 8.000000, 3.000000),
	(117, NULL, NULL, 1.000000, 2.000000, 8.000000),
	(118, NULL, NULL, 0.000000, 0.000000, 0.000000),
	(119, NULL, NULL, 0.000000, 0.000000, 0.000000),
	(120, NULL, NULL, 0.000000, 0.000000, 0.000000),
	(121, NULL, NULL, 0.000000, 0.000000, 0.000000),
	(122, NULL, NULL, 0.000000, 0.000000, 0.000000),
	(123, NULL, NULL, 0.000000, 0.000000, 0.000000),
	(124, NULL, NULL, 0.000000, 0.000000, 0.000000),
	(125, NULL, NULL, 0.000000, 0.000000, 0.000000),
	(126, NULL, NULL, 0.000000, 0.000000, 0.000000),
	(127, NULL, NULL, 0.000000, 0.000000, 0.000000),
	(128, NULL, NULL, 0.000000, 0.000000, 0.000000),
	(129, NULL, NULL, 0.000000, 0.000000, 0.000000),
	(130, NULL, NULL, 0.000000, 0.000000, 0.000000),
	(131, NULL, NULL, 0.000000, 0.000000, 0.000000),
	(132, NULL, NULL, 0.000000, 0.000000, 0.000000),
	(133, NULL, NULL, 0.000000, 0.000000, 0.000000),
	(134, NULL, NULL, 0.000000, 0.000000, 0.000000),
	(135, 6, 1, 0.000000, 0.000000, 0.000000),
	(136, 7, 1, 0.000000, 0.000000, 0.000000),
	(137, 8, 1, 0.000000, 0.000000, 0.000000),
	(138, 9, 1, 0.000000, 0.000000, 0.000000),
	(139, 10, 1, 0.000000, 0.000000, 0.000000),
	(140, 11, 1, 0.000000, 0.000000, 0.000000),
	(141, 12, 1, 0.000000, 0.000000, 0.000000),
	(142, 13, 1, 0.000000, 0.000000, 0.000000),
	(143, 14, 1, 0.000000, 0.000000, 0.000000),
	(144, 15, 1, 0.000000, 0.000000, 0.000000),
	(145, 16, 1, 0.000000, 0.000000, 0.000000),
	(146, 17, 1, 0.000000, 0.000000, 0.000000),
	(147, 18, 1, 0.000000, 0.000000, 0.000000),
	(148, 19, 1, 0.000000, 0.000000, 0.000000),
	(149, 20, 1, 0.000000, 0.000000, 0.000000),
	(150, 21, 1, 0.000000, 0.000000, 0.000000),
	(151, 22, 1, 0.000000, 0.000000, 0.000000),
	(152, 1, 1, 1.000000, 2.000000, 3.000000),
	(153, 2, 1, 10.000000, 10.000000, 10.000000),
	(154, 3, 1, 7.000000, 8.000000, 9.000000),
	(155, 4, 1, 8.000000, 9.000000, 6.000000),
	(156, 5, 1, 0.000000, 0.000000, 0.000000);

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

-- Volcando datos para la tabla asistencialito.profesores: ~1 rows (aproximadamente)
INSERT INTO `profesores` (`id_profesor`, `email_profesor`, `contrasena_profesor`, `nombre_profesor`, `apellido_profesor`, `fecha_nacimiento_profesor`, `legajo`) VALUES
	(1, 'lucas@gmail.com', 'lucas123', 'Lucas', 'CedrÃ©s', '2002-08-25', 2);

-- Volcando estructura para tabla asistencialito.ram
CREATE TABLE IF NOT EXISTS `ram` (
  `nota_regular` int DEFAULT NULL,
  `nota_promocion` int DEFAULT NULL,
  `asistencia_promocion` int DEFAULT NULL,
  `asistencia_regular` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla asistencialito.ram: ~0 rows (aproximadamente)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
