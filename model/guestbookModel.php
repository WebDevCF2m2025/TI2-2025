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
    if(empty($firstname));
    // si le nom est plus long qu'autorisé en db
    elseif(strlen($firstname)>100);
    
 // si le nom est vide
     if(empty($lastname));
 // si le nom est plus long qu'autorisé en db
     elseif(strlen($lastname)>100);
  
    // vérification du mail
    // si le mail n'est pas bon
    if($usermail===false);
    elseif(strlen($lastname)>100);
    //vérification code postal
    if(empty($postcode)); 
    elseif(strlen($postcode)!==4);  
    //vérification numéro de téléphone
    if(empty($phone));
       
    elseif(strlen($phone)!==10);
// vérification du nombre de caractères strlen() et validité du message

    if(empty($messageVerify));
    elseif(strlen($messageVerify)>600)

// si on a au moins 1 erreur
 {
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
    $sortie = "";
    if ($nbtotalMessage === 0) return "";
    $nbPages = ceil($nbtotalMessage / $perPage);
    if ($nbPages == 1) return "";
    $sortie .= "<p>";
    for ($i = 1; $i <= $nbPages; $i++) {
        if ($i === 1) {

            if ($pageActu === 1) {
                $sortie .= "&lt;&lt; &lt; 1 |";
            } elseif ($pageActu === 2) {
                $sortie .= " <a href='./'>&lt;&lt;</a> <a href='./'>&lt;</a> <a href='./'>1</a> |";
            } else {
                $sortie .= " <a href='./'>&lt;&lt;</a> <a href='?$get=" . ($pageActu - 1) . "'>&lt;</a> <a href='./'>1</a> |";
            }
        } elseif ($i < $nbPages) {
            if ($i === $pageActu) {
                $sortie .= "  $i |";
            } else {
                $sortie .= "  <a href='?$get=$i'>$i</a> |";
            }
        } else {
            if ($pageActu >= $nbPages) {
                $sortie .= "  $nbPages &gt; &gt;&gt;";
            } else {
                $sortie .= "  <a href='?$get=$nbPages'>$nbPages</a> <a href='?$get=" . ($pageActu + 1) . "'>&gt;</a> <a href='?$get=$nbPages'>&gt;&gt;</a>";
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