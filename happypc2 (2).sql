-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2023 at 07:18 AM
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
(2, 'Afsfa ads', '2023-01-16 08:43:14', '2023-01-16 08:43:14');

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
(2, 'plkjh', 1, 5, '2023-01-16', '2023-01-16');

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
(1, 'FarCry 3', 'компьютерная игра в жанре шутера от первого лица с элементами RPG, разработанная Ubisoft Montreal при участии Ubisoft Shanghai и Ubisoft Massive и изданная Ubisoft. Является третьей (не считая дополнений и спин-оффов) игрой из одноимённой серии игр. Официальный анонс состоялся 6 июня 2011 года во время пресс-конференции Ubisoft в рамках выставки E3. Выход игры состоялся 29 ноября 2012 года на PC, Xbox360 и PlayStation 3. В дальнейшем игра была выпущена на восьмое поколение игровых систем.\r\n\r\nДействие игры происходит на тропическом острове, омываемом Индийским и Тихим океанами. Игрок принимает роль Джейсона Броди, молодого американца, отправившегося с друзьями на отдых, но в дальнейшем попавшего в плен банды пиратов. После побега он прилагает все усилия, чтобы спасти своих друзей и убить главаря банды пиратов, Вааса Монтенегро.\r\n\r\nИгра достигла высоких показателей продаж. Спустя два года после релиза Ubisoft объявил, что было продано 10 млн копий Far Cry 3. 18 ноября 2014 года вышел его преемник Far Cry 4.', 'Far_Cry_3_Box_Art_PC.jpeg', '2012-11-29', 1, 'Ubisoft', '2023-01-12 07:43:31', '2023-01-12 07:43:31');

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
(5, 'Слух: в сети появился возможный слив геймплея ранней версии GTA VI', 'В сети горячо обсуждают очередную возможную утечку по Grand Theft Auto VI — в этот раз один из пользователей GTAForums выложил несколько роликов, демонстрирующих геймплей якобы ранней версии следующей части GTA.\r\nНа момент написания новости никто официально не прокомментировал «утечку» — ни известные инсайдеры, ни сама Rockstar. Ролики, опубликованные на YouTube также никто не удаляет. \r\nКроме того, пользователь, ответственный за «слив», выложил в публичный доступ около 10 тыс строчек кода предполагаемой WIP-сборки GTA VI.', 'gta_6.jpg', 6, '2023-01-10', '2023-01-10');

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
(2, 'moderator@news.ee', '$2y$10$ZjNlPAtOQPNZ4bn5Vz3xE.WDqPH80zwkgF1SKaNNPQ2xwkkYGY.Re', 'moderator', 'moderator', '2021-05-05', '2023-01-10'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categorygames`
--
ALTER TABLE `categorygames`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
