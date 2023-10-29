<?php require_once 'utils/common.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/contact.css">
    <link rel="stylesheet" href="styles/footer.css">
    <title>MemoryGame - Contact</title>
</head>

<body>
    <?php require_once SITE_ROOT . 'partials/header.php'; ?>

    <div id="banner">
        <h1>CONTACT</h1>
    </div>

    <div id="coordonnées">
        <div class="card">
            <img class="card-img" src="assets/logo_phone.png" alt="phone">
            <p>07 82 87 68 99</p>
        </div>
        <div class="card">
            <img class="card-img" src="assets/logo_mail.png" alt="mail">
            <p>jeje.moran@gmail.com</p>
        </div>
        <div class="card">
            <img class="card-img" src="assets/logo_location.png" alt="location">
            <p>Cergy</p>
        </div>
    </div>

    <form action="php.">
        <div id="first-row">
            <input type="text" id=nom placeholder="Pseudo" required="required">
            <label for="nom"></label>
            <input type="email" id="mail" placeholder="Email" required="required">
            <label for="mail"></label>
        </div>

        <input type="text" id="sujet" placeholder="Sujet" required="required">
        <label for="sujet"></label>

        <input type="text" id="message" placeholder="Message" required="required">
        <label for="massage"></label>

        <input type="submit" id="envoi" Value="Envoyer">
        <label for="envoi"></label>
    </form>

    <?php require_once SITE_ROOT . 'partials/footer.php'; ?>

</body>

<script src="scripts/app.js"></script> 

</html>