-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 10 mai 2019 à 16:49
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ppe`
--

-- --------------------------------------------------------

--
-- Structure de la table `bulletin`
--

CREATE TABLE `bulletin` (
  `idProfil` int(11) NOT NULL,
  `idNote` int(11) NOT NULL,
  `idMatiere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bulletin`
--

INSERT INTO `bulletin` (`idProfil`, `idNote`, `idMatiere`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `idMatiere` int(11) NOT NULL,
  `nomMatiere` varchar(255) NOT NULL,
  `coef` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`idMatiere`, `nomMatiere`, `coef`) VALUES
(1, 'maths', 2),
(2, 'Fançais', 2);

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `idProfil` int(11) NOT NULL,
  `idNote` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  `idMatiere` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`idProfil`, `idNote`, `note`, `idMatiere`) VALUES
(20, 1, 15, '1'),
(17, 2, 14, '1'),
(20, 3, 16, '1'),
(17, 4, 14, '2'),
(20, 5, 16, '2'),
(20, 6, 12, '2');

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `idProfil` int(255) UNSIGNED NOT NULL,
  `login` text NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `mail` varchar(191) DEFAULT NULL,
  `mdp` text,
  `classe` varchar(60) DEFAULT NULL,
  `rang` int(10) NOT NULL,
  `date_creation` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`idProfil`, `login`, `nom`, `prenom`, `mail`, `mdp`, `classe`, `rang`, `date_creation`) VALUES
(9, 'ITLK', 'lo', 'lo', 'mpmpm@gmail.com', 'unvE13nwuFwf6', 'SIO', 2, '2019-05-05 18:14:13'),
(17, 'admin', 'Leard', 'Thomas', 'tleard@gmail.com', 'un0JWpJYzcQl2', 'SIO', 3, '2019-05-08 18:18:37'),
(18, 'pseudo', 'Lucas', 'Holderith', 'lklk@gmail.com', 'uneDM4EMOsDUc', 'SIO', 2, '2019-05-08 18:30:42'),
(19, 'Beteta', 'Stephane', 'Beteta', 'beteta@gmail.com', 'unKI2Nce1vHag', NULL, 2, '2019-05-08 19:10:14'),
(20, 'Dylan', 'Martin', 'Dylan', 'mlml@gmail.com', 'unKI2Nce1vHag', 'SIO', 1, '2019-05-09 08:09:24');

-- --------------------------------------------------------

--
-- Structure de la table `referent`
--

CREATE TABLE `referent` (
  `idProfil` int(11) NOT NULL,
  `idMatiere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bulletin`
--
ALTER TABLE `bulletin`
  ADD PRIMARY KEY (`idProfil`,`idNote`),
  ADD KEY `idNote` (`idNote`),
  ADD KEY `idMatiere` (`idMatiere`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`idMatiere`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`idNote`),
  ADD KEY `matiere` (`idMatiere`),
  ADD KEY `idMatiere` (`idMatiere`),
  ADD KEY `idMatiere_2` (`idMatiere`),
  ADD KEY `idMatiere_3` (`idMatiere`),
  ADD KEY `id` (`idProfil`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`idProfil`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Index pour la table `referent`
--
ALTER TABLE `referent`
  ADD PRIMARY KEY (`idProfil`,`idMatiere`),
  ADD KEY `idMatiere` (`idMatiere`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `idMatiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `idNote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `idProfil` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
