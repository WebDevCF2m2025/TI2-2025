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



