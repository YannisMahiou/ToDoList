-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 16 déc. 2017 à 10:16
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
-- Base de données :  `app`
--

-- --------------------------------------------------------

--
-- Structure de la table `tlist`
--

DROP TABLE IF EXISTS `tlist`;
CREATE TABLE IF NOT EXISTS `tlist` (
  `id_list` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_list`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tlist`
--

INSERT INTO `tlist` (`id_list`, `name`) VALUES
(1, 'IMPORTANT'),
(2, 'tache n°2');

-- --------------------------------------------------------

--
-- Structure de la table `ttache`
--

DROP TABLE IF EXISTS `ttache`;
CREATE TABLE IF NOT EXISTS `ttache` (
  `id_tache` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext,
  `date` datetime DEFAULT NULL,
  `id_list` int(11) NOT NULL,
  `state` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_tache`),
  KEY `id_list` (`id_list`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tuser`
--

DROP TABLE IF EXISTS `tuser`;
CREATE TABLE IF NOT EXISTS `tuser` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tuser`
--

INSERT INTO `tuser` (`username`, `password`) VALUES
('yamahiou', '8e096e8c28c95fb1aed3241c73c5c634e64830940c970586100ac3c99f1f4c49a7ffde2e7093384ec959e270a729fee92edda663642be9b24d63d7465f7d32e6'),
('sasa', '748421374ff4836843e1b48b11b1eda27c432226c4b023d06edae8f11f176b8f121c628b96d7d20fbee6738bdedd6a66c059a976615487a217c1b9c5d5359300'),
('toto', '7759c425e452e4e809d194084601097168236325736c3911badb429d34a962af9ce681a43e719b7a5d70144dfafbd7bb1402a55aee734000b83ea1a14c7459d3'),
('benoit', '45fcf92f779f6f466199b8512cb7d76766e3b09a57c1659fb664c64b38077e2f66e78cea980eb0282ecdbbf5cec05ff5bfc3a2b61164636bd13482a5735f1cfe'),
('lourd', '13e9258b27f744cef70cb7a4d798e81d5024448bebf5763a3feda084d29fffdfac544ce216132aa147da65dcaa63961c9f1ee93f83d30571813191d4732c5f2e'),
('maillot', '472008f22d96d123f38cdbf3d6487fb56c42f71501695e8ceca2091886ea4ca77ea52c4e7a1e3398a06b95c449cca3703d42738e525d6d0f4b99ff80c5278320');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
