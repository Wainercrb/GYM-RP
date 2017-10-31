-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2017 a las 00:49:21
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_gyms`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comida`
--

CREATE TABLE `comida` (
  `id_comida` int(11) NOT NULL,
  `tipo_comida` text,
  `estado` text,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gym_admin`
--

CREATE TABLE `gym_admin` (
  `id_local_admin` int(11) NOT NULL,
  `id_local` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gym_pesona`
--

CREATE TABLE `gym_pesona` (
  `id_gym_persona` int(11) NOT NULL,
  `id_gym` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id_historial` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_rutina` int(11) NOT NULL,
  `id_comida` int(11) NOT NULL,
  `id_trabajador` int(11) NOT NULL,
  `peso` text,
  `altura` text,
  `cuello` text,
  `hombros` text,
  `pecho` text,
  `cintura` text,
  `antebrazo` text,
  `muslo` text,
  `pantorrillas` text,
  `biceps` text,
  `gluteos` text,
  `cadera` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locales`
--

CREATE TABLE `locales` (
  `id_local` int(11) NOT NULL,
  `nombre` text,
  `telefono` text,
  `email` text,
  `puntuacionMas` text,
  `puntuacionMenos` text,
  `latitud` text,
  `longitud` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutina`
--

CREATE TABLE `rutina` (
  `id_rutina` int(11) NOT NULL,
  `tipo_rutina` text,
  `session` int(11) DEFAULT NULL,
  `repeticiones` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE `trabajador` (
  `id_trabajador` int(11) NOT NULL,
  `nombre` text,
  `foto` mediumblob,
  `apellidoUno` text,
  `apellidoDos` text,
  `cedula` text,
  `telefono` text,
  `direccion` text,
  `email` text,
  `rol` text,
  `usuario` text,
  `contrasenna` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` text,
  `apellidos` text,
  `foto` mediumblob,
  `direccion` text,
  `usuario` text,
  `genero` text,
  `contrasenna` text,
  `edad` text,
  `cedula` text,
  `telefono` text,
  `email` text,
  `altura` text,
  `peso` text,
  `cuello` text,
  `hombros` text,
  `pecho` text,
  `cintura` text,
  `antebrazo` text,
  `muslo` text,
  `pantorrillas` text,
  `biceps` text,
  `gluteos` text,
  `cadera` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comida`
--
ALTER TABLE `comida`
  ADD PRIMARY KEY (`id_comida`);

--
-- Indices de la tabla `gym_admin`
--
ALTER TABLE `gym_admin`
  ADD PRIMARY KEY (`id_local_admin`),
  ADD UNIQUE KEY `id_local` (`id_local`,`id_admin`),
  ADD KEY `gym_local_admin` (`id_admin`);

--
-- Indices de la tabla `gym_pesona`
--
ALTER TABLE `gym_pesona`
  ADD PRIMARY KEY (`id_gym_persona`),
  ADD KEY `id_gym` (`id_gym`,`id_persona`),
  ADD KEY `gym_persona_trabajdor` (`id_persona`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `id_usuario` (`id_usuario`,`id_rutina`,`id_comida`,`id_trabajador`),
  ADD KEY `historial_comida` (`id_trabajador`),
  ADD KEY `historial` (`id_comida`),
  ADD KEY `historial_rutina` (`id_rutina`);

--
-- Indices de la tabla `locales`
--
ALTER TABLE `locales`
  ADD PRIMARY KEY (`id_local`);

--
-- Indices de la tabla `rutina`
--
ALTER TABLE `rutina`
  ADD PRIMARY KEY (`id_rutina`);

--
-- Indices de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD PRIMARY KEY (`id_trabajador`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comida`
--
ALTER TABLE `comida`
  MODIFY `id_comida` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `gym_admin`
--
ALTER TABLE `gym_admin`
  MODIFY `id_local_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `gym_pesona`
--
ALTER TABLE `gym_pesona`
  MODIFY `id_gym_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `locales`
--
ALTER TABLE `locales`
  MODIFY `id_local` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `rutina`
--
ALTER TABLE `rutina`
  MODIFY `id_rutina` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  MODIFY `id_trabajador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `gym_admin`
--
ALTER TABLE `gym_admin`
  ADD CONSTRAINT `gym_local_admin` FOREIGN KEY (`id_admin`) REFERENCES `trabajador` (`id_trabajador`),
  ADD CONSTRAINT `gym_local_local` FOREIGN KEY (`id_local`) REFERENCES `locales` (`id_local`);

--
-- Filtros para la tabla `gym_pesona`
--
ALTER TABLE `gym_pesona`
  ADD CONSTRAINT `gym_persona_gym` FOREIGN KEY (`id_gym`) REFERENCES `locales` (`id_local`) ON UPDATE CASCADE,
  ADD CONSTRAINT `gym_persona_trabajdor` FOREIGN KEY (`id_persona`) REFERENCES `trabajador` (`id_trabajador`) ON DELETE CASCADE,
  ADD CONSTRAINT `gym_persona_usuario` FOREIGN KEY (`id_persona`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial` FOREIGN KEY (`id_comida`) REFERENCES `comida` (`id_comida`),
  ADD CONSTRAINT `historial_comida` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajador` (`id_trabajador`) ON UPDATE CASCADE,
  ADD CONSTRAINT `historial_rutina` FOREIGN KEY (`id_rutina`) REFERENCES `rutina` (`id_rutina`) ON UPDATE CASCADE,
  ADD CONSTRAINT `historial_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
