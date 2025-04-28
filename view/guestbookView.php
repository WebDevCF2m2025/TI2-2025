<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    
    <title>Formulaire</title>
</head>
<body>

<div class="container">
<h1>Formulaire de contact</h1>

<form action="" method="post">

    <div id="name">
        <label for="NomID">Nom</label>
        <input type="text" id="NomID" name="nom" placeholder="Entrez votre nom" required>
        <span class="error-message" id="NomError"></span>
    </div>

    <div id="prenom">
        <label for="prenomID">Prénom</label>
        <input type="text" id="prenomID" name="prenom" placeholder="Entrez votre prénom" required>
        <span class="error-message" id="PrenomError"></span>
    </div>

    <div id="email">
        <label for="emailID">Email</label>
        <input type="email" id="emailID" name="email" placeholder="Entrez votre email" required>
        <span class="error-message" id="EmailError"></span>
    </div>

    <div id="telephone">
        <label for="telephoneID">Téléphone</label>
        <input type="tel" id="telephoneID" name="telephone" placeholder="Entrez votre téléphone" required>
        <span class="error-message" id="TelephoneError"></span>
    </div>

    <div id="message">
        <label for="messageID">Message</label>
        <textarea id="messageID" name="message" rows="11" placeholder="Entrez votre message" required></textarea>
        <span class="error-message" id="MessageError"></span>
    </div>
    <button type="submit" id="btn">Envoyer</button>
    
        
    
</form>

</div>




<?php

$nbMessage = count($articles);
if(empty($nbMessage)): ?>
    <div class="nomessage">
        <h2>Pas de message</h2>
        <p>Veuillez consulter cette page plus tard</p>
    </div>
    <?php else:
         $pluriel = $nbMessage>1? "s" : "";
        ?>
    <div class="messages">
        <h2>Il y a <?=$nbMessage?> message<?=$pluriel?></h2>
      
    
        <?php foreach ($articles as $article): ?>
        <div class="article">
            <h3><?= htmlspecialchars($article['nom']) ?></h3>
            <h3><?= htmlspecialchars($article['prenom']) ?></h3>
            <h3><?= htmlspecialchars($article['email']) ?></h3>
            <h3><?= htmlspecialchars($article['telephon']) ?></h3>
            <h3><?= htmlspecialchars($article['message']) ?></h3>
            <br>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
    
<script src="script.js"></script>
</body>
</html>




<!-- <?php
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
</html> -->

