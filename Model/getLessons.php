<?php
include "db_connect.php";

$theme = isset($_GET['theme']) ? $_GET['theme'] : '';

$sql = "SELECT title FROM lecons WHERE theme_name = ?";
$stmt = $connexion->prepare($sql);
$stmt->bind_param('s', $theme);
$stmt->execute();
$result = $stmt->get_result();

$lessons = [];
while ($row = $result->fetch_assoc()) {
    $lessons[] = $row;
}

header('Content-Type: application/json');
echo json_encode($lessons);

$stmt->close();
$connexion->close();
?>
