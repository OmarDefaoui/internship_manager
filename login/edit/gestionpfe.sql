-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2021 at 09:11 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stage`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrateur`
--

CREATE TABLE `administrateur` (
  `id_administrateur` int(25) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `e-mail` varchar(80) NOT NULL,
  `code` varchar(50) NOT NULL,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrateur`
--

INSERT INTO `administrateur` (`id_administrateur`, `prenom`, `nom`, `e-mail`, `code`, `photo`) VALUES
(1, 'Mohamed Chafik', 'El Idrissi', 'rout@uit.ac.ma', 'root', 'inconnu.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `enseignant`
--

CREATE TABLE `enseignant` (
  `id_enseignant` int(15) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `e-mail` varchar(80) NOT NULL,
  `code` varchar(25) NOT NULL,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enseignant`
--

INSERT INTO `enseignant` (`id_enseignant`, `prenom`, `nom`, `e-mail`, `code`, `photo`) VALUES
(1, 'Ilham', 'Oumaira', 'ilham.oumaira@uit.ac.ma', 'azerty', 'inconnu.jpg'),
(2, 'Ayoub', 'Ait Lahcen', 'ayoub.aitlahcen@uit.ac.ma', 'azerty', 'inconnu.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `entreprise`
--

CREATE TABLE `entreprise` (
  `id_entreprise` int(20) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `tel` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entreprise`
--

INSERT INTO `entreprise` (`id_entreprise`, `nom`, `adresse`, `ville`, `tel`) VALUES
(1, 'INWI', 'rue 16, bloc d', 'Casablanca', 600000001),
(2, 'Maroc telecom', 'bloc a , rue s, 2eme etage', 'Tanger', 600000002);

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `id_etudiant` int(15) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `code` varchar(25) NOT NULL,
  `photo` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`id_etudiant`, `prenom`, `nom`, `email`, `code`, `photo`) VALUES
(1, 'Omar', 'Defaoui', 'omar.defaoui@uit.ac.ma', 'azerty', 'inconnu.jpg'),
(2, 'Haytam', 'Barik', 'haytam.barik@uit.ac.ma', 'azerty', 'inconnu.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stage`
--

CREATE TABLE `stage` (
  `id_stage` int(15) NOT NULL,
  `intitule_sujet` varchar(30) DEFAULT NULL,
  `descroption_sujet` varchar(30) DEFAULT NULL,
  `technologies` varchar(90) DEFAULT NULL,
  `premiere_version` varchar(200) DEFAULT NULL,
  `version_corrige` varchar(200) DEFAULT NULL,
  `presentation` varchar(200) DEFAULT NULL,
  `attestation_stage` varchar(200) DEFAULT NULL,
  `fiche_evalution` varchar(200) DEFAULT NULL,
  `nom_encadrant` varchar(200) DEFAULT NULL,
  `prenom_encardrant` varchar(30) DEFAULT NULL,
  `note` int(10) DEFAULT NULL,
  `est_validé` tinyint(1) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `id_enseignant` int(20) DEFAULT NULL,
  `id_entreprise` int(20) DEFAULT NULL,
  `id_etudiant` int(20) DEFAULT NULL,
  `binome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id_administrateur`);

--
-- Indexes for table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`id_enseignant`);

--
-- Indexes for table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id_entreprise`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id_etudiant`);

--
-- Indexes for table `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`id_stage`),
  ADD KEY `id_enseignant` (`id_enseignant`),
  ADD KEY `id_entreprise` (`id_entreprise`),
  ADD KEY `id_etudiant` (`id_etudiant`),
  ADD KEY `id_etudiant_2` (`id_etudiant`),
  ADD KEY `id_etudiant_3` (`id_etudiant`),
  ADD KEY `id_etudiant_4` (`id_etudiant`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id_etudiant` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `stage`
--
ALTER TABLE `stage`
  ADD CONSTRAINT `stage_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id_etudiant`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stage_ibfk_2` FOREIGN KEY (`id_enseignant`) REFERENCES `enseignant` (`id_enseignant`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stage_ibfk_3` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id_entreprise`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
