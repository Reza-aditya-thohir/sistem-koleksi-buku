<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Galery Books</title>
    <link rel="icon" href="img/journal.svg" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="">
    @include('layouts.navbar')

    <div class="">
        @yield('container')
    </div>
</body>
</html>