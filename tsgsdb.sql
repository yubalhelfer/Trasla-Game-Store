-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-10-2021 a las 22:38:26
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tsgsdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

DROP TABLE IF EXISTS `compra`;
CREATE TABLE IF NOT EXISTS `compra` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `IdUsuario` int(30) NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compravideojuegos`
--

DROP TABLE IF EXISTS `compravideojuegos`;
CREATE TABLE IF NOT EXISTS `compravideojuegos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdCompra` int(11) NOT NULL,
  `IdVideojuego` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desarrollador`
--

DROP TABLE IF EXISTS `desarrollador`;
CREATE TABLE IF NOT EXISTS `desarrollador` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `desarrollador`
--

INSERT INTO `desarrollador` (`Id`, `Nombre`) VALUES
(1, 'Konami'),
(2, 'Electronic Arts'),
(3, 'Microsoft'),
(4, 'Sega'),
(5, 'Activision Blizzard'),
(6, 'EA Canada'),
(7, 'Psyonix');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editor`
--

DROP TABLE IF EXISTS `editor`;
CREATE TABLE IF NOT EXISTS `editor` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `editor`
--

INSERT INTO `editor` (`Id`, `Nombre`) VALUES
(1, 'Konami'),
(2, 'Sega'),
(3, 'Electronic Arts'),
(4, 'Epic Games');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

DROP TABLE IF EXISTS `genero`;
CREATE TABLE IF NOT EXISTS `genero` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`Id`, `Nombre`) VALUES
(1, 'Cartas'),
(2, 'Accion'),
(3, 'Deportes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(30) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Clave` varchar(32) NOT NULL,
  `Email` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Usuario`, `Nombre`, `Clave`, `Email`) VALUES
(1, 'Josema23', 'Jose Maria', '81dc9bdb52d04dc20036dbd8313ed055', 'josepe@gmail.com'),
(2, 'Coscu', 'Martin Perez Disalvo', '319cd07d3694e45bc1cd7d13c91a9365', 'coscu@gmail.com'),
(3, 'ElMati', 'Mateo Fernandez', 'a05f63b1a607dcc7a2c30f1285c7865c', 'matife@yahoo.com'),
(4, 'Raga Hoch', 'Helfer Erika', '927a8784c9351374e9a5bb942a36c097', 'erikayaelhelfer@yahoo.com'),
(5, 'Van', 'Yubal Helfer', '81dc9bdb52d04dc20036dbd8313ed055', 'yubalhelfer@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videojuego`
--

DROP TABLE IF EXISTS `videojuego`;
CREATE TABLE IF NOT EXISTS `videojuego` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `IdDesarrollador` int(10) NOT NULL,
  `IdGenero` int(10) NOT NULL,
  `IdEditor` int(11) NOT NULL,
  `Anio` int(30) NOT NULL,
  `metacritic` decimal(10,2) NOT NULL,
  `Caratula` varchar(50) NOT NULL,
  `Descripcion` varchar(1000) NOT NULL,
  `Precio` decimal(20,0) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `videojuego`
--

INSERT INTO `videojuego` (`Id`, `Nombre`, `IdDesarrollador`, `IdGenero`, `IdEditor`, `Anio`, `metacritic`, `Caratula`, `Descripcion`, `Precio`) VALUES
(1, 'Yu-Gi-Oh! Legacy of the Duelist: Link Evolution', 1, 1, 1, 2019, '7.08', 'Yu-Gi-Oh!_legacy_of_duelist.jpg', 'Vive más de 20 años de la historia de Yu-Gi-Oh! con Yu-Gi-Oh! Legacy of the Duelist: Link Evolution!\r\nConstruye tu baraja con más de 10.000 cartas y enfréntate a los duelistas más famosos del universo de Yu-Gi-Oh! Vuelve a vivir las historias de la serie de animación original de Yu-Gi-Oh! con Yu-Gi-Oh! ARC-V y desafía a la nueva generación de duelistas del mundo virtual de Yu-Gi-Oh! VRAINS!', '2999'),
(2, 'Metal Gear Solid V: The Phantom Pain', 1, 2, 1, 2015, '8.20', 'MetalGearV.jpg', 'Metal Gear Solid continúa en PS3 con una nueva entrega posterior a Metal Gear Solid: Peace Walker y anterior a los sucesos de los dos primeros Metal Gear y toda la subsaga Solid posterior. Big Boss, el \'padre\' de Solid Snake, se despierta nueve años después de los sucesos de Ground Zeroes y tendrá que acabar con sus enemigos en Afganistán y África, con un enorme mundo abierto a nuestros pies.', '6000'),
(3, 'Lost Judgment', 4, 2, 2, 2021, '9.00', 'Lost_Judgement.jpg', 'Lost Judgment es el nuevo videojuego para PlayStation 4, PlayStation 5, Xbox One y Xbox Series X desarrollado y editado por Sega que será secuela de Judgment, el spin-off detectivesco de la popular saga Yakuza.     En este nuevo juego de acción volveremos a meternos en la piel del detective Takayuki Yagama (quien volverá a ser interpretado por el actor Takuya Kimura. Aunque no se han dado muchos detalles sobre su trama, sí que sabemos que la historia arrancará en Kamurocho, pero pronto visitaremos una nueva ciudad costera, Yokohama, que podremos explorar y está llena de vida, con actividades que solo saldrán dependiendo de la hora del día.', '5900'),
(4, 'FIFA 22', 6, 3, 3, 2021, '7.80', 'Fifa_22.jpg', 'FIFA 22 acerca aún más el juego a la realidad gracias a mejoras significativas en la jugabilidad y una nueva temporada de novedades en todos los modos.', '5499'),
(5, 'Rocket League', 7, 3, 4, 2015, '8.40', 'Rocket_League.jpg', 'Rocket League es un videojuego que combina el fútbol con los vehículos. Fue desarrollado por Psyonix y lanzado el 7 de julio de 2015. Fue lanzado Free to play en septiembre de 2020. Se encuentra disponible en español, y tiene modos de juego cooperativo de un jugador y en línea.', '2459');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
