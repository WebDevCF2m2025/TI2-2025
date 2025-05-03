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

    <div>
        <?php
        $error = "";
        $thanks = "";
        if (isset($insert)) {
            if ($insert === true) {
                $thanks = "Message bien envoyé";
            } elseif ($insert === false) {
                $error = " Pas inséré côté serveur";
            }
        }

        ?>
    </div>
    <section>
        <h1>TI2 | Livre d'or</h1>
        <p id="success"></p>
        <p id="error"> </p>
        <form id="form" action="" method="post">
            <div class="inputs-container">
                <label for="lastname">Prénom</label> <br>
                <input type="text" name="firstname" id="firstname" placeholder="Jane"> <br>
                <label for="firstname">Nom</label> <br>
                <input type="text" name="lastname" id="lastname" placeholder="Doe"> <br>
                <label for="usermail">Email</label> <br>
                <input type="text" name="usermail" id="usermail" placeholder="janedoe@gmail.com"> <br>
                <label for="postcode">Postcode</label> <br>
                <input type="text" name="postcode" id="postcode" placeholder="1000"> <br>
                <label for="phone">Téléphone</label> <br>
                <input type="text" name="phone" id="phone" placeholder="0473 02 88 37 52"> <br>
                <div class="msg-container">
                    <label for="message">Message</label> <br>
                    <textarea name="message" id="message" maxlength="300"></textarea>
                    <p id="char-counter"><span>Tu as atteint la limite de caractères ! </span> / 300</p>
                </div> <br>
                <button type="submit">Envoyer</button>
            </div>
            <img src="../public/img/GpmkQB_XcAA09uf.jpeg" alt="form-img" width="500" height="800">
        </form>
    </section>


    <div id="post-container">
       
        <!-- Pagination (BONUS) -->
        <?php
        // À commenter quand on a fini de tester
        // echo "<h3>Nos var_dump() pour le débugage</h3>";
        // echo '<p>$_POST</p>';
        echo $_POST['firstname'] . ' à écrit : ';
        echo ($_POST['message']);
        ?>
    </div>

    <script src="../public//js/validation.js"></script>
</body>

</html>