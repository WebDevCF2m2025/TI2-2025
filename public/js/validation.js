function validerCodePostal(postal) {
    const regex = /^\d{4}$/;
    return regex.test(postal);
}

const CodePostal = document.getElementById("postal");
const leformulaire = document.getElementById("formulaire");
leformulaire.addEventListener("submit", function(event){
    event.preventDefault();

   const postal = CodePostal.value.trim();

   if(!validerCodePostal(postal)){
        alert("le code postal n'est pas valide");
   }else{
        alert("le code postal est valide")
    }
})



function validerEmail(email) {
    const regex = /^([a-z0-9A-Z.-_]+)@([a-z0-9]+).([a-z]{2,3})$/;
    return regex.test(email);
    
}


    leformulaire.addEventListener("submit", function(event){
    event.preventDefault();

    const emailok=document.getElementById("email");
    const email= emailok.value.trim();

    if(!validerEmail(email)){
        alert("l'email n'est pas valide");
    }else{
        alert("l'email est valide")
}})

