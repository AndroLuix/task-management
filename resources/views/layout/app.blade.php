
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


</head>
<body class="dark:bg-gray-900 text-white">
    <div class="container">
        @yield('content')
    </div>
</body>
</html>