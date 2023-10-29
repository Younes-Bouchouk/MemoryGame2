<?php 
    require_once 'utils/common.php' ;
    include SITE_ROOT . 'utils/database.php';

    $pdo = connectToDbAndGetPdo();

    if (isset($_POST["login"])) {

        $mail = $_POST["mail"];
        $password = $_POST["password"];

        $pdoImportUsers = $pdo->prepare('SELECT id, email, mdp, firstName  FROM users WHERE email = :mail');            
        $pdoImportUsers->execute([":mail" => $mail]);
        $infosOfUser = $pdoImportUsers->fetchAll();

        if (isset($infosOfUser)) { 

            foreach ($infosOfUser as $row) {
                $mdp = $row->mdp;
                $idUser = $row->id;
                $firstName = $row->firstName;

                if ( password_verify($password, $mdp) ) {
                    $_SESSION['userId'] = $idUser ;
                    $userConnectedMessage = "Bonjour ". $firstName . ", vous êtes bien connecté !";
                    header("Location: myAccount.php");
                    exit;

                } elseif ($password == $mdp){
                    $_SESSION['userId'] = $idUser ;
                    $userConnectedMessage = "Bonjour ". $firstName . ", vous êtes bien connecté !";
                    header("Location: myAccount.php");
                    exit;

                } else {
                    echo("Le mdp est mauvais");
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
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/login.css">
    <link rel="stylesheet" href="styles/footer.css">
    <title>MemoryGame - Connexion</title>
</head>

<body>

    <?php require_once SITE_ROOT.'partials/header.php'; ?>
    
    <div id="banner">
        <h1>CONNEXION</h1>
    </div>


    <form method="POST" >
        <input type="email", id="mail" placeholder="Email" required="required" name="mail">
        <label for="mail"></label>

        <input type="password" id="motDePasse" placeholder="Mot de passe" required="required" name="password">
        <label for="motDePasse"></label>
        <div id="form-btn">
            <a href="<?php echo PROJECT_FOLDER ?>register.php">Créer un compte</a>
            <input type="submit" value="Connexion" id="boutonConnexion" name="login">
        </div>
        <?php if(isset($userConnectedMessage)):?>
            <p><?php echo $userConnectedMessage ?></p>
        <?php endif; ?>
    </form>

    <?php require_once SITE_ROOT.'partials/footer.php'; ?>

</body>

<script src="scripts/app.js"></script> 

</html>