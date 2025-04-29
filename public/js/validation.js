document.addEventListener("DOMContentLoaded", function () {
    // form & spans
    const form = document.getElementById("form");
    const spanName = document.getElementById("spanName");
    const spanSurname = document.getElementById("spanSurname");
    const spanEmail = document.getElementById("spanEmail");
    const spanPhone = document.getElementById("spanPhone");
    const spanMessage = document.getElementById("spanMessage");
    const spanGeneral = document.getElementById("spanGeneral");

    // Regex (tchat GPT et j'assume)
    const nameRegex = /^[a-zA-ZÀ-ÖØ-öø-ÿ\s'-]{2,60}$/;
    const surnameRegex = /^[a-zA-ZÀ-ÖØ-öø-ÿ\s'-]{2,60}$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const postalRegex = /^[0-9]{4}$/;
    const phoneRegex = /^[0-9]{10}$/;
    const messageRegex = /^.{0,500}$/;

    function validateForm() {
        let valid = true;
        let allEmpty = true;

        // stockage des champs du formulaire
        const name = document.getElementById("nameInput").value.trim();
        const surname = document.getElementById("surnameInput").value.trim();
        const email = document.getElementById("emailInput").value.trim();
        const postal = document.getElementById("postalInput").value.trim();
        const phone = document.getElementById("phoneInput").value.trim();
        const message = document.getElementById("messageInput").value.trim();

        // Reset des messages
        spanName.textContent = "";
        spanSurname.textContent = "";
        spanEmail.textContent = "";
        spanPostal.textContent = "";
        spanPhone.textContent = "";
        spanMessage.textContent = "";
        spanGeneral.textContent = "";

        // Si les sont vide ou ne respectent pas les regex = message d'erreur
        if (name === "") {
            spanName.textContent = "Ce champ est requis.";
            valid = false;
        } else if (!nameRegex.test(name)) {
            spanName.textContent = "Nom invalide.";
            valid = false;
            allEmpty = false;

        } else {
            allEmpty = false;
        }

        if (surname === "") {
            spanSurname.textContent = "Ce champ est requis.";
            valid = false;
        } else if (!surnameRegex.test(surname)) {
            spanSurname.textContent = "Prénom invalide.";
            valid = false;
            allEmpty = false;

        } else {
            allEmpty = false;
        }

        if (email === "") {
            spanEmail.textContent = "Ce champ est requis.";
            valid = false;
        } else if (!emailRegex.test(email)) {
            spanEmail.textContent = "Email invalide.";
            valid = false;
            allEmpty = false;

        } else {
            allEmpty = false;
        }

        if (postal === "") {
            spanPostal.textContent = "Ce champ est requis.";
            valid = false;
        } else if (!postalRegex.test(postal)) {
            spanPostal.textContent = "Postal invalide.";
            valid = false;
            allEmpty = false;

        } else {
            allEmpty = false;
        }

        if (phone === "") {
            spanPhone.textContent = "Ce champ est requis.";
            valid = false;
        } else if (!phoneRegex.test(phone)) {
            spanPhone.textContent = "Téléphone invalide.";
            valid = false;
            allEmpty = false;

        } else {
            allEmpty = false;
        }

        if (message === "") {
            spanMessage.textContent = "Ce champ est requis.";
            valid = false;
        } else if (!messageRegex.test(message)) {
            spanMessage.textContent = "Message invalide.";
            valid = false;
            allEmpty = false;

        } else {
            allEmpty = false;
        }

        // Si tous les champs sont vides = message d'erreur global
        if (allEmpty) {
            spanGeneral.textContent = "Tous les champs sont vides.";
            valid = false;
        }

        return valid;
    }

    form.addEventListener("submit", function (e) {
        e.preventDefault();  // Empêche la soumission par défaut
        if (validateForm()) {
            form.submit(); // Soumission si formulaire valide
        }
    });
});