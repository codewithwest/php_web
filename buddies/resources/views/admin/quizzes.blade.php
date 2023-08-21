@extends('admin.dashboard')
@section('link_redirect_by_section')
<a href="/store/admin/dashboard/new/user" class="m-auto">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-plus-fill"
        viewBox="0 0 16 16">
        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
        <path fill-rule="evenodd"
            d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
    </svg>
</a>
@endsection
@section('admin_content')

<div class="admins-cont flex-col w-100">
    <h1 class="text-center">Quizzes</h1>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Email</th>
                <th>Level</th>
                <th>Type</th>
                <th>Questions</th>
                <th>Answers</th>
                <th>Score</th>
                <th>Functions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($quizzes as $key => $data)
            <tr class="text-center">
                <td class="brand m-auto">{{ $data->id }}</td>
                <td class="brand m-auto">{{ $data->email }}</td>
                <td class="brand m-auto">{{ $data->level }}</td>
                <td class="brand m-auto">{{ $data->type }}</td>
                <td class="brand m-auto">{{ $data->questions }}</td>
                <td class="brand m-auto">{{ $data->answers }}</td>
                <td class="brand m-auto">{{ $data->score }}</td>
                <td class="center-content h-100">
                    <a class="del-user center-content del-quiz">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-trash"
                            viewBox="0 0 16 16">
                            <path
                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                            <path
                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                        </svg>
                        <p class="d-none">{{ $data->id }}</p>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        (() => {
            let del_quiz_int = document.querySelectorAll('.del-quiz')
            del_quiz_int.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault()
                    let quiz_id = btn.children[1].textContent
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
        })()
    </script>
</div>

@endsection
