
<!-- layout.app.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <script src="https://cdn.tailwindcss.com"></script>
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{asset('img/dot-arrow.png')}}">
    <link rel="icon" type="image/x-icon" href="{{asset('img/dot-arrow.png')}}">

    <!-- style -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- awesome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />



</head>
<body class="dark:bg-gray-900 text-white">
    
        @yield('content')
    
</body>
</html>