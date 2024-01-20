<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-wdth, initial-scale=1.0">
    <title>Eduquiz</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="icon" href="../img/cerveau.png" type="image/x-icon">
</head>
<body>
    <header>
        <?php include "header.php"; ?>
    </header>

    <div class="survie-container">
        <div class="card" id="rulesCard">
            <h1>Explications</h1>
            <p>Bienvenue dans le mode Survie, un mode "libre" où vous vous battez contre le chronomètre pour avoir le meilleur score ! Un classement des meilleurs joueurs est disponible, n'hésitez pas à allez jeter un coup d'oeil pour voir à quelle place vous vous classez.</p>
            <p>Vous avez 60 secondes pour répondre à un maximum de question et donc obtenir le meilleur score puisque 1 bonne réponse = 1 point.</p>
            <p>Les questions sont de thème et de difficulté aléatoire, d'où le terme "mode libre", votre seul ennemi est le temps.</p>
            <button><a href="leaderboard.php">Voir le classement</a></button>
            
        </div>

        <div class="card" id="playCard">
            <img src="../img/survival2.svg" alt="Survie">
            <button><a href="../Controller/surviePlay.php">Jouer</a></button>
        </div>
    </div>

    <footer>
        <?php include "footer.php"; ?>
    </footer>

    <script>
        hamburger = document.querySelector(".hamburger");
        hamburger.onclick = function() {
            navBar = document.querySelector(".nav-bar");
            navBar.classList.toggle("active");
        }
    </script>

</body>
</html>