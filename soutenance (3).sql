-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 23 jan. 2024 à 01:15
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
-- Base de données : `soutenance`
--
CREATE DATABASE IF NOT EXISTS `soutenance` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `soutenance`;

-- --------------------------------------------------------

--
-- Structure de la table `calc`
--

DROP TABLE IF EXISTS `calc`;
CREATE TABLE IF NOT EXISTS `calc` (
  `id` int NOT NULL,
  `cpc` int NOT NULL,
  `cpd` int NOT NULL,
  `ad_cost` int NOT NULL,
  `returnn` int NOT NULL,
  `delivery` int NOT NULL,
  `storage_other` int NOT NULL,
  `total_price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id_produit` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(30) NOT NULL,
  `descr` varchar(200) DEFAULT NULL,
  `product_imagepath` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `product_user_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_produit`),
  KEY `productuserid` (`product_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id_produit`, `product_name`, `descr`, `product_imagepath`, `product_user_id`) VALUES
(1, 'chaussure', 'noir', '../../dist/UserData/ayoubouadah.w@gmail.com/product/1/product_picture_1.jpg', 'ayoubouadah.w@gmail.com'),
(2, 'chaussure', 'gris', '../../dist/UserData/ayoubouadah.w@gmail.com/product/2/product_picture_2.jpg', 'ayoubouadah.w@gmail.com'),
(3, 'chemise ', 'vert', '../../dist/UserData/ayoubouadah.w@gmail.com/product/3/product_picture_3.jpg', 'ayoubouadah.w@gmail.com'),
(4, 'chemise ', 'rouge', '../../dist/UserData/ayoubouadah.w@gmail.com/product/4/product_picture_4.jpg', 'ayoubouadah.w@gmail.com'),
(5, 'chemise', 'bleu', '../../dist/UserData/ayoubouadah.w@gmail.com/product/5/product_picture_5.jpg', 'ayoubouadah.w@gmail.com'),
(6, 'chemise ', 'noir', '../../dist/UserData/ayoubouadah.w@gmail.com/product/6/product_picture_6.jpg', 'ayoubouadah.w@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `product_pricing`
--

DROP TABLE IF EXISTS `product_pricing`;
CREATE TABLE IF NOT EXISTS `product_pricing` (
  `id_pricing` int NOT NULL,
  `id_product` int NOT NULL,
  `id_calc` int NOT NULL,
  `template` int NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id_roles` int NOT NULL AUTO_INCREMENT,
  `roles_name` varchar(20) NOT NULL,
  PRIMARY KEY (`id_roles`),
  UNIQUE KEY `roles_name` (`roles_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id_roles`, `roles_name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int NOT NULL,
  `site_name` varchar(20) NOT NULL,
  `site_des` varchar(50) NOT NULL,
  `site_logo` blob NOT NULL,
  `site_url` varchar(30) NOT NULL,
  `keywords` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(20) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_description` varchar(200) DEFAULT NULL,
  `phone` char(10) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `country_code` varchar(20) DEFAULT NULL,
  `state_code` varchar(20) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `full_name`, `first_name`, `last_name`, `user_description`, `phone`, `create_date`, `country_code`, `state_code`, `country`, `state`, `adresse`) VALUES
(8, 'a1@gmail.com', '1234', 'Ayoub Ouadah', 'Ayoub', 'Ouadah', 'hi i am a web dev', '0540302080', '2023-11-28 11:13:26', 'DZ', '09', 'Algeria', 'Blida', 'rue maison'),
(9, 'ayoubouadah.w@gmail.com', '1234', 'Ayoub Ouadah', 'Ayoub', 'Ouadah', 'hello', '0550607080', '2023-12-30 20:55:44', 'DZ', '09', 'Algeria', 'Blida', 'rue batata ');

-- --------------------------------------------------------

--
-- Structure de la table `user_has_roles`
--

DROP TABLE IF EXISTS `user_has_roles`;
CREATE TABLE IF NOT EXISTS `user_has_roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` varchar(50) NOT NULL,
  `roles_name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_r1` (`id_user`),
  KEY `user_r2` (`roles_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user_has_roles`
--

INSERT INTO `user_has_roles` (`id`, `id_user`, `roles_name`) VALUES
(1, 'a1@gmail.com', 'user'),
(2, 'ayoubouadah.w@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `user_social`
--

DROP TABLE IF EXISTS `user_social`;
CREATE TABLE IF NOT EXISTS `user_social` (
  `id_user` varchar(50) NOT NULL,
  `user_web` mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `user_git` mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `user_twitter` mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `user_insta` mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `user_facebook` mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user_social`
--

INSERT INTO `user_social` (`id_user`, `user_web`, `user_git`, `user_twitter`, `user_insta`, `user_facebook`) VALUES
('a1@gmail.com', 'https://github.com/ayoubouad-dev', 'https://github.com/ayoubouad-dev', 'https://github.com/ayoubouad-dev', 'https://github.com/ayoubouad-dev', 'https://github.com/ayoubouad-dev'),
('ayoubouadah.w@gmail.com', 'https://github.com/ayoubouad-dev', 'https://github.com/ayoubouad-dev', 'https://github.com/ayoubouad-dev', 'https://github.com/ayoubouad-dev', 'https://github.com/ayoubouad-dev');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `productuserid` FOREIGN KEY (`product_user_id`) REFERENCES `user` (`email`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `user_has_roles`
--
ALTER TABLE `user_has_roles`
  ADD CONSTRAINT `user_r1` FOREIGN KEY (`id_user`) REFERENCES `user` (`email`),
  ADD CONSTRAINT `user_r2` FOREIGN KEY (`roles_name`) REFERENCES `roles` (`roles_name`);

--
-- Contraintes pour la table `user_social`
--
ALTER TABLE `user_social`
  ADD CONSTRAINT `user_s` FOREIGN KEY (`id_user`) REFERENCES `user` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
