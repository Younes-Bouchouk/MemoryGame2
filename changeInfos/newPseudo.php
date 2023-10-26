<?php 
    require_once '../utils/common.php' ;
    include SITE_ROOT . 'utils/database.php';

    $pdo = connectToDbAndGetPdo();

    if (isset($_POST["newPseudoBtn"])) {

        $oldPseudo = $_POST["oldPseudo"];
        $newPseudo = $_POST["newPseudo"];
        $confirmNewPseudo = $_POST["confirmNewPseudo"];

        $pdoUpdatePseudo = $pdo->prepare('SELECT pseudo FROM users WHERE id = :userId');            
        $pdoUpdatePseudo->execute([":userId" => $_SESSION['userId']]); 
        $pseudoUser = $pdoUpdatePseudo->fetch();

        if (isset($pseudoUser)){
            
            $oldPseudoResult = $pseudoUser->pseudo;

            if($oldPseudoResult == $oldPseudo){

                if($newPseudo == $confirmNewPseudo){

                    $pdoUpdatePseudo = $pdo->prepare('UPDATE users SET pseudo = :newPseudo WHERE id = :userId');            
                    $pdoUpdatePseudo->execute([
                        ":userId" => $_SESSION['userId'],
                        ":newPseudo" => $newPseudo
                    ]); 

                    $succesPseudoMessage = "Changement de pseudo effectué";
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

            <form method="post">
                <input type="text"  id="ancienPseudo" placeholder="Ancien pseudo" required="required" name="oldPseudo">
                <label for="ancienPseudo"></label>
                <input type="text"  id="nouveauPseudo" placeholder="Nouveau Pseudo" required="required" name="newPseudo">
                <label for="NouveauPseudo"></label>
                <input type="text" id="TestPseudo" placeholder="Confirmez votre pseudo" required="required" name="confirmNewPseudo">
                <label for="TestPseudo"></label>

                <input type="submit" value="Envoyer" id="envoiePseudo" name="newPseudoBtn">
                <label for="envoiePseudo"></label>
                <?php if(isset($succesPseudoMessage)):?>
                    <p><?php echo $succesPseudoMessage ?></p>
                <?php endif; ?>
            </form>

        </div>

        <?php require_once SITE_ROOT.'partials/footer.php'; ?>
    
</body>

    <script src="../components/hamburger.js"></script>

</html>