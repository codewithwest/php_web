@extends('index')
@section('title')
    About
@endsection
@section('main_content')

    <div class="about-content-cont d-flex">

        <div class="about-nav d-flex">
            <nav class="flex-col">
                <a class="about-nav-links"  href="#about1">who?</a>
                <a class="about-nav-links" href="#about2">what?</a>
                <a class="about-nav-links" href="#about3">why?</a>
                <a class="about-nav-links" href="#about4">done</a>
            </nav>
        </div>
        <div class="about-body-cont border">
            <div id="about1">1</div>
            <div id="about2">2</div>
            <div id="about3">3</div>
            <div id="about4">4</div>
        </div>
    </div>
    <script>
        let navLinks = document.querySelectorAll('.about-nav-links')
        navLinks.forEach(element => {
            let hrf = document.location.href
            // hrf = hrf.substring(hrf.lastIndexOf('/')+1, hrf.length)
            console.log(element.href)
            element.addEventListener('click',(e)=>{
                if(hrf==element.href){
                element.style.background = "#787879b3"
                element.style.padding = "11px"
                    element.style.color = "#fff"
            }
            else{
                    element.style.background = "inherit"
                    element.style.padding = "10px"
                    element.style.color = "black"
                }

            })

        });
    </script>
@endsection
