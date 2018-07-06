-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 04 juil. 2018 à 18:36
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `site_jeux_videos`
--

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `num_commande` varchar(20) NOT NULL,
  `date_de_commande` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_client_FK` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `consoles`
--

DROP TABLE IF EXISTS `consoles`;
CREATE TABLE IF NOT EXISTS `consoles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_console` varchar(68) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `consoles`
--

INSERT INTO `consoles` (`id`, `nom_console`) VALUES
(1, 'xbox'),
(2, 'playstation'),
(3, 'switch'),
(4, 'pc');

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
CREATE TABLE IF NOT EXISTS `paiement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_de_paiement` varchar(50) NOT NULL,
  `num_de_carte` int(11) NOT NULL,
  `date_d_expiration` datetime NOT NULL,
  `cryptogramme` int(11) NOT NULL,
  `nom_debiteur` varchar(50) NOT NULL,
  `prenom_debiteur` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produit` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_produit_FK` (`id_produit`),
  KEY `id_commande_FK` (`id_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pegi`
--

DROP TABLE IF EXISTS `pegi`;
CREATE TABLE IF NOT EXISTS `pegi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `age` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pegi`
--

INSERT INTO `pegi` (`id`, `age`) VALUES
(1, 3),
(2, 7),
(3, 12),
(4, 16),
(5, 18);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Titre` varchar(50) NOT NULL,
  `id_console` int(11) NOT NULL,
  `id_jeux` int(11) NOT NULL,
  `annee_de_sortie` year(4) NOT NULL,
  `stock` int(11) NOT NULL,
  `prix` float NOT NULL,
  `id_pegi` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `produits_PEGI_FK` (`id_pegi`),
  KEY `produits_consoles_FK` (`id_console`),
  KEY `produits_type_de_jeux_FK` (`id_jeux`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `Titre`, `id_console`, `id_jeux`, `annee_de_sortie`, `stock`, `prix`, `id_pegi`) VALUES
(3, 'Fifa2018', 2, 7, 2017, 5, 50, 4),
(4, 'SimCity4', 4, 10, 2003, 10, 25.99, 2);

-- --------------------------------------------------------

--
-- Structure de la table `profil_client`
--

DROP TABLE IF EXISTS `profil_client`;
CREATE TABLE IF NOT EXISTS `profil_client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `civilite` enum('mr','mme') NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `adresse_postale` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `mdp` varchar(500) NOT NULL,
  `mail` varchar(500) NOT NULL,
  `admin` enum('yes','no') DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `profil_client`
--

INSERT INTO `profil_client` (`id`, `civilite`, `nom`, `prenom`, `date_de_naissance`, `adresse_postale`, `telephone`, `pseudo`, `mdp`, `mail`, `admin`) VALUES
(1, 'mr', '', '', '1950-01-01', '', '', '\'QueenGS\'', '\'bonjour\'', '', NULL),
(2, 'mr', '', '', '1950-01-01', '', '', '\'VanillaG\'', '\'jpp\'', '', NULL),
(3, 'mr', '', '', '1950-01-01', '', '', '\'Rokapik32\'', '\'hola\'', '', NULL),
(4, 'mr', '', '', '1950-01-01', '', '', '\'test1\'', '\'fonctionne\'', '', NULL),
(5, 'mr', '', '', '1950-01-01', '', '', '\'EinsteinG\'', '\'$2a$10$1qAz2wSx3eDc4rFv5tGb5e3Q9JTSCu.w84Yv8vcCCaR3jcBcrvhUO\'', '', NULL),
(6, 'mr', '', '', '1950-01-01', '', '', '\'JULIENc\'', '\'$2a$10$1qAz2wSx3eDc4rFv5tGb5ehWvc8alPbEEj7rq/nBjwibguBgTXudK\'', '', NULL),
(7, 'mr', '', '', '1950-01-01', '', '', '\'Abd\'', '\'$2a$10$1qAz2wSx3eDc4rFv5tGb5eNzGVmrn41l2C1N5/Q2Dj5xatsO7CH3q\'', '', NULL),
(8, 'mr', '', '', '1950-01-01', '', '', '\'FLO\'', '\'Tk1bTyKVazGrutC+ylT+Lw==\'', '\'\'', NULL),
(9, 'mme', '\'Guiyoum\'', '\'FLORI\'', '1950-01-01', '\'90 rue de l enfer\'', '\'0196838421\'', '\'marre\'', '\'ok\'', '\'direction@lenfer.com\'', 'no'),
(10, 'mme', '\'melinda\'', '\'wow\'', '1950-01-01', '\'4 recherche taff\'', '\'02009945\'', '\'fait\'', '\'hello\'', '\'faisle@demerdetoi.com\'', 'no'),
(11, 'mme', '\'yue\'', '\'stradivarius\'', '1950-01-01', '\'3 place chinatown\'', '\'11111111\'', '\'front\'', '\'plomb\'', '\'bordeaux@jesuisloin.com\'', 'no');

-- --------------------------------------------------------

--
-- Structure de la table `type_de_jeux`
--

DROP TABLE IF EXISTS `type_de_jeux`;
CREATE TABLE IF NOT EXISTS `type_de_jeux` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_de_jeux`
--

INSERT INTO `type_de_jeux` (`id`, `nom`) VALUES
(1, 'aventure'),
(2, 'rpg'),
(3, 'course'),
(4, 'horreur'),
(5, 'eduction'),
(6, 'combat'),
(7, 'sport'),
(8, 'strategie'),
(9, 'puzzle'),
(10, 'simulation');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `id_client_FK` FOREIGN KEY (`id_client`) REFERENCES `profil_client` (`id`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `id_commande_FK` FOREIGN KEY (`id_commande`) REFERENCES `commandes` (`id`),
  ADD CONSTRAINT `id_produit_FK` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_PEGI_FK` FOREIGN KEY (`id_pegi`) REFERENCES `pegi` (`id`),
  ADD CONSTRAINT `produits_consoles_FK` FOREIGN KEY (`id_console`) REFERENCES `consoles` (`id`),
  ADD CONSTRAINT `produits_type_de_jeux_FK` FOREIGN KEY (`id_jeux`) REFERENCES `type_de_jeux` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
