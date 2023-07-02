let carousel_btn_right = document.querySelector('.btn-right')
let carousel_btn_left = document.querySelector('.btn-left')


carousel_btn_right.addEventListener('click', (e) => {
    let _img = carousel_btn_right.parentElement.children[0]
    console.log(_img.src.lastIndexOf('0'))
    let _substr = parseInt(_img.src.substring(_img.src.length - 5, _img.src.length - 4))
    _substr + 1 < 6 ? _img.src = `images/index/${_substr + 1}.jpg` :
        _img.src = `images/index/${0}.jpg`
})
carousel_btn_left.addEventListener('click', (e) => {
    let _img = carousel_btn_left.parentElement.children[0]
    console.log(_img.src.lastIndexOf('0'))
    let _substr = parseInt(_img.src.substring(_img.src.length - 5, _img.src.length - 4))
    _substr > 0 ? _img.src = `images/index/${_substr - 1}.jpg` :
        _img.src = `images/index/${5}.jpg`
})

let imageCarousel = () => {
    let _img = carousel_btn_left.parentElement.children[0]
    let _substr = parseInt(_img.src.substring(_img.src.length - 5, _img.src.length - 4))
    _substr + 1 < 6 ? _img.src = `images/index/${_substr + 1}.jpg` :
        _img.src = `images/index/${0}.jpg`


}
setInterval(() => {
    imageCarousel()
}, 5000);


let _html = document.querySelector('.products-carousel').innerHTML
for (let pd = 0; pd < 4; pd++) {

    document.querySelector('.products-carousel').innerHTML += _html
}
// Used Closures to solve late loading of products

(() => {
    let prod_control = document.querySelectorAll('.prod-control')
    prod_control.forEach(el => {
        console.log(el)
        el.children[0].addEventListener('click', (e) => {
            let _val = parseInt(el.children[1].innerHTML.trim())
            _val == 1 ? e.preventDefault() : el.children[1].innerHTML = _val - 1
        })
        el.children[2].addEventListener('click', (e) => {
            let _val = parseInt(el.children[1].innerHTML.trim())
            el.children[1].innerHTML = _val + 1
            console.log(_val + 1)
        })
    })
})()

