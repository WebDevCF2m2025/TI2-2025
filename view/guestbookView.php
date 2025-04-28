<?php
# view/guestbookView.php
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TI2 | Livre d'or</title>
    <link rel="icon" type="image/png" href="../public/img/favicon.png">
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
<h1>TI2 | Livre d'or</h1>
<!-- Formulaire d'ajout d'un message -->
<h2>Laissez nous un message</h2>
<form action="" method="post">

    <label for="firstname">Prénom *</label>
    <input type="text" name="firstname" id="firstname" required>

    <label for="lastname">Nom *</label>
    <input type="text" name="lastname" id="lastname" required>

    <label for="usermail">E-mail *</label>
    <input type="email" name="usermail" id="usermail" required>

    <label for="postcode">c/postal *</label>
    <input type="text" name="postcode" id="postcode" required>

    <label for="phone">Portable</label>
    <input type="text" name="phone" id="phone" required>

    <label for="message">Message</label>
    <textarea name="message" id="message" rows="10"></textarea required>

    <button type="submit">Envoyer</button>

</form>

<?php
if(empty($nbMessage)):
?>
<!-- Si pas de message -->

<div class="nomessage">
    <h3>Pas encore de message</h3>
    <p>Veuillez consulter notre page plus tard</p>
</div>

<?php
// Si le tableau n'est pas vide
else:

    // Si le tableau n'est pas vide
    ;

    // On ajoute une variable pour le 's' de message si nécéssaire
    $pluriel = $nbMessages > 1 ? "s" : "";
?>

<div class="message">
    <!-- Si 1 message ou $pluriel plusieurs messages -->
    <h3>Il y a <?=$nbMessage?> message<?=$pluriel?></h3>

    <!-- Pagination (BONUS) -->
    <nav><?=$pagination?></nav>

    
    <?php
    foreach ($messages as $message):
    ?>
    <!-- Liste des messages -->
    <ul>
        <li>
            <p><strong><?=$message['firstname']?></strong></p>
            <p><em><?=$message['datemessage']?></em></p>
            <p><?=$message['message']?></p>
        </li>
    </ul>

    <?php
    endforeach;
    ?>
</div>


<!-- Pagination (BONUS) -->
<?php
endif;
echo"$pagination";
?>

<?php
// À commenter quand on a fini de tester
echo "<h3>Nos var_dump() pour le débugage</h3>";
echo '<p>$_POST</p>';
var_dump($_POST);
echo '<p>$_GET</p>';
var_dump($_GET);
?>

<script src="js/validation.js"></script>
</body>
</html>

