<?php
session_start();

// Connexion à la base de données (remplacez ces informations par les vôtres)
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "root";
$nom_base_de_donnees = "bddquiz";
$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $nom_base_de_donnees);

if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

if (isset($_SESSION['email']) && isset($_POST['theme']) && isset($_POST['difficulty'])) {
    $userEmail = $_SESSION['email'];
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
