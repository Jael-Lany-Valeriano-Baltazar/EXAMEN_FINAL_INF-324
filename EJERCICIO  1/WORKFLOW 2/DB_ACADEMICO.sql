-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 12-06-2023 a las 12:08:32
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `DB_ACADEMICO`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `INSCRIPCION`
--

CREATE TABLE `INSCRIPCION` (
  `CI_EST` int(11) NOT NULL,
  `SIGLA` char(7) DEFAULT NULL,
  `DEPOSITO` tinyint(1) DEFAULT NULL,
  `COPIA_CI` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `INSCRIPCION`
--

INSERT INTO `INSCRIPCION` (`CI_EST`, `SIGLA`, `DEPOSITO`, `COPIA_CI`) VALUES
(654321, 'FIS', NULL, NULL),
(765432, 'FIS', NULL, NULL),
(876543, 'QUI', NULL, NULL),
(987654, 'MAT', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PERSONA`
--

CREATE TABLE `PERSONA` (
  `CI` int(11) NOT NULL,
  `NOMBRE_COMPLETO` char(200) DEFAULT NULL,
  `TELEFONO` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `PERSONA`
--

INSERT INTO `PERSONA` (`CI`, `NOMBRE_COMPLETO`, `TELEFONO`) VALUES
(123456, 'LUCAS PATON', '(591)65341267'),
(234567, 'LOLA BUNNY', '(591)65311100'),
(345678, 'BUGS BONNY', '(591)73528899'),
(654321, 'ELMER GRUÑON', '(591)65222243'),
(765432, 'SILVESTRE', '(591)61183677'),
(876543, 'SPEEDY GONZALES', '(591)60001102'),
(987654, 'SAM BIGOTES', '(591)75237612');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USUARIO`
--

CREATE TABLE `USUARIO` (
  `CI` int(11) NOT NULL,
  `USUARIO` char(50) NOT NULL,
  `PASSWRD` char(100) NOT NULL,
  `ROL` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `USUARIO`
--

INSERT INTO `USUARIO` (`CI`, `USUARIO`, `PASSWRD`, `ROL`) VALUES
(123456, 'SSA@UNO', 'USER123', 'KARDEX'),
(234567, 'CD@DOS', 'USER234', 'CENTRO ESTUDIANTES'),
(654321, 'EST@654', 'EST654', 'ESTUDIANTE'),
(765432, 'EST@765', 'EST765', 'ESTUDIANTE'),
(876543, 'EST@876', 'EST876', 'ESTUDIANTE'),
(987654, 'EST@987', 'EST987', 'ESTUDIANTE');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `INSCRIPCION`
--
ALTER TABLE `INSCRIPCION`
  ADD PRIMARY KEY (`CI_EST`);

--
-- Indices de la tabla `PERSONA`
--
ALTER TABLE `PERSONA`
  ADD PRIMARY KEY (`CI`);

--
-- Indices de la tabla `USUARIO`
--
ALTER TABLE `USUARIO`
  ADD PRIMARY KEY (`CI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
