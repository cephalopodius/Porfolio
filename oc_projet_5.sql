-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 22 oct. 2018 à 16:20
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `porfolio oc`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_Admin` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_Admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_Admin`) VALUES
(1);

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `id_Blog` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Titre` varchar(100) NOT NULL,
  `date` datetime(6) NOT NULL,
  `Chapo` varchar(40) NOT NULL,
  `Contenu` varchar(250) NOT NULL,
  `id_Admin` mediumint(8) UNSIGNED NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`id_Blog`),
  KEY `id_Admin` (`id_Admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `blog`
--



-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_Com` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Datecom` datetime(6) NOT NULL,
  `TextCom` varchar(255) NOT NULL,
  `Validation` tinyint(1) UNSIGNED NOT NULL,
  `id_User` mediumint(8) UNSIGNED NOT NULL,
  `id_Blog` mediumint(8) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_Com`),
  KEY `id_User` (`id_User`),
  KEY `id_Blog` (`id_Blog`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_User` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `prenom` varchar(40) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `id_Admin` mediumint(8) UNSIGNED DEFAULT NULL,
  `Mail` varchar(150) NOT NULL,
  `Password` varchar(150) NOT NULL,
  PRIMARY KEY (`id_User`),
  KEY `id_Admin` (`id_Admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_User`, `prenom`, `nom`, `id_Admin`, `Mail`, `Password`) VALUES
(1, 'Robin', 'Campino', 1, 'campino.robin@hotmail.fr', 'kraken333');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`id_Admin`) REFERENCES `admin` (`id_Admin`) ON DELETE NO ACTION ON UPDATE NO ACTION;


--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_User`) REFERENCES `user` (`id_User`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`id_Blog`) REFERENCES `blog` (`id_Blog`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_Admin`) REFERENCES `admin` (`id_Admin`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
