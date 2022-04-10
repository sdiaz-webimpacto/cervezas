-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-04-2022 a las 19:02:49
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cervezas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_spanish_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `url` text COLLATE utf8_spanish_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `name`, `parent`, `url`, `date`) VALUES
(1, 'Suaves', 0, 'suaves', '2022-03-04 11:58:40'),
(2, 'Medias', 0, 'medias', '2022-03-04 11:58:40'),
(3, 'Fuertes', 0, 'fuertes', '2022-03-04 11:58:40'),
(4, 'Artesanas', 0, 'artesanas', '2022-03-04 11:58:40'),
(5, 'Sin', 0, 'sin', '2022-03-04 11:59:24'),
(6, 'Nacionales', 4, 'nacionales-artesanas', '2022-03-27 14:21:56'),
(7, 'Normales', 5, 'normales-sin', '2022-03-04 12:00:13'),
(8, 'Tostadas', 5, 'tostadas-sin', '2022-03-04 12:00:13'),
(9, 'Danesas', 1, 'danesas-suaves', '2022-03-04 12:01:19'),
(10, 'Mexicanas', 1, 'mexicanas-suaves', '2022-03-04 12:01:19'),
(11, 'Nacionales', 1, 'nacionales-suaves', '2022-03-04 12:01:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantilla`
--

CREATE TABLE `plantilla` (
  `id` int(11) NOT NULL,
  `top_bar` text COLLATE utf8_spanish_ci NOT NULL,
  `top_bar_text` text COLLATE utf8_spanish_ci NOT NULL,
  `header` text COLLATE utf8_spanish_ci NOT NULL,
  `backcolor` text COLLATE utf8_spanish_ci NOT NULL,
  `backcolor_text` text COLLATE utf8_spanish_ci NOT NULL,
  `logo` text COLLATE utf8_spanish_ci NOT NULL,
  `favicon` text COLLATE utf8_spanish_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `plantilla`
--

INSERT INTO `plantilla` (`id`, `top_bar`, `top_bar_text`, `header`, `backcolor`, `backcolor_text`, `logo`, `favicon`, `date`) VALUES
(1, '#f7f7f0', '#1f2430', '#aea43d', '#e0d5b4', '#1f2430', 'views/img/plantilla/logo.png', 'views/img/plantilla/logo.png', '2022-03-03 12:00:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_sub_category` int(11) NOT NULL,
  `type` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `url` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `title` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `description` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `detail` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `price` float NOT NULL,
  `cover` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `views` int(11) NOT NULL,
  `sales` int(11) NOT NULL,
  `free_views` int(11) NOT NULL,
  `free_sales` int(11) NOT NULL,
  `category_offer` int(11) NOT NULL,
  `sub_category_offer` int(11) NOT NULL,
  `offer` int(11) NOT NULL,
  `offer_price` float NOT NULL,
  `offer_discount` int(11) NOT NULL,
  `offer_img` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `offer_end` datetime NOT NULL,
  `new` int(11) NOT NULL,
  `weight` float NOT NULL,
  `delivery` float NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id`, `id_category`, `id_sub_category`, `type`, `url`, `title`, `short_description`, `description`, `detail`, `price`, `cover`, `views`, `sales`, `free_views`, `free_sales`, `category_offer`, `sub_category_offer`, `offer`, `offer_price`, `offer_discount`, `offer_img`, `offer_end`, `new`, `weight`, `delivery`, `date_add`) VALUES
(1, 1, 9, 'fisico', 'heineken', 'Heineken', 'Cerveza suave, ligera y agradable', 'Cerveza suave, ligera y agradable', '{“pais”:”Dinamarca”}', 0, 'views/img/products/heineken.jpg', 5, 104, 17, 14, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', 0, 0, 3, '2022-03-27 14:53:45'),
(2, 1, 9, 'fisico', 'carlsberg', 'Carlsberg', 'Cerveza suave, ligera y agradable', 'Cerveza suave, ligera y agradable', '{“pais”:”Dinamarca”}', 2.75, 'views/img/products/carlsberg.jpg', 1, 34, 0, 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', 0, 0, 3, '2022-03-27 14:53:45'),
(3, 1, 10, 'fisico', 'desperados', 'Desperados', 'Cerveza con tequila', 'Cerveza mexicana, suave, con lígero toque a tequila, transportate a Mexico con un solo trago.', '{“pais”:”México”}', 2, 'views/img/products/desperados.png', 12, 201, 0, 0, 1, 1, 1, 1, 50, '0', '0000-00-00 00:00:00', 0, 0, 3, '2022-03-27 14:53:45'),
(4, 1, 10, 'fisico', 'coronita', 'Coronita', 'Típica cerveza mexicana', 'Cerveza lígera, suave y rubia, la excelencia méxican y la más exportada del pais', '{“pais”:”México”}', 0, 'views/img/products/coronita.jpg', 10, 21, 24, 10, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', 0, 0, 3, '2022-03-27 14:53:45'),
(5, 1, 11, 'físico', 'alhambra1295', 'Alhambra 1925', 'Cerveza reserva muy suave', 'Cerveza rubia, lígera, de toques frescos y gran color', '{“pais”:”España”}', 3, 'views/img/products/alhambra1925.jpg', 10, 340, 0, 0, 1, 1, 1, 2, 33, '0', '0000-00-00 00:00:00', 0, 0, 3, '2022-03-29 16:42:32'),
(6, 2, 2, 'físico', 'quilmes', 'Quilmes', 'Texto de prueba', 'Texto de prueba más largo a modo de descripción', '{“pais”:”Argentina”}', 3, 'views/img/products/quilmes.jpg', 10, 21, 0, 0, 1, 1, 1, 1, 33, '0', '0000-00-00 00:00:00', 0, 0, 3, '2022-03-27 14:53:45'),
(7, 2, 2, 'físico', 'peroni', 'Peroni', 'Texto de prueba', 'Texto de prueba más largo a modo de descripción', '{“pais”:”Italia”}', 2.1, 'views/img/products/peroni.jpg', 11, 22, 0, 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', 0, 0, 3, '2022-03-27 14:53:45'),
(8, 3, 3, 'físico', 'ambarnegra', 'Ambar Negra', 'Texto de prueba', 'Texto de prueba más largo a modo de descripción', '{“pais”:”España”}', 1.75, 'views/img/products/ambarnegra.jpg', 12, 23, 0, 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', 0, 0, 3, '2022-03-27 14:53:45'),
(9, 3, 3, 'físico', 'chouffe', 'Chouffe', 'Texto de prueba', 'Texto de prueba más largo a modo de descripción', '{“pais”:”Bélgica”}', 2.11, 'views/img/products/chouffe.jpg', 13, 24, 0, 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', 0, 0, 3, '2022-03-27 14:53:45'),
(10, 4, 6, 'físico', 'domus', 'Domus', 'Texto de prueba', 'Texto de prueba más largo a modo de descripción', '{“pais”:”España”}', 5, 'views/img/products/domus.jpg', 14, 25, 0, 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', 0, 0, 3, '2022-03-27 14:53:45'),
(11, 4, 6, 'físico', 'dougalls', 'DouGall`s', 'Texto de prueba', 'Texto de prueba más largo a modo de descripción', '{“pais”:”España”}', 2.12, 'views/img/products/dougalls.webp', 15, 26, 0, 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', 0, 0, 3, '2022-03-27 14:53:45'),
(12, 3, 3, 'físico', 'guiness', 'Guiness', 'Texto de prueba', 'Texto de prueba más largo a modo de descripción', '{“pais”:”Irlanda”}', 2.25, 'views/img/products/guiness.jpg', 16, 27, 0, 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', 0, 0, 3, '2022-03-27 14:53:45'),
(13, 4, 6, 'físico', 'lavirgen', 'La Virgen', 'Texto de prueba', 'Texto de prueba más largo a modo de descripción', '{“pais”:”España”}', 1.75, 'views/img/products/lavirgen.jpg', 17, 28, 0, 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', 0, 0, 3, '2022-03-27 14:53:45'),
(14, 4, 6, 'físico', 'malquerida', 'Malquerida', 'Texto de prueba', 'Texto de prueba más largo a modo de descripción', '{“pais”:”España”}', 2.8, 'views/img/products/malquerida.jpg', 18, 29, 0, 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', 0, 0, 3, '2022-03-27 14:53:45'),
(15, 2, 2, 'físico', 'paulaner', 'Paulaner', 'Texto de prueba', 'Texto de prueba más largo a modo de descripción', '{“pais”:”Alemania”}', 2.14, 'views/img/products/paulaner.png', 19, 30, 0, 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', 0, 0, 3, '2022-03-27 14:53:45'),
(16, 4, 6, 'físico', 'santaclara', 'Santa Clara', 'Texto de prueba', 'Texto de prueba más largo a modo de descripción', '{“pais”:”España”}', 0, 'views/img/products/santaclara.webp', 20, 31, 200, 75, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', 0, 0, 3, '2022-03-27 14:53:45'),
(17, 3, 3, 'físico', 'sapporo', 'Sapporo', 'Texto de prueba', 'Texto de prueba más largo a modo de descripción', '{“pais”:”Japón”}', 3.25, 'views/img/products/sapporo.jpg', 21, 32, 0, 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', 0, 0, 3, '2022-03-27 14:53:45'),
(18, 5, 8, 'físico', 'magnaroja00', 'Magna Roja 0.0', 'Texto de prueba', 'Texto de prueba más largo a modo de descripción', '{“pais”:”España”}', 2.81, 'views/img/products/magnaroja00.jpeg', 22, 33, 0, 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', 1, 0, 3, '2022-03-29 16:43:11'),
(19, 5, 8, 'físico', 'franziskanersin', 'Franziskaner Sin', 'Texto de prueba', 'Texto de prueba más largo a modo de descripción', '{“pais”:”Alemania”}', 3.25, 'views/img/products/franziskanersin.jpg', 23, 34, 0, 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', 0, 0, 3, '2022-03-27 14:53:45'),
(20, 5, 7, 'físico', 'mahousin', 'Mahou Sin', 'Texto de prueba', 'Texto de prueba más largo a modo de descripción', '{“pais”:”España”}', 0, 'views/img/products/mahousin.jpg', 24, 35, 245, 110, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', 0, 0, 3, '2022-03-27 14:53:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `imgBackground` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `type` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `imgProduct` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `styleImgProduct` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `styleText` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `titleH1` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `titleH2` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `titleH3` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `button` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `url` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `slider`
--

INSERT INTO `slider` (`id`, `imgBackground`, `type`, `imgProduct`, `styleImgProduct`, `styleText`, `titleH1`, `titleH2`, `titleH3`, `button`, `url`, `date`) VALUES
(1, 'views/img/slider/slider1.jpg', 'slideOption1', 'views/img/slider/producto.png', '{\"top\":\"2%\",\"left\":\"\",\"width\":\"auto\",\"right\": \"0%\"}', '{\"top\":\"15%\",\"left\":\"10%\",\"width\":\"40%\",\"right\": \"\"}', '{\"text\":\"Subtitle\",\"color\":\"#ccc\"}', '{\"text\":\"Subtitle\",\"color\":\"#ccc\"}', '{\"text\":\"Comment for this product\",\"color\":\"#ccc\"}', '<button class=\"btn btn-default backColor text-uppercase\">Show Product <span class=\"fa fa-chevron-right\"></span></button>', '#', '2022-03-19 06:58:29'),
(2, 'views/img/slider/slider2.jpg', 'slideOption2', 'views/img/slider/producto.png', '{\"top\":\"2%\",\"left\":\"0%\",\"width\":\"auto\",\"right\": \"\"}', '{\"top\":\"15%\",\"left\":\"\",\"width\":\"40%\",\"right\": \"10%\"}', '{\"text\":\"Title Slider 2\",\"color\":\"#ccc\"}', '{\"text\":\"SubtitleSlider 2\",\"color\":\"#ccc\"}', '{\"text\":\"Text in Slider 2\",\"color\":\"#ccc\"}', '<button class=\"btn btn-default backColor text-uppercase\">Show Product <span class=\"fa fa-chevron-right\"></span></button>', '#', '2022-03-19 06:58:23'),
(3, 'views/img/slider/slider3.jpg', 'slideOption2', 'views/img/slider/producto.png', '{\"top\":\"2%\",\"left\":\"0%\",\"width\":\"auto\",\"right\": \"\"}', '{\"top\":\"15%\",\"left\":\"\",\"width\":\"40%\",\"right\": \"10%\"}', '{\"text\":\"Title slider 2\",\"color\":\"#ccc\"}', '{\"text\":\"Subtitle slider 3\",\"color\":\"#ccc\"}', '{\"text\":\"Text for slider 3\",\"color\":\"#ccc\"}', '<button class=\"btn btn-default backColor text-uppercase\">Show Product <span class=\"fa fa-chevron-right\"></span></button>', '#', '2022-03-19 06:58:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `social_net`
--

CREATE TABLE `social_net` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_spanish_ci NOT NULL,
  `logo` text COLLATE utf8_spanish_ci NOT NULL,
  `class` text COLLATE utf8_spanish_ci NOT NULL,
  `url` text COLLATE utf8_spanish_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `social_net`
--

INSERT INTO `social_net` (`id`, `name`, `logo`, `class`, `url`, `date`) VALUES
(1, 'facebook', 'fa-facebook', 'facebookColor', 'http://facebook.com/', '2022-03-02 15:52:28'),
(2, 'youtube', 'fa-youtube', 'youtubeColor', 'http://youtube.com/', '2022-03-02 15:52:28'),
(3, 'twitter', 'fa-twitter', 'twitterColor', 'http://twitter.com/', '2022-03-02 15:53:37'),
(4, 'google', 'fa-google-plus', 'googleColor', 'http://google.com/', '2022-03-02 15:53:37'),
(5, 'instagram', 'fa-instagram', 'instagramColor', 'http://instagram.com/', '2022-03-02 15:54:15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plantilla`
--
ALTER TABLE `plantilla`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `social_net`
--
ALTER TABLE `social_net`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `plantilla`
--
ALTER TABLE `plantilla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `social_net`
--
ALTER TABLE `social_net`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
