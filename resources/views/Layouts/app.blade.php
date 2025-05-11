{{-- resources\views\Layouts\app.blade.php --}}
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>MSWDO - Sogod Municipality</title>
        <link rel="icon" href="{{ asset('images/logos/mswdicon.png') }}">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        @vite('resources/css/app.css')
        @yield('head')
    </head>

    <body class="h-screen bg-slate-100">
        @yield('content')
    </body>

</html>
