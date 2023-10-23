<?php require_once 'utils/common.php' ?>

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


    <form action="index.php">
        <input type="email", id="mail" placeholder="Email" required="required">
        <label for="mail"></label>

        <input type="password" id="motDePasse" placeholder="Mot de passe" required="required">
        <label for="motDePasse"></label>
        <div id="form-btn">
            <a href="../Register/register.html">Créer un compte</a>
            <input type="submit" value="Connexion" id="boutonConnexion">
        </div>
    </form>

    <?php require_once SITE_ROOT.'partials/footer.php'; ?>

</body>

    <script src="../components/hamburger.js"></script>

</html>