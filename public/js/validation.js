addEventListener

let form = document.getElementById("form");
let firstname = document.getElementById("firstname")
let lastname = document.getElementById("lastname")
let usermail = document.getElementById("usermail")
let postcode = document.getElementById("postcode")
let phone = document.getElementById("phone")
let message = document.getElementById("message")
let bug = document.getElementById("bug");
form.addEventListener("submit", function(event){
    if(!firstnameRegex.test(firstname)){
        bug.innerHTML= '<span style="background: red;">Le prénom est incorrect</span>';
    }else if(!lastnameRegex.test(lastname)){
        bug.innerHTML= '<span style="background: red;">Le nom est incorrect</span>';
    }else if(!usermailRegex.test(usermail)){
        bug.innerHTML= '<span style="background: red;">Le email est incorrect</span>';
    }else if(!postcodeRegex.test(postcode)){
        bug.innerHTML= '<span style="background: red;">Le code postal est incorrect</span>';
    }else if(!phoneRegex.test(phone)){
        bug.innerHTML= '<span style="background: red;">Le phone est incorrect</span>';
    }else if(!messageRegex.test(message)){
        bug.innerHTML= '<span style="background: red;">Le message est incorrect</span>';
    }else{
        bug.innerHTML= '<span style="background: green;">Toutes les information sont valide</span>';
    }

})