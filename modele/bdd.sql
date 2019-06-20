-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 10 Juin 2019 à 15:42
-- Version du serveur :  5.7.26-0ubuntu0.18.04.1
-- Version de PHP :  7.2.17-0ubuntu0.18.04.1

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
(1, 'Maths', 2),
(2, 'Fançais', 2),
(3, 'Anglais', 2);

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `idProfil` int(11) NOT NULL,
  `idNote` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  `idMatiere` int(11) NOT NULL,
  `nomNote` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `note`
--

INSERT INTO `note` (`idProfil`, `idNote`, `note`, `idMatiere`, `nomNote`) VALUES
(20, 1, 15, 1, ''),
(17, 2, 14, 1, ''),
(20, 3, 16, 1, ''),
(17, 4, 14, 2, ''),
(17, 5, 16, 2, ''),
(17, 6, 12, 2, ''),
(17, 7, 12, 1, 'une banane'),
(23, 8, 12, 2, 'Cheville'),
(23, 9, 14, 2, 'iqgsgqiufgqiufguiq'),
(23, 10, 3, 2, 'La noteuh'),
(23, 11, 13, 2, 'Gnégné'),
(17, 12, 12, 2, 'Oui'),
(17, 13, 9, 1, 'AZ'),
(17, 14, 20, 3, ''),
(25, 15, 12, 3, 'Une note');

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `mail` varchar(191) DEFAULT NULL,
  `mdp` text,
  `classe` varchar(60) DEFAULT NULL,
  `rang` int(10) NOT NULL,
  `date_creation` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `profil`
--

INSERT INTO `profil` (`id`, `login`, `nom`, `prenom`, `mail`, `mdp`, `classe`, `rang`, `date_creation`) VALUES
(17, 'admin', 'Leard', 'Thomas', 'tleard@gmail.com', 'un0JWpJYzcQl2', 'SIO', 3, '2019-05-08 18:18:37'),
(18, 'pseudo', 'Lucas', 'Holderith', 'lklk@gmail.com', 'uneDM4EMOsDUc', 'SIO', 2, '2019-05-08 18:30:42'),
(19, 'Beteta', 'Stephane', 'Beteta', 'beteta@gmail.com', 'unKI2Nce1vHag', NULL, 2, '2019-05-08 19:10:14'),
(20, 'Dylan', 'Martin', 'Dylan', 'mlml@gmail.com', 'unKI2Nce1vHag', 'SIO', 1, '2019-05-09 08:09:24'),
(21, 'blt', 'azerty', 'azerty', 'azerty@gmail.com', 'un5uIavn93MyM', 'SIO', 2, '2019-05-10 16:58:31'),
(22, 'Belette', 'Martin', 'Dylan', 'coucou@gmail.com', 'un5uIavn93MyM', 'SIO', 1, '2019-05-10 16:59:35'),
(23, 'Jojo', 'jojo', 'jojo', 'jojo@gmail.com', 'un5uIavn93MyM', 'GMPE', 1, '2019-05-22 13:36:05'),
(24, 'prof', 'Beteta', 'Stephane', 'email@mail.com', 'uncrs9RGcniWU', NULL, 2, '2019-06-10 14:09:26'),
(25, 'eleve', 'Coco', 'Lasticot', 'merlin@gmail.com', 'unLbdoR8W.4Bk', 'SIO', 1, '2019-06-10 14:12:11');

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
  ADD PRIMARY KEY (`idProfil`);

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
  ADD KEY `FK_note_idProfil` (`idProfil`),
  ADD KEY `FK_note_idMatiere` (`idMatiere`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `referent`
--
ALTER TABLE `referent`
  ADD PRIMARY KEY (`idProfil`),
  ADD KEY `FK_bulletin_idMatiere` (`idMatiere`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `idMatiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `idNote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `FK_note_idMatiere` FOREIGN KEY (`idMatiere`) REFERENCES `matiere` (`idMatiere`),
  ADD CONSTRAINT `FK_note_idProfil` FOREIGN KEY (`idProfil`) REFERENCES `profil` (`id`);

--
-- Contraintes pour la table `referent`
--
ALTER TABLE `referent`
  ADD CONSTRAINT `FK_bulletin_idMatiere` FOREIGN KEY (`idMatiere`) REFERENCES `matiere` (`idMatiere`),
  ADD CONSTRAINT `FK_referent_idProfil` FOREIGN KEY (`idProfil`) REFERENCES `profil` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
