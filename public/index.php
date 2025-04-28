<?php

require_once "../config.php";

require_once "../model/guestbookModel.php";

try {
    $DB = new PDO(
        DB_DSN,
        DB_LOGIN,
        DB_PWD,
        [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]
    );
} catch (Exception $excep) {
    die("Code : {$excep->getCode()} <br> Message : {$excep->getMessage()}");
}

if (isset(
    $_POST['firstname'],
    $_POST['lastname'],
    $_POST['usermail'],
    $_POST['phone'],
    $_POST['postcode'],
    $_POST['message'],

)) {


    $insert = addGuestbook(
        $DB,
        $_POST['firstname'],
        $_POST['lastname'],
        $_POST['usermail'],
        $_POST['phone'],
        $_POST['postcode'],
        $_POST['message'],
    );
}

$msg = getAllGuestbook($DB);

/*********************
 * Ou Bonus Pagination
 *********************/

// on vérifie sur quelle page on est (et que c'est un string qui contient que des numériques sans "." ni "-" => ctype_digit) en utilisant la variable $_GET et les constantes de config.php

# on compte le nombre total de messages (SQL)

# on récupère la pagination

# pour obtenir le $offset pour les messages (calcul)

# on veut récupérer les messages de la page courante

/**************************
 * Fin du Bonus Pagination
 **************************/

// Appel de la vue

include "../view/guestbookView.php";

// fermeture de la connexion (bonne pratique)
$DB = null;