const form = document.getElementById("form");
const firstname = document.getElementById("firstname");
const lastname = document.getElementById("lastname");
const email = document.getElementById("usermail");
const phone = document.getElementById("phone");
const postal = document.getElementById("postcode");
const message = document.getElementById("message");
const topmsg = document.getElementById("topmsg");

form.addEventListener("submit", (e) => {
  e.preventDefault();

  // Validate inputs
  validateInputs();
});

const setError = (element, message) => {
  const inputControl = element.parentElement;
  const errorDisplay = inputControl.querySelector(".error");

  errorDisplay.innerText = message;
  inputControl.classList.add("error");
  inputControl.classList.remove("success");
};

const setSuccess = (element) => {
  const inputControl = element.parentElement;
  const errorDisplay = inputControl.querySelector(".error");

  errorDisplay.innerText = "";
  inputControl.classList.add("success");
  inputControl.classList.remove("error");
};

const isValidEmail = (email) => {
  const re =
    /^([a-zA-Z0-9._-]+)@([a-z0-9]+)\.([a-zA-Z]{2,3})$/;
  return re.test(String(email).toLowerCase());
};

const isValidNumber = (phone) => {
  const re = /^04\d{8}$/;
  return re.test(phone);
}

const isValidPostal = (postal) => {
  const re =/^\d{4}$/;
  return re.test(postal);
}

const validateInputs = () => {
  const firstnameValue = firstname.value.trim();
  const lastnameValue = lastname.value.trim();
  const emailValue = email.value.trim();
  const phoneValue = phone.value.trim()
  const postalValue = postal.value.trim()
  const messageValue = message.value
  let isValid = true;

  if (firstnameValue === "") {
    setError(firstname, "Veuillez entrez votre prénom.");
    isValid = false;
  } else {
    setSuccess(firstname);

  }
  if (lastnameValue === "") {
    setError(lastname, "Veuillez entrez votre nom.");
    isValid = false;
  } else {
    setSuccess(lastname);
  }

  if (phoneValue === ""){
    setError(phone, "Veuillez entrez un numéro de téléphone.")
    isValid = false;
  }else if (!isValidNumber(phoneValue)){
    setError(phone, "Veuillez entrez un numéro de téléphone valide.")
    isValid = false;
  }else {
    setSuccess(phone)

  }


  if (postalValue === ""){
    setError(postal, "Veuillez entrez un code postal.")
    isValid = false;
  }else if (!isValidPostal(postalValue)){
    setError(postal, "Veuillez entrez un code postal valide.")
    isValid = false;
  }else {
    setSuccess(postal)
  }

  if (messageValue === ""){
    setError(message, "Veuillez entrez un message.")
    isValid = false;
  }else {
    setSuccess(message)
  }

  if (emailValue === "") {
    setError(email, "Veuillez entrer une adresse email.");
    isValid = false;
  } else if (!isValidEmail(emailValue)) {
    setError(email, "Veuillez entrez une adresse mail valide.");
    isValid = false;
  } else {
    setSuccess(email);
  }
  if(isValid){
      topmsg.innerHTML = "Merci pour votre message.";
    setTimeout(() => {
      form.submit();
    }, 1200);
  }else {
    topmsg.innerHTML = "Veuillez remplir tous les champs correctement.";
    setTimeout(() => {
      location.reload()
    }, 1400);

  }

};


//// TEXT COUNT////

let wordCount = document.getElementById("wordCount");

message.addEventListener("keyup",function(){
  let characters = message.value.split('');
  wordCount.innerText = characters.length;
});
