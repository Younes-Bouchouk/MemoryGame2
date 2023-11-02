<?php
    require_once './common.php';
    include SITE_ROOT . 'utils/database.php';

    $message = $_POST['message'];
    
    if (empty($_SESSION['userId'])) {
        $player = NULL;
    } else {
        $player = $_SESSION['userId'];
    }

    $pdo = connectToDbAndGetPdo();
    $pdoEnvoieMessage = $pdo->prepare('INSERT INTO messages (gameId, userId, messages) 
                                        VALUES  (1, :idDeMoi, :messageQueJenvoie)');            
    $pdoEnvoieMessage->execute([":idDeMoi" => $player,
                                ":messageQueJenvoie" => $message]);

    // ====================================================== 





?>