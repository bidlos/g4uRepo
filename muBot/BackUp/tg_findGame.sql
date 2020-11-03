-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Окт 29 2020 г., 13:40
-- Версия сервера: 10.3.23-MariaDB-log
-- Версия PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `wrw_game`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tg_findGame`
--

CREATE TABLE IF NOT EXISTS `tg_findGame` (
  `id` int(11) NOT NULL,
  `id_one` int(11) NOT NULL,
  `id_two` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tg_findGame`
--

INSERT INTO `tg_findGame` (`id`, `id_one`, `id_two`, `status`) VALUES
(20, 415746338, NULL, 1),
(22, 460625531, 415746338, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tg_findGame`
--
ALTER TABLE `tg_findGame`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tg_findGame`
--
ALTER TABLE `tg_findGame`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
