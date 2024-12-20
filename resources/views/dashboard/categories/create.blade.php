@extends('dashboard.layouts.main')
@section('container')

<div class="max-w-xl  bg-white border border-gray-200 shadow-lg rounded-lg p-4 ">
    <h2 class="font-semibold text-xl p-3 text-center">Tambah buku</h2>
    <form action="/dashboard/categories" method="POST"  class="max-w-xl ps-4 pe-4">
        @csrf
        <div class="mb-5">
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
            <input type="text" id="nama" name="nama"
                class="shadow-sm bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light @error('nama') border-red-500 @else border-gray-300 @enderror"
                placeholder="Masukan Nama Category" required value="{{ old('nama') }}" />
            @error('nama')
                <div class="text-xs text-red-500 mt-1">{{ $message }}</div>
            @enderror
        </div>

       
        <div class="flex justify-between mt-9 mb-0 px-8">
            <a href="/dashboard/categories"
                class="text-white bg-gradient-to-r from-gray-400 via-gray-500 to-gray-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-300 dark:focus:ring-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                Kembali
            </a>
            <button type="submit"
                class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Added</button>
        </div>
    </form>
    
    
</div>

@endsection