-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 24 Octobre 2019 à 19:13
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

-- -----------------------------------------------------
-- Schema myEventPlan
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8 ;
USE `blog` ;

--
-- Structure de la table `appartient`
--

CREATE TABLE  IF NOT EXISTS `appartient` (
  `idarticle` int(11) NOT NULL,
  `idcategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
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
(1, 'audrey V', 'black@hotmail.com', 'adminDrey', 'ea086049a30f9eeedab9ad1be8ac44dc10c32309', '', 1, NULL, NULL, 1);

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
  ADD CONSTRAINT `appartient_ibfk_1` FOREIGN KEY (`idarticle`) REFERENCES `articles` (`idarticle`) ON delete 'articles' on update 'articles' ;

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

TRUNCATE TABLE blog.articles;
