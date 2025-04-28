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
    <main>

        <h1>TI2 | Livre d'or</h1>
        <!-- <img class="signUp" src="../public/img/sign-up-amico.png" alt="Image tablette"> -->
        <p>Laissez nous un messages</p>
        <form action="" method="post" id="form">
            <label for="prenom">Prénom</label>
            <input id="name-input" type="text" name="prenom">
            <span id="spanName"></span>

            <label for="nom">Nom</label>
            <input id="surname-input" type="text" name="nom">
            <span id="spanSurname"></span>

            <label for="email">Email</label>
            <input id="email-input" type="email" name="email">
            <span id="spanEmail"></span>

            <label for="postal">Code Postal</label>
            <input id="postal-input" type="number" name="postal">
            <span id="spanPostal"></span>

            <label for="phone">Telephone</label>
            <input id="phone-input" type="number" name="phone">
            <span id="spanPhone"></span>

            <label for="message">Message</label>
            <textarea id="message-input" name="message" id="message"></textarea>
            <span id="spanMessage"></span>

            <button type="submit">Envoyez</button>
            <span id="spanGeneral"></span>
        </form>

        <?php if ($count === 0) : ?>
            <h3>Pas encore de message</h3>
        <?php else: ?>
            <?php if ($count === 1): ?>
                <h3>Il y a 1 message</h3>
            <?php else: ?>
                <h3>Il y a <?= $count ?> message<?= $count > 1 ? "s" : "" ?> </h3>
                <?php foreach ($messages as $message): ?>
                    <ul>
                        <li>
                            <p><strong><?= $message['firstname'] ?> <?= $message['lastname'] ?></strong></p>
                            <p><em><?= $message['datemessage'] ?></em></p>
                            <p><?= $message['message'] ?></p>
                        </li>
                    </ul>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endif; ?>

        <?= $pagination ?>
    </main>


    <script src="../public/js/validation.js"></script>
</body>

</html>