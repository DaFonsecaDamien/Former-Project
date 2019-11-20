-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 21 nov. 2019 à 00:04
-- Version du serveur :  10.4.6-MariaDB
-- Version de PHP :  7.3.9

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

CREATE TABLE `chat` (
  `id` int(10) NOT NULL,
  `pseudo` varchar(255) COLLATE utf8_bin NOT NULL,
  `objet` varchar(255) COLLATE utf8_bin NOT NULL,
  `contenu` varchar(255) COLLATE utf8_bin NOT NULL,
  `avatarUser` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `id` int(10) NOT NULL,
  `date` date NOT NULL,
  `titre` varchar(255) COLLATE utf8_bin NOT NULL,
  `contenu` varchar(255) COLLATE utf8_bin NOT NULL,
  `photo` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id`, `date`, `titre`, `contenu`, `photo`) VALUES
(4, '2019-11-17', 'La cantine ouvre ces portes', 'Cantine avec de la bonne nourriture', 'https://www.ville-rinxent.fr/wp-content/uploads/2019/08/cantine-midi-720x340.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `recuperation`
--

CREATE TABLE `recuperation` (
  `id` int(10) NOT NULL,
  `emailUser` varchar(30) COLLATE utf8_bin NOT NULL,
  `code` int(8) NOT NULL,
  `confirm` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` smallint(10) NOT NULL,
  `nom` varchar(255) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `adresse` varchar(255) COLLATE utf8_bin NOT NULL,
  `telephone` int(10) NOT NULL,
  `dateNaissance` date NOT NULL,
  `password` varchar(32) COLLATE utf8_bin NOT NULL,
  `role` varchar(5) COLLATE utf8_bin NOT NULL DEFAULT 'GUEST',
  `dateConnexion` date DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `adresse`, `telephone`, `dateNaissance`, `password`, `role`, `dateConnexion`, `avatar`) VALUES
(1, 'DaFonseca', 'Damien', 'da.fonseca.damien@gmail.com', '54 rue de pologne', 649760542, '1999-01-10', '393c0d330217243cbbc38de54ebba1b3', 'GUEST', '2019-11-20', 'default.png'),
(2, 'Marie', 'Pirodon', 'marie.pirodon31@gmail.com', 'Aucune', 648377426, '2019-11-04', 'f0d9f155c4361621f5ba390d4e03f7e2', 'GUEST', NULL, 'default.png'),
(3, 'Former', 'Student', 'former.student.project@gmail.com', '5 avenue du Général de Gaulle 93440 Dugny', 648377426, '0000-00-00', 'b117e99b778af0ee61c55600895318d8', 'ADMIN', '2019-11-20', 'admin.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recuperation`
--
ALTER TABLE `recuperation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `recuperation`
--
ALTER TABLE `recuperation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` smallint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
