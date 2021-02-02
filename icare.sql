-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 10, 2020 at 03:48 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `icare`
--

-- --------------------------------------------------------

--
-- Table structure for table `acteMedical`
--

CREATE TABLE `acteMedical` (
  `idActePrevu` int(11) NOT NULL,
  `durée` int(11) NOT NULL,
  `nbIntervenant` int(11) NOT NULL DEFAULT '1',
  `commentaire` text NOT NULL,
  `idTypeActe_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acteMedical`
--

INSERT INTO `acteMedical` (`idActePrevu`, `durée`, `nbIntervenant`, `commentaire`, `idTypeActe_fk`) VALUES
(1, 2, 1, 'Cet acte est la suite d\'une prise du taux de glycémie.', 1),
(2, 15, 1, 'Désinfection de la plaie\r\nChangement du pansement', 14),
(3, 30, 1, '', 22);

-- --------------------------------------------------------

--
-- Table structure for table `infirmier`
--

CREATE TABLE `infirmier` (
  `idInfirmier` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `email` text NOT NULL,
  `dateNaissance` date NOT NULL,
  `adresse` text NOT NULL,
  `codePostal` int(11) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `telephone` bigint(20) NOT NULL,
  `commentaire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `infirmier`
--

INSERT INTO `infirmier` (`idInfirmier`, `nom`, `prenom`, `email`, `dateNaissance`, `adresse`, `codePostal`, `ville`, `telephone`, `commentaire`) VALUES
(1, 'Muller', 'Lisa', 'lisa.muller@hotmail.fr', '1978-09-22', '12 rue Bellevue', 81100, 'Castres', 639769905, 'RAS'),
(3, 'BERTRAND', 'Louis', 'louis.bertrand@gmail.com', '1980-01-25', '5 place de La Croix', 81100, 'Castres', 690342965, 'RAS'),
(6, 'ROUSSEAU', 'Maria', 'maria.rousseau@free.fr', '1990-06-18', '18 chemin de Côte Rousse', 81100, 'Castres', 653893957, 'RAS'),
(7, 'GUERRIN', 'Isabelle', 'isa.guerrin@orange.fr', '1986-03-20', '3 rue des pins', 81100, 'Burlats', 651809214, 'RAS');

-- --------------------------------------------------------

--
-- Table structure for table `motifPriseEnCharge`
--

CREATE TABLE `motifPriseEnCharge` (
  `idMotif` int(11) NOT NULL,
  `intitule` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `motifPriseEnCharge`
--

INSERT INTO `motifPriseEnCharge` (`idMotif`, `intitule`) VALUES
(1, 'Grabataire '),
(2, 'Post-opératoire'),
(3, 'Chimiothérapie'),
(4, 'Ostéoporose'),
(5, 'Diabète');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `idPatient` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `email` text NOT NULL,
  `dateNaissance` date NOT NULL,
  `adresse` text NOT NULL,
  `codePostal` int(11) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `telephone` bigint(20) NOT NULL,
  `commentaire` text NOT NULL,
  `taille` int(11) NOT NULL,
  `poids` int(11) NOT NULL,
  `typeHabitation` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`idPatient`, `nom`, `prenom`, `email`, `dateNaissance`, `adresse`, `codePostal`, `ville`, `telephone`, `commentaire`, `taille`, `poids`, `typeHabitation`) VALUES
(1, 'ROUX', 'Monique', 'roux.monique@free.fr', '2020-10-30', '20 rue Canteloube', 81100, 'Castres', 639821812, 'Ostéoporose', 160, 65, 'Maison'),
(2, 'DURAND', 'Charles', 'charles.durand@gmail.com', '1940-05-06', '3 chemin de la barque', 81100, 'Castres', 658392019, 'Diabétique de type 2', 174, 90, 'Maison'),
(5, 'MARTIN', 'Rose', 'rose.martin@gmail.com', '1933-03-17', '9 rue des jardins neufs', 81100, 'Castres', 640398621, 'Hospitalisée pour chute le 12/02/2000\r\n', 155, 56, 'Appartement'),
(9, 'PETIT', 'Patrick', 'patrick.petit@gmail.com', '1930-08-06', '15 rue de l\'arc boisé', 81100, 'Castres', 670806521, 'Grabataire', 176, 85, 'Maison');

-- --------------------------------------------------------

--
-- Table structure for table `priseEnCharge`
--

CREATE TABLE `priseEnCharge` (
  `idPrise` int(11) NOT NULL,
  `idPatient_fk` int(11) NOT NULL,
  `idInfirmier_fk` int(11) NOT NULL,
  `dateP` date NOT NULL,
  `commentaire` text NOT NULL,
  `idMotif_fk` int(11) NOT NULL,
  `idActePrevu_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `nom`, `prenom`, `email`, `password`) VALUES
(5, 'test', 'test', 'test@test.com', '$2y$10$dvh3HAKgk4Xj429/63Qa6eingZf1si2cLGV3zDcMiSgfoy2mRYVRS'),
(23, 'Goetschel', 'Numa', 'numa@mail.com', '$2y$10$sCTv7Wmc998To3CFm6tbZuPScImbPoX/bjyUZbT1b6FOjF.7GuqEW'),
(25, 'lala', 'la', 'la@la.la', '$2y$10$49aUlueh6W1laQoh5cHGxe8dsSeCkgAqqCJuSr5U.cWProO/Nsyvi'),
(26, 'Marisol', 'Marisol', 'ma@am.com', '$2y$10$Y6.jJZgZPe5Jjz3LYJAsa.FeJoEZxVpuhU.iI/wgQ1LLPLlh9xOsC');

-- --------------------------------------------------------

--
-- Table structure for table `ressourceMat`
--

CREATE TABLE `ressourceMat` (
  `typeVehicule` varchar(50) NOT NULL,
  `consoEssence` int(11) NOT NULL,
  `materiel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `typeActe`
--

CREATE TABLE `typeActe` (
  `idActe` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `typeActe`
--

INSERT INTO `typeActe` (`idActe`, `nom`) VALUES
(1, 'Injection insuline'),
(2, 'Injection Prolia ostéoporose'),
(7, 'Traitement chimiothérapie'),
(9, 'Vérification taux insuline'),
(14, 'Pansement'),
(15, 'Prise tension'),
(17, 'Pose sonde vésicale'),
(18, 'Pesée'),
(20, 'Distribution médicament'),
(22, 'Toilette'),
(25, 'Habillage'),
(28, 'Changement couche');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acteMedical`
--
ALTER TABLE `acteMedical`
  ADD PRIMARY KEY (`idActePrevu`),
  ADD KEY `idTypeActe_fk` (`idTypeActe_fk`);

--
-- Indexes for table `infirmier`
--
ALTER TABLE `infirmier`
  ADD PRIMARY KEY (`idInfirmier`);

--
-- Indexes for table `motifPriseEnCharge`
--
ALTER TABLE `motifPriseEnCharge`
  ADD PRIMARY KEY (`idMotif`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`idPatient`);

--
-- Indexes for table `priseEnCharge`
--
ALTER TABLE `priseEnCharge`
  ADD PRIMARY KEY (`idPrise`),
  ADD KEY `idInfirmier_fk` (`idInfirmier_fk`),
  ADD KEY `idPatient_fk` (`idPatient_fk`),
  ADD KEY `idMotif_fk` (`idMotif_fk`),
  ADD KEY `idActePrevu_fk` (`idActePrevu_fk`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typeActe`
--
ALTER TABLE `typeActe`
  ADD PRIMARY KEY (`idActe`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `infirmier`
--
ALTER TABLE `infirmier`
  MODIFY `idInfirmier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `idPatient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acteMedical`
--
ALTER TABLE `acteMedical`
  ADD CONSTRAINT `idTypeActe_fk` FOREIGN KEY (`idTypeActe_fk`) REFERENCES `typeActe` (`idActe`) ON UPDATE CASCADE;

--
-- Constraints for table `priseEnCharge`
--
ALTER TABLE `priseEnCharge`
  ADD CONSTRAINT `idActePrevu_fk` FOREIGN KEY (`idActePrevu_fk`) REFERENCES `acteMedical` (`idActePrevu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `idInfirmier_fk` FOREIGN KEY (`idInfirmier_fk`) REFERENCES `infirmier` (`idInfirmier`) ON UPDATE CASCADE,
  ADD CONSTRAINT `idMotif_fk` FOREIGN KEY (`idMotif_fk`) REFERENCES `motifPriseEnCharge` (`idMotif`) ON UPDATE CASCADE,
  ADD CONSTRAINT `idPatient_fk` FOREIGN KEY (`idPatient_fk`) REFERENCES `patient` (`idPatient`) ON UPDATE CASCADE;
