<?php 

require_once SITE_ROOT. 'utils/common.php';
require_once SITE_ROOT. 'utils/database.php';
// include SITE_ROOT . 'utils/database.php';

// $_SESSION['userId'] = 1 ;

if (!empty($_SESSION['userId'])) {
    $pdo = connectToDbAndGetPdo();
    $pdoSelectUserConnected = $pdo->prepare('SELECT pseudo FROM users WHERE id = :userId ');
    $pdoSelectUserConnected->execute([":userId" => $_SESSION['userId']]); 
    $pseudoUserConnected = $pdoSelectUserConnected->fetch();
    $pseudoOfUserConnected = strtoupper($pseudoUserConnected->pseudo);

} else {
    // $pseudoOfUserConnected = "MON COMPTE";
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
            <a href= "<?php echo PROJECT_FOLDER ?>myAccount.php"> <?php if(isset($pseudoOfUserConnected)):?>
                                                                <p><?php echo $pseudoOfUserConnected ?></p>
                                                            <?php endif; ?> </a>
            <!-- <echo "<a href='$url'>$texte_du_lien</a>" -->



        </nav>
        <a id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </a>
</header>