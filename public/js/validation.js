function verification(phone) {
    const regex = /^(04)\d{8}$/;
    return regex.test(phone)
    
}


    const telBel= document.getElementById("phone")
    const formulaire = document.getElementById(formulaire)
formulaire.addEventListener('submit', function (e){
e.preventDefault();
const telephonePrtableBel = telBel.value.trim();
if (verification(tel)){
    alert("numero valid")
}else{
    alert("numero invalide")
}
})




function verification(postcode) {
    const regex = /^(\d{4})$/;
    return regex.test(postcode)
    
}


    const postBel= document.getElementById("postcode")
    const formulaire = document.getElementById(formulaire)
formulaire.addEventListener('submit', function (e){
e.preventDefault();
const postcodeBel = postBel.value.trim();
if (verification(tel)){
    alert("numero valid")
}else{
    alert("numero invalide")
}
})