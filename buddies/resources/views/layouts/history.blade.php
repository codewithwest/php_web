@extends('index')
@section('title')
Quizzes History
@endsection
@section('main_content')
@if (Session::has('user.email'))
<link rel="stylesheet" href="{{ asset('css/history.css') }}">

<div class="history-cont flex-col">
    <h1 class="text-center">Your Quiz History</h1>

    <div class="quizzes text-center">

        @foreach ($history as $key=>$data )
        <div class="all-quiz-cont">
            <div class="metrics d-flex j-sa">
                <input value="{{ $data[1]['quiz_id'] }}" hidden>
                <h2>Quiz: {{ $key+1 }}</h2>
                <h2>Score: {{ $data[1]['score'] }}</h2>
            </div>
            <div class="collapse-quiz d-flex j-sb">
                <button class="collapse-quiz-btn b-none fw-bold">
                    Expand</button>
                <button class="del-quiz b-none">
                    Delete
                </button>
            </div>

            <div class="cont flex-col">
                {{-- @foreach ( $data[1] as $key=>$val ) --}}
                @foreach ( $data[0] as $key=>$value )
                <div class="question  flex-col">
                    <h2 class="text-center">{{ $value->question }}?</h2>
                    {{-- <input type="text" value={{ $value->answer }}> --}}

                    <div class="
                    {{ $value->answer == " option1" ?"green":""}} {{ $value->answer == "option1" &&
                        $data[1]['answers'][0] == "option1" ? "correct":
                        ($data[1]['answers'][0] == "option1"?"answer":"yellow") }}">
                        <p>{{ $value->option1 }}</p>
                    </div>
                    <div class="
                    {{ $value->answer == " option2" ?"green":""}} {{ $value->answer == "option2" &&
                        $data[1]['answers'][0] == "option2" ? "correct":
                        ($data[1]['answers'][0] == "option2"?"answer":"yellow") }}">

                        <p>{{ $value->option2 }}</p>
                    </div>
                    <div class="
                    {{ $value->answer == " option3" ?"green":""}} {{ $value->answer == "option3" &&
                        $data[1]['answers'][0] == "option3" ? "correct":
                        ($data[1]['answers'][0] == "option3"?"answer":"yellow") }}">



                        <p>{{ $value->option3 }}</p>
                    </div>
                    <div class="
                    {{ $value->answer == " option4" ?"green":""}} {{ $value->answer == "option4" &&
                        $data[1]['answers'][0] == "option4" ? "correct":
                        ($data[1]['answers'][0] == "option4"?"answer":"yellow") }}">
                        <p>{{ $value->option4 }}</p>
                    </div>

                </div>
                @endforeach

            </div>
        </div>

        @endforeach
    </div>
</div>
<script>
    // HAndle collapse and expand quizzes
    let col_btn = document.querySelectorAll('.collapse-quiz-btn')
    let del_quiz = document.querySelectorAll('.del-quiz')
    col_btn.forEach(btn => {
        btn.addEventListener('click', (e) => {
            let quiz_questions = btn.parentElement.parentElement.children[2].style
            if (e.currentTarget.textContent == "Collapse") {
                quiz_questions.height = 0
                quiz_questions.visibility = "hidden"
                quiz_questions.overflowY = "hidden"
                quiz_questions.transition = "all 1s ease-in"
                e.currentTarget.textContent = "Expand"
            }
            else {
                quiz_questions.height = "auto"
                quiz_questions.visibility = "visible"
                quiz_questions.overflowY = "none"
                quiz_questions.transition = "all 1s ease-in"
                e.currentTarget.textContent = "Collapse"
            }
        })
    });

    del_quiz.forEach(btn => {
        btn.addEventListener('click', (e) => {
            let quiz_id = btn.parentElement.parentElement.children[0].children[0].value
            console.log(quiz_id);
            fetch('/quiz/del', {
                method: "POST",
                credentials: "same-origin",
                body: JSON.stringify({
                    quiz_id: quiz_id,
                })
            })
                .then(e => e.json()).then(e => {
                    btn.parentElement.parentElement.style.display = "none"
                })
        })
    })
</script>
@else
{{Redirect::to('/signin')}}
@endif
@endsection
