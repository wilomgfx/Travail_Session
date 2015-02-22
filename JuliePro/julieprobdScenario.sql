-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 19 Décembre 2014 à 22:03
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `julieprobd`
--
CREATE DATABASE IF NOT EXISTS `julieprobd` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `julieprobd`;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `clientID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) DEFAULT NULL,
  `prenom` varchar(25) DEFAULT NULL,
  `numTel` varchar(13) DEFAULT NULL,
  `numCell` varchar(13) DEFAULT NULL,
  `adresse` varchar(25) DEFAULT NULL,
  `ville` varchar(25) DEFAULT NULL,
  `codePostal` char(7) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `dateInscription` datetime DEFAULT NULL,
  `courriel` varchar(254) DEFAULT NULL,
  `FK_utilisateurID` int(11) DEFAULT NULL,
  `FK_entraineurID` int(11) DEFAULT NULL,
  PRIMARY KEY (`clientID`),
  KEY `fk_Client_utilisateur_idx` (`FK_utilisateurID`),
  KEY `fk_Client_Entraineur1_idx` (`FK_entraineurID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `entraineur`
--

DROP TABLE IF EXISTS `entraineur`;
CREATE TABLE IF NOT EXISTS `entraineur` (
  `entraineurID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) DEFAULT NULL,
  `prenom` varchar(25) DEFAULT NULL,
  `numTel` varchar(13) DEFAULT NULL,
  `numCell` varchar(13) DEFAULT NULL,
  `adresse` varchar(25) DEFAULT NULL,
  `ville` varchar(25) DEFAULT NULL,
  `codePostal` char(7) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `dateInscription` datetime DEFAULT NULL,
  `courriel` varchar(254) DEFAULT NULL,
  `FK_utilisateurID` int(11) DEFAULT NULL,
  PRIMARY KEY (`entraineurID`),
  KEY `fk_Entraineur_utilisateur1_idx` (`FK_utilisateurID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `messageID` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(100) DEFAULT NULL,
  `nomEntraineur` varchar(45) DEFAULT NULL,
  `FK_clientID` int(11) DEFAULT NULL,
  PRIMARY KEY (`messageID`),
  KEY `fk_message_Client1_idx` (`FK_clientID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `objectif`
--

DROP TABLE IF EXISTS `objectif`;
CREATE TABLE IF NOT EXISTS `objectif` (
  `objectifID` int(11) NOT NULL AUTO_INCREMENT,
  `nbrEntrainement` int(11) DEFAULT NULL,
  `nbrCalorieDepenseSemaine` int(11) DEFAULT NULL,
  `maxBattementObj` int(11) DEFAULT NULL,
  `nbrCalorieIngereParJour` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `FK_clientID` int(11) DEFAULT NULL,
  PRIMARY KEY (`objectifID`),
  KEY `fk_Objectif_Client1_idx` (`FK_clientID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `rapportquotidien`
--

DROP TABLE IF EXISTS `rapportquotidien`;
CREATE TABLE IF NOT EXISTS `rapportquotidien` (
  `rapportQuotidienID` int(11) NOT NULL AUTO_INCREMENT,
  `entrainement` varchar(30) DEFAULT NULL,
  `nbrCalorieDepense` int(11) DEFAULT NULL,
  `maxBattement` int(11) DEFAULT NULL,
  `nbrCalorieIngere` varchar(45) DEFAULT NULL,
  `dateEntrainement` datetime DEFAULT NULL,
  `vo2Max` int(11) DEFAULT NULL,
  `poids` int(11) DEFAULT NULL,
  `FK_clientID` int(11) DEFAULT NULL,
  PRIMARY KEY (`rapportQuotidienID`),
  KEY `fk_RapportQuotidien_Client1_idx` (`FK_clientID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `rendezvous`
--

DROP TABLE IF EXISTS `rendezvous`;
CREATE TABLE IF NOT EXISTS `rendezvous` (
  `rendezVousID` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `FK_entraineurID` int(11) DEFAULT NULL,
  `FK_clientID` int(11) DEFAULT NULL,
  PRIMARY KEY (`rendezVousID`),
  KEY `fk_RendezVous_Entraineur1_idx` (`FK_entraineurID`),
  KEY `fk_RendezVous_Client1_idx` (`FK_clientID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `utilisateurID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `statut` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`utilisateurID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`utilisateurID`, `username`, `password`, `statut`) VALUES
(1, 'admin', 'admin', 'super_admin');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fk_Client_utilisateur` FOREIGN KEY (`FK_utilisateurID`) REFERENCES `utilisateur` (`utilisateurID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Client_Entraineur1` FOREIGN KEY (`FK_entraineurID`) REFERENCES `entraineur` (`entraineurID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `entraineur`
--
ALTER TABLE `entraineur`
  ADD CONSTRAINT `fk_Entraineur_utilisateur1` FOREIGN KEY (`FK_utilisateurID`) REFERENCES `utilisateur` (`utilisateurID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_message_Client1` FOREIGN KEY (`FK_clientID`) REFERENCES `client` (`clientID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `objectif`
--
ALTER TABLE `objectif`
  ADD CONSTRAINT `fk_Objectif_Client1` FOREIGN KEY (`FK_clientID`) REFERENCES `client` (`clientID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rapportquotidien`
--
ALTER TABLE `rapportquotidien`
  ADD CONSTRAINT `fk_RapportQuotidien_Client1` FOREIGN KEY (`FK_clientID`) REFERENCES `client` (`clientID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rendezvous`
--
ALTER TABLE `rendezvous`
  ADD CONSTRAINT `fk_RendezVous_Entraineur1` FOREIGN KEY (`FK_entraineurID`) REFERENCES `entraineur` (`entraineurID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_RendezVous_Client1` FOREIGN KEY (`FK_clientID`) REFERENCES `client` (`clientID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
