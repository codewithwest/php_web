let signUpPopUpBtn, signInPopUpBtn, signUpCont, signInCont, collapseSignIn,
    collapseSignUp, addToCart, addToFav, cartLink, logOutBtn, displayCards,
    sign_In_Up_Btn

signUpPopUpBtn = document.querySelector('.sign-up-btn')
signUpCont = document.querySelector('.sign-up-container')
collapseSignUp = document.querySelector('.btn-sign-up-close')
signInPopUpBtn = document.querySelector('.sign-in-btn')
signInCont = document.querySelector('.sign-in-container')
collapseSignIn = document.querySelector('.btn-sign-in-close')
addToCart = document.querySelector('.add_to_cart')
addToFav = document.querySelector('.add-to-fav')
cartLink = document.querySelector('.cart-link')
logOutBtn = document.querySelector('.sign-out-btn')
displayCards = document.querySelectorAll('.card-body')
sign_In_Up_Btn = document.querySelector('.sign_in_up_btn')

signUpPopUpBtn.addEventListener('click', () => {

    signUpCont.style.display = "flex"
}
)
signInPopUpBtn.addEventListener('click', () => signInCont.style.display = "flex"
)
collapseSignUp.addEventListener('click', () => signUpCont.style.display = "none"
)
collapseSignIn.addEventListener('click', () => signInCont.style.display = "none")
displayCards.forEach((element, displayCards) => {
    element.children[0].setAttribute('src', `./assets/${displayCards}.jpeg`)
});
sign_In_Up_Btn.addEventListener('click', (e) => {
    e.preventDefault()
    signUpCont.style.display = "flex"
    signInCont.style.display = "none"
})
