-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 11-09-2021 a las 12:42:13
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id16320256_salmaclinic`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `code` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` int(10) NOT NULL,
  `amount` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`code`, `name`, `description`, `price`, `amount`) VALUES
('P002', 'Crema Nivea', 'Crema para manos sensibles y cuerpo.', 12000, 23),
('P004', 'Cicatricure crema anti arrugas', 'Esta crema es parte de un tratamiento que ayuda a a quitar las arrugas y las manchas de la cara.', 41000, 15),
('P006', 'PROB SIMBIOTICO', 'Aplicación: Sirve para la diarrea aguda y leve para niños y adultos. Posología: Una cápsula cada 12 horas. Presentación: Frasco X 30 cápsulas vegetales.', 50000, 10),
('P007', 'PROB ECOL', 'Aplicación: Sirve para la diarrea aguda y leve en adultos. Posología: Una cápsula cada 8 horas. Presentación: Frasco x30 cápsulas vegetales.', 60000, 15),
('P008', 'PROB FLOR KIDS', 'Aplicación: Diarrea aguda leve y severa en niños. Posología: 1 sachet diluido al día, Durante una comida. Presentación: Caja X 10 sachet. venta individual.', 55000, 20),
('P009', 'EUPHRASIA', 'Aplicación: Tratamiento para lo conjuntivitis. Posología: Aplicar 1 gota en cada ojo de 2 a 3 veces al día. Presentación: Frasco X 15 ml.', 45000, 15),
('P010', 'APIS', 'Aplicación: Sirve para la Rinitis,Sinusitis aguda y cronica. Posología: Aplicar 1 a 2 puff en cada fosa nasal, 2 a 3 veces al día. Presentación: Frasco X 15 ml.', 50000, 20),
('P011', 'THYMUS', 'Aplicación: Sirve para la Otitis externa,tinnitus,ecufenos. Posología: Aplicar 2 a 3 gotas en cada oído, 2 a 3 veces al día. Presentación: Frasco X 15 ml.', 45000, 15),
('P012', 'HYDRODEL', 'Aplicación: Tratamientos para xerosis de piel en niños y adultos. Posología: Aplicar diariamente sobre la piel afectada 1 o 2 veces al día. Presentación: Pote x 60 gr.', 65000, 20),
('P013', 'VASELINA AZUFRADA 10%', 'Aplicación: Tratamiento de eleccion para la escabiosis. Posología: Lavar cuidadosamente la zona afectada con agua y jabón, preferiblemente en la noche de 3 a 5 días consecutivos. Presentación: Pote x 60 gr.', 65000, 20),
('P014', 'SINDEL JABON', 'Aplicación: Tratamiento para el acne. Posología: humedecer la cara, frotar una pequeña cantidad de SINDEL jabón facial con agua hasta que haga espuma. Presentación: Tarro por 120 ml.', 80000, 20),
('P015', 'SINDEL GEL', 'Aplicación: Efecto Antibiótico, antilipogenico, antinflamatorio. Posología: Empiece con dos aplicaciones al día. Presentación: Tubo por 35 gr.', 100000, 15),
('P017', 'COBITAL', 'Aplicación: -Descalcificación (osteoporosis y osteopenia). -Daño por estrés oxidativo. Posología: 1 cápsula cada 12 horas o según criterio médicoafectadas de la piel 1 o 2 veces al día por 2 semanas consecutivas. Presentación: Caja X 30 cápsulas', 125000, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(10) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `rol` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `first_name`, `last_name`, `username`, `email`, `phone`, `pass`, `rol`) VALUES
(1, 'hjhkjh', 'jhkjhkh', 'iamjers', 'b.lairs.o.s.a.tmp@gmail.com', 2147483647, 'jack123', 'user'),
(2, 'juan', 'perez', 'jperez', 'juanperez@gmail.com', 41475273, 'juan123', 'admin'),
(3, 'Gregorio', 'Rodríguez', 'jerson', 'b.lairs.o.s.a.tmp@gmail.com', 2147483647, 'jerson123', 'user'),
(4, 'Ciro', 'Perroni', 'cirop', 'ciroperroni1234@gmail.com', 2147483647, 'ciro123', 'user'),
(5, 'Ciro', 'Perrony', 'ciro123', 'jakdjs@gmal.com', 32393323, 'jose123', 'user'),
(6, 'ciro', 'perrony', 'xhiro123', 'xhiro@gmail.com', 310234423, 'xhiro123', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`code`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
