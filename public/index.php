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
    $conn = new PDO(DSN, DB_LOGIN, DB_PWD, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (Exception $e) {
    echo "Message : " . $e->getMessage();
}




/*
 * Si le formulaire a été soumis
 */

if (isset($_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['phone'], $_POST['postal'], $_POST['message'])) {
    // si l'insertion a réussi
    // on appelle la fonction d'insertion dans la DB (addGuestbook())
    $insert = addGuestbook($conn, $_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['phone'], $_POST['postal'], $_POST['message']);
}


// on appelle la fonction de récupération de la DB (getAllGuestbook())
$messages = getAllGuestbook($conn);
// salut 


/*********************
 * Ou Bonus Pagination
 *********************/

// on vérifie sur quelle page on est (et que c'est un string qui contient que des numériques sans "." ni "-" => ctype_digit) en utilisant la variable $_GET et les constantes de config.php

# on compte le nombre total de messages (SQL)

# on récupère la pagination

# pour obtenir le $offset pour les messages (calcul)

# on veut récupérer les messages de la page courante

// compter le nombre de message
$count = count($messages);

// verifie si la variable PAGINATION_GET['pg'] existe et que l'entrée est une chaine de caractere en forme de nombre (ctype_digit)
if (isset($_GET[PAGINATION_GET]) && ctype_digit($_GET[PAGINATION_GET])) {
    // conversion de string vers int pour le numero de la page
    $page = (int) $_GET[PAGINATION_GET];
} else {
    // sinn la page prend la valeur de 1
    $page = 1;
}


# on compte le nombre total de messages
$nbTotMessage = getNbTotalGuestbook($conn);

# on récupère la pagination
$pagination = pagination($nbTotMessage, PAGINATION_GET, $page, PAGINATION_NB);

// Calcul de l'offset pour la pagination : 
// Si on est sur la page 2, on veut afficher à partir du 11e message (et non du 21e). 
// L'offset est donc calculé comme (page - 1) * nombre de messages à afficher par page.
$offset = ($page - 1) * PAGINATION_NB;

# on veut récupérer les messages de la page courante
$messages = getGuestbookPagination($conn,  $offset, PAGINATION_NB);
/**************************
 * Fin du Bonus Pagination
 **************************/

// Appel de la vue

include "../view/guestbookView.php";

// fermeture de la connexion (bonne pratique)
$conn = null;
