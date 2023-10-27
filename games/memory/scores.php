<?php require_once '../../utils/common.php'; ?>

<?php include SITE_ROOT.'utils/database.php';

    $pdo = connectToDbAndGetPdo();

    if (isset($_GET["searchBtn"]) AND $_GET["searchBtn"] == "enter"){
        $_GET["search"] = htmlspecialchars($_GET["search"]); //pour sécuriser le formulaire contre les failles html
        $pseudo = $_GET["search"];
        $pseudo = trim($pseudo); //pour supprimer les espaces dans la requête de l'internaute
        $pseudo = strip_tags($pseudo); //pour supprimer les balises html dans la requête
        $pseudo = strtolower($pseudo);
        $pdo = connectToDbAndGetPdo();

        $pdoSelectpseudo = $pdo->prepare('SELECT G.gameName, U.pseudo, S.difficulty, S.scores
                                        FROM scores as S
                                        INNER JOIN users as U
                                        ON S.playerId = U.id
                                        INNER JOIN game as G 
                                        ON S.gameId = G.id
                                        WHERE pseudo LIKE :search
                                        ORDER BY S.scores ASC;
                                        ');
        $pdoSelectpseudo->execute([":search" => "%$pseudo%"]);
        $scores = $pdoSelectpseudo->fetchAll();
    }

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
        <input type="search" placeholder="Rechercher" id="searchPseudo" name="search">
        <input type='submit' value='enter' id='searchBtn' name='searchBtn'>
    </form>

    <table>
        <th>Nom du Jeu</th> <th>Joueur</th> <th>Niveau de Difficulté</th> <th>Score</th>

        <?php if (isset($scores)) {       
            foreach ($scores as $row) {
            $gameName = $row->gameName;
            $nickname = $row->pseudo;
            $difficulty = $row->difficulty;
            $score = $row->scores;

            if ($pseudo == "Genzo") {
                echo("  
                    <tr>
                        <td class='connected'>".$gameName."</td>
                        <td class='connected'>".$nickname."</td>
                        <td class='connected'>".$difficulty."</td>
                        <td class='connected'>".$score."</td>
                    </tr>
                ");
            }
            
            else {

                echo("  
                    <tr>
                        <td>".$gameName."</td>
                        <td>".$nickname."</td>
                        <td>".$difficulty."</td>
                        <td>".$score."</td>
                    </tr>
                ");   
            }
        }
        }

        ?>  
    </table>


    <!-- <table>
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
        </table> -->
    </div>
        
    <?php require_once SITE_ROOT.'chat.php'; ?>

    <?php require_once SITE_ROOT.'partials/footer.php'; ?>

</body>

    <script src="../../scripts/app.js"></script> 

</html>