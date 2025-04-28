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
<!-- Formulaire d'ajout d'un message -->
<h2>Ici le formulaire</h2>
<!-- Si pas de message -->
<form action="" method="post">
    <div>
    <div> 
        <label for="prenom">Prénom*</label>
        <input type="text" name="prenom" id="prenom" required>
    </div>
    <div> 
        <label for="nom">nom*</label>
        <input type="text" name="nom" id="nom" required>
    </div>
    <div>
        <label for="email">E-mail*</label>
        <input type="email" name="email" id="email" required>
    </div>
    <div>
        <label for="postal">c/postal*</label>
        <input type="number" name="postal" id="postal" required>
    </div>
    <div> 
        <label for="portable">Portable*</label>
        <input type="number" name="portable" id="portable" required>
    </div>
    <div>
        <label for="message">Message*</label>
        <textarea name="message" id="message" rows="10" required></textarea>
    </div>
    <div>
        <button type="submit">Envoyer</button>
    </div>
</form>

<?php
// si on a pas de message $nbMessage === 0
if(empty($nbtotalMessage )):
?>
 
<div class="nomessage">
<h3>Pas encore de message</h3>
</div>
<?php
else:
// le tableau n'est pas vide
    ;
    // on va ajouter une variable pour le 's' de message
    $pluriel = $nbtotalMessage >1? "s" : "";
?>
 
<div class="messages">
    <h3>Il y a <?=$nbtotalMessage ?> message<?=$pluriel?></h3>
    <nav><?=$pagination?></nav>
    <?php
    foreach ($messages as $message):
 
        ?>
       <ul>
    <li>
        <p><strong><?=$message['firstname']?></strong></p>
        <p><em><?=dateFR($message['datemessage'])?></em></p>
        <p><?=nl2br($message['message'])?></p>
    </li>
    <!-- Autres messages -->
  
</ul>
        <?php
        endforeach;
     
        ?>
     
    </div>
    <?php
    
    endif;
var_dump($insert, $_POST);
    ?>




<script src="js/validation.js"></script>
</body>
</html>

