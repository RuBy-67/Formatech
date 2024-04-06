-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 06 avr. 2024 à 15:11
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `formatech`
--

-- --------------------------------------------------------

--
-- Structure de la table `classroom`
--

DROP TABLE IF EXISTS `classroom`;
CREATE TABLE IF NOT EXISTS `classroom` (
  `classRoomId` int NOT NULL AUTO_INCREMENT,
  `building` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `capacityMax` int DEFAULT NULL,
  PRIMARY KEY (`classRoomId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `classroom`
--

INSERT INTO `classroom` (`classRoomId`, `building`, `name`, `capacityMax`) VALUES
(1, '1', 'Tesla', 10),
(2, '1', 'Hawking', 15),
(3, '1', 'Lovelace', 20),
(4, '1', 'Amphithéâtre Boris Mallick', 200),
(5, '2', 'Schrödinger', 25),
(6, '2', 'Bohr', 25),
(7, '2', 'Laboratoire Marie Curie', 50);

-- --------------------------------------------------------

--
-- Structure de la table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `employeeId` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `job` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`employeeId`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `employees`
--

INSERT INTO `employees` (`employeeId`, `firstName`, `lastName`, `job`, `mail`, `password`) VALUES
(3, 'Cécile', 'Hentsch', 'Administrateur', 'Ce@gmail.com', '$2y$10$ijP08cAJSWUPprxCRDNWzehtAqDIpaQjikLDiSKXsoILGpgn2dGsi'),
(2, 'Sato', 'Test', 'Tester', 'Email@gmail.com', '$2y$10$yOZ6yoJb2wuYtsVTkYtIBOIhA4R.NCk6CJ9x/MSp8wdgKZ84dH3/i'),
(5, 'Cécile', 'Hentsch', 'Administrateur', 'Cece@gmail.com', '$2y$10$RSe9q8AhAKiJI40MmIbxBeZnFGJk46el87D3Q1/VZ86TW5JigI3ym'),
(7, 'Employee', 'Employee', 'Tester', 'Employee@employee.fr', '$2y$10$PpMmOP.Bhjs6eAF0Y8E15.NIs576NuiZmaLRzrXBkdDuqY2Eiy/2G'),
(8, 'Adrien', 'Laparte', 'Admin', 'Adrien.laparte@formatech.fr', '$2y$10$7HhQb4Ohh/gudzK4.euAjuI.FQrr57XmYirFY/s/kM5vd8v0.kNiO'),
(9, 'Ruben', 'Ruben', 'Tech', 'Ruben@employe.com', '$2y$10$INNPBOQgq4W37aOPxDPj8Oxwacp1keHYWqbtaSjidQVc8YlayFd7i'),
(11, 'Test', 'Test', 'Tech', 'Test@gmail.com', '$2y$10$DDQs9sBKqpxawAp3745Zg.0t1LEmAdF53mcv6m3Ho1Wwd2sZ00hRO');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `formationId` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `durationFormationInMonth` int DEFAULT NULL,
  `abbreviation` varchar(255) DEFAULT NULL,
  `rncpLvl` int DEFAULT NULL,
  `accessibility` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`formationId`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`formationId`, `name`, `durationFormationInMonth`, `abbreviation`, `rncpLvl`, `accessibility`) VALUES
(1, 'Technicien en maintenance robotique', 24, 'Tmr', 5, 1),
(2, 'Bachelor administrateur en technologies novatrices', 12, 'BATN', 6, 1),
(3, 'Ingénieur expert en fusion cybernétique', 24, 'Iefc', 7, 0),
(39, 'Ingenieur informaticien', 7, 'Stl', 7, 1);

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

DROP TABLE IF EXISTS `module`;
CREATE TABLE IF NOT EXISTS `module` (
  `moduleId` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `durationModuleInHours` int DEFAULT NULL,
  PRIMARY KEY (`moduleId`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`moduleId`, `name`, `durationModuleInHours`) VALUES
(22, 'Découverte de la robotique', 70),
(23, 'Programmation assistée par IA', 98),
(24, 'Conception robotique', 105),
(25, 'Concepteur de réalités alternatives', 140),
(26, 'Développement d\'intelligences articielles', 70),
(27, 'Informatique quantique', 105),
(28, 'Développement d\'énergies nouvelles et expérimentales', 140),
(29, 'Ingénierie spatiale', 1119),
(30, 'Mélanchon', 3),
(31, 'Mélanchon', 1);

-- --------------------------------------------------------

--
-- Structure de la table `moduleformation`
--

DROP TABLE IF EXISTS `moduleformation`;
CREATE TABLE IF NOT EXISTS `moduleformation` (
  `moduleId` int DEFAULT NULL,
  `formationId` int DEFAULT NULL,
  KEY `formationId` (`formationId`),
  KEY `moduleId` (`moduleId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `moduleformation`
--

INSERT INTO `moduleformation` (`moduleId`, `formationId`) VALUES
(1, 1),
(29, 39),
(30, 2),
(28, 1),
(22, 3),
(31, 2),
(28, 39);

-- --------------------------------------------------------

--
-- Structure de la table `modulespeaker`
--

DROP TABLE IF EXISTS `modulespeaker`;
CREATE TABLE IF NOT EXISTS `modulespeaker` (
  `speakerId` int DEFAULT NULL,
  `moduleId` int DEFAULT NULL,
  KEY `speakerId` (`speakerId`),
  KEY `moduleId` (`moduleId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `modulespeaker`
--

INSERT INTO `modulespeaker` (`speakerId`, `moduleId`) VALUES
(2, 30),
(2, 31);

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `promotionId` int NOT NULL AUTO_INCREMENT,
  `formationId` int DEFAULT NULL,
  `promotionYears` int DEFAULT NULL,
  `startingDate` date DEFAULT NULL,
  `endingDate` date DEFAULT NULL,
  PRIMARY KEY (`promotionId`),
  KEY `formationId` (`formationId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`promotionId`, `formationId`, `promotionYears`, `startingDate`, `endingDate`) VALUES
(3, 1, 2029, '2023-12-25', '2024-03-24');

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `sessionId` int NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `startTime` time DEFAULT NULL,
  `endTime` time DEFAULT NULL,
  `moduleId` int DEFAULT NULL,
  `promotionId` int DEFAULT NULL,
  `classRoomId` int DEFAULT NULL,
  `speakerId` int DEFAULT NULL,
  PRIMARY KEY (`sessionId`),
  KEY `moduleId` (`moduleId`),
  KEY `promotionId` (`promotionId`),
  KEY `classRoomId` (`classRoomId`),
  KEY `speakerId` (`speakerId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `session`
--

INSERT INTO `session` (`sessionId`, `date`, `startTime`, `endTime`, `moduleId`, `promotionId`, `classRoomId`, `speakerId`) VALUES
(2, '2023-12-16', '07:30:00', '04:30:00', 25, 3, 0, 10),
(4, '2023-12-24', '15:54:00', '16:54:00', 24, 3, 0, 2),
(5, '2024-01-12', '03:28:00', '03:28:00', 25, 3, 0, 2),
(6, '2024-02-02', '23:33:00', '04:03:00', 29, 3, 0, 2),
(7, '2024-04-13', '18:54:00', '19:54:00', 24, 3, 0, 10);

-- --------------------------------------------------------

--
-- Structure de la table `speaker`
--

DROP TABLE IF EXISTS `speaker`;
CREATE TABLE IF NOT EXISTS `speaker` (
  `speakerId` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`speakerId`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `speaker`
--

INSERT INTO `speaker` (`speakerId`, `firstName`, `lastName`, `mail`, `password`) VALUES
(2, 'Ruben', 'Hentsch', 'Cecile.hentsch@gmail.com', '$2y$10$CsDLNN7TKXmeNk0AIQUja.V9Pedzi0yFTML63gyJhVEwG2YIuJdE2'),
(10, 'Speaker', 'Speaker', 'Speaker@speaker.fr', '$2y$10$7xqTLgQ60SmA.GubVaqaQeg1Km3F8db3MEk2302174ZyoJ/W/CAsO'),
(11, 'Adrien', 'Laporte', 'Adrien.laporte@formatech.fr', '$2y$10$C.GOuWf4CvS/dwjMScbXpeh7bm6wM6NLaZIRMm0oCWZDRwwrzyiqG'),
(13, 'Clémentine', 'Trouez', 'Intervenant@intervenant.com', '$2y$10$yMvTPLqIMsHbRGE7ix51L.ArCz.1ZJ2iorc0zyIg6xcoI4Au5wS3y');

-- --------------------------------------------------------

--
-- Structure de la table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `studentId` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`studentId`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `student`
--

INSERT INTO `student` (`studentId`, `firstName`, `lastName`, `mail`, `birthDate`, `password`) VALUES
(4, 'Clément', 'Gangloff', 'Cgangloff@bird.eu', '2000-09-18', '$2y$10$ZEcQ53ikXFYU2r7FO2Qro.w9STK74WEAGYFHyvCDITE.R8yUm/hsm'),
(3, 'Cécile', 'Hentsch', 'Email@gmail.com', '2023-12-15', '$2y$10$NxilPQ2OqxIt9AIHgNizHuJdmlmGNXuT6P/JNADEJns0ohJpiwSQi'),
(5, 'Student', 'Student', 'Student@student.fr', '2023-12-22', '$2y$10$cRCnsiVanv7jxHiMJvBaWOWcLfWKSSIMQqy6C60bX.zLExiKl5Ch6'),
(8, 'Ruben', 'Beyer', 'Employee@employee.fr', '2024-04-13', '$2y$10$iQW44LcKrRNMaKj2O0RaZuzpNNDkqbukcrobqeAJG9GeH.FFNkH6K'),
(7, 'Lucas', 'Romain', 'Lucas.romain@formatech.fr', '2023-12-23', '$2y$10$A4x8jN/sYdWIJ8ke4EvADObjyWvQWIgGn3QKg/ThRkz29d9Ms//Sq'),
(9, 'Test', 'Test', 'Student@student.fr', '2024-04-18', '$2y$10$T2YqkWmY6N/kPwe2DT19Y.wMdrT7URUgOYLkNzXyNuv0SlJKDTc/S');

-- --------------------------------------------------------

--
-- Structure de la table `studentpromotion`
--

DROP TABLE IF EXISTS `studentpromotion`;
CREATE TABLE IF NOT EXISTS `studentpromotion` (
  `studentId` int DEFAULT NULL,
  `promotionId` int DEFAULT NULL,
  KEY `studentId` (`studentId`),
  KEY `promotionId` (`promotionId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `studentpromotion`
--

INSERT INTO `studentpromotion` (`studentId`, `promotionId`) VALUES
(5, 3),
(7, 3),
(8, 3),
(9, 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
