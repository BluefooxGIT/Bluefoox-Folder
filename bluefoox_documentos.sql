-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-03-2022 a las 21:42:01
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bluefoox_documentos`
--
CREATE DATABASE IF NOT EXISTS `bluefoox_documentos` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `bluefoox_documentos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bluefoox_archivos`
--

CREATE TABLE `bluefoox_archivos` (
  `uid` int(11) NOT NULL,
  `archivos_url` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `archivos_nombre` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `archivos_extension` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `archivos_tipo` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `archivos_modificacion` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `archivos_usuario` text COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bluefoox_configuracion`
--

CREATE TABLE `bluefoox_configuracion` (
  `uid` int(11) NOT NULL,
  `configuracion_activo` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `configuracion_carpeta_root` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `configuracion_orden` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `configuracion_orden_tipo` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `configuracion_interfaz_color_primario` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `configuracion_interfaz_color_secundario` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bluefoox_configuracion`
--

INSERT INTO `bluefoox_configuracion` (`uid`, `configuracion_activo`, `configuracion_carpeta_root`, `configuracion_orden`, `configuracion_orden_tipo`, `configuracion_interfaz_color_primario`, `configuracion_interfaz_color_secundario`) VALUES
(1, '1', 'Documentos', 'DESC', 'DESC', '#1d6dc3', '#666666');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bluefoox_usuarios`
--

CREATE TABLE `bluefoox_usuarios` (
  `uid` int(11) NOT NULL,
  `usuarios_id` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuarios_usuario` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuarios_contrasena` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuarios_estatus` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuarios_nivel` text COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bluefoox_usuarios`
--

INSERT INTO `bluefoox_usuarios` (`uid`, `usuarios_id`, `usuarios_usuario`, `usuarios_contrasena`, `usuarios_estatus`, `usuarios_nivel`) VALUES
(1, '190122120932', 'admin', '$2y$10$oW5Z0W7HbUL8RfEjRfnDZ.y69i9JshUKEyrnJceLU15MMqk09o7lG', '1', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bluefoox_archivos`
--
ALTER TABLE `bluefoox_archivos`
  ADD PRIMARY KEY (`uid`);

--
-- Indices de la tabla `bluefoox_configuracion`
--
ALTER TABLE `bluefoox_configuracion`
  ADD PRIMARY KEY (`uid`);

--
-- Indices de la tabla `bluefoox_usuarios`
--
ALTER TABLE `bluefoox_usuarios`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bluefoox_archivos`
--
ALTER TABLE `bluefoox_archivos`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `bluefoox_configuracion`
--
ALTER TABLE `bluefoox_configuracion`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `bluefoox_usuarios`
--
ALTER TABLE `bluefoox_usuarios`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
