-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 21 jan. 2018 à 23:07
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `monumentstore`
--

-- --------------------------------------------------------

--
-- Structure de la table `shop`
--

DROP TABLE IF EXISTS `shop`;
CREATE TABLE IF NOT EXISTS `shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `optionName` varchar(255) NOT NULL,
  `optionPrix` double NOT NULL,
  `prix` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `shop`
--

INSERT INTO `shop` (`id`, `name`, `type`, `description`, `img`, `optionName`, `optionPrix`, `prix`) VALUES
(1, 'La Tour Eiffel', 'monument', 'La tour Eiffel est une tour de fer puddlé de 324 mètres de hauteur (avec antennes)o 1 située à Paris, à l’extrémité nord-ouest du parc du Champ-de-Mars en bordure de la Seine dans le 7e arrondissement. Construite par Gustave Eiffel et ses collaborateurs pour l’Exposition universelle de Paris de 1889, et initialement nommée « tour de 300 mètres »', 'toureiffel.jpg', 'Resto', 500000, 1000000),
(2, 'Jardin des plantes', 'Jardin', 'jardin botanique ouvert au public, situé dans le 5e arrondissement de Paris. Il est le siège et le principal site du Muséum national d\'histoire naturelle, qui possède aussi d\'autres sites à Paris et en province. En tant qu\'espace de l\'institution de recherche qu\'est le Muséum, le Jardin des plantes est, à ce titre, un campus.', 'jardindesplantes.jpg', 'Muséum national d\'histoire naturelle', 30000, 80000);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `postalCode` int(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstName`, `lastName`, `address`, `postalCode`, `city`, `admin`) VALUES
(8, 'admin@admin.admin', '$2y$10$FShLcFm044t9LHxTpZhxcObg2ZnSrkx/kuZmPOz3oBm1fs.VSNsiC', 'admin', 'admin', 'admin', 77777, 'admin', 1),
(9, 'guyot.oceane1@gmail.com', '$2y$10$z90ojVAb9awVaNezvXqME.J3xPVXvF3O9FmFfcnmAtNVPJZ2ACn7.', 'Océane', 'Guyot', '2 rue de Pontoise', 95650, 'PUISEUX PONTOISE', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
