@extends('admin.dashboard')
@section('link_redirect')
<a href="/admin/dashboard/user/new" class="m-auto">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-plus-fill"
        viewBox="0 0 16 16">
        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
        <path fill-rule="evenodd"
            d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
    </svg>
</a>
    <a href="/clear/session" class="link-tool link">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-door-open"
            viewBox="0 0 16 16">
            <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z" />
            <path
                d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z" />
        </svg>
        <div class="popup">
            <div class="popuptext">
                Log Out
            </div>
        </div>
    </a>


@endsection
@section('admin_content')

    <div class="admins-cont flex-col w-100">
        <h1 class="text-center">Users</h1>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Functions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $key => $data)
                    <tr class="text-center">
                        <td class="brand m-auto">{{ $data->id }}</td>
                        <td class="brand m-auto">{{ $data->firstname }}</td>
                        <td class="brand m-auto">{{ $data->lastname }}</td>
                        <td class="brand m-auto">{{ $data->email }}</td>
                        <td class="brand m-auto fw-bold">{{ str_contains($data->email, '.admin@buddies')?'Admin':'User' }}</td>
                        <!-- <td class="t-pass brand m-auto">{{ $data->password }}</td> -->
                        <td class="d-flex center-content h-100">
                            <a class="del-user center-content">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor"
                                    class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                    <path
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                </svg>
                                <p class="d-none">{{ $data->email }}</p>
                            </a>
                            <a class="edit-user center-content" href="/admin/dashboard/users/{{ $data->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="bi bi-pen" viewBox="0 0 16 16">
                                    <path
                                        d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                                </svg>
                            </a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
      <script>
        (() => {
            let del_quiz_int = document.querySelectorAll('.del-user')
            del_quiz_int.forEach(btn => {
                btn.addEventListener('click', async (e) => {
                    e.preventDefault()
                    let email = btn.children[1].textContent.toString().trim()
                    console.log(email)
                    await fetch('/user/del', {
                        headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    "X-Requested-With": "XMLHttpRequest",
                    // "X-CSRF-Token": formData['_token']
                },
                    method: "POST",
                    credentials: "same-origin",
                    body: JSON.stringify({
                        email: email,
                    })
                })
                .then(e => console.log(e)).then(e => {
                    btn.parentElement.parentElement.style.background = "rgba(220,5,10,.7)"
                    setTimeout(() => {
                    btn.parentElement.parentElement.style.display = "none"
                    }, 1500);
                })
                })
            })
        })()
    </script>
@endsection
