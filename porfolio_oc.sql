-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 29 avr. 2019 à 13:18
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `blog`
--

INSERT INTO `blog` (`id_Blog`, `Titre`, `date`, `Chapo`, `Contenu`, `id_Admin`, `image`) VALUES
(2, 'TRM', '2019-04-24 00:38:53.000000', 'Site vitrine pour TRM', 'Site réalisé pour TRM au sein de la Société Française de Développement Numérique (SFDN). https://trm53.fr', 1, 'asset/img/project/TRM.png'),
(3, 'Fastauto', '2019-04-23 17:01:21.000000', 'Site d\'annonce de voiture ', 'Site réalisé en tant que freelance pour un particulier. http://fast-auto22.fr/', 1, 'asset/img/project/fastauto.png'),
(4, 'Taxi Courapied', '2019-04-23 16:42:36.000000', 'Un site vitrine pour taxi', 'Site réalisé au sein de la SFDN  dans mes débuts. Le projet fut entièrement mené par mes soins , du cahier des charges à la conception. http://taxicourapied.fr/', 1, 'asset/img/project/taxicourapied.png'),
(12, 'Docteur Game', '2019-04-23 16:50:19.000000', 'Un site promotteur de jeux mobile', 'J\'ai travaillé sur la conception de ce site au sein d\'une petite équipe.  Il fut réalisé avec le framework polymer 1  de google. http://drgames.fr/fr/', 1, 'asset/img/project/drGame.png'),
(13, 'dsds', '2019-04-29 14:58:23.000000', 'dsds', 'dsds', 1, 'asset/img/project/cabin.png');

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_Com`, `Datecom`, `TextCom`, `Validation`, `id_User`, `id_Blog`) VALUES
(1, '2018-10-26 16:51:31.000000', 'premier commentaire', 1, 1, 2),
(2, '2018-10-30 01:52:44.000000', 'testadd com', 1, 1, 2),
(3, '2018-10-30 22:08:42.000000', 'testest', 0, 1, 2),
(4, '2018-11-06 19:52:41.000000', 'youpilala', 0, 1, 3),
(5, '2018-11-06 19:56:07.000000', 'test dans jolie boite', 1, 1, 3),
(6, '2018-11-13 03:15:29.000000', 'test de commentaire', 0, 1, 2),
(7, '2019-02-18 18:19:13.000000', 'blah', 1, 1, 2),
(8, '2019-02-21 21:03:16.000000', 'blahblah', 0, 1, 26),
(9, '2019-02-22 02:52:57.000000', 'brouah', 1, 10, 2),
(10, '2019-02-22 03:08:48.000000', 'trou', 0, 11, 3),
(11, '2019-02-22 03:10:09.000000', 'hehe', 0, 13, 2),
(12, '2019-02-22 03:10:21.000000', 'test', 0, 13, 3),
(13, '2019-02-26 12:42:52.000000', 'brululululululu', 0, 1, 9),
(14, '2019-02-26 12:45:11.000000', 'tetouille', 0, 14, 9),
(15, '2019-02-26 16:58:36.000000', 'fuck', 0, 1, 10),
(16, '2019-03-12 15:41:20.000000', 'truytruy', 0, 1, 3),
(17, '2019-03-12 20:12:24.000000', 'treui', 0, 1, 2),
(18, '2019-03-14 01:50:19.000000', 'psr2', 0, 1, 4),
(19, '2019-04-22 14:51:09.000000', 'gfgdfbdbf', 0, 1, 12),
(20, '2019-04-22 14:52:52.000000', 'poil', 0, 1, 12);

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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_User`, `prenom`, `nom`, `id_Admin`, `Mail`, `Password`) VALUES
(1, 'Robin', 'Campino', 1, 'campino.robin@hotmail.fr', 'kraken333'),
(2, 'Rabbit', 'Roger', NULL, 'Rabbit@hotmail.fr', 'carotte'),
(3, 'Plombier', 'Mario', NULL, 'Mario@hotmail.fr', 'peach'),
(4, 'Le dernier', 'Denver', NULL, 'dinosaure@hotmail.fr', 'denver'),
(5, 'test', 'test', NULL, 'test@test.te', 'test4'),
(13, 'wizard', 'wizard', NULL, 'wizard@wizard.wizard', 'wizard'),
(22, 'sd', 'sd', NULL, 'camfgfffpino.robin@hotmail.fr', 'kraken333'),
(23, 'sta', 'cru', NULL, 'cer@cer.cer', 'cer'),
(24, 'tyy', 'ty', NULL, 'tyy@ty.ty', 'ty'),
(25, 'ounet', 'testounet', NULL, 'cao.robin@hotmail.fr', 'kraken333'),
(27, 'sqsf', 'juve', NULL, 'fdfdfd@fdfd.ffff', 'fdfdf'),
(31, 'lala', 'tralala', NULL, 'campino.robin@hotmail.', 'kraken333');

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
