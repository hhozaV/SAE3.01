<?php 
// Connexion à la base de données (remplacez ces informations par les vôtres)
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$nom_base_de_donnees = "bddquiz";

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $nom_base_de_donnees);