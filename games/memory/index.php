<?php 

require_once '../../utils/common.php'; 
include SITE_ROOT ."utils/database.php";

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
    <script src="../../scripts/chat.js" defer></script> 

</head>

<body>

        <audio id="themeSoundClash">
        <source src="../../assets/soundEnterClash.mp3" type="audio/mpeg">
        </audio>

        <audio id="themeSoundMagics">
        <source src="../../assets/soundEnterMagic.mp3" type="audio/mpeg">
        </audio>

        <audio id="themeSoundFutur">
        <source src="../../assets/soundEnterFutur.mp3" type="audio/mpeg">
        </audio>

        <audio id="themeSoundHearth">
        <source src="../../assets/soundEnterHeath.mp3" type="audio/mpeg">
        </audio>


    <div id="levelPage">

        <div class="container">

            <button class="btnLevel" id="btnNovice" >Novice - 4×4</button>

            <button class="btnLevel" id="btnFacile" >Facile - 5×6</button>

            <button class="btnLevel" id="btnIntermediaire" >Intermediaire - 8×8</button>

            <button class="btnLevel" id="btnDifficile" >Difficile - 12×12</button>

            <button class="btnLevel" id="btnExtreme" >Extrême 20×20</button>

        </div>

    </div>

    <div id="themePage" style="display: none;">

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

            <p id="resultat"></p>

            <p id="score"><span id="time">0</span>.<span id="ms"></span> sec</p> 

            <button id="pause" onclick="toggle()"><span></span><span></span></button>
            <a href="../../index.php"><button id="quit">QUIT</button></a>

        </div>

        <table id="table">


        </table>

        
    </div>

    <div id="end">

        <h1>Score : <span id="endScore"></span>sec</h1>


        <a href="./index.php"><button>REJOUER</button></a>
        <a href="./scores.php"><button>SCORES</button></a>
        
    </div>


    <?php require_once SITE_ROOT.'chat.php'; ?>


</body>
 
</html>