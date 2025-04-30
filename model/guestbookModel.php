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
function addGuestbook(PDO $db,
                    string $firstname,
                    string $lastname,
                    string $usermail,
                    string $phone,
                    string $postcode,
                    string $message
): bool
{
    // traitement des données backend (SECURITE)

    # strip_tags : Avec ça on retire les tags
    # htmlspecialchars : Avec ça on protège des caractères spéciaux (avec ' et ")
    # trim : Avec ça on supprime les espaces devant et derrière les variable $firstname, $lastname ... 

    $firstname = trim(htmlspecialchars(strip_tags($firstname),ENT_QUOTES)); 
    $lastname = trim(htmlspecialchars(strip_tags($lastname),ENT_QUOTES));
    $usermail = filter_var($usermail, FILTER_VALIDATE_EMAIL);
    $phone = trim(htmlspecialchars(strip_tags($phone),ENT_QUOTES));
    $postcode = trim(htmlspecialchars(strip_tags($postcode),ENT_QUOTES));
    $message = trim(htmlspecialchars(strip_tags($message),ENT_QUOTES));

    // si pas de données complètes ou ne correspondant pas à nos attentes, on renvoie false
    if(
        empty($firstname) || strlen($firstname) > 100 || # Ici on vérifie que $firstname n'est pas vide et que sa longueur ne dépasse pas les 100 caractères
        empty($lastname) || strlen($lastname) > 100 || # Ici on vérifie que $last name n'est pas vide et que sa longueur ne dépasse pas les 100 caractères
        $usermail === false || strlen($usermail) > 200 || # Ici on vérifie que $usermail n'est pas incorrect et que sa longueur ne dépasse pas les 200 caractères
        empty($phone) || strlen($phone) > 20 || ctype_digit($phone) === false || # Ici on vérifie que $phone n'est pas vide, que sa longueur ne dépasse pas les 20 caractères et que ce sont bien des chiffres
        empty($postcode) || strlen($postcode) !== 4 || ctype_digit($postcode) === false || # Ici on vérifie que $postcode n'est pas vide, que sa longueur ne dépasse pas les 4 caractères et que ce sont bien des chiffres
        empty($message) || strlen($message) > 500 # Ici on vérifie que $message n'est pas vide et que sa longueur ne dépasse pas les 500 caractères
    ) {
        return false;
    }

    // requête préparée obligatoire !
    $prepare = $db->prepare("
    INSERT INTO `guestbook` (`firstname`, `lastname`, `usermail`, `phone`, `postcode`, `message`)
    VALUES (?,?,?,?,?,?)
    ");

    // try catch
        // si l'insertion a réussi
    try {
        $prepare->execute([$firstname, $lastname, $usermail, $phone, $postcode, $message]);

        // on renvoie true
        return true;

    // sinon, on fait un die de l'erreur
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
    $prepare = $db->prepare("
        SELECT * FROM `guestbook`
        ORDER BY `guestbook` . `datemessage` ASC
    ");

    // try catch
    try {
        $prepare->execute();

        // si la requête a réussi,
        $result = $prepare->fetchAll();

        // bonne pratique, fermez le curseur
        $prepare->closeCursor();

        // renvoyer le tableau de(s) message(s)
        return $result;

    } catch (Exception $e) {
            // sinon, on fait un die de l'erreur
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
    // try catch
    try {
        // si la requête a réussi,
        $request = $db->query("SELECT COUNT(*) as nb FROM guestbook");
        $nb = $request->fetch()['nb'];

        // bonne pratique, fermez le curseur,
        $request->closeCursor();

        // renvoyez le nombre total de messages
        return $nb;
    
    // sinon, on fait un die de l'erreur
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
    $prepare = $db->prepare("
        SELECT * FROM `guestbook`
        ORDER BY `guestbook`.`datemessage` ASC
        LIMIT ?,?
    ");

    // Le $offset et le $limit sont des entiers, il faut donc les passer
    // en paramètres de la requête préparée en tant qu'entiers !
    $prepare->bindParam(1,$offset,PDO::PARAM_INT);
    $prepare->bindParam(2,$limit,PDO::PARAM_INT);

    // try catch

    try {
        // si la requête a réussi,
        $prepare->execute();
        $result = $prepare->fetchAll();

        // bonne pratique, fermez le curseur
        $prepare->closeCursor();

        // renvoyer le tableau de(s) message(s)
        return $result;
    
    // sinon, on fait un die de l'erreur
    } catch (Exception $e) {
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
function pagination(int $nbtotalMessage, string $get="page", int $pageActu=1, int $perPage=5 ): string
{
    // Variable de sortie
    $sortie = "";

    // Si pas de page nécéssaire
    if ($nbtotalMessage === 0) return "";

    // Nombre de pages, division du total des messages mis à l'entier supérieur
    $nbPages = ceil($nbtotalMessage / $perPage);

    // Si une seule page, pas de lien à afficher
    if ($nbPages == 1) return "";

    // Nous avons plus d'une page
    $sortie .= "<p>";

    // Tant qu'on a des pages
    for ($i = 1; $i <= $nbPages; $i++) {

        // Si on est au premier tout de la boucle
        if ($i === 1) {

            // Si on est sur la première page
            if ($pageActu === 1) {
                
                // Pas de lien
                $sortie .= "<< < 1 |";

            // Si nous sommes sur la deuxième page
            } elseif ($pageActu === 2) {

                // Tous les liens vont vers la page 1
                $sortie .= " <a href='./'><<</a> <a href='./'><</a> <a href='./'>1</a> |";

            // Si nous sommes sur d'autres pages, le retour va vers la page précédente
            } else {
                $sortie .= " <a href='./'><<</a> <a href='?$get=" . ($pageActu - 1) . "'><</a> <a href='./'>1</a> |";
            }

        // Nous ne sommes pas sur le premier ni sur le dernier tour de boucle
        } elseif ($i < $nbPages) {

            // Si nous sommes sur la page actuelle
            if ($i === $pageActu) {

                // Pas de lien
                $sortie .= "  $i |";

            } else {

                // Si nous sommes pas sur la page actuelle
                $sortie .= "  <a href='?$get=$i'>$i</a> |";
            }

        // Si nous sommes sur le dernier tour de boucle   
        } else {

            // Si nous sommes sur la dernière page
            if ($pageActu >= $nbPages) {

                // Pas de lien
                $sortie .= "  $nbPages > >>";

            // Si nous ne sommes pas sur la dernière page
            } else {

                // Tous les liens vont vers la dernière page
                $sortie .= "  <a href='?$get=$nbPages'>$nbPages</a> <a href='?$get=" . ($pageActu + 1) . "'>></a> <a href='?$get=$nbPages'>>></a>";
            }
        }
    }
    $sortie .= "</p>";
    return $sortie;
}

/* FONCTION DATE DU MESSAGE FORMATÉE AU FORMAT FRANÇAIS*/

function dateFR(string $datetime): string
{
    // Temps unix en seconde de la date venant de la db
    $stringtotime = strtotime($datetime);
    
    // Retour de la date au format
    return date("d/m/Y \à H\hi",$stringtotime);
}