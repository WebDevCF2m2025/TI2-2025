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
<img src="../public/img/sign-up-amico.png" alt="">
<!-- Formulaire d'ajout d'un message -->
<h2>Ici le formulaire</h2>
<div class="monForm">
        <form id="formulaire" method="post">
            <input type="text" name="name" id="name" placeholder="Nom">
            <input type="text" name="surname" id="surname" placeholder="Prénom">
            <input type="email" name="mail" id="mail" placeholder="Email">
            <input type="text" name="postal" id="postal" placeholder="Code postal">
            <input type="text" name="tel" id="tel" placeholder="Numéro de téléphone">
            <textarea id="message" name="message" placeholder="Votre message"></textarea>
            <button type="submit">Valider</button>
        </form>
    </div>
<hr>
<?php
    if(empty($nbMessage)):
      ?>
      <h3>Pas encore de message</h3>
    <?php else:
      $pluriel = $nbMessage>1? "s":"";
      ?>
      <!-- Si 1 message -->
      <h3>Le<?=$pluriel ?> message<?=$pluriel ?> précédent<?=$pluriel ?></h3>
      <h3 id="msg">Il y'a <?= $nbMessage ?> message<?=$pluriel ?></h3>
      <!-- Si plusieurs messages -->
    <?php
    endif;
    ?>
    <!-- Autres messages -->
   
etc ...
<!-- Pagination (BONUS) -->
<?php
// À commenter quand on a fini de tester
// echo "<h3>Nos var_dump() pour le débugage</h3>";
// echo '<p>$_POST</p>';
// var_dump($_POST);
// echo '<p>$_GET</p>';
// var_dump($_GET);
// ?>

<script src="js/validation.js"></script>
</body>
</html>

