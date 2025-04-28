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

<div class="container">

<img class="image1" src="../public/img/sign-up-amico.png" alt="">

<!-- Formulaire d'ajout d'un message -->
<h2>Laissez-nous un message</h2>
<!-- Si pas de message -->
<form id="registrationForm">

                <label for="firsname">Prénom *</label>
                <input id="prenom" type="text" name="prenom">
                <label for="lastname">Nom *</label>
                <input id="nom" type="text" name="prenom">
                <label for="email">Email *</label>
                <input id="email" type="email" name="email" placeholder="email">
                <label for="postal">c/code postal *</label>
                <input id="postal" type="text" name="postal">
                <label for="portable">Portable *</label>
                <input id="portable" type="text" name="portable">
                <button type="submit">Envoyer </button>
            
</form>
</div>
<?php
// articles est un tableau vide
if(empty($messages)):
?>
<div class="nomessage">
<h3>Pas encore de message</h3>
<!-- Si 1 message -->
<h3>Il y a 1 message</h3>
<!-- Si plusieurs messages -->
<?php
// nous avons au moins un article
else:
    // on peut compter le nombre d'articles
    $nbMessage = count($message);
    // ternaire pour ajouter un s à article
    // si on en a plus d'un
    $pluriel = $nbMessage>1? "s" : "";
    ?>
<div class="messages">
<h3>Nous avons <?=$nbMessage?> message<?=$pluriel?></h3>
<hr>
<?php
    // tant qu'on a des messages
    foreach ($messages as $message):
    ?>
    <h3><?=$message['name']?></h3>
    <p><?=$message['message']?></p>
    <p><?=$message['created_at']?></p>
    <hr>
    <?php
    endforeach;
    ?>
    </div>
<?php
// fin du if
endif;


//var_dump($_POST,$_GET,);
?>

<!-- Pagination (BONUS) -->

<!-- Liste des messages -->
<ul>
    <li>
        <p><strong><?=$firstname?><?=$lastname?></strong></p>
        <p><em>datemessage</em></p>
        <p><</p>
    </li>
    <!-- Autres messages -->
    <li>
        <p><strong>firstname lastname</strong></p>
        <p><em>datemessage</em></p>
        <p>message</p>
    </li>
</ul>
etc ...
<!-- Pagination (BONUS) -->


<script src="validation.js"></script>
</body>
</html>

