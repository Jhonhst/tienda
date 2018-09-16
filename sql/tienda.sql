-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-09-2018 a las 01:57:55
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `administrador` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `clave` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`administrador`, `clave`) VALUES
('admin', '115599');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'verduras'),
(2, 'carnes'),
(3, 'viveres');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pedido` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `usuario`, `pedido`) VALUES
(2, 'josefina', 'tomates, cebolla, colantro, aceite, cafe, vino'),
(3, 'Jhon', 'papas, frijol, pollo, azucar, panela'),
(4, 'patricia', 'tomates, cebolla, colantro, aceite, cafe'),
(5, 'Jhon', 'papas, frijol, pollo, azucar'),
(6, 'patricia', 'tomates, cebolla, colantro, aceite, cafe'),
(7, 'Jhon', 'papas, frijol, pollo, azucar'),
(8, 'patricia', 'tomates, cebolla, colantro, aceite, cafe'),
(9, 'Jhon', 'papas, frijol, pollo, azucar'),
(10, 'patricia', 'tomates, cebolla, colantro, aceite, cafe'),
(11, 'Jhon', 'papas, frijol, pollo, azucar'),
(12, 'patricia', 'tomates, cebolla, colantro, aceite, cafe'),
(13, 'Jhon', 'papas, frijol, pollo, azucar'),
(14, 'patricia', 'tomates, cebolla, colantro, aceite, cafe'),
(15, 'Jhon', 'papas, frijol, pollo, azucar'),
(16, 'patricia', 'tomates, cebolla, colantro, aceite, cafe'),
(17, 'Jhon', 'papas, frijol, pollo, azucar'),
(18, 'patricia', 'tomates, cebolla, colantro, aceite, cafe'),
(19, 'Jhon', 'papas, frijol, pollo, azucar'),
(20, 'patricia', 'tomates, cebolla, colantro, aceite, cafe'),
(22, 'yunior', 'cebolla, papas'),
(23, 'yunior', 'pimenton , aceite , Carne Blanda , cebolla , '),
(24, 'yunior', 'cebolla , '),
(25, 'yunior', 'Carne Blanda , '),
(26, 'yunior', 'cebolla , '),
(27, 'yunior', 'Carne Blanda , '),
(28, 'yunior', 'cebolla , '),
(29, 'yunior', 'Carne Blanda , '),
(30, 'yunior', ''),
(31, 'yunior', 'Carne Blanda , cebolla , '),
(32, 'yunior', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `urls` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `precio` int(10) NOT NULL,
  `categoria` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `urls`, `nombre`, `precio`, `categoria`) VALUES
(1, 'https://st.depositphotos.com/1011414/3923/i/450/depositphotos_39237341-stock-photo-yellow-withe-and-red-onion.jpg', 'cebolla', 1000, 1),
(2, 'https://st.depositphotos.com/1005586/2764/i/450/depositphotos_27641419-stock-photo-red-meat.jpg', 'Carne Blanda', 16000, 2),
(3, 'https://st3.depositphotos.com/13324256/17439/i/450/depositphotos_174399876-stock-photo-olive-oil-bottles.jpg', 'aceite', 4500, 0),
(4, 'https://static8.depositphotos.com/1002351/1066/i/950/depositphotos_10665208-stock-photo-red-pepper-isolated-on-white.jpg', 'pimenton', 2500, 1),
(6, 'https://st.depositphotos.com/1031062/3041/i/450/depositphotos_30414167-stock-photo-butter.jpg', 'Mantequilla', 3000, 3),
(7, 'https://st.depositphotos.com/1003591/3983/i/450/depositphotos_39832849-stock-photo-spoon-and-heap-of-salt.jpg', 'sal', 600, 3),
(8, 'https://static4.depositphotos.com/1007162/348/i/450/depositphotos_3480486-stock-photo-pork-chops.jpg', 'chuleta', 8000, 2),
(9, 'https://st.depositphotos.com/1005352/2610/i/450/depositphotos_26107877-stock-photo-cilantro-herbs-and-knife.jpg', 'cilantro', 7000, 1),
(10, 'https://st.depositphotos.com/1026029/1995/i/450/depositphotos_19950315-stock-photo-several-types-of-white-sugar.jpg', 'azucar', 2500, 3),
(12, 'https://st.depositphotos.com/1642482/2529/i/450/depositphotos_25296471-stock-photo-corn.jpg', 'maiz', 5000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contrasenia` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cotraseniados` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `correo`, `contrasenia`, `cotraseniados`) VALUES
(1, 'Jhonf', 'jhon@gmail.com', '123456', '123456'),
(2, 'javier', 'javier@gmail.com', '123456', '123456'),
(3, 'ramon', 'monchito@hotmail.com', '123456', '123456'),
(4, 'yunior', 'yunior@gmail.com', '123456', '123456'),
(5, 'yunior', 'yunior@gmail.com', '123456', '123456'),
(6, 'javier', 'dasd@kdgfshd', '123456', '123456'),
(7, 'javier', 'dasd@kdgfshd', '123456', '123456'),
(8, 'javier', 'dasd@kdgfshd', '123456', '123456'),
(9, 'sdasda', 'sadas@aaskdj', '12345', '12345'),
(10, 'fsdfsdfs', 'sdasd@sdhfskdh', '123456', '123456'),
(11, 'ramosall', 'ramosall@gmail.com', '123456', '123456'),
(12, 'javier', 'yunior@gmail.com', '123456', '123456'),
(13, 'javiermoÃ±a', 'yunior@gmail.com', '123456', '123456'),
(14, 'josefina', 'yunior@gmail.com', '123456', '123456'),
(15, 'josefina', 'yhonny@gmailcom', '123456', '123456'),
(16, 'jhonvfvxc', 'jhonhst2@gmail.com', '123456', '123456'),
(17, 'sdfasf', 'dfasdf@khgjadgs', '123456', '123456'),
(18, 'dsfsdfgdg', 'fgsdgfd@sfdfgd', '123456', '123456'),
(19, 'dsfsdfgdg', 'fgsdgfd@sfdfgd', '123456', '123456');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
