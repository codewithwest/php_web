let login_collapse_btn = document.querySelector('.exit-login')
login_collapse_btn.addEventListener('click', () => {
    document.querySelector('.login-bg').style.display = "none"
})
let email_init = document.querySelector('.email-init').innerHTML.trim()
document.querySelector('.dd-prof').addEventListener('click', () => {
    if (email_init.length > 2) document.querySelector('.profile-cont').style.display = "flex"
    else document.querySelector('.login-bg').style.display = "flex"
})
