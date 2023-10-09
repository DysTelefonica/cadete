-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 13-06-2023 a las 15:24:16
-- Versión del servidor: 8.0.31
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `00_general`
--
CREATE DATABASE IF NOT EXISTS `00_general` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `00_general`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `00_adjuntos`
--

CREATE TABLE `00_adjuntos` (
  `id` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `item_referencia` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nombreAdjunto` varchar(100) NOT NULL,
  `tipoAdjunto` varchar(50) DEFAULT NULL,
  `tamanoAdjunto` int DEFAULT NULL,
  `rutaAdjunto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `00_adjuntos`
--

INSERT INTO `00_adjuntos` (`id`, `item_referencia`, `nombreAdjunto`, `tipoAdjunto`, `tamanoAdjunto`, `rutaAdjunto`) VALUES
('000300-230213175021', '040400-230123143801', 'Revisión 8', 'xlsx', 20182, '../adj/04/04/00/040400-230123143801/000300-230213175021.xlsx'),
('000300-230213175049', '040300-20221219000000', 'Última revisión en excel', 'xlsx', 20182, '../adj/04/03/00/040300-20221219000000/000300-230213175049.xlsx'),
('000300-230213175142', '040400-220705143801', 'Revisión 7', 'xlsx', 20129, '../adj/04/04/00/040400-220705143801/000300-230213175142.xlsx'),
('000300-230214093024', '040100-220502142301', 'Último análisis DAFO', 'xlsx', 20182, '../adj/04/01/00/040100-220502142301/000300-230214093024.xlsx'),
('000300.230216.165945.761651', '040100-220502142301', 'a', 'pdf', 97798, '../adj/04/01/00/040100-220502142301/000300.230216.165945.761651.pdf'),
('000300.230302.111439.698230', '070401.221031.172600.000001', 'Quality review', 'pdf', 16154497, '../adj/07/04/01/070401.221031.172600.000001/000300.230302.111439.698230.pdf'),
('000300.230608.134029.958159', '060101.230608.132033.804702', 'Riesgos y oportunidades de los procesos', 'xlsx', 478181, '../adj/06/01/01/060101.230608.132033.804702/000300.230608.134029.958159.xlsx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `00_bitacora`
--

CREATE TABLE `00_bitacora` (
  `id` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `usuario` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fecha` date NOT NULL,
  `origen` varchar(25) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `subcategoria` varchar(100) NOT NULL,
  `bitacora` text NOT NULL,
  `referencia` varchar(100) NOT NULL,
  `estado` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `00_bitacora`
--

INSERT INTO `00_bitacora` (`id`, `usuario`, `fecha`, `origen`, `categoria`, `subcategoria`, `bitacora`, `referencia`, `estado`) VALUES
('000100-221222101238', '070501-220711141901', '2022-12-22', 'Calidad', '04. Contexto de la organización', 'Parte Interesada Interna', 'Nueva Parte Interesada Interna con código PII-010', '040301-221222101238', 1),
('000100-221222113913', '070501-220711141901', '2022-12-22', 'Calidad', '04. Contexto de la organización', 'Parte Interesada Interna', 'Nueva Parte Interesada Interna con código PII-010', '040301-221222113913', 1),
('000100-221222113917', '070501-220711141901', '2022-12-22', 'Calidad', '04. Contexto de la organización', 'Parte Interesada Interna', 'Eliminada Parte Interesada Interna PII-010', '040301-221222113913', 1),
('000100-221222114003', '070501-220711141901', '2022-12-22', 'Calidad', '04. Contexto de la organización', 'Parte Interesada Interna', 'Nueva Parte Interesada Interna con código PII-010', '040301-221222114003', 1),
('000100-230201114032', '070501-220711141901', '2023-02-01', 'Calidad', '04. Contexto de la organización', 'Análisis de Contexto', 'Creado Análisis de Contexto ACT-002', '040100-230201114032', 1),
('000100-230201114049', '070501-220711141901', '2023-02-01', 'Calidad', '04. Contexto de la organización', 'Análisis DAFO', 'Nueva 1 con código DEB-001', '040101-230201114049', 1),
('000100-230201114104', '070501-220711141901', '2023-02-01', 'Calidad', '04. Contexto de la organización', 'Análisis DAFO', 'Nueva 2 con código AMZ-001', '040102-230201114104', 1),
('000100-230201114121', '070501-220711141901', '2023-02-01', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 1 del análisis de contexto ACT-002', '040200-230201114121', 1),
('000100-230201120040', '070501-220711141901', '2023-02-01', 'Calidad', '04. Contexto de la organización', 'Análisis DAFO', 'Nueva 3 con código FOR-001', '040103-230201120040', 1),
('000100-230201120133', '070501-220711141901', '2023-02-01', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 2 del análisis de contexto ACT-002', '040200-230201120133', 1),
('000100-230209172726', '070501-220711141901', '2023-02-09', 'Calidad', '04. Contexto de la organización', 'Análisis de Contexto', 'Creado Análisis de Contexto ACT-002', '040100-230209172726', 1),
('000100-230210111633', '070501-220711141901', '2023-02-10', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 1 del análisis de contexto ACT-002', '040200-230210111633', 1),
('000100-230210124950', '070501-220711141902', '2023-02-10', '', '04. Contexto de la organización', 'Parte Interesada Interna', 'Hoy no sabía que ponerme y me puse feliz :)', '040301-220504143405', 1),
('000100-230210145533', '070501-220711141901', '2023-02-10', 'Calidad', '04. Contexto de la organización', 'Parte Interesada Interna', 'Nueva Parte Interesada Interna con código PII-010', '040301-230210145533', 1),
('000100-230210145538', '070501-220711141901', '2023-02-10', 'Calidad', '04. Contexto de la organización', 'Parte Interesada Interna', 'Eliminada Parte Interesada Interna PII-010', '040301-230210145533', 1),
('000100-230210145548', '070501-220711141901', '2023-02-10', 'Calidad', '04. Contexto de la organización', 'Parte Interesada Externa', 'Nueva Parte Interesada Externa con código PIE-007', '040302-230210145548', 1),
('000100-230210145554', '070501-220711141901', '2023-02-10', 'Calidad', '04. Contexto de la organización', 'Parte Interesada Externa', 'Eliminada Parte Interesada Externa PIE-007', '040302-230210145548', 1),
('000100-230210145616', '070501-220711141901', '2023-02-10', 'Calidad', '04. Contexto de la organización', 'Parte Interesada Externa', 'Nueva Parte Interesada Externa con código PIE-007', '040302-230210145616', 1),
('000100-230210145625', '070501-220711141901', '2023-02-10', 'Calidad', '04. Contexto de la organización', 'Parte Interesada Externa', 'Eliminada Parte Interesada Externa PIE-007', '040302-230210145616', 1),
('000100-230210145743', '070501-220711141902', '2023-02-10', 'Calidad', '04. Contexto de la organización', 'Parte Interesada Externa', 'Nueva Parte Interesada Externa con código PIE-007', '040302-230210145743', 1),
('000100-230210145813', '070501-220711141902', '2023-02-10', 'Calidad', '04. Contexto de la organización', 'Parte Interesada Externa', 'Nueva Parte Interesada Externa con código PIE-008', '040302-230210145813', 1),
('000100-230213102603', '070501-220711141901', '2023-02-13', 'Calidad', '04. Contexto de la organización', 'Análisis de Contexto', 'Eliminado Análisis de Contexto ACT-002', '040100-230209172726', 1),
('000100-230215095559', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 9 del análisis de contexto ACT-001', '040200-230215095559', 1),
('000100-230215095730', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 9 del análisis de contexto ACT-001', '040200-230215095730', 1),
('000100-230215101837', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 9 del análisis de contexto ACT-001', '040200-230215101837', 1),
('000100-230215102519', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 10 del análisis de contexto ACT-001', '040200-230215102519', 1),
('000100-230215102706', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 10 del análisis de contexto ACT-001', '040200-230215102706', 1),
('000100-230215102712', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 10 del análisis de contexto ACT-001', '040200-230215102712', 1),
('000100-230215103457', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 9 del análisis de contexto ACT-001', '040200-230215103457', 1),
('000100-230215103509', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 10 del análisis de contexto ACT-001', '040200-230215103509', 1),
('000100-230215104345', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 9 del análisis de contexto ACT-001', '040200-230215104345', 1),
('000100-230215104357', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 9 del análisis de contexto ACT-001', '040200-230215104357', 1),
('000100-230215104754', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 9 del análisis de contexto ACT-001', '040200-230215104754', 1),
('000100-230215110758', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 9 del análisis de contexto ACT-001', '040200-230215110758', 1),
('000100-230215111025', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 1 del análisis de contexto ACT-001', '040200-230215111024', 1),
('000100-230215111056', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 1 del análisis de contexto ACT-001', '040200-230215111056', 1),
('000100-230215111147', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 2 del análisis de contexto ACT-001', '040200-230215111147', 1),
('000100-230215121027', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 3 del análisis de contexto ACT-001', '040200-230215121027', 1),
('000100-230215121209', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 1 del análisis de contexto ACT-001', '040200-230215121209', 1),
('000100-230215121421', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 1 del análisis de contexto ACT-001', '040200-230215121421', 1),
('000100-230215121521', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 1 del análisis de contexto ACT-001', '040200-230215121521', 1),
('000100-230215121543', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 1 del análisis de contexto ACT-001', '040200-230215121543', 1),
('000100-230215121737', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 2 del análisis de contexto ACT-001', '040200-230215121737', 1),
('000100-230215121755', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 3 del análisis de contexto ACT-001', '040200-230215121755', 1),
('000100-230215121812', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 4 del análisis de contexto ACT-001', '040200-230215121812', 1),
('000100-230215121848', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 5 del análisis de contexto ACT-001', '040200-230215121848', 1),
('000100-230215121908', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 6 del análisis de contexto ACT-001', '040200-230215121908', 1),
('000100-230215121927', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 7 del análisis de contexto ACT-001', '040200-230215121927', 1),
('000100-230215122046', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 1 del análisis de contexto ACT-001', '040200-230215122046', 1),
('000100-230215122130', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 2 del análisis de contexto ACT-001', '040200-230215122130', 1),
('000100-230215122426', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 3 del análisis de contexto ACT-001', '040200-230215122426', 1),
('000100-230215122435', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 4 del análisis de contexto ACT-001', '040200-230215122435', 1),
('000100-230215122457', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 5 del análisis de contexto ACT-001', '040200-230215122457', 1),
('000100-230215125701', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 1 del análisis de contexto ACT-001', '040200-230215125701', 1),
('000100-230215130428', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 1 del análisis de contexto ACT-001', '040200-230215130428', 1),
('000100-230215130545', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 1 del análisis de contexto ACT-001', '040200-230215130545', 1),
('000100-230215130700', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 2 del análisis de contexto ACT-001', '040200-230215130700', 1),
('000100-230215130748', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 1 del análisis de contexto ACT-001', '040200-230215130748', 1),
('000100-230215130926', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 2 del análisis de contexto ACT-001', '040200-230215130926', 1),
('000100-230215131125', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 3 del análisis de contexto ACT-001', '040200-230215131125', 1),
('000100-230215131158', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 4 del análisis de contexto ACT-001', '040200-230215131158', 1),
('000100-230215131242', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 5 del análisis de contexto ACT-001', '040200-230215131242', 1),
('000100-230215131255', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 6 del análisis de contexto ACT-001', '040200-230215131255', 1),
('000100-230215131341', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 7 del análisis de contexto ACT-001', '040200-230215131341', 1),
('000100-230215131454', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 1 del análisis de contexto ACT-001', '040200-230215131454', 1),
('000100-230215131937', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 2 del análisis de contexto ACT-001', '040200-230215131936', 1),
('000100-230215131947', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 2 del análisis de contexto ACT-001', '040200-230215131947', 1),
('000100-230215133004', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 2 del análisis de contexto ACT-001', '040200-230215133004', 1),
('000100-230215133012', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 3 del análisis de contexto ACT-001', '040200-230215133012', 1),
('000100-230215133115', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 4 del análisis de contexto ACT-001', '040200-230215133115', 1),
('000100-230215133130', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 5 del análisis de contexto ACT-001', '040200-230215133130', 1),
('000100-230215133231', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 1 del análisis de contexto ACT-001', '040200-230215133231', 1),
('000100-230215133256', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 2 del análisis de contexto ACT-001', '040200-230215133256', 1),
('000100-230215133456', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 3 del análisis de contexto ACT-001', '040200-230215133456', 1),
('000100-230215133759', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 4 del análisis de contexto ACT-001', '040200-230215133759', 1),
('000100-230215134047', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 5 del análisis de contexto ACT-001', '040200-230215134047', 1),
('000100-230215134138', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 6 del análisis de contexto ACT-001', '040200-230215134138', 1),
('000100-230215134431', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 7 del análisis de contexto ACT-001', '040200-230215134431', 1),
('000100-230215134503', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 7 del análisis de contexto ACT-001', '040200-230215134503', 1),
('000100-230215134544', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 8 del análisis de contexto ACT-001', '040200-230215134543', 1),
('000100-230215134623', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 9 del análisis de contexto ACT-001', '040200-230215134623', 1),
('000100-230215134711', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 2 del análisis de contexto ACT-001', '040200-230215134711', 1),
('000100-230215134800', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 3 del análisis de contexto ACT-001', '040200-230215134800', 1),
('000100-230215134822', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 4 del análisis de contexto ACT-001', '040200-230215134822', 1),
('000100-230215134907', '070501-220711141901', '2023-02-15', 'Calidad', '04. Contexto de la organización', 'Revisión Análisis Contexto', 'Se ha dado de alta la revisión 5 del análisis de contexto ACT-001', '040200-230215134907', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `00_citas`
--

CREATE TABLE `00_citas` (
  `id` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `denominador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `personal` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mostrarWeb` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `00_citas`
--

INSERT INTO `00_citas` (`id`, `denominador`, `personal`, `fecha`, `mostrarWeb`) VALUES
('000000-190220162300', '¿Sabes lo que se gana cuando uno pierde? Experiencia', 'Ángel Jurado Castillejo', '20/02/2019', 1),
('000000-190226155001', 'El caos es un orden por descubrir', 'Ángel Jurado Castillejo', '26/02/2019', 1),
('000000-190228162200', 'Se puede cambiar de mujer, pero no de equipo de fútbol', 'Ángel Jurado Castillejo', '28/02/2019', 1),
('000000-190301132701', 'Me es indiferente, inverosimil, e incluso inoperante', 'Mariló Carrasco Moreno', '01/03/2019', 1),
('000000-190319162400', '30 segundos después de decir que un perfume huele a campiña inglesa: \"Como si supiera yo a qué coño huele la campiña inglesa\"', 'Ángel Jurado Castillejo', '19/03/2019', 1),
('000000-190322133001', '*Javier consultando la web de calidad con el equipo de calidad*\r\n¡Hala! ¿Y si pinchas ahí te lleva?', 'Javier Mendoza Cano', '22/03/2019', 1),
('000000-190329155001', 'Si fuera fácil, lo haría otro', 'Fernando Lázaro Díaz', '29/03/2019', 1),
('000000-190402162000', 'Todas las acciones que hacemos en nuestra vida están encaminadas al sexo', 'Ángel Jurado Castillejo', '02/04/2019', 1),
('000000-190405162800', 'El concepto es que el local te abrace', 'Pedro Duarte Bravo', '05/04/2019', 1),
('000000-190408161900', 'Yo no tengo propiedades, solo mi cepillo de dientes y mi conocimiento', 'Ángel Jurado Castillejo', '08/04/2019', 1),
('000000-190409161701', 'Los rusos, los alemanes y los extremeños conquistaremos el mundo', 'Antonio Garrido', '09/04/2019', 1),
('000000-190410162400', 'Ahora te echo de menos lo mismo que antes de echaba de más', 'Ángel Luis Sánchez Cesteros', '10/04/2019', 1),
('000000-190412162900', 'Me gusta el arroz en todas sus vertientes', 'Mariló Carrasco Moreno', '12/04/2019', 1),
('000000-190424162100', 'Los cojines de mi cama esta noche se van a tomar por culo. Odio las cosas poco prácticas', 'Ángel Jurado Castillejo', '24/04/2019', 1),
('000000-190424162800', 'Yo siempre cojo la más larga', 'Mariló Carrasco Moreno', '24/04/2019', 1),
('000000-190506161400', 'No hay que compartir las propiedades. Sólo trae problemas.', 'Ana Rubio Canales', '06/05/2019', 1),
('000000-190730161500', 'He tenido que llegar yo para poner orden aquí', 'Sergio García Montalvo', '30/07/2019', 1),
('000000-190808162900', 'Y encima, el paracetamol ahora es con receta.', 'Mariló Carrasco Moreno', '08/08/2019', 1),
('000000-190812162001', 'No hay peor soledad que la que es en compañía', 'Eduardo Martínez Fernández', '12/08/2019', 1),
('000000-191031162200', 'El lenguaje no verbal dice muchas cosas', 'Pedro Duarte Bravo', '31/10/2019', 1),
('000000-200224161600', 'Los calidad siempre lo hacemos todo por detrás', 'Mariló Carrasco Moreno', '24/02/2020', 1),
('000000-230210104601', 'Cuando trabajas en lo que te gusta, no trabajas ningún día', 'Sergio García Montalvo', 'Fecha sin determinar', 1),
('000000-230214160201', '[Auditor] ¿Con quién vais en UTE?\n[Ana] Con AICOX Soluciones\n[Fátima] Más bien AICOX problemas', 'Fátima del Rosario Muñoz Curado', '14/02/2023', 0),
('000000-2302141603401', '[Ana] ¿Tendrá AICOX el informe de revisión de la oferta?\r\n[Sergio] Si, en la misma carpeta que la gestión de configuración', 'Sergio García Montalvo', '14/02/2023', 0),
('000000-230215101401', 'mm-hum', 'Antonio Sánchez Tejero', 'Siempre', 1),
('000000-230221180401', 'Tú déjale, a ver por dónde respira', 'Ana Rubio Canales', '21/02/2023', 1),
('000000-230222092801', 'Yo no puedo, tengo médico', 'Andrés Martinez Antón', 'Siempre', 1),
('000000-230413160100', 'Ah, ¿Qué Lozano mete la mano?', 'Martina Torralba Rodríguez', '13/04/2023', 1),
('000000-230420155900', 'No voy a contarte secretos, que luego me disconformas', 'Daniel Gil Santiuste ', '20/04/2023', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `00_codigos`
--

CREATE TABLE `00_codigos` (
  `id` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apartado` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `elementoSistema` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `genero` int NOT NULL COMMENT '0 - Masculino, 1 - Femenino',
  `ap1` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ap2` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ap3` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `modelo` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bbdd` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `table` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rutaIndex` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ico` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `color` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `00_codigos`
--

INSERT INTO `00_codigos` (`id`, `apartado`, `elementoSistema`, `genero`, `ap1`, `ap2`, `ap3`, `namespace`, `modelo`, `bbdd`, `table`, `rutaIndex`, `ico`, `color`) VALUES
('000100', '00. Sistema', 'Bitácora', 1, '00', '01', '00', 'ModelGeneral', 'Bitacora', '00_general', '00_bitacora', '/bitacora/read?id=', 'ico__blog', ''),
('000200', '00. Sistema ', 'Usuarios', 0, '00', '02', '00', 'ModelGeneral', '', '', '', '', '', ''),
('000300', '00. Sistema', 'Adjunto', 0, '00', '03', '00', 'ModelGeneral', 'Adjuntos', '00_general', '00_adjuntos', '', '', ''),
('000400', '00. Sistema ', 'Relación', 1, '00', '04', '00', 'ModelGeneral', 'Relacion', '00_general', '00_relaciones', '', '', ''),
('000500', '00. Sistema', 'Proyecto PECAL\r\n', 0, '00', '05', '00', 'ModelGeneral', 'Proyecto', '', '', '', '', ''),
('000600', '00. Sistema', 'Cambio', 0, '00', '06', '00', 'ModelGeneral', 'Cambio', '00_general', '00_cambios', '', '', ''),
('040100', '04. Contexto de la organización', 'Análisis de Contexto', 0, '04', '01', '00', 'ModelAnalisisContexto', 'AnalisisContexto', '04_contexto', '04_analisiscontexto', '/contexto/analisisContexto/read?id=', 'ico__internet', ''),
('040101', '04. Contexto de la organización', 'Debilidad [Análisis DAFO]', 0, '04', '01', '01', 'ModelAnalisisContexto', 'AnalisisDAFO', '04_contexto', '04_analisisdafo', '/contexto/analisisContexto/AnalisisDAFO/read?id=', 'ico__internet', ' #E66C64'),
('040102', '04. Contexto de la organización', 'Amenaza [Análisis DAFO]', 0, '04', '01', '02', 'ModelAnalisisContexto', 'AnalisisDAFO', '04_contexto', '04_analisisdafo', '/contexto/analisisContexto/AnalisisDAFO/read?id=', 'ico__internet', ''),
('040103', '04. Contexto de la organización', 'Fortaleza [Análisis DAFO]', 0, '04', '01', '03', 'ModelAnalisisContexto', 'AnalisisDAFO', '04_contexto', '04_analisisdafo', '/contexto/analisisContexto/AnalisisDAFO/read?id=', 'ico__internet', ''),
('040104', '04. Contexto de la organización', 'Oportunidad [Análisis DAFO]', 0, '04', '01', '04', 'ModelAnalisisContexto', 'AnalisisDAFO', '04_contexto', '04_analisisdafo', '/contexto/analisisContexto/AnalisisDAFO/read?id=', 'ico__internet', ''),
('040200', '04. Contexto de la organización', 'Revisión Análisis Contexto', 0, '04', '02', '00', 'ModelAnalisisContexto', 'RevisionAnalisisContexto', '04_contexto', '04_analisiscontexto_revisiones', '/contexto/analisisContexto/read-historico?id=', 'ico__internet', ''),
('040201', '04. Contexto de la organización', 'Histórico Debilidad [Análisis DAFO]', 0, '04', '02', '01', 'ModelAnalisisContexto', 'HistoricoAnalisisDAFO', '04_contexto', '04_analisisdafo_historico', '/contexto/analisisContexto/AnalisisDAFO/read?id=', 'ico__internet', ''),
('040202', '04. Contexto de la organización', 'Histórico Amenaza [Análisis DAFO]', 0, '04', '02', '02', 'ModelAnalisisContexto', 'HistoricoAnalisisDAFO', '04_contexto', '04_analisisdafo_historico', '/contexto/analisisContexto/AnalisisDAFO/read?id=', 'ico__internet', ''),
('040203', '04. Contexto de la organización', 'Histórico Fortaleza [Análisis DAFO]', 0, '04', '02', '03', 'ModelAnalisisContexto', 'HistoricoAnalisisDAFO', '04_contexto', '04_analisisdafo_historico', '/contexto/analisisContexto/AnalisisDAFO/read?id=', 'ico__internet', ''),
('040204', '04. Contexto de la organización', 'Histórico Oportunidad [Análisis DAFO]', 0, '04', '02', '04', 'ModelAnalisisContexto', 'HistoricoAnalisisDAFO', '04_contexto', '04_analisisdafo_historico', '/contexto/analisisContexto/AnalisisDAFO/read?id=', 'ico__internet', ''),
('040300', '04. Contexto de la organización', 'Contenedor Parte Interesada', 0, '04', '03', '00', 'ModelParteInteresada', 'ContenedorParteInteresada', '04_partesinteresadas', '04_partesinteresadas_contenedor', '/contexto/partesinteresadas/estudio/read?id=', 'ico__miembros', ''),
('040301', '04. Contexto de la organización ', 'Parte Interesada Interna', 0, '04', '03', '01', 'ModelParteInteresada', 'ParteInteresada', '04_partesinteresadas', '04_partesinteresadas', '/contexto/partesinteresadas/pi/read?id=', 'ico__miembros', ''),
('040302', '04. Contexto de la organización', 'Parte Interesada Externa', 0, '04', '03', '02', 'ModelParteInteresada', 'ParteInteresada', '04_partesinteresadas', '04_partesinteresadas', '/contexto/partesinteresadas/pi/read?id=', 'ico__miembros', ''),
('040400', '04. Contexto de la organización ', 'Revisión partes interesadas', 0, '04', '04', '00', 'ModelParteInteresada', 'RevisionParteInteresada', '04_partesinteresadas', '04_partesinteresadas_revisiones', '/contexto/partesinteresadas/historico?rev=', 'ico__miembros', ''),
('040401', '04. Contexto de la organización ', 'Histórico Parte Interesada Interna', 0, '04', '04', '01', 'ModelParteInteresada', 'HistoricoParteInteresada', '', '04_partesinteresadas_historico', '/contexto/partesinteresadas/read?id=', 'ico__miembros', ''),
('040402', '04. Contexto de la organización', 'Histórico Parte Interesada Externa', 0, '04', '04', '02', 'ModelParteInteresada', 'HistoricoParteInteresada', '', '04_partesinteresadas_historico', '/contexto/partesinteresadas/read?id=', 'ico__miembros', ''),
('040500', '04. Contexto de la organización', 'Alcance', 0, '04', '05', '00', 'ModelAlcance', 'Alcance', '', '04_alcance', '/contexto/alcance/', 'ico__target', ''),
('040600', '04. Contexto de la organización', 'Proceso', 0, '04', '06', '00', 'ModelProceso', 'Proceso', '', '04_procesos', '/contexto/procesos/read?id=', 'ico__intranet', ''),
('050100', '05. Liderazgo', 'Política', 1, '05', '01', '00', 'ModelPolitica', 'Politica', '', '05_politica', '/liderazgo/politica?id=', 'ico__certificado', ''),
('050200', '05. Liderazgo', 'Organigrama', 0, '05', '02', '00', 'ModelOrganigrama', 'Organigrama', '', '05_organigrama', '', '', ''),
('050300', '05. Liderazgo', 'Comité', 0, '05', '03', '00', 'ModelComite', 'Comite', '05_liderazgo', '05_comite', '/liderazgo/liderazgo?id=', 'ico__equipo', ''),
('060100', '06. Planificación', 'Contenedor Riesgos y Oportunidades', 0, '06', '01', '00', 'ModelRiesgoOportunidad', 'ContenedorRiesgoOportunidad', '06_riesgosoportunidades', '06_riesgosoportunidades_contenedor', '', '', ''),
('060101', '06. Planificación', 'Riesgo del sistema', 0, '06', '01', '01', 'ModelRiesgoOportunidad', 'RiesgoOportunidad', '06_riesgosoportunidades', '06_riesgosoportunidades', '/planificacion/riesgos-oportunidades/read?id=', 'ico__teatro', ''),
('060102', '06. Planificación', 'Oportunidad del sistema', 1, '06', '01', '02', 'ModelRiesgoOportunidad', 'RiesgoOportunidad', '06_riesgosoportunidades', '06_riesgosoportunidades', '/planificacion/riesgos-oportunidades/read?id=', 'ico__teatro', ''),
('060200', '06. Planificación', 'Revisión Riesgos y Oportunidades del Sistema', 0, '06', '02', '00', 'ModelRiesgoOportunidad', 'RevisionRiesgoOportunidad', '06_riesgosoportunidades', '06_riesgosoportunidades_revisiones', '', 'ico__teatro', ''),
('060201', '06. Planificación', 'Riesgo del sistema [Historico]', 0, '06', '02', '01', 'ModelRiesgoOportunidad', '', '06_riesgosoportunidades', '06_riesgosoportunidades_historico', '', 'ico__teatro', ''),
('060202', '06. Planificación', 'Oportunidad del sistema [Historico]', 1, '06', '02', '02', 'ModelRiesgoOportunidad', '', '06_riesgosoportunidades', '06_riesgosoportunidades_historico', '', 'ico__teatro', ''),
('060300', '06. Planificación', 'Objetivo', 0, '06', '03', '00', 'ModelObjetivo', '', '', '', '', '', ''),
('060301', '06. Planificación', 'Seguimiento de un objetivo', 0, '06', '03', '01', 'ModelObjetivo', '', '', '', '', '', ''),
('060401', '06. Planificación', 'Plan de Acción', 0, '06', '04', '01', 'ModelPlanAccion', 'PlanAccion', '06_planesaccion', '06_planesaccion', '/planificacion/planificacion-cambios/read?id=', 'ico__rutarecorrido', ''),
('060402', '06. Planificación', 'Acción derivada de Plan de acción', 1, '06', '04', '02', 'ModelPlanAccion', 'Accion', '06_planesaccion', '06_planesaccion_acciones', '/planificacion/planificacion-cambios/accion/read?id=', '', ''),
('060403', '06. Planificación', 'Tarea Circular', 0, '06', '04', '03', 'ModelPlanAccion', 'TareaCircular', '06_planesaccion', '06_tareascirculares', '/planificacion/planificacion-cambios/read?id=', 'ico__rutarecorrido', ''),
('060404', '06. Planificación', 'Acción derivada de Plan de tarea circular', 0, '06', '04', '04', 'ModelPlanAccion', '', '', '', '', '', ''),
('060500', '06. Planificación', 'Proyecto de Mejora', 0, '06', '05', '00', 'ModelProyectoMejora', 'ProyectoMejora', '06_proyectosmejora', '06_proyectosmejora', '/planificacion/proyectos-mejora/read?id=', 'ico__copa', ''),
('060501', '06. Planificación', 'Estado Proyecto de Mejora', 0, '06', '05', '01', 'ModelProyectoMejora', 'EstadoProyectoMejora', '06_proyectosmejora', '06_proyectosmejora_estados', '', '', ''),
('070101', '07. Apoyo', 'Manual (Documentación del sistema)', 0, '07', '01', '01', '', '', '', '', '', '', ''),
('070102', '07. Apoyo', 'Procedimiento (Documentación del sistema)', 0, '07', '01', '02', '', '', '', '', '', '', ''),
('070103', '07. Apoyo', 'Instrucción (Documentación del sistema)', 0, '07', '01', '03', '', '', '', '', '', '', ''),
('070104', '07. Apoyo', 'Guía (Documentación del sistema)', 0, '07', '01', '04', '', '', '', '', '', '', ''),
('070105', '07. Apoyo', 'Formato(Documentación del sistema)', 0, '07', '01', '05', '', '', '', '', '', '', ''),
('070106', '07. Apoyo', 'Plantillas (Documentación del sistema)', 0, '07', '01', '06', '', '', '', '', '', '', ''),
('070107', '07. Apoyo', 'Otros documentos (Documentación del sistema)', 0, '07', '01', '07', '', '', '', '', '', '', ''),
('070201', '07. Apoyo', 'Documentación externa', 0, '07', '02', '01', '', '', '', '', '', '', ''),
('070301', '07. Apoyo', 'Equipo de medida', 0, '07', '03', '01', '', '', '', '', '', '', ''),
('070401', '07. Apoyo', 'Comunicado', 0, '07', '04', '01', 'ModelComunicado', 'Comunicado', '', '07_comunicados', '', '', ''),
('070501', '07. Apoyo', 'Recurso', 0, '07', '05', '01', '', '', '', '', '', '', ''),
('070601', '07. Apoyo', 'Formación', 0, '07', '06', '01', '', '', '', '', '', '', ''),
('070701', '07. Apoyo', 'Ficha de perfil de puesto', 0, '07', '07', '01', '', '', '', '', '', '', ''),
('090101', '09. Evaluación del desempeño', 'Indicador', 0, '09', '01', '01', '', '', '', '', '', '', ''),
('090201', '09. Evaluación del desempeño', 'Acta de comité', 0, '09', '02', '01', '', '', '', '', '', '', ''),
('090301', '09. Evaluación del desempeño', 'Revisión por la dirección', 0, '09', '03', '01', '', '', '', '', '', '', ''),
('090401', '09. Evaluación del desempeño', 'Auditoría interna', 0, '09', '04', '01', '', '', '', '', '', '', ''),
('090402', '09. Evaluación del desempeño', 'No Conformidad de Auditoría interna', 0, '09', '04', '02', '', '', '', '', '', '', ''),
('090403', '09. Evaluación del desempeño', 'Observación de Auditoría interna', 0, '09', '04', '03', '', '', '', '', '', '', ''),
('090404', '09. Evaluación del desempeño', 'Oportunidad de mejora de auditoría interna', 0, '09', '04', '04', '', '', '', '', '', '', ''),
('090501', '09. Evaluación del desempeño', 'Auditoría externa', 0, '09', '05', '01', '', '', '', '', '', '', ''),
('090502', '09. Evaluación del desempeño', 'No conformidad de auditoría externa', 0, '09', '05', '02', '', '', '', '', '', '', ''),
('090503', '09. Evaluación del desempeño', 'Observación de auditoría externa', 0, '09', '05', '03', '', '', '', '', '', '', ''),
('090504', '09. Evaluación del desempeño', 'Oportunidad de mejora de auditoría externa', 0, '09', '05', '04', '', '', '', '', '', '', ''),
('090601', '09. Evaluación del desempeño', 'Evaluación de satisfacción del cliente', 0, '09', '06', '01', '', '', '', '', '', '', ''),
('090701', '09. Evaluación del desempeño', 'Evaluación de proveedores (TDE)', 0, '09', '07', '01', '', '', '', '', '', '', ''),
('090702', '09. Evaluación del desempeño', 'Evaluación de proveedores (TSOL)', 0, '09', '07', '02', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `00_log`
--

CREATE TABLE `00_log` (
  `id` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `auto` int NOT NULL DEFAULT '1' COMMENT '1 (Por defecto), entrada automática; 0- Entrada manual.',
  `crud` int DEFAULT NULL,
  `model` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `property` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `data_old` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `data_new` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `denominador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_ref` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_cont` varchar(30) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'N/A' COMMENT 'Id del contenedor al que pertenece, si aplica.',
  `category` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '1- Calidad, 2-proyectos, 3-Gerencia, 4-Otros',
  `subcategory` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bitacora` int NOT NULL DEFAULT '1' COMMENT '0-No aplica en bitácora. 1-Aplica en bitácora. Al eliminar en bitácora, haría update a este parámetro.',
  `date` datetime DEFAULT NULL,
  `user` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `00_log`
--

INSERT INTO `00_log` (`id`, `auto`, `crud`, `model`, `property`, `data_old`, `data_new`, `denominador`, `id_ref`, `id_cont`, `category`, `subcategory`, `bitacora`, `date`, `user`) VALUES
('000600.230503.174446.647424', 1, 1, 'Proyecto de Mejora', 'N/A', 'N/A', 'Mejorar el castillo', 'Añadido el Proyecto de Mejora \"PMC-23-004 - Mejorar el castillo\".', '060500.230503.174446.638586', 'N/A', 'N/A', 'N/A', 1, '2023-05-03 17:44:46', '070501.181104.090000.000001'),
('000600.230503.174511.957654', 1, 3, '', 'origen', 'Mi mente :D', 'Mi maravillosa mente :D', 'N/A', '060500.230503.174446.638586', '', 'N/A', 'N/A', 1, '2023-05-03 17:45:11', '070501.181104.090000.000001'),
('000600.230503.174511.965503', 1, 3, '', 'estado', 'En estudio', '2', 'N/A', '060500.230503.174446.638586', '', 'N/A', 'N/A', 1, '2023-05-03 17:45:11', '070501.181104.090000.000001'),
('000600.230503.174618.861819', 1, 1, 'Relación', 'N/A', '060500.230503.174446.638586', '040100.230503.125155.248340', 'Se han relacionado los elementos 060500.230503.174446.638586 y 040100.230503.125155.248340\".', '000400.230503.174618.854808', '', 'N/A', 'N/A', 1, '2023-05-03 17:46:18', '070501.181104.090000.000001'),
('000600.230503.175000.812735', 1, 1, 'Proyecto de Mejora', 'N/A', 'N/A', 'Peaches, peaches, peaches', 'Añadido el Proyecto de Mejora \"PMC-23-005 - Peaches, peaches, peaches\".', '060500.230503.175000.800892', 'N/A', 'N/A', 'N/A', 1, '2023-05-03 17:50:00', '070501.181104.090000.000001'),
('000600.230503.175130.013825', 1, 1, 'Proyecto de Mejora', 'N/A', 'N/A', 'BOOOOOOOOOOOOOOOOOOOWSER', 'Añadido el Proyecto de Mejora \"PMC-23-006 - BOOOOOOOOOOOOOOOOOOOWSER\".', '060500.230503.175130.006437', 'N/A', 'N/A', 'N/A', 1, '2023-05-03 17:51:30', '070501.181104.090000.000001'),
('000600.230503.175130.020079', 1, 1, 'Plan de Acción', 'N/A', 'N/A', 'BOOOOOOOOOOOOOOOOOOOWSER', 'Añadido el Plan de Acción \"PAS-23-003 - BOOOOOOOOOOOOOOOOOOOWSER\".', '060401.230503.175130.017822', 'N/A', 'N/A', 'N/A', 1, '2023-05-03 17:51:30', '070501.181104.090000.000001'),
('000600.230503.175225.890796', 1, 1, 'Proyecto de Mejora', 'N/A', 'N/A', 'PEACHEEEEEEEEEEEEEEES', 'Añadido el Proyecto de Mejora \"PMC-23-004 - PEACHEEEEEEEEEEEEEEES\".', '060500.230503.175225.882450', 'N/A', 'N/A', 'N/A', 1, '2023-05-03 17:52:25', '070501.181104.090000.000001'),
('000600.230503.175225.898193', 1, 1, 'Plan de Acción', 'N/A', 'N/A', 'PEACHEEEEEEEEEEEEEEES', 'Añadido el Plan de Acción \"PAS-23-004 - PEACHEEEEEEEEEEEEEEES\".', '060401.230503.175225.894801', 'N/A', 'N/A', 'N/A', 1, '2023-05-03 17:52:25', '070501.181104.090000.000001'),
('000600.230503.175225.904792', 1, 1, 'Relación', 'N/A', 'N/A', '', 'Añadido el Relación \" - \".', '000400.230503.175225.902503', 'N/A', 'N/A', 'N/A', 1, '2023-05-03 17:52:25', '070501.181104.090000.000001'),
('000600.230503.175342.296992', 1, 1, 'Proyecto de Mejora', 'N/A', 'N/A', 'ffffffffffffffffffffffffffffffffffffffffffffff', 'Añadido el Proyecto de Mejora \"PMC-23-004 - ffffffffffffffffffffffffffffffffffffffffffffff\".', '060500.230503.175342.292397', 'N/A', 'N/A', 'N/A', 1, '2023-05-03 17:53:42', '070501.181104.090000.000001'),
('000600.230503.175342.303242', 1, 1, 'Plan de Acción', 'N/A', 'N/A', 'ffffffffffffffffffffffffffffffffffffffffffffff', 'Añadido el Plan de Acción \"PAS-23-005 - ffffffffffffffffffffffffffffffffffffffffffffff\".', '060401.230503.175342.300955', 'N/A', 'N/A', 'N/A', 1, '2023-05-03 17:53:42', '070501.181104.090000.000001'),
('000600.230503.175342.306164', 1, 1, 'Relación', 'N/A', '060500.230503.175342.292397', '060401.230503.175342.300955', 'Se han relacionado los elementos 060500.230503.175342.292397 y 060401.230503.175342.300955\".', '000400.230503.175342.304581', '', 'N/A', 'N/A', 1, '2023-05-03 17:53:42', '070501.181104.090000.000001'),
('000600.230503.181130.574359', 1, 1, 'Plan de Acción', 'N/A', 'N/A', 'Irnos de vacaciones', 'Añadido el Plan de Acción \"PAS-23-006 - Irnos de vacaciones\".', '060401.230503.181130.565953', 'N/A', 'N/A', 'N/A', 1, '2023-05-03 18:11:30', '070501.181104.090000.000001'),
('000600.230503.181737.596712', 1, 1, 'Relación', 'N/A', '060401.230503.181130.565953', '050300.230503.182000.311104', 'Se han relacionado los elementos 060401.230503.181130.565953 y 4\".', '000400.230503.181737.590413', '', 'N/A', 'N/A', 1, '2023-05-03 18:17:37', '070501.181104.090000.000001'),
('000600.230511.115911.168509', 1, 1, 'Plan de Acción', 'N/A', 'N/A', 'Dar de comer a la perra Antonia', 'Añadido el Plan de Acción \"PAS-23-007 - Dar de comer a la perra Antonia\".', '060401.230511.115911.159342', 'N/A', 'N/A', 'N/A', 1, '2023-05-11 11:59:11', '070501.181104.090000.000001'),
('000600.230511.120010.921398', 1, 1, 'Acción derivada de Plan de acción', 'N/A', 'N/A', 'Ir al bote', 'Añadido el Acción derivada de Plan de acción \"ACC-001 - Ir al bote\".', '060402.230511.120010.913927', 'N/A', 'N/A', 'N/A', 1, '2023-05-11 12:00:10', '070501.181104.090000.000001'),
('000600.230511.120057.193314', 1, 1, 'Acción derivada de Plan de acción', 'N/A', 'N/A', 'Coger la comidita', 'Añadido el Acción derivada de Plan de acción \"ACC-002 - Coger la comidita\".', '060402.230511.120057.186751', 'N/A', 'N/A', 'N/A', 1, '2023-05-11 12:00:57', '070501.181104.090000.000001'),
('000600.230511.120128.387479', 1, 1, 'Acción derivada de Plan de acción', 'N/A', 'N/A', 'Darla de comer', 'Añadido el Acción derivada de Plan de acción \"ACC-003 - Darla de comer\".', '060402.230511.120128.377084', 'N/A', 'N/A', 'N/A', 1, '2023-05-11 12:01:28', '070501.181104.090000.000001'),
('000600.230511.121049.611270', 1, 4, 'Acción derivada de Plan de acción', 'N/A', 'Coger la comidita', 'Coger la comidita', 'Elimiando el Acción derivada de Plan de acción \"ACC-002 - Coger la comidita\".', '060402.230511.120057.186751', 'N/A', 'N/A', 'N/A', 1, '2023-05-11 12:10:49', '070501.181104.090000.000001'),
('000600.230511.124015.539613', 1, 1, 'Acción derivada de Plan de acción', 'N/A', 'N/A', 'Que coma', 'Añadido el Acción derivada de Plan de acción \"ACC-004 - Que coma\".', '060402.230511.124015.532536', 'N/A', 'N/A', 'N/A', 1, '2023-05-11 12:40:15', '070501.181104.090000.000001'),
('000600.230511.124245.194077', 1, 3, '', 'denominador', 'Darla de comer', 'Darla de comer granulos', 'N/A', '060402.230511.120128.377084', '', 'N/A', 'N/A', 1, '2023-05-11 12:42:45', '070501.181104.090000.000001'),
('000600.230511.124609.163393', 1, 4, 'Plan de Acción', 'N/A', 'Dar de comer a la perra Antonia', 'Dar de comer a la perra Antonia', 'Elimiando el Plan de Acción \"PAS-23-007 - Dar de comer a la perra Antonia\".', '060401.230511.115911.159342', 'N/A', 'N/A', 'N/A', 1, '2023-05-11 12:46:09', '070501.181104.090000.000001'),
('000600.230511.134240.326401', 1, 1, 'Plan de Acción', 'N/A', 'N/A', 'UwU', 'Añadido el Plan de Acción \"PAS-23-001 - UwU\".', '060401.230511.134240.321500', 'N/A', 'N/A', 'N/A', 1, '2023-05-11 13:42:40', '070501.181104.090000.000001'),
('000600.230606.111432.142096', 1, 1, 'Acción derivada de Plan de acción', 'N/A', 'N/A', 'Acción 1', 'Añadido el Acción derivada de Plan de acción \"ACC-001 - Acción 1\".', '060402.230606.111432.138261', 'N/A', 'N/A', 'N/A', 1, '2023-06-06 11:14:32', '070501.181104.090000.000001'),
('000600.230606.111533.564887', 1, 1, 'Acción derivada de Plan de acción', 'N/A', 'N/A', 'Acción 2', 'Añadido el Acción derivada de Plan de acción \"ACC-002 - Acción 2\".', '060402.230606.111533.562441', 'N/A', 'N/A', 'N/A', 1, '2023-06-06 11:15:33', '070501.181104.090000.000001'),
('000600.230606.111542.099148', 1, 3, '', 'fechaInicio', '2023-06-06', '', 'N/A', '060402.230606.111432.138261', '', 'N/A', 'N/A', 1, '2023-06-06 11:15:42', '070501.181104.090000.000001'),
('000600.230606.111655.328486', 1, 1, 'Acción derivada de Plan de acción', 'N/A', 'N/A', 'Acción 3', 'Añadido el Acción derivada de Plan de acción \"ACC-003 - Acción 3\".', '060402.230606.111655.325482', 'N/A', 'N/A', 'N/A', 1, '2023-06-06 11:16:55', '070501.181104.090000.000001'),
('000600.230606.111740.823975', 1, 4, 'Acción derivada de Plan de acción', 'N/A', 'Acción 3', 'Acción 3', 'Elimiando el Acción derivada de Plan de acción \"ACC-003 - Acción 3\".', '060402.230606.111655.325482', 'N/A', 'N/A', 'N/A', 1, '2023-06-06 11:17:40', '070501.181104.090000.000001'),
('000600.230606.113349.531541', 1, 4, 'Acción derivada de Plan de acción', 'N/A', 'Acción 2', 'Acción 2', 'Elimiando el Acción derivada de Plan de acción \"ACC-002 - Acción 2\".', '060402.230606.111533.562441', 'N/A', 'N/A', 'N/A', 1, '2023-06-06 11:33:49', '070501.181104.090000.000001'),
('000600.230606.113356.328167', 1, 1, 'Acción derivada de Plan de acción', 'N/A', 'N/A', 'assgfdghjklñ', 'Añadido el Acción derivada de Plan de acción \"ACC-002 - assgfdghjklñ\".', '060402.230606.113356.321156', 'N/A', 'N/A', 'N/A', 1, '2023-06-06 11:33:56', '070501.181104.090000.000001'),
('000600.230606.113400.598398', 1, 4, 'Acción derivada de Plan de acción', 'N/A', 'assgfdghjklñ', 'assgfdghjklñ', 'Elimiando el Acción derivada de Plan de acción \"ACC-002 - assgfdghjklñ\".', '060402.230606.113356.321156', 'N/A', 'N/A', 'N/A', 1, '2023-06-06 11:34:00', '070501.181104.090000.000001'),
('000600.230606.113851.709823', 1, 1, 'Relación', 'N/A', '060401.230511.134240.321500', '040100.230503.125155.248340', 'Se han relacionado los elementos 060401.230511.134240.321500 y 040100.230503.125155.248340\".', '000400.230606.113851.705593', '', 'N/A', 'N/A', 1, '2023-06-06 11:38:51', '070501.181104.090000.000001'),
('000600.230606.114552.755547', 1, 3, '', 'comentarios', '', 'strdyctfuvygbhjnlñkml´,', 'N/A', '060402.230606.111432.138261', '', 'N/A', 'N/A', 1, '2023-06-06 11:45:52', '070501.181104.090000.000001'),
('000600.230606.114651.294893', 1, 3, '', 'fechaFin', '', '2023-06-30', 'N/A', '060402.230606.111432.138261', '', 'N/A', 'N/A', 1, '2023-06-06 11:46:51', '070501.181104.090000.000001'),
('000600.230606.114747.720612', 1, 3, '', 'fechaFin', '', '2023-06-23', 'N/A', '060402.230606.111432.138261', '', 'N/A', 'N/A', 1, '2023-06-06 11:47:47', '070501.181104.090000.000001'),
('000600.230606.114836.451920', 1, 3, '', 'fechaInicio', '', '2023-06-06', 'N/A', '060402.230606.111432.138261', '', 'N/A', 'N/A', 1, '2023-06-06 11:48:36', '070501.181104.090000.000001'),
('000600.230606.114836.455454', 1, 3, '', 'fechaFinPrevisto', '', '2023-06-07', 'N/A', '060402.230606.111432.138261', '', 'N/A', 'N/A', 1, '2023-06-06 11:48:36', '070501.181104.090000.000001'),
('000600.230606.114836.458708', 1, 3, '', 'fechaFin', '', '2023-06-08', 'N/A', '060402.230606.111432.138261', '', 'N/A', 'N/A', 1, '2023-06-06 11:48:36', '070501.181104.090000.000001'),
('000600.230606.114956.711261', 1, 3, '', 'fechaFin', '', '2023-06-08', 'N/A', '060402.230606.111432.138261', '', 'N/A', 'N/A', 1, '2023-06-06 11:49:56', '070501.181104.090000.000001'),
('000600.230606.165633.288212', 1, 1, '', 'N/A', 'N/A', '', 'Añadido el  \" - \".', '', 'N/A', 'N/A', 'N/A', 1, '2023-06-06 16:56:33', '070501.181104.090000.000001'),
('000600.230606.170202.008058', 1, 1, '', 'N/A', 'N/A', '', 'Añadido el  \" - \".', '', 'N/A', 'N/A', 'N/A', 1, '2023-06-06 17:02:02', '070501.181104.090000.000001'),
('000600.230607.165832.582914', 1, 1, '', 'N/A', 'N/A', '', 'Añadido el  \" - \".', '', 'N/A', 'N/A', 'N/A', 1, '2023-06-07 16:58:32', '070501.181104.090000.000001'),
('000600.230607.173108.129667', 1, 1, '', 'N/A', 'N/A', '', 'Añadido el  \" - \".', '', 'N/A', 'N/A', 'N/A', 1, '2023-06-07 17:31:08', '070501.181104.090000.000001'),
('000600.230607.173146.427565', 1, 1, '', 'N/A', 'N/A', '', 'Añadido el  \" - \".', '', 'N/A', 'N/A', 'N/A', 1, '2023-06-07 17:31:46', '070501.181104.090000.000001'),
('000600.230607.174322.162927', 1, 1, '', 'N/A', 'N/A', '', 'Añadido el  \" - \".', '', 'N/A', 'N/A', 'N/A', 1, '2023-06-07 17:43:22', '070501.181104.090000.000001'),
('000600.230607.174407.463350', 1, 1, '', 'N/A', 'N/A', '', 'Añadido el  \" - \".', '', 'N/A', 'N/A', 'N/A', 1, '2023-06-07 17:44:07', '070501.181104.090000.000001'),
('000600.230607.174459.151432', 1, 1, '', 'N/A', 'N/A', '', 'Añadido el  \" - \".', '', 'N/A', 'N/A', 'N/A', 1, '2023-06-07 17:44:59', '070501.181104.090000.000001'),
('000600.230607.174827.728956', 1, 1, '', 'N/A', 'N/A', '', 'Añadido el  \" - \".', '', 'N/A', 'N/A', 'N/A', 1, '2023-06-07 17:48:27', '070501.181104.090000.000001'),
('000600.230608.132033.810098', 1, 1, '', 'N/A', 'N/A', '', 'Añadido el  \" - \".', '', 'N/A', 'N/A', 'N/A', 1, '2023-06-08 13:20:33', '070501.181104.090000.000001'),
('000600.230608.132135.030209', 1, 1, 'Relación', 'N/A', '060101.230608.132033.804702', '040600.220509.143601.285599', 'Se han relacionado los elementos 060101.230608.132033.804702 y 040600.220509.143601.285599\".', '000400.230608.132135.027573', '', 'N/A', 'N/A', 1, '2023-06-08 13:21:35', '070501.181104.090000.000001'),
('000600.230608.132206.650261', 1, 4, 'Plan de Acción', 'N/A', 'UwU', 'UwU', 'Elimiando el Plan de Acción \"PAS-23-001 - UwU\".', '060401.230511.134240.321500', 'N/A', 'N/A', 'N/A', 1, '2023-06-08 13:22:06', '070501.181104.090000.000001'),
('000600.230608.132330.462874', 1, 1, 'Plan de Acción', 'N/A', 'N/A', 'Informar a la dirección y al a gerencia, y vigilar el riesgo', 'Añadido el Plan de Acción \"PAS-23-001 - Informar a la dirección y al a gerencia, y vigilar el riesgo\".', '060401.230608.132330.460623', 'N/A', 'N/A', 'N/A', 1, '2023-06-08 13:23:30', '070501.181104.090000.000001'),
('000600.230608.132349.265470', 1, 1, 'Relación', 'N/A', '060401.230608.132330.460623', '060101.230608.132033.804702', 'Se han relacionado los elementos 060401.230608.132330.460623 y 060101.230608.132033.804702\".', '000400.230608.132349.260710', '', 'N/A', 'N/A', 1, '2023-06-08 13:23:49', '070501.181104.090000.000001'),
('000600.230608.132515.338669', 1, 1, 'Proyecto de Mejora', 'N/A', 'N/A', 'Creación de la biblioteca de riesgos unificada', 'Añadido el Proyecto de Mejora \"PMC-23-001 - Creación de la biblioteca de riesgos unificada\".', '060500.230608.132515.335877', 'N/A', 'N/A', 'N/A', 1, '2023-06-08 13:25:15', '070501.181104.090000.000001'),
('000600.230608.132515.347448', 1, 1, 'Plan de Acción', 'N/A', 'N/A', 'Creación de la biblioteca de riesgos unificada', 'Añadido el Plan de Acción \"PAS-23-002 - Creación de la biblioteca de riesgos unificada\".', '060401.230608.132515.343072', 'N/A', 'N/A', 'N/A', 1, '2023-06-08 13:25:15', '070501.181104.090000.000001'),
('000600.230608.132515.351571', 1, 1, 'Relación', 'N/A', '060500.230608.132515.335877', '060401.230608.132515.343072', 'Se han relacionado los elementos 060500.230608.132515.335877 y 060401.230608.132515.343072\".', '000400.230608.132515.349516', '', 'N/A', 'N/A', 1, '2023-06-08 13:25:15', '070501.181104.090000.000001'),
('000600.230608.132531.428628', 1, 1, 'Relación', 'N/A', '060401.230608.132515.343072', '060101.230608.132033.804702', 'Se han relacionado los elementos 060401.230608.132515.343072 y 060101.230608.132033.804702\".', '000400.230608.132531.425483', '', 'N/A', 'N/A', 1, '2023-06-08 13:25:31', '070501.181104.090000.000001'),
('000600.230608.132758.523668', 1, 3, '', 'estado', 'Aprovechado y finalizado', '4', 'N/A', '060500.230608.132515.335877', '', 'N/A', 'N/A', 1, '2023-06-08 13:27:58', '070501.181104.090000.000001'),
('000600.230608.132941.321597', 1, 1, 'Plan de Acción', 'N/A', 'N/A', 'Estudio de desarrollo de aplicación E2E', 'Añadido el Plan de Acción \"PAS-23-003 - Estudio de desarrollo de aplicación E2E\".', '060401.230608.132941.319239', 'N/A', 'N/A', 'N/A', 1, '2023-06-08 13:29:41', '070501.181104.090000.000001'),
('000600.230608.133045.263263', 1, 1, 'Acción derivada de Plan de acción', 'N/A', 'N/A', 'Inicio del estudio para el desarrollo de la aplicación E2E', 'Añadido el Acción derivada de Plan de acción \"ACC-001 - Inicio del estudio para el desarrollo de la aplicación E2E\".', '060402.230608.133045.259848', 'N/A', 'N/A', 'N/A', 1, '2023-06-08 13:30:45', '070501.181104.090000.000001'),
('000600.230608.133117.836243', 1, 1, 'Acción derivada de Plan de acción', 'N/A', 'N/A', 'Continúa el estudio para el desarrollo de la aplicación 2E2', 'Añadido el Acción derivada de Plan de acción \"ACC-002 - Continúa el estudio para el desarrollo de la aplicación 2E2\".', '060402.230608.133117.834082', 'N/A', 'N/A', 'N/A', 1, '2023-06-08 13:31:17', '070501.181104.090000.000001'),
('000600.230608.133639.840937', 1, 1, 'Acción derivada de Plan de acción', 'N/A', 'N/A', 'Comunicado de las medidas propuestas a Paco Molina', 'Añadido el Acción derivada de Plan de acción \"ACC-001 - Comunicado de las medidas propuestas a Paco Molina\".', '060402.230608.133639.837148', 'N/A', 'N/A', 'N/A', 1, '2023-06-08 13:36:39', '070501.181104.090000.000001'),
('000600.230608.133738.974830', 1, 1, 'Acción derivada de Plan de acción', 'N/A', 'N/A', 'Paco Molina da la aprobación de las medidas propuestas', 'Añadido el Acción derivada de Plan de acción \"ACC-002 - Paco Molina da la aprobación de las medidas propuestas\".', '060402.230608.133738.970687', 'N/A', 'N/A', 'N/A', 1, '2023-06-08 13:37:38', '070501.181104.090000.000001'),
('000600.230608.133814.283032', 1, 4, 'Análisis de Contexto', 'N/A', 'Castillo Disney', 'Castillo Disney', 'Elimiando el Análisis de Contexto \"ACT-002 - Castillo Disney\".', '040100.230503.125155.248340', 'N/A', 'N/A', 'N/A', 1, '2023-06-08 13:38:14', '070501.181104.090000.000001'),
('000600.230608.133916.106696', 1, 1, 'Relación', 'N/A', '060101.230608.132033.804702', '060401.230608.132941.319239', 'Se han relacionado los elementos 060101.230608.132033.804702 y 060401.230608.132941.319239\".', '000400.230608.133916.104290', '', 'N/A', 'N/A', 1, '2023-06-08 13:39:16', '070501.181104.090000.000001'),
('000600.230608.134029.966280', 1, 1, 'Adjunto', 'N/A', 'N/A', '060101.230608.132033.804702', '', '000300.230608.134029.958159', '', 'N/A', 'N/A', 1, '2023-06-08 13:40:29', '070501.181104.090000.000001'),
('000600.230608.134244.998237', 1, 1, '', 'N/A', 'N/A', '', 'Añadido el  \" - \".', '', 'N/A', 'N/A', 'N/A', 1, '2023-06-08 13:42:44', '070501.181104.090000.000001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `00_log_text`
--

CREATE TABLE `00_log_text` (
  `elementoSistema` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `texto_create` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `texto_update` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `texto_delete` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `00_log_text`
--

INSERT INTO `00_log_text` (`elementoSistema`, `texto_create`, `texto_update`, `texto_delete`) VALUES
('Acción derivada de Plan de acción repetitivo', '', '', ''),
('Acción derivada de Plan de acción singular', '', '', ''),
('Acta de comité', '', '', ''),
('Adjunto', '', '', ''),
('Alcance', '', '', ''),
('Amenaza [Análisis DAFO]', 'Creada Amenaza {codigo_interno}: {denominador}', 'Amenaza {codigo_interno}: Se ha actualizado la propiedad \'{propiedad}\' de \'{valorAntiguo}\' a \'{valorNuevo}', 'Eliminada Amenaza {codigo_interno}: {denominador}'),
('Análisis de Contexto', 'Creado Análisis de Contexto {codigo_interno}: {denominador}', 'Análisis de Contexto {codigo_interno}: Se ha actualizado la propiedad \'{propiedad}\' de \'{valorAntiguo}\' a \'{valorNuevo}\'', 'Eliminado Análisis de Contexto {codigo_interno}: {denominador}'),
('Auditoría externa', '', '', ''),
('Auditoría interna', '', '', ''),
('Bitácora', '', '', ''),
('Cambio', '', '', ''),
('Comunicado de calidad', '', '', ''),
('Debilidad [Análisis DAFO]', 'Creada Debilidad {codigo_interno}: {denominador}', 'Debilidad {codigo_interno}: Se ha actualizado la propiedad \'{propiedad}\' de \'{valorAntiguo}\' a \'{valorNuevo}', 'Eliminada Debilidad {codigo_interno}: {denominador}'),
('Documentación externa', '', '', ''),
('Equipo de medida', '', '', ''),
('Evaluación de proveedores (TDE)', '', '', ''),
('Evaluación de proveedores (TSOL)', '', '', ''),
('Evaluación de satisfacción del cliente', '', '', ''),
('Ficha de perfil de puesto', '', '', ''),
('Formación', '', '', ''),
('Formato(Documentación del sistema)', '', '', ''),
('Fortaleza [Análisis DAFO]', 'Creada Fortaleza {codigo_interno}: {denominador}', 'Fortaleza {codigo_interno}: Se ha actualizado la propiedad \'{propiedad}\' de \'{valorAntiguo}\' a \'{valorNuevo}', 'Eliminada Fortaleza {codigo_interno}: {denominador}'),
('Guía (Documentación del sistema)', '', '', ''),
('Histórico Amenaza [Análisis DAFO]', '', '', ''),
('Histórico Análisis Contexto', '', '', ''),
('Histórico Debilidad [Análisis DAFO]', '', '', ''),
('Histórico Fortaleza [Análisis DAFO]', '', '', ''),
('Histórico Oportunidad [Análisis DAFO]', '', '', ''),
('Histórico Parte Interesada Externa', '', '', ''),
('Histórico Parte Interesada Interna', '', '', ''),
('Indicador', '', '', ''),
('Instrucción (Documentación del sistema)', '', '', ''),
('Manual (Documentación del sistema)', '', '', ''),
('No conformidad de auditoría externa', '', '', ''),
('No Conformidad de Auditoría interna', '', '', ''),
('Objetivo', '', '', ''),
('Observación de auditoría externa', '', '', ''),
('Observación de Auditoría interna', '', '', ''),
('Oportunidad de mejora de auditoría externa', '', '', ''),
('Oportunidad de mejora de auditoría interna', '', '', ''),
('Oportunidad del sistema', '', '', ''),
('Oportunidad [Análisis DAFO]', 'Creada Oportunidad {codigo_interno}: {denominador}', 'Oportunidad {codigo_interno}: Se ha actualizado la propiedad \'{propiedad}\' de \'{valorAntiguo}\' a \'{valorNuevo}', 'Eliminada Oportunidad {codigo_interno}: {denominador}'),
('Organigrama', '', '', ''),
('Otros documentos (Documentación del sistema)', '', '', ''),
('Parte Interesada Externa', 'Creada Parte Interesada Externa{codigo_interno}: {denominador}', 'Parte Interesada Externa {codigo_interno}: Se ha actualizado la propiedad \'{propiedad}\' de \'{valorAntiguo}\' a \'{valorNuevo}', 'Eliminada Parte Interesada Externa {codigo_interno}: {denominador}'),
('Parte Interesada Interna', 'Creada Parte Interesada Interna {codigo_interno}: {denominador}', 'Parte Interesada Interna {codigo_interno}: Se ha actualizado la propiedad \'{propiedad}\' de \'{valorAntiguo}\' a \'{valorNuevo}', 'Eliminada Parte Interesada Interna {codigo_interno}: {denominador}'),
('Plan de acción repetitivo', '', '', ''),
('Plan de acción singular', '', '', ''),
('Plantillas (Documentación del sistema)', '', '', ''),
('Política', '', '', ''),
('Procedimiento (Documentación del sistema)', '', '', ''),
('Proceso', '', '', ''),
('Proyecto PECAL\r\n', '', '', ''),
('Recurso', '', '', ''),
('Relación', '', '', ''),
('Revisión partes interesadas', '', '', ''),
('Revisión por la dirección', '', '', ''),
('Riesgo del sistema', '', '', ''),
('Seguimiento de un objetivo', '', '', ''),
('Usuarios', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `00_permisos`
--

CREATE TABLE `00_permisos` (
  `id` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `permitirPlanesAccion` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `00_permisos`
--

INSERT INTO `00_permisos` (`id`, `email`, `permitirPlanesAccion`) VALUES
('070501-220711141904', 'joseramon.valhondoquiros@telefonica.com', 0),
('070501-220711141905', 'mariadolores.carrascomoreno@telefonica.com', 0),
('070501-220711141906', 'martina.torralbarodriguez@telefonica.com', 1),
('070501-221011134101', 'franciscojose.molinamena@telefonica.com', 0),
('070501-221011134102', 'ricardo.bardotorres@telefonica.com', 0),
('070501-221011134103', 'gustavo.jonssongarrido@telefonica.com', 0),
('070501-221011134104', 'cristina.gomezsimon@telefonica.com', 0),
('070501-221011134105', 'fernando.lazarodiaz@telefonica.com', 0),
('070501-221011134106', 'andres.romandelperal@telefonica.com', 1),
('070501-221011134107', 'andres.martinezanton.ext@telefonica.com', 0),
('070501-221011134108', 'jesusmanuel.ramoscano@telefonica.com', 0),
('070501-221011134109', 'marioasher.barcessatserruya@telefonica.com', 0),
('070501-221011134110', 'juliobenedicto.vicariomancho@telefonica.com', 0),
('070501-221011134111', 'marta.garridovaamonde@telefonica.com', 0),
('070501-221011134112', 'aitor.solarazcona@telefonica.com', 0),
('070501-221011134113', 'alvaro.garciaramiro@telefonica.com', 0),
('070501-221011134114', 'cristina.serranonuñez@telefonica.com', 0),
('070501-221011134115', 'esperanza.delalamoarriba@telefonica.com', 0),
('070501-221011134116', 'ignacioalvaro.bruquetasgalan@telefonica.com', 0),
('070501-221011134117', 'angel.juradocastillejo@telefonica.com', 0),
('070501-221011134118', 'pedro.duartebravo@telefonica.com', 0),
('070501-221011134119', 'pedro.amorzarate@telefonica.com', 0),
('070501-221011134120', 'mariajesus.garzonladronguevara@telefonica.com', 0),
('070501-221011134121', 'angelluis.sanchezcesteros@telefonica.com', 0),
('070501-221011134122', 'antonio.sancheztejero@telefonica.com', 0),
('070501-221011134123', 'joseluis.merchaniglesias@telefonica.com', 0),
('070501-221011134124', 'pedromaria.garcialiquete@telefonica.com', 0),
('070501-221011134125', 'javier.mendozacano@telefonica.com', 0),
('070501-221011134126', 'carlos.alonsocarmona@telefonica.com', 0),
('070501-221011134127', 'angel.lozanogarcia-prieto@telefonica.com', 0),
('070501-221011134128', 'joseluis.delgadomarin@telefonica.com', 0),
('070501-221011134129', 'jose.perezdionisio@telefonica.com', 0),
('070501-221011134130', 'daniel.gilsantiuste@telefonica.com', 0),
('070501-221011134131', 'javier.ciruelosgil@telefonica.com', 0),
('070501-221011134132', 'susana.gonzalezmatesanz@telefonica.com', 0),
('070501-221011134133', 'sergio.moratovillar@telefonica.com', 0),
('070501-221011134134', 'josemanuel.garciajimenez@telefonica.com', 0),
('070501-221011134135', 'angelluis.martinolivenza@telefonica.com', 0),
('070501-221011134136', 'antonioblas.martinezmorante@telefonica.com', 0),
('070501-221011134137', 'carlos.cuadradogalvan@telefonica.com', 0),
('070501-221011134138', 'luis.sanchezsanchez@telefonica.com', 0),
('070501-221011134139', 'asuncion.lopezzorrilla@telefonica.com', 0),
('070501-221011134140', 'felix.sanchezpimentel@telefonica.com', 0),
('070501-221011134141', 'santiago.sandovaligelmo@telefonica.com', 0),
('070501-221011134142', 'felipe.carvajaljimenez@telefonica.com', 0),
('070501-221011134143', 'josemaria.garciaasensio@telefonica.com', 0),
('070501-221011134144', 'alejandro.garcialazaro@telefonica.com', 0),
('070501-221011134145', 'miguelangel.gomezsanchez@telefonica.com', 0),
('070501-221011134146', 'raulangel.pallasnunez@telefonica.com', 0),
('070501-221011134147', 'fernando.guerrerobraojos@telefonica.com', 0),
('070501-221011134148', 'tomas.sancholopez@telefonica.com', 0),
('070501-221011134149', 'luis.manasmaldonado@telefonica.com', 0),
('070501-221011134150', 'leticia.roldanmontero@telefonica.com', 0),
('070501-221011134151', 'alvaro.gonzalezcaballero@telefonica.com', 0),
('070501-221011134152', 'eduardo.martinezfernandez1@telefonica.com', 0),
('070501-221011134153', 'emma.delgadillogomez@telefonica.com', 0),
('070501-221011134154', 'angeles.cabezasmiguel@telefonica.com', 0),
('070501.181104.090000.000001', 'sergio.garciamontalvo@telefonica.com', 1),
('070501.220214.090000.000001', 'fatimadelrosario.munozcurado@telefonica.com', 1),
('070501.230224.090000.000001', 'anamaria.rubiocanales@telefonica.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `00_personal`
--

CREATE TABLE `00_personal` (
  `id` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `primer_apellido` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `segundo_apellido` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `matricula` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefono_fijo` int NOT NULL,
  `telefono_movil` int NOT NULL,
  `empresa` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rol` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cargo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado` int NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `00_personal`
--

INSERT INTO `00_personal` (`id`, `user`, `email`, `nombre`, `primer_apellido`, `segundo_apellido`, `matricula`, `telefono_fijo`, `telefono_movil`, `empresa`, `rol`, `cargo`, `estado`, `avatar`) VALUES
('070501-220711141904', '', 'joseramon.valhondoquiros@telefonica.com', 'José Ramón', 'Valhondo', 'Quirós', '', 0, 0, 'TIS', 'Calidad', 'Técnico de calidad', 0, ''),
('070501-220711141905', '', 'mariadolores.carrascomoreno@telefonica.com', 'María Dolores', 'Carrasco', 'Moreno', 'Tf06091', 917548043, 683529608, 'TIS', 'Otros', '', 1, ''),
('070501-220711141906', '', 'martina.torralbarodriguez@telefonica.com', 'Martina', 'Torralba', 'Rodríguez', '', 0, 0, 'TIS', 'Otros', '', 1, '/build/img/users/070501-220711141906.jpg'),
('070501-221011134101', '', 'franciscojose.molinamena@telefonica.com', 'Francisco José', 'Molina', 'Mena', '', 0, 0, 'TDE', 'Ingeniería', 'Director de Ingeniería y Desarrollo de Negocio', 1, '/build/img/users/070501-221011134101.jpg'),
('070501-221011134102', '', 'ricardo.bardotorres@telefonica.com', 'Ricardo', 'Bardo', 'Torres', '148432', 915843229, 696953079, 'TDE', 'Ingeniería', 'Gerente de Ingeniería Defensa', 1, '/build/img/users/070501-221011134102.jpg'),
('070501-221011134103', '', 'gustavo.jonssongarrido@telefonica.com', 'Gustavo', 'Jonsson', 'Garrido', '', 0, 0, '', 'Economía', 'Jefe de Control Gestión de Recursos', 1, '/build/img/users/070501-221011134103.jpg'),
('070501-221011134104', '', 'cristina.gomezsimon@telefonica.com', 'Cristina', 'Gómez', 'Simon', 'UT04698', 680013373, 699079634, '', 'Ingeniería', 'Administrativo', 0, ''),
('070501-221011134105', '', 'fernando.lazarodiaz@telefonica.com', 'Fernando', 'Lázaro', 'Díaz', 'DS01474', 917548003, 686972853, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134106', '', 'andres.romandelperal@telefonica.com', 'Andrés', 'Roman', 'Del Peral', 'tf04681', 917547709, 630004598, 'TIS', 'Ingeniería', 'Informática', 1, ''),
('070501-221011134107', '', 'andres.martinezanton.ext@telefonica.com', 'Andrés', 'Martinez', 'Antón', 'TFX0569', 0, 639440100, 'TIS', 'Ingeniería', 'Informática', 1, ''),
('070501-221011134108', '', 'jesusmanuel.ramoscano@telefonica.com', 'Jesús Manuel', 'Ramos', 'Cano', 'DS00474', 917547980, 609443899, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134109', '', 'marioasher.barcessatserruya@telefonica.com', 'Mario', 'Acher', 'Barcessat Serruya', 'DS01379', 917547981, 638884672, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134110', '', 'juliobenedicto.vicariomancho@telefonica.com', 'Julio Benedicto', 'Vicario', 'Mancho', 'UT05690', 680011264, 690140390, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134111', '', 'marta.garridovaamonde@telefonica.com', 'Marta', 'Garrido', 'Vaamonde', '151073', 915843232, 616827255, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134112', '', 'aitor.solarazcona@telefonica.com', 'Aitor', 'Solar', 'Azcona', 'TF06351', 917548027, 682000827, 'TIS', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134113', '', 'alvaro.garciaramiro@telefonica.com', 'Alvaro', 'Garcia', 'Ramiro', 'TF06117', 917547994, 645696172, 'TIS', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134114', '', 'cristina.serranonuñez@telefonica.com', 'Cristina', 'Serrano', 'Nuñez', 'TF06471', 0, 683236194, 'TIS', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134115', '', 'esperanza.delalamoarriba@telefonica.com', 'Esperanza', 'Del Alamo', 'Arriba', 'DS00261', 917547997, 608278715, '', 'Otros', 'Administrativo', 1, ''),
('070501-221011134116', '', 'ignacioalvaro.bruquetasgalan@telefonica.com', 'Ignacio Álvaro', 'Bruquetas', 'Galan', '129836', 915843217, 616662844, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134117', '', 'angel.juradocastillejo@telefonica.com', 'Ángel', 'Jurado', 'Castillejo', 'T127379', 915843216, 639112451, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134118', '', 'pedro.duartebravo@telefonica.com', 'Pedro', 'Duarte', 'Bravo', 'DS00246', 917547999, 608534202, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134119', '', 'pedro.amorzarate@telefonica.com', 'Pedro Ángel', 'Amor', 'Zarate', 'T146119', 915843228, 626136888, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134120', '', 'mariajesus.garzonladronguevara@telefonica.com', 'María Jesús', 'Garzón', 'Ladrón Guevara', '127576', 915845337, 608485591, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134121', '', 'angelluis.sanchezcesteros@telefonica.com', 'Ángel Luis', 'Sánchez', 'Cesteros', '130911', 915161738, 618667784, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134122', '', 'antonio.sancheztejero@telefonica.com', 'Antonio', 'Sánchez', 'Tejero', 'ds00275', 917548024, 696467553, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134123', '', 'joseluis.merchaniglesias@telefonica.com', 'José Luis', 'Merchan', 'Iglesias', 'DS00371', 917548010, 699848009, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134124', '', 'pedromaria.garcialiquete@telefonica.com', 'Pedro María', 'García', 'Liquete', 'DS01809', 917548503, 638730725, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134125', '', 'javier.mendozacano@telefonica.com', 'Javier', 'Mendoza', 'Cano', 't151407', 915843236, 619590554, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134126', '', 'carlos.alonsocarmona@telefonica.com', 'Carlos', 'Alonso', 'Carmona', 'ut06185', 680010206, 676046606, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134127', '', 'angel.lozanogarcia-prieto@telefonica.com', 'Angel', 'Lozano', 'García-Prieto', 'UT04304', 680011555, 639249756, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134128', '', 'joseluis.delgadomarin@telefonica.com', 'José Luis', 'Delgado', 'Marín', 'T152922', 915161730, 669660133, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134129', '', 'jose.perezdionisio@telefonica.com', 'José', 'Pérez', 'Dionisio', 'T151233', 0, 608984423, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134130', '', 'daniel.gilsantiuste@telefonica.com', 'Daniel', 'Gil', 'Santiuste', 'T734456', 0, 659829441, 'TDE', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134131', '', 'javier.ciruelosgil@telefonica.com', 'Javier', 'Ciruelos', 'Gil', 'DS00349', 917547992, 646486556, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134132', '', 'susana.gonzalezmatesanz@telefonica.com', 'Susana', 'Gonzalez', 'Matesanz', 'DS01300', 915162752, 616854331, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134133', '', 'sergio.moratovillar@telefonica.com', 'Sergio', 'Morato', 'Villar', '151187', 915843234, 638263394, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134134', '', 'josemanuel.garciajimenez@telefonica.com', 'José Manuel', 'Garcia', 'Jimenez', '151057', 915843230, 650109914, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134135', '', 'angelluis.martinolivenza@telefonica.com', 'Ángel Luis', 'Martin', 'Olivenza', 'DS00312', 917548009, 680499162, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134136', '', 'antonioblas.martinezmorante@telefonica.com', 'Antonio Blas', 'Martinez', 'Morante', 'DS00200', 914543593, 616412756, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134137', '', 'carlos.cuadradogalvan@telefonica.com', 'Carlos', 'Cuadrado', 'Galvan', 'DS00372', 914543612, 699848009, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134138', '', 'luis.sanchezsanchez@telefonica.com', 'Luis', 'Sanchez', 'Sanchez', 'DS00392', 914543619, 695341309, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134139', '', 'asuncion.lopezzorrilla@telefonica.com', 'Mª Asunción', 'Lopez', 'Zorrilla', 'DS00662', 914543597, 686088624, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134140', '', 'felix.sanchezpimentel@telefonica.com', 'Félix', 'Sánchez', 'Pimentel', 'Tf06315', 915843209, 648291979, 'TIS', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134141', '', 'santiago.sandovaligelmo@telefonica.com', 'Santiago', 'Sandoval', 'Igelmo', 'Tf04683', 914543591, 680216148, 'TIS', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134142', '', 'felipe.carvajaljimenez@telefonica.com', 'Felipe', 'Carvajal', 'Jimenez', '139421', 914543624, 629060734, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134143', '', 'josemaria.garciaasensio@telefonica.com', 'Jose Maria', 'García', 'Asensio', '125025', 913893310, 618136681, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134144', '', 'alejandro.garcialazaro@telefonica.com', 'Alejandro', 'García', 'Lazaro', '135909', 914543529, 660994275, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134145', '', 'miguelangel.gomezsanchez@telefonica.com', 'Miguel Angel', 'Gómez', 'Sanchez', '125029', 914543633, 650666513, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134146', '', 'raulangel.pallasnunez@telefonica.com', 'Raul Angel', 'Pallas', 'Nuñez', '117378', 928218463, 609618317, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134147', '', 'fernando.guerrerobraojos@telefonica.com', 'Fernando', 'Gerrero', 'Braojos', '151933', 914832043, 699586080, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134148', '', 'tomas.sancholopez@telefonica.com', 'Tomas', 'Sancho', 'López', '135992', 914543613, 609249603, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134149', '', 'luis.manasmaldonado@telefonica.com', 'Luis', 'Mañas', 'Maldonado', '', 0, 0, '', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134150', '', 'leticia.roldanmontero@telefonica.com', 'Leticia', 'Roldán', 'Montero', '', 0, 0, 'TDE', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134151', '', 'alvaro.gonzalezcaballero@telefonica.com', 'Álvaro', 'González', 'Caballero', '', 0, 0, 'TDE', 'Ingeniería', 'Ingeniería', 1, ''),
('070501-221011134152', '', 'eduardo.martinezfernandez1@telefonica.com', 'Eduardo', 'Martínez', 'Fernández', '', 0, 0, 'TDE', 'Economía', 'Gestión económica', 1, ''),
('070501-221011134153', '', 'emma.delgadillogomez@telefonica.com', 'Emma', 'Delgadillo', 'Gómez', '', 914820982, 639852514, 'TDE', 'Economía', 'Gestión económica', 1, ''),
('070501-221011134154', '', 'angeles.cabezasmiguel@telefonica.com', 'Mª Ángeles', 'Cabezas', 'Miguel', '', 915162965, 608479806, 'TSOL', 'Economía', 'Gestión económica', 1, ''),
('070501.181104.090000.000001', '002000.181104.090000.000001', 'sergio.garciamontalvo@telefonica.com', 'Sergio', 'García', 'Montalvo', 'Tf06171', 917548040, 696508095, 'TIS', 'Calidad', 'Técnico de calidad', 1, '/build/img/users/070501.181104.090000.000001.jpg'),
('070501.220214.090000.000001', '000200.220214.090000.000001', 'fatimadelrosario.munozcurado@telefonica.com', 'Fátima del Rosario', 'Muñoz', 'Curado', '', 0, 0, 'TIS', 'Calidad', 'Técnico de calidad', 1, '/build/img/users/070501.220214.090000.000001.jpg'),
('070501.230224.090000.000001', '002000.230224.090000.000001', 'anamaria.rubiocanales@telefonica.com', 'Ana María', 'Rubio', 'Canales', 'T151894', 915843238, 626996656, 'TDE', 'Calidad', 'Representante de Calidad', 1, '/build/img/users/070501.230224.090000.000001.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `00_relaciones`
--

CREATE TABLE `00_relaciones` (
  `id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_item1` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_item2` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `00_relaciones`
--

INSERT INTO `00_relaciones` (`id`, `id_item1`, `id_item2`) VALUES
('000400-230214104829', '040100-220502142301', '040300-20221219000000'),
('000400.230608.132135.027573', '060101.230608.132033.804702', '040600.220509.143601.285599'),
('000400.230608.132349.260710', '060401.230608.132330.460623', '060101.230608.132033.804702'),
('000400.230608.132515.349516', '060500.230608.132515.335877', '060401.230608.132515.343072'),
('000400.230608.132531.425483', '060401.230608.132515.343072', '060101.230608.132033.804702'),
('000400.230608.133916.104290', '060101.230608.132033.804702', '060401.230608.132941.319239');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `00_usuarios`
--

CREATE TABLE `00_usuarios` (
  `id` varchar(27) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `user` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `00_usuarios`
--

INSERT INTO `00_usuarios` (`id`, `user`, `password`) VALUES
('000200.220214.090000.000001', 'fatimadelrosario.munozcurado@telefonica.com', '$2y$10$4MN3cpyvy4ubZXfP89QgzetX41VFHL1C2IgC1KY1cp7Do1gV2mKOe'),
('002000.181104.090000.000001', 'sergio.garciamontalvo@telefonica.com', '$2y$10$1Ko372NoMf8JQB09KCBCUeTkGtNeuubUoCnDt.0WKZWukcDEwCPUy'),
('002000.230224.090000.000001', 'anamaria.rubiocanales@telefonica.com', '$2y$10$N85ECHGYMg/H8vwdpjyhfe1EW3E39NrtVDh4w32/Gz5aGlQ2m6Op.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `00_versiones`
--

CREATE TABLE `00_versiones` (
  `id` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `control_cambios` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `00_versiones`
--

INSERT INTO `00_versiones` (`id`, `fecha`, `control_cambios`, `date`) VALUES
('2022.11.30.1', '30/11/2022', 'Primera edición de pruebas de la web. \r\n<br>\r\n<ol><strong> General</strong> </li>\r\n<li>- Se ha dado de alta esta versión en el servidor local de la oficina </li>\r\n<li>- Se ha añadido el módulo \"Sistema de login\" </li>\r\n<li>- Se ha añadido el módulo \"Usuarios\" </li>\r\n<li>- Se ha añadido el módulo \"Bitácora\" </li>\r\n<li>- Se ha añadido el módulo \"Control de versiones\" </li>\r\n</ol>\r\n\r\n<ol><strong> Contexto </strong> <br>\r\n<li> - Se ha añadido el módulo \"Análisis de Contexto\" </li>\r\n<li>- Se ha añadido el módulo \"Partes Interesadas\" </li>\r\n<li>- Se ha añadido el módulo \"Alcance\" </li>\r\n<li>- Se ha añadido el módulo \"Sistema de gestión y sus Procesos\" </li>\r\n<li>- Se ha añadido el módulo \"Misión y visión\" </li>\r\n</ol>\r\n\r\n<ol><strong> Liderazgo </strong> <br>\r\n<li>- Se ha añadido el módulo \"Liderazgo y compromiso\" <br>\r\n<li>- Se ha añadido el módulo \"Política\" <br>\r\n<li>- Se ha añadido el módulo \"Roles, responsabilidades y autoridades\" <br>\r\n</ol>\r\n\r\n<ol><strong> Planificación</strong> <br>\r\n <li>- Se ha añadido el módulo \"Riesgos y oportunidades del sistema\" <br>\r\n <li>- Se ha añadido el módulo \"Objetivos\" <br>\r\n <li>- Se ha añadido el módulo \"Planificación de los cambios\" <br>\r\n</ol>', '2022-11-30'),
('2022.12.19.1', '19/12/2022', '<ol><strong> Partes interesadas</strong> </li>\r\n<li>- Añadidos contenedores para las partes interesadas </li>\r\n<li>- Corrección general de errores </li>\r\n</ol>\r\n<ol><strong> Objetivos</strong> </li>\r\n<li>- Se ha deshabilitado el acceso a esta parte de la web hasta que se termine su ejecución </li>\r\n</ol>', '2022-12-19'),
('2023.02.01.1', '01/02/2023', '<ol><strong> Análisis DAFO</strong> </li>\r\n<li>- Corrección de errores relacionados con las revisiones del DAFO </li>\r\n</ol>\r\n<ol><strong> Usuarios </strong> </li>\r\n<li>- Se ha desarrollado un sistema más completo para la visualización del personal y usuarios </li>\r\n<li>- Añadida función para cambiar la contraseña por defecto </li>\r\n<li>- Añadida función para cambiar la foto de perfil </li>\r\n</ol>\r\n<ol><strong> Otros</strong> </li>\r\n<li>- Se ha corregido un error menor que impedía logarse al pulsar \"Enter\", teniendo que pulsar el botón con el puntero. </li>\r\n</ol>', '2023-02-01'),
('2023.02.07.1', '07/02/2023', '<ol><strong> General</strong>\r\n<li>- Versión estable preparada para presentar en la auditoría interna. </li>\r\n<li>- Se ha reestructurado la arquitectura general de la base de datos, lo que mejora la optimización y el rendimiento. </li>\r\n<li>- Se ha reestructurado la arquitectura de modelos, lo que mejora la optimización y el rendimiento. </li>\r\n</ol>\r\n<ol><strong> Modales</strong>\r\n<li>- Se ha corregido un error de los formularios modales, que provocaba que no se adaptaran a diferentes tamaños de pantallas. </li>\r\n</ol>\r\n<ol><strong> Modales</strong>\r\n<li>- Se ha corregido un error de los formularios modales, que provocaba que no se adaptaran a diferentes tamaños de pantallas. </li>\r\n</ol>\r\n<ol><strong> Bitácora</strong>\r\n<li>- Se ha corregido un error que provocaba que no se mostrara el denominador de un elemento al seleccionarlo al dar de alta una entrada. </li>\r\n<li>- Se ha corregido un error que provocaba que la fecha mostrada de la última revisión no se correspondiera con la fecha real. </li>\r\n</ol>', '2023-02-07'),
('2023.03.01.1', '01/03/2023', '<ol><strong> Nombre aplicación</strong> \r\n<li>- Se ha bautizado la aplicación como \"CADETE\" (Calidad de Defensa de Telefónica).</li>\r\n<li>- Se ha adaptado el logo de la aplicación para adaptarse a esta nueva denominación.</li>\r\n</ol>\r\n\r\n<ol><strong> Login</strong> \r\n<li>- Se han asignados diferentes interacciones en la web dependiendo del rol de la persona que inicie sesión. </li>\r\n</ol>\r\n\r\n<ol><strong> Codificación </strong> \r\n<li>- Se ha afinado más la codificación interna de los items del sistema para evitar que al ejecutar muchas interacciones con la base de datos se creen valores duplicados. </li>\r\n</ol>\r\n\r\n<ol><strong> Comunicados</strong> \r\n<li>- Se ha creado la sección de comunicados, en el apartado \"Apoyo\". Ahora, pueden verse los registros históricos de los comunicados de calidad, así como gestionar aquellos que se quieran ver en la portada al entrar en la web. </li>\r\n</ol>\r\n\r\n<ol><strong> Citas </strong> \r\n<li>- Se ha creado una sección de citas célebres del departamento. Puedes ver una al azar en el pie de la web, o verlas todas accediendo a la sección \"Citas\" </li>\r\n</ol>\r\n\r\n<ol><strong> Análisis DAFO</strong> \r\n<li>- Se ha corregido un error que provocaba que al realizar una revisión del contexto no hiciera bien la \"foto\" del análisis DAFO. </li>\r\n</ol>\r\n\r\n<ol><strong> Partes interesadas</strong> \r\n<li>- Se ha corregido un error que provocaba que al realizar una revisión de las partes interesadas no hiciera bien la \"foto\" de las mismas. </li>\r\n</ol>\r\n\r\n<ol><strong> Proyectos de mejora </strong> \r\n<li>- Se ha empezado a trabajar en el modulo \"Proyectos de mejora, dentro del apartado \"Planificación\" </li>\r\n</ol>\r\n\r\n<ol><strong> Planes de acción </strong> \r\n<li>- Se ha empezado a trabajar en el modulo \"Planes de acción, dentro del apartado \"Planificación\" </li>\r\n</ol>', '2023-03-01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `00_adjuntos`
--
ALTER TABLE `00_adjuntos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `00_bitacora`
--
ALTER TABLE `00_bitacora`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `00_citas`
--
ALTER TABLE `00_citas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `00_codigos`
--
ALTER TABLE `00_codigos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_elementoSistema` (`elementoSistema`);

--
-- Indices de la tabla `00_log`
--
ALTER TABLE `00_log`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `00_log_text`
--
ALTER TABLE `00_log_text`
  ADD PRIMARY KEY (`elementoSistema`),
  ADD KEY `FK_elementoSistema` (`elementoSistema`);

--
-- Indices de la tabla `00_permisos`
--
ALTER TABLE `00_permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `00_personal`
--
ALTER TABLE `00_personal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `00_relaciones`
--
ALTER TABLE `00_relaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `00_usuarios`
--
ALTER TABLE `00_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `00_versiones`
--
ALTER TABLE `00_versiones`
  ADD PRIMARY KEY (`id`);
--
-- Base de datos: `04_alcance`
--
CREATE DATABASE IF NOT EXISTS `04_alcance` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `04_alcance`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `04_alcance`
--

CREATE TABLE `04_alcance` (
  `id` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codigo_interno` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `normativa` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha` date DEFAULT NULL,
  `denominador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `comentarios` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `04_alcance`
--

INSERT INTO `04_alcance` (`id`, `codigo_interno`, `normativa`, `fecha`, `denominador`, `comentarios`) VALUES
('040500-220612142201', 'ALC-001', 'PECAL 2110', NULL, 'Diseño, Desarrollo, suministro, instalación, asistencia técnica, gestión y mantenimiento de sistemas de información y comunicaciones militares', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `04_alcance`
--
ALTER TABLE `04_alcance`
  ADD PRIMARY KEY (`id`);
--
-- Base de datos: `04_contexto`
--
CREATE DATABASE IF NOT EXISTS `04_contexto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `04_contexto`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `04_analisiscontexto`
--

CREATE TABLE `04_analisiscontexto` (
  `id` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codigo_interno` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `denominador` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipo` int NOT NULL,
  `comentarios` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `04_analisiscontexto`
--

INSERT INTO `04_analisiscontexto` (`id`, `codigo_interno`, `denominador`, `tipo`, `comentarios`) VALUES
('040100-220502142301', 'ACT-001', 'Análisis DAFO de Telefónica DyS', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `04_analisiscontexto_revisiones`
--

CREATE TABLE `04_analisiscontexto_revisiones` (
  `id` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `analisisContexto` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `codigo_interno` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tipo` int NOT NULL,
  `revision` int NOT NULL,
  `denominador` varchar(255) NOT NULL,
  `control_cambios` text NOT NULL,
  `fecha` date DEFAULT NULL,
  `comentarios` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `04_analisiscontexto_revisiones`
--

INSERT INTO `04_analisiscontexto_revisiones` (`id`, `analisisContexto`, `codigo_interno`, `tipo`, `revision`, `denominador`, `control_cambios`, `fecha`, `comentarios`) VALUES
('040200.230216.133856.560727', '040100-220502142301', 'ACT-001', 1, 1, 'Revisión 1 del Análisis de Contexto ACT-001', 'Sin cambios.', '2023-02-16', ''),
('040200.230216.221206.259362', '040100-220502142301', 'ACT-001', 1, 2, 'Revisión 2 del Análisis de Contexto ACT-001', 'Sin cambios.', '2023-02-16', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `04_analisiscontexto_tipos`
--

CREATE TABLE `04_analisiscontexto_tipos` (
  `id` int NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `04_analisiscontexto_tipos`
--

INSERT INTO `04_analisiscontexto_tipos` (`id`, `tipo`) VALUES
(1, 'Análisis DAFO'),
(2, 'Informes socioeconómicos'),
(3, 'Análisis de la competencia'),
(4, 'Estudio de mercado'),
(5, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `04_analisisdafo`
--

CREATE TABLE `04_analisisdafo` (
  `id` varchar(27) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `codigo_interno` varchar(7) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `analisisContexto` varchar(27) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `tipo` int DEFAULT NULL,
  `denominador` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `origen` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `fechaDeteccion` varchar(10) DEFAULT NULL,
  `estado` varchar(8) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `comentarios` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `04_analisisdafo`
--

INSERT INTO `04_analisisdafo` (`id`, `codigo_interno`, `analisisContexto`, `tipo`, `denominador`, `origen`, `fechaDeteccion`, `estado`, `comentarios`) VALUES
('040101-190701142801', 'DEB-001', '040100-220502142301', 1, 'Jubilaciones por el PSI, bajas, rotaciones, etc.', 'PSI', '', 'Vigente', 'Lo que conlleva a la \"Pérdida de conocimiento y experiencia\", que sería un riesgo, no una debilidad.'),
('040101-190701142802', 'DEB-002', '040100-220502142301', 1, 'Ralentización de procesos derivados de los requisitos de seguridad: HPS /HSEM/HSES.: habilitación para trabajar con documentación clasificada', 'Requisitos de seguridad (HPS/HSEM/HSES)', NULL, 'Vigente', NULL),
('040101-190701142901', 'DEB-003', '040100-220502142301', 1, 'Procedimientos exigidos por PECAL (instrucciones técnicas como la Normativa), ralentizan la operativa', NULL, NULL, 'Vigente', NULL),
('040101-190701142902', 'DEB-004', '040100-220502142301', 1, 'Complejidad en mantenimiento de planta con alta tasa de equipamiento obsoleto en cliente: condiciona proveedores', NULL, NULL, 'Vigente', NULL),
('040101-190701142903', 'DEB-005', '040100-220502142301', 1, 'La situación derivada del COVID19 junto con los requisitos de seguridad y las restricciones del cliente ralentiza la operativa.', 'Pandemia mundial de COVID-19.', NULL, 'Derogado', NULL),
('040101-230213183441', 'DEB-006', '040100-220502142301', 1, 'Los requisitos de seguridad y las restricciones del cliente ralentiza la operativa', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo: Retraso en hitos de los proyectos.\r\nOportunidad: N/A'),
('040101-230213183510', 'DEB-007', '040100-220502142301', 1, 'Falta de coordinación y/o comunicación entre los diferentes miembros que participan en un proyecto', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo: Incumplimiento de requisitos del contrato. Apertura de No Conformidades\r\nOportunidad: Aplicación 2E2'),
('040101-230213183532', 'DEB-008', '040100-220502142301', 1, 'Falta de coordinación entre diferentes áreas y departamentos de Telefónica', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo: Retrasos en el tiempo de ejecución de las actividades\r\nOportunidad: N/A'),
('040102-190701142901', 'AMZ-001', '040100-220502142301', 2, 'Alta dependencia de proveedores (condicionados por el propio cliente y otras por Telefónica', NULL, NULL, 'Vigente', NULL),
('040102-190701142902', 'AMZ-002', '040100-220502142301', 2, 'Servicios que puedan ser ofrecidos por la competencia directa, por ejemplo mundo TI, comunicaciones por satélite.. (competencia de integradores que son proveedores directos de nuestros clientes por ej INDRA, CPS, IECISA….)', NULL, NULL, 'Vigente', NULL),
('040102-190701143001', 'AMZ-003', '040100-220502142301', 2, 'Competencia dispone de otras certificaciones PECAL 2210 (desarrollo de software), que pueden dejarnos fuera en pliegos globales. TE no tiene esa línea de negocio)', NULL, NULL, 'Vigente', NULL),
('040102-230213183736', 'AMZ-004', '040100-220502142301', 2, 'Conflictos armamentísticos / bélicos, como por ejemplo el que se está desarrollando entre Rusia y Ucrania. Retraso en suministro de componentes', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo asociado: Retraso en los hitos de los proyectos.\r\nOportunidad asociada: N/A.'),
('040102-230213183804', 'AMZ-005', '040100-220502142301', 2, 'Plazos cortos de ejecución impuestos por el cliente y trabajos limitados por accesos a sus instalaciones, disponiblidad de servicios,…', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo asociado: Retraso en los hitos de los proyectos\r\n\r\nIncumplimiento de los requisitos del contrato\r\n\r\nOportunidad asociada: Mejorar nuestros procesos internos para compensar los plazos de los clientes'),
('040103-190701143001', 'FOR-001', '040100-220502142301', 3, 'Amplia experiencia en el sector Defensa', NULL, NULL, 'Vigente', NULL),
('040103-190701143002', 'FOR-002', '040100-220502142301', 3, 'Certificación en Requsitos de seguridad: HPS /HSEM/HSES: personal de empresa y establecimiento', NULL, NULL, 'Vigente', NULL),
('040103-190701143003', 'FOR-003', '040100-220502142301', 3, 'Larga trayectoria empresarial y disponibilidad de capital', NULL, NULL, 'Vigente', NULL),
('040103-190701143004', 'FOR-004', '040100-220502142301', 3, 'Gran experiencia en la operación y soporte de los servicios', NULL, NULL, 'Vigente', NULL),
('040103-190701143005', 'FOR-005', '040100-220502142301', 3, 'Equipos de RRHH multidisciplinares', NULL, NULL, 'Vigente', NULL),
('040103-190701143006', 'FOR-006', '040100-220502142301', 3, 'Funcionalidades exclusivas en los servicios (servicio de voz-datos-móviles y comunicaciones)', NULL, NULL, 'Vigente', NULL),
('040103-190701143101', 'FOR-007', '040100-220502142301', 3, 'Amplia presencia comercial y de explotación', NULL, NULL, 'Vigente', NULL),
('040103-190701143102', 'FOR-008', '040100-220502142301', 3, 'Posibilidad de paquetización y gran cartera de clientes', NULL, NULL, 'Derogado', NULL),
('040103-190701143103', 'FOR-009', '040100-220502142301', 3, 'Capacidad para atender grandes demandas', NULL, NULL, 'Vigente', NULL),
('040103-230213183922', 'FOR-010', '040100-220502142301', 3, 'Nombre de marca de empresa ampliamente reconocido', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo asociado: N/A.\r\nOportunidad asociada: Asistir a ferias y/o eventos para resaltar la presencia de Telefónica en el mundo de Defensa'),
('040103-230213184009', 'FOR-011', '040100-220502142301', 3, 'Aplicaciones desarrolladas y enfocadas específicamenete en nuestros procesos.', 'Agile', '2023-02-13', 'Vigente', 'Riesgo asociado: Disponibilidad y Seguridad de los Sistemas. Cortes de Servicio, caidas de servidores, ataques informáticos…\r\n\r\nOportunidad asociada: Aplicación E2E'),
('040103-230213184034', 'FOR-012', '040100-220502142301', 3, 'Implementación de metodologías ágiles en la ejecución de proyectos (AGILE, KANBAN, etc.)', 'Agile', '2023-02-13', 'Vigente', 'Riesgo asociado: Disponibilidad y Seguridad de los Sistemas. Cortes de Servicio, caidas de servidores, ataques informáticos…\r\n\r\nOportunidad asociada: Aplicación E2E'),
('040104-190701143201', 'OPO-001', '040100-220502142301', 4, 'Mercado en crecimiento (incremento presupuesto de la Administración para el Sector Defensa: nuevos concursos)', NULL, NULL, 'Vigente', NULL),
('040104-190701143202', 'OPO-002', '040100-220502142301', 4, 'Incrementar la productividad de los empleados (racionalización de actividades, perfil multidisciplinar estructura convergente TdE_TSOL en el área de Defensa...)', NULL, NULL, 'Vigente', NULL),
('040104-190701143203', 'OPO-003', '040100-220502142301', 4, 'Extender la experiencia en explotación, gestión s/ la Norma PECAL a otras áreas del Grupo Telefónica (ej pliegos de móviles solicitados por el Ministerio de Defensa)', NULL, NULL, 'Vigente', NULL),
('040104-230213184127', 'OPO-004', '040100-220502142301', 4, 'Certificar al personal en las tecnologías y software y hardware base con los que se presta el servicio (Formación según las necesidades de requisitos del Cliente: ej CISCO, ISO 20000, ITIL…)', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo asociado: Inversión económica\r\nOportunidad asociada: \r\n- Nuevas jornadas de formación al personal\r\n- Píldoras informativas, para acercar más la calidad a ingeniería'),
('040104-230213184204', 'OPO-005', '040100-220502142301', 4, 'Creación de nuevas aplicaciones/herramientas para agilizar nuestros procesos', 'Agile', '2023-02-13', 'Vigente', 'Riesgo asociado: Inversión económica\r\nOportunidad asociada: \r\n- Aplicación 2E2.\r\n- Mejora de la comunicación entre los departamentos.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `04_analisisdafo_historico`
--

CREATE TABLE `04_analisisdafo_historico` (
  `id` varchar(27) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `codigo_interno` varchar(7) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `analisisContexto` varchar(27) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `revisionAnalisisContexto` varchar(27) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `tipo` int DEFAULT NULL,
  `denominador` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `origen` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `fechaDeteccion` varchar(10) DEFAULT NULL,
  `estado` varchar(7) DEFAULT NULL,
  `comentarios` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `04_analisisdafo_historico`
--

INSERT INTO `04_analisisdafo_historico` (`id`, `codigo_interno`, `analisisContexto`, `revisionAnalisisContexto`, `tipo`, `denominador`, `origen`, `fechaDeteccion`, `estado`, `comentarios`) VALUES
('040201.230216.133856.561433', 'DEB-001', '040100-220502142301', '040200.230216.133856.560727', 1, 'Jubilaciones por el PSI, bajas, rotaciones, etc.', 'PSI', '', 'Vigente', 'Lo que conlleva a la \"Pérdida de conocimiento y experiencia\", que sería un riesgo, no una debilidad.'),
('040201.230216.133856.561629', 'DEB-002', '040100-220502142301', '040200.230216.133856.560727', 1, 'Ralentización de procesos derivados de los requisitos de seguridad: HPS /HSEM/HSES.: habilitación para trabajar con documentación clasificada', 'Requisitos de seguridad (HPS/HSEM/HSES)', '', 'Vigente', ''),
('040201.230216.133856.561805', 'DEB-003', '040100-220502142301', '040200.230216.133856.560727', 1, 'Procedimientos exigidos por PECAL (instrucciones técnicas como la Normativa), ralentizan la operativa', '', '', 'Vigente', ''),
('040201.230216.133856.561974', 'DEB-004', '040100-220502142301', '040200.230216.133856.560727', 1, 'Complejidad en mantenimiento de planta con alta tasa de equipamiento obsoleto en cliente: condiciona proveedores', '', '', 'Vigente', ''),
('040201.230216.133856.562308', 'DEB-006', '040100-220502142301', '040200.230216.133856.560727', 1, 'Los requisitos de seguridad y las restricciones del cliente ralentiza la operativa', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo: Retraso en hitos de los proyectos.\r\nOportunidad: N/A'),
('040201.230216.133856.562475', 'DEB-007', '040100-220502142301', '040200.230216.133856.560727', 1, 'Falta de coordinación y/o comunicación entre los diferentes miembros que participan en un proyecto', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo: Incumplimiento de requisitos del contrato. Apertura de No Conformidades\r\nOportunidad: Aplicación 2E2'),
('040201.230216.133856.562647', 'DEB-008', '040100-220502142301', '040200.230216.133856.560727', 1, 'Falta de coordinación entre diferentes áreas y departamentos de Telefónica', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo: Retrasos en el tiempo de ejecución de las actividades\r\nOportunidad: N/A'),
('040201.230216.221206.260301', 'DEB-001', '040100-220502142301', '040200.230216.221206.259362', 1, 'Jubilaciones por el PSI, bajas, rotaciones, etc.', 'PSI', '', 'Vigente', 'Lo que conlleva a la \"Pérdida de conocimiento y experiencia\", que sería un riesgo, no una debilidad.'),
('040201.230216.221206.260554', 'DEB-002', '040100-220502142301', '040200.230216.221206.259362', 1, 'Ralentización de procesos derivados de los requisitos de seguridad: HPS /HSEM/HSES.: habilitación para trabajar con documentación clasificada', 'Requisitos de seguridad (HPS/HSEM/HSES)', '', 'Vigente', ''),
('040201.230216.221206.260905', 'DEB-003', '040100-220502142301', '040200.230216.221206.259362', 1, 'Procedimientos exigidos por PECAL (instrucciones técnicas como la Normativa), ralentizan la operativa', '', '', 'Vigente', ''),
('040201.230216.221206.261128', 'DEB-004', '040100-220502142301', '040200.230216.221206.259362', 1, 'Complejidad en mantenimiento de planta con alta tasa de equipamiento obsoleto en cliente: condiciona proveedores', '', '', 'Vigente', ''),
('040201.230216.221206.261509', 'DEB-006', '040100-220502142301', '040200.230216.221206.259362', 1, 'Los requisitos de seguridad y las restricciones del cliente ralentiza la operativa', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo: Retraso en hitos de los proyectos.\r\nOportunidad: N/A'),
('040201.230216.221206.261690', 'DEB-007', '040100-220502142301', '040200.230216.221206.259362', 1, 'Falta de coordinación y/o comunicación entre los diferentes miembros que participan en un proyecto', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo: Incumplimiento de requisitos del contrato. Apertura de No Conformidades\r\nOportunidad: Aplicación 2E2'),
('040201.230216.221206.261869', 'DEB-008', '040100-220502142301', '040200.230216.221206.259362', 1, 'Falta de coordinación entre diferentes áreas y departamentos de Telefónica', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo: Retrasos en el tiempo de ejecución de las actividades\r\nOportunidad: N/A'),
('040202.230216.133856.562815', 'AMZ-001', '040100-220502142301', '040200.230216.133856.560727', 2, 'Alta dependencia de proveedores (condicionados por el propio cliente y otras por Telefónica', '', '', 'Vigente', ''),
('040202.230216.133856.562946', 'AMZ-002', '040100-220502142301', '040200.230216.133856.560727', 2, 'Servicios que puedan ser ofrecidos por la competencia directa, por ejemplo mundo TI, comunicaciones por satélite.. (competencia de integradores que son proveedores directos de nuestros clientes por ej INDRA, CPS, IECISA….)', '', '', 'Vigente', ''),
('040202.230216.133856.563069', 'AMZ-003', '040100-220502142301', '040200.230216.133856.560727', 2, 'Competencia dispone de otras certificaciones PECAL 2210 (desarrollo de software), que pueden dejarnos fuera en pliegos globales. TE no tiene esa línea de negocio)', '', '', 'Vigente', ''),
('040202.230216.133856.563189', 'AMZ-004', '040100-220502142301', '040200.230216.133856.560727', 2, 'Conflictos armamentísticos / bélicos, como por ejemplo el que se está desarrollando entre Rusia y Ucrania. Retraso en suministro de componentes', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo asociado: Retraso en los hitos de los proyectos.\r\nOportunidad asociada: N/A.'),
('040202.230216.133856.563308', 'AMZ-005', '040100-220502142301', '040200.230216.133856.560727', 2, 'Plazos cortos de ejecución impuestos por el cliente y trabajos limitados por accesos a sus instalaciones, disponiblidad de servicios,…', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo asociado: Retraso en los hitos de los proyectos\r\n\r\nIncumplimiento de los requisitos del contrato\r\n\r\nOportunidad asociada: Mejorar nuestros procesos internos para compensar los plazos de los clientes'),
('040202.230216.221206.262050', 'AMZ-001', '040100-220502142301', '040200.230216.221206.259362', 2, 'Alta dependencia de proveedores (condicionados por el propio cliente y otras por Telefónica', '', '', 'Vigente', ''),
('040202.230216.221206.262231', 'AMZ-002', '040100-220502142301', '040200.230216.221206.259362', 2, 'Servicios que puedan ser ofrecidos por la competencia directa, por ejemplo mundo TI, comunicaciones por satélite.. (competencia de integradores que son proveedores directos de nuestros clientes por ej INDRA, CPS, IECISA….)', '', '', 'Vigente', ''),
('040202.230216.221206.262412', 'AMZ-003', '040100-220502142301', '040200.230216.221206.259362', 2, 'Competencia dispone de otras certificaciones PECAL 2210 (desarrollo de software), que pueden dejarnos fuera en pliegos globales. TE no tiene esa línea de negocio)', '', '', 'Vigente', ''),
('040202.230216.221206.262539', 'AMZ-004', '040100-220502142301', '040200.230216.221206.259362', 2, 'Conflictos armamentísticos / bélicos, como por ejemplo el que se está desarrollando entre Rusia y Ucrania. Retraso en suministro de componentes', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo asociado: Retraso en los hitos de los proyectos.\r\nOportunidad asociada: N/A.'),
('040202.230216.221206.262665', 'AMZ-005', '040100-220502142301', '040200.230216.221206.259362', 2, 'Plazos cortos de ejecución impuestos por el cliente y trabajos limitados por accesos a sus instalaciones, disponiblidad de servicios,…', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo asociado: Retraso en los hitos de los proyectos\r\n\r\nIncumplimiento de los requisitos del contrato\r\n\r\nOportunidad asociada: Mejorar nuestros procesos internos para compensar los plazos de los clientes'),
('040202.230503.113922.228158', 'AMZ-001', '040100.230503.100316.653019', '040200.230503.113922.227671', 2, 'dragón', 'castillo', '2023-05-03', 'Vigente', 'aaaaaaaaaaaa'),
('040202.230503.113940.577730', 'AMZ-001', '040100.230503.100316.653019', '040200.230503.113940.577184', 2, 'dragón', 'castillo', '2023-05-03', 'Vigente', 'aaaaaaaaaaaa'),
('040202.230503.120433.550025', 'AMZ-001', '040100.230503.100316.653019', '040200.230503.120433.549667', 2, 'dragón', 'castillo', '2023-05-03', 'Vigente', 'aaaaaaaaaaaa'),
('040202.230503.120733.794477', 'AMZ-001', '040100.230503.100316.653019', '040200.230503.120733.793999', 2, 'dragón', 'castillo', '2023-05-03', 'Vigente', 'aaaaaaaaaaaa'),
('040202.230503.121729.415386', 'AMZ-001', '040100.230503.100316.653019', '040200.230503.121729.414644', 2, 'dragón', 'castillo', '2023-05-03', 'Vigente', 'aaaaaaaaaaaa'),
('040202.230503.121743.855549', 'AMZ-001', '040100.230503.100316.653019', '040200.230503.121743.855134', 2, 'dragón', 'castillo', '2023-05-03', 'Vigente', 'aaaaaaaaaaaa'),
('040202.230503.121815.910077', 'AMZ-001', '040100.230503.100316.653019', '040200.230503.121815.909659', 2, 'dragón', 'castillo', '2023-05-03', 'Vigente', 'aaaaaaaaaaaa'),
('040202.230503.121825.416805', 'AMZ-001', '040100.230503.100316.653019', '040200.230503.121825.416447', 2, 'dragón', 'castillo', '2023-05-03', 'Vigente', 'aaaaaaaaaaaa'),
('040202.230503.121839.527714', 'AMZ-001', '040100.230503.100316.653019', '040200.230503.121839.527209', 2, 'dragón', 'castillo', '2023-05-03', 'Vigente', 'aaaaaaaaaaaa'),
('040202.230503.121941.207714', 'AMZ-001', '040100.230503.100316.653019', '040200.230503.121941.207337', 2, 'dragón', 'castillo', '2023-05-03', 'Vigente', 'aaaaaaaaaaaa'),
('040202.230503.121951.580658', 'AMZ-001', '040100.230503.100316.653019', '040200.230503.121951.580270', 2, 'dragón', 'castillo', '2023-05-03', 'Vigente', 'aaaaaaaaaaaa'),
('040202.230503.122046.782323', 'AMZ-001', '040100.230503.100316.653019', '040200.230503.122046.780828', 2, 'dragón', 'castillo', '2023-05-03', 'Vigente', 'aaaaaaaaaaaa'),
('040202.230503.122128.324310', 'AMZ-001', '040100.230503.100316.653019', '040200.230503.122128.323859', 2, 'dragón', 'castillo', '2023-05-03', 'Vigente', 'aaaaaaaaaaaa'),
('040202.230503.122146.403327', 'AMZ-001', '040100.230503.100316.653019', '040200.230503.122146.399120', 2, 'dragón', 'castillo', '2023-05-03', 'Vigente', 'aaaaaaaaaaaa'),
('040202.230503.122154.652092', 'AMZ-001', '040100.230503.100316.653019', '040200.230503.122154.651791', 2, 'dragón', 'castillo', '2023-05-03', 'Vigente', 'aaaaaaaaaaaa'),
('040202.230503.122200.643334', 'AMZ-001', '040100.230503.100316.653019', '040200.230503.122200.642938', 2, 'dragón', 'castillo', '2023-05-03', 'Vigente', 'aaaaaaaaaaaa'),
('040202.230503.122209.957078', 'AMZ-001', '040100.230503.100316.653019', '040200.230503.122209.956370', 2, 'dragón', 'castillo', '2023-05-03', 'Vigente', 'aaaaaaaaaaaa'),
('040202.230503.122219.959376', 'AMZ-001', '040100.230503.100316.653019', '040200.230503.122219.958991', 2, 'dragón', 'castillo', '2023-05-03', 'Vigente', 'aaaaaaaaaaaa'),
('040202.230503.122254.598799', 'AMZ-001', '040100.230503.100316.653019', '040200.230503.122254.598295', 2, 'dragón', 'castillo', '2023-05-03', 'Vigente', 'aaaaaaaaaaaa'),
('040202.230503.122302.162735', 'AMZ-001', '040100.230503.100316.653019', '040200.230503.122302.161993', 2, 'dragón', 'castillo', '2023-05-03', 'Vigente', 'aaaaaaaaaaaa'),
('040202.230503.125320.495554', 'AMZ-001', '040100.230503.125155.248340', '040200.230503.125320.495160', 2, 'Dragón de la bella durmiente', 'Reino de ??', '2023-05-03', 'Vigente', 'Su nombre real es maléfica.'),
('040203.230216.133856.563427', 'FOR-001', '040100-220502142301', '040200.230216.133856.560727', 3, 'Amplia experiencia en el sector Defensa', '', '', 'Vigente', ''),
('040203.230216.133856.563545', 'FOR-002', '040100-220502142301', '040200.230216.133856.560727', 3, 'Certificación en Requsitos de seguridad: HPS /HSEM/HSES: personal de empresa y establecimiento', '', '', 'Vigente', ''),
('040203.230216.133856.563664', 'FOR-003', '040100-220502142301', '040200.230216.133856.560727', 3, 'Larga trayectoria empresarial y disponibilidad de capital', '', '', 'Vigente', ''),
('040203.230216.133856.563782', 'FOR-004', '040100-220502142301', '040200.230216.133856.560727', 3, 'Gran experiencia en la operación y soporte de los servicios', '', '', 'Vigente', ''),
('040203.230216.133856.563902', 'FOR-005', '040100-220502142301', '040200.230216.133856.560727', 3, 'Equipos de RRHH multidisciplinares', '', '', 'Vigente', ''),
('040203.230216.133856.564021', 'FOR-006', '040100-220502142301', '040200.230216.133856.560727', 3, 'Funcionalidades exclusivas en los servicios (servicio de voz-datos-móviles y comunicaciones)', '', '', 'Vigente', ''),
('040203.230216.133856.564138', 'FOR-007', '040100-220502142301', '040200.230216.133856.560727', 3, 'Amplia presencia comercial y de explotación', '', '', 'Vigente', ''),
('040203.230216.133856.564373', 'FOR-009', '040100-220502142301', '040200.230216.133856.560727', 3, 'Capacidad para atender grandes demandas', '', '', 'Vigente', ''),
('040203.230216.133856.564493', 'FOR-010', '040100-220502142301', '040200.230216.133856.560727', 3, 'Nombre de marca de empresa ampliamente reconocido', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo asociado: N/A.\r\nOportunidad asociada: Asistir a ferias y/o eventos para resaltar la presencia de Telefónica en el mundo de Defensa'),
('040203.230216.133856.564611', 'FOR-011', '040100-220502142301', '040200.230216.133856.560727', 3, 'Aplicaciones desarrolladas y enfocadas específicamenete en nuestros procesos.', 'Agile', '2023-02-13', 'Vigente', 'Riesgo asociado: Disponibilidad y Seguridad de los Sistemas. Cortes de Servicio, caidas de servidores, ataques informáticos…\r\n\r\nOportunidad asociada: Aplicación E2E'),
('040203.230216.133856.564728', 'FOR-012', '040100-220502142301', '040200.230216.133856.560727', 3, 'Implementación de metodologías ágiles en la ejecución de proyectos (AGILE, KANBAN, etc.)', 'Agile', '2023-02-13', 'Vigente', 'Riesgo asociado: Disponibilidad y Seguridad de los Sistemas. Cortes de Servicio, caidas de servidores, ataques informáticos…\r\n\r\nOportunidad asociada: Aplicación E2E'),
('040203.230216.221206.262845', 'FOR-001', '040100-220502142301', '040200.230216.221206.259362', 3, 'Amplia experiencia en el sector Defensa', '', '', 'Vigente', ''),
('040203.230216.221206.263031', 'FOR-002', '040100-220502142301', '040200.230216.221206.259362', 3, 'Certificación en Requsitos de seguridad: HPS /HSEM/HSES: personal de empresa y establecimiento', '', '', 'Vigente', ''),
('040203.230216.221206.263339', 'FOR-003', '040100-220502142301', '040200.230216.221206.259362', 3, 'Larga trayectoria empresarial y disponibilidad de capital', '', '', 'Vigente', ''),
('040203.230216.221206.263570', 'FOR-004', '040100-220502142301', '040200.230216.221206.259362', 3, 'Gran experiencia en la operación y soporte de los servicios', '', '', 'Vigente', ''),
('040203.230216.221206.263873', 'FOR-005', '040100-220502142301', '040200.230216.221206.259362', 3, 'Equipos de RRHH multidisciplinares', '', '', 'Vigente', ''),
('040203.230216.221206.264135', 'FOR-006', '040100-220502142301', '040200.230216.221206.259362', 3, 'Funcionalidades exclusivas en los servicios (servicio de voz-datos-móviles y comunicaciones)', '', '', 'Vigente', ''),
('040203.230216.221206.264403', 'FOR-007', '040100-220502142301', '040200.230216.221206.259362', 3, 'Amplia presencia comercial y de explotación', '', '', 'Vigente', ''),
('040203.230216.221206.264849', 'FOR-009', '040100-220502142301', '040200.230216.221206.259362', 3, 'Capacidad para atender grandes demandas', '', '', 'Vigente', ''),
('040203.230216.221206.265069', 'FOR-010', '040100-220502142301', '040200.230216.221206.259362', 3, 'Nombre de marca de empresa ampliamente reconocido', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo asociado: N/A.\r\nOportunidad asociada: Asistir a ferias y/o eventos para resaltar la presencia de Telefónica en el mundo de Defensa'),
('040203.230216.221206.265369', 'FOR-011', '040100-220502142301', '040200.230216.221206.259362', 3, 'Aplicaciones desarrolladas y enfocadas específicamenete en nuestros procesos.', 'Agile', '2023-02-13', 'Vigente', 'Riesgo asociado: Disponibilidad y Seguridad de los Sistemas. Cortes de Servicio, caidas de servidores, ataques informáticos…\r\n\r\nOportunidad asociada: Aplicación E2E'),
('040203.230216.221206.265559', 'FOR-012', '040100-220502142301', '040200.230216.221206.259362', 3, 'Implementación de metodologías ágiles en la ejecución de proyectos (AGILE, KANBAN, etc.)', 'Agile', '2023-02-13', 'Vigente', 'Riesgo asociado: Disponibilidad y Seguridad de los Sistemas. Cortes de Servicio, caidas de servidores, ataques informáticos…\r\n\r\nOportunidad asociada: Aplicación E2E'),
('040204.230216.133856.564848', 'OPO-001', '040100-220502142301', '040200.230216.133856.560727', 4, 'Mercado en crecimiento (incremento presupuesto de la Administración para el Sector Defensa: nuevos concursos)', '', '', 'Vigente', ''),
('040204.230216.133856.564967', 'OPO-002', '040100-220502142301', '040200.230216.133856.560727', 4, 'Incrementar la productividad de los empleados (racionalización de actividades, perfil multidisciplinar estructura convergente TdE_TSOL en el área de Defensa...)', '', '', 'Vigente', ''),
('040204.230216.133856.565084', 'OPO-003', '040100-220502142301', '040200.230216.133856.560727', 4, 'Extender la experiencia en explotación, gestión s/ la Norma PECAL a otras áreas del Grupo Telefónica (ej pliegos de móviles solicitados por el Ministerio de Defensa)', '', '', 'Vigente', ''),
('040204.230216.133856.565203', 'OPO-004', '040100-220502142301', '040200.230216.133856.560727', 4, 'Certificar al personal en las tecnologías y software y hardware base con los que se presta el servicio (Formación según las necesidades de requisitos del Cliente: ej CISCO, ISO 20000, ITIL…)', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo asociado: Inversión económica\r\nOportunidad asociada: \r\n- Nuevas jornadas de formación al personal\r\n- Píldoras informativas, para acercar más la calidad a ingeniería'),
('040204.230216.133856.565321', 'OPO-005', '040100-220502142301', '040200.230216.133856.560727', 4, 'Creación de nuevas aplicaciones/herramientas para agilizar nuestros procesos', 'Agile', '2023-02-13', 'Vigente', 'Riesgo asociado: Inversión económica\r\nOportunidad asociada: \r\n- Aplicación 2E2.\r\n- Mejora de la comunicación entre los departamentos.'),
('040204.230216.221206.265757', 'OPO-001', '040100-220502142301', '040200.230216.221206.259362', 4, 'Mercado en crecimiento (incremento presupuesto de la Administración para el Sector Defensa: nuevos concursos)', '', '', 'Vigente', ''),
('040204.230216.221206.265965', 'OPO-002', '040100-220502142301', '040200.230216.221206.259362', 4, 'Incrementar la productividad de los empleados (racionalización de actividades, perfil multidisciplinar estructura convergente TdE_TSOL en el área de Defensa...)', '', '', 'Vigente', ''),
('040204.230216.221206.266146', 'OPO-003', '040100-220502142301', '040200.230216.221206.259362', 4, 'Extender la experiencia en explotación, gestión s/ la Norma PECAL a otras áreas del Grupo Telefónica (ej pliegos de móviles solicitados por el Ministerio de Defensa)', '', '', 'Vigente', ''),
('040204.230216.221206.266327', 'OPO-004', '040100-220502142301', '040200.230216.221206.259362', 4, 'Certificar al personal en las tecnologías y software y hardware base con los que se presta el servicio (Formación según las necesidades de requisitos del Cliente: ej CISCO, ISO 20000, ITIL…)', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo asociado: Inversión económica\r\nOportunidad asociada: \r\n- Nuevas jornadas de formación al personal\r\n- Píldoras informativas, para acercar más la calidad a ingeniería'),
('040204.230216.221206.266507', 'OPO-005', '040100-220502142301', '040200.230216.221206.259362', 4, 'Creación de nuevas aplicaciones/herramientas para agilizar nuestros procesos', 'Agile', '2023-02-13', 'Vigente', 'Riesgo asociado: Inversión económica\r\nOportunidad asociada: \r\n- Aplicación 2E2.\r\n- Mejora de la comunicación entre los departamentos.'),
('040204.230503.120433.550179', 'OPO-001', '040100.230503.100316.653019', '040200.230503.120433.549667', 4, 'matar al dragón', '', '2023-05-03', 'Vigente', ''),
('040204.230503.120733.794632', 'OPO-001', '040100.230503.100316.653019', '040200.230503.120733.793999', 4, 'matar al dragón', '', '2023-05-03', 'Vigente', ''),
('040204.230503.121729.415696', 'OPO-001', '040100.230503.100316.653019', '040200.230503.121729.414644', 4, 'matar al dragón', '', '2023-05-03', 'Vigente', ''),
('040204.230503.121743.855768', 'OPO-001', '040100.230503.100316.653019', '040200.230503.121743.855134', 4, 'matar al dragón', '', '2023-05-03', 'Vigente', ''),
('040204.230503.121815.910268', 'OPO-001', '040100.230503.100316.653019', '040200.230503.121815.909659', 4, 'matar al dragón', '', '2023-05-03', 'Vigente', ''),
('040204.230503.121825.417003', 'OPO-001', '040100.230503.100316.653019', '040200.230503.121825.416447', 4, 'matar al dragón', '', '2023-05-03', 'Vigente', ''),
('040204.230503.121839.528087', 'OPO-001', '040100.230503.100316.653019', '040200.230503.121839.527209', 4, 'matar al dragón', '', '2023-05-03', 'Vigente', ''),
('040204.230503.121941.207914', 'OPO-001', '040100.230503.100316.653019', '040200.230503.121941.207337', 4, 'matar al dragón', '', '2023-05-03', 'Vigente', ''),
('040204.230503.121951.580824', 'OPO-001', '040100.230503.100316.653019', '040200.230503.121951.580270', 4, 'matar al dragón', '', '2023-05-03', 'Vigente', ''),
('040204.230503.122046.782588', 'OPO-001', '040100.230503.100316.653019', '040200.230503.122046.780828', 4, 'matar al dragón', '', '2023-05-03', 'Vigente', ''),
('040204.230503.122128.324505', 'OPO-001', '040100.230503.100316.653019', '040200.230503.122128.323859', 4, 'matar al dragón', '', '2023-05-03', 'Vigente', ''),
('040204.230503.122146.403529', 'OPO-001', '040100.230503.100316.653019', '040200.230503.122146.399120', 4, 'matar al dragón', '', '2023-05-03', 'Vigente', ''),
('040204.230503.122154.652234', 'OPO-001', '040100.230503.100316.653019', '040200.230503.122154.651791', 4, 'matar al dragón', '', '2023-05-03', 'Vigente', ''),
('040204.230503.122200.643489', 'OPO-001', '040100.230503.100316.653019', '040200.230503.122200.642938', 4, 'matar al dragón', '', '2023-05-03', 'Vigente', ''),
('040204.230503.122209.957330', 'OPO-001', '040100.230503.100316.653019', '040200.230503.122209.956370', 4, 'matar al dragón', '', '2023-05-03', 'Vigente', ''),
('040204.230503.122219.959612', 'OPO-001', '040100.230503.100316.653019', '040200.230503.122219.958991', 4, 'matar al dragón', '', '2023-05-03', 'Vigente', ''),
('040204.230503.122254.598949', 'OPO-001', '040100.230503.100316.653019', '040200.230503.122254.598295', 4, 'matar al dragón', '', '2023-05-03', 'Vigente', ''),
('040204.230503.122302.162997', 'OPO-001', '040100.230503.100316.653019', '040200.230503.122302.161993', 4, 'matar al dragón', '', '2023-05-03', 'Vigente', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `04_analisisdafo_tipos`
--

CREATE TABLE `04_analisisdafo_tipos` (
  `id` int NOT NULL,
  `tipo` varchar(27) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `04_analisisdafo_tipos`
--

INSERT INTO `04_analisisdafo_tipos` (`id`, `tipo`) VALUES
(1, 'Debilidad (DAFO)'),
(2, 'Amenaza (DAFO)'),
(3, 'Fortaleza (DAFO)'),
(4, 'Oportunidad (DAFO)');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `04_analisiscontexto`
--
ALTER TABLE `04_analisiscontexto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `04_analisiscontexto_revisiones`
--
ALTER TABLE `04_analisiscontexto_revisiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `04_analisiscontexto_tipos`
--
ALTER TABLE `04_analisiscontexto_tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `04_analisisdafo`
--
ALTER TABLE `04_analisisdafo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `04_analisisdafo_historico`
--
ALTER TABLE `04_analisisdafo_historico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `04_analisisdafo_tipos`
--
ALTER TABLE `04_analisisdafo_tipos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `04_analisiscontexto_tipos`
--
ALTER TABLE `04_analisiscontexto_tipos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `04_analisisdafo_tipos`
--
ALTER TABLE `04_analisisdafo_tipos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Base de datos: `04_partesinteresadas`
--
CREATE DATABASE IF NOT EXISTS `04_partesinteresadas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `04_partesinteresadas`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `04_partesinteresadas`
--

CREATE TABLE `04_partesinteresadas` (
  `id` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `codigo_interno` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `contenedor` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '040300-20221219000000',
  `tipo` int NOT NULL,
  `denominador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fechaDeteccion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `estado` varchar(8) NOT NULL,
  `comentarios` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `04_partesinteresadas`
--

INSERT INTO `04_partesinteresadas` (`id`, `codigo_interno`, `contenedor`, `tipo`, `denominador`, `fechaDeteccion`, `estado`, `comentarios`) VALUES
('040301-220504143301', 'PII-001', '040300-20221219000000', 1, 'Dirección', '2019-07-01', 'Vigente', ''),
('040301-220504143302', 'PII-002', '040300-20221219000000', 1, 'Procesos y Certificación', '2019-07-01', 'Vigente', ''),
('040301-220504143303', 'PII-003', '040300-20221219000000', 1, 'Área de Ingeniería de Defensa', '2019-07-01', 'Vigente', ''),
('040301-220504143304', 'PII-004', '040300-20221219000000', 1, 'Compras', '2019-07-01', 'Vigente', ''),
('040301-220504143401', 'PII-005', '040300-20221219000000', 1, 'Recursos Humanos', '2019-07-01', 'Vigente', ''),
('040301-220504143402', 'PII-006', '040300-20221219000000', 1, 'Área comercial', '2019-07-01', 'Vigente', ''),
('040301-220504143403', 'PII-007', '040300-20221219000000', 1, 'Ingeniería de cliente', '2019-07-01', 'Vigente', ''),
('040301-220504143404', 'PII-008', '040300-20221219000000', 1, 'Asesoría jurídica', '2019-07-01', 'Vigente', ''),
('040301-220504143405', 'PII-009', '040300-20221219000000', 1, 'Otras áreas de operaciones', '2019-07-01', 'Vigente', 'b'),
('040302-220504143401', 'PIE-001', '040300-20221219000000', 2, 'Representante de Aseguramiento Oficial de la Calidad (RAC)', '2019-07-01', 'Vigente', ''),
('040302-220504143402', 'PIE-002', '040300-20221219000000', 2, 'Proveedores de equipamientos', '2019-07-01', 'Vigente', ''),
('040302-220504143403', 'PIE-003', '040300-20221219000000', 2, 'Oficinas de programa del Ministerio de Defensa', '2019-07-01', 'Vigente', ''),
('040302-220504143501', 'PIE-004', '040300-20221219000000', 2, 'Empresas subcontratadas / Proveedores de servicios', '2019-07-01', 'Vigente', ''),
('040302-220504143502', 'PIE-005', '040300-20221219000000', 2, 'Otros clientes', '2019-07-01', 'Vigente', ''),
('040302-220504143503', 'PIE-006', '040300-20221219000000', 2, 'Administraciones públicas (Local, autonómica y central)', '2019-07-01', 'Vigente', ''),
('040302-230210145743', 'PIE-007', '040300-20221219000000', 2, 'Empresas en UTE', '2023-02-10', '1', ''),
('040302-230210145813', 'PIE-008', '040300-20221219000000', 2, 'Otras empresas del Grupo Telefónica', '2023-02-10', '1', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `04_partesinteresadas_contenedor`
--

CREATE TABLE `04_partesinteresadas_contenedor` (
  `id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codigo_interno` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `denominador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dys` int NOT NULL DEFAULT '0',
  `comentarios` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `04_partesinteresadas_contenedor`
--

INSERT INTO `04_partesinteresadas_contenedor` (`id`, `codigo_interno`, `denominador`, `dys`, `comentarios`) VALUES
('040300-20221219000000', 'EPI-001', 'Partes interesadas de Telefónica DyS', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `04_partesinteresadas_historico`
--

CREATE TABLE `04_partesinteresadas_historico` (
  `id` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_original` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `codigo_interno` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tipo` int NOT NULL,
  `denominador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `revision` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fechaDeteccion` date NOT NULL,
  `estado` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `comentarios` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `04_partesinteresadas_historico`
--

INSERT INTO `04_partesinteresadas_historico` (`id`, `id_original`, `codigo_interno`, `tipo`, `denominador`, `revision`, `fechaDeteccion`, `estado`, `comentarios`) VALUES
('040401.230215.175841.247552', '', 'PII-001', 1, 'Dirección', '040400.230215.175841.246996', '2019-07-01', 'Vigente', ''),
('040401.230215.175841.247795', '', 'PII-002', 1, 'Procesos y Certificación', '040400.230215.175841.246996', '2019-07-01', 'Vigente', ''),
('040401.230215.175841.248017', '', 'PII-003', 1, 'Área de Ingeniería de Defensa', '040400.230215.175841.246996', '2019-07-01', 'Vigente', ''),
('040401.230215.175841.248233', '', 'PII-004', 1, 'Compras', '040400.230215.175841.246996', '2019-07-01', 'Vigente', ''),
('040401.230215.175841.248442', '', 'PII-005', 1, 'Recursos Humanos', '040400.230215.175841.246996', '2019-07-01', 'Vigente', ''),
('040401.230215.175841.248676', '', 'PII-006', 1, 'Área comercial', '040400.230215.175841.246996', '2019-07-01', 'Vigente', ''),
('040401.230215.175841.248832', '', 'PII-007', 1, 'Ingeniería de cliente', '040400.230215.175841.246996', '2019-07-01', 'Vigente', ''),
('040401.230215.175841.248979', '', 'PII-008', 1, 'Asesoría jurídica', '040400.230215.175841.246996', '2019-07-01', 'Vigente', ''),
('040401.230215.175841.249208', '', 'PII-009', 1, 'Otras áreas de operaciones', '040400.230215.175841.246996', '2019-07-01', 'Vigente', 'b'),
('040401.230215.175958.818599', '040401.230215.175958.818599', 'PII-001', 1, 'Dirección', '040400.230215.175958.817202', '2019-07-01', 'Vigente', ''),
('040401.230215.175958.818804', '040401.230215.175958.818804', 'PII-002', 1, 'Procesos y Certificación', '040400.230215.175958.817202', '2019-07-01', 'Vigente', ''),
('040401.230215.175958.818980', '040401.230215.175958.818980', 'PII-003', 1, 'Área de Ingeniería de Defensa', '040400.230215.175958.817202', '2019-07-01', 'Vigente', ''),
('040401.230215.175958.819162', '040401.230215.175958.819162', 'PII-004', 1, 'Compras', '040400.230215.175958.817202', '2019-07-01', 'Vigente', ''),
('040401.230215.175958.819344', '040401.230215.175958.819344', 'PII-005', 1, 'Recursos Humanos', '040400.230215.175958.817202', '2019-07-01', 'Vigente', ''),
('040401.230215.175958.819524', '040401.230215.175958.819524', 'PII-006', 1, 'Área comercial', '040400.230215.175958.817202', '2019-07-01', 'Vigente', ''),
('040401.230215.175958.819703', '040401.230215.175958.819703', 'PII-007', 1, 'Ingeniería de cliente', '040400.230215.175958.817202', '2019-07-01', 'Vigente', ''),
('040401.230215.175958.819878', '040401.230215.175958.819878', 'PII-008', 1, 'Asesoría jurídica', '040400.230215.175958.817202', '2019-07-01', 'Vigente', ''),
('040401.230215.175958.820057', '040401.230215.175958.820057', 'PII-009', 1, 'Otras áreas de operaciones', '040400.230215.175958.817202', '2019-07-01', 'Vigente', 'b'),
('040401.230215.180204.548346', '040301-220504143301', 'PII-001', 1, 'Dirección', '040400.230215.180204.547842', '2019-07-01', 'Vigente', ''),
('040401.230215.180204.548547', '040301-220504143302', 'PII-002', 1, 'Procesos y Certificación', '040400.230215.180204.547842', '2019-07-01', 'Vigente', ''),
('040401.230215.180204.548726', '040301-220504143303', 'PII-003', 1, 'Área de Ingeniería de Defensa', '040400.230215.180204.547842', '2019-07-01', 'Vigente', ''),
('040401.230215.180204.548862', '040301-220504143304', 'PII-004', 1, 'Compras', '040400.230215.180204.547842', '2019-07-01', 'Vigente', ''),
('040401.230215.180204.549035', '040301-220504143401', 'PII-005', 1, 'Recursos Humanos', '040400.230215.180204.547842', '2019-07-01', 'Vigente', ''),
('040401.230215.180204.549212', '040301-220504143402', 'PII-006', 1, 'Área comercial', '040400.230215.180204.547842', '2019-07-01', 'Vigente', ''),
('040401.230215.180204.549388', '040301-220504143403', 'PII-007', 1, 'Ingeniería de cliente', '040400.230215.180204.547842', '2019-07-01', 'Vigente', ''),
('040401.230215.180204.549564', '040301-220504143404', 'PII-008', 1, 'Asesoría jurídica', '040400.230215.180204.547842', '2019-07-01', 'Vigente', ''),
('040401.230215.180204.549740', '040301-220504143405', 'PII-009', 1, 'Otras áreas de operaciones', '040400.230215.180204.547842', '2019-07-01', 'Vigente', 'b'),
('040402.230215.175841.249435', '', 'PIE-001', 2, 'Representante de Aseguramiento Oficial de la Calidad (RAC)', '040400.230215.175841.246996', '2019-07-01', 'Vigente', ''),
('040402.230215.175841.249659', '', 'PIE-002', 2, 'Proveedores de equipamientos', '040400.230215.175841.246996', '2019-07-01', 'Vigente', ''),
('040402.230215.175841.249885', '', 'PIE-003', 2, 'Oficinas de programa del Ministerio de Defensa', '040400.230215.175841.246996', '2019-07-01', 'Vigente', ''),
('040402.230215.175841.250112', '', 'PIE-004', 2, 'Empresas subcontratadas / Proveedores de servicios', '040400.230215.175841.246996', '2019-07-01', 'Vigente', ''),
('040402.230215.175841.250338', '', 'PIE-005', 2, 'Otros clientes', '040400.230215.175841.246996', '2019-07-01', 'Vigente', ''),
('040402.230215.175841.250562', '', 'PIE-006', 2, 'Administraciones públicas (Local, autonómica y central)', '040400.230215.175841.246996', '2019-07-01', 'Vigente', ''),
('040402.230215.175841.250786', '', 'PIE-007', 2, 'Empresas en UTE', '040400.230215.175841.246996', '2023-02-10', '1', ''),
('040402.230215.175841.251009', '', 'PIE-008', 2, 'Otras empresas del Grupo Telefónica', '040400.230215.175841.246996', '2023-02-10', '1', ''),
('040402.230215.175958.820250', '040402.230215.175958.820250', 'PIE-001', 2, 'Representante de Aseguramiento Oficial de la Calidad (RAC)', '040400.230215.175958.817202', '2019-07-01', 'Vigente', ''),
('040402.230215.175958.820433', '040402.230215.175958.820433', 'PIE-002', 2, 'Proveedores de equipamientos', '040400.230215.175958.817202', '2019-07-01', 'Vigente', ''),
('040402.230215.175958.820620', '040402.230215.175958.820620', 'PIE-003', 2, 'Oficinas de programa del Ministerio de Defensa', '040400.230215.175958.817202', '2019-07-01', 'Vigente', ''),
('040402.230215.175958.820802', '040402.230215.175958.820802', 'PIE-004', 2, 'Empresas subcontratadas / Proveedores de servicios', '040400.230215.175958.817202', '2019-07-01', 'Vigente', ''),
('040402.230215.175958.820969', '040402.230215.175958.820969', 'PIE-005', 2, 'Otros clientes', '040400.230215.175958.817202', '2019-07-01', 'Vigente', ''),
('040402.230215.175958.821126', '040402.230215.175958.821126', 'PIE-006', 2, 'Administraciones públicas (Local, autonómica y central)', '040400.230215.175958.817202', '2019-07-01', 'Vigente', ''),
('040402.230215.175958.821278', '040402.230215.175958.821278', 'PIE-007', 2, 'Empresas en UTE', '040400.230215.175958.817202', '2023-02-10', '1', ''),
('040402.230215.175958.821424', '040402.230215.175958.821424', 'PIE-008', 2, 'Otras empresas del Grupo Telefónica', '040400.230215.175958.817202', '2023-02-10', '1', ''),
('040402.230215.180204.549875', '040302-220504143401', 'PIE-001', 2, 'Representante de Aseguramiento Oficial de la Calidad (RAC)', '040400.230215.180204.547842', '2019-07-01', 'Vigente', ''),
('040402.230215.180204.550045', '040302-220504143402', 'PIE-002', 2, 'Proveedores de equipamientos', '040400.230215.180204.547842', '2019-07-01', 'Vigente', ''),
('040402.230215.180204.550221', '040302-220504143403', 'PIE-003', 2, 'Oficinas de programa del Ministerio de Defensa', '040400.230215.180204.547842', '2019-07-01', 'Vigente', ''),
('040402.230215.180204.550397', '040302-220504143501', 'PIE-004', 2, 'Empresas subcontratadas / Proveedores de servicios', '040400.230215.180204.547842', '2019-07-01', 'Vigente', ''),
('040402.230215.180204.550578', '040302-220504143502', 'PIE-005', 2, 'Otros clientes', '040400.230215.180204.547842', '2019-07-01', 'Vigente', ''),
('040402.230215.180204.550754', '040302-220504143503', 'PIE-006', 2, 'Administraciones públicas (Local, autonómica y central)', '040400.230215.180204.547842', '2019-07-01', 'Vigente', ''),
('040402.230215.180204.550890', '040302-230210145743', 'PIE-007', 2, 'Empresas en UTE', '040400.230215.180204.547842', '2023-02-10', '1', ''),
('040402.230215.180204.551059', '040302-230210145813', 'PIE-008', 2, 'Otras empresas del Grupo Telefónica', '040400.230215.180204.547842', '2023-02-10', '1', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `04_partesinteresadas_revisiones`
--

CREATE TABLE `04_partesinteresadas_revisiones` (
  `id` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codigo_interno` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `denominador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contenedor` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `revision` int NOT NULL,
  `fecha` date DEFAULT NULL,
  `comentarios` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `04_partesinteresadas_revisiones`
--

INSERT INTO `04_partesinteresadas_revisiones` (`id`, `codigo_interno`, `denominador`, `contenedor`, `revision`, `fecha`, `comentarios`) VALUES
('040400.230215.175841.246996', 'EPI-001', 'Revisión 1 de las partes interesadas - 2023-02-15', '040300-20221219000000', 1, '2023-02-15', ''),
('040400.230215.175958.817202', 'EPI-001', 'Revisión 2 de las partes interesadas - 2023-02-15', '040300-20221219000000', 2, '2023-02-15', ''),
('040400.230215.180204.547842', 'EPI-001', 'Revisión 3 de las partes interesadas - 2023-02-15', '040300-20221219000000', 3, '2023-02-15', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `04_partesinteresadas_tipos`
--

CREATE TABLE `04_partesinteresadas_tipos` (
  `id` int NOT NULL,
  `tipo` varchar(27) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `04_partesinteresadas_tipos`
--

INSERT INTO `04_partesinteresadas_tipos` (`id`, `tipo`) VALUES
(1, 'Parte Interesada Interna'),
(2, 'Parte Interesada Externa');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `04_partesinteresadas`
--
ALTER TABLE `04_partesinteresadas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `04_partesinteresadas_contenedor`
--
ALTER TABLE `04_partesinteresadas_contenedor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `04_partesinteresadas_historico`
--
ALTER TABLE `04_partesinteresadas_historico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `04_partesinteresadas_revisiones`
--
ALTER TABLE `04_partesinteresadas_revisiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `04_partesinteresadas_tipos`
--
ALTER TABLE `04_partesinteresadas_tipos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `04_partesinteresadas_tipos`
--
ALTER TABLE `04_partesinteresadas_tipos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Base de datos: `04_procesos`
--
CREATE DATABASE IF NOT EXISTS `04_procesos` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `04_procesos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `04_procesos`
--

CREATE TABLE `04_procesos` (
  `id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codigo_interno` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `denominador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `juridica` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado` int NOT NULL,
  `href` varchar(1500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `comentarios` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `04_procesos`
--

INSERT INTO `04_procesos` (`id`, `codigo_interno`, `denominador`, `juridica`, `estado`, `href`, `comentarios`) VALUES
('040600.220509.143501.285599', 'P728', 'Gestión de la Calidad de DyS', 'TdE', 0, '', ''),
('040600.220509.143601.285599', 'P801', 'Gestión del Riesgo en proyectos del sector DyS', 'DyS', 1, 'https://telefonica-pp103514.boc-cloud.com?repoid=903a409f-9cfa-45e4-9592-144fb26d4847&id=20608f26-2c2b-4382-ae99-b1eca17cb675&libObjID=aee098ea-071d-4150-8ce9-011eaf93643f&at=1&t=view&vt=graphical&scenarioID=mfb_bpms_reader&lang=es', ''),
('040600.220509.143602.285599', 'P808', 'Gestión de la Configuración sector DyS', 'DyS', 1, 'https://telefonica-pp103514.boc-cloud.com?repoid=903a409f-9cfa-45e4-9592-144fb26d4847&id=b03bc2b7-4fa0-4f24-a0ee-7fff8ebaf8a4&libObjID=aee098ea-071d-4150-8ce9-011eaf93643f&at=1&t=view&vt=graphical&scenarioID=mfb_bpms_reader&lang=es', ''),
('040600.220509.143603.285599', 'P851', 'Control del Diseño y Desarrollo de DyS', 'DyS', 1, 'https://telefonica-pp103514.boc-cloud.com?repoid=903a409f-9cfa-45e4-9592-144fb26d4847&id=e5b349b1-0094-4331-ac8f-676bc21fd988&libObjID=aee098ea-071d-4150-8ce9-011eaf93643f&at=1&t=view&vt=graphical&scenarioID=mfb_bpms_reader&lang=es', ''),
('040600.220509.143604.285599', 'S101', 'Control del Diseño y Desarrollo DyS', 'DyS', 0, '', ''),
('040600.220509.143605.285599', 'P911', 'Gestionar la calidad', 'TdE', 1, 'https://telefonica-pp103514.boc-cloud.com?repoid=903a409f-9cfa-45e4-9592-144fb26d4847&id=82e86840-7745-4e66-b992-ed55122650fa&libObjID=aee098ea-071d-4150-8ce9-011eaf93643f&at=1&t=view&vt=graphical&scenarioID=mfb_bpms_reader&lang=es', ''),
('040600.220509.143606.285599', 'P874', 'Gestión de las compras', 'TdE', 1, 'https://telefonica-pp103514.boc-cloud.com?repoid=903a409f-9cfa-45e4-9592-144fb26d4847&id=526bcdb8-fff5-477f-8619-eaf1174c923d&libObjID=aee098ea-071d-4150-8ce9-011eaf93643f&at=1&t=view&vt=graphical&scenarioID=mfb_bpms_reader&lang=es', ''),
('040600.220509.143607.285599', 'P862', 'Evaluación de proveedores', 'TdE', 1, 'https://telefonica-pp103514.boc-cloud.com?repoid=903a409f-9cfa-45e4-9592-144fb26d4847&id=beef35f3-5a3b-4184-94e9-e5a60569b5b4&libObjID=aee098ea-071d-4150-8ce9-011eaf93643f&at=1&t=view&vt=graphical&scenarioID=mfb_bpms_reader&lang=es', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `04_procesos`
--
ALTER TABLE `04_procesos`
  ADD PRIMARY KEY (`id`);
--
-- Base de datos: `05_liderazgo`
--
CREATE DATABASE IF NOT EXISTS `05_liderazgo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `05_liderazgo`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `05_comite`
--

CREATE TABLE `05_comite` (
  `id` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `codigo_interno` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `denominador` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `personal` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `05_comite`
--

INSERT INTO `05_comite` (`id`, `codigo_interno`, `denominador`, `personal`) VALUES
('050300.230503.182000.311101', '', 'Director de Ingeniería y Desarrollo de Negocio', '070501-221011134101'),
('050300.230503.182000.311102', '', 'Gerente de Ingeniería Defensa', '070501-221011134102'),
('050300.230503.182000.311103', '', 'Jefe de Control Gestión de Recursos', '070501-221011134103'),
('050300.230503.182000.311104', '', 'Representante de Calidad', '070501.230224.090000.000001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `05_politica`
--

CREATE TABLE `05_politica` (
  `id` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codigo_interno` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `denominador` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `05_politica`
--

INSERT INTO `05_politica` (`id`, `codigo_interno`, `tipo`, `denominador`, `fecha`) VALUES
('050100-220628144001', 'POL-001', 'Política de calidad y de PECAL', 'Poner las necesidades del cliente en el centro de todo lo que hacemos, para lograr su máxima satisfacción con nuestros servicios y soluciones.', '2022-06-28'),
('050100-220628144002', 'POL-002', 'Política de gestión ambiental', 'La Política Ambiental Global de Telefónica está a disposición de las partes interesadas.\n\nTelefónica de España adopta como Política Ambiental la Política Ambiental del Grupo Telefónica. Ésta ha sido diseñada conforme a la Norma internacional UNE-EN ISO 14001, y es de aplicación a todas las empresas del Grupo, con independencia de la ubicación geográfica o la actividad de la empresa, ya que se trabaja bajo la premisa de la mejora continua, partiendo del cumplimiento de la legislación vigente y los compromisos voluntarios suscritos por Telefónica en materia ambiental.\n\nEn Telefónica creemos en el poder de la tecnología digital para ofrecer nuevas oportunidades a las personas y transformar la sociedad de manera positiva. Por tanto, la Política Ambiental tiene un doble propósito. No sólo trabajamos para minimizar nuestro impacto sobre el medio ambiente, a través una menor huella sobre el entorno; sino que nos basamos en la capacidad de nuestra tecnología para crear nuevas oportunidades para el desarrollo sostenible, las Tecnologías de la Información y las Comunicaciones (TIC) permiten a nuestros clientes ser más eco-eficientes y respetuosos con el medio ambiente.\n\nLa Política Ambiental del Grupo Telefónica establece las líneas de actuación y el compromiso en materia ambiental de todas las empresas, unidades de negocio y empleados que forman la Compañía, está disponible en la Web Corporativa y en la Intranet Corporativa.', '2022-06-28');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `05_comite`
--
ALTER TABLE `05_comite`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `05_politica`
--
ALTER TABLE `05_politica`
  ADD PRIMARY KEY (`id`);
--
-- Base de datos: `06_objetivos`
--
CREATE DATABASE IF NOT EXISTS `06_objetivos` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `06_objetivos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `06_objetivos`
--

CREATE TABLE `06_objetivos` (
  `id` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
--
-- Base de datos: `06_planesaccion`
--
CREATE DATABASE IF NOT EXISTS `06_planesaccion` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `06_planesaccion`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `06_planesaccion`
--

CREATE TABLE `06_planesaccion` (
  `id` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codigo_interno` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `denominador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `responsable` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `origen` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `estado` int NOT NULL,
  `fechaInicio` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fechaFinPrevisto` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fechaFin` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `recursos` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `comentarios` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `06_planesaccion`
--

INSERT INTO `06_planesaccion` (`id`, `codigo_interno`, `denominador`, `responsable`, `descripcion`, `origen`, `estado`, `fechaInicio`, `fechaFinPrevisto`, `fechaFin`, `recursos`, `comentarios`) VALUES
('060401.230608.132330.460623', 'PAS-23-001', 'Informar a la dirección y al a gerencia, y vigilar el riesgo', '070501.230224.090000.000001', '', 'Riesgos y Oportunidades de proceso', 2, '2021-01-21', '2030-12-31', '', 'N/A', ''),
('060401.230608.132515.343072', 'PAS-23-002', 'Creación de la biblioteca de riesgos unificada', '070501-221011134106', '', 'Proyecto de mejora PMC-23-001', 3, '2022-03-04', '2022-04-10', '2022-04-22', 'Informáticos', ''),
('060401.230608.132941.319239', 'PAS-23-003', 'Estudio de desarrollo de aplicación E2E', '070501.230224.090000.000001', '', '', 2, '2022-06-28', '2023-12-31', '', 'N/A', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `06_planesaccion_acciones`
--

CREATE TABLE `06_planesaccion_acciones` (
  `id` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codigo_interno` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `denominador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fechaInicio` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fechaFinPrevisto` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fechaFin` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `responsable` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `planAccion` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `comentarios` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `06_planesaccion_acciones`
--

INSERT INTO `06_planesaccion_acciones` (`id`, `codigo_interno`, `denominador`, `fechaInicio`, `fechaFinPrevisto`, `fechaFin`, `responsable`, `planAccion`, `comentarios`) VALUES
('060402.230608.133045.259848', 'ACC-001', 'Inicio del estudio para el desarrollo de la aplicación E2E', '2022-06-28', '', '', '070501.230224.090000.000001', '060401.230608.132941.319239', ''),
('060402.230608.133117.834082', 'ACC-002', 'Continúa el estudio para el desarrollo de la aplicación 2E2', '2023-01-26', '', '', '070501.230224.090000.000001', '060401.230608.132941.319239', ''),
('060402.230608.133639.837148', 'ACC-001', 'Comunicado de las medidas propuestas a Paco Molina', '2019-01-21', '2019-01-21', '2019-01-21', '070501.230224.090000.000001', '060401.230608.132330.460623', ''),
('060402.230608.133738.970687', 'ACC-002', 'Paco Molina da la aprobación de las medidas propuestas', '2019-01-30', '2019-01-30', '2019-01-30', '070501.230224.090000.000001', '060401.230608.132330.460623', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `06_planesaccion_estados`
--

CREATE TABLE `06_planesaccion_estados` (
  `id` int NOT NULL,
  `estado` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `06_planesaccion_estados`
--

INSERT INTO `06_planesaccion_estados` (`id`, `estado`) VALUES
(1, 'Desestimado'),
(2, 'En proceso'),
(3, 'Finalizado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `06_tareascirculares`
--

CREATE TABLE `06_tareascirculares` (
  `id` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codigo_interno` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `denominador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `responsable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `origen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFinPrevisto` date NOT NULL,
  `fechaFin` date DEFAULT NULL,
  `recursos` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `comentarios` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `06_tareascirculares`
--

INSERT INTO `06_tareascirculares` (`id`, `codigo_interno`, `denominador`, `responsable`, `descripcion`, `origen`, `estado`, `fechaInicio`, `fechaFinPrevisto`, `fechaFin`, `recursos`, `comentarios`) VALUES
('060403-220701144101', 'TAR-001', 'Revisar Indicadores', '070501-220711141902', 'N/A', 'Indicadores', 'Aprovechado y en proceso', '2022-07-01', '2022-07-31', NULL, 'Calidad', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `06_planesaccion`
--
ALTER TABLE `06_planesaccion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `06_planesaccion_acciones`
--
ALTER TABLE `06_planesaccion_acciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `06_planesaccion_estados`
--
ALTER TABLE `06_planesaccion_estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `06_tareascirculares`
--
ALTER TABLE `06_tareascirculares`
  ADD PRIMARY KEY (`id`);
--
-- Base de datos: `06_proyectosmejora`
--
CREATE DATABASE IF NOT EXISTS `06_proyectosmejora` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `06_proyectosmejora`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `06_proyectosmejora`
--

CREATE TABLE `06_proyectosmejora` (
  `id` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codigo_interno` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `denominador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `origen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `estado` int NOT NULL,
  `fechaDeteccion` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `comentarios` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `06_proyectosmejora`
--

INSERT INTO `06_proyectosmejora` (`id`, `codigo_interno`, `denominador`, `origen`, `estado`, `fechaDeteccion`, `comentarios`) VALUES
('060500.230608.132515.335877', 'PMC-23-001', 'Creación de la biblioteca de riesgos unificada', 'Riesgos y Oportunidades de proceso', 4, '2023-06-08', 'Antigua PM-023');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `06_proyectosmejora_estados`
--

CREATE TABLE `06_proyectosmejora_estados` (
  `id` int NOT NULL,
  `estado` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `06_proyectosmejora_estados`
--

INSERT INTO `06_proyectosmejora_estados` (`id`, `estado`) VALUES
(1, 'No aprovechado'),
(2, 'En estudio'),
(3, 'Aprovechado y en proceso'),
(4, 'Aprovechado y finalizado'),
(5, 'Planeado para el futuro');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `06_proyectosmejora`
--
ALTER TABLE `06_proyectosmejora`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `06_proyectosmejora_estados`
--
ALTER TABLE `06_proyectosmejora_estados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `06_proyectosmejora_estados`
--
ALTER TABLE `06_proyectosmejora_estados`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Base de datos: `06_riesgosoportunidades`
--
CREATE DATABASE IF NOT EXISTS `06_riesgosoportunidades` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `06_riesgosoportunidades`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `06_riesgosoportunidades`
--

CREATE TABLE `06_riesgosoportunidades` (
  `id` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codigo_interno` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `denominador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipo` int NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contenedor` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '060100.230606.121511.947678',
  `fecha_deteccion` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `decision` int DEFAULT NULL,
  `justificacion` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `estado` int NOT NULL,
  `fecha_cierre` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `comentarios` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `06_riesgosoportunidades`
--

INSERT INTO `06_riesgosoportunidades` (`id`, `codigo_interno`, `denominador`, `tipo`, `descripcion`, `contenedor`, `fecha_deteccion`, `decision`, `justificacion`, `estado`, `fecha_cierre`, `comentarios`) VALUES
('060101.230608.132033.804701', 'RSG-001', 'RP-01 - Sistemas de información', 1, 'Disponibilidad y Seguridad de los Sistemas. Cortes de Servicio, caídas de servidores, ataques informáticos…', '060100.230606.121511.947678', '2019-01-30', 3, 'Al principio, el riesgo se asumió al tener un único recurso que se ocupe de la red de defensa, se asume el riesgo, manteniendolo en observación.\r\n\r\nPara la aplicación de gestión documental de TSOL existe un contrato de mantenimiento.\r\n\r\nTras la pandemia, Debido a la situación producida por el COVID19 que obliga a teletrabajar de forma mayoritaria y a la reciente acreditación del sistema de información, se hace imprescindible minimizar el riesgo. Para la aplicación de gestión documental de TSOL se mantiene el  contrato de mantenimiento.', 2, '2019-07-02', 'Antiguos R-01, R-02, R-03, R-04 Y R-05.'),
('060101.230608.132033.804702', 'RSG-002', 'RP-02 - Falta de información para detección de riesgos del proyecto', 1, 'La dificultad para conocer el contexto en el que se desarrollan los proyectos complica la identificación y gestión de los riesgos del proyecto', '060100.230606.121511.947678', '2021-01-21', 3, 'La variedad de proyectos y clientes dentro de Defensa, con diversas peculiaridades hace imposible establecer un contexto común para el desarrollo de los proyectos. ', 1, '', 'Antiguo R-07.'),
('060102.230608.134244.991534', 'OPO-001', 'Automatización (Riesgos)', 2, 'Automatización de la gestión de riesgos.', '060100.230606.121511.947678', '2019-01-30', 5, 'TSol/TdE: Disponibilidad de recursos y necesidad.', 2, '', 'Antiguo O-01'),
('060102.230608.134244.991535', 'OPO-002', 'Automatización (Configuración)', 2, 'Automatización de la gestión de configuración.', '060100.230606.121511.947678', '2019-01-30', 6, 'Con los recursos actuales no hay capacidad para acometer esta oportunidad.', 1, '', 'Antigua O-02'),
('060102.230608.134244.991536', 'OPO-003', 'Unificación', 2, 'Unificación del proceso TdE y TSOL', '060100.230606.121511.947678', '2019-01-30', 7, 'Depende de la unificación de los  SIG por parte de  PROCESOS y CERTIFICACIÓN', 2, '2019-07-02', 'Antigua O-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `06_riesgosoportunidades_contenedor`
--

CREATE TABLE `06_riesgosoportunidades_contenedor` (
  `id` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codigo_interno` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `denominador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `comentarios` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `06_riesgosoportunidades_contenedor`
--

INSERT INTO `06_riesgosoportunidades_contenedor` (`id`, `codigo_interno`, `denominador`, `comentarios`) VALUES
('060100.230606.121511.947678', 'RYO-001', 'Riesgos y Oportunidades de Proceso de DyS', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `06_riesgosoportunidades_decisiones`
--

CREATE TABLE `06_riesgosoportunidades_decisiones` (
  `id` int NOT NULL,
  `decision` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipo` int NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `06_riesgosoportunidades_decisiones`
--

INSERT INTO `06_riesgosoportunidades_decisiones` (`id`, `decision`, `tipo`, `descripcion`) VALUES
(1, 'Evitar', 1, 'Elimina el riesgo de raiz.'),
(2, 'Transferir', 1, 'Transfiere el riesgo a otra área o empresa.'),
(3, 'Reducir', 1, 'Minimiza la vulnerabilidad o el impacto del riesgo.'),
(4, 'Asumir', 1, 'No se realiza ninguna acción, y se asumen las consecuencias del riesgo.'),
(5, 'Aprovechar', 2, 'La oportunidad es beneficiosa y puede llevarse a cabo.'),
(6, 'No aprovechar', 2, 'La oportunidad no es beneficiosa o no puede llevarse a cabo.'),
(7, 'Transferir', 2, 'La oportunidad es beneficiosa, pero su ejecución depende de otro área o empresa.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `06_riesgosoportunidades_estados`
--

CREATE TABLE `06_riesgosoportunidades_estados` (
  `id` int NOT NULL,
  `estado` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `06_riesgosoportunidades_estados`
--

INSERT INTO `06_riesgosoportunidades_estados` (`id`, `estado`) VALUES
(1, 'Abierto'),
(2, 'Cerrado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `06_riesgosoportunidades_revisiones`
--

CREATE TABLE `06_riesgosoportunidades_revisiones` (
  `id` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codigo_interno` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `denominador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `revision` int NOT NULL,
  `fecha` date NOT NULL,
  `comentarios` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `06_riesgosoportunidades_tipos`
--

CREATE TABLE `06_riesgosoportunidades_tipos` (
  `id` int NOT NULL,
  `tipo` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `06_riesgosoportunidades_tipos`
--

INSERT INTO `06_riesgosoportunidades_tipos` (`id`, `tipo`) VALUES
(1, 'Riesgo'),
(2, 'Oportunidad');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `06_riesgosoportunidades`
--
ALTER TABLE `06_riesgosoportunidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `06_riesgosoportunidades_contenedor`
--
ALTER TABLE `06_riesgosoportunidades_contenedor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `06_riesgosoportunidades_decisiones`
--
ALTER TABLE `06_riesgosoportunidades_decisiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `06_riesgosoportunidades_estados`
--
ALTER TABLE `06_riesgosoportunidades_estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `06_riesgosoportunidades_revisiones`
--
ALTER TABLE `06_riesgosoportunidades_revisiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `06_riesgosoportunidades_tipos`
--
ALTER TABLE `06_riesgosoportunidades_tipos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `06_riesgosoportunidades_decisiones`
--
ALTER TABLE `06_riesgosoportunidades_decisiones`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `06_riesgosoportunidades_tipos`
--
ALTER TABLE `06_riesgosoportunidades_tipos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Base de datos: `07_comunicados`
--
CREATE DATABASE IF NOT EXISTS `07_comunicados` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `07_comunicados`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `07_comunicados`
--

CREATE TABLE `07_comunicados` (
  `id` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codigo_interno` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `denominador` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipo` int DEFAULT NULL,
  `fecha` date NOT NULL,
  `autor` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `comentarios` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `copete` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `07_comunicados`
--

INSERT INTO `07_comunicados` (`id`, `codigo_interno`, `denominador`, `tipo`, `fecha`, `autor`, `comentarios`, `copete`) VALUES
('070401.120110.170437.969600', 'CQ-2012-001', 'Equipos de Medida', 4, '2012-01-10', '', 'CQ-000', ''),
('070401.120111.170437.969601', 'CDQ-12-002', 'Gestión de la Configuración', 1, '2012-01-11', '', 'CQ-001', ''),
('070401.120126.170437.969602', 'CDQ-12-003', 'Registro Equipos de Medida', 4, '2012-01-26', '', 'CQ-002', ''),
('070401.120213.170437.969603', 'CDQ-12-004', 'Comunicado cambios organizativos', 1, '2012-02-13', '', 'CQ-003', ''),
('070401.120220.170437.969604', 'CDQ-12-005', 'Base de datos No Conformidades/Observaciones', 3, '2012-03-20', '', 'CQ-004', ''),
('070401.120703.170437.969605', 'CDQ-12-006', 'Registros de Calidad', 1, '2012-07-03', '', 'CQ-005', ''),
('070401.120730.170437.969606', 'CDQ-12-007', 'Equipos de medida', 3, '2012-07-30', '', 'CQ-006', ''),
('070401.130430.170437.969607', 'CDQ-13-001', 'Equipos de Medida propiedad de Suministradores', 3, '2013-04-30', '', 'CQ-007', ''),
('070401.130507.170437.969608', 'CDQ-13-002', 'Acción Correctiva - PVV Equipos de Medida (NC0042)', 3, '2013-05-07', '', 'CQ-008', ''),
('070401.130507.170437.969609', 'CDQ-13-003', 'Puntos de Inspección y de Espera', 1, '2013-05-07', '', 'CQ-009', ''),
('070401.140221.170437.969610', 'CDQ-14-001', 'Cambios en Sistema Integrado de Gestión (SIG)', 1, '2014-02-21', '', 'CQ-010', ''),
('070401.140421.170437.969611', 'CDQ-14-002', 'Indicador de Calidad', 1, '2014-04-21', '', 'CQ-011', ''),
('070401.140422.170437.969612', 'CDQ-14-003', 'Actualización de Documentación Gestión de Configuración', 2, '2014-04-22', '', 'CQ-012', ''),
('070401.140602.170437.969613', 'CDQ-14-004', 'Actualización de Documentación Procedimiento de Control de los Equipos de Inspección, Medición y Ensayo', 2, '2014-06-02', '', 'CQ-013', ''),
('070401.140620.170437.969614', 'CDQ-14-005', 'Equipos de medida fuera de uso', 3, '2014-06-20', '', 'CQ-014', ''),
('070401.140620.170437.969615', 'CDQ-14-006', 'Actualización de Documentación Procedimiento de Control del Diseño y Desarrollo', 2, '2014-06-20', '', 'CQ-015', ''),
('070401.140621.170437.969616', 'CDQ-14-007', 'Equipos calibrados', 3, '2014-06-21', '', 'CQ-016', ''),
('070401.140915.170437.969617', 'CDQ-14-008', 'Actualización documentación: Gestión de los Planes de Calidad y Gestión NC y OB de Proyectos para el área de Defensa', 2, '2014-09-15', '', 'CQ-017', ''),
('070401.140925.170437.969618', 'CDQ-14-009', 'Indicador de Riesgos', 1, '2014-09-25', '', 'CQ-018', ''),
('070401.150114.170437.969619', 'CDQ-15-001', 'Actualización documentación: Guía para la Gestión de Riesgos', 2, '2015-01-14', '', 'CQ-019', ''),
('070401.150318.170437.969620', 'CDQ-15-002', 'Evaluación de Proveedores del área de Defensa', 1, '2015-03-18', '', 'CQ-020', ''),
('070401.150522.170437.969621', 'CDQ-15-003', 'Nuevo Proceso P808 Gestión de la Configuración', 1, '2015-05-22', '', 'CQ-021', ''),
('070401.150522.170437.969622', 'CDQ-15-004', 'Comentarios Auditoría PECAL Externa', 5, '2015-05-22', '', 'CQ-022', ''),
('070401.150601.170437.969623', 'CDQ-15-005', 'Planificación Anual de Calibraciones para 2015', 3, '2015-06-01', '', 'CQ-022B', ''),
('070401.150611.170437.969624', 'CDQ-15-006', 'Documentación modificada', 2, '2015-06-11', '', 'CQ-023', ''),
('070401.150616.170437.969625', 'CDQ-15-007', 'Nuevo Proceso de Gestión de la Configuración', 1, '2015-06-16', '', 'CQ-023B', ''),
('070401.150722.170437.969626', 'CDQ-15-008', 'Calibración equipos de medida', 3, '2015-07-22', '', 'CQ-024', ''),
('070401.150811.170437.969627', 'CDQ-15-009', 'Gestión de la Configuración', 1, '2015-08-11', '', 'CQ-025', ''),
('070401.150812.170437.969628', 'CDQ-15-010', 'Planificación Anual de Calibraciones para 2015', 3, '2015-08-12', '', 'CQ-026', ''),
('070401.151021.170437.969629', 'CDQ-15-011', 'Indicadores de Calidad de área de Defensa', 1, '2015-10-21', '', 'CQ-027', ''),
('070401.151202.170437.969630', 'CDQ-15-012', 'Planificación Anual de Calibraciones para 2016', 3, '2015-12-02', '', 'CQ-028', ''),
('070401.160219.170437.969631', 'CDQ-16-001', 'Nueva edición Guía Evaluación de Proveedores del área de Defensa', 2, '2016-02-19', '', 'CQ-029', ''),
('070401.160406.170437.969632', 'CDQ-16-002', 'Nueva edición Gestión de los Planes de Calidad de Defensa', 2, '2016-04-06', '', 'CQ-030', ''),
('070401.160624.170437.969633', 'CDQ-16-003', 'Reparación Multímtreo Fluke 189', 3, '2016-06-24', '', 'CQ-031', ''),
('070401.160718.170437.969634', 'CDQ-16-004', 'Cuestionario de Evaluación de Acción Formativa', 1, '2016-07-18', '', 'CQ-032', ''),
('070401.160928.170437.969635', 'CDQ-16-005', 'Nueva edición de las guías de gestión de riesgos y No Conformidades', 1, '2016-09-28', '', 'CQ-033', ''),
('070401.161227.170437.969636', 'CDQ-16-006', 'Planificación Anual de Calibraciones para 2017', 3, '2016-12-27', '', 'CQ-034', ''),
('070401.161227.170437.969637', 'CDQ-16-007', 'Adjunto al CQ-034', 3, '2016-12-27', '', 'CQ-034B', ''),
('070401.170307.170437.969638', 'CDQ-17-001', 'Solicitud de Catalogación', 1, '2017-03-07', '', 'CQ-035', ''),
('070401.170313.170437.969639', 'CDQ-17-002', 'Nueva edición de la Guía de Gestión de Riesgos', 2, '2017-03-13', '', 'CQ-036', ''),
('070401.170504.170437.969640', 'CDQ-17-003', 'Nueva edición de la Guía de Gestión de Riesgos', 2, '2017-05-04', '', 'CQ-037', ''),
('070401.171127.170437.969641', 'CDQ-17-004', 'Cambios en norma ISO 9001 y PECAL 2110 y adaptación del SGC y proyectos', 1, '2017-11-27', '', 'CQ-038', ''),
('070401.171210.170437.969642', 'CDQ-17-005', 'Actualización de documentación del sistema de calidad', 2, '2017-12-01', '', 'CQ-039', ''),
('070401.180110.170437.969643', 'CDQ-18-001', 'Planificación Anual de Calibraciones para 2018', 3, '2018-01-10', '', 'CQ-040', ''),
('070401.180320.170437.969644', 'CDQ-18-002', 'Actualización de Documentación', 2, '2018-03-20', '', 'CQ-041', ''),
('070401.180521.170437.969645', 'CDQ-18-003', 'Actualización de Documentación', 2, '2018-05-21', '', 'CQ-042', ''),
('070401.180531.170437.969646', 'CDQ-18-004', 'Nueva Intranet Defensa y Seguridad', 1, '2018-05-31', '', 'CQ-043', ''),
('070401.180705.170437.969647', 'CDQ-18-005', 'GUÍA PARA LA DETECCIÓN DEL MATERIAL', 2, '2018-07-05', '', 'CQ-044', ''),
('070401.181026.170437.969648', 'CDQ-18-006', 'Actualización Intranet de Defensa y Seguridad', 1, '2018-10-26', '', 'CQ-045', ''),
('070401.181126.170437.969649', 'CDQ-18-007', 'Actualización de Documentación', 2, '2018-11-26', '', 'CQ-046', ''),
('070401.190117.170437.969650', 'CDQ-19-001', 'Derogación documento EM-690-IN-004-PRL EN EMPRESAS COLABORADORAS VIGILANCIA Y COORDINACIÓN EMPRESARIAL', 2, '2019-01-17', '', 'CQ-047', ''),
('070401.190225.170437.969651', 'CDQ-19-002', 'Eliminación del Indicador - Porcentaje de equipos calibrados', 1, '2019-02-25', '', 'CQ-048', ''),
('070401.190321.170437.969652', 'CDQ-19-003', 'Integración Sistema de Calidad', 1, '2019-03-21', '000200.181109.090000.000001', 'CQ-049', ''),
('070401.190328.170437.969653', 'CDQ-19-004', 'Cambios Sistema de Calidad del área de Defensa', 1, '2019-03-28', '000200.181109.090000.000001', 'CQ-050', ''),
('070401.190516.170437.969654', 'CDQ-19-005', 'Cambios Sistema de Calidad del área de Defensa', 1, '2019-05-16', '000200.181109.090000.000001', 'CQ-051', ''),
('070401.190520.170437.969655', 'CDQ-19-006', 'Cambios Sistema de Calidad del área de Defensa', 1, '2019-05-20', '000200.181109.090000.000001', 'CQ-052', ''),
('070401.190607.170437.969656', 'CDQ-19-007', 'Cambios Sistema de Calidad del área de Defensa', 1, '2019-06-07', '000200.181109.090000.000001', 'CQ-053', ''),
('070401.190607.170437.969657', 'CDQ-19-008', 'Cambios Sistema de Calidad del área de Defensa', 1, '2019-06-07', '000200.181109.090000.000001', 'CQ-053B', ''),
('070401.190701.170437.969658', 'CDQ-19-009', 'Cambios Sistema de Calidad del área de Defensa', 1, '2019-07-01', '000200.181109.090000.000001', 'CQ-054', ''),
('070401.190726.170437.969659', 'CDQ-19-010', 'Integración Sistema de Calidad del área de Defensa', 1, '2019-07-26', '000200.181109.090000.000001', 'CQ-055B', ''),
('070401.190916.170437.969660', 'CDQ-19-011', 'actualización de la tabla de CÓDIGOS de ARTÍCULOS para pedidos', 1, '2019-09-16', '', 'CQ-055C', ''),
('070401.191009.170437.969661', 'CDQ-19-012', 'Cambios Sistema de Calidad del área de Defensa', 1, '2019-10-09', '000200.181109.090000.000001', 'CQ-056', ''),
('070401.200107.170437.969662', 'CDQ-20-001', 'Planificación Calibración de Equipos 2020', 3, '2020-01-07', '000200.181109.090000.000001', 'CQ-057', ''),
('070401.200128.170437.969663', 'CDQ-20-002', 'Documentación Modificada', 2, '2020-01-28', '000200.181109.090000.000001', 'CQ-058', ''),
('070401.200224.170437.969664', 'CDQ-20-003', 'Documentación Modificada', 2, '2020-02-24', '000200.181109.090000.000001', 'CQ-059', ''),
('070401.200407.170437.969665', 'CDQ-20-004', 'Situación Calidad durante COVID19', 1, '2020-04-07', '', 'CQ-060', ''),
('070401.200408.170437.969666', 'CDQ-20-005', 'Calibración de Equipos de Medida', 4, '2020-04-08', '000200.181109.090000.000001', 'CQ-061', ''),
('070401.200413.170437.969667', 'CDQ-20-006', 'Nueva versión de Gestión de Riesgos', 3, '2020-04-13', '000200.181109.090000.000001', 'CQ-062', ''),
('070401.200616.170437.969668', 'CDQ-20-007', 'Actualización de dos procedimientos (planes de Calidad y Compras TdE) y documentación de apoyo (plantilla para planes de Calidad y cuadro de firmas en entregables)', 2, '2020-06-16', '', 'CQ-063', ''),
('070401.200724.170437.969669', 'CDQ-20-008', 'N/A', 1, '2020-07-24', '', 'CQ-064', ''),
('070401.200724.170437.969670', 'CDQ-20-009', 'Pliego para compras en proyectos con clausula PECAL y/o seguridad', 2, '2020-07-24', '', 'CQ-065', ''),
('070401.200731.170437.969671', 'CDQ-20-010', 'Baja Medidor de Campo', 4, '2020-07-31', '', 'CQ-066', ''),
('070401.200909.170437.969672', 'CDQ-20-011', 'Renovación certificados PECAL', 1, '2020-09-09', '', 'CQ-067', ''),
('070401.200917.170437.969673', 'CDQ-20-012', 'Actualización de documentación Septiembre 2020', 2, '2020-09-17', '', 'CQ-068', ''),
('070401.201028.170437.969674', 'CDQ-20-013', 'Actualización documentación interna', 2, '2020-10-28', '', 'CQ-069', ''),
('070401.201105.170437.969675', 'CDQ-20-014', 'Nuevas plantillas y equipo de medida', 2, '2020-11-05', '', 'CQ-070', ''),
('070401.210111.170437.969681', 'CDQ-21-001', 'Planificación de calibraciones 2021', 4, '2021-01-11', '', 'CQ-071', ''),
('070401.210305.170437.969676', 'CDQ-21-002', 'Actualización documentación sistema de calidad', 2, '2021-03-05', '', 'CQ-072', ''),
('070401.210428.170437.969677', 'CDQ-21-003', 'Cambio Logo', 1, '2021-04-28', '', 'CQ-073', ''),
('070401.210714.170437.969678', 'CDQ-21-004', 'Actualización documentación sistema de calidad', 2, '2021-07-14', '', 'CQ-074', ''),
('070401.210714.170437.969679', 'CDQ-21-005', 'Derogación documentos y baja de equipos de medida', 2, '2021-07-14', '', 'CQ-075', ''),
('070401.211027.170437.969680', 'CDQ-21-006', 'Actualización APP gestión de riesgos y documentos de calidad', 3, '2021-10-27', '', 'CQ-076', ''),
('070401.211202.170437.969682', 'CDQ-21-007', 'Actualización documentos NUEVOS en la web de calidad', 2, '2021-12-02', '', 'CQ-077', ''),
('070401.220112.170437.969683', 'CDQ-22-001', '¡Entramos en 2022 con muchas novedades!', 1, '2022-01-12', '', 'CQ-078', ''),
('070401.220119.170437.969684', 'CDQ-22-002', 'Replanificación de las calibraciones 2022', 4, '2022-01-19', '', 'CQ-079', ''),
('070401.220125.170437.969685', 'CDQ-22-003', 'Actualización documentación sistema de calidad', 2, '2022-01-25', '', 'CQ-080', ''),
('070401.220202.170437.969686', 'CDQ-22-004', 'Instrucciones para la pérdida de conectividad con DATOSTE', 3, '2022-02-02', '', 'CQ-081', ''),
('070401.220329.170437.969687', 'CDQ-22-005', 'Os presentamos... ¡La guía de la codificación!', 2, '2022-03-29', '', 'CQ-082', ''),
('070401.220331.170437.969689', 'CDQ-22-006', '¡Llegan nuevas funciones a AGEDYS técnico!', 3, '2022-03-31', '', 'CQ-083', ''),
('070401.220426.170437.969689', 'CDQ-22-007', 'El Siglo XXI ha llegado a nuestros equipos de medida', 4, '2022-04-06', '', 'CQ-084', ''),
('070401.220428.170437.969690', 'CDQ-22-008', 'En mayo se vienen cositas ¡Estáis preparados/as?', 5, '2022-04-28', '070501.181104.090000.000001', 'CQ-085', ''),
('070401.220614.170437.969692', 'CDQ-22-009', '¿Has valorado los riesgos del día de hoy?', 3, '2022-06-14', '070501.220214.090000.000001', 'CQ-086', 'Sabemos que te encantan los riesgos. Por ello, hemos mejorado la base de datos para ti, ¿Quieres verlo?'),
('070401.220630.170437.969692', 'CDQ-22-010', 'Calidad y Seguridad EVERYWHERE', 1, '2022-06-30', '070501.220214.090000.000001', 'CQ-087', '¿Que hay que mejorar algo del proceso de compras? Sin problema, para eso está calidad :)'),
('070401.220708.170437.969693', 'CDQ-22-011', 'Renovarse o morir', 2, '2022-07-08', '070501.220214.090000.000001', 'CQ-088', 'Se han hecho algunos cambios en la documentación del sistema, ¡Entra a verlos!'),
('070401.220831.172600.000001', 'CDQ-22-012', 'ADIÓS A LAS VACACIONES Y HOLA A LAS ACTUALIZACIONES', 2, '2022-08-31', '070501.220214.090000.000001', 'CQ-089', '¡Volvemos de vacaciones con las pilas cargadas!'),
('070401.221031.172600.000001', 'CDQ-22-013', 'Quality review - Del 01 de octubre al 31 de octubre', 1, '2022-10-31', '070501.220214.090000.000001', 'CQ-090', '¡Te presentamos la primera revista de calidad, creada por y para el Departamento de Defensa de Telefónica!');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `07_comunicados_gestor`
--

CREATE TABLE `07_comunicados_gestor` (
  `id` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prioridad` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `07_comunicados_gestor`
--

INSERT INTO `07_comunicados_gestor` (`id`, `prioridad`) VALUES
('070401.120110.170437.969600', 0),
('070401.120111.170437.969601', 0),
('070401.120126.170437.969602', 0),
('070401.120213.170437.969603', 0),
('070401.120220.170437.969604', 0),
('070401.120703.170437.969605', 0),
('070401.120730.170437.969606', 0),
('070401.130430.170437.969607', 0),
('070401.130507.170437.969608', 0),
('070401.130507.170437.969609', 0),
('070401.140221.170437.969610', 0),
('070401.140421.170437.969611', 0),
('070401.140422.170437.969612', 0),
('070401.140602.170437.969613', 0),
('070401.140620.170437.969614', 0),
('070401.140620.170437.969615', 0),
('070401.140621.170437.969616', 0),
('070401.140915.170437.969617', 0),
('070401.140925.170437.969618', 0),
('070401.150114.170437.969619', 0),
('070401.150318.170437.969620', 0),
('070401.150522.170437.969621', 0),
('070401.150522.170437.969622', 0),
('070401.150601.170437.969623', 0),
('070401.150611.170437.969624', 0),
('070401.150616.170437.969625', 0),
('070401.150722.170437.969626', 0),
('070401.150811.170437.969627', 0),
('070401.150812.170437.969628', 0),
('070401.151021.170437.969629', 0),
('070401.151202.170437.969630', 0),
('070401.160219.170437.969631', 0),
('070401.160406.170437.969632', 0),
('070401.160624.170437.969633', 0),
('070401.160718.170437.969634', 0),
('070401.160928.170437.969635', 0),
('070401.161227.170437.969636', 0),
('070401.161227.170437.969637', 0),
('070401.170307.170437.969638', 0),
('070401.170313.170437.969639', 0),
('070401.170504.170437.969640', 0),
('070401.171127.170437.969641', 0),
('070401.171210.170437.969642', 0),
('070401.180110.170437.969643', 0),
('070401.180320.170437.969644', 0),
('070401.180521.170437.969645', 0),
('070401.180531.170437.969646', 0),
('070401.180705.170437.969647', 0),
('070401.181026.170437.969648', 0),
('070401.181126.170437.969649', 0),
('070401.190117.170437.969650', 0),
('070401.190225.170437.969651', 0),
('070401.190321.170437.969652', 0),
('070401.190328.170437.969653', 0),
('070401.190516.170437.969654', 0),
('070401.190520.170437.969655', 0),
('070401.190607.170437.969656', 0),
('070401.190607.170437.969657', 0),
('070401.190701.170437.969658', 0),
('070401.190726.170437.969659', 0),
('070401.190916.170437.969660', 0),
('070401.191009.170437.969661', 0),
('070401.200107.170437.969662', 0),
('070401.200128.170437.969663', 0),
('070401.200224.170437.969664', 0),
('070401.200407.170437.969665', 0),
('070401.200408.170437.969666', 0),
('070401.200413.170437.969667', 0),
('070401.200616.170437.969668', 0),
('070401.200724.170437.969669', 0),
('070401.200724.170437.969670', 0),
('070401.200731.170437.969671', 0),
('070401.200909.170437.969672', 0),
('070401.200917.170437.969673', 0),
('070401.201028.170437.969674', 0),
('070401.201105.170437.969675', 0),
('070401.210111.170437.969681', 0),
('070401.210305.170437.969676', 0),
('070401.210428.170437.969677', 0),
('070401.210714.170437.969678', 0),
('070401.210714.170437.969679', 0),
('070401.211027.170437.969680', 0),
('070401.211202.170437.969682', 0),
('070401.220112.170437.969683', 0),
('070401.220119.170437.969684', 0),
('070401.220125.170437.969685', 0),
('070401.220202.170437.969686', 0),
('070401.220329.170437.969687', 0),
('070401.220331.170437.969689', 0),
('070401.220426.170437.969689', 0),
('070401.220428.170437.969690', 0),
('070401.220614.170437.969692', 0),
('070401.220630.170437.969692', 0),
('070401.220708.170437.969693', 3),
('070401.220831.172600.000001', 2),
('070401.221031.172600.000001', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `07_comunicados_tipo`
--

CREATE TABLE `07_comunicados_tipo` (
  `id` int NOT NULL,
  `tipo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `07_comunicados_tipo`
--

INSERT INTO `07_comunicados_tipo` (`id`, `tipo`) VALUES
(1, 'General'),
(2, 'Documentación'),
(3, 'Aplicaciones'),
(4, 'Equipos de medida'),
(5, 'Auditoría');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `07_comunicados`
--
ALTER TABLE `07_comunicados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `07_comunicados_gestor`
--
ALTER TABLE `07_comunicados_gestor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `07_comunicados_tipo`
--
ALTER TABLE `07_comunicados_tipo`
  ADD PRIMARY KEY (`id`);
--
-- Base de datos: `07_informaciondocumentada`
--
CREATE DATABASE IF NOT EXISTS `07_informaciondocumentada` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `07_informaciondocumentada`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `07_documentacion`
--

CREATE TABLE `07_documentacion` (
  `id` varchar(27) COLLATE utf8mb4_general_ci NOT NULL,
  `codigo_interno` varchar(13) COLLATE utf8mb4_general_ci NOT NULL,
  `denominador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipo` int NOT NULL,
  `juridica` int NOT NULL,
  `pertenece` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `repositorio` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `comentarios` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `07_documentacion`
--

INSERT INTO `07_documentacion` (`id`, `codigo_interno`, `denominador`, `tipo`, `juridica`, `pertenece`, `repositorio`, `comentarios`) VALUES
('070101.20190328.113400', 'EM-300-PR-001', 'Manual de Organización y Funciones de DyS', 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `07_documentacion_edicion`
--

CREATE TABLE `07_documentacion_edicion` (
  `id` int NOT NULL,
  `id_documento` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `edicion` int NOT NULL,
  `revision` int NOT NULL,
  `fecha` date NOT NULL,
  `elaborado` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `revisado` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `aprobado` varchar(27) COLLATE utf8mb4_general_ci NOT NULL,
  `cambios` text COLLATE utf8mb4_general_ci NOT NULL,
  `paginas` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `07_documentacion_edicion`
--

INSERT INTO `07_documentacion_edicion` (`id`, `id_documento`, `edicion`, `revision`, `fecha`, `elaborado`, `revisado`, `aprobado`, `cambios`, `paginas`) VALUES
(1, '070101.20190328.113400', 1, 0, '2019-03-28', '070501.181104.090000.000001', '070501.220214.090000.000001', '3', 'Todos\r\n\r\nPrimera edición del documento', 22),
(2, '070101.20190328.113400', 2, 0, '2020-09-17', '070501.181104.090000.000001', '070501.220214.090000.000001', '3', 'III, 3.4 y 3.6\r\n\r\nSe añade la IT02 CMDIN GT2 como documento de referencia. Se añaden conocmientos de la nroma PECAL en ambos perfiles', 22),
(3, '070101.20190328.113400', 3, 0, '2022-08-29', '070501.220214.090000.000001', '070501.220214.090000.000001', '3', 'Apartado 2\r\n- Se actualiza el organigrama\r\n\r\nApartado 3\r\n- Se actualizan y renombran las fichas de funciones de puesto.\r\n\r\nApartados 3.4 y 3.5\r\n- Se crean las fichas de funciones de puesto de responsable de Área de Preventa Defensa, Ingeniero Preventa y Documentalista de Calidad y Seguridad.', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `07_documentacion_estados`
--

CREATE TABLE `07_documentacion_estados` (
  `id` int NOT NULL,
  `estado` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `07_documentacion_externa`
--

CREATE TABLE `07_documentacion_externa` (
  `id` varchar(27) COLLATE utf8mb4_general_ci NOT NULL,
  `denominador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `07_documentacion_externa`
--

INSERT INTO `07_documentacion_externa` (`id`, `denominador`) VALUES
('070106.20190328.113400', 'PECAL 2110');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `07_documentacion_fechas`
--

CREATE TABLE `07_documentacion_fechas` (
  `id` varchar(27) COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_edicion` date DEFAULT NULL,
  `fecha_revision` date DEFAULT NULL,
  `fecha_proxima_revision` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `07_documentacion_juridicas`
--

CREATE TABLE `07_documentacion_juridicas` (
  `id` int NOT NULL,
  `juridica` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `acronimo` varchar(5) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `07_documentacion_juridicas`
--

INSERT INTO `07_documentacion_juridicas` (`id`, `juridica`, `acronimo`) VALUES
(1, 'Telefónica de España', 'TDE'),
(2, 'Telefónica Soluciones', 'TSOL'),
(3, 'Jurídicas integradas', 'TINT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `07_documentacion_tipos`
--

CREATE TABLE `07_documentacion_tipos` (
  `id` int NOT NULL,
  `tipo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `07_documentacion_tipos`
--

INSERT INTO `07_documentacion_tipos` (`id`, `tipo`) VALUES
(1, 'Manual'),
(2, 'Procedimiento'),
(3, 'Instrucción'),
(4, 'Guia'),
(5, 'Formato'),
(6, 'Plantilla'),
(7, 'Otros documentos');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `07_documentacion`
--
ALTER TABLE `07_documentacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `07_documentacion_edicion`
--
ALTER TABLE `07_documentacion_edicion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `07_documentacion_estados`
--
ALTER TABLE `07_documentacion_estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `07_documentacion_externa`
--
ALTER TABLE `07_documentacion_externa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `07_documentacion_fechas`
--
ALTER TABLE `07_documentacion_fechas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `07_documentacion_juridicas`
--
ALTER TABLE `07_documentacion_juridicas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `07_documentacion_tipos`
--
ALTER TABLE `07_documentacion_tipos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `07_documentacion_edicion`
--
ALTER TABLE `07_documentacion_edicion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `07_documentacion_juridicas`
--
ALTER TABLE `07_documentacion_juridicas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `07_documentacion_tipos`
--
ALTER TABLE `07_documentacion_tipos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
