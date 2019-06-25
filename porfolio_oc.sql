-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 03 juin 2019 à 14:08
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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

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
(43, 'rez', 'rez', NULL, 'rez@rez.rez', '$2y$12$Iq0/lTBxb63c12ClT0rMHeFA3K8SCkDjnmfCTugZpmnu1XjDqljh2'),
(44, 'robin', 'xxx', NULL, 'xxx@xx.com', '$2y$12$5cudr.8Z694MC.y4c35cR.TXfZEzILRkFF6iJTaIAfriyQCIQak/m'),
(46, 'robin', 'pm', NULL, 'pm@pm.pm', '$2y$12$tdVHjz9FK3UVojg2K0aHb.8IpIGgryivZ3Zmx9a636jEuv6Sigbde'),
(47, 'robin', 'xxxx', NULL, 'xxxx@x.x', '$2y$12$LD2pMjdljIIHVbuZHcVXe.njHkLp/xDRD0GHptJWomMVh4obmYHb6'),
(48, 'robin', 'tui', NULL, 'tui@tui.tui', '$2y$12$/xDbrmQ3Lg6GkCPZ7i6ydOcQPZTHZMFmEfwnIacbK46LMDulq8Odi'),
(49, 'robin', 'zer', NULL, 'zer@zer.zer', '$2y$12$zLk8c4vvUPMOIlRcJvgos.qxui0Fxe6.U4a3LoPnOQWcs/af0EYsi');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
