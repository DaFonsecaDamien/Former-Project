-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 18 nov. 2019 à 16:28
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `formerproject`
--
CREATE DATABASE IF NOT EXISTS `formerproject` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `formerproject`;

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) COLLATE utf8_bin NOT NULL,
  `objet` varchar(255) COLLATE utf8_bin NOT NULL,
  `contenu` varchar(255) COLLATE utf8_bin NOT NULL,
  `avatarUser` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `chat`
--

INSERT INTO `chat` (`id`, `pseudo`, `objet`, `contenu`, `avatarUser`) VALUES
(6, 'ADMIN', 'Bonjour', 'Bienvenue à vous tous !!!', 'admin.png');

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `titre` varchar(255) COLLATE utf8_bin NOT NULL,
  `contenu` varchar(255) COLLATE utf8_bin NOT NULL,
  `photo` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id`, `date`, `titre`, `contenu`, `photo`) VALUES
(1, '2019-11-17', 'Parking', 'Nouveau parking pour les élèves', 'https://resources.parkapp.com/images/parkings/585809526b67d.png\r\n'),
(2, '2019-11-17', 'BTS', 'Venez chercher les résultats', 'default.png');

-- --------------------------------------------------------

--
-- Structure de la table `recuperation`
--

DROP TABLE IF EXISTS `recuperation`;
CREATE TABLE IF NOT EXISTS `recuperation` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `emailUser` varchar(30) COLLATE utf8_bin NOT NULL,
  `code` int(8) NOT NULL,
  `confirm` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `recuperation`
--

INSERT INTO `recuperation` (`id`, `emailUser`, `code`, `confirm`) VALUES
(1, 'a@a.com', 23342492, 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` smallint(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(30) COLLATE utf8_bin NOT NULL,
  `email` varchar(40) COLLATE utf8_bin NOT NULL,
  `adresse` varchar(50) COLLATE utf8_bin NOT NULL,
  `telephone` int(10) NOT NULL,
  `dateNaissance` date NOT NULL,
  `password` varchar(32) COLLATE utf8_bin NOT NULL,
  `role` varchar(5) COLLATE utf8_bin NOT NULL DEFAULT 'GUEST',
  `dateConnexion` date DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'default.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `adresse`, `telephone`, `dateNaissance`, `password`, `role`, `dateConnexion`, `avatar`) VALUES
(12, '   admin', 'admin', 'admin@admin', 'Aucune', 600000000, '2019-10-15', '7658d426babd41d3295677c901d0ae7f', 'ADMIN', '2019-11-18', 'default.png'),
(23, ' aa ', 'aa', 'a@a.com', '54 rue ', 600000000, '2019-11-13', '3d558122fcac9ea5fdc9ee8eccf8f433', 'GUEST', '2019-11-17', 'default.png'),
(24, 'DaFonseca', 'Damien', 'demmonx99@msn.com', '54 rue de pologne', 600000000, '2019-11-14', 'ebc58ab2cb4848d04ec23d83f7ddf985', 'GUEST', '2019-11-17', 'default.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
