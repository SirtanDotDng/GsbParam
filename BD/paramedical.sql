-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 05 mai 2022 à 10:45
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `paramedical`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Code` varchar(128) COLLATE utf8_bin NOT NULL,
  `Nom` varchar(128) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`ID`, `Code`, `Nom`) VALUES
(1, 'CH', 'Cheveux'),
(2, 'FO', 'Forme'),
(3, 'PS', 'Protection Solaire');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Statut` int(11) NOT NULL,
  `ID_Utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Commande_Utilisateur_FK` (`ID_Utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `concerner`
--

DROP TABLE IF EXISTS `concerner`;
CREATE TABLE IF NOT EXISTS `concerner` (
  `ID` int(11) NOT NULL,
  `ID_Produit` int(11) NOT NULL,
  PRIMARY KEY (`ID`,`ID_Produit`),
  KEY `Concerner_Produit0_FK` (`ID_Produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `contenance`
--

DROP TABLE IF EXISTS `contenance`;
CREATE TABLE IF NOT EXISTS `contenance` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Unite` varchar(128) COLLATE utf8_bin NOT NULL,
  `Quantite` float NOT NULL,
  `Prix` float NOT NULL,
  `ID_Produit` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Contenance_Produit_FK` (`ID_Produit`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `contenance`
--

INSERT INTO `contenance` (`ID`, `Unite`, `Quantite`, `Prix`, `ID_Produit`) VALUES
(1, 'ml', 125, 10.8, 1),
(2, 'ml', 330, 15.65, 1),
(3, 'ml', 300, 8.9, 3);

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

DROP TABLE IF EXISTS `marque`;
CREATE TABLE IF NOT EXISTS `marque` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(128) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `marque`
--

INSERT INTO `marque` (`ID`, `Nom`) VALUES
(1, 'GSB'),
(2, 'Laino'),
(3, 'Klorane'),
(4, 'Weleda'),
(5, 'Phytopulp'),
(6, 'Nuxe'),
(7, 'La Roche Posay'),
(8, 'Futuro'),
(9, 'Microlife'),
(10, 'Melapi'),
(11, 'Meli'),
(12, 'Avène'),
(13, 'Mustela'),
(14, 'Isdin'),
(15, 'Uriage'),
(16, 'Bioderma');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Note` int(11) NOT NULL,
  `Avis` varchar(512) COLLATE utf8_bin NOT NULL,
  `ID_Produit` int(11) NOT NULL,
  `ID_Utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Note_Produit_FK` (`ID_Produit`),
  KEY `Note_Utilisateur0_FK` (`ID_Utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`ID`, `Note`, `Avis`, `ID_Produit`, `ID_Utilisateur`) VALUES
(1, 5, 'Très bon produit', 1, 2),
(2, 4, 'Satisfait', 1, 1),
(3, 1, 'Après quelques mois d\'utilisation, je remarque des plaques rouges qui commencent à se former sur mes bras. Je change alors ma note pour 1 étoile.', 1, 2),
(4, 4, 'Très bon produit.', 1, 2),
(5, 4, 'Mes enfants aiment bien ce shampoing', 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(128) COLLATE utf8_bin NOT NULL,
  `Image` varchar(128) COLLATE utf8_bin NOT NULL,
  `Description` varchar(512) COLLATE utf8_bin NOT NULL,
  `Quantite` int(11) NOT NULL,
  `ID_Marque` int(11) NOT NULL,
  `ID_Categorie` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Produit_Marque_FK` (`ID_Marque`),
  KEY `Produit_Categorie0_FK` (`ID_Categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`ID`, `Nom`, `Image`, `Description`, `Quantite`, `ID_Marque`, `ID_Categorie`) VALUES
(1, 'Laino Shampooing Douche au Thé Vert BIO', 'images/laino-shampooing-douche-au-the-vert-bio-200ml.png', 'Produit proposé par GSB', 12, 1, 1),
(2, 'Klorane fibres de lin baume après shampooing', 'images/klorane-fibres-de-lin-baume-apres-shampooing-150-ml.jpg', 'Produit proposé par GSB', 12, 1, 1),
(3, 'Weleda Kids 2in1 Shower & Shampoo Orange fruitée', 'images/weleda-kids-2in1-shower-shampoo-orange-fruitee-150-ml.jpg', 'Produit proposé par GSB', 12, 1, 1),
(4, 'Weleda Kids 2in1 Shower & Shampoo vanille douce', 'images/weleda-kids-2in1-shower-shampoo-vanille-douce-150-ml.jpg', 'Produit proposé par GSB', 12, 1, 1),
(5, 'Klorane Shampooing sec à l\'\'extrait d\'\'ortie', 'images/klorane-shampooing-sec-a-l-extrait-d-ortie-spray-150ml.png', 'Produit proposé par GSB', 12, 1, 1),
(6, 'Phytopulp mousse volume intense', 'images/phytopulp-mousse-volume-intense-200ml.jpg', 'Produit proposé par GSB', 12, 1, 1),
(7, 'Bio Beaute by Nuxe Shampooing nutritif', 'images/bio-beaute-by-nuxe-shampooing-nutritif-200ml.png', 'Produit proposé par GSB', 12, 1, 1),
(8, 'Nuxe Men Contour des Yeux Multi-Fonctions', 'images/nuxe-men-contour-des-yeux-multi-fonctions-15ml.png', 'Produit proposé par GSB', 12, 1, 1),
(9, 'Tisane romon nature sommirel bio sachet 20', 'images/tisane-romon-nature-sommirel-bio-sachet-20.jpg', 'Produit proposé par GSB', 12, 1, 2),
(10, 'La Roche Posay Cicaplast crème pansement', 'images/la-roche-posay-cicaplast-creme-pansement-40ml.jpg', 'Produit proposé par GSB', 12, 1, 2),
(11, 'Futuro sport stabilisateur pour cheville', 'images/futuro-sport-stabilisateur-pour-cheville-deluxe-attelle-cheville.png', 'Produit proposé par GSB', 12, 1, 2),
(12, 'Microlife pèse-personne électronique weegschaal', 'images/microlife-pese-personne-electronique-weegschaal-ws80.jpg', 'Produit proposé par GSB', 12, 1, 2),
(13, 'Melapi Miel Thym Liquide 500g', 'images/melapi-miel-thym-liquide-500g.jpg', 'Produit proposé par GSB', 12, 1, 2),
(14, 'Meli Meliflor Pollen 200g', 'images/melapi-pollen-250g.jpg', 'Produit proposé par GSB', 12, 1, 2),
(15, 'Avène solaire Spray très haute protection', 'images/avene-solaire-spray-tres-haute-protection-spf50200ml.png', 'Produit proposé par GSB', 12, 1, 3),
(16, 'Mustela Solaire Lait très haute Protection', 'images/mustela-solaire-lait-tres-haute-protection-spf50-100ml.jpg', 'Produit proposé par GSB', 12, 1, 3),
(17, 'Isdin Eryfotona aAK fluid', 'images/isdin-eryfotona-aak-fluid-100-50ml.jpg', 'Produit proposé par GSB', 12, 1, 3),
(18, 'La Roche Posay Anthélios 50+ Brume Visage', 'images/la-roche-posay-anthelios-50-brume-visage-toucher-sec-75ml.png', 'Produit proposé par GSB', 12, 1, 3),
(19, 'Nuxe Sun Huile Lactée Capillaire Protectrice', 'images/nuxe-sun-huile-lactee-capillaire-protectrice-100ml.png', 'Produit proposé par GSB', 12, 1, 3),
(20, 'Uriage Bariésun stick lèvres SPF30 4g', 'images/uriage-bariesun-stick-levres-spf30-4g.jpg', 'Produit proposé par GSB', 12, 1, 3),
(21, 'Bioderma Cicabio creme SPF50+ 30ml', 'images/bioderma-cicabio-creme-spf50-30ml.png', 'Produit proposé par GSB', 12, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(128) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`ID`, `Nom`) VALUES
(1, 'Administrateur'),
(2, 'Client');

-- --------------------------------------------------------

--
-- Structure de la table `suggerer`
--

DROP TABLE IF EXISTS `suggerer`;
CREATE TABLE IF NOT EXISTS `suggerer` (
  `ID` int(11) NOT NULL,
  `ID_Produit` int(11) NOT NULL,
  PRIMARY KEY (`ID`,`ID_Produit`),
  KEY `Suggerer_Produit0_FK` (`ID_Produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `suggerer`
--

INSERT INTO `suggerer` (`ID`, `ID_Produit`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(128) COLLATE utf8_bin NOT NULL,
  `Prenom` varchar(128) COLLATE utf8_bin NOT NULL,
  `Telephone` varchar(32) COLLATE utf8_bin NOT NULL,
  `Code_Postal` varchar(5) COLLATE utf8_bin NOT NULL,
  `Ville` varchar(128) COLLATE utf8_bin NOT NULL,
  `Adresse` varchar(128) COLLATE utf8_bin NOT NULL,
  `Mail` varchar(128) COLLATE utf8_bin NOT NULL,
  `Password` varchar(512) COLLATE utf8_bin NOT NULL,
  `ID_Role` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Utilisateur_Role_FK` (`ID_Role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID`, `Nom`, `Prenom`, `Telephone`, `Code_Postal`, `Ville`, `Adresse`, `Mail`, `Password`, `ID_Role`) VALUES
(1, 'Le Roy', 'Mathieu', '00000000', '00000', 'Orléans', '10 Rue des Olives', 'mathieu@mail.com', '$2y$10$2xto2wg/SfxxdeJ2CewUNOQx.EYB5vJhSfChYeRNqNB5DdQCCZ4t6', 1),
(2, 'Fouchard', 'Alexis', '0000000000', '45000', 'Orléans', 'Rue de la rue', 'alexilian.fouchard@gmail.com', '$2y$10$DgCMNJiU9DRI7pTmTBBc2OuzBCTDDQUNUvu06W.A7ljbD0ymhl3KK', 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `Commande_Utilisateur_FK` FOREIGN KEY (`ID_Utilisateur`) REFERENCES `utilisateur` (`ID`);

--
-- Contraintes pour la table `concerner`
--
ALTER TABLE `concerner`
  ADD CONSTRAINT `Concerner_Commande_FK` FOREIGN KEY (`ID`) REFERENCES `commande` (`ID`),
  ADD CONSTRAINT `Concerner_Produit0_FK` FOREIGN KEY (`ID_Produit`) REFERENCES `produit` (`ID`);

--
-- Contraintes pour la table `contenance`
--
ALTER TABLE `contenance`
  ADD CONSTRAINT `Contenance_Produit_FK` FOREIGN KEY (`ID_Produit`) REFERENCES `produit` (`ID`);

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `Note_Produit_FK` FOREIGN KEY (`ID_Produit`) REFERENCES `produit` (`ID`),
  ADD CONSTRAINT `Note_Utilisateur0_FK` FOREIGN KEY (`ID_Utilisateur`) REFERENCES `utilisateur` (`ID`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `Produit_Categorie0_FK` FOREIGN KEY (`ID_Categorie`) REFERENCES `categorie` (`ID`),
  ADD CONSTRAINT `Produit_Marque_FK` FOREIGN KEY (`ID_Marque`) REFERENCES `marque` (`ID`);

--
-- Contraintes pour la table `suggerer`
--
ALTER TABLE `suggerer`
  ADD CONSTRAINT `Suggerer_Produit0_FK` FOREIGN KEY (`ID_Produit`) REFERENCES `produit` (`ID`),
  ADD CONSTRAINT `Suggerer_Produit_FK` FOREIGN KEY (`ID`) REFERENCES `produit` (`ID`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `Utilisateur_Role_FK` FOREIGN KEY (`ID_Role`) REFERENCES `role` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
