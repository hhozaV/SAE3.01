<?php
session_start();

include "db_connect.php";

if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

if (!isset($_SESSION['utilisateur_email'])) {
    echo "Email session not set";
}
if (!isset($_POST['theme'])) {
    echo "Theme POST not set";
}
if (!isset($_POST['difficulty'])) {
    echo "Difficulty POST not set";
}


if (isset($_SESSION['utilisateur_email']) && isset($_POST['theme']) && isset($_POST['difficulty'])) {
    $userEmail = $_SESSION['utilisateur_email'];
    $theme = $_POST['theme'];
    $difficulty = $_POST['difficulty'];

    $query = "SELECT * FROM scores WHERE user_email = ? AND theme_name = ? AND difficulty = ?";
    $stmt = $connexion->prepare($query);
    $stmt->bind_param("sss", $userEmail, $theme, $difficulty);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $updateQuery = "UPDATE scores SET score = score + 1 WHERE user_email = ? AND theme_name = ? AND difficulty = ?";
        $updateStmt = $connexion->prepare($updateQuery);
        $updateStmt->bind_param("sss", $userEmail, $theme, $difficulty);
        $updateStmt->execute();
        $updateStmt->close();
    } else {
        $insertQuery = "INSERT INTO scores (user_email, theme_name, difficulty, score) VALUES (?, ?, ?, 1)";
        $insertStmt = $connexion->prepare($insertQuery);
        $insertStmt->bind_param("sss", $userEmail, $theme, $difficulty);
        $insertStmt->execute();
        $insertStmt->close();
    }
    
    $stmt->close();
    echo "Score updated successfully.";
} else {
    echo "Required data not set in update_score.php";
}

$connexion->close();
?>