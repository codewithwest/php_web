let IncCartForm, DecCartForm
IncCartForm = document.querySelectorAll('.inc-cart-form')
DecCartForm = document.querySelectorAll('.dec-cart-form')
totalCount()
prodCount()



IncCartForm.forEach(element => {
    element.addEventListener('submit', async (e) => {
        e.preventDefault()
        const formData = Object.fromEntries(new FormData(element).entries())
        await fetch("/products/user/new/cart",
            {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-Token": formData['_token']
                },
                method: "POST",
                credentials: "same-origin",
                body: JSON.stringify(formData)
            })
            .then(res => res.json())
            .then(res => {
                if (res.success) {
                    productIncOrDec(element, "add")
                    totalCount()
                    prodCount()
                }
            })
            .catch(function (res) { console.log(res) })
    })
});


// Decrement from cart
DecCartForm.forEach(element => {
    element.addEventListener('submit', async (e) => {
        e.preventDefault()
        const formData = Object.fromEntries(new FormData(element).entries())
        await fetch('/products/user/del/product/cart',
            {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-Token": formData['_token']
                },
                method: "POST",
                credentials: "same-origin",
                body: JSON.stringify(formData)
            })
            .then(res => res.json())
            .then(res => {
                if (res.success) {
                    productIncOrDec(element, "sub")
                    totalCount()
                    prodCount()
                }
            })
            .catch(function (res) { console.log(res) })
    })
});


function prodCount() {
    let counterDiv = document.querySelector('.counter-cont').children
    totalProducts = 0
    IncCartForm.forEach(element => {
        let numberToAdd = element.parentElement.children[1].textContent
        totalProducts += parseInt(numberToAdd)
    })
    counterDiv[0].innerHTML = totalProducts

}


function totalCount() {
    let counterDiv = document.querySelector('.counter-cont').children
    totalProducts = 0
    IncCartForm.forEach(element => {
        let numberToAdd = element.parentElement.children[1].textContent
        let product_price = element.parentElement.parentElement.children[1].textContent.replace('R', "").trim()
        totalProducts += ((parseInt(product_price) - 0.1) * numberToAdd)

    })
    counterDiv[1].innerHTML = "R " + totalProducts.toFixed(2)
}
function productIncOrDec(element, operator) {
    let cart_total = element.parentElement.children[1].innerHTML
    let target_total_per_prod = element.parentElement.parentElement.children
    if (operator == 'add') {
        element.parentElement.children[1].innerHTML = parseInt(cart_total) + 1
    } else {
        (parseInt(cart_total) - 1) == 0 ?
            element.parentElement.parentElement.style.display = "none"
            :

            element.parentElement.children[1].innerHTML = parseInt(cart_total) - 1
    }
    let product_total = target_total_per_prod[4].textContent.replace('R', "").trim()
    let product_price = target_total_per_prod[1].textContent.replace('R', "").trim()
    operator == 'add' ?
        console.log(parseFloat(product_total + parseFloat(product_price - 0.01)).toFixed(2)) :
        // target_total_per_prod[4].innerHTML = "R " + parseFloat(product_total + (product_price - 0.01)).toFixed(2) :
        target_total_per_prod[4].innerHTML = "R " + parseFloat(product_total - (product_price - 0.01)).toFixed(2)



}

