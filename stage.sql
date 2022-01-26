-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql111.epizy.com
-- Generation Time: Jan 26, 2022 at 12:29 PM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_30767803_stage`
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
(1, 'Mohamed Chafik', 'El Idrissi', 'root@uit.ac.ma', 'root', 'inconnu.jpg');

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
(6, 19000018, 17),
(7, 19000018, 15),
(9, 19000067, 17),
(18, 19000067, 15),
(19, 19011058, 17),
(21, 19000018, 17);

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
(3, 'Ibrahim', ' BOUMAZZOU', 'ibrahim.boumazzou@uit.ac.ma', 'azerty', '5.png'),
(4, 'Moulay Othman', ' ABOUTAFAIL', 'moulayothman.aboutafail@uit.ac', 'azerty', '5.png'),
(5, 'Nabil', ' HMINA', 'nabil.hmina@uit.ac.ma', 'azerty', '5.png'),
(6, 'Hassan', ' MHARZI', 'h.mharzi@uit.ac.ma', 'azerty', '5.png'),
(7, 'Driss', ' GRETETE', 'driss.gretete@uit.ac.ma', 'azerty', '5.png'),
(8, 'Mostafa', ' MASLOUHI', 'mostafa.maslouhi@uit.ac.ma', 'azerty', '5.png'),
(9, 'Abdellah', ' ABOUABDELLAH', 'abdellah.abouabdellah@uit.ac.m', 'azerty', '5.png'),
(10, 'Moulay Taib', ' BELGHITI', 'moulaytaib.belghiti@uit.ac.ma', 'azerty', '5.png'),
(11, 'Habiba', ' CHAOUI', 'habiba.chaoui@uit.ac.ma', 'azerty', '5.png'),
(12, 'Abdelmajid', ' ELOUADI', 'abdelmajid.elouadi@uit.ac.ma', 'azerty', '5.png'),
(13, 'Norelislam', ' EL HAMI', 'norelislam.elhami@uit.ac.ma', 'azerty', '5.png'),
(14, 'Youssef', ' BENTALEB', 'youssef.bentaleb@uit.ac.ma', 'azerty', '5.png'),
(15, 'Khalid', ' CHOUGDALI', 'khalid.chougdali@uit.ac.ma', 'saad', '5.png'),
(16, 'Samir', ' BELFKIH', 'samir.belfkih@uit.ac.ma', 'azerty', '5.png'),
(17, 'Ilham', ' OUMAIRA', 'ilham.oumaira@uit.ac.ma', 'azerty', '17 OUMAIRAIlham.jpg'),
(18, 'Aouatif', ' AMINE', 'aouatif.amine@uit.ac.ma', 'azerty', '5.png'),
(19, 'Anas', ' BOUAYAD', 'anas.bouayad@uit.ac.ma', 'azerty', '5.png'),
(20, 'Younes', ' EL BOUZEKRI EL IDRISSI', 'y.elbouzekri@uit.ac.ma', 'azerty', '5.png'),
(21, 'Ayoub', ' AIT LAHCEN', 'ayoub.aitlahcen@uit.ac.ma', 'azerty', '5.png'),
(22, 'Hanaa', ' HACHIMI', 'hanaa.hachimi@uit.ac.ma', 'azerty', '5.png'),
(23, 'Rachid', ' BANNARI', 'rachid.bannari@uit.ac.ma', 'azerty', '5.png'),
(24, 'Samira', ' MABTOUL', 'samira.mabtoul@uit.ac.ma', 'azerty', '5.png'),
(25, 'Laila', ' EL ABBADI', 'laila.elabbadi@uit.ac.ma', 'azerty', '5.png');

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
(5, 'ent 1', 'adr 1', 'vil 1', '06000001'),
(6, 'ent 2', 'adr 2', 'vil 2', '06000002'),
(7, 'ent 3', 'adr 3', 'vil 3', '06000003'),
(8, 'ent 4', 'adr 4', 'vil 4', '06000004'),
(10, 'Google', '123 TEST', 'california', '0000000'),
(12, 'Facebook', 'ceci est un test', 'california', '0000000'),
(13, 'Twitter', 'ceci est un test', 'california', '0000000'),
(17, 'Orange', 'adresse 2', 'ville 2', '060000002'),
(18, 'ONCF', 'ceci est un test', 'rabat', '00000000'),
(19, 'Maroc Teleco', 'rue 5 bloc q', 'Rabat', '06000002'),
(24, 'OCP', 'adresse', 'Khouribga', '060000000'),
(28, 'Entreprise 1', 'ceci est un test', 'Rabat', '013456789');

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
  `filiere` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`id_etudiant`, `prenom`, `nom`, `email`, `code`, `photo`, `filiere`) VALUES
(14000130, 'SAHRAOUI DOUKKALI', 'SAAD', 'saad.sahraouidoukkali@uit.ac.ma', 'azerty', '5.png', 'GI'),
(15006663, 'ZIAT', 'OUSSAMA', 'oussama.ziat@uit.ac.ma', 'azerty', '5.png', 'GI'),
(16000022, 'EL AASSALI', 'IMADEDDINE', 'imadeddine.elaassali@uit.ac.ma', 'azerty', '5.png', 'GI'),
(16000050, 'EL HALABI', 'AYOUB', 'ayoub.elhalabi@uit.ac.ma', 'ayoube', '5.png', 'GI'),
(16000086, 'ARZIKI', 'ISMAIL', 'ismail.arziki@uit.ac.ma', 'azerty', '5.png', 'GI'),
(16000109, 'AKIL', 'OMAR', 'omar.akil@uit.ac.ma', 'azerty', '5.png', 'GI'),
(16000234, 'ELHADIOUIA', 'LEILA', 'leila.elhadiouia@uit.ac.ma', 'azerty', '5.png', 'GI'),
(16000360, 'AMARIR', 'ISMAIL', 'ismail.amarir@uit.ac.ma', 'azerty', '5.png', 'GI'),
(16003897, 'HANSALA', 'SALMA', 'salma.hansala@uit.ac.ma', 'azerty', '5.png', 'GI'),
(16003987, 'BENGHABRIT', 'MOHAMMED', 'mohammed.benghabrit@uit.ac.ma', 'azerty', '5.png', 'GI'),
(16004718, 'LAMMARI', 'SAFOUANE', 'safouane.lammari@uit.ac.ma', 'azerty', '5.png', 'GI'),
(16004719, 'ZEKRI', 'AMAL', 'amal.zekri@uit.ac.ma', 'azerty', '5.png', 'GI'),
(16004865, 'LAMSAOURI', 'HAMZA', 'hamza.lamsaouri@uit.ac.ma', 'azerty', '5.png', 'GI'),
(16004931, 'TEBAA', 'MOHAMMED SAAD', 'mohammedsaad.tebaa@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17000543, 'LAKTAIBI', 'ANASS', 'anass.laktaibi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17000549, 'GOUMIDI', 'ABDERRAZZAK', 'abderrazzak.goumidi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17000711, 'GLIOULA', 'HIND', 'hind.glioula@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17003110, 'FAIZ', 'HAJAR', 'hajar.faiz@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17003784, 'KERDOUD', 'MOUAD', 'mouad.kerdoud@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17004061, 'SRAISAH', 'OUMAIMA', 'oumaima.sraisah@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17004178, 'AZZOUZI', 'ABDELLAH', 'abdellah.azzouzi@uit.ac.ma', 'saad', '5.png', 'GI'),
(17004304, 'ALEM', 'AYOUB', 'ayoub.alem@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17004329, 'KANDIL', 'YAHIA', 'yahia.kandil@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17004423, 'EL GHARBI', 'DOUAA', 'douaa.elgharbi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17004484, 'ALIOUA', 'SALIM', 'salim.alioua@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17004527, 'KADIMI', 'HAMZA', 'hamza.kadimi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17004680, 'BENNANI', 'YASSINE', 'yassine.bennani@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17004777, 'BERRAGRAGUI', 'HASSAN', 'hassan.berragragui@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17004960, 'BENAYADA', 'OUSSAMA', 'oussama.benayada@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17004998, 'LAHMAMI', 'AYOUB', 'ayoub.lahmami@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17005155, 'LAHRIZI', 'TAHA', 'taha.lahrizi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17005162, 'EL BADAOUI', 'OMAR', 'omar.elbadaoui@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17005194, 'MOUNTIJ', 'YASSER', 'yasser.mountij@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17005215, 'ELKHDADI', 'AHMED', 'ahmed.elkhdadi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17005227, 'ERRAZGOUNI', 'SAAD', 'saad.errazgouni@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17005242, 'OUADRHIRI IDRISSI AZZOUZI', 'ZAKARIA', 'zakaria.ouadrhiriidrissiazzouzi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17005256, 'EL OUARTITI', 'MOHSINE', 'mohsine.elouartiti@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17005269, 'ELHARSI', 'HAMZA', 'hamza.elharsi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17005414, 'EL FEKAK', 'ISMAIL', 'ismail.elfekak@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17005436, 'FAIK', 'ABDELKHALEK', 'abdelkhalek.faik@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17005468, 'SIDATE', 'EL MAHDI', 'elmahdi.sidate@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17005529, 'TABCHI', 'ISSAM', 'issam.tabchi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17005537, 'ZEAIKOR', 'YOUSSEF', 'youssef.zeaikor@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17005624, 'HMADE', 'ABDELLAH', 'abdellah.hmade@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17005686, 'HILIA', 'ANAS', 'anas.hilia@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17005721, 'BENKIRANE', 'SOUKAINA', 'soukaina.benkirane@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17005778, 'BAKOUR', 'KAWTAR', 'kawtar.bakour@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17005812, 'BENADDI', 'OUAFAA', 'ouafaa.benaddi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17005819, 'BENSAMDI', 'IMANE', 'imane.bensamdi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17005831, 'JABAR', 'YOUNESS', 'youness.jabar@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17005847, 'JARHNI', 'AMINE', 'amine.jarhni@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17005893, 'JEBBAR', 'ABDENNOUR', 'abdennour.jebbar@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17005934, 'BENKADDOUR', 'ASSMA', 'assma.benkaddour@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17005975, 'BEKKALI', 'KAWTAR', 'kawtar.bekkali@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17006134, 'BENTASSIL', 'ZINEB', 'zineb.bentassil@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17006149, 'GHAZI', 'NERMINE', 'nermine.ghazi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17006198, 'GOUZA', 'SALMA', 'salma.gouza@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17006221, 'KRAIA', 'ZINEB', 'zineb.kraia@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17006314, 'EL JAAOUANI', 'ZAHRA', 'zahra.eljaaouani@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17006335, 'EL GHALI', 'RANIA', 'rania.elghali@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17006391, 'MRABET', 'SALMA', 'salma.mrabet@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17006468, 'EL AAZAOUZI', 'IKRAM', 'ikram.elaazaouzi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17006481, 'SAFI', 'OUMAIMA', 'oumaima.safi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17006518, 'ES SEBBANI', 'KAWTAR', 'kawtar.essebbani@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17006533, 'SAFRAOUI', 'CHAIMAE', 'chaimae.safraoui@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17006537, 'EL KHANFRI', 'HAJAR', 'hajar.elkhanfri@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17006549, 'FENNIRI', 'JIHAN', 'jihan.fenniri@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17006550, 'SABER', 'OUMAIMA', 'oumaima.saber@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17006654, 'HADIRI', 'SALOUA', 'saloua.hadiri@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17006687, 'TAYMOULI', 'ICHRAQ', 'ichraq.taymouli@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17006694, 'TADGHOUTI', 'NOUHAILA', 'nouhaila.tadghouti@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17006732, 'RADI', 'HAJAR', 'hajar.radi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17006800, 'JALAL', 'ACHRAF', 'achraf.jalal@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17006833, 'SAHLI', 'OMAYMA', 'omayma.sahli@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17006848, 'MOULAHID', 'KAWTAR', 'kawtar.moulahid@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17006852, 'FRIKICH', 'RANIA', 'rania.frikich@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17006870, 'TERFAS', 'CHAIMAE', 'chaimae.terfas@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17006903, 'RHAZI', 'YASSINE', 'yassine.rhazi1@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17006940, 'MOUSTAHIB', 'OMAR', 'omar.moustahib@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17006953, 'R GUIBI', 'CHAIMAA', 'chaimaa.rguibi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17006955, 'BOUGATTAYA', 'SOUKAINA', 'soukaina.bougattaya@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17006965, 'MAATI', 'KENZA', 'kenza.maati@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17006970, 'MELHAOUI', 'RIHAB', 'rihab.melhaoui@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17006980, 'MOSSALLI', 'WIAM', 'wiam.mossalli@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17006986, 'ELAJAJE', 'MALAK', 'malak.elajaje@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17007004, 'OUBELKACEM', 'MANAL', 'manal.oubelkacem@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17007007, 'BOUDAD', 'LATIFA', 'latifa.boudad@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17007017, 'IFKIRNE', 'KENZA', 'kenza.ifkirne@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17007030, 'NOUMA', 'IBTISSAM', 'ibtissam.nouma@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17007548, 'ZAOUI', 'MANAL', 'manal.zaoui@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17007567, 'BOUTRIG', 'OUMNIA', 'oumnia.boutrig@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17007577, 'ABOULHASSANE', 'NIAMA', 'niama.aboulhassane@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17007639, 'EL MESBAHI', 'AYA', 'aya.elmesbahi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17007831, 'EL MOUHTARIM', 'AYMANE', 'aymane.elmouhtarim@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17008374, 'BARAKAT', 'ZINEB NOHAILA', 'zinebnohaila.barakat@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17008695, 'EBOU EL HASSANI', 'AHMED MAHMOUD', 'ahmedmahmoud.ebouelhassani@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17008796, 'NDIAYE', 'DIOR', 'dior.ndiaye@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17009577, 'ABOU', 'MAWUFEMO JOSUE', 'mawufemo.abou@uit.ac.ma', 'azerty', '5.png', 'GI'),
(17010439, 'LOGMO ADMEO', 'GOLVEN CALIN', 'golvencalin.logmoadmeo@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000008, 'EL HAOUARI', 'ATIKA', 'ATIKA.ELHAOUARI@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000024, 'DDALLA', 'YOUSRA', 'YOUSRA.DDALLA@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000025, 'ZIYANE', 'NOUHAILA', 'nouhaila.ziyane@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000029, 'LAHLOU', 'HAJAR', 'hajar.lahlou@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000037, 'EL HANI', 'MOHAMED ACHRAF', 'mohamedachraf.elhani@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000041, 'BENZIANE', 'DOUNIA', 'dounia.benziane@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000045, 'AIT MANSOUR', 'ZINEB', 'ZINEB.AITMANSOUR@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000047, 'EL BAKKOURI', 'IMANE', 'IMANE.ELBAKKOURI@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000052, 'TIGRIOUI', 'RHITA', 'rhita.tigrioui@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000054, 'TLEMCANI', 'CHAYMA', 'CHAYMA.TLEMCANI@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000062, 'ELHARTI', 'CHAYMAA', 'chaymaa.elharti@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000081, 'EL AZZAOUI', 'MAROUA', 'MAROUA.ELAZZAOUI@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000087, 'ZALLAFI', 'NADA', 'NADA.ZALLAFI@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000091, 'JIRRARI', 'DOHA', 'DOHA.JIRRARI@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000099, 'EL MRHARRAZ', 'SALMA', 'SALMA.ELMRHARRAZ@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000103, 'DAHBI', 'HOUDA', 'dahbi.houda@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000104, 'ELKORRI', 'OUISSAL', 'OUISSAL.ELKORRI@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000111, 'ZAHI', 'ABIR', 'abir.zahi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000141, 'OUKASSOU', 'ILHAM', 'ILHAM.OUKASSOU@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000146, 'ALAOUI', 'ABDELLAH', 'ABDELLAH.ALAOUI@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000155, 'AQUIL', 'ASMAE', 'asmae.aquil@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000157, 'AOUZAL', 'OUMAIMA', 'oumaima.aouzal@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000158, 'AIT HMADOUCH', 'RANIA', 'RANIA.AITHMADOUCH@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000161, 'OUETTAS', 'INTISSAR', 'INTISSAR.OUETTAS@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000163, 'ELMESSAOUDI', 'KHADIJA', 'KHADIJA.ELMESSAOUDI@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000167, 'EL ATTAOUI', 'MOHAMED', 'mohamed.elattaoui@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000168, 'MEZOIR', 'OUSSAMA', 'oussama.mezoir@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000173, 'ZAHI', 'YOUSSEF', 'YOUSSEF.ZAHI1@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000176, 'SARDI', 'IHSSANE', 'IHSSANE.SARDI@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000179, 'ZEROUAL', 'AIMEN', 'aimen.zeroual@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000183, 'KASSI', 'AYOUB', 'AYOUB.KASSI@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000184, 'OUJAA', 'YASSINE', 'yassine.oujaa@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000187, 'EL HAJJI', 'LOUBNA', 'loubna.elhajji@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000190, 'BENSSABAHIA', 'MANAL', 'manal.benssabahia@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000193, 'EL AMRANI', 'MANAL', 'MANAL.ELAMRANI1@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000194, 'BENSAID', 'MERYEM', 'MERYEM.BENSAID@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000197, 'NASRI', 'ANAS', 'anas.nasri@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000199, 'NAJOUI', 'MOHAMMED', 'mohammed.najoui@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000203, 'FADILI', 'AYOUB', 'AYOUB.FADILI@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000205, 'EL HADY', 'ZAKARIA', 'ZAKARIA.ELHADY@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000212, 'ALLALOU', 'ABDELHAKIM', 'abdelhakim.allalou@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000215, 'EL YOUSFI-ALAOUI', 'MOHAMMED', 'MOHAMMED.ELYOUSFI-ALAOUI@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18000218, 'LAFDALI', 'HAMZA', 'hamza.lafdali@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18002375, 'FRIHAT', 'TAOUFIK', 'taoufik.frihat@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18004591, 'STITOU', 'NIZAR', 'nizar.stitou@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18005018, 'AMAL', 'AYOUB', 'ayoub.amal@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18006294, 'EL GARAA', 'AYOUB', 'ayoub.elgaraa@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18006305, 'LOUDINI', 'ABDELMALEK', 'abdelmalek.loudini@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18006321, 'ABOURRICHE', 'YOUNESS', 'youness.abourriche@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18006355, 'BARGACH', 'HAMZA', 'hamza.bargach1@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18006364, 'BENDEFA', 'AHMED KHALIL', 'ahmedkhalil.bendefa@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18006385, 'ED-DARHRI', 'EL HASSAN', 'elhassan.eddarhri@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18006400, 'ECHTOUKI', 'MOHAMED', 'mohamed.echtouki@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18006439, 'EL AMRANI', 'AYMAN', 'ayman.elamrani@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18006452, 'EL HASSNAOUI', 'AOUS', 'aous.elhassnaoui@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18006457, 'EL MEKKAOUI', 'OMAR', 'omar.elmekkaoui@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18006469, 'FETTOUKH', 'ACHRAF', 'achraf.fettoukh@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18006624, 'FANNOUCH', 'AYMEN', 'aymen.fannouch@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18006665, 'HANYF', 'OTHMANE', 'othmane.hanyf@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18006727, 'LAMZALZY', 'ABDELLAH', 'abdellah.lamzalzy@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18006772, 'ASSMOUGUE', 'ASMAE', 'asmae.assmougue@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18006791, 'AL OUARDI', 'SALMA', 'salma.alouardi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18006816, 'MAZOUZI', 'SAAD', 'saad.mazouzi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18006817, 'AGNAOU', 'MINA', 'mina.agnaou@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18006909, 'BOUTLANE', 'MERYEM', 'meryem.boutlane@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18006997, 'BOUTAIB', 'MOHAMED', 'mohamed.boutaib@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18007012, 'BENGELOUNE', 'HIBA', 'hiba.bengeloune@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18007055, 'JARJER', 'FATIMA', 'fatima.jarjer@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18007070, 'EL MOUJOUDI', 'OUMAIMA', 'oumaima.elmoujoudi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18007102, 'EL HAJJI', 'MOUNA', 'mouna.elhajji@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18007124, 'EL GUEROUANI', 'MANAL', 'manal.elguerouani1@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18007150, 'MASROUR', 'OUMAYMA', 'oumayma.masrour@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18007157, 'MOUMNI', 'CHAIMAE', 'chaimae.moumni@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18007169, 'MOFAKIR', 'NISRINE', 'nisrine.mofakir@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18007282, 'FAROUQ', 'SOMIA', 'somia.farouq@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18007304, 'HAYTOM', 'IKRAME', 'ikrame.haytom@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18007311, 'HASSINA', 'YOUSRA', 'yousra.hassina@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18007427, 'ELAITARI', 'SOUKAINA', 'soukaina.elaitari@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18007440, 'BELLAALA', 'MOHAMED', 'mohamed.bellaala@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18007488, 'ZIZI', 'LINA', 'lina.zizi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18007854, 'OURAZZOUQ', 'FATIMA EZZAHRA', 'fatimaezzahra.ourazzouq@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18007869, 'OUMAMI', 'MARYAM', 'maryam.oumami@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18007916, 'STITOU', 'NARJIS', 'narjis.stitou@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18007933, 'SMINA', 'NOUHAILA', 'nouhaila.smina@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18007936, 'ZOUHRI', 'FARAH', 'farah.zouhri@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18007937, 'TIBARI', 'ZINEB', 'zineb.tibari@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18007992, 'EL MOUSSAOUI', 'HAIFAE', 'haifae.elmoussaoui@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18007996, 'ABOUZBIBA', 'WAFAE', 'wafae.abouzbiba@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18008029, 'KHATTABI', 'AMAL', 'amal.khattabi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18008065, 'EL AZHARY', 'SOUKAINA', 'soukaina.elazhary@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18008290, 'SADRAOUI', 'HIBAT ALLAH', 'hibatallah.sadraoui@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18009005, 'EL HAOUARI', 'FAHD', 'fahd.elhaouari@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18009006, 'ESSAOUDI', 'FATIMA', 'fatima.essaoudi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18009015, 'BERBACH', 'MALIK', 'malik.berbach@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18009387, 'GHARBI', 'IHSSANE', 'ihssane.gharbi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18009404, 'VALL KHEIR', 'ZEINEBOU', 'zeinebou.vallkheir@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18009444, 'LAAMARTI', 'AKRAM', 'akram.laamarti@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18009449, 'M KHAITIR CHIEKH', 'MAMINA', 'mamina.mkhaitirchiekh@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18009494, 'BENJALLOUL', 'MONTASSIR', 'montassir.benjalloul1@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18009497, 'AZIZ', 'OUSSAMA', 'oussama.aziz@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18009590, 'MARRAKCHI', 'AHMED AYMEN', 'ahmedaymen.marrakchi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18009963, 'YAHYAOUI', 'ISMAIL', 'ismail.yahyaoui@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18009966, 'EL HAJJI', 'HASNAA', 'hasnaa.elhajji@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18009968, 'EL GHABI', 'SAFAE', 'safae.elghabi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18010142, 'PIBA', 'KOKO JEAN HUGUES', 'kokojeanhugues.piba@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18010184, 'TIOTSOP FOGUE', 'ADRIANO', 'adriano.tiotsopfogue@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18010233, 'AIT ABBOU', 'HOUYAME', 'houyame.aitabbou@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18010332, 'AZZI', 'ALAA-EDDINE', 'alaaeddine.azzi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18010337, 'ATARRACHI', 'HALIMA', 'halima.atarrachi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18010404, 'ELAZIZI', 'CHAIMAE', 'elazizi.chaimae@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18010496, 'OUBAHASSOU', 'SANAE', 'oubahassou.sanae@uit.ac.ma', 'azerty', '5.png', 'GI'),
(18010603, 'ECH-CHOUQI', 'NADA', 'echchouqi.nada@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000006, 'GUENDOULA', 'NOUR-EL HOUDA', 'nour-elhouda.guendoula@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000009, 'SOUKAINI', 'ADIL', 'adil.soukaini@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000010, 'OUKECHI', 'CHAIMAE', 'chaimae.oukechi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000013, 'OHASSAN', 'MOHAMED SAAD', 'mohamedsaad.ohassan@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000015, 'OUSSI', 'YASSINE', 'yassine.oussi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000018, 'DEFAOUI', 'OMAR', 'omar.defaoui@uit.ac.ma', 'azerty', '1.jpg', 'GI'),
(19000030, 'KABBA', 'AYMANE', 'aymane.kabba@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000033, 'FAHIM', 'AHMED', 'ahmed.fahim@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000034, 'EL KAABA', 'MOHAMED AMINE', 'mohamedamine.elkaaba@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000035, 'ZNIBER', 'ALI', 'ali.zniber@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000036, 'OUARDI', 'IKHLASSE', 'ikhlasse.ouardi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000037, 'BENZEKRI', 'ANAS', 'anas.anasbenzekri@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000043, 'AGGOUR', 'SARAH', 'sarah.aggour@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000047, 'FENNIRI', 'ABDELJALIL', 'abdeljalil.fenniri@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000049, 'BERRAS', 'NAJWA', 'najwa.berras@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000053, 'BENALI', 'MOUAD', 'mouad.benali1@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000056, 'DELLALE', 'SOUKAINA', 'soukaina.dellale@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000058, 'DRIAI', 'IMANE', 'imane.driai@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000061, 'MOUAD', 'NOUHAILA', 'nouhaila.mouad@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000063, 'OUGAAMOU', 'MEHDI', 'mehdi.mehdiougaamou@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000066, 'MKADMI', 'OUMKALTOUM', 'oumkaltoum.mkadmi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000067, 'SAAD', 'OUSSAMA', 'oussama.saad@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000076, 'OUAHI', 'KHAOULA', 'khaoula.ouahi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000077, 'LOUZAOUI', 'SAFAA', 'safaa.louzaoui@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000078, 'SOUINIA', 'KELTOUM', 'keltoum.souinia@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000080, 'GAIZI', 'HABIBA', 'habiba.gaizi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000081, 'SOFIANE', 'CHARAF EDDINE', 'charafeddine.sofiane@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000086, 'TAZI', 'HAMZA', 'hamza.tazi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000088, 'TAIB', 'HICHAM', 'hicham.taib@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000095, 'QANNOUF', 'MUSTAPHA', 'mustapha.qannouf1@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000097, 'KERCHAOUI', 'OMAR', 'omar.kerchaoui@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000098, 'RIFAY', 'WASSIM', 'wassim.rifay@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000099, 'IMANI', 'FADI', 'fadi.imani@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000100, 'BENSAR', 'OUMAIMA', 'oumaima.bensar@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000102, 'HMOUDAT', 'OUSSAMA', 'oussama.hmoudat@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000126, 'ETTAIEK', 'LAMYAE', 'lamyae.ettaiek@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000127, 'EL HIRECH', 'GHIZLANE', 'ghizlane.elhirech@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000137, 'LAGHRISSI', 'MOHAMED', 'mohamed.laghrissi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000141, 'ABOUSAADIA', 'ANAS', 'anas.abousaadia@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000145, 'BENOUAHI', 'OMAR', 'omar.benouahi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000147, 'BOUTAHLI', 'BILAL', 'bilal.boutahli@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000151, 'BOUNASSEH', 'ABDESSAMAD', 'abdessamad.bounasseh@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000157, 'EL-OTHMANI', 'YOUSSEF', 'youssef.el-othmani@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000167, 'EL HASSOUNI', 'MERYEM', 'meryem.elhassouni1@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000168, 'EL FAKER', 'LAMIAE', 'lamiae.elfaker@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000169, 'EL ABASSI', 'MALAK', 'malak.elabassi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000170, 'EL OUAHHABY', 'CHAIMAE', 'chaimae.elouahhaby@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000177, 'DAIBAZI', 'ASMAE', 'asmae.daibazi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000182, 'LOUADNI', 'CHAIMAA', 'chaimaa.louadni@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000186, 'LAGHDIRI', 'CHAIMAA', 'chaimaa.laghdiri@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000188, 'BENDEROUACH', 'KARIMA', 'karima.benderouach@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000191, 'JEBBAR', 'NASSIMA', 'nassima.jebbar@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000192, 'IDRI', 'KHAWLA', 'khawla.idri@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000194, 'TOULALI', 'MERYEM', 'meryem.toulali@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000217, 'FRIAIN', 'IMAN', 'iman.friain@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000218, 'FRIAIN', 'OMAYMA', 'omayma.friain@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000243, 'CHABANA', 'HAMZA', 'hamza.chabana@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19000244, 'BENSALIM', 'YOUSRA', 'yousra.bensalim@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19002414, 'BAHAMMOU', 'TAHA', 'taha.bahammou@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19003672, 'ZIRARI', 'MOHAMED', 'mohamed.zirari@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19006950, 'RAFILI', 'SALMA', 'salma.rafili@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19006997, 'MOUSSADIK', 'MEHDI', 'mehdi.moussadik@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19007144, 'OUDADA', 'AYOUB', 'ayoub.oudada@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19007215, 'MOTASSIM', 'AHMED TAHA', 'ahmedtaha.motassim@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19007217, 'ACHAOUI', 'YOUNES', 'younes.achaoui@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19007233, 'EL FEKAK', 'SALMA', 'salma.elfekak@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19007468, 'RAKNI', 'MOHAMED ABDELBASSET', 'mohamedabdelbasset.rakni@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19007523, 'ESSALMANI', 'YASMINE', 'yasmine.essalmani@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19007697, 'MOUSSAFI', 'AYOUB', 'ayoub.moussafi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19008604, 'MOUGTAHIDI', 'SALMA', 'salma.mougtahidi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19008615, 'LARROUSSI', 'SARA', 'sara.larroussi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19008618, 'ZENZOULI', 'IKRAM', 'ikram.zenzouli@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19008624, 'AIT OUAKRIM', 'MERYEM', 'meryem.aitouakrim@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19008627, 'KOURTAH', 'NADA', 'nada.kourtah@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19008634, 'LACHIA', 'SALMA', 'salma.lachia@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19008652, 'BENKERROUM', 'MARWA', 'marwa.benkerroum@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19008663, 'SAMIR', 'TAHA', 'taha.samir@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19008666, 'AHCINE', 'CHAYMAA', 'chaymaa.ahcine@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19008672, 'BENASSER', 'HASSAN AYOUB', 'hassanayoub.benasser@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19008673, 'OUBENMOH', 'YASSINE', 'yassine.oubenmoh@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19008679, 'EL AISSI', 'NOUHAILA', 'nouhaila.elaissi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19008684, 'SINAA', 'HAMZA', 'hamza.sinaa@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19008695, 'DRIOUICH', 'MOHAMMED', 'mohammed.driouich1@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19008711, 'EL OURRAT', 'FAYCAL', 'faycal.elourrat@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19008915, 'QAFFSSAOUI', 'MAROUANE', 'marouane.qaffssaoui@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19009650, 'BOUOUZM', 'YASSINE', 'yassine.bououzm@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19010041, 'SMINA', 'OUMAIMA', 'oumaima.smina@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19010618, 'BAHAMAD', 'IMANE', 'imane.bahamad@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19010827, 'SAIDNI', 'INASS', 'inass.saidni@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19010867, 'LAZHAR', 'NADA', 'nada.lazhar@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19010961, 'MOUMNI', 'YAHYA', 'yahya.moumni@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19010967, 'BRIBRI', 'HIND', 'hind.bribri@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19010973, 'RAIHANI', 'YOUSSRA', 'youssra.raihani@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19011023, 'BOUHADDOU', 'MARWANE', 'marwane.bouhaddou@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19011034, 'ATAOUI', 'NIZAR', 'nizar.ataoui@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19011038, 'OUKHRID', 'AMAL', 'amal.oukhrid@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19011043, 'NOR', 'NAJLAE', 'najlae.nor@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19011053, 'CHIKANDO SINOU', 'EMILIE OLIVE', 'emilieolive.chikandosinou@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19011058, 'BARIK', 'HAYTAM', 'haytam.barik@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19011062, 'MERIZAK', 'HOUSSAM', 'houssam.merizak@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19011064, 'EL HAMZAOUI', 'ABDERRAHIM', 'abderrahim.elhamzaoui@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19011072, 'FOUKHAR', 'ILIASS', 'iliass.foukhar@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19011086, 'CHEMRIH', 'YASSINE', 'yassine.chemrih@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19011102, 'BENJELLOUN', 'HAMZA', 'hamza.benjelloun@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19011104, 'BIROUK', 'NOURA', 'noura.birouk@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19011115, 'TIZIT', 'MOUAD', 'mouad.tizit@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19011119, 'ENAGRE', 'FATIMA ZAHRA', 'fatimazahra.enagre@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19011141, 'MZALI', 'SALMA', 'salma.mzali@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19011142, 'BAHNIF', 'ILYAS', 'ilyas.bahnif@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19011156, 'AIT EL KOUCH', 'ANASS', 'anass.aitelkouch@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19011200, 'BOUKHSSIBI', 'HIBA', 'hiba.boukhssibi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19011252, 'ZOETYANDE', 'NERKIETA NAFISSATOU', 'nerkietanafissatou.zoetyande@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19011266, 'ZOUNGRANA YVES ALBAN', 'SOM-BE-WENDE', 'som-be-wende.zoungranayvesalban@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19011462, 'BELHAJ-SOULAMI', 'KENZA', 'kenza.belhaj-soulami@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19012018, 'JNIHA', 'IMANE', 'imane.jniha@uit.ac.ma', 'azerty', '5.png', 'GI'),
(19015220, 'DEKPE', 'KOSSI ELOLO BERNARD', 'kossielolobernard.dekpe@uit.ac.ma', 'azerty', '5.png', 'GI'),
(20000307, 'M\'HIN', 'NIMA', 'nima.mhin@uit.ac.ma', 'azerty', '5.png', 'GI'),
(20000844, 'BELHAJ', 'MAJDA', 'majda.belhaj1@uit.ac.ma', 'azerty', '5.png', 'GI'),
(20000852, 'LBARRAH', 'YAHYA', 'yahya.lbarrah@uit.ac.ma', 'azerty', '5.png', 'GI'),
(20000857, 'CHLAGUE', 'OUMAIMA', 'oumaima.chlague@uit.ac.ma', 'azerty', '5.png', 'GI'),
(20000861, 'EL MRIHY', 'SOUHAIL', 'souhail.elmrihy@uit.ac.ma', 'azerty', '5.png', 'GI'),
(20005505, 'SAFI', 'EL MEHDI', 'elmehdi.safi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(20005536, 'JEMMAL', 'SOUFIANE', 'soufiane.jemmal@uit.ac.ma', 'azerty', '5.png', 'GI'),
(20005731, 'BEKRINE', 'OUSSAMA', 'oussama.bekrine@uit.ac.ma', 'azerty', '5.png', 'GI'),
(20006692, 'BOUAINE', 'OMAR', 'omar.bouaine@uit.ac.ma', 'azerty', '5.png', 'GI'),
(20006852, 'CHTAIBI', 'FATIMA-EZZAHRAE', 'fatima-ezzahrae.chtaibi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(20010521, 'SAHMI', 'IHSSAN', 'ihssan.sahmi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(20011375, 'KHADDAM', 'CHAIMAE', 'chaimae.khaddam@uit.ac.ma', 'azerty', '5.png', 'GI'),
(20012111, 'ZEROUALI', 'IBTISSAM', 'ibtissam.zerouali@uit.ac.ma', 'azerty', '5.png', 'GI'),
(20012117, 'BOUSSERRHINE', 'ZIYAD', 'ziyad.bousserrhine@uit.ac.ma', 'azerty', '5.png', 'GI'),
(20013993, 'BAKHIL', 'AISSA', 'aissa.bakhil@uit.ac.ma', 'azerty', '5.png', 'GI'),
(21011657, 'KENBOUCH', 'FATIMA', 'fatima.kenbouch@uit.ac.ma', 'azerty', '5.png', 'GI'),
(21011748, 'SAIDI', 'ZAKARIAE', 'zakariae.saidi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(21015271, 'EL KHCHINE', 'MOHAMED', 'mohamed.elkhchine1@uit.ac.ma', 'azerty', '5.png', 'GI'),
(21015519, 'BITI', 'AYMANE', 'aymane.biti@uit.ac.ma', 'azerty', '5.png', 'GI'),
(21015770, 'ATIR', 'ZAYNAB', 'zaynab.atir@uit.ac.ma', 'azerty', '5.png', 'GI'),
(21015868, 'MEZIANE ZERHOUNI', 'HASSAN', 'hassan.mezianezerhouni@uit.ac.ma', 'azerty', '5.png', 'GI'),
(21015880, 'ELOMARI', 'ZAKARIAE', 'zakariae.elomari@uit.ac.ma', 'azerty', '5.png', 'GI'),
(21015881, 'JEBBOUR', 'WIAM', 'wiam.jebbour@uit.ac.ma', 'azerty', '5.png', 'GI'),
(21015883, 'LAATITINE', 'KHADIJA', 'khadija.laatitine@uit.ac.ma', 'azerty', '5.png', 'GI'),
(21015885, 'AGHRAZ', 'OUARDA', 'ouarda.aghraz@uit.ac.ma', 'azerty', '5.png', 'GI'),
(21015929, 'HAMMADI', 'MASSINA', 'massina.hammadi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(21015938, 'AIT BELAID', 'IKRAM', 'ikram.aitbelaid@uit.ac.ma', 'azerty', '5.png', 'GI'),
(21015951, 'CHEGDANI', 'SARA', 'sara.chegdani@uit.ac.ma', 'azerty', '5.png', 'GI'),
(21017117, 'GHOUMMAID', 'MOHAMMED', 'mohammed.ghoummaid@uit.ac.ma', 'azerty', '5.png', 'GI'),
(21017126, 'ADRAOUI', 'ANAS', 'anas.adraoui1@uit.ac.ma', 'azerty', '5.png', 'GI'),
(21017164, 'ABOU EL HAOUL', 'HOUSSAM EDDINE', 'houssameddine.abouelhaoul@uit.ac.ma', 'azerty', '5.png', 'GI'),
(21017206, 'BENAIDA', 'ZINEB', 'zineb.benaida@uit.ac.ma', 'azerty', '5.png', 'GI'),
(21017268, 'KAMI', 'YASMINE', 'yasmine.kami@uit.ac.ma', 'azerty', '5.png', 'GI'),
(21017281, 'MOUHAOUIR', 'HAMZA', 'hamza.mouhaouir@uit.ac.ma', 'azerty', '5.png', 'GI'),
(21017537, 'TAHER', 'IKRAM', 'ikram.taher@uit.ac.ma', 'azerty', '5.png', 'GI'),
(21017620, 'JALAL', 'MOHAMED', 'mohamed.jalal1@uit.ac.ma', 'azerty', '5.png', 'GI'),
(21017629, 'ELASSRAOUI', 'HOUSSAM', 'houssam.elassraoui@uit.ac.ma', 'azerty', '5.png', 'GI'),
(21017808, 'GHALLOUDI', 'ADAM', 'adam.ghalloudi@uit.ac.ma', 'azerty', '5.png', 'GI'),
(21017854, 'CHAGRI', 'ANASS', 'anass.chagri@uit.ac.ma', 'azerty', '5.png', 'GI'),
(21017855, 'LAZAAR', 'KHAOULA', 'khaoula.lazaar@uit.ac.ma', 'azerty', '5.png', 'GI');

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
(68, 'Bonne chance', '2022-01-12 03:01:05', 0, 6),
(69, 'Merci Madame', '2022-01-12 00:00:00', 1, 6),
(70, 'SVP, comment faire une query avec 2 tableaux?', '2022-01-26 03:01:31', 1, 6),
(71, 'parce que la methode classique ne marche pas', '2022-01-26 03:01:42', 1, 6),
(72, 'message 1', '2022-01-26 03:01:36', 1, 6),
(73, 'message2', '2022-01-12 09:01:39', 1, 6),
(74, 'est ce que tu as esaye inner join', '2022-01-26 03:01:48', 0, 6),
(75, 'ou outer join', '2022-01-26 03:01:51', 0, 6),
(76, 'message1', '2022-01-14 03:01:13', 0, 6),
(77, 'message2', '2022-01-14 03:01:16', 0, 6),
(78, 'je vais essayer merci', '2022-01-14 03:01:16', 1, 6),
(79, 'Bonjour madame', '2022-01-26 05:01:59', 1, 17),
(80, 'ok', '2022-01-26 06:01:37', 0, 9),
(81, 'dacc', '2022-01-26 06:01:50', 0, 9),
(82, 'Bonsoir,', '2022-01-26 06:01:41', 1, 9),
(85, 'salut', '2022-01-26 08:01:10', 1, 6),
(86, 'bonojour', '2022-01-26 08:01:16', 1, 7);

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
(39, '<b>Prof.  AIT LAHCEN</b> vous a attribuer la note 20/20 Ã  votre stage', '2022-01-18', 21, 16000050, 0),
(48, '<b>Prof.  OUMAIRA</b> vous a attribuer la note 20/20 a votre stage', '2022-01-25', 17, 19000018, 0),
(49, '<b>Prof.  OUMAIRA</b> vous a valide le stage pour la soutenance ', '2022-01-15', 17, 19000018, 0),
(50, '<b>Prof.  OUMAIRA</b> a accepter de vous encadrer durant votre stage ', '2021-10-08', 17, 19000018, 0),
(53, '<b> </b> a fait une motification sur son stage', '2022-01-26', 15, 19000018, 1),
(54, '<b> </b> a fait une motification sur son stage', '2022-01-26', 15, 19000018, 1),
(55, '<b> </b> a fait une motification sur son stage', '2022-01-26', 15, 19000018, 1),
(56, '<b> </b> a fait une motification sur son stage', '2022-01-26', 15, 19000018, 1),
(57, '<b> </b> a fait une motification sur son stage', '2022-01-26', 17, 19000018, 1),
(58, '<b> </b> a fait une motification sur son stage', '2022-01-26', 17, 19000018, 1),
(59, '<b> </b> a fait une motification sur son stage', '2022-01-26', 17, 19000018, 1),
(60, '<b> </b> a fait une motification sur son stage', '2022-01-26', 15, 19000018, 1),
(61, '<b> </b> a fait une motification sur son stage', '2022-01-26', 15, 19000018, 1),
(62, '<b> </b> a fait une motification sur son stage', '2022-01-26', 17, 19000018, 1),
(63, '<b> </b> a fait une motification sur son stage', '2022-01-26', 17, 19000018, 1),
(64, '<b>Prof.  OUMAIRA</b> a acceptÃ© de vous encadrer lors de votre stage', '2022-01-26', 17, 19000067, 0),
(65, '<b> </b> a fait une motification sur son stage', '2022-01-26', 15, 19000018, 1),
(66, '<b> </b> a fait une motification sur son stage', '2022-01-26', 15, 19000018, 1),
(67, '<b>Prof.  OUMAIRA</b> a acceptÃ© de vous encadrer lors de votre stage', '2022-01-26', 17, 19011058, 0),
(68, '<b>Prof.  OUMAIRA</b> vous a attribuer la note 18/20 Ã  votre stage', '2022-01-26', 17, 19000067, 0),
(69, '<b>Prof.  OUMAIRA</b> vous a validÃ© le stage pour la soutenance ', '2022-01-26', 17, 19000067, 0),
(70, '<b>Prof.  OUMAIRA</b> a acceptÃ© de vous encadrer lors de votre stage', '2022-01-26', 17, 19000018, 0),
(71, '<b>Prof.  OUMAIRA</b> vous a attribuer la note 18/20 Ã  votre stage', '2022-01-26', 17, 19000018, 0),
(72, '<b>Prof.  OUMAIRA</b> vous a validÃ© le stage pour la soutenance ', '2022-01-26', 17, 19000018, 0),
(73, '<b>Prof.  OUMAIRA</b> a acceptÃ© de vous encadrer lors de votre stage', '2022-01-26', 17, 19000018, 0),
(74, '<b>Prof.  OUMAIRA</b> vous a attribuer la note 18/20 Ã  votre stage', '2022-01-26', 17, 19000018, 0),
(75, '<b>Prof.  OUMAIRA</b> vous a validÃ© le stage pour la soutenance ', '2022-01-26', 17, 19000018, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reclamation`
--

CREATE TABLE `reclamation` (
  `id` int(20) NOT NULL,
  `message` varchar(600) NOT NULL,
  `sender` tinyint(1) NOT NULL,
  `sender_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'PFE chez INWI', 'Amelioration de leur application mobile, et fixation des beugs', 'java, c++', '19000018.pdf', '19000018.pdf', '19000018.pdf', '19000018.pdf', '19000018.pdf', 'Reda', 'Oussama', 18, 1, 'PFE', 17, 1, 19000018, 6, '', '', 'inconnu.jpg', '2022-01-25'),
(2, 'PFE chez IAM', 'Amelioration de leur site web, et fixation des bugs', 'java, c++, c#, dart', '19000018.pdf', '19000018.pdf', '19000018.pdf', '', '', 'Reda', 'Mohamed', NULL, 1, 'PFE', 15, 2, 19000018, 4, '', '', 'inconnu.jpg', '2022-01-25'),
(22, 'stage de IA', 'test', '', NULL, '19011058.pdf', NULL, NULL, NULL, 'Ahmed', 'Ahmed', NULL, 0, 'PFA', 17, 18, 19011058, 2, '', '', 'inconnu.jpg', '2022-01-25'),
(30, 'PFA chez l\'ONCF 2', 'Developpement d\'une nouvelle application de NFT', 'flutter, dart, firebase', '19000018.pdf', '', '', '', '', 'Reda', 'Mohamed', NULL, 0, 'PFA', 17, 18, 19000018, 2, '', '', 'inconnu.jpg', '2022-01-26'),
(31, 'PFE chez Twitter', 'Charge de la maintenance du site web twitter', 'java, html, css, js', '19000067.pdf', '19000067.pdf', NULL, NULL, NULL, 'Haitem', 'Hamid', 18, 1, 'PFE', 17, 13, 19000067, 8, '', '', 'inconnu.jpg', '2022-01-26'),
(32, 'Stage chez une entreprise', 'Ceci est un test ', 'java,python,c++', NULL, NULL, NULL, NULL, NULL, 'Amine', 'Amine', NULL, 0, 'PFE', NULL, 28, 19008672, 2, '', '', 'inconnu.jpg', '2022-01-26'),
(35, 'PFA chez OCP', 'Amelioration de leur application mobile, et fixation des bugs', 'java, dart, flutter', '19000018.pdf', '', '', '', '', '', '', NULL, 0, 'PFA', NULL, 24, 19000018, 4, '', '', 'inconnu.jpg', '2022-01-26'),
(36, 'PFE chez INWI', 'je fait kda kda kda kda kda kda kda kda kda dka kda', 'java, c++, c#', '', '', '', '', '', 'jilali', 'l3rbi', NULL, 0, 'PFE', NULL, 1, 14000130, 6, '', '', 'inconnu.jpg', '2022-01-26');

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
-- Indexes for table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `conversation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `id_enseignant` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id_entreprise` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id_notification` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stage`
--
ALTER TABLE `stage`
  MODIFY `id_stage` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
