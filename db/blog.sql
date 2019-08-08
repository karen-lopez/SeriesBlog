-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 08-08-2019 a las 07:59:50
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Fantacía'),
(2, 'Comedia'),
(3, 'Drama'),
(4, 'info'),
(5, 'Acción');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

DROP TABLE IF EXISTS `entradas`;
CREATE TABLE IF NOT EXISTS `entradas` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(255) NOT NULL,
  `categoria_id` int(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` mediumtext,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_entrada_usuario` (`usuario_id`),
  KEY `fk_entrada_categoria` (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`id`, `usuario_id`, `categoria_id`, `titulo`, `descripcion`, `fecha`) VALUES
(1, 1, 1, 'Gotham', 'review de Gotham', '2019-03-08'),
(2, 1, 2, 'El joven Sheldon', 'review de El joven Sheldon', '2019-03-08'),
(3, 2, 3, 'Siempre Bruja', 'review de Siempre Bruja', '2019-03-08'),
(4, 5, 1, 'The 100', 'Resumen de The 100', '2019-03-08'),
(5, 2, 2, 'Inquebrantable Kimmy Schmidt', 'review Inquebrantable Kimmy Schmidt', '2019-03-08'),
(6, 5, 3, 'Houese', 'Resumen de House', '2019-03-08'),
(7, 2, 3, 'Riverdale', 'Resumen de Riverdale', '2019-03-08'),
(8, 1, 2, 'Inquebrantable Kimmy Schmidt', 'Cosas que no sabias sobre Kimmy Schmidt', '2019-03-13'),
(9, 6, 4, 'Reglas del blog', 'Reglas', '2019-03-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `email`, `password`, `fecha`) VALUES
(1, 'karen', 'lopez segura', 'k@g.com', '12345', '2019-03-05'),
(2, 'antonio', 'rodriguez', 'a@g.com', '764324', '2019-03-04'),
(5, 'magui', 'chiken', 'y@roma.com', 'v34g', '2019-03-06'),
(6, 'admin', 'admin', 'adm@adm.com', 'admin', '2019-03-13'),
(7, 'Karen', 'Lopez', 'stefanny0214@gmail.com', '$2y$04$2rGe7Xg/E4JJsp2YJaONWeNypjqPfAZW7AsEIdq2E7R0TzyoBJNgO', '2019-08-08'),
(8, 'lilo', 'liri', 'lili@gm.com', '$2y$04$UlFroQ8j2upcXU07KCprnOSI0xDm6ydw93kc6sPQQd365IQLuP9Be', '2019-08-08'),
(9, 'juan', 'reyes', 'juan@correo.com', '$2y$04$vpKtklZ1pTjhCVJQEJBnVeCflDFtQUyDTfDmJd04TYLl0r90NJrmO', '2019-08-08');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `fk_entrada_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `fk_entrada_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
