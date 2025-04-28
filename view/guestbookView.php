<?php
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
        <!-- titre, image et paragraphe -->
        <h1>TI2 | Livre d'or</h1>
        <img class="signUp" src="../public/img/sign-up-amico.png" alt="Image tablette">
        <p>Laissez nous un messages</p>

        <!-- formulaire de methode POST et preparation des espaces pour afficher les erreurs javascripte -->
        <form action="" method="post" id="form">
            <div>
                <label for="prenom">Prénom</label>
                <input id="name-input" type="text" name="prenom">
                <span id="spanName"></span>
            </div>

            <div>
                <label for="nom">Nom</label>
                <input id="surname-input" type="text" name="nom">
                <span id="spanSurname"></span>
            </div>

            <div>
                <label for="email">Email</label>
                <input id="email-input" type="email" name="email">
                <span id="spanEmail"></span>
            </div>

            <div>

                <label for="postal">Postal</label>
                <input id="postal-input" type="number" name="postal">
                <span id="spanPostal"></span>
            </div>

            <div>
                <label for="phone">Telephone</label>
                <input id="phone-input" type="number" name="phone">
                <span id="spanPhone"></span>
            </div>

            <div>
                <label for="message">Message</label>
                <textarea id="message" name="message" onkeydown="limite();" ></textarea>

                <span id="spanMessage"></span>
            </div>

            <div>
                <button type="submit">Envoyez</button>
                <span id="spanGeneral"></span>
            </div>

            <kbd id="compteur">0/300</kbd>

        </form>

        <!-- affichage du tableau des messages recuperer -->
        <div class="message">
            <h2>Les précedents messages</h2>
            <!-- 0 message ? affiche le h3 pas encors de messages h3 -->
            <?php if ($count === 0) : ?>
                <h3>Pas encore de message</h3>
            <?php else: ?>
                page 1 ?
                <?php if ($count === 1): ?>
                    <h3>Il y a 1 message</h3>
                <?php else: ?>
                    <h3>Il y a <?= $count ?> message<?= $count > 1 ? "s" : "" ?> </h3>
                    <?php foreach ($messages as $message): ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>Prénom</th>
                                    <th>Nom</th>
                                    <th>Date</th>
                                    <th>Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $message['firstname'] ?></td>
                                    <td><?= $message['lastname'] ?></td>
                                    <td><em><?= $message['datemessage'] ?></em></td>
                                    <td><?= $message['message'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>

    </main>
    <?= $pagination ?>


    <script src="../public/js/validation.js"></script>

    <script>
        // ajout de la limitation de charactere
        function limite() {
            let total = document.getElementById("message").value.length + 1;
            document.getElementById("compteur").innerHTML = total + "/300";
            if (total > 300) {
                document.getElementById("message").disabled= true;
                document.getElementById("compteur").innerHTML = "300/300";
            }
        }
    </script>
</body>

</html>