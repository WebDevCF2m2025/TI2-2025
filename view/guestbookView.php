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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container">
        <div id="titre">
            <h1>TI2 | Livre d'or</h1>
        </div>
        <div id="image" >
            <img src="img/sign-up-amico.png" alt="Image d'inscription">
        </div>
         <div id="titredeux" >
                <h2>Laissez-nous un message</h2>
        </div>
        <form id="form" action="" method="post">
           

            <div class="groupe">
            
                <label for="prenom">Prénom*</label>
                <input type="text" name="prenom" id="prenom" placeholder="Entrez votre nom" >
                
                <span id="prenomError" ></span>
                
            </div>
            <div class="groupe">
                <label for="nom">nom*</label>
                <input type="text" name="nom" id="nom" placeholder="Entrez votre prénom">
              
                <span id="nomError"></span>
            </div>
            <div class="groupe">
                <label for="email">E-mail*</label>
                <input type="email" name="email" id="email" placeholder="Entrez votre Email">
                
                <span id="emailError"></span>
            </div>
            <div class="groupe">
                <label for="postal">c/postal*</label>
                <input type="number" name="postal" id="postal" placeholder="Entrez votre code postale">
               
                <span id="postalError"></span>
            </div>
            <div class="groupe">
                <label for="portable">Portable*</label>
                <input type="number" name="portable" id="portable" placeholder="Entrez votre numéro de télé<phone">
                
                <span id="portableError"></span>
            </div>
            <div class="groupe">
                <label for="message">Message*</label>
                <textarea name="message" id="message" rows="10"  placeholder="saisisez ici ..."></textarea>
                <span id="messageError"></span>
            </div>
            <div>
                <button id="btn" type="submit">Envoyer</button>
            </div>
        </form>




<div class="pied-formulaire"  id="pied" >

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