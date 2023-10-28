<?php 
    require_once '../../utils/common.php'; 
    include SITE_ROOT.'utils/database.php';
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/header.css">
    <link rel="stylesheet" href="../../styles/scores.css">
    <link rel="stylesheet" href="../../styles/chat.css"> 
    <link rel="stylesheet" href="../../styles/footer.css">
    <title> MemoryGame - Scores</title>
</head>

<body>

    <?php require_once SITE_ROOT.'partials/header.php'; ?>
    
    <div id="banner">
        <h1>SCORES</h1>
    </div>
    
    <form method="get" id="requestScore">
        <input type="search" placeholder="Pseudo" id="searchPseudo" name="search">
        <input type='submit' value='Rechercher' id='searchBtn' name='searchBtn'>
    </form>

    <table>
        
        <th>Jeu</th> <th>Joueur</th> <th>Difficulté</th> <th>Score</th>

        <?php  
            if (!isset($_GET["searchBtn"]) || empty($_GET["search"])) {
                echo displayScores(selectAllScores());
            } else {
                echo displayScores(selectScoresLike());
            }  
        ?>  

    </table>
        

    <?php require_once SITE_ROOT.'chat.php'; ?>

    <?php require_once SITE_ROOT.'partials/footer.php'; ?>

</body>

    <script src="../../scripts/app.js"></script> 

</html>