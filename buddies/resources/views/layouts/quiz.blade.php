@extends('index')
@section('title')
    Home
@endsection

@section('main_content')
    @if (Session::has('questions'))
    <link rel="stylesheet" href="{{ asset('css/quiz.css') }}">
    @if (Session::has('success'))
    <div class="alert-success-cont top-0 pos-abs d-flex center-content w-100">
        <div class="alert-success m-auto fw-bold ">
            {{ Session::get('success') }}
        </div>
    </div>
    <script>
        setTimeout(() => document.querySelector('.alert-success-cont').style.display = "none", 3500)
    </script>
    @elseif (Session::has('failure'))
        <div class="alert-failure-cont top-0 pos-abs d-flex center-content w-100">
        <div class="alert-failure m-auto fw-bold ">
            {{ Session::get('failure') }}
        </div>
    </div>
    @endif
    <div class="quiz-cont">
        <form action="" method="post"class="flex-col m-auto-hor">
            @csrf
            {{-- @foreach (Session::get('quiz') as $key => $data) --}}
            <div class="d-flex j-sb">
             <p class="quiz-num d-flex center-content">{{ Session::get('quiz_data.question_num')+1}}/5</p>
            <p class="quiz-num d-flex center-content">Score: {{ Session::get('quiz_data.score')}}</p>
            </div>
            <h3>{{ Session::get('questions')[Session::get('quiz_data.question_num')]->question }}</h3>
               <input type="hidden" name="id" value="{{ Session::get('questions')[Session::get('quiz_data.question_num')]->id }}">

                <div class="d-flex">
                    <input type="radio" name="answer" value="option1">
                    <label for="html">{{ Session::get('questions')[Session::get('quiz_data.question_num')]->option1 }}</label>
                </div>
                <div class="d-flex">
                    <input type="radio" name="answer" value="option2">
                    <label for="html">{{ Session::get('questions')[Session::get('quiz_data.question_num')]->option2 }}</label>
                </div>
                <div class="d-flex">
                    <input type="radio" name="answer" value="option3">
                    <label for="html">{{ Session::get('questions')[Session::get('quiz_data.question_num')]->option3 }}</label>
                </div>
                <div class="d-flex">
                    <input type="radio" name="answer" value="option4">
                    <label for="html">{{ Session::get('questions')[Session::get('quiz_data.question_num')]->option4 }}</label>
                </div>
                            {{-- {{substr(\Request::url(), -1)}} --}}

            <button class="m-auto-hor"> Next Question >></button>
        </form>
    </div>
    @else
    {{Redirect::to('/quiz')}}
    @endif
@endsection
