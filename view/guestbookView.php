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
    <form action="" method="POST" style="display:flex; flex-direction: column; width: 80%; margin: auto;">
        <label for="firstname">prenom *</label>
        <input type="text" id="firstname" name="firstname">

        <label for="lastname">Nom *</label>
        <input type="text" id="lastname" name="lastname">

        <label for="usermail">Email *</label>
        <input type="email" id="usermail" name="usermail">

        <label for="postcode">c/postal *</label>
        <input type="text" id="postcode" name="postcode">

        <label for="phone">Portable *</label>
        <input type="text" id="phone" name="phone">

        <label for="message">Message *</label>
        <textarea name="message" id="message"></textarea>

        <button type="submit">Envoyer</button>
    </form>
    <?php if(isset($saved)): ?>
        <h3 style="text-align: center;"><?=$saved?></h3>
    <?php elseif(isset($notSaved)):?>
        <h3 style="text-align: center;"><?=$notSaved?></h3>
    <?php endif;?>

<h2>Ici le formulaire</h2>
<!-- Si pas de message -->
<h3>Pas encore de message</h3>
<!-- Si 1 message -->
<h3>Il y a 1 message</h3>
<!-- Si plusieurs messages -->
<h3>Il y a X messages</h3>

<!-- Pagination (BONUS) -->

<!-- Liste des messages -->
<ul>
    <li>
        <p><strong>firstname lastname</strong></p>
        <p><em>datemessage</em></p>
        <p>message</p>
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

