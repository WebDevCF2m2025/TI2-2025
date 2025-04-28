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
    <div class="container">
        <div>
            <h1>TI2 | Livre d'or</h1>
        </div>
        <div>
            <img src="img/sign-up-amico.png" alt="Image d'inscription">
        </div>
         <div>
                <h2>Laissez-nous un message</h2>
        </div>
        <form action="" method="post">
           

            <div>
                <label for="prenom">Prénom*</label>
                <input type="text" name="prenom" id="prenom" required>
                <span id="PrenomError" ></span>
            </div>
            <div>
                <label for="nom">nom*</label>
                <input type="text" name="nom" id="nom" required>
                <span id="nomError"></span>
            </div>
            <div>
                <label for="email">E-mail*</label>
                <input type="email" name="email" id="email" required>
                <span id="emailError"></span>
            </div>
            <div>
                <label for="postal">c/postal*</label>
                <input type="number" name="postal" id="postal" required>
                <span id="postalError"></span>
            </div>
            <div>
                <label for="portable">Portable*</label>
                <input type="number" name="portable" id="portable" required>
                <span id="portableError"></span>
            </div>
            <div>
                <label for="message">Message*</label>
                <textarea name="message" id="message" rows="10" required></textarea>
                <span id="messageError"></span>
            </div>
            <div>
                <button id="btn" type="submit">Envoyer</button>
            </div>
        </form>




<div class="pied-formulaire">

        <?php
        
        // si on a pas de message $nbMessage === 0
        if (empty($nbtotalMessage)):
        ?>

            <div class="nomessage">
                <h3>Pas encore de message</h3>
            </div>
        <?php
        else:
                // le tableau n'est pas vide
            ;
            // on va ajouter une variable pour le 's' de message
            $pluriel = $nbtotalMessage > 1 ? "s" : "";
        ?>

            <div class="messages">
                <h2>Les messages précédents</h2>
                <h3>Il y a <?= $nbtotalMessage ?> message<?= $pluriel ?></h3>
                <nav><?= $pagination ?></nav>
                <?php
                foreach ($messages as $message):

                ?>
                    <div class="messagees">
                        <strong><?= $message['firstname'] ?></strong> a écrit ce message le <?= dateFR($message['datemessage']) ?> <br> <?= nl2br($message['message']) ?>  </h5>
                    </div>     
                <?php
                endforeach;

                ?>

            </div>
        <?php

        endif;

        ?>

</div>

    </div>
    <script src="js/validation.js"></script>
</body>

</html>