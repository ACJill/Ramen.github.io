/*
 * File name: regisScript.js
 * Author: Miao Yang 
 * Course: CST8285 – 311
 * Assignment: Assignment 2
 * Due Date: 12-04-2022
 * Professor: Abul Qasim
 * Purpose: This file is the javascript for registration.php.
 */

// set the buttons' color
document.querySelectorAll("button")[0].style.backgroundColor = "#007CFF";
document.querySelectorAll("button")[0].style.color = "white";
document.querySelectorAll("button")[1].style.backgroundColor = "red";
document.querySelectorAll("button")[1].style.color = "white";

// get the input elements
let emailInput = document.getElementById("email");
let userNameInput = document.getElementById("login");
let passInput = document.getElementById("pass");
let pass2Input = document.getElementById("pass2");
let newsletterInput = document.getElementById("newsletter");
let termInput = document.getElementById("terms");


// create paragraph to display the error Msg returented by validateEmail() function 
// and assign this paragraph to the class warning to style the error MSg
let emailError = document.createElement("p");
//append the created element to the parent of email div
emailInput.parentNode.append(emailError);

// create paragraph to display the error Msg returented by validateLogin() function 
// and assign this paragraph to the class warning to style the error MSg
let userNameError = document.createElement("p");
//append the created element to the parent of login div
userNameInput.parentNode.append(userNameError);

// create paragraph to display the error Msg returented by validatePass() function 
// and assign this paragraph to the class warning to style the error MSg
let passError = document.createElement("p");
//append the created element to the parent of login div
passInput.parentNode.append(passError);

// create paragraph to display the error Msg returented by validatePass2() function 
// and assign this paragraph to the class warning to style the error MSg
let pass2Error = document.createElement("p");
//append the created element to the parent of login div
pass2Input.parentNode.append(pass2Error);

// create paragraph to display the error Msg returented by validateTerms() function 
// and assign this paragraph to the class warning to style the error MSg
let termError = document.createElement('p');
//append the created element to the parent of check div
termInput.parentNode.append(termError);
termError.style.display = "inline-block";

//define the global variables
let defaultMSg = "";
let emailErrorMsg = "✖ Email Address should be non-empty with the format xyx@xyx.xyx.";
let userNameErrorMsg = "✖ User name should be non-empty, and within 20 characters long.";
let passErrorMsg = "✖ Password should be at least 6 characters: 1 uppercase, 1 lowercase.";
let pass2ErrorMsg = "✖ Please retype password.";
let termsErrorMsg = "✖ Please accept the terms and conditions.";

//method to validate email
function validateEmail() {

  let regexp = /\S+@\S+\.\S+/; //reg. expression 

  if (emailInput.value.match(regexp)) {
    emailError.textContent = defaultMSg;
    return true;
  }
  else {
    emailError.textContent = emailErrorMsg;
    emailInput.style.border = "2px solid red";
    return false;
  }
}

//method to validate login
function validateLogin() {
  if (userNameInput.value.length > 0 && userNameInput.value.length < 20) {
    userNameError.textContent = defaultMSg;
    return true;
  }
  else {
    userNameError.textContent = userNameErrorMsg;
    userNameInput.style.border = "2px solid red";
    return false;
  }
}

//method to validate pass
function validatePass() {
  let regexp = /^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\d]{6,}$/; //reg. expression 

  if (passInput.value.match(regexp)) {
    passError.textContent = defaultMSg;
    return true;
  }
  else {
    passError.textContent = passErrorMsg;
    passInput.style.border = "2px solid red";
    return false;
  }
}


//method to validate pass2
function validatePass2() {
  if (pass2Input.value.match(passInput.value) && passError.textContent == defaultMSg) {
    pass2Error.textContent = defaultMSg;
    return true;
  }
  else {
    pass2Error.textContent = pass2ErrorMsg;
    pass2Input.style.border = "2px solid red";
    return false;
  }
}

//method to validate the terms 
function validatTerms() {
  if (termInput.checked) {
    termError.textContent = defaultMSg;
    return true;
  }
  else {
    termError.textContent = termsErrorMsg;
    return false;
  }
}

//event handler for submit event
function validate() {

  let valid = true;
  let emailValidation = validateEmail();
  let loginValidation = validateLogin();
  let passValidation = validatePass();
  let pass2Validation = validatePass2();
  let termsValidation = validatTerms();

  if (emailValidation !== true || termsValidation !== true || loginValidation !== true || passValidation !== true || pass2Validation !== true) {
    valid = false;
  }
  return valid;
}

// event listner to empty the text inside the 'p's when reset
function resetFormError() {
  location.reload();
}
document.querySelector("form").addEventListener('reset', resetFormError);

// add event listner to the email if you entered correct email,the error paragraph with be empty
emailInput.addEventListener("blur", () => { // arrow function
  let x = validateEmail();
  if (x == true) {
    emailError.textContent = defaultMSg;
    emailInput.style.border = "2px inset";
  }
});

// add event listner to the login if you entered correct user name,the error paragraph with be empty
userNameInput.addEventListener("blur", () => { // arrow function
  let x = validateLogin();
  if (x == true) {
    userNameError.textContent = defaultMSg;
    userNameInput.style.border = "2px inset";
  }
});

// add event listner to the password if you entered correct password,the error paragraph with be empty
passInput.addEventListener("blur", () => { // arrow function
  let x = validatePass();
  if (x == true) {
    passError.textContent = defaultMSg;
    passInput.style.border = "2px inset";
  }
});

// add event listner to the password2 if you entered correct password2,the error paragraph with be empty
pass2Input.addEventListener("blur", () => { // arrow function
  let x = validatePass2();
  if (x == true) {
    passError.textContent = defaultMSg;
    pass2Input.style.border = "2px inset";
  }
});

// add event listner to the checkbox newsletter if you check the newsletter box,the alert about possible spam
newsletterInput.addEventListener("change", function () {// anonymous function
  if (this.checked) {
    alert("You may get possible spam!");
  }
});

// add event listner to the checkbox terms if you check the terms box,the error paragraph with be empty
termInput.addEventListener("change", function () {// anonymous function
  if (this.checked) {
    termError.textContent = defaultMSg;
  }
});
