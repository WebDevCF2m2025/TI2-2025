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
): bool | string {
    // traitement des données backend (SECURITE)
    $insertfirstName = trim(htmlspecialchars(strip_tags($firstname), ENT_QUOTES));
    $insertlastName = trim(htmlspecialchars(strip_tags($lastname), ENT_QUOTES));
    $usermailInsert = filter_var($usermail, FILTER_VALIDATE_EMAIL);
    $insertPhone = trim(htmlspecialchars(strip_tags($phone), ENT_QUOTES));
    $postcodeInsert = trim(htmlspecialchars(strip_tags($postcode), ENT_QUOTES));
    $messageInsert = trim(htmlspecialchars(strip_tags($message), ENT_QUOTES));

    if (empty($insertfirstName)) return false;
    if (strlen($insertfirstName) >= 100) return false;
    
    if (empty($insertlastName)) return false;
    if (strlen($insertlastName) >= 100) return false;
    
    if ($usermailInsert === false || strlen($usermailInsert) >= 200) return false;
    
    if (strlen($insertPhone) >= 20) return false;
    
    if (empty($postcodeInsert)) return false;
    if (strlen($postcodeInsert) != 4) return false;
    
    if (empty($messageInsert)) return false;
    if (strlen($messageInsert) >= 500) return false;


    $prepare = $db->prepare("INSERT INTO `guestbook`(`firstname`,`lastname`,`usermail`,`phone`,`postcode`,`message`) VALUES (?,?,?,?,?,?);");

    try {
        $prepare->execute([$insertfirstName, $insertlastName, $usermailInsert, $insertPhone, $postcodeInsert, $messageInsert]);
        return true;
    } catch (Exception $e) {
        die($e->getMessage());
    }
    // si pas de données complètes ou ne correspondant pas à nos attentes, on renvoie false
    // return false;
    // requête préparée obligatoire !

    // try catch
    // si l'insertion a réussi
    // on renvoie true
    // sinon, on fait un die de l'erreur

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
        $connect = $db->prepare("SELECT * FROM  `guestbook` ORDER BY `datemessage` ASC");
        $data = $connect->execute();
        return $connect->fetchAll();
    } catch (Exception $e) {
        die($e->getMessage());
    }

    // try catch
    // si la requête a réussi,
    // bonne pratique, fermez le curseur
    // renvoyer le tableau de(s) message(s)
    // sinon, on fait un die de l'erreur
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
function getNbTotalMessage(PDO $con): int
{
    // on compte le nombre de messages total
    $query = $con->query("SELECT COUNT(*) as nb FROM `guestbook` ");
    # bonne pratique
    $result = $query->fetch()['nb'];
    $query->closeCursor();
    // on renvoie l'entier stocké dans nb
    return $result;
}
 
function getMessagePagination(PDO $con, int $offset, int $limit): array
{
    $prepare = $con->prepare(
        "SELECT * FROM `guestbook`
        ORDER BY `datemessage` ASC
        LIMIT ?,?"
    );
    try{
        $prepare->bindParam(1, $offset, PDO::PARAM_INT);
        $prepare->bindParam(2, $limit, PDO::PARAM_INT);
        $prepare->execute();
        $result = $prepare->fetchAll();
        $prepare->closeCursor();
        return $result;
 
    }catch(Exception $e){
        die($e->getMessage());
    }
}
 
function pagination(int $nbtotalMessage, string $get="page", int $pageActu=1, int $perPage=5 ): string
{
 
    // variable de sortie
    $sortie = "";
 
    // si pas de page nécessaire
    if ($nbtotalMessage === 0) return "";
 
    // nombre de pages, division du total des messages mis à l'entier supérieur
    $nbPages = ceil($nbtotalMessage / $perPage);
 
    // si une seule page, pas de lien à afficher
    if ($nbPages == 1) return "";
 
    // nous avons plus d'une page
    $sortie .= "<p>";
 
 
    // tant qu'on a des pages
    for ($i = 1; $i <= $nbPages; $i++) {
        // si on est au premier tour de boucle
        if ($i === 1) {
            // si on est sur la première page
            if ($pageActu === 1) {
                // pas de lien
                $sortie .= "<< < 1 |";
                // si nous sommes sur la page 2
            } elseif ($pageActu === 2) {
                // tous les liens vont vers la page 1
                $sortie .= " <a href='./'><<</a> <a href='./'><</a> <a href='./'>1</a> |";
                // si nous sommes sur d'autres pages, le retour va vers la page précédente
            } else {
                $sortie .= " <a href='./'><<</a> <a href='?$get=" . ($pageActu - 1) . "'><</a> <a href='./'>1</a> |";
            }
            // nous ne sommes pas sur le premier ni dernier tour de boucle
        } elseif ($i < $nbPages) {
            // si nous sommes sur la page actuelle
            if ($i === $pageActu) {
                // pas de lien
                $sortie .= "  $i |";
            } else {
                // si nous ne sommes pas sur la page actuelle
                $sortie .= "  <a href='?$get=$i'>$i</a> |";
            }
            // si nous sommes sur le dernier tour de boucle
        } else {
            // si nous sommes sur la dernière page
            if ($pageActu >= $nbPages) {
                // pas de lien
                $sortie .= "  $nbPages > >>";
                // si nous ne sommes pas sur la dernière page
            } else {
                // tous les liens vont vers la dernière page
                $sortie .= "  <a href='?$get=$nbPages'>$nbPages</a> <a href='?$get=" . ($pageActu + 1) . "'>></a> <a href='?$get=$nbPages'>>></a>";
            }
        }
    }
        $sortie .= "</p>";
        return $sortie;
 
    }
