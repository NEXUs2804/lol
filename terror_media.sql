
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `opiniones`;
CREATE TABLE IF NOT EXISTS `opiniones` (
  `opinion_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` TEXT DEFAULT NULL,
  `nombre_caso` TEXT DEFAULT NULL,
  `opinion` TEXT NOT NULL,
  `sugerencias` TEXT,
  `valoracion` int(11) DEFAULT NULL,
  `fecha_opinion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`opinion_id`),
  KEY `nombre_usuario` (`nombre_usuario`(255)),
  KEY `nombre_caso` (`nombre_caso`(255))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO `usuarios` (`id`, `username`, `password`) VALUES
(1, 'cocorohn', '$2y$10$oiaD7hTuC4ZRdGZaKN2YGObWRySUR26LflN0Jbyj53hetG7eWYbTi'),
(2, 'elpepe', '$2y$10$pIxVfnNOpiODlFklaaRD7uHVX6QpdUZz5rbr4b0t4psY5Jxcp5F1y');
