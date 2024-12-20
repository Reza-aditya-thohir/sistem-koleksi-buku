@extends('layouts.main')
@section('container')
    <section class=" w-full text-center py-20  bg-slate-50">
        <h1
            class="mb-4  font-extrabold leading-none tracking-tight text-gray-900 text-2xl md:text-3xl lg:text-4xl dark:text-white">
            Selamat datang di galery books</h1>
        <p class="mb-6 text-sm font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Di sini, di Galery
            Books, kami mengutamakan semangat membaca dengan menghadirkan koleksi buku yang kaya akan pengetahuan dan
            inspirasi. Temukan buku favorit Anda dan mulai petualangan membaca Anda hari ini!
        </p>
        <a href="/koleksi"
            class="inline-flex items-center justify-center px-4 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
            Lihat koleksi
            <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
        </a>
    </section>

    <section class="w-full py-10  md:px-36 bg-white">
        <div class="container mx-auto">
            <h2 class="text-center text-2xl font-bold mb-6">Koleksi Buku Terbaru</h2>
            <div class="relative">
                <div id="carousel" class="flex overflow-x-scroll hide-scroll-bar space-x-4">
                    <!-- Carousel items -->
                    @foreach ($books as $book)
                        <div class="flex-none w-64 bg-gray-100 rounded-lg shadow-md">
                            <img  src="{{ $book->cover_image ? asset('storage/' . $book->cover_image) : asset('img/image.png') }}" alt="{{ $book->title }}"
                                class="w-full h-52 object-cover rounded-t-lg">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold">{{ $book->title }}</h3>
                                <p class="text-gray-600">{{ $book->author }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Controls -->
                <button id="prev"
                    class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-blue-500 text-white p-2 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <button id="next"
                    class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-blue-500 text-white p-2 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('prev').addEventListener('click', function() {
            document.getElementById('carousel').scrollBy({
                left: -300,
                behavior: 'smooth'
            });
        });

        document.getElementById('next').addEventListener('click', function() {
            document.getElementById('carousel').scrollBy({
                left: 300,
                behavior: 'smooth'
            });
        });
    </script>
@endsection
