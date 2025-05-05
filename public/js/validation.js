

const form = document.getElementById("form");
const yes = document.getElementById("yes");
const firstname = document.getElementById("firstname")
const lastname = document.getElementById("lastname")
const usermail = document.getElementById("usermail")
const postcode = document.getElementById("postcode")
const phone = document.getElementById("phone")
const message = document.getElementById("message")
const bug = document.getElementById("bug");

const usermailRegex= /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/;
const postcodeRegex= /^\d{4}$/;
const phoneRegex= /^04\d{8}$/;
const messageRegex= /^[a-zA-Z0-9 ]{1,300}$/;


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
    event.preventDefault();  
    if(!ausermailRegex(usermail)){
        bug.innerHTML= '<span style="background: red;">Le email est incorrect</span>';
        yes.innerHTML= '<span style="color: red;">Message non enrigstré</span>';
    }else if(!apostcodeRegex(postcode)){
        bug.innerHTML= '<span style="background: red;">Le code postal est incorrect</span>';
        yes.innerHTML= '<span style="color: red;">Message non enrigstré</span>';
    }else if(!aphoneRegex(phone)){
        bug.innerHTML= '<span style="background: red;">Le numéro est incorrect</span>';
        yes.innerHTML= '<span style="color: red;">Message non enrigstré</span>';
    }else if(!amessageRegex(message)){
        bug.innerHTML= '<span style="background: red;">Le message est incorrect</span>';
        yes.innerHTML= '<span style="color: red;">Message non enrigstré</span>';
    }

})


let score = document.getElementById("score");
let compte = 0;
let text;
let textReduit;
message.addEventListener("input",function(){
    text = message.value;
       
    compte = text.length;
    score.innerHTML = compte + "/300"
    if (text.length >= 300){
        textReduit =text.substring(0, text.length -(text.length-298)) 
        message.value = textReduit;
        console.log("c'est trop long");
    }

});