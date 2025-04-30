//////////////////////////////////// EMAIL ///////////////////////////////////////////////////////

// Fonction qui permet de vérifier l'email
function verifEmail(email) {
    const reg = /^([a-zA-Z0-9._-]+)@([a-z0-9]+)\.([a-zA-Z]{2,3})$/;
    return reg.test(email);
}

// On attribue la constante email à l'id "usermail" du formulaire qui est l'email
const email = document.getElementById("usermail");
const email2 = document.getElementById("verifEmail");



//////////////////////////////////// CODE POSTAL /////////////////////////////////////////////////

// Fonction qui permet de vérifier le code postal 
function verifCodePostal(postal) {
    const reg2 = /^\d{4}$/;
    return reg2.test(postal);
}

// On attribue la constante codePostal à l'id "postcode" du formulaire qui est le code postal
const codePostal = document.getElementById("postcode");
const codePostal2 = document.getElementById("verifCP");


//////////////////////////////////// NUMÉRO DE TÉLÉPHONE /////////////////////////////////////////

// Fonction qui permet de vérifier le numéro de téléphone 
function verifTelephone(telephone) {
    const reg3 = /^04\d{8}$/;
    return reg3.test(telephone);
}

// On attribue la constante telephone à l'id "phone" du formulaire qui est le téléphone
const telephone = document.getElementById("phone");
const telephone2 = document.getElementById("verifTel");


//////////////////////////////////// SUCCESS /////////////////////////////////////////////////////

// On attribue la constante success à l'id "success" du formulaire pour le message de validation des champs
const success = document.getElementById("succes");


//////////////////////////////////// EVENEMENT ///////////////////////////////////////////////////

// On attribue la constante formulaire à l'id "formulaire" du formulaire
const formulaire = document.getElementById("formulaire");


// On ajoute un événement lorsqu'on envoit le formulaire
formulaire.addEventListener("submit", function handleSubmit(event) {
    event.preventDefault();

    // Réinitialisation des messages
    email2.textContent = "";
    codePostal2.textContent = "";
    telephone2.textContent = "";
    success.textContent = "";

    const mail = email.value.trim();
    if (!verifEmail(mail)) {
        email2.textContent = 'Veuillez entrer un email valide';
        email2.style.color = 'red';
        return;
    }

    const postal = codePostal.value.trim();
    if (!verifCodePostal(postal)) {
        codePostal2.textContent = 'Veuillez entrer un code postal Belge valide (4 chiffres)';
        codePostal2.style.color = 'red';
        return;
    }

    const tel = telephone.value.trim();
    if (!verifTelephone(tel)) {
        telephone2.textContent = 'Veuillez entrer un numéro de téléphone correct';
        telephone2.style.color = 'red';
        return;
    }

    success.textContent = "Formulaire validé avec succès !";
    success.style.color = "green";

    setTimeout(() => {
        formulaire.submit(); // Soumission réelle
    }, 3000);
    
});



//////////////////////////////////// COMPTAGE CARACTÈRES /////////////////////////////////////////
const messageInput = document.getElementById('message');
const caracteresCount = document.getElementById('caracCount');

messageInput.addEventListener('input', function() {
    const maxLength = 300;
    const currentLength = messageInput.value.length;
    caracteresCount.textContent = `${currentLength} / ${maxLength} caractères`;

    if (currentLength >= maxLength) {
        caracteresCount.style.color = 'red';
    } else {
        caracteresCount.style.color = 'white';
    }
});