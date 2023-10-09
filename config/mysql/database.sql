-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: database:3306
-- Tiempo de generación: 07-10-2023 a las 10:01:18
-- Versión del servidor: 8.0.33
-- Versión de PHP: 8.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `00_ayuda`
--
CREATE DATABASE IF NOT EXISTS `00_ayuda` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `00_ayuda`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `00_ayuda`
--

CREATE TABLE `00_ayuda` (
  `ruta` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `texto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `00_ayuda`
--

INSERT INTO `00_ayuda` (`ruta`, `texto`) VALUES
('/', 'Esta es la ayuda de la página principal.'),
('/alarmas', 'Muestra las alarmas del sistema.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `00_trazabilidad_ISO`
--

CREATE TABLE `00_trazabilidad_ISO` (
  `id` int NOT NULL,
  `ruta` varchar(255) NOT NULL,
  `apartado` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `00_trazabilidad_ISO`
--

INSERT INTO `00_trazabilidad_ISO` (`id`, `ruta`, `apartado`) VALUES
(1, '/', 'N/A'),
(2, '/contexto', '4'),
(3, '/contexto', '4.1'),
(4, '/contexto/partesinteresadas', '4.2'),
(5, '/contexto', '4.2'),
(6, '/contexto', '4.3'),
(7, '/contexto', '4.4'),
(8, '/contexto/analisisContexto', '4.1'),
(9, '/contexto/alcance', '4.3'),
(10, '/contexto/procesos', '4.4'),
(11, '/liderazgo', '5'),
(12, '/liderazgo/liderazgo', '5.1'),
(13, '/liderazgo/liderazgo', '5.1.1'),
(14, '/liderazgo/liderazgo', '5.1.2'),
(15, '/liderazgo/politica', '5'),
(16, '/liderazgo/roles', '5.3'),
(17, '/planificacion', '6'),
(18, '/planificacion/riesgos-oportunidades', '6.1'),
(19, '/objetivo', '6.2'),
(20, '/planificacion/proyectos-mejora', '6.3'),
(21, '/planificacion/planificacion-cambios', '6.3'),
(22, '/contexto/analisisContexto/read', '4.1'),
(23, 'contexto/analisisContexto/AnalisisDAFO/read', '4.1'),
(24, '/contexto/partesinteresadas/pi/read', '4.2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `00_ayuda`
--
ALTER TABLE `00_ayuda`
  ADD PRIMARY KEY (`ruta`);

--
-- Indices de la tabla `00_trazabilidad_ISO`
--
ALTER TABLE `00_trazabilidad_ISO`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `00_trazabilidad_ISO`
--
ALTER TABLE `00_trazabilidad_ISO`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
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
  `rutaAdjunto` varchar(255) NOT NULL,
  `auth` int NOT NULL DEFAULT '0' COMMENT '0 - No; 1 - Sí'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `00_adjuntos`
--

INSERT INTO `00_adjuntos` (`id`, `item_referencia`, `nombreAdjunto`, `tipoAdjunto`, `tamanoAdjunto`, `rutaAdjunto`, `auth`) VALUES
('000300.230302.111439.698230', '070401.221031.172600.000001', 'Quality review', 'pdf', 16154497, '../adj/07/04/01/070401.221031.172600.000001/000300.230302.111439.698230.pdf', 0),
('000300.230608.134029.958159', '060101.230608.132033.804702', 'Riesgos y oportunidades de los procesos', 'xlsx', 478181, '../adj/06/01/01/060101.230608.132033.804702/000300.230608.134029.958159.xlsx', 0),
('000300.230905.112750.658421', '070201.190328.113406.545802', 'EM-300-PR-02 (Ed.3) - Codificación Documentación DyS', 'pdf', NULL, '../adj/07/02/01/070201.190328.113406.545802/070201.190328.113406.545802.pdf', 0),
('000300.230905.132133.517485', '070201.190328.113400.426895', 'EM-300-PR-01 (Ed.1) - Planes de Calidad de DyS', 'pdf', NULL, '../adj/07/02/01/070201.190328.113400.426895/070201.190328.113400.426895.pdf', 0),
('000300.230922.144917.710699', '070401.230905.090120.620354', 'CQ-092 Quality Review', 'pdf', 7200613, '../adj/07/04/01/070401.230905.090120.620354/000300.230922.144917.710699.', 0),
('000300.231003.122726.496547', 'N/A', 'FICHA_ALTA_PROVEEDOR_TDE', 'xlsx', 24011, '../adj/04/06/00/040600.220509.143601.285599/000300.231004.090729.174347.xlsx', 0),
('000300.231003.122746.933460', 'N/A', 'FICHA_ALTA_PROVEEDOR_TSOL', 'xlsx', 24028, '../adj/04/06/00/040600.220509.143601.285599/000300.231004.090743.979765.xlsx', 0),
('000300.231003.122804.838488', 'N/A', 'Tabla de Productos por Head Local 2022', 'xlsx', 47106, '../adj/04/06/00/040600.220509.143601.285599/000300.231004.100552.648605.xlsx', 0),
('000300.231003.122837.647443', 'N/A', 'FICHA_ALTA_FACTURA ELECTRONICA', 'xlsx', 10386, '../adj/04/06/00/040600.220509.143601.285599/000300.231004.090759.871658.xlsx', 0),
('000300.231003.170123.209615', 'N/A', 'Flujograma DyS', 'pdf', 652380, '../adj/04/06/00/040600.220509.143601.285599/000300.231003.234633.361332.pdf', 0),
('000300.231003.175515.353135', '070201.220708.133051.254745', 'EM-300-PR-002 (Ed6) Codificación Documentación DySf', 'pdf', 633592, '../adj/07/02/01/070201.220708.133051.254745/000300.231003.175515.353135.pdf', 0),
('000300.231003.175530.749587', '070201.220708.133051.254745', 'EM-300-PR-002 (Ed6) Codificación Documentación DyS', 'docx', 110176, '../adj/07/02/01/070201.220708.133051.254745/000300.231003.175530.749587.docx', 1),
('000300.231003.175825.738370', '070201.220128.154241.918911', 'EM-300-PR-003 (Ed3) Elaboración y Revisión de Ofertas de DyS', 'pdf', 310960, '../adj/07/02/01/070201.220128.154241.918911/000300.231003.175825.738370.pdf', 0),
('000300.231003.175842.951676', '070201.220128.154241.918911', 'EM-300-PR-003 (Ed3) Elaboración y Revisión de Ofertas de DyS', 'docx', 76013, '../adj/07/02/01/070201.220128.154241.918911/000300.231003.175842.951676.docx', 1),
('000300.231003.222359.659158', '070201.190328.113402.325894', 'EM-300-PR-001 (Ed3) Planes de Calidad de DyS', 'pdf', 617705, '../adj/07/02/01/070201.190328.113402.325894/000300.231003.222359.659158.pdf', 0),
('000300.231003.222420.255158', '070201.190328.113402.325894', 'EM-300-PR-001 (Ed3) Planes de Calidad de DyS', 'docx', 103311, '../adj/07/02/01/070201.190328.113402.325894/000300.231003.222420.255158.docx', 1),
('000300.231003.222458.359220', '070201.230515.154754.484875', 'EM-300-PR-004 (Ed4) Gestión de NC OBS y AC en proyectos de DyS', 'pdf', 543472, '../adj/07/02/01/070201.230515.154754.484875/000300.231003.222458.359220.pdf', 0),
('000300.231003.222513.213131', '070201.230515.154754.484875', 'EM-300-PR-004 (Ed4) Gestión de NC, OBS y AC en proyectos de DyS ', 'docx', 67298, '../adj/07/02/01/070201.230515.154754.484875/000300.231003.222513.213131.docx', 1),
('000300.231003.222534.641887', '070201.220426.155665.365898', 'EM-300-PR-005 (Ed5) Control de los Equipos de Inspección y Medida de DyS', 'pdf', 765557, '../adj/07/02/01/070201.220426.155665.365898/000300.231003.222534.641887.pdf', 0),
('000300.231003.222554.750616', '070201.220426.155665.365898', 'EM-300-PR-005 (Ed5) Control de los Equipos de Inspección y Medida de DyS', 'docx', 1788234, '../adj/07/02/01/070201.220426.155665.365898/000300.231003.222554.750616.docx', 1),
('000300.231003.222642.433527', '070201.230515.161252.658586', 'EM-300-PR-006 (Ed6) Compras en Telefónica de España de DyS', 'pdf', 1298959, '../adj/07/02/01/070201.230515.161252.658586/000300.231003.222642.433527.pdf', 0),
('000300.231003.222701.095833', '070201.230515.161252.658586', 'EM-300-PR-006 (Ed6) Compras en Telefónica de España de DyS', 'docx', 716120, '../adj/07/02/01/070201.230515.161252.658586/000300.231003.222701.095833.docx', 1),
('000300.231003.222728.872340', '070201.221024.161821.211015', 'EM-300-PR-007 (Ed4) Control de Productos Suministrados por el cliente de DyS', 'pdf', 538291, '../adj/07/02/01/070201.221024.161821.211015/000300.231003.222728.872340.pdf', 0),
('000300.231003.222742.737572', '070201.221024.161821.211015', 'EM-300-PR-007 (Ed4) Control de Productos Suministrados por el cliente de DyS', 'docx', 65838, '../adj/07/02/01/070201.221024.161821.211015/000300.231003.222742.737572.docx', 1),
('000300.231003.222806.171648', '070201.220112.162411.474858', 'EM-300-PR-008 (Ed2) Servicio postventa de DyS', 'pdf', 437594, '../adj/07/02/01/070201.220112.162411.474858/000300.231003.222806.171648.pdf', 0),
('000300.231003.222820.920920', '070201.220112.162411.474858', 'EM-300-PR-008 (Ed2) Servicio postventa de DyS', 'docx', 120429, '../adj/07/02/01/070201.220112.162411.474858/000300.231003.222820.920920.docx', 1),
('000300.231003.222849.985488', '070201.220627.162411.474858', 'EM-300-PR-009 (Ed7) Gestión de Riesgos para proyectos de DyS', 'pdf', 527497, '../adj/07/02/01/070201.220627.162411.474858/000300.231003.222849.985488.pdf', 0),
('000300.231003.222907.083142', '070201.220627.162411.474858', 'EM-300-PR-009 (Ed7) Gestión de Riesgos para proyectos de DyS', 'docx', 341094, '../adj/07/02/01/070201.220627.162411.474858/000300.231003.222907.083142.docx', 1),
('000300.231003.222934.028215', '070201.221024.170000.170000', 'EM-300-PR-010 (Ed2) Detección de Material Falsificado', 'pdf', 572917, '../adj/07/02/01/070201.221024.170000.170000/000300.231003.222934.028215.pdf', 0),
('000300.231003.222957.208340', '070201.221024.170000.170000', 'EM-300-PR-010 (Ed2) Detección de Material Falsificado', 'docx', 63505, '../adj/07/02/01/070201.221024.170000.170000/000300.231003.222957.208340.docx', 1),
('000300.231003.223024.902581', '070201.230725.170517.598865', 'EM-300-PR-011 (Ed2) Gestión de la Configuración de DyS', 'pdf', 292379, '../adj/07/02/01/070201.230725.170517.598865/000300.231003.223024.902581.pdf', 0),
('000300.231003.223040.373744', '070201.230725.170517.598865', 'EM-300-PR-011 (Ed2) Gestión de la Configuración de DyS', 'docx', 177282, '../adj/07/02/01/070201.230725.170517.598865/000300.231003.223040.373744.docx', 1),
('000300.231003.223103.420802', '070201.230725.171017.421212', 'EM-300-PR-012 (Ed2) Planes y Protocolos de prueba de DyS', 'pdf', 166576, '../adj/07/02/01/070201.230725.171017.421212/000300.231003.223103.420802.pdf', 0),
('000300.231003.223120.284107', '070201.230725.171017.421212', 'EM-300-PR-012 (Ed2) Planes y Protocolos de prueba de DyS', 'docx', 82511, '../adj/07/02/01/070201.230725.171017.421212/000300.231003.223120.284107.docx', 1),
('000300.231003.223143.060110', '070201.220328.171616.024756', 'EM-300-PR-013 (Ed4) Compras en Telefónica Soluciones de DyS', 'pdf', 1669821, '../adj/07/02/01/070201.220328.171616.024756/000300.231003.223143.060110.pdf', 0),
('000300.231003.223158.346472', '070201.220328.171616.024756', 'EM-300-PR-013 (Ed4) Compras en Telefónica Soluciones de DyS', 'docx', 925968, '../adj/07/02/01/070201.220328.171616.024756/000300.231003.223158.346472.docx', 1),
('000300.231003.223223.757003', '070201.230725.172345.421253', 'EM-300-PR-014 (Ed2) Planificación y Desarrollo de las Actividades técnicas de DyS', 'pdf', 156501, '../adj/07/02/01/070201.230725.172345.421253/000300.231003.223223.757003.pdf', 0),
('000300.231003.223243.115965', '070201.230725.172345.421253', 'EM-300-PR-014 (Ed2) Planificación y Desarrollo de las Actividades técnicas de DyS', 'docx', 71895, '../adj/07/02/01/070201.230725.172345.421253/000300.231003.223243.115965.docx', 1),
('000300.231003.223307.657994', '070201.230616.172256.358421', 'EM-300-PR-015 (Ed1) Diseño y Especificación de requisitos de DyS', 'pdf', 721792, '../adj/07/02/01/070201.230616.172256.358421/000300.231003.223307.657994.pdf', 0),
('000300.231003.223325.303391', '070201.230616.172256.358421', 'EM-300-PR-015 (Ed1) Diseño y Especificación de requisitos de DyS', 'docx', 77021, '../adj/07/02/01/070201.230616.172256.358421/000300.231003.223325.303391.docx', 1),
('000300.231003.223349.903408', '070201.190701.172741.112547', 'EM-300-PR-016 (Ed2) Desarrollo Software de DyS', 'pdf', 545319, '../adj/07/02/01/070201.190701.172741.112547/000300.231003.223349.903408.pdf', 0),
('000300.231003.223415.051580', '070201.190701.172741.112547', 'EM-300-PR-016 (Ed2) Desarrollo Software de DyS', 'docx', 102712, '../adj/07/02/01/070201.190701.172741.112547/000300.231003.223415.051580.docx', 1),
('000300.231003.223441.810006', '070201.220829.100810.137484', 'EM-300-MA-001 (Ed3) Manual de Organización y Funciones de DyS', 'pdf', 579581, '../adj/07/02/01/070201.220829.100810.137484/000300.231003.223441.810006.pdf', 0),
('000300.231003.223458.773159', '070201.220829.100810.137484', 'EM-300-MA-001 (Ed3) Manual de Organización y Funciones de DyS', 'docx', 143851, '../adj/07/02/01/070201.220829.100810.137484/000300.231003.223458.773159.docx', 1),
('000300.231003.223531.358228', '070201.22.100810.137484', 'EM-300-MA-002 (Ed3) Gestión de la calidad de DyS', 'pdf', 475601, '../adj/07/02/01/070201.22.100810.137484/000300.231003.223531.358228.pdf', 0),
('000300.231003.223550.584823', '070201.22.100810.137484', 'EM-300-MA-002 (Ed3) Gestión de la calidad de DyS', 'docx', 101438, '../adj/07/02/01/070201.22.100810.137484/000300.231003.223550.584823.docx', 1),
('000300.231003.223622.361423', '070201.210514.100810.137484', 'EM-300-MA-003 (Ed2) Organización y Estructura del archivo TSol de DyS', 'pdf', 758844, '../adj/07/02/01/070201.210514.100810.137484/000300.231003.223622.361423.pdf', 0),
('000300.231003.223642.047547', '070201.210514.100810.137484', 'EM-300-MA-003 (Ed2) Organización y Estructura del archivo TSol de DyS', 'docx', 3047070, '../adj/07/02/01/070201.210514.100810.137484/000300.231003.223642.047547.docx', 1),
('000300.231003.223732.163461', '070201.190701.102341.174821', 'EM-300-IN-002 (Ed2) Replanteo de Mediciones y Planificación de DyS', 'pdf', 389802, '../adj/07/02/01/070201.190701.102341.174821/000300.231003.223732.163461.pdf', 0),
('000300.231003.223746.490357', '070201.190701.102341.174821', 'EM-300-IN-002 (Ed2) Replanteo de Mediciones y Planificación de DyS', 'docx', 64463, '../adj/07/02/01/070201.190701.102341.174821/000300.231003.223746.490357.docx', 1),
('000300.231003.223816.186283', '070201.190701.103141.845114', 'EM-300-IN-003 (Ed2) Análisis funcional de DyS', 'pdf', 367379, '../adj/07/02/01/070201.190701.103141.845114/000300.231003.223816.186283.pdf', 0),
('000300.231003.223835.995433', '070201.190701.103141.845114', 'EM-300-IN-003 (Ed2) Análisis funcional de DyS', 'docx', 63581, '../adj/07/02/01/070201.190701.103141.845114/000300.231003.223835.995433.docx', 1),
('000300.231003.223915.505766', '070201.190701.103333.417545', 'EM-300-IN-004 (Ed2) Diseño de Sistemas Redes de DyS', 'pdf', 419688, '../adj/07/02/01/070201.190701.103333.417545/000300.231003.223915.505766.pdf', 0),
('000300.231003.223937.301546', '070201.190701.103333.417545', 'EM-300-IN-004 (Ed2) Diseño de Sistemas Redes de DyS', 'docx', 70974, '../adj/07/02/01/070201.190701.103333.417545/000300.231003.223937.301546.docx', 1),
('000300.231003.224003.283722', '070201.220708.102441.745475', 'EM-300-GU-001 (Ed2) Guía para la Codificación Documentación DySf', 'pdf', 569647, '../adj/07/02/01/070201.220708.102441.745475/000300.231003.224003.283722.pdf', 0),
('000300.231003.224020.637336', '070201.220708.102441.745475', 'EM-300-GU-001 (Ed2) Guía para la Codificación Documentación DyS', 'docx', 99254, '../adj/07/02/01/070201.220708.102441.745475/000300.231003.224020.637336.docx', 1),
('000300.231003.224502.268674', '070201.230725.171017.741541', 'AP01 (Ed1) Acta de realización de pruebas', 'pdf', 71207, '../adj/07/02/01/070201.230725.171017.741541/000300.231003.224502.268674.pdf', 0),
('000300.231003.224532.598143', '070201.230725.171017.741541', 'AP01 (Ed1) Acta de realización de pruebas', 'docx', 51923, '../adj/07/02/01/070201.230725.171017.741541/000300.231003.224532.598143.docx', 0),
('000300.231003.224844.321471', '070201.220426.105841.744577', 'CE01 (Ed3) Lista de Control de Equipos de Inspección y Medida', 'pdf', 50462, '../adj/07/02/01/070201.220426.105841.744577/000300.231003.224844.321471.pdf', 0),
('000300.231003.224913.754344', '070201.220426.105841.744577', 'CE01 (Ed3) Lista de Control de Equipos de Inspección y Medida', 'docx', 143029, '../adj/07/02/01/070201.220426.105841.744577/000300.231003.224913.754344.docx', 0),
('000300.231003.225010.448243', '070201.220426.105841.698235', 'CE02 (Ed3) Control de Equipos de Inspección y Medida', 'pdf', 44289, '../adj/07/02/01/070201.220426.105841.698235/000300.231003.225010.448243.pdf', 0),
('000300.231003.225039.755900', '070201.220426.105841.698235', 'CE02 (Ed3) Control de Equipos de Inspección y Medida', 'docx', 143052, '../adj/07/02/01/070201.220426.105841.698235/000300.231003.225039.755900.docx', 0),
('000300.231003.225120.321770', '070201.220426.105841.632326', 'CE03 (Ed3) Registro de Equipos de Inspección y Medida', 'pdf', 39940, '../adj/07/02/01/070201.220426.105841.632326/000300.231003.225120.321770.pdf', 0),
('000300.231003.225155.847140', '070201.220426.105841.632326', 'CE03 (Ed3) Registro de Equipos de Inspección y Medida', 'docx', 142767, '../adj/07/02/01/070201.220426.105841.632326/000300.231003.225155.847140.docx', 0),
('000300.231003.225239.160963', '070201.220426.105841.774887', 'CE04 (Ed5) Etiquetas de Equipos de Inspección y Medida', 'pdf', 154736, '../adj/07/02/01/070201.220426.105841.774887/000300.231003.225239.160963.pdf', 0),
('000300.231003.225307.510038', '070201.220426.105841.774887', 'CE04 (Ed5) Etiquetas de Equipos de Inspección y Medida', 'docx', 1601254, '../adj/07/02/01/070201.220426.105841.774887/000300.231003.225307.510038.docx', 0),
('000300.231003.225350.935080', '070201.190328.113402.414152', 'CI01 (Ed2-1 Registro de Control Interno', 'pdf', 39417, '../adj/07/02/01/070201.190328.113402.414152/000300.231003.225350.935080.pdf', 0),
('000300.231003.225410.473277', '070201.190328.113402.414152', 'CI01 (Ed2-1 Registro de Control Interno', 'docx', 50965, '../adj/07/02/01/070201.190328.113402.414152/000300.231003.225410.473277.docx', 0),
('000300.231003.225445.180669', '070201.221024.163850.336587', 'ET01 (Ed1) Etiqueta identificativa Material Falsificado', 'pdf', 26027, '../adj/07/02/01/070201.221024.163850.336587/000300.231003.225445.180669.pdf', 0),
('000300.231003.225508.085310', '070201.221024.163850.336587', 'ET01 (Ed1) Etiqueta identificativa Material Falsificado', 'docx', 34987, '../adj/07/02/01/070201.221024.163850.336587/000300.231003.225508.085310.docx', 0),
('000300.231003.225534.744184', '070201.220328.171616.024758', 'HV01 (Ed2) Hoja de verificación de pedidos', 'pdf', 99411, '../adj/07/02/01/070201.220328.171616.024758/000300.231003.225534.744184.pdf', 0),
('000300.231003.225555.799707', '070201.220328.171616.024758', 'HV01 (Ed2) Hoja de verificación de pedidos', 'docx', 176697, '../adj/07/02/01/070201.220328.171616.024758/000300.231003.225555.799707.docx', 0),
('000300.231003.225655.780489', '070201.221024.161821.510112', 'IV01 (Ed1) Informe de Verificación del Material Suministrado', 'docx', 55324, '../adj/07/02/01/070201.221024.161821.510112/000300.231003.225655.780489.docx', 0),
('000300.231003.225712.491340', '070201.221024.161821.510112', 'IV01 (Ed1) Informe de Verificación del Material Suministrado', 'pdf', 116551, '../adj/07/02/01/070201.221024.161821.510112/000300.231003.225712.491340.pdf', 0),
('000300.231003.225759.725235', '070201.220128.154241.414575', 'IR02 (Ed1-1) Informe de Revisión de la Documentación contractual', 'pdf', 94660, '../adj/07/02/01/070201.220128.154241.414575/000300.231003.225759.725235.pdf', 0),
('000300.231003.225825.402940', '070201.220128.154241.414575', 'IR02 (Ed1-1) Informe de Revisión de la Documentación contractual', 'docx', 54998, '../adj/07/02/01/070201.220128.154241.414575/000300.231003.225825.402940.docx', 0),
('000300.231003.225859.463460', '070201.190328.113402.652555', 'PI01 (Ed3) Puntos de Inspección (PA y PE)', 'pdf', 60778, '../adj/07/02/01/070201.190328.113402.652555/000300.231003.225859.463460.pdf', 0),
('000300.231003.225921.914592', '070201.190328.113402.652555', 'PI01 (Ed3) Puntos de Inspección (PA y PE)', 'docx', 145181, '../adj/07/02/01/070201.190328.113402.652555/000300.231003.225921.914592.docx', 0),
('000300.231003.230003.761397', '070201.220112.162411.411025', 'RA01 (Ed1) Informe RMA', 'pdf', 64977, '../adj/07/02/01/070201.220112.162411.411025/000300.231003.230003.761397.pdf', 0),
('000300.231003.230020.889510', '070201.220112.162411.411025', 'RA01(Ed1) Informe RMA', 'docx', 81519, '../adj/07/02/01/070201.220112.162411.411025/000300.231003.230020.889510.docx', 0),
('000300.231003.230059.488931', '070201.230515.161252.641457', 'RB01 (Ed4) Requisitos básicos', 'pdf', 44840, '../adj/07/02/01/070201.230515.161252.641457/000300.231003.230059.488931.pdf', 0),
('000300.231003.230122.997880', '070201.230515.161252.641457', 'RB01 (Ed4) Requisitos básicos', 'docx', 37973, '../adj/07/02/01/070201.230515.161252.641457/000300.231003.230122.997880.docx', 0),
('000300.231003.230310.029323', '070201.230515.161252.332541', 'RB02 (Ed4) Requisitos de seguridad', 'pdf', 58296, '../adj/07/02/01/070201.230515.161252.332541/000300.231003.230310.029323.pdf', 0),
('000300.231003.230328.444523', '070201.230515.161252.332541', 'RB02 (Ed4) Requisitos de seguridad', 'docx', 37033, '../adj/07/02/01/070201.230515.161252.332541/000300.231003.230328.444523.docx', 0),
('000300.231003.230357.621894', '070201.220627.162411.404858', 'RO01 (Ed7) Informe del Análisis e Identificación de los Riesgos', 'pdf', 97605, '../adj/07/02/01/070201.220627.162411.404858/000300.231003.230357.621894.pdf', 0),
('000300.231003.230415.962831', '070201.220627.162411.404858', 'RO01 (Ed7) Informe del Análisis e Identificación de los Riesgos', 'docx', 89118, '../adj/07/02/01/070201.220627.162411.404858/000300.231003.230415.962831.docx', 0),
('000300.231003.230442.395224', '070201.230515.161252.657414', 'RS01 (Ed4) Requisitos clase S-TGC', 'pdf', 85367, '../adj/07/02/01/070201.230515.161252.657414/000300.231003.230442.395224.pdf', 0),
('000300.231003.230459.013985', '070201.230515.161252.657414', 'RS01 (Ed4) Requisitos clase S-TGC', 'docx', 146692, '../adj/07/02/01/070201.230515.161252.657414/000300.231003.230459.013985.docx', 0),
('000300.231003.230522.468169', '070201.220328.171616.024757', 'SO01 (Ed2) Solicitud de oferta', 'pdf', 149341, '../adj/07/02/01/070201.220328.171616.024757/000300.231003.230522.468169.pdf', 0),
('000300.231003.230535.473283', '070201.220328.171616.024757', 'SO01 (Ed2) Solicitud de oferta', 'docx', 187280, '../adj/07/02/01/070201.220328.171616.024757/000300.231003.230535.473283.docx', 0),
('000300.231003.230657.107016', '070201.230912.171717.125847', 'Documentación Expediente-Proyecto TDE', 'docx', 110431, '../adj/07/02/01/070201.230912.171717.125847/000300.231003.230657.107016.docx', 0),
('000300.231003.230721.051670', '070201.230912.171717.125847', 'Documentación Expediente-Proyecto TSOL', 'docx', 109712, '../adj/07/02/01/070201.230912.171717.125847/000300.231003.230721.051670.docx', 0),
('000300.231003.230757.429974', '070201.230912.171951.320233', 'Modelo Carta TDE', 'docx', 37411, '../adj/07/02/01/070201.230912.171951.320233/000300.231003.230757.429974.docx', 0),
('000300.231003.230828.883049', '070201.230912.171951.320233', 'Modelo Carta TSOL', 'docx', 1882469, '../adj/07/02/01/070201.230912.171951.320233/000300.231003.230828.883049.docx', 0),
('000300.231003.230914.680917', '070201.230912.171951.387455', 'Plantilla Oferta TDE', 'docx', 3071919, '../adj/07/02/01/070201.230912.171951.387455/000300.231003.230914.680917.docx', 0),
('000300.231003.231405.473881', '070201.230912.171951.387455', 'Plantilla Oferta TSOL', 'docx', 3071965, '../adj/07/02/01/070201.230912.171951.387455/000300.231003.231405.473881.docx', 0),
('000300.231003.231807.571250', '070201.230912.171951.220147', 'Anexo plantilla compras TDE', 'docx', 127188, '../adj/07/02/01/070201.230912.171951.220147/000300.231003.231807.571250.docx', 0),
('000300.231003.231835.908176', '070201.230912.171951.220147', 'Anexo plantilla compras TSOL', 'docx', 125960, '../adj/07/02/01/070201.230912.171951.220147/000300.231003.231835.908176.docx', 0),
('000300.231003.231931.820562', '070201.230912.171951.274150', 'Plantilla Carta Oferta TDE', 'docx', 4184147, '../adj/07/02/01/070201.230912.171951.274150/000300.231003.231931.820562.docx', 0),
('000300.231003.231959.048343', '070201.230912.171951.274150', 'Plantilla Carta Oferta TSOL', 'docx', 4184157, '../adj/07/02/01/070201.230912.171951.274150/000300.231003.231959.048343.docx', 0),
('000300.231003.232031.972087', '070201.230912.171951.880215', 'Informe de Justificación del Condicionamiento', 'docx', 33345, '../adj/07/02/01/070201.230912.171951.880215/000300.231003.232031.972087.docx', 0),
('000300.231003.232126.490115', '070201.230912.171951.105263', 'Plantilla Documentación del Sistema de Calidad', 'docx', 57907, '../adj/07/02/01/070201.230912.171951.105263/000300.231003.232126.490115.docx', 0),
('000300.231003.232217.589912', '070201.230912.171951.185235', 'Acta de reunión', 'docx', 33106, '../adj/07/02/01/070201.230912.171951.185235/000300.231003.232217.589912.docx', 0),
('000300.231003.232258.118004', '070201.230912.171951.774512', 'Albarán de entrega', 'docx', 33552, '../adj/07/02/01/070201.230912.171951.774512/000300.231003.232258.118004.docx', 0),
('000300.231003.232358.107199', '070201.230912.171951.411256', 'Acta de Asistencia a cursos', 'docx', 33123, '../adj/07/02/01/070201.230912.171951.411256/000300.231003.232358.107199.docx', 0),
('000300.231003.232455.435585', '070201.230912.171951.658412', 'Diploma', 'ppt', 174592, '../adj/07/02/01/070201.230912.171951.658412/000300.231003.232455.435585.ppt', 0),
('000300.231003.232541.830872', '070201.230912.171951.134152', 'Cuestionario Evaluación Accion Formativa', 'docx', 38724, '../adj/07/02/01/070201.230912.171951.134152/000300.231003.232541.830872.docx', 0),
('000300.231003.232623.678701', '070201.230912.171951.552036', 'Certificado Garantía', 'docx', 29836, '../adj/07/02/01/070201.230912.171951.552036/000300.231003.232623.678701.docx', 0),
('000300.231003.232716.879756', '070201.230912.171951.224102', 'Hoja de registro de Trabajos', 'docx', 30279, '../adj/07/02/01/070201.230912.171951.224102/000300.231003.232716.879756.docx', 0),
('000300.231003.232804.775098', '070201.230912.171951.320232', 'Documentación Expediente-Proyecto Clasificado TDE', 'docx', 116283, '../adj/07/02/01/070201.230912.171951.320232/000300.231003.232804.775098.docx', 0),
('000300.231003.232827.647464', '070201.230912.171951.320232', 'Documentación Expediente-Proyecto Clasificado TSOL', 'docx', 116513, '../adj/07/02/01/070201.230912.171951.320232/000300.231003.232827.647464.docx', 0),
('000300.231003.232910.322876', '070201.230912.171951.741852', 'Requisitos para la confirmación metrológica (Ed2)', 'pdf', 70259, '../adj/07/02/01/070201.230912.171951.741852/000300.231003.232910.322876.pdf', 0),
('000300.231003.232934.814871', '070201.230912.171951.741852', 'Requisitos para la confirmación metrológica (Ed2)', 'docx', 51975, '../adj/07/02/01/070201.230912.171951.741852/000300.231003.232934.814871.docx', 0),
('000300.231003.233029.975571', '070201.230913.103600.147147', 'Plan de Calidad_TDE', 'docx', 2225331, '../adj/07/02/01/070201.230913.103600.147147/000300.231003.233029.975571.docx', 0),
('000300.231003.233054.754485', '070201.230913.103600.147147', 'Plan de Calidad_TSOL', 'docx', 2226302, '../adj/07/02/01/070201.230913.103600.147147/000300.231003.233054.754485.docx', 0),
('000300.231003.233130.245906', '070201.230913.103700.658542', 'Plan de Gestión de Riesgos_TDE', 'docx', 255852, '../adj/07/02/01/070201.230913.103700.658542/000300.231003.233130.245906.docx', 0),
('000300.231003.233157.107824', '070201.230913.103700.658542', 'Plan de Gestión de Riesgos_TSOL', 'docx', 257164, '../adj/07/02/01/070201.230913.103700.658542/000300.231003.233157.107824.docx', 0),
('000300.231003.233258.684492', '070201.230913.103800.352035', 'Plan de Seguridad_TDE', 'docx', 107069, '../adj/07/02/01/070201.230913.103800.352035/000300.231003.233258.684492.docx', 0),
('000300.231003.233318.767734', '070201.230913.103800.352035', 'Plan de Seguridad_TSOL', 'docx', 107550, '../adj/07/02/01/070201.230913.103800.352035/000300.231003.233318.767734.docx', 0),
('000300.231003.233354.248721', '070201.230913.103842.032574', 'Plan de gestión de configuración TDE', 'docx', 166488, '../adj/07/02/01/070201.230913.103842.032574/000300.231003.233354.248721.docx', 0),
('000300.231003.233413.154237', '070201.230913.103842.032574', 'Plan de gestión de configuración TSOL', 'docx', 166078, '../adj/07/02/01/070201.230913.103842.032574/000300.231003.233413.154237.docx', 0),
('000300.231003.233455.921227', '070201.230913.103900.982001', 'Justificación del estado de la Configuración_TDE', 'docx', 83276, '../adj/07/02/01/070201.230913.103900.982001/000300.231003.233455.921227.docx', 0),
('000300.231003.233517.004402', '070201.230913.103900.982001', 'Justificación del estado de la Configuración_TSOL', 'docx', 83387, '../adj/07/02/01/070201.230913.103900.982001/000300.231003.233517.004402.docx', 0),
('000300.231003.233600.953955', '070201.230913.104000.523051', 'Informe de Auditoría de la Configuración_TDE', 'docx', 77528, '../adj/07/02/01/070201.230913.104000.523051/000300.231003.233600.953955.docx', 0),
('000300.231003.233620.876676', '070201.230913.104000.523051', 'Informe de Auditoría de la Configuración_TSOL', 'docx', 77479, '../adj/07/02/01/070201.230913.104000.523051/000300.231003.233620.876676.docx', 0),
('000300.231003.233704.578760', '070201.230913.104052.410201', 'Documento de Pruebas_TDE', 'docx', 262374, '../adj/07/02/01/070201.230913.104052.410201/000300.231003.233704.578760.docx', 0),
('000300.231003.233726.399831', '070201.230913.104052.410201', 'Documento de Pruebas_TSOL', 'docx', 263717, '../adj/07/02/01/070201.230913.104052.410201/000300.231003.233726.399831.docx', 0),
('000300.231003.233808.045491', '070201.230913.104100.112587', 'Plantilla_Informe Cierre de Proyecto TDE', 'docx', 85330, '../adj/07/02/01/070201.230913.104100.112587/000300.231003.233808.045491.docx', 0),
('000300.231003.233828.055927', '070201.230913.104100.112587', 'Plantilla_Informe Cierre de Proyecto TSOL', 'docx', 82223, '../adj/07/02/01/070201.230913.104100.112587/000300.231003.233828.055927.docx', 0),
('000300.231003.233913.028488', '070201.230913.104200.141025', 'Plantilla Actuación durante la fase de Garantía TDE', 'docx', 1058842, '../adj/07/02/01/070201.230913.104200.141025/000300.231003.233913.028488.docx', 0),
('000300.231003.233935.691300', '070201.230913.104200.141025', 'Plantilla Actuación durante la fase de Garantía TSOL', 'docx', 1061271, '../adj/07/02/01/070201.230913.104200.141025/000300.231003.233935.691300.docx', 0),
('000300.231003.234035.143677', '070201.230913.104234.521042', 'Check-List para Jefes de proyecto', 'pdf', 61783, '../adj/07/02/01/070201.230913.104234.521042/000300.231003.234035.143677.pdf', 0),
('000300.231003.234054.467430', '070201.230913.104234.521042', 'Check-List para Jefes de proyecto', 'xlsx', 28090, '../adj/07/02/01/070201.230913.104234.521042/000300.231003.234054.467430.xlsx', 0),
('000300.231003.234222.107640', '070201.230913.104300.241523', 'Plantilla Matriz de Trazabilidad', 'docx', 23719, '../adj/07/02/01/070201.230913.104300.241523/000300.231003.234222.107640.docx', 0),
('000300.231003.234244.462654', '070201.230913.104300.241523', 'Plantilla Matriz de Trazabilidad', 'xlsx', 11671, '../adj/07/02/01/070201.230913.104300.241523/000300.231003.234244.462654.xlsx', 0);

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
-- Estructura de tabla para la tabla `00_buzon`
--

CREATE TABLE `00_buzon` (
  `id` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` date DEFAULT NULL,
  `selector` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `reporte` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `atendida` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('000000-190220162300', '¿Sabes lo que se gana cuando uno pierde? Experiencia', 'Ángel Jurado Castillejo', '20/02/2019', 0),
('000000-190226155001', 'El caos es un orden por descubrir', 'Ángel Jurado Castillejo', '26/02/2019', 0),
('000000-190228162200', 'Se puede cambiar de mujer, pero no de equipo de fútbol', 'Ángel Jurado Castillejo', '28/02/2019', 0),
('000000-190301132701', 'Me es indiferente, inverosimil, e incluso inoperante', 'Mariló Carrasco Moreno', '01/03/2019', 0),
('000000-190319162400', '30 segundos después de decir que un perfume huele a campiña inglesa: \"Como si supiera yo a qué coño huele la campiña inglesa\"', 'Ángel Jurado Castillejo', '19/03/2019', 0),
('000000-190322133001', '*Javier consultando la web de calidad con el equipo de calidad*\r\n¡Hala! ¿Y si pinchas ahí te lleva?', 'Javier Mendoza Cano', '22/03/2019', 0),
('000000-190329155001', 'Si fuera fácil, lo haría otro', 'Fernando Lázaro Díaz', '29/03/2019', 1),
('000000-190402162000', 'Todas las acciones que hacemos en nuestra vida están encaminadas al sexo', 'Ángel Jurado Castillejo', '02/04/2019', 0),
('000000-190405162800', 'El concepto es que el local te abrace', 'Pedro Duarte Bravo', '05/04/2019', 0),
('000000-190408161900', 'Yo no tengo propiedades, solo mi cepillo de dientes y mi conocimiento', 'Ángel Jurado Castillejo', '08/04/2019', 0),
('000000-190409161701', 'Los rusos, los alemanes y los extremeños conquistaremos el mundo', 'Antonio Garrido', '09/04/2019', 0),
('000000-190410162400', 'Ahora te echo de menos lo mismo que antes de echaba de más', 'Ángel Luis Sánchez Cesteros', '10/04/2019', 0),
('000000-190412162900', 'Me gusta el arroz en todas sus vertientes', 'Mariló Carrasco Moreno', '12/04/2019', 0),
('000000-190424162100', 'Los cojines de mi cama esta noche se van a tomar por culo. Odio las cosas poco prácticas', 'Ángel Jurado Castillejo', '24/04/2019', 0),
('000000-190424162800', 'Yo siempre cojo la más larga', 'Mariló Carrasco Moreno', '24/04/2019', 0),
('000000-190506161400', 'No hay que compartir las propiedades. Sólo trae problemas.', 'Ana Rubio Canales', '06/05/2019', 1),
('000000-190730161500', 'He tenido que llegar yo para poner orden aquí', 'Sergio García Montalvo', '30/07/2019', 1),
('000000-190808162900', 'Y encima, el paracetamol ahora es con receta.', 'Mariló Carrasco Moreno', '08/08/2019', 0),
('000000-190812162001', 'No hay peor soledad que la que es en compañía', 'Eduardo Martínez Fernández', '12/08/2019', 1),
('000000-191031162200', 'El lenguaje no verbal dice muchas cosas', 'Pedro Duarte Bravo', '31/10/2019', 0),
('000000-200224161600', 'Los calidad siempre lo hacemos todo por detrás', 'Mariló Carrasco Moreno', '24/02/2020', 0),
('000000-230210104601', 'Cuando trabajas en lo que te gusta, no trabajas ningún día', 'Sergio García Montalvo', 'Fecha sin determinar', 1),
('000000-230214160201', '[Auditor] ¿Con quién vais en UTE?\n[Ana] Con AICOX Soluciones\n[Fátima] Más bien AICOX problemas', 'Fátima del Rosario Muñoz Curado', '14/02/2023', 0),
('000000-2302141603401', '[Ana] ¿Tendrá AICOX el informe de revisión de la oferta?\r\n[Sergio] Si, en la misma carpeta que la gestión de configuración', 'Sergio García Montalvo', '14/02/2023', 0),
('000000-230215101401', 'mm-hum', 'Antonio Sánchez Tejero', 'Siempre', 1),
('000000-230221180401', 'Tú déjale, a ver por dónde respira', 'Ana Rubio Canales', '21/02/2023', 1),
('000000-230222092801', 'Yo no puedo ir, tengo médico', 'Andrés Martinez Antón', 'Siempre', 1),
('000000-230413160100', 'Ah, ¿Qué Lozano mete la mano?', 'Martina Torralba Rodríguez', '13/04/2023', 0),
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
  `namespace` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `modelo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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
('060501', '06. Planificación', 'Estado Proyecto de Mejora', 0, '06', '05', '01', 'ModelProyectoMejora', 'EstadoProyectoMejora', '06_proyectosmejora', '06_proyectosmejora_estados', '', 'ico__documento', ''),
('070101', '07. Apoyo', 'Procedimiento', 0, '07', '01', '01', 'ModelInformacionDocumentada', 'Documento', '07_informaciondocumentada', '07_documentacion', '', 'ico__documento', ''),
('070102', '07. Apoyo', 'Manual', 0, '07', '01', '02', 'ModelInformacionDocumentada', 'Documento', '07_informaciondocumentada', '07_documentacion', '', 'ico__documento', ''),
('070103', '07. Apoyo', 'Instrucción', 0, '07', '01', '03', 'ModelInformacionDocumentada', 'Documento', '07_informaciondocumentada', '07_documentacion', '', 'ico__documento', ''),
('070104', '07. Apoyo', 'Guía', 0, '07', '01', '04', 'ModelInformacionDocumentada', 'Documento', '07_informaciondocumentada', '07_documentacion', '', 'ico__documento', ''),
('070105', '07. Apoyo', 'Formato', 0, '07', '01', '05', 'ModelInformacionDocumentada', 'Documento', '07_informaciondocumentada', '07_documentacion', '', 'ico__documento', ''),
('070106', '07. Apoyo', 'Plantillas', 1, '07', '01', '06', 'ModelInformacionDocumentada', 'Documento', '07_informaciondocumentada', '07_documentacion', '', 'ico__documento', ''),
('070107', '07. Apoyo', 'Otros documentos', 0, '07', '01', '07', 'ModelInformacionDocumentada', 'Documento', '07_informaciondocumentada', '07_documentacion', '', 'ico__documento', ''),
('070108', '07. Apoyo', 'Documentación externa', 1, '07', '01', '08', '', '', '07_informaciondocumentada', '', '', '', ''),
('070109', '07. Apoyo', 'ISO 9001:2015', 1, '07', '01', '09', 'ModelDocumentacionExterna', 'ISO_9001_2015', '07_informaciondocumentada', '07_ISO_9001_2015', '/apoyo/informacion-documentada/documentacion-externa/iso_9001_2015?id=', 'ico__ISO_9001_2015', ''),
('070201', '07. Apoyo', 'Edición de un documento', 1, '07', '02', '01', 'ModelInformacionDocumentada', 'EdicionDocumento', '07_informaciondocumentada', '07_documentacion_ediciones', '/apoyo/informacion-documentada/read?id=', 'ico__documento', ''),
('070202', '07. Apoyo', 'Revisión de un documento', 0, '07', '02', '02', '', '', '07_informaciondocumentada', '07_documentacion_revisiones', '', 'ico__documento', ''),
('070301', '07. Apoyo', 'Equipo de medida', 0, '07', '03', '01', '', '', '', '', '', '', ''),
('070401', '07. Apoyo', 'Comunicado', 0, '07', '04', '01', 'ModelComunicado', 'Comunicado', '07_comunicados', '07_comunicados', '/apoyo/comunicados/comunicado?id=', 'ico__noticias ', ''),
('070501', '07. Apoyo', 'Personal', 0, '07', '05', '01', 'ModelGeneral', 'Personal', '00_general', '00_personal', '/apoyo/recursos/personal/read?id=', 'ico__usuario', ''),
('070502', '07. Apoyo', 'Recurso', 0, '07', '05', '02', '', '', '', '', '', '', ''),
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
-- Estructura de tabla para la tabla `00_indice`
--

CREATE TABLE `00_indice` (
  `id` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codigo_interno` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'N/A',
  `denominador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `comentarios` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rutaIndex` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ico` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `elementoSistema` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `00_indice`
--

INSERT INTO `00_indice` (`id`, `codigo_interno`, `denominador`, `comentarios`, `rutaIndex`, `ico`, `elementoSistema`) VALUES
('10', 'N/A', 'Mejora', '', '/mejora?id=', 'ico__progreso', 'índice'),
('10.1', 'N/A', 'No Conformidad y acción correctiva', '', '/obras?id=', 'ico__progreso', 'índice'),
('10.2', 'N/A', 'Mejora continua', '', '/obras?id=', 'ico__progreso', 'índice'),
('4', 'N/A', 'Contexto', '', '/contexto?id=', 'ico__internet ', 'índice'),
('4.1', 'N/A', 'Comprensión de la organización y de su contexto', '', '/contexto/analisisContexto?id=', 'ico__internet ', 'índice'),
('4.2', 'N/A', 'Necesidades y expectativas de las Partes Interesadas', '', '/contexto/partesinteresadas?id=', 'ico__miembros', 'índice'),
('4.3', 'N/A', 'Determinación del Alcance del sistema de gestón de la calidad', '', '/contexto/alcance?id=', 'ico__target', 'índice'),
('4.4', 'N/A', 'Sistema de gestión de la calidad y sus procesos', '', '/contexto/procesos?id=', 'ico__intranet', 'índice'),
('4.5', 'N/A', 'Misión y visión', '', '/contexto/mision?id=', 'ico__bandera', 'índice'),
('5', 'N/A', 'Liderazgo', '', '/liderazgo?id=', 'ico__equipo', 'índice'),
('5.1', 'N/A', 'Liderazgo y compromiso', '', '/liderazgo/liderazgo?id=', 'ico__equipo', 'índice'),
('5.2', 'N/A', 'Política', '', '/liderazgo/politica?id=', 'ico__museo', 'índice'),
('5.3', 'N/A', 'Roles, responsabilidades y autoridades en la organización', '', '/liderazgo/roles?id=', 'ico__cuidar', 'índice'),
('6', 'N/A', 'Planificación', '', '/planificacion?id=', 'ico__diana', 'índice'),
('6.1', 'N/A', 'Acciones para abordar riesgos y oportunidades del sistema', 'Riesgos y oportunidades de proceso, procesos', '/planificacion/riesgos-oportunidades?id=', 'ico__teatro', 'índice'),
('6.2', 'N/A', 'Objetivos de la calidad y planificación para lograrlos', '', '/obras?id=', 'ico__diana', 'índice'),
('6.3', 'N/A', 'Proyectos de mejora', 'Proyectos de mejora, Planificación de los cambios', '/planificacion/proyectos-mejora?id=', 'ico__copa', 'índice'),
('6.4', 'N/A', 'Planes de acción', 'Planes de acción, Planificación de los cambios', '/planificacion/planificacion-cambios?id=', 'ico__rutarecorrido', 'índice'),
('7', 'N/A', 'Apoyo', '', '/apoyo?id=', 'ico__callcenter', 'índice'),
('7.1', 'N/A', 'Recursos', '', '/obras?id=', 'ico__subidaDinero', 'índice'),
('7.2', 'N/A', 'Competencia', '', '/obras?id=', 'ico__edificio', 'índice'),
('7.3', 'N/A', 'Toma de conciencia', '', '/obras?id=', 'ico__cerebro', 'índice'),
('7.4', 'N/A', 'Comunicación', 'Comunicados, Comunicación, Mensajes', '/apoyo/comunicados?id=', 'ico__noticias', 'índice'),
('7.5', 'N/A', 'Documentación interna', 'Información documentada, procedimientos, manuales, instrucciones, guias', '/apoyo/informacion-documentada?id=', 'ico__documento', 'índice'),
('7.6', 'N/A', 'Otra documentación', 'Información documentada, externa, ISO 9001 2015, ISO 9001:2015, PECAL 2110, 2210', '/apoyo/informacion-documentada?id=', 'ico__documento', 'índice'),
('8', 'N/A', 'Operación', '', '/operacion?id=', 'ico__serviciotecnico', 'índice'),
('8.1', 'N/A', 'Planificación y control operacional', '', '/obras?id=', 'ico__serviciotecnico', 'índice'),
('8.2', 'N/A', 'Requisitos para los productos y servicios', '', '/obras?id=', 'ico__carrito', 'índice'),
('8.3', 'N/A', 'Diseño y desarrollo de productos y servicios', '', '/obras?id=', 'ico__regla', 'índice'),
('8.4', 'N/A', 'Control de procesos, productos y servicios suministrados externamente', '', '/obras?id=', 'ico__maletas_carro', 'índice'),
('8.5', 'N/A', 'Producción y provisión del servicio', '', '/obras?id=', 'ico__caja', 'índice'),
('8.6', 'N/A', 'Liberación de los productos', '', '/obras?id=', 'ico__camion', 'índice'),
('8.7', 'N/A', 'Control de salidas no conformes', '', '/obras?id=', 'ico__cancelar', 'índice'),
('9', 'N/A', ' Evaluación del Desempeño', '', '/desempeno?id=', 'ico__podium', 'índice'),
('9.1', 'N/A', 'Seguimiento, medición. análisis y evaluación', 'Indicadores', '/obras?id=', 'ico__velocidad', 'índice'),
('9.2', 'N/A', 'Auditoría', 'Auditorías, auditoría interna, auditoría externa, AENOR', '/obras?id=', 'ico__podium ', 'índice'),
('9.3', 'N/A', 'Revisión por la dirección', '', '/obras?id=', 'ico__grupo', 'índice'),
('9.4', 'N/A', 'Reuniones de comité', 'Revisión por la dirección, Alta dirección', '/obras?id=', 'ico__grupo', 'índice');

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
  `data_old` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `data_new` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `denominador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_ref1` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_ref2` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_ref3` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `category` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '1- Calidad, 2-proyectos, 3-Gerencia, 4-Otros',
  `subcategory` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bitacora` int NOT NULL DEFAULT '1' COMMENT '0-No aplica en bitácora. 1-Aplica en bitácora. Al eliminar en bitácora, haría update a este parámetro.',
  `date` datetime DEFAULT NULL,
  `user` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `00_log`
--

INSERT INTO `00_log` (`id`, `auto`, `crud`, `model`, `property`, `data_old`, `data_new`, `denominador`, `id_ref1`, `id_ref2`, `id_ref3`, `category`, `subcategory`, `bitacora`, `date`, `user`) VALUES
('000600.231004.090729.235722', 1, 1, 'Adjunto', 'N/A', '', '', '', '000300.231004.090729.174347', '040600.220509.143601.285599', '', 'N/A', 'N/A', 1, '2023-10-04 09:07:29', '070501.217144.327751.798139'),
('000600.231004.090744.040150', 1, 1, 'Adjunto', 'N/A', '', '', '', '000300.231004.090743.979765', '040600.220509.143601.285599', '', 'N/A', 'N/A', 1, '2023-10-04 09:07:44', '070501.217144.327751.798139'),
('000600.231004.090759.940819', 1, 1, 'Adjunto', 'N/A', '', '', '', '000300.231004.090759.871658', '040600.220509.143601.285599', '', 'N/A', 'N/A', 1, '2023-10-04 09:07:59', '070501.217144.327751.798139'),
('000600.231004.100552.704046', 1, 1, 'Adjunto', 'N/A', '', '', '', '000300.231004.100552.648605', '040600.220509.143601.285599', '', 'N/A', 'N/A', 1, '2023-10-04 10:05:52', '070501.217144.327751.798139');

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
('070501.190248.606793.715299', 'franciscojose.molinamena@telefonica.com', 0),
('070501.190362.916599.159953', 'angelluis.martinolivenza@telefonica.com', 0),
('070501.190692.601417.176539', 'cristina.serranonuñez@telefonica.com', 0),
('070501.190971.277908.138694', 'ignacioalvaro.bruquetasgalan@telefonica.com', 0),
('070501.191248.608158.170884', 'jose.perezdionisio@telefonica.com', 0),
('070501.191956.544298.595256', 'angeles.cabezasmiguel@telefonica.com', 0),
('070501.192324.692978.733855', 'javier.mendozacano@telefonica.com', 0),
('070501.192665.137893.450503', 'mariajesus.garzonladronguevara@telefonica.com', 0),
('070501.192941.273241.995135', 'felix.sanchezpimentel@telefonica.com', 0),
('070501.193552.373008.173775', 'angel.lozanogarcia-prieto@telefonica.com', 0),
('070501.193690.319420.849939', 'luis.sanchezsanchez@telefonica.com', 0),
('070501.195266.217931.759721', 'marta.garridovaamonde@telefonica.com', 0),
('070501.195823.608930.729946', 'fernando.guerrerobraojos@telefonica.com', 0),
('070501.196196.739183.716643', 'fatimadelrosario.munozcurado@telefonica.com', 1),
('070501.198716.843183.521499', 'javier.ciruelosgil@telefonica.com', 0),
('070501.199040.100712.149229', 'andres.martinezanton.ext@telefonica.com', 0),
('070501.199085.486829.606094', 'marioasher.barcessatserruya@telefonica.com', 0),
('070501.200281.863892.621202', 'angelluis.sanchezcesteros@telefonica.com', 0),
('070501.200751.656250.942986', 'carlos.alonsocarmona@telefonica.com', 0),
('070501.201500.726930.433482', 'aitor.solarazcona@telefonica.com', 0),
('070501.201766.836287.896596', 'andres.romandelperal@telefonica.com', 1),
('070501.201997.321167.505976', 'alvaro.gonzalezcaballero@telefonica.com', 0),
('070501.202624.973659.440607', 'fernando.lazarodiaz@telefonica.com', 0),
('070501.204491.491986.480920', 'esperanza.delalamoarriba@telefonica.com', 1),
('070501.204752.576832.325427', 'cristina.gomezsimon@telefonica.com', 0),
('070501.204813.361188.752401', 'felipe.carvajaljimenez@telefonica.com', 0),
('070501.208210.873490.730583', 'asuncion.lopezzorrilla@telefonica.com', 0),
('070501.208731.128030.754785', 'mariadolores.carrascomoreno@telefonica.com', 0),
('070501.208920.641678.763434', 'angel.juradocastillejo@telefonica.com', 0),
('070501.209133.110533.565851', 'anamaria.rubiocanales@telefonica.com', 1),
('070501.209353.281258.481489', 'pedro.amorzarate@telefonica.com', 0),
('070501.211297.674578.546240', 'raulangel.pallasnunez@telefonica.com', 0),
('070501.212023.478077.232008', 'sergio.moratovillar@telefonica.com', 0),
('070501.214170.420708.945285', 'jesusmanuel.ramoscano@telefonica.com', 0),
('070501.214189.306367.190066', 'pedromaria.garcialiquete@telefonica.com', 0),
('070501.214644.713904.330649', 'susana.gonzalezmatesanz@telefonica.com', 0),
('070501.215303.408223.723843', 'martina.torralbarodriguez@telefonica.com', 1),
('070501.216089.801025.949144', 'joseluis.merchaniglesias@telefonica.com', 0),
('070501.217144.327751.798139', 'sergio.garciamontalvo@telefonica.com', 1),
('070501.217846.320900.901327', 'juliobenedicto.vicariomancho@telefonica.com', 0),
('070501.218216.850081.419829', 'gustavo.jonssongarrido@telefonica.com', 0),
('070501.218906.340606.522313', 'carlos.cuadradogalvan@telefonica.com', 0),
('070501.219291.679129.958554', 'luis.manasmaldonado@telefonica.com', 0),
('070501.220457.441683.593641', 'alvaro.garciaramiro@telefonica.com', 0),
('070501.220458.830273.139428', 'antonio.sancheztejero@telefonica.com', 0),
('070501.220687.333776.114050', 'pedro.duartebravo@telefonica.com', 0),
('070501.221194.139968.522155', 'daniel.gilsantiuste@telefonica.com', 0),
('070501.221878.393594.691590', 'eduardo.martinezfernandez1@telefonica.com', 0),
('070501.222010.677856.274265', 'leticia.roldanmontero@telefonica.com', 0),
('070501.223484.206544.531864', 'ricardo.bardotorres@telefonica.com', 0),
('070501.224055.190293.795897', 'santiago.sandovaligelmo@telefonica.com', 0),
('070501.225923.324285.859535', 'emma.delgadillogomez@telefonica.com', 0),
('070501.226417.553258.396903', 'alejandro.garcialazaro@telefonica.com', 0),
('070501.227385.840699.401378', 'josemaria.garciaasensio@telefonica.com', 0),
('070501.227481.663646.892511', 'tomas.sancholopez@telefonica.com', 0),
('070501.228178.486891.397803', 'josemanuel.garciajimenez@telefonica.com', 0),
('070501.228860.903788.720620', 'joseluis.delgadomarin@telefonica.com', 0),
('070501.229065.412062.831096', 'miguelangel.gomezsanchez@telefonica.com', 0),
('070501.229577.669213.837696', 'joseramon.valhondoquiros@telefonica.com', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `00_personal`
--

CREATE TABLE `00_personal` (
  `id` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `primer_apellido` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `segundo_apellido` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `matricula` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefono_fijo` int DEFAULT NULL,
  `telefono_movil` int DEFAULT NULL,
  `empresa` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rol` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cargo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `estado` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `00_personal`
--

INSERT INTO `00_personal` (`id`, `user`, `email`, `nombre`, `primer_apellido`, `segundo_apellido`, `matricula`, `telefono_fijo`, `telefono_movil`, `empresa`, `rol`, `cargo`, `estado`) VALUES
('070501.000000.000000.000000', '002000.000000.000000.000000', 'user@telefonica.com', 'Usuario', 'de', 'Prueba', '0', 0, 0, '0', 'Ingeniería', 'Ingeniería', 0),
('070501.190248.606793.715299', NULL, 'franciscojose.molinamena@telefonica.com', 'Francisco José', 'Molina', 'Mena', '', 0, 0, 'TDE', 'Ingeniería', 'Director de Ingeniería y Desarrollo de Negocio', 1),
('070501.190362.916599.159953', '000200.230922.135630.268535', 'angelluis.martinolivenza@telefonica.com', 'Ángel Luis', 'Martín', 'Olivenza', 'DS00312', 917548009, 680499162, '', 'Ingeniería', 'Ingeniería', 1),
('070501.190692.601417.176539', '', 'cristina.serranonuñez@telefonica.com', 'Cristina', 'Serrano', 'Núñez', 'TF06471', 0, 683236194, 'TIS', 'Ingeniería', 'Ingeniería', 1),
('070501.190971.277908.138694', '', 'ignacioalvaro.bruquetasgalan@telefonica.com', 'Ignacio Álvaro', 'Bruquetas', 'Galán', '129836', 915843217, 616662844, '', 'Ingeniería', 'Ingeniería', 1),
('070501.191248.608158.170884', '', 'jose.perezdionisio@telefonica.com', 'José', 'Pérez', 'Dionisio', 'T151233', 0, 608984423, '', 'Ingeniería', 'Ingeniería', 1),
('070501.191956.544298.595256', '', 'angeles.cabezasmiguel@telefonica.com', 'Mª Ángeles', 'Cabezas', 'Miguel', '', 915162965, 608479806, 'TSOL', 'Economía', 'Gestión económica', 1),
('070501.192324.692978.733855', '', 'javier.mendozacano@telefonica.com', 'Javier', 'Mendoza', 'Cano', 't151407', 915843236, 619590554, '', 'Ingeniería', 'Ingeniería', 1),
('070501.192665.137893.450503', '', 'mariajesus.garzonladronguevara@telefonica.com', 'María Jesús', 'Garzón', 'Ladrón Guevara', '127576', 915845337, 608485591, '', 'Ingeniería', 'Ingeniería', 1),
('070501.192941.273241.995135', '', 'felix.sanchezpimentel@telefonica.com', 'Félix', 'Sánchez', 'Pimentel', 'Tf06315', 915843209, 648291979, 'TIS', 'Ingeniería', 'Ingeniería', 1),
('070501.193552.373008.173775', '000200.230922.134556.743073', 'angel.lozanogarcia-prieto@telefonica.com', 'Ángel', 'Lozano', 'García-Prieto', 'UT04304', 680011555, 639249756, '', 'Ingeniería', 'Ingeniería', 1),
('070501.193690.319420.849939', '', 'luis.sanchezsanchez@telefonica.com', 'Luis', 'Sanchez', 'Sanchez', 'DS00392', 914543619, 695341309, '', 'Ingeniería', 'Ingeniería', 1),
('070501.195266.217931.759721', '', 'marta.garridovaamonde@telefonica.com', 'Marta', 'Garrido', 'Vaamonde', '151073', 915843232, 616827255, '', 'Ingeniería', 'Ingeniería', 1),
('070501.195823.608930.729946', '', 'fernando.guerrerobraojos@telefonica.com', 'Fernando', 'Guerrero', 'Braojos', '151933', 914832043, 699586080, '', 'Ingeniería', 'Ingeniería', 1),
('070501.196196.739183.716643', '002000.204606.740232.761559', 'fatimadelrosario.munozcurado@telefonica.com', 'Fátima del Rosario', 'Muñoz', 'Curado', '', 0, 0, 'TIS', 'Calidad', 'Técnico de calidad', 1),
('070501.198716.843183.521499', '', 'javier.ciruelosgil@telefonica.com', 'Javier', 'Ciruelos', 'Gil', 'DS00349', 917547992, 646486556, '', 'Ingeniería', 'Ingeniería', 1),
('070501.199040.100712.149229', '', 'andres.martinezanton.ext@telefonica.com', 'Andrés', 'Martinez', 'Antón', 'TFX0569', 0, 639440100, 'TIS', 'Ingeniería', 'Informática', 0),
('070501.199085.486829.606094', '', 'marioasher.barcessatserruya@telefonica.com', 'Mario', 'Acher', 'Barcessat Serruya', 'DS01379', 917547981, 638884672, '', 'Ingeniería', 'Ingeniería', 1),
('070501.200281.863892.621202', '', 'angelluis.sanchezcesteros@telefonica.com', 'Ángel Luis', 'Sánchez', 'Cesteros', '130911', 915161738, 618667784, '', 'Ingeniería', 'Ingeniería', 1),
('070501.200751.656250.942986', '', 'carlos.alonsocarmona@telefonica.com', 'Carlos', 'Alonso', 'Carmona', 'ut06185', 680010206, 676046606, '', 'Ingeniería', 'Ingeniería', 1),
('070501.201500.726930.433482', '000200.230922.132555.626163', 'aitor.solarazcona@telefonica.com', 'Aitor', 'Solar', 'Azcona', 'TF06351', 917548027, 682000827, 'TIS', 'Ingeniería', 'Ingeniería', 1),
('070501.201766.836287.896596', '002000.230224.090000.000003', 'andres.romandelperal@telefonica.com', 'Andrés', 'Román', 'del Peral', 'tf04681', 917547709, 630004598, 'TIS', 'Admin', 'Informática', 1),
('070501.201997.321167.505976', '000200.230922.133133.492043', 'alvaro.gonzalezcaballero@telefonica.com', 'Álvaro', 'González', 'Caballero', '', 0, 0, 'TDE', 'Ingeniería', 'Ingeniería', 1),
('070501.202624.973659.440607', '', 'fernando.lazarodiaz@telefonica.com', 'Fernando', 'Lázaro', 'Díaz', 'DS01474', 917548003, 686972853, '', 'Ingeniería', 'Ingeniería', 1),
('070501.204491.491986.480920', '', 'esperanza.delalamoarriba@telefonica.com', 'Esperanza', 'Del Alamo', 'Arriba', 'DS00261', 917547997, 608278715, '', 'Otros', 'Administrativo', 1),
('070501.204752.576832.325427', '', 'cristina.gomezsimon@telefonica.com', 'Cristina', 'Gómez', 'Simon', 'UT04698', 680013373, 699079634, '', 'Ingeniería', 'Administrativo', 0),
('070501.204813.361188.752401', '', 'felipe.carvajaljimenez@telefonica.com', 'Felipe', 'Carvajal', 'Jiménez', '139421', 914543624, 629060734, '', 'Ingeniería', 'Ingeniería', 0),
('070501.208731.128030.754785', '', 'mariadolores.carrascomoreno@telefonica.com', 'María Dolores', 'Carrasco', 'Moreno', 'Tf06091', 917548043, 683529608, 'TIS', 'Otros', 'Administrativo', 1),
('070501.208920.641678.763434', '000200.230922.135025.689137', 'angel.juradocastillejo@telefonica.com', 'Ángel', 'Jurado', 'Castillejo', 'T127379', 915843216, 639112451, '', 'Calidad', 'Ingeniería', 1),
('070501.209133.110533.565851', '002000.195456.187792.880231', 'anamaria.rubiocanales@telefonica.com', 'Ana María', 'Rubio', 'Canales', 'T151894', 915843238, 626996656, 'TDE', 'Calidad', 'Representante de Calidad', 1),
('070501.209353.281258.481489', '', 'pedro.amorzarate@telefonica.com', 'Pedro Ángel', 'Amor', 'Zarate', 'T146119', 915843228, 626136888, '', 'Ingeniería', 'Ingeniería', 1),
('070501.212023.478077.232008', '', 'sergio.moratovillar@telefonica.com', 'Sergio', 'Morato', 'Villar', '151187', 915843234, 638263394, '', 'Ingeniería', 'Ingeniería', 1),
('070501.214170.420708.945285', '', 'jesusmanuel.ramoscano@telefonica.com', 'Jesús Manuel', 'Ramos', 'Cano', 'DS00474', 917547980, 609443899, '', 'Ingeniería', 'Ingeniería', 1),
('070501.214189.306367.190066', '', 'pedromaria.garcialiquete@telefonica.com', 'Pedro María', 'García', 'Liquete', 'DS01809', 917548503, 638730725, '', 'Ingeniería', 'Ingeniería', 1),
('070501.214644.713904.330649', '', 'susana.gonzalezmatesanz@telefonica.com', 'Susana', 'González', 'Matesanz', 'DS01300', 915162752, 616854331, '', 'Ingeniería', 'Ingeniería', 1),
('070501.215303.408223.723843', '002000.230224.090000.000002', 'martina.torralbarodriguez@telefonica.com', 'Martina', 'Torralba', 'Rodríguez', '', 0, 0, 'TIS', 'Otros', 'Otros', 1),
('070501.216089.801025.949144', '', 'joseluis.merchaniglesias@telefonica.com', 'José Luis', 'Merchán', 'Iglesias', 'DS00371', 917548010, 699848009, '', 'Ingeniería', 'Ingeniería', 1),
('070501.217144.327751.798139', '002000.213230.952949.653770', 'sergio.garciamontalvo@telefonica.com', 'Sergio', 'García', 'Montalvo', 'Tf06171', 917548040, 696508095, 'TIS', 'Admin', 'Técnico de calidad', 1),
('070501.217846.320900.901327', '', 'juliobenedicto.vicariomancho@telefonica.com', 'Julio Benedicto', 'Vicario', 'Mancho', 'UT05690', 680011264, 690140390, '', 'Ingeniería', 'Ingeniería', 1),
('070501.218216.850081.419829', '', 'gustavo.jonssongarrido@telefonica.com', 'Gustavo', 'Jonsson', 'Garrido', '', 0, 0, '', 'Economía', 'Jefe de Control Gestión de Recursos', 1),
('070501.219291.679129.958554', '', 'luis.manasmaldonado@telefonica.com', 'Luis', 'Mañas', 'Maldonado', '', 0, 0, '', 'Ingeniería', 'Ingeniería', 0),
('070501.220457.441683.593641', '000200.230922.134210.217318', 'alvaro.garciaramiro@telefonica.com', 'Álvaro', 'Garcia', 'Ramiro', 'TF06117', 917547994, 645696172, 'TIS', 'Ingeniería', 'Ingeniería', 1),
('070501.220458.830273.139428', '', 'antonio.sancheztejero@telefonica.com', 'Antonio', 'Sánchez', 'Tejero', 'ds00275', 917548024, 696467553, '', 'Ingeniería', 'Ingeniería', 1),
('070501.220687.333776.114050', '', 'pedro.duartebravo@telefonica.com', 'Pedro', 'Duarte', 'Bravo', 'DS00246', 917547999, 608534202, '', 'Ingeniería', 'Ingeniería', 1),
('070501.221194.139968.522155', '', 'daniel.gilsantiuste@telefonica.com', 'Daniel', 'Gil', 'Santiuste', 'T734456', 0, 659829441, 'TDE', 'Ingeniería', 'Ingeniería', 1),
('070501.221878.393594.691590', '002000.205218.772403.492331', 'eduardo.martinezfernandez1@telefonica.com', 'Eduardo', 'Martínez', 'Fernández', '', 0, 0, 'TDE', 'Economía', 'Gestión económica', 1),
('070501.222010.677856.274265', '', 'leticia.roldanmontero@telefonica.com', 'Leticia', 'Roldán', 'Montero', '', 0, 0, 'TDE', 'Ingeniería', 'Ingeniería', 1),
('070501.223484.206544.531864', '', 'ricardo.bardotorres@telefonica.com', 'Ricardo', 'Bardo', 'Torres', '148432', 915843229, 696953079, 'TDE', 'Ingeniería', 'Gerente de Ingeniería Defensa', 1),
('070501.224055.190293.795897', '', 'santiago.sandovaligelmo@telefonica.com', 'Santiago', 'Sandoval', 'Igelmo', 'Tf04683', 914543591, 680216148, 'TIS', 'Ingeniería', 'Jefe', 1),
('070501.225923.324285.859535', '', 'emma.delgadillogomez@telefonica.com', 'Emma', 'Delgadillo', 'Gómez', '', 914820982, 639852514, 'TDE', 'Economía', 'Gestión económica', 1),
('070501.227481.663646.892511', '', 'tomas.sancholopez@telefonica.com', 'Tomás', 'Sancho', 'López', '135992', 914543613, 609249603, '', 'Ingeniería', 'Ingeniería', 1),
('070501.228178.486891.397803', '', 'josemanuel.garciajimenez@telefonica.com', 'José Manuel', 'Garcia', 'Jimenez', '151057', 915843230, 650109914, '', 'Ingeniería', 'Ingeniería', 0),
('070501.228860.903788.720620', '', 'joseluis.delgadomarin@telefonica.com', 'José Luis', 'Delgado', 'Marín', 'T152922', 915161730, 669660133, '', 'Ingeniería', 'Ingeniería', 1),
('070501.229065.412062.831096', '', 'miguelangel.gomezsanchez@telefonica.com', 'Miguel Ángel', 'Gómez', 'Sánchez', '125029', 914543633, 650666513, '', 'Ingeniería', 'Ingeniería', 0),
('070501.229577.669213.837696', '', 'joseramon.valhondoquiros@telefonica.com', 'José Ramón', 'Valhondo', 'Quirós', '', 0, 0, 'TIS', 'Calidad', 'Técnico de calidad', 0),
('070501.230921.153441.805212', '', 'fernando.durantefernandez@telefonica.com', 'Fernado', 'Durante', 'Fernández', NULL, 609269261, NULL, 'TIS', 'Ingeniería', 'Ingeniero', 1),
('070501.230921.153652.157489', '', 'javier.rivillaramos@telefonica.com', 'Javier', 'Rivilla', 'Ramos', NULL, NULL, NULL, 'TIS', 'Ingeniería', 'Ingeniero', 1),
('070501.230921.153811.910041', '', 'juan.jerezgarcia@telefonica.com', 'Juan', 'Jerez', 'García', NULL, NULL, NULL, 'TIS', 'Ingeniería', 'Jefe', 1),
('070501.230921.153984.554741', '', 'samuel.valeropantoja@telefonica.com', 'Samuel', 'Valero', 'Pantoja', NULL, NULL, NULL, 'TSOL', 'Ingeniería', 'Ingnieriero', 1),
('070501.230921.154120.320547', '', 'oswaldoandres.gaiborzavala@telefonica.com', 'Oswaldo Andrés', 'Gaibor', 'Zavala', NULL, 660168780, NULL, 'TIS', 'Ingeniería', 'Ingeniero', 1),
('070501.230921.154254.478445', '', 'tamara.sanchezlopez.ext@telefonica.com', 'Tamara', 'Sánchez', 'López', NULL, NULL, NULL, 'TIS', 'Ingeniería', 'Ingeniero', 1),
('070501.230927.113251.745121', '000200.230927.113500.735669', 'beatriz.novalgutierrez@telefonica.com', 'Beatriz', 'Noval', 'Gutierrez', 'DI10185', 917244001, 618208798, 'TIS', 'Calidad', 'Técnico de calidad', 1),
('070501.231003.154720.471220', '000200.231003.155506.272877', 'silvana.zegianinigomez@telefonica.com', 'Silvana', 'Zegianini', 'Gómez', 'DI93800207', NULL, NULL, 'IOT', 'Otros', 'Senior specialist', 1),
('070501.231003.155041.652132', '000200.231003.155522.780594', 'rocio.gomezperez@telefonica.com', 'Rocio', 'Gómez', 'Pérez', 'DI93800207', 914830706, 638441041, 'IOT', 'Otros', '-', 1),
('070501.231003.155296.358821', '000200.231003.155428.803912', 'evamaria.herastello@telefonica.com', 'Eva María', 'Heras', 'Tello', 'DI10199', 914836010, NULL, 'TECH', 'Otros', '-', 1),
('070501.231004.112654.623301', NULL, 'alvaro.alvareztoboso@telefonica.com', 'Álvaro', 'Álvarez', 'Toboso', '', 917244100, 0, 'TIS', 'Ingeniería', 'Ingeniero técnico', 1);

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
('000400.230608.132135.027573', '060101.230608.132033.804702', '040600.220509.143601.285599'),
('000400.230608.132349.260710', '060401.230608.132330.460623', '060101.230608.132033.804702'),
('000400.230608.132515.349516', '060500.230608.132515.335877', '060401.230608.132515.343072'),
('000400.230608.132531.425483', '060401.230608.132515.343072', '060101.230608.132033.804702'),
('000400.230608.133916.104290', '060101.230608.132033.804702', '060401.230608.132941.319239'),
('000400.230710.130748.465828', '060401.230608.132330.460623', '060101.230608.132033.804701'),
('000400.230710.130823.942564', '060401.230608.132330.460623', '060101.230710.122559.795141'),
('000400.230710.130849.765106', '060401.230608.132330.460623', '060101.230710.122643.967351'),
('000400.230710.130925.483290', '060401.230608.132330.460623', '060102.230608.134244.991535'),
('000400.230710.134237.073964', '060401.230710.131540.324526', '060101.230608.132033.804701'),
('000400.230710.135144.447299', '060402.230710.134953.513015', '070401.190726.170437.969659'),
('000400.230711.114341.899617', '060101.230711.114317.528892', '060401.230710.134616.214819'),
('000400.230711.114519.860007', '060101.230710.122559.795141', '060401.230608.132941.319239'),
('000400.230711.121544.062745', '060401.230711.120837.475240', '060102.230608.134244.991534'),
('000400.230711.125247.506518', '060102.230710.130049.893052', '060401.230711.124338.725055'),
('000400.230711.125318.641572', '060102.230710.130132.288664', '060401.230711.124459.110392'),
('000400.230711.130919.915242', '060102.230710.130238.305404', '040600.220509.143601.285599'),
('000400.230711.130938.447009', '060102.230710.130238.305404', '040600.220509.143602.285599'),
('000400.230711.130956.934650', '060102.230710.130238.305404', '040600.220509.143603.285599');

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
('000200.230922.132555.626163', 'aitor.solarazcona@telefonica.com', '$2y$10$OsZAiviu30TbkNkHFB/5OOm9CTik5BvKmbuSnJIXb32S7TekU2Sry'),
('000200.230922.133133.492043', 'alvaro.gonzalezcaballero@telefonica.com', '$2y$10$ArvPkNQifl9ou686vOnAgeipL5RCfI0i9c97Ys/464eQWCOTuInby'),
('000200.230922.133206.376036', 'alvaro.garciaramiro@telefonica.com', '$2y$10$U5eQae9AP3PPaMxWg6USP.x4tNKPcK4DtDRc/Wffb1jTET3nz293u'),
('000200.230922.134210.217318', 'alvaro.garciaramiro@telefonica.com', '$2y$10$rVq5vySdOcikPCf8mKM60e8xPD.gV.AigNSZOu3YZkbBQxcg1kjbK'),
('000200.230922.134556.743073', 'angel.lozanogarcia-prieto@telefonica.com', '$2y$10$95g6Iou2H6Ed8OBGjauh5O78YB8560eyEfY0/ZgI/4YUA6LxjQmd2'),
('000200.230922.135025.689137', 'angel.juradocastillejo@telefonica.com', '$2y$10$Akc2s1KVxJ4mcXQn4wQ/O.3/YRJagK8L051SFHC4pwES.nHbodhuS'),
('000200.230922.135630.268535', 'angelluis.martinolivenza@telefonica.com', '$2y$10$Kh5gA2/qi7TdTZiFTeDTLuouaoCPXHKBZFWKbZz6c.7a2agU.KVOu'),
('000200.230927.113500.735669', 'beatriz.novalgutierrez@telefonica.com', '$2y$10$ACbb/2mOOiJs0Ird24oLPu7LO0vn2Dc7.bWsif0WpvlODuQVN.QHC'),
('000200.231003.155428.803912', 'evamaria.herastello@telefonica.com', '$2y$10$yg.rvh7m66uGZAKPNWn45.0CzyeV8Ox2r3170TSM7KbSFF.wOB.we'),
('000200.231003.155506.272877', 'silvana.zegianinigomez@telefonica.com', '$2y$10$.WpAw4Foiu8uAemraek0Ze2UcW1LEyt99qbcg3MNqhtz8yKs6mDn2'),
('000200.231003.155522.780594', 'rocio.gomezperez@telefonica.com', '$2y$10$Ag.xmxaOZIZWb2TWcFKQNOLo7QE9SkojmG4fr9PR4LJ4hxwdEEebO'),
('002000.000000.000000.000000', 'user@telefonica.com', '$2y$10$ygHI.Wiu8IcbsAx6PyZdHut4V/EEDQe5sshHMbJ5vc83J/Sr/gpFy'),
('002000.195456.187792.880231', 'anamaria.rubiocanales@telefonica.com', '$2y$10$T1ofrmwQK433i0PYBvrPfOguydksoUjICO15vqXYJ6Z3W4Y.2JRnm'),
('002000.204606.740232.761559', 'fatimadelrosario.munozcurado@telefonica.com', '$2y$10$4MN3cpyvy4ubZXfP89QgzetX41VFHL1C2IgC1KY1cp7Do1gV2mKOe'),
('002000.213230.952949.653770', 'sergio.garciamontalvo@telefonica.com', '$2y$10$1Ko372NoMf8JQB09KCBCUeTkGtNeuubUoCnDt.0WKZWukcDEwCPUy'),
('002000.230224.090000.000002', 'martina.torralbarodriguez@telefonica.com', '$2y$10$N85ECHGYMg/H8vwdpjyhfe1EW3E39NrtVDh4w32/Gz5aGlQ2m6Op.'),
('002000.230224.090000.000003', 'andres.romandelperal@telefonica.com', '$2y$10$22Y/SAFCfGrDd6bJ8lKioe8N5GTlAWjgv85zvEPLjLJrA0uWOKcnm');

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
('2022.11.30.A', '30/11/2022', 'Primera edición de pruebas de la web. \r\n<br>\r\n<ol><strong> General</strong> </li>\r\n<li>- Se ha dado de alta esta versión en el servidor local de la oficina </li>\r\n<li>- Se ha añadido el módulo \"Sistema de login\" </li>\r\n<li>- Se ha añadido el módulo \"Usuarios\" </li>\r\n<li>- Se ha añadido el módulo \"Bitácora\" </li>\r\n<li>- Se ha añadido el módulo \"Control de versiones\" </li>\r\n</ol>\r\n\r\n<ol><strong> Contexto </strong> <br>\r\n<li> - Se ha añadido el módulo \"Análisis de Contexto\" </li>\r\n<li>- Se ha añadido el módulo \"Partes Interesadas\" </li>\r\n<li>- Se ha añadido el módulo \"Alcance\" </li>\r\n<li>- Se ha añadido el módulo \"Sistema de gestión y sus Procesos\" </li>\r\n<li>- Se ha añadido el módulo \"Misión y visión\" </li>\r\n</ol>\r\n\r\n<ol><strong> Liderazgo </strong> <br>\r\n<li>- Se ha añadido el módulo \"Liderazgo y compromiso\" <br>\r\n<li>- Se ha añadido el módulo \"Política\" <br>\r\n<li>- Se ha añadido el módulo \"Roles, responsabilidades y autoridades\" <br>\r\n</ol>\r\n\r\n<ol><strong> Planificación</strong> <br>\r\n <li>- Se ha añadido el módulo \"Riesgos y oportunidades del sistema\" <br>\r\n <li>- Se ha añadido el módulo \"Objetivos\" <br>\r\n <li>- Se ha añadido el módulo \"Planificación de los cambios\" <br>\r\n</ol>', '2022-11-30'),
('2022.12.19.A', '19/12/2022', '<ol><strong> Partes interesadas</strong> </li>\r\n<li>- Añadidos contenedores para las partes interesadas </li>\r\n<li>- Corrección general de errores </li>\r\n</ol>\r\n<ol><strong> Objetivos</strong> </li>\r\n<li>- Se ha deshabilitado el acceso a esta parte de la web hasta que se termine su ejecución </li>\r\n</ol>', '2022-12-19'),
('2023.02.01.A', '01/02/2023', '<ol><strong> Análisis DAFO</strong> </li>\r\n<li>- Corrección de errores relacionados con las revisiones del DAFO </li>\r\n</ol>\r\n<ol><strong> Usuarios </strong> </li>\r\n<li>- Se ha desarrollado un sistema más completo para la visualización del personal y usuarios </li>\r\n<li>- Añadida función para cambiar la contraseña por defecto </li>\r\n<li>- Añadida función para cambiar la foto de perfil </li>\r\n</ol>\r\n<ol><strong> Otros</strong> </li>\r\n<li>- Se ha corregido un error menor que impedía logarse al pulsar \"Enter\", teniendo que pulsar el botón con el puntero. </li>\r\n</ol>', '2023-02-01'),
('2023.02.07.A', '07/02/2023', '<ol><strong> General</strong>\r\n<li>- Versión estable preparada para presentar en la auditoría interna. </li>\r\n<li>- Se ha reestructurado la arquitectura general de la base de datos, lo que mejora la optimización y el rendimiento. </li>\r\n<li>- Se ha reestructurado la arquitectura de modelos, lo que mejora la optimización y el rendimiento. </li>\r\n</ol>\r\n<ol><strong> Modales</strong>\r\n<li>- Se ha corregido un error de los formularios modales, que provocaba que no se adaptaran a diferentes tamaños de pantallas. </li>\r\n</ol>\r\n<ol><strong> Modales</strong>\r\n<li>- Se ha corregido un error de los formularios modales, que provocaba que no se adaptaran a diferentes tamaños de pantallas. </li>\r\n</ol>\r\n<ol><strong> Bitácora</strong>\r\n<li>- Se ha corregido un error que provocaba que no se mostrara el denominador de un elemento al seleccionarlo al dar de alta una entrada. </li>\r\n<li>- Se ha corregido un error que provocaba que la fecha mostrada de la última revisión no se correspondiera con la fecha real. </li>\r\n</ol>', '2023-02-07'),
('2023.03.01.A', '01/03/2023', '<ol><strong> Nombre aplicación</strong> \r\n<li>- Se ha bautizado la aplicación como \"CADETE\" (Calidad de Defensa de Telefónica).</li>\r\n<li>- Se ha adaptado el logo de la aplicación para adaptarse a esta nueva denominación.</li>\r\n</ol>\r\n\r\n<ol><strong> Login</strong> \r\n<li>- Se han asignados diferentes interacciones en la web dependiendo del rol de la persona que inicie sesión. </li>\r\n</ol>\r\n\r\n<ol><strong> Codificación </strong> \r\n<li>- Se ha afinado más la codificación interna de los items del sistema para evitar que al ejecutar muchas interacciones con la base de datos se creen valores duplicados. </li>\r\n</ol>\r\n\r\n<ol><strong> Comunicados</strong> \r\n<li>- Se ha creado la sección de comunicados, en el apartado \"Apoyo\". Ahora, pueden verse los registros históricos de los comunicados de calidad, así como gestionar aquellos que se quieran ver en la portada al entrar en la web. </li>\r\n</ol>\r\n\r\n<ol><strong> Citas </strong> \r\n<li>- Se ha creado una sección de citas célebres del departamento. Puedes ver una al azar en el pie de la web, o verlas todas accediendo a la sección \"Citas\" </li>\r\n</ol>\r\n\r\n<ol><strong> Análisis DAFO</strong> \r\n<li>- Se ha corregido un error que provocaba que al realizar una revisión del contexto no hiciera bien la \"foto\" del análisis DAFO. </li>\r\n</ol>\r\n\r\n<ol><strong> Partes interesadas</strong> \r\n<li>- Se ha corregido un error que provocaba que al realizar una revisión de las partes interesadas no hiciera bien la \"foto\" de las mismas. </li>\r\n</ol>\r\n\r\n<ol><strong> Proyectos de mejora </strong> \r\n<li>- Se ha empezado a trabajar en el modulo \"Proyectos de mejora, dentro del apartado \"Planificación\" </li>\r\n</ol>\r\n\r\n<ol><strong> Planes de acción </strong> \r\n<li>- Se ha empezado a trabajar en el modulo \"Planes de acción, dentro del apartado \"Planificación\" </li>\r\n</ol>', '2023-03-01'),
('2023.06.23.A', '23/06/2023', '<ol><strong> Menú</strong> \n<li>- Se ha creado expandido todo el menú, para mostrar todas las opciones posibles que tendrá la web.</li>\n</ol>\n\n<ol><strong> Menú lateral</strong> \n<li>- Se ha creado un menú lateral para facilitar la navegación por la web.</li>\n</ol>\n\n<ol><strong> Menú de ayuda (en desarrollo)</strong> \n<li>- Se está desarrollando un menú de ayuda interactivo, que de los tips más basicos de cada una de las páginas, así como su relación con las normatias ISO 9001:2015 y PECAL 2110.</li>\n</ol>\n\n<ol><strong> Planificación</strong> \n<li>- Se ha añadido el módulo \"Proyectos de mejora\". </li>\n<li>- Se ha añadido el módulo \"Planificación de los cambios\". </li>\n<li>- Se está desarrollando el módulo \"Acciones para abordar riesgos y oportunidades del sistema\". </li>\n</ol>\n\n<ol><strong> Apoyo</strong> \n<li>- Se está desarrollando el módulo \"Información documentada\". </li>\n</ol>\n\n<ol><strong> Logs</strong> \n<li>- Se ha añadido el módulo \"Logs\", unificado para todos los sitemas. </li>\n<li>- Se está trabajando en arreglar errores y mejorar la estabilidad del módulo. </li>\n</ol>\n\n<ol><strong> Alarmas</strong> \n<li>- Se ha añadido el módulo \"Alarmas\", unificado para todos los sitemas. </li>\n</ol>\n\n</ol>', '2023-06-23'),
('2023.06.30.A', '30/06/2023', '<ol>\r\n<strong> Login</strong> \r\n<li>- Se ha actualizado el sistema de login, para obligar a logarse a aquellos que acceden desde fuera de la oficina</li>\r\n</ol>', '2023-06-30'),
('2023.09.22.A', '22/09/2023', '<ol>\r\n<strong> General </strong> \r\n<li>- Se ha añadido un menú lateral con un buscador integrado en toda la web, acceso directo a google, un menú y una sección de ayuda (todavía en desarrollo) </li>\r\n</ol>\r\n\r\n<ol>\r\n<strong> Información documentada </strong> \r\n<li>- Se ha añadido el módulo de información documentada para consultar documentación. </li>\r\n</ol>', '2023-09-22'),
('2023.09.26.A', '26/09/2023', '<ol>\r\n<strong> Corrección de errores</strong> \r\n<li>- Se ha mejorado la respuesta en durante el login </li>\r\n<li>- Se ha corregido un error que impedía que se redireccionara correctamente tras cambiar la contraseña. </li>\r\n<li>- Se ha corregido un error que impedía que, al haber más de una sección de pestañas, se cambiaran todas correctamente. </li>\r\n</ol>', '2023-09-26'),
('2023.09.27.A', '27/09/2023', '<ol>\n<strong> Nuevas funcionalidades </strong> \n<li>- Se ha añadido la funcionalidad de reestablecer contraseña. </li>\n<li>- Se ha añadido un buzón de sugerencias y errores </li>\n</ol>\n\n<ol>\n<strong> Corrección de errores</strong> \n<li>- Se ha corregido un error que evitaba que se accediera de forma correcta a los Planes de Acción </li>\n</ol>', '2023-09-27'),
('2023.10.03.A', '03/10/2023', '<ol>\r\n<strong> Corrección de errores</strong> \r\n<li>- Se ha corregido un error que impedía ver y descargar archivos de la web. Además, se ha optimizado la velocidad de respuesta de la misma. </li>\r\n<li>- Se ha corregido un error que impedía abrir los metadatos de un documento pulsando en el botón \"Ver\". </li>\r\n<li>- Se ha corregido un error que impedía que algunos usuarios pudieran cambiar su contraseña. </li>\r\n<li>- Se ha modificado el formulario del usuario para que sea más intuitivo. </li>\r\n</ol>\r\n\r\n<ol>\r\n<strong> Certificados</strong> \r\n<li>- Se ha añadido la sección \"Certificados\" dentro del apartado \"Análisis del Contexto. </li>\r\n</ol>\r\n\r\n<ol>\r\n<strong> Organigrama</strong> \r\n<li>- Se ha añadido el organigrama del área de defensa y seguridad dentro del apartado \"Roles, responsabilidades y autoridad\". </li>\r\n</ol>', '2023-10-03');

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
-- Indices de la tabla `00_buzon`
--
ALTER TABLE `00_buzon`
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
-- Indices de la tabla `00_indice`
--
ALTER TABLE `00_indice`
  ADD PRIMARY KEY (`id`);

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
('040100.190715.105423.956440', 'ACT-001', 'Análisis DAFO de Telefónica DyS', 1, '');

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
('040200.190715.133856.560727', '040100.190715.105423.956440', 'ACT-001', 1, 1, 'Revisión 1 del Análisis de Contexto ACT-001', 'Primera versión del documento', '2019-07-15', ''),
('040200.210115.170541.954452', '040100.190715.105423.956440', 'ACT-001', 1, 3, 'Revisión 3 del Análisis de Contexto ACT-001', 'Se añade una debilidad por la nueva situación derivada del COVID19', '2021-01-15', 'la trazabilidad con los riesgos está en elaboración\nlos riesgos marcados en verde no están recogidos en el xls de R y O. revisar si son riesos reales y trazables con procesos'),
('040200.210709.170714.554102', '040100.190715.105423.956440', 'ACT-001', 1, 4, 'Revisión 4 del Análisis de Contexto ACT-001', 'Sin cambios', '2021-07-09', ''),
('040200.220115.170817.320051', '040100.190715.105423.956440', 'ACT-001', 1, 5, 'Revisión 5 del Análisis de Contexto ACT-001', 'Sin cambios', '2022-01-15', ''),
('040200.220715.171041.203202', '040100.190715.105423.956440', 'ACT-001', 1, 6, 'Revisión 6 del Análisis de Contexto ACT-001', 'Se añade una nueva parte interesada externa y se añaden nuevas debilidades, amenazas, oportunidades y fortalezas.', '2022-07-15', ''),
('040200.230123.171241.748512', '040100.190715.105423.956440', 'ACT-001', 1, 7, 'Revisión 7 del Análisis de Contexto ACT-001', 'Sin cambios.', '2023-01-23', ''),
('040200.230216.221206.259362', '040100.190715.105423.956440', 'ACT-001', 1, 2, 'Revisión 2 del Análisis de Contexto ACT-001', 'Sin cambios.', '2020-07-15', ''),
('040200.230725.171351.720417', '040100.190715.105423.956440', 'ACT-001', 1, 8, 'Revisión 8 del Análisis de Contexto ACT-001', 'Se añade una nueva debilidad.', '2023-07-25', '');

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
('040101-190701142801', 'DEB-001', '040100.190715.105423.956440', 1, 'Jubilaciones por el PSI, bajas, rotaciones, etc.', 'PSI', '', 'Vigente', 'Lo que conlleva a la \"Pérdida de conocimiento y experiencia\", que sería un riesgo, no una debilidad.'),
('040101-190701142802', 'DEB-002', '040100.190715.105423.956440', 1, 'Ralentización de procesos derivados de los requisitos de seguridad: HPS /HSEM/HSES.: habilitación para trabajar con documentación clasificada', 'Requisitos de seguridad (HPS/HSEM/HSES)', NULL, 'Vigente', NULL),
('040101-190701142901', 'DEB-003', '040100.190715.105423.956440', 1, 'Procedimientos exigidos por PECAL (instrucciones técnicas como la Normativa), ralentizan la operativa', NULL, NULL, 'Vigente', NULL),
('040101-190701142902', 'DEB-004', '040100.190715.105423.956440', 1, 'Complejidad en mantenimiento de planta con alta tasa de equipamiento obsoleto en cliente: condiciona proveedores', NULL, NULL, 'Vigente', NULL),
('040101-190701142903', 'DEB-005', '040100.190715.105423.956440', 1, 'La situación derivada del COVID19 junto con los requisitos de seguridad y las restricciones del cliente ralentiza la operativa.', 'Pandemia mundial de COVID-19.', NULL, 'Derogado', NULL),
('040101-230213183441', 'DEB-006', '040100.190715.105423.956440', 1, 'Los requisitos de seguridad y las restricciones del cliente ralentiza la operativa', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo: Retraso en hitos de los proyectos.\r\nOportunidad: N/A'),
('040101-230213183510', 'DEB-007', '040100.190715.105423.956440', 1, 'Falta de coordinación y/o comunicación entre los diferentes miembros que participan en un proyecto', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo: Incumplimiento de requisitos del contrato. Apertura de No Conformidades\r\nOportunidad: Aplicación 2E2'),
('040101-230213183532', 'DEB-008', '040100.190715.105423.956440', 1, 'Falta de coordinación entre diferentes áreas y departamentos de Telefónica', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo: Retrasos en el tiempo de ejecución de las actividades\r\nOportunidad: N/A'),
('040102-190701142901', 'AMZ-001', '040100.190715.105423.956440', 2, 'Alta dependencia de proveedores (condicionados por el propio cliente y otras por Telefónica', NULL, NULL, 'Vigente', NULL),
('040102-190701142902', 'AMZ-002', '040100.190715.105423.956440', 2, 'Servicios que puedan ser ofrecidos por la competencia directa, por ejemplo mundo TI, comunicaciones por satélite.. (competencia de integradores que son proveedores directos de nuestros clientes por ej INDRA, CPS, IECISA….)', NULL, NULL, 'Vigente', NULL),
('040102-190701143001', 'AMZ-003', '040100.190715.105423.956440', 2, 'Competencia dispone de otras certificaciones PECAL 2210 (desarrollo de software), que pueden dejarnos fuera en pliegos globales. TE no tiene esa línea de negocio)', NULL, NULL, 'Vigente', NULL),
('040102-230213183736', 'AMZ-004', '040100.190715.105423.956440', 2, 'Conflictos armamentísticos / bélicos, como por ejemplo el que se está desarrollando entre Rusia y Ucrania. Retraso en suministro de componentes', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo asociado: Retraso en los hitos de los proyectos.\r\nOportunidad asociada: N/A.'),
('040102-230213183804', 'AMZ-005', '040100.190715.105423.956440', 2, 'Plazos cortos de ejecución impuestos por el cliente y trabajos limitados por accesos a sus instalaciones, disponiblidad de servicios,…', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo asociado: Retraso en los hitos de los proyectos\r\n\r\nIncumplimiento de los requisitos del contrato\r\n\r\nOportunidad asociada: Mejorar nuestros procesos internos para compensar los plazos de los clientes'),
('040103-190701143001', 'FOR-001', '040100.190715.105423.956440', 3, 'Amplia experiencia en el sector Defensa', NULL, NULL, 'Vigente', NULL),
('040103-190701143002', 'FOR-002', '040100.190715.105423.956440', 3, 'Certificación en Requsitos de seguridad: HPS /HSEM/HSES: personal de empresa y establecimiento', NULL, NULL, 'Vigente', NULL),
('040103-190701143003', 'FOR-003', '040100.190715.105423.956440', 3, 'Larga trayectoria empresarial y disponibilidad de capital', NULL, NULL, 'Vigente', NULL),
('040103-190701143004', 'FOR-004', '040100.190715.105423.956440', 3, 'Gran experiencia en la operación y soporte de los servicios', NULL, NULL, 'Vigente', NULL),
('040103-190701143005', 'FOR-005', '040100.190715.105423.956440', 3, 'Equipos de RRHH multidisciplinares', NULL, NULL, 'Vigente', NULL),
('040103-190701143006', 'FOR-006', '040100.190715.105423.956440', 3, 'Funcionalidades exclusivas en los servicios (servicio de voz-datos-móviles y comunicaciones)', NULL, NULL, 'Vigente', NULL),
('040103-190701143101', 'FOR-007', '040100.190715.105423.956440', 3, 'Amplia presencia comercial y de explotación', NULL, NULL, 'Vigente', NULL),
('040103-190701143102', 'FOR-008', '040100.190715.105423.956440', 3, 'Posibilidad de paquetización y gran cartera de clientes', NULL, NULL, 'Derogado', NULL),
('040103-190701143103', 'FOR-009', '040100.190715.105423.956440', 3, 'Capacidad para atender grandes demandas', NULL, NULL, 'Vigente', NULL),
('040103-230213183922', 'FOR-010', '040100.190715.105423.956440', 3, 'Nombre de marca de empresa ampliamente reconocido', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo asociado: N/A.\r\nOportunidad asociada: Asistir a ferias y/o eventos para resaltar la presencia de Telefónica en el mundo de Defensa'),
('040103-230213184009', 'FOR-011', '040100.190715.105423.956440', 3, 'Aplicaciones desarrolladas y enfocadas específicamenete en nuestros procesos.', 'Agile', '2023-02-13', 'Vigente', 'Riesgo asociado: Disponibilidad y Seguridad de los Sistemas. Cortes de Servicio, caidas de servidores, ataques informáticos…\r\n\r\nOportunidad asociada: Aplicación E2E'),
('040103-230213184034', 'FOR-012', '040100.190715.105423.956440', 3, 'Implementación de metodologías ágiles en la ejecución de proyectos (AGILE, KANBAN, etc.)', 'Agile', '2023-02-13', 'Vigente', 'Riesgo asociado: Disponibilidad y Seguridad de los Sistemas. Cortes de Servicio, caidas de servidores, ataques informáticos…\r\n\r\nOportunidad asociada: Aplicación E2E'),
('040104-190701143201', 'OPO-001', '040100.190715.105423.956440', 4, 'Mercado en crecimiento (incremento presupuesto de la Administración para el Sector Defensa: nuevos concursos)', NULL, NULL, 'Vigente', NULL),
('040104-190701143202', 'OPO-002', '040100.190715.105423.956440', 4, 'Incrementar la productividad de los empleados (racionalización de actividades, perfil multidisciplinar estructura convergente TdE_TSOL en el área de Defensa...)', NULL, NULL, 'Vigente', NULL),
('040104-190701143203', 'OPO-003', '040100.190715.105423.956440', 4, 'Extender la experiencia en explotación, gestión s/ la Norma PECAL a otras áreas del Grupo Telefónica (ej pliegos de móviles solicitados por el Ministerio de Defensa)', NULL, NULL, 'Vigente', NULL),
('040104-230213184127', 'OPO-004', '040100.190715.105423.956440', 4, 'Certificar al personal en las tecnologías y software y hardware base con los que se presta el servicio (Formación según las necesidades de requisitos del Cliente: ej CISCO, ISO 20000, ITIL…)', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo asociado: Inversión económica\r\nOportunidad asociada: \r\n- Nuevas jornadas de formación al personal\r\n- Píldoras informativas, para acercar más la calidad a ingeniería'),
('040104-230213184204', 'OPO-005', '040100.190715.105423.956440', 4, 'Creación de nuevas aplicaciones/herramientas para agilizar nuestros procesos', 'Agile', '2023-02-13', 'Vigente', 'Riesgo asociado: Inversión económica\r\nOportunidad asociada: \r\n- Aplicación 2E2.\r\n- Mejora de la comunicación entre los departamentos.');

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
('040201.230216.133856.561433', 'DEB-001', '040100.190715.105423.956440', '040200.230216.133856.560727', 1, 'Jubilaciones por el PSI, bajas, rotaciones, etc.', 'PSI', '', 'Vigente', 'Lo que conlleva a la \"Pérdida de conocimiento y experiencia\", que sería un riesgo, no una debilidad.'),
('040201.230216.133856.561629', 'DEB-002', '040100.190715.105423.956440', '040200.230216.133856.560727', 1, 'Ralentización de procesos derivados de los requisitos de seguridad: HPS /HSEM/HSES.: habilitación para trabajar con documentación clasificada', 'Requisitos de seguridad (HPS/HSEM/HSES)', '', 'Vigente', ''),
('040201.230216.133856.561805', 'DEB-003', '040100.190715.105423.956440', '040200.230216.133856.560727', 1, 'Procedimientos exigidos por PECAL (instrucciones técnicas como la Normativa), ralentizan la operativa', '', '', 'Vigente', ''),
('040201.230216.133856.561974', 'DEB-004', '040100.190715.105423.956440', '040200.230216.133856.560727', 1, 'Complejidad en mantenimiento de planta con alta tasa de equipamiento obsoleto en cliente: condiciona proveedores', '', '', 'Vigente', ''),
('040201.230216.133856.562308', 'DEB-006', '040100.190715.105423.956440', '040200.230216.133856.560727', 1, 'Los requisitos de seguridad y las restricciones del cliente ralentiza la operativa', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo: Retraso en hitos de los proyectos.\r\nOportunidad: N/A'),
('040201.230216.133856.562475', 'DEB-007', '040100.190715.105423.956440', '040200.230216.133856.560727', 1, 'Falta de coordinación y/o comunicación entre los diferentes miembros que participan en un proyecto', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo: Incumplimiento de requisitos del contrato. Apertura de No Conformidades\r\nOportunidad: Aplicación 2E2'),
('040201.230216.133856.562647', 'DEB-008', '040100.190715.105423.956440', '040200.230216.133856.560727', 1, 'Falta de coordinación entre diferentes áreas y departamentos de Telefónica', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo: Retrasos en el tiempo de ejecución de las actividades\r\nOportunidad: N/A'),
('040201.230216.221206.260301', 'DEB-001', '040100.190715.105423.956440', '040200.230216.221206.259362', 1, 'Jubilaciones por el PSI, bajas, rotaciones, etc.', 'PSI', '', 'Vigente', 'Lo que conlleva a la \"Pérdida de conocimiento y experiencia\", que sería un riesgo, no una debilidad.'),
('040201.230216.221206.260554', 'DEB-002', '040100.190715.105423.956440', '040200.230216.221206.259362', 1, 'Ralentización de procesos derivados de los requisitos de seguridad: HPS /HSEM/HSES.: habilitación para trabajar con documentación clasificada', 'Requisitos de seguridad (HPS/HSEM/HSES)', '', 'Vigente', ''),
('040201.230216.221206.260905', 'DEB-003', '040100.190715.105423.956440', '040200.230216.221206.259362', 1, 'Procedimientos exigidos por PECAL (instrucciones técnicas como la Normativa), ralentizan la operativa', '', '', 'Vigente', ''),
('040201.230216.221206.261128', 'DEB-004', '040100.190715.105423.956440', '040200.230216.221206.259362', 1, 'Complejidad en mantenimiento de planta con alta tasa de equipamiento obsoleto en cliente: condiciona proveedores', '', '', 'Vigente', ''),
('040201.230216.221206.261509', 'DEB-006', '040100.190715.105423.956440', '040200.230216.221206.259362', 1, 'Los requisitos de seguridad y las restricciones del cliente ralentiza la operativa', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo: Retraso en hitos de los proyectos.\r\nOportunidad: N/A'),
('040201.230216.221206.261690', 'DEB-007', '040100.190715.105423.956440', '040200.230216.221206.259362', 1, 'Falta de coordinación y/o comunicación entre los diferentes miembros que participan en un proyecto', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo: Incumplimiento de requisitos del contrato. Apertura de No Conformidades\r\nOportunidad: Aplicación 2E2'),
('040201.230216.221206.261869', 'DEB-008', '040100.190715.105423.956440', '040200.230216.221206.259362', 1, 'Falta de coordinación entre diferentes áreas y departamentos de Telefónica', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo: Retrasos en el tiempo de ejecución de las actividades\r\nOportunidad: N/A'),
('040202.230216.133856.562815', 'AMZ-001', '040100.190715.105423.956440', '040200.230216.133856.560727', 2, 'Alta dependencia de proveedores (condicionados por el propio cliente y otras por Telefónica', '', '', 'Vigente', ''),
('040202.230216.133856.562946', 'AMZ-002', '040100.190715.105423.956440', '040200.230216.133856.560727', 2, 'Servicios que puedan ser ofrecidos por la competencia directa, por ejemplo mundo TI, comunicaciones por satélite.. (competencia de integradores que son proveedores directos de nuestros clientes por ej INDRA, CPS, IECISA….)', '', '', 'Vigente', ''),
('040202.230216.133856.563069', 'AMZ-003', '040100.190715.105423.956440', '040200.230216.133856.560727', 2, 'Competencia dispone de otras certificaciones PECAL 2210 (desarrollo de software), que pueden dejarnos fuera en pliegos globales. TE no tiene esa línea de negocio)', '', '', 'Vigente', ''),
('040202.230216.133856.563189', 'AMZ-004', '040100.190715.105423.956440', '040200.230216.133856.560727', 2, 'Conflictos armamentísticos / bélicos, como por ejemplo el que se está desarrollando entre Rusia y Ucrania. Retraso en suministro de componentes', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo asociado: Retraso en los hitos de los proyectos.\r\nOportunidad asociada: N/A.'),
('040202.230216.133856.563308', 'AMZ-005', '040100.190715.105423.956440', '040200.230216.133856.560727', 2, 'Plazos cortos de ejecución impuestos por el cliente y trabajos limitados por accesos a sus instalaciones, disponiblidad de servicios,…', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo asociado: Retraso en los hitos de los proyectos\r\n\r\nIncumplimiento de los requisitos del contrato\r\n\r\nOportunidad asociada: Mejorar nuestros procesos internos para compensar los plazos de los clientes'),
('040202.230216.221206.262050', 'AMZ-001', '040100.190715.105423.956440', '040200.230216.221206.259362', 2, 'Alta dependencia de proveedores (condicionados por el propio cliente y otras por Telefónica', '', '', 'Vigente', ''),
('040202.230216.221206.262231', 'AMZ-002', '040100.190715.105423.956440', '040200.230216.221206.259362', 2, 'Servicios que puedan ser ofrecidos por la competencia directa, por ejemplo mundo TI, comunicaciones por satélite.. (competencia de integradores que son proveedores directos de nuestros clientes por ej INDRA, CPS, IECISA….)', '', '', 'Vigente', ''),
('040202.230216.221206.262412', 'AMZ-003', '040100.190715.105423.956440', '040200.230216.221206.259362', 2, 'Competencia dispone de otras certificaciones PECAL 2210 (desarrollo de software), que pueden dejarnos fuera en pliegos globales. TE no tiene esa línea de negocio)', '', '', 'Vigente', ''),
('040202.230216.221206.262539', 'AMZ-004', '040100.190715.105423.956440', '040200.230216.221206.259362', 2, 'Conflictos armamentísticos / bélicos, como por ejemplo el que se está desarrollando entre Rusia y Ucrania. Retraso en suministro de componentes', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo asociado: Retraso en los hitos de los proyectos.\r\nOportunidad asociada: N/A.'),
('040202.230216.221206.262665', 'AMZ-005', '040100.190715.105423.956440', '040200.230216.221206.259362', 2, 'Plazos cortos de ejecución impuestos por el cliente y trabajos limitados por accesos a sus instalaciones, disponiblidad de servicios,…', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo asociado: Retraso en los hitos de los proyectos\r\n\r\nIncumplimiento de los requisitos del contrato\r\n\r\nOportunidad asociada: Mejorar nuestros procesos internos para compensar los plazos de los clientes'),
('040203.230216.133856.563427', 'FOR-001', '040100.190715.105423.956440', '040200.230216.133856.560727', 3, 'Amplia experiencia en el sector Defensa', '', '', 'Vigente', ''),
('040203.230216.133856.563545', 'FOR-002', '040100.190715.105423.956440', '040200.230216.133856.560727', 3, 'Certificación en Requsitos de seguridad: HPS /HSEM/HSES: personal de empresa y establecimiento', '', '', 'Vigente', ''),
('040203.230216.133856.563664', 'FOR-003', '040100.190715.105423.956440', '040200.230216.133856.560727', 3, 'Larga trayectoria empresarial y disponibilidad de capital', '', '', 'Vigente', ''),
('040203.230216.133856.563782', 'FOR-004', '040100.190715.105423.956440', '040200.230216.133856.560727', 3, 'Gran experiencia en la operación y soporte de los servicios', '', '', 'Vigente', ''),
('040203.230216.133856.563902', 'FOR-005', '040100.190715.105423.956440', '040200.230216.133856.560727', 3, 'Equipos de RRHH multidisciplinares', '', '', 'Vigente', ''),
('040203.230216.133856.564021', 'FOR-006', '040100.190715.105423.956440', '040200.230216.133856.560727', 3, 'Funcionalidades exclusivas en los servicios (servicio de voz-datos-móviles y comunicaciones)', '', '', 'Vigente', ''),
('040203.230216.133856.564138', 'FOR-007', '040100.190715.105423.956440', '040200.230216.133856.560727', 3, 'Amplia presencia comercial y de explotación', '', '', 'Vigente', ''),
('040203.230216.133856.564373', 'FOR-009', '040100.190715.105423.956440', '040200.230216.133856.560727', 3, 'Capacidad para atender grandes demandas', '', '', 'Vigente', ''),
('040203.230216.133856.564493', 'FOR-010', '040100.190715.105423.956440', '040200.230216.133856.560727', 3, 'Nombre de marca de empresa ampliamente reconocido', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo asociado: N/A.\r\nOportunidad asociada: Asistir a ferias y/o eventos para resaltar la presencia de Telefónica en el mundo de Defensa'),
('040203.230216.133856.564611', 'FOR-011', '040100.190715.105423.956440', '040200.230216.133856.560727', 3, 'Aplicaciones desarrolladas y enfocadas específicamenete en nuestros procesos.', 'Agile', '2023-02-13', 'Vigente', 'Riesgo asociado: Disponibilidad y Seguridad de los Sistemas. Cortes de Servicio, caidas de servidores, ataques informáticos…\r\n\r\nOportunidad asociada: Aplicación E2E'),
('040203.230216.133856.564728', 'FOR-012', '040100.190715.105423.956440', '040200.230216.133856.560727', 3, 'Implementación de metodologías ágiles en la ejecución de proyectos (AGILE, KANBAN, etc.)', 'Agile', '2023-02-13', 'Vigente', 'Riesgo asociado: Disponibilidad y Seguridad de los Sistemas. Cortes de Servicio, caidas de servidores, ataques informáticos…\r\n\r\nOportunidad asociada: Aplicación E2E'),
('040203.230216.221206.262845', 'FOR-001', '040100.190715.105423.956440', '040200.230216.221206.259362', 3, 'Amplia experiencia en el sector Defensa', '', '', 'Vigente', ''),
('040203.230216.221206.263031', 'FOR-002', '040100.190715.105423.956440', '040200.230216.221206.259362', 3, 'Certificación en Requsitos de seguridad: HPS /HSEM/HSES: personal de empresa y establecimiento', '', '', 'Vigente', ''),
('040203.230216.221206.263339', 'FOR-003', '040100.190715.105423.956440', '040200.230216.221206.259362', 3, 'Larga trayectoria empresarial y disponibilidad de capital', '', '', 'Vigente', ''),
('040203.230216.221206.263570', 'FOR-004', '040100.190715.105423.956440', '040200.230216.221206.259362', 3, 'Gran experiencia en la operación y soporte de los servicios', '', '', 'Vigente', ''),
('040203.230216.221206.263873', 'FOR-005', '040100.190715.105423.956440', '040200.230216.221206.259362', 3, 'Equipos de RRHH multidisciplinares', '', '', 'Vigente', ''),
('040203.230216.221206.264135', 'FOR-006', '040100.190715.105423.956440', '040200.230216.221206.259362', 3, 'Funcionalidades exclusivas en los servicios (servicio de voz-datos-móviles y comunicaciones)', '', '', 'Vigente', ''),
('040203.230216.221206.264403', 'FOR-007', '040100.190715.105423.956440', '040200.230216.221206.259362', 3, 'Amplia presencia comercial y de explotación', '', '', 'Vigente', ''),
('040203.230216.221206.264849', 'FOR-009', '040100.190715.105423.956440', '040200.230216.221206.259362', 3, 'Capacidad para atender grandes demandas', '', '', 'Vigente', ''),
('040203.230216.221206.265069', 'FOR-010', '040100.190715.105423.956440', '040200.230216.221206.259362', 3, 'Nombre de marca de empresa ampliamente reconocido', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo asociado: N/A.\r\nOportunidad asociada: Asistir a ferias y/o eventos para resaltar la presencia de Telefónica en el mundo de Defensa'),
('040203.230216.221206.265369', 'FOR-011', '040100.190715.105423.956440', '040200.230216.221206.259362', 3, 'Aplicaciones desarrolladas y enfocadas específicamenete en nuestros procesos.', 'Agile', '2023-02-13', 'Vigente', 'Riesgo asociado: Disponibilidad y Seguridad de los Sistemas. Cortes de Servicio, caidas de servidores, ataques informáticos…\r\n\r\nOportunidad asociada: Aplicación E2E'),
('040203.230216.221206.265559', 'FOR-012', '040100.190715.105423.956440', '040200.230216.221206.259362', 3, 'Implementación de metodologías ágiles en la ejecución de proyectos (AGILE, KANBAN, etc.)', 'Agile', '2023-02-13', 'Vigente', 'Riesgo asociado: Disponibilidad y Seguridad de los Sistemas. Cortes de Servicio, caidas de servidores, ataques informáticos…\r\n\r\nOportunidad asociada: Aplicación E2E'),
('040204.230216.133856.564848', 'OPO-001', '040100.190715.105423.956440', '040200.230216.133856.560727', 4, 'Mercado en crecimiento (incremento presupuesto de la Administración para el Sector Defensa: nuevos concursos)', '', '', 'Vigente', ''),
('040204.230216.133856.564967', 'OPO-002', '040100.190715.105423.956440', '040200.230216.133856.560727', 4, 'Incrementar la productividad de los empleados (racionalización de actividades, perfil multidisciplinar estructura convergente TdE_TSOL en el área de Defensa...)', '', '', 'Vigente', ''),
('040204.230216.133856.565084', 'OPO-003', '040100.190715.105423.956440', '040200.230216.133856.560727', 4, 'Extender la experiencia en explotación, gestión s/ la Norma PECAL a otras áreas del Grupo Telefónica (ej pliegos de móviles solicitados por el Ministerio de Defensa)', '', '', 'Vigente', ''),
('040204.230216.133856.565203', 'OPO-004', '040100.190715.105423.956440', '040200.230216.133856.560727', 4, 'Certificar al personal en las tecnologías y software y hardware base con los que se presta el servicio (Formación según las necesidades de requisitos del Cliente: ej CISCO, ISO 20000, ITIL…)', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo asociado: Inversión económica\r\nOportunidad asociada: \r\n- Nuevas jornadas de formación al personal\r\n- Píldoras informativas, para acercar más la calidad a ingeniería'),
('040204.230216.133856.565321', 'OPO-005', '040100.190715.105423.956440', '040200.230216.133856.560727', 4, 'Creación de nuevas aplicaciones/herramientas para agilizar nuestros procesos', 'Agile', '2023-02-13', 'Vigente', 'Riesgo asociado: Inversión económica\r\nOportunidad asociada: \r\n- Aplicación 2E2.\r\n- Mejora de la comunicación entre los departamentos.'),
('040204.230216.221206.265757', 'OPO-001', '040100.190715.105423.956440', '040200.230216.221206.259362', 4, 'Mercado en crecimiento (incremento presupuesto de la Administración para el Sector Defensa: nuevos concursos)', '', '', 'Vigente', ''),
('040204.230216.221206.265965', 'OPO-002', '040100.190715.105423.956440', '040200.230216.221206.259362', 4, 'Incrementar la productividad de los empleados (racionalización de actividades, perfil multidisciplinar estructura convergente TdE_TSOL en el área de Defensa...)', '', '', 'Vigente', ''),
('040204.230216.221206.266146', 'OPO-003', '040100.190715.105423.956440', '040200.230216.221206.259362', 4, 'Extender la experiencia en explotación, gestión s/ la Norma PECAL a otras áreas del Grupo Telefónica (ej pliegos de móviles solicitados por el Ministerio de Defensa)', '', '', 'Vigente', ''),
('040204.230216.221206.266327', 'OPO-004', '040100.190715.105423.956440', '040200.230216.221206.259362', 4, 'Certificar al personal en las tecnologías y software y hardware base con los que se presta el servicio (Formación según las necesidades de requisitos del Cliente: ej CISCO, ISO 20000, ITIL…)', 'Brainstorming', '2023-02-13', 'Vigente', 'Riesgo asociado: Inversión económica\r\nOportunidad asociada: \r\n- Nuevas jornadas de formación al personal\r\n- Píldoras informativas, para acercar más la calidad a ingeniería'),
('040204.230216.221206.266507', 'OPO-005', '040100.190715.105423.956440', '040200.230216.221206.259362', 4, 'Creación de nuevas aplicaciones/herramientas para agilizar nuestros procesos', 'Agile', '2023-02-13', 'Vigente', 'Riesgo asociado: Inversión económica\r\nOportunidad asociada: \r\n- Aplicación 2E2.\r\n- Mejora de la comunicación entre los departamentos.');

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
('040301.230216.133856.143301', 'PII-001', '040300.230216.133856.560727', 1, 'Dirección', '2019-07-01', 'Vigente', ''),
('040301.230216.133856.143302', 'PII-002', '040300.230216.133856.560727', 1, 'Procesos y Certificación', '2019-07-01', 'Vigente', ''),
('040301.230216.133856.143303', 'PII-003', '040300.230216.133856.560727', 1, 'Área de Ingeniería de Defensa', '2019-07-01', 'Vigente', ''),
('040301.230216.133856.143304', 'PII-004', '040300.230216.133856.560727', 1, 'Compras', '2019-07-01', 'Vigente', ''),
('040301.230216.133856.143401', 'PII-005', '040300.230216.133856.560727', 1, 'Recursos Humanos', '2019-07-01', 'Vigente', ''),
('040301.230216.133856.143402', 'PII-006', '040300.230216.133856.560727', 1, 'Área comercial', '2019-07-01', 'Vigente', ''),
('040301.230216.133856.143403', 'PII-007', '040300.230216.133856.560727', 1, 'Ingeniería de cliente', '2019-07-01', 'Vigente', ''),
('040301.230216.133856.143404', 'PII-008', '040300.230216.133856.560727', 1, 'Asesoría jurídica', '2019-07-01', 'Vigente', ''),
('040301.230216.133856.143405', 'PII-009', '040300.230216.133856.560727', 1, 'Otras áreas de operaciones', '2019-07-01', 'Vigente', ''),
('040302.230216.133856.143401', 'PIE-001', '040300.230216.133856.560727', 2, 'Representante de Aseguramiento Oficial de la Calidad (RAC)', '2019-07-01', 'Vigente', ''),
('040302.230216.133856.143402', 'PIE-002', '040300.230216.133856.560727', 2, 'Proveedores de equipamientos', '2019-07-01', 'Vigente', ''),
('040302.230216.133856.143403', 'PIE-003', '040300.230216.133856.560727', 2, 'Oficinas de programa del Ministerio de Defensa', '2019-07-01', 'Vigente', ''),
('040302.230216.133856.143501', 'PIE-004', '040300.230216.133856.560727', 2, 'Empresas subcontratadas / Proveedores de servicios', '2019-07-01', 'Vigente', ''),
('040302.230216.133856.143502', 'PIE-005', '040300.230216.133856.560727', 2, 'Otros clientes', '2019-07-01', 'Vigente', ''),
('040302.230216.133856.143503', 'PIE-006', '040300.230216.133856.560727', 2, 'Administraciones públicas (Local, autonómica y central)', '2019-07-01', 'Vigente', ''),
('040302.230216.133856.145743', 'PIE-007', '040300.230216.133856.560727', 2, 'Empresas en UTE', '2023-02-10', '1', ''),
('040302.230216.133856.145813', 'PIE-008', '040300.230216.133856.560727', 2, 'Otras empresas del Grupo Telefónica', '2023-02-10', '1', '');

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
('040300.230216.133856.560727', 'EPI-001', 'Partes interesadas de Telefónica DyS', 1, '');

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
('040400.190715.175841.246996', 'EPI-001', 'Revisión 1 de las partes interesadas - 2019-07-15', '040300.230216.133856.560727', 1, '2019-07-15', ''),
('040400.200715.175958.817202', 'EPI-001', 'Revisión 2 de las partes interesadas - 2020-07-15', '040300.230216.133856.560727', 2, '2020-07-15', ''),
('040400.210115.180204.547842', 'EPI-001', 'Revisión 3 de las partes interesadas - 2021-01-15', '040300.230216.133856.560727', 3, '2021-01-15', ''),
('040400.210709.174501.411245', 'EPI-001', 'Revisión 4 de las partes interesadas - 2021-07-09', '040300.230216.133856.560727', 4, '2021-07-09', ''),
('040400.220115.174574.148874', 'EPI-001', 'Revisión 5 de las partes interesadas - 2022-01-15', '040300.230216.133856.560727', 5, '2022-01-15', ''),
('040400.220715.174630.422563', 'EPI-001', 'Revisión 6 de las partes interesadas - 2022-07-15', '040300.230216.133856.560727', 6, '2022-07-15', ''),
('040400.230123.174674.844521', 'EPI-001', 'Revisión 7 de las partes interesadas - 2023-01-23', '040300.230216.133856.560727', 7, '2023-01-23', ''),
('040400.230725.174723.662031', 'EPI-001', 'Revisión 8 de las partes interesadas - 2023-07-25', '040300.230216.133856.560727', 8, '2023-07-25', '');

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
  `id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codigo_interno` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `denominador` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `personal` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `05_comite`
--

INSERT INTO `05_comite` (`id`, `codigo_interno`, `denominador`, `personal`) VALUES
('050300.230503.182000.311101', '', 'Director de Ingeniería y Desarrollo de Negocio', '070501.190248.606793.715299'),
('050300.230503.182000.311102', '', 'Gerente de Ingeniería Defensa', '070501.223484.206544.531864'),
('050300.230503.182000.311103', '', 'Jefe de Control Gestión de Recursos', '070501.218216.850081.419829'),
('050300.230503.182000.311104', '', 'Representante de Calidad', '070501.209133.110533.565851');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `05_politica`
--

CREATE TABLE `05_politica` (
  `id` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codigo_interno` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `denominador` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha` date NOT NULL,
  `comentarios` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `05_politica`
--

INSERT INTO `05_politica` (`id`, `codigo_interno`, `tipo`, `denominador`, `fecha`, `comentarios`) VALUES
('050100-220628144001', 'POL-001', 'Política de calidad y de PECAL', 'Poner las necesidades del cliente en el centro de todo lo que hacemos, para lograr su máxima satisfacción con nuestros servicios y soluciones.', '2022-06-28', ''),
('050100-220628144002', 'POL-002', 'Política de gestión ambiental', 'La Política Ambiental Global de Telefónica está a disposición de las partes interesadas.\n\nTelefónica de España adopta como Política Ambiental la Política Ambiental del Grupo Telefónica. Ésta ha sido diseñada conforme a la Norma internacional UNE-EN ISO 14001, y es de aplicación a todas las empresas del Grupo, con independencia de la ubicación geográfica o la actividad de la empresa, ya que se trabaja bajo la premisa de la mejora continua, partiendo del cumplimiento de la legislación vigente y los compromisos voluntarios suscritos por Telefónica en materia ambiental.\n\nEn Telefónica creemos en el poder de la tecnología digital para ofrecer nuevas oportunidades a las personas y transformar la sociedad de manera positiva. Por tanto, la Política Ambiental tiene un doble propósito. No sólo trabajamos para minimizar nuestro impacto sobre el medio ambiente, a través una menor huella sobre el entorno; sino que nos basamos en la capacidad de nuestra tecnología para crear nuevas oportunidades para el desarrollo sostenible, las Tecnologías de la Información y las Comunicaciones (TIC) permiten a nuestros clientes ser más eco-eficientes y respetuosos con el medio ambiente.\n\nLa Política Ambiental del Grupo Telefónica establece las líneas de actuación y el compromiso en materia ambiental de todas las empresas, unidades de negocio y empleados que forman la Compañía, está disponible en la Web Corporativa y en la Intranet Corporativa.', '2022-06-28', '');

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
('060401.230608.132330.460623', 'PAS-21-001', 'Informar a la dirección y al a gerencia, y vigilar el riesgo', '070501.209133.110533.565851', '', 'Riesgos y Oportunidades de proceso', 2, '2021-01-21', '2030-12-31', '', 'N/A', ''),
('060401.230608.132515.343072', 'PAS-22-001', 'Creación de la biblioteca de riesgos unificada', '070501.196196.739183.716643', '', 'Proyecto de mejora PMC-23-001', 3, '2022-03-04', '2022-04-10', '2022-04-22', 'Informáticos', ''),
('060401.230608.132941.319239', 'PAS-22-003', 'Estudio de desarrollo de aplicación E2E', '070501.209133.110533.565851', '', '', 2, '2022-06-28', '2023-12-31', '', 'N/A', ''),
('060401.230710.131540.324526', 'PAS-20-001', 'Backup del recurso informático actual', '070501.209133.110533.565851', '', 'Riesgo \"RP01 - Sistemas de información\"', 3, '2020-10-01', '2022-07-31', '2022-07-15', '1 informático', ''),
('060401.230710.134616.214819', 'PAS-19-001', 'Sustitución de las bajas', '070501.209133.110533.565851', '', 'Riesgo \"RP02-  RRHH\"', 3, '2019-01-01', '2019-12-31', '2019-07-02', 'N/A', ''),
('060401.230711.120837.475240', 'PAS-18-001', 'Ejecución de la base de datos de gestión de riesgos.', '070501.201766.836287.896596', 'TSol: \r\n· Ejecución de la base de datos (2018).\r\n· Implantación prevista para 2019.\r\n\r\nTdE: \r\nImplantación prevista para 2019.', '', 3, '2018-11-01', '2019-12-31', '2019-05-13', 'Propios', ''),
('060401.230711.122130.874558', 'PAS-19-002', 'Integrar los procesos', '070501.209133.110533.565851', '', 'Oportunidad de proceso', 3, '2019-01-01', '2019-12-31', '2019-07-01', 'N/A', ''),
('060401.230711.123154.789143', 'PAS-19-003', 'Integrar los procedimientos de TDE y TSOL', '070501.209133.110533.565851', 'Depende de la unificación de los  SIG por parte de  PROCESOS y CERTIFICACIÓN', '', 3, '2019-01-01', '2019-12-31', '2019-07-02', 'N/A', ''),
('060401.230711.124338.725055', 'PAS-22-004', 'Abrir una No Conformidad cada vez que se materialice un riesgo', '070501.201766.836287.896596', 'Abrir una No Conformidad cada vez que se materialice un riesgo para que el área de calidad haga un mejor seguimiento y control del mismo. ', '[PMC-028]', 2, '2022-07-18', '2023-12-31', '', 'Recursos informáticos', ''),
('060401.230711.124459.110392', 'PAS-22-002', 'Implementar la evolución de los riesgos en al app de gestión de riesgos', '070501.201766.836287.896596', 'Modificar la aplicación de gestión de riesgos para poder ver la evolución de los riesgos y sacar gráficas para hacer el seguimiento de su evolución', '[PMC-031]', 2, '2022-06-01', '2023-12-31', '', 'Recursos informáticos', ''),
('060401.230711.131340.581035', 'PAS-23-001', 'Análisis de los antiguos indicadores e Introducción de indicadores nuevos', '070501.196196.739183.716643', 'Únicamente tenemos 3 indicadores de proceso, y no aportan mucha información para la mejora del desempeño.', ' [PMC-027]', 2, '2022-07-01', '2023-12-31', '', 'Propios', '');

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
  `comentarios` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `06_planesaccion_acciones`
--

INSERT INTO `06_planesaccion_acciones` (`id`, `codigo_interno`, `denominador`, `fechaInicio`, `fechaFinPrevisto`, `fechaFin`, `responsable`, `planAccion`, `comentarios`) VALUES
('060402.230608.133045.259848', 'ACC-001', 'Inicio del estudio para el desarrollo de la aplicación E2E', '2022-06-28', '', '', '070501.230224.090000.000001', '060401.230608.132941.319239', ''),
('060402.230608.133117.834082', 'ACC-002', 'Continúa el estudio para el desarrollo de la aplicación 2E2', '2023-01-26', '', '', '070501.230224.090000.000001', '060401.230608.132941.319239', ''),
('060402.230608.133639.837148', 'ACC-001', 'Comunicado de las medidas propuestas a Paco Molina', '2019-01-21', '2019-01-21', '2019-01-21', '070501.230224.090000.000001', '060401.230608.132330.460623', ''),
('060402.230608.133738.970687', 'ACC-002', 'Paco Molina da la aprobación de las medidas propuestas', '2019-01-30', '2019-01-30', '2019-01-30', '070501.230224.090000.000001', '060401.230608.132330.460623', ''),
('060402.230710.131647.936411', 'ACC-001', 'Contratación de un recurso como BACKUP del actual', '2020-10-01', '2020-10-31', '2020-10-15', '070501.209133.110533.565851', '060401.230710.131540.324526', ''),
('060402.230710.131731.660810', 'ACC-002', 'Lanzamiento del Sistema Acreditado en TdE', '2020-11-02', '2020-11-30', '2020-11-16', '070501.209133.110533.565851', '060401.230710.131540.324526', ''),
('060402.230710.131747.877689', 'ACC-003', 'Definicion del Plan de trabajos (levantamiento de planta actualmente en desarollo)', '2020-11-02', '2020-11-30', '2020-12-14', '070501.209133.110533.565851', '060401.230710.131540.324526', ''),
('060402.230710.131809.939982', 'ACC-004', ' Ejecutar los trabajos del Plan', '2021-07-01', '2022-01-31', '2022-01-14', '070501.209133.110533.565851', '060401.230710.131540.324526', ''),
('060402.230710.131824.240329', 'ACC-005', 'Realizando compartición de conocimientosde las bases de datos', '2022-01-03', '2022-07-15', '2022-07-31', '070501.209133.110533.565851', '060401.230710.131540.324526', ''),
('060402.230710.131913.695210', 'ACC-006', 'La situación con respecto al COVID19 se ha estabilizado, por lo que este riesgo queda cerrado.', '2022-07-15', '2022-07-31', '2022-07-15', '070501.209133.110533.565851', '060401.230710.131540.324526', ''),
('060402.230710.134804.369069', 'ACC-001', 'Incorporación de Sergio García.', '2019-11-06', '2019-11-30', '2019-11-06', '070501.209133.110533.565851', '060401.230710.134616.214819', 'Sustituye a José Ramon Valhondo'),
('060402.230710.134830.354405', 'ACC-002', 'Solicitud de formación a RRHH', '', '', '', '070501.209133.110533.565851', '060401.230710.134616.214819', ''),
('060402.230710.134845.367164', 'ACC-003', 'Paco Molina da la aprobación de las medidas propuestas.', '2019-01-30', '2019-01-30', '2019-01-30', '070501.209133.110533.565851', '060401.230710.134616.214819', ''),
('060402.230710.134900.416693', 'ACC-004', 'Concedido curso a Ángel Jurado de Auditor Interno.', '', '', '', '070501.209133.110533.565851', '060401.230710.134616.214819', ''),
('060402.230710.134953.513015', 'ACC-005', 'Este proceso queda integrado en el P911, por lo que se elimina.', '2019-07-02', '2019-07-02', '2019-07-02', '070501.209133.110533.565851', '060401.230710.134616.214819', 'Comunicado en CQ-055'),
('060402.230711.121031.235426', 'ACC-001', 'Se ha ejecutado y aprobado la base de datos. Falta la formación y la implantación (2019).', '', '', '', '070501.209133.110533.565851', '060401.230711.120837.475240', 'TSOL'),
('060402.230711.121129.171885', 'ACC-002', 'Paco Molina da la aprobación de las medidas propuestas.', '2019-01-30', '', '2019-01-30', '070501.209133.110533.565851', '060401.230711.120837.475240', ''),
('060402.230711.121202.374018', 'ACC-003', 'Se ha dado la formación a jefes de proyecto de TSOL.', '2019-03-28', '', '2019-03-28', '070501.209133.110533.565851', '060401.230711.120837.475240', ''),
('060402.230711.121300.626533', 'ACC-004', 'Publicado el documento de gestión de riesgos integrado: EM-300-PR-009 (Ed1) Gestión de Riesgos para proyectos de DyS', '2019-05-13', '', '2019-05-13', '070501.209133.110533.565851', '060401.230711.120837.475240', ''),
('060402.230711.122211.411104', 'ACC-001', 'Enviados varios correos para seguimiento de la integración', '2019-01-01', '', '', '070501.209133.110533.565851', '060401.230711.122130.874558', ''),
('060402.230711.122236.782505', 'ACC-002', 'Ana comunica las medidas propuestas a Paco Molina.', '2019-01-21', '', '', '070501.209133.110533.565851', '060401.230711.122130.874558', ''),
('060402.230711.122301.533921', 'ACC-003', ' Paco Molina da la aprobación de las medidas propuestas.', '2019-01-30', '', '', '070501.209133.110533.565851', '060401.230711.122130.874558', ''),
('060402.230711.122410.413511', 'ACC-004', 'Integración de los procesos P851 y S101, dando lugar al P851 (Ed13): Control del diseño y desarrollo de DyS', '2019-05-14', '', '', '070501.209133.110533.565851', '060401.230711.122130.874558', ''),
('060402.230711.122432.273216', 'ACC-005', ' Se solicita al AII la integración de los sistemas de TdE y TSol', '2019-05-30', '', '', '070501.209133.110533.565851', '060401.230711.122130.874558', ''),
('060402.230711.122501.234752', 'ACC-006', ' El AII nos autoriza la integración.', '2019-06-04', '', '', '070501.209133.110533.565851', '060401.230711.122130.874558', ''),
('060402.230711.123235.412473', 'ACC-001', 'Enviados varios correos para seguimiento de la integración.', '', '', '2019-01-01', '070501.209133.110533.565851', '060401.230711.123154.789143', ''),
('060402.230711.123302.833886', 'ACC-002', 'Ana comunica las medidas propuestas a Paco Molina.', '', '', '2019-01-21', '070501.209133.110533.565851', '060401.230711.123154.789143', ''),
('060402.230711.123335.755293', 'ACC-003', 'Paco Molina da la aprobación de las medidas propuestas.', '', '', '2019-01-30', '070501.209133.110533.565851', '060401.230711.123154.789143', ''),
('060402.230711.123417.571684', 'ACC-004', 'Publicado el documento de gestión de riesgos integrado: EM-300-PR-009 (Ed1) Gestión de Riesgos para proyectos de DyS', '', '', '2019-05-13', '070501.209133.110533.565851', '060401.230711.123154.789143', ''),
('060402.230711.123459.613319', 'ACC-005', 'Se solicita al AII la integración de los sistemas de TdE y TSol', '', '', '2019-05-30', '070501.209133.110533.565851', '060401.230711.123154.789143', ''),
('060402.230711.123559.845909', 'ACC-006', 'El AII nos autoriza la integración.', '', '', '2019-06-04', '070501.209133.110533.565851', '060401.230711.123154.789143', ''),
('060402.230711.123642.058872', 'ACC-007', 'Publicado el documento de gestión de configuración integrado: EM-300-PR-011 (Ed1) Gestión de la Configuración de DyS', '', '', '2019-07-01', '070501.209133.110533.565851', '060401.230711.123154.789143', ''),
('060402.230711.123728.917916', 'ACC-008', 'Publicado el documento de diseño integrado: EM-300-PR-015 (Ed1) Diseño y Especificación de requisitos de DyS', '', '', '2019-07-01', '070501.209133.110533.565851', '060401.230711.123154.789143', ''),
('060402.230711.124525.227440', 'ACC-001', 'Se modifica la app de riesgos incluyendo gráficas de la evolución de los riesgos de cada proyecto.', '', '', '2022-06-30', '070501.201766.836287.896596', '060401.230711.124459.110392', ''),
('060402.230711.124550.422347', 'ACC-002', 'Se añade el indicador \"Número de riesgos cuyo impacto ha disminuido sobre el número de riesgos totales asociados a cada proyecto\" para evaluar la evolución de los riesgos.', '', '', '2022-07-18', '070501.196196.739183.716643', '060401.230711.124459.110392', ''),
('060402.230711.124612.257258', 'ACC-003', ' El indicador muestra un leve aumento del control de los riesgos. Se continúa con el indicador para seguir aumentando su control.', '', '', '2023-01-26', '070501.196196.739183.716643', '060401.230711.124459.110392', ''),
('060402.230711.131411.147579', 'ACC-001', 'Análisis de los indicadores ', '', '', '2022-06-16', '070501.196196.739183.716643', '060401.230711.131340.581035', ''),
('060402.230711.131432.027755', 'ACC-002', 'Incorporación de los nuevos indicadores', '', '', '2022-07-06', '070501.196196.739183.716643', '060401.230711.131340.581035', ''),
('060402.230711.131453.267397', 'ACC-003', 'Calculados y presentados en el informe de indicadoresIR000000INDQ22', '', '', '2022-07-18', '070501.196196.739183.716643', '060401.230711.131340.581035', ''),
('060402.230711.131513.823833', 'ACC-004', 'Indicadores en fase de prueba.', '', '', '2022-07-27', '070501.196196.739183.716643', '060401.230711.131340.581035', ''),
('060402.230711.131548.398713', 'ACC-005', 'Calculados y presentados en el informe de indicadores IR000000INDQ22', '', '', '2023-01-26', '070501.196196.739183.716643', '060401.230711.131340.581035', 'Los indicadores aportan información significativa por lo que se continuará con su uso.');

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
  `origen` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `estado` int NOT NULL,
  `fechaDeteccion` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `comentarios` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `06_proyectosmejora`
--

INSERT INTO `06_proyectosmejora` (`id`, `codigo_interno`, `denominador`, `origen`, `estado`, `fechaDeteccion`, `comentarios`) VALUES
('060500.230608.132515.335877', 'PMC-22-005', 'Creación de la biblioteca de riesgos unificada', 'Sugerencia\r\n\r\nCrear una biblioteca de riesgos, modificando el Procedimiento de Gestión de Riesgos para Proyectos DyS y su registro RO01 asociado donde se identifican causas del riesgo y no riesgos en sí mismos.', 4, '2022-03-04', 'Antigua PM-023'),
('060500.230711.131707.175902', 'PMC-21-013', 'Modificar, actualizar y mejorar la aplicación que da soporte a las actividades del proyecto de mantenimiento del sistema BRASS.', 'Informe de revisión por la dirección 2020', 4, '2021-07-29', 'PMC-001'),
('060500.230711.131757.397648', 'PMC-21-001', 'Incorporar mejoras en la aplicación de Gestión de Riesgos producto de la experiencia de usuario durante estos meses de rodaje de la aplicación.', 'Informe de revisión por la dirección 2020', 4, '2021-01-12', 'PMC-002'),
('060500.230711.131820.564559', 'PMC-20-001', 'Diseñar herramientas de apoyo a la codificación de Documentos y de Expediente y Registros.', 'Informe de revisión por la dirección 2020', 4, '2020-06-15', 'PMC-003'),
('060500.230711.131920.330121', 'PMC-21-003', 'Guía de uso para la aplicación de No Conformidades.', 'Informe de revisión por la dirección 2020', 1, '2021-02-01', 'PMC-004\r\n\r\nPospuesta hasta que se realicen las modificaciones en la BBDD. \r\n\r\nLas modificaciones terminaron el 12/01/2022.\r\n\r\nFinalmente se ha desestimado, y se van a hacer videos formativos.'),
('060500.230711.132004.776144', 'PMC-21-004', 'Guía de uso para la aplicación de Gestión de Riesgos.', 'Informe de revisión por la dirección 2020', 1, '2021-02-01', 'PMC-005\r\n\r\nPospuesta hasta que se realicen las modificaciones en la BBDD.\r\nLas modificaciones terminaron el 12/01/2022.\r\nFinalmente se ha desestimado, y se van a hacer videos formativos.'),
('060500.230711.132028.823945', 'PMC-21-006', 'Base de datos de incidencias y RMAs (incidencias en garantía).', 'Informe de revisión por la dirección 2020', 4, '2021-04-01', 'PMC-006'),
('060500.230711.132104.422575', 'PMC-21-014', 'Base de datos de indicadores.', 'Informe de revisión por la dirección 2020', 5, '2021-12-01', 'PMC-007\r\n\r\nSe va a incorporar una base de datos de indicadores a la nueva página web de calidad, este evento se ha tratado como objetivo de calidad y como tal se encuentra planificado.'),
('060500.230711.132144.209546', 'PMC-22-015', 'Realización de encuestas de satisfacción al RAC para conocer y aprovechar el grado en que se cumplen sus necesidades y expectativas', 'Auditoría interna 2020 - Observación 9\r\n\r\nAprovechar la información que puede facilitar el RAC sobre el grado en que se cumplen sus necesidades y expectativas.', 4, '2022-06-28', 'PMC-008'),
('060500.230711.132214.507427', 'PMC-21-002', 'Modificar AGEDYS para permitir ofertas a varios proveedores a la vez proveedores (para que solo haya un DPD)', 'Informe de revisión por la dirección 2020', 4, '2021-01-28', 'PMC-009'),
('060500.230711.132242.170248', 'PMC-22-021', 'En AGEDYS, añadir al formulario “Datos del Expediente” un campo con el gasto realmente facturado por los suministradores en el total de DPDs para el expediente, con objeto de tener de un vistazo todos los datos relevantes.', 'Sugerencias', 4, '2022-11-04', 'PMC-010'),
('060500.230711.132331.335367', 'PMC-21-009', 'Complementar de forma recíproca las acciones planificadas desde el Área de Riesgos a partir del Análisis de Contexto y Partes interesadas con las acciones planificadas a partir de los riesgos y oportunidades identificados a nivel de Procesos ', 'Auditoría interna 2021', 4, '2021-05-07', 'PMC-011'),
('060500.230711.132357.376638', 'PMC-21-011', 'Planificación de todas las acciones a realizar, indicando fecha de fin prevista para planificación de recursos necesarios para su consecución. ', 'Auditoría interna 2021', 4, '2021-05-11', 'PMC-012\r\n\r\nSe está realizando el presente excel donde se recogen todos los proyectos de mejora, sus orígenes y ver si se está haciendo o no.\r\n\r\nSe está migrando el excel a una bbdd, con el objeto de relacionarlo más directamente con el resto de elementos del sistema.'),
('060500.230711.132431.321334', 'PMC-21-008', 'Evidenciar trazabilidad entre los riesgos identificados a nivel de oferta y los identificados a nivel de proyecto. ', 'Auditoría interna 2021', 4, '2021-04-19', 'PMC-013\r\n\r\nSe va a añadir a la BBDD de Riesgos que, al iniciar un proyecto, se tengan que meter todos los riesgos de fase de oferta, y ahí el Jefe de Proyecto elige cuáles siguen aplicando y cuáles no.'),
('060500.230711.132535.180658', 'PMC-21-007', 'Clarificar en la Herramienta de Gestión de Riesgos las fechas de: Creación/modificación del Informe de Riesgos, seguimiento de los riesgos y las de publicación de versión. ', 'Auditoría interna 2021', 4, '2021-04-19', 'PMC-014'),
('060500.230711.132608.445222', 'PMC-21-010', 'Diferenciar en nuevas versiones del Plan de Trabajo correspondiente al Expediente 0016/20, las fechas planificadas de acciones de las ya realizadas. ', 'Auditoría interna 2021', 4, '2021-05-07', 'PMC-015\r\n\r\nEnviado correo a Julio el 07/05/2021. A fecha del 11/05/2021 no hay respuesta'),
('060500.230711.132804.912501', 'PMC-22-001', 'Actualización del informe RMA,  hacerlo un formato e integrarlo dentro del sistema de gestión', 'Sugerencias', 4, '2022-01-10', 'PMC-018'),
('060500.230711.133107.711754', 'PMC-22-003', 'Actualizar sección de procesos de web de calidad', 'Sugerencias', 4, '2022-01-20', 'PMC-020\n\nActualmente solo aparecen 4 procesos, y hay procesos que aparecen en plantillas (Por ejemplo, el proceso P874 Compras, que no aparece ahí”.\n\nPodrían hacerse varias cosas:\n•	O bien poner todos los procesos que aparecen referenciados en nuestra documentación.\n•	O bien poner una nota aclaratoria, indicando que los 4 procesos que aparecen son los específicos del área, y que si desean buscar más acudan a la web de procesos.\n\nTambién podría incluirse el botón de la web de proceso dentro de ese apartado, en vez de estar en el encabezado de la página web.'),
('060500.230711.133222.296224', 'PMC-22-007', 'Desarrollar una aplicación de escritorio para gestión de calidad', 'Brainstorming', 3, '2022-03-15', 'PMC-021\r\n\r\nSugerencia \"Desarrollar un aplicación de escritorio que permita integrar todas las herramientas con las que se gestiona el sistema de gestión de calidad (DAFO, Objetivos, Riesgos y Oportunidades, Planes de Acción, gestión de la documentación, comunicados, revisión por la dirección, etc.) y mejorar la trazabilidad entre ellas.\"\r\n\r\nSe ha tratado como un objetivo de calidad.'),
('060500.230711.133357.686196', 'PMC-22-002', 'Ordenar DPDs por año y número de DPD', 'Sugerencias', 4, '2022-01-17', 'PMC-019\n\nSugerencia \"En el formulario de “Búsqueda de DPDs” campo “Expediente”, ¿se podría ordenar primero por año y luego por número de DPD, de año más reciente a más antiguo. Es una nimiedad pero si se puede es más cómodo y fácil de encontrar, por lo menos en mi caso que tengo un montón de DPDs pululando y de distintos años\"\n\nDetectado en correo e sugerencia del 22/12/2021  por Ángel Luis Sánchez Cesteros.\nFechas aproximadas. Sé que se cerró, pero no sé exactamente cuándo.'),
('060500.230711.134214.928133', 'PMC-21-012', 'Corregir error detectado en AGEDYS', 'Sugerencia', 4, '2021-07-02', 'PMC-016\r\n\r\nDetectado el 02/07/2021 por Ángel Luis Sánchez Cesteros\r\n\r\nCorregir error \"Si observamos el formulario adjunto de “Detalles técnicos” podemos observar que el campo “Solicitud de oferta” aparece como “Aún falta por ser visada por Calidad” cuando en realidad la solicitud ya le ha llegado al suministrador. Es decir, no ha necesitado ser visada.\"'),
('060500.230711.134300.810775', 'PMC-21-005', 'Ordenar DPDs por año y número de DPD', 'Sugerecia', 4, '2021-02-15', 'PMC-017\n\nDetectado el 15/02/2021 por Ángel Luis Sánchez Cesteros\n\nSugerencia \"Sería interesante que en el formulario “Datos del Expediente” de  apareciese un campo con el gasto realmente facturado por los suministradores en el total de DPDs para ese expediente, con objeto tener de un vistazo todos los datos relevantes al efecto\"'),
('060500.230711.135001.974920', 'PMC-22-004', 'Incorporar riesgos de pedido a la base de datos. Evidenciando su trazabilidad con los riesgos de proyecto.', 'Auditoría interna 2022', 4, '2022-02-14', 'PMC-022'),
('060500.230711.135212.115109', 'PMC-22-009', 'Incorporar vídeos explicativos sobre el uso de la lanzadera a la misma. Se ha de poder saber quíen los ha visto y cuánto tiempo.', 'Sugerencias', 4, '2022-03-25', 'PMC-024 Sugerencia de Fátima Muñoz Curado\n\nSustituye a PMC-004 y PMC-005'),
('060500.230711.135245.791239', 'PMC-22-008', 'Modificar las etiquetas de los equipos de calibración', 'Sugerencia de Fátima Muñoz Curado\r\n\r\nModificar las etiquetas de los equipos de calibración, sustituyendo la información contenida en la misma por un código QR para que dicha información se mantenga siempre actualizada.', 4, '2022-03-15', 'PMC-025'),
('060500.230711.135334.305642', 'PMC-23-006', 'Actualizar check-list de seguimiento de proyectos', 'Sugerencia de Sergio García Montalvo\r\n\r\nActualización del check-list de seguimiento de los proyectos en formato informe \"informe de calidad de proyectos\" IQ01. De uso opcional por parte de los miembros de calidad.', 4, '2022-03-08', 'PMC-026'),
('060500.230711.135411.631386', 'PMC-22-013', 'Análisis de los antiguos indicadores e Introducción de indicadores nuevos.', 'Sugerencia de Fátima Muñoz Curado', 4, '2022-06-16', 'PMC-027'),
('060500.230711.135457.088833', 'PMC-22-017', 'Tratar los riesgos materializados como no conformidades', 'Sugerencia de Fátima Muñoz Curado\r\n\r\nTratar los riesgos materializados como no conformidades. Automatizando la apertura de la no conformidad cuando se cambia el estado del riesgo en la base de datos a materializado.', 4, '2022-07-18', 'PMC-028'),
('060500.230711.135535.328059', 'PMC-22-014', 'Incorporación de anexos de calidad y seguridad para la plantilla de compras', 'Sugerencia de Santiago Sandoval Igelmo', 4, '2022-06-17', 'PMC-029'),
('060500.230711.135609.375286', 'PMC-22-019', 'Creación de un informe de valoración de los proyectos para los jefes de proyecto', 'Sugerencia de Fátima Muñoz Curado', 4, '2022-07-20', 'PMC-030'),
('060500.230711.135643.748996', 'PMC-22-010', 'Evolución riesgos', 'Auditoría externa 2022 - Observación 02\r\n\r\nSe comprueba en el Plan de Gestión de riesgos PA200016CCCENN la escasa información relativa a la evolución de los riesgos que permita extraer conocimientos para similares proyectos.', 4, '2022-05-17', 'PMC-031'),
('060500.230711.135714.058852', 'PMC-22-011', 'Organizar los equipos de la maqueta de pruebas', 'Sugerencia de Sergio García Montalvo', 4, '2022-06-01', 'PMC-032'),
('060500.230711.135746.371305', 'PMC-22-012', 'Cambiar la caja de herramientas, pues alguno de los equipos está roto (como el soldador) y faltan algunos destornilladores.', 'Sugerencia de Sergio García Montalvo.\r\n', 1, '2022-06-15', 'PMC-033\r\n\r\nRechazado por construcción de laboratorio.'),
('060500.230711.135824.305464', 'PMC-22-016', 'Añadir una sección a la web de calidad recopilando todos los comunicados de calidad que se han mandado', 'Sugerencia de Andrés Román del Peral', 4, '2022-07-13', 'PMC-034'),
('060500.230711.135912.090837', 'PMC-22-020', 'Realizar una formación al área de defensa y seguridad, aprovechando que hay gente que la necesita, pero dándole un enfoque práctico como si fuera un juego de roles', 'Sugerencia de Sergio García Montalvo', 4, '2022-08-05', 'PMC-035'),
('060500.230711.140000.223292', 'PMC-22-018', 'Revisar los correos que envían las aplicaciones.', 'Sugerencia de Andrés Román del Peral. ', 3, '2022-07-19', 'PMC-036\r\n\r\nA falta de que Ana lo revise'),
('060500.230711.140212.285170', 'PMC-23-002', 'Mejorar el feedback del estado de los DPDs', 'Sugerencia de Ángel Luis Sánchez Cesteros\r\n\r\nSugerencia AGEDYS - En el formulario de \"Agenda técnica\"  no esta muy claro en que tejado esta el DPD. Aunque pone en el campo Oferta que esta pendiente de calidad, luego esta en rojo proceso técnico inacabado. Sugeriría fundir estos dos campos en uno, por ejemplo suprimir en campo de FIN AGENDA TECNICA, y poner en rojo “Pendiente de calidad” en el campo OFERTA. Cuando se finalice  técnicamente pues en el campo oferta se pone FIN AGENDA TECNICA, o algo así. Bueno si no se entiende, me dais un toque', 4, '2023-01-30', 'PMC-037'),
('060500.230711.140307.614981', 'PMC-23-003', 'Modificar el proceso de priorización de riesgos en la BBDD de riesgos, para hacerlo más fácil e intuitivo. Hacer video nuevo de formación.', 'Sugerencia de Fátima Muñoz Curado', 4, '2023-01-30', 'PMC-038'),
('060500.230711.140332.639830', 'PMC-23-004', 'En la BBDD gestión de riesgos, filtrar los riesgos \"Retirados\" para que no aparezcan en el listado general de riesgos.', 'Sugerencia de Fátima Muñoz Curado', 4, '2023-01-30', 'PMC-039'),
('060500.230711.140433.875578', 'PMC-23-007', 'Envío automático de los riesgos al RAC', 'Sugerencia de RAC Miguel Ángel Cerro Chamizo \r\n\r\nEn la BBDD gestión de riesgos, envío automático del informe de riesgos al RAC una vez que el técnico los publique. -Envío al RAC bajo demanda', 4, '2023-02-17', 'PMC-040'),
('060500.230711.140601.294148', 'PMC-23-005', 'Inventario de equipos de medida para la aplicación del BRASS', 'Observación nº5 de la auditoría interna (con fecha 16/02/2023)\r\n\r\nEn la BBDD del proyecto BRASS, incluir un inventario con los equipos de medida utilizados y sus calibraciones correspondientes. Para que puedan ser añadidos en los eventos que se utilizan (a modo de desplegable).', 4, '2023-02-16', 'PMC-041\r\n\r\n'),
('060500.230711.140637.237952', 'PMC-23-006', 'En la BBDD gestión de riesgos, establecimiento obligatorio de fechas de inicio, fin previsto y fin real de las acciones establecidas para los planes de mitigación y planes de contingencia del riesgo.', 'OB nº4 de la auditoría interna (con fecha 16/02/2023) ', 4, '2023-02-16', 'PMC-042'),
('060500.230711.140716.536316', 'PMC-23-008', 'En la BBDD de BRASS posibilidad de alta masiva de eventos repetitivos', 'Sugerencia de Félix Sánchez Pimentel', 4, '2023-03-14', 'PMC-043'),
('060500.230711.140736.204731', 'PMC-23-001', 'Modificar la BBDD de Gestión de riesgos para poder manejar varios planes de mitigación y contingencia sin necesidad de cerrar los planes anteriores.', 'Sugerencia de Fátima Muñoz Curado', 4, '2023-01-15', 'PMC-044'),
('060500.230711.140826.907559', 'PMC-23-009', 'Cambio (ampliación del desplegablepara poder visualizarlo todo) en los títulos de los expedientes de AGEDO', 'Sugerencia de Ángel Cesteros. ', 4, '2023-06-06', 'PMC-045\r\n\r\nSe decide modificar la forma de dar de alta el expediente poniendo al principio un texto que indique el expediente de forma unívoca ');

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
('060101.230710.122559.795141', 'RSG-003', 'RP02- Flujos de información', 1, 'La información de configuración de los proyectos no circula entre todos los implicados en el proyecto y la actualización no es fácilmente controlable', '060100.230606.121511.947678', '2019-01-17', 3, 'Al trabajar con sistemas de Información aislados y en ubicaciones dispersas de Telefónica y el Cliente no se actualizan  los sistemas de gestión de configuración el instante, quedando en manos del JP la actualización a posteriori.', 1, '', '.Antiguo R-08.'),
('060101.230710.122643.967351', 'RSG-004', 'RP02- Incumplimiento de Plazos', 1, 'Plazos cortos de ejecución impuestos por el cliente y trabajos limitados por accesos a sus instalaciones, disponiblidad de servicios,…', '060100.230606.121511.947678', '2019-01-17', 4, 'Los plazos y la limitación de acceso a las instalaciones las marca el cliente.', 1, '', 'Antiguo R-09 y R-10.'),
('060101.230711.114317.528892', 'RSG-005', 'RP02-  RRHH', 1, 'Muy limitado para la ejecución del proyecto y atención al RAC.', '060100.230606.121511.947678', '2018-11-08', 3, 'Se han solicitado la sustitución de las bajas.', 2, '', ''),
('060102.230608.134244.991534', 'OPO-001', 'Automatización (Riesgos)', 2, 'Automatización de la gestión de riesgos.', '060100.230606.121511.947678', '2019-01-30', 5, 'TSol/TdE: Disponibilidad de recursos y necesidad.', 2, '', 'Antiguo O-01'),
('060102.230608.134244.991535', 'OPO-002', 'Automatización (Configuración)', 2, 'Automatización de la gestión de configuración.', '060100.230606.121511.947678', '2019-01-30', 6, 'Con los recursos actuales no hay capacidad para acometer esta oportunidad.', 1, '', 'Antigua O-02'),
('060102.230608.134244.991536', 'OPO-003', 'Unificación de procesos', 2, 'Unificación del proceso TdE y TSOL', '060100.230606.121511.947678', '2019-01-30', 7, 'Depende de la unificación de los  SIG por parte de  PROCESOS y CERTIFICACIÓN', 2, '2019-07-02', 'Antigua O-03, O-06, O-08.'),
('060102.230710.125751.296835', 'OPO-004', 'Unificación de procedimientos', 2, 'Unificar el Procedimiento de TdE y la Guía de TSOL', '060100.230606.121511.947678', '2023-07-10', 5, 'Autorización por parte del AII', 2, '', 'Antiguas O-04, O-05, O-07 y O-09.'),
('060102.230710.125957.267701', 'OPO-005', 'Integración SGC', 2, 'Integrar en el sistema de calidad de TdE, el \"subsistema\" PECAL de DyS', '060100.230606.121511.947678', '2019-01-17', 7, 'Depende de la unificación de los  SIG por parte de  PROCESOS y CERTIFICACIÓN.', 2, '', 'Antigua O-10.'),
('060102.230710.130049.893052', 'OPO-006', 'Mejora control Riesgos', 2, 'Mejorar el control que se tiene sobre los riesgos materializados', '060100.230606.121511.947678', '2023-07-10', 5, 'Cuando se materializa un riesgo en la aplicación, el control del mismo lo lleva íntegramente el Jefe de Proyecto, siendo la visibildidad de calidad limitada en este sentido.\r\n\r\nAl tratarlo como una No Conformidad, se lleva un mayor control desde calidad, y de todas las partes interesadas del proyecto.', 1, '', 'Antigua O-11.'),
('060102.230710.130132.288664', 'OPO-007', 'Mejora control evolución Riesgos', 2, 'Mejorar el control que se tiene sobre la evolución de los riesgos en un proyecto', '060100.230606.121511.947678', '2023-07-10', 5, 'Nace de una auditoría externa como propuesta del auditor\r\n\r\n [Referenciar auditoría]', 1, '', 'Antigua O-12.'),
('060102.230710.130238.305404', 'OPO-008', 'Nuevos indicadores', 2, 'Llevar un mayor control del proceso con la incorporación de nuevos indicadores', '060100.230606.121511.947678', '2023-07-10', 5, 'Únicamente tenemos 3 indicadores de proceso, y no aportan mucha información para la mejora del desempeño.', 1, '', 'Antiguos O-13, O-14 y O-15.');

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
('070401.190321.170437.969652', 'CDQ-19-003', 'Integración Sistema de Calidad', 1, '2019-03-21', '070501.217144.327751.798139', 'CQ-049', ''),
('070401.190328.170437.969653', 'CDQ-19-004', 'Cambios Sistema de Calidad del área de Defensa', 1, '2019-03-28', '070501.217144.327751.798139', 'CQ-050', ''),
('070401.190516.170437.969654', 'CDQ-19-005', 'Cambios Sistema de Calidad del área de Defensa', 1, '2019-05-16', '070501.217144.327751.798139', 'CQ-051', ''),
('070401.190520.170437.969655', 'CDQ-19-006', 'Cambios Sistema de Calidad del área de Defensa', 1, '2019-05-20', '070501.217144.327751.798139', 'CQ-052', ''),
('070401.190607.170437.969656', 'CDQ-19-007', 'Cambios Sistema de Calidad del área de Defensa', 1, '2019-06-07', '070501.217144.327751.798139', 'CQ-053', ''),
('070401.190607.170437.969657', 'CDQ-19-008', 'Cambios Sistema de Calidad del área de Defensa', 1, '2019-06-07', '070501.217144.327751.798139', 'CQ-053B', ''),
('070401.190701.170437.969658', 'CDQ-19-009', 'Cambios Sistema de Calidad del área de Defensa', 1, '2019-07-01', '070501.217144.327751.798139', 'CQ-054', ''),
('070401.190726.170437.969659', 'CDQ-19-010', 'Integración Sistema de Calidad del área de Defensa', 1, '2019-07-26', '070501.217144.327751.798139', 'CQ-055B', ''),
('070401.190916.170437.969660', 'CDQ-19-011', 'actualización de la tabla de CÓDIGOS de ARTÍCULOS para pedidos', 1, '2019-09-16', '', 'CQ-055C', ''),
('070401.191009.170437.969661', 'CDQ-19-012', 'Cambios Sistema de Calidad del área de Defensa', 1, '2019-10-09', '070501.217144.327751.798139', 'CQ-056', ''),
('070401.200107.170437.969662', 'CDQ-20-001', 'Planificación Calibración de Equipos 2020', 3, '2020-01-07', '070501.217144.327751.798139', 'CQ-057', ''),
('070401.200128.170437.969663', 'CDQ-20-002', 'Documentación Modificada', 2, '2020-01-28', '070501.217144.327751.798139', 'CQ-058', ''),
('070401.200224.170437.969664', 'CDQ-20-003', 'Documentación Modificada', 2, '2020-02-24', '070501.217144.327751.798139', 'CQ-059', ''),
('070401.200407.170437.969665', 'CDQ-20-004', 'Situación Calidad durante COVID19', 1, '2020-04-07', '', 'CQ-060', ''),
('070401.200408.170437.969666', 'CDQ-20-005', 'Calibración de Equipos de Medida', 4, '2020-04-08', '070501.217144.327751.798139', 'CQ-061', ''),
('070401.200413.170437.969667', 'CDQ-20-006', 'Nueva versión de Gestión de Riesgos', 3, '2020-04-13', '070501.217144.327751.798139', 'CQ-062', ''),
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
('070401.220428.170437.969690', 'CDQ-22-008', 'En mayo se vienen cositas ¡Estáis preparados/as?', 5, '2022-04-28', '070501.217144.327751.798139', 'CQ-085', ''),
('070401.220614.170437.969692', 'CDQ-22-009', '¿Has valorado los riesgos del día de hoy?', 3, '2022-06-14', '070501.196196.739183.716643', 'CQ-086', 'Sabemos que te encantan los riesgos. Por ello, hemos mejorado la base de datos para ti, ¿Quieres verlo?'),
('070401.220630.170437.969692', 'CDQ-22-010', 'Calidad y Seguridad EVERYWHERE', 1, '2022-06-30', '070501.196196.739183.716643', 'CQ-087', '¿Que hay que mejorar algo del proceso de compras? Sin problema, para eso está calidad :)'),
('070401.220708.170437.969693', 'CDQ-22-011', 'Renovarse o morir', 2, '2022-07-08', '070501.196196.739183.716643', 'CQ-088', 'Se han hecho algunos cambios en la documentación del sistema, ¡Entra a verlos!'),
('070401.220831.172600.000001', 'CDQ-22-012', 'ADIÓS A LAS VACACIONES Y HOLA A LAS ACTUALIZACIONES', 2, '2022-08-31', '070501.196196.739183.716643', 'CQ-089', '¡Volvemos de vacaciones con las pilas cargadas!'),
('070401.221031.172600.000001', 'CDQ-22-013', 'Quality review - Del 01 de octubre al 31 de octubre', 1, '2022-10-31', '070501.196196.739183.716643', 'CQ-090', '¡Te presentamos la primera revista de calidad, creada por y para el Departamento de Defensa de Telefónica!'),
('070401.230331.182032.539716', 'CDQ-23-001', 'Quality review - Del 01 de febrero al 31 de marzo', 1, '2023-03-31', '070501.196196.739183.716643', 'CQ-091', 'Ha habido muchas noticias entre febrero y marzo, ¡Deja que te las presentemos en este quality review!'),
('070401.230905.090120.620354', 'CDQ-23-002', 'Quality review - Del 31 de marzo al 05 de septiembre', 1, '2023-09-05', '070501.196196.739183.716643', 'CQ-092', 'Terminan las vacaciones... ¡y empieza la calidad!');

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
('070401.220708.170437.969693', 0),
('070401.220831.172600.000001', 0),
('070401.221031.172600.000001', 3),
('070401.230331.182032.539716', 2),
('070401.230905.090120.620354', 1);

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
-- Base de datos: `07_documentacionexterna`
--
CREATE DATABASE IF NOT EXISTS `07_documentacionexterna` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `07_documentacionexterna`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `07_documentosexternos`
--

CREATE TABLE `07_documentosexternos` (
  `id` varchar(28) NOT NULL,
  `codigo_interno` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `denominador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tipo` varchar(28) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `estado` int NOT NULL DEFAULT '1',
  `comentarios` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `07_documentosexternos`
--

INSERT INTO `07_documentosexternos` (`id`, `codigo_interno`, `denominador`, `tipo`, `estado`, `comentarios`) VALUES
('070108.230926.153120.417482', 'ISO 9001:2015', 'Sistemas de Gestión de la Calidad', 'Normativa', 1, NULL),
('070108.230926.153265.950124', 'PECAL 2110 Ed.4', 'Requisitos OTAN de aseguramiento de la calidad para el diseño, el desarrollo y la producción', 'Normativa', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `07_ISO_9001_2015`
--

CREATE TABLE `07_ISO_9001_2015` (
  `id` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'N/A',
  `codigo_interno` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `denominador` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contenido` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `orden` int NOT NULL,
  `indice` int NOT NULL,
  `comentarios` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `07_ISO_9001_2015`
--

INSERT INTO `07_ISO_9001_2015` (`id`, `codigo_interno`, `denominador`, `contenido`, `orden`, `indice`, `comentarios`) VALUES
('070109.150901.000000.000100', '10', 'Mejora', '', 70, 1, ''),
('070109.150901.000000.000101', '10.1', 'Generalidades', 'La organización debe determinar y seleccionar las oportunidades de mejora e implementar cualquier acción necesaria para cumplir los requisitos del cliente y aumentar la satisfacción del cliente.\n\nÉstas deben incluir:\n\na) mejroar los productos y servicios para cumplir los requiistos, así como considerar las necesidades  y expectativas futuras;\n\nb) corregir, prevenir o reducir los efectos no deseados;\n\nc) mejroar el desempeño y la efiacia del sistema de gestión de la calidad.\n\nNOTA: Los ejemplos de mejora pueden incluir corrección, acción correctiva, mejora continua, cambio abruto, innovación y reorganización.', 71, 2, ''),
('070109.150901.000000.000102', '10.2', 'No conformidad y acción correctiva', '10.2.1 Cuando ocurra una no conformidad, incluida cualquiera originada por quejas, la organización debe:\n\na) reaccionar ante al no conformidad y, cuando sea aplicable;\n\n1) tomar accinoes para controlarla y corregirla;\n\n2) hacer frente a las consecuencias;\n\nb) evaluar la necesidad de acciones para eliminar las causas  de la no conformidad, con el fin de que no vuelva a ocurrir ni ocurra en otra parte, mediante:\n\n1) la revisión y el análisis de la no conformidad;\n\n2) la determinación de las causas de la no conformidad;\n\n3) la determinación de si existen no conformidades similares, o que potencialmente puedan ocurrir.\n\nC) implementar cualquier acción necesaria;\n\nd) revisar la eficacia de cualquier acción correctiva tomada; \n\ne) si fuera necesario, actualizar los riesgos y oportunidades determinados durante la planificación; y\n\nf) si fuera necesario, hacer cambios al sistema de gestión de la calidad.\n\n10.2.2 La organización debe conservar información documentada como evidencia de:\n\na) la naturaleza de las no conformidades y cualquier acción tomada posteriormente;\n\nb) los resultados de cualqueir acción correctiva.\n\nLas acciones correctivas deben ser apropiadas a los efectos de las no conformidades encontradas.', 72, 2, ''),
('070109.150901.000000.000103', '10.3', 'Mejora continua', 'La organización debe mejorar continuamente la conveniencia, adecuación y eficacia del sistema de gestión de la calidad.\n\nLa organización debe considerar los resultados del análsisi y la evaluación, y las saidas de la revisión por la dirección, para determinar si hay necesiaddes u oportunidades que deben considerarse como parte de la mejora continua.', 73, 2, ''),
('070109.150901.000000.000400', '4', 'Contexto de la organización', '', 1, 1, ''),
('070109.150901.000000.000410', '4.1', 'Comprensión de la organización y de su contexto', 'La organización debe determinar las cuestiones externas e internas que son pertienntes para su propósito y su dirección estratégica, y que afectan a su capacidad para lograr los resultados previstos de sus sistema de gestión de la calidad.\n\nLa organización debe realizar el seguimietno y la revisión e la información sobre estas cuestiones externas e internas.\n\nNOTA 1: Las cuestiones pueden incluir factores positivos y negativos o condiciones para su consideración.\n\nNOTA 2: La comprensión del contexto exerno puede verse facilitada al considerar cuestiones que surgen de los entornos legal, tecnológico, competitivo, de mercado, cultural, social y económico, ya sea internacional, nacional, regional o local.\n\nNOTA 3: La comprensión del contexto interno pueden verse facilitada al considerar cuestiones relativas a los valores, la cultura, los conocimientos y el desempeño de la organización.', 2, 2, ''),
('070109.150901.000000.000420', '4.2', 'Comprensión de las necesidades y expectativa de las partes interesadas', 'Debido a su efecto o efecto potencial en la capacidad de la organización de proporcionar regularmente productos y servicios que satisfagan los requisitos del cliente y los legales y reglamentarios aplicables, la organización debe determinar:\n\na) las partes interesadas que son pertinentes al sistema de gestión de la calidad;\n\nb) los requisitos pertinentes de estas partes interesadas para el sistema de gestión de la calidad.\n\nLa organización debe realizar el seguimiento y la revisión de la información sobre estas partes interesadas y sus requisitos pertinentes.', 3, 2, ''),
('070109.150901.000000.000430', '4.3', 'Determinación del alcance del sistema de gestión de la calidad', 'La organización debe determinar los límites y la aplicabilidad del sistema de gestión de la calidad para establecer su alcance.\n\nCuando se determina este alcance, la organización debe considerar:\n\na) las cuestiones externas e internas indicadas en el apartado 4.1;\n\nb) los requisitos de las partes interesadas pertinentes indicados en el apartado 4.2;\n\nc) los productos y servicios de la organización.\n\nLa organización debe aplicar todos los requisitos de esta Norma Internacional si son aplicables en el alcance determinado de su sistema de gestión de la calidad.\n\nEl alcance del sistema de gestión de la calidad de la organización debe estar disponible y mantenerse como información documentada. El alcance debe establecer los tipos de productos y servicios cubiertos, y proporcionar la justificación para cualquier requisito de esta Norma Internacional que la organización determine que no es aplicable para el alcance de su sistema de gestión de la calidad.\n\nLa conformidad con esta Norma Internacional sólo se puede declarar si los requisitos determinados como no aplicables no afectan a la capacidad o a la responsabilidad de la organización de asegurarse de la conformidad de sus productos y servicios y del aumento de la satisfacción del cliente.', 4, 2, ''),
('070109.150901.000000.000440', '4.4', 'Sistema de gestión de la calidad y sus procesos', '4.4.1 La organización debe establecer, implementar, mantener y mejorar continuamente un sistema de gestión de la calidad, incluidos los procesos necesarios y sus interacciones, de acuerdo con los requisitos de esta Norma Internacional.\nLa organización debe determinar los procesos necesarios para el sistema de gestión de la calidad y su aplicación a través de la organización, y debe:\n\na) determinar las entradas requeridas y las salidas esperadas de estos procesos;\n\nb) determinar la secuencia e interacción de estos procesos;\n\nc) determinar y aplicar los criterios y los métodos (incluyendo el seguimiento, las mediciones y los indicadores del desempeño relacionados) necesarios para asegurarse de la operación eficaz y el control de estos procesos;\n\nd) determinar los recursos necesarios para estos procesos y asegurarse de su disponibilidad;\n\ne) asignar las responsabilidades y autoridades para estos procesos;\n\nf) abordar los riesgos y oportunidades determinados de acuerdo con los requisitos del apartado 6.1;\n\ng) evaluar estos procesos e implementar cualquier cambio necesario para asegurarse de que estos procesos logran los resultados previstos;\n\nh) mejorar los procesos y el sistema de gestión de la calidad.\n\n4.4.2 En la medida en que sea necesario, la organización debe:\n\na) mantener información documentada para apoyar la operación de sus procesos;\n\nb) conservar la información documentada para tener la confianza de que los procesos se realizan según lo planificado.', 5, 2, ''),
('070109.150901.000000.000500', '5', 'Liderazgo', '', 6, 1, ''),
('070109.150901.000000.000510', '5.1', 'Liderazgo y compromiso', '', 7, 2, ''),
('070109.150901.000000.000511', '5.1.1', 'Generalidades', 'La alta dirección debe demostrar liderazgo y compromiso con respecto al sistema de gestión de la calidad:\n\na) asumiendo la responsabilidad y obligación de rendir cuentas con relación a la eficacia del sistema de gestión de la calidad;\n\nb) asegurándose de que se establezcan la política de la calidad y los objetivos de la calidad para el sistema de gestión de la calidad, y que éstos sean compatibles con el contexto y la dirección estratégica de la organización;\n\nc) asegurándose de la integración de los requisitos del sistema de gestión de la calidad en los procesos de negocio de la organización;\n\nd) promoviendo el uso del enfoque a procesos y el pensamiento basado en riesgos;\n\ne) asegurándose de que los recursos necesarios para el sistema de gestión de la calidad estén disponibles;\n\nf) comunicando la importancia de una gestión de la calidad eficaz y conforme con los requisitos del sistema de gestión de la calidad;\n\ng) asegurándose de que el sistema de gestión de la calidad logre los resultados previstos;\n\nh) comprometiendo, dirigiendo y apoyando a las personas, para contribuir a la eficacia del sistema de gestión de la calidad;\n\ni) promoviendo la mejora;\n\nj) apoyando otros roles pertinentes de la dirección, para demostrar su liderazgo en la forma en la que aplique a sus áreas de responsabilidad.\n\nNOTA En esta Norma Internacional se puede interpretar el término “negocio” en su sentido más amplio, es decir, referido a aquellas actividades que son esenciales para la existencia de la organización; tanto si la organización es pública, privada, con o sin fines de lucro.', 8, 3, ''),
('070109.150901.000000.000512', '5.1.2', 'Enfoque al cliente', 'La alta dirección debe demostrar liderazgo y compromiso con respecto al enfoque al cliente asegurándose de que:\n\na) se determinan, se comprenden y se cumplen regularmente los requisitos del cliente y los legales y reglamentarios aplicables;\n\nb) se determinan y se consideran los riesgos y oportunidades que pueden afectar a la conformidad de los productos y servicios y a la capacidad de aumentar la satisfacción del cliente;\n\nc) se mantiene el enfoque en el aumento de la satisfacción del cliente.', 9, 3, ''),
('070109.150901.000000.000520', '5.2', 'Política', '', 10, 2, ''),
('070109.150901.000000.000521', '5.2.1', 'Establecimiento de la política de calidad', 'La alta dirección debe establecer, implementar y mantener una política de la calidad que:\n\na) sea apropiada al propósito y contexto de la organización y apoye su dirección estratégica;\n\nb) proporcione un marco de referencia para el establecimiento de los objetivos de la calidad;\n\nc) incluya un compromiso de cumplir los requisitos aplicables;\n\nd) incluya un compromiso de mejora continua del sistema de gestión de la calidad.', 11, 3, ''),
('070109.150901.000000.000522', '5.2.2', 'Comunicación de la política de la calidad', 'La política de la calidad debe:\n\na) estar disponible y mantenerse como información documentada;\n\nb) comunicarse, entenderse y aplicarse dentro de la organización;\n\nc) estar disponible para las partes interesadas pertinentes, según corresponda.', 12, 3, ''),
('070109.150901.000000.000530', '5.3', 'Roles, responsabilidades y autoridades en la organización', 'La alta dirección debe asegurarse de que las responsabilidades y autoridades para los roles pertinentes se asignen, se comuniquen y se entiendan en toda la organización.\n\nLa alta dirección debe asignar la responsabilidad y autoridad para:\n\na) asegurarse de que el sistema de gestión de la calidad es conforme con los requisitos de esta Norma Internacional;\n\nb) asegurarse de que los procesos están generando y proporcionando las salidas previstas;\n\nc) informar, en particular, a la alta dirección sobre el desempeño del sistema de gestión de la calidad y sobre las oportunidades de mejora (véase 10.1);\n\nd) asegurarse de que se promueve el enfoque al cliente en toda la organización;\n\ne) asegurarse de que la integridad del sistema de gestión de la calidad se mantiene cuando se planifican e implementan cambios en el sistema de gestión de la calidad.', 13, 2, ''),
('070109.150901.000000.000600', '6', 'Planificación', '', 14, 1, ''),
('070109.150901.000000.000610', '6.1', 'Acciones para abordar riesgos y oportunidades', '6.1.1 Al planificar el sistema de gestión de la calidad, la organización debe considerar las cuestiones referidas en el apartado 4.1 y los requisitos referidos en el apartado 4.2, y determinar los riesgos y oportunidades que es necesario abordar con el fin de:\n\na) asegurar que el sistema de gestión de la calidad pueda lograr sus resultados previstos;\n\nb) aumentar los efectos deseables;\n\nc) prevenir o reducir efectos no deseados;\n\nd) lograr la mejora.\n\n6.1.2 La organización debe planificar:\n\na) las acciones para abordar estos riesgos y oportunidades;\n\nb) la manera de:\n\n1) integrar e implementar las acciones en sus procesos del sistema de gestión de la calidad\n(véase 4.4.);\n\n2) evaluar la eficacia de estas acciones.\n\nLas acciones tomadas para abordar los riesgos y oportunidades deben ser proporcionales al impacto potencial en la conformidad de los productos y los servicios.\n\nNOTA 1 Las opciones para abordar los riesgos pueden incluir: evitar riesgos, asumir riesgos para perseguir una oportunidad, eliminar la fuente de riesgo, cambiar la probabilidad o las consecuencias, compartir el riesgo o mantener riesgos mediante decisiones informadas.\n\nNOTA 2 Las oportunidades pueden conducir a la adopción de nuevas prácticas, lanzamiento de nuevos productos, apertura de nuevos mercados, acercamiento a nuevos clientes, establecimiento de asociaciones, utilización de nuevas tecnologías y otras posibilidades deseables y viables para abordar las necesidades de la organización o las de sus clientes.', 15, 2, ''),
('070109.150901.000000.000620', '6.2', 'Objetivos de la calidad  y planificación para lograrlos', '6.2.1 La organización debe establecer objetivos de la calidad para las funciones y niveles pertinentes y los procesos necesarios para el sistema de gestión de la calidad.\n\nLos objetivos de la calidad deben:\n\na) ser coherentes con la política de la calidad;\nb) ser medibles;\nc) tener en cuenta los requisitos aplicables;\nd) ser pertinentes para la conformidad de los productos y servicios y para el aumento de la satisfacción del cliente;\ne) ser objeto de seguimiento;\nf) comunicarse;\ng) actualizarse, según corresponda.\n\nLa organización debe mantener información documentada sobre los objetivos de la calidad\n\n6.2.2 Al planificar cómo lograr sus objetivos de la calidad, la organización debe determinar:\n\na) qué se va a hacer;\nb) qué recursos se requerirán;\nc) quién será responsable;\nd) cuándo se finalizará;\ne) cómo se evaluarán los resultados.', 16, 2, ''),
('070109.150901.000000.000630', '6.3', 'Planificación de los cambios', 'Cuando la organización determine la necesidad de cambios en el sistema de gestión de la calidad, estos cambios se deben llevar a cabo de manera planificada (véase 4.4).\n\nLa organización debe considerar:\n\na) el propósito de los cambios y sus consecuencias potenciales;\nb) la integridad del sistema de gestión de la calidad;\nc) la disponibilidad de recursos;\nd) la asignación o reasignación de responsabilidades y autoridades', 17, 2, ''),
('070109.150901.000000.000700', '7', 'Apoyo', '', 18, 1, ''),
('070109.150901.000000.000710', '7.1', 'Recursos', '', 19, 2, ''),
('070109.150901.000000.000711', '7.1.1', 'Generalidades', 'La organización debe determinar y proporcionar los recursos necesarios para el establecimiento, implementación, mantenimiento y mejora continua del sistema de gestión de la calidad.\n\nLa organización debe considerar:\n\na) las capacidades y limitaciones de los recursos internos existentes;\nb) qué se necesita obtener de los proveedores externos.', 20, 3, ''),
('070109.150901.000000.000712', '7.1.2', 'Personas', 'La organización debe determinar y proporcionar las personas necesarias para la implementación eficaz de su sistema de gestión de la calidad y para la operación y control de sus procesos.', 21, 3, ''),
('070109.150901.000000.000713', '7.1.3', 'Infraestructura', 'La organización debe determinar, proporcionar y mantener la infraestructura necesaria para la operación de sus procesos y lograr la conformidad de los productos y servicios.\n\nNOTA La infraestructura puede incluir:\n\na)   edificios y servicios asociados;\nb)   equipos, incluyendo hardware y software;\nc)   recursos de transporte;\nd)   tecnologías de la información y la comunicación.', 22, 3, ''),
('070109.150901.000000.000714', '7.1.4', 'Ambiente para la operación de los procesos', 'La organización debe determinar, proporcionar y mantener el ambiente necesario para la operación de sus procesos y para lograr la conformidad de los productos y servicios.\n\nNOTA Un ambiente adecuado puede ser una combinación de factores humanos y físicos, tales como:\n\na)   sociales (por ejemplo, no discriminatorio, ambiente tranquilo, libre de conflictos);\nb)   psicológicos (por ejemplo, reducción del estrés, prevención del síndrome de agotamiento, cuidado de las emociones);\nc)   físicos (por ejemplo, temperatura, calor, humedad, iluminación, circulación del aire, higiene, ruido).\n\nEstos factores pueden diferir sustancialmente dependiendo de los productos y servicios suministrados.', 23, 3, ''),
('070109.150901.000000.000715', '7.1.5', 'Recursos de seguimietno y medición', '7.1.5.1 Generalidades\n\nLa organización debe determinar y proporcionar los recursos necesarios para asegurarse de la validez y fiabilidad de los resultados cuando se realice el seguimiento o la medición para verificar la conformidad de los productos y servicios con los requisitos.\n\nLa organización debe asegurarse de que los recursos proporcionados:\n\na) son apropiados para el tipo específico de actividades de seguimiento y medición realizadas;\nb) se mantienen para asegurarse de la idoneidad continua para su propósito.\n\nLa organización debe conservar la información documentada apropiada como evidencia de que los\nrecursos de seguimiento y medición son idóneos para su propósito.\n\n7.1.5.2 Trazabilidad de las mediciones\n\nCuando la trazabilidad de las mediciones es un requisito, o es considerada por la organización como parte esencial para proporcionar confianza en la validez de los resultados de la medición, el equipo de medición debe:\n\na) calibrarse o verificarse , o ambas, a intervalos especificados, o antes de su utilización, contra patrones de medición trazables a patrones de medición internacionales o nacionales; cuando no existan tales patrones, debe conservarse como información documentada la base utilizada para la calibración o la verificación;\nb) identificarse para determinar su estado;\nc) protegerse contra ajustes, daño o deterioro que pudieran invalidar el estado de calibración y los posteriores resultados de la medición.\n\nLa organización debe determinar si la validez de los resultados de medición previos se ha visto afectada de manera adversa cuando el equipo de medición se considere no apto para su propósito previsto, y debe tomar las acciones adecuadas cuando sea necesario.', 24, 3, ''),
('070109.150901.000000.000716', '7.1.6', 'Conocimientos de la organización', 'La organización debe determinar los conocimientos necesarios para la operación de sus procesos y para lograr la conformidad de los productos y servicios.\n\nEstos conocimientos deben mantenerse y ponerse a disposición en la medida en que sea necesario.\n\nCuando se abordan las necesidades y tendencias cambiantes, la organización debe considerar sus conocimientos actuales y determinar cómo adquirir o acceder a los conocimientos adicionales necesarios y a las actualizaciones requeridas.\n\nNOTA 1 Los conocimientos de la organización son conocimientos específicos que la organización adquiere generalmente con la experiencia. Es información que se utiliza y se comparte para lograr los objetivos de la organización.\n\nNOTA 2 Los conocimientos de la organización pueden basarse en:\n\na)   fuentes internas (por ejemplo, propiedad intelectual; conocimientos adquiridos con la experiencia; lecciones aprendidas de los fracasos y de proyectos de éxito; capturar y compartir conocimientos y experiencia no documentados; los resultados de las mejoras en los procesos, productos y servicios);\nb)   fuentes externas (por ejemplo, normas; academia; conferencias; recopilación de conocimientos provenientes de clientes o proveedores externos).', 25, 3, ''),
('070109.150901.000000.000720', '7.2', 'Competencia', 'La organización debe:\n\na) determinar la competencia necesaria de las personas que realizan, bajo su control, un trabajo que afecta al desempeño y eficacia del sistema de gestión de la calidad;\nb) asegurarse de que estas personas sean competentes, basándose en la educación, formación o experiencia apropiadas;\nc) cuando sea aplicable, tomar acciones para adquirir la competencia necesaria y evaluar la eficacia de las acciones tomadas;\nd) conservar la información documentada apropiada como evidencia de la competencia.\n\nNOTA Las acciones aplicables pueden incluir, por ejemplo, la formación, la tutoría o la reasignación de las personas empleadas actualmente; o la contratación o subcontratación de personas competentes.', 26, 2, ''),
('070109.150901.000000.000730', '7.3', 'Toma de conciencia', 'La organización debe asegurarse de que las personas que realizan el trabajo bajo el control de la organización tomen conciencia de:\n\na) la política de la calidad;\nb) los objetivos de la calidad pertinentes;\nc) su contribución a la eficacia del sistema de gestión de la calidad, incluidos los beneficios de una mejora del desempeño;\nd) las implicaciones del incumplimiento de los requisitos del sistema de gestión de la calidad.', 27, 2, ''),
('070109.150901.000000.000740', '7.4', 'Comunicación', 'La organización debe determinar las comunicaciones internas y externas pertinentes al sistema de\ngestión de la calidad, que incluyan:\n\na) qué comunicar;\nb) cuándo comunicar;\nc) a quién comunicar;\nd) cómo comunicar;\ne) quién comunica.', 28, 2, ''),
('070109.150901.000000.000750', '7.5', 'Información documentada', '', 29, 2, ''),
('070109.150901.000000.000751', '7.5.1', 'Generalidades', 'El sistema de gestión de la calidad de la organización debe incluir:\n\na) la información documentada requerida por esta Norma Internacional;\nb) la información documentada que la organización determina como necesaria para la eficacia del sistema de gestión de la calidad.\n\nNOTA La extensión de la información documentada para un sistema de gestión de la calidad puede variar de una organización a otra, debido a:\n\n—   el tamaño de la organización y su tipo de actividades, procesos, productos y servicios;\n—   la complejidad de los procesos y sus interacciones; y\n—   la competencia de las personas.', 30, 3, ''),
('070109.150901.000000.000752', '7.5.2', 'Creación y actualización', 'Al crear y actualizar la información documentada, la organización debe asegurarse de que lo siguiente sea apropiado:\n\na) la identificación y descripción (por ejemplo, título, fecha, autor o número de referencia);\nb) el formato (por ejemplo, idioma, versión del software, gráficos) y los medios de soporte (por ejemplo, papel, electrónico);\nc) la revisión y aprobación con respecto a la conveniencia y adecuación.', 31, 3, ''),
('070109.150901.000000.000753', '7.5.3', 'Control de la información documentada', '7.5.3.1 La información documentada requerida por el sistema de gestión de la calidad y por esta Norma Internacional se debe controlar para asegurarse de que:\n\na) esté disponible y sea idónea para su uso, donde y cuando se necesite;\nb) esté protegida adecuadamente (por ejemplo, contra pérdida de la confidencialidad, uso inadecuado o pérdida de integridad).\n\n7.5.3.2 Para el control de la información documentada, la organización debe abordar las siguientes actividades, según corresponda:\n\na) distribución, acceso, recuperación y uso;\nb) almacenamiento y preservación, incluida la preservación de la legibilidad;\nc) control de cambios (por ejemplo, control de versión);\nd) conservación y disposición.\n\nLa información documentada de origen externo, que la organización determina como necesaria para la planificación y operación del sistema de gestión de la calidad, se debe identificar, según sea apropiado, y controlar.\n\nLa información documentada conservada como evidencia de la conformidad debe protegerse contra modificaciones no intencionadas.\n\nNOTA El acceso puede implicar una decisión en relación al permiso, solamente para consultar la información documentada, o al permiso y a la autoridad para consultar y modificar la información documentada.', 32, 3, ''),
('070109.150901.000000.000800', '8', 'Operación', '', 33, 1, ''),
('070109.150901.000000.000810', '8.1', 'Planificación y control operacional', 'La organización debe planificar, implementar y controlar los procesos (véase 4.4) necesarios para cumplir los requisitos para la provisión de productos y servicios, y para implementar las acciones determinadas en el capítulo 6, mediante:\n\na) la determinación de los requisitos para los productos y servicios;\nb) el establecimiento de criterios para:\n\n1) los procesos;\n2) la aceptación de los productos y servicios;\n\nc) la determinación de los recursos necesarios para lograr la conformidad con los requisitos de los productos y servicios;\nd) la implementación del control de los procesos de acuerdo con los criterios;\ne) la determinación, el mantenimiento y la conservación de la información documentada en la extensión necesaria para:\n\n1) tener confianza en que los procesos se han llevado a cabo según lo planificado;\n2) demostrar la conformidad de los productos y servicios con sus requisitos.\n\nLa salida de esta planificación debe ser adecuada para las operaciones de la organización.\n\nLa organización debe controlar los cambios planificados y revisar las consecuencias de los cambios no previstos, tomando acciones para mitigar cualquier efecto adverso, según sea necesario.\n\nLa organización debe asegurarse de que los procesos contratados externamente estén controlados (véase 8.4).', 34, 2, ''),
('070109.150901.000000.000820', '8.2', 'Requisitos para los productos y servicios', '', 35, 2, ''),
('070109.150901.000000.000821', '8.2.1', 'Comunicación con el cliente', 'La comunicación con los clientes debe incluir:\n\na) proporcionar la información relativa a los productos y servicios;\nb) tratar las consultas, los contratos o los pedidos, incluyendo los cambios;\nc) obtener la retroalimentación de los clientes relativa a los productos y servicios, incluyendo las quejas de los clientes;\nd) manipular o controlar la propiedad del cliente;\ne) establecer los requisitos específicos para las acciones de contingencia, cuando sea pertinente.', 36, 3, ''),
('070109.150901.000000.000822', '8.2.2', 'Determinación de los requisitos para los productos y servicios', 'Cuando se determinan los requisitos para los productos y servicios que se van a ofrecer a los clientes, la organización debe asegurarse de que:\n\na) los requisitos para los productos y servicios se definen, incluyendo:\n\n1) cualquier requisito legal y reglamentario aplicable;\n2) aquellos considerados necesarios por la organización;\n\nb) la organización puede cumplir con las declaraciones acerca de los productos y servicios que ofrece.', 37, 3, ''),
('070109.150901.000000.000823', '8.2.3', 'Revisión de los requisitos para los productos y servicios', '8.2.3.1 La organización debe asegurarse de que tiene la capacidad de cumplir los requisitos para los productos y servicios que se van a ofrecer a los clientes. La organización debe llevar a cabo una revisión antes de comprometerse a suministrar productos y servicios a un cliente, para incluir:\n\na) los requisitos especificados por el cliente, incluyendo los requisitos para las actividades de entrega y las posteriores a la misma;\nb) los requisitos no establecidos por el cliente, pero necesarios para el uso especificado o previsto, cuando sea conocido;\nc) los requisitos especificados por la organización;\nd) los requisitos legales y reglamentarios aplicables a los productos y servicios;\ne) las diferencias existentes entre los requisitos del contrato o pedido y los expresados previamente.\n\nLa organización debe asegurarse de que se resuelven las diferencias existentes entre los requisitos del contrato o pedido y los expresados previamente.\n\nLa organización debe confirmar los requisitos del cliente antes de la aceptación, cuando el cliente no proporcione una declaración documentada de sus requisitos.\n\nNOTA En algunas ocasiones, como las ventas por internet, es irrealizable llevar a cabo una revisión formal para cada pedido. En su lugar la revisión puede cubrir la información del producto pertinente, como catálogos.\n\n8.2.3.2 La organización debe conservar la información documentada, cuando sea aplicable:\n\na) sobre los resultados de la revisión;\nb) sobre cualquier requisito nuevo para los productos y servicios.', 38, 3, ''),
('070109.150901.000000.000824', '8.2.4', 'Cambios en los requisitos para los productos y servicios', 'La organización debe asegurarse de que, cuando se cambien los requisitos para los productos y servicios, la información documentada pertinente sea modificada, y de que las personas pertinentes sean conscientes de los requisitos modificados.', 39, 3, ''),
('070109.150901.000000.000830', '8.3', 'Diseño y desarrollo de los productos y servicios', '', 40, 2, ''),
('070109.150901.000000.000831', '8.3.1', 'Generalidades', 'La organización debe establecer, implementar y mantener un proceso de diseño y desarrollo que sea adecuado para asegurarse de la posterior provisión de productos y servicios.', 41, 3, ''),
('070109.150901.000000.000832', '8.3.2', 'Planificación del diseño y desarrollo', 'Al determinar las etapas y controles para el diseño y desarrollo, la organización debe considerar:\n\na) la naturaleza, duración y complejidad de las actividades de diseño y desarrollo;\nb) las etapas del proceso requeridas, incluyendo las revisiones del diseño y desarrollo aplicables;\nc) las actividades requeridas de verificación y validación del diseño y desarrollo;\nd) las responsabilidades y autoridades involucradas en el proceso de diseño y desarrollo;\ne) las necesidades de recursos internos y externos para el diseño y desarrollo de los productos y servicios;\nf) la necesidad de controlar las interfaces entre las personas que participan activamente en el proceso de diseño y desarrollo;\ng) la necesidad de la participación activa de los clientes y usuarios en el proceso de diseño y desarrollo;\nh) los requisitos para la posterior provisión de productos y servicios;\ni) el nivel de control del proceso de diseño y desarrollo esperado por los clientes y otras partes interesadas pertinentes;\nj) la información documentada necesaria para demostrar que se han cumplido los requisitos del diseño y desarrollo.', 42, 3, ''),
('070109.150901.000000.000833', '8.3.3', 'Entradas para el diseño y desarrollo', 'La organización debe determinar los requisitos esenciales para los tipos específicos de productos y servicios a diseñar y desarrollar. La organización debe considerar:\n\na) los requisitos funcionales y de desempeño;\nb) la información proveniente de actividades previas de diseño y desarrollo similares;\nc) los requisitos legales y reglamentarios;\nd) normas o códigos de prácticas que la organización se ha comprometido a implementar;\ne) las consecuencias potenciales de fallar debido a la naturaleza de los productos y servicios.\n\nLas entradas deben ser adecuadas para los fines del diseño y desarrollo, estar completas y sin ambigüedades.\n\nLas entradas del diseño y desarrollo contradictorias deben resolverse.\n\nLa organización debe conservar la información documentada sobre las entradas del diseño y desarrollo.', 43, 3, ''),
('070109.150901.000000.000834', '8.3.4', 'Controles del diseño y desarrollo', 'La organización debe aplicar controles al proceso de diseño y desarrollo para asegurarse de que:\n\na) se definen los resultados a lograr;\nb) se realizan las revisiones para evaluar la capacidad de los resultados del diseño y desarrollo para cumplir los requisitos;\nc) se realizan actividades de verificación para asegurarse de que las salidas del diseño y desarrollo cumplen los requisitos de las entradas;\nd) se realizan actividades de validación para asegurarse de que los productos y servicios resultantes satisfacen los requisitos para su aplicación especificada o uso previsto;\ne) se toma cualquier acción necesaria sobre los problemas determinados durante las revisiones, o las actividades de verificación y validación;\nf) se conserva la información documentada de estas actividades.\n\nNOTA Las revisiones, la verificación y la validación del diseño y desarrollo tienen propósitos distintos. Pueden realizarse de forma separada o en cualquier combinación, según sea idóneo para los productos y servicios de la organización.', 44, 3, ''),
('070109.150901.000000.000835', '8.3.5', 'Salidas del diseño y desarrollo', 'La organización debe asegurarse de que las salidas del diseño y desarrollo:\n\na) cumplen los requisitos de las entradas;\nb) son adecuadas para los procesos posteriores para la provisión de productos y servicios;\nc) incluyen o hacen referencia a los requisitos de seguimiento y medición, cuando sea apropiado, y a los criterios de aceptación;\nd) especifican las características de los productos y servicios que son esenciales para su propósito previsto y su provisión segura y correcta.\n\nLa organización debe conservar información documentada sobre las salidas del diseño y desarrollo.', 45, 3, ''),
('070109.150901.000000.000836', '8.3.6', 'Cambios del diseño y desarrollo', 'La organización debe identificar, revisar y controlar los cambios hechos durante el diseño y desarrollo de los productos y servicios, o posteriormente en la medida necesaria para asegurarse de que no haya un impacto adverso en la conformidad con los requisitos.\n\nLa organización debe conservar la información documentada sobre:\n\na) los cambios del diseño y desarrollo;\nb) los resultados de las revisiones;\nc) la autorización de los cambios;\nd) las acciones tomadas para prevenir los impactos adversos.', 46, 3, ''),
('070109.150901.000000.000840', '8.4', 'Control de los procesos, productos y servicios suministrados externamente', '', 47, 2, ''),
('070109.150901.000000.000841', '8.4.1', 'Generalidades', 'La organización debe asegurarse de que los procesos, productos y servicios suministrados externamente son conformes a los requisitos.\n\nLa organización debe determinar los controles a aplicar a los procesos, productos y servicios suministrados externamente cuando:\n\na) los productos y servicios de proveedores externos están destinados a incorporarse dentro de los propios productos y servicios de la organización;\nb) los productos y servicios son proporcionados directamente a los clientes por proveedores externos en nombre de la organización;\nc) un proceso, o una parte de un proceso, es proporcionado por un proveedor externo como resultado de una decisión de la organización.\n\nLa organización debe determinar y aplicar criterios para la evaluación, la selección, el seguimiento del desempeño y la reevaluación de los proveedores externos, basándose en su capacidad para proporcionar procesos o productos y servicios de acuerdo con los requisitos. La organización debe conservar la información documentada de estas actividades y de cualquier acción necesaria que surja de las evaluaciones.', 48, 3, ''),
('070109.150901.000000.000842', '8.4.2', 'Tipo y alcance del control', 'La organización debe asegurarse de que los procesos, productos y servicios suministrados externamente no afectan de manera adversa a la capacidad de la organización de entregar productos y servicios conformes de manera coherente a sus clientes.\n\nLa organización debe:\n\na) asegurarse de que los procesos suministrados externamente permanecen dentro del control de su sistema de gestión de la calidad;\nb) definir los controles que pretende aplicar a un proveedor externo y los que pretende aplicar a las salidas resultantes;\nc) tener en consideración:\n\n1) el impacto potencial de los procesos, productos y servicios suministrados externamente en la capacidad de la organización de cumplir regularmente los requisitos del cliente y los legales y reglamentarios aplicables;\n2) la eficacia de los controles aplicados por el proveedor externo;\n\nd) determinar la verificación, u otras actividades necesarias para asegurarse de que los procesos, productos y servicios suministrados externamente cumplen los requisitos.', 49, 3, ''),
('070109.150901.000000.000843', '8.4.3', 'Información para los proveedores externos', 'La organización debe asegurarse de la adecuación de los requisitos antes de su comunicación al proveedor externo.\nLa organización debe comunicar a los proveedores externos sus requisitos para:\n\na) los procesos, productos y servicios a proporcionar;\nb) la aprobación de:\n\n1) productos y servicios;\n2) métodos, procesos y equipos;\n3) la liberación de productos y servicios;\n\nc) la competencia, incluyendo cualquier calificación requerida de las personas;\nd) las interacciones del proveedor externo con la organización;\ne) el control y el seguimiento del desempeño del proveedor externo a aplicar por parte de la organización;\nf) las actividades de verificación o validación que la organización, o su cliente, pretende llevar a cabo en las instalaciones del proveedor externo.', 50, 3, ''),
('070109.150901.000000.000850', '8.5', 'Producción y provisión del servicio', '', 51, 2, ''),
('070109.150901.000000.000851', '8.5.1', 'Control de la producción y de la provisión del servicio', 'La organización debe implementar la producción y provisión del servicio bajo condiciones controladas.\n\nLas condiciones controladas deben incluir, cuando sea aplicable:\n\na) la disponibilidad de información documentada que defina:\n\n1) las características de los productos a producir, los servicios a prestar, o las actividades a desempeñar;\n2) los resultados a alcanzar;\n\nb) la disponibilidad y el uso de los recursos de seguimiento y medición adecuados;\nc) la implementación de actividades de seguimiento y medición en las etapas apropiadas para verificar que se cumplen los criterios para el control de los procesos o sus salidas, y los criterios de aceptación para los productos y servicios;\nd) el uso de la infraestructura y el entorno adecuados para la operación de los procesos;\ne) la designación de personas competentes, incluyendo cualquier calificación requerida;\nf) la validación y revalidación periódica de la capacidad para alcanzar los resultados planificados de los procesos de producción y de prestación del servicio, cuando las salidas resultantes no puedan verificarse mediante actividades de seguimiento o medición posteriores;\ng) la implementación de acciones para prevenir los errores humanos;\nh) la implementación de actividades de liberación, entrega y posteriores a la entrega.', 52, 3, ''),
('070109.150901.000000.000852', '8.5.2', 'Identificación y trazabilidad', 'La organización debe utilizar los medios apropiados para identificar las salidas, cuando sea necesario, para asegurar la conformidad de los productos y servicios.\n\nLa organización debe identificar el estado de las salidas con respecto a los requisitos de seguimiento y medición a través de la producción y prestación del servicio.\n\nLa organización debe controlar la identificación única de las salidas cuando la trazabilidad sea un requisito, y debe conservar la información documentada necesaria para permitir la trazabilidad.', 53, 3, ''),
('070109.150901.000000.000853', '8.5.3', 'Propiedad perteneciente a los clientes o proveedores externos', 'La organización debe cuidar la propiedad perteneciente a los clientes o a proveedores externos mientras esté bajo el control de la organización o esté siendo utilizado por la misma.\n\nLa organización debe identificar, verificar, proteger y salvaguardar la propiedad de los clientes o de los proveedores externos suministrada para su utilización o incorporación dentro de los productos y servicios.\n\nCuando la propiedad de un cliente o de un proveedor externo se pierda, deteriore o de algún otro modo se considere inadecuada para su uso, la organización debe informar de esto al cliente o proveedor externo y conservar la información documentada sobre lo ocurrido.\n\nNOTA La propiedad de un cliente o de un proveedor externo puede incluir materiales, componentes, herramientas y equipos, instalaciones, propiedad intelectual y datos personales.', 54, 3, ''),
('070109.150901.000000.000854', '8.5.4', 'Preservación', 'La organización debe preservar las salidas durante la producción y prestación del servicio, en la medida necesaria para asegurarse de la conformidad con los requisitos.\n\nNOTA La preservación puede incluir la identificación, la manipulación, el control de la contaminación, el embalaje, el almacenamiento, la transmisión de la información o el transporte, y la protección.', 55, 3, ''),
('070109.150901.000000.000855', '8.5.5', 'Actividades posteriores a la entrega', 'La organización debe cumplir los requisitos para las actividades posteriores a la entrega asociadas con los productos y servicios.\n\nAl determinar el alcance de las actividades posteriores a la entrega que se requieren, la organización debe considerar:\n\na) los requisitos legales y reglamentarios;\nb) las consecuencias potenciales no deseadas asociadas a sus productos y servicios;\nc) la naturaleza, el uso y la vida útil prevista de sus productos y servicios;\nd) los requisitos del cliente;\ne) la retroalimentación del cliente.\n\nNOTA Las actividades posteriores a la entrega pueden incluir acciones cubiertas por las condiciones de la garantía, obligaciones contractuales como servicios de mantenimiento, y servicios suplementarios como el reciclaje o la disposición final.', 56, 3, ''),
('070109.150901.000000.000856', '8.5.6', 'Control de los cambios', 'La organización debe revisar y controlar los cambios para la producción o la prestación del servicio, en la extensión necesaria para asegurarse de la continuidad en la conformidad con los requisitos.\n\nLa organización debe conservar información documentada que describa los resultados de la revisión de los cambios, las personas que autorizan el cambio y de cualquier acción necesaria que surja de la revisión.', 57, 3, ''),
('070109.150901.000000.000860', '8.6', 'Liberación de los productos y servicios', 'La organización debe implementar las disposiciones planificadas, en las etapas adecuadas, para verificar que se cumplen los requisitos de los productos y servicios.\n\nLa liberación de los productos y servicios al cliente no debe llevarse a cabo hasta que se hayan completado satisfactoriamente las disposiciones planificadas, a menos que sea aprobado de otra manera por una autoridad pertinente y, cuando sea aplicable, por el cliente.\n\nLa organización debe conservar la información documentada sobre la liberación de los productos y servicios. La información documentada debe incluir:\n\na) evidencia de la conformidad con los criterios de aceptación;\nb) trazabilidad a las personas que autorizan la liberación.', 58, 2, ''),
('070109.150901.000000.000870', '8.7', 'Control de las salidas no conformes', '8.7.1 La organización debe asegurarse de que las salidas que no sean conformes con sus requisitos se identifican y se controlan para prevenir su uso o entrega no intencionada.\n\nLa organización debe tomar las acciones adecuadas basándose en la naturaleza de la no conformidad y en su efecto sobre la conformidad de los productos y servicios. Esto se debe aplicar también a los productos y servicios no conformes detectados después de la entrega de los productos, durante o después de la provisión de los servicios.\n\nLa organización debe tratar las salidas no conformes de una o más de las siguientes maneras:\n\na) corrección;\nb) separación, contención, devolución o suspensión de provisión de productos y servicios;\nc) información al cliente;\nd) obtención de autorización para su aceptación bajo concesión.\n\nDebe verificarse la conformidad con los requisitos cuando se corrigen las salidas no conformes.\n\n8.7.2 La organización debe conservar la información documentada que:\n\na) describa la no conformidad;\nb) describa las acciones tomadas;\nc) describa todas las concesiones obtenidas;\nd) identifique la autoridad que decide la acción con respecto a la no conformidad.', 59, 2, ''),
('070109.150901.000000.000900', '9', 'Evaluación del desempeño', '', 60, 1, ''),
('070109.150901.000000.000910', '9.1', 'Seguimiento, medición, análisis y evaluación', '', 61, 2, ''),
('070109.150901.000000.000911', '9.1.1', 'Generalidades', 'La organización debe determinar:\n\na) qué necesita seguimiento y medición;\nb) los métodos de seguimiento, medición, análisis y evaluación necesarios para asegurar resultados válidos;\nc) cuándo se deben llevar a cabo el seguimiento y la medición;\nd) cuándo se deben analizar y evaluar los resultados del seguimiento y la medición.\n\nLa organización debe evaluar el desempeño y la eficacia del sistema de gestión de la calidad.\n\nLa organización debe conservar la información documentada apropiada como evidencia de los resultados.', 62, 3, ''),
('070109.150901.000000.000912', '9.1.2', 'Satisfacción del cliente', 'La organización debe realizar el seguimiento de las percepciones de los clientes del grado en que se cumplen sus necesidades y expectativas. La organización debe determinar los métodos para obtener, realizar el seguimiento y revisar esta información.\n\nNOTA Los ejemplos de seguimiento de las percepciones del cliente pueden incluir las encuestas al cliente, la retroalimentación del cliente sobre los productos y servicios entregados, las reuniones con los clientes, el análisis de las cuotas de mercado, las felicitaciones, las garantías utilizadas y los informes de agentes comerciales.', 63, 3, ''),
('070109.150901.000000.000913', '9.1.3', 'Análisis y evaluación', 'La organización debe analizar y evaluar los datos y la información apropiados que surgen por el seguimiento y la medición.\n\nLos resultados del análisis deben utilizarse para evaluar:\n\na) la conformidad de los productos y servicios;\nb) el grado de satisfacción del cliente;\nc) el desempeño y la eficacia del sistema de gestión de la calidad;\nd) si lo planificado se ha implementado de forma eficaz;\ne) la eficacia de las acciones tomadas para abordar los riesgos y oportunidades;\nf) el desempeño de los proveedores externos;\ng) la necesidad de mejoras en el sistema de gestión de la calidad.\n\nNOTA Los métodos para analizar los datos pueden incluir técnicas estadísticas.', 64, 3, ''),
('070109.150901.000000.000920', '9.2', 'Auditoría interna', '9.2.1 La organización debe llevar a cabo auditorías internas a intervalos planificados para proporcionar información acerca de si el sistema de gestión de la calidad:\n\na) es conforme con:\n\n1) los requisitos propios de la organización para su sistema de gestión de la calidad;\n2) los requisitos de esta Norma Internacional;\n\nb) se implementa y mantiene eficazmente.\n\n9.2.2 La organización debe:\n\na) planificar, establecer, implementar y mantener uno o varios programas de auditoría que incluyan la frecuencia, los métodos, las responsabilidades, los requisitos de planificación y la elaboración de informes, que deben tener en consideración la importancia de los procesos involucrados, los cambios que afecten a la organización y los resultados de las auditorías previas;\nb) definir los criterios de la auditoría y el alcance para cada auditoría;\nc) seleccionar los auditores y llevar a cabo auditorías para asegurarse de la objetividad y la imparcialidad del proceso de auditoría;\nd) asegurarse de que los resultados de las auditorías se informen a la dirección pertinente;\ne) realizar las correcciones y tomar las acciones correctivas adecuadas sin demora injustificada;\nf) conservar información documentada como evidencia de la implementación del programa de auditoría y de los resultados de las auditorías.\n\nNOTA Véase la Norma ISO 19011 a modo de orientación.', 65, 2, ''),
('070109.150901.000000.000930', '9.3', 'Revisión por la dirección', '', 66, 2, ''),
('070109.150901.000000.000931', '9.3.1', 'Generalidades', 'La alta dirección debe revisar el sistema de gestión de la calidad de la organización a intervalos planificados, para asegurarse de su conveniencia, adecuación, eficacia y alineación continuas con la dirección estratégica de la organización.', 67, 3, ''),
('070109.150901.000000.000932', '9.3.2', 'Entradas de la revisión por la dirección', 'La revisión por la dirección debe planificarse y llevarse a cabo incluyendo consideraciones sobre:\n\na) el estado de las acciones de las revisiones por la dirección previas;\nb) los cambios en las cuestiones externas e internas que sean pertinentes al sistema de gestión de la calidad;\nc) la información sobre el desempeño y la eficacia del sistema de gestión de la calidad, incluidas las tendencias relativas a:\n\n1) la satisfacción del cliente y la retroalimentación de las partes interesadas pertinentes;\n2) el grado en que se han logrado los objetivos de la calidad;\n3) el desempeño de los procesos y conformidad de los productos y servicios;\n4) las no conformidades y acciones correctivas;\n5) los resultados de seguimiento y medición;\n6) los resultados de las auditorías;\n7) el desempeño de los proveedores externos;\n\nd) la adecuación de los recursos;\ne) la eficacia de las acciones tomadas para abordar los riesgos y las oportunidades (véase 6.1);\nf) las oportunidades de mejora.', 68, 3, ''),
('070109.150901.000000.000933', '9.3.3', 'Salidas de la revisión por la dirección', 'Las salidas de la revisión por la dirección deben incluir las decisiones y acciones relacionadas con:\n\na) las oportunidades de mejora;\nb) cualquier necesidad de cambio en el sistema de gestión de la calidad;\nc) las necesidades de recursos.\n\nLa organización debe conservar información documentada como evidencia de los resultados de las revisiones por la dirección.', 69, 3, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `07_PECAL_2110_4`
--

CREATE TABLE `07_PECAL_2110_4` (
  `id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `denominador` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contenido` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `orden` int NOT NULL,
  `indice` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `07_PECAL_2110_4`
--

INSERT INTO `07_PECAL_2110_4` (`id`, `denominador`, `contenido`, `orden`, `indice`) VALUES
('4', 'Requisitos generales del SGC', '', 1, 1),
('4.1', 'Aplicabilidad de los reuqisitos de la norma UNE-EN ISO 9001:2015', 'El suministrador debe establecer, documentar, implementar, evaluar y mejorar un Sistema de Gestión de Calidad económico y eficaz, de acuerdo con lo establecido en esta publicación, que incluya los requisitos de la norma UNE-EN ISO 9001:2015 que sean necesarios para satisfacer los requisitos del contrato.', 2, 2),
('4.2', 'El Sistema de Gestión de Calidad y sus procesos', 'El comprador y/o el representante para el Aseguramiento Oficial de la Calidad (RAC) se reservan el derecho de rechazar el Sistema de Gestión de Calidad del suministrador cuando aplique al contrato. Debe ponerse a disposición del RAC y/o comprador la información documentada sobre el alcance del sistema del suministrador, los registros de las auditorías y evaluaciones internas, y cualquier otra evidencia objetiva que muestre que el sistema es conforme con esta publicación y que es eficaz.\r\n \r\nEn los casos en los que el comprador y/o RAC rechacen el Sistema de Gestión de Calidad, el suministrador debe presentar propuestas de acciones correctivas y de sus respectivas revisiones en el plazo acordado. Se aplicarán las penalizaciones que se hayan establecido en el contrato.', 3, 2),
('4.3', 'Acceso a las instalaciones del suministrador y de los proveedores externos, y apoyo a las actividades del AOC', 'El suministrador y/o los proveedores externos deben proporcionar al RAC y/o comprador:\r\n\r\n1. El derecho de acceso a las instalaciones en las que se estén realizando las actividades contratadas.\r\n2. La información relativa al cumplimiento de los requisitos del contrato.\r\n3. La posibilidad de evaluar sin restricciones el cumplimiento de los requisitos de esta publicación por parte del suministrador.\r\n4. La posibilidad de evaluar sin restricciones el cumplimiento de los requisitos de esta publicación por parte de los proveedores externos. El suministrador será informado antes de realizar dicha evaluación.\r\n5. La posibilidad de verificar la conformidad del producto con los requisitos del contracto, sin ninguna restricción.\r\n6. La ayuda que se precise para la evaluación, verificación, validación, pruebas, inspección o liberación del producto, a fin de realizar el AOC según los requisitos del contrato.\r\n7. Los locales y medios necesarios para llevar a cabo el AOC.\r\n8. Los equipos disponibles que sean necesarios para llevar a cabo el AOC, mediante un uso razonable de los mismos.\r\n9. El personal del suministrador o de los proveedores externos que se precise para operar tales equipos, cuando se requiera.\r\n10. Acceso a la información y sistemas de comunicación.\r\n11. La documentación del suministrador necesaria para evidenciar la conformidad del producto con las especificaciones.\r\n12. Copias de los documentos necesarios, incluyendo aquellos almacenados en medios electrónicos. ', 4, 2),
('5', 'Requisitos específicos OTAN para el SGC', '', 5, 1),
('5.1', 'Liderazgo', '', 6, 2),
('5.1.1', 'Funciones, responsabilidades y autoridades en la organización [5.3]', '1.	La alta dirección debe nombrar un representante para asuntos relacionados con el AOC, que pertenezca a la dirección de la organización. Sin tomar en consideración otras responsabilidades, dicho representante debe tener la autoridad e independencia necesarias en su organización para resolver los asuntos relativos a la calidad, y debe informar directamente a la alta dirección. 2.	El representante de la dirección tendrá la responsabilidad y autoridad que le permitan asegurar que se establecen, implantan y mantienen los procesos necesarios para el Sistema de Gestión de Calidad. Asimismo, dicho representante coordinará con el RAC y/o comprador los asuntos relacionados con la calidad. 3.	El representante de la dirección debe tener una competencia adecuada en cuanto a Gestión de Calidad.', 7, 3),
('5.2', 'Planificación', '', 8, 2),
('5.2.1', 'Gestión de Riesgos [6.1]', '1.	El suministrador y los proveedores externos deben proporcionar evidencia objetiva de que se consideran los riesgos durante la planificación, incluyendo los de los proveedores externos, lo cual comprende al menos la identificación, análisis, control y mitigación de los riesgos. La planificación debe comenzar con la identificación de riesgos durante la revisión del contrato y se actualizará oportunamente a partir de entonces. 2.	A no ser que se establezca de otra forma en el contrato, la Gestión de Riesgos aplicada debe cumplir los principios generales y las directrices de la norma UNE-EN ISO 31000:2010. El Plan de Gestión de Riesgos debe estar a disposición del RAC y/o comprador. 3.	El comprador y/o el RAC se reservan el derecho de rechazar los Planes de Gestión de Riesgos y sus revisiones.', 9, 3),
('5.3', 'Apoyo', '', 10, 2),
('5.3.1', 'Infraestructura [7.1.3]', 'La infraestructura debe incluir un área para segregar productos no conformes (véase el párrafo 5.4.12 de esta publicación).', 11, 3),
('5.3.2', 'Recursos de seguimiento y medición [7.1.5]', '1.	El sistema de medición y calibración aplicado al contrato debe cumplir los requisitos de la norma UNE-EN ISO 10012:2003. 2.	Cuando un elemento de un equipo de medida falle durante la calibración, el suministrador debe avisar al RAC y/o comprador sobre el impacto del fallo en los resultados de las mediciones previas, siempre que afecte a los productos entregados o a los resultados de las verificaciones, validaciones y pruebas de aceptación. El RAC y/o comprador pueden requerir que se repitan las mediciones con equipos calibrados.', 12, 3),
('5.3.3', 'Competencia [7.2]', 'El suministrador debe establecer y mantener un proceso para identificar las necesidades de formación y para conseguir la competencia de todo el personal que realice actividades que afecten a la calidad del producto.', 13, 3),
('5.3.4', 'Toma de conciencia [7.3]', 'Las personas involucradas en el contrato, incluidos los proveedores externos, deben ser conscientes de las disposiciones específicas contenidas en el Plan de Calidad que sean aplicables a sus actividades o área de responsabilidad.', 14, 3),
('5.3.5', 'Información documentada [7.5]', 'El suministrador debe proporcionar al RAC y/o al comprador acceso a la información documentada relevante del contrato que necesiten, en un formato mutuamente acordado entre ellos.', 15, 3),
('5.4', 'Operación', '', 16, 2),
('5.4.1', 'Planificación y control operacional [8.1]', '1.	El suministrador debe identificar la información documentada, incluyendo los criterios de aceptación y la información de configuración que será usada como evidencia objetiva de la conformidad del producto con los requisitos. Esta información debe ser aceptable para el comprador y/o RAC, y estar disponible antes de la aceptación del producto. 2.	El suministrador debe mantener y conservar la información documentada para las aprobaciones del producto y del proceso de producción, lo cual también debe aplicarse a las aprobaciones correspondientes de los proveedores externos.', 17, 3),
('5.4.1.1', 'Plan de Calidad', '1.	El suministrador debe presentar al RAC y/o comprador un Plan de Calidad (PC) aceptable basado en los requisitos contractuales, en un plazo mutuamente acordado pero siempre antes del comienzo de las actividades (lo cual puede definirse como una reunión de lanzamiento del proyecto o contrato, o como se haya determinado en el contrato o pedido). El PC puede ser un documento independiente y claramente identificado, o parte de cualquier otro documento que se haya preparado para el contrato. 2.	El PC debe: a.	Describir y documentar los requisitos del Sistema de Gestión de Calidad que sean «específicos para el contrato» y se necesiten para satisfacer los requisitos contractuales (haciendo referencia, cuando sea aplicable, al Sistema de Gestión de Calidad «global de la empresa»); b.	Describir y documentar la planificación de la realización del producto en términos de requisitos de calidad para el producto, recursos necesarios, actividades de control requeridas (verificación, validación, seguimiento, inspección, pruebas), y criterios de aceptación. También deben incluirse los acuerdos específicos y los requisitos de comunicación cuando el trabajo deba realizarse en localizaciones externas a las instalaciones de los suministradores. c.	Documentar y mantener la trazabilidad de los requisitos desde el proceso de planificación, incluyendo una matriz de cumplimiento de requisitos y soluciones que justifique el cumplimiento de todos los requisitos contractuales (a los que se hará referencia cuando sea aplicable). 3.	El comprador y/o RAC se reservan el derecho de rechazar los PC y sus revisiones. Nota: Los requisitos contractuales relativos al contenido del Plan de Calidad se han incluido en la PECAL-2105 «Requisitos OTAN para planes de calidad entregables». La matriz de cumplimiento de requisitos y soluciones puede ser parte del Plan de Calidad o un documento anexo al mismo. Esta matriz puede ser preparada y añadida al Plan de Calidad después de que se haya elaborado la versión inicial de dicho plan, en un plazo mutuamente acordado con el RAC y/o comprador, teniendo en cuenta el contenido del contrato o pedido.', 18, 4),
('5.4.1.2', 'Gestión de la configuración', '', 19, 4),
('5.4.1.2.1', 'Requisitos de la Gestión de la Configuración (GC)', 'El suministrador debe gestionar la configuración mediante la implementación de la Planificación de la Gestión de la Configuración, Identificación de la Configuración, Control de Cambios, Justificación del Estado de la Configuración y Auditorías de la Configuración, de acuerdo con los requisitos de la PECON (ACMP)-2100 u otra publicación nacional equivalente, y de cualquier otra cláusula adicional de GC recogida en el contrato. ', 20, 5),
('5.4.1.2.2', 'Plan de Gestión de la Configuración (PGC)', 'El suministrador debe preparar un Plan de Gestión de la Configuración (PGC) que describa la aplicación de la GC al contrato de acuerdo con lo establecido en la PECON-2100 u otra publicación nacional equivalente, y de cualquier otra cláusula adicional de GC recogida en el contrato. El PGC puede formar parte de otro plan, si procede. Nota: Las Publicaciones Españolas de Gestión de la Configuración PECON-2000 y PECON-2009 y las equivalentes (Allied Configuration Management Publications, ACMP) contienen información adicional sobre la política y requisitos de Gestión de la Configuración de la OTAN.', 21, 5),
('5.4.10', 'Preservación [8.5.4]', '1.	Las fechas de vencimiento de los productos con vida útil limitada deben estar bajo control. 2.	Si procede, el control de la fecha de vencimiento o de la vida útil debe ser aplicado durante el mantenimiento, servicio, almacenamiento o cuando el producto esté instalado.  3.	Antes de la entrega del producto, debe identificarse y comunicarse al RAC y/o comprador su vida útil remanente. ', 36, 3),
('5.4.11', 'Liberación de los productos [8.6]', '1.	El suministrador debe asegurarse de que solo se liberen productos aceptables, destinados a la entrega. El RAC y/o comprador se reservan el derecho de rechazar los productos no conformes. 2.	Salvo instrucción en contra, al liberar el producto el suministrador debe proporcionar un Certificado de Conformidad al RAC y/o comprador. 3.	El suministrador es el único responsable de que los productos que proporciona al comprador cumplen los requisitos. 4.	Cuando se requiera la realización de cualquier actividad de inspección final o aceptación formal por parte del RAC y/o comprador, el suministrador debe notificarles el evento con un plazo mínimo de 10 días laborables, a no ser que se haya establecido de otra forma en el contrato. ', 37, 3),
('5.4.12', 'Control de los productos no conformes [8.7]', '1.	El suministrador debe editar e implementar procedimientos documentados para identificar, controlar y segregar todos los productos no conformes. Los productos cuyo estado no se haya identificado o se desconozca deben clasificarse como productos no conformes. 2.	Los procedimientos documentados para la identificación, control y segregación de los productos no conformes pueden ser rechazados por el RAC y/o comprador cuando pueda demostrarse que no proporcionan el control necesario. 3.	El suministrador debe notificar al RAC y/o comprador las no conformidades y las acciones correctivas necesarias, a menos que se haya acordado otra cosa con ellos. El RAC y/o comprador se reservan el derecho de rechazar las decisiones de reprocesado, reparación y de «emplear como está».  4.	Cuando el suministrador proponga emitir una concesión para el uso, liberación o aceptación de un producto no conforme, deben obtenerse las correspondientes autorizaciones del RAC y/o comprador, a no ser que se haya acordado de otra forma.  5.	Los requisitos del comprador sobre las concesiones son también aplicables a los procesos subcontratados o a los productos comprados. El suministrador debe revisar cualquier solicitud de los proveedores externos antes de remitirla al RAC y/o comprador. 6.	El suministrador debe conservar información documentada sobre las cantidades autorizadas y las fechas de vencimiento de los permisos de concesión y desviación. El suministrador debe asegurar el cumplimiento de los requisitos del contrato cuando venza la autorización. 7.	El suministrador debe informar al RAC y/o comprador sobre los productos no conformes recibidos de un proveedor externo que haya sido objeto de Aseguramiento Oficial de la Calidad.', 38, 3),
('5.4.2', 'Comunicación con el cliente [8.2.1]', '1.	Si el comprador y/o RAC lo requieren, el suministrador y/o los proveedores externos deben asistir a una reunión sobre el AOC tras la adjudicación del contrato. Dicha reunión se centrará en las disposiciones del contrato sobre Aseguramiento de la Calidad del producto y en los aspectos prácticos del AOC. 2.	El suministrador debe asegurar que se establecen líneas de comunicación con el RAC y/o comprador. El representante designado por la dirección debe asegurar que se proporciona un nivel adecuado de información que satisfaga al RAC y/o comprador. 3.	El suministrador debe notificar al RAC y/o comprador los cambios en su organización que afecten a la calidad del producto o al Sistema de Gestión de Calidad.', 25, 2),
('5.4.3', 'Determinación de los requisitos para los productos [8.2.2]', 'El suministrador debe identificar los requisitos y funciones del producto que están relacionados con características críticas, tales como la salud, seguridad, prestaciones y garantía de funcionamiento.', 26, 3),
('5.4.4', 'Controles del dieño y desarrollo [8.3.4]', 'A no ser que se establezca de otro modo en el contrato, el suministrador debe determinar los métodos de verificación y validación requeridos, y demostrar la conformidad con los requisitos correspondientes en las etapas apropiadas hasta (e incluyendo) la consecución del producto final.', 27, 3),
('5.4.5', 'Garantía de funcionamiento', 'Si se establece en el contrato, el suministrador debe asegurar que se controlan los asuntos relacionados con la garantía de funcionamiento y sus documentos asociados, incluyendo los de los proveedores externos.  Nota: Las Publicaciones Aliadas de Gestión de la Garantía de Funcionamiento (Allied Dependability Management Publications, ADMP) contienen información adicional sobre la gestión de la Garantía de Funcionamiento en la OTAN.', 28, 3),
('5.4.6', 'Control de los procesos, productos y servicios suministrados externamente [8.4]', 'El suministrador debe conservar la información documentada relativa a la verificación y/o validación de los productos comprados. La información documentada debe estar a disposición del RAC y/o comprador.', 29, 3),
('5.4.6.1', 'Generalidades', '1.	Cuando el suministrador haya decidido adquirir externamente algún artículo crítico, elemento de configuración, soluciones técnicas inmaduras, o subcontratar el diseño o un volumen de trabajo considerable, debe establecer y mantener un seguimiento de la cadena de suministro y de las actividades de Aseguramiento de la Calidad de los proveedores externos. 2.	El suministrador debe transmitir los requisitos contractuales aplicables a los proveedores externos mediante referencias a aquellos, incluyendo las PECAL (AQAP) pertinentes. El suministrador debe insertar en todos los documentos de compra lo siguiente: «Todos los requisitos de este contrato pueden estar sometidos a AOC. Se le notificará cualquier actividad de AOC que se vaya a realizar». 3.	El suministrador debe realizar una revisión formal de los documentos de compra para verificar que se han transmitido a los proveedores los requisitos contractuales correctos. El suministrador debe conservar información documentada de esta revisión. 4.	El suministrador debe documentar, durante la etapa de planificación, sus disposiciones para estos requisitos (véase el párrafo 5.4.1 de esta publicación) y proponer actividades de Aseguramiento de la Calidad para los subcontratos o pedidos concretos que cumplan los criterios anteriores.', 30, 4),
('5.4.6.2', 'Tipo y alcance del control [8.4.2]', '1.	Es responsabilidad del suministrador asegurarse de que los procesos y procedimientos requeridos para cumplir los requisitos del contrato están totalmente implementados en las instalaciones de los proveedores externos.  2.	El suministrador debe establecer e implantar un proceso para evitar, detectar, reducir y retirar el material falsificado.  3.	Solo podrá proporcionar instrucciones contractuales a un proveedor externo el suministrador que haya formalizado documentos de compra con dicho proveedor. 4.	Las actividades de AOC en las instalaciones del proveedor externo no eximen al suministrador de sus responsabilidades contractuales en materia de calidad. Requisito	específico	de	Defensa Añadir: La realización de las actividades de AOC y los derechos de acceso del RAC y/o comprador en las instalaciones del proveedor externo solo pueden ser solicitados por el RAC y/o comprador (*). (*) El anterior requisito viene recogido en la AQAP 2110 Edition D, Version 1, como una Nota.', 31, 4),
('5.4.6.3', 'Comunicación', '1.	El suministrador, a petición del RAC y/o comprador, debe proporcionarles una copia de los subcontratos y pedidos, así como de los documentos contractuales y sus modificaciones que estén relacionados con los productos del contrato. 2.	El suministrador debe notificar al RAC y/o comprador si se ha identificado algún subcontrato o pedido que incluya algún artículo crítico, un volumen de trabajo considerable, diseño, soluciones técnicas inmaduras, o aquellas situaciones en las que el desempeño del proveedor externo se desconoce o es motivo de preocupación.  3.	El suministrador debe notificar al RAC y/o comprador si se ha rechazado, reprocesado o reparado algún producto que haya adquirido externamente y que haya sido identificado como un riesgo potencial, o si el producto ha sido suministrado por un proveedor externo cuya selección o posterior actuación hayan sido identificadas como riesgos potenciales.', 32, 4),
('5.4.7', 'Control de la producción de la prestación del servicio [8.5.1]', '1.	El suministrador debe elaborar y mantener instrucciones para la realización de actividades relacionadas con el control de la producción a nivel de material, parte, componente, subsistema y sistema para el producto suministrado, con el fin de asegurar que se cumplen los requisitos especificados.  2.	El suministrador debe establecer y mantener los criterios para la elaboración del producto de la forma más clara posible (por ejemplo, mediante normas escritas, muestras representativas o ilustraciones).', 33, 3),
('5.4.8', 'Identificación y trazabilidad [8.5.2]', 'Es obligatorio mantener la trazabilidad cuando el fallo de un elemento o componente pueda suponer la pérdida de equipos, prestaciones o vidas. ', 34, 3),
('5.4.9', 'Propiedad perteneciente a los clietes o preveedores externos [8.5.3]', '1.	Si algún producto proporcionado por el comprador se extravía o daña, o si se comprueba que es inadecuado para el uso que se haya establecido en el contrato, el suministrador debe avisar inmediatamente al comprador y al RAC, y conservar la información documentada pertinente.  2.	Cuando el suministrador determine que un producto proporcionado por el comprador es inapropiado para su uso previsto, deberá informar inmediatamente al comprador y coordinar con él las acciones que deben ser tomadas para remediar la situación. El suministrador deberá también informar al RAC.', 35, 3),
('5.5', 'Evaluación del desempeño', '', 39, 2),
('5.5.1', 'Satisfacción del cliente [9.1.2]', '1.	Cualquier reclamación o deficiencia relativa al contrato que sea remitida por el RAC y/o comprador debe ser registrada como una reclamación del cliente. 2.	El suministrador debe proporcionar una respuesta al originador de la reclamación o deficiencia que incluya información sobre el análisis de la causa raíz y la acción correctiva. Nota: Las quejas de los clientes podrían tener la forma de no conformidades de calidad, deficiencias, informes de ocurrencia o cualquier otro formato, independientemente de lo cual serán identificadas por el RAC y/o comprador como «reclamaciones del cliente»', 40, 3),
('5.5.2', 'Auditoría interna [9.2]', '1.	Durante la planificación de las auditorías internas, el suministrador debe asegurar que su programa de auditorías anual abarca todos los procesos y actividades críticas relativos al contrato, e incluye tanto los requisitos contractuales como los suplementos OTAN. El suministrador debe considerar también los resultados de las acciones para evaluar los riesgos y oportunidades. 2.	A no ser que se acuerde lo contrario, el suministrador debe informar al RAC y/o comprador sobre las deficiencias y hallazgos encontrados en las auditorías internas. 3.	El suministrador debe conservar la información documentada que demuestre la formación y experiencia de sus auditores.', 41, 3),
('5.5.3', 'Revisión por la dirección [9.3]', '', 42, 3),
('5.5.3.1', 'Entradas de la revisión por la dirección [9.3.2]', 'La información documentada de las entradas de la revisión que esté relacionada con el contrato debe ponerse a disposición del RAC y/o comprador.', 43, 4),
('5.5.3.2', 'Salidas de la revisión por la dirección [9.3.3]', '1.	La información documentada de las salidas de la revisión que esté relacionada con el contrato debe ponerse a disposición del RAC y/o comprador. 2.	El suministrador debe notificar al RAC y/o comprador las acciones propuestas en las salidas de la revisión que afecten al cumplimiento de los requisitos contractuales. Siempre que se hayan identificado acciones, las salidas de la revisión deben especificar la persona o función responsable de cada una de ellas y la fecha límite para completarlas.', 44, 4),
('5.6', 'Mejora', '', 45, 2),
('5.6.1', 'No conformidad y acción correctiva', 'El suministrador debe definir los procesos, herramientas y técnicas que utiliza para efectuar el análisis de la causa raíz de las no conformidades.', 46, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `07_documentosexternos`
--
ALTER TABLE `07_documentosexternos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `07_ISO_9001_2015`
--
ALTER TABLE `07_ISO_9001_2015`
  ADD PRIMARY KEY (`codigo_interno`);

--
-- Indices de la tabla `07_PECAL_2110_4`
--
ALTER TABLE `07_PECAL_2110_4`
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
  `id` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codigo_interno` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipo` int NOT NULL,
  `estado` int NOT NULL,
  `juridica` int NOT NULL,
  `area` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `repositorio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `comentarios` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `07_documentacion`
--

INSERT INTO `07_documentacion` (`id`, `codigo_interno`, `tipo`, `estado`, `juridica`, `area`, `repositorio`, `comentarios`) VALUES
('070101.190328.113400.156984', 'EM-300-PR-001', 2, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070101.190328.113401.748512', 'EM-300-PR-002', 2, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070101.190328.113402.412342', 'EM-300-PR-003', 2, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070101.190328.113403.321869', 'EM-300-PR-004', 2, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070101.190328.113404.652538', 'EM-300-PR-005', 2, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070101.190328.113405.480329', 'EM-300-PR-006', 2, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070101.190328.113406.246828', 'EM-300-PR-007', 2, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070101.190328.113407.606798', 'EM-300-PR-008', 2, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070101.190328.113408.786485', 'EM-300-PR-009', 2, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070101.190328.113409.964290', 'EM-300-PR-010', 2, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070101.190328.113410.917334', 'EM-300-PR-011', 2, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070101.190328.113411.917334', 'EM-300-PR-012', 2, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070101.190328.113412.672401', 'EM-300-PR-013', 2, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070101.190328.113413.506450', 'EM-300-PR-014', 2, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070101.190328.113414.454355', 'EM-300-PR-015', 2, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070101.190328.113415.466111', 'EM-300-PR-016', 2, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070101.190328.113416.230396', 'EM-300-PR-017', 10, 0, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070101.190328.113417.391510', 'EM-300-PR-018', 10, 0, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070101.190328.113418.313713', 'EM-300-PR-019', 10, 0, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070101.190328.113419.021167', 'EM-300-PR-020', 10, 0, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070101.190328.163710.520412', 'OV01', 2, 0, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070102.190328.113420.931878', 'EM-300-MA-001', 1, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070102.190328.113421.049163', 'EM-300-MA-002', 1, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070102.190328.113422.974678', 'EM-300-MA-003', 1, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070103.190328.113424.029185', 'EM-300-IN-001', 3, 0, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070103.190328.113425.101704', 'EM-300-IN-002', 3, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070103.190328.113426.561175', 'EM-300-IN-003', 3, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070103.190701.102664.113426', 'EM-300-IN-004', 3, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070104.190328.113423.235246', 'EM-300-GU-001', 4, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070105.190328.113423.235246', 'AP01', 5, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070105.190328.122541.235246', 'CE01', 5, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070105.190328.122542.235246', 'CE02', 5, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070105.190328.122543.235246', 'CE03', 5, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070105.190328.122544.235246', 'CE04', 5, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070105.190328.122545.235246', 'CI01', 5, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070105.190328.122645.235246', 'ET01', 5, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070105.190328.122745.235246', 'HV01', 5, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070105.190328.122746.235246', 'IR02', 5, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070105.190328.122747.235246', 'ID01', 5, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070105.190328.122847.235246', 'PI01', 5, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070105.190328.122848.235246', 'RA01', 5, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070105.190328.122849.235246', 'RB01', 5, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070105.190328.122850.235246', 'RB02', 5, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070105.190328.122851.235246', 'RM01', 5, 0, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070105.190328.122852.235246', 'RO01', 5, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070105.190328.122952.235246', 'RS01', 5, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070105.190328.122953.235246', 'SO01', 5, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070106.190328.122953.235246', 'PLT-001', 6, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070106.190328.122954.235246', 'PLT-002', 6, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070106.190328.123015.235246', 'PLT-003', 6, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070106.190328.123016.235246', 'PLT-004', 6, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070106.190328.123017.235246', 'PLT-005', 6, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070106.190328.123018.235246', 'PLT-006', 6, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070106.190328.123118.235246', 'PLT-007', 6, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070106.190328.123218.235246', 'PLT-008', 6, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070106.190328.123318.235246', 'PLT-009', 6, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070106.190328.123418.235246', 'PLT-010', 6, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070106.190328.123518.235246', 'PLT-011', 6, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070106.190328.123618.235246', 'PLT-012', 6, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070106.190328.123618.235520', 'PLT-013', 6, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070106.190328.123718.235246', 'PLT-014', 6, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070106.190328.123818.235246', 'PLT-015', 6, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070106.190328.123918.235246', 'PLT-016', 6, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070106.190328.124018.235246', 'PLT-017', 6, 0, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070107.190328.122953.235246', 'APY-001', 7, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070107.190328.132121.235246', 'APY-002', 7, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070107.190328.132122.235246', 'APY-003', 7, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070107.190328.132123.235246', 'APY-004', 7, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070107.190328.132125.235246', 'APY-005', 7, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070107.190328.132126.235246', 'APY-006', 7, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070107.190328.132127.235246', 'APY-007', 7, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070107.190328.132128.235246', 'APY-008', 7, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070107.190328.132129.235246', 'APY-009', 7, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070107.190328.132130.235246', 'APY-010', 7, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070107.190328.132131.235246', 'APY-011', 7, 1, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070107.190328.132132.235246', 'APY-012', 7, 0, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', ''),
('070107.190328.132133.235246', 'APY-013', 7, 0, 3, 'Dirección Sector Defensa y Seguridad Nacional', 'Repositorio DyS', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `07_documentacion_ediciones`
--

CREATE TABLE `07_documentacion_ediciones` (
  `id` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_doc` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codigo_interno` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `denominador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `edicion` int NOT NULL,
  `fecha` date NOT NULL,
  `elaborado` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `revisado` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `aprobado` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cambios` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `paginas` int NOT NULL,
  `comentarios` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `07_documentacion_ediciones`
--

INSERT INTO `07_documentacion_ediciones` (`id`, `id_doc`, `codigo_interno`, `denominador`, `edicion`, `fecha`, `elaborado`, `revisado`, `aprobado`, `cambios`, `paginas`, `comentarios`) VALUES
('070201.190328.100810.137484', '070102.190328.113420.931878', 'EM-300-MA-001-01', 'Manual de Organización y Funciones de DyS', 1, '2019-03-28', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\n- Primera edición del documento', 22, ''),
('070201.190328.105841.414256', '070105.190328.122544.235246', 'CE04-01', 'Etiquetas de calibración', 1, '2019-03-28', 'N/A', 'N/A', 'N/A', 'N/A', 0, ''),
('070201.190328.105841.451745', '070105.190328.122543.235246', 'CE03-01', 'Registro de Equipos de Inspección y Medida', 1, '2019-03-28', 'N/A', 'N/A', 'N/A', 'N/A', 0, ''),
('070201.190328.105841.548756', '070105.190328.122542.235246', 'CE02-01', 'Control de Equipos de Inspección y Medida', 1, '2019-03-28', 'N/A', 'N/A', 'N/A', 'N/A', 0, ''),
('070201.190328.105841.744574', '070105.190328.122541.235246', 'CE01-01', 'Lista de Control de Equipos de Inspección y Medida', 1, '2019-03-28', 'N/A', 'N/A', 'N/A', 'N/A', 0, ''),
('070201.190328.113400.414575', '070105.190328.122847.235246', 'PI01-01', 'Puntos de Inspección (PA y PE)', 1, '2019-03-28', 'N/A', 'N/A', 'N/A', '', 0, ''),
('070201.190328.113400.414757', '070105.190328.122545.235246', 'CI01-01', 'Registro de Control Interno', 1, '2019-03-28', 'N/A', 'N/A', 'N/A', '', 0, ''),
('070201.190328.113400.426895', '070101.190328.113400.156984', 'EM-300-PR-001-01', 'Planes de Calidad de DyS', 1, '2019-03-28', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\n\r\nPrimera edición del documento', 22, ''),
('070201.190328.113401.841254', '070101.190328.113400.156984', 'EM-300-PR-001-02', 'Planes de Calidad de DyS', 2, '2020-09-17', '070501.217144.327751.798139', '070501.208920.641678.763434', '070501.190248.606793.715299', 'III, 3.4 y 3.6\r\n\r\nSe añade la IT02 CMDIN GT2 como documento de referencia. Se añaden conocmientos de la nroma PECAL en ambos perfiles', 22, ''),
('070201.190328.113401.845545', '070105.190328.122545.235246', 'CI01-02', 'Registro de Control Interno', 2, '2020-09-17', 'N/A', 'N/A', 'N/A', '', 0, ''),
('070201.190328.113401.847452', '070105.190328.122847.235246', 'PI01-02', 'Puntos de Inspección (PA y PE)', 2, '2020-09-17', 'N/A', 'N/A', 'N/A', '', 0, ''),
('070201.190328.113402.325894', '070101.190328.113400.156984', 'EM-300-PR-001-03', 'Planes de Calidad de DyS', 3, '2022-08-29', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Apartado 2\r\n- Se actualiza el organigrama\r\n\r\nApartado 3\r\n- Se actualizan y renombran las fichas de funciones de puesto.\r\n\r\nApartados 3.4 y 3.5\r\n- Se crean las fichas de funciones de puesto de responsable de Área de Preventa Defensa, Ingeniero Preventa y Documentalista de Calidad y Seguridad.', 22, ''),
('070201.190328.113402.414152', '070105.190328.122545.235246', 'CI01-03', 'Registro de Control Interno', 3, '2022-08-29', 'N/A', 'N/A', 'N/A', '', 0, ''),
('070201.190328.113402.652555', '070105.190328.122847.235246', 'PI01-03', 'Puntos de Inspección (PA y PE)', 3, '2022-08-29', 'N/A', 'N/A', 'N/A', '', 0, ''),
('070201.190328.113405.654167', '070101.190328.113401.748512', 'EM-300-PR-002-02', 'Confección y Codificación de la documentación de DyS', 2, '2019-10-07', '070501.217144.327751.798139', '070501.208920.641678.763434', '070501.190248.606793.715299', '5.1.2\r\n- Añadido el punto 5.1.2, describiendo la forma de codificación de los formatos.\r\n\r\nAnexo 1\r\n- Anexo 1: Modificada la descripción del documento \"IS\", haciendo referencia a los informes de seguimiento de riesgos.\r\n\r\nAnexo 3\r\n- Anexo 3: Añadido el documento \"IS - Informe de seguimiento de riesgos\".', 24, ''),
('070201.190328.113406.545802', '070101.190328.113401.748512', 'EM-300-PR-002-03', 'Confección y Codificación de la documentación de DyS', 3, '2020-01-28', '070501.217144.327751.798139', '070501.208920.641678.763434', '070501.190248.606793.715299', 'III\r\n- Añadida referencia al Manual de la Documentación de TSOL\r\n\r\nTodos\r\n- Aclarado que en al codificación de TdE la \"P\" hace referencia al Área o actividades de DyS, atendiendo al tipo del proyecto; y correcciones varias.\r\n\r\nAnexo 1\r\n- Añadido un anexo (actual anexo 1), con un resumen de los formatos de codificación\r\n\r\nAnexo 1 y 3\r\n- Integrados los antiguos Anexos 1 y 3.', 24, ''),
('070201.190328.155115.478545', '070101.190328.113404.652538', 'EM-300-PR-005-01', 'Control de Equipos de Inspección, Medida y Ensayo de DyS', 1, '2019-03-28', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\nPrimera edición del documento', 9, ''),
('070201.190328.162411.402010', '070105.190328.122852.235246', 'RO01-01', 'Informe del Análisis e Identificación de Riesgos', 1, '2019-03-28', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\n- Primera edición del documento', 0, ''),
('070201.190328.162411.474858', '070101.190328.113408.786485', 'EM-300-PR-009-01', 'Gestión de Riesgos para Proyectos de DyS', 1, '2019-03-28', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\n- Primera edición del documento', 20, ''),
('070201.190328.163850.320202', '070105.190328.122645.235246', 'ET01-01', 'Etiqueta Identificativa \"Material Falsificado\"', 1, '2019-03-28', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\n- Primera edición del documento', 0, ''),
('070201.190328.163850.442584', '070105.190328.122747.235246', 'ID01-01', 'Informe de deficiencia en suministro', 1, '2019-03-28', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\n- Primera edición del documento', 0, 'Dado de baja en la versión 2 del documento EM-300-PR-010.'),
('070201.190328.165959.485868', '070101.190328.113409.964290', 'EM-300-PR-010-01', 'Detección de material falsificado', 1, '2019-03-28', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\n- Primera edición del documento', 10, ''),
('070201.190513.100810.137484', '070102.190328.113422.974678', 'EM-300-MA-003-01', 'Organización y Estructura del archivo en Telefónica Soluciones de DyS', 1, '2019-05-13', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\n- Primera edición del documento', 23, ''),
('070201.190513.105841.523698', '070105.190328.122544.235246', 'CE04-02', 'Etiquetas de calibración', 2, '2019-05-13', 'N/A', 'N/A', 'N/A', 'N/A', 0, ''),
('070201.190513.105841.744575', '070105.190328.122541.235246', 'CE01-02', 'Lista de Control de Equipos de Inspección y Medida', 2, '2019-05-13', 'N/A', 'N/A', 'N/A', 'N/A', 0, ''),
('070201.190513.105841.748462', '070105.190328.122542.235246', 'CE02-02', 'Control de Equipos de Inspección y Medida', 2, '2019-05-13', 'N/A', 'N/A', 'N/A', 'N/A', 0, ''),
('070201.190513.105841.841245', '070105.190328.122543.235246', 'CE03-02', 'Registro de Equipos de Inspección y Medida', 2, '2019-05-13', 'N/A', 'N/A', 'N/A', 'N/A', 0, ''),
('070201.190513.155247.454289', '070101.190328.113404.652538', 'EM-300-PR-005-02', 'Control de Equipos de Inspección, Medida y Ensayo de DyS', 2, '2019-05-13', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Portada\r\n- Añadido “de DYS” al título del documento \r\n\r\nApartado 1.1.1\r\n- Añadida condición sobre los equipos de medida suministrados por el cliente.                                                                                                                                                                \r\n\r\nApartado 1.2.2\r\n- Añadida referencia al nuevo formato  CE04                                                                                                                                                                                                                                                                                      \r\n\r\nAnexo 4\r\n- Añadido el formato CE04  : Etiquetas de calibración', 23, ''),
('070201.190607.100810.137484', '070102.190328.113421.049163', 'EM-300-MA-002-01', 'Gestión de la calidad de DyS', 1, '2019-06-07', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\n- Primera edición del documento', 27, ''),
('070201.190607.135305.666587', '070101.190328.113401.748512', 'EM-300-PR-002-01', 'Confección y Codificación de la documentación de DyS', 1, '2019-06-07', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\nPrimera edición del documento', 24, ''),
('070201.190607.160354.345878', '070101.190328.113405.480329', 'EM-300-PR-006-01', 'Compras en Telefónica de España de DyS', 1, '2019-06-07', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\nPrimera edición del documento', 22, ''),
('070201.190607.160354.441454', '070105.190328.122952.235246', 'RS01-01', 'Requisitos Clase S-TGC', 1, '2019-06-07', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\nPrimera edición del documento', 0, ''),
('070201.190607.160354.655565', '070105.190328.122849.235246', 'RB01-01', 'Requisitos Básicos', 1, '2019-06-07', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\nPrimera edición del documento', 0, ''),
('070201.190607.160354.874454', '070105.190328.122850.235246', 'RB02-01', 'Requisitos de Seguridad', 1, '2019-06-07', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\nPrimera edición del documento', 0, ''),
('070201.190607.171111.144151', '070105.190328.122953.235246', 'SO01-01', 'Solicitud de Oferta', 1, '2019-06-07', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\n- Primera edición del documento', 0, ''),
('070201.190607.171111.144152', '070105.190328.122745.235246', 'HV01-01', 'Hoja de Verificación de Pedidos', 1, '2019-06-07', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\n- Primera edición del documento', 0, ''),
('070201.190607.171111.335654', '070101.190328.113412.672401', 'EM-300-PR-013-01', 'Compras en Telefónica Soluciones de DyS', 1, '2019-06-07', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\n- Primera edición del documento', 16, ''),
('070201.190701.102341.174821', '070103.190328.113425.101704', 'EM-300-IN-002-01', 'Replanteo de Mediciones y Planificación de DyS', 1, '2019-07-01', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\n- Primera edición del documento', 10, 'Revisión del documento sin cambios el 08/07/2021.\r\nRevisión del documento sin cambios el 18/07/2023'),
('070201.190701.103141.845114', '070103.190328.113426.561175', 'EM-300-IN-003-01', 'Análisis funcional de DyS', 1, '2019-07-01', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\n- Primera edición del documento', 10, 'Revisión del documento sin cambios el 06/07/2021.\r\nRevisión del documento sin cambios el 18/07/2023'),
('070201.190701.103333.417545', '070103.190701.102664.113426', 'EM-300-IN-004-01', 'Diseño de sistemas/redes de DyS', 1, '2019-07-01', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\n- Primera edición del documento', 12, 'Revisión del documento sin cambios el 06/07/2021.\r\nRevisión del documento sin cambios el 18/07/2023'),
('070201.190701.161511.002458', '070105.190328.122747.235246', 'IV01-01', 'Informe de Verificación de Material Suministrado', 1, '2019-07-01', '070501.208920.641678.763434', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\n- Primera edición del documento', 0, ''),
('070201.190701.161511.474858', '070101.190328.113406.246828', 'EM-300-PR-007-01', 'Control de los productos suministrados por el cliente de DyS', 1, '2019-07-01', '070501.208920.641678.763434', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\n- Primera edición del documento', 8, ''),
('070201.190701.170404.714141', '070101.190328.113410.917334', 'EM-300-PR-011-01', 'Gestión de la Configuración de DyS', 1, '2019-07-01', '070501.202624.973659.440607', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\n- Primera edición del documento', 10, ''),
('070201.190701.170909.255688', '070101.190328.113411.917334', 'EM-300-PR-012-01', 'Planes y Protocolos de Pruebas de DyS', 1, '2019-07-01', '070501.208920.641678.763434', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\n- Primera edición del documento', 14, ''),
('070201.190701.170909.845150', '070105.190328.113423.235246', 'AP01-01', 'Acta de realización de pruebas', 1, '2019-07-01', 'N/A', 'N/A', 'N/A', '', 2, ''),
('070201.190701.172054.675421', '070101.190328.113413.506450', 'EM-300-PR-014-01', 'Planificación y Desarrollo de las Actividades Técnicas de DyS', 1, '2019-07-01', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\n- Primera edición del documento', 11, ''),
('070201.190701.172256.358421', '070101.190328.113414.454355', 'EM-300-PR-015-01', 'Diseño y Especificación de requisitos de DyS', 1, '2019-07-01', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\n- Primera edición del documento', 15, ''),
('070201.190701.172741.112547', '070101.190328.113415.466111', 'EM-300-PR-016-01', 'Desarrollo Software de DyS', 1, '2019-07-01', '070501.208920.641678.763434', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\n- Primera edición del documento', 35, 'Revisión del documento sin cambios el 08/07/2021.\r\nRevisión del documento sin cambios el 18/07/2023.'),
('070201.190725.102341.174821', '070103.190328.113424.029185', 'EM-300-IN-001-01', 'Condiciones Ambientales de la Sala de Maquetas de DyS', 1, '2019-07-25', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\n- Primera edición del documento', 16, 'Obsoleto. Dado de baja el 25/07/2021.'),
('070201.190725.102341.174822', '070105.190328.122851.235246', 'RM01-01', 'Hoja de Registro Mensual', 1, '2019-07-25', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\n- Primera edición del documento', 16, 'Obsoleto. Dado de baja el 25/07/2021.'),
('070201.190725.154501.147848', '070101.190328.113403.321869', 'EM-300-PR-004-01', 'Gestión de No Conformidades, Observaciones y Acciones Correctivas de DyS', 1, '2019-07-25', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\nPrimera edición del documento', 9, ''),
('070201.190725.162411.102565', '070105.190328.122848.235246', 'RA01-01', 'Informe RMA', 1, '2019-07-25', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\n- Primera edición del documento', 8, ''),
('070201.190725.162411.474858', '070101.190328.113407.606798', 'EM-300-PR-008-01', 'Servicio postventa de DyS', 1, '2019-07-25', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\n- Primera edición del documento', 8, ''),
('070201.191007.160423.325220', '070105.190328.122850.235246', 'RB02-02', 'Requisitos de Seguridad', 2, '2019-10-07', '070501.217144.327751.798139', '070501.208920.641678.763434', '070501.190248.606793.715299', 'Sin cambios', 0, ''),
('070201.191007.160423.374858', '070101.190328.113405.480329', 'EM-300-PR-006-02', 'Compras en Telefónica de España de DyS', 2, '2019-10-07', '070501.217144.327751.798139', '070501.208920.641678.763434', '070501.190248.606793.715299', '3\r\n- Eliminado un párrafo por falta de concordancia.\r\n\r\n3.1\r\n- Añadidas referencias a los formatos HV01 y SO01\r\n\r\n7.1\r\n- Modificado apartado 7.1\r\n\r\n7.1.1\r\n- Añadido el apartado 7.1.1.\r\n\r\nAnexo 1\r\n- Añadidas referencias a los formatos HV01, SO01 e ID01', 22, ''),
('070201.191007.160423.554145', '070105.190328.122952.235246', 'RS01-02', 'Requisitos Clase S-TGC', 2, '2019-10-07', '070501.217144.327751.798139', '070501.208920.641678.763434', '070501.190248.606793.715299', '', 0, 'Sin cambios'),
('070201.191007.160423.574475', '070105.190328.122849.235246', 'RB01-02', 'Requisitos Básicos', 2, '2019-10-07', '070501.217144.327751.798139', '070501.208920.641678.763434', '070501.190248.606793.715299', 'Sin cambios', 0, ''),
('070201.191007.161616.161616', '070101.190328.113406.246828', 'EM-300-PR-007-02', 'Control de los productos suministrados por el cliente de DyS', 2, '2019-10-07', '070501.217144.327751.798139', '070501.208920.641678.763434', '070501.190248.606793.715299', '1.3\r\n- Añadida referencia al formato ID01\r\n\r\nAnexo 1\r\n- Añadido Anexo 1 y formato ID01', 8, ''),
('070201.191007.161616.412025', '070105.190328.122747.235246', 'IV01-02', 'Informe de Verificación del Material Suministrado', 2, '2019-10-07', '070501.217144.327751.798139', '070501.208920.641678.763434', '070501.190248.606793.715299', '', 0, ''),
('070201.191007.171313.060996', '070101.190328.113412.672401', 'EM-300-PR-013-02', 'Compras en Telefónica Soluciones de DyS', 2, '2019-10-07', '070501.217144.327751.798139', '070501.208920.641678.763434', '070501.190248.606793.715299', '1.2\r\n- Añadidos los puntos 1.2, 1.2.1, 1.2.1.1 y 1.2.1, describiendo la verificación del producto/servicio adquirido.\r\n\r\nAnexo 1\r\n- Añadida referencia al formato ID01.', 16, ''),
('070201.191007.171313.060997', '070105.190328.122953.235246', 'SO01-02', 'Solicitud de Oferta', 2, '2019-10-07', '070501.217144.327751.798139', '070501.208920.641678.763434', '070501.190248.606793.715299', 'Sin cambios', 0, ''),
('070201.191007.171313.060998', '070105.190328.122745.235246', 'HV01-02', 'Hoja de Verificación de Pedidos', 2, '2019-10-07', '070501.217144.327751.798139', '070501.208920.641678.763434', '070501.190248.606793.715299', 'Sin cambios', 0, ''),
('070201.191019.172917.136587', '070101.190328.113416.230396', 'EM-300-PR-017-01', 'Procedimiento de seguridad de DyS', 1, '2020-10-19', '070501.204491.491986.480920', '070501.209133.110533.565851', '070501.223484.206544.531864', 'Todos\r\n- Primera edición del documento', 29, ''),
('070201.192803.153845.165874', '070101.190328.113402.412342', 'EM-300-PR-003-01', 'Elaboración y Revisión de Ofertas de DyS', 1, '2019-03-28', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\nPrimera edición del documento', 15, ''),
('070201.192803.153845.841124', '070105.190328.122746.235246', 'IR02-01', 'Informe de Revisión de la Documentación Contractual', 1, '2019-03-28', 'N/A', 'N/A', 'N/A', '', 0, ''),
('070201.200128.100810.137484', '070102.190328.113421.049163', 'EM-300-MA-002-02', 'Gestión de la calidad de DyS', 2, '2020-01-28', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', '5.1\r\n- Corrección de errata en la referencia al Manual de Organización y Funciones de DyS (EM-300-MA-001).', 27, ''),
('070201.200128.105841.125456', '070105.190328.122544.235246', 'CE04-03', 'Etiquetas de calibración', 3, '2020-01-28', 'N/A', 'N/A', 'N/A', 'N/A', 0, ''),
('070201.200128.105841.744576', '070105.190328.122541.235246', 'CE01-03', 'Lista de Control de Equipos de Inspección y Medida', 3, '2020-01-28', 'N/A', 'N/A', 'N/A', 'N/A', 0, ''),
('070201.200128.105841.749898', '070105.190328.122542.235246', 'CE02-03', 'Control de Equipos de Inspección y Medida', 3, '2020-01-28', 'N/A', 'N/A', 'N/A', 'N/A', 0, ''),
('070201.200128.105841.987412', '070105.190328.122543.235246', 'CE03-03', 'Registro de Equipos de Inspección y Medida', 3, '2020-01-28', 'N/A', 'N/A', 'N/A', 'N/A', 0, ''),
('070201.200128.154145.744124', '070105.190328.122746.235246', 'IR02-02', 'Informe de Revisión de la Documentación Contractual', 2, '2020-01-28', 'N/A', 'N/A', 'N/A', '', 0, ''),
('070201.200128.154145.987546', '070101.190328.113402.412342', 'EM-300-PR-003-02', 'Elaboración y Revisión de Ofertas de DyS', 2, '2020-01-28', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Anexo 1\r\n- Eliminado formato ER01, y añadida referencia al documento EM-300-PR-009\r\n\r\nTodos\r\n- Debido al renombre del formato, se cambian todas las referencias de ER01 a RO01.', 15, ''),
('070201.200128.155247.454289', '070101.190328.113404.652538', 'EM-300-PR-005-03', 'Control de Equipos de Inspección, Medida y Ensayo de DyS', 3, '2020-01-28', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\n- Reestructuración general de los puntos del procedimiento\r\n  \r\n\r\n2.4\r\n- Añadido el punto 2.4, en el cual se describe la forma de calcular los intervalos de calibraciones.   ', 23, ''),
('070201.200128.162411.320521', '070105.190328.122852.235246', 'RO01-02', 'Informe del Análisis e Identificación de Riesgos', 2, '2020-01-28', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Apartado 2.1\r\n- Añadidas instrucciones y referencias al formato  RO01.\r\n\r\n\r\nAnexo IV\r\n- Añadido el formato RO01.', 0, ''),
('070201.200128.162411.474858', '070101.190328.113408.786485', 'EM-300-PR-009-02', 'Gestión de Riesgos para Proyectos de DyS', 2, '2020-01-28', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Apartado 2.1\r\n- Añadidas instrucciones y referencias al formato  RO01.\r\n\r\n\r\nAnexo IV\r\n- Añadido el formato RO01.', 20, ''),
('070201.200616.160741.222565', '070105.190328.122952.235246', 'RS01-03', 'Requisitos Clase S-TGC', 3, '2020-06-16', '070501.208920.641678.763434', '070501.209133.110533.565851', '070501.190248.606793.715299', '', 0, 'Sin cambios'),
('070201.200616.160741.244515', '070101.190328.113405.480329', 'EM-300-PR-006-03', 'Compras en Telefónica de España de DyS', 3, '2020-06-16', '070501.208920.641678.763434', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Ap. 1\r\n- Eliminadas referencias a la Evaluación de Proveedores.\r\n\r\nAp. 5\r\n- Se crea el apartado 5, donde se detalla la evaluación de proveedores.', 22, ''),
('070201.200616.160741.621541', '070105.190328.122850.235246', 'RB02-03', 'Requisitos de Seguridad', 3, '2020-06-16', '070501.208920.641678.763434', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Sin cambios', 0, ''),
('070201.200616.160741.744712', '070105.190328.122849.235246', 'RB01-03', 'Requisitos Básicos', 3, '2020-06-16', '070501.208920.641678.763434', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Sin cambios', 0, ''),
('070201.200917.100810.137484', '070102.190328.113420.931878', 'EM-300-MA-001-02', 'Manual de Organización y Funciones de DyS', 2, '2020-09-17', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'III, 3.4 y 3.6\r\n- Se añade la IT02 CMDIN GT2 como documento de referencia. Se añaden conocmientos de la nroma PECAL en ambos perfiles', 22, ''),
('070201.200917.132801.65755', '070101.190328.113401.748512', 'EM-300-PR-002-04', 'Confección y Codificación de la documentación de DyS', 4, '2020-09-17', '070501.217144.327751.798139', '070501.208920.641678.763434', '070501.190248.606793.715299', 'Anexo 2\r\n- Añadidos nuevos tipos de documentos al listado de códigos (Por ejemplo, PII)', 24, ''),
('070201.210204.173141.178452', '070101.190328.113416.230396', 'EM-300-PR-017-02', 'Procedimiento de seguridad de DyS', 2, '2021-02-04', '070501.204491.491986.480920', '070501.209133.110533.565851', '070501.223484.206544.531864', 'Anexo 3\r\n- Se añade ficha de Control y Acceso a la Información Clasificada\r\n\r\nApartado 6\r\n- Se añade el Uso del Sistema Acreditado', 29, ''),
('070201.210225.173247.248565', '070101.190328.113416.230396', 'EM-300-PR-017-03', 'Procedimiento de seguridad de DyS', 3, '2021-02-25', '070501.204491.491986.480920', '070501.209133.110533.565851', '070501.223484.206544.531864', 'Apartado 2\r\n- Se actualizan las instrucciones para cumplimentar el Formulario de Solicitud de Integración de Información Clasificada\r\n\r\nApartado 2.1\r\n- Se actualiza el Formulario de Solicitud de Integración de Información Clasificada', 29, ''),
('070201.210304.162411.474808', '070105.190328.122852.235246', 'RO01-03', 'Informe del Análisis e Identificación de Riesgos', 3, '2021-03-04', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Sin cambios', 0, ''),
('070201.210304.162411.474858', '070101.190328.113408.786485', 'EM-300-PR-009-03', 'Gestión de Riesgos para Proyectos de DyS', 3, '2021-03-04', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'IV\r\n- Actualizados los términos y definiciones\r\n\r\n\r\n2.3.3\r\n- Añadida referencia la flujograma extendido.', 20, ''),
('070201.210305.160820.145525', '070101.190328.113405.480329', 'EM-300-PR-006-04', 'Compras en Telefónica de España de DyS', 4, '2021-03-05', '070501.208920.641678.763434', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Anexo 1\r\n- Modificado el formato RS01.', 22, ''),
('070201.210305.160820.322014', '070105.190328.122850.235246', 'RB02-04', 'Requisitos de Seguridad', 4, '2021-03-05', '070501.208920.641678.763434', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Sin cambios', 0, ''),
('070201.210305.160820.435652', '070105.190328.122849.235246', 'RB01-04', 'Requisitos Básicos', 4, '2021-03-05', '070501.208920.641678.763434', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Sin cambios', 0, ''),
('070201.210305.160820.441424', '070105.190328.122952.235246', 'RS01-04', 'Requisitos Clase S-TGC', 4, '2021-03-05', '070501.208920.641678.763434', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Anexo 1\r\n- Modificado el formato RS01.', 0, ''),
('070201.210514.100810.137484', '070102.190328.113422.974678', 'EM-300-MA-003-02', 'Organización y Estructura del archivo en Telefónica Soluciones de DyS', 2, '2021-05-14', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'General\r\n- Corrección de erratas\r\n\r\nPunto III\r\n- Documentación de normativa interna\r\n\r\n2.4.2\r\n- Contenido de los tipos de documentos\r\n\r\n2.5.1\r\n- Contenido de Recibos MP’s', 23, ''),
('070201.210514.154501.147848', '070101.190328.113403.321869', 'EM-300-PR-004-02', 'Gestión de No Conformidades, Observaciones y Acciones Correctivas de DyS', 2, '2021-05-14', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', '1.6, 17 y 1.8\r\nSe ha añadido el procedimiento de control de eficacia, ampliándolo y compartimentándolo en diferentes apartados.', 9, ''),
('070201.211011.171313.060996', '070101.190328.113412.672401', 'EM-300-PR-013-03', 'Compras en Telefónica Soluciones de DyS', 3, '2021-10-11', '070501.217144.327751.798139', '070501.208920.641678.763434', '070501.190248.606793.715299', 'Todos\r\n- Cambio de branding.\r\n\r\n2.4\r\n- Añadida la evaluación de todas las compras ejecutadas con PECAL 2110.', 16, ''),
('070201.211011.171313.060998', '070105.190328.122953.235246', 'SO01-03', 'Solicitud de Oferta', 3, '2021-10-11', '070501.217144.327751.798139', '070501.208920.641678.763434', '070501.190248.606793.715299', 'Sin cambios', 0, ''),
('070201.211011.171313.060999', '070105.190328.122745.235246', 'HV01-03', 'Hoja de Verificación de Pedidos', 3, '2021-10-11', '070501.217144.327751.798139', '070501.208920.641678.763434', '070501.190248.606793.715299', 'Sin cambios', 0, ''),
('070201.211015.161821.211015', '070101.190328.113406.246828', 'EM-300-PR-007-03', 'Control de los productos suministrados por el cliente de DyS', 3, '2021-10-15', '070501.217144.327751.798139', '070501.208920.641678.763434', '070501.190248.606793.715299', '1.3\r\n- Se añade el primer párrafo del punto. Para seguir el punto 5.4.9 “Propiedad perteneciente al cliente o proveedores externos” o el punto que en sucesivas ediciones trate sobre esta cuestión, de la norma PECAL 2110.\r\n- Se cambia el término negociará con el RAC por el término coordinará con el RAC para seguir el punto 5.4.9 de la norma PECAL 2110.', 8, ''),
('070201.211015.161821.510102', '070105.190328.122747.235246', 'IV01-03', 'Informe de Verificación del Material Suministrado', 3, '2021-10-15', '070501.217144.327751.798139', '070501.208920.641678.763434', '070501.190248.606793.715299', '', 0, ''),
('070201.22.100810.137484', '070102.190328.113421.049163', 'EM-300-MA-002-03', 'Gestión de la calidad de DyS', 3, '2022-01-28', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\n- Corrección de erratas.\r\n- Actualización de referencias:\r\n“Manual del Sistema de Gestión de la Calidad (SGC)” (TE-000-MA-003)\r\n“Realizar Revisiones Internas (P91102)”.\r\n\r\n8.3\r\n- Se modifica el formato para el registro de la revisión y verificación del diseño', 27, ''),
('070201.220112.162411.411025', '070105.190328.122848.235246', 'RA01-02', 'Informe RMA', 2, '2022-01-12', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Anexo I\r\n- Actualizado el formato de Informe RMA', 8, 'Documento revisado el 13/07/2021, sin cambios.'),
('070201.220112.162411.474858', '070101.190328.113407.606798', 'EM-300-PR-008-02', 'Servicio postventa de DyS', 2, '2022-01-12', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Anexo I\r\n- Actualizado el formato de Informe RMA', 8, 'Documento revisado el 13/07/2021, sin cambios.'),
('070201.220128.105841.114745', '070105.190328.122544.235246', 'CE04-04', 'Etiquetas de calibración', 4, '2022-01-28', 'N/A', 'N/A', 'N/A', 'N/A', 0, ''),
('070201.220128.105841.252235', '070105.190328.122543.235246', 'CE03-04', 'Registro de Equipos de Inspección y Medida', 4, '2022-01-28', 'N/A', 'N/A', 'N/A', 'N/A', 0, ''),
('070201.220128.105841.744577', '070105.190328.122541.235246', 'CE01-04', 'Lista de Control de Equipos de Inspección y Medida', 4, '2022-01-28', 'N/A', 'N/A', 'N/A', 'N/A', 0, ''),
('070201.220128.105841.847231', '070105.190328.122542.235246', 'CE02-04', 'Control de Equipos de Inspección y Medida', 4, '2022-01-28', 'N/A', 'N/A', 'N/A', 'N/A', 0, ''),
('070201.220128.154241.414575', '070105.190328.122746.235246', 'IR02-03', 'Informe de Revisión de la Documentación Contractual', 3, '2022-01-28', 'N/A', 'N/A', 'N/A', '', 0, ''),
('070201.220128.154241.918911', '070101.190328.113402.412342', 'EM-300-PR-003-03', 'Elaboración y Revisión de Ofertas de DyS', 3, '2022-01-28', '070501.208920.641678.763434', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Apartado IIII Documentación de referencia\r\n- Cambia el nombre del manual de calidad de TdE pasándose a llamar Manual del Sistema de Gestión de la Calidad (SGC)', 15, ''),
('070201.220128.155506.060923', '070101.190328.113404.652538', 'EM-300-PR-005-04', 'Control de Equipos de Inspección, Medida y Ensayo de DyS', 4, '2022-01-28', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\n- Corrección de errores y actualización del branding\r\n                    \r\nIII\r\n- Actualización de referencias: “Manual del Sistema de Gestión de la Calidad (SGC)” (TE-000-MA-003) \r\n\r\n4.1  \r\n- Añadido el apartado 4.1 donde se explica como se debe dar de baja un equipo por falta de uso.   ', 23, ''),
('070201.220328.102341.174821', '070104.190328.113423.235246', 'EM-300-GU-001-01', 'Guía para la codificación de la documentación de DyS', 1, '2022-03-28', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Todos\r\n- Primera edición del documento', 16, ''),
('070201.220328.132945.157489', '070101.190328.113401.748512', 'EM-300-PR-002-05', 'Confección y Codificación de la documentación de DyS', 5, '2022-03-28', '070501.196196.739183.716643', '070501.217144.327751.798139', '070501.190248.606793.715299', 'Anexos 1, 2 y 3\r\n- Se han extraído estos anexos para crear una guía independiente. Esta guía se irá actualizando a medida que se vayan necesitando nuevos códigos. También se han actualizado las referencias a estos dentro del documento.', 24, ''),
('070201.220328.160910.111242', '070105.190328.122849.235246', 'RB01-05', 'Requisitos Básicos', 5, '2022-03-28', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Sin cambios', 0, ''),
('070201.220328.160910.112405', '070105.190328.122952.235246', 'RS01-05', 'Requisitos Clase S-TGC', 5, '2022-03-28', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', '', 22, ''),
('070201.220328.160910.324784', '070105.190328.122850.235246', 'RB02-05', 'Requisitos de Seguridad', 5, '2022-03-28', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Sin cambios', 0, ''),
('070201.220328.160910.444757', '070101.190328.113405.480329', 'EM-300-PR-006-05', 'Compras en Telefónica de España de DyS', 5, '2022-03-28', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', '5.1\r\n- Cambiados los criterios de evaluación.\r\n\r\n5.3\r\n- Tratamiento de las calificaciones “Z”.\r\n\r\n5.4\r\n- Comunicación a la Unidad de Compras.', 22, ''),
('070201.220328.162411.474858', '070101.190328.113408.786485', 'EM-300-PR-009-04', 'Gestión de Riesgos para Proyectos de DyS', 4, '2022-03-28', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'II\r\n- Actualizada la documentación de referencia.\r\n\r\nGeneral\r\n- Reestructuración general del documento, haciendo una mejor división de las fases.\r\n\r\n\r\n2.3.3\r\n- Eliminada la referencia al flujograma.', 20, ''),
('070201.220328.162411.474868', '070105.190328.122852.235246', 'RO01-04', 'Informe del Análisis e Identificación de Riesgos', 4, '2022-03-28', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Sin cambios.', 0, ''),
('070201.220328.171616.024756', '070101.190328.113412.672401', 'EM-300-PR-013-04', 'Compras en Telefónica Soluciones de DyS', 4, '2022-03-28', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', '2.4\r\n- Cambiados los criterios de evaluación.\r\n\r\n2.5\r\n- Tratamiento de las calificaciones “Z”.\r\n\r\n2.9\r\n- Comunicación a la Unidad de Compras.', 16, 'Próximo cambio: Quitar la letra \"D - Deficiente\", según el procedimiento de la casa.'),
('070201.220328.171616.024757', '070105.190328.122953.235246', 'SO01-04', 'Solicitud de Oferta', 4, '2022-03-28', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Sin cambios.', 0, ''),
('070201.220328.171616.024758', '070105.190328.122745.235246', 'HV01-04', 'Hoja de Verificación de Pedidos', 4, '2022-03-28', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Sin cambios.', 0, ''),
('070201.220422.162411.470851', '070105.190328.122852.235246', 'RO01-05', 'Informe del Análisis e Identificación de Riesgos', 5, '2022-04-22', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Anexo I\r\n- Eliminado antiguo Anexo I.\r\n\r\nAnexo III\r\n- Modificado el Formato RO01.', 0, ''),
('070201.220422.162411.474858', '070101.190328.113408.786485', 'EM-300-PR-009-05', 'Gestión de Riesgos para Proyectos de DyS', 5, '2022-04-22', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Apartado 4\r\n- Reestructuración general del apartado 4, para una mejor especificación de todas las fases que entrañan la gestión de riesgos.\r\n\r\nApartado 4.2\r\n- Incorporación de la biblioteca de riesgos para la identificación de estos.\r\n\r\nAnexo I\r\n- Eliminado antiguo Anexo I.\r\n\r\nAnexo III\r\n- Modificado el Formato RO01.', 20, ''),
('070201.220426.105841.632326', '070105.190328.122543.235246', 'CE03-05', 'Registro de Equipos de Inspección y Medida', 5, '2022-04-26', 'N/A', 'N/A', 'N/A', 'N/A', 0, ''),
('070201.220426.105841.698235', '070105.190328.122542.235246', 'CE02-05', 'Control de Equipos de Inspección y Medida', 5, '2022-04-26', 'N/A', 'N/A', 'N/A', 'N/A', 0, ''),
('070201.220426.105841.744577', '070105.190328.122541.235246', 'CE01-05', 'Lista de Control de Equipos de Inspección y Medida', 5, '2022-04-26', 'N/A', 'N/A', 'N/A', 'N/A', 0, ''),
('070201.220426.105841.774887', '070105.190328.122544.235246', 'CE04-05', 'Etiquetas de calibración', 5, '2022-04-26', 'N/A', 'N/A', 'N/A', 'N/A', 0, ''),
('070201.220426.155665.365898', '070101.190328.113404.652538', 'EM-300-PR-005-05', 'Control de Equipos de Inspección, Medida y Ensayo de DyS', 5, '2022-04-26', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'General\r\n- Reestructuración general del procedimiento.     \r\n\r\nAnexo 3\r\n- Modificación de las etiquetas de los equipos de medida.', 23, ''),
('070201.220627.162411.404858', '070105.190328.122852.235246', 'RO01-06', 'Informe del Análisis e Identificación de Riesgos', 6, '2022-06-27', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Sin cambios', 0, ''),
('070201.220627.162411.474858', '070101.190328.113408.786485', 'EM-300-PR-009-06', 'Gestión de Riesgos para Proyectos de DyS', 6, '2022-06-27', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Apartado 6\r\n- Se incluye la comunicación de los riesgos.\r\n\r\nIV\r\n- Añadida la definición de UTE, riesgo y no conformidad.\r\n\r\nApartado 4.7\r\n- Incorporación de la materialización de los riesgos.\r\n\r\nApartado 4.2.4\r\n- Modificación del ciclo de vida de los riesgos', 20, ''),
('070201.220705.173333.657211', '070101.190328.113416.230396', 'EM-300-PR-017-04', 'Procedimiento de seguridad de DyS', 4, '2022-07-05', '070501.204491.491986.480920', '070501.209133.110533.565851', '070501.223484.206544.531864', 'Se actualiza\r\nApartado 1.1 Formulario solicitud de documentación clasificada al área de seguridad industrial (ASI)\r\nSe actualiza\r\nApartado 3 - Transmisión de la información clasificada\r\nApartado nuevo\r\nApartado 4 - Recibo de entrega y recepción de material clasificado\r\nSe actualiza\r\nApartado 4.1 – Formulario Recibo de entrega y recepción de material clasificado\r\nSe actualiza\r\nApartado 5 – Ficha de control\r\nSe renombre número de apartado\r\nApartado 6 – Recibo de transporte de material clasificado\r\nSe actualiza\r\nApartado 6.1 –Formulario Recibo de transporte de material clasificado\r\nSe actualiza\r\nApartado 7 – Carta\r\nSe renombra número de Apartado\r\nAnexo 1 - Insertar número de integración en el documento\r\nActualizar normativa para insertar integración en el documento\r\nAnexo 3 - Entrega de documentación en Seguridad Industrial y devolución de Pliegos\r\nSe actualizaa', 29, ''),
('070201.220708.102441.745475', '070104.190328.113423.235246', 'EM-300-GU-001-02', 'Guía para la codificación de la documentación de DyS', 2, '2022-07-08', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'III, 3.4 y 3.6\r\n- Se incluye un sistema de codificación para la documentación de equipos.', 16, ''),
('070201.220708.133051.254745', '070101.190328.113401.748512', 'EM-300-PR-002-06', 'Confección y Codificación de la documentación de DyS', 6, '2022-07-08', '070501.196196.739183.716643', '070501.209133.110533.565851', '070501.190248.606793.715299', '5.5\r\n- Añadido un nuevo sistema de codificación para la documentación de los equipos.', 24, ''),
('070201.220829.100810.137484', '070102.190328.113420.931878', 'EM-300-MA-001-03', 'Manual de Organización y Funciones de DyS', 3, '2022-08-29', '070501.196196.739183.716643', '070501.209133.110533.565851', '070501.190248.606793.715299', '2\r\n- Se actualiza el organigrama\r\n\r\n3\r\n- Se actualizan y renombran las fichas de funciones de puesto.\r\n\r\n\r\n3.4 y 3.5\r\n- Se crean las fichas de funciones de puesto de responsable de Área de Preventa Defensa, Ingeniero Preventa y Documentalista de Calidad y Seguridad.', 22, ''),
('070201.221024.161821.211015', '070101.190328.113406.246828', 'EM-300-PR-007-04', 'Control de los productos suministrados por el cliente de DyS', 4, '2022-10-24', '070501.196196.739183.716643', '070501.208920.641678.763434', '070501.190248.606793.715299', '1.3 y Anexo I\r\n- Se modifica el Anexo 1, sustituyendo el formato ID01 por el formato IV01.', 8, ''),
('070201.221024.161821.510112', '070105.190328.122747.235246', 'IV01-04', 'Informe de Verificación del Material Suministrado', 4, '2022-10-24', '070501.196196.739183.716643', '070501.208920.641678.763434', '070501.190248.606793.715299', 'Se modifica el Anexo 1, sustituyendo el formato ID01 por el formato IV01.', 0, ''),
('070201.221024.163850.336587', '070105.190328.122645.235246', 'ET01-02', 'Etiqueta Identificativa \"Material Falsificado\"', 1, '2022-10-24', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', '', 0, ''),
('070201.221024.170000.170000', '070101.190328.113409.964290', 'EM-300-PR-010-02', 'Detección de material falsificado', 2, '2022-10-24', '070501.196196.739183.716643', '070501.209133.110533.565851', '070501.190248.606793.715299', '1.4\r\n- Se elimina el formato ID01, siendo sustituido por el formato IV01 del procedimiento EM-300-PR-007', 10, 'Documento revisado el 28/03/2021, sin cambios.'),
('070201.22110.154501.147848', '070101.190328.113403.321869', 'EM-300-PR-004-03', 'Gestión de No Conformidades, Observaciones y Acciones Correctivas de DyS', 3, '2022-11-10', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', '1.1 y 2\r\nSe incluye la aportación de evidencias de información al RAC en la base de datos de no conformidades y observaciones.', 9, ''),
('070201.221129.133720.745264', '070101.190328.113417.391510', 'EM-300-PR-018-01', 'Procedimiento de trabajo en la BBDD de HPS', 1, '2022-11-29', '070501.204491.491986.480920', '070501.209133.110533.565851', '070501.223484.206544.531864', 'Todos\r\n- Primera edición del documento', 33, ''),
('070201.230329.133941.357484', '070101.190328.113419.021167', 'EM-300-PR-020-01', 'Cumplimentación de formularios de seguridad en la gestión de expedientes', 1, '2023-03-29', '070501.215303.408223.723843', '070501.209133.110533.565851', '070501.223484.206544.531864', 'Todos\r\n- Primera edición del documento', 33, ''),
('070201.230515.154754.484875', '070101.190328.113403.321869', 'EM-300-PR-004-04', 'Gestión de No Conformidades, Observaciones y Acciones Correctivas de DyS', 4, '2023-05-15', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', '1.2\r\nSe incluye la materialización de un riesgo por la apertura de una no conformidad.', 9, ''),
('070201.230515.161252.332541', '070105.190328.122850.235246', 'RB02-06', 'Requisitos de Seguridad', 6, '2023-05-15', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Sin cambios', 0, ''),
('070201.230515.161252.641457', '070105.190328.122849.235246', 'RB01-06', 'Requisitos Básicos', 6, '2023-05-15', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Sin cambios', 0, ''),
('070201.230515.161252.657414', '070105.190328.122952.235246', 'RS01-06', 'Requisitos Clase S-TGC', 6, '2023-05-15', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', '\r\n', 0, ''),
('070201.230515.161252.658586', '070101.190328.113405.480329', 'EM-300-PR-006-06', 'Compras en Telefónica de España de DyS', 6, '2023-05-15', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', '8.1.1\r\nAnexo 1\r\n- Modificada la referencia al formato ID01 por el formato IV01.\r\n', 22, 'Próximo cambio: Quitar la letra \"D - Deficiente\", según el procedimiento de la casa.'),
('070201.230616.172256.358421', '070101.190328.113414.454355', 'EM-300-PR-015-02', 'Diseño y Especificación de requisitos de DyS', 2, '2023-06-16', '070501.217144.327751.798139', '070501.209133.110533.565851', '070501.190248.606793.715299', 'Apartado III\r\n- Se hace referencia al nuevo manual de sistema de gestión de la calidad de Telefónica\r\n\r\nApartado 1.2, Apartado 4, Apartado 5\r\n- Se ha hecho que el uso del formato C101 no sea obligatorio, y que esté abierto a las particularidades de cada proyecto\r\n\r\n\r\nAnexo 1\r\n- Actualizado el formato C101', 15, 'Revisión del documento sin cambios el 06/07/2021.'),
('070201.230725.170517.598865', '070101.190328.113410.917334', 'EM-300-PR-011-02', 'Gestión de la Configuración de DyS', 2, '2023-07-25', '070501.196196.739183.716643', '070501.209133.110533.565851', '070501.190248.606793.715299', 'III\r\n- Modificación de la referencia al manual del sistema de gestión de calidad', 10, 'Revisión del documento sin cambios el 08/07/2021.'),
('070201.230725.171017.421212', '070101.190328.113411.917334', 'EM-300-PR-012-02', 'Planes y Protocolos de Pruebas de DyS', 2, '2023-07-25', '070501.196196.739183.716643', '070501.209133.110533.565851', '070501.190248.606793.715299', 'III\r\n- Modificación de la referencia al Manual del Sistema de Gestión de Calidad', 14, 'Revisión del documento sin cambios el 08/07/2021.'),
('070201.230725.171017.741541', '070105.190328.113423.235246', 'AP01-02', 'Acta de realización de pruebas', 2, '2023-07-25', 'N/A', 'N/A', 'N/A', '', 2, ''),
('070201.230725.172345.421253', '070101.190328.113413.506450', 'EM-300-PR-014-02', 'Planificación y Desarrollo de las Actividades Técnicas de DyS', 2, '2023-07-25', '070501.196196.739183.716643', '070501.209133.110533.565851', '070501.190248.606793.715299', 'III\r\n- Modificación de la referencia al Manual del Sistema de Gestión de Calidad', 11, 'Revisión del documento sin cambios el 06/07/2021.'),
('070201.230912.171717.125847', '070106.190328.122953.235246', 'PLT-001-01', 'Documentación de proyectos', 1, '2019-07-01', 'N/A', 'N/A', 'N/A', '', 0, ''),
('070201.230912.171951.105263', '070106.190328.123218.235246', 'PLT-008-01', 'Documentación del sistema de calidad', 1, '2023-09-12', 'N/A', 'N/A', 'N/A', '', 0, ''),
('070201.230912.171951.134152', '070106.190328.123618.235520', 'PLT-013-01', 'Cuestionario de evaluación de cursos', 1, '2023-09-12', 'N/A', 'N/A', 'N/A', '', 0, ''),
('070201.230912.171951.185235', '070106.190328.123318.235246', 'PLT-009-01', 'Acta de reunión', 1, '2023-09-12', 'N/A', 'N/A', 'N/A', '', 0, ''),
('070201.230912.171951.201030', '070106.190328.124018.235246', 'PLT-017-01', 'Normas de acceso y estancia en sala maquetas', 1, '2023-09-12', 'N/A', 'N/A', 'N/A', '', 0, ''),
('070201.230912.171951.220147', '070106.190328.123017.235246', 'PLT-005-01', 'Anexo pliego pedidos', 1, '2023-09-12', 'N/A', 'N/A', 'N/A', '', 0, ''),
('070201.230912.171951.224102', '070106.190328.123818.235246', 'PLT-015-01', 'Hoja de registro de trabajos', 1, '2023-09-12', 'N/A', 'N/A', 'N/A', '', 0, ''),
('070201.230912.171951.274150', '070106.190328.123018.235246', 'PLT-006-01', 'Plantilla de carta/oferta', 1, '2023-09-12', 'N/A', 'N/A', 'N/A', '', 0, ''),
('070201.230912.171951.320232', '070106.190328.122954.235246', 'PLT-002-01', 'Documentación de proyectos clasificados', 1, '2023-09-12', 'N/A', 'N/A', 'N/A', '', 0, ''),
('070201.230912.171951.320233', '070106.190328.123015.235246', 'PLT-003-01', 'Modelo de cartas', 1, '2023-09-12', 'N/A', 'N/A', 'N/A', '', 0, ''),
('070201.230912.171951.387455', '070106.190328.123016.235246', 'PLT-004--01', 'Plantilla de ofertas', 1, '2023-09-12', 'N/A', 'N/A', 'N/A', '', 0, ''),
('070201.230912.171951.411256', '070106.190328.123518.235246', 'PLT-011-01', 'Acta de asistencia a cursos', 1, '2023-09-12', 'N/A', 'N/A', 'N/A', '', 0, ''),
('070201.230912.171951.552036', '070106.190328.123718.235246', 'PLT-014-01', 'Certificado de garantía', 1, '2023-09-12', 'N/A', 'N/A', 'N/A', '', 0, ''),
('070201.230912.171951.658412', '070106.190328.123618.235246', 'PLT-012-01', 'Diploma curso', 1, '2023-09-12', 'N/A', 'N/A', 'N/A', '', 0, ''),
('070201.230912.171951.741852', '070106.190328.123918.235246', 'PLT-016-01', 'Requisitos para la confirmación metrológica', 1, '2023-09-12', 'N/A', 'N/A', 'N/A', '', 0, ''),
('070201.230912.171951.774512', '070106.190328.123418.235246', 'PLT-010-01', 'Albarán de entrega', 1, '2023-09-12', 'N/A', 'N/A', 'N/A', '', 0, ''),
('070201.230912.171951.880215', '070106.190328.123118.235246', 'PLT-007-01', 'Informe de Justificación del Condicionamiento', 1, '2023-09-12', 'N/A', 'N/A', 'N/A', '', 0, ''),
('070201.230913.103600.147147', '070107.190328.122953.235246', 'APY-001-01', 'Plan de Calidad', 1, '2023-09-13', 'N/A', 'N/A', 'N/A', 'N/A', 0, ''),
('070201.230913.103700.658542', '070107.190328.132121.235246', 'APY-002-01', 'Plan de Gestión de Riesgos', 1, '2023-09-13', 'N/A', 'N/A', 'N/A', 'N/A', 0, ''),
('070201.230913.103800.352035', '070107.190328.132122.235246', 'APY-003-01', 'Plan de Seguridad', 1, '2023-09-13', 'N/A', 'N/A', 'N/A', 'N/A', 0, ''),
('070201.230913.103842.032574', '070107.190328.132123.235246', 'APY-004-01', 'Plan de Gestión de Configuración', 1, '2023-09-13', 'N/A', 'N/A', 'N/A', 'N/A', 0, ''),
('070201.230913.103900.982001', '070107.190328.132125.235246', 'APY-005-01', 'Justificación del Estado de la Configuración', 1, '2023-09-13', 'N/A', 'N/A', 'N/A', 'N/A', 0, ''),
('070201.230913.104000.523051', '070107.190328.132126.235246', 'APY-006-01', 'Informe de Auditoría de la Configuración', 1, '2023-09-13', 'N/A', 'N/A', 'N/A', 'N/A', 0, ''),
('070201.230913.104052.410201', '070107.190328.132127.235246', 'APY-007-01', 'Documento de pruebas', 1, '2023-09-13', 'N/A', 'N/A', 'N/A', 'N/A', 0, '');
INSERT INTO `07_documentacion_ediciones` (`id`, `id_doc`, `codigo_interno`, `denominador`, `edicion`, `fecha`, `elaborado`, `revisado`, `aprobado`, `cambios`, `paginas`, `comentarios`) VALUES
('070201.230913.104100.112587', '070107.190328.132128.235246', 'APY-008-01', 'Informe de Cierre de Proyecto', 1, '2023-09-13', 'N/A', 'N/A', 'N/A', 'N/A', 0, ''),
('070201.230913.104200.141025', '070107.190328.132129.235246', 'APY-009-01', 'Actuación durante la fase de garantía', 1, '2023-09-13', 'N/A', 'N/A', 'N/A', 'N/A', 0, ''),
('070201.230913.104234.521042', '070107.190328.132130.235246', 'APY-010-01', 'Check list de seguimiento de proyectos', 1, '2023-09-13', 'N/A', 'N/A', 'N/A', 'N/A', 0, ''),
('070201.230913.104300.241523', '070107.190328.132131.235246', 'APY-011-01', 'Matriz de trazabilidad', 1, '2023-09-13', 'N/A', 'N/A', 'N/A', 'N/A', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `07_documentacion_estados`
--

CREATE TABLE `07_documentacion_estados` (
  `id` int NOT NULL,
  `estado` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `07_documentacion_externa`
--

CREATE TABLE `07_documentacion_externa` (
  `id` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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
  `id` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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
  `juridica` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `acronimo` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
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
-- Estructura de tabla para la tabla `07_documentacion_revisiones`
--

CREATE TABLE `07_documentacion_revisiones` (
  `id` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_doc` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `revision` int NOT NULL,
  `fecha` date NOT NULL,
  `revisado` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `comentarios` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `07_documentacion_revisiones`
--

INSERT INTO `07_documentacion_revisiones` (`id`, `id_doc`, `revision`, `fecha`, `revisado`, `comentarios`) VALUES
('070202.20190328.113400', '070101.20190328.113400', 0, '2019-03-28', '070501.220214.090000.000001', ''),
('070202.20190328.113401', '070101.20190328.113400', 0, '2020-09-17', '070501.220214.090000.000001', ''),
('070202.20190328.113402', '070101.20190328.113400', 0, '2022-08-29', '070501.220214.090000.000001', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `07_documentacion_tipos`
--

CREATE TABLE `07_documentacion_tipos` (
  `id` int NOT NULL,
  `tipo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
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
-- Indices de la tabla `07_documentacion_ediciones`
--
ALTER TABLE `07_documentacion_ediciones`
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
-- Indices de la tabla `07_documentacion_revisiones`
--
ALTER TABLE `07_documentacion_revisiones`
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
