<?php 

require_once '../../utils/common.php'; 

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MemoryGame - Jouer</title>
    <link rel="stylesheet" href="<?php echo PROJECT_FOLDER ; ?>styles/levels.css">
    <link rel="stylesheet" href="<?php echo PROJECT_FOLDER ; ?>styles/themes.css">
    <link rel="stylesheet" href="<?php echo PROJECT_FOLDER ; ?>styles/chat.css"> 
    <link rel="stylesheet" href="<?php echo PROJECT_FOLDER ; ?>styles/memory.css">

    <script src="../../scripts/game.js" defer></script>
    <script src="../../ scripts/chat.js" defer></script> 

</head>

<body>

    <div id="levelPage">

        <div class="container">

            <button class="btnLevel" id="btnNovice" >Novice - 4×4</button>

            <button class="btnLevel" id="btnFacile" >Facile - 5×6</button>

            <button class="btnLevel" id="btnIntermediaire" >Intermediaire - 8×8</button>

            <button class="btnLevel" id="btnDifficile" >Difficile - 12×12</button>

            <button class="btnLevel" id="btnExtreme" >Extrême 20×20</button>

        </div>

    </div>

    <div id="themePage">

        <div class="container">

            <div class="ligne1">
                <button class="btnTheme" id="themeFuturiste"></button>
                <button class="btnTheme" id="themeMagic"></button>
            </div>

            <div class="ligne2">
                <button class="btnTheme" id="themeHeathstone"></button>
                <button class="btnTheme" id="themeClash"></button>
            </div>    

        </div>
    </div>

    <div id="gameArena">   

        <div id="hud">

            <p id="score"><span>0</span>sec</p> 

            <button id="pause"><span></span><span></span></button>
            <a href="../../index.php"><button id="quit">QUITTER</button></a>

        </div>
       
        <table id="novice">  
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
 
</html>