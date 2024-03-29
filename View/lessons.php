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
        <h1>Nos leçons</h1>
        <div class="lessons-container">
            <div class="lessons-items">
                <img src="../img/linux.png"/>
                <h3>Linux</h3>
                <p>Linux ou GNU/Linux — plus rarement GNU+Linux — est une famille de systèmes d'exploitation open source de type Unix fondés sur le noyau Linux créé en 1991 par Linus Torvalds. De nombreuses distributions Linux ont depuis vu le jour.</p>
                <button><a href="lessons_link.php?theme=Linux">Leçons</a></button>
            </div>
            <div class="lessons-items">
                <img src="../img/sql.png"/>
                <h3>SQL</h3>
                <p>SQL est un langage informatique normalisé servant à exploiter des bases de données relationnelles. La partie langage de manipulation des données de SQL permet de rechercher, d'ajouter, de modifier ou de supprimer des données dans les bases de données relationnelles.</p>
                <button><a href="lessons_link.php?theme=SQL">Leçons</a></button>
            </div>
            <div class="lessons-items">
                <img src="../img/code.png"/>
                <h3>Code</h3>
                <p>Le codage en informatique est le processus de création de programmes informatiques, également appelés codes sources, qui permettent à un ordinateur de réaliser des tâches précises. Le codage consiste à écrire du code en utilisant un langage de programmation.</p>
                <button><a href="lessons_link.php?theme=Code">Leçons</a></button>
            </div>
            <div class="lessons-items">
                <img src="../img/cms.png"/>
                <h3>CMS</h3>
                <p>CMS est l'acronyme de Content Management System, c'est-à-dire système de gestion de contenu. Il s'agit d'un logiciel en ligne grâce auquel il est possible de créer, de gérer et de modifier facilement un site web, sans connaissances en langage informatique.</p>
                <button><a href="lessons_link.php?theme=CMS">Leçons</a></button>
            </div>
            <div class="lessons-items">
                <img src="../img/docker.png"/>
                <h3>Docker</h3>
                <p>Docker est une plateforme logicielle qui permet de créer, déployer et exécuter des applications dans des conteneurs légers et portables. Ces conteneurs encapsulent tout le nécessaire pour que l'application fonctionne, simplifiant ainsi le déploiement.</p>
                <button><a href="lessons_link.php?theme=Docker">Leçons</a></button>
            </div>
            <div class="lessons-items">
                <img src="../img/devops.png"/>
                <h3>DevOps</h3>
                <p>Le devops est un mouvement en ingénierie informatique et une pratique technique visant à l'unification du développement logiciel et de l'administration des infrastructures informatiques, notamment l'administration système.</p>
                <button><a href="lessons_link.php?theme=DevOps">Leçons</a></button>
            </div>
            <div class="lessons-items">
                <img src="../img/bash.png"/>
                <h3>Bash</h3>
                <p>Bash est un interpréteur de commande (shell) compatible sh qui exécute les commandes lues depuis l'entrée standard, ou depuis un fichier. Bash incorpore également des fonctionnalités provenant des interpréteurs Korn et C-shell (ksh et csh).</p>
                <button><a href="lessons_link.php?theme=Bash">Leçons</a></button>
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