@extends('dashboard.layouts.main')
@section('container')
    <div class="max-w-xl bg-white border border-gray-200 shadow-lg rounded-lg p-4">
        <h2 class="font-semibold text-xl p-3 text-center">Edit buku</h2>
        <form action="/dashboard/books/{{ $book->id }}" method="POST" enctype="multipart/form-data" class="max-w-xl ps-4 pe-4">
            @csrf
            @method('PUT')
            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <input type="text" id="title" name="title" value="{{ $book->title }}"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light @error('title') border-red-500 @enderror"
                    required />
                @error('title')
                    <div class="text-xs text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="author" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Author</label>
                <input type="text" id="author" name="author" value="{{ $book->author }}"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light @error('author') border-red-500 @enderror"
                    required />
                @error('author')
                    <div class="text-xs text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="isbn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. ISBN</label>
                <input type="text" id="isbn" name="isbn" value="{{ $book->isbn }}"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light @error('isbn') border-red-500 @enderror"
                    required />
                @error('isbn')
                    <div class="text-xs text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun</label>
                <input type="text" id="year" name="year" value="{{ $book->year }}"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light @error('year') border-red-500 @enderror"
                    required />
                @error('year')
                    <div class="text-xs text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="cover_image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cover Gambar</label>
                <input type="file" id="cover_image" name="cover_image" onchange="previewImage()"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light @error('cover_image') border-red-500 @enderror" />
                <img class="img-preview w-32 h-40 mt-3" style="display: block;" src="{{ asset('storage/' . $book->cover_image) }}" alt="Cover buku">
                @error('cover_image')
                    <div class="text-xs text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex justify-between mt-6 mb-0 px-8">
                <a href="/dashboard/books"
                    class="text-white bg-gradient-to-r from-gray-400 via-gray-500 to-gray-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-300 dark:focus:ring-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                    Cancel
                </a>
                <button type="submit"
                    class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Update</button>
            </div>
        </form>
        
    </div>

    <script>
        // munculkan gambar
        function previewImage() {
            const image = document.querySelector('#cover_image');
            const imgPreview = document.querySelector('.img-preview'); // Menggunakan '.' untuk mencari berdasarkan class

            imgPreview.style.display = 'block';

            // Untuk mengambil data gambar
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
