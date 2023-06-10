import { emailValidation, userNameValidation } from "./functions.js"



var profilePop = document.getElementById('nav-icon')

profilePop.addEventListener('click',()=>{
    if (document.getElementById('profile').style.display == "flex") {
        document.getElementById('profile').style.display="none"
    } else {
        document.getElementById('profile').style.display="flex"
    }
    
})

var collapseProfileBtn = document.getElementById('profileCollapseButton')
collapseProfileBtn.addEventListener('click',()=>{
    document.getElementById('profile').style.display="none"
})



var logOut = document.getElementById('logOutForm')

logOut.addEventListener('submit',(e)=>{
    alert('logging out');
    // logOut.setAttribute('method', )
})

let usernames = []
let emails = []
let emailsAndPass = []

// Ajax function that uses defined php file to fetch data from sql database
async function aj() {
    //  Get all the existing usernames

// Emails that exist in the database
$.ajax({  
    type: "GET",
    url: "../php/emailsfetch.php",
    dataType: "json",                  
    success: function(data){  
        emails = data
    },
    error:function(e){
        console.log(e)
    }
});
// Password fetch
$.ajax({  
    type: "GET",
    url: "../php/passwordfetch.php",
    dataType: "json",                  
    success: function(data){  
        emailsAndPass = data
    },
    error:function(){
        console.log(1327)
    }

});
$.ajax({  
    type: "GET",
    url: "../php/unamesfetch.php",
    dataType: "json",                  
    success: function(data){  
        usernames = data
       
    },
    error:function(){
        console.log(1327)
    }

});
}

aj();
var updateButton = document.getElementById('updateForm')
var updateUserNTextField = document.getElementById('update_username')
var updateUserETextField = document.getElementById('update_email')

var unChange = false
var ueChange = false
    updateUserNTextField.addEventListener('input', (e)=>{
        unChange =  true
    })
updateUserETextField.addEventListener('input', (e)=>{
    ueChange =  true
})
updateButton.addEventListener('submit', (e)=>{   
    if ((((unChange == true) && (userNameValidation(updateUserNTextField,usernames, 'user_name_update_err') == true)) && ((ueChange == true && emailValidation(updateUserETextField,emails, 'email_update_err') == true)))) {
       alert("User Details Updated")
    }
    else if(ueChange == true && (emailValidation(updateUserETextField,emails, 'email_update_err') == true)){
        alert("User Email Updated")
    }
    else if(unChange == true && (userNameValidation(updateUserNTextField,usernames, 'user_name_update_err')==true)){
        alert("Users Username Updated")
    }
    else {
         e.preventDefault()
    }

})


var delAcc = document.getElementById('delAccountBtn')
delAcc.addEventListener('click',(e)=>{
    // e.preventDefault()
    alert('Are Sure You Want To delete account?')
   
})