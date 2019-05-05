-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Dim 05 Mai 2019 à 15:50
-- Version du serveur :  5.7.25-0ubuntu0.18.04.2
-- Version de PHP :  7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Contenu de la table `bulletin`
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
-- Contenu de la table `matiere`
--

INSERT INTO `matiere` (`idMatiere`, `nomMatiere`, `coef`) VALUES
(1, 'maths', 2);

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `idNote` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  `idMatiere` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `note`
--

INSERT INTO `note` (`idNote`, `note`, `idMatiere`) VALUES
(1, 15, '1');

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `id` int(255) UNSIGNED NOT NULL,
  `login` text NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `mail` varchar(191) DEFAULT NULL,
  `mdp` text,
  `date_creation` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

--
-- Contenu de la table `profil`
--

INSERT INTO `profil` (`id`, `login`, `nom`, `prenom`, `mail`, `mdp`, `date_creation`) VALUES
(1, '', 'Leard', 'Thomas', 'mail@gmail.com', '$6lqeO/tL7P/c', NULL),
(2, 'lo', 'lo', 'lo', 'gmail@gmail.com', '$6JwwuSfpFLes', '2019-05-05 15:20:53'),
(3, 'lolo', 'lolo', 'lolo', 'lolo@gmail.com', '$6NtYz.nl204o', '2019-05-05 15:21:12'),
(4, 'Pseudo', 'lolo', 'lolo', 'lolo2@gmail.com', '$6JwwuSfpFLes', '2019-05-05 15:43:46'),
(5, 'itame', 'lolo', 'lolo', 'lklk@gmail.com', 'unKI2Nce1vHag', '2019-05-05 15:46:17'),
(6, 'lolo', 'lklk', 'lklk', 'lk@gmail.com', 'unKI2Nce1vHag', '2019-05-05 15:48:31');

-- --------------------------------------------------------

--
-- Structure de la table `referent`
--

CREATE TABLE `referent` (
  `idProfil` int(11) NOT NULL,
  `idMatiere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
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
  ADD KEY `idMatiere_3` (`idMatiere`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Index pour la table `referent`
--
ALTER TABLE `referent`
  ADD PRIMARY KEY (`idProfil`,`idMatiere`),
  ADD KEY `idMatiere` (`idMatiere`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `idMatiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `idNote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
