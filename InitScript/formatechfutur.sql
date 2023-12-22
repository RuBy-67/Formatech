-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 22 déc. 2023 à 08:53
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
-- Base de données : `formatechfutur`
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `employees`
--

INSERT INTO `employees` (`employeeId`, `firstName`, `lastName`, `job`, `mail`, `password`) VALUES
(3, 'Cécile', 'Hentsch', 'Administrateur', 'Ce@gmail.com', '$2y$10$ijP08cAJSWUPprxCRDNWzehtAqDIpaQjikLDiSKXsoILGpgn2dGsi'),
(2, 'Sato', 'Test', 'Tester', 'Email@gmail.com', '$2y$10$yOZ6yoJb2wuYtsVTkYtIBOIhA4R.NCk6CJ9x/MSp8wdgKZ84dH3/i'),
(5, 'Cécile', 'Hentsch', 'Administrateur', 'Cece@gmail.com', '$2y$10$RSe9q8AhAKiJI40MmIbxBeZnFGJk46el87D3Q1/VZ86TW5JigI3ym'),
(7, 'Employee', 'Employee', 'Tester', 'Employee@employee.fr', '$2y$10$PpMmOP.Bhjs6eAF0Y8E15.NIs576NuiZmaLRzrXBkdDuqY2Eiy/2G');

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
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`formationId`, `name`, `durationFormationInMonth`, `abbreviation`, `rncpLvl`, `accessibility`) VALUES
(21, 'Sio', 4, 'Sio', 4, 0),
(22, 'Test', 6, 'Tst', 7, 0),
(25, 'Testtodelete', 5, 'Tdt', 5, 0),
(26, 'Test', 5, 'Tst', 4, 0),
(27, 'Testss', 5, 'Tstss', 6, 0),
(30, 'Ta mère', 4, 'Tst', 4, 1),
(31, 'Ta mère', 5, 'Td', 4, 1),
(32, 'La robotique spaciale', 18, 'Rs', 7, 1),
(33, 'Réalité virtuelle et réalité augmentée ', 18, 'Rvra', 7, 1),
(34, 'Développement', 8, 'Dev', 4, 1),
(35, 'Informatique quantique ', 14, 'Iq', 7, 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`moduleId`, `name`, `durationModuleInHours`) VALUES
(20, 'Test', 6),
(2, 'Français', 6),
(19, 'Jnb', 2),
(3, 'Devweb', 6),
(21, 'Encore un module', 8),
(14, 'Tema le cours', 4);

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
(14, 30),
(19, 31),
(14, 21),
(3, 21),
(3, 30),
(2, 22),
(14, 26),
(3, 26),
(14, 25),
(3, 25),
(3, 28),
(14, 28),
(19, 1),
(19, 21),
(3, 31),
(19, 32),
(3, 32),
(14, 32),
(3, 33),
(14, 33),
(3, 34),
(19, 35),
(3, 35),
(2, 21),
(20, 4),
(20, 21),
(21, 1),
(21, 21);

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
(2, 2),
(4, 3),
(2, 11),
(4, 14),
(2, 14),
(4, 19),
(4, 20);

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`promotionId`, `formationId`, `promotionYears`, `startingDate`, `endingDate`) VALUES
(2, 21, 2025, '2023-12-20', '2023-12-22');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `session`
--

INSERT INTO `session` (`sessionId`, `date`, `startTime`, `endTime`, `moduleId`, `promotionId`, `classRoomId`, `speakerId`) VALUES
(1, '2023-12-24', '07:33:00', '09:36:00', 2, 2, 0, 10),
(2, '2023-12-06', '02:30:00', '04:30:00', 20, 2, 0, 10);

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `speaker`
--

INSERT INTO `speaker` (`speakerId`, `firstName`, `lastName`, `mail`, `password`) VALUES
(2, 'Cécile', 'Hentsch', 'Cecile.hentsch@gmail.com', '$2y$10$WmVMBrUfezMZrUH5Hqmtku1npeFwG.pWHmgBbhmRK8uflWtPPJfbC'),
(4, 'Jesus', 'Christ', 'jesus@holy.com', 'mdp'),
(10, 'Speaker', 'Speaker', 'Speaker@speaker.fr', '$2y$10$7xqTLgQ60SmA.GubVaqaQeg1Km3F8db3MEk2302174ZyoJ/W/CAsO');

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `student`
--

INSERT INTO `student` (`studentId`, `firstName`, `lastName`, `mail`, `birthDate`, `password`) VALUES
(4, 'Clément', 'Gangloff', 'Cgangloff@bird.eu', '2000-09-18', '$2y$10$Zbprq6xcfIxI7lcYpRVkL.SKEaaqY8WAcxtfZ9tpCXZ66HekjlncO'),
(3, 'Cécile', 'Hentsch', 'Email@gmail.com', '2023-12-15', '$2y$10$NxilPQ2OqxIt9AIHgNizHuJdmlmGNXuT6P/JNADEJns0ohJpiwSQi'),
(5, 'Student', 'Student', 'Student@student.fr', '2023-12-22', '$2y$10$cRCnsiVanv7jxHiMJvBaWOWcLfWKSSIMQqy6C60bX.zLExiKl5Ch6');

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
(4, 2),
(3, 2),
(5, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
