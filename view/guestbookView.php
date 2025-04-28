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
    <div></div>
    <div class="cont">
        <div class="a">TI2 | Livre d'or</div>
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
        <div class="b">
            <form id="formu" action="" method="POST">
                <div>Laissez-nous un message</div>
                <div class="merci"><?= $thanks ?></div>
                <divclass="erreur"><?= $error ?>
        </div>
        <label for="firstname">Prénom : </label><br>
        <input type="text" id="firstname" name="firstname" placeholder="John"><br>
        <label for="lastname">Nom : </label><br>
        <input type="text" id="lastname" name="lastname" placeholder="Wick"><br>
        <label for="usermail">E-mail : </label><br>
        <input type="text" id="usermail" name="usermail" placeholder="john.wick@mail.be"><br>
        <label for="postcode">Code postal : </label><br>
        <input type="text" id="postcode" name="postcode" placeholder="1000"><br>
        <label for="phone">Portable : </label><br>
        <input type="text" id="phone" name="phone" placeholder="0412345678"><br>
        <label for="message"></label><br>
        <textarea name="message" id="message" rows="5" placeholder="Insérez votre message"></textarea><br><br>
        <input type="submit" value="Envoyer">
        </form>
    </div>

    <!-- Pagination (BONUS) -->

    <!-- Liste des messages -->
    <div class="f">
        <hr>
        <?php
        if (empty($msg)):
        ?>
            <div class="nomessage">
                <h3>Pas encore de message</h3>
            <?php
        else:
            $countmsg = count($msg);
            $pluriel = $countmsg > 1 ? "s" : "";
            ?>
                <div class="messages">
                    <h3>Nous avons <?= $countmsg ?> message<?= $pluriel ?></h3>
                    <hr>

                    <?php

                    foreach ($msg as $m):
                    ?>
                        <h4><?= $m['firstname'] ?></h4>
                        <p><?= nl2br($m['message']);
                            ?></p>
                        <h5><?= $m['datemessage'] ?></h5>
                        <hr>
                <?php
                    endforeach;
                endif;
                ?>
                </div>
                <?php

                ?>
                <hr>
            </div>
            <div class="i">
                <img src="../public/img/sign-up-amico.png" alt="">
            </div>
    </div>
    <!-- Pagination (BONUS) -->
    <?php
    // À commenter quand on a fini de tester
    echo "<h3>Nos var_dump() pour le débugage</h3>";
    echo '<p>$_POST</p>';
    var_dump($_POST);
    echo '<p>$_GET</p>';
    var_dump($_GET);
    ?>

    <script src="../public/js/validation.js"></script>
</body>

</html>