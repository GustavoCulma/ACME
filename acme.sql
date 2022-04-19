-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-04-2022 a las 00:00:38
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
-- Base de datos: `acme`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductor`
--

CREATE TABLE `conductor` (
  `idconductor` int(11) NOT NULL,
  `idvehiculo` int(11) DEFAULT NULL,
  `conPrimerNombre` varchar(60) DEFAULT NULL,
  `conSegundoNombre` varchar(60) DEFAULT NULL,
  `conApellidos` varchar(60) DEFAULT NULL,
  `conCedula` varchar(10) DEFAULT NULL,
  `conTelefono` varchar(10) DEFAULT NULL,
  `conCiudad` varchar(60) DEFAULT NULL,
  `conDireccion` varchar(100) DEFAULT NULL,
  `conCondicion` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `conductor`
--

INSERT INTO `conductor` (`idconductor`, `idvehiculo`, `conPrimerNombre`, `conSegundoNombre`, `conApellidos`, `conCedula`, `conTelefono`, `conCiudad`, `conDireccion`, `conCondicion`) VALUES
(1, 1, 'Gustavo', 'Adolfo', 'Culma Aparicio', '1012360203', '3133927038', 'Bogotá', 'carrera 81 número 63 a 09 sur', 1),
(2, 2, 'gustavo', 'adolfo', 'culma', '1012360203', '3133927038', 'BOGOTA', 'CARRERA 81 NUMERO 63 A 09', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--

CREATE TABLE `propietario` (
  `idpropietario` int(11) NOT NULL,
  `proPrimerNombre` varchar(60) DEFAULT NULL,
  `proSegundoNombre` varchar(60) DEFAULT NULL,
  `proApellidos` varchar(60) DEFAULT NULL,
  `proCedula` varchar(10) DEFAULT NULL,
  `proTelefono` varchar(10) DEFAULT NULL,
  `proCiudad` varchar(60) DEFAULT NULL,
  `proDireccion` varchar(100) DEFAULT NULL,
  `proCondicion` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`idpropietario`, `proPrimerNombre`, `proSegundoNombre`, `proApellidos`, `proCedula`, `proTelefono`, `proCiudad`, `proDireccion`, `proCondicion`) VALUES
(1, 'Laura', 'Milena', 'Mora', 'Mora', '3123760820', 'Bogotá', 'avenida  siempre viva', 1),
(2, 'Jorge', 'danilo', 'Ochoa Duran', '154446243', '45215633', 'Bogotá', 'avenida siempre viva', 1),
(3, 'maria', 'maria', 'maria', '12564154', '6546456', 'Bogotá', 'carrera 7 numero 23 06 sur', 1),
(4, 'juan', 'carlos', 'culma', '1012360203', '3133927038', 'Bogotá', 'Carrera 81 #63 Sur1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `idvehiculo` int(11) NOT NULL,
  `idpropietario` int(11) DEFAULT NULL,
  `vehNombre` varchar(60) DEFAULT NULL,
  `vehPlaca` varchar(10) DEFAULT NULL,
  `vehColor` varchar(40) DEFAULT NULL,
  `vehMarca` varchar(60) DEFAULT NULL,
  `vehTipo` varchar(150) DEFAULT NULL,
  `vehCondicion` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`idvehiculo`, `idpropietario`, `vehNombre`, `vehPlaca`, `vehColor`, `vehMarca`, `vehTipo`, `vehCondicion`) VALUES
(1, 1, 'Corvette', '456 hgs', 'Rosado', 'Chevrolet', 'deportivo', 1),
(2, 2, 'mazda', '65djgd', 'Azul', 'renualt', 'publico', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `conductor`
--
ALTER TABLE `conductor`
  ADD PRIMARY KEY (`idconductor`),
  ADD KEY `fk_conductor_vehiculo_idx` (`idvehiculo`);

--
-- Indices de la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD PRIMARY KEY (`idpropietario`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`idvehiculo`),
  ADD UNIQUE KEY `vehPlaca_UNIQUE` (`vehPlaca`),
  ADD KEY `fk_vehiculo_propietario_idx` (`idpropietario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `conductor`
--
ALTER TABLE `conductor`
  MODIFY `idconductor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `propietario`
--
ALTER TABLE `propietario`
  MODIFY `idpropietario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `idvehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `conductor`
--
ALTER TABLE `conductor`
  ADD CONSTRAINT `fk_conductor_vehiculo` FOREIGN KEY (`idvehiculo`) REFERENCES `vehiculo` (`idvehiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `fk_vehiculo_propietario` FOREIGN KEY (`idpropietario`) REFERENCES `propietario` (`idpropietario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
