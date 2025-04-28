function verificationDeInput() {
    const btn = document.getElementById("btn");

    const nomError = document.getElementById("NomError");
    const prenomError = document.getElementById("PrenomError");
    const emailError = document.getElementById("EmailError");
    const telephoneError = document.getElementById("TelephoneError");
    const postcodeError = document.getElementById("postcodeError");
    const messageError = document.getElementById("MessageError");

    const nameRegex = /^[A-Za-zÀ-ÿ\s'-]{2,50}$/;
    const prenomRegex = /^[A-Za-zÀ-ÿ\s'-]{2,50}$/;
    const emailRegex = /^[\w.-]+@[\w.-]+\.\w{2,}$/;
    const telRegex = /^(?:\+32|0)[1-9]\d{7,8}$/;
    const postcodeRegex = /^\d{4}$/;
    const messageRegex = /^.{5,1000}$/;

    btn.addEventListener('click', function (e) {
        let isValid = true;

        const inputName = document.querySelector("#NomID").value.trim();
        const inputPrenom = document.querySelector("#prenomID").value.trim();
        const inputEmail = document.getElementById("emailID").value.trim();
        const inputTel = document.querySelector("#telephoneID").value.trim();
        const inputpostcode = document.querySelector("#postcodeID").value.trim();
        const inputMessage = document.querySelector("#messageID").value.trim();

        // Nom
        if (inputName == "") {
            nomError.textContent = "Nom est vide";
            nomError.style.color = "red";
            isValid = false;
        } else if (!nameRegex.test(inputName)) {
            nomError.textContent = "Nom n'est pas valide";
            nomError.style.color = "red";
            isValid = false;
        } else {
            nomError.textContent = "";
        }

        // Prénom
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

        // Email
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

        // Téléphone
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
            postcodeError.textContent = "code postal est vide";
            postcodeError.style.color = "red";
            isValid = false;
        } else if (!telRegex.test(inputTel)) {
            postcodeError.textContent = "code postal n'est pas valide";
            postcodeError.style.color = "red";
            isValid = false;
        } else {
            postcodeError.textContent = "";
        }



        // Message
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

        if (!isValid) {
            e.preventDefault(); 
        }
    });
}

verificationDeInput();

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
    const nameRegex = /^[A-Za-zÀ-ÿ\s'-]{2,50}$/; // Nom : lettres, espaces, apostrophes, tirets (2 à 50 caractères).
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
        const inputpostcode  = document.querySelector("#postcodeID").value.trim();
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
            postcodeError.textContent = "Le champ du code postal est vide";
            postcodeError.style.color = "red";
            isValid = false;
        } else if (!telRegex.test(inputpostcode)) {
            postcodeError.textContent = "Le code postal n'est pas valide";
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

verificationDeInput();