<?php 

    require_once 'utils/common.php';
    require_once SITE_ROOT. 'utils/database.php';

    if (isset($_GET["d"])){
        unset($_SESSION['userId']);
        header("Location: index.php");
        exit;

    };

    $pdo = connectToDbAndGetPdo();

    $pdoSelectUsers = $pdo->prepare('SELECT firstName, pseudo, email, inscription FROM users WHERE id = :userId ');
    $pdoSelectUsers->execute([":userId" => $_SESSION['userId']]); 
    $infosUserConnected = $pdoSelectUsers->fetchAll();

    if (isset($infosUserConnected)) {       
        foreach ($infosUserConnected as $row) {
        $firstName = $row->firstName;
        $pseudo = $row->pseudo;
        $email = $row->email;
        $inscription = $row->inscription;
        }
    };

    // ---------

    



    // ---------

    if(isset($_GET["submit"])) {
        echo("T'as appuyer sur le boutons");
        if (isset($_FILES['avatar']['tmp_name'])) {
            echo("J'ai pris ton image");
            $retour = copy($_FILES['avatar']['tmp_name'], $_FILES['avatar']['name']);
            if($retour) {
                echo '<p>La photo a bien été envoyée.</p>';
                echo '<img src="' . $_FILES['avatar']['name'] . '">';
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
                <img src="userFiles/avatar.png" alt="" >
                <form method="post"> 
                    <label for="file" class="label-file"><img id="avatar" src="assets/logo_modify.png" alt=""></label>
                    <input id="file" class="input-file" type="file" name="avatar">
                    <input type="submit" value="Télécharger l'image" name="submit">
                </form>
            </div>        

            <div id="details">
                <?php echo( "<h1>".$firstName."</h1> "); ?>
                <h2>Crée le <?php echo( "<span>".$inscription."</span> "); ?></h2>
            </div>
            <!--<p id="status">
                " Wsh la team, bien ? Sah je kiff les jeux de mémoire, je mémorise tah les fou. Dans ma famille on y joue de père en fils. Mon grand-père est un ex champion de MemoryGame, il a gagné plein de trophées. Je compte bien prendre la relève étant donnée que mon père lui n'a pas voulu continué "
            </p>-->
        </div>

        <div id="informations">

            <div id="pseudo">
                <p>Pseudo :</p>
                <?php echo( "<p>".$pseudo."</p> "); ?>
                <a href="<?php SITE_ROOT ?>changeInfos/newPseudo.php">Modifier</a>
            </div>

            <div id="mail">
                <p>Mail :</p>
                <?php echo( "<p>".$email."</p> "); ?>
                <a href="<?php SITE_ROOT ?>changeInfos/newEmail.php">Modifier</a>
            </div>

            <div id="mail">
                <p>Mot de passe :</p>
                <p>********</p>
                <a href="<?php SITE_ROOT ?>changeInfos/newPassword.php">Modifier</a>
            </div>

            <div id="bio">
                <p>Biographie :</p>
                <p>ConflictTeam + Valentin = ❤️😏
                </p>
            </div>
            
            <form id="formDisconnect" method="get">
                <input type="submit" id="disconnectBtn" name="d" value="Deconnexion"></input>
            </form>

        </div>
    </div>

    <footer>
    
    <?php require_once SITE_ROOT.'partials/footer.php'; ?>
    
</body>
    
    <script src="../components/hamburger.js"></script>

</html>