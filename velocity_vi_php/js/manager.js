
let passWC = document.querySelector('.sign_up_pass_confirm_div')

document.querySelector('#sign_up_btn').addEventListener('click', (e) => {
    if (document.querySelector("#sign_up_pass_confirm").value !== document.querySelector("#sign_up_pass").value) {
        e.preventDefault();
        passWC.children[1].innerHTML = 'Passwords do not match'
        passWC.style.borderColor = 'red'
    }
})
$(document).ready(function () {
    $("#sign_up_form").submit(function (event) {
        var regData = {
            sign_up_first_name: $("#sign_up_first_name").val(),
            sign_up_last_name: $("#sign_up_last_name").val(),
            sign_up_email: $("#sign_up_email").val(),
            sign_up_pass_confirm: $("#sign_up_pass_confirm").val(),
        };

        $.ajax({
            type: "POST",
            url: "php/manager.php",
            data: regData,
            dataType: "json",
            encode: true,
            statusCode: {
                200: (r) => {
                    if (r[0] == 400) {
                        // email already exist pop up signInCont 
                        document.querySelector('#sign_up_email').style.borderColor = 'red'
                        document.querySelector('.sign_up_email_floating_email').children[1].innerHTML = 'Email Already Exists'
                        document.querySelector('.sign_out_btn').innerHTML = 'Sign in'
                        document.querySelector('.sign_out_btn').addEventListener('click', () => {
                            document.querySelector('.sign-up-container').style.display = 'none'
                            document.querySelector('.sign-in-container').style.display = 'flex'
                        })
                    } else {
                        document.querySelector('.sign-up-btn').setAttribute('disabled', '')
                        document.querySelector('.sign-up-container').style.display = 'none'
                        document.querySelector('.sign-in-container').style.display = 'flex'

                    }
                },
                400: (r) => {
                    console.log(r)
                }
            },

        })


        event.preventDefault();
    });
});


let f = document.querySelectorAll('.add_to_cart_form')
let successCard = document.querySelectorAll('.cart-success')
let succCard = document.querySelectorAll('.cart-success')
let cartBody = document.querySelectorAll('.prod-card')
let cartSuccBody = document.querySelectorAll('.prod-card-succ')
// console.log(f) cart_success
$(document).ready(function () {
    f.forEach((pd, successCard) => {

        pd.addEventListener('submit', function (event) {
            if (document.querySelector('.sign-out-btn').style.display == 'none') {
                document.body.scrollTop = document.documentElement.scrollTop = 0;
                document.querySelector('.sign-in-container').style.display = 'flex'
            } else {

                let em = document.querySelector('.logged_email').innerHTML
                $.ajax({
                    type: "POST",
                    url: "php/manager.php",
                    data: {
                        product_id: pd.id,
                        user_email: em.trim(),
                    },
                    dataType: "json",
                    encode: true,
                    statusCode: {
                        200: (r) => {
                            cartBody[successCard].style.display = 'none'
                            succCard[successCard].style.display = 'flex'
                            // cartBody[successCard].display = ""
                            setTimeout(() => {
                                succCard[successCard].style.display = 'none'
                                cartBody[successCard].style.display = 'flex'
                            }


                                , 2000)

                        },
                        400: (r) => {
                            console.log(r.responseText)
                        }
                    },
                })
            }
            // } else {
            //     alert(1)
            // }

            event.preventDefault()
            // })

        })
    })

});
document.querySelector('.sign_in_email_floating_email').children[0].addEventListener('change', () => {
    document.querySelector('.sign_in_email_floating_email').children[1].innerHTML = 'Email'
    document.querySelector('.sign_in_pass_floating_pass').children[1].innerHTML = 'Password'
})
document.querySelector('.sign_in_pass_floating_pass').children[0].addEventListener('change', () => {
    document.querySelector('.sign_in_email_floating_email').children[1].innerHTML = 'Email'
    document.querySelector('.sign_in_pass_floating_pass').children[1].innerHTML = 'Password'
})

setTimeout(() => document.querySelector('.not_logged_in').style.display = 'none', 3000)
setTimeout(() => document.querySelector('.logged_in').style.display = 'none', 3000)






