-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 07:42 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `happypc2`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(4, 'Новости', '2023-01-10', '2023-01-10'),
(5, 'Статьи', '2023-01-10', '2023-01-10'),
(6, 'Железо', '2023-01-10', '2023-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `categorygames`
--

CREATE TABLE `categorygames` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categorygames`
--

INSERT INTO `categorygames` (`id`, `categoryName`, `created_at`, `updated_at`) VALUES
(1, 'шутер от первого лица', '2023-01-12 09:42:43', '2023-01-12 09:42:43'),
(4, 'рогалики', '2023-05-21 05:44:43', '2023-05-21 05:44:43'),
(5, 'открытый мир', '2023-05-21 05:44:55', '2023-05-21 05:44:55'),
(6, 'песочница', '2023-05-21 05:45:01', '2023-05-21 05:45:01'),
(9, 'Экшен', '2023-05-30 05:30:10', '2023-05-30 05:30:10'),
(10, 'Слэшер', '2023-05-30 05:30:25', '2023-05-30 05:30:25'),
(11, 'Хоррор', '2023-05-30 05:30:39', '2023-05-30 05:30:39'),
(12, 'Метроиваниа', '2023-05-30 05:30:53', '2023-05-30 05:30:53');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `body`, `user_id`, `task_id`, `created_at`, `updated_at`) VALUES
(2, 'plkjh', 1, 5, '2023-01-16', '2023-01-16'),
(3, 'asdas', 1, 5, '2023-05-21', '2023-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `datecreate` date NOT NULL,
  `category_id` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `title`, `description`, `image`, `datecreate`, `category_id`, `company`, `created_at`, `updated_at`) VALUES
(1, 'FarCry 3', 'компьютерная игра в жанре шутера от первого лица с элементами RPG, разработанная Ubisoft Montreal при участии Ubisoft Shanghai и Ubisoft Massive и изданная Ubisoft. Является третьей (не считая дополнений и спин-оффов) игрой из одноимённой серии игр. Официальный анонс состоялся 6 июня 2011 года во время пресс-конференции Ubisoft в рамках выставки E3. Выход игры состоялся 29 ноября 2012 года на PC, Xbox360 и PlayStation 3. В дальнейшем игра была выпущена на восьмое поколение игровых систем.\r\n\r\nДействие игры происходит на тропическом острове, омываемом Индийским и Тихим океанами. Игрок принимает роль Джейсона Броди, молодого американца, отправившегося с друзьями на отдых, но в дальнейшем попавшего в плен банды пиратов. После побега он прилагает все усилия, чтобы спасти своих друзей и убить главаря банды пиратов, Вааса Монтенегро.\r\n\r\nИгра достигла высоких показателей продаж. Спустя два года после релиза Ubisoft объявил, что было продано 10 млн копий Far Cry 3. 18 ноября 2014 года вышел его преемник Far Cry 4.', 'Far_Cry_3_Box_Art_PC.jpeg', '2012-11-29', 1, 'Ubisoft', '2023-01-12 07:43:31', '2023-01-12 07:43:31'),
(3, 'The binding of isaac', 'ремейк игры The Binding of Isaac, разработанный компанией Nicalis и геймдизайнером Эдмундом Макмилленом, который разработал оригинальную игру. Релиз игры состоялся 4 ноября 2014 на платформах PlayStation 4, PlayStation Vita, Microsoft Windows, Mac OS X и Linux.', 'MV5BMmE5MDRmYTAtNzkxMS00ODllLTlhMjEtOTMwYTg1NWNhZWY1XkEyXkFqcGdeQXVyMTg2NzgzMDE@._V1_.jpg', '2014-11-04', 1, 'Nicalis', '2023-05-21 05:40:33', '2023-05-21 05:40:33'),
(4, 'Grand Theft Auto III', 'компьютерная игра в жанре action-adventure, разработанная компанией DMA Design[6][7] и выпущенная Rockstar Games. Это третья по счёту и первая трёхмерная игра в серии Grand Theft Auto. Она вышла в октябре 2001 года на PlayStation 2, в мае 2002 на персональных компьютерах (она создавалась с 13 декабря 2001 как версия для ПК), и в ноябре 2003 на Xbox. 4 января 2008 года она стала доступна для скачивания с помощью интернет-сервиса цифровой дистрибуции Steam. Предыдущей игрой серии является Grand Theft Auto 2, а следующей — Grand Theft Auto: Vice City.\r\n\r\nСобытия Grand Theft Auto III происходят в вымышленном американском городе Либерти-Сити, прототипом которого послужил Нью-Йорк. Протагонистом игры выступает Клод — безымянный преступник, ставший жертвой преступного сговора своей подруги Каталины, и Мигеля, члена колумбийского наркокартеля. В игре присутствуют элементы автосимулятора и шутера от третьего лица.\r\n\r\nКонцепция игры и геймплей в сочетании с использованием 3D-движка игры впервые в данной серии игр, способствовали тому, что Grand Theft Auto III была хорошо встречена игроками и стала самой продаваемой видеоигрой 2001 года и вместе с последующими играми серии, Grand Theft Auto: Vice City и Grand Theft Auto: San Andreas, оказала значительное влияние на игровую индустрию[9] и продажи игровой приставки PlayStation 2.', 'GTA3cover.JPG', '2001-10-22', 1, 'Rockstar Games', '2023-05-21 05:42:33', '2023-05-21 05:42:33'),
(5, 'Grand Theft Auto VI', 'компьютерная игра в жанре action-adventure, девятая в серии Grand Theft Auto, выпущена 29 апреля 2008 года[1] для двух игровых приставок — PlayStation 3 и Xbox 360, также полгода спустя игру портировали на ПК (Windows). Компания Rockstar выпустила дополнения к игре, распространяя их через интернет-сервисы Xbox Live, Games for Windows — Live, PlayStation Network и в составе дискового издания Grand Theft Auto: Episodes from Liberty City; в этих дополнениях под управлением игрока находятся новые герои, и сюжеты дополнений происходят параллельно сюжету основной игры. Действие Grand Theft Auto IV происходит в вымышленном американском городе Либерти-Сити, прообразом которого послужил Нью-Йорк. В однопользовательском сюжетном режиме игрок управляет героем по имени Нико Беллик, иммигрантом из Юго-Восточной Европы (его национальность никогда не упоминается в самой игре[3]) и ветераном Югославской войны, прибывшим в Либерти-Сити в поисках богатства и ради брата Романа.\r\n\r\nЗа первую неделю продаж было реализовано свыше 6 млн копий игры на общую сумму 500 млн долларов, из них 310 млн долларов — в первый день, при затратах на производство около 100 млн долларов. За рекордный в медиа-индустрии результат по продажам в первый день и первую неделю GTA IV была включена в Книгу рекордов Гиннесса. На начало 2021 года за весь период существования GTA IV было продано более 28 млн копий игры, тем самым принеся разработчикам 2 миллиарда долларов чистой выручки от продажи[4].\r\n\r\nВ 2020 году в Steam переиздали игру в виде Grand Theft Auto IV — The Complete Edition, которое включает в себя Grand Theft Auto IV, дополнение The Ballad of Gay Tony и The Lost and Damned', '411px-Grand_Theft_Auto_IV.jpg', '2008-04-29', 5, 'Rockstar Games', '2023-05-21 05:44:11', '2023-05-22 07:19:35'),
(6, 'Metroid Dream', 'компьютерная игра в жанре action-adventure, разработанная студиями MercurySteam и Nintendo EPD для игровой консоли Nintendo Switch. Игра является продолжением Metroid Fusion (2002); в ходе Metroid Dread игровой персонаж — охотница за наградой Самус Аран — посещает планету под названием ZDR, где сталкивается с новыми и опасными врагами-роботами. Игра выдержана в традициях сайд-скроллеров, характерных для классических игр серии Metroid, также добавлены элементы стелса — Самус не может легко справиться с роботами в бою и должна избегать их. Выпуск игры состоялся 8 октября 2021 года.\r\n\r\nMetroid Dread первоначально разрабатывалась с середины 2000-х для Nintendo DS, но этот ранний проект был отменен из-за технических затруднений. Игра стала одним из редких примеров в истории компьютерных игр, когда разработка ранее отменённого проекта была возобновлена много лет спустя. Хотя другие выпущенные после Metroid Fusion игры серии были полностью трехмерными, серия Metroid вернулась к формату сайд-скроллера в 2017 году, когда вышла Metroid: Samus Returns. Создатель Metroid Ёсио Сакамото, руководивший созданием большинства двухмерных игр серии, был впечатлён талантом MercurySteam, занимавшейся разработкой игры, что привело к возобновлению сотрудничества студии с Nintendo и участию в разработке Dread', 'Metroid_Dread_Banner.png', '2021-10-08', 12, 'Nintendo', '2023-05-30 05:33:44', '2023-05-30 05:33:44'),
(7, 'Devil May Cry 4', 'видеоигра в жанре слешер, разработанная и изданная компанией Capcom. Четвёртая игра в одноимённой серии. О начале разработки игры было объявлено в марте 2007 года. Сама игра была выпущена 31 января 2008 года для платформ PlayStation 3 и Xbox 360. Версия для Windows появилась в июле того же года. В России игра была полностью локализована студией 1С и вышла лишь 5 сентября. Переиздание игры доступно как в цифровой версии, так и на дисках в 2 вариантах: Devil May Cry 4: Special Edition и коллекционном издании ограниченного тиража — Devil May Cry 4: Special Edition PIZZA BOX (последнее только для PlayStation 4 и Xbox One), а обычное издание также и для Windows. Релиз в Японии 18 июня, а в России — 23 июня 2015 года', '411px-Devil_May_Cry_4_Box_Cover.jpg', '2008-01-31', 10, 'Capcom', '2023-05-30 05:35:48', '2023-05-30 05:35:48'),
(8, 'Outlast', 'компьютерная игра в жанре survival horror от первого лица, разработанная и выпущенная компанией Red Barrels для Windows в 2013 году. Позднее были выпущены версии игры для macOS, Linux, PlayStation 4 и Xbox One. Действие Outlast происходит в обветшалой психиатрической больнице. В лечебнице герой-журналист сталкивается с кровожадно настроенными безумцами. В отличие от многих подобных игр, игровой персонаж не имеет оружия, не умеет драться и вынужден убегать и прятаться от преследующих его врагов. В 2017 году была выпущена вторая часть игры — Outlast 2.\r\n\r\nИгрок выступает в роли журналиста Майлза Апшера, управление которым производится от первого лица. С собой Майлз носит блокнот, в который в течение игры вносит заметки, и видеокамеру. Поскольку Майлз обычный человек, не владеющий никаким оружием, видеокамера — единственный предмет, который можно использовать. Он также не может драться.\r\n\r\nКамера оснащена прибором ночного видения, без которого по плохо освещенной лечебнице просто невозможно передвигаться. При использовании прибора ночного видения камера начинает быстро разряжаться, что заставляет игрока постоянно искать разбросанные повсюду батарейки.\r\n\r\nИгровой процесс включает в себя решение несложных головоломок, скрытное перемещение, а также моменты, в которых необходимо убегать от своих преследователей, преодолевая различные препятствия, и скрываться в темноте, шкафчиках для одежды, под кроватями и в других укромных местах. В игре у главного героя нет союзников, не считая отца Мартина и одного пациента, который преследует и помогает вам в течение всей игры.', 'Outlast_cover.jpg', '2017-04-25', 11, 'Red Barrels', '2023-05-30 05:41:27', '2023-05-30 05:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(5, 'Слух: в сети появился возможный слив геймплея ранней версии GTA VI', 'В сети горячо обсуждают очередную возможную утечку по Grand Theft Auto VI — в этот раз один из пользователей GTAForums выложил несколько роликов, демонстрирующих геймплей якобы ранней версии следующей части GTA.\r\nНа момент написания новости никто официально не прокомментировал «утечку» — ни известные инсайдеры, ни сама Rockstar. Ролики, опубликованные на YouTube также никто не удаляет. \r\nКроме того, пользователь, ответственный за «слив», выложил в публичный доступ около 10 тыс строчек кода предполагаемой WIP-сборки GTA VI.', 'gta_6.jpg', 6, '2023-01-10', '2023-01-10'),
(9, 'Батарея устройства Sony Project Q может быть рассчитана на 3-4 часа работы', 'На этой неделе Sony провела своё шоу и анонсировала устройство Project Q для дистанционного воспроизведения игр с PS5. Том Хендерсон, отмечавший, что Project Q выйдет в середине или конце ноября, поделился сведениями о работе устройства. \r\nПо данным инсайдера, батарея Project Q рассчитана на 3-4 часа работы. Хендерсон полагает, что устройство ждёт успех в продажах только при относительно низкой стоимости. Например, меньше $200.\r\nТак или иначе, Sony пока не называет цену Project Q. Но этой и другой информацией об устройстве должны поделиться в ближайшем будущем. \r\nНапомним, что Project Q обладает 8-дюймовым ЖК-экраном, разрешением до 1080p и 60 FPS, а также всеми функциями контроллера DualSense.', 'eb222a2db73384f1_848x477.jpg', 6, '2023-05-29', '2023-05-29'),
(10, 'Продажи Xbox Series перевалили в Британии за 2 млн копий быстрее Switch', 'Продажи Xbox Series перевалили в Британии за 2 млн копий — на это ушло 128 недель, что на 12 недель быстрее, чем у Nintendo Switch (140 недель). \r\nКонсоли принесли Microsoft 696 млн фунтов стерлингов (примерно 870,5 млн долларов) — Xbox Series заняла восьмое место в соответствующем топе платформ Британии. Кроме того, Xbox One и Xbox 360 тоже ранее обошли своих «собратьев» — на достижение этого результата у них ушло 104 и 110 недель соответственно. У оригинального Xbox, кстати, было 162 недели. \r\nСамой популярной консолью по скорости продаж в стране остаётся Nintendo Wii, которая добралась до 2 млн копий всего за 57 недель — на три недели быстрее, чем PS2. Но общие продажи Xbox 360 в результате обошли Wii. \r\n\r\n\r\nТоп консолей по скорости достижения 2 млн копий в Британии*\r\n    Nintendo Wii — 57;\r\n    PS2 — 60;\r\n    PS4 — 75; \r\n    PS5 — 98; \r\n    Xbox One — 104; \r\n    Xbox 360 — 110;\r\n    PS1 — 114;\r\n    Xbox Series — 128;\r\n    Nintendo Switch — 140;\r\n    Xbox — 162.\r\n\r\n*сбоку указано число недель', 'a68f550412fe9629_848x477.jpg', 6, '2023-05-29', '2023-05-29'),
(11, 'Asus Rog Ally будет продаваться за 700 долларов в комплекте с Game Pass и выйдет в июне', 'Портативная Asus Rog Ally будет продаваться по цене в 700 долларов (или 800 евро в Европе), а предзаказы стартуют уже сегодня. Полноценно устройство должно выйти 13 июня. Страница уже появилась в некоторых западных магазинах. \r\n\r\nЭтот вариант обладает Ryzen Z1 Extreme с 8 ядрами и 16 потоками, а также SSD на 512 ГБ. Объём оперативной памяти составит 16 ГБ, а аккумулятор обеспечивает до 8 часов автономной работы. Устройство оснащено 7-дюймовым экраном с частотой обновления 120 Гц и яркостью до 500 нит. Однако информации о тактовых частотах по-прежнему нет.\r\n\r\nВ комплекте будет поставляться подписка Xbox Game Pass Ultimate на 3 месяца. Вероятно, что Asus заключила партнёрские соглашения с Xbox Games Studio, Capcom, Jojo verse, LEvel Infinite, 505 Games, Team 17, Nacon, Techland, Squanch Games и Fatshark, чтобы обеспечить наилучший игровой опыт на Rog Ally. \r\n\r\nСудя по слухам, упрощённый вариант с AMD Z1 выйдет в третьем квартале этого года с 6 ядрами и 12 потоками.', '10495b88c3e43f52_848x477.jpg', 6, '2023-05-29', '2023-05-29'),
(12, 'Nintendo не выпустит новую консоль или улучшенную Switch до апреля 2024 года', 'Сегодня утром Nintendo рассказала о продажах Switch и игр для гибридной консоли, и показатели железа оказались меньше, чем ожидала компания.\r\n\r\nОбщие продажи Switch за финансовый год, завершившийся 31 марта, составили чуть менее 18 млн устройств. Хотя изначально компания хотела продать 21 млн консолей. В текущем финансовом году, то есть до 31 марта 2024-го, Nintendo планирует реализовать 15 млн Switch. Но в компании не до конца уверены в способности достичь таких показателей.\r\n\r\nКроме того, президент Nintendo Сюнтаро Фурукава заявил, что компания не планирует выпускать ни новой консоли, ни улучшенной Switch до конца марта 2024 года.', 'a0cd5a1159480ce6_848x477.jpg', 6, '2023-05-29', '2023-05-29'),
(13, 'Жёсткая критика игроков заставила Blizzard изменить правила «гонки» в Diablo 4', 'Огромная волна критики со стороны игроков заставила Blizzard изменить собственные правила «гонки» в Diablo 4.\r\n\r\nРечь идёт о тематическом событии, где пользователям потребуется как можно быстрее заработать 100 уровней в хардкорном режиме с опцией перманентной смерти. Первым 1000 победителям не только вручат титул «Закалённый чемпион», но ещё их увековечат на статуе Лилит в главном офисе Blizzard.\r\n\r\nПроблема заключается в том, что многие СМИ и блогеры успели оценить игру до официального релиза, а кто-то и вовсе прошёл её от начала до конца. И фанаты посчитали, что это даёт им несправедливое преимущество в той самой «гонке».\r\n\r\nГнев пользователей попытался усмирить геймдиректор Род Фергюссон, отметив, что прогресс таких игроков был удалён, но это не остановило поток критики. И теперь Blizzard всё-таки изменила правила мероприятия — те, кто играл в предрелизную версию Diablo 4 в мае, больше не могут в нём участвовать.\r\n\r\nМногие посчитали изменение справедливым, хотя кому-то показалось, что подобное событие можно было бы включить в 1 сезон проекта — так бы и обычные игроки успели ознакомиться с новинкой на уровне блогеров. Но Blizzard вряд ли будет менять правила ещё раз.\r\n\r\nРелиз самой Diablo 4 намечен на 6 июня для PlayStation, Xbox и PC (2 июня для обладателей предзаказов изданий Deluxe и Ultimate). Кстати, мнения критиков об игре станут известны уже завтра, 30 мая.', '1ef518b37aac04d08dadc270_848xH.jpg', 4, '2023-05-29', '2023-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin','moderator','') NOT NULL DEFAULT 'user',
  `name` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin@news.ee', '$2y$12$mjv/GPng4oQFohhkPl8RPucmgRDFVs/UCVP02US.r92ra09kK4d7u', 'admin', 'admin', '2021-05-05', '2021-05-05'),
(3, 'user@news.ee', '$2y$12$mjv/GPng4oQFohhkPl8RPucmgRDFVs/UCVP02US.r92ra09kK4d7u', 'user', 'user', '2021-05-05', '2021-05-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorygames`
--
ALTER TABLE `categorygames`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `task_id` (`task_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryGame` (`category_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categorygames`
--
ALTER TABLE `categorygames`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categorygames` (`id`);

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
