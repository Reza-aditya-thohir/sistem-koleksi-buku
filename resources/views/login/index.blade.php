<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100">

    <section class="px-4 py-4 bg-blue-500 flex flex-row justify-between">
        <h2 class="text-white md:px-10 text-sm  md:font-bold sm:text-xl lg:text-xl">Login Dashboard GaleryBook</h2>
        <a href="#" class="text-white text-xs mt-1 md:mt-0 md:text-sm pr-4 ">Bantuan!</a>
    </section>



    <nav class="flex m-5" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="/"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Beranda
                </a>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3  text-gray-400 mx-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Login</span>
                </div>
            </li>
        </ol>
    </nav>

    <div class="flex flex-col items-center justify-center mt-10">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="/img/journal.svg" class="h-8" alt="Flowbite Logo" />
            <span
                class="self-center text-xl sm:text-2xl font-semibold whitespace-nowrap dark:text-white">GalleryBooks</span>
        </a>
    </div>
    

    <div class="mt-20 max-w-sm  bg-white border border-gray-200 shadow-lg rounded-lg p-4 mx-auto ">
        @if (session()->has('LoginEror'))
            <div id="erorr-alert"
                class=" bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded relative mb-2 ml-0 max-w-md sm:w-full"
                role="alert">
                <strong class="font-bold">Erorr!</strong>
                <span class="block sm:inline">{{ session('LoginEror') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-2">
                    <svg class="fill-current h-6 w-6 text-red-500 cursor-pointer" role="button"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        onclick="document.getElementById('erorr-alert').style.display='none'">
                        <title>Tutup</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
        @endif

        <h2 class="font-semibold text-xl p-3 text-center">Please Login</h2>
        <form action="/login" method="POST" class="max-w-sm ps-4 pe-4">
            @csrf
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" id="email" name="email"
                    class="{{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }} shadow-sm bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="Masukan Email" required value="{{ old('email') }}" />
                @error('email')
                    <div class="text-xs text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                <input type="password" id="password" name="password"
                    class="{{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }} shadow-sm bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="Masukan Password" required />
                @error('password')
                    <div class="text-xs text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit"
                class="text-white w-full bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Login</button>

        </form>
    </div>




</body>

</html>
