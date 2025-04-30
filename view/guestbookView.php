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
<div class="container">
    <h2>Ici le formulaire</h2>

    <?php if (isset($erreur)):?>
        <h4 class="err"><?=$erreur?></h4>
    <?php endif; ?>

    <img src="img/sign-up-amico.png" height="400px" alt="">
    <div class="formulaire">

        <form action="" method="post">
            <div class="bloc">
                <label for="firstname">Prenom *</label>
                <input type="text" name="firstname" id="firstname" maxlength="100" required>
            </div>

            <div class="bloc">
                <label for="lastname">Nom *</label>    
                <input type="text" name="lastname" id="lastname" maxlength="100" required>
            </div>

            <div class="bloc">
                 <label for="usermail">Email *</label>
                <input type="email" name="usermail" id="usermail" maxlength="200" required>
            </div>

            <div class="bloc">
                <label for="postcode">c /postal *</label>
                <input type="text" name="postcode" id="postcode" maxlength="4" required>  
            </div>

            <div class="bloc">
                <label for="phone">Portable *</label>
                <input type="tel" name="phone" id="phone" maxlength="20" required>
            </div>

            <div class="bloc">
                <label for="message">Message *</label>
                <textarea name="message" id="message" rows="6" maxlength="300" required style = "resize: none;"></textarea>
            </div> 

            <button type="submit">Envoyer</button>
        </form>
    </div>
</div>

<?php
// si on a pas de message $nbMessage === 0
if(empty($nbMessage)):
?>

<div class="nomessage">
    <h2>Pas de message</h2>
    <p>Veuillez consulter cette page plus tard</p>
</div>
<?php
else:    
    $pluriel = $nbMessage>1? "s" : "";
?>

<div class="messages">
    <h2>Il y a <?=$nbMessage?> message<?=$pluriel?></h2>
    
<?php
    foreach ($getmessage as $message):
?>

    <ul>
        <li>
            <p><strong>
            <?=$message['firstname']." ".$message['lastname'] ?>
            </strong></p>
            <p><em>
            <?=dateFR($message['datemessage'])?>
            </em></p>
            <p><?=nl2br($message['message'])?></p>    
        </li>
    </ul>
    <?php
    endforeach;
endif;
    ?>


<!-- Pagination (BONUS) -->
<?php
// À commenter quand on a fini de tester
// echo "<h3>Nos var_dump() pour le débugage</h3>";
// echo '<p>$_POST</p>';
// var_dump($_POST);
// echo '<p>$_GET</p>';
// var_dump($_GET);

?>

<script src="js/validation.js"></script>
</body>
</html>

