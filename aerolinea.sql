-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-09-2024 a las 00:13:36
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aerolinea`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pilotos`
--

CREATE TABLE `pilotos` (
  `id_piloto` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `dni` int(11) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `gmail` varchar(50) NOT NULL,
  `direccion` text NOT NULL,
  `telefono` int(11) NOT NULL,
  `nro_licencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `pilotos`
--

INSERT INTO `pilotos` (`id_piloto`, `nombre`, `dni`, `fecha_nacimiento`, `gmail`, `direccion`, `telefono`, `nro_licencia`) VALUES
(1, 'Jorge Perez', 30598140, '1983-03-19', 'jorgeperez@gmail.com', 'Panamá 150, Ezeiza', 112450328, 38820543),
(2, 'Jose Ramirez', 35378200, '1985-06-08', 'ramirezj@gmail.com', 'Darragueira 157, CABA', 21474647, 22010255),
(3, 'Maria Fernandez', 37346920, '1987-08-26', 'MariaFerj@gmail.com', 'AV.Avellaneda 1005, CABA', 249484634, 16345926),
(4, 'Pablo Sanchez', 31568863, '1985-06-08', 'PabloSanchez455j@gmail.com', 'Corrientes 1344, La Matanza', 542175313, 389000234),
(5, 'Juan Retamoso', 30256347, '1984-07-18', 'Retamoso122@gmail.com', 'Sarmiento 51, Tandil', 1119456723, 17845678);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelos`
--

CREATE TABLE `vuelos` (
  `id_vuelos` int(11) NOT NULL,
  `id_piloto` int(11) NOT NULL,
  `origen` text NOT NULL,
  `destino` text NOT NULL,
  `cant_pasajeros` int(11) NOT NULL,
  `duracion_vuelo` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `vuelos`
--

INSERT INTO `vuelos` (`id_vuelos`, `id_piloto`, `origen`, `destino`, `cant_pasajeros`, `duracion_vuelo`) VALUES
(1, 1, 'Ezeiza, Arg', 'Montevideo, Uru', 200, '01:00:00'),
(2, 2, 'Aeroparque, Arg', 'Rio De Janeiro, Br', 150, '02:50:00'),
(3, 3, 'Salta, Arg', 'Lima, Pe', 300, '03:00:00'),
(4, 1, 'Montevideo, Uru', 'Ezeiza, Arg', 100, '01:00:00'),
(5, 4, 'Madrid, Es', 'París, Fra', 200, '02:07:00'),
(6, 5, 'Miami, EEUU', 'Montreal, Ca', 130, '03:25:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pilotos`
--
ALTER TABLE `pilotos`
  ADD PRIMARY KEY (`id_piloto`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `gmail` (`gmail`),
  ADD UNIQUE KEY `nro_licencia` (`nro_licencia`);

--
-- Indices de la tabla `vuelos`
--
ALTER TABLE `vuelos`
  ADD PRIMARY KEY (`id_vuelos`),
  ADD KEY `id_piloto` (`id_vuelos`),
  ADD KEY `id_piloto_2` (`id_piloto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pilotos`
--
ALTER TABLE `pilotos`
  MODIFY `id_piloto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `vuelos`
--
ALTER TABLE `vuelos`
  MODIFY `id_vuelos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `vuelos`
--
ALTER TABLE `vuelos`
  ADD CONSTRAINT `vuelos_ibfk_2` FOREIGN KEY (`id_piloto`) REFERENCES `pilotos` (`id_piloto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
