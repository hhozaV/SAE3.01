<?php
include "../Model/db_connect.php";

if ($connexion->connect_error) {
    die("Connection failed: " . $connexion->connect_error);
}

$theme = $_GET['theme'];

$sql = "SELECT * FROM lecons WHERE theme_name = ?";
$stmt = $connexion->prepare($sql);
$stmt->bind_param('s', $theme);
$stmt->execute();
$result = $stmt->get_result();

$connexion->close();
?>

<!DOCTYPE html>
<html lang="en">
<body>
    <header>
        <?php include "header.php"; ?>
    </header>

    <div class="lessons-section">
    <h1>Leçons sur le thème <?php echo $theme; ?></h1>
    <div class="lessons-container">
        <?php
        // Boucle à travers les résultats de la requête SQL et affiche les leçons
        while ($row = $result->fetch_assoc()) {
            echo '<div class="lessons-items">';
            echo '<img src="' . $row['image_url'] . '"/>';
            echo '<h3>' . $row['title'] . '</h3>';
            echo '<p>' . $row['description'] . '</p>';
            echo '<button><a href="' . $row['link'] . '" target="_blank">Découvrir la leçon</a></button>';
            echo '</div>';
        }

        // Vérifier s'il n'y a pas de leçons à afficher
        if ($result->num_rows === 0) {
            echo '<p>Aucune leçon disponible pour le thème Linux.</p>';
        }

        ?>
    </div>
</div>

    <footer>
        <?php include "footer.php"; ?>
    </footer>

    <!-- Mettez ici votre script JavaScript comme dans votre fichier principal -->
</body>
</html>


    <script>
        hamburger = document.querySelector(".hamburger");
        hamburger.onclick = function() {
            navBar = document.querySelector(".nav-bar");
            navBar.classList.toggle("active");
        }
    </script>

</body>
</html>