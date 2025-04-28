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

    <form action="" method="post" id="form">
        <label for="prenomID">Prénom</label>
        <input type="text" id="prenomID" name="prenom" placeholder="Entrez votre prénom">
        <span class="span" id="nomError"></span>

        <label for="NomID">Nom</label>
        <input type="text" id="nomID" name="nom" placeholder="Entrez votre nom">
        <span class="span" id="prenomError"></span>

        <label for="emailID">Email</label>
        <input type="email" id="emailID" name="email" placeholder="Entrez votre email">
        <span class="span" id="emailError"></span>


        <label for="nbPortablelID">Code Postal</label>
        <input type="text" id="nbPortablelID" name="telephone" placeholder="Entrez votre numero de portable">
        <span class="span" id="telephoneError"></span>

        <label for="codePostalID">Code Postal</label>
        <input type="text" id="codePostal" name="codePostal" placeholder="Entrez votre Code Postal">
        <span class="span" id="codePostalError"></span>

        <label for="message">Message</label>
        <textarea id="messages" name="messages" rows="11" placeholder="Entrez votre message"></textarea>
        <span class="span" id="messageError"></span>

        <button type="submit" id="btn">Envoyer</button>
    </form>
    <?php
    $error = "";
    $thanks = "";
    if (isset($insert)) {
        if ($insert === true) {
            $thanks = "Message bien envoyé";
        } elseif ($insert === false) {
            $error = "Pas inséré côté serveur";
        }
    }
    ?>
    <?
    foreach ($afficher as $e):
        ?>
        <p><strong><? $e['firstname'] ?>omer</strong></p>
        <hr>
        <?php


        ?>
    <?
    endforeach;
    ?>

    <!-- Pagination (BONUS) -->

    <!-- Liste des messages -->
    <ul>
        <li>
            <p><strong><? ?></strong></p>
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
    var_dump($_GET, $insert, $afficher);
    ?>

    <script src="js/validation.js"></script>
</body>

</html>