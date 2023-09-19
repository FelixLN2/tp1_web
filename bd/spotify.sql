-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 19 sep. 2023 à 00:57
-- Version du serveur : 8.0.31
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `spotify`
--

-- --------------------------------------------------------

--
-- Structure de la table `albums`
--

CREATE TABLE `albums` (
  `album_id` int NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `artiste_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `albums`
--

INSERT INTO `albums` (`album_id`, `nom`, `artiste_id`) VALUES
(1, 'The Call Of The Wretched Seas', 1),
(2, 'Gruppa Krovi', 2);

-- --------------------------------------------------------

--
-- Structure de la table `artistes`
--

CREATE TABLE `artistes` (
  `artiste_id` int NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `auditeurs` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `artistes`
--

INSERT INTO `artistes` (`artiste_id`, `nom`, `auditeurs`) VALUES
(1, 'Ahab', 16497),
(2, 'Kino', 746684);

-- --------------------------------------------------------

--
-- Structure de la table `chansons`
--

CREATE TABLE `chansons` (
  `chanson_id` int NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `album_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `chansons`
--

INSERT INTO `chansons` (`chanson_id`, `nom`, `album_id`) VALUES
(1, 'The Hunt', 1),
(2, 'Gruppa Krovi', 2);

-- --------------------------------------------------------

--
-- Structure de la table `chansons_pref`
--

CREATE TABLE `chansons_pref` (
  `utilisateur_id` int NOT NULL,
  `chanson_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `chansons_pref`
--

INSERT INTO `chansons_pref` (`utilisateur_id`, `chanson_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `utilisateur_id` int NOT NULL,
  `pseudo` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `courriel` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `mdp` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`utilisateur_id`, `pseudo`, `courriel`, `mdp`) VALUES
(1, 'user1', 'user1@hotmail.com', 'user123456'),
(2, 'user2', 'user2@hotmail.com', 'user234567');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`album_id`),
  ADD KEY `artiste_id` (`artiste_id`);

--
-- Index pour la table `artistes`
--
ALTER TABLE `artistes`
  ADD PRIMARY KEY (`artiste_id`);

--
-- Index pour la table `chansons`
--
ALTER TABLE `chansons`
  ADD PRIMARY KEY (`chanson_id`),
  ADD KEY `album_id` (`album_id`);

--
-- Index pour la table `chansons_pref`
--
ALTER TABLE `chansons_pref`
  ADD PRIMARY KEY (`utilisateur_id`,`chanson_id`),
  ADD KEY `chanson_id` (`chanson_id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`utilisateur_id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `albums`
--
ALTER TABLE `albums`
  MODIFY `album_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `artistes`
--
ALTER TABLE `artistes`
  MODIFY `artiste_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `chansons`
--
ALTER TABLE `chansons`
  MODIFY `chanson_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `utilisateur_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`artiste_id`) REFERENCES `artistes` (`artiste_id`);

--
-- Contraintes pour la table `chansons`
--
ALTER TABLE `chansons`
  ADD CONSTRAINT `chansons_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `albums` (`album_id`);

--
-- Contraintes pour la table `chansons_pref`
--
ALTER TABLE `chansons_pref`
  ADD CONSTRAINT `chansons_pref_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`utilisateur_id`),
  ADD CONSTRAINT `chansons_pref_ibfk_2` FOREIGN KEY (`chanson_id`) REFERENCES `chansons` (`chanson_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
