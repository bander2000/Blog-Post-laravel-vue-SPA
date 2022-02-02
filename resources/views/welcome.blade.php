<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"  />
        <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/templatemo-stand-blog.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">

    </head>
    <body>

    <div id="app">
    </div>

     <!-- Bootstrap core JavaScript -->
     <script src="{{ asset('js/app.js') }}"></script>
 
     <!-- Additional Scripts -->
     <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
     <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
     <script src="{{ asset('assets/js/custom.js') }}"></script>
     <script src="{{ asset('assets/js/owl.js') }}"></script>
     <script src="{{ asset('assets/js/slick.js') }}"></script>
     <script src="{{ asset('assets/js/isotope.js') }}"></script>
     <script src="{{ asset('assets/js/accordions.js') }}"></script>
 
     <script language = "text/Javascript"> 
       cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
       function clearField(t){                   //declaring the array outside of the
       if(! cleared[t.id]){                      // function makes it static and global
           cleared[t.id] = 1;  // you could use true and false, but that's more typing
           t.value='';         // with more chance of typos
           t.style.color='#fff';
           }
       }
     </script>
    </body>
</html>
