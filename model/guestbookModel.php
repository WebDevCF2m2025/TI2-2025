<?php
# model/guestbookModel.php
/********************************
 * Model de la page livre d'or
 *******************************/

// INSERTION d'un message dans le livre d'or


function addAllProfAsk(PDO $conecte): array
{
    $query = $conecte->query("SELECT * FROM guestbook");
    $messages = $query->fetchAll();
    $query->closeCursor();
    return $messages;

}

function insert(PDO $conecte, string $nom, string $prenom, string $email, string $telephone, string $codePostal, string $message): bool
{

    $nomInsert = trim(htmlspecialchars(strip_tags($nom), ENT_QUOTES));
    $prenomInsert = trim(htmlspecialchars(strip_tags($prenom), ENT_QUOTES));
    $emailInsert = filter_var($email, FILTER_VALIDATE_EMAIL);
    $messageInsert = trim(htmlspecialchars(strip_tags($message), ENT_QUOTES));
    $telephoneInsert = trim(strip_tags($telephone), ENT_QUOTES);
    $codePostalInsert = trim(htmlspecialchars(strip_tags($codePostal), ENT_QUOTES));



    if (empty($nomInsert) || strlen($nomInsert) > 100 || empty($codePostalInsert) || strlen($codePostalInsert) != 4 || empty($prenomInsert) || strlen($prenomInsert) > 100 || $emailInsert === false || empty($messageInsert) || strlen($messageInsert) > 500 || empty($telephoneInsert) || strlen($telephoneInsert) > 20) {
        return false;
    }
    try {

        $insert = $conecte->prepare("INSERT INTO guestbook (firstname, lastname, usermail, phone , postcode, `message` ) VALUES (?, ?, ?, ?,?, ?)");
        $insert->execute([$prenomInsert, $nomInsert, $emailInsert, $telephoneInsert, $codePostalInsert, $messageInsert]);
        $insert->closeCursor();
        return true;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

