<?php


function getAllGuestbook(PDO $con):array
{
$query=$con->query("SELECT * FROM guestbook order by datemessage ASC");
$messages=$query->fetchAll();
$query->closeCursor();
return $messages;

}

function addGuestbook(PDO $conecte, string $firstname, string $lastname, string $usermail, string $phone, string $postcode, string $message):bool
{

    $nomInsert = trim(htmlspecialchars(strip_tags($firstname),ENT_QUOTES));
    $prenomInsert = trim(htmlspecialchars(strip_tags($lastname),ENT_QUOTES));
    $emailInsert = filter_var($usermail,FILTER_VALIDATE_EMAIL);
    $telephoneInsert = preg_replace('/[^0-9\+]/', '', trim(strip_tags($phone),ENT_QUOTES));
    $postcodeInsert = preg_replace('/[^0-9\+]/', '', trim(strip_tags($postcode),ENT_QUOTES)); 
    $messageInsert = trim(htmlspecialchars(strip_tags($message),ENT_QUOTES));
    
    

    
    if(empty($nomInsert) || strlen($nomInsert)>100 || empty($prenomInsert) || strlen($prenomInsert)>100 || $emailInsert===false || empty($telephoneInsert) || strlen($telephoneInsert)>20 || empty($postcodeInsert) ||strlen($postcodeInsert)>4 || empty($messageInsert) || strlen($messageInsert)>500 )
    {
        return false;
    }
    
$insert=$conecte->prepare("INSERT INTO guestbook (firstname, lastname, usermail, phone, postcode, `message`) VALUES (?, ?, ?, ?, ?, ?)");
  $insert->execute([$nomInsert, $prenomInsert, $emailInsert, $telephoneInsert, $postcodeInsert, $messageInsert]);
  $insert->closeCursor();
  return true;
}






# model/guestbookModel.php
/********************************
 * Model de la page livre d'or
 *******************************/

// INSERTION d'un message dans le livre d'or



/**
//  * @param PDO $db
//  * @param string $firstname
//  * @param string $lastname
//  * @param string $usermail
//  * @param string $phone
//  * @param string $postcode
//  * @param string $message
//  * @return bool
 * 
 * 
 * 
 * 
 * 
 * 
 * Fonction qui insère un message dans la base de données 'ti2web2025' et sa table 'guestbook'
 * Renvoie true si l'insertion a réussi, false sinon
 * Une requête préparée est utilisée pour éviter les injections SQL
 * Les données sont échappées pour éviter les injections XSS (protection backend)
 * 
 * 
 * 
//  */
// function addGuestbook(PDO $db,
//                     string $firstname,
//                     string $lastname,
//                     string $usermail,
//                     string $phone,
//                     string $postcode,
//                     string $message
// ): bool
// {
    // traitement des données backend (SECURITE)

    // si pas de données complètes ou ne correspondant pas à nos attentes, on renvoie false



    // return false;





    // requête préparée obligatoire !

    // try catch
        // si l'insertion a réussi
        // on renvoie true
    // sinon, on fait un die de l'erreur

// }

/***************************
 * Sans le Bonus Pagination
 **************************/

// SELECTION de messages dans le livre d'or par ordre de date croissante
/**
//  * @param PDO $db
//  * @return array
 * 
 * 
 * 
 * 
 * 
 * Fonction qui récupère tous les messages du livre d'or par ordre de date croissante
 * venant de la base de données 'ti2web2025' et de la table 'guestbook'
 * Si pas de message, renvoie un tableau vide
 */




// function getAllGuestbook(PDO $db): array




    // try catch
    // si la requête a réussi,
    // bonne pratique, fermez le curseur
    // renvoyer le tableau de(s) message(s)



    // return [];



    // sinon, on fait un die de l'erreur


/**************************
 * Pour le Bonus Pagination
 **************************/

// SELECTION du nombre total de messages


/**
//  * @param PDO $db
//  * @return int
 * 
 * 
 * 
 * Fonction qui compte le nombre total de messages dans la table 'guestbook'
 */




// function getNbTotalGuestbook(PDO $db): int
// {
    // try catch
    // si la requête a réussi,
    // bonne pratique, fermez le curseur,
    // renvoyez le nombre total de messages









    // sinon, on fait un die de l'erreur



    

// SELECTION de messages dans le livre d'or par ordre de date croissante
// en lien avec la pagination


/**
//  * @param PDO $db
//  * @param int $offset
//  * @param int $limit
//  * @return array
 * 
 * 
 * Fonction qui récupère les messages du livre d'or par ordre de date croissante
 * venant de la base de données 'ti2web2025' et de la table 'guestbook'
 * en utilisant une requête préparée (injection SQL), n'affiche que les messages
 * de la page courante
 */



// function getGuestbookPagination(PDO $db, int $offset, int $limit): array
// {




    // Requête préparée obligatoire !
    // Le $offset et le $limit sont des entiers, il faut donc les passer
    // en paramètres de la requête préparée en tant qu'entiers !
    // try catch
    // si la requête a réussi,
    // bonne pratique, fermez le curseur
    // renvoyer le tableau de(s) message(s)



    // return [];


    // sinon, on fait un die de l'erreur
// }

// FONCTION de pagination
/**
//  * @param int $nbtotalMessage
//  * @param string $get
//  * @param int $pageActu
//  * @param int $perPage
//  * @return string
//  * Fonction qui génère le code HTML de la pagination
//  * si le nombre de pages est supérieur à une.
//  */
// function pagination(int $nbtotalMessage, string $get="page", int $pageActu=1, int $perPage=5 ): string
// {
//     $sortie = "";
//     if ($nbtotalMessage === 0) return "";
//     $nbPages = ceil($nbtotalMessage / $perPage);
//     if ($nbPages == 1) return "";
//     $sortie .= "<p>";
//     for ($i = 1; $i <= $nbPages; $i++) {
//         if ($i === 1) {
//             if ($pageActu === 1) {
//                 $sortie .= "<< < 1 |";
//             } elseif ($pageActu === 2) {
//                 $sortie .= " <a href='./'><<</a> <a href='./'><</a> <a href='./'>1</a> |";
//             } else {
//                 $sortie .= " <a href='./'><<</a> <a href='?$get=" . ($pageActu - 1) . "'><</a> <a href='./'>1</a> |";
//             }
//         } elseif ($i < $nbPages) {
//             if ($i === $pageActu) {
//                 $sortie .= "  $i |";
//             } else {
//                 $sortie .= "  <a href='?$get=$i'>$i</a> |";
//             }
//         } else {
//             if ($pageActu >= $nbPages) {
//                 $sortie .= "  $nbPages > >>";
//             } else {
//                 $sortie .= "  <a href='?$get=$nbPages'>$nbPages</a> <a href='?$get=" . ($pageActu + 1) . "'>></a> <a href='?$get=$nbPages'>>></a>";
//             }
//         }
//     }
//     $sortie .= "</p>";
//     return $sortie;

// }