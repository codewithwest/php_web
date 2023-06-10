let f = document.querySelectorAll('.inc-product')
let s = document.querySelectorAll('.dec-product')
let incBtn = document.querySelectorAll('.inc-dec-btn')
let incButton = document.querySelectorAll('.inc-dec-btn')
let priceTag = document.querySelectorAll('.flex-prod-cont')
let rmvItmCart = document.querySelectorAll('.rmv-itm-cart')



let catTot = document.querySelector('.cart-tot-val').innerHTML.trim().replace('R', '')
document.querySelector('.embedded_total').setAttribute('value', `${catTot}`)
let emAdd = document.querySelector('.logged-email').innerHTML
document.querySelector('.confirmation_email_address').setAttribute('value', `${emAdd}`)


document.querySelector('.pay_up').addEventListener('click', (e) => {
    if (catTot == 0) e.preventDefault()
})
$(document).ready(function () {
    f.forEach((ps, incButton) => {
        ps.addEventListener('submit', function (event) {
            let product_id = incBtn[incButton].children[0].children[0].value
            let em = document.querySelector('.logged-email').innerHTML
            let cartTot = document.querySelector('.cart-tot-val').innerHTML.trim().replace('R', '')
            var prodVal = priceTag[incButton].children[4].innerHTML.trim().replace('R', '')
            // console.log(prodVal)
            $.ajax({
                type: "POST",
                url: "../php/manager.php",
                data: {
                    product_id: product_id,
                    user_email: em.trim(),
                },
                dataType: "json",
                encode: true,
                statusCode: {
                    200: (r) => {
                        incBtn[incButton].children[1].innerHTML = parseInt(incBtn[incButton].children[1].innerHTML) + 1

                        document.querySelector('.cart-tot-val').innerHTML = 'R' + parseInt(parseInt(cartTot) + parseInt(priceTag[incButton].children[2].children[0].id.trim().replace('R', '')))
                        priceTag[incButton].children[4].innerHTML = 'R' + parseInt(parseInt(prodVal) + parseInt(priceTag[incButton].children[2].children[0].id.trim().replace('R', '')))
                    },
                    400: (r) => {
                        console.log(r.responseText)
                    }
                },
            })
            event.preventDefault()
        })
    })

});

$(document).ready(function () {
    s.forEach((pd, incButton) => {
        pd.addEventListener('submit', function (event) {
            let product_id = incBtn[incButton].children[2].children[0].value
            let em = document.querySelector('.logged-email').innerHTML
            let cartTot = document.querySelector('.cart-tot-val').innerHTML.trim().replace('R', '')
            var prodVal = priceTag[incButton].children[4].innerHTML.trim().replace('R', '')
            if (incBtn[incButton].children[1].innerHTML > 1) {
                $.ajax({
                    type: "POST",
                    url: "../php/manager.php",
                    data: {
                        product_id_dec: product_id,
                        user_email: em.trim(),
                    },
                    dataType: "json",
                    encode: true,
                    statusCode: {
                        200: (r) => {
                            incBtn[incButton].children[1].innerHTML = parseInt(incBtn[incButton].children[1].innerHTML) - 1

                            document.querySelector('.cart-tot-val').innerHTML = 'R' + parseInt(parseInt(cartTot) - parseInt(priceTag[incButton].children[2].children[0].id.trim().replace('R', '')))
                            priceTag[incButton].children[4].innerHTML = 'R' + parseInt(parseInt(prodVal) - parseInt(priceTag[incButton].children[2].children[0].id.trim().replace('R', '')))
                    },
                        400: (r) => {
                            console.log(r.responseText)
                        }
                    },
                })
            }
            event.preventDefault()
        })
    })
})


$(document).ready(function () {
    rmvItmCart.forEach((pd, incButton) => {

        pd.addEventListener('submit', function (event) {

            let product_id = incBtn[incButton].children[2].children[0].value
            let em = document.querySelector('.logged-email').innerHTML
            console.log(product_id)
            $.ajax({
                type: "POST",
                url: "../php/manager.php",
                data: {
                    product_id_rmv: product_id,
                    user_email: em.trim(),
                },
                dataType: "json",
                encode: true,
                statusCode: {
                    200: (r) => {
                        priceTag[incButton].style.display = 'none'
                        console.log(r.responseText)


                    },
                    400: (r) => {
                        console.log(r.responseText)
                    }
                },
            })

            event.preventDefault()
        })
    })
})