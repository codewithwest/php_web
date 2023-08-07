let img_slide, img_btns, img_status_circle
img_slide = document.querySelector('.img-slide')
img_status_circle = document.querySelector('.pointers').children
img_btns = document.querySelectorAll('.carousel-btn')
img_status_circle[0].style.background = "rgb(20, 222, 20)"

setInterval(() => changeSlideImg(1), 4000)

const changeSlideImg = (num) => {
    let str_len = img_slide.src.length
    let str_img_int = parseInt(img_slide.src.toString().substring(str_len - 5, str_len - 4))
    str_img_int > 2 ? str_img_int = 0 : str_img_int += num
    img_slide.src = `images/home${str_img_int}.jpg`
    for (let ts = 0; ts < img_status_circle.length; ts++) {
        ts == str_img_int ?
            img_status_circle[ts].style.background = "rgb(20, 222, 20)" :
            img_status_circle[ts].style.background = "rgb(120, 142, 120)"
    }
}

img_btns[0].addEventListener('click', () => changeSlideImg(-1))
img_btns[1].addEventListener('click', () => changeSlideImg(1))
