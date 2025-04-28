
    function verificationMail(mail) {
        const regex2 = /^[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/i;
        return regex2.test(mail);
      }
      
      function verificationTel(tel) {
        const regex = /^([0])([4])........$/; 
        return regex.test(tel);
      }
      
      function verificationPostal(postal) {
        const regex = /^\d{4}$/; 
        return regex.test(postal);
      }
      
      const eMail = document.getElementById("mail");
      const numTel = document.getElementById("tel");
      const codePostal = document.getElementById("postal");
      const formulaire = document.getElementById("formulaire");
      
      
      formulaire.addEventListener('submit', function(ev) {
        ev.preventDefault();
      
        const mail = eMail.value.trim();
        const tel = numTel.value.trim();
        const postal = codePostal.value.trim();
      
        if (verificationMail(mail)) {
          alert("Mail valide");
        } else {
          alert("Mail invalide");
        }
      
        if (verificationTel(tel)) {
          alert("Numéro de téléphone valide");
        } else {
          alert("Numéro de téléphone invalide");
        }
      
        if (verificationPostal(postal)) {
          alert("Code postal valide");
        } else {
          alert("Code postal invalide");
        }
      });





    