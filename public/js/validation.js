
document.addEventListener("DOMContentLoaded", function () {
    // Recuperation des spans et du formulaire
    const form = document.getElementById("form");
    const spanName = document.getElementById("spanName");
    const spanSurname = document.getElementById("spanSurname");
    const spanEmail = document.getElementById("spanEmail");
    const spanPostal = document.getElementById("spanPostal");
    const spanPhone = document.getElementById("spanPhone");
    const spanMessage = document.getElementById("spanMessage");
    const spanGeneral = document.getElementById("spanGeneral");

    // Mise en place des regex
    const nameRegex = /^[(a-zA-Z)]{2,60}$/;
    const surnameRegex = /^[a-zA-Z]{2,60}$/;
    const emailRegex = /^[a-zA-Z0-9._-]{2,60}@[a-zA-Z0-9._-]{2,60}\.[a-zA-Z]{2,3}$/;
    const postalRegex = /^[0-9]{4}$/;
    const phoneRegex = /^04[(0-9)]{8}$/;
    const messageRegex = /^[a-zA-Z0-9%._-]{0,500}$/;

    // validateur de formulaire
    function validateForm() {
        // defini sur true par defaut, si false affiche les msg derreur, sinon valide le formulaire
        let valid = true;
        let allEmpty = true;

        // ciblage des inputs
        const name = document.getElementById("name-input").value.trim();
        const surname = document.getElementById("surname-input").value.trim();
        const email = document.getElementById("email-input").value.trim();
        const postal = document.getElementById("postal-input").value.trim();
        const phone = document.getElementById("phone-input").value.trim();
        const message = document.getElementById("message-input").value.trim();

        // definition du contenu des span du formulaire
        spanName.textContent = "";
        spanSurname.textContent = "";
        spanEmail.textContent = "";
        spanPostal.textContent = "";
        spanPhone.textContent = "";
        spanMessage.textContent = "";
        spanGeneral.textContent = "";

        // prenom verif champs vide ou invalide(regX)
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

        // nom ""
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

        // email ""
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

        // code postal ""
        if (postal === "") {
            spanPostal.textContent = "Ce champ est requis.";
            valid = false;
        } else if (!postalRegex.test(postal)) {
            spanPostal.textContent = "Code postal invalide.";
            valid = false;
            allEmpty = false;

        } else {
            allEmpty = false;
        }

        // telephone ""
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

        // message ""
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

        // Si allEmpty = true, renvoi que tout les champs sont vides
        if (allEmpty) {
            spanGeneral.textContent = "Tous les champs sont vides.";
            valid = false;
        }

        // si cest non vide et valid, return valid qui est =  true
        return valid;
    }

    // au submit du formulaire
    form.addEventListener("submit", function (e) {
        // on empeche le rechargement de la page
        e.preventDefault();
        // si valideform est true ?
        if (validateForm()) {
            // force le submit du formulaire
            form.submit();
        }
    });
});