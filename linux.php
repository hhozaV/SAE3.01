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
        <h1>Leçons sur le thème Linux</h1>
        <div class="lessons-container">
            <div class="lessons-items">
                <img src="img/linux.png"/>
                <h3>Initiez-vous à Linux</h3>
                <p>Cours adapté aux débutants pour découvrir le système Linux, un système d'exploitation gratuit et fascinant qui vous donnera un contrôle sans précédent sur votre ordinateur !</p>
                <p>Difficulté : Facile</p>
                <button><a href="https://openclassrooms.com/fr/courses/7170491-initiez-vous-a-linux" target="_blank">Découvrir la leçon</a></button>
            </div>
            <div class="lessons-items">
                <img src="img/linux.png"/>
                <h3>Administrez un système Linux</h3>
                <p>Cours parfait pour s'initier à l'administration d'un serveur Linux, vous apprendrez à utiliser le terminal, le shell, manipulez des fichiers, configurez un réseau et surveiller l'activité du système.</p>
                <p>Difficulté : Moyenne</p>
                <button><a href="https://openclassrooms.com/fr/courses/7274161-administrez-un-systeme-linux" target="_blank">Découvrir la leçon</a></button>
            </div>
            <div class="lessons-items">
                <img src="img/linux.png"/>
                <h3>Gérer un serveur Linux</h3>
                <p>Dans ce cours, vous apprendrez à renforcer les services de votre serveur Linux. Installez et gérez un annuaire LDAP, configurez un serveur LAMP et utilisez Tomcat & Jenkins et Nginx.</p>
                <p>Difficulté : Moyenne</p>
                <button><a href="https://openclassrooms.com/fr/courses/1733551-gerez-votre-serveur-linux-et-ses-services" target="_blank">Découvrir la leçon</a></button>
            </div>
            <div class="lessons-items">
                <img src="img/linux.png"/>
                <h3>Montez un serveur de fichier</h3>
                <p>Cours parfait pour ceux qui maîtrisent déjà Linux et ses lignes de commandes. Ce cours vous apprendra à maîtriser l'installation et la gestion de serveur Linux.</p>
                <p>Difficulté : Moyenne</p>
                <button><a href="https://openclassrooms.com/fr/courses/2356316-montez-un-serveur-de-fichiers-sous-linux" target="_blank">Découvrir la leçon</a></button>
            </div>
            <div class="lessons-items">
                <img src="img/linux.png"/>
                <h3>Contrôle d'un poste à distance</h3>
                <p>Cours pour tout les passionnés ou pour les techniciens informatiques qui auraient besoin de prendre le contrôle d'un ordinateur Linux ou même Windows à distance à l'aide de VNC.</p>
                <p>Difficulté : Moyenne</p>
                <button><a href="https://openclassrooms.com/fr/courses/1733046-prenez-le-controle-a-distance-dun-poste-linux-windows-avec-vnc" target="_blank">Découvrir la leçon</a></button>
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