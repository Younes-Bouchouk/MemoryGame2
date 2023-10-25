<?php
require_once 'utils/common.php';
include SITE_ROOT . 'utils/database.php';

$passwordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,}$/';
$pdo = connectToDbAndGetPdo();

if (isset($_GET["inscription"])) {
    $prenom = $_GET["firstName"];
    $mail = $_GET["mail"];
    $pseudo = $_GET["pseudo"];
    $password = $_GET["password"];
    $confirmPassword = $_GET["confirmPassword"];

    if (preg_match($passwordPattern, $password) == 0) {
        $passwordErrorMessage = "Il faut que votre mot de passe contienne au minimum une majuscule, un chiffre et un caractère spécial";
    }
    if ($password != $confirmPassword) {
        $confirmPasswordErrorMessage = "le mot de passe ne correspond pas !";
    }

    // TODO tester si le pseudo fait au moins 4 chars

    if(
        !isset($passwordErrorMessage) &&
        !isset($confirmPasswordErrorMessage)
    ){
        $pdoImportUsers = $pdo->prepare('INSERT INTO users (firstName, email, mdp, pseudo) VALUES(:firstName, :email, :mdp, :pseudo)');

        $pdoImportUsers->execute([
            ":firstName" => $prenom,
            ":mail" => $mail,
            ":mdp" => password_hash($password, CRYPT_SHA256),
            ":pseudo" => $pseudo,
        ]);
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/register.css">
    <link rel="stylesheet" href="styles/footer.css">
    <title>MemoryGame - Inscription</title>
</head>

<body>
    <?php require_once SITE_ROOT . 'partials/header.php'; ?>

    <div id="banner">
        <h1>INSCRIPTION</h1>
    </div>

    <form method="GET">
        <input type="text" id="prenom" placeholder="Prénom" required="required" name="firstName">
        <label for="prenom"></label>

        <input type="mail" id="mail" placeholder="Email" required="required" name="mail">
        <label for="mail"></label>

        <input type="text" id="nom" placeholder="Pseudo" required="required" name="pseudo" minlength="4">
        <label for="nom"></label>

        <input type="password" id="motDePasse" placeholder="Mot de passe" required="required" name="password" minlength="8">
        <label for="motDePasse"></label>
        <?php if(isset($passwordErrorMessage)):?>
            <p><?php echo $passwordErrorMessage ?></p>
        <?php endif; ?>

        <input type="password" id="MotDePasse" placeholder="Confirmez le mot de passe" required="required" name="confirmPassword" minlength="8">
        <label for="MotDePasse"></label>
        <?php if(isset($confirmPasswordErrorMessage)):?>
            <p><?php echo $confirmPasswordErrorMessage ?></p>
        <?php endif; ?>
            
        <div id="form-inscription">
            <input type="submit" value="Inscription" id="boutonInscription" name="inscription">
        </div>



    </form>

    <?php require_once SITE_ROOT . 'partials/footer.php'; ?>
</body>
<script src="../components/hamburger.js"></script>

</html>