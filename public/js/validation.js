document.addEventListener("DOMContentLoaded", function () {
    // Sélection des éléments du formulaire
    const form = document.getElementById("form");
    const nameInput = document.getElementById("nameInput");
    const surnameInput = document.getElementById("surnameInput");
    const emailInput = document.getElementById("emailInput");
    const postalInput = document.getElementById("postalInput");
    const phoneInput = document.getElementById("phoneInput");
    const messageInput = document.getElementById("messageInput");

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
    const phoneRegex = /^[0-9]{10}$/;
    const messageRegex = /^[\s\S]{10,500}$/;

    // Validation en temps réel pour chaque champ
    nameInput.addEventListener("input", function () {
        const value = nameInput.value.trim();
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
        if (value === "") {
            spanMessage.textContent = "Ce champ est requis.";
            spanMessage.style.color = "red";
        } else if (!messageRegex.test(value)) {
            spanMessage.textContent = "Message invalide.";
            spanMessage.style.color = "red";
        } else {
            spanMessage.textContent = "Message valide.";
            spanMessage.style.color = "green";
        }
    });

    // Validation complète au moment de la soumission
    form.addEventListener("submit", function (e) {
        e.preventDefault();
        if (validateForm()) {
            setTimeout(() => {
                form.submit();
            }, 1300);
        }
    });

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

        let total = messageInput.value.length;
        compteur.innerHTML = total + "/300";
    
        // Vérification de la limite maximale
        if (total > 300) {
            messageInput.disabled = true; 
            compteur.innerHTML = "300/300";
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
    

        if (allEmpty) {
            spanGeneral.textContent = "Tous les champs sont vides.";
            valid = false;
        } else if (valid) {
            spanGeneral.textContent = "Données enregistrées !";
            spanGeneral.style.color = "green";
            spanGeneral.style.fontWeight = "bolder";
        }

        return valid;
    }
});