// let img_slide, img_btns, img_status_circle
// img_slide = document.querySelector('.img-slide')
// img_status_circle = document.querySelector('.pointers').children
// img_btns = document.querySelectorAll('.carousel-btn')
// img_status_circle[0].style.background = "rgb(20, 222, 20)"

// setInterval(() => changeSlideImg(1), 4000)

// const changeSlideImg = (num) => {
//     let str_len = img_slide.src.length
//     let str_img_int = parseInt(img_slide.src.toString().substring(str_len - 5, str_len - 4))
//     str_img_int > 2 ? str_img_int = 0 : str_img_int += num
//     img_slide.src = `images/home${str_img_int}.jpg`
//     for (let ts = 0; ts < img_status_circle.length; ts++) {
//         ts == str_img_int ?
//             img_status_circle[ts].style.background = "rgb(20, 222, 20)" :
//             img_status_circle[ts].style.background = "rgb(120, 142, 120)"
//     }
// }

// img_btns[0].addEventListener('click', () => changeSlideImg(-1))
// img_btns[1].addEventListener('click', () => changeSlideImg(1))


let carousel, carousel_btn
carousel_btn = document.querySelector('.carousel-btns').children
carousel = document.querySelector('.imgs')

setInterval(() => removeFadeOut(carousel.children, 3000), 6000)


function removeFadeOut(el, speed) {
    var seconds = speed / 1000;
    el[0].style.transition = "opacity " + seconds + "s ease";

    el[0].style.opacity = 0;
    el[1].style.opacity = 1;
    setTimeout(() => {
        el[0].parentNode.appendChild(el[0].parentNode.removeChild(el[0]));
        el[0].parentNode.lastChild.style.opacity = .7
        el[1].style.transition = "opacity " + seconds + "s ease-in";

    }, speed);
}

carousel_btn[1].addEventListener('click', (e) => {
    e.currentTarget.style.background = "rgba(22,22,22,.3)"
    setTimeout((e) => carousel_btn[1].style.background = "inherit", 100)
    removeFadeOut(carousel.children, 3000)

})
