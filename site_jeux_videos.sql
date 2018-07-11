-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 11 juil. 2018 à 19:29
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

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
  `quantite` int(200) NOT NULL,
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
  `jaquettes` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `produits_PEGI_FK` (`id_pegi`),
  KEY `produits_consoles_FK` (`id_console`),
  KEY `produits_type_de_jeux_FK` (`id_jeux`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `Titre`, `id_console`, `id_jeux`, `annee_de_sortie`, `stock`, `prix`, `id_pegi`, `jaquettes`) VALUES
(1, 'World Of Warcraft', 4, 2, 2004, 56, 40, 4, 'src=\"/E-commerce/img/jaquettes/pc/pc1.jpg\"'),
(2, 'BattlefieldV ', 4, 11, 2018, 125, 60, 5, 'src=\"/E-commerce/img/jaquettes/pc/pc2.jpg\"'),
(3, 'Starcraft', 4, 8, 2010, 46, 40, 4, 'src=\"/E-commerce/img/jaquettes/pc/pc3.jpg\"'),
(4, 'SimCity 4', 4, 10, 2003, 10, 25.99, 2, 'src=\"/E-commerce/img/jaquettes/pc/pc4.jpg\"'),
(5, 'Overwatch', 4, 11, 2016, 122, 40, 3, 'src=\"/E-commerce/img/jaquettes/pc/pc5.jpg\"'),
(6, 'Need For Speed Payback', 4, 3, 2017, 38, 50, 3, 'src=\"/E-commerce/img/jaquettes/pc/pc6.jpg\"'),
(7, 'SpellForce 3 ', 4, 8, 2017, 42, 35, 3, 'src=\"/E-commerce/img/jaquettes/pc/pc7.jpg\"'),
(8, 'Farmer\'s Dynasty ', 2, 10, 2018, 26, 30, 1, 'src=\"/E-commerce/img/jaquettes/play/img1.jpg\"'),
(9, 'Jurrasic World Evolution', 2, 1, 2018, 35, 45, 4, 'src=\"/E-commerce/img/jaquettes/play/img2.jpg\"'),
(10, 'God Of War', 2, 1, 2005, 23, 20, 5, 'src=\"/E-commerce/img/jaquettes/play/img3.jpg\"'),
(11, 'Far Cry 3', 2, 11, 2012, 32, 30, 5, 'src=\"/E-commerce/img/jaquettes/play/img4.jpg\"'),
(12, 'Lego Les Indestructibles', 2, 1, 2018, 85, 60, 1, 'src=\"/E-commerce/img/jaquettes/play/img5.jpg\"'),
(13, 'Fifa 2018 ', 2, 7, 2017, 85, 50, 1, 'src=\"/E-commerce/img/jaquettes/play/img6.jpg\"'),
(14, 'The Crew 2', 2, 3, 2018, 93, 55, 3, 'src=\"/E-commerce/img/jaquettes/play/img7.jpg\"'),
(15, 'Le Tour De France 2018', 2, 3, 2017, 43, 50, 1, 'src=\"/E-commerce/img/jaquettes/play/img8.jpg\"'),
(16, 'The Last Of Us', 2, 4, 2013, 58, 35, 5, 'src=\"/E-commerce/img/jaquettes/play/img9.jpg\"'),
(17, 'Sonic Forces', 2, 12, 2017, 64, 40, 2, 'src=\"/E-commerce/img/jaquettes/play/img10.jpg\"'),
(18, 'Pokemon Lets Go Pikachu', 3, 2, 2018, 38, 30, 1, 'src=\"/E-commerce/img/jaquettes/switch/swi1.jpg\"'),
(19, 'Monster Hunter Ultimate', 3, 2, 2015, 32, 30, 3, 'src=\"/E-commerce/img/jaquettes/switch/swi2.jpg\"'),
(20, 'Tales Of Vesperia', 3, 2, 2018, 39, 35, 3, 'src=\"/E-commerce/img/jaquettes/switch/swi3.jpg\"'),
(21, 'DragonBall FighterZ', 3, 6, 2018, 58, 35, 3, 'src=\"/E-commerce/img/jaquettes/switch/swi4.jpg\"'),
(22, 'Octopath Traveler ', 3, 2, 2018, 78, 35, 3, 'src=\"/E-commerce/img/jaquettes/switch/swi5.jpg\"'),
(23, 'Super Smash Bros Ultimate', 3, 6, 2018, 112, 40, 3, 'src=\"/E-commerce/img/jaquettes/switch/swi6.jpg\"'),
(24, 'Brawl Out ', 3, 6, 2017, 48, 30, 2, 'src=\"/E-commerce/img/jaquettes/switch/swi7.jpg\"'),
(25, 'Dead Cells ', 3, 1, 2017, 46, 28, 4, 'src=\"/E-commerce/img/jaquettes/switch/swi8.jpg\"'),
(26, 'The Coma Recut', 3, 1, 2018, 39, 30, 3, 'src=\"/E-commerce/img/jaquettes/switch/swi9.jpg\"'),
(27, 'Dark Souls Remastered', 3, 2, 2018, 58, 45, 4, 'src=\"/E-commerce/img/jaquettes/switch/swi10.jpg\"'),
(28, 'Assassins Creed Odyssey', 1, 1, 2018, 152, 65, 5, 'src=\"/E-commerce/img/jaquettes/xbox/one1.jpg\"'),
(29, 'Shadow Of The Tomb Raider', 1, 1, 2018, 112, 60, 5, 'src=\"/E-commerce/img/jaquettes/xbox/one2.jpg\"'),
(30, 'Fallout 76 ', 1, 2, 2018, 98, 55, 5, 'src=\"/E-commerce/img/jaquettes/xbox/one3.jpg\"'),
(31, 'The Division 2', 1, 11, 2018, 75, 55, 5, 'src=\"/E-commerce/img/jaquettes/xbox/one4.jpg\"'),
(32, 'Just Cause 4', 1, 1, 2018, 95, 60, 5, 'src=\"/E-commerce/img/jaquettes/xbox/one5.jpg\"'),
(33, 'Divinity Origin Sin 2', 1, 8, 2017, 56, 50, 5, 'src=\"/E-commerce/img/jaquettes/xbox/one6.jpg\"'),
(34, 'Spyro Reignited Trilogy', 1, 12, 2018, 54, 45, 2, 'src=\"/E-commerce/img/jaquettes/xbox/one7.jpg\"'),
(35, 'Devil May Cry 5', 1, 4, 2018, 83, 60, 5, 'src=\"/E-commerce/img/jaquettes/xbox/one8.jpg\"'),
(36, 'Forza Horizon 4', 1, 3, 2018, 81, 60, 1, 'src=\"/E-commerce/img/jaquettes/xbox/one9.jpg\"'),
(37, 'Soul Calibur 6', 1, 6, 2018, 55, 55, 4, 'src=\"/E-commerce/img/jaquettes/xbox/one10.jpg\"');

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
  `telephone` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `mdp` varchar(500) NOT NULL,
  `mail` varchar(500) NOT NULL,
  `admin` enum('yes','no') DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `profil_client`
--

INSERT INTO `profil_client` (`id`, `civilite`, `nom`, `prenom`, `date_de_naissance`, `adresse_postale`, `telephone`, `pseudo`, `mdp`, `mail`, `admin`) VALUES
(20, 'mme', '', '', '1950-01-01', '', ' ', 'VanillaG', '$2y$10$PfrQe2kDZJBirk5fq7hm7OqadhiCLEpFIDYaGl7227pI/HslUuO7C', '', 'no'),
(24, 'mme', 'calixte', 'steven', '1950-01-01', '', ' ', 'muscuprot', '$2y$10$3SOrhfQjJnJLZpW.Sbz3fuWt4fibGQQfZ2.hCEP72rhWJBr3pbdpa', '', 'no'),
(26, 'mme', 'mermaid', 'ariel', '1950-01-01', '40 allÃ©e de la plage bretonne 75006 Atlantis', '0998876532', 'GUIGUI27', '$2y$10$ropgx09ajtzsgAsImV5GoujJfZCDlFtJj47fQYO0WK9b4e6EyXpLy', 'atlantis@gmail.com', 'no'),
(27, 'mme', 'leclair', 'buzz', '1950-01-01', '300 millions annÃ©es lumieres du php', '0100203040', 'Kivine', '$2y$10$y6XUMTZBjKkmVSy0zuLcUeFrHsoyQtkPzqeWaZgmN1FwbzcUDbHhC', 'espace@italie.it', 'no'),
(28, 'mme', '', '', '1950-01-01', '', ' ', 'superbrain', '$2y$10$lg6lmKsJD0jqWjVGqB1LlObulvbAiou5Xy7.uhzlFbwlctqrZtA2a', '', 'no'),
(29, 'mme', 'Le raton', 'Sahara', '1970-01-01', '30 allee du desert 40685 Desertdesable', '0998876569', 'saralerat91', '$2y$10$5OxHlffuymOttpALk/DA8uG4jVlKOGfZoHDlOKx0x5HlbUNtZsQPG', 'alone@tantpis.com', 'no'),
(30, 'mme', '', '', '1991-03-22', '', ' ', 'Ohara', '$2y$10$SaSmxbn2hcXl4aGJAslmHOuv3igo5XbBZQ1we7uOnfT482i4uKES.', '', 'no'),
(31, 'mme', '', '', '1991-03-22', '', ' ', 'Ohara', '$2y$10$kKOlF4BukgvA6u3iC9/Atu8PISSFXP/myIkoYkJOnV6mHNXj/CbhO', '', 'no'),
(32, 'mme', '', '', '1991-03-22', '', ' ', 'fezfzf', '$2y$10$nepu3WeyuZ2tsP1i4IQ1dOCd/Yi9jCgp/fSLR/SwSoonrud47Nn5C', '', 'no'),
(33, 'mme', '', '', '1991-03-22', '', ' ', 'aa', '$2y$10$4uoBOtuBMEh7JeswgfWtFeBm55GQRo3Z7xezwvgKHciUjfneWef3W', '', 'no');

-- --------------------------------------------------------

--
-- Structure de la table `type_de_jeux`
--

DROP TABLE IF EXISTS `type_de_jeux`;
CREATE TABLE IF NOT EXISTS `type_de_jeux` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_jeux` varchar(68) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_de_jeux`
--

INSERT INTO `type_de_jeux` (`id`, `nom_jeux`) VALUES
(1, 'aventure'),
(2, 'rpg'),
(3, 'course'),
(4, 'horreur'),
(5, 'education'),
(6, 'combat'),
(7, 'sport'),
(8, 'strategie'),
(9, 'puzzle'),
(10, 'simulation'),
(11, 'fps'),
(12, 'Plateforme');

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
