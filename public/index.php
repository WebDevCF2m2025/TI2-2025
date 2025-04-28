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

try{
    // nouvelle instance de PDO
    $db = new PDO(DB_DSN, DB_LOGIN, DB_PWD,
        // tableau d'options
        [
            // par défaut les résultats sont en tableau associatif
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            // Afficher les exceptions
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]
    );
}catch(Exception $e){
    // arrêt du script et affichage du code erreur, et du message
    die("Code : {$e->getCode()} <br> Message : {$e->getMessage()}");
}

/*
 * Si le formulaire a été soumis
 */

// Si on a envoyé le formulaire avec les bons champs
if (isset(
    $_POST['firstname'],
    $_POST['lastname'],
    $_POST['usermail'],
    $_POST['phone'],
    $_POST['postcode'],
    $_POST['message']
    )) {

    // on appelle la fonction d'insertion dans la DB (addGuestbook())

    // On va tenter l'insertion, car on a protégé addGuestbook()
    $insert = addGuestbook($db, 
        $_POST['firstname'],
        $_POST['lastname'],
        $_POST['usermail'],
        $_POST['phone'],
        $_POST['postcode'],
        $_POST['message']
    );

    // si l'insertion a réussi
    if($insert === true) {

        // on redirige vers la page actuelle (ou on affiche un message de succès)
        $success = "Nous vous remercions pour votre commentaire";
    } else {
        
        // sinon, on affiche un message d'erreur
        $error = $insert;
    }
}



/*
 * On récupère les messages du livre d'or
 */


// on appelle la fonction de récupération de la DB (getAllGuestbook())
# $messages = getAllGuestbook($db);

/*********************
 * Ou Bonus Pagination
 *********************/

// on vérifie sur quelle page on est (et que c'est un string qui contient que des numériques sans "." ni "-" => ctype_digit) en utilisant la variable $_GET et les constantes de config.php
if(
    isset($_GET[PAGINATION_GET]) // Existence
    &&ctype_digit($_GET[PAGINATION_GET]) // String ne contient que 0..9
    &&!empty($_GET[PAGINATION_GET]) // Pas vide
) {

    // Conversion de string à int pour la pagination
    $page = (int) $_GET[PAGINATION_GET];

// Nous sommes sur l'accueil OÙ la variable n'est pas conforme
} else {
    $page = 1;
}


# on compte le nombre total de messages (SQL)
$nbMessage = getNbTotalGuestbook($db);

# on récupère la pagination
$pagination = pagination($nbMessage, PAGINATION_GET, $page, PAGINATION_NB);

# pour obtenir le $offset pour les messages (calcul)
$offset = ($page-1) * PAGINATION_NB;

# on veut récupérer les messages de la page courante
$messages = getGuestbookPagination($db,$offset,PAGINATION_NB);
/**************************
 * Fin du Bonus Pagination
 **************************/

// Appel de la vue

include "../view/guestbookView.php";

// fermeture de la connexion (bonne pratique)
$db = null;