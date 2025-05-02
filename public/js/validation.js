const leformulaire = document.getElementById("registrationForm");
const CodePostal = document.getElementById("postal");
const email=document.getElementById("email");
const phone=document.getElementById("portable");
const message=document.getElementById("message");
const bug =document.getElementById("bug");
const envoye =document.getElementById("envoye");
const pasenvoye =document.getElementById("pasenvoye");


function validerCodePostal(postal) {
    const regex = /^\d{4}$/;
    return regex.test(postal);
}

function validerEmail(email) {
    const regex = /^([a-z0-9A-Z.-_]+)@([a-z0-9]+).([a-z]{2,3})$/;
    return regex.test(email);
}

function validerPhone(phone) {
    const regex = /^04\d{8}$/;
    return regex.test(phone);
}


leformulaire.addEventListener("submit", function(event){
    event.preventDefault();
    
    const mail = email.value.trim(); 

    if(validerEmail(mail)){
        alert ("L'email est valide");
    }else{
        alert ("L'email est invalide");
    }

    const postalcode = postal.value.trim();
   if(validerCodePostal(postalcode)){
        alert ("Le code postal est valide");
   }else{
    alert ("Le code postal est invalide");
   }

    const telephone = phone.value.trim(); 
    if(validerPhone(telephone)){
        alert ("Le téléphone est valide");
    }else{
        alert ("Le téléphone est invalide");
    }

    leformulaire.submit();
});








    
    

