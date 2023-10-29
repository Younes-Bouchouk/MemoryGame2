<button id="chatbox-close" type="menu"></button>

    <div id="chatbox">

        <div id="screen">
    <?php  


    $pdo = connectToDbAndGetPdo();

        $pdoRequeteMessage = $pdo->prepare('SELECT messages, pseudo, userId  FROM messages INNER JOIN users ON users.id = messages.userId ORDER BY timeMessage ASC');            
        $pdoRequeteMessage->execute();
        $messages = $pdoRequeteMessage->fetchAll();

        foreach($messages as $message){
            
            if($message->userId == $_SESSION["userId"]){
                ?>
                <p class="me"><?=$message->messages ?></p>

                <?php
            }else{
                ?>
                <div class="sender"><img src="<?php echo PROJECT_FOLDER ;?>assets/pdp_younes.webp" alt=""> <section><?= $message->pseudo ?><span>- 18h45</span></section></div>
            <p class="other"><?= $message->messages ?></p>
            
            <?php
               
            }

        }   
    ?>


            <!-- <p class="me">Y'a qui ?</p>

            <div class="sender"><img src="<?php // echo PROJECT_FOLDER ;?>assets/pdp_younes.webp" alt=""> <section>Genzo <span>- 18h45</span></section></div>
            <p class="other">Moi. Mais j'veux pas jouer avec toi t'es trop guez. Tu fais que des team diff</p>

            <p class="me">Toi j'vais t'attraper à la coding t'es mort! Valérie ou pas tu vas voir</p>

            <div class="sender"><img src="<?php // echo PROJECT_FOLDER ;?>assets/pdp_alexis.jpg" alt=""> <section>DarkVador <span>- 19h01</span></section></div>
            <p class="other">Azy quand tu veux, où tu veux pelo</p>

            <p class="other">J'arrive avec mes poings</p>

            <p class="me">J'viens tout seul, tkt j'ai vraiment pas peur de toi!</p>
            
            <div class="sender"><img src="<?php // echo PROJECT_FOLDER ;?>assets/pdp_nicolas.webp" alt=""> <section>NicoPinguin <span>- 19h05</span></section></div>
            <p class="other">Azi, je ramène mes gants de boxe, on va niqué de fou la !</p>

            <p class="me">Aah, tu fais de la boxe XD j'savais pas</p>

            <p class="other">Je FF t'es trop un lâche</p>
             -->
            <?php $urlGif = "https://api.thecatapi.com/v1/images/search?mime_types=gif";
                $file =file_get_contents($urlGif);
                $futurImageGif = json_decode($file);
            ?>
            <img src="<?=$futurImageGif[0]->url?>" alt="">
        </div>

        <div id="envoyer-message">
            <form method="POST">

            <input type="text" name="contenu" id="message" placeholder="Entrez votre message" wrap="hard">
            <label for="message"></label>
            <input type="submit" id="send" name="sendMessages">
            <?php 
                if(isset($_POST["sendMessages"])){
                    if(!empty($_POST["contenu"])){

                        $pdoEnvoieMessage = $pdo->prepare('INSERT INTO messages (gameId, userId, messages) VALUES  (1, :idDeMoi, :messageQueJenvoie)');            
                        $pdoEnvoieMessage->execute([":idDeMoi" => $_SESSION["userId"],
                                                     ":messageQueJenvoie" => $_POST["contenu"]]);
                    }

                }
            ?>
            </form>

        </div>


    </div>