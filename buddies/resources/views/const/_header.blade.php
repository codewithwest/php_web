
<nav class="main-nav d-flex j-sb">
    <div class="logo-cont d-flex h-100">
        <a href="/">
            <img class="m-auto " src="{{ asset('images/home1.jpg') }}" alt="">
        </a>
    </div>
    <div class="nav-bar d-flex center-content h-100">
        <!-- <div class="drop-icon"> -->

        <!-- </div> -->
        <div class="nav-dd fill">
            <a href="">Home</a>
            <a href="/about">About</a>
            <a href="/quiz">Quiz</a>
        </div>
    </div>

    @if (Session::has('user.email'))
    <div class="profile-cont d-flex center-content h-100">
        <div class="dd">
                 <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-list dd-bars" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
        </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-person-circle dd-person" viewBox="0 0 16 16">
                    <stop class="main-stop" offset="0%" />
                    <stop class="alt-stop" offset="100%" />
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd"
                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
                <div class="dd-content pos-abs flex-col">
                    <a href="/"  >Home</a>
                    <a href=""  >About</a>
                    <a href="/quiz"  >Quiz</a>
                    <a href="/profile">Profile</a>
                    <a href="/quizzes/history">History</a>
                    <a href="/clear/session">LogOut</a>
                </div>
        </div>
    </div>

    @else

        <div class="profile-cont d-flex center-content h-100">
        <div class="dd">
                <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-list dd-bars" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
        </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-person-circle dd-person" viewBox="0 0 16 16">
                    <stop class="main-stop" offset="0%" />
                    <stop class="alt-stop" offset="100%" />
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd"
                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
                <div class="dd-content pos-abs flex-col">
                    <a href="/">Home</a>
                    <a href="">About</a>
                    <a href="/quiz">Quiz</a>
                    <a href="/signin">Login</a>

                </div>
        </div>
    </div>
</nav>
@endif
