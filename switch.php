<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-wdth, initial-scale=1.0">
    <title>Eduquiz</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/qcm.css">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="icon" href="img/cerveau.png" type="image/x-icon">
</head>

<body>
    <div id="switch-container">
        <h1 id="result">Résultat</h1>
        <button id="next-question">Question suivante</button>
        <button id="too-easy">Trop facile</button>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="switch.js"></script>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const resultElement = document.getElementById("result");
            const nextQuestionButton = document.getElementById("next-question");
            const tooEasyButton = document.getElementById("too-easy");

            // Récupérer le résultat depuis le stockage local
            const isCorrect = localStorage.getItem("isCorrect") === "true";

            // Afficher le résultat
            if (isCorrect) {
                resultElement.textContent = "Bonne réponse !";
            } else {
                resultElement.textContent = "Mauvaise réponse. Révise la leçon !";
            }

            // Gérer le clic sur le bouton "Question suivante"
            nextQuestionButton.addEventListener("click", function () {
                // Rediriger vers la page qcm.html
                window.location.href = "qcm.php";
            });

            // Gérer le clic sur le bouton "Trop facile"
            tooEasyButton.addEventListener("click", function () {
                // Rediriger vers la page theme.html
                window.location.href = "theme.php";
            });

            // Effacer la clé du résultat du stockage local
            localStorage.removeItem("isCorrect");
            });
    </script>
</body>

</html>