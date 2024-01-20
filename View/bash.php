<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Eduquiz</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="../img/cerveau.png" type="image/x-icon">
</head>
<body>
    <header>
        <?php include "header.php"; ?>
    </header>

    <div class="lessons-section">
        <h1>Leçons sur le thème Bash</h1>
        <div class="lessons-container">
            <div class="lessons-items">
                <img src="../img/bash.png"/>
                <h3>Introduction aux scripts Bash</h3>
                <p>Ce cours vous apprendra les bases du Bash et vous permettra de créer vos premiers scripts et connaître vos premières commandes à l'aide de différents exemples.</p>
                <p>Difficulté : Facile</p>
                <button><a href="https://www.hostinger.fr/tutoriels/introduction-au-script-bash-avec-exemples" target="_blank">Découvrir la leçon</a></button>
            </div>
            <div class="lessons-items">
                <img src="../img/bash.png"/>
                <h3>Programmation en Bash</h3>
                <p>Ce cours se retrouve sous forme de grande documentation avec de nombreuses explications vous permettant d'apprendre tout ce qui est nécessaire pour tout savoir sur le Bash !</p>
                <p>Difficulté : Moyenne</p>
                <button><a href="https://www.iro.umontreal.ca/~lesagee/bash.html" target="_blank">Découvrir la leçon</a></button>
            </div>
            <div class="lessons-items">
                <img src="../img/bash.png"/>
                <h3>Le cours Ultime de Bash</h3>
                <p>Ce cours est une playlist de nombreuses vidéos pour vous apprendre à maîtriser de A à Z toutes les compétences possibles en Bash et faire de vous un expert.</p>
                <p>Difficulté : Toutes</p>
                <button><a href="https://www.youtube.com/playlist?list=PLZ6nfBiw_-0saWlIv5BriHNmxGT5scmmx" target="_blank">Découvrir la leçon</a></button>
            </div>
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