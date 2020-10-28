-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 28 oct. 2020 à 22:02
-- Version du serveur :  5.7.24
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `app-contact-db`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_firstname` varchar(50) NOT NULL,
  `contact_lastname` varchar(50) NOT NULL,
  `contact_phone` tinytext NOT NULL,
  `ext_user_id` int(11) NOT NULL,
  PRIMARY KEY (`contact_id`),
  KEY `ext_user_id` (`ext_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_firstname`, `contact_lastname`, `contact_phone`, `ext_user_id`) VALUES
(8, 'Victor', 'Gaubin', '0651008234', 1),
(9, 'Léa', 'Rosiak', '0651008235', 2),
(12, 'Pascal', 'Rosiak', '0102030201', 1),
(15, 'Momo', 'Henni', '0734729193', 3);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_mail` varchar(50) NOT NULL,
  `user_firstname` varchar(50) NOT NULL,
  `user_lastname` varchar(50) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `ext_user_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_mail`, `user_firstname`, `user_lastname`, `user_password`, `ext_user_id`) VALUES
(1, 'vic@vic.fr', 'victor', 'gaubin', '$2y$10$YCvrquQ4nrM2BIcmiDviT.7sPp18hXwiD1Tena1ValtsQwW58RGqe', 0),
(2, 'alan@alan.fr', 'alan', 'akra', '$2y$10$cTw5vLD01osmHp/N8XD6r.5ut.6YBu3/AWekL5FwQDSYYDRsiWMfC', 2),
(3, 'philippe@gaubin.fr', 'philippe', 'gaubin', '$2y$10$E5Oc43q6C.ZBqDKz7x5pie/t8o44pIglBBa6ClvmFIwoyjNC1UjZi', 3),
(4, 'alane@alane.fr', 'Alane', 'Akrae', '$2y$10$D41Kv3zh2ZiSD1/LCql/vuVYMwsu1QIXr1xvIHALprGzD68cfjEOm', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`ext_user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
