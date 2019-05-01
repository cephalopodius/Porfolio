-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 01 mai 2019 à 14:51
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `blog`
--

INSERT INTO `blog` (`id_Blog`, `Titre`, `date`, `Chapo`, `Contenu`, `id_Admin`, `image`) VALUES
(2, 'TRM !', '2019-04-29 21:39:19.000000', 'Site vitrine pour TRM', 'Site réalisé pour TRM au sein de la Société Française de Développement Numérique (SFDN). https://trm53.fr', 1, 'asset/img/project/TRM.png'),
(3, 'Fastauto', '2019-04-29 17:55:52.000000', 'Site d\'annonce de voiture ', 'Site réalisé en tant que freelance pour un particulier vendeur de voiture d\'occasion. ', 1, 'asset/img/project/fastauto.png'),
(4, 'Taxi Courapied !', '2019-04-29 20:02:30.000000', 'Un site vitrine pour taxi', 'Site réalisé au sein de la SFDN  dans mes débuts. Le projet fut entièrement mené par mes soins , du cahier des charges à la conception. http://taxicourapied.fr/', 1, 'asset/img/project/taxicourapied.png'),
(12, 'Docteur Game', '2019-04-23 16:50:19.000000', 'Un site promotteur de jeux mobile', 'J\'ai travaillé sur la conception de ce site au sein d\'une petite équipe.  Il fut réalisé avec le framework polymer 1  de google. http://drgames.fr/fr/', 1, 'asset/img/project/drGame.png');

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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_Com`, `Datecom`, `TextCom`, `Validation`, `id_User`, `id_Blog`) VALUES
(2, '2018-10-30 01:52:44.000000', 'testadd com', 1, 1, 2),
(5, '2018-11-06 19:56:07.000000', 'test dans jolie boite', 1, 1, 3),
(7, '2019-02-18 18:19:13.000000', 'blah', 1, 1, 2),
(16, '2019-03-12 15:41:20.000000', 'truytruy', 1, 1, 3),
(17, '2019-03-12 20:12:24.000000', 'treui', 1, 1, 2),
(21, '2019-04-29 18:11:55.000000', 'Bonjour je test les commentaire', 1, 1, 3),
(22, '2019-04-29 19:10:53.000000', 'beau taxi', 1, 32, 4),
(23, '2019-04-29 19:30:12.000000', 'bouyabouya', 0, 1, 2),
(24, '2019-04-29 19:30:54.000000', 'vroomvroom', 1, 32, 3),
(25, '2019-04-29 19:35:04.000000', 'miam', 0, 32, 3),
(26, '2019-04-29 21:38:33.000000', 'test', 1, 33, 3),
(28, '2019-05-01 16:44:31.000000', 'vroom', 1, 37, 3),
(29, '2019-05-01 16:48:56.000000', 'truite', 1, 43, 3);

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
  UNIQUE KEY `Mail` (`Mail`),
  KEY `id_Admin` (`id_Admin`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_User`, `prenom`, `nom`, `id_Admin`, `Mail`, `Password`) VALUES
(1, 'robin', 'campino', 1, 'campino.robin@hotmail.fr', '$2y$12$Gv1FdWmmQk7DUffmaASbbe/1Mow.e5dR/WcLj3K7sXBTomqiZWZzy'),
(34, 'jesus', 'jesus', NULL, 'jesus@revient.sien', '$2y$12$AYX6OyDPcTbIrNEAy7Ohw.P8FqLw6igmVteQe3KAtCsrEC/kFKLna'),
(35, 'roger', 'roger', NULL, 'roger@rabit.com', '$2y$12$GBXH3UwCFImvtdiJtJZf3em5r8Z6.fN4mTM/tDtYcKTjPUsqcJ5mi'),
(36, 'ty', 'ty', NULL, 'ty@ty.ty', '$2y$12$HhuA3pOVTFnrfbX9pd/EguN1aRXAY0ztkZiQplhkE2f/foCAFNDmu'),
(37, 'doom', 'doom', NULL, 'doom@doom.doom', '$2y$12$mnTXOexA9apqEmPPMeBR..QrOrTPg/Y0mFryzhns2XbwGyU4QorLy'),
(38, 'ra', 'ra', NULL, 'ra@ra.ra', '$2y$12$Wr5G6Oct/ib75.dLr2TtNu9s4n1aYvB3CUN0itSB6apNnKrgdid2K'),
(42, 'ru', 'ru', NULL, 'ru@ru.ru', '$2y$12$6AsaVJwH9PifTM5IweQATecuh0smR5I6ttEirkR6p0xzc2PwbNNHm'),
(43, 'rez', 'rez', NULL, 'rez@rez.rez', '$2y$12$Iq0/lTBxb63c12ClT0rMHeFA3K8SCkDjnmfCTugZpmnu1XjDqljh2');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`id_Admin`) REFERENCES `admin` (`id_Admin`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
