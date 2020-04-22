-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 10 avr. 2020 à 20:53
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
-- Base de données :  `icare`
--

-- --------------------------------------------------------

--
-- Structure de la table `infirmier`
--

DROP TABLE IF EXISTS `infirmier`;
CREATE TABLE IF NOT EXISTS `infirmier` (
  `idInfirmier` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `email` text NOT NULL,
  `dateNaissance` date NOT NULL,
  `adresse` text NOT NULL,
  `codePostal` int(11) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `telephone` bigint(20) NOT NULL,
  `commentaire` text NOT NULL,
  PRIMARY KEY (`idInfirmier`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `infirmier`
--

INSERT INTO `infirmier` (`idInfirmier`, `nom`, `prenom`, `email`, `dateNaissance`, `adresse`, `codePostal`, `ville`, `telephone`, `commentaire`) VALUES
(1, 'Goetschel', 'Numa', 'mezafklpo@zefl.pol', '1999-04-11', '52ju', 81200, 'mzt', 3651560, 'Julfan'),
(4, 'test', 'a', 'm@m.m', '2020-04-11', '52ju', 1, 'mzt', 23, 'gfhjik');

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

DROP TABLE IF EXISTS `profil`;
CREATE TABLE IF NOT EXISTS `profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`id`, `nom`, `prenom`, `email`, `password`) VALUES
(23, 'Goetschel', 'Numa', 'numa@mail.com', '$2y$10$sCTv7Wmc998To3CFm6tbZuPScImbPoX/bjyUZbT1b6FOjF.7GuqEW'),
(5, 'test', 'test', 'test@test.com', '$2y$10$dvh3HAKgk4Xj429/63Qa6eingZf1si2cLGV3zDcMiSgfoy2mRYVRS'),
(24, 'testnu', 'ma', 'te@te.te', '$2y$10$bhWquGzR7Ckm2mwvnwT.QOxYLNDtU0ccwUgSYNx2OUaqGB0DuAmmG');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
