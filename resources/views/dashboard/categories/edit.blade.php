@extends('dashboard.layouts.main')

@section('container')
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Category</h2>

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="nama" id="nama" class="mt-1 block w-full p-2 border border-gray-300 rounded-md @error('nama') border-red-500 @enderror" value="{{ old('nama', $category->nama) }}" required>
                @error('nama')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex justify-end">
                <a href="{{ route('categories.index') }}" class="mr-4 bg-gray-500 text-white p-2 rounded">Cancel</a>
                <button type="submit" class="bg-blue-500 text-white p-2 rounded">Update</button>
            </div>
        </form>
    </div>
@endsection
