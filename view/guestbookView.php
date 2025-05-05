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




<!-- Formulaire d'ajout d'un message -->


<div class="container">
  <div id="topmsg" ><br></div>
  <form action="" method="post" id="form">
    <h1>Laissez un message</h1>
    <div class="input-control">
      <label for="firstname">Prénom :</label>
      <input type="text" name="firstname" id="firstname" />
      <div class="error"></div>
    </div>
    <div class="input-control">
      <label for="lastname">Nom :</label>
      <input type="text" name="lastname" id="lastname" />
      <div class="error"></div>
    </div>
    <div class="input-control">
      <label for="usermail">E-mail :</label>
      <input type="text" name="usermail" id="usermail" />
      <div class="error"></div>
    </div>
    <div class="input-control">
      <label for="phone">Téléphone :</label>
      <input type="text" name="phone" id="phone"/>
      <div class="error"></div>
    </div>
    <div class="input-control">
      <label for="postcode">Code postal :</label>
      <input type="text" name="postcode" id="postcode"/>
      <div class="error"></div>
    </div>
    <div class="input-control">
      <label for="message">Message : </label>
      <textarea name="message" id="message" cols="30" rows="10" maxlength="300"></textarea>
      <div class="error"></div>
    </div>
    <div id="the-count">
      <span id="wordCount">0</span>
      <span >/ 300 caractères</span>
    </div>
    <button type="submit">Envoyer</button>
  </form>
  <div class="history">
    <?php
    if(empty($nbGuessBook)):
      ?>
      <h3>Pas encore de message</h3>
    <?php else:
      $pluriel = $nbGuessBook>1? "s":"";
      ?>
      <!-- Si 1 message -->
      <h3>Le<?=$pluriel ?> message<?=$pluriel ?> précédent<?=$pluriel ?></h3>
      <h3 id="msg">Il y'a <?= $nbGuessBook ?> message<?=$pluriel ?></h3>
      <!-- Si plusieurs messages -->
    <?php
    endif;
    ?>

  </div>

  <?php foreach ($books as $book):  ?>
  <div class="messages">
    <div class="message"><p><?= $book['firstname'] ?> <?= $book['lastname'] ?> - a écrit le message le <?= $book['datemessage']?> <?= $book['message']?></p></div>
    <?php endforeach; ?>
  </div>
  <h3><?= $pagination ?></h3>
</div>

<script src="js/validation.js"></script>
</body>
</html>

