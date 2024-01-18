<?php
session_start();

// Rediriger l'utilisateur s'il n'est pas connecté
if (!isset($_SESSION["utilisateur_username"])) {
    header("Location: login.php");
    exit();
}

include "db_connect.php";

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $nom_base_de_donnees);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

// Récupérer les informations de l'utilisateur
$username = $_SESSION["utilisateur_username"];
$requete = $connexion->prepare("SELECT username, email, date_inscription FROM utilisateurs WHERE username = ?");
$requete->bind_param("s", $username);
$requete->execute();
$resultat = $requete->get_result();
$user = $resultat->fetch_assoc();

$requete->close();
$connexion->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-wdth, initial-scale=1.0">
    <title>Eduquiz</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="icon" href="../img/cerveau.png" type="image/x-icon">
</head>
<body>
    <header>
        <div class="logo">Eduquiz</div>
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <nav class="nav-bar">
            <ul>
                <li><a href="../View/index.php" class="nav-link">Accueil</a></li>
                <li><a href="../View/themes.php" class="nav-link">Thèmes</a></li>
                <li><a href="../View/lessons.php" class="nav-link">Leçons</a></li>
                <li><a href="../View/survie.php" class="nav-link">Mode Survie</a></li>

                <?php

                // Vérifier si l'utilisateur est connecté
                if (isset($_SESSION["utilisateur_username"])) {
                    // Afficher le bouton Profil si l'utilisateur est connecté
                    echo '<li><a href="profil.php" class="nav-link connect">Profil</a></li>';
                } else {
                    // Afficher le bouton Se Connecter si l'utilisateur n'est pas connecté
                    echo '<li><a href="login.php" class="nav-link connect">Se connecter</a></li>';
                }
                ?>
            </ul>
        </nav>
    </header>
    <div class="profil-container">
        <div class="profile-card">
            <img src="../img/profil.svg" alt="Profil" class="profile-image">
            <h1>Profil de l'utilisateur</h1>
            <p>Nom d'utilisateur : <?php echo htmlspecialchars($user['username']); ?></p>
            <p>Email : <?php echo htmlspecialchars($user['email']); ?></p>
            <p>Mot de passe : ********</p>
            <p>Date d'inscription : <?php echo htmlspecialchars($user['date_inscription']); ?></p>
            <a href="passwordedit.php" class="change-password-button">Changer de MDP</a>
            <a href="../View/index.php"">Retourner à l'accueil</a>
            <a href="logout.php">Se déconnecter</a>
        </div>
    </div>
</body>
</html>
