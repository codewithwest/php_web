@extends('admin.dashboard')
@section('link_redirect')
    <a href="/admin/dashboard/new/user" class="m-auto">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-plus-fill"
            viewBox="0 0 16 16">
            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
            <path fill-rule="evenodd"
                d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
        </svg>
    </a>
@endsection
@section('link_redirect')
    <a href="/admin/dashboard/questions" class="m-auto link fw-bold">Questions</a>
@endsection

@if (Session::has('success'))
    <div class="alert-success-cont top-0 pos-abs d-flex center-content w-100">
        <div class="alert-success m-auto fw-bold ">
            {{ Session::get('success') }}
        </div>
    </div>
    <script>
    </script>
@elseif (Session::has('failure'))
    <div class="alert-success-cont top-0 pos-abs d-flex center-content w-100">
        <div class="alert-success bg-fail m-auto fw-bold ">
            {{ Session::get('failure') }}
        </div>
    </div>
@endif
@section('admin_content')
    <style>
        .collapse-admin-nav {
            display: none
        }
        body,.admin-content {
            background: inherit
        }
    </style>

    @foreach ($question as $key => $data)
    <div class="join-us cont h-100 flex-col center-content">
        <h2>New Quiz</h2>
        <br>
        <form action="" method="post" class="flex-col m-auto-hor">
            @csrf
            <div class="d-flex wrap">
                <label for="level">Level</label>
                <input type="number" max="15" name="level" value="{{ $data->level }}">
                @error('level')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex wrap">
                <label for="type">Type</label>
                <input type="text" name="type" value={{ $data->type  }}>
                @error('type')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex wrap">
                <label for="question">Question</label>
                <input type="question" name="question" value=<?php $tke = $data->question;echo $tke ?> >
                @error('question')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            @for ($x = 0; $x < 4; $x++)
                <div class="d-flex wrap" >
                    <label for="question">Option {{ $x + 1 }}</label>
                    <input type="text" name="option{{ $x + 1 }}" value="<?php $opt= "option".$x+1 ; echo $data->$opt ?>">
                </div>
            @endfor
            <div class="d-flex wrap">
                <label for="answer">Answer</label>
                <select name="answer" id="" >
                    @for ($x = 0; $x < 4; $x++)
                        <option value="option{{ $x + 1 }}"> option{{ $x + 1 }}</option>
                    @endfor
                </select>
                @error('answer')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <button class="m-auto-hor">Create Quiz</button>
        </form>
    </div>
    @endforeach
@endsection
