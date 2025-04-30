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

    <div id="bigContainer">
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


        <h1>TI2 | Livre d'or</h1>
        <!-- Formulaire d'ajout d'un message -->

        <h3 class="merci"><?= $thanks ?></h3>
        <h3 class="erreur"><?= $error ?></h3>
        <div id="imgForm">



            <div id="img">
                <img src="img/sign-up-amico.png" width="400px" height="400px" alt="">

            </div>
            <div class="formeContainer">
                <form action="" method="post" id="form">
                    <label for="prenomID">Prénom</label>
                    <input type="text" id="prenomID" name="prenom" placeholder="Entrez votre prénom">
                    <span class="span" id="prenomError"></span>

                    <label for="NomID">Nom</label>
                    <input type="text" id="nomID" name="nom" placeholder="Entrez votre nom">
                    <span class="span" id="nomError"></span>

                    <label for="emailID">Email</label>
                    <input type="text" id="emailID" name="email" placeholder="Entrez votre email">
                    <span class="span" id="emailError"></span>


                    <label for="nbPortablelID">Telephone</label>
                    <input type="text" id="nbPortablelID" name="telephone"
                        placeholder="Entrez votre numero de portable">
                    <span class="span" id="telephoneError"></span>

                    <label for="codePostalID">Code Postal</label>
                    <input type="text" id="codePostal" name="codePostal" placeholder="Entrez votre Code Postal">
                    <span class="span" id="codePostalError"></span>

                    <label for="message">Message</label>
                    <textarea id="messages" name="messages" rows="11" placeholder="Entrez votre message"></textarea>
                    <span class="span" id="messageError"></span>

                    <button type="submit" id="btn">Envoyer</button>
                </form>



            </div>
        </div>


        <?php

        $nbMessage = count($afficher);

        $message = "";
        if ($nbMessage <= 0) {
            $message = "Pas encore de message";
        } elseif ($nbMessage == 1) {
            $message = "Il y a 1 message";
        } else {
            $message = " Il y a " . $nbMessage . " " . "messages";
        }
        ?>
        <h2><?= $message ?></h2>





        <?php
        foreach ($afficher as $e):
            $date = date('d/m/Y H:i', strtotime($e['datemessage']));

            ?>
            <div class="messagees">
                <br>
                <strong> <?= $e['firstname'] . " " . $e['lastname'] ?> </strong> a écrit <?= $e['message'] ?> le
                <?= $date ?>
                <br>
                <br>
                <hr>

            </div>
            <?php
        endforeach;

        ?>


        <?php
        // À commenter quand on a fini de tester
        echo "<h3>Nos var_dump() pour le débugage</h3>";
        echo '<p>$_POST</p>';
        var_dump($_POST);
        echo '<p>$insert</p>';
        var_dump($insert);
        echo '<p>$_GET</p>';
        var_dump($_GET, $nbMessage);
        ?>


    </div>



    <script src="js/validation.js"></script>
</body>

</html>