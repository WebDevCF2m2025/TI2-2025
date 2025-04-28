<?php
# view/guestbookView.php
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TI2 | Livre d'or</title>
    <link rel="icon" type="image/png" href="img/favicon.png">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <h1>TI2 | Livre d'or</h1>
<div class="block">    
    <div>
        <div class="img">
            <img src="img/sign-up-amico.png" alt="">
        </div>
    </div>
    <div>
         <h2>Laissez nous un message</h2>
        <!-- Formulaire d'ajout d'un message -->
         <h2 id="bug"><h2>
        <form action="" method="POST" id="form">
            <div class="label">
                <label for="firstname">Prenom *</label>
                <input type="text" id="firstname" name="firstname">
            </div>
            <div class="label">
                <label for="lastname">Nom *</label>
                <input type="text" id="lastname" name="lastname">
            </div>
            <div class="label">
                <label for="usermail">Email *</label>
                <input type="text" id="usermail" name="usermail">
            </div>
            <div class="label">
                <label for="postcode">c/postal *</label>
                <input type="text" id="postcode" name="postcode">
            </div>
            <div class="label">
                <label for="phone">Portable *</label>
                <input type="text" id="phone" name="phone">
            </div>
            <div class="label">
                <label for="message">Message *</label>
                <textarea name="message" id="message"></textarea>
            </div>

            <button type="submit">Envoyer</button>
        </form>

    </div>
</div>
    <?php if(isset($saved)): ?>
        <h3 ><?=$saved?></h3>
    <?php elseif(isset($notSaved)):?>
        <h3 ><?=$notSaved?></h3>
    <?php endif;?>




    <!-- Si pas de message -->
    <?php if ($nbMessage == 0):?>
        <h3 class="h3rose">Pas encore de message</h3>
    <?php else : ?>
        <!-- Si 1 message et Si plusieurs messages -->
        <h3 class="h3rose"><?= $nbMessage>1?"Il y a " . $nbMessage . " messages": "Il y a " .  $nbMessage . " message"; ?></h3>
        <?php foreach($messages as $message):?>
            <div class="message">
                <p >Enregistré le : <?= goodDate($message['datemessage']);?></p>
                <h4 ><?= $message['firstname'];?></h4>
                <h4 ><?= $message['lastname'];?></h4>
                <p ><?= $message['message'];?></p>
            </div>

        <?php endforeach; ?>
    <?php endif; ?>

<!-- Pagination (BONUS) -->

<nav ><?=$pagination?></nav>  

<script src="js/validation.js"></script>
</body>
</html>

