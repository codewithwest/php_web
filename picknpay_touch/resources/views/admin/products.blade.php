@extends('admin.dashboard')

@section('link_redirect_by_section')
    <a href="/store/admin/dashboard/new/product" class="m-auto">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-patch-plus"
            viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z" />
            <path
                d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z" />
        </svg>
    </a>
@endsection

@section('admin_content')
    <div class="admins-cont flex-col w-100">
        <h1 class="text-center">Products Inventory</h1>
        <table class="styled-table ">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Desc</th>
                    <th>Category</th>
                    <th>Usage</th>
                    <th>Warnings</th>
                    <th>Stock</th>
                    <th>Rating</th>
                    <th>Reviews</th>
                    <th>Functions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $data)
                    <tr class="text-center">
                        <td class="brand m-auto">{{ $data->id }}</td>

                        <td class="brand m-auto d-flex center-content">

                        <img src="/images/products/{{ $data->image}}" class="fill m-auto" alt="">
                        </td>
                        <td class="brand m-auto">{{ $data->name }}</td>
                        <td class="brand m-auto">{{ $data->price }}</td>
                        <td class="brand m-auto">{{ $data->desc }}</td>
                        <td class="brand m-auto">{{ $data->category }}</td>
                        <td class="brand m-auto">{{ $data->usage }}</td>
                        <td class="brand m-auto">{{ $data->warnings }}</td>
                        <td class="brand m-auto">{{ $data->stock }}</td>
                        <td class="brand m-auto">{{ $data->rating }}</td>
                        <td class="brand m-auto">{{ $data->reviews }}</td>
                        <td class="h-100 d-flex">
                            <a class="del-user h-100   m-auto" href="/store/admin/products/delete/{{$data->barcode}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                    class="bi bi-trash m-auto-vert" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                    <path
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                </svg>
                                {{-- <p class="d-none">{{ $data->barcode }}</p> --}}
                            </a>
                            <a href="products/{{ $data->barcode }}" class="edit-user center-content h-100">

                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
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
@endsection
