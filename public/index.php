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
  
    $connexion = new PDO( DB_DSN , DB_LOGIN, DB_PWD,[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,]
    );
}catch(Exception $e){
  
    die("Code : {$e->getCode()} <br> Message : {$e->getMessage()}");
}

//echo "coucou";

$articles = getAllGuestbook($connexion);

//  Si le formulaire a été soumis
/*
array (size=6)
  'firstname' => string 'abdelkader' (length=10)
  'lastname' => string 'nordine' (length=7)
  'usermail' => string 'eloummalnordine@hotmail.com' (length=27)
  'phone' => string '0484750037' (length=10)
  'postcode' => string '1050' (length=4)
  'message' => string '546' (length=3)
  */


if(isset($_POST['firstname'],
        $_POST['lastname'],
    $_POST['usermail'],
    $_POST['phone'],
    $_POST['postcode'],
    $_POST['message']))
{

 // Insertion dans la base de données   
$insert = addGuestbook($connexion, 
                        $_POST['firstname'], 
                        $_POST['lastname'], 
                        $_POST['usermail'], 
                        $_POST['phone'], 
                        $_POST['postcode'], 
                        $_POST['message'] 
);

 //Redirection après insertion
header('Location: ./');
exit;
}



// Appel de la vue
require_once '../view/guestbookView.php';


// Fermeture de la connexion (bonne pratique)
$connexion = null;
/*
 * Si le formulaire a été soumis
 */

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

// include "../view/guestbookView.php";

// fermeture de la connexion (bonne pratique)





   


    






