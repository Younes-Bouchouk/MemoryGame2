<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('ADMIN_MAIL', 'mail@gmail.com'); 
define('PROJECT_FOLDER', '/MemoryGame2/'); 
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . PROJECT_FOLDER); 

session_start();

function currentPage($page) {

    if ($_SERVER['PHP_SELF'] == PROJECT_FOLDER . $page) {
        echo "class='currentPage'";
    }
    else {
        
    }
}

// ----------------------------------------------------------------
// ------------- FONCTIONS DANS LA PAGE MyAccount.php -------------
// ----------------------------------------------------------------

function selectUserInfos() { // Sélection les information de l'utilisateur connecté

    $pdo = connectToDbAndGetPdo();

    $pdoSelectUsers = $pdo->prepare('SELECT firstName, pseudo, email, inscription FROM users WHERE id = :userId ');
    $pdoSelectUsers->execute([":userId" => $_SESSION['userId']]); 
    $infosUserConnected = $pdoSelectUsers->fetchAll();

    foreach ($infosUserConnected as $row) {
        $firstName = $row->firstName;
        $pseudo = $row->pseudo;
        $email = $row->email;
        $inscription = $row->inscription;
    }

    return ['<h1>'. $firstName . '</h1>', 
            '<p>'. $pseudo . '</p>', 
            '<p>'. $email . '</p>', 
            '<p>'. $inscription . '</p>'];

}

function disconnectUser() { // Deconnecter un utilisateur

    unset($_SESSION['userId']);
    header("Location: index.php");
    exit;
}

// ----------------------------------------------------------------
// -------------- FONCTIONS DANS LA PAGE scores.php ---------------
// ----------------------------------------------------------------

function selectAllScores() { // Sélectionner tous les scores des utilisateurs
    
    $pdo = connectToDbAndGetPdo();
    $pdoRequest = $pdo->prepare(
        'SELECT U.id, G.gameName, U.pseudo, S.difficulty, S.scores
        FROM scores as S
        INNER JOIN users as U
        ON S.playerId = U.id
        INNER JOIN game as G 
        ON S.gameId = G.id
        ORDER BY S.scores ASC;
    ');
    $pdoRequest->execute();
    $scores = $pdoRequest->fetchAll();

    return $scores;
}

function selectScoresLike() { // Sélectionner tous les scores selon un recherche approximative sur le pseudo

    $_GET["search"] = htmlspecialchars($_GET["search"]); 
    $pseudo = $_GET["search"];
    $pseudo = trim($pseudo); 
    $pseudo = strip_tags($pseudo); 
    $pseudo = strtolower($pseudo);

    $pdo = connectToDbAndGetPdo();
    $pdoRequest = $pdo->prepare(
        'SELECT U.id, G.gameName, U.pseudo, S.difficulty, S.scores
        FROM scores as S
        INNER JOIN users as U
        ON S.playerId = U.id
        INNER JOIN game as G 
        ON S.gameId = G.id
        WHERE pseudo LIKE :search
        ORDER BY S.scores ASC;
    ');
    $pdoRequest->execute([":search" => "%$pseudo%"]);
    $scores = $pdoRequest->fetchAll();

    return $scores;

}

function displayScores($scores) { // Afficher une requête faites sur la table des scores

    if (empty($scores)) {

        return "<p id='emptyScore'>Aucun score trouvé</p>";
    };  

    $result = "";

    foreach ($scores as $row) {
        $gameName = $row->gameName;
        $pseudo = $row->pseudo;
        $difficulty = $row->difficulty;
        $score = $row->scores . " s";
        $idPlayer = $row->id;

        if (isset($_SESSION["userId"]) && $_SESSION["userId"] == $idPlayer) {
            $result .= "<tr class='connected'>";
            $result .= "<td><img src=". PROJECT_FOLDER . 'userFiles/'. $idPlayer . '/' . 'profile.jpg' . ">$pseudo</td>";
            $result .= "<td>$gameName</td>";
            $result .= "<td>$difficulty</td>";
            $result .= "<td>$score</td>";
            $result .= "</tr>";
        } else {
            $result .= "<tr>";
            $result .= "<td><img src=". PROJECT_FOLDER . 'userFiles/'. $idPlayer . '/' . 'profile.jpg' . ">$pseudo</td>";
            $result .= "<td>$gameName</td>";
            $result .= "<td>$difficulty</td>";
            $result .= "<td>$score</td>";
            $result .= "</tr>";
        }
    }

    return $result;

}