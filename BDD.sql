-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 12 déc. 2017 à 15:29
-- Version du serveur :  5.7.19
-- Version de PHP :  7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `symfony`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_497DD6345E237E06` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `name`) VALUES
(2, 'Jeunesse'),
(1, 'Policier'),
(3, 'Roman');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_livre`
--

DROP TABLE IF EXISTS `categorie_livre`;
CREATE TABLE IF NOT EXISTS `categorie_livre` (
  `categorie_id` int(11) NOT NULL,
  `livre_id` int(11) NOT NULL,
  PRIMARY KEY (`categorie_id`,`livre_id`),
  KEY `IDX_591BA249BCF5E72D` (`categorie_id`),
  KEY `IDX_591BA24937D925CB` (`livre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `categorie_livre`
--

INSERT INTO `categorie_livre` (`categorie_id`, `livre_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(2, 7),
(2, 8),
(2, 9),
(3, 5);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `operating_system_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4C62E638A391D4AD` (`operating_system_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `firstname`, `lastname`, `email`, `message`, `operating_system_id`) VALUES
(12, 'ergr', 'greg', 'egerger', 'gerg', NULL),
(13, 'uuuuuuu', 'uu', 'uuu', 'uu', NULL),
(14, 'rgg', 'sss', 'jkfdqgr', 'erg', NULL),
(15, 'lol', 'lol', 'lol', 'lol', 2),
(16, 'lul', 'lul', 'lul', 'lul', 1);

-- --------------------------------------------------------

--
-- Structure de la table `contact_hobby`
--

DROP TABLE IF EXISTS `contact_hobby`;
CREATE TABLE IF NOT EXISTS `contact_hobby` (
  `contact_id` int(11) NOT NULL,
  `hobby_id` int(11) NOT NULL,
  PRIMARY KEY (`contact_id`,`hobby_id`),
  KEY `IDX_144EE338E7A1254A` (`contact_id`),
  KEY `IDX_144EE338322B2123` (`hobby_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `contact_hobby`
--

INSERT INTO `contact_hobby` (`contact_id`, `hobby_id`) VALUES
(12, 1),
(13, 2),
(14, 1),
(16, 1);

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

DROP TABLE IF EXISTS `formations`;
CREATE TABLE IF NOT EXISTS `formations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_409021375E237E06` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `formations`
--

INSERT INTO `formations` (`id`, `name`) VALUES
(2, 'développeur back'),
(1, 'développeur front');

-- --------------------------------------------------------

--
-- Structure de la table `formations_modules`
--

DROP TABLE IF EXISTS `formations_modules`;
CREATE TABLE IF NOT EXISTS `formations_modules` (
  `formations_id` int(11) NOT NULL,
  `modules_id` int(11) NOT NULL,
  PRIMARY KEY (`formations_id`,`modules_id`),
  KEY `IDX_F9A884EC3BF5B0C2` (`formations_id`),
  KEY `IDX_F9A884EC60D6DC42` (`modules_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `formations_modules`
--

INSERT INTO `formations_modules` (`formations_id`, `modules_id`) VALUES
(1, 5),
(1, 6),
(1, 7),
(2, 1),
(2, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `hobby`
--

DROP TABLE IF EXISTS `hobby`;
CREATE TABLE IF NOT EXISTS `hobby` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `hobby`
--

INSERT INTO `hobby` (`id`, `name`) VALUES
(1, 'cinema'),
(2, 'Lecture');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

DROP TABLE IF EXISTS `livre`;
CREATE TABLE IF NOT EXISTS `livre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `publication_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id`, `name`, `author`, `description`, `publication_date`) VALUES
(1, 'Book1', 'author1', 'description1', '2017-12-12'),
(2, 'Book2', 'author2', 'description2', '2017-12-12'),
(3, 'Book3', 'author3', 'description3', '2017-12-12'),
(4, 'Book4', 'author4', 'description4', '2017-12-12'),
(5, 'Book5', 'author5', 'description5', '2017-12-12'),
(6, 'Book6', 'author6', 'description6', '2017-12-12'),
(7, 'Book7', 'author7', 'description7', '2017-12-12'),
(8, 'Book8', 'author8', 'description8', '2017-12-12'),
(9, 'Book9', 'author9', 'description9', '2017-12-12');

-- --------------------------------------------------------

--
-- Structure de la table `modules`
--

DROP TABLE IF EXISTS `modules`;
CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_2EB743D75E237E06` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `modules`
--

INSERT INTO `modules` (`id`, `name`) VALUES
(3, 'angular'),
(5, 'css'),
(6, 'html'),
(2, 'php'),
(7, 'sass'),
(1, 'sql'),
(4, 'symfony');

-- --------------------------------------------------------

--
-- Structure de la table `operating_system`
--

DROP TABLE IF EXISTS `operating_system`;
CREATE TABLE IF NOT EXISTS `operating_system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_BCF9A7815E237E06` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `operating_system`
--

INSERT INTO `operating_system` (`id`, `name`) VALUES
(2, 'Linux'),
(1, 'Windows');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `categorie_livre`
--
ALTER TABLE `categorie_livre`
  ADD CONSTRAINT `FK_591BA24937D925CB` FOREIGN KEY (`livre_id`) REFERENCES `livre` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_591BA249BCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `FK_4C62E638A391D4AD` FOREIGN KEY (`operating_system_id`) REFERENCES `operating_system` (`id`);

--
-- Contraintes pour la table `contact_hobby`
--
ALTER TABLE `contact_hobby`
  ADD CONSTRAINT `FK_144EE338322B2123` FOREIGN KEY (`hobby_id`) REFERENCES `hobby` (`id`),
  ADD CONSTRAINT `FK_144EE338E7A1254A` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`);

--
-- Contraintes pour la table `formations_modules`
--
ALTER TABLE `formations_modules`
  ADD CONSTRAINT `FK_F9A884EC3BF5B0C2` FOREIGN KEY (`formations_id`) REFERENCES `formations` (`id`),
  ADD CONSTRAINT `FK_F9A884EC60D6DC42` FOREIGN KEY (`modules_id`) REFERENCES `modules` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
