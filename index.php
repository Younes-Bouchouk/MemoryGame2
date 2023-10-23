<?php require_once 'utils/common.php' ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./css/header.css"> -->
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="../components/chatBox.css">
    <link rel="stylesheet" href="styles/footer.css">
    <title>MemoryGame - Accueil</title>
</head>

<body>
    
    <?php require_once SITE_ROOT.'partials/header.php'; ?>

    <div id="top">

        <video autoplay loop muted>
            <source src="./assets/energy_field.mp4" type="video/mp4">
        </video>

        <div id="welcome">
            <h1>BIENVENUE DANS <br> NOTRE STUDIO !</h1>
            <p>Venez challenger les cerveaux les plus agiles</p>
            <a href="../Memory/levels.html">JOUER !</a>
        </div>

        <div id="filtre"></div>

        <div id="flou"></div>

    </div>

    <div id="presentation">
        <div id="images">
            <img src="assets/img-presentation-1.png" alt="">
            <img src="assets/img-presentation-2.png" alt="">
            <img src="assets/img-presentation-3.png" alt="">
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
        <img src="assets/img-stats.jpg" alt="">
        <div id="stats-cards">
            <div class="stats-row">
                <div class="cards" id="card-1">
                    <p class="num">0</p>
                    <p class="description">Partie Jouées</p>
                </div>
    
                <div class="cards" id="card-2">
                    <p class="num">0</p>
                    <p class="description">Joueurs Connectés</p>
                </div>
            </div>

            <div class="stats-row">
                <div class="cards" id="card-3">
                    <p class="num">0</p>
                    <p class="description">Temps Record</p>
                </div>

                <div class="cards" id="card-4">
                    <p class="num">0</p>
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
                <img class="pdp" src="./assets/Frock.gif" alt="">
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
                <h4>Pro Player BrawlStar</h4>
                <div class="rs">
                    <a></a>
                    <a href="https://github.com/Jjbilou" target="_blank"></a>
                    <a></a>
                    
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

    <button id="chatbox-close" type="menu"></button>

    <div id="chatbox">

        <div id="screen">

            <p class="me">Y'a qui ?</p>

            <div class="sender"><img src="../Accueil/assets/genzo.webp" alt=""> <section>Genzo <span>- 18h45</span></section></div>
            <p class="other">Moi. Mais j'veux pas jouer avec toi t'es trop guez. Tu fais que des team diff</p>

            <p class="me">Toi j'vais t'attraper à la coding t'es mort! Valérie ou pas tu vas voir</p>

            <div class="sender"><img src="../Accueil/assets/alexis.jpg" alt=""> <section>DarkVador <span>- 19h01</span></section></div>
            <p class="other">Azy quand tu veux, où tu veux pelo</p>

            <p class="other">J'arrive avec mes poings</p>

            <p class="me">J'viens tout seul, tkt j'ai vraiment pas peur de toi!</p>
            
            <div class="sender"><img src="../Accueil/assets/nico.webp" alt=""> <section>NicoPinguin <span>- 19h05</span></section></div>
            <p class="other">Azi, je ramène mes gants de boxe, on va niqué de fou la !</p>

            <p class="me">Aah, tu fais de la boxe XD j'savais pas</p>

            <p class="other">Je FF t'es trop un lâche</p>
            
        </div>

        <div id="envoyer-message">
            <input type="text" name="" id="message" placeholder="Entrez votre message" wrap="hard">
            <label for="message"></label>
            <button id="send"><img src="../components/assets/send-message.png"></button>
        </div>


    </div>

    <?php require_once SITE_ROOT.'partials/footer.php'; ?>

</body>

    <script src="../components/hamburger.js"></script>

</html>