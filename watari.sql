-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 24 2016 г., 15:27
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `watari`
--

-- --------------------------------------------------------

--
-- Структура таблицы `forum_forums`
--

CREATE TABLE IF NOT EXISTS `forum_forums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Форуми' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_autor` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `head` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Новини' AUTO_INCREMENT=33 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `id_autor`, `date`, `head`, `text`, `likes`) VALUES
(20, 1, 1374264692, 'івап', 'іварфаіфіва', 8),
(21, 1, 1374265028, 'кеупкаві', 'еукцафс', 1),
(22, 1, 1374265033, 'еонкер', 'уоекнре', 0),
(23, 1, 1374265036, 'глеукное', 'оевал', 0),
(24, 1, 1374265040, 'кнглкуег', 'лвглкегл', 0),
(25, 1, 1374265044, 'дкеорвап', 'дкуленкоева', 0),
(26, 1, 1374265048, 'дкегнлкое', 'рклекноуерап', 0),
(27, 1, 1374265331, 'лкноруе', 'кців', 0),
(28, 1, 1374265337, 'ркерів', 'рцкерва', 0),
(29, 1, 1374265341, 'рцуерва', 'рцуварів', 0),
(30, 1, 1374265352, 'овапрів', 'опровап', 0),
(31, 1, 1374491091, 'jdgfhdsfg', '[b]sdghdsfgdsfg[/b]', 0),
(32, 1, 1376403966, 'ОАПНР', 'опаоапл а [b]варопро[/b] овпровао', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `news_delete`
--

CREATE TABLE IF NOT EXISTS `news_delete` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_autor` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `head` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `likes` int(11) NOT NULL,
  `lost_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Видалені новини' AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `news_delete`
--

INSERT INTO `news_delete` (`id`, `id_autor`, `date`, `head`, `text`, `likes`, `lost_id`) VALUES
(8, 1, 1374179563, 'Сайт в процесі розробки', 'Вибачте, але сайт поки, що не працюю по тій причині, що знаходиться в процесі розробки. Поки, що пишуться і вливаються нові скріпти. Порошу вибачення за створені затримки.', 1, 7),
(9, 1, 1374180635, 'Сайт в процесі розробки', 'Вибачте, але сайт поки, що не працюю по тій причині, що знаходиться в процесі розробки. Поки, що пишуться і вливаються нові скріпти. Порошу вибачення за створені затримки.', 0, 8),
(10, 1, 1374224499, 'Сайт в процесі розробки', 'Вибачте, але сайт поки, що не працюю по тій причині, що знаходиться в процесі розробки. Поки, що пишуться і вливаються нові скріпти. Порошу вибачення за створені затримки.', 0, 10),
(11, 1, 1374224666, 'Сайт в процесі розробки', 'Вибачте, але сайт поки, що не працюю по тій причині, що знаходиться в процесі розробки. Поки, що пишуться і вливаються нові скріпти. Порошу вибачення за створені затримки.', 0, 11),
(12, 1, 1374224477, 'Сайт в процесі розробки', '[b]Вибачте[/b], але сайт поки-що не працюю по тій причині, що знаходиться в процесі розробки. Поки-що пишуться і вливаються нові скрипти. Порошу вибачення за створені затримки.', 2, 9);

-- --------------------------------------------------------

--
-- Структура таблицы `personage`
--

CREATE TABLE IF NOT EXISTS `personage` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Персонажі' AUTO_INCREMENT=20 ;

--
-- Дамп данных таблицы `personage`
--

INSERT INTO `personage` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `personage` int(11) NOT NULL,
  `user_group` int(11) NOT NULL DEFAULT '1',
  `email` varchar(45) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `date_registration` int(11) NOT NULL,
  `date_end` int(11) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar/not_avatar.png',
  `count_personal_message` int(11) NOT NULL DEFAULT '20',
  `count_topick_message` int(11) NOT NULL DEFAULT '10',
  `count_gbook_message` int(11) NOT NULL DEFAULT '20',
  `count_news` int(11) NOT NULL DEFAULT '10',
  `time_grinvith` varchar(5) NOT NULL DEFAULT '0',
  `count_create_forum` int(11) NOT NULL DEFAULT '0',
  `count_cteate_topick` int(11) NOT NULL DEFAULT '0',
  `count_create_topick_message` int(11) NOT NULL DEFAULT '0',
  `count_create_personal_message` int(11) NOT NULL DEFAULT '0',
  `count_create_news` int(11) NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Користувачі' AUTO_INCREMENT=20 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `name`, `password`, `personage`, `user_group`, `email`, `age`, `date_registration`, `date_end`, `avatar`, `count_personal_message`, `count_topick_message`, `count_gbook_message`, `count_news`, `time_grinvith`, `count_create_forum`, `count_cteate_topick`, `count_create_topick_message`, `count_create_personal_message`, `count_create_news`, `sex`) VALUES
(3, '321', '321', 'caf1a3dfb505ffed0d024130f58c5cfa', 3, 1, NULL, NULL, 1373620481, 1373795360, 'avatar/not_avatar.png', 20, 10, 20, 10, '0', 0, 0, 0, 0, 0, 1),
(4, 'ewq', 'ewq', '4d1ea1367acf0560c6716dd076a84d7f', 4, 1, NULL, NULL, 1373632992, 1373632992, 'not_avatar.png', 20, 10, 20, 10, '0', 0, 0, 0, 0, 0, 1),
(5, 'asd', 'asd', '7815696ecbf1c96e6894b779456d330e', 5, 1, NULL, NULL, 1373633077, 1374491398, 'not_avatar.png', 20, 10, 20, 10, '0', 0, 0, 0, 0, 0, 1),
(6, 'dsa', 'dsa', '5f039b4ef0058a1d652f13d612375a5b', 6, 1, NULL, NULL, 1373633139, 1373633139, 'not_avatar.png', 20, 10, 20, 10, '0', 0, 0, 0, 0, 0, 0),
(7, 'zxc', 'zxc', '5fa72358f0b4fb4f2c5d7de8c9a41846', 7, 1, NULL, NULL, 1373633164, 1373633362, 'not_avatar.png', 20, 10, 20, 10, '0', 0, 0, 0, 0, 0, 0),
(8, 'qwer', 'qewr', '962012d09b8170d912f0669f6d7d9d07', 8, 1, NULL, NULL, 1373633385, 1373633395, 'not_avatar.png', 20, 10, 20, 10, '0', 0, 0, 0, 0, 0, 0),
(9, 'rewq', 'reqw', 'ca092c71d6be4e9dd735fbceb0890093', 9, 1, NULL, NULL, 1373633418, 1373633418, 'not_avatar.png', 20, 10, 20, 10, '0', 0, 0, 0, 0, 0, 0),
(10, 'qaz', 'qaz', '4eae18cf9e54a0f62b44176d074cbe2f', 10, 1, NULL, NULL, 1373633470, 1374489259, 'not_avatar.png', 20, 10, 20, 10, '0', 0, 0, 0, 0, 0, 0),
(11, 'xcv', 'xcv', '146b65fd2004858b1c615bc8cf8b8a5b', 11, 1, NULL, NULL, 1373634542, 1373634542, 'not_avatar.png', 20, 10, 20, 10, '0', 0, 0, 0, 0, 0, 1),
(12, 'Суджин', 'Сергій', 'b2c843f86b1e213e450b617daa8e5142', 13, 1, 'pedorenko.sergsi@mail.ru', 780955200, 1373634719, 1373812142, 'avatar/avatar_13.jpg', 20, 10, 20, 10, '-1', 0, 0, 0, 0, 0, 1),
(13, 'vcx', 'vcx', 'a13c0a4090cf2fc9504438b5a31cbf73', 12, 1, NULL, NULL, 1373634559, 1373812252, 'not_avatar.png', 20, 10, 20, 10, '0', 0, 0, 0, 0, 0, 0),
(14, 'rty', 'rty', '24113791d2218cb84c9f0462e91596ef', 14, 1, 'rty@rty', NULL, 1373710241, 1373710320, 'not_avatar.png', 20, 10, 20, 10, '0', 0, 0, 0, 0, 0, 0),
(15, 'bnm', 'bnm', 'bd93b91d4a5e9a7a5fcd1fad5b9cb999', 15, 1, 'bnm@bnm', NULL, 1373710284, 1373710295, 'not_avatar.png', 20, 10, 20, 10, '0', 0, 0, 0, 0, 0, 1),
(16, '123', '123', '4297f44b13955235245b2497399d7a93', 15, 1, '123@123', NULL, 1388842695, 1388842719, 'avatar/not_avatar.png', 20, 10, 20, 10, '0', 0, 0, 0, 0, 0, 1),
(17, 'wqe', 'wqe', 'e176544d44bdd88b9b3f259f80d9abef', 16, 1, 'wqe@wqe', NULL, 1398255173, 1398255173, 'avatar/not_avatar.png', 20, 10, 20, 10, '0', 0, 0, 0, 0, 0, 1),
(18, 'fhgjj', 'qwe', 'efe6398127928f1b2e9ef3207fb82663', 16, 1, 'qwe@qwe', NULL, 1399745500, 1415784995, 'avatar/not_avatar.png', 20, 10, 20, 10, '0', 0, 0, 0, 0, 0, 1),
(19, 'sdg', 'fgh', 'efe6398127928f1b2e9ef3207fb82663', 17, 1, 'dsgsdgf@fgsdfg', NULL, 1415784953, 1415784953, 'avatar/not_avatar.png', 20, 10, 20, 10, '0', 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Групи користувачів' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `user_message`
--

CREATE TABLE IF NOT EXISTS `user_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_out` int(11) NOT NULL,
  `id_in` int(11) NOT NULL,
  `show` int(1) NOT NULL DEFAULT '0',
  `date` int(11) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Особисті повідомлення' AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `user_message`
--

INSERT INTO `user_message` (`id`, `id_out`, `id_in`, `show`, `date`, `text`) VALUES
(1, 1, 2, 0, 1374935969, '[b]Привіт))[/b]'),
(2, 1, 2, 0, 1374938026, '[b][u]dsfgs[/u][/b]'),
(3, 1, 2, 0, 1374938987, '[b][u]dsfgs[/u][/b]'),
(4, 1, 2, 1, 1374938988, '[b][u]dsfgs[/u][/b]'),
(5, 1, 2, 0, 1374938989, '[b][u]dsfgs[/u][/b]'),
(6, 1, 2, 0, 1374938990, '[b][u]dsfgs[/u][/b]'),
(7, 1, 2, 0, 1374938991, '[b][u]dsfgs[/u][/b]'),
(8, 1, 2, 0, 1374938992, '[b][u]dsfgs[/u][/b]'),
(9, 1, 2, 0, 1374940459, 'gerdsfgtshdsfhdshg sfhsdfghdsfg dsfgsd\nfg dsf\ng dsf\n g\n[b]dsfgdsfggsdfgsdf[/b]\n\n[i]sdfgdsfgdsfgsdfgdsfg[/i]\n\n[u]sdfghadfgasgadfg[/u]\nsdfgsdfgdsfgdsfg\n\n[u][i][b]sdfgsdfgdsfgdsfgdsfhgasfg[/b][/i][/u]'),
(11, 1, 2, 0, 1375272731, 'Привіт))'),
(12, 1, 2, 0, 1375272756, 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww'),
(13, 1, 2, 0, 1375272778, 'WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW'),
(14, 1, 3, 0, 1375907260, 'oluiymndfbsdfhzbsfns'),
(15, 2, 1, 0, 1375909673, 'sdfhadfadadfga\r\ngasfgadfg'),
(16, 1, 2, 0, 1378068929, 'retdyuhujkl;');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
