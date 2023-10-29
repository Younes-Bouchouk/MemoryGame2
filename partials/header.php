<?php 

    require_once SITE_ROOT. 'utils/common.php';
    require_once SITE_ROOT. 'utils/database.php';

    if (!empty($_SESSION['userId'])) {
        $pdo = connectToDbAndGetPdo();
        $pdoSelectUserConnected = $pdo->prepare('SELECT pseudo FROM users WHERE id = :userId ');
        $pdoSelectUserConnected->execute([":userId" => $_SESSION['userId']]); 
        $pseudoUserConnected = $pdoSelectUserConnected->fetch();
        $pseudoOfUserConnected = strtoupper($pseudoUserConnected->pseudo);

        $userId = $_SESSION['userId'];
        $pdpPath = PROJECT_FOLDER. 'userFiles/'. $userId . '/' . 'profile.jpg';

    } 

?>

<header>
        <h1 id="title">Memory Game</h1>
        <nav>
            <a <?php currentPage('index.php'); ?>               href= "<?php echo PROJECT_FOLDER; ?>/index.php">ACCUEIL</a>
            <a                                                  href= "<?php echo PROJECT_FOLDER ?>games/memory/">JEU</a>
            <a <?php currentPage('games/memory/scores.php'); ?> href= "<?php echo PROJECT_FOLDER ?>games/memory/scores.php">SCORES</a>
            <a <?php currentPage('contact.php'); ?>             href= "<?php echo PROJECT_FOLDER ?>contact.php">NOUS CONTACTER</a>
            
            <?php if(!isset($pseudoOfUserConnected)):?>
            <a <?php currentPage('login.php'); ?> href= "<?php echo PROJECT_FOLDER ?>login.php">CONNEXION
            <?php endif; ?></a>

            <?php if(isset($pseudoOfUserConnected)):?>
            <a <?php currentPage('myAccount.php'); ?> href= "<?php echo PROJECT_FOLDER ?>myAccount.php"> <?php echo $pseudoOfUserConnected ?>
            <?php endif; ?></a>

            <?php if(isset($pseudoOfUserConnected)):?>
            <img src="<?= $pdpPath ?>" id="pdp_header" >
            <?php endif; ?>

        </nav>
        <a id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </a>
</header>