/*
 * File name: loginScript.js
 * Author: Miao Yang 
 * Course: CST8285 – 311
 * Assignment: Assignment 2
 * Due Date: 12-04-2022
 * Professor: Abul Qasim
 * Purpose: This file is the javascript for login.php.
 */

// get the input elements
let emailInput = document.getElementById("email");
let passInput = document.getElementById("pass");

// create paragraph to display the error Msg returented by validateEmail() function 
// and assign this paragraph to the class warning to style the error MSg
let emailError = document.createElement("p");
//append the created element to the parent of email div
emailInput.parentNode.append(emailError);

// create paragraph to display the error Msg returented by validatePass() function 
// and assign this paragraph to the class warning to style the error MSg
let passError = document.createElement("p");
//append the created element to the parent of login div
passInput.parentNode.append(passError);


//define the global variables
let defaultMSg = "";
let emailErrorMsg = "Email Address should be non-empty with the format xyx@xyx.xyx.";
let passErrorMsg = "Password should be at least 6 characters: 1 uppercase, 1 lowercase.";
let emailNULLMsg = "";

//method to validate email
function validateEmail() {

  let regexp = /\S+@\S+\.\S+/; //reg. expression 

  if ( emailInput.value.match(regexp)) {
    emailError.textContent = defaultMSg;
    return true;
  }

  else {
    emailError.textContent = emailErrorMsg;
    emailInput.style.border = "2px solid red";
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

//event handler for submit event
function validateLogin(){

  let valid = true;
  let emailValidation = validateEmail();
  let passValidation = validatePass();

  if (emailValidation !== true || passValidation !== true) {
    valid = false;
  }
  return valid;
}

// add event listner to the email if you entered correct email,the error paragraph with be empty
emailInput.addEventListener("blur", () => { // arrow function
  let x = validateEmail();
  if (x == true) {
    emailError.textContent = defaultMSg;
    emailInput.style.border = "2px inset";
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
