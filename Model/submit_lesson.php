<?php
include "db_connect.php";

// Vérifiez si l'utilisateur est un admin
session_start();
if (!isset($_SESSION["utilisateur_username"]) || $_SESSION["utilisateur_role"] !== 'admin') {
    // Redirigez l'utilisateur vers la page d'acceuil s'il n'est admin
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $theme_name = $_POST["theme_name"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $difficulty = $_POST["difficulty"];
    $link = $_POST["link"];
    $image_url = '../img/' . strtolower($theme_name) . '.png';

    $sql = "INSERT INTO lecons (theme_name, title, description, difficulty, link, image_url) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $connexion->prepare($sql);
    $stmt->bind_param("ssssss", $theme_name, $title, $description, $difficulty, $link, $image_url);

    if ($stmt->execute()) {
        header("Location: ../View/admin_panel.php");
        exit();
    } else {
        echo "Erreur : " . $stmt->error;
    }

    $stmt->close();
    $connexion->close();
}
?>
