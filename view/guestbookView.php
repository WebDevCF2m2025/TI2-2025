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
                    <div class="fild">
                        <label for="prenomID">Prénom :</label>
                        <input type="text" id="prenomID" name="prenom" placeholder="Entrez votre prénom">

                    </div>
                    <span class="span" id="prenomError"></span>
                    <div class="fild">
                        <label for="NomID">Nom :</label>
                        <input type="text" id="nomID" name="nom" placeholder="Entrez votre nom">

                    </div>
                    <span class="span" id="nomError"></span>
                    <div class="fild">
                        <label for="emailID">Email :</label>
                        <input type="text" id="emailID" name="email" placeholder="Entrez votre email">
                    </div>
                    <span class="span" id="emailError"></span>

                    <div class="fild">
                        <label for="nbPortablelID">Telephone :</label>
                        <input type="text" id="nbPortablelID" name="telephone" placeholder="Entrez numero de portable">
                    </div>
                    <span class="span" id="telephoneError"></span>


                    <div class="fild">
                        <label for="codePostalID">Code Postal :</label>
                        <input type="text" id="codePostal" name="codePostal" placeholder="Entrez Code Postal">
                    </div>
                    <span class="span" id="codePostalError"></span>


                    <div class="fild">
                        <label for="message">Message :</label>
                        <textarea id="messages" name="messages" rows="11" placeholder="Entrez votre message"></textarea>
                    </div>
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
        $a = "0";
        ?>


        <?php
        foreach ($afficher as $e):
            $date = date('d/m/Y H:i', strtotime($e['datemessage']));

            ?>
            <?php
            if ($a === "0") {
                ?>
                <div class="messagesTop">
                    <?php
                    $a = "1";
            } elseif ($a === "1") {
                ?>
                    <div class="messagesBottom">

                        <?php
                        $a = "0";
            }

            ?>


                    <br>
                    <strong> <?= $e['firstname'] . " " . $e['lastname'] ?> </strong> a écrit <?= $e['message'] ?> le
                    <?= $date ?>
                    <br>

                    <br>
                </div>
                <br>
                <?php
        endforeach;

        ?>





        </div>



        <script src="js/validation.js"></script>
</body>

</html>