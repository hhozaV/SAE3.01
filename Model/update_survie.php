<?php
session_start();
include "db_connect.php";

if (isset($_SESSION['utilisateur_email']) && isset($_POST['score'])) {
    $email = $_SESSION['utilisateur_email'];
    $currentScore = intval($_POST['score']);

    // Récupérer le meilleur score actuel de l'utilisateur pour le mode Survie
    $requete = $connexion->prepare("SELECT survieBestScore FROM scores WHERE user_email = ? AND theme_name = 'Survie'");
    $requete->bind_param("s", $email);
    $requete->execute();
    $resultat = $requete->get_result();
    if ($row = $resultat->fetch_assoc()) {
        $bestScore = $row['survieBestScore'];
        if ($currentScore > $bestScore) {
            // Mettre à jour le meilleur score
            $updateRequete = $connexion->prepare("UPDATE scores SET survieBestScore = ? WHERE user_email = ? AND theme_name = 'Survie'");
            $updateRequete->bind_param("is", $currentScore, $email);
            $updateRequete->execute();
            $updateRequete->close();
            echo "Meilleur score mis à jour!";
        } else {
            echo "Le score actuel n'est pas supérieur au meilleur score.";
        }
    } else {
        // Si aucun score n'existe pour le mode Survie, créez-en un
        $insertRequete = $connexion->prepare("INSERT INTO scores (user_email, theme_name, survieBestScore) VALUES (?, 'Survie', ?)");
        $insertRequete->bind_param("si", $email, $currentScore);
        $insertRequete->execute();
        $insertRequete->close();
        echo "Score pour le mode Survie créé et enregistré!";
    }
    $requete->close();
}
$connexion->close();
?>
