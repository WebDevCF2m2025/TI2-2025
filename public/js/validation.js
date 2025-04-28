
function verifPostal(postal) {
    const postcode = /^\d{4}$/;
    return postcode.test(postal);
}

function verifEmail(mail) {
    const usermail = /^([a-zA-Z0-9.-_]+)@([a-z0-9]+)\.([a-z]{2,3})$/;
    return usermail.test(mail);
}

function verifNum(num) {
    const phone = /^(04)\d{8}$/;
    return phone.test(num);
}

const codeP = document.getElementById('postcode');
const eemail = document.getElementById('usermail');
const numm = document.getElementById(`phone`);
const form = document.getElementById('formu');

form.addEventListener('submit', function (e) {
    e.preventDefault();
    const postalCode = codeP.value.trim();
    const email = eemail.value.trim();
    const phone = numm.value.trim();

    alert(verifPostal(postalCode) ? "Code postal valide" : "Code postal invalide");
    alert(verifEmail(email) ? "Email valide" : "Email invalide");
    alert(verifNum(phone) ? "Numero valide" : "Numero invalide");
});