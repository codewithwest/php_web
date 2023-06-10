<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
       <link rel="stylesheet" href="{{asset('css/style.css');}}">
        <link rel="stylesheet" href="{{asset('css/const.css');}}">
        <link rel="stylesheet" href="{{asset('css/forms.css');}}">
        <link rel="stylesheet" href="{{asset('css/prod.css');}}">
</head>
<body>
    <main class="main">
        <!-- Start of nav -->
        <nav class="nav">
            <div class="logo center-content flex-row">
                <img class="fill" src="{{asset('images/logo.jpg');}}" alt="" srcset="">
            </div>
            <div class="header flex-col j-sa">
                <p class="inv fw-bold">INVENTORY</p>
                <a class="navbar-brand fs-1" href="/">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-box-arrow-left" viewBox="0 0 16 16" fill="#fff">
                    <path fill-rule="evenodd"
                        d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                    <path fill-rule="evenodd"
                        d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                    </svg>
                </a>
            </div>
            <div class="funcs flex-col center-content">
               <h1 class="add-p fill center-content">Add Product
                </h1>
                <button class="show-prod-form b-none bg-none fill">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle-dotted" viewBox="0 0 16 16">
                        <path d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                    </svg>
                </button>
            </div>
        </nav>
        <!-- Start of the main section -->
        <section class="prod-sec">
            <!-- Add Product Form container -->
            <div class="prod-bg fill d-none center-content text-bg">
                <form class="prod-form center-content flex-col" enctype="multipart/form-data">
                @csrf   
                <h1 class="text-center">Create Product</h1>
                    <input class="name b-none m-auto center-content" type="text" name="name" placeholder="Name" required>
                    <textarea class="desc b-none m-auto" type="text" row="5" name="desc" placeholder="Desctription" required></textarea>
                    <input class="price b-none m-auto" type="text" name="price" placeholder="Price" required>
                    <input value="0" class="rating b-none m-auto" type="text"  name="rating" placeholder="Ratings" required>
                    <!-- <input class="avail b-none m-auto" type="text" name="availability" placeholder="Availability"> -->
                    <div class="avail-select m-auto-hor center-content d-flex">
                        <h2>Availability</h2>
                    <select class="selector b-none bg-none" name="availability" id="cars">
                    <option class="b-none bg-none" value="In Stock">In Stock</option>
                    <option value="Out Of Stock">Out Of Stock</option>
                    </select>
                    </div>
                    <input type="file" name="image" class="img-input" >

                    <button class="add-prod b-none m-auto" type="submit">Add Product</button>
                </form>
           
            </div>
        <!-- Update Product -->
            <div class="upd-prod-bg fill center-content text-bg ">
                <form class="edit-form center-content flex-col"  enctype="multipart/form-data">
                    <div class="collapse-edit center-content">X</div>
                    @csrf   
                    <h1 class="text-center">Product Update</h1>
                        <input hidden class="prod_id d-none" type="text" name="id" value="">
                        <input class="name b-none m-auto center-content" type="text" name="name" placeholder="Name" required>
                        <textarea class="desc b-none m-auto" type="text" row="5" name="desc" placeholder="Desctription" required></textarea>
                        <input class="price b-none m-auto" type="text" name="price" placeholder="Price" required>
                        <input value="0" class="rating b-none m-auto" type="text"  name="rating" placeholder="Ratings" required>
                        <div class="avail-select m-auto-hor center-content d-flex">
                            <h2>Availability</h2>
                        <select class="selector b-none bg-none" name="availability" id="cars">
                        <option class="b-none bg-none" value="In Stock">In Stock</option>
                        <option value="Out Of Stock">Out Of Stock</option>
                        </select>
                        </div>
                        <input type="file" name="image" class="img-input" >
                        <button class="edit-prod b-none m-auto" type="submit">Update Product</button>
                </form>
    
            </div>
            <div class="upd-user-bg fill center-content text-bg ">
                <form class="edit-user-form center-content flex-col">
                    <div class="collapse-user-edit center-content">X</div>
                    @csrf   
                    <h1 class="text-center">Product User</h1>
                        <input hidden class="prod_id d-none" type="text" name="id" value="">
                        <input class="name b-none m-auto center-content" type="text" name="name" placeholder="Name" required>
                        <input class="email b-none m-auto center-content" type="email" name="email" placeholder="Email" required>
                        <!-- <textarea class="desc b-none m-auto" type="text" row="5" name="desc" placeholder="Desctription" required></textarea> -->
                        <input class="price b-none m-auto" type="text" name="address" placeholder="Address" required>
                        <input   class="rating b-none m-auto" type="text"  name="phone" placeholder="Phone" required>
                        <button class="edit-prod b-none m-auto" type="submit">Update User</button>
                </form>
    
            </div>

            <!-- Table Caption Container -->
        <div class="table-caption m-auto-hor center-content d-flex">
            <a class="table-caps center-content">Products</a>
            <a class="table-caps center-content">Users</a>
        </div>
        <!-- Table Start -->
        <div class="table-cont d-flex">
            <table class="table fill">
                <th>Id</th>
                <th>Images</th>
                <th>Brand</th>
                <th>Desc</th>
                <th>Price</th>
                <th>Ratings</th>
                <th>Availability</th>
                <th>Functions</th>
                @foreach($products as $key => $data)
                <tr class="text-center">
                    <td class="brand m-auto">{{$data->id}}</td>
                    <td class="brand m-auto ">
                        <div class="fill d-flex">
                             <img class="prod-img-tab m-auto" 
                        src="images/featured/{{$data->image}}" alt="">
                        </div>
                       
                    </td>
                    <td class="brand m-auto">{{$data->name}}</td>
                    <td class="brand m-auto">{{$data->desc}}</td>
                    <td class="brand m-auto">{{$data->price}}</td>
                    <td class="brand m-auto">{{$data->rating}}</td>
                    <td class="brand m-auto">{{$data->availability}}</td>                   
                    <td class="center-content h-100">
                        <a class="del-product center-content">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                            </svg>
                        <p class="d-none">{{$data->id}}</p></a>
                        <a  class="edit-product center-content">

                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                        </svg>
                        </a>
                    </td>
                    
                </tr>
                 @endforeach
            </table>
            </div>
            <div class="table-cont d-flex">
            <table class="table fill">
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <!-- <th>Password</th> -->
                <th>Functions</th>
                @foreach($users as $key => $data)
                <tr class="text-center">
                    <td class="brand m-auto">{{$data->id}}</td>
                    <td class="brand m-auto">{{$data->name}}</td>
                    <td class="brand m-auto">{{$data->email}}</td>
                    <td class="brand m-auto">{{$data->address}}</td>
                    <td class="brand m-auto">{{$data->phone}}</td>
                    <!-- <td class="t-pass brand m-auto">{{$data->password}}</td> -->
                    
                    <td class="center-content h-100">
                        <a class="del-user center-content">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                            </svg>
                        <p class="d-none">{{$data->email}}</p></a>
                        <a  class="edit-user center-content">

                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                        </svg>
                        </a>
                    </td>
                    
                </tr>
                 @endforeach
            </table>
            </div>
        </section>
    </main>
</body>

<script src="{{asset('js/jquery-3.6.3.js')}}"></script>
<script src="{{asset('js/functions.js')}}" type="module"></script>

<script src="{{asset('js/admin-manager.js')}}" type="module"></script>

</html>