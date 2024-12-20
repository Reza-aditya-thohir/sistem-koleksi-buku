@extends('dashboard.layouts.main')
@section('container')
    <section class="bg-white border border-gray-200 shadow-lg rounded mb-4 p-4">
        <h2 class="font-semibold text-2xl text-center">Tabel Buku</h2>
    </section>

    @if (session()->has('success'))
        <div id="success-alert"
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4  max-w-md sm:w-full"
            role="alert">
            <strong class="font-bold">Sukses!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500 cursor-pointer" role="button"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    onclick="document.getElementById('success-alert').style.display='none'">
                    <title>Tutup</title>
                    <path
                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                </svg>
            </span>
        </div>
    @endif

    <div class="relative p-6 bg-white border border-gray-200 rounded-lg  overflow-x-auto shadow-lg sm:rounded-lg">
        <div
            class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
            <div>
                <a href="/dashboard/books/create"
                    class="text-sm font-semibold bg-green-400 text-white rounded-lg px-3 py-2 hover:bg-green-500">Tambah</a>
            </div>
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <form action="/dashboard/books" method="GET">
                    <input type="text" name="search" id="search" value="{{ old('search', request('search')) }}"
                        class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search..">
                </form>
            </div>
        </div>
        <div class="w-full text-gray-500 dark:text-gray-400">
            <table class="w-full text-sm text-left rtl:text-right ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="ps-28 py-3">
                            Title
                        </th>

                        <th scope="col" class="px-6 py-3">
                            author
                        </th>

                        <th scope="col" class="px-6 py-3">
                            ISBN
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Year
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                <img class="w-16 h-16 object-cover "
                                    src="{{ $book->cover_image ? asset('storage/' . $book->cover_image) : asset('img/image.png') }}"
                                    alt="Cover buku">

                                <div class="ps-2">
                                    <div class="text-base font-semibold">  {{ Str::limit($book->title, 35) }} </div>
                                    {{-- <div class="font-normal text-gray-500">neil.sims@flowbite.com</div> --}}
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                {{ $book->author }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    {{ $book->isbn }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                {{ $book->year }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $book->category->nama }}
                            </td>
                            <td class="ps-8 py-3 ">
                                <button id="dropdownDefaultButton-{{ $book->id }}"
                                    data-dropdown-toggle="dropdownAction-{{ $book->id }}"
                                    class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                    type="button">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>

                                <div id="dropdownAction-{{ $book->id }}"
                                    class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownDefaultButton-{{ $book->id }}">
                                        {{-- <li>
                                            <a href="#"
                                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Show</a>
                                        </li> --}}
                                        <li>
                                            <a href="/dashboard/books/{{ $book->id }}/edit"
                                                class="block w-full py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                <span class="text-yellow-400 flex items-center">
                                                    <svg class="w-6 h-6" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                                    </svg>
                                                    Edit
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <button onclick="showModal('/dashboard/books/{{ $book->id }}')"
                                                class="block w-full py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                <span class="  text-red-400 hover:text-red-500 flex items-center">
                                                    <svg class="w-5 h-6 " width="24" fill="currentColor"
                                                        viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M704 1376v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm256 0v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm256 0v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm-544-992h448l-48-117q-7-9-17-11h-317q-10 2-17 11zm928 32v64q0 14-9 23t-23 9h-96v948q0 83-47 143.5t-113 60.5h-832q-66 0-113-58.5t-47-141.5v-952h-96q-14 0-23-9t-9-23v-64q0-14 9-23t23-9h309l70-167q15-37 54-63t79-26h320q40 0 79 26t54 63l70 167h309q14 0 23 9t9 23z">
                                                        </path>
                                                    </svg>Hapus
                                                </span>
                                            </button>
                                        </li>

                                    </ul>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-4">
                {{ $books->links() }}
            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div id="confirmationModal"
        class="fixed inset-0 z-50 hidden flex items-center justify-center  bg-black bg-opacity-50">
        <div class="w-80 p-4 m-auto bg-white shadow-lg rounded-2xl dark:bg-gray-800">
            <div class="w-full h-full text-center">
                <div class="flex flex-col justify-between h-full">
                    <svg width="40" height="40" class="w-12 h-12 m-auto mt-4 text-gray-400 dark:text-gray-500"
                        fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M704 1376v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm256 0v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm256 0v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm-544-992h448l-48-117q-7-9-17-11h-317q-10 2-17 11zm928 32v64q0 14-9 23t-23 9h-96v948q0 83-47 143.5t-113 60.5h-832q-66 0-113-58.5t-47-141.5v-952h-96q-14 0-23-9t-9-23v-64q0-14 9-23t23-9h309l70-167q15-37 54-63t79-26h320q40 0 79 26t54 63l70 167h309q14 0 23 9t9 23z">
                        </path>
                    </svg>
                    {{-- <p class="mt-4 text-xl font-bold text-gray-800 dark:text-gray-200">
                      Hapus Data Mutasi
                  </p> --}}
                    <p class="px-5 py-4  text-gray-600 dark:text-gray-400">
                        Are you sure you want to delete this item?
                    </p>

                    <div class="flex justify-center items-center space-x-4 gap-4 mt-4">
                        <button id="cancelDelete" type="button"
                            class="py-2 px-3  font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            No, cancel
                        </button>
                        <form id="deleteForm"  method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                Yes, I'm sure
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
         // unutk confirmasi hapus data
         function showModal(deleteUrl) {
            document.getElementById('confirmationModal').classList.remove('hidden');
            document.getElementById('deleteForm').action = deleteUrl;
        }

        document.getElementById('cancelDelete').onclick = function() {
            document.getElementById('confirmationModal').classList.add('hidden');
        };
    </script>
@endsection
