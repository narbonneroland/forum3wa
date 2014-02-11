-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 11 Février 2014 à 14:34
-- Version du serveur: 5.5.34-0ubuntu0.13.04.1
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=47 ;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id_message`, `content`, `datecreation`, `id_auteur`, `id_sujet`, `id_theme`) VALUES
(1, 'Bonjour c''est le livreur de pizzas\r\n\r\nVeux-tu un coca ?', '2014-02-10 11:47:54', 1, 1, 1),
(2, 'J''adore le CSS et le HTML car c''est facile.\r\n\r\nLe reste je galère.', '2014-02-10 11:48:29', 1, 2, 1),
(3, 'La programmation objet, c''est le mal !', '2014-02-10 11:47:30', 1, 1, 1),
(4, 'J''hésite entre JS objet et PHP objet.\r\n\r\nFinalement, je préfère la femme objet.', '2014-02-10 11:48:19', 1, 2, 1),
(5, 'est-ce qu''on dit : 9x3 font 11\r\n\r\nou bien\r\n\r\n9x3 font t-onze ?', '2014-02-10 11:48:49', 1, 3, 2),
(6, 'J''ai rien à dire, mais bon.', '2014-02-10 11:47:42', 1, 1, 1),
(10, 'test', '2014-02-11 09:50:14', 2, 11, 1),
(11, '123 567', '2014-02-11 09:56:45', 2, 12, 1),
(12, 'tetststst\n', '2014-02-11 10:05:59', 2, 14, 1),
(13, 'sport', '2014-02-11 10:06:41', 2, 15, 2),
(14, 'wcwxcwc', '2014-02-11 10:09:49', 2, 16, 1),
(15, 'xcvxvcxvxvc', '2014-02-11 10:10:11', 2, 17, 1),
(16, '', '2014-02-11 10:11:17', 2, 18, 1),
(17, 'wcwc', '2014-02-11 10:12:40', 2, 19, 1),
(18, 'sqdqsd', '2014-02-11 10:15:51', 2, 20, 1),
(19, 'qsdqsdqs', '2014-02-11 10:16:20', 2, 21, 1),
(20, 'sqdsqdsqd', '2014-02-11 10:17:49', 2, 22, 1),
(21, 'dqsdqd', '2014-02-11 10:21:48', 2, 23, 1),
(22, 'sqdqsdsq', '2014-02-11 10:23:25', 2, 24, 1),
(23, 'sqdsqd', '2014-02-11 10:27:11', 2, 25, 1),
(24, 'qsdsqdq', '2014-02-11 10:30:59', 2, 26, 1),
(25, 'dsdqd', '2014-02-11 10:35:13', 2, 27, 1),
(26, 'qsdqsd', '2014-02-11 10:36:50', 2, 28, 1),
(27, 'sqdqsdsq', '2014-02-11 10:44:24', 2, 29, 1),
(28, 'sqdqsd', '2014-02-11 10:45:33', 2, 30, 1),
(29, 'ddd', '2014-02-11 10:49:32', 2, 31, 1),
(30, '30', '2014-02-11 10:50:50', 2, 32, 1),
(31, 'test', '2014-02-11 10:52:19', 2, 33, 1),
(32, 'sqdsqd', '2014-02-11 10:56:06', 2, 34, 1),
(33, 'sqdqsdsdq', '2014-02-11 10:59:56', 2, 35, 1),
(34, 'dd', '2014-02-11 11:02:59', 2, 36, 1),
(35, 'sqdqsdqsd', '2014-02-11 11:09:08', 2, 37, 1),
(36, 'sqdqsd', '2014-02-11 11:10:01', 2, 38, 1),
(37, 'sdsds', '2014-02-11 11:11:19', 2, 39, 1),
(38, 'tets', '2014-02-11 11:14:03', 2, 40, 1),
(39, 'sqdsqd', '2014-02-11 11:15:30', 2, 41, 1),
(40, 'qsdsqd', '2014-02-11 11:18:33', 2, 42, 1),
(41, 'sdsqdqsd', '2014-02-11 11:32:05', 2, 43, 1),
(42, 'sdfsdf', '2014-02-11 13:11:29', 2, 44, 1),
(43, 'teste de maessage', '2014-02-11 13:25:17', 2, 45, 1),
(44, 'sqdsqdqsd', '2014-02-11 13:26:09', 2, 46, 1),
(45, 'qsdsqdq', '2014-02-11 13:27:07', 2, 47, 1),
(46, 'bienvenue nico\n', '2014-02-11 13:27:29', 2, 48, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Liste des sujets' AUTO_INCREMENT=49 ;

--
-- Contenu de la table `sujet`
--

INSERT INTO `sujet` (`id_sujet`, `titre`, `description`, `nbrview`, `statut`, `datecreation`, `id_auteur`, `id_theme`) VALUES
(1, 'PHP 5 objet', 'Comment s''approprier le PHP obje', 23, 1, '2014-02-09 23:49:28', 1, 1),
(2, 'Javascript', 'blablablablablabla bla', 58, 0, '2014-02-09 23:49:17', 1, 1),
(3, 'MySQL', 'la base de données qui tue', 223, 1, '2014-02-10 01:58:32', 1, 2),
(4, 'CSS 3', 'tout sur le CSS ', 29, 0, '2014-02-10 00:40:10', 1, 1),
(5, 'Jquery', 'le JS simplifié', 156, 0, '2014-02-10 01:58:21', 1, 2),
(11, 'test', 'test', 0, 0, '0000-00-00 00:00:00', 2, 1),
(12, 'salsa', 'salsa', 0, 0, '0000-00-00 00:00:00', 2, 1),
(13, 'lionel', 'tgv', 0, 0, '0000-00-00 00:00:00', 2, 1),
(14, 'test', 'tetstttt', 0, 0, '0000-00-00 00:00:00', 2, 1),
(15, 'spoooooooort', 'sport', 0, 0, '0000-00-00 00:00:00', 2, 2),
(16, 'csfcsdf', 'wcwcwc', 0, 0, '0000-00-00 00:00:00', 2, 1),
(17, 'xcvxvcxc', 'xcvxvcxvc', 0, 0, '0000-00-00 00:00:00', 2, 1),
(18, 'sqdqsd', 'qsdqsdqsd', 0, 0, '0000-00-00 00:00:00', 2, 1),
(19, 'wcwxc', 'wxcwxc', 0, 0, '0000-00-00 00:00:00', 2, 1),
(20, 'sdfsqfdsq', 'qsdqsd', 0, 0, '0000-00-00 00:00:00', 2, 1),
(21, 'sqdsqd', 'sqdsqd', 0, 0, '0000-00-00 00:00:00', 2, 1),
(22, 'sqdsdsqd', 'sqsqdsqd', 0, 0, '0000-00-00 00:00:00', 2, 1),
(23, 'sqcsd', 'qsdsqd', 0, 0, '0000-00-00 00:00:00', 2, 1),
(24, 'sqdqsd', 'sqdqsd', 0, 0, '0000-00-00 00:00:00', 2, 1),
(25, 'sqdqsd', 'qsdqsds', 0, 0, '0000-00-00 00:00:00', 2, 1),
(26, 'sdqdsqd', 'sdsqdqsd', 0, 0, '0000-00-00 00:00:00', 2, 1),
(27, 'dsqd', 'qsdqsdq', 0, 0, '0000-00-00 00:00:00', 2, 1),
(28, 'sqdqd', 'qsdqsdqsd', 0, 0, '0000-00-00 00:00:00', 2, 1),
(29, 'sdqdsq', 'sqdqsd', 0, 0, '0000-00-00 00:00:00', 2, 1),
(30, 'sqd', 'qsd', 0, 0, '0000-00-00 00:00:00', 2, 1),
(31, 'dd', 'dd', 0, 0, '0000-00-00 00:00:00', 2, 1),
(32, '32', '32', 0, 0, '0000-00-00 00:00:00', 2, 1),
(33, 'test', 'test', 0, 0, '0000-00-00 00:00:00', 2, 1),
(34, 'sqdsqd', 'sqdsqd', 0, 0, '0000-00-00 00:00:00', 2, 1),
(35, 'sqdsqd', 'sqdqsd', 0, 0, '0000-00-00 00:00:00', 2, 1),
(36, 'dd', 'dd', 0, 0, '0000-00-00 00:00:00', 2, 1),
(37, 'dsqdqsd', 'qsdqsdsqd', 0, 0, '0000-00-00 00:00:00', 2, 1),
(38, 'dsdq', 'sqdqsd', 0, 0, '0000-00-00 00:00:00', 2, 1),
(39, 'dsds', 'sdsd', 0, 0, '0000-00-00 00:00:00', 2, 1),
(40, 'test', 'test', 0, 0, '0000-00-00 00:00:00', 2, 1),
(41, 'dsqd', 'sqdsqd', 0, 0, '0000-00-00 00:00:00', 2, 1),
(42, 'sqd', 'sqdsqd', 0, 0, '0000-00-00 00:00:00', 2, 1),
(43, 'sdqsqd', 'qsdsqdsq', 0, 0, '0000-00-00 00:00:00', 2, 1),
(44, 'sdfsd', 'sdfsdf', 0, 0, '0000-00-00 00:00:00', 2, 1),
(45, 'titre', 'premier ', 0, 0, '0000-00-00 00:00:00', 2, 1),
(46, 'sqdd', 'sqdsqd', 0, 0, '0000-00-00 00:00:00', 2, 1),
(47, 'sdsqd', 'sqdqsd', 0, 0, '0000-00-00 00:00:00', 2, 1),
(48, 'test', 'test', 0, 0, '0000-00-00 00:00:00', 2, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Liste des thèmes' AUTO_INCREMENT=6 ;

--
-- Contenu de la table `theme`
--

INSERT INTO `theme` (`id_theme`, `titre`, `nbrsujet`, `nbrmsg`, `datecreation`, `id_auteur`) VALUES
(1, 'Informatique', 15, 74, '2014-02-09 16:28:05', 1),
(2, 'sports', 409, 1391, '2014-02-10 01:36:06', 1),
(3, 'mode', 48, 569, '2014-02-10 01:36:06', 1),
(4, 'loisir', 0, 0, '2014-02-11 13:03:58', 1),
(5, 'sujets divers', 0, 0, '2014-02-11 13:04:42', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `statut` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `authorized` tinyint(1) NOT NULL,
  `datecreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Liste des utilisateurs' AUTO_INCREMENT=3 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `login`, `password`, `statut`, `authorized`, `datecreation`) VALUES
(1, 'nico', 'admin', 'administrateur', 1, '2014-02-10 04:16:23'),
(2, 'roland', 'roland', 'utilisateur', 1, '2014-02-11 08:21:10');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
