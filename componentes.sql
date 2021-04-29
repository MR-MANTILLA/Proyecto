-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-04-2021 a las 23:37:43
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `componentes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listado`
--

CREATE TABLE `listado` (
  `pz_referencia` varchar(20) NOT NULL,
  `pz_motherboard` varchar(100) NOT NULL,
  `pz_procesador` varchar(100) NOT NULL,
  `pz_ram` varchar(100) NOT NULL,
  `pz_video` varchar(100) NOT NULL,
  `pz_fuente` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `listado`
--

INSERT INTO `listado` (`pz_referencia`, `pz_motherboard`, `pz_procesador`, `pz_ram`, `pz_video`, `pz_fuente`) VALUES
('', '', '', '', '', ''),
('1094', 'Asus Rock', 'Ryzon 3600x', 'Corsair 3000 mhz', 'rx 580 4gb ', 'corsair 450 watts'),
('1111', 'Asus Rock', 'Ryzon 3600x', 'Corsair 3000 mhz', 'rx 580 4gb ', '500 watts'),
('12345', 'Gygabyte ', 'Ryzon 3600x', 'Corsair 3000 mhz', 'rx 580 4gb ', 'corsair 450 watts'),
('450580044005700700', 'Asrock B450', 'Ryzen 7 5800X', '2x32Gb 4400Mhz', 'RX 5700XT', '700w'),
('456', 'Gygabyte ', 'Ryzon 3600x', 'Corsair 3000 mhz', 'rx 580 4gb ', 'corsair 450 watts'),
('550560044006700700', 'Aorus B550', 'Ryzen 5 5600X', '2X8 4400Mhz', 'RX 6700XT', '700W'),
('r4f43l', 'Gygabyte ', 'Ryzon 5 3400g', 'Corsair 3000 mhz', 'rx 580 4gb ', 'corsair 450 watts');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `listado`
--
ALTER TABLE `listado`
  ADD PRIMARY KEY (`pz_referencia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
