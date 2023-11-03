<?php 

    require_once 'utils/common.php';
    require_once SITE_ROOT. 'utils/database.php';

    $userInfos = selectUserInfos();

    $name = $userInfos[0];
    $pseudo = $userInfos[1];
    $mail = $userInfos[2];
    $inscription = $userInfos[3];

    if (isset($_GET["disconnect"])){
        disconnectUser();
    };

    // ---------  Photo de profil
            
        $uploadDir = SITE_ROOT . '/userFiles/';

        $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif', 'avif');
        
        if (isset($_POST['upload'])) {
        
            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                $file = $_FILES['avatar'];
                $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
        
                if (in_array(strtolower($fileExtension), $allowedExtensions)) {
                    $userId = $_SESSION['userId'];
        
                    // Crée le répertoire s'il n'existe pas
                    $userDir = $uploadDir . $userId . '/';
                    if (!file_exists($userDir)) {
                        mkdir($userDir, 0777, true);
                    }
        
                    $fileName = 'profile.jpg';
                    $filePath = $userDir . $fileName;
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $filePath);
                } else {
                    $imgErrorMessage = "Frero choisis une image aussi j'suis pas ton pote";
                }
            }
        }

    



    // ---------

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
                <img src="<?= $pdpPath ?>" alt="pdp" >
                <form method="post" enctype="multipart/form-data"> 
                    <label for="file" class="label-file"><img id="avatar" src="assets/logo_modify.png" alt=""></label>
                    <input id="file" class="input-file" type="file" name="avatar">
                    <input type="submit" value="Appliquer l'image" name="upload" id="upload">
                    <?php if(isset($imgErrorMessage)):?>
                        <p><?php echo $imgErrorMessage?></p>
                    <?php endif; ?> </a>
                </form>
            </div>        

            <div id="details">
                <?php echo $name ?>
                <h2>Crée le <?php echo $inscription ?></h2>
            </div>
        </div>

        <div id="informations">

            <div id="pseudo">
                <p>Pseudo :</p>
                <?php // echo( "<p>".$pseudo."</p> "); ?>
                <?php echo $pseudo ?>
                <a href="<?php SITE_ROOT ?>changeInfos/newPseudo.php">Modifier</a>
            </div>

            <div id="mail">
                <p>Mail :</p>
                <?php echo $mail ?>
                <a href="<?php SITE_ROOT ?>changeInfos/newEmail.php">Modifier</a>
            </div>

            <div id="mail">
                <p>Mot de passe :</p>
                <p>********</p>
                <a href="<?php SITE_ROOT ?>changeInfos/newPassword.php">Modifier</a>
            </div>

            <div id="bio">
                <p>Biographie :</p>
                <p>ConflictTeam + Valentin + Thibaud + Joachim = ❤️🥰😘🥵😏
                </p>
            </div>
            
            <form id="formDisconnect" method="get">
                <input type="submit" id="disconnectBtn" name="disconnect" value="Deconnexion"></input>
            </form>

        </div>
    </div>

    <footer>
    
    <?php require_once SITE_ROOT.'partials/footer.php'; ?>
    
</body>
    
<script src="scripts/app.js"></script> 

</html>