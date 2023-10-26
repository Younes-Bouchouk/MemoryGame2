<?php 
    require_once '../utils/common.php' ;
    include SITE_ROOT . 'utils/database.php';

    $passwordPattern = '/^(?=.[a-z])(?=.[A-Z])(?=.[0-9])(?=.[!@#$%^&*]).{8,}$/';
    $pdo = connectToDbAndGetPdo();

    if (isset($_POST["newPasswordBtn"])) {

        $oldPassword = $_POST["oldPassword"];
        $newPassword = $_POST["newPassword"];
        $confirmNewPassword = $_POST["confirmNewPassword"];

        $pdoUpdatePassword = $pdo->prepare('SELECT mdp FROM users WHERE id = :userId');            
        $pdoUpdatePassword->execute([":userId" => $_SESSION['userId']]); 
        $passwordUser = $pdoUpdatePassword->fetch();

        if (isset($passwordUser)){
            
            $oldPasswordResult = $passwordUser->mdp;

            if (preg_match($passwordPattern, $password) == 0) {
                $passwordErrorMessage = "Il faut que votre mot de passe contienne au minimum une majuscule, un chiffre et un caractère spécial";

                if ( password_verify($oldPassword, $oldPasswordResult) || $oldPasswordResult == $oldPassword) {
                    $succesPasswordMessage = "Votre mot de passe à bien été modifié";

                    $pdoUpdatePassword = $pdo->prepare('UPDATE users SET mdp = :newPassword WHERE id = :userId');            
                    $pdoUpdatePassword->execute([
                        ":userId" => $_SESSION['userId'],
                        ":newPassword" => password_hash($newPassword, CRYPT_SHA256)
                    ]);

                } else {
                    $succesPasswordMessage = "Votre mot de passe n'à pas été modifié ";
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

        <form method="post">
            <input type="password"  id="ancienMotDePasse" placeholder="Ancien mot de passe" required="required" name="oldPassword">
            <label for="ancienPseudo"></label>
            <input type="password"  id="nouveauMotDePasse" placeholder="Nouveau mot de passe" required="required" name="newPassword">
            <label for="NouveauPseudo"></label>
            <input type="password" id="TestMotDePasse" placeholder="Confirmez votre mot de passe" required="required" name="confirmNewPassword">
            <label for="TestPseudo"></label>

            <input type="submit" value="Envoyer" id="envoiePseudo" name="newPasswordBtn">
            <label for="envoiePseudo"></label>
            <?php if(isset($succesPasswordMessage)):?>
                <p><?php echo $succesPasswordMessage ?></p>
            <?php endif; ?>
        </form>

        </div>

        <?php require_once SITE_ROOT.'partials/footer.php'; ?>
</body>

    <script src="../components/hamburger.js"></script>

</html>