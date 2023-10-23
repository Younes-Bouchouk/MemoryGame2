<?php require_once '../../utils/common.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/header.css">
    <link rel="stylesheet" href="../../styles/scores.css">
    <link rel="stylesheet" href="../../styles/footer.css">
    <title> MemoryGame - Scores</title>
</head>

<body>

    <?php require_once SITE_ROOT.'partials/header.php'; ?>
    
    <div id="banner">
        <h1>SCORES</h1>
    </div>

    <table>
        <tr id="table-title">
            <th scope="col">Nom du Jeu</th> <th>Joueur</th> <th>Niveau de Difficulté</th> <th>Score</th> <th>Date & Heure</th>
            <tr>
                <td>MemoryGame</td>
                <td>Dark Vador</td>
                <td>EXTREME</td>
                <td>250 sec</td>
                <td>17/10/2023 22H00</td>
            </tr>
            <tr>
                <td>MemoryGame</td>
                <td>Genzo</td>
                <td>EXTREME</td>
                <td>250 sec</td>
                <td>17/10/2023 22H00</td>
            </tr>
            <tr>
                <td>MemoryGame</td>
                <td>Bartaaaaa</td>
                <td>EXTREME</td>
                <td>250 sec</td>
                <td>17/10/2023 22H00</td>
            </td>
            <tr>
                <td>MemoryGame</td>
                <td>Antking</td>
                <td>EXTREME</td>
                <td>3258 sec</td>
                <td>17/10/2023 22H00</td>
            </tr>
            <tr>
                <td>MemoryGame</td>
                <td>Thib0</td>
                <td>EXTREME</td>
                <td>347 sec</td>
                <td>17/10/2023 22H00</td>
            </tr>
        </table>
    </div>
        
    <?php require_once SITE_ROOT.'partials/footer.php'; ?>

</body>

    <script src="../components/hamburger.js"></script>

</html>