-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Ven 28 Juin 2019 à 14:53
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
(2, 'Français', 2),
(3, 'Anglais', 2),
(4, 'Informatique', 5),
(5, 'Gestion', 5),
(6, 'Comptabilité', 5);

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
(29, 38, 4, 2, 'Dictée \"les fleurs du mal\"'),
(30, 39, 7, 2, 'Dictée \"les fleurs du mal\"'),
(31, 40, 15, 2, 'Dictée \"les fleurs du mal\"'),
(32, 41, 2, 2, 'Dictée \"les fleurs du mal\"'),
(33, 42, 8, 2, 'Dictée \"les fleurs du mal\"'),
(34, 43, 3, 2, 'Dictée \"les fleurs du mal\"'),
(29, 45, 13, 1, 'Physique quantique'),
(30, 46, 7, 1, 'Physique quantique'),
(31, 47, 2, 1, 'Physique quantique'),
(32, 48, 9, 1, 'Physique quantique'),
(33, 49, 15, 1, 'Physique quantique'),
(34, 50, 6, 1, 'Physique quantique'),
(29, 51, 10, 3, 'Where is Bryan ?'),
(30, 52, 14, 3, 'Where is Bryan ?'),
(31, 53, 8, 3, 'Where is Bryan ?'),
(32, 54, 1, 3, 'Where is Bryan ?'),
(33, 55, 19, 3, 'Where is Bryan ?'),
(34, 56, 11, 3, 'Where is Bryan ?'),
(29, 57, 3, 4, 'DHCP/DNS'),
(32, 58, 1, 4, 'DHCP/DNS'),
(34, 59, 3, 4, 'DHCP/DNS'),
(30, 60, 5, 5, 'Gestion des personnes nulles'),
(33, 61, 1, 5, 'Gestion des personnes nulles'),
(31, 62, 20, 6, 'largent du peuple'),
(30, 63, 13, 1, 'Division'),
(30, 64, 11, 1, 'Addition'),
(35, 65, 12, 4, 'BDD'),
(35, 66, 12, 1, 'Math'),
(35, 67, 12, 3, 'lolo'),
(35, 68, 20, 1, 'po'),
(29, 69, 12, 2, 'Dictée'),
(29, 70, 12, 2, 'Dictée'),
(29, 71, 12, 2, 'Dictée');

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
(17, 'admin', 'L\'admin', 'Admin', 'tleard@gmail.com', 'un0JWpJYzcQl2', NULL, 3, '2019-05-08 18:18:37'),
(26, 'prof1', 'Delamotte', 'Jean', 'prof1@gmail.com', 'unv5IWQ6dhWIo', NULL, 2, '2019-06-20 16:29:18'),
(27, 'prof2', 'Clair', 'Julien', 'prof2@gmail.com', 'unK9N0iNcV0ss', NULL, 2, '2019-06-20 16:29:53'),
(28, 'prof3', 'Norris', 'Chuck', 'prof3@gmail.com', 'unRvo5J5TQ/Bg', NULL, 2, '2019-06-20 16:30:35'),
(29, 'eleve1', 'Tranchant', 'Guillaume', 'eleve1@gmail.com', 'unXtBYwq2PDH2', 'SIO', 1, '2019-06-20 16:34:22'),
(30, 'eleve2', 'Bob', 'Dylan', 'eleve2@gmail.com', 'unlWTEhCNTOOk', 'GPME', 1, '2019-06-20 16:35:11'),
(31, 'eleve3', 'Bruny', 'Carla', 'eleve3@gmail.com', 'un3kCd3Hg/4pI', 'MUC', 1, '2019-06-20 16:35:40'),
(32, 'eleve4', 'Zinedine', 'Zidane', 'eleve4@gmail.com', 'unBLtW3Odm9s.', 'SIO', 1, '2019-06-20 16:36:07'),
(33, 'eleve5', 'Washington', 'George', 'eleve5@gmail.com', 'unWSMjW9AvrZY', 'GPME', 1, '2019-06-20 16:36:41'),
(34, 'eleve6', 'Van Dam', 'Jean-Claude', 'eleve6@gmail.com', 'unsendCRtgC/.', 'SIO', 1, '2019-06-20 16:37:29'),
(35, 'pedro', 'lopez', 'Pedro', 'pedro@gmail.com', 'unYOe4.B6eFc.', 'SIO', 3, '2019-06-21 14:43:32'),
(36, 'diemer', 'Diemer', 'Michel', 'mail@gmail.com', 'unKI2Nce1vHag', NULL, 2, '2019-06-21 14:48:23');

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
  MODIFY `idMatiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `idNote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
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
