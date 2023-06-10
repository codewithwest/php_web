let nav, nav_drop_arrow,
    nav_list, main_nav, change_slides,
    change_slides_btns, space, email_cont,
    skip_nav_link, log_ind,
    left_nav
space = ''

nav_list = ['', 'HOME', 'COMPUTER', 'TABLETS', 'PROJECTOR',
    'GAMING', 'DAILYDEALS', 'SMARTWATCH', 'PRINTERS',
    'SMARTPHONES', '']


main_nav = document.querySelector('.main-nav').innerHTML
email_cont = document.querySelector('.email-init')
change_slides = document.querySelector('.slide-cont')

nav_drop_arrow = `<svg xmlns="http://www.w3.org/2000/svg" width="8" height="10" fill="#fff" class="bi bi-chevron-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                    </svg>`

skip_nav_link = [0, 6, 10]
for (let ix = 0; ix < nav_list.length; ix++) {
    if (skip_nav_link.includes(ix)) {
        document.querySelector('.main-nav').innerHTML +=
            `<a  class="nav-link center-content d-flex fw-bold" href="http://">
             ${nav_list[ix]}
        </a>`

    } else {
        document.querySelector('.main-nav').innerHTML +=
            `<a  class="nav-link center-content d-flex fw-bold" href="http://">  
        ${nav_list[ix]} ${space} ${nav_drop_arrow}
        </a>`
    }

}

document.querySelector('.main-nav').children[0].innerHTML += `
<svg xmlns="http://www.w3.org/2000/svg" class="icons" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
  <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
  <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
</svg>
`


change_slides_btns = change_slides.children

for (let pi = 0; pi < 2; pi++) {
    change_slides_btns[pi].addEventListener('click', (e) => {
        if (change_slides.children[0].src.replace(location.host, '').includes(0)) {
            change_slides.children[0].src = "/images/slide/slide1.jpg"
        } else {
            change_slides.children[0].src = "/images/slide/slide0.jpg"
        }
    })
}

setInterval(() => {
    if (change_slides.children[0].src.replace(location.host, '').includes(0)) {
        change_slides.children[0].src = "/images/slide/slide1.jpg"
    } else {
        change_slides.children[1].src = "/images/slide/slide0.jpg"

    }
}, 2500)




// create a new instance of 'MutationObserver' named 'observer', 
// passing it a callback function
let observer = new MutationObserver(function (mutationsList, observer) {
    loginIcon()
});

// call 'observe' on that MutationObserver instance, 
// passing it the element to observe, and the options object
observer.observe(email_cont, { characterData: false, childList: true, attributes: false });



let _loged_icon = (col) => `
        <p class="d-none">logged In<p>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="${col}" class="bi bi-person-fill-check" viewBox="0 0 16 16">
                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
            </svg>`
let _not_loged_icon = (col) => `
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="${col}" class="bi bi-person-fill-slash" viewBox="0 0 16 16">
                <path d="M13.879 10.414a2.501 2.501 0 0 0-3.465 3.465l3.465-3.465Zm.707.707-3.465 3.465a2.501 2.501 0 0 0 3.465-3.465Zm-4.56-1.096a3.5 3.5 0 1 1 4.949 4.95 3.5 3.5 0 0 1-4.95-4.95ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
            </svg>`
loginIcon()
function loginIcon() {
    if (email_cont.innerHTML.trim().length > 0) {
        document.querySelector('.dd-prof').innerHTML = _loged_icon('#fff')

        document.querySelector('.main-nav').children[10].innerHTML = _loged_icon('#fff')
    } else {
        document.querySelector('.dd-prof').innerHTML = _not_loged_icon('#fff')
        document.querySelector('.main-nav').children[10].innerHTML = _not_loged_icon('#fff')
    }
}

log_ind = document.querySelector('.main-nav').children[10]

log_ind.addEventListener('click', (e) => {
    e.preventDefault()
    if (document.querySelector('.email-init').innerHTML.trim().length > 1) document.querySelector('.profile-cont').style.display = "flex"
    else document.querySelector('.login-bg').style.display = "flex"

})


let dd = [
    '',
    ['TABLETS', 'PROJECTOR', 'LAPTOP', 'NETWORKING', 'COMPONENTS', 'MORNITORS'],
    ['SAMSUNG', 'HUAWEI', 'LENOVO',],
    ['BENQ', 'EPSON', 'VIEWSONIC', 'ACER'],
    ['PICO', 'OCULUS', 'PLAYSTATION'],

    ['FOSSIL', 'GARMIN', 'HUAWEI', 'NOKIA', 'SAMSUNG', 'ACCESSORIES'],
    '',
    ['PRINTERS', 'INKS', 'SCANNER'],
    ['APPLE', 'SAMSUNG', 'HUAWEI', 'MOTOROLLA'],
    ['APPLE', 'SAMSUNG', 'HUAWEI', 'MOTOROLLA'],
    []
]

let all_nav = document.querySelectorAll('.nav-link')
let all_nav_count = document.querySelectorAll('.nav-link')
all_nav.forEach((element, all_nav_count) => {

    if (all_nav_count !== 0 || all_nav_count !== 10 || all_nav_count !== 7)
        element.innerHTML += `<div class="drop-down"></div>`
})

all_nav.forEach((element, all_nav_count) => {
    if (all_nav_count !== 0 || all_nav_count !== 10 || all_nav_count !== 7) {
        for (let k = 0; k < dd[all_nav_count].length; k++) {
            // console.log(dd[all_nav_count][k])
            setTimeout(() => element.children[1].innerHTML += `<a class="m-auto-hor center-content"> ${dd[all_nav_count][k]} </a>`, 500)
            element.addEventListener('mouseover', () => {
                element.children[1].style.display = 'flex'
            })
            element.addEventListener('mouseleave', () => {
                element.children[1].style.display = 'none'
            })
        }
    }
});


left_nav = ['Gaming', 'Automation', 'Beauty and Personal Care', 'Computers', 'Camping and Outdoors',
    'Electronics', 'Engraving Machine', 'Garden, Pool and Patio', 'Printers', 'DailyDeals', 'SmartHome',
    'SmartPhones', 'Software', 'Fasion and Luggage', 'Entertainmer', 'On Sale'];

for (const key in left_nav) {
    document.querySelector('.left-nav-cont').innerHTML +=
        `<div class="left-div-cont   ">
    <a >${left_nav[key]}</a>
    <p class="center-content fw-bold">+</p>
    </div>`

}

document.querySelector('#cat-drop').addEventListener('click', () => {
    document.querySelectorAll('.left-div-cont').forEach(element => {

        if (element.style.display == "flex") {
            document.querySelector('#cat-drop').style.transform = "rotateX(0deg)"
            element.style.display = "none"
        }
        else {
            document.querySelector('#cat-drop').style.transform = "rotateX(180deg)"
            element.style.display = "flex"
        }
    });
})





// Min Main Nav
main_nav = document.querySelector('.main-min-nav').innerHTML

nav_drop_arrow = `<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" 
                          class="bi bi-chevron-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                    </svg>`

skip_nav_link = [0, 6, 10]
for (let ix = 0; ix < nav_list.length; ix++) {
    if (skip_nav_link.includes(ix)) {
        document.querySelector('.main-min-nav').innerHTML +=
            `<a  class="nav-link center-content d-flex fw-bold"  >
             ${nav_list[ix]}
        </a>`
    } else {
        document.querySelector('.main-min-nav').innerHTML +=
            `<a  class="nav-link nav-link-dd center-content d-flex fw-bold"  >  
        ${nav_list[ix]} ${space} ${nav_drop_arrow}
        </a>`
            + `<div class="drop-down-min"></div>`
    }

}

let _all_nav = document.querySelectorAll('.drop-down-min')
let _all_nav_count = document.querySelectorAll('.drop-down-min')

// _all_nav.forEach((element, _all_nav_count) => {

//     if (_all_nav_count !== 10 || _all_nav_count !== 7)
//         element.innerHTML += `<div class="drop-down-min"></div>`
// })
let dd_min = [
    ['GAMING', 'AUTOMATION', 'COMPUTERS', 'CAMPING AND OUTDOOR',
        'BEAUTY AND PERSONAL CARE', 'ELECTRONICS', 'GARDEN, POOL AND PATIO',
        'PRINTERS', 'SMART HOME', 'SMARTPHONES', 'SOFTWARE', 'ENTERTAINMENT'],
    ['TABLETS', 'PROJECTOR', 'LAPTOP', 'NETWORKING', 'COMPONENTS', 'MORNITORS'],
    ['SAMSUNG', 'HUAWEI', 'LENOVO'],
    ['BENQ', 'EPSON', 'VIEWSONIC', 'ACER'],
    ['BENQ', 'EPSON', 'VIEWSONIC', 'ACER'],
    ['PICO', 'OCULUS', 'PLAYSTATION'],
    ['FOSSIL', 'GARMIN', 'HUAWEI', 'NOKIA', 'SAMSUNG', 'ACCESSORIES'],
    ['PRINTERS', 'INKS', 'SCANNER'],
]
_all_nav.forEach((element, _all_nav_count) => {
    for (let k = 0; k < dd_min[_all_nav_count].length; k++) {
        setTimeout(() => element.innerHTML +=
            `<a class="dd-min-a"> ${dd_min[_all_nav_count][k]} </a>`, 500)
    }

});


let all_dd_min_btn = document.querySelectorAll('.nav-link-dd')
let all_dd_min_min = document.querySelectorAll('.drop-down-min')
let all_dd_min_min_div = document.querySelectorAll('.drop-down-min')

all_dd_min_btn.forEach((element, all_dd_min_min) => {

    element.children[0].addEventListener('click', () => {
        console.log(all_dd_min_min_div[all_dd_min_min])
        if (all_dd_min_min_div[all_dd_min_min].style.display == "flex") {
            all_dd_min_min_div[all_dd_min_min].style.display = "none"
            element.children[0].style.transform = "rotateX(0deg)"
        } else {
            all_dd_min_min_div[all_dd_min_min].style.display = "flex"
            element.children[0].style.transform = "rotateX(180deg)"
        }
    })
});


document.querySelector('.dd').addEventListener('click', () => {
    if (document.querySelector('.main-min-nav').style.display !== 'flex')
        document.querySelector('.main-min-nav').style.display = 'flex'
    else document.querySelector('.main-min-nav').style.display = 'none'
})

// document.querySelector('.admin-link').addEventListener('click', () => {
if (document.querySelector('.email-init').innerHTML.trim().includes('.admin')) {
    document.querySelector('.admin-link').style.display = 'flex'
}

if (document.querySelector('.email-init').innerHTML.trim() == '') {
    document.querySelector('.top-cart-count').innerHTML = 'Cart: 0 Products'
    document.querySelector('.top-cart-cost').innerHTML = 'R 0.00'
}

// }
// })
export default loginIcon    