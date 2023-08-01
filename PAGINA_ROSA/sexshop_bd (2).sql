-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-08-2023 a las 02:30:19
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
-- Base de datos: `sexshop_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `categoria_id` int(7) NOT NULL,
  `categoria_nombre` varchar(50) NOT NULL,
  `categoria_ubicacion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tlb_clientes`
--

CREATE TABLE `tlb_clientes` (
  `cliente_id` int(11) NOT NULL,
  `cliente_nombre` varchar(30) NOT NULL,
  `cliente_correo` varchar(30) NOT NULL,
  `cliente_telefono` varchar(30) NOT NULL,
  `cliente_usuario` varchar(30) NOT NULL,
  `cliente_contrasena` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tlb_clientes`
--

INSERT INTO `tlb_clientes` (`cliente_id`, `cliente_nombre`, `cliente_correo`, `cliente_telefono`, `cliente_usuario`, `cliente_contrasena`) VALUES
(19, 'aas', 'administrador@gmail.com', '45546644', 'ffgg', 'e79afc434330a68f54a9b6a5eee2a655558b5dc8740a86e0344a1a2baecf98570b022311c2d3506826ee1923fd8652a7f6f91e1bbc28d9ed46ff48e64e192e1b');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tlb_detalle_ventas`
--

CREATE TABLE `tlb_detalle_ventas` (
  `detalle_venta_id` int(11) NOT NULL,
  `detalle_idventa` int(11) NOT NULL,
  `detalle_id_producto` int(11) NOT NULL,
  `detalle_precio_unitario` decimal(20,2) NOT NULL,
  `detalle_cantidad` int(11) NOT NULL,
  `detalle_descargado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tlb_producto`
--

CREATE TABLE `tlb_producto` (
  `producto_id` int(11) NOT NULL,
  `producto_nombre` varchar(30) DEFAULT NULL,
  `producto_descripcion` varchar(100) DEFAULT NULL,
  `producto_componenetes` varchar(300) DEFAULT NULL,
  `producto_modo_uso` varchar(500) DEFAULT NULL,
  `producto_precauciones` varchar(500) DEFAULT NULL,
  `producto_precio_compra` int(11) DEFAULT NULL,
  `producto_precio_venta` int(11) DEFAULT NULL,
  `producto_cantidad` tinyint(4) DEFAULT NULL,
  `producto_tipo` varchar(30) DEFAULT NULL,
  `producto_oferta` varchar(30) DEFAULT NULL,
  `producto_imagen` blob DEFAULT NULL,
  `producto_imagen_2` blob DEFAULT NULL,
  `producto_imagen_3` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tlb_producto`
--

INSERT INTO `tlb_producto` (`producto_id`, `producto_nombre`, `producto_descripcion`, `producto_componenetes`, `producto_modo_uso`, `producto_precauciones`, `producto_precio_compra`, `producto_precio_venta`, `producto_cantidad`, `producto_tipo`, `producto_oferta`, `producto_imagen`, `producto_imagen_2`, `producto_imagen_3`) VALUES
(4664, 'asdsadasd', '', '', '', '', 0, 0, 0, '11', 'lo_mas_vendido', 0x313639303833323437345f45426b6a4a3930585941456f5675392e6a7067, 0x696d6167656e2e6a7067, 0x696d6167656e2e6a7067),
(43335, 'dasdad', 'dddddddddddddddddddddddddddddddd', '', '', '', 0, 444, 44, '11', 'lo_mas_vendido', 0x313639303834373937325f32353133393038365f3331313032313530323734363134315f32323636383038345f6f2e706e67, 0x696d6167656e2e6a7067, 0x696d6167656e2e6a7067),
(68768, 'aaaaaaaaaaaaaa', 'gdfg', '', '', '', 0, 65465, 127, 'sin_clasificar', 'ninguna', 0x313639303833343730375f44657363617267617220666f6e646f20726f6a6f207920726f73612c206865726d6f736f207920656c6567616e746520666f6e646f2064652074657874757261206d6f6465726e6120636f6e2068756d6f2c20766563746f722c20696c75737472616369c3b36e206772617469732e6a666966, 0x696d6167656e2e6a7067, 0x696d6167656e2e6a7067);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tlb_usuario_admin`
--

CREATE TABLE `tlb_usuario_admin` (
  `usuario_admin_id` int(11) NOT NULL,
  `usuario_admin` varchar(30) NOT NULL,
  `usuario_admin_contrasena` varchar(30) NOT NULL,
  `usuario_admin_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tlb_usuario_admin`
--

INSERT INTO `tlb_usuario_admin` (`usuario_admin_id`, `usuario_admin`, `usuario_admin_contrasena`, `usuario_admin_nombre`) VALUES
(1, 'administrador', 'sexshop', 'John James Sanchez'),
(3, 'maiqui', '123', 'maqui');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tlb_ventas`
--

CREATE TABLE `tlb_ventas` (
  `venta_id` int(11) NOT NULL,
  `venta_clavetransaccion` varchar(250) NOT NULL,
  `venta_paypaldatos` text NOT NULL,
  `venta_fecha` datetime NOT NULL,
  `venta_correo` varchar(5000) NOT NULL,
  `venta_total` decimal(60,2) NOT NULL,
  `venta_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tlb_ventas`
--

INSERT INTO `tlb_ventas` (`venta_id`, `venta_clavetransaccion`, `venta_paypaldatos`, `venta_fecha`, `venta_correo`, `venta_total`, `venta_status`) VALUES
(32, 'bekodjnif29718etnu9oqio2hg', '', '2023-07-20 18:58:28', 'administrador@gmail.com', 234243.00, 'pago'),
(33, 'bekodjnif29718etnu9oqio2hg', '', '2023-07-20 19:00:29', 'administrador@gmail.com', 343.00, 'pago'),
(34, 'bekodjnif29718etnu9oqio2hg', '', '2023-07-20 19:05:37', 'administrador@gmail.com', 234586.00, 'pago'),
(35, 'bekodjnif29718etnu9oqio2hg', '', '2023-07-20 19:08:57', 'administrador@gmail.com', 234586.00, 'pago'),
(36, 'bekodjnif29718etnu9oqio2hg', '', '2023-07-20 19:09:50', 'administrador@gmail.com', 234586.00, 'pago'),
(37, 'bekodjnif29718etnu9oqio2hg', '', '2023-07-20 19:18:36', 'administrador@gmail.com', 234586.00, 'pago'),
(38, 'bekodjnif29718etnu9oqio2hg', '', '2023-07-20 19:20:07', 'administrador@gmail.com', 558820.00, 'pago'),
(39, 'bekodjnif29718etnu9oqio2hg', '', '2023-07-20 19:20:29', 'administrador@gmail.com', 558820.00, 'pago'),
(40, 'bekodjnif29718etnu9oqio2hg', '', '2023-07-20 19:21:42', 'administrador@gmail.com', 558820.00, 'pago'),
(41, 'bekodjnif29718etnu9oqio2hg', '', '2023-07-20 19:23:21', 'administrador@gmail.com', 558820.00, 'pago'),
(42, 'bekodjnif29718etnu9oqio2hg', '', '2023-07-20 19:25:24', 'administrador@gmail.com', 558820.00, 'pago'),
(43, 'bekodjnif29718etnu9oqio2hg', '', '2023-07-20 19:32:53', 'administrador@gmail.com', 558820.00, 'pago'),
(44, 'bekodjnif29718etnu9oqio2hg', '', '2023-07-20 19:37:53', 'administrador@gmail.com', 558820.00, 'pago'),
(45, 'bekodjnif29718etnu9oqio2hg', '', '2023-07-20 19:38:39', 'administrador@gmail.com', 558820.00, 'pago'),
(46, 'bekodjnif29718etnu9oqio2hg', '', '2023-07-20 19:40:20', 'administrador@gmail.com', 558820.00, 'pago'),
(47, 'bekodjnif29718etnu9oqio2hg', '', '2023-07-20 19:41:56', 'administrador@gmail.com', 558820.00, 'pago'),
(48, 'b5apklsckji0ac4pcnl5n36psd', '', '2023-07-20 19:44:59', 'administrador@gmail.com', 469858.00, 'pago'),
(49, 'b5apklsckji0ac4pcnl5n36psd', '', '2023-07-20 19:48:38', 'administrador@gmail.com', 469858.00, 'pago'),
(50, 'b5apklsckji0ac4pcnl5n36psd', '', '2023-07-20 21:45:31', 'administrador@gmail.com', 469858.00, 'pago'),
(51, 'c6ebasi24g2s986t7iud38an2r', '', '2023-07-21 18:45:55', 'administrador@gmail.com', 343.00, 'pago'),
(52, '1ihcr6v98u26j1mnubruuejh3t', '', '2023-07-23 12:32:13', 'administrador@gmail.com', 234243.00, 'pago'),
(53, 'f5c1h3b4ptn809obf4a7jev5op', '', '2023-07-23 16:32:44', 'administrador@gmail.com', 3445534.00, 'pago'),
(54, 'f5c1h3b4ptn809obf4a7jev5op', '', '2023-07-23 16:36:17', 'administrador@gmail.com', 3445534.00, 'pago'),
(55, 'gllhcpc72n4frurroqr53rd5qn', '', '2023-07-23 16:40:59', 'administrador@gmail.com', 3445534.00, 'pago'),
(56, 'gllhcpc72n4frurroqr53rd5qn', '', '2023-07-23 16:54:35', 'administrador@gmail.com', 3445534.00, 'pago'),
(57, 'gllhcpc72n4frurroqr53rd5qn', '', '2023-07-23 17:04:05', 'administrador@gmail.com', 3445534.00, 'pago'),
(58, 'nnfbb8qherh1o1le6ja1vspcuo', '', '2023-07-23 17:04:41', 'administrador@gmail.com', 3445534.00, 'pago'),
(59, '58oh416trvjc14s6q8mcjfgbi1', '', '2023-07-23 17:08:07', 'administrador@gmail.com', 3680120.00, 'pago'),
(60, '58oh416trvjc14s6q8mcjfgbi1', '', '2023-07-23 17:08:38', 'administrador@gmail.com', 3680120.00, 'pago'),
(61, '58oh416trvjc14s6q8mcjfgbi1', '', '2023-07-23 17:09:24', 'administrador@gmail.com', 3680120.00, 'pago'),
(62, '58oh416trvjc14s6q8mcjfgbi1', '', '2023-07-23 17:10:19', 'administrador@gmail.com', 877887.00, 'pago'),
(63, 'nnfbb8qherh1o1le6ja1vspcuo', '', '2023-07-23 17:13:16', 'administrador@gmail.com', 3445534.00, 'pago'),
(64, 'nnfbb8qherh1o1le6ja1vspcuo', '', '2023-07-23 17:14:09', 'administrador@gmail.com', 23.00, 'pago'),
(65, 'nnfbb8qherh1o1le6ja1vspcuo', '', '2023-07-23 17:15:30', 'administrador@gmail.com', 23.00, 'pago'),
(66, 'nnfbb8qherh1o1le6ja1vspcuo', '', '2023-07-23 17:17:11', 'administrador@gmail.com', 23.00, 'pago'),
(67, 'nnfbb8qherh1o1le6ja1vspcuo', '', '2023-07-23 17:17:42', 'administrador@gmail.com', 23.00, 'pago'),
(68, 'nnfbb8qherh1o1le6ja1vspcuo', '', '2023-07-23 17:19:23', 'administrador@gmail.com', 23.00, 'pago'),
(69, 'nnfbb8qherh1o1le6ja1vspcuo', '', '2023-07-23 17:22:20', 'administrador@gmail.com', 23.00, 'pago'),
(70, 'nnfbb8qherh1o1le6ja1vspcuo', '', '2023-07-23 17:22:50', 'administrador@gmail.com', 23.00, 'pago'),
(71, 'nnfbb8qherh1o1le6ja1vspcuo', '', '2023-07-23 17:28:32', 'administrador@gmail.com', 23.00, 'pago'),
(72, 'nnfbb8qherh1o1le6ja1vspcuo', '', '2023-07-23 17:29:27', 'administrador@gmail.com', 23.00, 'pago'),
(73, 'nnfbb8qherh1o1le6ja1vspcuo', '', '2023-07-23 17:52:59', 'administrador@gmail.com', 23.00, 'pago'),
(74, 'nnfbb8qherh1o1le6ja1vspcuo', '', '2023-07-23 18:07:29', 'administrador@gmail.com', 23.00, 'pago'),
(75, 'nnfbb8qherh1o1le6ja1vspcuo', '', '2023-07-23 18:08:38', 'administrador@gmail.com', 23.00, 'pago'),
(76, 'nnfbb8qherh1o1le6ja1vspcuo', '', '2023-07-23 18:09:27', 'administrador@gmail.com', 23.00, 'pago'),
(77, 'nnfbb8qherh1o1le6ja1vspcuo', '', '2023-07-23 18:10:06', 'administrador@gmail.com', 23.00, 'pago'),
(78, 'nnfbb8qherh1o1le6ja1vspcuo', '', '2023-07-23 18:12:03', 'administrador@gmail.com', 23.00, 'pago'),
(79, 'nnfbb8qherh1o1le6ja1vspcuo', '', '2023-07-23 18:20:52', 'administrador@gmail.com', 23.00, 'pago'),
(80, 'nnfbb8qherh1o1le6ja1vspcuo', '', '2023-07-23 18:22:26', 'administrador@gmail.com', 23.00, 'pago'),
(81, 'nnfbb8qherh1o1le6ja1vspcuo', '', '2023-07-23 18:24:38', 'administrador@gmail.com', 23.00, 'pago'),
(82, 'nnfbb8qherh1o1le6ja1vspcuo', '', '2023-07-23 18:25:42', 'administrador@gmail.com', 23.00, 'pago'),
(83, 'nnfbb8qherh1o1le6ja1vspcuo', '', '2023-07-23 18:34:49', 'administrador@gmail.com', 23.00, 'pago'),
(84, 'nnfbb8qherh1o1le6ja1vspcuo', '', '2023-07-23 18:37:30', 'administrador@gmail.com', 23.00, 'pago'),
(85, 'nnfbb8qherh1o1le6ja1vspcuo', '', '2023-07-23 18:38:32', 'administrador@gmail.com', 23.00, 'pago'),
(86, 'nnfbb8qherh1o1le6ja1vspcuo', '', '2023-07-23 18:40:04', 'administrador@gmail.com', 23.00, 'pago'),
(87, 'nnfbb8qherh1o1le6ja1vspcuo', '', '2023-07-23 18:40:43', 'administrador@gmail.com', 23.00, 'pago'),
(88, 'nnfbb8qherh1o1le6ja1vspcuo', '', '2023-07-23 18:43:04', 'administrador@gmail.com', 23.00, 'pago'),
(89, '4tgpmbnjmke7rdr60f6kugiblq', '', '2023-07-24 21:49:22', 'administrador@gmail.com', 0.00, 'pago'),
(90, '4tgpmbnjmke7rdr60f6kugiblq', '', '2023-07-24 21:50:11', 'administrador@gmail.com', 333.00, 'pago'),
(91, '8s99pd6ia2vsm34m7ea6dnocff', '', '2023-07-26 13:20:55', 'administrador@gmail.com', 898989.00, 'pago'),
(92, 'aml55kkg8f61rm48ggl9hhp2aj', '', '2023-07-30 16:29:55', 'administrador@gmail.com', 33232230.00, 'pago'),
(93, 'aml55kkg8f61rm48ggl9hhp2aj', '', '2023-07-30 16:30:22', 'administrador@gmail.com', 33232230.00, 'pago'),
(94, 'aml55kkg8f61rm48ggl9hhp2aj', '', '2023-07-30 16:30:31', 'administrador@gmail.com', 33232230.00, 'pago'),
(95, 'aml55kkg8f61rm48ggl9hhp2aj', '', '2023-07-30 16:30:42', 'administrador@gmail.com', 33232230.00, 'pago'),
(96, '3vl605s2uccv17h6r67v4j5ssm', '', '2023-07-30 16:32:19', 'administrador@gmail.com', 33232230.00, 'pago'),
(97, '58oh416trvjc14s6q8mcjfgbi1', '', '2023-07-30 16:33:03', 'administrador@gmail.com', 33232230.00, 'pago'),
(98, '58oh416trvjc14s6q8mcjfgbi1', '', '2023-07-30 16:48:17', 'administrador@gmail.com', 66464460.00, 'pago'),
(99, '58oh416trvjc14s6q8mcjfgbi1', '', '2023-07-30 16:52:04', 'administrador@gmail.com', 66464460.00, 'pago'),
(100, '56h5jvm3hilke9khqnkg5ok4hv', '', '2023-07-30 16:54:29', 'administrador@gmail.com', 6646446.00, 'pago'),
(101, '58oh416trvjc14s6q8mcjfgbi1', '', '2023-07-31 13:02:20', 'administrador@gmail.com', 66464460.00, 'pago'),
(102, 'r8r29git5edtvaermjh43icn85', '', '2023-07-31 13:02:47', 'administrador@gmail.com', 6646446.00, 'pago'),
(103, 'nc43s4d7eh3dn5opivp2aschok', '', '2023-07-31 13:05:55', 'administrador@gmail.com', 6646446.00, 'pago'),
(104, 'nc43s4d7eh3dn5opivp2aschok', '', '2023-07-31 13:07:30', 'administrador@gmail.com', 12.00, 'pago'),
(105, 'nc43s4d7eh3dn5opivp2aschok', '', '2023-07-31 13:07:47', 'administrador@gmail.com', 12.00, 'pago');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `tlb_clientes`
--
ALTER TABLE `tlb_clientes`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Indices de la tabla `tlb_detalle_ventas`
--
ALTER TABLE `tlb_detalle_ventas`
  ADD PRIMARY KEY (`detalle_venta_id`),
  ADD KEY `detalle_idventa` (`detalle_idventa`),
  ADD KEY `detalle_id_producto` (`detalle_id_producto`);

--
-- Indices de la tabla `tlb_producto`
--
ALTER TABLE `tlb_producto`
  ADD PRIMARY KEY (`producto_id`);

--
-- Indices de la tabla `tlb_usuario_admin`
--
ALTER TABLE `tlb_usuario_admin`
  ADD PRIMARY KEY (`usuario_admin_id`);

--
-- Indices de la tabla `tlb_ventas`
--
ALTER TABLE `tlb_ventas`
  ADD PRIMARY KEY (`venta_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `categoria_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tlb_clientes`
--
ALTER TABLE `tlb_clientes`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tlb_detalle_ventas`
--
ALTER TABLE `tlb_detalle_ventas`
  MODIFY `detalle_venta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT de la tabla `tlb_usuario_admin`
--
ALTER TABLE `tlb_usuario_admin`
  MODIFY `usuario_admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tlb_ventas`
--
ALTER TABLE `tlb_ventas`
  MODIFY `venta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tlb_detalle_ventas`
--
ALTER TABLE `tlb_detalle_ventas`
  ADD CONSTRAINT `tlb_detalle_ventas_ibfk_1` FOREIGN KEY (`detalle_idventa`) REFERENCES `tlb_ventas` (`venta_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tlb_detalle_ventas_ibfk_2` FOREIGN KEY (`detalle_id_producto`) REFERENCES `tlb_producto` (`producto_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
