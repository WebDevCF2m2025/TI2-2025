<?php

function addGuestbook(
    PDO $db,
    string $firstname,
    string $lastname,
    string $usermail,
    string $phone,
    string $postcode,
    string $message
): bool {
    $firstname = trim(htmlspecialchars(strip_tags($firstname), ENT_QUOTES));
    $lastname = trim(htmlspecialchars(strip_tags($lastname), ENT_QUOTES));
    $usermail = filter_var($usermail, FILTER_VALIDATE_EMAIL);
    $phone = trim(htmlspecialchars(strip_tags($phone), ENT_QUOTES));
    $postcode = trim(htmlspecialchars(strip_tags($postcode), ENT_QUOTES));
    $message = trim(htmlspecialchars(strip_tags($message), ENT_QUOTES));

    if (
        empty($firstname) || strlen($firstname) > 100 || empty($lastname) || strlen($lastname) > 100 || empty($usermail) || strlen($usermail) > 200 || empty($phone) || strlen($phone) > 20 ||
        ctype_digit($phone) === false || empty($postcode) || strlen($postcode) > 4 || empty($message) || strlen($message) > 500
    ) {
        return false;
    }

    $prepare = $db->prepare("
    INSERT INTO `guestbook` (`firstname`,`lastname`,`usermail`,`phone`,`postcode`,`message`)
    VALUES (?,?,?,?,?,?)
    ");
    try {
        $prepare->execute([$firstname, $lastname, $usermail, $phone, $postcode, $message]);
        return true;
    } catch (Exception $except) {
        die($except->getMessage());
    }
}

function getAllGuestbook(PDO $d_b): array
{
    $prepa = $d_b->prepare("
    SELECT * FROM `guestbook`
    ORDER BY `guestbook`.`datemessage` DESC
    ");
    try {

        $prepa->execute();

        $result = $prepa->fetchAll();
        $prepa->closeCursor();
        return $result;
    } catch (Exception $exc) {
        die($exc->getMessage());
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
    // try catch
    // si la requête a réussi,
    // bonne pratique, fermez le curseur,
    // renvoyez le nombre total de messages
    return 0;
    // sinon, on fait un die de l'erreur
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
    return [];
    // sinon, on fait un die de l'erreur
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
