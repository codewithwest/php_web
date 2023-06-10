// import { productsList } from "./functions"

let cart_collapse_btn, cart_manager_cont, show_cart_btn,
    show_cart_btn_cont, add_to_cart_btn, global_email, my_cart
cart_collapse_btn = document.querySelector('.collapse-cart')
cart_manager_cont = document.querySelector('.cart-man-cont')
show_cart_btn = document.querySelector('.cart-btn')
show_cart_btn_cont = document.querySelector('.cart-btn-cont')
add_to_cart_btn = document.querySelectorAll('.add-btn')

global_email = document.querySelector('.email-init').innerHTML.trim()
cart_collapse_btn.addEventListener('click', () => {
    cart_manager_cont.style.display = "none"
    show_cart_btn_cont.style.display = "flex"
})
// Handles cart display
show_cart_btn.addEventListener('click', () => {
    cart_manager_cont.style.display = "flex"
    show_cart_btn_cont.style.display = "none"
})
// Gets the logged in user email
let log = document.querySelector('.email-init').innerHTML.trim()
if (log.length > 5) show_cart_btn.parentElement.style.display = "flex"
else show_cart_btn.parentElement.style.display = "none"

// let log_min = document.querySelector('.email-init').innerHTML.trim()
// if (log_min.length > 5) show_cart_btn.parentElement.style.display = "flex"
// else show_cart_btn.parentElement.style.display = "none"



// Gets the user cart
let getcart = () => {
    if (global_email.length > 0) {
        $.ajax({
            type: "GET",
            url: 'getusercart',
            data: {
                email: global_email,
            },
            dataType: "json",
            contentType: false,
            cache: false,
            processData: true,
            encode: true,
            success: (r) => {
                my_cart = r['cart']
                populate_cart()
                deleteFromCart()
                incCart()
                decCart()
            },
            error: (r) => console.log(r.responseText),
        })

    }
}
getcart()

// Sets up the cart items
function populate_cart() {
    document.querySelector('.cart-items-inner').innerHTML = ""

    if (Array.isArray(my_cart)) {
        my_cart.forEach(element => {
            let desc_trans = element[0][2].toString().toLowerCase()
            document.querySelector('.cart-items-inner').innerHTML +=
                cart_item(element[0][0], element[0][1], desc_trans, element[0][3], element[1])
        });
        cart_count()
        cart_to_price()
    } else {
        document.querySelector('.cart-items-tot').innerHTML = 'R 0'
        document.querySelector('.cart-count').innerHTML = 0
    }
}
populate_cart()
// Counts the number of items in cart
let cart_count = () => {
    let tot_cart_items = document.querySelectorAll('.cart-item-quantity')
    let no_tot = 0

    tot_cart_items.forEach(el => {
        no_tot += parseInt(el.innerHTML.trim())
    })
    document.querySelector('.cart-count').innerHTML = no_tot
    document.querySelector('.top-cart-count').innerHTML = 'Cart: ' + no_tot + ' Products'
}


// Sums up the total price
let cart_to_price = () => {
    let tot_cart_items = document.querySelectorAll('.cart-item-price')
    let cart_tot = 0
    tot_cart_items.forEach((el, tot_cart_item_quant_count) => {
        cart_tot += (parseInt(el.innerHTML.replace('R', '').trim()))

    })
    document.querySelector('.cart-items-tot').innerHTML = 'R ' + cart_tot
    document.querySelector('.top-cart-cost').innerHTML = 'R ' + cart_tot
}

// Yiels the cart item
let cart_sucss = document.querySelectorAll('.cart-success-cont')
let cart_sucss_count = document.querySelectorAll('.cart-success-cont')
// Add Item to cart
add_to_cart_btn.forEach((element, cart_sucss_count) => {
    element.addEventListener('click', (e) => {
        let prod_id
        prod_id = element.children[0].innerHTML.trim()
        element.parentElement.parentElement.style.display = 'none'
        cart_sucss[cart_sucss_count].style.display = 'flex'

        setTimeout(() => {
            cart_sucss[cart_sucss_count].style.display = 'none'
            element.parentElement.parentElement.style.display = 'flex'
        }, 1500)
        if (global_email.length > 0) {
            $.ajax({
                type: "GET",
                url: 'addtocart',
                data: {
                    email: global_email,
                    product_ids: prod_id,
                },
                dataType: "json",
                contentType: false,
                cache: false,
                processData: true,
                encode: true,
                success: (r) => {
                    getcart()
                    populate_cart()
                },
                error: (r) => console.log(r.responseText),
            })
        } else {
            document.querySelector('.login-bg').style.display = 'flex'
            document.body.scrollTop = document.documentElement.scrollTop = 0;
        }

    })
});


function deleteFromCart() {
    let del_all_prod_btn = document.querySelectorAll('.cart-item-del')
    setTimeout(
        () => {
            del_all_prod_btn.forEach(element => {
                element.children[0].addEventListener('click', (e) => {
                    let _prod_id = element.parentElement.parentElement.children[0].innerHTML.trim()
                    delAllProdAssos(_prod_id, global_email, element)
                    cart_count()
                    cart_to_price()    
                })
            })
        }, 1000)
}
function decCart() {
    let del_one_prod_btn = document.querySelectorAll('.cart-item-dec')
    setTimeout(
        () => {
            del_one_prod_btn.forEach(element => {
                element.children[0].addEventListener('click', (e) => {
                    if (element.parentElement.children[2].innerHTML == 1) e.preventDefault()
                    else {
                        let _prod_id = element.parentElement.parentElement.children[0].innerHTML.trim()
                        let _cost = parseInt(element.parentElement.parentElement.children[1].children[2].id)
                        let _cost_tot = parseInt(element.parentElement.parentElement.children[1].children[2].innerHTML.trim().replace('R', ''))
                        let _cart_tot = parseInt(document.querySelector('.cart-items-tot').innerHTML.trim().replace('R', ''))
                        element.parentElement.children[2].innerHTML = parseInt(element.parentElement.children[2].innerHTML.trim()) - 1
                        element.parentElement.parentElement.children[1].children[2].innerHTML = 'R ' + (_cost_tot - _cost)
                        document.querySelector('.cart-items-tot').innerHTML = 'R ' + (_cart_tot - _cost)
                        decProdAssos(_prod_id, global_email)
                        cart_count()
                    }
                })
            })
        }, 1000)
}
function incCart() {
    let add_one_prod_btn = document.querySelectorAll('.cart-item-inc')
    setTimeout(
        () => {
            add_one_prod_btn.forEach(element => {
                element.children[0].addEventListener('click', (e) => {
                    let _prod_id = element.parentElement.parentElement.children[0].innerHTML.trim()
                    let _cost = parseInt(element.parentElement.parentElement.children[1].children[2].id)
                    let _cost_tot = parseInt(element.parentElement.parentElement.children[1].children[2].innerHTML.trim().replace('R', ''))
                    let _cart_tot = parseInt(document.querySelector('.cart-items-tot').innerHTML.trim().replace('R', ''))
                    element.parentElement.children[2].innerHTML = parseInt(element.parentElement.children[2].innerHTML.trim()) + 1
                    element.parentElement.parentElement.children[1].children[2].innerHTML = 'R ' + (_cost + _cost_tot)
                    document.querySelector('.cart-items-tot').innerHTML = 'R ' + (_cart_tot + _cost)
                    incProdAssos(_prod_id, global_email)
                    cart_count()
                })
            })
        }, 1000)
}


function delAllProdAssos(_id, _email, _element) {
    $.ajax({
        type: "GET",
        url: 'deleteallprod',
        data: {
            email: _email,
            product_ids: _id,
        },
        dataType: "json",
        contentType: false,
        cache: false,
        processData: true,
        encode: true,
        success: (r) => {
            _element.parentElement.parentElement.style.display = "none"
            _element.parentElement.parentElement.remove()
            cart_count()
            cart_to_price()

        },
        error: (r) => console.log(r.responseText),
    })
}
function decProdAssos(dec_id, dec_email) {
    $.ajax({
        type: "GET",
        url: 'deleteprod',
        data: {
            email: dec_email,
            product_ids: dec_id,
        },
        dataType: "json",
        contentType: false,
        cache: false,
        processData: true,
        encode: true,
        success: (r) => {
            // _element.parentElement.parentElement.style.display = "none"
        },
        error: (r) => console.log(r.responseText),
    })
}

function incProdAssos(inc_id, inc_email) {
    $.ajax({
        type: "GET",
        url: 'addtocart',
        data: {
            email: inc_email,
            product_ids: inc_id,
        },
        dataType: "json",
        contentType: false,
        cache: false,
        processData: true,
        encode: true,
        success: (r) => {

        },
        error: (r) => console.log(r.responseText),
    })
}

function cart_item(prod_set_id, prod_n, prod_desc, prod_price, prod_qua) {
    return `<div class="cart-item d-flex center-content">
    <p class="d-none" id="${prod_set_id}">${prod_set_id}</p>
        <div class="cart-item-details h-100">
            <div class="cart-item-title fw-bold">${prod_n}</div>
            <div class="cart-item-des  center-content">
            <div class="cart-img-cont d-flex">
           <img class="fill" src="/images/featured/fp${prod_set_id}.jpeg" />
           </div>
            <p>${prod_desc}</p></div>
            <div class="cart-item-price fw-bold" id="${prod_price}">R${prod_price * prod_qua}</div>
        </div>
        <div class="cart-item-control fill">
            <div class="cart-item-del d-flex fw-bold">
                <button class="fw-bold b-none bg-none">X</button>
            </div>
            <div class="cart-item-inc center-content fw-bold"><button>+</button></div>
            <div class="cart-item-quantity center-content fw-bold">${prod_qua}</div>
            <div class="cart-item-dec center-content fw-bold"><button>-</button></div>
        </div>
    </div>`
}

document.querySelector('.buy-items').addEventListener('click', () => {
    document.querySelector('.embedded_total').value = parseInt(document.querySelector('.cart-items-tot').innerHTML.trim().replace('R', ''))

    if(parseInt(document.querySelector('.cart-items-tot').innerHTML.trim()==0))
      e.preventDefault()
})


// productsList.forEach(element => {
//     setTimeout(()=>cart_item(element[0],element[1],element[2],element[3]),2000)
    
// });