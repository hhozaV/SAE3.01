<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Eduquiz</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="img/cerveau.png" type="image/x-icon">
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
                <li><a href="index.php">Accueil</a></li>
                <li><a href="themes.php">Thèmes</a></li>
                <li><a href="lessons.php">Leçons</a></li>
                <li><a href="survie.php">Mode Survie</a></li>
                <li><a href="login.php" class="connect">Se connecter</a></li>
            </ul>
        </nav>
    </header>

    <div class="lessons-section">
        <h1>Leçons sur le thème SQL</h1>
        <div class="lessons-container">
            <div class="lessons-items">
                <img src="img/sql.png"/>
                <h3>Initiez-vous au SQL</h3>
                <p>Avec ce cours, vous apprendrez la modélisation relationnelle et la construction de requêtes SQL avec des fonctions pertinentes pour trouver les bonnes données lors de vos analyses.</p>
                <p>Difficulté : Moyenne</p>
                <button><a href="https://openclassrooms.com/fr/courses/7818671-requetez-une-base-de-donnees-avec-sql" target="_blank">Découvrir la leçon</a></button>
            </div>
            <div class="lessons-items">
                <img src="img/sql.png"/>
                <h3>Implémentation en SQL</h3>
                <p>Ce cours vous apprendra à gérer vos bases de données relationnelles avec MySQL, vous saurez créer votre base de donnée et manipulez ses données avec des requêtes SQL.</p>
                <p>Difficulté : Moyenne</p>
                <button><a href="https://openclassrooms.com/fr/courses/6971126-implementez-vos-bases-de-donnees-relationnelles-avec-sql" target="_blank">Découvrir la leçon</a></button>
            </div>
            <div class="lessons-items">
                <img src="img/sql.png"/>
                <h3>Le cours Ultime de SQL</h3>
                <p>Ici, vous retrouverez directement toute la doucmentation du langage SQL avec tout les cours disponibles pour vous apprendre à maîtriser le SQL comme un pro !</p>
                <p>Difficulté : Toutes</p>
                <button><a href="https://sql.sh/" target="_blank">Découvrir la leçon</a></button>
            </div>
        </div>
    </div>

    <script>
        hamburger = document.querySelector(".hamburger");
        hamburger.onclick = function() {
            navBar = document.querySelector(".nav-bar");
            navBar.classList.toggle("active");
        }
    </script>

</body>
</html>