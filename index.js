const getEmailField = document.querySelector(".emailField");
const signInBtn = document.querySelector("#sign-in-btn");


const checkEmailRegx = /\w+@.\w{2,3}/;

function checkEmail(email) {
    console.log(email.match(checkEmailRegx));
}

getEmailField.nodeValue.addEventListener('onChange', () => console.log("Hi"));
signInBtn.addEventListener('click', () => console.log(getEmailField) );