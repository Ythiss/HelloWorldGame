-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 16 Mars 2017 à 23:27
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `helloworldgame`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `checkUsername`(IN `username` TEXT)
    NO SQL
SELECT   COUNT(username) AS nbr_doublon, username
FROM     joueurs
GROUP BY username
HAVING   COUNT(username) > 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `createUser`(IN `username` TEXT, IN `psw` TEXT, IN `email` TEXT)
    NO SQL
INSERT INTO joueurs(username, psw, email) 
VALUES (username, psw, email)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modifId`(IN `session` VARCHAR(2000), IN `idJ` INT)
    NO SQL
UPDATE joueurs SET idSessPHP=session WHERE id=idJ$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectUsernamePassword`(IN `username` VARCHAR(255), IN `psw` VARCHAR(255))
    NO SQL
SELECT id
FROM joueurs
WHERE username = username
AND psw = psw$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update`(IN `id` INT(255))
    NO SQL
UPDATE joueurs SET username = 'pierre', psw = 'paul', email = 'jaques' WHERE id = id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `joueurs`
--

CREATE TABLE IF NOT EXISTS `joueurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `psw` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Contenu de la table `joueurs`
--

INSERT INTO `joueurs` (`id`, `username`, `psw`, `email`) VALUES
(1, 'toto', 'toto', 'toto@toto.fr'),
(13, 'ythisse', 'bl', 'ythisse@toto.fr'),
(29, 'blabla', 'blbl', 'blabla@toto.fr'),
(37, 'minimario', 'mini', 'mini@mario.fr'),
(38, 'tata', 'tata', 'tata@tata.com'),
(39, 'doom4', 'doom', 'doom4@game.fr'),
(40, 'moi', 'moi', 'moi@moi.fr');

-- --------------------------------------------------------

--
-- Structure de la table `scores`
--

CREATE TABLE IF NOT EXISTS `scores` (
  `playerID` int(11) NOT NULL,
  `playerScore` int(11) NOT NULL,
  `dateScore` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `scores`
--

INSERT INTO `scores` (`playerID`, `playerScore`, `dateScore`) VALUES
(1, 286, '2016-10-08 16:32:22'),
(13, 10, '2016-10-08 16:46:12'),
(30, 35, '2016-10-08 16:46:12'),
(30, 852, '2016-10-08 16:52:48'),
(30, 46, '2016-10-08 17:15:44'),
(30, 340, '2016-10-08 17:22:48'),
(30, 55, '2016-10-10 00:33:43'),
(38, 55, '2016-10-10 10:15:59'),
(38, 100, '2016-10-10 10:18:01'),
(29, 10, '2016-10-10 10:25:16'),
(39, 860, '2016-10-10 10:39:16'),
(39, 44, '2016-10-10 10:39:22'),
(39, 250, '2016-10-10 10:39:28'),
(39, 1001, '2016-10-10 14:31:05'),
(39, 5000, '2016-10-10 14:40:27'),
(40, 354, '2016-10-10 14:43:15'),
(39, 32, '2016-10-10 16:27:53'),
(39, 23, '2016-10-20 14:07:12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
