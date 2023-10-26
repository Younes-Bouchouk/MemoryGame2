<?php 
    require_once '../utils/common.php' ;
    include SITE_ROOT . 'utils/database.php';

    $pdo = connectToDbAndGetPdo();

    if (isset($_POST["newMailBtn"])) {

        $oldMail = $_POST["oldMail"];
        $newMail = $_POST["newMail"];
        $confirmNewMail = $_POST["confirmNewMail"];

        $pdoUpdateMail = $pdo->prepare('SELECT email FROM users WHERE id = :userId');            
        $pdoUpdateMail->execute([":userId" => $_SESSION['userId']]); 
        $emailUser = $pdoUpdateMail->fetch();

        if (isset($emailUser)){
            
            $oldMailResult = $emailUser->email;

            if($oldMailResult == $oldMail){

                if($newMail == $confirmNewMail){

                    $pdoUpdateMail = $pdo->prepare('UPDATE users SET email = :newMail WHERE id = :userId');            
                    $pdoUpdateMail->execute([
                        ":userId" => $_SESSION['userId'],
                        ":newMail" => $newMail
                    ]); 

                    echo('Email changé gg');
                }

            }

        }

    }


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MemoryGame - Mon compte</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/myAccount.css">
    <link rel="stylesheet" href="css/newPseudo.css">
    <link rel="stylesheet" href="../styles/footer.css">

</head>

<body>

    <?php require_once SITE_ROOT.'partials/header.php'; ?>
    
    <div id="banner">
        <h1>MODIFIER</h1>
    </div>


    <div id="container">

        <div id="profil">
            <a href="./myAccount.html"><img src="./assets/back-arrow.png" alt=""></a>
            <div id="pdp">
                <img src="./assets/genzo.webp" alt="" >
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

            <form action="index.php">
                <input type="text"  id="ancienPseudo" placeholder="Ancien pseudo" required="required">
                <label for="ancienPseudo"></label>
                <input type="text"  id="nouveauPseudo" placeholder="Nouveau Pseudo" required="required">
                <label for="NouveauPseudo"></label>
                <input type="text" id="TestPseudo" placeholder="Confirmez votre pseudo" required="required">
                <label for="TestPseudo"></label>

                <input type="submit" value="Envoyer" id="envoiePseudo">
                <label for="envoiePseudo"></label>
            </form>

        </div>

        <?php require_once SITE_ROOT.'partials/footer.php'; ?>
    
</body>

    <script src="../components/hamburger.js"></script>

</html>