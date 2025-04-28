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
    $connexion = new PDO(DSN, DB_LOGIN, DB_PWD,[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
}catch (Exeption $e){
    die($e->getMessage());
}



/*
 * Si le formulaire a été soumis
 */

// on appelle la fonction d'insertion dans la DB (addGuestbook())

if(isset($_POST['firstname'], $_POST['lastname'], $_POST['usermail'],$_POST['phone'], $_POST['postcode'], $_POST['message'])){
    $save = addGuestbook($connexion,$_POST['firstname'], $_POST['lastname'], $_POST['usermail'],$_POST['phone'], $_POST['postcode'], $_POST['message']);
// si l'insertion a réussi

// on redirige vers la page actuelle (ou on affiche un message de succès)

// sinon, on affiche un message d'erreur

    if($save === true){
        $saved = "Message enregistré";
    }else{
        $notSaved = "Message NON enregistré";
    }
}



/*
 * On récupère les messages du livre d'or
 */

// on appelle la fonction de récupération de la DB (getAllGuestbook())

// $guestbook = getAllGuestbook($connexion);
// $count = count($guestbook);

/*********************
 * Ou Bonus Pagination
 *********************/

// on vérifie sur quelle page on est (et que c'est un string qui contient que des numériques sans "." ni "-" => ctype_digit) en utilisant la variable $_GET et les constantes de config.php

# on compte le nombre total de messages (SQL)

# on récupère la pagination

# pour obtenir le $offset pour les messages (calcul)

# on veut récupérer les messages de la page courante


if(
    isset($_GET[PAGINATION_GET]) 
    &&ctype_digit($_GET[PAGINATION_GET]) 
    &&!empty($_GET[PAGINATION_GET])
){

    $page = (int) $_GET[PAGINATION_GET];
}else{
    $page = 1;
}


$nbMessage = getNbTotalGuestbook($connexion);
$pagination = pagination($nbMessage,PAGINATION_GET,$page,PAGINATION_NB);
$offset = ($page-1)*PAGINATION_NB;
$messages = getGuestbookPagination($connexion,$offset,PAGINATION_NB);




/**************************
 * Fin du Bonus Pagination
 **************************/

// Appel de la vue

include "../view/guestbookView.php";

// fermeture de la connexion (bonne pratique)
$connexion = null;