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

<?php
$error = "";
$thanks ="";
if(isset($insert)){
  if($insert===true) {
    $thanks = "Message bien envoyé";
  }elseif($insert===false){
    $error ="Pas inséré côté serveur";
  }
}

?>

<h3 class="merci"><?=$thanks?></h3>
<h3 class="erreur"><?=$error?></h3>

<!-- Formulaire d'ajout d'un message -->
<h2>Ici le formulaire</h2>
<form action=""  method="post" id="form">
  <label for="firstname">Prenom</label>
  <input type="text" name="firstname" id="firstname">
  <label for="lastname">Nom</label>
  <input type="text" name="lastname" id="lastname">
  <label for="usermail">E-mail</label>
  <input type="text" name="usermail" id="usermail">
  <label for="phone">Phone</label>
  <input type="text" name="phone" id="phone">
  <label for="postcode">c/postalcode</label>
  <input type="text" name="postcode" id="postcode">
  <label for="message">Message</label>
  <input type="text" name="message" id="message">
  <button type="submit">Envoyer</button>
<!-- Si pas de message -->
  <?php
  if(empty($nbGuessBook)):
?>
<h3>Pas encore de message</h3>
  <?php else:
    $pluriel = $nbGuessBook>1? "s":"";
  ?>
<!-- Si 1 message -->

<h3>Il y a <?= $nbGuessBook ?> message<?=$pluriel ?></h3>
<!-- Si plusieurs messages -->
  <?php
  endif;
  ?>
<h3>Il y a  <?= $nbGuessBook ?>  messages</h3>

<!-- Pagination (BONUS) -->
  <h3><?= $pagination ?></h3>
<!-- Liste des messages -->
  <?php foreach ($books as $book):  ?>
<ul>
    <li>
        <p><strong><?= $book['firstname'] ?> <?= $book['lastname'] ?></strong></p>
        <p><em><?= $book['datemessage']?> </em></p>
        <p><?= $book['message']?></p>
    </li>
  <?php endforeach; ?>
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

