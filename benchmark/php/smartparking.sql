-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 29 mai 2019 à 19:38
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `smartparking`
--

-- --------------------------------------------------------

--
-- Structure de la table `dispo`
--

CREATE TABLE `dispo` (
  `id` int(11) NOT NULL,
  `place` varchar(255) NOT NULL,
  `etat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `dispo`
--

INSERT INTO `dispo` (`id`, `place`, `etat`) VALUES
(1, 'place 1', 'ndispo'),
(2, 'place 2', 'dispo'),
(3, 'place 3', 'dispo'),
(4, 'place 4', 'ndispo'),
(5, 'place 5', 'ndispo'),
(6, 'place 6', 'dispo'),
(7, 'place 7 ', 'dispo'),
(8, 'place 8', 'ndispo'),
(9, 'place 9', 'dispo'),
(10, 'place 10', 'dispo'),
(11, 'place 11', 'ndispo'),
(12, 'place 12', 'dispo'),
(13, 'place 13', 'ndispo'),
(14, 'place 14', 'dispo'),
(15, 'place 15', 'dispo');

-- --------------------------------------------------------

--
-- Structure de la table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `nomOrga` varchar(255) NOT NULL,
  `nomUser` varchar(255) NOT NULL,
  `poste` varchar(255) NOT NULL,
  `badge` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `autorisation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `permission`
--

INSERT INTO `permission` (`id`, `nomOrga`, `nomUser`, `poste`, `badge`, `action`, `autorisation`) VALUES
(1, 'MIT', 'Mamadou', 'Developpeur', 'Bleu', 'acceder', 'oui'),
(2, 'MIT', 'Hawa', 'Developpeur', 'Bleu', 'acceder', 'non'),
(3, 'MIT', 'Hamed', 'Administrateur', 'Rouge', 'acceder', 'non'),
(5, 'Azure', 'Moustapha', 'Developpeur', 'Bleu', 'acceder', 'oui'),
(6, 'Azure', 'Admin', 'Administrateur', 'Rouge', 'acceder', 'oui'),
(7, 'MIT', 'Mariam', 'Secretaire', 'Bleu', 'acceder', 'oui'),
(8, 'MIT', 'AbdramCoulby', 'Administrateur', 'Rouge', 'acceder', 'oui'),
(10, 'MIT', 'Habiba', 'Secretaire', 'Bleu', 'acceder', 'non');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fonction` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `username`, `fonction`, `password`, `zone`) VALUES
(1, 'abc', 'Developpeur', '$2y$10$mJWTuKasZ7OZKrs4je4I/.pTiFA66RYC3CIbhCaflZEBDfslHpq2e', 'Pro'),
(2, 'AbdramCoulby', 'Administrateur', '$2y$10$s89NWISk4RRDdXugRg1tueAujbTfjVUoWMpgMZzNTTABqLLmZ.kzy', ''),
(3, 'testeur', 'Developpeur', '$2y$10$WkGEQpNlcnjems8F5CG9L.7k4xK4mCGCiNMMVyU7.bk0O/YHwib.G', ''),
(11, 'test', 'Developpeur', '$2y$10$3ScUEFKl84qWO5.4MNa1/OHdmfNNmWXJHJs8vt.VLGHT37GlsOP7q', ''),
(13, 'tania12', 'Secretaire', '$2y$10$7HxwhbQyjbkPlyBgZ6kCgeKGCNeEBNd6PsRoaBZHmkUAUhgQF0dTW', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `dispo`
--
ALTER TABLE `dispo`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `permission`
--
ALTER TABLE `permission`
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
-- AUTO_INCREMENT pour la table `dispo`
--
ALTER TABLE `dispo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
