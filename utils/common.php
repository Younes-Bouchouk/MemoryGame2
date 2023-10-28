<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('ADMIN_MAIL', 'mail@gmail.com'); 
define('PROJECT_FOLDER', '/MemoryGame2/'); 
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . PROJECT_FOLDER); 

session_start();

// ---------- CONNEXION À LA TABLE SCORE DE LA BDD ----------

function selectAllScores() { // Selectionner tous les scores des utilisateurs
    
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

function selectScoresLike() { // Selectionner tous les scores selon un recherche approximative sur le pseudo

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
        $nickname = $row->pseudo;
        $difficulty = $row->difficulty;
        $score = $row->scores . " s";
        $idPlayer = $row->id;

        if (isset($_SESSION["userId"]) && $_SESSION["userId"] == $idPlayer) {
            $result .= "<tr>";
            $result .= "<td class='connected'>$gameName</td>";
            $result .= "<td class='connected'>$nickname</td>";
            $result .= "<td class='connected'>$difficulty</td>";
            $result .= "<td class='connected'>$score</td>";
            $result .= "</tr>";
        } else {
            $result .= "<tr>";
            $result .= "<td>$gameName.</td>";
            $result .= "<td>$nickname</td>";
            $result .= "<td>$difficulty</td>";
            $result .= "<td>$score</td>";
            $result .= "</tr>";
        }
    }

    return $result;

}