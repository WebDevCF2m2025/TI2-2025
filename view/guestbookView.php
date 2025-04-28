<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/js/validation.js">
    
    <title>Formulaire</title>
</head>
<body>

<div class="container">
<h1>TI2|Livre d'or</h1>

<form action="" method="post">

    <div id="name">
        <label for="NomID">Nom</label>
        <input type="text" id="NomID" name="firstname" placeholder="Entrez votre nom" required>
        <span class="error-message" id="NomError"></span>
    </div>

    <div id="prenom">
        <label for="prenomID">Prénom</label>
        <input type="text" id="prenomID" name="lastname" placeholder="Entrez votre prénom" required>
        <span class="error-message" id="PrenomError"></span>
    </div>

    <div id="email">
        <label for="emailID">Email</label>
        <input type="email" id="emailID" name="usermail" placeholder="Entrez votre email" required>
        <span class="error-message" id="EmailError"></span>
    </div>

    <div id="telephone">
        <label for="telephoneID">Téléphone</label>
        <input type="tel" id="telephoneID" name="phone" placeholder="Entrez votre téléphone" required>
        <span class="error-message" id="TelephoneError"></span>
    </div>

    <div id="postcode">
        <label for="postcodeID">Code postal</label>
        <input type="tel" id="postcodeID" name="postcode" placeholder="Entrez votre code postal" required>
        <span class="error-message" id="postcodeError"></span>
    </div>

    <div id="message">
        <label for="messageID">Message</label>
        <textarea id="messageID" name="message" rows="11" placeholder="Entrez votre message" required></textarea>
        <span class="error-message" id="MessageError"></span>
    </div>
    <button type="submit" id="btn">Envoyer</button>
    
  
    
</form>
<div class="photoSignUpAmico">
<img  src="../public/img/sign-up-amico.png" alt="">
</div> 

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
            <h3><?= htmlspecialchars($article['firstname']) ?></h3>
            <h3><?= htmlspecialchars($article['lastname']) ?></h3>
            <h3><?= htmlspecialchars($article['usermail']) ?></h3>
            <h3><?= htmlspecialchars($article['phone']) ?></h3>
            <h3><?= htmlspecialchars($article['postcode']) ?></h3>
            <h3><?= htmlspecialchars($article['message']) ?></h3>
            <br>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; 
    echo "<h3>Nos var_dump() pour le débugage</h3>";
    echo '<p>$_POST</p>';
    var_dump($_POST);
    echo '<p>$_GET</p>';
    var_dump($_GET,$articles);
    
    
    ?>  
    
<script src="../js/validation.js"></script>
</body>
</html>