<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-wdth, initial-scale=1.0">
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
                <li><a href="survie.php" class="active">Mode Survie</a></li>
                <li><a href="login.php" class="connect">Se connecter</a></li>
            </ul>
        </nav>
    </header>


    <div class="container">
        <img class="warning "src="img/warning.svg" alt="Warning"/>
        <h1 class="survie">Disponible prochainement</h1>
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