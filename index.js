const getEmailAddress = document.querySelector(".emailField");
const getPassword = document.querySelector(".passwordField");
const emailErrorMsg = document.querySelector(".emailErrorMsg");
const passwordErrorMsg = document.querySelector(".passwordErrorMsg");

getEmailAddress.addEventListener("blur", checkEmail);
getPassword.addEventListener("blur", checkPassword);


function checkEmail (e) {
    const emailRegex = /[\w+]@[\w+].[\w{2, 4}]/i;
    const emailTest = emailRegex.test(e.target.value);
    
    if(!emailTest) {
        emailErrorMsg.textContent = "*Invalid email format";
    }
    
}

function checkPassword(e) {
    const passwordRegex = /[\w+]{6,}/i;

    if(e.target.value.length < 6) {
        passwordErrorMsg.textContent = "Password must be at lease 6 characters."
    }
}