<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="{{asset('css/tailwind.css');}}">

    <title>Home</title>
</head>
<body>
    <main class="relative">
        <div class="relative sm:flex 
        sm:justify-center sm:items-center
         min-h-screen bg-dots-lighter
         bg-center bg-gray-100 dark:bg-dots-lighter 
         dark:bg-gray-900 selection:bg-red-500 
         selection:text-gray-400">
    
            <div class=" p-6">
                <div class="grid grid-cols-1
                md:grid-cols-2 gap-6 lg:gap-8">
                <!-- start of card -->
               @foreach($user as $uses  ) 
            <a href="welcome/" 
                class="sm:justify-center sm:items-center  p-6 m-8 bg-white flex-wrap
                dark:bg-gray-800/50 dark:bg-gradient-to-bl 
                from-gray-700/50 via-transparent dark:ring-1 
                dark:ring-inset dark:ring-white/5 rounded-lg align-content-md-between
                shadow-2xl shadow-gray-500/20 dark:shadow-none 
                flex motion-safe:hover:scale-[1.01] transition-all 
                duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                     @foreach($user as $uses ) 
                    <div class="p-6 m-5 border-light flex-xl-row
                      "><p> {{$uses  }}</p></div> 
                     @endforeach

                      
            </a>
           @endforeach
    
        <!-- End of card -->
        </div>
    </div>
    </main>
</body>
</html>