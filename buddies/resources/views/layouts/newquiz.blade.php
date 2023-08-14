@extends('index')
@section('title')
    New Quiz
@endsection

@section('main_content')
    <link rel="stylesheet" href="{{ asset('css/joinus.css') }}">
    <link rel="stylesheet" href="{{ asset('css/newquiz.css') }}">
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
    <div class="join-us cont h-100 flex-col center-content">
        <h2>New Quiz</h2>

        <form action="" method="post" class="flex-col m-auto-hor">
            @csrf
            <div class="d-flex wrap">
                <label for="level">Level</label>
                <input type="number" max="15" name="level" value="{{ old('level') }}">
                @error('level')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex wrap">
                <label for="type">Type</label>
                <input type="text" name="type" {{ old('type') }}>
                @error('type')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex wrap">
                <label for="question">Question</label>
                <input type="question" name="question" {{ old('question') }}>
                @error('question')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            @for ($x = 0; $x < 4; $x++)
                <div class="d-flex wrap">
                    <label for="question">Option {{ $x + 1 }}</label>
                    <input type="text" name="option{{ $x + 1 }}">
                </div>
            @endfor
            <div class="d-flex wrap">
                <label for="answer">Answer</label>
                <select name="answer" id="">
                    @for ($x = 0; $x < 4; $x++)
                        <option value="option{{ $x + 1 }}"> option{{ $x + 1 }}</option>
                    @endfor
                </select>
                @error('answer')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>





            <button class="m-auto-hor">Sign Up</button>
        </form>
    </div>
@endsection
