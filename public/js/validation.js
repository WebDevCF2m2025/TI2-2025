

let form = document.getElementById("form");
let yes = document.getElementById("yes");
let firstname = document.getElementById("firstname")
let lastname = document.getElementById("lastname")
let usermail = document.getElementById("usermail")
let postcode = document.getElementById("postcode")
let phone = document.getElementById("phone")
let message = document.getElementById("message")
let bug = document.getElementById("bug");

let usermailRegex= /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/;
let postcodeRegex= /^\d{4}$/;
let phoneRegex= /^04\d{8}$/;
let messageRegex= /^[a-zA-Z0-9 ]{1,300}$/;


function ausermailRegex (a){
    console.log(a.value);
    return usermailRegex.test(a.value);
}
function apostcodeRegex (a){
    console.log(a.value);
    return postcodeRegex.test(a.value);
}
function aphoneRegex (a){
    console.log(a.value);
    return phoneRegex.test(a.value);
}
function amessageRegex (a){
    console.log(a.value);
    return messageRegex.test(a.value);
}


form.addEventListener("submit", function(event){

   
    if(!ausermailRegex(usermail)){
        bug.innerHTML= '<span style="background: red;">Le email est incorrect</span>';
        yes.innerHTML= '<span style="color: red;">Message non enrigstré</span>';
        event.preventDefault();
    }else if(!apostcodeRegex(postcode)){
        bug.innerHTML= '<span style="background: red;">Le code postal est incorrect</span>';
        event.preventDefault();
        yes.innerHTML= '<span style="color: red;">Message non enrigstré</span>';
    }else if(!aphoneRegex(phone)){
        bug.innerHTML= '<span style="background: red;">Le numéro est incorrect</span>';
        event.preventDefault();
        yes.innerHTML= '<span style="color: red;">Message non enrigstré</span>';
    }else if(!amessageRegex(message)){
        bug.innerHTML= '<span style="background: red;">Le message est incorrect</span>';
        event.preventDefault();
        yes.innerHTML= '<span style="color: red;">Message non enrigstré</span>';
    }

})