<?php
include "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $theme_name = $_POST["theme_name"];
    $lesson_title = $_POST["lesson_title"];

    $sql = "DELETE FROM lecons WHERE theme_name = ? AND title = ?";
    $stmt = $connexion->prepare($sql);
    $stmt->bind_param("ss", $theme_name, $lesson_title);

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
