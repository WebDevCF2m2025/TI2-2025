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
  $db = new PDO(
    DB_DRIVER . ":host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET,
    DB_LOGIN,
    DB_PWD,
    [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]
);
  } catch (Exception $e) {

# ici notre code de traitement de la page
die("Code : {$e->getCode()} <br> Message : {$e->getMessage()}");
}

/*
 * Si le formulaire a été soumis
 */

// on appelle la fonction d'insertion dans la DB (addGuestbook())
// si l'insertion a réussi

// on redirige vers la page actuelle (ou on affiche un message de succès)

// sinon, on affiche un message d'erreur
if (isset($_POST['name'], $_POST['surname'], $_POST['mail'], $_POST['postal'], $_POST['tel'], $_POST['message'])) {

    $insert = addGuestbook($db,$_POST['name'], $_POST['surname'], $_POST['mail'], $_POST['postal'], $_POST['tel'], $_POST['message']);
  
    if ($insert === true) {
      $recue = "Votre message a bien été envoyé";
    } else {
      $error = $insert;
    }
  }


/*
 * On récupère les messages du livre d'or
 */
$messages = getAllGuestbook($db);
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

include "../view/guestbookView.php";

// fermeture de la connexion (bonne pratique)
$db =null;
