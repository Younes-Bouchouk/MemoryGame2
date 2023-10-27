<?php
require_once 'utils/common.php';
include SITE_ROOT . 'utils/database.php';

$passwordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*-_]).{8,}$/';
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
        try {
            $pdoImportUsers = $pdo->prepare('INSERT INTO users (firstName, email, mdp, pseudo) VALUES(:firstName, :email, :mdp, :pseudo)');

            $pdoImportUsers->execute([
                ":firstName" => $prenom,
                ":email" => $mail,
                ":mdp" => password_hash($password, CRYPT_SHA256),
                ":pseudo" => $pseudo,
            ]);
        } catch (PDOException $e) {
            // var_dump($e);
            if ($e->errorInfo[1] == 1062) {

                // $uniqueErrorMessage = 'Votre email ou votre pseudo est déjà utilisé';

                if (strpos($e->getMessage(), 'email') !== false) {
                    $uniqueErrorMail = "L'Email est déjà utilisé.";
                } 

                if (strpos($e->getMessage(), 'pseudo') !== false) {
                    $uniqueErrorPseudo  = "Le pseudo est déjà utilisé.";
                }   
            } 
        }

        if (!isset($uniqueErrorMail) && !isset($uniqueErrorMail)) {
            $insertSuccesMessage = 'Votre compte a bien été créé !';
 
            $pdoSelectId = $pdo->prepare('SELECT id FROM users WHERE email = :mail');            
            $pdoSelectId->execute([":mail" => $mail]);
            $infosOfUser = $pdoSelectId->fetch();

            $idNewUser = $infosOfUser->id;

            $_SESSION['userId'] = $idNewUser ;

            header("Location: index.php");
            exit;
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
        <input type="text" id="prenom" placeholder="Prénom" required="required" name="firstName" 
        <?php if (isset($prenom)) :?>
            value="<?php echo htmlspecialchars($prenom); ?>">
        <?php endif; ?>
        <label for="prenom"></label>

        <input type="mail" id="mail" placeholder="Email" required="required" name="mail"
        <?php if (isset($mail)) :?>
            value="<?php echo htmlspecialchars($mail); ?>">
        <?php endif; ?>
        <label for="mail"></label>
        <?php if(isset($uniqueErrorMail)):?>
            <p><?php echo $uniqueErrorMail ?></p>
        <?php endif; ?>

        <input type="text" id="nom" placeholder="Pseudo" required="required" name="pseudo" minlength="4" 
        <?php if (isset($pseudo)) :?>
            value="<?php echo htmlspecialchars($pseudo); ?>">
        <?php endif; ?>
        <label for="nom"></label>
        <label for="mail"></label>
        <?php if(isset($uniqueErrorPseudo)):?>
            <p><?php echo $uniqueErrorPseudo ?></p>
        <?php endif; ?>

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
            <?php if(isset($insertSuccesMessage)):?>
            <p><?php echo $insertSuccesMessage ?></p>
        <?php endif; ?>
        </div>




    </form>

    <?php require_once SITE_ROOT . 'partials/footer.php'; ?>
</body>
<script src="../components/hamburger.js"></script>

</html>