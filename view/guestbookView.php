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
    <h2>Ici le formulaire</h2>

    <main>
        <div class="img">
            <img src="img/sign-up-amico.png" alt="img-form" id="image"/>
        </div>
        <form method="post" action="" class="form">
            <div class="champ">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom">
            </div>
            <div class="errorprenom show"></div>
            <div class="champ">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom">
            </div>
            <div class="errornom show"></div>
            <div class="champ">
                <label for="mail">Email :</label>
                <input type="email" id="mail" name="email">
            </div>
            <div class="erroremail show"></div>
            <div class="champ">
                <label for="tel">Telephone :</label>
                <input type="num" id="tel" name="telephone">
            </div>
            <div class="errortelephone show"></div>
            <div class="champ">
                <label for="code_postal">Code Postal :</label>
                <input type="num" id="postal" name="postal">
            </div>
            <div class="errorpostal show"></div>
            <div class="champ">
                <label for="message">Message :</label>
                <textarea type="text" id="message" name="message" rows="5"></textarea>
            </div>
            <button type="submit" id="button">Envoyer</button>
        </form>
    </main
        <?php
        if (empty($message)):
        ?>
        <div class="nomessage">
    <!-- Si pas de message -->
    <h3>Pas encore de message</h3>
    </div>
<?php
        else:
            $nbmessage = count($message);
            ($nbmessage > 1) ? $pluriel = "s" : $pluriel = "";
?>
    <!-- Si 1 message -->
    <h3>Il y a <?= $nbmessage ?> message<?= $pluriel ?></h3>
    <!-- Si plusieurs messages -->
    <?php
    foreach ($message as $messages):
    ?>
        <!-- Pagination (BONUS) -->

        <!-- Liste des messages -->
        <div class="message">
            <div class="messagecontenu">
                <p><strong><?= $messages['firstname'] ?> <?= $messages['lastname'] ?></strong></p>
                <p> - a écrit le message le <span><em><?= $messages['datemessage'] ?> : </em></span></p>
                <div><?= $messages['message'] ?></div>
            </div>
        </div>
    <?php
    endforeach;
    ?>
<?php
        endif;
?>
<!-- Pagination (BONUS) -->
<div class="pagination">
    <?php
    echo $pagination;
    ?>
</div>
<script src="js/validation.js"></script>
</body>

</html>