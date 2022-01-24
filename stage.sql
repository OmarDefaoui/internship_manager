-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2022 at 06:31 PM
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
  `email` varchar(80) NOT NULL,
  `code` varchar(50) NOT NULL,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrateur`
--

INSERT INTO `administrateur` (`id_administrateur`, `prenom`, `nom`, `email`, `code`, `photo`) VALUES
(1, 'Mohamed Chafik', 'El Idrissi', 'rout@uit.ac.ma', 'root', 'inconnu.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `conversation_id` int(11) NOT NULL,
  `conversation_etudiant_id` int(20) NOT NULL,
  `conversation_enseignant_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`conversation_id`, `conversation_etudiant_id`, `conversation_enseignant_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `enseignant`
--

CREATE TABLE `enseignant` (
  `id_enseignant` int(20) NOT NULL,
  `prenom_enseignant` varchar(30) NOT NULL,
  `nom_enseignant` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `code` varchar(30) NOT NULL,
  `photo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `enseignant`
--

INSERT INTO `enseignant` (`id_enseignant`, `prenom_enseignant`, `nom_enseignant`, `email`, `code`, `photo`) VALUES
(1, 'Ilham', 'Oumaira', 'ilham.oumaira@uit.ac.ma', 'azerty', '1.jpg'),
(2, 'Ayoub', 'Ait Lahcen', 'ayoub.aitlahcen@uit.ac.ma', '', '2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `entreprise`
--

CREATE TABLE `entreprise` (
  `id_entreprise` int(20) NOT NULL,
  `nom_entreprise` varchar(30) NOT NULL,
  `adresse` varchar(30) DEFAULT NULL,
  `ville` varchar(30) DEFAULT NULL,
  `tel` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `entreprise`
--

INSERT INTO `entreprise` (`id_entreprise`, `nom_entreprise`, `adresse`, `ville`, `tel`) VALUES
(1, 'INWI', 'rue 2 bloc d', 'casablance', '06000001'),
(2, 'Maroc Telecom', 'rue 5 bloc q', 'Rabat', '06000002'),
(3, 'INWI 2', 'adresse 2', 'ville 2', '060000002'),
(4, 'INWI 3', 'adresse 3', 'ville 3', '060000003'),
(5, 'ent 1', 'adr 1', 'vil 1', '06000001'),
(6, 'ent 2', 'adr 2', 'vil 2', '06000002'),
(7, 'ent 3', 'adr 3', 'vil 3', '06000003'),
(8, 'ent 4', 'adr 4', 'vil 4', '06000004'),
(9, 'kjkfl', 'kljkj', 'jk', 'jkjk');

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
  `photo` varchar(80) DEFAULT NULL,
  `Filière` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`id_etudiant`, `prenom`, `nom`, `email`, `code`, `photo`, `Filière`) VALUES
(1, 'Omar', 'Defaoui', 'omar.defaoui@uit.ac.ma', 'azerty', '1.jpg', 'GI'),
(2, 'Haytam', 'Barik', 'haytam.barik@uit.ac.ma', 'azerty', 'inconnu.jpg', 'GI');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(20) NOT NULL,
  `message_content` varchar(500) NOT NULL,
  `message_date` datetime NOT NULL,
  `message_sender` int(1) NOT NULL,
  `message_conversation_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `message_content`, `message_date`, `message_sender`, `message_conversation_id`) VALUES
(1, '111111111111', '2022-01-12 22:11:37', 0, 1),
(2, '2222222222', '2021-01-12 22:11:37', 0, 2),
(3, '333333333', '2022-01-12 22:12:21', 0, 3),
(4, '44444444', '2022-01-12 22:17:06', 1, 1),
(5, 'Hi, how are you ?', '2022-01-12 22:58:34', 1, 1),
(6, 'What are you doing tonight ? Want to go take a drink ?', '2022-01-12 22:58:34', 1, 1),
(8, 'test 1', '2022-01-14 10:01:06', 1, 1),
(9, 'cv', '2022-01-14 10:01:15', 1, 1),
(10, 'labas', '2022-01-14 10:01:19', 1, 1),
(11, 'ach kat3awd', '2022-01-14 10:01:49', 1, 1),
(12, 'l7mdlh', '2022-01-14 22:22:09', 0, 1),
(13, 'slama', '2022-01-21 04:01:14', 1, 1),
(14, 'ff', '2022-01-22 05:01:08', 1, 1),
(15, 'salam', '2022-01-22 05:01:34', 1, 1),
(16, 'lsdklsds', '2022-01-22 05:01:33', 1, 1),
(17, 'salut', '2022-01-22 05:01:19', 1, 1),
(18, 'bikhir', '2022-01-22 05:01:36', 1, 1),
(19, 'hanya', '2022-01-22 05:01:41', 1, 1),
(20, 'ddd', '2022-01-22 05:01:13', 1, 1),
(21, 'salut', '2022-01-22 10:01:52', 1, 2),
(22, 'kl', '2022-01-22 11:01:23', 1, 2),
(23, 'bikhir', '2022-01-22 11:01:41', 1, 2),
(24, 'hanya', '2022-01-23 08:01:25', 1, 2),
(25, 'tot', '2022-01-23 08:01:16', 1, 2),
(26, 'tot', '2022-01-23 08:01:12', 1, 2),
(27, 'toto', '2022-01-23 08:01:18', 1, 2),
(28, 'toto', '2022-01-23 08:01:35', 1, 2),
(29, 'bikhir', '2022-01-23 08:01:12', 1, 2),
(30, 'kifach', '2022-01-23 08:01:17', 1, 2),
(31, 'salam', '2022-01-23 08:01:25', 1, 1),
(32, 'fen a 3chiri', '2022-01-23 08:01:59', 1, 2),
(33, 'hanya b3da', '2022-01-23 08:01:04', 1, 1),
(34, 'fen', '2022-01-23 08:01:02', 1, 1),
(37, 'kdlsdsf', '2022-01-23 05:01:42', 1, 2),
(38, 'fen a 3chiri cv 3lik', '2022-01-23 06:01:06', 1, 1),
(50, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2022-01-23 06:01:09', 1, 1),
(51, 'test', '2022-01-23 06:01:21', 1, 2),
(52, 'salam', '2022-01-23 06:01:24', 1, 1),
(53, 'yoo', '2022-01-24 12:01:08', 1, 1),
(54, 'dd', '2022-01-24 03:01:04', 0, 1),
(55, 'fff', '2022-01-24 03:01:43', 0, 1),
(56, 'bikhir', '2022-01-24 03:01:37', 0, 1),
(57, 'ffff', '2022-01-24 03:01:49', 0, 2),
(58, 'fen', '2022-01-24 04:01:29', 0, 1),
(59, 'labas 3lik', '2022-01-24 04:01:12', 0, 1),
(60, '7mdlh et tt', '2022-01-24 04:01:19', 1, 1),
(61, 'bikhir', '2022-01-24 04:01:20', 0, 3),
(62, 'ttt', '2022-01-24 06:01:34', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id_notification` int(20) NOT NULL,
  `content` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `id_enseignant` int(20) NOT NULL,
  `id_etudiant` int(20) NOT NULL,
  `sender` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id_notification`, `content`, `date`, `id_enseignant`, `id_etudiant`, `sender`) VALUES
(1, '<b>Mr. Hassan</b> a accepter de vous guider lors de votre stage', '2022-01-06', 0, 0, 0),
(2, '<b>Mr. Hassan</b> a accepter de vous guider lors de votre stage', '2022-01-05', 0, 0, 0),
(3, '<b>Mr. Aijdjd</b> a accepter de vous encadrerlors de votre stage', '2022-01-11', 2, 1, 0),
(4, '<b>Prof. bcbcb</b> a accepter vous a attribuer une note', '2022-01-02', 1, 1, 0),
(5, '<b>Defaoui Omar</b> a fait une motification sur son stage', '2022-01-24', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stage`
--

CREATE TABLE `stage` (
  `id_stage` int(15) NOT NULL,
  `intitule_sujet` varchar(30) DEFAULT NULL,
  `description_sujet` varchar(300) DEFAULT NULL,
  `technologies` varchar(90) DEFAULT NULL,
  `premiere_version` varchar(200) DEFAULT NULL,
  `version_corrige` varchar(200) DEFAULT NULL,
  `presentation` varchar(200) DEFAULT NULL,
  `attestation_stage` varchar(200) DEFAULT NULL,
  `fiche_evalution` varchar(200) DEFAULT NULL,
  `nom_encadrant` varchar(200) DEFAULT NULL,
  `prenom_encardrant` varchar(30) DEFAULT NULL,
  `note` int(10) DEFAULT NULL,
  `est_valide` tinyint(1) DEFAULT 0,
  `type` varchar(10) DEFAULT NULL,
  `id_enseignant` int(20) DEFAULT NULL,
  `id_entreprise` int(20) DEFAULT NULL,
  `id_etudiant` int(20) DEFAULT NULL,
  `duree` int(3) DEFAULT NULL,
  `nom_binome` varchar(20) DEFAULT NULL,
  `prenom_binome` varchar(20) DEFAULT NULL,
  `photo_binome` varchar(80) DEFAULT NULL,
  `creation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stage`
--

INSERT INTO `stage` (`id_stage`, `intitule_sujet`, `description_sujet`, `technologies`, `premiere_version`, `version_corrige`, `presentation`, `attestation_stage`, `fiche_evalution`, `nom_encadrant`, `prenom_encardrant`, `note`, `est_valide`, `type`, `id_enseignant`, `id_entreprise`, `id_etudiant`, `duree`, `nom_binome`, `prenom_binome`, `photo_binome`, `creation_date`) VALUES
(1, 'PFA chez INWI', 'Je suis developpeur web charge de l\'ameliration de la solution e-commerce A', 'Java, C, C#, C++', NULL, NULL, NULL, NULL, NULL, 'Benbrahim', 'Mohamed', NULL, 1, 'PFE', 1, 1, 1, 6, 'Belfqi', 'Jilali', '2.jpg', '2022-01-03'),
(2, 'PFA chez IAM', 'Je suis developpeur web charge de l\'ameliration de la solution e-commerce A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(3, 'PFA chez Orange', 'Je suis developpeur web charge de l\'ameliration de la solution e-commerce A', 'Java, C, C#, C++', NULL, NULL, NULL, NULL, NULL, 'Benbrahim', 'Mohamed', NULL, NULL, 'PFE', 1, 1, 2, 5, NULL, NULL, NULL, NULL),
(4, 'PFA chez INWI', 'Je suis developpeur web charge de l\'ameliration de la solution e-commerce A', 'Java, C, C#, C++', NULL, NULL, NULL, NULL, NULL, 'Benbrahim', 'Mohamed', NULL, NULL, 'PFA', 1, 1, 1, 6, 'nombin', 'prenbin', '2.jpg', NULL),
(6, 'PFA chez Jilali', 'ncjd dfefef ef ekjfekf dksdef ekheiowfnew fekjfke', 'skdls,fdfd, fdfdfd, fefrg, grgr', '', '', '', '', '', 'nom1enc', 'prenom1enc', NULL, NULL, 'PFA', NULL, NULL, 1, 7, 'nombin1', 'prenbin1', '', NULL),
(9, 'PFA chez INWI 2', 'ljfklefnre f leknflkefjefjkrljfrkgrfd fejkflergergerfedklnrge', 'ffrf,fgrgrgr,grgrg,grgrgr', '1.pdf', '1.pdf', '1.pdf', '1.pdf', '1.pdf', 'nomEnc2', 'prenEnc2', 16, 1, 'PFA', 2, 3, 1, 1, 'reda', 'jilali', '3.png', '2022-01-02'),
(10, 'ojkljkllllllllllllllllllllllll', 'jkljkljklllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll', 'nmnjkjkb', '', '', '', '', '', 'mlklllllllllll', 'jkljkj', NULL, NULL, 'PFE', NULL, 9, 1, 5, '', '', 'inconnu.jpg', '2022-01-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id_administrateur`);

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`conversation_id`),
  ADD KEY `conversation_etudiant_id` (`conversation_etudiant_id`),
  ADD KEY `conversation_enseignant_id` (`conversation_enseignant_id`);

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
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `message_conversation_id` (`message_conversation_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id_notification`),
  ADD KEY `id_etudiant` (`id_etudiant`),
  ADD KEY `id_enseignant` (`id_enseignant`);

--
-- Indexes for table `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`id_stage`),
  ADD KEY `id_enseignant` (`id_enseignant`),
  ADD KEY `id_etudiant` (`id_etudiant`),
  ADD KEY `id_etudiant_2` (`id_etudiant`),
  ADD KEY `id_etudiant_3` (`id_etudiant`),
  ADD KEY `id_etudiant_4` (`id_etudiant`),
  ADD KEY `id_entreprise` (`id_entreprise`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id_administrateur` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `conversation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `id_enseignant` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id_entreprise` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id_etudiant` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id_notification` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stage`
--
ALTER TABLE `stage`
  MODIFY `id_stage` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
