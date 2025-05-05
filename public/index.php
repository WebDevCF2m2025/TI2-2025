<?php
# public/index.php
ini_set('display_errors',1);

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
 */

try{
    $db = new PDO(DB_DSN, DB_CONNECT_USER, DB_CONNECT_PWD,
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

/* Avec un try catch pour gérer les erreurs de connexion
 * Utilisez les constantes de config.php
 * Activez le mode d'erreur de PDO à Exception et
 * le mode fetch à tableau associatif
 */

/*
 * Si le formulaire a été soumis
 */
if(isset($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['message'],$_POST['postal'],$_POST['portable'])){

;
// on appelle la fonction d'insertion dans la DB (addGuestbook())
    $insert = addGuestbook($db,$_POST['prenom'],$_POST['nom'],$_POST['email'],$_POST['portable'],$_POST['postal'],$_POST['message']);

// si l'insertion a réussi
// on redirige vers la page actuelle (ou on affiche un message de succès)


    if($insert===true){
        $thanks = "Merci pour votre nouveau message";
    }else{


// sinon, on affiche un message d'erreur
    $errors = "Impossible d'envoyer le formulaire";
    }

}

/*
 * On récupère les messages du livre d'or
 */

// on appelle la fonction de récupération de la DB (getAllGuestbook())
 $messages = getAllGuestbookOrderByDateASC($db);


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

require_once "../view/guestbookView.php";

// fermeture de la connexion (bonne pratique)
$db=null;