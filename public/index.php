<?php



require_once "../config.php";
require_once "../model/guestbookModel.php";


try {
    $conn = new PDO(DSN, DB_LOGIN, DB_PWD, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (Exception $e) {
    echo "Message : " . $e->getMessage();
}


$success = "Vous avez enregistrée vos données";

if (isset($_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['phone'], $_POST['postal'], $_POST['message'])) {

    $insert = addGuestbook($conn, $_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['phone'], $_POST['postal'], $_POST['message']);
}


$messages = getAllGuestbook($conn);

$count = count($messages);

if (isset($_GET[PAGINATION_GET]) && ctype_digit($_GET[PAGINATION_GET])) {
    $page = (int) $_GET[PAGINATION_GET];
} else {
    $page = 1;
}

$nbTotMessage = getNbTotalGuestbook($conn);

$pagination = pagination($nbTotMessage, PAGINATION_GET, $page, PAGINATION_NB);

$offset = ($page - 1) * PAGINATION_NB;

$messages = getGuestbookPagination($conn,  $offset, PAGINATION_NB);

include "../view/guestbookView.php";

$conn = null;
