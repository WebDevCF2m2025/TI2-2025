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
<h1> TI2 | Livre d'or</h1>
<!-- Formulaire d'ajout d'un message -->
<h2>Laissez-nous un message</h2>
<div class="tout"> <div class="image"><img src="img/sign-up-amico.png" alt=""></div>


<div class="formu">
    <form action="" method="POST">
        <div class="un"><label for="firstname">firstname</label>
        <input type="text" name="firstname" id="firstname"></div>
        <div class="deux">     <label for="lastname">lastname</label>
        <input type="text" name="lastname" id="lastname"></div>
   <div class="trois">   <label for="usermail">usermail</label>
        <input type="email" name="email" id="email"></div>
     <div class="quatre"> <label for="phone">phone</label>
        <input type="text" name="phone" id="phone"></div>
       <div class="cinq">       <label for="postcode">postcode</label>
        <input type="text" name="postcode" id="postcode"></div>
 <div class="six">    <textarea name="message" id="message" rows="10" required></textarea></div>
    
        <button type="submit" >envoyer</button>
    </form>
</div></div>
<div class="reste">
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
</div>

<script src="js/validation.js"></script>
</body>
</html>

