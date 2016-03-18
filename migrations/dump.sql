-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.22-log - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных test-work
CREATE DATABASE IF NOT EXISTS `test-work` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `test-work`;


-- Дамп структуры для таблица test-work.authors
CREATE TABLE IF NOT EXISTS `authors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы test-work.authors: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` (`id`, `first_name`, `last_name`) VALUES
	(1, 'Иван', 'Иванов'),
	(2, 'Петр', 'Петров'),
	(3, 'Сидор', 'Сидоров');
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;


-- Дамп структуры для таблица test-work.books
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_create` int(10) unsigned NOT NULL,
  `date_update` int(10) unsigned NOT NULL,
  `preview` varchar(256) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__authors` (`author_id`),
  CONSTRAINT `FK__authors` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы test-work.books: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` (`id`, `author_id`, `name`, `date_create`, `date_update`, `preview`, `date`) VALUES
	(1, 1, 'test name', 1458228525, 1458235964, '/web/upload/1.jpg', '1999-12-12'),
	(2, 2, 'book 2', 1458274162, 1458274205, '/web/upload/2.png', '2003-12-17');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
