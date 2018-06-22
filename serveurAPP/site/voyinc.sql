-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 02 Avril 2018 à 23:22
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `voyage`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

CREATE TABLE IF NOT EXISTS `activite` (
  `idActivite` int(11) NOT NULL,
  `libelleActivite` varchar(48) NOT NULL,
  PRIMARY KEY (`idActivite`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `activite`
--

INSERT INTO `activite` (`idActivite`, `libelleActivite`) VALUES
(1, 'Sport'),
(2, 'Famille'),
(3, 'Culture');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(48) NOT NULL,
  `prenom` varchar(48) NOT NULL,
  `adresse` varchar(96) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `clientinscritvoyage`
--

CREATE TABLE IF NOT EXISTS `clientinscritvoyage` (
  `idNmVoyage` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `nbPlaceReserve` int(11) NOT NULL,
  PRIMARY KEY (`idNmVoyage`,`idClient`),
  KEY `idClient` (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `guide`
--

CREATE TABLE IF NOT EXISTS `guide` (
  `id` int(11) NOT NULL,
  `nom` varchar(48) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `guide`
--

INSERT INTO `guide` (`id`, `nom`) VALUES
(1, 'Cléôpatre'),
(2, 'Mohamed'),
(3, 'Tao'),
(4, 'Yún chá'),
(5, 'Georges'),
(6, 'Touarig'),
(7, 'Pablo'),
(8, 'anjakj'),
(9, 'anj');

-- --------------------------------------------------------

--
-- Structure de la table `guideparticipevoyage`
--

CREATE TABLE IF NOT EXISTS `guideparticipevoyage` (
  `idGuide` int(11) NOT NULL,
  `idVoyage` int(11) NOT NULL,
  PRIMARY KEY (`idGuide`,`idVoyage`),
  KEY `idVoyage` (`idVoyage`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `guideparticipevoyage`
--

INSERT INTO `guideparticipevoyage` (`idGuide`, `idVoyage`) VALUES
(1, 1),
(2, 2),
(3, 3),
(3, 4),
(4, 4),
(4, 5),
(5, 6),
(6, 7),
(7, 8);

-- --------------------------------------------------------

--
-- Structure de la table `instancevoyage`
--

CREATE TABLE IF NOT EXISTS `instancevoyage` (
  `id` int(11) NOT NULL,
  `idVoyage` int(11) NOT NULL,
  `dateDeb` date NOT NULL,
  `dateFin` date NOT NULL,
  `nbPlace` int(11) NOT NULL,
  PRIMARY KEY (`id`,`idVoyage`),
  KEY `idVoyage` (`idVoyage`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

CREATE TABLE IF NOT EXISTS `langue` (
  `id` int(11) NOT NULL,
  `Libelle` varchar(48) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `langue`
--

INSERT INTO `langue` (`id`, `Libelle`) VALUES
(1, 'Arabe'),
(2, 'Mandarin'),
(3, 'Cantonais'),
(4, 'Anglais'),
(5, 'Espagnol');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) DEFAULT NULL,
  `prenom` varchar(25) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `commentaire` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id`, `nom`, `prenom`, `mail`, `commentaire`) VALUES
(1, 'raza', 'anjaka', 'anjaka@gmail.com', 'bonjour cava');

-- --------------------------------------------------------

--
-- Structure de la table `parler`
--

CREATE TABLE IF NOT EXISTS `parler` (
  `idGuide` int(11) NOT NULL,
  `idLangue` int(11) NOT NULL,
  PRIMARY KEY (`idGuide`,`idLangue`),
  KEY `idLangue` (`idLangue`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `parler`
--

INSERT INTO `parler` (`idGuide`, `idLangue`) VALUES
(1, 1),
(2, 1),
(1, 4),
(2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `code` int(11) NOT NULL,
  `nom` varchar(48) DEFAULT NULL,
  `photos` varchar(96) DEFAULT NULL,
  `idLangue` int(11) DEFAULT NULL,
  PRIMARY KEY (`code`),
  KEY `idLangue` (`idLangue`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`code`, `nom`, `photos`, `idLangue`) VALUES
(1, 'Egypte', 'Egypte.jpg', 1),
(2, 'Chine', 'Chine.jpg', 2),
(3, 'Etats-Unis', 'USA.jpg', 3),
(4, 'Maroc', 'Maroc.jpg', 4),
(5, 'Perou', 'Perou.jpg', 5);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL,
  `login` varchar(48) NOT NULL,
  `password` varchar(96) NOT NULL,
  `grade` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `password`, `grade`) VALUES
(1, 'Directeur', 'Directeur', 1),
(2, 'Hotesse', 'Hotesse', 2),
(3, 'Guide', 'Guide', 3);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE IF NOT EXISTS `ville` (
  `id` int(11) NOT NULL,
  `nom` varchar(48) DEFAULT NULL,
  `idPays` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idPays` (`idPays`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ville`
--

INSERT INTO `ville` (`id`, `nom`, `idPays`) VALUES
(1, 'Le Caire', 1),
(2, 'Alexandrie', 1),
(3, 'Pekin', 2),
(4, 'Shanghai', 2),
(5, 'Hong-Kong', 2),
(6, 'Xian', 2),
(7, 'Dallas', 3),
(8, 'Laâyoune', 4),
(9, 'Lima', 5);

-- --------------------------------------------------------

--
-- Structure de la table `villedepartvoyage`
--

CREATE TABLE IF NOT EXISTS `villedepartvoyage` (
  `idVoyage` int(11) NOT NULL,
  `idVille` int(11) NOT NULL,
  PRIMARY KEY (`idVoyage`,`idVille`),
  KEY `idVille` (`idVille`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `villedepartvoyage`
--

INSERT INTO `villedepartvoyage` (`idVoyage`, `idVille`) VALUES
(2, 1),
(1, 2),
(4, 3),
(3, 4),
(5, 6),
(6, 7),
(7, 8),
(8, 9);

-- --------------------------------------------------------

--
-- Structure de la table `voyage`
--

CREATE TABLE IF NOT EXISTS `voyage` (
  `id` int(11) NOT NULL,
  `nom` varchar(48) DEFAULT NULL,
  `idVilleArrivee` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idVilleArrivee` (`idVilleArrivee`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `voyage`
--

INSERT INTO `voyage` (`id`, `nom`, `idVilleArrivee`) VALUES
(1, 'Balade sur le nil (Alexandrie-Le Caire)', 1),
(2, 'Balade sur le nil (Le Caire-Alexandrie)', 2),
(3, 'Un rêve d''Asie (Sud-Est de La Chine)', 5),
(4, 'Un rêve d''Asie (Nord-Est de La Chine)', 3),
(5, 'Un rêve d''Asie (Centre de La Chine)', 6),
(6, 'American Dream (Texas)', 7),
(7, 'Le Sahara : Un désert pas comme les autres', 8),
(8, 'Au coeur des Andes', 9);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `clientinscritvoyage`
--
ALTER TABLE `clientinscritvoyage`
  ADD CONSTRAINT `clientinscritvoyage_ibfk_1` FOREIGN KEY (`idNmVoyage`) REFERENCES `instancevoyage` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `clientinscritvoyage_ibfk_2` FOREIGN KEY (`idClient`) REFERENCES `client` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `guideparticipevoyage`
--
ALTER TABLE `guideparticipevoyage`
  ADD CONSTRAINT `guideparticipevoyage_ibfk_1` FOREIGN KEY (`idGuide`) REFERENCES `guide` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `guideparticipevoyage_ibfk_2` FOREIGN KEY (`idVoyage`) REFERENCES `voyage` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `instancevoyage`
--
ALTER TABLE `instancevoyage`
  ADD CONSTRAINT `instancevoyage_ibfk_1` FOREIGN KEY (`idVoyage`) REFERENCES `voyage` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `parler`
--
ALTER TABLE `parler`
  ADD CONSTRAINT `parler_ibfk_1` FOREIGN KEY (`idGuide`) REFERENCES `guide` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `parler_ibfk_2` FOREIGN KEY (`idLangue`) REFERENCES `langue` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `pays`
--
ALTER TABLE `pays`
  ADD CONSTRAINT `pays_ibfk_1` FOREIGN KEY (`idLangue`) REFERENCES `langue` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ville`
--
ALTER TABLE `ville`
  ADD CONSTRAINT `ville_ibfk_1` FOREIGN KEY (`idPays`) REFERENCES `pays` (`code`) ON DELETE CASCADE;

--
-- Contraintes pour la table `villedepartvoyage`
--
ALTER TABLE `villedepartvoyage`
  ADD CONSTRAINT `villedepartvoyage_ibfk_1` FOREIGN KEY (`idVoyage`) REFERENCES `voyage` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `villedepartvoyage_ibfk_2` FOREIGN KEY (`idVille`) REFERENCES `ville` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `voyage`
--
ALTER TABLE `voyage`
  ADD CONSTRAINT `voyage_ibfk_1` FOREIGN KEY (`idVilleArrivee`) REFERENCES `ville` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
