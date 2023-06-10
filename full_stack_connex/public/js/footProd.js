
let footer_prod_list, right_left, foot_list_1, foot_list_2, foot_list_3,
    star, star_half, star_full
footer_prod_list = ['CAMERAS', 'WATCHES', 'TABLETS', 'VR', 'GPS']

function circleAdsFunc() {
    let amn = 0
    for (let xn = 0; xn < footer_prod_list.length; xn++) {
        if (amn < 4) {
            document.querySelector('.circles').innerHTML +=
                `<div class="flex-col center-content">
                        <div class="circle-img d-flex">
                            <img class="fill" src="images/circleAds/${footer_prod_list[xn].toLowerCase()}.jpeg" alt="">
                        </div>
                        <small class="circle-img-text">
                        ${footer_prod_list[xn]}</small>
                    </div>
                    `
            amn += 1
        }

    }
}

circleAdsFunc()
right_left = document.querySelectorAll('.right-left')
right_left[0].addEventListener('click', () => {
    document.querySelector('.circles').innerHTML = ''
    footer_prod_list.push(footer_prod_list.shift())
    circleAdsFunc()


})
right_left[1].addEventListener('click', () => {
    document.querySelector('.circles').innerHTML = ''
    footer_prod_list.unshift(footer_prod_list.pop())
    circleAdsFunc()
})


foot_list_1 = [
    'ACCOUNTS',
    'Account Details',
    'Orders',
    'Returns & Exchanges',
    'WishList',
    'Notification Settings',
    'Buy Gift Vouchers'
]

foot_list_2 = ['CLIENTS CONCIERGE',
    'Help Center',
    'FAQ',
    'Payments Options',
    'Delivery Options',
    'Click and Collect',
    'Returns and Policy',
    'Privacy and Policy',
]

foot_list_3 = [
    'THE COMPANY',
    'About Us',
    'Careers at Connex',
    'Tech Careers',
    'Marketing Services',
    'Corporate Gift Services',
    'Conscious Journey',
    'Contact',
    'Statement',
    'Speak Up Process',
]

function pushLists(main_list, pos) {
    for (let fs = 0; fs < main_list.length; fs++) {
        if (fs == 0) {
            document.querySelectorAll('.main-inner-div')[pos].innerHTML =
                `<h4>${main_list[fs]}</h4>`
        } else {
            document.querySelectorAll('.main-inner-div')[pos].innerHTML +=
                `<small><a class="links" href="http://">${main_list[fs]}</a></small>`
        }
    }
}

pushLists(foot_list_1, 0)
pushLists(foot_list_2, 1)
pushLists(foot_list_3, 2)
star = ``