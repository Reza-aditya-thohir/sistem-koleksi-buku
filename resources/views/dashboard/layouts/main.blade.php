<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="icon" href="../../../img/journal.svg" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body >
    <div class="antialiased  dark:bg-gray-900">


        <main class="p-4 md:ml-64 h-auto pt-20">
            
            @include('dashboard.layouts.navbar')
            @include('dashboard.layouts.saidbar')

            <div class="w-full px-6 py-6 mx-auto">

                @yield('container')

            </div>

        </main>
    </div>

</body>

</html>
