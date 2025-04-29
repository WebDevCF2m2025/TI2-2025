<?php

/**
 * @param PDO $db
 * @param string $firstname
 * @param string $lastname
 * @param string $usermail
 * @param string $phone
 * @param string $postcode
 * @param string $message
 * @return bool
 */

// Function pour ajouter des entrées dans la bdd
function addGuestbook(
    PDO $db,
    string $firstname,
    string $lastname,
    string $usermail,
    string $phone,
    string $postcode,
    string $message
): bool {
    try {
        // nettoyage des entrées
        $newFirstname = trim(strip_tags(htmlspecialchars($firstname, ENT_QUOTES)));
        $newLastname = trim(strip_tags(htmlspecialchars($lastname, ENT_QUOTES)));
        $newEmail = filter_var($usermail, FILTER_VALIDATE_EMAIL);
        $newPhone = trim(strip_tags(htmlspecialchars($phone, ENT_QUOTES)));
        $newPostcode = trim(strip_tags(htmlspecialchars($postcode, ENT_QUOTES)));
        $newMessage = trim(strip_tags(htmlspecialchars($message, ENT_QUOTES)));

        // verification des champs vides 
        if (
            empty($newFirstname) || strlen($newFirstname) > 60 ||
            empty($newLastname) || strlen($newLastname) > 60 ||
            empty($newEmail) || strlen($newEmail) > 60 ||
            empty($newPhone) || strlen($newPhone) != 10 ||
            empty($newPostcode) || strlen($newPostcode) > 4 ||
            empty($newMessage) || strlen($newMessage) > 500
        ) {
            return false;
        }
        $prep = $db->prepare('INSERT INTO guestbook (firstname, lastname, usermail, phone, postcode, message) VALUES (?,?,?,?,?,?)');
        $prep->execute([$newFirstname, $newLastname, $newEmail, $newPhone, $newPostcode, $newMessage]);
        return true;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}



/**
 * @param PDO $db
 * @return array
 */

//  Recuperation des livres
function getAllGuestbook(PDO $db): array
{
    try {
        $query = $db->query('SELECT * FROM guestbook ORDER BY datemessage ASC');
        $messages = $query->fetchAll();
        $query->closeCursor();
        return $messages;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

/**
 * @param PDO $db
 * @return int
 */

//  Recuperation du nombre total des book en integer pour la pagination
function getNbTotalGuestbook(PDO $db): int
{
    try {
        $query = $db->query('SELECT COUNT(*) as total FROM guestbook');
        $messages = $query->fetch();
        $query->closeCursor();
        return (int) $messages['total'];
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

/**
 * @param PDO $db
 * @param int $offset
 * @param int $limit
 * @return array
 */

//  Recuperation des livres a partir dun offset et limité a ?? de page
function getGuestbookPagination(PDO $db, int $offset, int $limit): array
{

    $prepare = $db->prepare(
        "SELECT * FROM guestbook
        ORDER BY message, datemessage ASC
        LIMIT ?,?"
    );
    try {
        // bindparam qui prend des valeurs qui pourront probablement changer
        $prepare->bindParam(1, $offset, PDO::PARAM_INT);
        $prepare->bindParam(2, $limit, PDO::PARAM_INT);
        $prepare->closeCursor();
        $prepare->execute();
        return $prepare->fetchAll();
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

/**
 * @param int $nbtotalMessage
 * @param string $get
 * @param int $pageActu
 * @param int $perPage
 * @return string
 */

//  Construction de la pagination selon la page ou l'on se trouve 
function pagination(int $nbtotalMessage, string $get = "page", int $pageActu = 1, int $perPage = 5): string
{
    $sortie = "";
    if ($nbtotalMessage === 0) return "";
    $nbPages = ceil($nbtotalMessage / $perPage);
    if ($nbPages == 1) return "";
    $sortie .= "<p class='pagination'>";
    for ($i = 1; $i <= $nbPages; $i++) {
        if ($i === 1) {
            if ($pageActu === 1) {
                $sortie .= "<< < 1 |";
            } elseif ($pageActu === 2) {
                $sortie .= " <a href='./'><<</a> <a href='./'><</a> <a href='./'>1</a> |";
            } else {
                $sortie .= " <a href='./'><<</a> <a href='?$get=" . ($pageActu - 1) . "'><</a> <a href='./'>1</a> |";
            }
        } elseif ($i < $nbPages) {
            if ($i === $pageActu) {
                $sortie .= "  $i |";
            } else {
                $sortie .= "  <a href='?$get=$i'>$i</a> |";
            }
        } else {
            if ($pageActu >= $nbPages) {
                $sortie .= "  $nbPages > >>";
            } else {
                $sortie .= "  <a href='?$get=$nbPages'>$nbPages</a> <a href='?$get=" . ($pageActu + 1) . "'>></a> <a href='?$get=$nbPages'>>></a>";
            }
        }
    }
    $sortie .= "</p>";
    return $sortie;
}
