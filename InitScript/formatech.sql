-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 20 déc. 2023 à 21:18
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `moduleId` int DEFAULT NULL,
  `accessibility` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`formationId`),
  KEY `moduleId` (`moduleId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

DROP TABLE IF EXISTS `module`;
CREATE TABLE IF NOT EXISTS `module` (
  `moduleId` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `durationModuleInHours` int DEFAULT NULL,
  `speakerId` int DEFAULT NULL,
  PRIMARY KEY (`moduleId`),
  KEY `speakerId` (`speakerId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`promotionId`, `formationId`, `promotionYears`, `startingDate`, `endingDate`) VALUES
(1, 1, 12, '2023-12-20', '2023-12-22');

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `sessionId` int NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `startTime` int DEFAULT NULL,
  `endTime` int DEFAULT NULL,
  `moduleId` int DEFAULT NULL,
  `promotionId` int DEFAULT NULL,
  `classRoomId` int DEFAULT NULL,
  `speakerId` int DEFAULT NULL,
  PRIMARY KEY (`sessionId`),
  KEY `moduleId` (`moduleId`),
  KEY `promotionId` (`promotionId`),
  KEY `classRoomId` (`classRoomId`),
  KEY `speakerId` (`speakerId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `student`
--

INSERT INTO `student` (`studentId`, `firstName`, `lastName`, `mail`, `birthDate`, `password`) VALUES
(1, 'Béatrice', 'Boa', 'Bea@hmail.fr', '2023-12-12', '12587694');

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
(1, 1),
(2, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
