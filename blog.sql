DROP DATABASE blog;
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `blog`;


CREATE TABLE `COTISATION` (
  `mode_de_paiement` VARCHAR(42),
  PRIMARY KEY (`mode_de_paiement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `STATUT` (
  `idrôle` INT AUTO_INCREMENT,
  `nomrole` VARCHAR(42),
   PRIMARY KEY (`idrôle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `COMMENTAIRE` (
  `idcom` INT AUTO_INCREMENT,
  `contenu` VARCHAR(42),
  `date` datetime,
  `modere` BOOLEAN,
  `idarticle`INT,
  PRIMARY KEY (`idcom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `USERS` (
  `idusers` INT AUTO_INCREMENT,
  `nom_prenom` VARCHAR(42),
  `login` VARCHAR(42),
  `mdp` VARCHAR(255),
  `rôle` INT,
  `cotisation` VARCHAR(42),
  `mode_de_paiement` VARCHAR(42),
  `idrôle` INT,
  PRIMARY KEY (`idusers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `ARTICLES` (
  `idarticle` INT AUTO_INCREMENT,
  `titre` VARCHAR(42),
  `contenu` VARCHAR(42),
  `dateparution` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modification` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idusers` INT,
  PRIMARY KEY (`idarticle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `APPARTIENT` (
  `idarticle` INT,
  `idcategorie` INT,
  PRIMARY KEY (`idarticle`, `idcategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `MOTCLEFS` (
  `idmotcle` INT AUTO_INCREMENT,
  `nommotcle` VARCHAR(42),
  PRIMARY KEY (`idmotcle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `COMPTE` (
  `idarticle` INT,
  `idmotcle` INT,
  PRIMARY KEY (`idarticle`, `idmotcle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `CATEGORIE` (
  `idcategorie` INT AUTO_INCREMENT),
  `nomcateg` VARCHAR(42),
  PRIMARY KEY (`idcategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `COMMENTAIRE` ADD FOREIGN KEY (`idarticle`) REFERENCES `ARTICLES` (`idarticle`);
ALTER TABLE `USERS` ADD FOREIGN KEY (`idrôle`) REFERENCES `STATUT` (`idrôle`);
ALTER TABLE `USERS` ADD FOREIGN KEY (`mode_de_paiement`) REFERENCES `COTISATION` (`mode_de_paiement`);
ALTER TABLE `ARTICLES` ADD FOREIGN KEY (`idusers`) REFERENCES `USERS` (`idusers`);
ALTER TABLE `APPARTIENT` ADD FOREIGN KEY (`idcategorie`) REFERENCES `CATEGORIE` (`idcategorie`);
ALTER TABLE `APPARTIENT` ADD FOREIGN KEY (`idarticle`) REFERENCES `ARTICLES` (`idarticle`);
ALTER TABLE `COMPTE` ADD FOREIGN KEY (`idmotcle`) REFERENCES `MOTCLEFS` (`idmotcle`);
ALTER TABLE `COMPTE` ADD FOREIGN KEY (`idarticle`) REFERENCES `ARTICLES` (`idarticle`);