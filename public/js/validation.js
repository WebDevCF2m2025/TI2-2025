
const regexName = /^[a-zA-ZÀ-ÿ\s'-]{2,50}$/;
const regexEmail = /^[a-zA-Z0-9]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,}$/;
const regexTel = /^(\+32|0)[1-9](\d{2}){4}$/;
const regexPostal = /^\d{4}$/;

const form = document.querySelector('.form');

const prenomDiv = document.querySelector('.errorprenom');
const nomDiv = document.querySelector('.errornom');
const emailDiv = document.querySelector('.erroremail');
const telDiv = document.querySelector('.errortelephone');
const postalDiv = document.querySelector('.errorpostal');

function EnvoieFormulaire() {
    let isValid = true;

    const prenom = document.getElementById('prenom').value.trim();
    const nom = document.getElementById('nom').value.trim();
    const email = document.getElementById('mail').value.trim();
    const tel = document.getElementById('tel').value.trim();
    const postal = document.getElementById('postal').value.trim();

    if (prenom === "") {
        prenomDiv.innerText = "Veuillez entrer votre prénom";
        prenomDiv.style.color = "red";
        isValid = false;
    } else if (!regexName.test(prenom)) {
        prenomDiv.innerText = "Veuillez entrer un prénom valide";
        prenomDiv.style.color = "red";
        isValid = false;
    }


    if (nom === "") {
        nomDiv.innerText = "Veuillez entrer votre nom";
        nomDiv.style.color = "red";
        isValid = false;
    } else if (!regexName.test(nom)) {
        nomDiv.innerText = "Veuillez entrer un nom valide";
        nomDiv.style.color = "red";
        isValid = false;
    }

    if (email === "") {
        emailDiv.innerText = "Veuillez entrer votre email";
        emailDiv.style.color = "red";
        isValid = false;
    } else if (!regexEmail.test(email)) {
        emailDiv.innerText = "Veuillez entrer un email valide";
        emailDiv.style.color = "red";
        isValid = false;
    }

    if (tel === "") {
        telDiv.innerText = "Veuillez entrer votre numéro de téléphone";
        telDiv.style.color = "red";
        isValid = false;
    } else if (!regexTel.test(tel)) {
        telDiv.innerText = "Veuillez entrer un numéro de téléphone valide";
        telDiv.style.color = "red";
        isValid = false;
    }

    if (postal === "") {
        postalDiv.innerText = "Veuillez entrer votre code postal";
        postalDiv.style.color = "red";
        isValid = false;
    } else if (!regexPostal.test(postal)) {
        postalDiv.innerText = "Veuillez entrer un code postal valide";
        postalDiv.style.color = "red";
        isValid = false;
    }

    return isValid;
}

form.addEventListener('submit', function (e) {
        e.preventDefault();
        if (EnvoieFormulaire()) {
        form.submit();
    }
}
);

const compteur = document.getElementById('compteur');
const maxChar = 300;

compteur.addEventListener("input",() {

});