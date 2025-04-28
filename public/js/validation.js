function verificationDeInput() {
    const btn = document.getElementById("btn");
 
    const nomError = document.getElementById("NomError");
    const prenomError = document.getElementById("PrenomError");
    const emailError = document.getElementById("EmailError");
    const telephoneError = document.getElementById("TelephoneError");
    const messageError = document.getElementById("MessageError");
 
    const nameRegex = /^[A-Za-zÀ-ÿ\s'-]{2,50}$/;
    const prenomRegex = /^[A-Za-zÀ-ÿ\s'-]{2,50}$/;
    const emailRegex = /^[\w.-]+@[\w.-]+\.\w{2,}$/;
    const telRegex = /^(?:\+32|0)[1-9]\d{7,8}$/;
    const messageRegex = /^.{5,1000}$/;
 
    btn.addEventListener('click', function (e) {
        let isValid = true;
 
        const inputName = document.querySelector("#NomID").value.trim();
        const inputPrenom = document.querySelector("#prenomID").value.trim();
        const inputEmail = document.getElementById("emailID").value.trim();
        const inputTel = document.querySelector("#telephoneID").value.trim();
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