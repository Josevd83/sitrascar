-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2017 a las 17:23:38
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sitrascar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE `auditoria` (
  `ID` int(10) UNSIGNED NOT NULL,
  `MODULO_ID` int(10) UNSIGNED NOT NULL,
  `USUARIO_ID` int(10) UNSIGNED NOT NULL,
  `FECHA` date DEFAULT NULL,
  `TABLA` varchar(30) DEFAULT NULL,
  `ID_REGISTRO` int(10) UNSIGNED DEFAULT NULL,
  `CAMPO` varchar(30) DEFAULT NULL,
  `DATO_ANTERIOR` varchar(200) DEFAULT NULL,
  `DATO_NUEVO` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `buque`
--

CREATE TABLE `buque` (
  `ID` int(10) UNSIGNED NOT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `ESTATUS` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `buque`
--

INSERT INTO `buque` (`ID`, `NOMBRE`, `ESTATUS`) VALUES
(1, 'DURBAN BAY', '1'),
(2, 'ESTRELLA DORADA', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carga`
--

CREATE TABLE `carga` (
  `ID` int(10) UNSIGNED NOT NULL,
  `TIPO_CARGA_ID` int(10) UNSIGNED NOT NULL,
  `PUERTO_ID` int(10) UNSIGNED NOT NULL,
  `RUBROS_ID` int(10) UNSIGNED NOT NULL,
  `PAIS_ID` int(10) UNSIGNED NOT NULL,
  `BUQUE_ID` int(10) UNSIGNED NOT NULL,
  `FECHA_ATRAQUE` date NOT NULL,
  `BL` int(10) UNSIGNED DEFAULT NULL,
  `MUELLE` int(10) UNSIGNED DEFAULT NULL,
  `PESO` decimal(20,2) UNSIGNED DEFAULT NULL,
  `COD_VIAJE` varchar(50) DEFAULT NULL,
  `PESO_ASIGNADO` decimal(20,2) DEFAULT NULL,
  `ESTATUS_CARGA` int(1) UNSIGNED NOT NULL,
  `PESO_DISTRIBUIDO` decimal(20,2) DEFAULT NULL,
  `FECHA_REGISTRO` date NOT NULL,
  `OBSERVACIONES` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carga`
--

INSERT INTO `carga` (`ID`, `TIPO_CARGA_ID`, `PUERTO_ID`, `RUBROS_ID`, `PAIS_ID`, `BUQUE_ID`, `FECHA_ATRAQUE`, `BL`, `MUELLE`, `PESO`, `COD_VIAJE`, `PESO_ASIGNADO`, `ESTATUS_CARGA`, `PESO_DISTRIBUIDO`, `FECHA_REGISTRO`, `OBSERVACIONES`) VALUES
(1, 1, 1, 1, 1, 1, '2017-03-25', 1, 27, '29981.55', 'VOY36', '10000.00', 1, '6009.00', '2017-06-10', 'SIN OBSERVACIONES'),
(2, 1, 1, 1, 1, 1, '2001-04-05', 43, 23, '23456.00', '1', '12000.00', 1, '19024.00', '2017-06-10', 'rtrterty'),
(3, 1, 1, 1, 1, 1, '2017-06-01', 2, 23, '23000000.00', '12', '100000.00', 1, '0.00', '2017-06-10', 'obs'),
(11, 1, 1, 1, 1, 1, '2017-06-07', 34, 23, '23456785.00', '2', '23000.00', 1, NULL, '2017-06-10', 'siiiiii'),
(12, 1, 1, 1, 1, 1, '2017-06-06', 3, 34, '453522335.00', '43', '34000.00', 1, NULL, '2017-06-11', 'xdfsdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centrales`
--

CREATE TABLE `centrales` (
  `ID` int(10) UNSIGNED NOT NULL,
  `PARROQUIA_ID` int(10) UNSIGNED NOT NULL,
  `MUNICIPIO_ID` int(10) UNSIGNED NOT NULL,
  `ESTADO_ID` int(10) UNSIGNED NOT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `RIF` varchar(10) DEFAULT NULL,
  `DIRECCION` varchar(200) DEFAULT NULL,
  `TELEFONO_1` int(11) UNSIGNED DEFAULT NULL,
  `TELEFONO_2` int(11) UNSIGNED DEFAULT NULL,
  `ESTATUS` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `centrales`
--

INSERT INTO `centrales` (`ID`, `PARROQUIA_ID`, `MUNICIPIO_ID`, `ESTADO_ID`, `NOMBRE`, `RIF`, `DIRECCION`, `TELEFONO_1`, `TELEFONO_2`, `ESTATUS`) VALUES
(1, 1, 1, 1, 'SANTA CLARA', 'G234234234', 'LA DIRECCION', 4122342323, 2123453434, '1'),
(2, 1, 1, 1, 'Central 2', NULL, NULL, NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chofer`
--

CREATE TABLE `chofer` (
  `ID` int(10) UNSIGNED NOT NULL,
  `CEDULA` varchar(10) NOT NULL,
  `PRIMER_NOMBRE` varchar(30) NOT NULL,
  `SEGUNDO_NOMBRE` varchar(30) DEFAULT NULL,
  `PRIMER_APELLIDO` varchar(30) NOT NULL,
  `SEGUNDO_APELLIDO` varchar(30) DEFAULT NULL,
  `RIF` varchar(10) DEFAULT NULL,
  `DIRECCION` varchar(250) NOT NULL,
  `CORREO` varchar(100) DEFAULT NULL,
  `TELEFONO_1` int(10) UNSIGNED NOT NULL,
  `TELEFONO_2` int(10) UNSIGNED DEFAULT NULL,
  `FE_VENCE_CER` date DEFAULT NULL,
  `FE_VENCE_LIC` date DEFAULT NULL,
  `IMG_CEDULA` varchar(100) DEFAULT NULL,
  `IMG_LICENCIA` varchar(100) DEFAULT NULL,
  `IMG_CERTIFICADO` varchar(100) DEFAULT NULL,
  `ESTATUS` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `chofer`
--

INSERT INTO `chofer` (`ID`, `CEDULA`, `PRIMER_NOMBRE`, `SEGUNDO_NOMBRE`, `PRIMER_APELLIDO`, `SEGUNDO_APELLIDO`, `RIF`, `DIRECCION`, `CORREO`, `TELEFONO_1`, `TELEFONO_2`, `FE_VENCE_CER`, `FE_VENCE_LIC`, `IMG_CEDULA`, `IMG_LICENCIA`, `IMG_CERTIFICADO`, `ESTATUS`) VALUES
(1, '12432234', 'PEDRO', '', 'PEREZ', '', '', 'LA DIRECCION', 'CORREO@CORREO.COM', 2122345454, NULL, NULL, NULL, '', '', '', '1'),
(2, 'V12654789', 'LUIS', '', 'NEGRIN', '', '', 'OTRA DIRECCION', '', 4127658976, 4167653454, NULL, NULL, '', '', '', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conceptos`
--

CREATE TABLE `conceptos` (
  `ID` int(10) UNSIGNED NOT NULL,
  `NOMBRE` int(10) UNSIGNED DEFAULT NULL,
  `SIGNO` int(10) UNSIGNED DEFAULT NULL,
  `FORMULA` varchar(200) DEFAULT NULL,
  `ESTATUS` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE `cuentas` (
  `ID` int(10) UNSIGNED NOT NULL,
  `EMPRESA_ID` int(10) UNSIGNED NOT NULL,
  `BANCO` varchar(100) DEFAULT NULL,
  `TIPO` varchar(10) DEFAULT NULL,
  `NRO_CUENTA` int(20) UNSIGNED DEFAULT NULL,
  `CEDULA_RIF` varchar(10) DEFAULT NULL,
  `TITULAR` varchar(150) DEFAULT NULL,
  `ESTATUS` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`ID`, `EMPRESA_ID`, `BANCO`, `TIPO`, `NRO_CUENTA`, `CEDULA_RIF`, `TITULAR`, `ESTATUS`) VALUES
(1, 1, '0', '0', 4294967295, 'V123456789', 'TITULAR DE LA CUENTA', '0'),
(2, 2, '0', '0', 4294967295, 'V13088292', 'MARY CHIRINO', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribucion`
--

CREATE TABLE `distribucion` (
  `ID` int(10) UNSIGNED NOT NULL,
  `CENTRALES_ID` int(10) UNSIGNED NOT NULL,
  `CARGA_ID` int(10) UNSIGNED NOT NULL,
  `CANTIDAD` int(10) UNSIGNED NOT NULL,
  `FE_ASIGNACION` date DEFAULT NULL,
  `CANT_FLETES` int(10) UNSIGNED NOT NULL,
  `PERMISO_INSAI` varchar(20) DEFAULT NULL,
  `FE_EMISION_PI` date DEFAULT NULL,
  `DIAS_VENCE_PI` int(10) UNSIGNED DEFAULT NULL,
  `FE_VENCE_PI` date DEFAULT NULL,
  `CODIGO_SICA` int(10) UNSIGNED DEFAULT NULL,
  `CANT_DESPACHADA` int(10) UNSIGNED DEFAULT NULL,
  `OBSERVACIONES` text,
  `FE_REGISTRO` date DEFAULT NULL,
  `ESTATUS_DIS` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `distribucion`
--

INSERT INTO `distribucion` (`ID`, `CENTRALES_ID`, `CARGA_ID`, `CANTIDAD`, `FE_ASIGNACION`, `CANT_FLETES`, `PERMISO_INSAI`, `FE_EMISION_PI`, `DIAS_VENCE_PI`, `FE_VENCE_PI`, `CODIGO_SICA`, `CANT_DESPACHADA`, `OBSERVACIONES`, `FE_REGISTRO`, `ESTATUS_DIS`) VALUES
(1, 1, 1, 3008, '2017-05-31', 107, '1234', '2017-05-23', 15, '2017-05-17', 4343, NULL, 'observaciones', '2017-05-05', 1),
(2, 2, 1, 3001, '2017-06-21', 12, '123', '2017-06-02', NULL, NULL, NULL, NULL, '', NULL, NULL),
(3, 1, 2, 4000, '2017-06-13', 20, '123456', '2017-06-14', NULL, NULL, NULL, NULL, '', NULL, NULL),
(4, 2, 2, 12, '2017-06-10', 1, '12', '2017-06-07', 15, NULL, 123, NULL, 'sefsdfsdf', '2017-06-11', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `ID` int(10) UNSIGNED NOT NULL,
  `RIF` char(10) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `CERT_SUNACCOP` int(10) UNSIGNED DEFAULT NULL,
  `CERT_INPSASEL` int(10) UNSIGNED DEFAULT NULL,
  `DIRECCION` text,
  `TELEFONO_1` int(11) UNSIGNED DEFAULT NULL,
  `TELEFONO_2` int(11) UNSIGNED DEFAULT NULL,
  `CORREO` varchar(150) DEFAULT NULL,
  `ESTATUS` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`ID`, `RIF`, `NOMBRE`, `CERT_SUNACCOP`, `CERT_INPSASEL`, `DIRECCION`, `TELEFONO_1`, `TELEFONO_2`, `CORREO`, `ESTATUS`) VALUES
(1, 'J297180206', 'INVERSIONES N.S.J. ORIENTECAR, C.A.', 12345, 67890, 'LA DIRECCION', 2121234567, 2120987654, 'correo@correo.com', '1'),
(2, 'V13088292', 'Mary Chirino y Asociados', 123456, 76542321, 'esta es la direccion de la empresa', 2121234343, NULL, 'correo@correo.com', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_chofer`
--

CREATE TABLE `empresa_chofer` (
  `ID` int(10) UNSIGNED NOT NULL,
  `VEHICULO_ID` int(10) UNSIGNED NOT NULL,
  `EMPRESA_ID` int(10) UNSIGNED NOT NULL,
  `CHOFER_ID` int(10) UNSIGNED NOT NULL,
  `BLOQUEADO` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa_chofer`
--

INSERT INTO `empresa_chofer` (`ID`, `VEHICULO_ID`, `EMPRESA_ID`, `CHOFER_ID`, `BLOQUEADO`) VALUES
(1, 1, 1, 1, '1'),
(2, 2, 1, 2, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `ID` int(10) UNSIGNED NOT NULL,
  `NOMBRE` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`ID`, `NOMBRE`) VALUES
(1, 'CARABOBO'),
(2, 'VARGAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus_flete`
--

CREATE TABLE `estatus_flete` (
  `ID` int(10) UNSIGNED NOT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `ID` int(10) UNSIGNED NOT NULL,
  `CUENTAS_ID` int(10) UNSIGNED NOT NULL,
  `PAGOS_ID` int(10) UNSIGNED NOT NULL,
  `MONTO_TOTAL` decimal(20,2) DEFAULT NULL,
  `TOTAL_ANTICIPOS` decimal(20,2) DEFAULT NULL,
  `TOTAL_DESCUENTOS` decimal(20,2) DEFAULT NULL,
  `NETO_COBRAR` decimal(20,2) DEFAULT NULL,
  `ESTATUS_FAC` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flete`
--

CREATE TABLE `flete` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ESTATUS_FLETE_ID` int(10) UNSIGNED NOT NULL,
  `EMPRESA_CHOFER_ID` int(10) UNSIGNED NOT NULL,
  `VEHICULO_ID` int(10) UNSIGNED NOT NULL,
  `LISTA_ID` int(10) UNSIGNED NOT NULL,
  `GUIA_SADA` int(10) UNSIGNED DEFAULT NULL,
  `FE_EMISION_GS` date DEFAULT NULL,
  `DIAS_VENCE_GS` int(10) UNSIGNED DEFAULT NULL,
  `FE_VENCE_GS` date DEFAULT NULL,
  `ORDEN_PESO_CARGA` int(10) UNSIGNED DEFAULT NULL,
  `FE_EMISION_OPC` date DEFAULT NULL,
  `ORDEN_CARGA_CVA` int(10) UNSIGNED DEFAULT NULL,
  `FE_EMISION_OCCVA` date DEFAULT NULL,
  `ORDEN_CARGA_TQ` int(10) UNSIGNED DEFAULT NULL,
  `FE_EMISION_OCTQ` date DEFAULT NULL,
  `FE_IN_BOL` date DEFAULT NULL,
  `FE_PE_TARA_BOL` date DEFAULT NULL,
  `PESO_TARA_BOL` decimal(20,2) DEFAULT NULL,
  `FE_PE_CAR_BOL` date DEFAULT NULL,
  `PESO_CAR_BOL` decimal(20,2) DEFAULT NULL,
  `FE_OUT_BOL` date DEFAULT NULL,
  `FE_IN_CEN` date DEFAULT NULL,
  `FE_PE_CAR_CEN` date DEFAULT NULL,
  `PESO_CAR_CEN` decimal(20,2) DEFAULT NULL,
  `FE_PE_TARA_CEN` date DEFAULT NULL,
  `PE_TARA_CEN` decimal(20,2) DEFAULT NULL,
  `PESO_CARGA` decimal(20,2) DEFAULT NULL,
  `PESO_DESCARGA` decimal(20,2) DEFAULT NULL,
  `FALTANTE` decimal(20,2) DEFAULT NULL,
  `GUIA_RECEP` int(10) UNSIGNED DEFAULT NULL,
  `OBSERVACIONES` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `flete`
--

INSERT INTO `flete` (`ID`, `ESTATUS_FLETE_ID`, `EMPRESA_CHOFER_ID`, `VEHICULO_ID`, `LISTA_ID`, `GUIA_SADA`, `FE_EMISION_GS`, `DIAS_VENCE_GS`, `FE_VENCE_GS`, `ORDEN_PESO_CARGA`, `FE_EMISION_OPC`, `ORDEN_CARGA_CVA`, `FE_EMISION_OCCVA`, `ORDEN_CARGA_TQ`, `FE_EMISION_OCTQ`, `FE_IN_BOL`, `FE_PE_TARA_BOL`, `PESO_TARA_BOL`, `FE_PE_CAR_BOL`, `PESO_CAR_BOL`, `FE_OUT_BOL`, `FE_IN_CEN`, `FE_PE_CAR_CEN`, `PESO_CAR_CEN`, `FE_PE_TARA_CEN`, `PE_TARA_CEN`, `PESO_CARGA`, `PESO_DESCARGA`, `FALTANTE`, `GUIA_RECEP`, `OBSERVACIONES`) VALUES
(1, 0, 1, 1, 1, 3454, '2017-06-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 0, 2, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista`
--

CREATE TABLE `lista` (
  `ID` int(10) UNSIGNED NOT NULL,
  `DISTRIBUCION_ID` int(10) UNSIGNED NOT NULL,
  `FECHA_CREACION` int(10) UNSIGNED DEFAULT NULL,
  `ESTATUS_LISTA` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lista`
--

INSERT INTO `lista` (`ID`, `DISTRIBUCION_ID`, `FECHA_CREACION`, `ESTATUS_LISTA`) VALUES
(1, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `ID` int(10) UNSIGNED NOT NULL,
  `NOMBRE` varchar(30) DEFAULT NULL,
  `URL` varchar(100) DEFAULT NULL,
  `ESTATUS` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ESTADO_ID` int(10) UNSIGNED NOT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`ID`, `ESTADO_ID`, `NOMBRE`) VALUES
(1, 1, 'CARABOBO MUN'),
(2, 2, 'VARGAS MUN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `ID` int(10) UNSIGNED NOT NULL,
  `CONCEPTOS_ID` int(10) UNSIGNED NOT NULL,
  `FLETE_ID` int(10) UNSIGNED NOT NULL,
  `MONTO` decimal(20,2) DEFAULT NULL,
  `ESTATUS_PAGO` int(10) UNSIGNED DEFAULT NULL,
  `FE_REGISTRO` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `ID` int(10) UNSIGNED NOT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`ID`, `NOMBRE`) VALUES
(1, 'NICARAGUA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parroquia`
--

CREATE TABLE `parroquia` (
  `ID` int(10) UNSIGNED NOT NULL,
  `MUNICIPIO_ID` int(10) UNSIGNED NOT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parroquia`
--

INSERT INTO `parroquia` (`ID`, `MUNICIPIO_ID`, `NOMBRE`) VALUES
(1, 1, 'CARABOBO PARR'),
(2, 2, 'VARGAS PARR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasos`
--

CREATE TABLE `pasos` (
  `ID` int(10) UNSIGNED NOT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `ORDEN` int(10) UNSIGNED DEFAULT NULL,
  `ESTATUS` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puerto`
--

CREATE TABLE `puerto` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ESTADO_ID` int(10) UNSIGNED NOT NULL,
  `NOMBRE` varchar(150) DEFAULT NULL,
  `ESTATUS` int(10) UNSIGNED DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `puerto`
--

INSERT INTO `puerto` (`ID`, `ESTADO_ID`, `NOMBRE`, `ESTATUS`) VALUES
(1, 1, 'PUERTO CABELLO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubros`
--

CREATE TABLE `rubros` (
  `ID` int(10) UNSIGNED NOT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rubros`
--

INSERT INTO `rubros` (`ID`, `NOMBRE`) VALUES
(1, 'AZUCAR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `segflete`
--

CREATE TABLE `segflete` (
  `ID` int(10) UNSIGNED NOT NULL,
  `PASOS_ID` int(10) UNSIGNED NOT NULL,
  `FLETE_ID` int(10) UNSIGNED NOT NULL,
  `FECHA` date DEFAULT NULL,
  `PESO` int(10) UNSIGNED DEFAULT NULL,
  `OBSERVACIONES` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifas`
--

CREATE TABLE `tarifas` (
  `ID` int(10) UNSIGNED NOT NULL,
  `CONCEPTOS_ID` int(10) UNSIGNED NOT NULL,
  `CENTRALES_ID` int(10) UNSIGNED NOT NULL,
  `MONTO` decimal(20,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_carga`
--

CREATE TABLE `tipo_carga` (
  `ID` int(10) UNSIGNED NOT NULL,
  `NOMBRE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_carga`
--

INSERT INTO `tipo_carga` (`ID`, `NOMBRE`) VALUES
(1, 'NORMAL'),
(2, 'EXCEDENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(10) UNSIGNED NOT NULL,
  `USUARIO` varchar(10) NOT NULL,
  `CLAVE` varchar(50) NOT NULL,
  `PRIMER_NOMBRE` varchar(100) DEFAULT NULL,
  `SEGUNDO_NOMBRE` varchar(100) DEFAULT NULL,
  `PRIMER_APELLIDO` varchar(100) DEFAULT NULL,
  `SEGUNDO_APELLIDO` varchar(100) DEFAULT NULL,
  `CEDULA` varchar(10) DEFAULT NULL,
  `CORREO` varchar(150) DEFAULT NULL,
  `TELEFONO` int(11) UNSIGNED DEFAULT '1',
  `ESTATUS` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_modulo`
--

CREATE TABLE `usuario_modulo` (
  `ID` int(10) UNSIGNED NOT NULL,
  `USUARIO_ID` int(10) UNSIGNED NOT NULL,
  `MODULO_ID` int(10) UNSIGNED NOT NULL,
  `CONSULTA` int(1) UNSIGNED DEFAULT NULL,
  `INSERTA` int(1) UNSIGNED DEFAULT NULL,
  `ACTUALIZA` int(1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `ID` int(10) UNSIGNED NOT NULL,
  `EMPRESA_ID` int(10) UNSIGNED NOT NULL,
  `PLACA_CHUTO` varchar(10) NOT NULL,
  `MARCA` varchar(50) DEFAULT NULL,
  `MODELO` varchar(50) DEFAULT NULL,
  `SERIAL` varchar(18) NOT NULL,
  `PLACA_REMOLQUE` varchar(10) DEFAULT NULL,
  `CAPACIDAD` int(10) UNSIGNED DEFAULT NULL,
  `COLOR` varchar(50) DEFAULT NULL,
  `SROP` int(10) UNSIGNED DEFAULT NULL,
  `NRO_PRC` int(10) UNSIGNED DEFAULT NULL,
  `FE_VENCE_PRC` date DEFAULT NULL,
  `IMG_CARNET` varchar(100) DEFAULT NULL,
  `ESTATUS` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`ID`, `EMPRESA_ID`, `PLACA_CHUTO`, `MARCA`, `MODELO`, `SERIAL`, `PLACA_REMOLQUE`, `CAPACIDAD`, `COLOR`, `SROP`, `NRO_PRC`, `FE_VENCE_PRC`, `IMG_CARNET`, `ESTATUS`) VALUES
(1, 1, 'ac34523', NULL, NULL, '1234567890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(2, 1, 'SW432SD555', 'KIA', 'KIA', '12345678900', 'WS34R44', NULL, 'BLANCO', 23, 122333, '2018-09-20', NULL, '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `AUDITORIA_FKIndex1` (`USUARIO_ID`),
  ADD KEY `AUDITORIA_FKIndex2` (`MODULO_ID`);

--
-- Indices de la tabla `buque`
--
ALTER TABLE `buque`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `carga`
--
ALTER TABLE `carga`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CARGA_FKIndex1` (`BUQUE_ID`),
  ADD KEY `CARGA_FKIndex2` (`PAIS_ID`),
  ADD KEY `CARGA_FKIndex3` (`RUBROS_ID`),
  ADD KEY `CARGA_FKIndex4` (`PUERTO_ID`),
  ADD KEY `CARGA_FKIndex5` (`TIPO_CARGA_ID`);

--
-- Indices de la tabla `centrales`
--
ALTER TABLE `centrales`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CENTRALES_FKIndex1` (`ESTADO_ID`),
  ADD KEY `CENTRALES_FKIndex2` (`MUNICIPIO_ID`),
  ADD KEY `CENTRALES_FKIndex3` (`PARROQUIA_ID`);

--
-- Indices de la tabla `chofer`
--
ALTER TABLE `chofer`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CUENTAS_FKIndex1` (`EMPRESA_ID`);

--
-- Indices de la tabla `distribucion`
--
ALTER TABLE `distribucion`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `DISTRIBUCION_FKIndex1` (`CARGA_ID`),
  ADD KEY `DISTRIBUCION_FKIndex2` (`CENTRALES_ID`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `empresa_chofer`
--
ALTER TABLE `empresa_chofer`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EMPRESA_CHOFER_FKIndex1` (`CHOFER_ID`),
  ADD KEY `EMPRESA_CHOFER_FKIndex2` (`EMPRESA_ID`),
  ADD KEY `EMPRESA_CHOFER_FKIndex3` (`VEHICULO_ID`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `estatus_flete`
--
ALTER TABLE `estatus_flete`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FACTURA_FKIndex1` (`PAGOS_ID`),
  ADD KEY `FACTURA_FKIndex2` (`CUENTAS_ID`);

--
-- Indices de la tabla `flete`
--
ALTER TABLE `flete`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `DETALLE_TRANSPORTES_FKIndex1` (`LISTA_ID`),
  ADD KEY `DETALLE_TRANSPORTES_FKIndex2` (`VEHICULO_ID`),
  ADD KEY `DETALLE_TRANSPORTES_FKIndex3` (`EMPRESA_CHOFER_ID`),
  ADD KEY `FLETE_FKIndex4` (`ESTATUS_FLETE_ID`);

--
-- Indices de la tabla `lista`
--
ALTER TABLE `lista`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `LISTA_VIAJE_FKIndex1` (`DISTRIBUCION_ID`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MUNICIPIO_FKIndex1` (`ESTADO_ID`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PAGOS_FKIndex1` (`FLETE_ID`),
  ADD KEY `PAGOS_FKIndex2` (`CONCEPTOS_ID`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `parroquia`
--
ALTER TABLE `parroquia`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PARROQUIA_FKIndex1` (`MUNICIPIO_ID`);

--
-- Indices de la tabla `pasos`
--
ALTER TABLE `pasos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `puerto`
--
ALTER TABLE `puerto`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PUERTO_FKIndex1` (`ESTADO_ID`);

--
-- Indices de la tabla `rubros`
--
ALTER TABLE `rubros`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `segflete`
--
ALTER TABLE `segflete`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MOV_FLETE_FKIndex1` (`FLETE_ID`),
  ADD KEY `SEG_FLETE_FKIndex2` (`PASOS_ID`);

--
-- Indices de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TARIFAS_FKIndex1` (`CENTRALES_ID`),
  ADD KEY `TARIFAS_FKIndex2` (`CONCEPTOS_ID`);

--
-- Indices de la tabla `tipo_carga`
--
ALTER TABLE `tipo_carga`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuario_modulo`
--
ALTER TABLE `usuario_modulo`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `USUARIO_MODULO_FKIndex1` (`MODULO_ID`),
  ADD KEY `USUARIO_MODULO_FKIndex2` (`USUARIO_ID`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `VEHICULO_FKIndex1` (`EMPRESA_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `buque`
--
ALTER TABLE `buque`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `carga`
--
ALTER TABLE `carga`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `centrales`
--
ALTER TABLE `centrales`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `chofer`
--
ALTER TABLE `chofer`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `distribucion`
--
ALTER TABLE `distribucion`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `empresa_chofer`
--
ALTER TABLE `empresa_chofer`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `estatus_flete`
--
ALTER TABLE `estatus_flete`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `flete`
--
ALTER TABLE `flete`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `lista`
--
ALTER TABLE `lista`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `parroquia`
--
ALTER TABLE `parroquia`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pasos`
--
ALTER TABLE `pasos`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `puerto`
--
ALTER TABLE `puerto`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `rubros`
--
ALTER TABLE `rubros`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `segflete`
--
ALTER TABLE `segflete`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_carga`
--
ALTER TABLE `tipo_carga`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario_modulo`
--
ALTER TABLE `usuario_modulo`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD CONSTRAINT `auditoria_ibfk_1` FOREIGN KEY (`USUARIO_ID`) REFERENCES `usuario` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `auditoria_ibfk_2` FOREIGN KEY (`MODULO_ID`) REFERENCES `modulo` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `carga`
--
ALTER TABLE `carga`
  ADD CONSTRAINT `carga_ibfk_1` FOREIGN KEY (`BUQUE_ID`) REFERENCES `buque` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `carga_ibfk_2` FOREIGN KEY (`PAIS_ID`) REFERENCES `pais` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `carga_ibfk_3` FOREIGN KEY (`RUBROS_ID`) REFERENCES `rubros` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `carga_ibfk_4` FOREIGN KEY (`PUERTO_ID`) REFERENCES `puerto` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `carga_ibfk_5` FOREIGN KEY (`TIPO_CARGA_ID`) REFERENCES `tipo_carga` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `centrales`
--
ALTER TABLE `centrales`
  ADD CONSTRAINT `centrales_ibfk_1` FOREIGN KEY (`ESTADO_ID`) REFERENCES `estado` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `centrales_ibfk_2` FOREIGN KEY (`MUNICIPIO_ID`) REFERENCES `municipio` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `centrales_ibfk_3` FOREIGN KEY (`PARROQUIA_ID`) REFERENCES `parroquia` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD CONSTRAINT `cuentas_ibfk_1` FOREIGN KEY (`EMPRESA_ID`) REFERENCES `empresa` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `distribucion`
--
ALTER TABLE `distribucion`
  ADD CONSTRAINT `distribucion_ibfk_1` FOREIGN KEY (`CARGA_ID`) REFERENCES `carga` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `distribucion_ibfk_2` FOREIGN KEY (`CENTRALES_ID`) REFERENCES `centrales` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empresa_chofer`
--
ALTER TABLE `empresa_chofer`
  ADD CONSTRAINT `empresa_chofer_ibfk_1` FOREIGN KEY (`CHOFER_ID`) REFERENCES `chofer` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `empresa_chofer_ibfk_2` FOREIGN KEY (`EMPRESA_ID`) REFERENCES `empresa` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `empresa_chofer_ibfk_3` FOREIGN KEY (`VEHICULO_ID`) REFERENCES `vehiculo` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`PAGOS_ID`) REFERENCES `pagos` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`CUENTAS_ID`) REFERENCES `cuentas` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `flete`
--
ALTER TABLE `flete`
  ADD CONSTRAINT `flete_ibfk_1` FOREIGN KEY (`LISTA_ID`) REFERENCES `lista` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `flete_ibfk_2` FOREIGN KEY (`VEHICULO_ID`) REFERENCES `vehiculo` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `flete_ibfk_3` FOREIGN KEY (`EMPRESA_CHOFER_ID`) REFERENCES `empresa_chofer` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `lista`
--
ALTER TABLE `lista`
  ADD CONSTRAINT `lista_ibfk_1` FOREIGN KEY (`DISTRIBUCION_ID`) REFERENCES `distribucion` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`ESTADO_ID`) REFERENCES `estado` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`FLETE_ID`) REFERENCES `flete` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pagos_ibfk_2` FOREIGN KEY (`CONCEPTOS_ID`) REFERENCES `conceptos` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `parroquia`
--
ALTER TABLE `parroquia`
  ADD CONSTRAINT `parroquia_ibfk_1` FOREIGN KEY (`MUNICIPIO_ID`) REFERENCES `municipio` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `puerto`
--
ALTER TABLE `puerto`
  ADD CONSTRAINT `puerto_ibfk_1` FOREIGN KEY (`ESTADO_ID`) REFERENCES `estado` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `segflete`
--
ALTER TABLE `segflete`
  ADD CONSTRAINT `segflete_ibfk_1` FOREIGN KEY (`FLETE_ID`) REFERENCES `flete` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `segflete_ibfk_2` FOREIGN KEY (`PASOS_ID`) REFERENCES `pasos` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tarifas`
--
ALTER TABLE `tarifas`
  ADD CONSTRAINT `tarifas_ibfk_1` FOREIGN KEY (`CENTRALES_ID`) REFERENCES `centrales` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tarifas_ibfk_2` FOREIGN KEY (`CONCEPTOS_ID`) REFERENCES `conceptos` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_modulo`
--
ALTER TABLE `usuario_modulo`
  ADD CONSTRAINT `usuario_modulo_ibfk_1` FOREIGN KEY (`MODULO_ID`) REFERENCES `modulo` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuario_modulo_ibfk_2` FOREIGN KEY (`USUARIO_ID`) REFERENCES `usuario` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`EMPRESA_ID`) REFERENCES `empresa` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
