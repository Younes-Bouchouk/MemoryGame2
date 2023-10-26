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
                    $succesMailMessage = "Votre mail a bien été modifié";

                    $pdoUpdateMail = $pdo->prepare('UPDATE users SET email = :newMail WHERE id = :userId');            
                    $pdoUpdateMail->execute([
                        ":userId" => $_SESSION['userId'],
                        ":newMail" => $newMail
                    ]); 

                }

            }

        }

    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MemoryGame - Email</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/myAccount.css">
    <link rel="stylesheet" href="css/newPseudo.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>
<body>

    <?php require_once SITE_ROOT.'partials/header.php'; ?>
    
    <div id="banner">
        <h1>COMPTE</h1>
    </div>


    <div id="container">

        <div id="profil">
            <a href="../myAccount.html"><img src="./assets/back-arrow.png" alt=""></a>
            <div id="pdp">
                <img src="../Accueil/assets/alexis.jpg" alt="" >
                <button><img src="./assets/pen.png" alt="" ></button>
            </div>        

            <div id="details">
                <h1>Younès</h1>
                <h2>Crée le <span>12/10/2023</span></h2>
            </div>
            <!--<p id="status">
                " Wsh la team, bien ? Sah je kiff les jeux de mémoire, je mémorise tah les fou. Dans ma famille on y joue de père en fils. Mon grand-père est un ex champion de MemoryGame, il a gagné plein de trophées. Je compte bien prendre la relève étant donnée que mon père lui n'a pas voulu continué "
            </p>-->
        </div>

        <form method="POST">
            <input type="email"  id="ancienEmail" placeholder="Ancien mail" required="required" name="oldMail">
            <label for="ancienPseudo"></label>
            <input type="email"  id="nouveauEmail" placeholder="Nouveau mail" required="required" name="newMail">
            <label for="NouveauPseudo"></label>
            <input type="email" id="TestEmail" placeholder="Confirmez votre mail" required="required" name="confirmNewMail">
            <label for="TestPseudo"></label>
            <input type="submit" value="Envoyer" id="envoiePseudo" name="newMailBtn">
            <label for="envoiePseudo"></label>
            <?php if(isset($succesMailMessage)):?>
                <p><?php echo $succesMailMessage ?></p>
            <?php endif; ?>
        </form>

        </div>

        <?php require_once SITE_ROOT.'partials/footer.php'; ?>
    
</body>

    <script src="../components/hamburger.js"></script>

</html>