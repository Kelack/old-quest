-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 27 2021 г., 22:27
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `old quests`
--

-- --------------------------------------------------------

--
-- Структура таблицы `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) UNSIGNED NOT NULL,
  `id_quest` int(11) UNSIGNED NOT NULL,
  `Nickname` varchar(30) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='бронирование';

--
-- Дамп данных таблицы `booking`
--

INSERT INTO `booking` (`id_booking`, `id_quest`, `Nickname`, `date`) VALUES
(2, 1, 'nika', '2021-01-02'),
(3, 1, 'admin', '2021-01-22'),
(4, 6, 'admin', '2021-01-27'),
(7, 10, 'admin', '2021-02-05');

-- --------------------------------------------------------

--
-- Структура таблицы `customer`
--

CREATE TABLE `customer` (
  `Nickname` varchar(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Number` varchar(13) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Admin` varchar(3) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Пользователь';

--
-- Дамп данных таблицы `customer`
--

INSERT INTO `customer` (`Nickname`, `Name`, `Number`, `Password`, `Admin`) VALUES
('admin', 'admin', 'admin', 'admin', 'yes'),
('admin1', 'admin', 'admin', 'admin', 'no'),
('Kiruha', 'Кирилл', '+375255157407', '328', 'no'),
('nika', 'Никита', '+375255157407', '24671', 'no');

-- --------------------------------------------------------

--
-- Структура таблицы `inf_quest`
--

CREATE TABLE `inf_quest` (
  `id_inf_quest` int(11) UNSIGNED NOT NULL,
  `name_category` varchar(30) NOT NULL,
  `number_of_players` varchar(30) NOT NULL,
  `time` varchar(30) NOT NULL,
  `complexity` int(1) UNSIGNED NOT NULL COMMENT 'сложность',
  `fear_level` int(1) UNSIGNED NOT NULL COMMENT 'уровень страха',
  `year` int(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='информация о квесте';

--
-- Дамп данных таблицы `inf_quest`
--

INSERT INTO `inf_quest` (`id_inf_quest`, `name_category`, `number_of_players`, `time`, `complexity`, `fear_level`, `year`) VALUES
(1, 'Квест', '2-6                           ', '60 мин                        ', 2, 0, 12),
(2, 'Перформанс', '2-5', '60 мин', 2, 1, 16),
(3, 'Перформанс', '2-5', '60 мин', 2, 3, 16),
(4, 'Перформанс', '2-6', '80 мин', 3, 0, 15),
(5, 'Перформанс', '2-5                           ', '60 мин                        ', 2, 2, 16),
(11, 'Экшн-игра', '2-5', '60 мин', 0, 0, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `quest`
--

CREATE TABLE `quest` (
  `id_quest` int(11) UNSIGNED NOT NULL,
  `id_inf_quest` int(11) UNSIGNED NOT NULL,
  `name_quest` varchar(30) NOT NULL,
  `organizer` varchar(30) NOT NULL,
  `address` varchar(60) NOT NULL,
  `number_organizer` varchar(13) NOT NULL,
  `price` int(11) UNSIGNED NOT NULL,
  `description` varchar(2000) NOT NULL COMMENT 'описание',
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='квест';

--
-- Дамп данных таблицы `quest`
--

INSERT INTO `quest` (`id_quest`, `id_inf_quest`, `name_quest`, `organizer`, `address`, `number_organizer`, `price`, `description`, `photo`) VALUES
(1, 1, 'Братство масонов', 'Пинкертон', 'м. Фрунзенская, ул. Короля, д. 18', '+375255157407', 45, 'Множеством знаний владеют масоны. Простые смертные даже не догадываются, что за самыми громкими событиями в истории человечества стоят именно они. Что же произойдет, если эти знания попадут не в те руки?\r\n\r\n1875 год. По всей Европе прокатилась волна похищений древних артефактов и убийств их хранителей. Братство масонов подозревает в предательстве одного из своих посвященных, а Алан Пинкертон бежит по следу предателя. Вам, помощникам знаменитого детектива, предстоит пробраться в дом коварного отступника, полный загадок и таинственных символов, разоблачить заговор и, возможно, спасти человечество.', 'pinkerton_bratstvo_masonov.jpg'),
(4, 2, 'Подземелье Дракулы          ', 'Ящик Пандоры (Минск)', 'м. Площадь Якуба Коласа, пр-т Независимости, д. 58, к. 1', '+375291621010', 50, 'Вы оказались в подземелье Дракулы, в котором зло встречается на каждом шагу и где монстры, живущие в глубине человеческих кошмаров, обретают форму. Вам нужно сразиться против нечистых сил и освободить мир от порождений ада. Сумеете ли вы справиться с поставленной задачей?', 'podzemele_drakuly.jpg'),
(5, 3, 'Проклятие Эмили. Часть 1', 'Ящик Пандоры', 'м. Пролетарская, ул. Рыбалко, д. 17', '+375291621010', 60, 'В начале шестидесятых в собственном доме нашли повешенной молодую девушку. Поговаривают, что она была одержима демоном. Однако история окутана тайной. Ходили слухи, что девушку кто-то преследовал. Многие жители города по-прежнему верят, что этот кто-то долго издевался над Эмили, а потом убил ее.\r\n\r\nНаше время. Случайно узнав об этой жуткой истории, вы идете в злосчастное место, чтобы понять, что же случилось с Эмили на самом деле. Но что происходит? Вы слышите крики, мольбы о помощи – кровь стынет в жилах. Воздух сгущается. Все как будто реально. Словно вы находитесь в далеком прошлом в чьих-то воспоминаниях и становитесь очевидцами тех жутких событий.', 'proklyatie_emili.jpg'),
(6, 4, 'Проникновение 2.0.', 'Request', 'м. Площадь Якуба Коласа, ул. Веры Хоружей, д. 29', '+375447000012', 80, 'После не самой удачной миссии вашу команду и всех подельников объявили в розыск. Один из них ожидает приговора. Уже невозможно ничего доказать, но побороться за справедливость вы обязаны.\r\n\r\nВы попадаете в тюрьму строгого режима, план спасения до гениального прост. Вам надо успеть до исполнения наказания достать подельника из цепких лап правосудия, чтобы остальные личности не смогли раскрыть. Но жестокость и беззаконие, творящиеся по обе стороны решетки, ставят в тупик и с каждой минутой уменьшают шансы на успех.\r\n\r\nИ самый важный вопрос к вам, заключенные: «Совершить побег – точно значит убежать?»', 'proniknovenie_20.jpg'),
(7, 5, '1408. Отель с призраками', 'ящик пандоры', 'м. Площадь Якуба Коласа, пр-т Независимости, д. 58, к. 1', '+375291621010', 50, 'Известный писатель Майк Энслин стал последней жертвой номера 1408. За время существования отеля в номере погибло 42 человека, и никто из них не сумел продержаться в нем больше часа. Но вы, упрямцы, конечно же, не верите в существование загробной жизни и привидений и настаиваете на том, чтобы вас заселили в 1408, даже не предполагая, каким кошмаром обернется предстоящая ночь.', '1408_otel_s_prizrakami.jpg'),
(10, 11, 'Форт Боярд', 'Ящик Пандоры', 'м. Площадь Якуба Коласа, ул. Богдановича, д. 53 А', '+375291621010', 55, 'Поговаривают, старинная темница, известная как форт Боярд, таит в себе много неразгаданных тайн. А главное – в ней спрятаны сокровища, которые до сегодняшнего дня никто не смог найти. Форт Боярд – необычное место. Чтобы заполучить заветный приз, вам придется пройти ряд испытаний, которые проверят вас на прочность, выносливость и командный дух. Это вам не загадки решать, здесь по-настоящему придется поработать телом! Слабо рискнуть похитить заветные сокровища?', 'fort_boyard.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `report`
--

CREATE TABLE `report` (
  `id_report` int(11) UNSIGNED NOT NULL,
  `id_booking` int(11) UNSIGNED NOT NULL,
  `status` varchar(30) NOT NULL COMMENT 'был или не был квест',
  `comments` varchar(200) NOT NULL COMMENT 'о проведенной игре, о людях'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Отчет о проведение игры';

--
-- Дамп данных таблицы `report`
--

INSERT INTO `report` (`id_report`, `id_booking`, `status`, `comments`) VALUES
(1, 2, 'был                           ', 'Ничего не ломали, все понравилось, на инстаграмм обещали подписаться, придут на другие квесты');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `booking`
--
ALTER TABLE `booking`
  ADD UNIQUE KEY `id` (`id_booking`);

--
-- Индексы таблицы `customer`
--
ALTER TABLE `customer`
  ADD UNIQUE KEY `id` (`Nickname`);

--
-- Индексы таблицы `inf_quest`
--
ALTER TABLE `inf_quest`
  ADD UNIQUE KEY `id` (`id_inf_quest`);

--
-- Индексы таблицы `quest`
--
ALTER TABLE `quest`
  ADD UNIQUE KEY `id` (`id_quest`);

--
-- Индексы таблицы `report`
--
ALTER TABLE `report`
  ADD UNIQUE KEY `id` (`id_report`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `inf_quest`
--
ALTER TABLE `inf_quest`
  MODIFY `id_inf_quest` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `quest`
--
ALTER TABLE `quest`
  MODIFY `id_quest` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `report`
--
ALTER TABLE `report`
  MODIFY `id_report` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
