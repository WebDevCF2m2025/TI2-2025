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

    if (firstName === " ") {
        firstNameError.style.display = "block"
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