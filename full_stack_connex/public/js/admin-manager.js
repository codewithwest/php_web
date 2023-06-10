
let add_prod_form, upd_prod_form, add_prod_btn, upd_prod_btn,
    del_prod, collapse_edit, table_caps, tables, tables_count,
    del_user, edit_user_btns, upd_user_form, collapse_user_edit

collapse_edit = document.querySelectorAll('.collapse-edit')
collapse_user_edit = document.querySelectorAll('.collapse-user-edit')
del_prod = document.querySelectorAll('.del-product')
del_user = document.querySelectorAll('.del-user')
upd_prod_btn = document.querySelectorAll('.edit-product')
edit_user_btns = document.querySelectorAll('.edit-user')
add_prod_btn = document.querySelector('.show-prod-form')
add_prod_form = document.querySelector('.prod-bg')
upd_prod_form = document.querySelector('.upd-prod-bg')
upd_user_form = document.querySelector('.upd-user-bg')
const upd_prod_form_form = document.querySelector('.upd-prod-bg').innerHTML
const add_prod_form_form = document.querySelector('.prod-bg').innerHTML

//  Add product button
add_prod_btn.addEventListener('click', () => {
    if (add_prod_form.style.display !== 'flex') {
        add_prod_form.style.display = "flex"
        add_prod_btn.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-dash-circle-dotted" viewBox="0 0 16 16">
                <path d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z"/>
            </svg>`
    }
    else {
        add_prod_form.style.display = "none"
        add_prod_btn.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle-dotted" viewBox="0 0 16 16">
                <path d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
            </svg>`
    }

})

// Admin Add product from 
$(document).ready(function () {
    $(".prod-form").submit(function (event) {
        $.ajax({
            type: "POST",
            url: 'addproduct',
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            encode: false,
            success: (r) => {
                $('.reg-form').trigger("reset");
                add_prod_form.children[0].innerHTML = `<div class="prod-mes bg-success center-content text-center m-auto">
                                Product Added Successfully!!
                            </div>`
                setTimeout(() => {
                    add_prod_form.style.display = "none"
                    add_prod_form.innerHTML = add_prod_form_form
                    editTie(collapse_edit)
                }, 2000)
            },
            error: (r) => console.log(r.responseText),
        })
        event.preventDefault();
    });
});

// Admin add products from loop
function addprod(prod_name, prod_desc, prod_price, prod_avail) {
    $(document).ready(function () {
        $(".prod-form").submit(function (event) {
            var prodData = {
                'name': prod_name,
                'desc': prod_desc,
                'price': prod_price,
                'rating': 0,
                'availability': prod_avail,
            };
            console.log(prodData)
            $.ajax({
                type: "GET",
                url: 'addproduct',
                data: prodData,
                dataType: "json",
                contentType: false,
                cache: false,
                processData: false,
                encode: false,
                success: (r) => {

                    let last_itm_table = document.querySelector('table').lastElementChild.children[0].innerHTML
                    addToTable(last_itm_table + 1, prod_name, prod_desc, prod_price, 0, prod_avail)
                },
                error: (r) => console.log(r.responseText),
            })
            event.preventDefault();
        });
    });

}

// Product List
let productsList = [
    ['DELL', 'DELL LATITUDE 7430 14" FHD AG 300-NITS INTEL CORE I7-1270P 12-CORE 32GB RAM - 512GB SSD 4 YEARS PROSUPPORT WIN11 PRO', 44000, 'In stock'],
    ['BOSE', 'BOSE MUSIC AMPLIFIER – SPEAKER AMP WITH BLUETOOTH & WI-FI', 21000, 'In stock'],
    ['HP', 'HP REVERB V2 VERSION 2022 G2 VIRTUAL REALITY HEADSET', 14800, 'In stock'],
    ['ACER', 'ACER ASPIRE VERO AV15 - 51 - 7617 15.6" FHD IPS INTEL CORE I7-1195G7', 14400, 'In stock'],
    ['BOSE', 'BOSE SURROUND SPEAKERS 700 COLOR ARCTIC WHITE', 12800, 'In stock'],
    ['META', 'META QUEST 2 ADVANCED ALL-IN-ONE 256GB VIRTUAL REALITY', 12300, 'In stock'],
    ['PICO', 'PICO 4 ALL-IN-ONE VR 256GB HEADSET', 12000, 'In stock'],
    ['PICO', 'PICO 4 ALL-IN-ONE VR 128GB HEADSET', 9300, 'In stock'],
    ['LENOVO', 'LENOVO - TAB P11 PLUS - TABLET - 11" 2K DISPLAY 4GB MEMORY - 128GB', 7200, 'In stock'],
    ['CANON', 'CANON EF 75-300MM F/4-5.6 III TELEPHOTO ZOOM LENS FOR CANON SLR CAMERAS', 6200, 'In stock'],
    ['SMATREE', 'SMATREE META OCULUS QUEST 2 CHARGING DOCK STATION', 1790, 'In stock'],
    ['PLAYSTATION', 'RUGBY CHALLENGE 4 (PS4)', 1200, 'In stock'],
    ['BRAUN', 'BRAUN FACE MINI HAIR REMOVER FS1000, ELECTRIC FACIAL HAIR', 900, 'In stock'],
    ['NIKON', 'PULUZ PLUG BATTERY CHARGER WITH CABLE FOR NIKON EN-EL15', 320, 'In stock'],
]
// Admind delete product
del_prod.forEach(element => {
    element.addEventListener('click', (e) => {
        e.preventDefault()
        console.log(element.children)
        let id = element.children[1].innerHTML.trim()
        delProduct(id)
        function delProduct(_id) {
            $.ajax({
                type: "GET",
                url: `delproduct/${_id}`,
                dataType: "json",
                contentType: false,
                cache: false,
                processData: false,
                encode: true,
                success: (r) => {
                    element.parentElement.parentElement.style.display = "none"
                },
                error: (r) => console.log(r.responseText),
            })
        }
    });
})

del_user.forEach(element => {
    element.addEventListener('click', (e) => {
        let email = element.children[1].innerHTML.trim()
        delUser(email)
        function delUser(_email) {
            $.ajax({
                type: "GET",
                url: `deluser/${_email}`,
                dataType: "json",
                contentType: false,
                cache: false,
                processData: false,
                encode: true,
                success: (r) => {
                    console.log(r)
                    element.parentElement.parentElement.remove()
                },
                error: (r) => console.log(r.responseText),
            })
        }
    });
})

function callEdit(edit_btns) {
    edit_btns.forEach(element => {
        element.addEventListener('click', (e) => {
            e.preventDefault()
            upd_prod_form.style.display = "flex"
            upd_prod_form.children[0].children[3].setAttribute('value', `${element.parentElement.parentElement.children[0].innerHTML}`)
            upd_prod_form.children[0].children[4].setAttribute('value', `${element.parentElement.parentElement.children[2].innerHTML}`)
            upd_prod_form.children[0].children[5].innerHTML = `${element.parentElement.parentElement.children[3].innerHTML}`
            upd_prod_form.children[0].children[6].setAttribute('value', `${element.parentElement.parentElement.children[4].innerHTML}`)
            upd_prod_form.children[0].children[7].setAttribute('value', `${element.parentElement.parentElement.children[5].innerHTML}`)
            upd_prod_form.children[0].children[8].setAttribute('value', `${element.parentElement.parentElement.children[0].innerHTML}`)
        })
    });
}
function callEditUser(edit_user_btns) {
    edit_user_btns.forEach(element => {
        element.addEventListener('click', (e) => {
            e.preventDefault()
            upd_user_form.style.display = "flex"
            upd_user_form.children[0].children[3].setAttribute('value', `${element.parentElement.parentElement.children[0].innerHTML}`)
            upd_user_form.children[0].children[4].setAttribute('value', `${element.parentElement.parentElement.children[1].innerHTML}`)
            upd_user_form.children[0].children[5].setAttribute('value', `${element.parentElement.parentElement.children[2].innerHTML}`)
            // upd_user_form.children[0].children[5].innerHTML = `${element.parentElement.parentElement.children[2].innerHTML}`
            upd_user_form.children[0].children[6].setAttribute('value', `${element.parentElement.parentElement.children[3].innerHTML}`)
            upd_user_form.children[0].children[7].setAttribute('value', `${element.parentElement.parentElement.children[4].innerHTML}`)
        })
    });
}
callEditUser(edit_user_btns)
callEdit(upd_prod_btn)
editTie(collapse_edit, upd_prod_form)
editTie(collapse_user_edit, upd_user_form)

function editTie(edit_els, the_form) {
    edit_els.forEach(element => {
        element.addEventListener('click', () => {
            the_form.style.display = "none"
        })
    });
}

// Edit Form
$(document).ready(function () {
    $(".edit-form").submit(function (event) {
        $.ajax({
            type: "POST",
            url: 'produpdate',
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            encode: true,
            success: (r) => {
                $('.edit-form').trigger("reset");
                upd_prod_form.children[0].innerHTML =
                    `<div class="prod-mes bg-success center-content text-center m-auto">
                   ${r['success']}
                </div>`
                setTimeout(() => {
                    upd_prod_form.style.display = "none"
                    upd_prod_form.children[0].innerHTML = upd_prod_form_form
                    document.querySelector('.collapse-edit').addEventListener('click', () => {
                        upd_prod_form.style.display = "none"
                    })
                }, 2000)
            },
            error: (r) => {
                upd_prod_form.children[0].innerHTML =
                    `<div class="prod-mes bg-fail center-content text-center m-auto">
                   ${r['failure']}
                </div>`
                setTimeout(() => {
                    upd_prod_form.innerHTML = upd_prod_form_form
                    document.querySelector('.collapse-edit').addEventListener('click', () => {
                        upd_prod_form.style.display = "none"
                    })
                }, 2000)
            },
        })
        event.preventDefault();
    });
});
$(document).ready(function () {
    $(".edit-user-form").submit(function (event) {
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
                if (r['success']) {
                    // console.log(r)
                    location.reload()
                }
            },
            error: (r) => {
                upd_prod_form.children[0].innerHTML =
                    `<div class="prod-mes bg-fail center-content text-center m-auto">
                   ${r['failure']}
                </div>`
                setTimeout(() => {
                    // upd_prod_form.style.display = "none"
                    upd_prod_form.innerHTML = upd_prod_form_form
                }, 2000)
            },
        })
        event.preventDefault();
    });
});

// Add product to button
function addToTable(_prod_id, _brand, _prod_desc, _price, _ratings, _availability) {
    document.querySelector('table').innerHTML +=
        ` <tr class="text-center">
                    <td class="brand m-auto">${_prod_id}</td>
                    <td class="brand m-auto">${_brand}</td>
                    <td class="brand m-auto">${_prod_desc}</td>
                    <td class="brand m-auto">${_price}</td>
                    <td class="brand m-auto">${_ratings}</td>
                    <td class="brand m-auto">${_availability}</td>
                    <td class="center-content">
                        <a class="del-product center-content">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                            </svg>
                        <p class="d-none">${_prod_id}</p></a>
                        <a  class="edit-product center-content">

                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                        </svg>
                        </a>
                    </td>

                </tr>`
}

// productsList.forEach(element => {
//     setTimeout(()=>
//         // console.log(element)
//         addprod(element[0],element[1],element[2],element[3])
//         ,1000)

//     });
// addprod(productsList[0][0],productsList[0][1],productsList[0][2],productsList[0][3])


// Handles Admin Table Tab Changes
table_caps = document.querySelectorAll('.table-caps')
tables = document.querySelectorAll('.table-cont')
tables_count = document.querySelectorAll('.table-cont')
tables[0].style.display = 'flex'
table_caps[0].style.background = 'rgba(12,12,12,.85)'
table_caps[0].addEventListener('click', () => {
    table_caps[0].style.background = 'rgba(12.12.12,.85)'
    tables[0].style.display = 'flex'
    table_caps[1].style.background = 'none'
    tables[1].style.display = 'none'
});
table_caps[1].addEventListener('click', () => {
    table_caps[0].style.background = 'none'
    tables[0].style.display = 'none'
    table_caps[1].style.background = 'rgba(12.12.12,.85)'
    tables[1].style.display = 'flex'
});


