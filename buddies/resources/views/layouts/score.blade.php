@extends('index')
@section('title')
    Home
@endsection

@section('main_content')
    <link rel="stylesheet" href="{{ asset('css/score.css') }}">
    <div class="score-cont d-flex">
        <div class="score d-flex center-content">
            <h1 class="d-flex center-content fill">{{ Session::get('score')}}/5</h1>

        </div>
        <script>
            let score = document.querySelector('.score')
            let score_val= parseInt(score.children[0].textContent)
                document.querySelector('.score').style.background = `conic-gradient(from 180deg,rgb(13, 201, 13) ${score_val*2}0% ,red ${100-(score_val*2)}%,black )`





        </script>
    </div>
@endsection
