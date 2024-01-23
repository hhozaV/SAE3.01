<?php
session_start();
include "db_connect.php";

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $nom_base_de_donnees);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

// Récupérer les informations de l'utilisateur
$username = $_SESSION["utilisateur_username"];
$requete = $connexion->prepare("SELECT username, email, role, date_inscription FROM utilisateurs WHERE username = ?");
$requete->bind_param("s", $username);
$requete->execute();
$resultat = $requete->get_result();
$user = $resultat->fetch_assoc();

// Récupérer les scores de l'utilisateur
$email = $_SESSION['utilisateur_email'];
$requete_scores = $connexion->prepare("SELECT theme_name, difficulty, score FROM scores WHERE user_email = ? ORDER BY theme_name, difficulty");
$requete_scores->bind_param("s", $email);
$requete_scores->execute();
$resultat_scores = $requete_scores->get_result();

// Récupérer le meilleur score en mode Survie de l'utilisateur
$requete_survieBestScore = $connexion->prepare("SELECT survieBestScore FROM scores WHERE user_email = ? AND theme_name = 'Survie'");
$requete_survieBestScore->bind_param("s", $email);
$requete_survieBestScore->execute();
$resultat_survieBestScore = $requete_survieBestScore->get_result();
$survieBestScore = 0;
if ($row = $resultat_survieBestScore->fetch_assoc()) {
    $survieBestScore = $row['survieBestScore'];
}
$requete_survieBestScore->close();

$requete_leaderboard = $connexion->prepare("SELECT u.username, s.survieBestScore FROM utilisateurs u INNER JOIN scores s ON u.email = s.user_email WHERE s.theme_name = 'Survie' ORDER BY s.survieBestScore DESC");
$requete_leaderboard->execute();
$resultat_leaderboard = $requete_leaderboard->get_result();

$requete->close();
$connexion->close();