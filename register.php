<?php require_once 'utils/common.php' ?>
<?php
    $pseudoPattern = '/^(?=.[a-z])(?=.[A-Z])(?=.[0-9])(?=.[-_]).{4,}$/';
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

    <?php require_once SITE_ROOT.'partials/header.php'; ?>
    
    <div id="banner">
        <h1>INSCRIPTION</h1>
    </div>

    <form action="index.php" method="post">
        <input type="email", id="mail" placeholder="Email" required="required">
        <label for="mail"></label>

        <input type="text" id="nom" placeholder="Pseudo" required="required">
        <label for="nom"></label>

        <input type="password" id="motDePasse" placeholder="Mot de passe" required="required">
        <label for="motDePasse"></label>

        <input type="password" id="MotDePasse" placeholder="Confirmez le mot de passe" required="required">
        <label for="MotDePasse"></label>

        <div id="form-inscription">
            <input type="submit" value="Inscription" id="boutonInscription">
        </div>
    </form>
    
    <?php require_once SITE_ROOT.'partials/footer.php'; ?>

</body>

    <script src="../components/hamburger.js"></script>

</html>