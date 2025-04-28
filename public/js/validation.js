//alert("Hello world")


const form = document.getElementById("form");
const username = document.getElementById("firstname");
const lastname = document.getElementById('lastname');
const email = document.getElementById("usermail");
const phone = document.getElementById('phone');
const postcode = document.getElementById('postcode')
const text = document.getElementById('message')


form.addEventListener("submit", (e) => {
  e.preventDefault();

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
    /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@(([^<>()\[\]\\.,;:\s@"]+\.)+[^<>()\[\]\\.,;:\s@"]{2,})$/;
  return re.test(String(email).toLowerCase());
};

const isValidPhone = (phone) => {
  const re = /^[0-9]{8,9}$/
return re.test(phone);
}

const isValidPostal = (postal) => {
  const re =
    /^(?:(?:[1-9])(?:\d{3}))$/
  return re.test(postal);
}


const validateInputs = () => {
  const usernameValue = username.value.trim();
  const lastnameValue = lastname.value.trim()
  const emailValue = email.value.trim();
  const phoneValue = phone.value.trim()
  const textValue = text.value.trim()
  const postalValue = postcode.value.trim()

  if (usernameValue === "") {
    setError(username, "Please provide a username");
  } else {
    setSuccess(username);
  }

  if (lastnameValue === "") {
    setError(lastname, "Please provide a username");
  } else {
    setSuccess(lastname);
  }

  if (emailValue === "") {
    setError(email, "Please provide an email.");
  } else if (!isValidEmail(emailValue)) {
    setError(email, "Provide a valid email address.");
  } else {
    setSuccess(email);
  }

  if(phoneValue === ""){
    setError(phone, "Please provide a phone number")
  }else if (!isValidPhone(phoneValue)) {
    setError(phone, "Provide a valid phone number.")
  }else {
    setSuccess(phone)
  }

  if(postalValue === ""){
    setError(postcode, "Please provide a postal code")
  }else if (postalValue.length>4){
    setError(postcode, "Your post code is too long")
  }else if(!isValidPostal(postalValue)){
    setError(postcode, "please provide a valid post code")
  }else{
    setSuccess(postcode)
  }

  if (textValue.length > 300 ) {
    setError(text, "Too long, please shorter.")
  }else if (textValue === "") {
    setError(text, "Please provide a text")
  }else {
    setSuccess(text)
  }
};


////////////: TEXT


let wordCount = document.getElementById("wordCount");

text.addEventListener("keyup",function(){
  let characters = text.value.split('');
  wordCount.innerText = characters.length;

  if(characters > 300) {
    setError(text, "Too long")
  }
});