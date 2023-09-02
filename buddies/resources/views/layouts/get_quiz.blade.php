@extends('index')
@section('title')
    Home
@endsection

@section('main_content')

    <link rel="stylesheet" href="{{ asset('css/get_quiz.css') }}">
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
        <form action="/quiz/create" method="post"class="flex-col m-auto-hor">
            @csrf
            <h2 class="quiz-num d-flex center-content">Quiz Options</h2>
            {{-- @foreach ($option as $key => $option[0]) --}}
                @csrf
                <div class="d-flex">
                    <label for="html">Quiz Type</label>
                    <select name="type" id="">
                    @foreach ($options as $key => $data)
                        <option value=" {{ $data->type }}"> {{ $data->type }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="d-flex">
                    <label for="html">Quiz Level</label>
                    <select name="level" id="">
                     @foreach ($options as $key => $data)
                        <option value=" {{ $data->level }}"> {{ $data->level }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="d-flex">
                    <label for="html">Number of Questions</label>
                    <select name="limit" id="">
                    @for ($x = 4; $x < 15; $x++)
                        <option value="{{ $x + 1 }}"> {{ $x + 1 }}</option>
                    @endfor
                    </select>
                </div>
            <button class="m-auto-hor"> Start Quiz </button>
        </form>
    </div>

@endsection
