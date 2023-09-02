@extends('admin.dashboard')
@section('link_redirect')
<a href="/admin/dashboard/questions/new" class="m-auto">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-patch-plus"
        viewBox="0 0 16 16">
        <path fill-rule="evenodd"
            d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z" />
        <path
            d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z" />
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
        <h1 class="text-center">Questions</h1>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Level</th>
                    <th>Type</th>
                    <th>Question</th>
                    <th>Option1</th>
                    <th>Option2</th>
                    <th>Option3</th>
                    <th>Option4</th>
                    <th>Answer</th>
                    <th>Functions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($questions as $key => $data)
                    <tr class="text-center">
                        <td class="brand m-auto">{{ $data->id }}</td>
                        <td class="brand m-auto">{{ $data->level }}</td>
                        <td class="brand m-auto">{{ $data->type }}</td>
                        <td class="brand m-auto">{{ $data->question }}</td>
                        <td class="brand m-auto">{{ $data->option1 }}</td>
                        <td class="brand m-auto">{{ $data->option2 }}</td>
                        <td class="brand m-auto">{{ $data->option3 }}</td>
                        <td class="brand m-auto">{{ $data->option4 }}</td>
                        <td class="brand m-auto">{{ $data->answer }}</td>
                        <td class="center-content h-100">
                            <a class="del-user center-content" href="/store/admin/products/user/{{$data->id}}">
                                <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor"
                                    class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                    <path
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                </svg>
                                <p class="d-none">{{ $data->id }}</p>
                            </a>
                            <a class="edit-user center-content" href="/admin/dashboard/questions/{{ $data->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor"
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

    <script>
    (() => {
            let del_quiz_int = document.querySelectorAll('.del-user')
            del_quiz_int.forEach(btn => {
                btn.addEventListener('click', async (e) => {
                    e.preventDefault()
                    let _id = btn.children[1].textContent.toString().trim()
                    console.log(_id)
                    await fetch('/question/del', {
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                            "X-Requested-With": "XMLHttpRequest",
                            // "X-CSRF-Token": formData['_token']
                        },
                        method: "POST",
                        // credentials: "same-origin",
                        body: JSON.stringify({
                            id: _id,
                        })
                    })
                    .then(e => console.log(e))
                    .then(e => {
                            btn.parentElement.parentElement.style.background = "rgba(220,5,10,.7)"
                            setTimeout(() => {
                            btn.parentElement.parentElement.style.display = "none"
                            }, 1500);
                        })
                })

                })
            })
        ()
        </script>
        </div>
@endsection
