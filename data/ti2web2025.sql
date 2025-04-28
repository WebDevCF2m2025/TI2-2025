
SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Création de la base de données `ti2web2025`
--

DROP DATABASE IF EXISTS `ti2web2025`;
CREATE DATABASE IF NOT EXISTS `ti2web2025` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ti2web2025`;


--
-- Structure de la table `guestbook`
--

DROP TABLE IF EXISTS `guestbook`;
CREATE TABLE IF NOT EXISTS `guestbook` (
                    `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                    `firstname` varchar(100) NOT NULL,
                    `lastname` varchar(100) NOT NULL,
                    `usermail` varchar(200) NOT NULL,
                    `phone` varchar(20) NOT NULL,
                    `postcode` varchar(4) NOT NULL,
                    `message` varchar(500) NOT NULL,
                    `datemessage` datetime NOT NULL DEFAULT current_timestamp(),
                                         PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;
