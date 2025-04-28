<?php


function getAllGuestbook(PDO $con):array
{
$query=$con->query("SELECT * FROM guestbook order by datetime ASC");
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
    
$insert=$conecte->prepare("INSERT INTO guestbook (firstname, lastname, usermail, phone, postcode, message) VALUES (?, ?, ?, ?, ?, ?)");
  $insert->execute([$nomInsert, $prenomInsert, $emailInsert, $telephoneInsert, $postcodeInsert, $messageInsert]);
  $insert->closeCursor();
  return true;
    }

    // Fonction principale pour vérifier les entrées du formulaire.
function verificationDeInput() {
  // Récupération du bouton de soumission du formulaire par son ID.
const btn = document.getElementById("btn");

  // Récupération des éléments d'erreur pour afficher les messages d'erreur spécifiques à chaque champ.
const nomError = document.getElementById("NomError");
const prenomError = document.getElementById("PrenomError");
const emailError = document.getElementById("EmailError");
const telephoneError = document.getElementById("TelephoneError");
const postcodeError = document.getElementById("postcodeError");
const messageError = document.getElementById("MessageError");

  // Définition des expressions régulières pour valider les champs du formulaire.
const nameRegex = /^[A-Za-zÀ-ÿ\s'-]{2,50}$/; 
const prenomRegex = /^[A-Za-zÀ-ÿ\s'-]{2,50}$/; // Prénom : mêmes règles que pour le nom.
const emailRegex = /^[\w.-]+@[\w.-]+\.\w{2,}$/; // Email : format standard d'adresse email.
const telRegex = /^(?:\+32|0)[1-9]\d{7,8}$/; // Téléphone : format belge (+32 ou 0 suivi de 8 ou 9 chiffres).
const postcodeRegex = /^?:\4[1-9]\d$/;
const messageRegex = /^.{5,1000}$/; // Message : entre 5 et 1000 caractères.

  // Ajout d'un écouteur d'événement sur le bouton pour gérer le clic.
  btn.addEventListener('click', function (e) {
      let isValid = true; // Variable pour suivre si le formulaire est valide.

      // Récupération des valeurs des champs du formulaire et suppression des espaces inutiles.
const inputName = document.querySelector("#NomID").value.trim();
const inputPrenom = document.querySelector("#prenomID").value.trim();
const inputEmail = document.getElementById("emailID").value.trim();
const inputTel = document.querySelector("#telephoneID").value.trim();
const inputpostcode = document.querySelector("#postcodeErrorID").value.trim()/* a remplir champ vide pour ID inputpostcode*/
const inputMessage = document.querySelector("#messageID").value.trim();

      // Validation du champ "Nom".
if (inputName == "") {
          nomError.textContent = "Nom est vide"; // Message d'erreur si le champ est vide.
          nomError.style.color = "red"; // Affichage en rouge.
          isValid = false; // Formulaire invalide.
} else if (!nameRegex.test(inputName)) {
          nomError.textContent = "Nom n'est pas valide"; // Message d'erreur si le format est incorrect.
          nomError.style.color = "red";
          isValid = false;
} else {
          nomError.textContent = ""; // Pas d'erreur.
      }

      // Validation du champ "Prénom".
if (inputPrenom == "") {
          prenomError.textContent = "Prénom est vide";
          prenomError.style.color = "red";
          isValid = false;
} else if (!prenomRegex.test(inputPrenom)) {
          prenomError.textContent = "Prénom n'est pas valide";
          prenomError.style.color = "red";
          isValid = false;
} else {
          prenomError.textContent = "";
}

      // Validation du champ "Email".
      if (inputEmail == "") {
          emailError.textContent = "Email est vide";
          emailError.style.color = "red";
          isValid = false;
      } else if (!emailRegex.test(inputEmail)) {
          emailError.textContent = "Email n'est pas valide";
          emailError.style.color = "red";
          isValid = false;
      } else {
          emailError.textContent = "";
      }

      // Validation du champ "Téléphone".
      if (inputTel == "") {
          telephoneError.textContent = "Téléphone est vide";
          telephoneError.style.color = "red";
          isValid = false;
      } else if (!telRegex.test(inputTel)) {
          telephoneError.textContent = "Téléphone n'est pas valide";
          telephoneError.style.color = "red";
          isValid = false;
      } else {
          telephoneError.textContent = "";
      }

      if (inputpostcode == "") {
        postcodeError.textContent = "Le code postal est vide";
        postcodeError.style.color = "red";
        isValid = false;
    } else if (!postcodeRegex.test(inputpostcode)) {
        postcodeError.textContent = "Téléphone n'est pas valide";
        postcodeError.style.color = "red";
        isValid = false;
    } else {
        postcodeError.textContent = "";
    }

      // Validation du champ "Message".
      if (inputMessage == "") {
          messageError.textContent = "Message est vide";
          messageError.style.color = "red";
          isValid = false;
      } else if (!messageRegex.test(inputMessage)) {
          messageError.textContent = "Message n'est pas valide";
          messageError.style.color = "red";
          isValid = false;
      } else {
          messageError.textContent = "";
      }

      // Si le formulaire n'est pas valide, empêcher l'envoi.
      if (!isValid) {
          e.preventDefault(); // Empêche l'action par défaut (soumission du formulaire).
      }
  });
}

// Appel de la fonction pour activer la vérification.
verificationDeInput();
    





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



{
    // try catch
    // si la requête a réussi,
    // bonne pratique, fermez le curseur
    // renvoyer le tableau de(s) message(s)



    // return [];



    // sinon, on fait un die de l'erreur
}

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




   /




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