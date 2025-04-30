function verificationDeInput() {
    const btn = document.getElementById("btn");
    const prenomError = document.getElementById("prenomError");
    const nomError = document.getElementById("nomError");
   
    const emailError = document.getElementById("emailError");
    const postalError = document.getElementById("postalError");
    const portableError = document.getElementById("portableError");


    const regexPrenom = /^[A-Za-zÀ-ÿ\-\' ]+$/;
    const regexNom = /^[A-Za-zÀ-ÿ\-\' ]+$/;
    const regexEmail = /^[^@ \t\r\n]+@[^@ \t\r\n]+\.[a-z]{2,}$/;
    const regexPostal = /^\d{4}$/;
    const regexPortable = /^04\d{8}$/;
   

 
    btn.addEventListener('click', function (e) {
        let isValid = true;

        const inputprenom = document.getElementById("prenom").value.trim();
        const inputnom = document.getElementById("nom").value.trim();
        const inputemail = document.getElementById("email").value.trim();
        const inputpostal = document.getElementById("postal").value.trim();
        const inputportable = document.getElementById("portable").value.trim();
        const inputmessage = document.getElementById("message").value.trim();
    // Prénom
    if (inputprenom == "") {
        prenomError.textContent = "Prénom est vide";
        prenomError.style.color = "red";
        isValid = false;
    } else if (!regexPrenom.test(inputprenom)) {
        prenomError.textContent = "prénom n'est pas valide";
        prenomError.style.color = "red";
        isValid = false;
    } else {
        prenomError.textContent = "";
       
    }

        // Nom
        if (inputnom == "") {
            nomError.textContent = "Nom est vide";
            nomError.style.color = "red";
            isValid = false;
        } else if (!regexnom.test(inputnom)) {
            nomError.textContent = "Nom n'est pas valide";
            nomError.style.color = "red";
            isValid = false;
        } else {
            prenomError.textContent = "";
           
        }
       

 
        // Email
        if (inputemail == "") {
            emailError.textContent = "Email est vide";
            emailError.style.color = "red";
            isValid = false;
        } else if (!regexEmail.test(inputemail)) {
            emailError.textContent = "Email n'est pas valide";
            emailError.style.color = "red";
            isValid = false;
        } else {
            emailError.textContent = "";
           
        }
 
        // Téléphone
        if (inputportable == "") {
            portableError.textContent = "Téléphone est vide";
            portableError.style.color = "red";
            isValid = false;
        } else if (!regexPortable.test(inputportable)) {
            portableError.textContent = "Téléphone n'est pas valide";
            portableError.style.color = "red";
            isValid = false;
        } else {
            portableError.textContent = "";
        }

          // postal
          if (inputpostal == "") {
            postalError.textContent = "code postal est vide";
            postalError.style.color = "red";
            isValid = false;
        } else if (!regexPostal.test(inputpostal)) {
            postalError.textContent = "code postal n'est pas valide";
            postalError.style.color = "red";
            isValid = false;
        } else {
            postalError.textContent = "";
        }
        if (!isValid) {
            e.preventDefault();
        }
        
    });
}


 
verificationDeInput();

