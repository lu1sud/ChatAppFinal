-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 16-03-2024 a las 17:02:09
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chatapp_final`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `messages__id` int NOT NULL AUTO_INCREMENT,
  `emisor_id` varchar(255) NOT NULL,
  `messages` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `imagen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `receptor_id` varchar(255) NOT NULL,
  PRIMARY KEY (`messages__id`)
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`messages__id`, `emisor_id`, `messages`, `imagen`, `receptor_id`) VALUES
(108, '65bb055a10c21', '', '1709493646anime-bleach-multfilmy-muzhchiny-18939.jpeg.wav', '65baa5b3069b5'),
(107, '65bb055a10c21', 'holas como estas?', '', '65baa5b3069b5'),
(105, '65baa5b3069b5', 'sdfd', '', '65bb055a10c21'),
(106, '65baa5b3069b5', 'ASDASD', '', '65bb055a10c21'),
(104, '65baa5b3069b5', 'asdasd', '', '65bb055a10c21'),
(102, '65baa5b3069b5', 'sd', '', '65bb055a10c21'),
(103, '65baa5b3069b5', 'sd', '', '65bb055a10c21'),
(101, '65baa5b3069b5', 'asd', '', '65bb055a10c21'),
(100, '65baa5b3069b5', 'asdasd', '', '65bb055a10c21'),
(99, '65baa5b3069b5', 'asdasd', '', '65bb055a10c21'),
(98, '65baa5b3069b5', 'golis', '', '65bb055a10c21'),
(97, '65baa5b3069b5', 'holis como estas', '', '65bb055a10c21'),
(96, '65baa5b3069b5', '', '1709489757Minotaur King.png.wav', '65bb055a10c21'),
(95, '65baa5b3069b5', 'sd', '', '65bb055a10c21'),
(94, '65baa5b3069b5', '', '1709489334Minotaur King.png.wav', '65bb055a10c21'),
(93, '65baa5b3069b5', 'asdasd', '', '65bb055a10c21'),
(92, '65baa5b3069b5', '', '1709489074conoceme.jpg.wav', '65bb055a10c21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `usuario_id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `unique_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`usuario_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `nombre`, `email`, `password`, `img`, `status`, `unique_id`) VALUES
(14, 'luis', 'luis@gmail.com', '502ff82f7f1f8218dd41201fe4353687', '65e4d23820c05perfil 4.jpg', 'online', '65e4d23820c08'),
(13, 'jesus', 'jusus@gmail.com', '110d46fcd978c24f306cd7fa23464d73', '65e4ce99d3cd7playerLeft.png', 'online', '65e4ce99d3cdb');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
