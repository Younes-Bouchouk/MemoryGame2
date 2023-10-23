<?php require_once 'utils/common.php' ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MemoryGame - Mon compte</title>
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/myAccount.css">
    <link rel="stylesheet" href="styles/footer.css">
</head>

<body>

    <?php require_once SITE_ROOT.'partials/header.php'; ?>
    
    <div id="banner">
        <h1>COMPTE</h1>
    </div>

    <div id="container">
        <div id="profil">
            <div id="pdp">
                <img src="../MyAccount/assets/genzo.webp" alt="" >
                <button></button>
            </div>        

            <div id="details">
                <h1>Younès</h1>
                <h2>Crée le <span>12/10/2023</span></h2>
            </div>
            <!--<p id="status">
                " Wsh la team, bien ? Sah je kiff les jeux de mémoire, je mémorise tah les fou. Dans ma famille on y joue de père en fils. Mon grand-père est un ex champion de MemoryGame, il a gagné plein de trophées. Je compte bien prendre la relève étant donnée que mon père lui n'a pas voulu continué "
            </p>-->
        </div>

        <div id="informations">

            <div id="pseudo">
                <p>Pseudo :</p>
                <p>Genzo78</p>
                <a href="newPseudo.html">Modifier</a>
            </div>

            <div id="mail">
                <p>Mail :</p>
                <p>genzo.w@gmail.com</p>
                <a href="newEmail.html">Modifier</a>
            </div>

            <div id="mail">
                <p>Mot de passe :</p>
                <p>********</p>
                <a href="newPassword.html">Modifier</a>
            </div>

            <div id="bio">
                <p>Biographie :</p>
                <p>Ouai c'est la bio XD LoL amgleeeeeeeeee ame sikaram GLEEEEEEEEEEEEE
                    kAKAROT xd sheeeeeeeeeeeeeeeeche
                </p>
            </div>

        </div>
    </div>

    <footer>
    
        <div id="foot">
    
            <div id="footer-left">
                <h1>Information</h1>
                <p>Si vous voulez nous contacter, vous pouvez <br> nous joindres via les informations suivantes</p>
                <p><span>Tel :</span> 07 82 87 68 99 </p>
                <p><span>Email :</span> jeromme.morand@gmail.com </p>
                <p><span>Locatisation :</span> Cergy </p>
        
                <div>
                    <a class="a" href="https://www.facebook.com/?locale=fr_FR"><img src="../components/assets/facebook.png"></img></a>
                    <a class="a" href=" https://twitter.com/?lang=fr"><img src="../components/assets/twitter.png"></img></a>
                    <a class="a" href="https://www.google.fr/"><img src="../components/assets/google.png"></img></a>
                    <a class="a" href="https://www.pinterest.fr/"><img src="../components/assets/pinterest.png"></img></a>
                    <a class="a" href="https://www.instagram.com/"><img src="../components/assets/instagram.png"></img></a>
                </div>
            </div>
        
            <div id="footer-right">
                <h1>Power Of Memory</h1>
                <ul>
                    <a href="../Memory/levels.html">Jouer !</a>
                    <a href="../Scores/scores.html">Les scores</a>
                    <a href="../Contact/contact.html">Nous contacter</a>
                </ul>
            </div>
        
            <p id="cr">Copyright @ 2023 Tous droits réservés</p>
    
        </div>
    
    </footer>
    
</body>
    
    <script src="../components/hamburger.js"></script>

</html>