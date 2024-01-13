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
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`email`);
  
ALTER TABLE `themes`
  ADD PRIMARY KEY (`theme_name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;




DELIMITER //

CREATE PROCEDURE add_score(
    IN p_email VARCHAR(60),
    IN p_theme_name VARCHAR(25),
    IN p_difficulty VARCHAR(10),
    IN p_is_correct BOOLEAN
)
BEGIN
    DECLARE score_increment INT;

    -- Déterminer l'incrément de score en fonction de la difficulté
    CASE p_difficulty
        WHEN 'easy' THEN SET score_increment = 1;
        WHEN 'medium' THEN SET score_increment = 2;
        WHEN 'hard' THEN SET score_increment = 3;
        ELSE SET score_increment = 0; -- Aucun incrément pour une difficulté inconnue
    END CASE;

    -- Vérifier si l'utilisateur existe dans la table utilisateurs
    IF EXISTS (SELECT 1 FROM utilisateurs WHERE email = p_email) THEN
        -- Vérifier si le thème existe dans la table themes
        IF NOT EXISTS (SELECT 1 FROM themes WHERE theme_name = p_theme_name AND email = p_email) THEN
            -- Ajouter une nouvelle ligne pour le thème de l'utilisateur s'il n'existe pas
            INSERT INTO themes (theme_name, email, easy_score, medium_score, hard_score, total_score)
            VALUES (p_theme_name, p_email, 0, 0, 0, 0);
        END IF;

        -- Mettre à jour les scores en fonction de la réponse correcte
        IF p_is_correct THEN
            UPDATE themes
            SET
                easy_score = easy_score + (score_increment * IF(p_difficulty = 'easy', 1, 0)),
                medium_score = medium_score + (score_increment * IF(p_difficulty = 'medium', 1, 0)),
                hard_score = hard_score + (score_increment * IF(p_difficulty = 'hard', 1, 0)),
                total_score = total_score + score_increment
            WHERE theme_name = p_theme_name AND email = p_email;
        END IF;
    END IF;
END //

DELIMITER ;