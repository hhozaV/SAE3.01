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
        <h1>Leçons sur le thème DevOps</h1>
        <div class="lessons-container">
            <div class="lessons-items">
                <img src="../img/devops.png"/>
                <h3>Découvrir DevOps</h3>
                <p>Cette formation facile et rapide d'OpenClassrooms vous permettra d'apprendre les bases de la méthodologie DevOps pour améliorer vos compétences en développement.</p>
                <p>Difficulté : Facile</p>
                <button><a href="https://openclassrooms.com/fr/courses/6093671-decouvrez-la-methodologie-devops" target="_blank">Découvrir la leçon</a></button>
            </div>
            <div class="lessons-items">
                <img src="../img/devops.png"/>
                <h3>DevOps avancé</h3>
                <p>Grâce à cette formation OpenClassrooms, vous serez capable de mettre en place l'intégration et la livraison continues avec la démarche DevOps.</p>
                <p>Difficulté : Difficile</p>
                <button><a href="https://openclassrooms.com/fr/courses/2035736-mettez-en-place-lintegration-et-la-livraison-continues-avec-la-demarche-devops" target="_blank">Découvrir la leçon</a></button>
            </div>
            <div class="lessons-items">
                <img src="../img/devops.png"/>
                <h3>Les meilleures ressources</h3>
                <p>Ici, vous retrouverez le site le plus complet, redirigeant également sur d'autres sites avec le maximum de ressources nécessaires pour maîtriser le DevOps.</p>
                <p>Difficulté : Toutes</p>
                <button><a href="https://geekflare.com/fr/learn-devops/#geekflare-toc-ansible-for-beginner" target="_blank">Découvrir la leçon</a></button>
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