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

    usermailRegex= /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/;
    postcodeRegex= /^\d{4}/;
    phoneRegex= /^04\d{8}$/;
    messageRegex= /^[a-zA-Z0-9 ]{1,300}$/;


    ausermailRegex.test();
    apostcodeRegex.test();
    aphoneRegex.test();
    amessageRegex.test();

    if(!ausermailRegex){
        bug.innerHTML= '<span style="background: red;">Le email est incorrect</span>';
        event.preventDefault();
    }else if(!apostcodeRegex){
        bug.innerHTML= '<span style="background: red;">Le code postal est incorrect</span>';
        event.preventDefault();
    }else if(!aphoneRegex){
        bug.innerHTML= '<span style="background: red;">Le phone est incorrect</span>';
        event.preventDefault();
    }else if(amessageRegex){
        bug.innerHTML= '<span style="background: red;">Le message est incorrect</span>';
        event.preventDefault();
    }else{
        bug.innerHTML= '<span style="background: green;">Toutes les information sont valide</span>';
    }

})