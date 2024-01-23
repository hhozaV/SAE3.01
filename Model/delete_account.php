<?php
include "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_email = $_POST['user_email'];
    $sqlScores = "DELETE FROM scores WHERE user_email = ?";
    $requeteScores = $connexion->prepare($sqlScores);
    $requeteScores->bind_param("s", $user_email);

    $sql = "DELETE FROM utilisateurs WHERE email = ?";
    $stmt = $connexion->prepare($sql);
    $stmt->bind_param("s", $user_email);

    if ($stmt->execute()) {
        echo "Compte supprimé avec succès.";
    } else {
        echo "Erreur : " . $stmt->error;
    }

    $requeteScores->execute();
    $requeteScores->close();
    $stmt->close();
    $connexion->close();
}
?>
