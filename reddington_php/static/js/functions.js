
// Handles the email text area data match checks  
export function userNameValidation(UserNameTextArea, usernameList, errorMessageId) {
        if (UserNameTextArea.value.length > 3) {
            if(usernameList.includes(UserNameTextArea.value)){
                UserNameTextArea.style.borderColor="red"
                document.getElementById(errorMessageId).innerHTML ="";
                document.getElementById(errorMessageId).appendChild(document.createTextNode('Username Taken'))
            
            }else{
                UserNameTextArea.style.borderColor="green"
            document.getElementById(errorMessageId).innerHTML ="";
            return true
        }
            }
        else{
            UserNameTextArea.style.borderColor="red"
            document.getElementById(errorMessageId).innerHTML ="";
            document.getElementById(errorMessageId).appendChild(document.createTextNode('Username Too Short'))
 
        }
        }

// Handles the email text area validity match check  

function validateEmail(emailId)
{
var mailformat = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
if(emailId.value.match(mailformat))
{

return true;
}
else
{
// console.log("Invalid email address.");
return false;
}
}
// Handles the email text area data match checks  

export function emailValidation(emailTextArea, emailList, emailErrMessageId) {
    if (validateEmail(emailTextArea) == true) {
        if(emailList.includes(emailTextArea.value)){
            emailTextArea.style.borderColor="red"
            document.getElementById(emailErrMessageId).innerHTML ="";
            document.getElementById(emailErrMessageId).appendChild(document.createTextNode('Email Already Exist Sign I Instead'))
            
        }else{
            // emailTextArea.focus()
            emailTextArea.style.borderColor="green"
            document.getElementById(emailErrMessageId).innerHTML ="";
            return true
        }
    }
        else{
            // emailTextArea.focus()
            emailTextArea.style.borderColor="red"
            document.getElementById(emailErrMessageId).innerHTML ="";
            document.getElementById(emailErrMessageId).appendChild(document.createTextNode('Invalid email'))
        }
}

// Handles the password text area match checks  

 export  function passwordValidation(passwordTextArea) {
    if (passwordTextArea.value.length > 6 ) {
        if(passwordTextArea.value.match(/[A-Z]/,/[1-9]/,/[a-z]/) != null){
            passwordTextArea.style.borderColor="green"
            document.getElementById('s-pass-alert').innerHTML ="";
            return true
        }else{
            passwordTextArea.style.borderColor="red"
        document.getElementById('s-pass-alert').innerHTML ="";
        document.getElementById('s-pass-alert').appendChild(document.createTextNode('Password should contain Special characters,Upper,lowercase and numbers '))
        }
    }  
    else{
        passwordTextArea.style.borderColor="red"
        document.getElementById('s-pass-alert').innerHTML ="";
        document.getElementById('s-pass-alert').appendChild(document.createTextNode('Password Too Short'))
    }
}

// Handles the password and confirm password match 
 
export function passwordConfirmValidation(confirmPasswordTextArea, passwordTextArea) {  
    
    if (passwordTextArea.value === confirmPasswordTextArea.value) {
        confirmPasswordTextArea.style.borderColor="green"
        document.getElementById('s-password-alert').innerHTML ="";
        return true

    }
    else{
        confirmPasswordTextArea.focus()
        confirmPasswordTextArea.style.borderColor="red"
        document.getElementById('s-password-alert').innerHTML ="";
        document.getElementById('s-password-alert').appendChild(document.createTextNode('Passwords do not match'))
}}

