-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2023 a las 03:02:35
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sexshoplujuria`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `PRegTblBitacora` (`valdesc` VARCHAR(50))   begin
insert into tlb_bitacora_cliente values(fconsetlb_bitacora_cliente(),current_user(),now(),valdesc);
end$$

--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `fconsetlb_bitacora_cliente` () RETURNS INT(11)  begin
declare contador int;
select max(bitcod) into contador from tlb_bitacora_cliente;
return contador+1;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fcontlb_cliente` () RETURNS INT(11)  begin
declare contador int;
select max(cliente_id) into contador from tlb_cliente;
return contador+1;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tlb_bitacora_cliente`
--

CREATE TABLE `tlb_bitacora_cliente` (
  `bitcod` int(11) NOT NULL,
  `bituser` varchar(30) DEFAULT NULL,
  `bitfecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bitdesc` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tlb_bitacora_cliente`
--

INSERT INTO `tlb_bitacora_cliente` (`bitcod`, `bituser`, `bitfecha`, `bitdesc`) VALUES
(1, 'root@localhost', '2023-05-16 11:08:53', 'prueba'),
(2, 'root@localhost', '2023-05-16 11:11:45', 'prueba 2'),
(3, 'root@localhost', '2023-05-16 11:19:24', 'Otra Prueba'),
(4, 'root@localhost', '2023-05-16 11:26:17', 'Otro Valor'),
(5, 'root@localhost', '2023-05-16 14:54:28', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tlb_cliente`
--

CREATE TABLE `tlb_cliente` (
  `cliente_id` int(11) NOT NULL,
  `cliente_nombres` varchar(30) DEFAULT NULL,
  `cliente_apellidos` varchar(40) DEFAULT NULL,
  `cliente_fecha_nacimiento` date DEFAULT NULL,
  `cliente_correo` varchar(40) DEFAULT NULL,
  `cliente_telefono` int(11) DEFAULT NULL,
  `cliente_departamento` varchar(30) DEFAULT NULL,
  `cliente_ciudad` varchar(30) DEFAULT NULL,
  `cliente_direccion` varchar(50) DEFAULT NULL,
  `cliente_identificacion_opcional` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tlb_cliente`
--

INSERT INTO `tlb_cliente` (`cliente_id`, `cliente_nombres`, `cliente_apellidos`, `cliente_fecha_nacimiento`, `cliente_correo`, `cliente_telefono`, `cliente_departamento`, `cliente_ciudad`, `cliente_direccion`, `cliente_identificacion_opcional`) VALUES
(1, 'James', 'Sanchez', '0000-00-00', 'jjsanchez_castano@hotmail.com', 2147483647, 'Antioquia', 'Rionegro', 'calle 27 #33-22', 1111753890),
(2, 'Paola', 'Situ', '1991-01-21', 'paositu@hotmail.com', 2147483647, 'Antioquia', 'Carmen de viboral', 'carrera 27 #33-22', 11111648),
(3, 'esteban', 'sanchez', '2009-04-29', 'estebansanchez@hotmail.com', 2147483647, 'Antioquia', 'Carmen de viboral', 'carrera 27 #33-22', 111336566);

--
-- Disparadores `tlb_cliente`
--
DELIMITER $$
CREATE TRIGGER `TrTID_AI` AFTER INSERT ON `tlb_cliente` FOR EACH ROW begin
call pregtblbitacora(NEW.cliente_id);
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tlb_factura`
--

CREATE TABLE `tlb_factura` (
  `fac_id` int(11) NOT NULL,
  `fac_valor` int(11) DEFAULT NULL,
  `ped_id` int(11) DEFAULT NULL,
  `pag_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tlb_pago`
--

CREATE TABLE `tlb_pago` (
  `pag_id` int(11) NOT NULL,
  `pag_medio_de_pago` varchar(50) DEFAULT NULL,
  `pag_valor` int(11) DEFAULT NULL,
  `ped_id` int(11) DEFAULT NULL,
  `fac_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tlb_pedido`
--

CREATE TABLE `tlb_pedido` (
  `ped_id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tlb_producto`
--

CREATE TABLE `tlb_producto` (
  `producto_id` int(11) NOT NULL,
  `producto_nombre` varchar(30) DEFAULT NULL,
  `producto_descripcion` varchar(500) DEFAULT NULL,
  `producto_componenetes` varchar(300) DEFAULT NULL,
  `producto_modo_uso` varchar(500) DEFAULT NULL,
  `producto_precauciones` varchar(500) DEFAULT NULL,
  `producto_precio_venta` int(11) DEFAULT NULL,
  `producto_cantidad` tinyint(4) DEFAULT NULL,
  `producto_imagen` blob DEFAULT NULL,
  `ped_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tlb_producto_pedido`
--

CREATE TABLE `tlb_producto_pedido` (
  `producto_pedido` int(11) NOT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `pedido_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tlb_producto_proveedor`
--

CREATE TABLE `tlb_producto_proveedor` (
  `producto_proveedor` int(11) NOT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `prov_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tlb_proveedor`
--

CREATE TABLE `tlb_proveedor` (
  `prov_id` int(11) NOT NULL,
  `prov_nombre` varchar(40) DEFAULT NULL,
  `prov_correo` varchar(50) DEFAULT NULL,
  `prov_telefono` int(11) DEFAULT NULL,
  `prov_direccion` varchar(50) DEFAULT NULL,
  `prov_precio_compra` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tlb_bitacora_cliente`
--
ALTER TABLE `tlb_bitacora_cliente`
  ADD PRIMARY KEY (`bitcod`);

--
-- Indices de la tabla `tlb_cliente`
--
ALTER TABLE `tlb_cliente`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Indices de la tabla `tlb_factura`
--
ALTER TABLE `tlb_factura`
  ADD PRIMARY KEY (`fac_id`),
  ADD KEY `ped_id` (`ped_id`),
  ADD KEY `pag_id` (`pag_id`);

--
-- Indices de la tabla `tlb_pago`
--
ALTER TABLE `tlb_pago`
  ADD PRIMARY KEY (`pag_id`),
  ADD KEY `ped_id` (`ped_id`),
  ADD KEY `fac_id` (`fac_id`);

--
-- Indices de la tabla `tlb_pedido`
--
ALTER TABLE `tlb_pedido`
  ADD PRIMARY KEY (`ped_id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indices de la tabla `tlb_producto`
--
ALTER TABLE `tlb_producto`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `ped_id` (`ped_id`);

--
-- Indices de la tabla `tlb_producto_pedido`
--
ALTER TABLE `tlb_producto_pedido`
  ADD PRIMARY KEY (`producto_pedido`),
  ADD KEY `producto_id` (`producto_id`),
  ADD KEY `pedido_id` (`pedido_id`);

--
-- Indices de la tabla `tlb_producto_proveedor`
--
ALTER TABLE `tlb_producto_proveedor`
  ADD PRIMARY KEY (`producto_proveedor`),
  ADD KEY `producto_id` (`producto_id`),
  ADD KEY `prov_id` (`prov_id`);

--
-- Indices de la tabla `tlb_proveedor`
--
ALTER TABLE `tlb_proveedor`
  ADD PRIMARY KEY (`prov_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tlb_factura`
--
ALTER TABLE `tlb_factura`
  ADD CONSTRAINT `tlb_factura_ibfk_1` FOREIGN KEY (`ped_id`) REFERENCES `tlb_pedido` (`ped_id`),
  ADD CONSTRAINT `tlb_factura_ibfk_2` FOREIGN KEY (`pag_id`) REFERENCES `tlb_pago` (`pag_id`);

--
-- Filtros para la tabla `tlb_pago`
--
ALTER TABLE `tlb_pago`
  ADD CONSTRAINT `tlb_pago_ibfk_1` FOREIGN KEY (`ped_id`) REFERENCES `tlb_pedido` (`ped_id`),
  ADD CONSTRAINT `tlb_pago_ibfk_2` FOREIGN KEY (`fac_id`) REFERENCES `tlb_factura` (`fac_id`);

--
-- Filtros para la tabla `tlb_pedido`
--
ALTER TABLE `tlb_pedido`
  ADD CONSTRAINT `tlb_pedido_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `tlb_cliente` (`cliente_id`);

--
-- Filtros para la tabla `tlb_producto`
--
ALTER TABLE `tlb_producto`
  ADD CONSTRAINT `tlb_producto_ibfk_1` FOREIGN KEY (`ped_id`) REFERENCES `tlb_pedido` (`ped_id`);

--
-- Filtros para la tabla `tlb_producto_pedido`
--
ALTER TABLE `tlb_producto_pedido`
  ADD CONSTRAINT `tlb_producto_pedido_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `tlb_producto` (`producto_id`),
  ADD CONSTRAINT `tlb_producto_pedido_ibfk_2` FOREIGN KEY (`pedido_id`) REFERENCES `tlb_pedido` (`ped_id`);

--
-- Filtros para la tabla `tlb_producto_proveedor`
--
ALTER TABLE `tlb_producto_proveedor`
  ADD CONSTRAINT `tlb_producto_proveedor_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `tlb_producto` (`producto_id`),
  ADD CONSTRAINT `tlb_producto_proveedor_ibfk_2` FOREIGN KEY (`prov_id`) REFERENCES `tlb_proveedor` (`prov_id`);

--
-- Filtros para la tabla `tlb_proveedor`
--
ALTER TABLE `tlb_proveedor`
  ADD CONSTRAINT `tlb_proveedor_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `tlb_producto` (`producto_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
