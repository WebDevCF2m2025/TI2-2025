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
<img src="img/sign-up-amico.png" id="sign-img">
<form action=""  method="post" id="form">
  <h2>Laissez un message</h2>
  <div class="input-control">
    <label for="firstname">Prénom</label>
    <input type="text" name="firstname" id="firstname">
    <div class="error"></div>
  </div>

  <div class="input-control ">
    <label for="lastname">Nom</label>
    <input type="text" name="lastname" id="lastname">
    <div class="error"></div>
  </div>

  <div class="input-control">
    <label for="usermail">E-mail</label>
    <input type="text" name="usermail" id="usermail">
    <div class="error"></div>
  </div>

  <div class="input-control">
    <label for="phone">Phone</label>
    <input type="text" name="phone" id="phone" value="32">
    <div class="error"></div>
  </div>

  <div class="input-control">
    <label for="postcode">c/postalcode</label>
    <input type="text" name="postcode" id="postcode">
    <div class="error"></div>
  </div>

    <div class="input-control">
      <label for="message">Message</label>
      <textarea  name="message" id="message" maxlength="300"></textarea>
      <div class="error"></div>
    </div>
  <div id="the-count">
    <span id="wordCount">0</span>
    <span >/ 300 caractères</span>
  </div>

  <button type="submit">Envoyer</button>
</form>
<!-- Si pas de message -->
  <?php
  if(empty($nbGuessBook)):
    ?>
    <h3>Pas encore de message</h3>
  <?php else:
    $pluriel = $nbGuessBook>1? "s":"";
    ?>
    <!-- Si 1 message -->
    <h3>Le<?=$pluriel ?> message<?=$pluriel ?> précédent<?=$pluriel ?></h3>
    <h3>Il y a <?= $nbGuessBook ?> message<?=$pluriel ?></h3>
    <!-- Si plusieurs messages -->
  <?php
  endif;
  ?>



<!-- Pagination (BONUS) -->
<!-- Liste des messages -->
  <?php foreach ($books as $book):  ?>
  <div class="message-cont">
        <div class="message"><?= $book['firstname'] ?> <?= $book['lastname'] ?> - a écrit le message le <?= $book['datemessage']?> <?= $book['message']?></div>
  <?php endforeach; ?>
  </div>
</div>

  <h3><?= $pagination ?></h3>

<?php
// À commenter quand on a fini de tester
//echo "<h3>Nos var_dump() pour le débugage</h3>";
//echo '<p>$_POST</p>';
//var_dump($_POST);
//echo '<p>$_GET</p>';
//var_dump($_GET);
// var_dump($nbGuessBook);

?>

<script src="js/validation.js"></script>
</body>
</html>

