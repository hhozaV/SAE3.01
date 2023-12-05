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
        <h1>Leçons sur le thème Docker</h1>
        <div class="lessons-container">
            <div class="lessons-items">
                <img src="img/docker.png"/>
                <h3>La documentation Docker</h3>
                <p>Quoi de mieux que la documentation Docker pour apprendre Docker ? Grâce à celle-ci vous trouverez tout ce qui est nécessaire au bon apprentissage de Docker.</p>
                <p>Difficulté : Facile</p>
                <button><a href="https://docs.docker.com/fr/" target="_blank">Découvrir la leçon</a></button>
            </div>
            <div class="lessons-items">
                <img src="img/docker.png"/>
                <h3>Play with Docker</h3>
                <p>Play with Docker est une plateforme en ligne qui vous permettra d'expérimenter Docker directement en ligne de manière intuitive ce qui vous permettra de comprendre simplement.</p>
                <p>Difficulté : Moyenne</p>
                <button><a href="https://www.snoweb.io/fr/cms/" target="_blank">Découvrir la leçon</a></button>
            </div>
            <div class="lessons-items">
                <img src="img/docker.png"/>
                <h3>Docker de A à Z</h3>
                <p>Cette formation sous forme de playlist Youtube vous expliquera comment maîtriser Docker de A à Z. Dans cete formation, vous trouverez tout ce que vous cherchez sur Docker.</p>
                <p>Difficulté : Toutes</p>
                <button><a href="https://youtube.com/playlist?list=PLn6POgpklwWq0iz59-px2z-qjDdZKEvWd&si=lBlkigvrSo0bc3mK" target="_blank">Découvrir la leçon</a></button>
            </div>
            <div class="lessons-items">
                <img src="img/docker.png"/>
                <h3>Apprendre Docker</h3>
                <p>Ce cours complet pour débutants sur la technologie Docker vous expliquera pas à pas les différentes notions de Docker. Il est idéal pour débuter et même renforcer ses compétences.</p>
                <p>Difficulté : Moyenne</p>
                <button><a href="https://devopssec.fr/category/apprendre-docker" target="_blank">Découvrir la leçon</a></button>
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