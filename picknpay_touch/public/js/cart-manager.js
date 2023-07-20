let addToCartForm
addToCartForm = document.querySelectorAll('.add-to-cart-form')
addToCartForm.forEach(element => {
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
                    let button = element.children[element.children.length - 1]
                    button.style.background = "#006c16bc"
                    button.innerHTML = "Added To cart"
                    setTimeout(() => {
                        button.style.background = "rgba(184, 184, 4, 0.679)"
                        button.innerHTML = "Add To trolley"
                    }, 2000)
                }
            })
            .catch(function (res) { console.log(res) })
    })
});
