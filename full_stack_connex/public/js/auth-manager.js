import loginIcon from "./nav.js"

// let passWC = document.querySelector('.sign_up_pass_confirm_div')
let reg_pass, reg_pass_con, login_link,
    reg_link, reg_form, login_form, reg_form_form,
    login_form_form

login_link = document.querySelector('.login-reg')
reg_link = document.querySelector('.reg-login')
reg_form = document.querySelector('.reg-bg')
reg_form_form = document.querySelector('.reg-bg').innerHTML
login_form = document.querySelector('.login-bg')
login_form_form = document.querySelector('.login-bg').innerHTML


function regLogin() {
    document.querySelector('.login-reg').addEventListener('click', () => {
        reg_form.style.display = "flex"
        login_form.style.display = "none"
    })
    document.querySelector('.reg-login').addEventListener('click', () => {
        reg_form.style.display = "none"
        login_form.style.display = "flex"
    })
}
regLogin()

reg_pass = document.querySelector(".reg-password")
reg_pass_con = document.querySelector(".password-confirm")
document.querySelector('.register').addEventListener('click', (e) => {
    if (reg_pass.value !== reg_pass_con.value) {
        e.preventDefault();
        reg_pass.style.border = "1px solid red"
        reg_pass_con.style.border = "1px solid red"
    }
})

// Registration form Ajax call
$(document).ready(function () {
    $(".reg-form").submit(function (event) {
        $.ajax({
            type: "POST",
            url: 'add',
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            encode: true,
            success: (r) => {
                $('.reg-form').trigger("reset");
                reg_form.innerHTML = `<div class="reg-mes center-content bg-success text-center">
                    You Have Registered Successfully!!
                </div>`
                setTimeout(() => {
                    reg_form.style.display = "none"
                    login_form.style.display = "flex"
                    reg_form.innerHTML = reg_form_form
                }, 2000)
            },
            error: (r) => console.log(r.responseText),
        })
        event.preventDefault();
    });
})

login()
// Login form Ajax Call
function login() {
    $(document).ready(function () {
        $(".login-form").submit(function (event) {
            $.ajax({
                type: "POST",
                url: 'loginauth',
                data: new FormData(this),
                dataType: "json",
                contentType: false,
                cache: false,
                processData: false,
                encode: true,
                success: (r) => {
                    if (r['status'] === 'true') {
                        $('.login-form').trigger("reset");
                        login_form.innerHTML = `<div class="reg-mes bg-success center-content text-center">
                    You Have Logged In Successfully!!
                </div>`
                        loginIcon()
                        setTimeout(() => {
                            login_form.style.display = "none"
                            location.reload()
                            console.log(r)

                        }, 2000)
                    } else {
                        login_form.innerHTML = `<div class="reg-mes bg-fail center-content text-center">
                    Incorrect Email or Password!!
                </div>`
                        setTimeout(() => {
                            login_form.innerHTML = login_form_form
                            document.querySelector('.exit-login').addEventListener('click', () => {
                                login_form.style.display = "none"
                            })
                            login()
                            regLogin()

                        }, 2000)
                    }
                },
                error: (r) => {
                },
            })
            event.preventDefault();
        });
    });
}
// Log Out Btn
document.querySelector('.log-out-btn').addEventListener('click', (e) => {
    e.preventDefault()
    $.ajax({
        type: "GET",
        url: 'logout',
        data: { 'logout': true },
        dataType: "json",
        contentType: false,
        cache: false,
        processData: false,
        encode: true,
        success: (r) => {
            document.querySelector('.profile-cont').innerHTML = `<div class="reg-mes bg-success center-content text-center">
                    Thank You for visiting our site hope you come back Soon!!!!
                </div>`
            setTimeout(() => {
                location.reload()
            }, 2000)
        },
        error: (r) => console.log(r.responseText),
    })
})

document.querySelector('.collapse-profile').addEventListener('click', (e) => {
    document.querySelector('.profile-cont').style.display = "none"
})

// Update Details
$(document).ready(function () {
    $(".update-det").submit(function (event) {
        // console.log($('.update-det'))
        // let form_data = {
        //     csrf: document.querySelector('.update-det').children[0].value,
        //     name: $('.upd-name').val(),
        //     email: $('.upd-email').val(),
        //     password: $('.upd-pass').val(),
        //     address: $('.upd-address').val(),
        //     phone: $('.upd-phone').val(),
        // }
        $.ajax({
            type: "POST",
            url: 'userupdate',
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            encode: true,
            success: (r) => {
                console.log(r)
                if (r['success']) {
                    // console.log('done')
                    document.querySelector('.prof-upd-mes').style.display = "flex"
                    document.querySelector('.profile').style.display = "none"
                    setTimeout(() => {

                        document.querySelector('.prof-upd-mes').style.display = "none"
                        document.querySelector('.profile').style.display = "grid"
                    }
                        , 2000)
                    // location.reload()
                    console.log(r)
                }
            },
            error: (r) => {
                console.log(r)
            },
        })
        event.preventDefault();
    });
});


