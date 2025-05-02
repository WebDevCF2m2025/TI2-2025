<?php


// inclusion de la configuration et du modele
require_once "../config.php";
require_once "../model/guestbookModel.php";

// tentative de connexion a la bdd
try {
    $conn = new PDO(DSN, DB_LOGIN, DB_PWD, [
        // option des erreur et de la recuperation d'array par defaut
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (Exception $e) {
    echo "Message : " . $e->getMessage();
}



// verifié si les variables POST existe
if (isset($_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['phone'], $_POST['postal'], $_POST['message'])) {
    // Si oui, on insert les données
    $insert = addGuestbook($conn, $_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['phone'], $_POST['postal'], $_POST['message']);

} 

// recup des livres de la bdd dans un variable
$messages = getAllGuestbook($conn);

// recup du compte egalement
$count = count($messages);

// Verification de notre position sur la page dans l'url et si la variable pg existe | ctype_digit = transforme les entrées numérique d'un string en integer
if (isset($_GET[PAGINATION_GET]) && ctype_digit($_GET[PAGINATION_GET])) {
    $page = (int) $_GET[PAGINATION_GET];
} else {
    // par defaut la page -> ?pg=1
    $page = 1;
}

// recup le nombre total de msg dans une variable
$nbTotMessage = getNbTotalGuestbook($conn);

// recuperation de la pagination dans une variable avec les parametres
$pagination = pagination($nbTotMessage, PAGINATION_GET, $page, PAGINATION_NB);

// affiche a partir l'offset, exemple $page=4 ? (4-1)*3=9 ====> affichera 3 message a partir du 10ieme de la bdd
$offset = ($page - 1) * PAGINATION_NB;

// recupere et stock les offset de la bdd
$messages = getGuestbookPagination($conn,  $offset, PAGINATION_NB);

// inclusion de la vue
include "../view/guestbookView.php";

// fermeture de connexion quand terminer
$conn = null;
