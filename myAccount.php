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
                <img src="assets/pdp_younes.webp" alt="" >
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
                <a href="<?php SITE_ROOT ?>changeInfos/newPseudo.php">Modifier</a>
            </div>

            <div id="mail">
                <p>Mail :</p>
                <p>genzo.w@gmail.com</p>
                <a href="<?php SITE_ROOT ?>changeInfos/newEmail.php">Modifier</a>
            </div>

            <div id="mail">
                <p>Mot de passe :</p>
                <p>********</p>
                <a href="<?php SITE_ROOT ?>changeInfos/newPassword.php">Modifier</a>
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
    
    <?php require_once SITE_ROOT.'partials/footer.php'; ?>
    
</body>
    
    <script src="../components/hamburger.js"></script>

</html>