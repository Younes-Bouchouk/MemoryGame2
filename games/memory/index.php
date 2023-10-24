<?php require_once '../../utils/common.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MemoryGame - Jouer</title>
    <link rel="stylesheet" href="../../styles/chat.css"> 
    <link rel="stylesheet" href="css/game.css">
</head>

<body>

    <div class="quatre">   

        <div id="hud">

            <form action="<?php echo PROJECT_FOLDER ;?>games/memory/scores.php">
                <input type="submit" value="retour" id="back">
            </form>
                <input type="submit" value="Pause" id="Pause">
                <p id="scores">scores : 0 secondes</p>
                <!--<p id="HorlogeEtDate"> 15h17 : 13/10/2023</p> -->

        </div>

        
        
        <table>  
            <tr>
                <td><div class="carte"></div></td>
                <td><div class="carte"></div></td>
                <td><div class="carte"></div></td>
                <td><div class="carte"></div></td>
            </tr>
            <tr>
                <td><div class="carte"></div></td>
                <td><div class="carte"></div></td>
                <td><div class="carte"></div></td>
                <td><div class="carte"></div></td>
            </tr>
            <tr>
                <td><div class="carte"></div></td>
                <td><div class="carte"></div></td>
                <td><div class="carte"></div></td>
                <td><div class="carte"></div></td>
            </tr>
            <tr>
                <td><div class="carte"></div></td>
                <td><div class="carte"></div></td>
                <td><div class="carte"></div></td>
                <td><div class="carte"></div></td>
            </tr>
        </table>
    </div>

    <?php require_once SITE_ROOT.'chat.php'; ?>
</body>

    <script src="../../scripts/app.js"></script> 

</html>