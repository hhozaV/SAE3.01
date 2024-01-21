<?php
session_start();
include "db_connect.php";

// Vérifier la connexion à la base de données
if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomUtilisateur = $_POST["nom_utilisateur"];
    $email = $_POST["email"];
    $motDePasse = $_POST["mot_de_passe"];
    $role = "user";

    // Vérifier les conditions pour le mot de passe
    if (strlen($motDePasse) < 8 || !preg_match("/[A-Z]/", $motDePasse) || !preg_match("/[0-9]/", $motDePasse) || !preg_match("/[^a-zA-Z0-9]/", $motDePasse)) {
        $erreur = "Le mot de passe doit avoir au moins 8 caractères avec au moins une majuscule, un chiffre et un caractère spécial.";
    } else {
        // Permet de hasher le MDP
        $motDePasseHash = password_hash($motDePasse, PASSWORD_DEFAULT);

        $requete = $connexion->prepare("INSERT INTO utilisateurs (username, password, email) VALUES (?, ?, ?)");
        $requete->bind_param("sss", $nomUtilisateur, $motDePasseHash, $email);

        if ($requete->execute()) {
            // Inscription réussie
            $_SESSION["utilisateur_username"] = $nomUtilisateur;
            $_SESSION['utilisateur_email'] = $email;
            $_SESSION['utilisateur_role'] = $role;
            header("Location: ../View/index.php");
            exit();
        } else {
            $erreur = "Erreur lors de l'inscription : Email déjà utilisé. ";
        }

        $requete->close();
    }
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
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="icon" href="../img/cerveau.png" type="image/x-icon">
</head>
<body>

<div class="form-body">
        <div class="form-container">
            <div class="forms">
                <!-- Register Page -->
                <div class="form-login">
                    <span class="title">Créer un Compte</span>

                    <!-- Formulaire d'inscription -->
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="input-field">
                            <input type="text" name="nom_utilisateur" placeholder="Nom" required>
                            <i class="uil uil-user"></i>
                        </div>
                        <div class="input-field">
                            <input type="email" name="email" placeholder="E-Mail" required>
                            <i class="uil uil-envelope icon"></i>
                        </div>
                        <div class="input-field">
                            <input type="password" name="mot_de_passe" class="password" placeholder="Mot de passe" required>
                            <i class="uil uil-lock icon"></i>
                            <i class="uil uil-eye-slash showHidePw"></i>
                        </div>

                        <!-- Affichage du message d'erreur -->
                        <?php if (isset($erreur)) : ?>
                            <div class="erreur-message"><?php echo $erreur; ?></div>
                        <?php endif; ?>

                        <div class="input-field button">
                            <input type="submit" value="S'inscrire">
                        </div>
                    </form>

                    <div class="login-signup">
                        <span class="text">Déjà un compte ? <a href="login.php" class="text signup-text">Se connecter</a></span>
                    </div>
                    <div class="login-signup">
                        <span class="text"><a href="../View/index.php" class="text signup-text">Retournez à l'acceuil</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../script.js"></script>
    <script>
        hamburger = document.querySelector(".hamburger");
        hamburger.onclick = function() {
            navBar = document.querySelector(".nav-bar");
            navBar.classList.toggle("active");
        }
    </script>
</body>
</html>
