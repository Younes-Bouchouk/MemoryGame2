<?php
    require_once './common.php';
    include SITE_ROOT . 'utils/database.php';

    $score = $_POST['score'];
    $level = $_POST['level'];
    
    if (empty($_SESSION['userId'])) {
        $player = NULL;
    } else {
        $player = $_SESSION['userId'];
    }

    $pdo = connectToDbAndGetPdo();

    $pdoImportUsers = $pdo->prepare('INSERT INTO scores (gameId, playerId, difficulty, scores) 
                                    VALUES(:game, :player, :difficulty, :score)');
    $pdoImportUsers->execute([
    ":game" => 1,
    ":player" => $player,
    ":difficulty" => $level,
    ":score" => $score,
    ]);



?>
