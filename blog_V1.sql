-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 24 Octobre 2019 à 19:13
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `appartient`
--

CREATE TABLE `appartient` (
  `idarticle` int(11) NOT NULL,
  `idcategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `idarticle` int(11) NOT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `contenu` text,
  `image` varchar(100) NOT NULL DEFAULT 'imgpardefaut.jpg',
  `dateparution` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modification` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idusers` int(11) DEFAULT NULL,
  `publier` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`idarticle`, `titre`, `contenu`, `image`, `dateparution`, `date_modification`, `idusers`, `publier`) VALUES
(1, 'Test 1er article', 'Alors on teste et on test encore', 'imgpardefaut.jpg', '2019-10-10 18:24:01', '2019-10-14 10:17:45', 1, 1),
(2, 'Test 2em article', 'Généralement, on utilise un texte en faux latin (le texte ne veut rien dire, il a été modifié), le Lorem ipsum ou Lipsum, qui permet donc de faire office de texte d\'attente. L\'avantage de le mettre en latin est que l\'opérateur sait au premier coup d\'oeil que la page contenant ces lignes n\'est pas valide, et surtout l\'attention du client n\'est pas dérangée par le contenu, il demeure concentré seulement sur l\'aspect graphique.', 'imgpardefaut.jpg', '2019-10-14 10:24:51', '2019-10-14 10:24:51', 1, 1),
(3, 'TEST 3', 'Généralement, on utilise un texte en faux latin (le texte ne veut rien dire, il a été modifié), le Lorem ipsum ou Lipsum, qui permet donc de faire office de texte d\'attente. L\'avantage de le mettre en latin est que l\'opérateur sait au premier coup d\'oeil que la page contenant ces lignes n\'est pas valide, et surtout l\'attention du client n\'est pas dérangée par le contenu, il demeure concentré seulement sur l\'aspect graphique.\r\n\r\nCe texte a pour autre avantage d\'utiliser des mots de longueur variable, essayant de simuler une occupation normale. La méthode simpliste consistant à copier-coller un court texte plusieurs fois (« ceci est un faux-texte ceci est un faux-texte ceci est un faux-texte ceci est un faux-texte ceci est un faux-texte ») a l\'inconvénient de ne pas permettre une juste appréciation typographique du résultat final.\r\n\r\nIl circule des centaines de versions différentes du Lorem ipsum, mais ce texte aurait originellement été tiré de l\'ouvrage de Cicéron, De Finibus Bonorum et Malorum (Liber Primus, 32), texte populaire à cette époque, dont l\'une des premières phrases est : « Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit... » (« Il n\'existe personne qui aime la souffrance pour elle-même, ni qui la recherche ni qui la veuille pour ce qu\'elle est... »).', 'paysage-nature.jpg', '2019-10-16 13:17:44', '2019-10-16 17:57:29', 1, 1),
(4, 'rjfxndfnx', '$rows = $req1-&gt;fetchAll(PDO::FETCH_CLASS, \'ArrayObject\');$rows = $req1-&gt;fetchAll(PDO::FETCH_CLASS, \'ArrayObject\');$rows = $req1-&gt;fetchAll(PDO::FETCH_CLASS, \'ArrayObject\');$rows = $req1-&gt;fetchAll(PDO::FETCH_CLASS, \'ArrayObject\');$rows = $req1-&gt;fetchAll(PDO::FETCH_CLASS, \'ArrayObject\');$rows = $req1-&gt;fetchAll(PDO::FETCH_CLASS, \'ArrayObject\');$rows = $req1-&gt;fetchAll(PDO::FETCH_CLASS, \'ArrayObject\');$rows = $req1-&gt;fetchAll(PDO::FETCH_CLASS, \'ArrayObject\');', 'imgpardefaut.jpg', '2019-10-21 20:49:29', '2019-10-21 20:49:29', NULL, 0),
(5, 'teste depuis BDD', 'rien de folichon\r\n\r\nContrairement Ã  une idÃ©e rÃ©pandue, le faux-texte ne donne mÃªme pas un aperÃ§u rÃ©aliste du gris typographique, en particulier dans le cas des textes justifiÃ©s : en effet, les mots fictifs employÃ©s dans le faux-texte ne faisant Ã©videmment pas partie des dictionnaires des logiciels de PAO, les programmes de cÃ©sure ne peuvent pas effectuer leur travail habituel sur de tels textes. Par consÃ©quent, l\'interlettrage du faux-texte sera toujours quelque peu supÃ©rieur Ã  ce qu\'il aurait Ã©tÃ© avec un texte rÃ©el, qui prÃ©sentera donc un aspect plus sombre et moins lisible que le faux-texte avec lequel le graphiste a effectuÃ© ses essais. Un vrai texte pose aussi des problÃ¨mes de lisibilitÃ© spÃ©cifiques (noms propres, numÃ©ros de tÃ©lÃ©phone, retours Ã  la ligne frÃ©quents, composition des citations en italiques, intertitres de plus de deux lignes...) qu\'on n\'observe jamais dans le faux-texte.\r\n\r\nCA MAAAARCHE!', 'imgpardefaut.jpg', '2019-10-22 10:03:45', '2019-10-24 17:32:50', 1, 1),
(7, 'zrgrshbc', 'gheurtkyj:k!lMÃ¹lkjhgfdssqsDDQFGDJFGKLHMJ%KMJLGJHFDBSVWC&lt;Qx', 'imgpardefaut.jpg', '2019-10-22 19:15:06', '2019-10-22 19:15:06', 1, 0),
(9, 'sefvgkv', 'qkdjvqqwij \r\nqcsih ih\r\n ijqviwjn kwn nwx nwnw wb', 'imgpardefaut.jpg', '2019-10-22 23:48:02', '2019-10-22 23:49:09', 1, 0),
(10, 'test rÃ©daction depuis tableau de bord', 'GÃ©nÃ©ralement, on utilise un texte en faux latin (le texte ne veut rien dire, il a Ã©tÃ© modifiÃ©), le Lorem ipsum ou Lipsum, qui permet donc de faire office de texte d\'attente. L\'avantage de le mettre en latin est que l\'opÃ©rateur sait au premier coup d\'oeil que la page contenant ces lignes n\'est pas valide, et surtout l\'attention du client n\'est pas dÃ©rangÃ©e par le contenu, il demeure concentrÃ© seulement sur l\'aspect graphique.\r\n\r\nCe texte a pour autre avantage d\'utiliser des mots de longueur variable, essayant de simuler une occupation normale. La mÃ©thode simpliste consistant Ã  copier-coller un court texte plusieurs fois (Â« ceci est un faux-texte ceci est un faux-texte ceci est un faux-texte ceci est un faux-texte ceci est un faux-texte Â») a l\'inconvÃ©nient de ne pas permettre une juste apprÃ©ciation typographique du rÃ©sultat final.\r\n\r\nIl circule des centaines de versions diffÃ©rentes du Lorem ipsum, mais ce texte aurait originellement Ã©tÃ© tirÃ© de l\'ouvrage de CicÃ©ron, De Finibus Bonorum et Malorum (Liber Primus, 32), texte populaire Ã  cette Ã©poque, dont l\'une des premiÃ¨res phrases est : Â« Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit... Â» (Â« Il n\'existe personne qui aime la souffrance pour elle-mÃªme, ni qui la recherche ni qui la veuille pour ce qu\'elle est... Â»).\r\n\r\nExpert en utilisabilitÃ© des sites web et des logiciels, Jakob Nielsen souligne que l\'une des limites de l\'utilisation du faux-texte dans la conception de sites web est que ce texte n\'Ã©tant jamais lu, il ne permet pas de vÃ©rifier sa lisibilitÃ© effective. La lecture Ã  l\'Ã©cran Ã©tant plus difficile, cet aspect est pourtant essentiel. Nielsen prÃ©conise donc l\'utilisation de textes reprÃ©sentatifs plutÃ´t que du lorem ipsum. On peut aussi faire remarquer que les formules conÃ§ues avec du faux-texte ont tendance Ã  sous-estimer l\'espace nÃ©cessaire Ã  une titraille immÃ©diatement intelligible, ce qui oblige les rÃ©dactions Ã  formuler ensuite des titres simplificateurs, voire inexacts, pour ne pas dÃ©passer l\'espace imparti.', 'imgpardefaut.jpg', '2019-10-23 10:49:47', '2019-10-23 10:49:47', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `idcom` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contenu` text,
  `date` datetime DEFAULT NULL,
  `modere` tinyint(1) DEFAULT '0',
  `idarticle` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`idcom`, `login`, `email`, `contenu`, `date`, `modere`, `idarticle`) VALUES
(1, 'aighlog', 'black_pearl_from971@hotmail.com', 'ohjenaimarre!', '2019-10-16 12:17:15', 0, 2),
(5, 'aighlog', 'black_pearl_from971@hotmail.com', 'yffcoiuumpl', '2019-10-16 16:31:20', 1, 2),
(6, 'dreyV88', 'drey@vmail.fr', 'en llive maintenant!', '2019-10-16 16:40:17', 1, 2),
(7, 'aighlog', 'black_pearl_from971@hotmail.com', 'first!', '2019-10-16 16:42:47', 1, 1),
(8, 'aighlog', 'black_pearl_from971@hotmail.com', 'et lÃ  je commente comme je veux!', '2019-10-20 15:16:04', 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `idarticle` int(11) NOT NULL,
  `idmotcle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `cotisation`
--

CREATE TABLE `cotisation` (
  `mode_de_paiement` varchar(42) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `motclefs`
--

CREATE TABLE `motclefs` (
  `idmotcle` int(11) NOT NULL,
  `nommotcle` varchar(42) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE `statut` (
  `idrole` int(11) NOT NULL,
  `nomrole` varchar(42) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `statut`
--

INSERT INTO `statut` (`idrole`, `nomrole`) VALUES
(1, 'Administrateur'),
(2, 'Auteur'),
(3, 'Membre');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idusers` int(11) NOT NULL,
  `nom_prenom` varchar(42) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `login` varchar(42) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `tokken` varchar(255) NOT NULL,
  `role` int(11) DEFAULT NULL,
  `cotisation` varchar(42) DEFAULT NULL,
  `mode_de_paiement` varchar(42) DEFAULT NULL,
  `idrole` int(11) DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`idusers`, `nom_prenom`, `email`, `login`, `mdp`, `tokken`, `role`, `cotisation`, `mode_de_paiement`, `idrole`) VALUES
(1, 'audrey vincent', 'black_pearl_from971@hotmail.com', 'adminDrey', 'ea086049a30f9eeedab9ad1be8ac44dc10c32309', '', 1, NULL, NULL, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `appartient`
--
ALTER TABLE `appartient`
  ADD PRIMARY KEY (`idarticle`,`idcategorie`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`idarticle`),
  ADD KEY `idusers` (`idusers`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`idcom`),
  ADD KEY `idarticle` (`idarticle`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`idarticle`,`idmotcle`),
  ADD KEY `idmotcle` (`idmotcle`);

--
-- Index pour la table `cotisation`
--
ALTER TABLE `cotisation`
  ADD PRIMARY KEY (`mode_de_paiement`);

--
-- Index pour la table `motclefs`
--
ALTER TABLE `motclefs`
  ADD PRIMARY KEY (`idmotcle`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`idrole`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`),
  ADD KEY `idrole` (`idrole`),
  ADD KEY `mode_de_paiement` (`mode_de_paiement`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `idarticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `idcom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `motclefs`
--
ALTER TABLE `motclefs`
  MODIFY `idmotcle` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `statut`
--
ALTER TABLE `statut`
  MODIFY `idrole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `appartient`
--
ALTER TABLE `appartient`
  ADD CONSTRAINT `appartient_ibfk_1` FOREIGN KEY (`idarticle`) REFERENCES `articles` (`idarticle`);

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`idusers`) REFERENCES `users` (`idusers`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`idarticle`) REFERENCES `articles` (`idarticle`);

--
-- Contraintes pour la table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `compte_ibfk_1` FOREIGN KEY (`idmotcle`) REFERENCES `motclefs` (`idmotcle`),
  ADD CONSTRAINT `compte_ibfk_2` FOREIGN KEY (`idarticle`) REFERENCES `articles` (`idarticle`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idrole`) REFERENCES `statut` (`idrole`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`mode_de_paiement`) REFERENCES `cotisation` (`mode_de_paiement`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
