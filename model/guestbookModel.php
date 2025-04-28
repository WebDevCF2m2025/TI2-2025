<?php
# model/guestbookModel.php
/********************************
 * Model de la page livre d'or
 *******************************/

// INSERTION d'un message dans le livre d'or

/**
 * @param PDO $db
 * @param string $firstname
 * @param string $lastname
 * @param string $usermail
 * @param string $phone
 * @param string $postcode
 * @param string $message
 * @return bool
 * Fonction qui insère un message dans la base de données 'ti2web2025' et sa table 'guestbook'
 * Renvoie true si l'insertion a réussi, false sinon
 * Une requête préparée est utilisée pour éviter les injections SQL
 * Les données sont échappées pour éviter les injections XSS (protection backend)
 */
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
        $newFirstname = trim(strip_tags(htmlspecialchars($firstname, ENT_QUOTES)));
        $newLastname = trim(strip_tags(htmlspecialchars($lastname, ENT_QUOTES)));
        $newEmail = filter_var($usermail, FILTER_VALIDATE_EMAIL);
        $newPhone = trim(strip_tags(htmlspecialchars($phone, ENT_QUOTES)));
        $newPostcode = trim(strip_tags(htmlspecialchars($postcode, ENT_QUOTES)));
        $newMessage = trim(strip_tags(htmlspecialchars($message, ENT_QUOTES)));

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

/***************************
 * Sans le Bonus Pagination
 **************************/

// SELECTION de messages dans le livre d'or par ordre de date croissante
/**
 * @param PDO $db
 * @return array
 * Fonction qui récupère tous les messages du livre d'or par ordre de date croissante
 * venant de la base de données 'ti2web2025' et de la table 'guestbook'
 * Si pas de message, renvoie un tableau vide
 */
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

/**************************
 * Pour le Bonus Pagination
 **************************/

// SELECTION du nombre total de messages
/**
 * @param PDO $db
 * @return int
 * Fonction qui compte le nombre total de messages dans la table 'guestbook'
 */
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
// SELECTION de messages dans le livre d'or par ordre de date croissante
// en lien avec la pagination
/**
 * @param PDO $db
 * @param int $offset
 * @param int $limit
 * @return array
 * Fonction qui récupère les messages du livre d'or par ordre de date croissante
 * venant de la base de données 'ti2web2025' et de la table 'guestbook'
 * en utilisant une requête préparée (injection SQL), n'affiche que les messages
 * de la page courante
 */
function getGuestbookPagination(PDO $db, int $offset, int $limit): array
{
    // Requête préparée obligatoire !
    // Le $offset et le $limit sont des entiers, il faut donc les passer
    // en paramètres de la requête préparée en tant qu'entiers !
    // try catch
    // si la requête a réussi,
    // bonne pratique, fermez le curseur
    // renvoyer le tableau de(s) message(s)
    // return [];
    // sinon, on fait un die de l'erreur
    $prepare = $db->prepare(
        "SELECT * FROM guestbook
        ORDER BY message, datemessage ASC
        LIMIT ?,?"
    );
    try{
        $prepare->bindParam(1,$offset,PDO::PARAM_INT);
        $prepare->bindParam(2,$limit,PDO::PARAM_INT);
        $prepare->closeCursor();
        $prepare->execute();
        return $prepare->fetchAll();

    }catch(Exception $e){
        die($e->getMessage());
    }
}

// FONCTION de pagination
/**
 * @param int $nbtotalMessage
 * @param string $get
 * @param int $pageActu
 * @param int $perPage
 * @return string
 * Fonction qui génère le code HTML de la pagination
 * si le nombre de pages est supérieur à une.
 */
function pagination(int $nbtotalMessage, string $get = "page", int $pageActu = 1, int $perPage = 5): string
{
    $sortie = "";
    if ($nbtotalMessage === 0) return "";
    $nbPages = ceil($nbtotalMessage / $perPage);
    if ($nbPages == 1) return "";
    $sortie .= "<p>";
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
