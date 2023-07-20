 <div class="main-header-cont">
     <!-- First Header -->
     <div class="first-header-cont d-flex center-content">
         <div class="top-text-cont">
             You're viewing:
         </div>
         <div class="top-location-cont">
             <a class="">
                 PnP Grocery</a>
         </div>
         <div class="top-text-cont">
             Other:
         </div>
         <div class="top-location-cont">
             <a class="">
                 PnP Home</a>
         </div>
         <div class="top-location-cont">
             <a class="">
                 PnP QualiSave
         </div>
         </a>
         <div class="top-location-cont">
             <a class="">
                 PnP Clothing</a>
         </div>

     </div>
     <!-- Second Header -->
     <div class="second-header-cont  j-sb">
         <div class="shopping-text-cont d-flex">
             <span> Your Shopping: </span>
             <a href="contact"> Hyper Woodmead <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                     fill="currentColor" class="bi bi-chevron-down m-auto-vert" viewBox="0 0 16 16">
                     <path fill-rule="evenodd"
                         d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                 </svg>
             </a>
         </div>
         <div class="log-sign-links">

             <p class="d-flex">
                 @if (Session::has('email'))
                     <a href="/customer/profile/2">
                         Profile
                     </a>
                     <a href="/customer/logout">
                         Log Out
                     </a>
                 @else
                     <a href="/auth/login">Log In |</a>
                     <!-- <a></a> -->
                     <a href="/auth/signup">Sign Up</a>
                 @endif
             </p>
         </div>
     </div>
     <!-- Third Header -->
     <div class="search-nav-cont d-flex wrap m-auto-hor">
         <div class="search-nav-div-1 d-flex w-100">
             <img src="{{ asset('images/Pick_n_Pay_logo.svg') }}" class="m-auto-vert" height="40px" alt=""
                 srcset="">
             <div class="search-cont  center-content">
                 <div class="search d-flex center-content">
                     <input type="search" value="" class="bg-none " placeholder="Seach for products or brands">
                     <div class="search-btn d-flex center-content">
                         <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                             class="bi bi-search" viewBox="0 0 16 16">
                             <path
                                 d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                         </svg>
                     </div>
                 </div>
             </div>
             <div class="d-flex hover-cont">
                 <a href="http://" class="d-flex m-auto-vert  hover">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-file-earmark-text m-auto-vert" viewBox="0 0 16 16">
                         <path
                             d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                         <path
                             d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                     </svg>
                     <p class="m-auto-vert"> Online Orders</p>

                 </a>
                 <a href="http://" class="d-flex   m-auto-vert hover">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-suit-heart-fill m-auto-vert" viewBox="0 0 16 16">
                         <path
                             d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z" />
                     </svg>
                     <p class="m-auto-vert">Favourites & Lists</p>

                 </a>
             </div>
             <a href="http:// " class="flex-col center-content m-auto-vert">
                 <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                     class="bi bi-truck" viewBox="0 0 16 16">
                     <path
                         d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                 </svg>
                 Book
             </a>
             @if (Session::has('email'))
                 <a href="/products/user/checkout"class="flex-col center-content m-auto-vert ">
                 @else
                     <a class="flex-col center-content m-auto-vert ">
             @endif
             <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                 class="bi bi-cart3" viewBox="0 0 16 16">
                 <path
                     d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
             </svg>
             Trolley
             </a>
         </div>
         <div class="search-nav-div-2   d-flex w-100">
             <a href="http://">Shop by Asle
                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     class="bi bi-chevron-down m-auto-vert" viewBox="0 0 16 16">
                     <path fill-rule="evenodd"
                         d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                 </svg></a>
             <a href="http://">Specials</a>
             <a href="http://">PnP Home</a>
             <a href="http://">Winter
                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     ass="bi bi-chevron-down m-auto-vert" viewBox="0 0 16 16">
                     <path fill-rule="evenodd"
                         d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                 </svg>
             </a>
             <a href="http://">Recipes</a>
             <a href="http://">Smart Shopper
                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     class="bi bi-chevron-down m-auto-vert" viewBox="0 0 16 16">
                     <path fill-rule="evenodd"
                         d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                 </svg>
             </a>
             <a href="http://">Pick n Pay asap!</a>
             <a href="http://">In-Store Catalogues</a>
         </div>
     </div>
 </div>
