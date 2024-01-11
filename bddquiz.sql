-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 11 Janvier 2024 à 08:09
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bddquiz`
--
DROP DATABASE IF EXISTS `bddquiz`;
CREATE DATABASE IF NOT EXISTS `bddquiz`;
USE `bddquiz`;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `username` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `date_inscription` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

CREATE TABLE `themes` (
  `theme_name` varchar(25) NOT NULL,
  `email` varchar(60) NOT NULL,
  `easy_score` INT,
  `medium_score` INT,
  `hard_score` INT,
  `total_score` INT
);

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`username`, `password`, `email`, `date_inscription`) VALUES
('Barchon', '$2y$10$uPB6DZGkztBnyqRoQO4t5.zWnZXhxMxfdpcBS6Kt2ZAWjJ/HKfjXm', 'test@gmail.com', '2024-01-10 21:30:27');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`email`);
  
ALTER TABLE `themes`
  ADD PRIMARY KEY (`theme_name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;