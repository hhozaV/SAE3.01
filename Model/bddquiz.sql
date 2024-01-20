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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Assurez-vous que la table utilisateurs utilise le moteur InnoDB
ALTER TABLE utilisateurs ENGINE = InnoDB;

-- Assurez-vous que l'email dans la table utilisateurs est unique et indexé
ALTER TABLE utilisateurs
ADD UNIQUE INDEX idx_email (email);

CREATE TABLE `scores` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_email` VARCHAR(60) NOT NULL,
  `theme_name` VARCHAR(25) NOT NULL,
  `difficulty` ENUM('easy', 'medium', 'hard') NOT NULL,
  `score` INT DEFAULT 0,
  `survieBestScore` INT DEFAULT 0,
  FOREIGN KEY (`user_email`) REFERENCES `utilisateurs`(`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `lecons` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `theme_name` VARCHAR(25) NOT NULL,
  `title` VARCHAR(100) NOT NULL,
  `description` TEXT NOT NULL,
  `difficulty` ENUM('easy', 'medium', 'hard') NOT NULL,
  `link` VARCHAR(255) NOT NULL,
  `image_url` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `lecons` (theme_name, title, description, difficulty, link, image_url)
VALUES
  ('Linux', 'Initiez-vous à Linux', 'Cours adapté aux débutants pour découvrir le système Linux, un système d''exploitation gratuit et fascinant qui vous donnera un contrôle sans précédent sur votre ordinateur !', 'easy', 'https://openclassrooms.com/fr/courses/7170491-initiez-vous-a-linux', '../img/linux.png'),
  ('Linux', 'Administrez un système Linux', 'Cours parfait pour s''initier à l''administration d''un serveur Linux, vous apprendrez à utiliser le terminal, le shell, manipulez des fichiers, configurez un réseau et surveiller l''activité du système.', 'medium', 'https://openclassrooms.com/fr/courses/7274161-administrez-un-systeme-linux', '../img/linux.png'),
  ('Linux', 'Gérer un serveur Linux', 'Dans ce cours, vous apprendrez à renforcer les services de votre serveur Linux. Installez et gérez un annuaire LDAP, configurez un serveur LAMP et utilisez Tomcat & Jenkins et Nginx.', 'medium', 'https://openclassrooms.com/fr/courses/1733551-gerez-votre-serveur-linux-et-ses-services', '../img/linux.png'),
  ('Linux', 'Montez un serveur de fichier', 'Cours parfait pour ceux qui maîtrisent déjà Linux et ses lignes de commandes. Ce cours vous apprendra à maîtriser l''installation et la gestion de serveur Linux.', 'medium', 'https://openclassrooms.com/fr/courses/2356316-montez-un-serveur-de-fichiers-sous-linux', '../img/linux.png'),
  ('Linux', 'Contrôle d''un poste à distance', 'Cours pour tout les passionnés ou pour les techniciens informatiques qui auraient besoin de prendre le contrôle d''un ordinateur Linux ou même Windows à distance à l''aide de VNC.', 'medium', 'https://openclassrooms.com/fr/courses/1733046-prenez-le-controle-a-distance-dun-poste-linux-windows-avec-vnc', '../img/linux.png'),
  ('Bash', 'Introduction aux scripts Bash', 'Ce cours vous apprendra les bases du Bash et vous permettra de créer vos premiers scripts et connaître vos premières commandes à l''aide de différents exemples.', 'Facile', 'https://www.hostinger.fr/tutoriels/introduction-au-script-bash-avec-exemples', '../img/bash.png'),
  ('Bash', 'Programmation en Bash', 'Ce cours se retrouve sous forme de grande documentation avec de nombreuses explications vous permettant d''apprendre tout ce qui est nécessaire pour tout savoir sur le Bash !', 'Moyenne', 'https://www.iro.umontreal.ca/~lesagee/bash.html', '../img/bash.png'),
  ('Bash', 'Le cours Ultime de Bash', 'Ce cours est une playlist de nombreuses vidéos pour vous apprendre à maîtriser de A à Z toutes les compétences possibles en Bash et faire de vous un expert.', 'Toutes', 'https://www.youtube.com/playlist?list=PLZ6nfBiw_-0saWlIv5BriHNmxGT5scmmx', '../img/bash.png'),
  ('CMS', 'Qu''est-ce qu''un CMS', 'Un CMS (content management system) ou système de gestion de contenu en français, est une application logicielle qui fonctionne dans un navigateur. Cette leçon t''aidera à mieux le comprendre.', 'Facile', 'https://www.hostinger.fr/tutoriels/quest-ce-quun-cms', '../img/cms.png'),
  ('CMS', 'Guide complet du CMS', 'Les CMS sont aujourd''hui très utilisés. Ils permettent de créer des sites internet simplement avec peu ou pas de connaissances informatiques. Voici le guide complet pour les maîtriser.', 'Moyenne', 'https://www.snoweb.io/fr/cms/', '../img/cms.png'),
  ('CMS', 'Documentation Wordpress', 'Wordpress est le CMS (Système de gestion de contenu) le plus connu et le plus populaire. Il est réputé pour être open-source et libre d''accès. Grâce à la documentation, vous deviendrez un pro.', 'Toutes', 'https://fr.wordpress.org/support/', '../img/cms.png'),
  ('CMS', 'La chaîne WPBeginner', 'Sur la chaîne YouTube WPBeginner, retrouvez toutes les ressources pour maîtriser toutes les compétences nécessaires au développement d''un site Web grâce à Wordpress.', 'Toutes', 'https://www.wpbeginner.com/', '../img/cms.png'),
  ('Code', 'Apprendre le code', 'Le code est un domaine assez vaste, ici vous retrouverez un guide totalement gratuit pour vous diriger dans votre apprentissage et pour en devenir un vrai expert.', 'Facile', 'https://hostinger.fr/tutoriels/apprendre-a-coder-gratuitement', '../img/code.png'),
  ('Code', 'Initiation à la programmation', 'Un cours parfait si vous souhaitez avoir les bases en programmation et en POO avec des exemples dans différents langages tels que le C#, le Java, le Visual Basic ...', 'Facile', 'https://rmdiscala.developpez.com/cours/', '../img/code.png'),
  ('Code', 'Les Fondations', 'The Odin Project propose ici un cours plus que complet et nécessaire sur les fondations de la programmation et plus particulièrement sur le code en HTML & CSS.', 'Moyenne', 'https://www.codecademy.com/learn/learn-python-3', '../img/code.png'),
  ('Code', 'Apprendre le HTML', 'Cours simple pour vous apprendre à développez en HTML pour créer vos premiers sites web et maitrisez un langage plus que nécessaire pour un développeur.', 'Facile', 'https://www.codecademy.com/learn/learn-html', '../img/code.png'),
  ('Code', 'Apprendre le Javascript', 'Pareil que pour le HTML mais en un peu plus long, ici vous aurez un cours complet sur les bases du Javascript, un langage très utilisé et utile en programmation.', 'Facile', 'https://www.codecademy.com/learn/introduction-to-javascript', '../img/code.png'),
  ('Code', 'Apprendre le Python', 'Python est un langage qui prend de plus en plus de place dans l''environnement numérique de nos jours, de part sa simplicité, c''est donc un langage important à maîtriser.', 'Facile', 'https://www.codecademy.com/learn/learn-python-3', '../img/code.png'),
  ('Code', 'Apprendre le CSS', 'Si vous souhaitez devenir développeur front-end, le CSS est évidemment nécessaire. Une page Web avec simplement du HTML ne ressemble pas à grand chose.', 'Facile', 'https://web.dev/learn/css/', '../img/code.png'),
  ('Code', 'Apprendre le C++', 'Le C++ est un ancien langage mais qui reste très important dans le développement. Grâce à ce cours, vous obtiendrez des compétences solides en C++', 'Facile', 'https://hackr.io/tutorials/learn-c-plus-plus', '../img/code.png'),
  ('DevOps', 'Découvrir DevOps', 'Cette formation facile et rapide d''OpenClassrooms vous permettra d''apprendre les bases de la méthodologie DevOps pour améliorer vos compétences en développement.', 'Facile', 'https://openclassrooms.com/fr/courses/6093671-decouvrez-la-methodologie-devops', '../img/devops.png'),
  ('DevOps', 'DevOps avancé', 'Grâce à cette formation OpenClassrooms, vous serez capable de mettre en place l''intégration et la livraison continues avec la démarche DevOps.', 'Difficile', 'https://openclassrooms.com/fr/courses/2035736-mettez-en-place-lintegration-et-la-livraison-continues-avec-la-demarche-devops', '../img/devops.png'),
  ('DevOps', 'Les meilleures ressources', 'Ici, vous retrouverez le site le plus complet, redirigeant également sur d''autres sites avec le maximum de ressources nécessaires pour maîtriser le DevOps.', 'Toutes', 'https://geekflare.com/fr/learn-devops/#geekflare-toc-ansible-for-beginner', '../img/devops.png'),
  ('Docker', 'La documentation Docker', 'Quoi de mieux que la documentation Docker pour apprendre Docker ? Grâce à celle-ci vous trouverez tout ce qui est nécessaire au bon apprentissage de Docker.', 'Facile', 'https://docs.docker.com/fr/', '../img/docker.png'),
  ('Docker', 'Play with Docker', 'Play with Docker est une plateforme en ligne qui vous permettra d''expérimenter Docker directement en ligne de manière intuitive ce qui vous permettra de comprendre simplement.', 'Moyenne', 'https://www.snoweb.io/fr/cms/', '../img/docker.png'),
  ('Docker', 'Docker de A à Z', 'Cette formation sous forme de playlist Youtube vous expliquera comment maîtriser Docker de A à Z. Dans cete formation, vous trouverez tout ce que vous cherchez sur Docker.', 'Toutes', 'https://youtube.com/playlist?list=PLn6POgpklwWq0iz59-px2z-qjDdZKEvWd&si=lBlkigvrSo0bc3mK', '../img/docker.png'),
  ('Docker', 'Apprendre Docker', 'Ce cours complet pour débutants sur la technologie Docker vous expliquera pas à pas les différentes notions de Docker. Il est idéal pour débuter et même renforcer ses compétences.', 'Moyenne', 'https://devopssec.fr/category/apprendre-docker', '../img/docker.png'),
  ('SQL', 'Initiez-vous au SQL', 'Avec ce cours, vous apprendrez la modélisation relationnelle et la construction de requêtes SQL avec des fonctions pertinentes pour trouver les bonnes données lors de vos analyses.', 'Moyenne', 'https://openclassrooms.com/fr/courses/7818671-requetez-une-base-de-donnees-avec-sql', '../img/sql.png'),
  ('SQL', 'Implémentation en SQL', 'Ce cours vous apprendra à gérer vos bases de données relationnelles avec MySQL, vous saurez créer votre base de donnée et manipulez ses données avec des requêtes SQL.', 'Moyenne', 'https://openclassrooms.com/fr/courses/6971126-implementez-vos-bases-de-donnees-relationnelles-avec-sql', '../img/sql.png'),
  ('SQL', 'Le cours Ultime de SQL', 'Ici, vous retrouverez directement toute la documentation du langage SQL avec tous les cours disponibles pour vous apprendre à maîtriser le SQL comme un pro !', 'Toutes', 'https://sql.sh/', '../img/sql.png');


--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`email`);
  

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