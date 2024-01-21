<?php
session_start();

// Rediriger l'utilisateur s'il n'est pas connecté
if (!isset($_SESSION["utilisateur_username"])) {
    header("Location: ../Model/login.php");
    exit();
}

include "../Model/db_connect.php";
include "../Model/requests.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-wdth, initial-scale=1.0">
    <title>Eduquiz</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="icon" href="../img/cerveau.png" type="image/x-icon">
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
                <li><a href="../View/index.php" class="nav-link">Accueil</a></li>
                <li><a href="../View/themes.php" class="nav-link">Thèmes</a></li>
                <li><a href="../View/lessons.php" class="nav-link">Leçons</a></li>
                <li><a href="../View/survie.php" class="nav-link">Mode Survie</a></li>

                <?php

                // Vérifier si l'utilisateur est connecté
                if (isset($_SESSION["utilisateur_username"])) {
                    // L'utilisateur est connecté
                    if (isset($_SESSION["utilisateur_role"]) && $_SESSION["utilisateur_role"] === 'admin') {
                        // L'utilisateur est un admin
                        echo '<li><a href="admin_panel.php" class="nav-link connect">Panel Admin</a></li>';
                    } else {
                        // L'utilisateur est connecté mais n'est pas admin
                        echo '<li><a href="profil.php" class="nav-link connect">Profil</a></li>';
                    }
                } else {
                    // L'utilisateur n'est pas connecté
                    echo '<li><a href="../Model/login.php" class="nav-link connect">Se connecter</a></li>';
                }
                ?>
            </ul>
        </nav>
    </header>
    <div class="mainProfil-container">
        <div class="profil-container">
            <div class="profile-card">
                <img src="../img/profil.svg" alt="Profil" class="profile-image">
                <h1>Profil de l'utilisateur</h1>
                <p>Nom d'utilisateur : <?php echo htmlspecialchars($user['username']); ?></p>
                <p>Email : <?php echo htmlspecialchars($user['email']); ?></p>
                <p>Mot de passe : ********</p>
                <p>Date d'inscription : <?php echo htmlspecialchars($user['date_inscription']); ?></p>
                <a href="../Model/passwordedit.php" class="change-password-button">Changer de MDP</a>
                <a href="index.php"">Retourner à l'accueil</a>
                <a href="../Model/logout.php">Se déconnecter</a>
                <a id="deleteAccountBtn">Supprimer mon compte</a>
            </div>
        </div>
        <div class="scores-container">
            <h2>Scores</h2>
            <?php 
            $current_theme = null;
            while ($score = $resultat_scores->fetch_assoc()):
                if ($score['theme_name'] == 'Survie') {
                    continue;
                }
                if ($score['theme_name'] != $current_theme) {
                    if ($current_theme !== null) {
                        echo '</tbody></table>';
                    }
                    echo '<h3>' . htmlspecialchars($score['theme_name']) . '</h3>';
                    echo '<table>
                            <thead>
                                <tr>
                                    <th>Difficulté</th>
                                    <th>Score</th>
                                </tr>
                            </thead>
                            <tbody>';
                    $current_theme = $score['theme_name'];
                }
            ?>
                <tr>
                    <td><?php echo htmlspecialchars($score['difficulty']); ?></td>
                    <td><?php echo htmlspecialchars($score['score']); ?></td>
                </tr>
            <?php endwhile; ?>
                </tbody>
            </table>
            <h2>Meilleur score en mode Survie</h2>
            <p><?php echo htmlspecialchars($survieBestScore); ?></p>
        </div>

        <div id="deleteConfirmPopup" class="popup-container" style="display:none;">
            <div class="popup-content">
                <h2>Êtes-vous sûr de vouloir définitivement supprimer votre compte ?</h2>
                <a id="confirmDelete">Supprimer</a>
                <a id="cancelDelete">Annuler</a>
            </div>
        </div>

    </div>

    <script>
        const deleteAccountBtn = document.getElementById('deleteAccountBtn');
        const deleteConfirmPopup = document.getElementById('deleteConfirmPopup');
        const cancelDelete = document.getElementById('cancelDelete');
        const confirmDelete = document.getElementById('confirmDelete');

        deleteAccountBtn.addEventListener('click', function() {
            deleteConfirmPopup.style.display = 'flex';
        });

        cancelDelete.addEventListener('click', function() {
            deleteConfirmPopup.style.display = 'none';
        });

        confirmDelete.addEventListener('click', function() {
            fetch('../Model/delete_account.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'user_email=' + encodeURIComponent('<?php echo $_SESSION['utilisateur_email']; ?>')
            })
            .then(response => response.text())
            .then(data => {
                console.log(data);
                window.location.href = '../Model/logout.php';
            })
            .catch(error => console.error('Error:', error));
        });
    </script>


</body>
</html>