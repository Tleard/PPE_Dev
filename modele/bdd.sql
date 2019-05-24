
--
-- Structure de la table `bulletin`
--

CREATE TABLE `bulletin` (
  `idProfil` int(11) NOT NULL,
  `idNote` int(11) NOT NULL,
  `idMatiere` int(11) NOT NULL,
  PRIMARY KEY(idProfil));

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
  `coef` int(11) NOT NULL,
  PRIMARY KEY(idMatiere));

--
-- Contenu de la table `matiere`
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
  `idMatiere` int(11) NOT NULL,
  PRIMARY KEY(idNote));

--
-- Contenu de la table `note`
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
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `mail` varchar(191) DEFAULT NULL,
  `mdp` text,
  `classe` varchar(60) DEFAULT NULL,
  `rang` int(10) NOT NULL,
  `date_creation` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(id)
);

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
(23, 'Jojo', 'jojo', 'jojo', 'jojo@gmail.com', 'un5uIavn93MyM', 'GMPE', 1, '2019-05-22 13:36:05');

-- --------------------------------------------------------

--
-- Structure de la table `referent`
--

CREATE TABLE `referent` (
  `idProfil` int(11) NOT NULL,
  `idMatiere` int(11) NOT NULL,
  PRIMARY KEY(idProfil)
);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

ALTER TABLE note
    ADD CONSTRAINT FK_note_idProfil FOREIGN KEY(idProfil) REFERENCES profil(id);
    
ALTER TABLE note
    ADD CONSTRAINT FK_note_idMatiere FOREIGN KEY(idMatiere) REFERENCES matiere(idMatiere);
    
ALTER TABLE referent
    ADD CONSTRAINT FK_referent_idProfil FOREIGN KEY(idProfil) REFERENCES profil(id);
    
ALTER TABLE referent
    ADD CONSTRAINT FK_bulletin_idMatiere FOREIGN KEY(idMatiere) REFERENCES matiere(idMatiere);
