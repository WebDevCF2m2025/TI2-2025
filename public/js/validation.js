console.log(`it's working`)

let mail = document.getElementById('email').value;
let postal = document.getElementById('postal').value;
let phone = document.getElementById('portable').value;
let message = document.getElementById('message').value;
let form = document.getElementById('form')

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


form.addEventListener("submit", function(e){
    e.preventDefault()
    if (mail === " " || postal === " " || phone === " " || message === " ") {
        alert("Tous les champs doivent être rempli")
    }
})