<?php require_once 'utils/common.php' ?>

<?php include "utils/database.php";
    $pdo = connectToDbAndGetPdo();

    $pdoStatement = $pdo->prepare('SELECT count(id) as nbUsers FROM users');
    $pdoStatement->execute();
    $users = $pdoStatement->fetch();

    $pdoStatement = $pdo->prepare('SELECT count(id) as nbParty FROM scores');
    $pdoStatement->execute();
    $party = $pdoStatement->fetch();

    $pdoStatement = $pdo->prepare('SELECT MIN(scores) as minScore FROM scores');
    $pdoStatement->execute();
    $topScore = $pdoStatement->fetch();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./css/header.css"> -->
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/chat.css">    
    <link rel="stylesheet" href="styles/footer.css">
    <title>MemoryGame - Accueil</title>
</head>

<body>
    
    <?php require_once SITE_ROOT.'partials/header.php'; ?>

    <div id="top">

        <video autoplay loop muted>
            <source src="assets/background.mp4" type="video/mp4">
        </video>

        <div id="welcome">
            <h1>BIENVENUE DANS <br> NOTRE STUDIO !</h1>
            <p>Venez challenger les cerveaux les plus agiles</p>
            <a href="games/memory/index.php">JOUER !</a>
        </div>

        <div id="filtre"></div>

        <div id="flou"></div>

    </div>

    <div id="presentation">
        <div id="images">
            <img src="assets/img_presentation_1.png" alt="">
            <img src="assets/img_presentation_2.png" alt="">
            <img src="assets/img_presentation_3.png" alt="">
        </div>
        <div id="textes">
            <section>
                <h1>01</h1>
                <div class="paragraphe">
                    <h2>Règles</h2>
                    <p>Toutes les cartes sont étalées faces cachées sur la table. Le premier joueur retourne deux cartes. Si les images sont identiques, il gagne la paire constituée et rejoue. Si les images sont différentes, il les repose faces cachées là où elles étaient et c'est au joueur suivant de jouer.</p>
                </div>
            </section>

            <section>
                <h1>02</h1>
                <div class="paragraphe">
                    <h2>Niveau de difficulté</h2>
                    <p>Vous pouvez choisir votre niveau de difficulté entre le niveau novice si vous débutez ou le niveau intermédiaire si vous connaissez déjà ce jeu. Vous pourrez donc vous chalenger un peu  et  passer des bons moments avec vos amis.</p>
                </div>
            </section>

            <section>
                <h1>03</h1>
                <div class="paragraphe">
                    <h2>Diversité</h2>
                    <p>Sur notre plateforme, nous vous proposons notre jeu favori "memoryGame" pour exercer notre mémoire, cependant nous avons développé pour vous d'autres jeux très amusant tel qu'un tic-tac-toe ultimate ou encore un snake.</p>
                </div>
            </section>
        </div>
    </div>

    <div id="stats">
        <img src="assets/img_stats.jpg" alt="">
        <div id="stats-cards">
            <div class="stats-row">
                <div class="cards" id="card-1">
                    <p class="num">
                    <?php echo $party->nbParty; ?>
                    </p>
                    <p class="description">Partie Jouées</p>
                </div>
    
                <div class="cards" id="card-2">
                    <p class="num">2</p>
                    <p class="description">Joueurs Connectés</p>
                </div>
            </div>

            <div class="stats-row">
                <div class="cards" id="card-3">
                    <p class="num">
                        <?php echo $topScore->minScore; ?>s
                    </p>
                    <p class="description">Temps Record</p>
                </div>

                <div class="cards" id="card-4">
                    <p class="num">
                        <?php echo $users->nbUsers; ?>
                    </p>
                    <p class="description">Joueurs Inscrits</p>
                </div>
            </div>
        </div>
    </div>

    <div id="team">
        <h1>Notre Équipe</h1>
        <img id="hr" src="assets/hr.JPG" alt="">
        <div id="profils">
            <div class="profil">
                <img class="pdp" src="./assets/pdp_younes2.gif" alt="">
                <h3>YOUNÈS</h3>
                <h4>Web Designer</h4>
                <div class="rs">
                    <a></a>
                    <a href="https://github.com/Younes-Bouchouk" target="_blank"></a>
                    <a></a>

                </div>
            </div>

            <div class="profil">
                <img class="pdp" src="./assets/nicolas.gif" alt="">
                <h3>NICOLAS<br> 
                    <span>(Scrum Master)</span>
                </h3>
                <h4> 'EX' Meilleur Scrum Master</h4>
                <div class="rs">
                    <a></a>
                    <a href="https://github.com/Jjbilou" target="_blank"></a>
                    <a href="https://brawltime.ninja/profile/G2Y0Y20R#sharepic" target="_blank"></a>
                    
                </div>
            </div>

            <div class="profil">
                <img class="pdp" src="./assets/alexis.gif" alt="">
                <h3>ALEXIS</h3>
                <h4>Games Developer</h4>
                <div class="rs">
                    <a></a>
                    <a href="https://github.com/TheStarBars" target="_blank"></a>
                    <a></a>

                </div>
        </div>
        </div>
    </div>

    <?php require_once SITE_ROOT.'chat.php'; ?>

    <?php require_once SITE_ROOT.'partials/footer.php'; ?>
    

</body>

    <script src="scripts/app.js"></script> 

</html>