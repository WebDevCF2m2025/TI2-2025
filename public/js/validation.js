document.addEventListener("DOMContentLoaded", function () {
    // Sélection des éléments du formulaire
    const nameInput = document.getElementById("nameInput");
    const surnameInput = document.getElementById("surnameInput");
    const emailInput = document.getElementById("emailInput");
    const postalInput = document.getElementById("postalInput");
    const phoneInput = document.getElementById("phoneInput");
    const messageInput = document.getElementById("messageInput");

    // span des formulaires
    const spanName = document.getElementById("spanName");
    const spanSurname = document.getElementById("spanSurname");
    const spanEmail = document.getElementById("spanEmail");
    const spanPostal = document.getElementById("spanPostal");
    const spanPhone = document.getElementById("spanPhone");
    const spanMessage = document.getElementById("spanMessage");
    const spanGeneral = document.getElementById("spanGeneral");

    // Regex pour validation
    const nameRegex = /^[a-zA-ZÀ-ÖØ-öø-ÿ\s'-]{2,60}$/;
    const surnameRegex = /^[a-zA-ZÀ-ÖØ-öø-ÿ\s'-]{2,60}$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const postalRegex = /^[0-9]{4}$/;
    const phoneRegex = /^04[0-9]{8}$/; 
    const messageRegex = /^[\s\S]{10,500}$/;

    // Validation en temps réel pour chaque champ
    nameInput.addEventListener("input", function () {
        let value = nameInput.value.trim();
        if (value === "") {
            spanName.textContent = "Ce champ est requis.";
            spanName.style.color = "red";
        } else if (!nameRegex.test(value)) {
            spanName.textContent = "Nom invalide.";
            spanName.style.color = "red";
        } else {
            spanName.textContent = "Nom valide.";
            spanName.style.color = "green";
        }
    });

    surnameInput.addEventListener("input", function () {
        const value = surnameInput.value.trim();
        if (value === "") {
            spanSurname.textContent = "Ce champ est requis.";
            spanSurname.style.color = "red";
        } else if (!surnameRegex.test(value)) {
            spanSurname.textContent = "Prénom invalide.";
            spanSurname.style.color = "red";
        } else {
            spanSurname.textContent = "Prénom valide.";
            spanSurname.style.color = "green";
        }
    });

    emailInput.addEventListener("input", function () {
        const value = emailInput.value.trim();
        if (value === "") {
            spanEmail.textContent = "Ce champ est requis.";
            spanEmail.style.color = "red";
        } else if (!emailRegex.test(value)) {
            spanEmail.textContent = "Email invalide.";
            spanEmail.style.color = "red";
        } else {
            spanEmail.textContent = "Email valide.";
            spanEmail.style.color = "green";
        }
    });

    postalInput.addEventListener("input", function () {
        const value = postalInput.value.trim();
        if (value === "") {
            spanPostal.textContent = "Ce champ est requis.";
            spanPostal.style.color = "red";
        } else if (!postalRegex.test(value)) {
            spanPostal.textContent = "Code postal invalide.";
            spanPostal.style.color = "red";
        } else {
            spanPostal.textContent = "Code postal valide.";
            spanPostal.style.color = "green";
        }
    });

    phoneInput.addEventListener("input", function () {
        const value = phoneInput.value.trim();
        if (value === "") {
            spanPhone.textContent = "Ce champ est requis.";
            spanPhone.style.color = "red";
        } else if (!phoneRegex.test(value)) {
            spanPhone.textContent = "Numéro invalide.";
            spanPhone.style.color = "red";
        } else {
            spanPhone.textContent = "Numéro valide.";
            spanPhone.style.color = "green";
        }
    });

    messageInput.addEventListener("input", function () {
        const value = messageInput.value.trim();
        const lengthValue = messageInput.value.length;
    
        // Validation du message
        if (value === "") {
            spanMessage.textContent = "Ce champ est requis.";
            spanMessage.style.color = "red";
        } else if (!messageRegex.test(value)) {
            spanMessage.textContent = "Message trop court.";
            spanMessage.style.color = "red";
        } else {
            spanMessage.textContent = "Message valide.";
            spanMessage.style.color = "green";
        }
    
        // Limiter la saisie à 300 caractères avec substring qui accepte entre 0 et 300 caracteres sinon il les ignores
        if (lengthValue > 300) {
            messageInput.value = messageInput.value.substring(0, 300);
        }
    
        // Mise à jour du compteur
        compteur.innerHTML = `${messageInput.value.length}/300`;
        
        errorLimit.style.color = "black"; 
        errorLimit.innerHTML = ""; 
    
        if (messageInput.value.length === 300) {
            errorLimit.innerHTML = "Limite atteinte !";
            errorLimit.style.color = "red";
        }
    });
    

    // fonction pour valider le formulaire
    function validateForm() {
        let valid = true;
        let allEmpty = true;

        if (nameInput.value.trim() === "") {
            spanName.textContent = "Ce champ est requis.";
            spanName.style.color = "red";
            valid = false;
        } else if (!nameRegex.test(nameInput.value.trim())) {
            spanName.textContent = "Nom invalide.";
            spanName.style.color = "red";
            valid = false;
        } else {
            spanName.textContent = "Nom valide.";
            spanName.style.color = "green";
            allEmpty = false;
        }

        if (surnameInput.value.trim() === "") {
            spanSurname.textContent = "Ce champ est requis.";
            spanSurname.style.color = "red";
            valid = false;
        } else if (!surnameRegex.test(surnameInput.value.trim())) {
            spanSurname.textContent = "Prénom invalide.";
            spanSurname.style.color = "red";
            valid = false;
        } else {
            spanSurname.textContent = "Prénom valide.";
            spanSurname.style.color = "green";
            allEmpty = false;
        }

        if (emailInput.value.trim() === "") {
            spanEmail.textContent = "Ce champ est requis.";
            spanEmail.style.color = "red";
            valid = false;
        } else if (!emailRegex.test(emailInput.value.trim())) {
            spanEmail.textContent = "Email invalide.";
            spanEmail.style.color = "red";
            valid = false;
        } else {
            spanEmail.textContent = "Email valide.";
            spanEmail.style.color = "green";
            allEmpty = false;
        }

        if (postalInput.value.trim() === "") {
            spanPostal.textContent = "Ce champ est requis.";
            spanPostal.style.color = "red";
            valid = false;
        } else if (!postalRegex.test(postalInput.value.trim())) {
            spanPostal.textContent = "Code postal invalide.";
            spanPostal.style.color = "red";
            valid = false;
        } else {
            spanPostal.textContent = "Code postal valide.";
            spanPostal.style.color = "green";
            allEmpty = false;
        }

        if (phoneInput.value.trim() === "") {
            spanPhone.textContent = "Ce champ est requis.";
            spanPhone.style.color = "red";
            valid = false;
        } else if (!phoneRegex.test(phoneInput.value.trim())) {
            spanPhone.textContent = "Numéro invalide.";
            spanPhone.style.color = "red";
            valid = false;
        } else {
            spanPhone.textContent = "Numéro valide.";
            spanPhone.style.color = "green";
            allEmpty = false;
        }


        // Vérification de la limite maximale
        let total = messageInput.value.length;
        compteur.innerHTML = `${total}/300`;  
        if (total === 300) {
            messageInput.value = messageInput.value.substring(0, 300); // Tronque le texte
            compteur.innerHTML = `${total}/300`;
            errorLimit.innerHTML = "Limite atteinte !";
        } else {
            errorLimit.innerHTML = "";
        }
        
    
        // Validation du message
        if (messageInput.value.trim() === "") {
            spanMessage.textContent = "Ce champ est requis.";
            spanMessage.style.color = "red";
            valid = false;

        } else if (!messageRegex.test(messageInput.value.trim())) {
            spanMessage.textContent = "Message invalide.";
            spanMessage.style.color = "red";
            valid = false;

        } else {
            spanMessage.textContent = "Message valide.";
            spanMessage.style.color = "green";
            allEmpty = false;
            
        }
    

        // verification si tout les champs sont vide avec allEmpty si false ou true 
        if (allEmpty) {
            spanGeneral.textContent = "Tous les champs sont vides.";
            valid = false;
            // verification si les champs sont valid si true ou false
        } else if (valid) {
            spanGeneral.textContent = "Données enregistrées !";
            spanGeneral.style.color = "green";
            spanGeneral.style.fontWeight = "bolder";
        }

        return valid;
    }


        // Validation au moment de la soumission
        form.addEventListener("submit", function (e) {
            e.preventDefault();
            if (validateForm()) {
                setTimeout(() => {
                    form.submit();
                }, 1300);
            }
        });
});





// VESRION AVEC BOUCLE

// let inputs = [
//     document.getElementById("nameInput"),
//     document.getElementById("surnameInput"),
//     document.getElementById("emailInput"),
//     document.getElementById("postalInput"),
//     document.getElementById("phoneInput"),
//     document.getElementById("messageInput")
// ];

// let spans = [
//     document.getElementById("spanName"),
//     document.getElementById("spanSurname"),
//     document.getElementById("spanEmail"),
//     document.getElementById("spanPostal"),
//     document.getElementById("spanPhone"),
//     document.getElementById("spanMessage"),
//     document.getElementById("spanGeneral")
// ];

// let regex = [
//     /^[a-zA-ZÀ-ÖØ-öø-ÿ\s'-]{2,60}$/, // Prénom
//     /^[a-zA-ZÀ-ÖØ-öø-ÿ\s'-]{2,60}$/, // Nom
//     /^[^\s@]+@[^\s@]+\.[^\s@]+$/,     // Email
//     /^[0-9]{4}$/,                     // Code postal
//     /^04[0-9]{8}$/,                    // Téléphone
//     /^[\s\S]{10,500}$/                // Message
// ];

// let msgInput = document.getElementById("messageInput")
// let compteur = document.getElementById('compteur');
// let errorLimit = document.getElementById('errorLimit');
// let form = document.getElementById('form');

// // Mise à jour du compteur en temps réel
// msgInput.addEventListener("input", function () {
//     let lengthCurrentMessage = msgInput.value.length;

    
//     // Empêcher l'utilisateur de taper plus de 300 caractères
//     if (lengthCurrentMessage > 300) {
//         msgInput.value = msgInput.value.substring(0, 300); // Tronquer le texte à 300 caractères
//         lengthCurrentMessage = 300; // Corriger la longueur affichée
//     }

//     compteur.textContent = `${lengthCurrentMessage}/300`

//     if (lengthCurrentMessage >= 300) {
//         compteur.textContent = `${lengthCurrentMessage}/300`;
//         errorLimit.textContent = `Limite atteinte.`;
//         errorLimit.style.color = "red";
//     } else {
//         errorLimit.textContent = "";
//         errorLimit.style.color = "black";
//     }
// });

// // Validation des champs du formulaire
// inputs.forEach((input, i) => {
//     input.addEventListener("input", function () {
//         let value = input.value.trim();
//         let span = spans[i];
//         let currentRegex = regex[i];

//         if (value === "") {
//             span.textContent = "Ce champ est requis.";
//             span.style.color = "red";
//         } else if (!currentRegex.test(value)) {
//             span.textContent = "Entrée invalide.";
//             span.style.color = "red";
//         } else {
//             span.textContent = "Entrée valide.";
//             span.style.color = "green";
//         }
//     });
// });

// // Validation complète du formulaire avant soumission
// form.addEventListener("submit", function (e) {
//     e.preventDefault();
//     let isValid = true;

//     inputs.forEach((input, i) => {
//         let value = input.value.trim();
//         let span = spans[i];
//         let currentRegex = regex[i];

//         if (value === "") {
//             span.textContent = "Ce champ est requis.";
//             span.style.color = "red";
//             isValid = false;
//         } else if (!currentRegex.test(value)){
//             span.textContent = "Entrée invalide.";
//             span.style.color = "red";
//             isValid = false;
//         } else {
//             span.textContent = "Entrée valide.";
//             span.style.color = "green";
//         }
//     });

//     if (msgInput.value.length >= 300) {
//         errorLimit.textContent = `Limite atteinte.`;
//         errorLimit.style.color = "red";
//     } 


//     if (isValid) {
//         spans[spans.length - 1].textContent = "Formulaire valide !";
//         spans[spans.length - 1].style.color = "green";

//         setTimeout(() => {
//             form.submit();
//         }, 1300);
//     } else {
//         spans[spans.length - 1].textContent = "Formulaire invalide !";
//         spans[spans.length - 1].style.color = "red";

//     }
// });