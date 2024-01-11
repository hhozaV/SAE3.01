<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-wdth, initial-scale=1.0">
    <title>Eduquiz</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="icon" href="img/cerveau.png" type="image/x-icon">
</head>
<body>
    <div class="logo">Eduquiz</div>
    <div class="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
    <nav class="nav-bar">
        <ul>
            <li><a href="index.php" class="nav-link">Accueil</a></li>
            <li><a href="themes.php" class="nav-link">Thèmes</a></li>
            <li><a href="lessons.php" class="nav-link">Leçons</a></li>
            <li><a href="survie.php" class="nav-link">Mode Survie</a></li>

            <?php
            // Début de la session
            session_start();

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Récupérer le chemin de la page actuelle
            var currentPage = window.location.pathname.split("/").pop();

            // Parcourir les liens de la navigation et ajouter la classe "active" au lien correspondant à la page actuelle
            $(".nav-link").each(function () {
                if ($(this).attr("href") == currentPage) {
                    $(this).addClass("active");
                }
            });
        });
    </script>
</body>

