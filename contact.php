<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../components/header.css">
    <link rel="stylesheet" href="./css/contact.css">
    <link rel="stylesheet" href="../components/footer.css">
    <title>MemoryGame - Contact</title>
</head>

<body>

    <header>
        <h1 id="title">Memory Game</h1>
        <nav>
            <a href="../Accueil/index.html">ACCUEIL</a>
            <a href="../Memory/levels.html">JEU</a>
            <a href="../Scores/scores.html">SCORES</a>
            <a href="../Contact/contact.html">NOUS CONTACTER</a>
            <a href="../Login/login.html">CONNEXION</a>
            <a href="../MyAccount/myAccount.html">MON COMPTE</a>
        </nav>
        <a id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </a>
    </header>
    
    <div id="banner">
        <h1>CONTACT</h1>
    </div>


    <div id="coordonnées">
        <div class="card">
            <img class="card-img" src=".//assets/phonelogo.png" alt="phone">
            <p>07 82 87 68 99</p>
        </div>
        <div class="card">
            <img class="card-img" src=".//assets/maillogo.png" alt="mail">
            <p>jeje.moran@gmail.com</p>
        </div>  
        <div class="card">
            <img class="card-img" src=".//assets/locationlogo.png" alt="location">
            <p>Cergy</p>
        </div> 
    </div>
    
    <form action="php.">
        <div id="first-row">
            <input type="text" id=nom placeholder="Pseudo" required="required">
            <label for="nom"></label>
            <input type="email" id="mail" placeholder="Email" required="required">
            <label for="mail"></label>
        </div>

        <input type="text" id="sujet" placeholder="Sujet" required="required">
        <label for="sujet"></label>

        <input type="text" id="message" placeholder="Message" required="required">
        <label for="massage"></label>

        <input type="submit" id="envoi" Value="Envoyer">
        <label for="envoi"></label>
    </form>

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
                    <a href="../Contact/">Nous contacter</a>
                </ul>
            </div>
        
            <p id="cr">Copyright @ 2023 Tous droits réservés</p>
    
        </div>
    
    </footer>

</body>

    <script src="../components/hamburger.js"></script>

</html>