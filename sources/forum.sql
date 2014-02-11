-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 11 Février 2014 à 10:58
-- Version du serveur: 5.5.32-0ubuntu0.13.04.1
-- Version de PHP: 5.4.9-4ubuntu2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(512) COLLATE utf8_bin NOT NULL,
  `datecreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_auteur` int(11) NOT NULL,
  `id_sujet` int(11) NOT NULL,
  `id_theme` int(11) NOT NULL,
  PRIMARY KEY (`id_message`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id_message`, `content`, `datecreation`, `id_auteur`, `id_sujet`, `id_theme`) VALUES
(1, 'Bonjour c''est le livreur de pizzas\r\n\r\nVeux-tu un coca ?', '2014-02-09 16:45:04', 1, 1, 0),
(2, 'J''adore le CSS et le HTML car c''est facile.\r\n\r\nLe reste je galère.', '2014-02-10 02:05:28', 1, 2, 0),
(3, 'La programmation objet, c''est le mal !', '2014-02-10 01:17:00', 1, 1, 0),
(4, 'J''hésite entre JS objet et PHP objet.\r\n\r\nFinalement, je préfère la femme objet.', '2014-02-10 02:05:33', 1, 2, 0),
(5, 'est-ce qu''on dit : 9x3 font 11\r\n\r\nou bien\r\n\r\n9x3 font t-onze ?', '2014-02-10 02:05:17', 1, 3, 0),
(6, 'J''ai rien à dire, mais bon.', '2014-02-10 01:17:00', 1, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `sujet`
--

CREATE TABLE IF NOT EXISTS `sujet` (
  `id_sujet` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(32) COLLATE utf8_bin NOT NULL,
  `description` varchar(32) COLLATE utf8_bin NOT NULL,
  `nbrview` int(11) NOT NULL,
  `statut` tinyint(1) NOT NULL,
  `datecreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_auteur` int(11) NOT NULL,
  `id_theme` int(11) NOT NULL,
  PRIMARY KEY (`id_sujet`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Liste des sujets' AUTO_INCREMENT=6 ;

--
-- Contenu de la table `sujet`
--

INSERT INTO `sujet` (`id_sujet`, `titre`, `description`, `nbrview`, `statut`, `datecreation`, `id_auteur`, `id_theme`) VALUES
(1, 'PHP 5 objet', 'Comment s''approprier le PHP obje', 23, 1, '2014-02-09 23:49:28', 1, 1),
(2, 'Javascript', 'blablablablablabla bla', 58, 0, '2014-02-09 23:49:17', 1, 1),
(3, 'MySQL', 'la base de données qui tue', 223, 1, '2014-02-10 01:58:32', 1, 2),
(4, 'CSS 3', 'tout sur le CSS ', 29, 0, '2014-02-10 00:40:10', 1, 1),
(5, 'Jquery', 'le JS simplifié', 156, 0, '2014-02-10 01:58:21', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

CREATE TABLE IF NOT EXISTS `theme` (
  `id_theme` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(32) COLLATE utf8_bin NOT NULL,
  `nbrsujet` int(11) NOT NULL,
  `nbrmsg` int(11) NOT NULL,
  `datecreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_auteur` int(11) NOT NULL,
  PRIMARY KEY (`id_theme`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Liste des thèmes' AUTO_INCREMENT=4 ;

--
-- Contenu de la table `theme`
--

INSERT INTO `theme` (`id_theme`, `titre`, `nbrsujet`, `nbrmsg`, `datecreation`, `id_auteur`) VALUES
(1, 'Informatique', 15, 74, '2014-02-09 16:28:05', 1),
(2, 'sports', 409, 1391, '2014-02-10 01:36:06', 1),
(3, 'mode', 48, 569, '2014-02-10 01:36:06', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `statut` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'utilisateur',
  `authorized` tinyint(1) NOT NULL DEFAULT '1',
  `datecreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `id_user` (`id_user`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Liste des utilisateurs' AUTO_INCREMENT=5 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `login`, `password`, `statut`, `authorized`, `datecreation`) VALUES
(1, 'nico', 'admin', 'administrateur', 1, '2014-02-10 04:16:23'),
(3, 'dlg', 'toto', 'administrateur', 1, '2014-02-10 15:47:48'),
(4, 'toto', 'titi', 'administrateur', 1, '2014-02-10 16:09:46');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
