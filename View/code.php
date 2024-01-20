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
        <h1>Leçons sur le thème Code</h1>
        <div class="lessons-container">
            <div class="lessons-items">
                <img src="../img/code.png"/>
                <h3>Apprendre le code</h3>
                <p>Le code est un domaine assez vaste, ici vous retrouverez un guide totalement gratuit pour vous diriger dans votre apprentissage et pour en devenir un vrai expert.</p>
                <p>Difficulté : Facile</p>
                <button><a href="https://hostinger.fr/tutoriels/apprendre-a-coder-gratuitement" target="_blank">Découvrir la leçon</a></button>
            </div>
            <div class="lessons-items">
                <img src="../img/code.png"/>
                <h3>Initiation à la programmation</h3>
                <p>Un cours parfait si vous souhaitez avoir les bases en programmation et en POO avec des exemples dans différents langages tels que le C#, le Java, le Visual Basic ...</p>
                <p>Difficulté : Facile</p>
                <button><a href="https://rmdiscala.developpez.com/cours/" target="_blank">Découvrir la leçon</a></button>
            </div>
            <div class="lessons-items">
                <img src="../img/code.png"/>
                <h3>Les Fondations</h3>
                <p>The Odin Project propose ici un cours plus que complet et nécessaire sur les fondations de la programmation et plus particulièrement sur le code en HTML & CSS.</p>
                <p>Difficulté : Moyenne</p>
                <button><a href="https://www.codecademy.com/learn/learn-python-3" target="_blank">Découvrir la leçon</a></button>
            </div>
            <div class="lessons-items">
                <img src="../img/code.png"/>
                <h3>Apprendre le HTML</h3>
                <p>Cours simple pour vous apprendre à développez en HTML pour créer vos premiers sites web et maitrisez un langage plus que nécessaire pour un développeur.</p>
                <p>Difficulté : Facile</p>
                <button><a href="https://www.codecademy.com/learn/learn-html" target="_blank">Découvrir la leçon</a></button>
            </div>
            <div class="lessons-items">
                <img src="../img/code.png"/>
                <h3>Apprendre le Javascript</h3>
                <p>Pareil que pour le HTML mais en un peu plus long, ici vous aurez un cours complet sur les bases du Javascript, un langage très utilisé et utile en programmation.</p>
                <p>Difficulté : Facile</p>
                <button><a href="https://www.codecademy.com/learn/introduction-to-javascript" target="_blank">Découvrir la leçon</a></button>
            </div>
            <div class="lessons-items">
                <img src="../img/code.png"/>
                <h3>Apprendre le Python</h3>
                <p>Python est un langage qui prend de plus en plus de place dans l'environnement numérique de nos jours, de part sa simplicité, c'est donc un langage important à maîtriser.</p>
                <p>Difficulté : Facile</p>
                <button><a href="https://www.codecademy.com/learn/learn-python-3" target="_blank">Découvrir la leçon</a></button>
            </div>
            <div class="lessons-items">
                <img src="../img/code.png"/>
                <h3>Apprendre le CSS</h3>
                <p>Si vous souhaitez devenir développeur front-end, le CSS est évidemment nécessaire. Une page Web avec simplement du HTML ne ressemble pas à grand chose.</p>
                <p>Difficulté : Facile</p>
                <button><a href="https://web.dev/learn/css/" target="_blank">Découvrir la leçon</a></button>
            </div>
            <div class="lessons-items">
                <img src="../img/code.png"/>
                <h3>Apprendre le C++</h3>
                <p>Le C++ est un ancien langage mais qui reste très important dans le développement. Grâce à ce cours, vous obtiendrez des compétences solides en C++</p>
                <p>Difficulté : Facile</p>
                <button><a href="https://hackr.io/tutorials/learn-c-plus-plus" target="_blank">Découvrir la leçon</a></button>
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