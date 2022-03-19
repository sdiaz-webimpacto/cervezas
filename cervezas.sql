-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-03-2022 a las 05:51:51
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
(6, 'Kits', 4, 'kits', '2022-03-04 11:59:24'),
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
(1, '/views/img/slider/slider1.jpg', 'slideOption1', '/views/img/slider/producto.png', '{\"top\":\"2%\",\"left\":\"\",\"width\":\"auto\",\"right\": \"0%\"}', '{\"top\":\"12%\",\"left\":\"10%\",\"width\":\"40%\",\"right\": \"\"}', 'Title', 'Subtitle', 'Comment for this product', 'Show Product', '', '2022-03-19 04:45:16'),
(2, '/views/img/slider/slider2.jpg', 'slideOption2', '/views/img/slider/producto.png', '{\"top\":\"2%\",\"left\":\"20%\",\"width\":\"auto\",\"right\": \"\"}', '{\"top\":\"12%\",\"left\":\"\",\"width\":\"40%\",\"right\": \"10%\"}', 'Title Slider 2', 'Subtitle slider 2', 'Text in Slider 2', 'Show Product', '', '2022-03-19 04:50:21'),
(3, '/views/img/slider/slider3.jpg', 'slideOption2', '/views/img/slider/producto.png', '{\"top\":\"2%\",\"left\":\"20%\",\"width\":\"auto\",\"right\": \"\"}', '{\"top\":\"12%\",\"left\":\"\",\"width\":\"40%\",\"right\": \"10%\"}', 'Title Slider 3', 'Subtitle slider 3', 'Text for slider 3', 'Show product', '', '2022-03-19 04:50:21');

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
