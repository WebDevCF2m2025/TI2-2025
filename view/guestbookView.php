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
    <link rel="icon" type="image/png" href="../public/img/favicon.png">
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>
    <section class="title">
        <h1>TI2 | Livre d'or</h1>
        <!-- Formulaire d'ajout d'un message -->
        <h2>Laissez-nous un message</h2>
    </section>
    <section class="form-container">
        <img class="banner" src="../public/img/sign-up-amico.png" alt="form-img" width="500" height="500">
        <!-- This one is gonna be hidden on desktop -->
        <h2 class="subtitle">Laissez-nous un message</h2>
        <form id="form" action="" method="post">
            <div class="fieldset">
                <label id="prenom-label" for="prenom">Prénom *</label>
                <input type="text" name="prenom" id="prenom">
            </div> <br>
            <div class="fieldset">
                <label for="nom">Nom *</label>
                <input type="nom" name="nom" id="nom">
            </div> <br>
            <div class="fieldset">
                <label for="email">Email *</label>
                <input name="email" id="email" rows="10"></input>
            </div> <br>
            <div class="fieldset">
                <label for="">c/ Postal *</label>
                <input type="text" id="postal" name="postal">
            </div> <br>
            <div class="fieldset">
                <label for="portable">Portable *</label>
                <input type="text" name="portable" id="portable">
            </div> <br>
            <div class="message-field">
                <label for="message">Message *</label>
                <textarea name="message" id="message"></textarea> <br>
            </div>
            <button id="btn" type="submit">Envoyer</button>
        </form>
    </section>
    <section>
        <!-- Si pas de message -->
        <h3>Pas encore de message</h3>
    </section>
    <?php
    // articles est un tableau vide
    if (empty($articles)):
    ?>
        <div class="nomessage">
            <h3>Pas encore d'article</h3>
        <?php
    // nous avons au moins un article
    else:
        // on peut compter le nombre d'articles
        $countArticle = count($articles);
        // ternaire pour ajouter un s à article
        // si on en a plus d'un
        $pluriel = $countArticle > 1 ? "s" : "";
        ?>
            <div class="messages">
                <h3>Nous avons <?= $countArticle ?> article<?= $pluriel ?></h3>
                <hr>

                <?php
                // tant qu'on a des articles
                foreach ($articles as $article):
                ?>
                    <h4><?= $article['prenom'] ?></h4>
                    <p><?= nl2br($article['nom']); // retour à la ligne automatique
                        ?></p>
                    <h5><?= $article['email'] ?></h5>
                    <hr>
            <?php
                endforeach;
            endif;
            ?>
            </div>
            <section class="msg-container">
                <?php
                #var_dump($_POST,$articles,$countArticle);
                ?>
                <!-- Si 1 message -->
                <h3>Il y a 1 message</h3>
                <!-- Si plusieurs messages -->
                <h3>Il y a X messages</h3>
            </section>



            <!-- Pagination (BONUS) -->

            <!-- Liste des messages -->
            <section>
                <ul>
                    <li>
                        <p><strong>firstname lastname</strong></p>
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
            </section>
            <!-- etc ... -->






            <!-- Pagination (BONUS)
    <?php
    // À commenter quand on a fini de tester
    echo "<h3>Nos var_dump() pour le débugage</h3>";
    echo '<p>$_POST</p>';
    var_dump($_POST);
    echo '<p>$_GET</p>';
    var_dump($_GET);
    ?> -->

            <script src="../js/validation.js"></script>
</body>

</html>