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
        <?php include "header.php"; ?>
    </header>

    <div class="lessons-section">
        <h1>Leçons sur le thème CMS</h1>
        <div class="lessons-container">
            <div class="lessons-items">
                <img src="img/cms.png"/>
                <h3>Qu'est ce qu'un CMS</h3>
                <p>Un CMS (content management system) ou système de gestion de contenu en français, est une application logicielle qui fonctionne dans un navigateur. Cette leçon t'aidera à mieux le comprendre.</p>
                <p>Difficulté : Facile</p>
                <button><a href="https://www.hostinger.fr/tutoriels/quest-ce-quun-cms" target="_blank">Découvrir la leçon</a></button>
            </div>
            <div class="lessons-items">
                <img src="img/cms.png"/>
                <h3>Guide complet du CMS</h3>
                <p>Les CMS sont aujourd'hui très utilisés. Ils permettent de créer des sites internet simplement avec peu ou pas de connaissances informatiques. Voici le guide complet pour les maîtriser.</p>
                <p>Difficulté : Moyenne</p>
                <button><a href="https://www.snoweb.io/fr/cms/" target="_blank">Découvrir la leçon</a></button>
            </div>
            <div class="lessons-items">
                <img src="img/cms.png"/>
                <h3>Documentation Wordpress</h3>
                <p>Wordpress est le CMS (Système de gestion de contenu) le plus connu et le plus populaire. Il est réputé pour être open-source et libre d'accès. Grâce à la documentation, vous deviendrez un pro.</p>
                <p>Difficulté : Toutes</p>
                <button><a href="https://fr.wordpress.org/support/" target="_blank">Découvrir la leçon</a></button>
            </div>
            <div class="lessons-items">
                <img src="img/cms.png"/>
                <h3>La chaîne WPBeginner</h3>
                <p>Sur la chaîne YouTube WPBeginner, retrouvez toutes les ressources pour maîtriser toutes les compétences nécessaires au développement d'un site Web grâce à Wordpress.</p>
                <p>Difficulté : Toutes</p>
                <button><a href="https://fr.wordpress.org/support/" target="_blank">Découvrir la leçon</a></button>
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