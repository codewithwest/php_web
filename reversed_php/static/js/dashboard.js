import { emailValidation, userNameValidation } from "./functions.js"

var profilePop = document.getElementById('nav-icon')

profilePop.addEventListener('click', () => {
    if (document.getElementById('profile').style.display == "flex") {
        document.getElementById('profile').style.display = "none"
    } else {
        document.getElementById('profile').style.display = "flex"
    }

})

var collapseProfileBtn = document.getElementById('profileCollapseButton')
collapseProfileBtn.addEventListener('click', () => {
    document.getElementById('profile').style.display = "none"
})

var logOut = document.getElementById('logOutForm')

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
        url: "../php/passwordfetch.php",
        dataType: "json",
        success: function (data) {
            emailsAndPass = data
        },
        error: function () {
            console.log(1327)
        }

    });
    $.ajax({
        type: "GET",
        url: "../php/unamesfetch.php",
        dataType: "json",
        success: function (data) {
            usernames = data

        },
        error: function () {
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
updateUserNTextField.addEventListener('input', (e) => {
    unChange = true
})
updateUserETextField.addEventListener('input', (e) => {
    ueChange = true
})
updateButton.addEventListener('submit', (e) => {
    if ((((unChange == true) && (userNameValidation(updateUserNTextField, usernames, 'user_name_update_err') == true)) && ((ueChange == true && emailValidation(updateUserETextField, emails, 'email_update_err') == true)))) {
        alert("User Details Updated")
    }
    else if (ueChange == true && (emailValidation(updateUserETextField, emails, 'email_update_err') == true)) {
        alert("User Email Updated")
    }
    else if (unChange == true && (userNameValidation(updateUserNTextField, usernames, 'user_name_update_err') == true)) {
        alert("Users Username Updated")
    }
    else {
        e.preventDefault()
    }

})

var delAcc = document.getElementById('delAccountBtn')
delAcc.addEventListener('click', (e) => {
    // e.preventDefault()
    alert('Are Sure You Want To delete account?')

})

// Game Start
let sprite = document.querySelector('.control-sprite')
var moveRight = sprite.offsetLeft

function checkKey(e) {
    e = e || window.event;

    if (e.keyCode == '38') {
        // up arrow
    }
    else if (e.keyCode == '40') {
        // down arrow
    }
    else if (e.keyCode == '37') {
        // left arrow

        if (moveRight == 0) {
            moveRight = 0
        }
        else {
            moveRight -= 1
            sprite.style.left = moveRight + '%'
            console.log(moveRight)
        }

    }
    else if (e.keyCode == '39') {
        if (moveRight <= 88) {
            moveRight += 1
            sprite.style.left = moveRight + '%'
            console.log(moveRight)
        } else {
            moveRight = 90
        }
        // right arrow
    }
}

let gameState = false




var startButton = document.querySelector('.start-button')
var stopButton = document.querySelector('.stop-button')
startButton.addEventListener('click', (e) => {
    alert(1)
    //e.preventDefault
    document.querySelector('.control-sprite').style.display = "flex"
    startButton.style.background = "grey"
    stopButton.style.background = "rgba(22,222,22,.8)"
    gameState = true
    startGame(gameState)
    sprite.style.top = 75 + '%'
    moveRight = 45
    sprite.style.left = moveRight + '%'
})

stopButton.addEventListener('click', (e) => {
    gameState = false
    e.preventDefault
    startButton.style.background = "rgba(22,222,22,.8)"
    stopButton.style.background = "grey"
    startGame(gameState)
})



var gameCont = document.getElementById('gameCont')
function startGame(startGameLoop) {
    document.onkeydown = checkKey

    do {
        if (gameCont.children.length < 4) {
            setInterval(() => {
                if (gameCont.children.length < 4) {
                    createEnemySprite('.gameCont', 'sprite1', Math.random() * 75)
                }
            }, 200)
        }
        setInterval(() => console.log(1), 2000)
    }
    while (startGameLoop == true)
}

// var spritePos = 0
// let spriteHorizontalPos = Math.random() * 100;
// var Score = 0
// var scoreBoard = document.querySelector('.current-score')
// const highScoreBoard = document.querySelector('.high-score')
// scoreBoard.innerHTML = 0
// highScoreBoard.innerHTML = 10;
// function createEnemySprite(parent, Sclass, horizontalPos) {
//     var parentDiv = document.querySelector(parent)
//     var spriteBody = document.createElement('div')
//     spriteBody.setAttribute('class', Sclass)
//     spriteBody.style.position = "relative"
//     spriteBody.style.background = "red"
//     parentDiv.appendChild(spriteBody)
//     spriteBody.style.left = horizontalPos + '%'
//     // spriteBody.style.top = 0 + '%'

//     var enemyInt = setInterval(() => {
//         if (spritePos > 64) {
//             spritePos = 0
//             spriteBody.remove()
//             clearInterval(enemyInt)
//         } else {
//             spritePos += 4
//             spriteBody.style.top = spritePos + '%'
//             Score++
//             scoreBoard.innerHTML = Score
//             if (Score >= highScoreBoard.innerHTML) {
//                 highScoreBoard.innerHTML = Score
//             }
//         }

//     }, 600)
// }

// console.log(horizontalPos)
// if (spriteHorizontalPos == sprite.style.left) {
//     alert(1)
// }

// function callGameTrack() {
//     setInterval(() => {
//         if (gameCont.children.length < 4) {
//             createEnemySprite('.gameCont', 'sprite1', Math.random() * 75)
//         }
//     }, 200)

// }

// document.getElementById('control-sprite').addEventListener('', () => {
//     alert(1)
// })
// 
