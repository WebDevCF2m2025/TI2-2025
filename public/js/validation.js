



function verificationDeInput() {
    const btn = document.getElementById("btn");


    const nomError = document.getElementById("nomError");
    const prenomError = document.getElementById("prenomError");
    const emailError = document.getElementById("emailError");
    const telephoneError = document.getElementById("telephoneError");
    const messageError = document.getElementById("messageError");
    const codePostalErro = document.getElementById("codePostalError");



    const emailRegex = /^([a-zA-Z0-9.-_]+)@([a-z0-9]+).([a-z]{2,3})$/;
    const telRegex = /^((04)|\+324)([0-9]){8}$/;
    const messageRegex = /^([a-zA-Z0-9 \+ \/ -])+$/;
    const postRegex = /^[0-9]{4}$/;

    const inputMessage = document.querySelector("#messages")
    const messageCounter = document.getElementById("messageCounter")

    inputMessage.addEventListener("input", function () {
        const messageLen = inputMessage.value.length;
        messageCounter.textContent = `${messageLen} / 300`;

        if (messageLen > 300) {
            messageCounter.style.color = "red";
        }
        else {
            messageCounter.style.color = "white";

        }
    });


    btn.addEventListener('click', function (e) {
        let isValid = true;

        const inputName = document.querySelector("#nomID").value.trim();
        const inputPrenom = document.querySelector("#prenomID").value.trim();
        const inputEmail = document.getElementById("emailID").value.trim();
        const inputTel = document.querySelector("#nbPortablelID").value.trim();
        const inputMessage = document.querySelector("#messages").value.trim();
        const inputCodePostal = document.querySelector("#codePostal").value.trim();


        if (inputName === "") {
            nomError.textContent = "Nom est vide";
            nomError.style.color = "red";
            isValid = false;
        } else {
            nomError.textContent = "";
        }

        if (inputPrenom === "") {
            prenomError.textContent = "Prénom est vide";
            prenomError.style.color = "red";
            isValid = false;
        } else {
            prenomError.textContent = "";
        }




        if (inputCodePostal === "") {
            codePostalErro.textContent = "CodePostal est vide";
            codePostalErro.style.color = "red";
            isValid = false;
        } else if (!postRegex.test(inputCodePostal)) {
            codePostalErro.textContent = "CodePostal n'est pas valide";
            codePostalErro.style.color = "red";
            isValid = false;
        } else {
            codePostalErro.textContent = "";
        }




        if (inputEmail === "") {
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


        if (inputTel === "") {
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


        if (inputMessage === "") {
            messageError.textContent = "Message est vide";
            messageError.style.color = "red";
            isValid = false;
        } else if (!messageRegex.test(inputMessage) || inputMessage.length > 300) {
            messageError.textContent = "Message n'est pas valide";
            messageError.style.color = "red";
            isValid = false;

        }
        else {
            messageError.textContent = "";
        }

        if (!isValid) {
            e.preventDefault();
        }
    });
    console.log();

}

verificationDeInput();