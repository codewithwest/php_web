import { emailValidation, userNameValidation, passwordValidation, passwordConfirmValidation } from './functions.js';


var signinHeader = document.querySelector('.login-login')
var signupHeader = document.querySelector('.register-register')
var closeAuth = document.querySelector('.close-auth')

signinHeader.addEventListener('click', () => {
    signinHeader.style.background = "inherit"
    signupHeader.style.background = "rgba(119, 2, 2,.6)"
    document.querySelector('.register-form').style.display = 'none'
    document.querySelector('.login-form').style.display = 'flex'
})

signupHeader.addEventListener('click', () => {
    signupHeader.style.background = "inherit"
    signinHeader.style.background = "rgba(119, 2, 2,.6)"
    document.querySelector('.register-form').style.display = 'flex'
    document.querySelector('.login-form').style.display = 'none'

})

closeAuth.addEventListener('click', () => {
    document.querySelector('.login-register').style.display = 'none'

})


setTimeout(() => {
    document.querySelector('.login-register').style.display = 'flex'
}, 8000)

// define username, emails and password list
let usernames = []
let emails = []
let emailsAndPass = []

// Ajax function that uses defined php file to fetch data from sql database
export async function aj() {
    //  Get all the existing usernames
    $.ajax({
        type: "GET",
        url: "./static/php/unamesfetch.php",
        dataType: "json",
        success: function (data) {
            usernames = data
        },
        error: function (e) {
            console.log(e)
        }
    });
    // Emails that exist in the database
    $.ajax({
        type: "GET",
        url: "./static/php/emailsfetch.php",
        dataType: "json",
        success: function (data) {
            emails = data

        },
        error: function (e) {
            console.log(e)
        }
    });
    // Password fetch
    $.ajax({
        type: "GET",
        url: "./static/php/passwordfetch.php",
        dataType: "json",
        success: function (data) {
            emailsAndPass = data

        },
        error: function () {
            console.log(1327)
        }

    });
}
// Calls the aj function


var rUserName = false
var rEmail = false
var rPassword = false
var rCPassword = false

// Sign Up
// Check if username in database 
var registrationUserName = document.getElementById('s-username');
// Listens for any change in the registration username text area
registrationUserName.addEventListener('change', (e) => {
    aj();
    if (userNameValidation(registrationUserName, usernames, 's-uname-alert') == true) {
        rUserName = true
    } else {
        rUserName = false
    }
})
// Listens for any change in the email username text area
var registrationEmail = document.getElementById('email')
registrationEmail.addEventListener('change', () => {
    aj();
    if (emailValidation(registrationEmail, emails, 's-email-alert') == true) {
        rEmail = true
    }
    else {
        rEmail = false
    }
})

// Listens for any change in the registration password text area
var registrationPassword = document.getElementById('s-password')
registrationPassword.addEventListener('change', () => {
    aj();
    if (passwordValidation(registrationPassword) == true) {
        rPassword = true
    } else {
        rPassword = false
    }
});

// Listens for any change in the confirm password text area if it equals the password value
var registrationConfirmPassword = document.getElementById('sc-password')
registrationConfirmPassword.addEventListener('change', () => {
    aj();
    if (passwordConfirmValidation(registrationConfirmPassword, registrationPassword) == true) {
        rCPassword = true
    } else {
        rCPassword = false
    }
});

// Checks if all the text areas return a true value and submit if yes
var registerButton = document.getElementById('registerForm')
registerButton.addEventListener('submit', (e) => {
    aj();
    e.preventDefault()
    if ((rUserName && rEmail && rPassword && rCPassword) == true) {
        e.currentTarget.submit()
    } else {
        e.preventDefault()
    }
})



// Deals with the sign in 
var loginForm = document.getElementById('loginForm')
var loginTextArea = document.getElementById('username')
var passTextArea = document.getElementById('password')

// Submits if data matched one the the database pairs
// Also iterates through the database data
// else returns an error message

loginForm.addEventListener('submit', (e) => {
    aj();
    e.preventDefault()
    for (const pair in emailsAndPass) {
        if (emailsAndPass[pair][0] == loginTextArea.value && emailsAndPass[pair][1] == passTextArea.value) {
            document.getElementById('password-alert').innerHTML = "";
            document.getElementById('username-alert').innerHTML = "";

            e.currentTarget.submit()
            return
        }
        else {
            if (emailsAndPass[pair][0] != loginTextArea.value && emailsAndPass[pair][1] == passTextArea.value) {
                loginTextArea.style.borderColor = "red"
                document.getElementById('username-alert').innerHTML = "";
                document.getElementById('username-alert').appendChild(document.createTextNode('Incorrect Username or Password'))

            }
            if (emailsAndPass[pair][1] != passTextArea.value && emailsAndPass[pair][0] == loginTextArea.value) {
                passTextArea.style.borderColor = "red"
                loginTextArea.style.borderColor = "green"
                document.getElementById('password-alert').innerHTML = "";
                document.getElementById('password-alert').appendChild(document.createTextNode('Incorrect Username or Password'))
            }
            else {
                passTextArea.style.borderColor = "red"
                loginTextArea.style.borderColor = "red"
                document.getElementById('password-alert').innerHTML = "";
                document.getElementById('password-alert').appendChild(document.createTextNode("UserName and Password Do not Exist"))
            }
        }

    }
}
)


