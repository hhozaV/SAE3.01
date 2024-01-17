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

    <!-- Première section -->
    <div class="main">
        <div class="main_container">
            <div class="main_content">
                <h2>Le meilleur moyen d'apprendre facilement et efficacement</h2>
                <P>Eduquiz te permet d’apprendre sur différents thèmes informatiques de manière simple et ludique. Si tu veux t'améliorer en informatique, tu es au bon endroit.</p>
                <button class="main_btn"><a href="themes.php">Je découvre les quizz</a></button>
            </div>
            <img src="../img/firstImg.png" alt="firstImage" id="main_img">
        </div>
    </div>

    <!-- Deuxième section -->
    <div class="main">
        <div class="main_container">
            <div class="main_content">
                <h2>Les leçons</h2>
                <P>Nous proposons aussi des leçons adaptées à tout les niveaux, de débutant à joueur expérimenté pour tout les thèmes disponibles sur notre site. N’hésite pas à venir en apprendre un peu plus sur chaque thème pour être meilleur aux quizz.</p>
                <button class="main_btn"><a href="lessons.php">Les leçons</a></button>
            </div>
            <img src="../img/lessons.png" alt="secondImage" id="main_img">
        </div>
    </div>

    <!-- Troisième section -->
    <div class="main">
        <div class="main_container">
            <div class="main_content">
                <h2>Découvre le mode survie</h2>
                <P>Grâce à ce mode de jeu, tu pourras tester tes compétences et te comparer
                    aux autres grâce au classement du mode. Ici, le but est simple, répondre à
                    des questions sur les différents thèmes le plus rapidement possible</p>
                <button class="main_btn"><a href="survie.php">Mode survie</a></button>
            </div>
            <img src="../img/survie.png" alt="thirdImage" id="main_img">
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