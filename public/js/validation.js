function verificationDeInput() {
    const btn = document.getElementById("btn");
 
   
    const emailError = document.getElementById("emailError");
    const postalError = document.getElementById("postalError");
    const portableError = document.getElementById("portableError");


   
    const regexEmail = /^[^@ \t\r\n]+@[^@ \t\r\n]+\.[a-z]{2,}$/;
    const regexPostal = /^\d{4}$/;
    const regexPortable = /^04\d{8}$/;
   

 
    btn.addEventListener('click', function (e) {
        let Valid = true;

    
        const inputemail = document.getElementById("email").value.trim();
        const inputpostal = document.getElementById("postal").value.trim();
        const inputportable = document.getElementById("portable").value.trim();
        const inputmessage = document.getElementById("message").value.trim();
 
       

 
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
        if (!Valid) {
            e.preventDefault();
        }
        
    });
}
 
verificationDeInput();