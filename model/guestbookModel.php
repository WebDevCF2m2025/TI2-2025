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
function addGuestbook(PDO $pdo, string $firstname,string $lastname,string $usermail,string $phone,string $postcode,string $message):bool {
 
    // traitement des données backend (SECURITE)

    $firstname = trim(htmlspecialchars(strip_tags($firstname),ENT_QUOTES));
    if(empty($firstname)){
        // $erreur .= "Prénom incorrect.<br>";
        return false;
    }elseif(strlen($firstname)>20){
        // $erreur .= "Prénom trop long.<br>";
        return false;
    }

    $lastname = trim(htmlspecialchars(strip_tags($lastname),ENT_QUOTES));
    if(empty($lastname)){
        // $erreur .= "Nom incorrect.<br>";
        return false;
    }elseif(strlen($lastname)>20){
        // $erreur .= "Nom trop long.<br>";
        return false;
    }

    $usermail = filter_var($usermail, FILTER_VALIDATE_EMAIL);
    if(!$usermail){
        // $erreur .= "Email Incorrect.<br>";
        return false;
    }

    $phone = trim(htmlspecialchars(strip_tags($phone),ENT_QUOTES));
    if(!ctype_digit($phone)){
        // $erreur .= "Numéro incorrect ca va pas dit.<br>";
        return false;
    }
        
    if(empty($phone)){
        // $erreur .= "Numéro incorrect.<br>";
        return false;
    }elseif(strlen($phone)>10){
        // $erreur .= "Numéro trop long.<br>";
        return false;
    }

    $postcode = trim(htmlspecialchars(strip_tags($postcode),ENT_QUOTES));
    if(!ctype_digit($postcode)){
        // $erreur .= "Code postal incorrect.<br>";
        return false;
    }

    if(empty($postcode)){
        // $erreur .= "Code postal incorrect.<br>";
        return false;
    }elseif(strlen($postcode)>4){
        // $erreur .= "Code postal trop long.<br>";
        return false;
    }

    $message = trim(htmlspecialchars(strip_tags($message),ENT_QUOTES));
    if(empty($message)){
        // $erreur .= "Message incorrect.<br>";
        return false;
    }elseif(strlen($message)>500){
        // $erreur .= "Message trop long.<br>";
        return false;
    }

    if(!empty($erreur)){ return false;}
    
   // si pas de données complètes ou ne correspondant pas à nos attentes, on renvoie false

    // requête préparée obligatoire !
    
    $insert = $pdo->prepare("INSERT INTO guestbook (firstname, lastname, usermail, phone, postcode, message) VALUES (?,?,?,?,?,?) ");
 
    
    // try catch
        // si l'insertion a réussi
        // on renvoie true
    // sinon, on fait un die de l'erreur
    try{
        $insert->execute([$firstname,$lastname,$usermail,$phone,$postcode,$message]);
        $insert->closeCursor();
        return true;
    }catch(Exception $e){
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
function getAllGuestbook(PDO $pdo): array
{
    // try catch
    // si la requête a réussi,
    // bonne pratique, fermez le curseur
    // renvoyer le tableau de(s) message(s)
    try{
        $query = $pdo->query("SELECT * FROM guestbook ORDER BY datemessage DESC");
        return $query->fetchAll();
    }catch(Exception $e){
        // sinon, on fait un die de l'erreur
        die($e->getMessage());        
    }
    
}

/**************************
 * BONUS DATE
 **************************/

function goodDate(string $dateOf):string {
    return date("d/m/Y \à H:i", strtotime($dateOf));
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
    // sinon, on fait un die de l'erreur
    try{
        $request = $db->query("SELECT COUNT(*) as nb FROM guestbook ");
        $nb = $request->fetch()['nb'];
        $request->closeCursor();
        return $nb;
    }catch (Exception $e){
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
function getGuestbookPagination(PDO $con, int $offset, int $limit): array
{
    // Requête préparée obligatoire !
    // Le $offset et le $limit sont des entiers, il faut donc les passer
    // en paramètres de la requête préparée en tant qu'entiers !
    // try catch
    // si la requête a réussi,
    // bonne pratique, fermez le curseur
    // renvoyer le tableau de(s) message(s)

    // sinon, on fait un die de l'erreur

    
    $prepare = $con->prepare("
        SELECT * FROM `guestbook`
        ORDER BY `guestbook`.`datemessage` DESC
        LIMIT ?,?
        ");
    $prepare->bindParam(1,$offset,PDO::PARAM_INT);
    $prepare->bindParam(2,$limit,PDO::PARAM_INT);

    try{
        $prepare->execute();
        $result = $prepare->fetchAll();
        $prepare->closeCursor();
        return $result;
    }catch (Exception $e){
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