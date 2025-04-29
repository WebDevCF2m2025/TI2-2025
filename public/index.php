<?php
# public/index.php


/*
 * Front Controller de la gestion du livre d'or
 */
require_once "../model/guestbookModel.php";
/*
 * Chargement des dépendances
 */
// chargement de configuration
require_once "../config.php";
// chargement du modèle de la table guestbook


/*
 * Connexion à la base de données en utilisant PDO
 * Avec un try catch pour gérer les erreurs de connexion
 * Utilisez les constantes de config.php
 * Activez le mode d'erreur de PDO à Exception et
 * le mode fetch à tableau associatif
 */


try {

    $conecte = new PDO(
        dns,
        DB_LOGIN,
        DB_PWD,
        [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,]
    );
} catch (Exception $e) {

    die("Code : {$e->getCode()} <br> Message : {$e->getMessage()}");
}

/*
 * Si le formulaire a été soumis
 */






$insert = null;
if (isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['telephone']) && isset($_POST['codePostal']) && isset($_POST['messages'])) {
    $insert = insert($conecte, $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['telephone'], $_POST['codePostal'], $_POST['messages']);
    // header('Location: ./');
    // exit;
}
if ($insert === true) {
    header('Location: ./');
    exit;
} 



$afficher = addAllProfAsk($conecte);

$con = null;
// on appelle la fonction d'insertion dans la DB (addGuestbook())

// si l'insertion a réussi

// on redirige vers la page actuelle (ou on affiche un message de succès)

// sinon, on affiche un message d'erreur

/*
 * On récupère les messages du livre d'or
 */

// on appelle la fonction de récupération de la DB (getAllGuestbook())

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

include_once "../view/guestbookView.php";

// fermeture de la connexion (bonne pratique)
