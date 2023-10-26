<?php 

require_once SITE_ROOT. 'utils/common.php';
require_once SITE_ROOT. 'utils/database.php';
// include SITE_ROOT . 'utils/database.php';

$_SESSION['userId'] = 0 ;

if (!empty($_SESSION['userId'])) {
    $pdo = connectToDbAndGetPdo();
    $pdoSelectUserConnected = $pdo->prepare('SELECT pseudo FROM users WHERE id = :userId ');
    $pdoSelectUserConnected->execute([":userId" => $_SESSION['userId']]); 
    $pseudoUserConnected = $pdoSelectUserConnected->fetch();
    $pseudoHeader = strtoupper($pseudoUserConnected->pseudo);

} else {
    $pseudoHeader = "MON COMPTE";
}

?>

<header>
        <h1 id="title">Memory Game</h1>
        <nav>
            <a href= "<?php echo PROJECT_FOLDER ?>index.php">ACCUEIL</a>
            <a href= "<?php echo PROJECT_FOLDER ?>games/memory/">JEU</a>
            <a href= "<?php echo PROJECT_FOLDER ?>games/memory/scores.php">SCORES</a>
            <a href= "<?php echo PROJECT_FOLDER ?>contact.php">NOUS CONTACTER</a>
            <a href= "<?php echo PROJECT_FOLDER ?>login.php">CONNEXION</a>
            <a href= "<?php echo PROJECT_FOLDER ?>myAccount.php"> <?php echo $pseudoHeader ;?> </a>


        </nav>
        <a id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </a>
</header>