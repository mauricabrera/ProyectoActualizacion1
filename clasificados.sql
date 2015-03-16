-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-03-2015 a las 06:19:00
-- Versión del servidor: 5.6.16-log
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `clasificados`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificado`
--

CREATE TABLE IF NOT EXISTS `clasificado` (
  `id_clasificado` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `id_usuario` int(11) DEFAULT '0',
  `texto` text NOT NULL,
  `id_tipoclasificado` int(11) NOT NULL,
  `imagen1` text NOT NULL,
  `imagen2` text NOT NULL,
  `imagen3` text NOT NULL,
  `imagen4` text NOT NULL,
  `imagen5` text NOT NULL,
  `imagen6` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_clasificado`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_tipoclasificado` (`id_tipoclasificado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=181 ;

--
-- Volcado de datos para la tabla `clasificado`
--

INSERT INTO `clasificado` (`id_clasificado`, `titulo`, `id_usuario`, `texto`, `id_tipoclasificado`, `imagen1`, `imagen2`, `imagen3`, `imagen4`, `imagen5`, `imagen6`, `created_at`, `updated_at`) VALUES
(4, 'Primer Clasificadooote! :) :) sese', 1, 'deberia estar primero', 7, 'urlimagen1', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-01 20:37:07', '2015-03-12 20:58:59'),
(7, 'Porfies Diosito', 1, '!!! :):)\r\n', 58, 'urlimagen1', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-01 20:40:29', '2015-03-11 19:17:42'),
(10, 'Porfies Diosito', 1, 'again', 61, 'urlimagen1', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-01 20:41:09', '2015-03-02 00:41:09'),
(13, 'es', 1, 'alert', 58, 'urlimagen1', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-01 20:42:33', '2015-03-02 00:42:33'),
(16, 'esa', 1, 'eeehcon alert', 67, 'urlimagen1', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-01 20:42:54', '2015-03-02 00:42:54'),
(19, 'al ert', 1, 'aaaaleeert', 1, 'urlimagen1', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-01 20:44:29', '2015-03-02 00:44:29'),
(22, 'alert', 1, 'aoies', 1, 'urlimagen1', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-01 20:45:06', '2015-03-02 00:45:06'),
(25, 'Diosito', 1, 'es', 10, 'urlimagen1', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-01 23:42:39', '2015-03-02 03:42:39'),
(28, 'es', 1, 'e', 1, 'urlimagen', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-02 00:28:21', '2015-03-02 04:28:21'),
(31, 'ewe3', 1, '3234', 1, 'urlimagen', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-02 00:46:49', '2015-03-02 04:46:49'),
(34, 'vamo', 1, 'porfies', 1, 'urlimagen', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-02 00:48:31', '2015-03-02 04:48:31'),
(37, 'ese', 1, 'we41', 7, 'urlimagen', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-02 01:04:11', '2015-03-02 05:04:11'),
(40, 'feuh', 1, 'euh', 58, 'urlimagen', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-02 10:09:44', '2015-03-02 14:09:44'),
(43, 'titulo', 1, 'texto', 1, 'urlimagen', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-02 12:20:23', '2015-03-02 16:20:23'),
(46, 'titulo', 1, 'texto', 1, '020320151221edgrandes.png', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-02 12:21:17', '2015-03-02 16:21:17'),
(49, 'titulao', 1, 'texto', 1, '020320151228edpeques.png', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-02 12:28:46', '2015-03-02 16:28:46'),
(61, 'toS', 1, 'texto', 1, '020320151238edgrandes.png', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-02 12:38:48', '2015-03-02 16:38:48'),
(64, 'toS', 1, 'texto', 1, '020320151241edpeques.png', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-02 12:41:25', '2015-03-02 16:41:25'),
(67, 'toS', 1, 'texto', 1, '020320151241edpeques.png', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-02 12:41:53', '2015-03-02 16:41:53'),
(70, 'toS', 1, 'texto', 1, '020320151242edpeques.png', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-02 12:42:45', '2015-03-02 16:42:45'),
(73, 'toS', 1, 'texto', 1, '020320151244edpeques.png', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-02 12:44:20', '2015-03-02 16:44:20'),
(76, 'toS', 1, 'texto', 1, '020320151246edpeques.png', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-02 12:46:14', '2015-03-02 16:46:14'),
(82, '', 1, 'texto', 1, '020320151303edpeques.png', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-02 13:03:20', '2015-03-02 17:03:20'),
(85, 'ss', 1, 'texto', 1, '020320151304edpeques.png', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-02 13:04:33', '2015-03-02 17:04:33'),
(88, 'titulao', 1, '8832sdfuhdsj\r\n', 1, '020320151307edpeques.png', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-02 13:07:16', '2015-03-12 20:56:26'),
(91, 'titulao', 1, '', 1, '020320151314edgrandes.png', '020320151314edgrandes.png', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-02 13:14:04', '2015-03-02 17:14:04'),
(94, 'titulao', 1, '', 1, '020320151314edpeques.png', '020320151314edpeques.png', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-02 13:14:27', '2015-03-02 17:14:27'),
(97, 'titulao', 1, '', 1, '020320151351edgrandes.png', '020320151351edgrandes.png', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-02 13:51:00', '2015-03-02 17:51:00'),
(100, 'titulao', 1, '', 1, '020320151507edpeques.png', '020320151507edpeques.png', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-02 15:07:47', '2015-03-02 19:07:47'),
(103, 'titulao', 1, '', 1, '030320150853edpeques.png', '030320150853edpeques.png', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-03 08:53:20', '2015-03-03 12:53:20'),
(106, 'titulao', 1, '', 1, '030320150856edpeques.png', '030320150856edpeques.png', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-03 08:56:42', '2015-03-03 12:56:42'),
(109, 'hola que tal', 1, 'esa eh', 7, '030320150859edpeques.png', '030320150859edpeques.png', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-03 08:59:24', '2015-03-12 20:55:52'),
(112, ' ihnrtiun', 1, '', 1, '030320150902edpeques.png', '030320150902edpeques.png', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-03 09:02:26', '2015-03-03 13:02:26'),
(115, ' ihnrtiun', 1, '', 1, '030320150903edpeques.png', '030320150903edpeques.png', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-03 09:03:32', '2015-03-03 13:03:32'),
(118, ' ihnrtiun', 1, '', 1, '030320150903edpeques.png', '030320150903edpeques.png', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-03 09:03:32', '2015-03-03 13:03:32'),
(124, 'titulao', 1, 'esa eeh', 58, '030320150935edpeques.png', '030320150935edpeques.png', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-03 09:35:39', '2015-03-09 12:47:20'),
(127, 'ejhe', 1, 'ejhe', 7, '["04032015002436edpeques.png"]', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-04 00:24:36', '2015-03-04 04:24:36'),
(130, 'eeseshj', 1, 'eeseshj', 7, '["04032015002538edpeques.png"]', '["04032015002538edgrandes.png"]', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-04 00:25:38', '2015-03-04 04:25:38'),
(133, 'graciasDiosito!', 1, 'graciasDiosito!', 7, '04032015003124edpeques.png', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-04 00:31:24', '2015-03-04 04:31:24'),
(145, 'Primer Anuncio!!', 1, 'FINAL!1', 10, '09032015001410captImp400.png', '09032015001410Captura.PNG', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-09 00:14:10', '2015-03-09 04:14:10'),
(148, 'Porfies Diosito!!! GRACIAS!!!', 1, 'AHORA SI!! CON 6!!!', 7, '090320150019388327285.gif', '090320150019381902729_223707354489185_109966398_n.jpg', '09032015001938captImp400.png', '09032015001938Captura.PNG', '09032015001938chacharichabraaa.PNG', '09032015001938captImp.png', '2015-03-09 00:19:38', '2015-03-09 04:26:43'),
(151, 'CHANCHANCHARACRARARARAA!!1', 1, 'VAMO QUE SE PUEDE!Gracias Diosito!', 58, '11032015150328captImp400.png', '11032015150328chacharichabraaa.PNG', '110320151503281902729_223707354489185_109966398_n.jpg', '11032015150328Captura.PNG', '11032015150328captImp.png', '110320151503288327285.gif', '2015-03-11 15:03:29', '2015-03-13 02:22:41'),
(154, 'hola que tal', 1, 'uh', 1, '13032015092026captImp.png', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-13 09:20:26', '2015-03-13 13:20:53'),
(157, 'holita', 1, ':)', 7, '16032015004524Koala.jpg', '16032015004524Jellyfish.jpg', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-16 00:45:24', '2015-03-16 04:45:24'),
(160, 'mauri id =4 creo', 1, 'primero', 10, '16032015005645Chrysanthemum.jpg', '16032015005645Desert.jpg', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-16 00:56:45', '2015-03-16 04:56:45'),
(163, 'mauri ahora si id =4', 4, 'mauri', 1, '16032015005816Koala.jpg', '16032015005816Lighthouse.jpg', '16032015005816Tulips.jpg', '16032015005816Penguins.jpg', 'urlimagen5', 'urlimagen6', '2015-03-16 00:58:16', '2015-03-16 04:58:16'),
(166, 'sajdh', 7, 'ejs', 7, '16032015011252Jellyfish.jpg', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-16 01:12:52', '2015-03-16 05:12:52'),
(178, 'dserejk', 1, 'jkse', 7, '16032015011634Hydrangeas.jpg', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-16 01:16:34', '2015-03-16 05:16:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `texto` text NOT NULL,
  `id_clasificado` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_comentario`),
  KEY `id_clasificado` (`id_clasificado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoclasificado`
--

CREATE TABLE IF NOT EXISTS `tipoclasificado` (
  `id_tipoclasificado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipoclasificado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Volcado de datos para la tabla `tipoclasificado`
--

INSERT INTO `tipoclasificado` (`id_tipoclasificado`, `nombre`) VALUES
(1, 'Automóviles'),
(4, 'Teléfonos Móviles'),
(7, 'Computadoras de Escritorio'),
(10, 'Gatos'),
(13, 'Loros'),
(58, 'eses'),
(61, 'eseseqw4'),
(64, 'holamundo'),
(67, 'holamundial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `telefono` varchar(8) NOT NULL,
  `email` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `password`, `nombres`, `apellidos`, `telefono`, `email`, `created_at`, `updated_at`, `admin`) VALUES
(1, 'mauricabrera', 'mauric', 'Mauricio', 'Cabrera Estrada', ' 7077777', 'cabrera.mauri@gmail.com', '2015-03-01 20:34:18', '2015-03-16 04:44:26', 0),
(4, 'mauri', 'mauri', 'Mauri', 'Cabrera Estrada', '214565', 'cabrera.mauri@gmail.com', '2015-03-14 17:19:21', '2015-03-14 21:23:04', 0),
(7, 'mauricin', 'mauricin', 'Mauri', 'Cabreraaooasi', '0', 'cabrera.mauri@gmail.com', '2015-03-16 01:12:20', '2015-03-16 05:12:20', 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clasificado`
--
ALTER TABLE `clasificado`
  ADD CONSTRAINT `clasificado_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `clasificado_ibfk_2` FOREIGN KEY (`id_tipoclasificado`) REFERENCES `tipoclasificado` (`id_tipoclasificado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_clasificado`) REFERENCES `clasificado` (`id_clasificado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
