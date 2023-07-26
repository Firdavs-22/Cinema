-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               8.0.30 - MySQL Community Server - GPL
-- Операционная система:         Win64
-- HeidiSQL Версия:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Дамп структуры для таблица cinema.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `password_pure` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password_hash` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` int NOT NULL,
  `status` int NOT NULL,
  `language_type` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы cinema.admin: ~5 rows (приблизительно)
INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `password_pure`, `password_hash`, `role`, `status`, `language_type`) VALUES
	(1, 'Firdavs', 'G\'aybullayev', 'firdavsgaybullayev22@gmail.com', '998909106313', '9oi8oo6io1i0o', '8f5d21ed49cdc92db958b12d237259d1', 2, 1, 1),
	(2, '田中', '田中', 'tanaka@gmail.com', '998900000000', '12345678', '25d55ad283aa400af464c76d713c07ad', 1, 1, 1);

-- Дамп структуры для таблица cinema.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title_uz` varchar(255) NOT NULL,
  `title_ru` varchar(255) NOT NULL,
  `title_eng` varchar(255) NOT NULL,
  `title_jap` varchar(255) NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы cinema.category: ~2 rows (приблизительно)
INSERT INTO `category` (`id`, `title_uz`, `title_ru`, `title_eng`, `title_jap`, `status`) VALUES
	(1, 'Dahshat', 'Ужас', 'Horor', 'ホラー', 1),
	(2, 'Boyevik', 'Боевик', 'Action', 'アクション', 1);

-- Дамп структуры для таблица cinema.favorite
CREATE TABLE IF NOT EXISTS `favorite` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `movie_id` int NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `movie_id` (`movie_id`),
  CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы cinema.favorite: ~0 rows (приблизительно)

-- Дамп структуры для таблица cinema.hall
CREATE TABLE IF NOT EXISTS `hall` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы cinema.hall: ~2 rows (приблизительно)
INSERT INTO `hall` (`id`, `title`, `status`) VALUES
	(1, 'Hall 1', 1),
	(2, 'Hall 2', 1);

-- Дамп структуры для таблица cinema.hall_place
CREATE TABLE IF NOT EXISTS `hall_place` (
  `id` int NOT NULL AUTO_INCREMENT,
  `hall_id` int NOT NULL,
  `row_title` varchar(255) NOT NULL,
  `column_title` varchar(255) NOT NULL,
  `row_position` int NOT NULL,
  `column_position` int NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hall_id` (`hall_id`),
  CONSTRAINT `hall_place_ibfk_1` FOREIGN KEY (`hall_id`) REFERENCES `hall` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы cinema.hall_place: ~2 rows (приблизительно)
INSERT INTO `hall_place` (`id`, `hall_id`, `row_title`, `column_title`, `row_position`, `column_position`, `status`) VALUES
	(1, 1, 'A', '1', 1, 1, 1),
	(2, 1, 'A', '2', 1, 2, 1),
	(3, 1, 'A', '3', 1, 3, 1),
	(4, 1, 'B', '1', 2, 1, 1),
	(5, 1, 'B', '2', 2, 2, 1),
	(6, 1, 'B', '3', 2, 3, 1);

-- Дамп структуры для таблица cinema.movie
CREATE TABLE IF NOT EXISTS `movie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title_uz` varchar(255) NOT NULL,
  `title_ru` varchar(255) NOT NULL,
  `title_eng` varchar(255) NOT NULL,
  `title_jap` varchar(255) NOT NULL,
  `description_uz` text NOT NULL,
  `description_ru` text NOT NULL,
  `description_eng` text NOT NULL,
  `description_jap` text NOT NULL,
  `created_date` timestamp NOT NULL,
  `duration` int NOT NULL,
  `status` int NOT NULL,
  `img` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы cinema.movie: ~7 rows (приблизительно)
INSERT INTO `movie` (`id`, `title_uz`, `title_ru`, `title_eng`, `title_jap`, `description_uz`, `description_ru`, `description_eng`, `description_jap`, `created_date`, `duration`, `status`, `img`) VALUES
	(1, 'Avatar 2', 'Avatar 2', 'Avatar 2', 'Avatar 2', '"Avatar: Suv yo\'li" birinchi filmidagi voqealardan o\'n yildan ko\'proq vaqt o\'tgach, Sulli oilasi (Jeyk, Neytiri va ularning bolalari), ular ortidan kelgan qiyinchiliklar va ular uzoq vaqt davom etishlari haqida hikoya qiladi. bir-birlari xavfsiz, ular tirik qolish uchun kurashgan janglar va ular boshdan kechirgan fojialar', 'Спустя более десяти лет после событий первого фильма «Аватар: Путь воды» начинается история семьи Салли (Джейк, Нейтири и их дети), неприятностей, которые преследуют их, и того, на что они идут, чтобы сохранить друг друга в безопасности, битвы, в которых они сражаются, чтобы остаться в живых, и трагедии, которые они переживают', 'Set more than a decade after the events of the first film, "Avatar: The Way of Water" launches the story of the Sully family (Jake, Neytiri, and their kids), the trouble that follows them, the lengths they go to keep each other safe, the battles they fight to stay alive, and the tragedies they endure', '第1作の出来事から10年以上後を舞台にした『アバター：ザ・ウェイ・オブ・ウォーター』は、サリー一家（ジェイク、ネイティリ、そして彼らの子供たち）の物語であり、彼らにつきまとうトラブル、互いの安全を守るための努力、生き続けるための戦い、そして彼らが耐え忍ぶ悲劇の物語である。', '2023-07-26 01:14:00', 192, 1, '1690334741.webp'),
	(2, 'John Wick 4', 'John Wick 4', 'John Wick 4', 'John Wick 4', 'Jon Uik: 4-bobda Uik yer osti dunyosidagi eng yuqori hokimiyat bo\'lgan Oliy Stolga qarshi kurashni davom ettiradi. Oliy stol qoidalarini buzgani uchun Uik "ekskomunikado" deb e\'lon qilindi - qotillar ligasidan chiqarib yuborildi va uning boshiga mukofot qo\'yildi.', 'В фильме "Джон Уик: Глава 4" Уик продолжает борьбу с Высшим столом, который является высшей инстанцией в преступном мире. За нарушение правил Высшего стола Уик был признан "экскоммуникадо" - изгнанным из лиги наемных убийц, и за его голову назначена награда.', 'In “John Wick: Chapter 4,” Wick continues his struggle against the High Table, which is the ultimate authority in the criminal world. Wick has been deemed "excommunicado" — exiled from the league of assassins — for breaking the rules of the High Table and has a bounty on his head.', 'ジョン・ウィック：チャプター4」では、ウィックが犯罪界の最高権威であるハイ・テーブルとの闘いを続ける。ウィックはハイ・テーブルの規則を破ったため、暗殺者連盟から追放される "破門者 "とみなされ、賞金をかけられている。', '2023-07-26 01:19:04', 169, 1, '1690334344.avif'),
	(3, 'Galaktika qo\'riqchilari. 3-qism', 'Стражи Галактики. Часть 3', 'Guardians of the Galaxy Vol. 3', 'ガーディアンズ・オブ・ギャラクシーVol.3', 'Piter Kvil, hali ham Gamorani yo\'qotib, koinotni va uning ittifoqchilaridan birini himoya qilish uchun uning atrofida jamoani yig\'ishi kerak.', 'Питер Квилл, все еще не оправившийся от потери Гаморы, должен сплотить вокруг себя команду, чтобы защитить вселенную, а заодно и одного из своих соратников.', 'Peter Quill, still reeling from the loss of Gamora, must rally his team around him to defend the universe along with protecting one of their own.', 'ピーター・クイルは、ガモーラを失ってまだ動揺しているが、自分たちの仲間を守るとともに、宇宙を守るために周囲のチームを結集させなければならない。', '2023-07-26 01:24:59', 149, 1, '1690334699.jpg'),
	(4, 'O\'rgimchak odam: Uyga yo\'l yo\'q', 'Человек-паук: Нет пути домой', ' Spider-Man: No Way Home', ' スパイダーマン：帰れない', 'Piter Parkerning kimligining siri butun dunyoga ma\'lum bo\'ldi. Yordam bermoqchi bo\'lgan Piter o\'zining O\'rgimchak odam ekanligini dunyoga unuttirish uchun Doktor Strenjga murojaat qiladi. Ammo afsun juda noto\'g\'ri bo\'lib chiqdi va Multiverseni yo\'q qiladi va uni dunyoni yo\'q qilishga qodir dahshatli yovuz odamlar qoldiradi. Ko\'p olam ochildi.', 'Тайна личности Питера Паркера стала известна всему миру. Отчаявшись помочь, Питер обращается к Доктору Стрэнджу, чтобы тот заставил мир забыть о том, что он Человек-паук. Но заклинание оказывается ужасно неправильным и разрушает Мультивселенную, в результате чего в ней появляются чудовищные злодеи, способные уничтожить мир. The Multiverse Unleashed.', 'Peter Parker\'s secret identity is revealed to the entire world. Desperate for help, Peter turns to Doctor Strange to make the world forget that he is Spider-Man. The spell goes horribly wrong and shatters the multiverse, bringing in monstrous villains that could destroy the world. The Multiverse Unleashed.', 'ピーター・パーカーの秘密の正体が全世界に明らかになる。絶望したピーターは、自分がスパイダーマンであることを世界から忘れさせるため、ドクター・ストレンジを頼る。しかし、この呪文は大失敗を犯し、多元宇宙を粉々に破壊してしまう。マルチバース・アンリーシュド', '2023-07-26 01:28:37', 148, 1, '1690334917.webp');

-- Дамп структуры для таблица cinema.movie_category
CREATE TABLE IF NOT EXISTS `movie_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `movie_id` int NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `movie_id` (`movie_id`),
  CONSTRAINT `movie_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `movie_category_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы cinema.movie_category: ~13 rows (приблизительно)
INSERT INTO `movie_category` (`id`, `category_id`, `movie_id`, `status`) VALUES
	(1, 2, 1, 1),
	(2, 1, 2, 1),
	(3, 2, 2, 1),
	(4, 2, 3, 1);

-- Дамп структуры для таблица cinema.movie_seance
CREATE TABLE IF NOT EXISTS `movie_seance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `movie_id` int NOT NULL,
  `seance_date` timestamp NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `language_type` int NOT NULL,
  `hall_id` int NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `movie_id` (`movie_id`),
  KEY `hall_id` (`hall_id`),
  CONSTRAINT `movie_seance_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`),
  CONSTRAINT `movie_seance_ibfk_2` FOREIGN KEY (`hall_id`) REFERENCES `hall` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы cinema.movie_seance: ~5 rows (приблизительно)
INSERT INTO `movie_seance` (`id`, `movie_id`, `seance_date`, `price`, `language_type`, `hall_id`, `status`) VALUES
	(1, 3, '2023-07-31 06:30:00', 5000.00, 1, 1, 1);

-- Дамп структуры для таблица cinema.order_place
CREATE TABLE IF NOT EXISTS `order_place` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_sheet_id` int NOT NULL,
  `hall_place_id` int NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_sheet_id` (`order_sheet_id`),
  KEY `hall_place_id` (`hall_place_id`),
  CONSTRAINT `order_place_ibfk_1` FOREIGN KEY (`order_sheet_id`) REFERENCES `order_sheet` (`id`),
  CONSTRAINT `order_place_ibfk_2` FOREIGN KEY (`hall_place_id`) REFERENCES `hall_place` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы cinema.order_place: ~2 rows (приблизительно)
INSERT INTO `order_place` (`id`, `order_sheet_id`, `hall_place_id`, `status`) VALUES
	(1, 1, 1, 1),
	(2, 1, 2, 1),
	(3, 1, 3, 1);

-- Дамп структуры для таблица cinema.order_sheet
CREATE TABLE IF NOT EXISTS `order_sheet` (
  `id` int NOT NULL AUTO_INCREMENT,
  `movie_seance_id` int NOT NULL,
  `bought_date` timestamp NOT NULL,
  `status` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `movie_id` (`movie_seance_id`) USING BTREE,
  KEY `user` (`user_id`) USING BTREE,
  CONSTRAINT `FK_order_sheet_movie_seance` FOREIGN KEY (`movie_seance_id`) REFERENCES `movie_seance` (`id`),
  CONSTRAINT `FK_order_sheet_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы cinema.order_sheet: ~0 rows (приблизительно)
INSERT INTO `order_sheet` (`id`, `movie_seance_id`, `bought_date`, `status`, `user_id`) VALUES
	(1, 1, '2023-07-26 03:34:04', 1, 1);

-- Дамп структуры для таблица cinema.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `password_pure` text NOT NULL,
  `password_hash` text NOT NULL,
  `created_date` timestamp NOT NULL,
  `language_type` int NOT NULL,
  `theme_type` int NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы cinema.user: ~2 rows (приблизительно)
INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `password_pure`, `password_hash`, `created_date`, `language_type`, `theme_type`, `status`) VALUES
	(1, '山田', '山田', 'yamada@gmail.com', '998900000000', '12345678', '12345678', '2023-07-26 03:03:25', 1, 1, 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
