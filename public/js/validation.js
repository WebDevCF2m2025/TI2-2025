<<<<<<< HEAD
console.log(`it's working`)

let firstName = document.getElementById('prenom').value
let lastName = document.getElementById('nom').value
let mail = document.getElementById('email').value;
let postal = document.getElementById('postal').value;
let phone = document.getElementById('portable').value;
let message = document.getElementById('message').value;

const form = document.getElementById('form')

const allInput = [firstName, lastName, mail, postal, phone, message]


// REGEX

function verifyMail(email) {
    const mailRegex = /^([\w]+)@([\w]+).(\w{2,3})$/
    return mailRegex.test(email)
}

function verifyPostal(postal) {
    const postalRegex = /^\d{4}$/
    return postalRegex.test(postal)
}

function verifyPhone (phone) {
    const phoneRegex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/
    return phoneRegex.test(phone)
}

// MESSAGES

let firstNameError = document.getElementById('firstname-error')
let lastNameError = document.getElementById('lastname-error')
let mailError = document.getElementById('mail-error')
let postalError = document.getElementById('postal-error')
let phoneError= document.getElementById('phone-error')
let messageError= document.getElementById('message-error')

let sucessMessage = document.getElementById('success-message')

const allErrors = [firstNameError, lastNameError, mailError, postalError, phoneError, messageError]


// EVENTS

form.addEventListener("submit", function(e){
    e.preventDefault()
    const email = mail.trim()
    const postalCode = postal.trim()
    const phoneNumber = phone.trim()

    if (verifyMail(email) && verifyPostal(postalCode) && verifyPhone(phoneNumber)) {
        sucessMessage.style.display = "block"
    } else if (firstName === "") {
        firstNameError.style.display = "block"
    } else if (lastName === "") {
        lastNameError.style.display = "block"
    }
    
    
    
//     for (let i = 0; allInput.length; i++) {
//         for (let y = 0; allErrors.length; y++) {
//             if (allInput[i] === " ") {
//                 allErrors[y].style.display = "block";
//             } else if (allInput != " ") {
//                 sucessMessage.style.display = "block"
//             }
//         }
//     } 
    
})
=======
console.log("It's working ! ")

const form = document.getElementById("form")

// Posted Message Container
const postContainer = document.getElementById('post-container');

// Success message
const successMessage = document.getElementById('success');

// Error message
const errorMessage = document.getElementById('error');

// Regex
function verifyName(name) {
    const nameRegex = /^[a-zA-Z]+$/;
    return nameRegex.test(name);
}

function verifyEmail(email) {
    const emailRegex = /^[a-zA-Z0-9]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    return emailRegex.test(email);
}

/*function verifyPostCode(postCode) {
    const postCodeRegex = /^\d{4}$/;
    return postCodeRegex.test(postCode);
}*/

const verifyPostCode = (postCode) => {
    const postCodeRegex = /^\d{4}$/;
    return postCodeRegex.test(postCode);
}

const verifyPhone = (phone) => {
    const phoneRegex = /^[0-9]{10}$/;
    return phoneRegex.test(phone);
}

// Events
form.addEventListener("submit", function(e) {
    e.preventDefault();
    // User Inputs
    const firstName = document.getElementById('firstname').value;
    const lastName = document.getElementById('lastname').value;
    const email = document.getElementById('usermail').value;
    const postCode = document.getElementById('postcode').value
    const phone = document.getElementById('phone').value;
    const message = document.getElementById('message').value;

    // Inputs trimming
    const fName = firstName.trim();
    const mail = email.trim();
    const postal = postCode.trim();
    const phoneNumber = phone.trim();

    //Mail verification
    if (verifyName(fName) && verifyPostCode(postal) && verifyEmail(mail) && verifyPhone(phoneNumber) && message !== " ") {
            successMessage.textContent = "Tout est en ordre ! Merci pour votre message. ";
            errorMessage.style.display = "none";
        setTimeout(() => {
            form.submit();
        }, 1700);
    } else if (!verifyEmail(mail)) {
        errorMessage.textContent = "Email vide ou invalide";
    } else if (!verifyPostCode(postal)) {
        errorMessage.textContent = "Code postal vide ou invalide";
    } else if (!verifyPhone(phoneNumber)) {
        errorMessage.textContent = "Numéro vide ou invalide";
    } else if (firstName === " " || lastName === " " || email === " " || postCode === " " || phone === " " || message === " ") {
        errorMessage.textContent = "Tous les champs doivent être remplis";
    }
})

// BUGGIN'


// function setCounter (count) {
// let messageInput = document.getElementById("message").value;
// let counter = document.getElementById("char-counter");
//     count = 0
//     for (let i = 0; messageInput.length <= 300; i++) {
//         count += i
//         if (messageInput !== " ") {
//             counter.style.display = "block"
//             counter.innerHTML = `${count} / 300`
//         }
//     }
//     return
// }
// setCounter()


>>>>>>> main
