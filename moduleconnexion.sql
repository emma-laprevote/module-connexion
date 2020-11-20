-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 20 nov. 2020 à 12:57
-- Version du serveur :  5.7.24
-- Version de PHP : 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `moduleconnexion`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `prenom`, `nom`, `password`) VALUES
(1, 'admin', 'admin', 'admin', '$2y$10$SHyhUyHxrpZBLSVovHGzZOd3gVRA5mjB2b05AXDA9Xx6ehO11JHIy'),
(2, 'Emka', 'Emma', 'Laprevote', '$2y$10$0LO/80lQDd4gTxH.Zcsnm.Y4aXwq/NwwT4qzrYDDxRWttjTBQ9Aay'),
(3, 'VonOtto', 'Vincent', 'Parga', '$2y$10$3EguQ/r56pLPyclxH6UtWO8ERF0U3orAfzgOmWa8oKDpk9xqDeeB.'),
(4, 'Cricri', 'Christine', 'Garagnoli', '$2y$10$EVt28ET9Un9erGpiK/oj7OKUYtZHvKQrASO4H.0qMWRjv6BXIR0Ci'),
(5, 'Ludadu13', 'Ludivine', 'Laprevote', '$2y$10$lewsntyAc0FYcbkFk3HeH..3PHv0A1yaaOhPWNbv6yHr.jRZYWZH2');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
