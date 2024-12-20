<nav class="bg-white border-gray-200 dark:bg-gray-900 shadow-md sticky top-0 z-50">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="/img/journal.svg" class="h-8" alt="Flowbite Logo" />
            <span
                class="self-center text-xl sm:text-2xl font-semibold whitespace-nowrap dark:text-white">GalleryBooks</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">

            <ul
                class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">

                <li>
                    <a href="/"
                        class="{{ Request::is('/') ? ' md:text-blue-700 bg-blue-700 text-white md:bg-transparent ' : 'text-gray-900' }} block py-2 px-3  rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                        Beranda</a>
                </li>
                <li>
                    <a href="/koleksi"
                        class="{{ Request::is('koleksi') ? ' md:text-blue-700 bg-blue-700 text-white md:bg-transparent ' : 'text-gray-900' }} block py-2 px-3  rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Koleksi
                        Buku</a>
                </li>
                <li>
                    <a href="/about"
                        class="{{ Request::is('about') ? ' md:text-blue-700 bg-blue-700 text-white md:bg-transparent ' : 'text-gray-900' }} block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
                </li>

                @guest
                    <li class="flex space-x-6">
                        <!-- Button Login -->
                        <a href="/login"
                            class="flex items-center py-2 px-5 text-white bg-blue-600 rounded-lg shadow-md hover:shadow-lg hover:bg-blue-700 transition-all duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium text-sm text-center">
                            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2" />
                            </svg>
                            Login
                        </a>

                        <a href="/register"
                            class="flex items-center py-2 px-5 text-gray-900 bg-gradient-to-r from-indigo-500 to-pink-500 rounded-lg shadow-md hover:shadow-lg hover:bg-gradient-to-r hover:from-indigo-600 hover:to-pink-600 transition-all duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-indigo-300 font-medium text-sm text-center">
                            <svg class="w-5 h-5 mr-2 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12 2a6 6 0 1 1-6 6 6.006 6.006 0 0 1 6-6zm0 11a8 8 0 1 0 8 8 8 8 0 0 0-8-8zm2 2a1 1 0 0 1 1 1v1h1a1 1 0 0 1 0 2h-1v1a1 1 0 0 1-2 0v-1h-1a1 1 0 0 1 0-2h1v-1a1 1 0 0 1 1-1z" />
                            </svg>
                            Register
                        </a>


                    </li>
                @endguest





                @auth
                    <li>
                        <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName"
                            class=" mt-3 md:mt-0 ml-2 flex items-center text-sm pe-1 font-medium text-gray-900 rounded-full hover:text-blue-600 dark:hover:text-blue-500 md:me-0 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-white"
                            type="button">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 me-2 rounded-full object-cover"
                                src="{{ optional(auth()->user()->profile)->profile_images ? asset('storage/' . auth()->user()->profile->profile_images) : 'img/image.png' }}"
                                alt="user photo">{{ auth()->user()->name }}
                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownAvatarName"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                                <div class="font-medium ">Pro User</div>
                                <div class="truncate">{{ auth()->user()->email }}</div>
                            </div>
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
                                <li>
                                    <a href="/dashboard"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                </li>
                                <hr>
                                <li>
                                    <div class="py-2 ">
                                        <form method="POST" action="/logout" class="">
                                            @csrf
                                            <button type="submit"
                                                class="block w-full text-left px-4 py-2  text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                                out</button>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>


                        {{-- <form method="POST" action="/logout">
                            @csrf
                            <button type="submit"
                                class="hover:opacity-90 hover:-translate-x-px flex lg:mr-8 py-2 lg:-mt-1 px-3 text-white bg-[#050708] hover:bg-[#050708]/90 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm text-center dark:focus:ring-[#050708]/50 dark:hover:bg-[#050708]/30">
                                <svg class="flex-shrink-0 w-6 h-6  text-white dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2" />
                                </svg>
                                <span class="ml-1">Logout</span>
                            </button>
                        </form> --}}
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>
