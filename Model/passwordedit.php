<?php 
session_start();
include "db_connect.php";

// Vérifier la connexion à la base de données
if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $motDePasseActuel = $_POST["mot_de_passe"];
    $nouveauMotDePasse = $_POST["nouveau_mot_de_passe"];

    // Vérifier les identifiants dans la base de données
    $requete = $connexion->prepare("SELECT username, password FROM utilisateurs WHERE email = ?");
    $requete->bind_param("s", $email);
    $requete->execute();
    $resultat = $requete->get_result();

    if ($resultat->num_rows > 0) {
        $utilisateur = $resultat->fetch_assoc();
        if (password_verify($motDePasseActuel, $utilisateur["password"])) {
            // Mot de passe actuel correct, mettre à jour le mot de passe
            $nouveauMotDePasseHash = password_hash($nouveauMotDePasse, PASSWORD_BCRYPT);

            $updateRequete = $connexion->prepare("UPDATE utilisateurs SET password = ? WHERE email = ?");
            $updateRequete->bind_param("ss", $nouveauMotDePasseHash, $email);
            $updateRequete->execute();
            $updateRequete->close();

            header("Location: ../View/profil.php");
            exit();
        } else {
            $erreur = "Mot de passe actuel incorrect.";
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
                <div class="form-login">
                    <span class="title">Modifier votre mot de passe</span>

                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="input-field">
                            <input type="email" name="email" placeholder="E-Mail" required>
                            <i class="uil uil-envelope icon"></i>
                        </div>
                        <div class="input-field">
                            <input type="password" name="mot_de_passe" class="password" placeholder="Mot de passe actuel" required>
                            <i class="uil uil-lock icon"></i>
                            <i class="uil uil-eye-slash showHidePw"></i>
                        </div>
                        <div class="input-field">
                            <input type="password" name="nouveau_mot_de_passe" class="password" placeholder="Nouveau mot de passe" required>
                            <i class="uil uil-lock icon"></i>
                            <i class="uil uil-eye-slash showHidePw"></i>
                        </div>

                        <?php if (isset($erreur)) : ?>
                            <div class="erreur-message"><?php echo $erreur; ?></div>
                        <?php endif; ?>

                        <div class="input-field button">
                            <input type="submit" value="Sauvegarder">
                        </div>
                    </form>

                    
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