<?php 
session_start();
// Connexion à la base de données (remplacez ces informations par les vôtres)
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "root";
$nom_base_de_donnees = "bddquiz";

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $nom_base_de_donnees);

// Vérifier la connexion à la base de données
if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $motDePasse = $_POST["mot_de_passe"];

    // Vérifier les identifiants dans la base de données
    $requete = $connexion->prepare("SELECT username, password FROM utilisateurs WHERE email = ?");
    $requete->bind_param("s", $email);
    $requete->execute();
    $resultat = $requete->get_result();

    if ($resultat->num_rows > 0) {
        $utilisateur = $resultat->fetch_assoc();
        if (password_verify($motDePasse, $utilisateur["password"])) {
            // Identifiants corrects, rediriger vers index.php
            session_start();
            $_SESSION["utilisateur_username"] = $utilisateur["username"];
            header("Location: index.php");
            exit();
        } else {
            $erreur = "Mot de passe incorrect.";
        }
    } else {
        $erreur = "Adresse e-mail non enregistrée. Veuillez-vous inscrire";
    }

    $requete->close();
}

$connexion->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-wdth, initial-scale=1.0">
    <title>Eduquiz</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="icon" href="img/cerveau.png" type="image/x-icon">
</head>
<body>

<div class="form-body">
        <div class="form-container">
            <div class="forms">
                <!-- Login Page -->
                <div class="form login">
                    <span class="title">Se connecter</span>

                    <!-- Formulaire de connexion -->
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="input-field">
                            <input type="email" name="email" placeholder="E-Mail" required>
                            <i class="uil uil-envelope icon"></i>
                        </div>
                        <div class="input-field">
                            <input type="password" name="mot_de_passe" class="password" placeholder="Mot de passe" required>
                            <i class="uil uil-lock icon"></i>
                            <i class="uil uil-eye-slash showHidePw"></i>
                        </div>

                        <div class="input-field button">
                            <input type="submit" value="Se connecter">
                        </div>
                    </form>

                    <!-- Affichage du message d'erreur -->
                    <?php if (isset($erreur)) : ?>
                        <div class="erreur-message"><?php echo $erreur; ?></div>
                    <?php endif; ?>

                    <div class="login-signup">
                        <span class="text">Pas encore inscrit ?<a href="register.php" class="text signup-text">S'inscrire</a></span>
                    </div>
                    <div class="login-signup">
                        <span class="text"><a href="index.php" class="text signup-text">Retournez à l'acceuil</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Balise script pour votre code JavaScript -->
    <script>
        hamburger = document.querySelector(".hamburger");
        hamburger.onclick = function() {
            navBar = document.querySelector(".nav-bar");
            navBar.classList.toggle("active");
        }
    </script>
</body>
</html>