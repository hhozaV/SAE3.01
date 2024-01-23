<?php
session_start();
include "../Model/db_connect.php";

$requete_leaderboard = $connexion->prepare("SELECT u.username, s.survieBestScore FROM utilisateurs u INNER JOIN scores s ON u.email = s.user_email WHERE s.theme_name = 'Survie' ORDER BY s.survieBestScore DESC");
$requete_leaderboard->execute();
$resultat_leaderboard = $requete_leaderboard->get_result();
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
    <header>
        <?php include "header.php"; ?>
    </header>

    <div class="leaderboard-container">
        <h1>Classement - Mode Survie</h1>
        <table>
            <thead>
                <tr>
                    <th>Position</th>
                    <th>Nom d'utilisateur</th>
                    <th>Meilleur score</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $position = 1;
                while ($row = $resultat_leaderboard->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $position; ?></td>
                        <td><?php echo htmlspecialchars($row['username']); ?></td>
                        <td><?php echo htmlspecialchars($row['survieBestScore']); ?></td>
                    </tr>
                    <?php
                    $position++;
                endwhile;
                ?>
            </tbody>
        </table>
    </div>
    <?php
    $requete_leaderboard->close();
    ?>
</body>
</html>
