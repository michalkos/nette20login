DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `password` char(41) COLLATE utf8_czech_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `twitter_id` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `fbuid` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;