@extends('index')
@section('title')
    Home
@endsection

@section('main_content')
@if (Session::has('user.email'))

    <link rel="stylesheet" href="{{ asset('css/score.css') }}">
    <div class="score-cont flex-col">
        <div class="score d-flex center-content">
            <h1 class="d-flex center-content fill">{{ Session::get('quiz_data.score')}}/5</h1>

        </div>
        <script>
            let score = document.querySelector('.score')
            let score_val= parseInt(score.children[0].textContent)
                document.querySelector('.score').style.background = `conic-gradient(from 180deg,rgb(13, 201, 13) ${score_val*2}0% ,red ${100-(score_val*2)}%,black )`
        </script>
        <div class="redirects d-flex wrap m-auto-hor">
            {{-- <a href="/">Home</a> --}}
            <a href="/new/quiz">New Quiz</a>
            <a href="/quizzes/history">My Quizzes</a>
        </div>
    </div>
    @else
        {{Redirect::to('/signin')}}
    @endif
@endsection
