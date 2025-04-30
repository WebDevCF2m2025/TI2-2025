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
    <link rel="stylesheet" href="css/monLayer.css">
</head>

<body>
    <main>
        <!-- titre, image et paragraphe -->
        <h1>TI2 | Livre d'or</h1>
        <img class="signUp" src="../public/img/sign-up-amico.png" alt="Image tablette">

        <p class="paragraphTitle">Laissez nous un messages</p>
        <!-- formulaire de methode POST et preparation des espaces pour afficher les erreurs javascripte -->
        <form method="POST" id="form">
            <div>
                <label for="prenom">Prénom</label>
                <input id="nameInput" type="text" name="prenom">
                <span id="spanName"></span>
            </div>

            <div>
                <label for="nom">Nom</label>
                <input id="surnameInput" type="text" name="nom">
                <span id="spanSurname"></span>
            </div>

            <div>
                <label for="email">Email</label>
                <input id="emailInput" type="email" name="email">
                <span id="spanEmail"></span>
            </div>

            <div>

                <label for="postal">Postal</label>
                <input id="postalInput" type="text" name="postal">
                <span id="spanPostal"></span>
            </div>

            <div>
                <label for="phone">Telephone</label>
                <input id="phoneInput" type="number" name="phone">
                <span id="spanPhone"></span>
            </div>

            <div>
                <label for="message">Message</label>
                <textarea id="messageInput" name="message" onkeydown="limite();"></textarea>

                <span id="spanMessage"></span>
            </div>
            <div id="limitation">
                <kbd id="compteur">0/300</kbd>
                <span id="errorLimit"></span>
            </div>
            <div>
                <button type="submit">Envoyez</button>
                <span id="spanGeneral"></span>
            </div>

        </form>

        <!-- affichage du tableau des messages recuperer -->
        <div class="message">
            <?php if ($count === 0) : ?>
                <h3>Pas encore de message</h3>
            <?php else: ?>
                <h3>Il y a <?= $count ?> message<?= $count > 1 ? "s" : "" ?> </h3>

                <?php if ($count > 1): ?>
                    <h2>Les précédents messages</h2>
                <?php else: ?>
                    <h2>Le précédent message</h2>

                <?php endif; ?>

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
                        <?php foreach ($messages as $message): ?>
                            <tr>
                                <td><?= $message['firstname'] ?></td>
                                <td><?= $message['lastname'] ?></td>
                                <td><em><?= $message['datemessage'] = date("d/m/Y H:i:s", strtotime($message['datemessage'])) ?></em></td>
                                <td><?= $message['message'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>

        <?= $pagination ?>
    </main>



    <script>
        // ajout de la limitation de charactere
        function limite() {
            let total = document.getElementById("messageInput").value.length + 1;
            document.getElementById("compteur").innerHTML = total + "/300";
            if (total > 300) {
                document.getElementById("messageInput").disabled = true;
                document.getElementById("compteur").innerHTML = "300/300";
                document.getElementById("errorLimit").innerHTML = "Limite atteinte !";
            }
        }
    </script>
    <script src="js/validation.js"></script>

</body>

</html>