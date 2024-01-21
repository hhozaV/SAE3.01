<?php
session_start();

// Rediriger l'utilisateur s'il n'est pas connecté
if (isset($_SESSION["utilisateur_role"]) && $_SESSION["utilisateur_role"] !== 'admin') {
    header("Location: ../Model/index.php");
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
                        // L'utilisateur est un administrateur
                        echo '<li><a href="admin_panel.php" class="nav-link connect">Panel Admin</a></li>';
                    } else {
                        // L'utilisateur est connecté mais n'est pas un administrateur
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
                <h1>ADMIN</h1>
                <p>Nom d'utilisateur : <?php echo htmlspecialchars($user['username']); ?></p>
                <p>Email : <?php echo htmlspecialchars($user['email']); ?></p>
                <p>Mot de passe : ********</p>
                <a href="../Model/passwordedit.php" class="change-password-button">Changer de MDP</a>
                <a href="index.php"">Retourner à l'accueil</a>
                <a href="../Model/logout.php">Se déconnecter</a>
            </div>
        </div>
        <div class="add-lesson-container">
        <h1>Ajouter une nouvelle leçon</h1>
        <form action="../Model/submit_lesson.php" method="POST">
            <div class="form-group">
                <label for="theme_name">Thème de la leçon :</label>
                <select name="theme_name" id="theme_name" required>
                    <option value="Linux">Linux</option>
                    <option value="SQL">SQL</option>
                    <option value="Code">Code</option>
                    <option value="CMS">CMS</option>
                    <option value="Docker">Docker</option>
                    <option value="DevOps">DevOps</option>
                    <option value="Bash">Bash</option>
                </select>
            </div>

            <div class="form-group">
                <label for="title">Titre de la leçon :</label>
                <input type="text" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="description">Description de la leçon :</label>
                <textarea id="description" name="description" required></textarea>
            </div>

            <div class="form-group">
                <label for="difficulty">Difficulté de la leçon :</label>
                <select name="difficulty" id="difficulty" required>
                    <option value="easy">Facile</option>
                    <option value="medium">Moyen</option>
                    <option value="hard">Difficile</option>
                </select>
            </div>

            <div class="form-group">
                <label for="link">Lien de la leçon :</label>
                <input type="url" id="link" name="link" required>
            </div>

            <button type="submit">Ajouter la leçon</button>
        </form>
    </div>

    <div class="delete-lesson-container">
        <h1>Supprimer une leçon</h1>
        <form id="deleteLessonForm" action="../Model/delete_lesson.php" method="POST">
            <div class="form-group">
                <label for="theme_name">Sélectionnez le thème :</label>
                <select name="theme_name" id="theme_name" required onchange="fetchLessons(this.value);">
                    <option value="">Sélectionnez un thème</option>
                    <option value="Linux">Linux</option>
                    <option value="SQL">SQL</option>
                    <option value="Code">Code</option>
                    <option value="CMS">CMS</option>
                    <option value="Docker">Docker</option>
                    <option value="DevOps">DevOps</option>
                    <option value="Bash">Bash</option>
                </select>
            </div>

            <div class="form-group" id="lessonsContainer" style="display:none;">
                <label for="lesson_title">Sélectionnez la leçon :</label>
                <select name="lesson_title" id="lesson_title" required>

                </select>
            </div>

            <button type="submit">Supprimer la leçon</button>
        </form>
    </div>

    </div>

    <script>
        function fetchLessons(themeName) {
            if (themeName.length == 0) {
                document.getElementById("lessonsContainer").style.display = "none";
                return;
            }

            fetch('../Model/getLessons.php?theme=' + themeName)
                .then(response => response.json())
                .then(data => {
                    const select = document.getElementById("lesson_title");
                    select.innerHTML = data.map(lesson => `<option value="${lesson.title}">${lesson.title}</option>`).join('');
                    document.getElementById("lessonsContainer").style.display = "block";
                })
                .catch(error => console.error('Error:', error));
        }
    </script>

</body>
</html>