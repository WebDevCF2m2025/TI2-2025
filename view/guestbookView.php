<?php
# view/guestbookView.php
?>
<!doctype html>
<html lang="be">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TI2 | Livre d'or</title>
    <link rel="icon" type="image/png" href="img/favicon.png">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>TI2 | Livre d'or</h1>

<div class="content-desktop">
    <div class="image">
        <img src="img/sign-up-amico.png">
    </div>

    <!-- Formulaire d'ajout d'un message -->
    <div class="form-block"> 
        <h2 class="avis">Laissez-nous un message</h2>
        <p id="verifEmail"></p>
        <p id="verifCP"></p>
        <p id="verifTel"></p>
        <p id="succes"></p>

        <div class="container">
            
            <form action="" id="formulaire" method="post">

                <div class="form-group">
                    <label for="firstname">Prénom *</label>
                    <input type="text" name="firstname" id="firstname" required>
                </div>
    
                <div class="form-group">
                    <label for="lastname">Nom *</label>
                    <input type="text" name="lastname" id="lastname" required>
                </div>
    
                <div class="form-group">
                    <label for="usermail">E-mail *</label>
                    <input type="email" name="usermail" id="usermail">
                </div>
    
                <div class="form-group">
                    <label for="postcode">c/postal *</label>
                    <input type="text" name="postcode" id="postcode">
                </div>
    
                <div class="form-group">
                    <label for="phone">Portable</label>
                    <input type="text" name="phone" id="phone">
                </div>
    
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" rows="10" maxlength="300" required></textarea>
                </div>
            
                <p id="caracCount">0/300 caractères</p>
                <button type="submit">Envoyer</button>
                
            </form>
        </div>
    </div>
</div>
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
    $pluriel = $nbMessage > 1 ? "s" : "";
?>

<div class="message">
    <h2>Les messages précédents</h2>
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
            <p><strong><?=$message['firstname'] . ' ' . $message['lastname']?></strong> - a écrit le message le <em><?=dateFR($message['datemessage'])?></em></p>
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
// echo "<h3>Nos var_dump() pour le débugage</h3>";
// echo '<p>$_POST</p>';
// var_dump($_POST);
// echo '<p>$_GET</p>';
//var_dump($_GET);
?>

<script src="js/validation.js"></script>
</body>
</html>

