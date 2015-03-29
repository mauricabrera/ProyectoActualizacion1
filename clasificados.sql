-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-03-2015 a las 04:56:33
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=299 ;

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
(112, ' ihnrtiun', 1, 'dsadn', 7, '030320150902edpeques.png', '030320150902edpeques.png', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-03 09:02:26', '2015-03-23 02:51:24'),
(115, ' ihnrtiun', 1, 'fdskf', 67, '030320150903edpeques.png', '030320150903edpeques.png', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-03 09:03:32', '2015-03-23 02:51:32'),
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
(166, 'sajdh', 7, 'ejs', 7, '16032015011252Jellyfish.jpg', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-16 01:12:52', '2015-03-16 05:12:52'),
(178, 'dserejk', 1, 'jkse', 7, '16032015011634Hydrangeas.jpg', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-16 01:16:34', '2015-03-16 05:16:34'),
(181, 'uno', 4, 'sduih', 58, '17032015100657Captura.PNG', '17032015100657S__1630211.jpg', '17032015100657chacharichabraaa.PNG', '17032015100657menu.PNG', '17032015100657logocomteco.png', '17032015100657logoD1.jpg', '2015-03-17 10:06:57', '2015-03-17 14:06:57'),
(184, 'asdjh', 1, 'sadkj', 1, '17032015213138error.PNG', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-17 21:31:38', '2015-03-18 01:31:38'),
(187, 'alo', 4, 'aloha MUDNO! gracias Diosito!', 58, '17032015220021S__1630214.jpg', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-17 22:00:21', '2015-03-18 02:00:21'),
(190, 'hola frawrie', 4, 'sdjhsws', 1, '170320152201011902729_223707354489185_109966398_n.jpg', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-17 22:01:01', '2015-03-23 02:59:02'),
(193, '6IMAGES', 1, '6IMAGESauisdh', 7, '19032015002145Sin t\\u00edtulo.png', '19032015002145tags.PNG', '19032015002145tarje2.PNG', '19032015002145tarje1.PNG', '19032015002145users`1.PNG', '19032015002145users2.PNG', '2015-03-19 00:21:46', '2015-03-19 04:21:46'),
(196, 'asdjh', 1, 'asdjh', 67, '19032015085840chacharichabraaa.PNG', '19032015085840JSON.png', '19032015085840Captura.PNG', '19032015085840error.PNG', 'urlimagen5', 'urlimagen6', '2015-03-19 08:58:40', '2015-03-19 12:58:40'),
(199, 'fasjdh', 1, 'sudh', 10, '19032015092433logocomteco.9.png', '19032015092433logocomteco.png', '19032015092433logoD1.jpg', '19032015092433menu.PNG', 'urlimagen5', 'urlimagen6', '2015-03-19 09:24:33', '2015-03-19 13:24:33'),
(202, 'sefdjh', 1, 'kjdsh', 58, '19032015092738logocomteco.9.png', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-19 09:27:38', '2015-03-19 13:27:38'),
(205, 'harley davidson 1200 sportster - $3500', 1, '1990 senior owned garage kept. In excellent condition. runs and sounds great. upgrades include: oversized tank, windshield, luggage rack, sissy bar, vance and hines pipes, Quiet "O ring" chain, new battery, new accellerator cable, and twin tech electronic ignition! Bike is very quick and reliable. A pleasure to own and ride. I have received many compliments on this bike which I have owned bike for 10 yrs and have taken very good care of her. Just ', 1, '2203201523031700C0C_8CSVoshVgn1_600x450.jpg', '2203201523031700s0s_49dyyewUwDH_600x450.jpg', '2203201523031700909_22hRUydUtuo_600x450.jpg', '2203201523031700707_edYYaB0fm8A_600x450.jpg', '2203201523031700z0z_2C0boKhZ76K_600x450.jpg', '2203201523031700v0v_c3Ol863unxS_600x450.jpg', '2015-03-22 23:03:17', '2015-03-23 03:03:17'),
(208, '2015 YAMAHA FZ09', 4, '847cc liquid-cooled, in-line 3-cylinder, DOHC, 12-valve engine with fuel injection. This FZ-09™ engine combines advanced high tech components including YCC-T® and Yamaha D-Mode, with a crossplane concept crankshaft to deliver an exciting, torquey and quick-revving engine character.\r\n“Crossplane Crankshaft Concept” provides linear torque development in response to the rider’s throttle input. Among the advantages of the in-line 3-cylinder engine are: (1) linear torque development, (2) even firing intervals that provide smooth torque characteristics and a good feeling of power in the low to mid rpm range, (3) a light, slim and compact design, and (4) performance that combines the characteristics of both 2-cylinder and 4-cylinder engines.\r\nA 6-speed transmission has been adopted to match the engine. The transmission has optimized gear ratios that help to deliver engine torque efficiently. The result is a transmission that helps bring out more of the low- to mid-speed torque and excellent response characteristics.\r\nThe ride-by-wire Yamaha Chip Controlled Throttle (YCC-T) system senses the slightest throttle input by the rider, relays the data to the ECU, ', 1, '2203201523135700b0b_hV7q6iYpEfa_600x450.jpg', '2203201523135700m0m_3bSFvJmSNw5_600x450.jpg', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-22 23:13:58', '2015-03-23 03:13:58'),
(211, 'hoila', 4, 'ij', 7, '2203201523324700m0m_3bSFvJmSNw5_600x450.jpg', '2203201523324700v0v_c3Ol863unxS_600x450.jpg', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-22 23:32:48', '2015-03-23 03:32:48'),
(214, 'sad', 4, 'sd', 7, '2203201523345100v0v_c3Ol863unxS_600x450.jpg', '2203201523345100z0z_2C0boKhZ76K_600x450.jpg', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-22 23:34:51', '2015-03-23 03:34:51'),
(217, 'asdkj', 4, 'sjh', 7, '2203201523361200s0s_49dyyewUwDH_600x450.jpg', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-22 23:36:12', '2015-03-23 03:36:12'),
(220, 'asdij', 4, 'ij', 1, '2203201523383500C0C_8CSVoshVgn1_600x450.jpg', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-22 23:38:36', '2015-03-23 03:38:36'),
(223, 'sad', 4, 'sad', 61, '2203201523410300b0b_hV7q6iYpEfa_600x450.jpg', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-22 23:41:03', '2015-03-23 03:41:03'),
(226, 'sdfkj', 4, 'ijsdf', 7, '2203201523421000707_edYYaB0fm8A_600x450.jpg', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-22 23:42:10', '2015-03-23 03:42:10'),
(229, 'yt456', 4, '63rtij', 64, '2203201523504600909_22hRUydUtuo_600x450.jpg', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-22 23:50:46', '2015-03-23 03:50:46'),
(232, '2008 Mazda CX-9 AWD --dj - $2550 ', 4, 'This 2008 Mazda CX-9 AWD great car, very clean with V6 & 85k miles, Backup Camera, Boss Sound System, Sunroof/Moonroof, Navigation System, 3rd row seat, Alloy Wheels, 6 speed Automatic, Bluetooth, Leather Seats, and much more.', 1, '2203201523544700A0A_kga5NjYKmpa_600x450.jpg', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-22 23:54:48', '2015-03-23 03:54:48'),
(235, 'asdak', 4, 'This 2008 Mazda CX-9 AWD great car, very clean with V6 & 85k miles, Backup Camera, Boss Sound System, Sunroof/Moonroof, Navigation System, 3rd row seat, Alloy Wheels, 6 speed Automatic, Bluetooth, Leather Seats, and much more.', 1, '2203201523563000A0A_kga5NjYKmpa_600x450.jpg', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-22 23:56:30', '2015-03-23 03:56:30'),
(238, 'sad', 1, 'This 2008 Mazda CX-9 AWD great car, very clean with V6 & 85k miles, Backup Camera, Boss Sound System, Sunroof/Moonroof, Navigation System, 3rd row seat, Alloy Wheels, 6 speed Automatic, Bluetooth, Leather Seats, and much more.', 1, '2203201523565100b0b_hV7q6iYpEfa_600x450.jpg', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-22 23:56:51', '2015-03-23 03:56:51'),
(241, 'sadkj', 1, 'wsdw', 1, '2203201523575900A0A_kga5NjYKmpa_600x450.jpg', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-22 23:57:59', '2015-03-23 03:57:59'),
(244, '1996 chevy gmc 2500 ext cab', 1, 'For parts let me know what you need. Seats and console gone. Motor has not ran in 2 years truck had electrical problems and it will not start. Only good for parts', 1, '2203201523594500e0e_iiAx6RkMqnl_600x450.jpg', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-22 23:59:45', '2015-03-23 03:59:45'),
(247, 'chevy', 1, 'For parts let me know what you need. Seats and console gone. Motor has not ran in 2 years truck had electrical problems and it will not start. Only good for parts', 1, '2303201500003900e0e_iiAx6RkMqnl_600x450.jpg', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-23 00:00:39', '2015-03-23 04:00:39'),
(250, 'ch', 1, 'For parts let me know what you need. Seats and console gone. Motor has not ran in 2 years truck had electrical problems and it will not start. Only good for parts', 1, '2303201500010800e0e_iiAx6RkMqnl_600x450.jpg', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-23 00:01:09', '2015-03-23 04:01:09'),
(253, 'sadkj', 1, 'joasmd', 7, '2303201500024100A0A_kga5NjYKmpa_600x450.jpg', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-23 00:02:41', '2015-03-23 04:02:41'),
(256, 'al', 1, 'alert(Clasificado insertado!', 1, '2303201500031500707_edYYaB0fm8A_600x450.jpg', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-23 00:03:15', '2015-03-23 04:03:15'),
(259, 'yeah', 1, 'window.location.replace', 7, '2303201500035500A0A_kga5NjYKmpa_600x450.jpg', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-23 00:03:55', '2015-03-23 04:03:55'),
(262, 'asdkn', 1, 'kn', 1, '2303201500042800707_edYYaB0fm8A_600x450.jpg', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-23 00:04:28', '2015-03-23 04:04:28'),
(265, 'ksdj', 1, 'aksdkm', 7, '2303201500050200A0A_kga5NjYKmpa_600x450.jpg', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-23 00:05:02', '2015-03-23 04:05:02'),
(268, 'asd', 1, 'vas', 1, '2303201500053700b0b_hV7q6iYpEfa_600x450.jpg', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-23 00:05:37', '2015-03-23 04:05:37'),
(271, 'sdf', 1, 'sdfa', 58, '2303201500055800b0b_hV7q6iYpEfa_600x450.jpg', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-23 00:05:59', '2015-03-23 04:05:59'),
(274, 'sadjh', 1, 'jhsd', 7, '2303201509123700A0A_kga5NjYKmpa_600x450.jpg', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-23 09:12:37', '2015-03-23 13:12:37'),
(277, 'sdfajkb', 1, 'hjb', 7, '2303201509134300b0b_hV7q6iYpEfa_600x450.jpg', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-23 09:13:43', '2015-03-23 13:13:43'),
(280, 'sdfjh', 1, 'jhbsdf', 7, '2303201509141200C0C_8CSVoshVgn1_600x450.jpg', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-23 09:14:12', '2015-03-23 13:14:12'),
(283, 'sdfh', 1, 'jh', 1, '2303201509143300b0b_hV7q6iYpEfa_600x450.jpg', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-23 09:14:33', '2015-03-23 13:14:33'),
(286, 'sdfjk', 1, 'bh', 1, '2303201509151600C0C_8CSVoshVgn1_600x450.jpg', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-23 09:15:16', '2015-03-23 13:15:16'),
(289, 'esAeee', 4, 'esees', 1, '2303201509430300m0m_3bSFvJmSNw5_600x450.jpg', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-23 09:43:03', '2015-03-23 13:59:07'),
(292, 'dgcf', 1, 'ytf', 1, '25032015111730Information Systems Help Desk.png', '25032015111730Information Systems Help Desk.png', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-25 11:17:31', '2015-03-25 15:17:31'),
(295, 'rd', 1, 'rd', 1, '25032015111824Information Systems Help Desk.png', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-25 11:18:24', '2015-03-25 15:18:24'),
(298, '111', 1, 'hidf', 1, '25032015120733Information Systems Help Desk.png', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', '2015-03-25 12:07:33', '2015-03-27 04:03:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `texto` text NOT NULL,
  `id_clasificado` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_comentario`),
  KEY `id_clasificado` (`id_clasificado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `nombre`, `texto`, `id_clasificado`, `created_at`, `updated_at`) VALUES
(1, '', 'Esa es!! este es el primer comentario!!', 193, '2015-03-19 00:51:45', '2015-03-19 04:52:33'),
(7, 'Mauri C.', 'esa ehh!', 202, '2015-03-20 00:58:25', '2015-03-20 04:58:25'),
(10, 'Cabrera Estrada', 'lerelerele', 202, '2015-03-20 00:58:58', '2015-03-20 04:58:58'),
(13, 'Mauri C.', 'comentario uno', 199, '2015-03-20 00:59:25', '2015-03-20 04:59:25'),
(16, 'estrada', 'alesr', 199, '2015-03-20 01:00:35', '2015-03-20 05:00:35'),
(19, 'Mauri Cabrera E.', 'que hermosa moto!', 205, '2015-03-22 23:05:28', '2015-03-23 04:21:41'),
(22, 'Enrique', 'Cual es su costo?', 205, '2015-03-22 23:07:59', '2015-03-23 03:07:59'),
(25, 'sdfjh', 'hjh', 271, '2015-03-23 09:17:34', '2015-03-23 13:17:34');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `password`, `nombres`, `apellidos`, `telefono`, `email`, `created_at`, `updated_at`, `admin`) VALUES
(1, 'anonimo', 'anonimo', 'Anonimo', '', ' 7077777', 'cabrera.mauri@gmail.com', '2015-03-01 20:34:18', '2015-03-23 03:00:19', 0),
(4, 'mauri', 'mauri', 'Mauri', 'Cabrera Estrada', '214565', 'cabrera.mauri@gmail.com', '2015-03-14 17:19:21', '2015-03-14 21:23:04', 0),
(7, 'mauricin', 'mauricin', 'Mauri', 'Cabreraaooasi', '0', 'cabrera.mauri@gmail.com', '2015-03-16 01:12:20', '2015-03-23 02:44:22', 1),
(13, 'estrada', 'estrada', 'estrada', 'estradaese', '2351', 'cabrera.mauri@gmail.com', '2015-03-23 09:51:03', '2015-03-24 14:21:52', 0),
(16, 'esaeees', 'esaeees', 'esaooo', 'esaeseesehh', '325', 'cabrera.mauri@gmail.com', '2015-03-24 09:31:14', '2015-03-27 04:04:03', 1);

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
