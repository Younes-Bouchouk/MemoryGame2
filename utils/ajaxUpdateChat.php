<?php
    require_once './common.php';
    include SITE_ROOT . 'utils/database.php';

    header("Content-Type: application/json");

    $pdo = connectToDbAndGetPdo();

    // Requête pour récupérer les messages (vous devrez adapter cette requête à votre propre schéma de base de données)
    $query = $pdo->prepare('SELECT messages, pseudo, userId, timeMessage  
                            FROM messages 
                            INNER JOIN users 
                            ON users.id = messages.userId 
                            ORDER BY timeMessage ASC'
                            );     

    // Exécutez la requête
    $result = $pdo->query($query);

    // Renvoie les messages au format JSON
    $messages = $result->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($messages);
?>