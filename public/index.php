<?php
# public/index.php


/*
 * Front Controller de la gestion du livre d'or
 */

/*
 * Chargement des dépendances
 */
// chargement de configuration
require_once "../config.php";
// chargement du modèle de la table guestbook
require_once "../model/guestbookModel.php";

/*
 * Connexion à la base de données en utilisant PDO
 * Avec un try catch pour gérer les erreurs de connexion
 * Utilisez les constantes de config.php
 * Activez le mode d'erreur de PDO à Exception et
 * le mode fetch à tableau associatif
 */
try {
    // nouvelle instance de PDO
    $db = new PDO(
        DB_DSN,
        DB_LOGIN,
        DB_PWD,
        // tableau d'options
        [
            // par défaut les résultats sont en tableau associatif
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            // Afficher les exceptions
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]
    );
} catch (Exception $e) {
    // arrêt du script et affichage du code erreur, et du message
    die("Code : {$e->getCode()} <br> Message : {$e->getMessage()}");
}

/*
 * Si le formulaire a été soumis
 */
if (isset($_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['telephone'], $_POST['postal'], $_POST['message'])) {
    $insert = addGuestbook($db, $_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['telephone'], $_POST['postal'], $_POST['message']);
    if ($insert === true) {
        header("Location: ./");
        exit();
    } else {
        $error = $insert;
    }
}

// on appelle la fonction d'insertion dans la DB (addGuestbook())

// si l'insertion a réussi

// on redirige vers la page actuelle (ou on affiche un message de succès)

// sinon, on affiche un message d'erreur

/*
 * On récupère les messages du livre d'or
 */

//  $message = getAllGuestbook($db);

// on appelle la fonction de récupération de la DB (getAllGuestbook())

/*********************
 * Ou Bonus Pagination
 *********************/
if (isset($_GET[PAGINATION_GET]) && ctype_digit($_GET[PAGINATION_GET])) {
    // conversion de string vers int
    $page = (int) $_GET[PAGINATION_GET];
} else {
    $page = 1;
}

# on compte le nombre total de messages
$nbTotMessage = getNbTotalMessage($db);

# on récupère la pagination
$pagination = pagination($nbTotMessage, PAGINATION_GET, $page, PAGINATION_NB);

# pour obtenir le $offset pour les messages
$offset = ($page - 1) * PAGINATION_NB;

$message = getMessagePagination($db, $offset, PAGINATION_NB);

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

$db = null;
