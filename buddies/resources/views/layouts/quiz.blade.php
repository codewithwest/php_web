@extends('index')
@section('title')
    Home
@endsection

@section('main_content')
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
    @endif
    <div class="quiz-cont">
        <form action="" method="post"class="flex-col m-auto-hor">
            @csrf
            <p class="quiz-num d-flex center-content">{{Session::has('question_num')? Session::get('question_num')+1:1}}/5</p>
            <p class="quiz-num d-flex center-content">Score: {{ Session::get('score')}}</p>
            {{-- @foreach ($option as $key => $option[0]) --}}
                <h3>{{ $questions[Session::has('question_num')? Session::get('question_num'):1]->question }}</h3>
                <input type="hidden" name="id" value="{{ $questions[Session::has('question_num')? Session::get('question_num'):1]->id }}">
                <div class="d-flex">
                    <input type="radio" name="answer" value="option1">
                    <label for="html">{{ $questions[Session::has('question_num')? Session::get('question_num'):1]->option1 }}</label>
                </div>
                <div class="d-flex">
                    <input type="radio" name="answer" value="option2">
                    <label for="html">{{ $questions[Session::has('question_num')? Session::get('question_num'):1]->option2 }}</label>
                </div>
                <div class="d-flex">
                    <input type="radio" name="answer" value="option3">
                    <label for="html">{{ $questions[Session::has('question_num')? Session::get('question_num'):1]->option3 }}</label>
                </div>
                <div class="d-flex">
                    <input type="radio" name="answer" value="option4">
                    <label for="html">{{ $questions[Session::has('question_num')? Session::get('question_num'):1]->option4 }}</label>
                </div>
            {{-- @endforeach --}}
{{-- {{substr(\Request::url(), -1)}} --}}

            <button class="m-auto-hor"> Next Question >></button>
        </form>
    </div>
@endsection
