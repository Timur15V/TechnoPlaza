-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 15 2023 г., 22:38
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `TechnoPlazaDB`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `id_users` int NOT NULL,
  `id_product` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `id_users`, `id_product`, `name`, `quantity`, `price`) VALUES
(74, 16, 41, 'Focal Sub 600P', 5, 79999),
(75, 16, 40, 'BenQ W5700', 3, 299000);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `id_users` int NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `id_users`, `date`) VALUES
(132, 15, '2023-03-15 20:45:40'),
(133, 16, '2023-03-15 20:47:45'),
(134, 15, '2023-03-15 20:56:54'),
(135, 15, '2023-03-15 20:57:59'),
(136, 15, '2023-03-15 21:10:57'),
(137, 16, '2023-03-15 21:11:45');

-- --------------------------------------------------------

--
-- Структура таблицы `orders_has_products`
--

CREATE TABLE `orders_has_products` (
  `id` int NOT NULL,
  `id_orders` int NOT NULL,
  `id_products` int NOT NULL,
  `price` float NOT NULL,
  `quantity` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders_has_products`
--

INSERT INTO `orders_has_products` (`id`, `id_orders`, `id_products`, `price`, `quantity`, `name`) VALUES
(112, 132, 41, 79999, 1, 'Focal Sub 600P'),
(113, 133, 41, 79999, 1, 'Focal Sub 600P'),
(114, 134, 9, 56250, 3, 'Digis Velvet 117'),
(115, 134, 39, 94900, 1, 'BenQ MX631ST'),
(116, 134, 40, 299000, 1, 'BenQ W5700'),
(117, 134, 41, 79999, 1, 'Focal Sub 600P'),
(118, 135, 9, 56250, 3, 'Digis Velvet 117'),
(119, 136, 9, 56250, 3, 'Digis Velvet 117'),
(120, 136, 40, 299000, 2, 'BenQ W5700'),
(121, 137, 41, 79999, 5, 'Focal Sub 600P'),
(122, 137, 40, 299000, 3, 'BenQ W5700');

-- --------------------------------------------------------

--
-- Структура таблицы `Position`
--

CREATE TABLE `Position` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `salary` float NOT NULL,
  `percent` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Position`
--

INSERT INTO `Position` (`id`, `name`, `description`, `salary`, `percent`) VALUES
(1, 'продавец', 'Занимается консультацией клиентов, а также продажей товаров.', 20000, 0.1),
(2, 'администратор', 'Занимается регулировкой процесса продажи. Корректирует сотрудников, обновляет информацию о товарах, занимается поставкой товаров.', 40000, 0.05);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `description`, `image`) VALUES
(9, 'Digis Velvet 117', 56250, 'Стационарный проекционный экран Digis на раме в комплекте с видеопроектором гармонично дополнит интерьер ресторана, бара или кафе. ', 'images/products/Digis Velvet.png'),
(39, 'BenQ MX631ST', 94900, 'Предназначенный для доставки четких, ярких, более крупных, чем в жизни изображений с короткого расстояния проецирования.', 'images/products/BenQ MX631ST.jpg'),
(40, 'BenQ W5700', 299000, 'Проектор BenQ W5700 с разрешением 4K HDR, разрешение 4K UHD, технология BenQ CinematicColor с 100% охватом цветового пространства DCI-P3/Rec.709, технология HDR-PRO (поддержка HDR10/HLG), цвет черный.', 'images/products/BenQ W5700.jpg'),
(41, 'Focal Sub 600P', 79999, 'Активный сабвуфер, закрытого типа, входы: right, left LFE, размер динамика: 12', 'images/products/Focal Sub 600P.jpg'),
(42, 'Focal Sub Air Black', 52712, 'Сабвуфер, фазоинверторного типа, однополосная напольная АС, встроенный усилитель, мощность 110 Вт, диапазон частот 40-200 Гц, цвет черный.', 'images/products/Focal Sub Air Black.jpg'),
(43, 'Audio-Technica AT-LP3XBT Black', 36390, 'Проигрыватель с ременным приводом, скорости 33 и 45 об/мин, фонокорректор: ММ-тип, картридж: AT-VM95C, тонарм: поворотный прямой 221.5 мм, автоматизированное проигрывание, материал диска: алюминий, уровень детонации 0.2 %, отношение сигнал/шум 60 дБ, аудио выходы: 1 x RCA, Bluetooth, крышка в комплекте, вес 5.0 кг, цвет черный.', 'images/products/Audio-Technica AT-LP3XBT Black.jpg'),
(44, 'Thorens TD 103A Piano Black', 118750, 'Проигрыватель виниловых дисков, полный автомат, скорость воспроизведения: 33/45/78, электронное переключение, тонарм: Thorens TP 19-1, звукосниматель: Ortofon 2M Red, материал стола: МДФ, опорный диск: алюминий, 300 мм, 0,7 кг, мотор: DC-постоянного тока с электронной стабилизацией, привод: пассиковый, габариты: 430 x 130 x 365 мм, вес: 6,4 кг.', 'images/products/Thorens TD 103A Piano Black.jpg'),
(45, 'Leak Stereo 130 Walnut', 79990, 'Интегральный стереоусилитель класса AB, встроенный фонокорректор MM, поддержка Bluetooth aptX и AAC, прямой выход Direct. ЦАП ES9018 Sabre32 Reference с 32-битной архитектурой HyperStream, сверхнизкий уровень шума, широкий динамический диапазон цифровых аудиофайлов с частотой дискретизации до 384 кГц (PCM) и DSD256. Двухполосный эквалайзер.', 'images/products/Leak Stereo 130 Walnut.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `storage`
--

CREATE TABLE `storage` (
  `id` int NOT NULL,
  `id_product` int NOT NULL,
  `quantity_prod` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `storage`
--

INSERT INTO `storage` (`id`, `id_product`, `quantity_prod`) VALUES
(1, 9, 94),
(15, 39, 99),
(17, 40, 99),
(18, 41, 99),
(19, 42, 50),
(20, 43, 50),
(21, 44, 50),
(22, 45, 50);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `patronymic` varchar(100) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `surname`, `name`, `patronymic`, `login`, `email`, `password`) VALUES
(13, NULL, '', NULL, 'admin', NULL, '12345'),
(15, 'Волков', 'Тимур', 'Александрович', 'TimurV15', 'volkovtimur080@gmail.com', '123'),
(16, 'Иванов', 'Иван', 'Иванович', 'IVAN', 'ivanivanov092@gmail.com', '12');

-- --------------------------------------------------------

--
-- Структура таблицы `workers`
--

CREATE TABLE `workers` (
  `id` int NOT NULL,
  `id_position` int NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `phone_number` varchar(30) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `passport` bigint DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `dateBirth` varchar(50) DEFAULT NULL,
  `placeBirth` varchar(500) DEFAULT NULL,
  `education` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `workers`
--

INSERT INTO `workers` (`id`, `id_position`, `full_name`, `address`, `phone_number`, `image`, `passport`, `gender`, `dateBirth`, `placeBirth`, `education`) VALUES
(15, 1, 'Волков Тимур Александрович', 'г. Гаврилов-Ям ул. Герцена д.43', '89290779999', 'images/workers/3.jpg', 7822333999, 'мужской', '2004-11-15', 'г. Гаврилов-Ям', '9 классов'),
(16, 1, 'Разгромов Владимир Владимирович', 'г. Ярославль ул. Слепнева 14А кв.12', '89054346508', 'images/workers/сотрудник.jpeg', 4665333666, 'мужской', '1995-11-15', 'г. Ярославль', 'Среднее специальное');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_product` (`id_product`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`);

--
-- Индексы таблицы `orders_has_products`
--
ALTER TABLE `orders_has_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_orders` (`id_orders`),
  ADD KEY `id_products` (`id_products`);

--
-- Индексы таблицы `Position`
--
ALTER TABLE `Position`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_position` (`id_position`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT для таблицы `orders_has_products`
--
ALTER TABLE `orders_has_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT для таблицы `Position`
--
ALTER TABLE `Position`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT для таблицы `storage`
--
ALTER TABLE `storage`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `workers`
--
ALTER TABLE `workers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `orders_has_products`
--
ALTER TABLE `orders_has_products`
  ADD CONSTRAINT `orders_has_products_ibfk_1` FOREIGN KEY (`id_orders`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `orders_has_products_ibfk_2` FOREIGN KEY (`id_products`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `storage`
--
ALTER TABLE `storage`
  ADD CONSTRAINT `storage_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `workers`
--
ALTER TABLE `workers`
  ADD CONSTRAINT `workers_ibfk_1` FOREIGN KEY (`id_position`) REFERENCES `Position` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
