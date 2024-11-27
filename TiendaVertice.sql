-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-11-2024 a las 21:52:45
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `TiendaVertice`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Administradores`
--

CREATE TABLE `Administradores` (
  `id` int(11) NOT NULL,
  `user_admin` varchar(100) NOT NULL,
  `passwd_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Administradores`
--

INSERT INTO `Administradores` (`id`, `user_admin`, `passwd_admin`) VALUES
(1, 'eguzman', '$2y$10$HQZpwHZ8mOyBfjQ8lY8dvusjO3unlTW7tE78NKfa26ftIdQ/OEJcy'),
(2, 'admin', '$2y$10$7IEeSFvFfDkBO.tKHFGeE./R/Kv7KvCm5t7KAW6YuSCMzNYY6MNT2'),
(3, 'tinestri', '$2y$10$pJyjzRMLAS8Ch2gujtpgc.pigf41JTFRro6Kl2M0VgYrJTdpfpSD6'),
(4, 'mmora', '$2y$10$RZC50qp2/.Xl23UT4C1VsOGC5eB.QZc2IdGuX8IxlJp9iOYJ9rrkm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CarritoCompras`
--

CREATE TABLE `CarritoCompras` (
  `id_producto_carrito` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `CarritoCompras`
--

INSERT INTO `CarritoCompras` (`id_producto_carrito`, `usuario_id`, `producto_id`, `cantidad`) VALUES
(24, 27, 23, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `HistorialCompras`
--

CREATE TABLE `HistorialCompras` (
  `id_compra` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `HistorialCompras`
--

INSERT INTO `HistorialCompras` (`id_compra`, `usuario_id`, `producto_id`, `cantidad`) VALUES
(9, 23, 23, 2),
(10, 23, 26, 1),
(11, 14, 22, 3),
(12, 14, 35, 1),
(13, 23, 22, 1),
(14, 27, 29, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Productos`
--

CREATE TABLE `Productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fotos` varchar(255) DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad_en_almacen` int(11) NOT NULL,
  `fabricante` varchar(100) DEFAULT NULL,
  `origen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Productos`
--

INSERT INTO `Productos` (`id_producto`, `nombre`, `descripcion`, `fotos`, `precio`, `cantidad_en_almacen`, `fabricante`, `origen`) VALUES
(21, 'Hersheys', 'Chocolate cremoso y suave, elaborado con cacao de alta calidad, ideal para disfrutar como snack, en postres o compartir.', 'hersheys.jpeg', 30.00, 0, 'Hershey\'s', 'Importado'),
(22, 'Skittles', ' Coloridos caramelos masticables con sabores frutales intensos, perfectos para disfrutar y compartir en cualquier momento del día.\"', 'skittles.jpeg', 35.00, 14, 'Dulces Vero', 'Nacional'),
(23, 'Pulparindo', 'Dulce tradicional de tamarindo con un equilibrio perfecto entre dulce, ácido y picante, ideal para antojos intensos.', 'pulparindo.jpeg', 12.50, 18, 'Dulces Vero', 'Nacional'),
(24, 'Algodon de azucar', 'Deliciosa y esponjosa golosina hecha de azúcar hilada, ligera y dulce, perfecta para disfrutar en ferias y festivales.', 'algodon-azucar.jpeg', 10.00, 10, 'Local', 'Nacional'),
(25, 'Tic tac', 'Refrescantes pastillas de menta en tamaño práctico, ideales para un aliento fresco en cualquier momento del día.', 'tic-tac.jpeg', 13.00, 55, 'Gamesa', 'Nacional'),
(26, 'Chicles', 'Chicle masticable y duradero, disponible en variados sabores, ideal para disfrutar de una experiencia refrescante y divertida.', 'chicle.jpeg', 5.00, 99, 'Trident', 'Nacional'),
(27, 'Palomitas de Maiz', 'Crujientes y ligeras, perfectas para acompañar tus momentos de cine o disfrutar como un snack sabroso y reconfortante.', 'popcorn.jpeg', 20.00, 8, 'ACTIII', 'Importado'),
(28, 'Nachos', 'Crujientes y deliciosos totopos de maíz, ideales para disfrutar con salsas, guacamole o como un snack sabroso y versátil.', 'nachos.jpeg', 80.00, 2, 'Local', 'Nacional'),
(29, 'Cacahuate Japones', 'Crujientes cacahuates cubiertos con una capa crujiente de harina, sazonados con un toque salado y delicioso, perfectos para un snack sabroso y adictivo', 'cacahuate-japones.jpeg', 15.00, 9, 'MiYhao', 'Importado'),
(30, 'Papas fritas', 'Crujientes papas fritas con una variedad de sabores intensos y deliciosos, ideales para disfrutar en cualquier momento como un snack lleno de sabor.', 'papas-saborizadas.jpeg', 22.00, 30, 'Sabritas', 'Nacional'),
(31, 'Papas Naturales', 'Deliciosas papas fritas, simples y crujientes, con un toque sutil de sal, ideales para disfrutar de un sabor auténtico y natural.', 'lays.jpeg', 20.00, 20, 'Sabritas', 'Nacional'),
(32, 'Gomitas de chile', 'Gomitas de chile cubiertas con una mezcla de chile y sal, ofreciendo un sabor único y picante que combina lo dulce y lo ácido, ideal para los amantes de los snacks intensos.', 'gomitas-chile.jpeg', 25.00, 3, 'Local', 'Nacional'),
(33, 'Chicharron', 'Crujiente y sabroso snack de piel de cerdo frita, con un toque salado y una textura ligera, ideal para disfrutar solo o acompañar tus platillos favoritos.', 'chicharron.jpeg', 30.00, 10, 'Chicharroneria El Pepe', 'Nacional'),
(34, 'Tutsi Pop', 'Divertidas paletas de caramelo con un centro de chicle masticable, combinando el dulce sabor del caramelo con la sorpresa del chicle, ideales para disfrutar por más tiempo.', 'tutsi-pop.jpeg', 10.00, 25, 'Dulces Vero', 'Nacional'),
(35, 'Oreo\'s', 'Deliciosas galletas crujientes cubiertas con una capa de suave chocolate, combinando lo mejor del dulce y lo crocante para un snack irresistible.', 'galletas.jpeg', 20.00, 4, 'Oreo', 'Importado'),
(36, 'WarHeads', 'Intensos caramelos con un toque ácido que despiertan tus sentidos, perfectos para quienes disfrutan de sabores extremos y divertidos.', 'warhead.jpeg', 30.00, 4, 'WarHeads Co', 'Importado'),
(37, 'Gomitas Aciditas', 'Divertidas gomitas en forma de gusano, cubiertas con una capa de azúcar, que combinan sabores dulces y ligeramente ácidos para un snack irresistible', 'gomitas-gusano.jpeg', 25.00, 10, 'Dulces Vero', 'Nacional'),
(38, 'Jolly Ranchers', 'Dulces sólidos con intensos sabores a frutas, ideales para disfrutar lentamente y saborear al máximo', 'jolly-rancher.jpeg', 30.00, 5, 'Jolly Rancher', 'Importado'),
(39, 'Bastones de caramelo', 'Dulces clásicos en forma de espiral, con colores vibrantes y un delicioso sabor a menta, perfectos para festividades o disfrutar en cualquier momento.', 'baston-caramelo.jpeg', 15.00, 10, 'Local', 'Nacional'),
(40, 'Dulces de café', 'Dulces suaves y cremosos con un intenso sabor a café, ideales para los amantes del café que buscan una experiencia dulce y aromática', 'dulces-cafe.jpeg', 10.00, 10, 'Gamesa', 'Nacional'),
(41, 'Nerds', 'Pequeños caramelos de colores brillantes, con una textura crujiente y un sabor explosivo que varía entre dulce y ácido. Cada caja ofrece una combinación de sabores, perfectos para disfrutar en cualquier momento con una experiencia divertida y única.', 'nerds.jpeg', 35.00, 9, 'Nerds', 'Importado'),
(42, 'Kinder Delice', 'Esponjoso pastel relleno de crema de cacao y cubierto de chocolate, ofreciendo un sabor suave y delicioso en cada bocado.', 'kinder-delice.jpeg', 25.00, 10, 'Kinder', 'Importado'),
(43, 'Kinder Sopresa', 'Un huevo de chocolate con una deliciosa crema en su interior y una sorpresa sorpresa de juguete en cada uno.', 'kinder-sopresa.jpeg', 25.00, 7, 'Kinder', 'Importado'),
(44, 'Bombones ', 'Deliciosos dulces rellenos de crema suave o marshmallow, cubiertos con una capa de chocolate, perfectos para disfrutar en cualquier momento.', 'bombones.jpeg', 5.00, 30, 'De la Rosa', 'Nacional'),
(45, 'Bombones con chocolate', 'Suaves marshmallows o rellenos cremosos cubiertos con una capa de chocolate, ofreciendo una combinación perfecta de texturas y sabores dulces.', 'bombones-chocolate.jpeg', 6.00, 30, 'De la rosa', 'Nacional'),
(46, 'Gomitas de corazón', 'Dulces gomosos en forma de corazón, con un sabor afrutado y suave, perfectos para compartir en momentos especiales o disfrutar como un dulce delicioso.', 'gomitas-heart.jpeg', 15.00, 20, 'De la rosa', 'Nacional'),
(47, 'M&M\'s', 'Pequeños chocolates recubiertos de coloridas cápsulas de azúcar, con un suave relleno de chocolate, ideales para un snack rápido y divertido.', 'mym.jpeg', 30.00, 10, 'm&m', 'Importado'),
(48, 'Kit Kat', 'Crujientes wafers cubiertos con una capa de chocolate suave, con un toque extra de sabor o ingredientes, ofreciendo una experiencia deliciosa en cada bocado.', 'kitkat.jpeg', 30.00, 3, 'Kit Kat USA', 'Importado'),
(49, 'Mentos', ' Caramelos frescos y masticables con un toque refrescante, disponibles en varios sabores, perfectos para disfrutar un aliento fresco y un sabor duradero.', 'mentos.jpeg', 18.00, 12, 'Mentos', 'Importado'),
(50, 'Xtremes', 'Gomitas con un sabor intensamente ácido y dulce, cubiertas con azúcar, perfectas para quienes buscan una experiencia de sabor fuerte y refrescante.', 'xtremes.jpeg', 40.00, 4, 'Xtremes', 'Importado'),
(51, 'Cafe de Colombia ', ' Cafe con leche sin azucar', 'starbucks.jpeg', 70.50, 4, 'Starbucks', 'Nacional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `correo_electronico` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `numero_tarjeta_bancaria` varchar(20) DEFAULT NULL,
  `direccion_postal` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`id_usuario`, `nombre_usuario`, `correo_electronico`, `contrasena`, `fecha_nacimiento`, `numero_tarjeta_bancaria`, `direccion_postal`) VALUES
(13, 'root', 'root@dominio.com', '$2y$10$qLgeT.j8WQJNYy0JTJtAJOFZ5O2aLIItkBvswa.glwFElIQB5W9i.', '2024-11-07', '7777', '7777'),
(14, 'hselley', 'hselley@anahuac.mx', '$2y$10$9B1wMz23JgYaW7bGmVkf8.BL0OcsEFckeXmXazsR3iO3h3OiHXDoO', '2024-11-01', '6651267891287', '34122'),
(23, 'mmendez', 'mmendez@anahuac.mx', '$2y$10$ferp3qGOv0jQM7bgYrhqjOHd/3sEV2w7xudf4UKuvjmJtV7oWE/cG', '2024-11-24', '123412', '342312'),
(27, 'ciprianosanchez', 'cipriano@anahuac.mx', '$2y$10$hw58AGvSGGAqKOp/d9yNnONTYsLx6e0G1GbT3LvKZAg1lbFUHauSC', '2024-11-01', '1234567789', '12345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Administradores`
--
ALTER TABLE `Administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `CarritoCompras`
--
ALTER TABLE `CarritoCompras`
  ADD PRIMARY KEY (`id_producto_carrito`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `HistorialCompras`
--
ALTER TABLE `HistorialCompras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `Productos`
--
ALTER TABLE `Productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `correo_electronico` (`correo_electronico`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Administradores`
--
ALTER TABLE `Administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `CarritoCompras`
--
ALTER TABLE `CarritoCompras`
  MODIFY `id_producto_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `HistorialCompras`
--
ALTER TABLE `HistorialCompras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `Productos`
--
ALTER TABLE `Productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `CarritoCompras`
--
ALTER TABLE `CarritoCompras`
  ADD CONSTRAINT `carritocompras_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `Usuarios` (`id_usuario`),
  ADD CONSTRAINT `carritocompras_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `Productos` (`id_producto`);

--
-- Filtros para la tabla `HistorialCompras`
--
ALTER TABLE `HistorialCompras`
  ADD CONSTRAINT `historialcompras_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `Usuarios` (`id_usuario`),
  ADD CONSTRAINT `historialcompras_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `Productos` (`id_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
