CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `role` varchar(50) COLLATE utf8_czech_ci NOT NULL DEFAULT 'member',
  `twitter_id` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `fbuid` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;