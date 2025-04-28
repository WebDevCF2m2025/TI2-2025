//////////////////////////////////// EMAIL //////////////////////////////////////////////////////

// Fonction qui permet de vérifier l'email
function verifEmail(email) {
    const reg = /^([a-zA-Z0-9._-]+)@([a-z0-9]+)\.([a-zA-Z]{2,3})$/;
    return reg.test(email);
}

// On attribue la constante email à l'id "usermail" du formulaire qui est l'email
const email = document.getElementById("usermail");
const email2 = document.getElementById("verifEmail");


//////////////////////////////////// CODE POSTAL //////////////////////////////////////////////////////

// Fonction qui permet de vérifier le code postal 
function verifCodePostal(postal) {
    const reg2 = /^\d{4}$/;
    return reg2.test(postal);
}

// On attribue la constante codePostal à l'id "postcode" du formulaire qui est le code postal
const codePostal = document.getElementById("postcode");
const codePostal2 = document.getElementById("verifCP");


//////////////////////////////////// NUMÉRO DE TÉLÉPHONE //////////////////////////////////////////////////////

// Fonction qui permet de vérifier le numéro de téléphone 
function verifTelephone(telephone) {
    const reg3 = /^04\d{8}$/;
    return reg3.test(telephone);
}

// On attribue la constante telephone à l'id "phone" du formulaire qui est le téléphone
const telephone = document.getElementById("phone");
const telephone2 = document.getElementById("verifTel");


//////////////////////////////////// EVENEMENT //////////////////////////////////////////////////////

// On attribue la constante formulaire à l'id "formulaire" du formulaire
const formulaire = document.getElementById("formulaire");


// On ajoute un événement lorsqu'on envoit le formulaire
formulaire.addEventListener("submit", function(event) {
    event.preventDefault();


    let isValid = true;
    
    const mail = email.value.trim();
    if (!verifEmail(mail)) {
        email2.textContent = 'Veuillez entrer un email valide';
        email2.style.color = 'red';
    } else {
        email2.textContent = 'E-mail valide, merci';
        email2.style.color = 'green';
    }

    const postal = codePostal.value.trim();
    if (!verifCodePostal(postal)) {
        codePostal2.textContent = 'Veuillez entrer un code postal Belge valide (4 chiffres)';
        codePostal2.style.color = 'red';
    } else {
        codePostal2.textContent = 'Code postal valide, merci';
        codePostal2.style.color = 'green';
    }

    const tel = telephone.value.trim();
    if (!verifTelephone(tel)) {
        telephone2.textContent = 'Veuillez entrer un numéro de téléphone correct (Qui commence par 04 et qui contient 10 chiffres. Ex : 0498150882)';
        telephone2.style.color = 'red';
    } else {
        telephone2.textContent = 'Numéro de téléphone valide';
        telephone2.style.color = 'red';
    }
});



//////////////////////////////////// COMPTAGE CARACTÈRES //////////////////////////////////////////////////////
const messageInput = document.getElementById('message');
const caracteresCount = document.getElementById('caracCount');

messageInput.addEventListener('input', function() {
    const maxLength = 300;
    const currentLength = messageInput.value.length;

    caracteresCount.textContent = `${currentLength} / ${maxLength} caractères`;

    if (currentLength >= maxLength) {
        caracteresCount.style.color = 'red';
        messageInput.value = messageInput.value.slice(0, maxLength); // Bloquer au max
    } else {
        caracteresCount.style.color = 'black';
    }
});