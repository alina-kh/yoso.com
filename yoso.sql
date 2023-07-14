-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.29-0ubuntu0.18.04.1 - (Ubuntu)
-- Операционная система:         Linux
-- HeidiSQL Версия:              11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных yoso
CREATE DATABASE IF NOT EXISTS `yoso` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `yoso`;

-- Дамп структуры для таблица yoso.requests
CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` char(50) NOT NULL,
  `email` mediumtext NOT NULL,
  `phone` mediumtext NOT NULL,
  `address` mediumtext CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `message` mediumtext CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yoso.requests: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
INSERT INTO `requests` (`id`, `login`, `email`, `phone`, `address`, `message`) VALUES
	(1, 'alex1', 'alex@gmail.com', '12345678900', 'Ð™Ð¾ÑˆÐºÐ°Ñ€-Ð¾Ð»Ð°\r\n', 'qwerty'),
	(2, 'marlh1', 'mark@mark.com', '23456789001', 'Ð™Ð¾ÑˆÐºÐ°Ñ€-Ð¾Ð»Ð°\r\n', 'qwerty'),
	(5, 'helga1', 'olga@ola.vom', '45678912300', 'Ð™Ð¾ÑˆÐºÐ°Ñ€-Ð¾Ð»Ð°\r\n', 'qwerty'),
	(6, 'marlh1', 'alinka.gazizova@gmail.com', '89877206886', 'Ð™Ð¾ÑˆÐºÐ°Ñ€-Ð¾Ð»Ð°\r\n', 'qwerty'),
	(7, 'marlh1', 'alinka.gazizova@gmail.com', '89877206886', 'Ð™Ð¾ÑˆÐºÐ°Ñ€-Ð¾Ð»Ð°\r\n', 'qwerty dfghj ertyu khfss '),
	(8, 'helga1', 'alinka.gazizova@gmail.com', '89877206886', 'Ð™Ð¾ÑˆÐºÐ°Ñ€-Ð¾Ð»Ð°\r\n', '7777777777777777777777777'),
	(9, 'helga1', 'alinka.gazizova@gmail.com', '89877206886', 'Ð™Ð¾ÑˆÐºÐ°Ñ€-Ð¾Ð»Ð°\r\n', '7777777777777777777777777'),
	(10, 'helga1', 'alinka.gazizova@gmail.com', '89877206886', 'Ð™Ð¾ÑˆÐºÐ°Ñ€-Ð¾Ð»Ð°\r\n', 'qqqqqqqqqqqqqqqqqqqqqqqq'),
	(11, 'helga1', 'alinka.gazizova@gmail.com', '89877206886', 'Ð™Ð¾ÑˆÐºÐ°Ñ€-Ð¾Ð»Ð°\r\n', 'qqqqqqqqqqqqqqqqqqqqqqqq'),
	(12, 'alex1', 'alinka.gazizova@gmail.com', '89877206886', 'Ð™Ð¾ÑˆÐºÐ°Ñ€-Ð¾Ð»Ð°\r\n', 'qqqqqqqqqqqqqqq'),
	(13, 'alex1', 'alinka.gazizova@gmail.com', '89877206886', 'Ð™Ð¾ÑˆÐºÐ°Ñ€-Ð¾Ð»Ð°\r\n', 'qqqqqqqqqqqqqqq'),
	(14, 'helga1', 'alinka.gazizova@gmail.com', '89877206886', 'Ð™Ð¾ÑˆÐºÐ°Ñ€-Ð¾Ð»Ð°\r\n', '11111111111111111'),
	(15, 'helga1', 'alinka.gazizova@gmail.com', '89877206886', 'Ð™Ð¾ÑˆÐºÐ°Ñ€-Ð¾Ð»Ð°\r\n', '11111111111111111'),
	(16, 'helga1', 'alinka.gazizova@gmail.com', '89877206886', 'Ð™Ð¾ÑˆÐºÐ°Ñ€-Ð¾Ð»Ð°\r\n', '11111111111111111'),
	(17, 'marlh1', 'alinka.gazizova@gmail.com', '89877206886', 'Ð™Ð¾ÑˆÐºÐ°Ñ€-Ð¾Ð»Ð°\r\n', '11111111111111111'),
	(18, 'alex1', 'alinka.gazizova@gmail.com', '89877206886', 'Ð™Ð¾ÑˆÐºÐ°Ñ€-Ð¾Ð»Ð°\r\n', '5555555555555555'),
	(19, 'helga1', 'alinka.gazizova@gmail.com', '89877206886', 'Ð™Ð¾ÑˆÐºÐ°Ñ€-Ð¾Ð»Ð°\r\n', '888888888888888888888'),
	(20, 'alex1', 'alinka.gazizova@gmail.com', '89877206886', 'Ð™Ð¾ÑˆÐºÐ°Ñ€-Ð¾Ð»Ð°\r\n', '1111111111111'),
	(21, 'alex1', 'alinka.gazizova@gmail.com', '89877206886', 'Ð™Ð¾ÑˆÐºÐ°Ñ€-Ð¾Ð»Ð°\r\n', '1111111111111'),
	(22, 'alex1', 'alinka.gazizova@gmail.com', '89877206886', 'Ð™Ð¾ÑˆÐºÐ°Ñ€-Ð¾Ð»Ð°\r\n', '1111111111111'),
	(23, 'alex1', 'alinka.gazizova@gmail.com', '89877206886', 'Ð™Ð¾ÑˆÐºÐ°Ñ€-Ð¾Ð»Ð°\r\n', '111111111111111'),
	(24, 'marlh1', 'alinka.gazizova@gmail.com', '89877206886', 'Ð™Ð¾ÑˆÐºÐ°Ñ€-Ð¾Ð»Ð°\r\n', '1111111111111'),
	(25, 'alex1', 'alinka.gazizova@gmail.com', '89877206886', 'Ð™Ð¾ÑˆÐºÐ°Ñ€-Ð¾Ð»Ð°\r\n', '4444444444444'),
	(26, 'alex1', 'alinka.gazizova@gmail.com', '89877206886', 'Ð™Ð¾ÑˆÐºÐ°Ñ€-Ð¾Ð»Ð°\r\n', '4444444444444'),
	(27, 'alex1', 'alinka.gazizova@gmail.com', '89877206886', 'Ð™Ð¾ÑˆÐºÐ°Ñ€-Ð¾Ð»Ð°\r\n', '444444444444444'),
	(28, 'alex1', 'alinka.gazizova@gmail.com', '89877206886', 'Ð™Ð¾ÑˆÐºÐ°Ñ€-Ð¾Ð»Ð°\r\n', '444444444444444444'),
	(29, 'alex1', 'alinka.gazizova@gmail.com', '89877206886', 'Ð™Ð¾ÑˆÐºÐ°Ñ€-Ð¾Ð»Ð°\r\n', '11111111111111'),
	(30, 'marlh1', 'alinka.gazizova@gmail.com', '89877206886', 'Ð™Ð¾ÑˆÐºÐ°Ñ€-Ð¾Ð»Ð°\r\n', '111111111111111111111'),
	(31, 'alex1', 'alinka.gazizova@gmail.com', '89877206886', 'Ð™Ð¾ÑˆÐºÐ°Ñ€-Ð¾Ð»Ð°\r\n', '444444444444'),
	(32, 'marlh1', '444444444444@qqqqqqqqq.ru', '89877206886', 'Ð™Ð¾ÑˆÐºÐ°Ñ€-Ð¾Ð»Ð°\r\n', '444444444444444'),
	(33, 'qw23', 'alinka.gazizova@gmail.com', '89877206886', 'Ð™Ð¾ÑˆÐºÐ°Ñ€-Ð¾Ð»Ð°\r\n', '1111111111111');
/*!40000 ALTER TABLE `requests` ENABLE KEYS */;

-- Дамп структуры для таблица yoso.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` char(50) NOT NULL,
  `name` char(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yoso.users: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `login`, `name`) VALUES
	(1, 'alex1', 'aleksandr'),
	(2, 'marlh1', 'mark'),
	(3, 'helga1', 'olga'),
	(4, 'qw23', 'max');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
